<?php
require_once '../config.php';
requireRole('admin');

$method = $_SERVER['REQUEST_METHOD'];
if (!in_array($method, ['GET', 'POST', 'DELETE'], true)) {
    header('Allow: GET, POST, DELETE');
    http_response_code(405);
    sendJsonResponse(false, 'Metode request tidak valid.');
}

function getTransactions(PDO $pdo) {
    $rows = $pdo->query(
        'SELECT id AS database_id, transaction_code AS id, transaction_date AS date, customer, type, payment_method, amount, status
         FROM transactions ORDER BY transactions.id DESC'
    )->fetchAll();

    foreach ($rows as &$row) {
        $row['amount'] = (int) $row['amount'];
        $statement = $pdo->prepare(
            'SELECT menu_name AS name, quantity, unit_price AS price
             FROM transaction_items WHERE transaction_id = :transaction_id ORDER BY id'
        );
        $statement->execute([':transaction_id' => $row['database_id']]);
        $row['items'] = $statement->fetchAll();
        foreach ($row['items'] as &$item) {
            $item['quantity'] = (int) $item['quantity'];
            $item['price'] = (int) $item['price'];
        }
        unset($item);
        unset($row['database_id']);
    }
    unset($row);

    return $rows;
}

try {
    $pdo = database();

    if ($method === 'GET') {
        sendJsonResponse(true, 'Data transaksi berhasil dimuat.', getTransactions($pdo));
    }

    if ($method === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);
        if (!is_array($input)) {
            http_response_code(400);
            sendJsonResponse(false, 'Format data transaksi tidak valid.');
        }

        $customer = $input['customer'] ?? null;
        $type = $input['type'] ?? '';
        $rawAmount = $input['amount'] ?? null;
        $amount = filter_var($rawAmount, FILTER_VALIDATE_INT);

        if (!is_string($customer) || trim($customer) === '' || mb_strlen(trim($customer)) > 150) {
            http_response_code(422);
            sendJsonResponse(false, 'Nama pelanggan wajib diisi dan maksimal 150 karakter.');
        }
        $customer = trim($customer);
        if (!in_array($type, ['Dine-In', 'Takeaway', 'Katering'], true)) {
            http_response_code(422);
            sendJsonResponse(false, 'Jenis pesanan tidak valid.');
        }
        if ($amount === false || $amount < 1) {
            http_response_code(422);
            sendJsonResponse(false, 'Total pembayaran harus berupa bilangan bulat lebih dari nol.');
        }

        $pdo->beginTransaction();
        $statement = $pdo->prepare(
            'INSERT INTO transactions (transaction_code, transaction_date, customer, type, amount, status)
             VALUES (:code, :date, :customer, :type, :amount, :status)'
        );
        $statement->execute([
            ':code' => 'pending-' . bin2hex(random_bytes(8)),
            ':date' => date('Y-m-d'),
            ':customer' => $customer,
            ':type' => $type,
            ':amount' => $amount,
            ':status' => 'Lunas'
        ]);
        $id = (int) $pdo->lastInsertId();
        $code = 'TRX-' . ($id + 100);
        $statement = $pdo->prepare('UPDATE transactions SET transaction_code = :code WHERE id = :id');
        $statement->execute([':code' => $code, ':id' => $id]);
        $pdo->commit();

        sendJsonResponse(true, 'Transaksi berhasil ditambahkan.', getTransactions($pdo));
    }

    $code = $_GET['id'] ?? '';
    if (!is_string($code) || !preg_match('/^TRX-\d+$/D', $code)) {
        http_response_code(400);
        sendJsonResponse(false, 'ID transaksi tidak valid.');
    }

    $statement = $pdo->prepare('DELETE FROM transactions WHERE transaction_code = :code');
    $statement->execute([':code' => $code]);
    if ($statement->rowCount() === 0) {
        http_response_code(404);
        sendJsonResponse(false, 'Transaksi tidak ditemukan.');
    }

    sendJsonResponse(true, 'Transaksi berhasil dihapus.', getTransactions($pdo));
} catch (PDOException $error) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    error_log('DRN database transaction error: ' . $error->getMessage());
    http_response_code(500);
    sendJsonResponse(false, 'Database tidak dapat memproses transaksi saat ini.');
} catch (RuntimeException $error) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    error_log('DRN database setup error: ' . $error->getMessage());
    http_response_code(500);
    sendJsonResponse(false, 'Database tidak dapat memproses transaksi saat ini.');
} catch (Random\RandomException $error) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    error_log('DRN transaction ID generation error: ' . $error->getMessage());
    http_response_code(500);
    sendJsonResponse(false, 'ID transaksi tidak dapat dibuat saat ini.');
}
