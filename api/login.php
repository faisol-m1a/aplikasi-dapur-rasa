<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    http_response_code(405);
    sendJsonResponse(false, 'Metode request tidak valid.');
}

$input = json_decode(file_get_contents('php://input'), true);
if (!is_array($input)) {
    http_response_code(400);
    sendJsonResponse(false, 'Format data login tidak valid.');
}

if (($input['role'] ?? '') === 'pelanggan') {
    session_regenerate_id(true);
    $_SESSION = ['role' => 'pelanggan'];
    sendJsonResponse(true, 'Berhasil masuk sebagai pelanggan.');
}

if (($input['role'] ?? '') === 'admin') {
    $rawUsername = $input['username'] ?? null;
    $rawPassword = $input['password'] ?? null;
    if (!is_string($rawUsername) || !is_string($rawPassword)) {
        http_response_code(400);
        sendJsonResponse(false, 'Nama pengguna dan kata sandi wajib diisi.');
    }

    $username = trim($rawUsername);
    $password = $rawPassword;
    if ($username === '' || $password === '') {
        http_response_code(400);
        sendJsonResponse(false, 'Nama pengguna dan kata sandi wajib diisi.');
    }

    try {
        $statement = database()->prepare('SELECT id, password_hash FROM admins WHERE username = :username');
        $statement->execute([':username' => $username]);
        $admin = $statement->fetch();
    } catch (PDOException $error) {
        error_log('DRN database login error: ' . $error->getMessage());
        http_response_code(500);
        sendJsonResponse(false, 'Database tidak dapat memvalidasi login saat ini.');
    } catch (RuntimeException $error) {
        error_log('DRN database setup error: ' . $error->getMessage());
        http_response_code(500);
        sendJsonResponse(false, 'Database tidak dapat memvalidasi login saat ini.');
    }

    if ($admin && password_verify($password, $admin['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION = [
            'role' => 'admin',
            'admin_id' => (int) $admin['id']
        ];
        sendJsonResponse(true, 'Login admin berhasil.');
    }

    http_response_code(401);
    sendJsonResponse(false, 'Nama pengguna atau kata sandi salah.');
}

http_response_code(400);
sendJsonResponse(false, 'Peran login tidak valid.');
