<?php
session_start();

define('APP_NAME', 'Dapur Rasa Nusantara');

function sendJsonResponse($success, $message = '', $data = []) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ], JSON_INVALID_UTF8_SUBSTITUTE);
    exit;
}

function database() {
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $databasePath = getenv('DRN_DB_PATH');
    if ($databasePath === false || $databasePath === '') {
        $databasePath = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'dapur-rasa-nusantara.sqlite';
    }

    $directory = dirname($databasePath);
    if (!is_dir($directory) && !mkdir($directory, 0700, true) && !is_dir($directory)) {
        throw new RuntimeException('Direktori database tidak dapat dibuat.');
    }

    $schemaPath = __DIR__ . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'schema.sql';
    $schema = file_get_contents($schemaPath);
    if ($schema === false) {
        throw new RuntimeException('Skema database tidak dapat dibaca.');
    }

    $pdo = new PDO('sqlite:' . $databasePath, null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $pdo->exec('PRAGMA foreign_keys = ON');
    $pdo->exec($schema);
    $transactionColumns = $pdo->query('PRAGMA table_info(transactions)')->fetchAll(PDO::FETCH_COLUMN, 1);
    if (!in_array('payment_method', $transactionColumns, true)) {
        $pdo->exec(
            "ALTER TABLE transactions ADD COLUMN payment_method TEXT NOT NULL DEFAULT 'Tunai'
             CHECK (payment_method IN ('Tunai', 'Transfer'))"
        );
    }

    $username = getenv('DRN_ADMIN_USERNAME');
    $password = getenv('DRN_ADMIN_PASSWORD');
    $username = $username === false || $username === '' ? 'admin' : $username;
    $password = $password === false || $password === '' ? '12345678f' : $password;

    $statement = $pdo->prepare('INSERT OR IGNORE INTO admins (username, password_hash) VALUES (:username, :password_hash)');
    $statement->execute([
        ':username' => $username,
        ':password_hash' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    if ((int) $pdo->query('SELECT COUNT(*) FROM transactions')->fetchColumn() === 0) {
        $statement = $pdo->prepare(
            'INSERT INTO transactions (transaction_code, transaction_date, customer, type, amount, status)
             VALUES (:code, :date, :customer, :type, :amount, :status)'
        );
        $samples = [
            ['TRX-101', '2026-03-30', 'Budi Santoso', 'Dine-In', 145000],
            ['TRX-102', '2026-03-30', 'Siti Rahma', 'Takeaway', 85000],
            ['TRX-103', '2026-03-29', 'PT Nusantara Jaya', 'Katering', 1250000],
            ['TRX-104', '2026-03-29', 'Dewi Lestari', 'Dine-In', 210000]
        ];
        foreach ($samples as [$code, $date, $customer, $type, $amount]) {
            $statement->execute([
                ':code' => $code,
                ':date' => $date,
                ':customer' => $customer,
                ':type' => $type,
                ':amount' => $amount,
                ':status' => 'Lunas'
            ]);
        }
    }

    return $pdo;
}

function requireRole($role) {
    if (($_SESSION['role'] ?? null) !== $role) {
        http_response_code(403);
        sendJsonResponse(false, 'Akses ditolak. Silakan masuk dengan peran yang sesuai.');
    }
}
