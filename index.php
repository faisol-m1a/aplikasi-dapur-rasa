<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?> - Kuliner Otentik Indonesia</title>
    
    <!-- Tailwind CSS v4 CDN -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="min-h-screen flex flex-col justify-between relative overflow-x-hidden">

    <!-- 1. Portal Gate Screen -->
    <?php include 'includes/portal.php'; ?>

    <!-- 2. Admin Login Modal -->
    <?php include 'includes/modal-login.php'; ?>

    <!-- 3. Dynamic Header -->
    <?php include 'includes/header.php'; ?>

    <!-- 4. Main Customer Container -->
    <main id="main-pelanggan-container" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex-1 hidden w-full">
        <?php include 'pages/pelanggan/beranda.php'; ?>
        <?php include 'pages/pelanggan/katalog.php'; ?>
        <?php include 'pages/pelanggan/tentang.php'; ?>
        <?php include 'pages/pelanggan/kontak.php'; ?>
    </main>

    <!-- 5. Main Admin Container -->
    <main id="main-admin-container" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex-1 hidden w-full py-8">
        <?php include 'pages/admin/finansial.php'; ?>
        <?php include 'pages/admin/pengeluaran.php'; ?>
        <?php include 'pages/admin/input-transaksi.php'; ?>
        <?php include 'pages/admin/catatan-transaksi.php'; ?>
    </main>

    <!-- 6. Cart Drawer & Overlay -->
    <div id="cart-overlay" onclick="toggleCartDrawer()" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-50 hidden transition-opacity"></div>
    
    <div id="cart-drawer" class="fixed top-0 right-0 h-full w-full max-w-md bg-white z-50 shadow-2xl flex flex-col justify-between hidden animate-slide-in-right">
        <!-- Cart Header -->
        <div class="p-6 border-b border-gray-100 flex items-center justify-between bg-red-600 text-white">
            <div class="flex items-center gap-2">
                <span class="text-2xl">🛒</span>
                <h3 class="font-bold text-lg">Keranjang Belanja</h3>
            </div>
            <button onclick="toggleCartDrawer()" class="w-8 h-8 rounded-full bg-white/20 hover:bg-white/30 flex items-center justify-center font-bold">✕</button>
        </div>

        <!-- Items Container -->
        <div id="cart-items-container" class="p-6 flex-1 overflow-y-auto space-y-3">
            <!-- Dynamic JS Render -->
        </div>

        <!-- Cart Summary & Checkout -->
        <div class="p-6 border-t border-gray-100 bg-gray-50 space-y-4">
            <div class="space-y-1.5 text-xs text-gray-600">
                <div class="flex justify-between">
                    <span>Estimasi Kalori Total:</span>
                    <span id="cart-total-calories" class="font-bold text-gray-800">0 Kkal</span>
                </div>
                <div class="flex justify-between text-base font-extrabold text-gray-900 pt-2 border-t border-gray-200">
                    <span>Total Pembayaran:</span>
                    <span id="cart-total-price" class="text-red-600">Rp 0</span>
                </div>
            </div>
            <form id="form-checkout" onsubmit="checkoutOrder(event)" class="space-y-3">
                <input id="checkout-customer-name" type="text" maxlength="150" required placeholder="Nama pemesan" class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-red-600">
                <select id="checkout-order-type" required class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-red-600">
                    <option value="Takeaway">Takeaway</option>
                    <option value="Dine-In">Dine-In</option>
                    <option value="Katering">Katering</option>
                </select>
                <select id="checkout-payment-method" required class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-red-600" aria-label="Metode pembayaran">
                    <option value="Tunai">Pembayaran Tunai</option>
                    <option value="Transfer">Transfer Bank</option>
                </select>
                <button id="checkout-submit" type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3.5 rounded-xl text-xs shadow-lg flex items-center justify-center gap-2 transition-all active:scale-98">
                    <span>Kirim Pesanan ke Admin</span>
                </button>
            </form>
        </div>
    </div>

    <!-- 7. Dynamic Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript Files -->
    <script src="assets/js/data.js"></script>
    <script src="assets/js/auth.js"></script>
    <script src="assets/js/cart.js"></script>
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
