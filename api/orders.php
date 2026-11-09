<?php
require_once '../config.php';
requireRole('pelanggan');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    http_response_code(405);
    sendJsonResponse(false, 'Metode request tidak valid.');
}

$input = json_decode(file_get_contents('php://input'), true);
if (!is_array($input)) {
    http_response_code(400);
    sendJsonResponse(false, 'Format pesanan tidak valid.');
}

$customer = $input['customer'] ?? null;
$type = $input['type'] ?? '';
$paymentMethod = $input['payment_method'] ?? '';
$rawItems = $input['items'] ?? null;
if (!is_string($customer) || trim($customer) === '' || mb_strlen(trim($customer)) > 150) {
    http_response_code(422);
    sendJsonResponse(false, 'Nama pemesan wajib diisi dan maksimal 150 karakter.');
}
$customer = trim($customer);
if (!in_array($type, ['Dine-In', 'Takeaway', 'Katering'], true)) {
    http_response_code(422);
    sendJsonResponse(false, 'Jenis pesanan tidak valid.');
}
if (!in_array($paymentMethod, ['Tunai', 'Transfer'], true)) {
    http_response_code(422);
    sendJsonResponse(false, 'Metode pembayaran tidak valid.');
}
if (!is_array($rawItems) || count($rawItems) === 0 || count($rawItems) > 24) {
    http_response_code(422);
    sendJsonResponse(false, 'Keranjang pesanan tidak valid.');
}

$menu = [
    1 => ['Nasi Bogana', 35000], 2 => ['Nasi Liwet Solo', 38000],
    3 => ['Nasi Campur Bali', 45000], 4 => ['Nasi Ulam Betawi', 32000],
    5 => ['Nasi Gudeg Jogja', 40000], 6 => ['Nasi Krawu Gresik', 36000],
    7 => ['Rendang Minang', 55000], 8 => ['Ayam Betutu Gilimanuk', 48000],
    9 => ['Ikan Lais Bakar Dabu-Dabu', 52000], 10 => ['Sate Maranggi Purwakarta', 46000],
    11 => ['Ayam Pop khas Padang', 42000], 12 => ['Gurame Bakar Jimbaran', 65000],
    13 => ['Gado-Gado Betawi', 28000], 14 => ['Urap-Urap Jawa', 24000],
    15 => ['Pecel Blitar', 26000], 16 => ['Plecing Kangkung Lombok', 22000],
    17 => ['Tumis Genjer Tauco', 25000], 18 => ['Karedok Sunda', 26000],
    19 => ['Es Cendol Dawet Ayu', 18000], 20 => ['Wedang Jahe Rempah', 15000],
    21 => ['Es Kunyit Asam', 16000], 22 => ['Es Doger khas Bandung', 20000],
    23 => ['Es Bir Pletok Betawi', 18000], 24 => ['Es Selendang Mayang', 19000]
];

$items = [];
$total = 0;
foreach ($rawItems as $rawItem) {
    if (!is_array($rawItem)) {
        http_response_code(422);
        sendJsonResponse(false, 'Item pesanan tidak valid.');
    }
    $menuId = filter_var($rawItem['id'] ?? null, FILTER_VALIDATE_INT);
    $quantity = filter_var($rawItem['qty'] ?? null, FILTER_VALIDATE_INT);
    if ($menuId === false || !isset($menu[$menuId]) || $quantity === false || $quantity < 1 || $quantity > 99) {
        http_response_code(422);
        sendJsonResponse(false, 'Menu atau jumlah pesanan tidak valid.');
    }
    if (isset($items[$menuId])) {
        $quantity += $items[$menuId]['quantity'];
        if ($quantity > 99) {
            http_response_code(422);
            sendJsonResponse(false, 'Jumlah menu maksimal 99.');
        }
    }
    [$name, $price] = $menu[$menuId];
    $items[$menuId] = ['name' => $name, 'quantity' => $quantity, 'price' => $price];
}
foreach ($items as $item) {
    $total += $item['price'] * $item['quantity'];
}

try {
    $pdo = database();
    $pdo->beginTransaction();
    $statement = $pdo->prepare(
        'INSERT INTO transactions (transaction_code, transaction_date, customer, type, payment_method, amount, status)
         VALUES (:code, :date, :customer, :type, :payment_method, :amount, :status)'
    );
    $statement->execute([
        ':code' => 'pending-' . bin2hex(random_bytes(8)),
        ':date' => date('Y-m-d'),
        ':customer' => $customer,
        ':type' => $type,
        ':payment_method' => $paymentMethod,
        ':amount' => $total,
        ':status' => 'Menunggu'
    ]);
    $id = (int) $pdo->lastInsertId();
    $code = 'TRX-' . ($id + 100);
    $statement = $pdo->prepare('UPDATE transactions SET transaction_code = :code WHERE id = :id');
    $statement->execute([':code' => $code, ':id' => $id]);

    $itemStatement = $pdo->prepare(
        'INSERT INTO transaction_items (transaction_id, menu_id, menu_name, quantity, unit_price)
         VALUES (:transaction_id, :menu_id, :menu_name, :quantity, :unit_price)'
    );
    foreach ($items as $menuId => $item) {
        $itemStatement->execute([
            ':transaction_id' => $id,
            ':menu_id' => $menuId,
            ':menu_name' => $item['name'],
            ':quantity' => $item['quantity'],
            ':unit_price' => $item['price']
        ]);
    }
    $pdo->commit();

    sendJsonResponse(true, 'Pesanan berhasil dikirim ke admin.', ['id' => $code]);
} catch (PDOException $error) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    error_log('DRN customer order error: ' . $error->getMessage());
    http_response_code(500);
    sendJsonResponse(false, 'Database tidak dapat menyimpan pesanan saat ini.');
} catch (RuntimeException $error) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    error_log('DRN database setup error: ' . $error->getMessage());
    http_response_code(500);
    sendJsonResponse(false, 'Database tidak dapat menyimpan pesanan saat ini.');
} catch (Random\RandomException $error) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    http_response_code(500);
    sendJsonResponse(false, 'ID pesanan tidak dapat dibuat saat ini.');
}