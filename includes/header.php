<!-- Header Dynamic Component -->
<!-- 1. Navbar Pelanggan -->
<nav id="navbar-pelanggan" class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <div class="flex items-center gap-3 cursor-pointer" onclick="navToPelangganPage('beranda')">
                <div class="w-11 h-11 bg-red-600 rounded-xl flex items-center justify-center text-white text-xl shadow-md">
                    🍱
                </div>
                <div>
                    <span class="text-xl font-extrabold tracking-tight text-gray-900 block leading-tight">Dapur Rasa</span>
                    <span class="text-xs font-semibold text-red-600 tracking-widest uppercase">Nusantara</span>
                </div>
            </div>

            <!-- Customer Navigation Links -->
            <div class="hidden md:flex items-center gap-8">
                <button id="nav-pelanggan-beranda" onclick="navToPelangganPage('beranda')" class="text-sm font-semibold py-2 transition-all">Beranda</button>
                <button id="nav-pelanggan-katalog" onclick="navToPelangganPage('katalog')" class="text-sm font-semibold py-2 transition-all">Menu & Harga</button>
                <button id="nav-pelanggan-tentang" onclick="navToPelangganPage('tentang')" class="text-sm font-semibold py-2 transition-all">Tentang Kami</button>
                <button id="nav-pelanggan-kontak" onclick="navToPelangganPage('kontak')" class="text-sm font-semibold py-2 transition-all">Kontak</button>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center gap-3">
                <button onclick="toggleCartDrawer()" class="relative bg-red-50 hover:bg-red-100 text-red-600 p-2.5 rounded-xl font-bold transition-all flex items-center gap-2 text-sm">
                    <span>🛒</span>
                    <span id="cart-badge-count" class="bg-red-600 text-white text-xs font-extrabold px-2 py-0.5 rounded-full">0</span>
                </button>
                <button onclick="exitToPortal()" class="hidden sm:inline-flex bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2.5 rounded-xl text-xs font-bold transition-all items-center gap-1">
                    <span>🚪</span> Keluar
                </button>
                <button onclick="toggleMobileMenu('pelanggan')" class="md:hidden text-gray-700 text-2xl p-1">☰</button>
            </div>
        </div>
    </div>
    <!-- Mobile Dropdown Pelanggan -->
    <div id="mobile-menu-pelanggan" class="hidden md:hidden bg-white border-b border-gray-100 px-4 pt-2 pb-4 space-y-2">
        <button id="nav-pelanggan-mobile-beranda" onclick="navToPelangganPage('beranda'); toggleMobileMenu('pelanggan')" class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-semibold">Beranda</button>
        <button id="nav-pelanggan-mobile-katalog" onclick="navToPelangganPage('katalog'); toggleMobileMenu('pelanggan')" class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-semibold">Menu & Harga</button>
        <button id="nav-pelanggan-mobile-tentang" onclick="navToPelangganPage('tentang'); toggleMobileMenu('pelanggan')" class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-semibold">Tentang Kami</button>
        <button id="nav-pelanggan-mobile-kontak" onclick="navToPelangganPage('kontak'); toggleMobileMenu('pelanggan')" class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-semibold">Kontak</button>
        <button onclick="exitToPortal()" class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-semibold text-red-600 bg-red-50">🚪 Keluar / Ganti Peran</button>
    </div>
</nav>

<!-- 2. Navbar Admin Warung -->
<nav id="navbar-admin" class="sticky top-0 z-40 bg-gray-900 text-white border-b border-gray-800 shadow-lg hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <div class="flex items-center gap-3 cursor-pointer" onclick="navToAdminPage('finansial')">
                <div class="w-10 h-10 bg-red-600 rounded-xl flex items-center justify-center text-white text-lg font-bold">
                    🔑
                </div>
                <div>
                    <span class="text-base font-extrabold tracking-tight block leading-tight text-white">Dapur Rasa Nusantara</span>
                    <span class="text-[10px] font-semibold text-red-400 tracking-wider uppercase">Dasbor Pengelola</span>
                </div>
            </div>

            <!-- Admin Nav Links -->
            <div class="hidden md:flex items-center gap-2">
                <button id="nav-admin-finansial" onclick="navToAdminPage('finansial')" class="px-4 py-2 rounded-xl text-xs font-bold transition-all">📊 Ringkasan Finansial</button>
                <button id="nav-admin-pengeluaran" onclick="navToAdminPage('pengeluaran')" class="px-4 py-2 rounded-xl text-xs font-bold transition-all">💸 Pengeluaran Bahan</button>
                <button id="nav-admin-input" onclick="navToAdminPage('input')" class="px-4 py-2 rounded-xl text-xs font-bold transition-all">➕ Input Transaksi</button>
                <button id="nav-admin-catatan" onclick="navToAdminPage('catatan')" class="px-4 py-2 rounded-xl text-xs font-bold transition-all">📋 Catatan Transaksi</button>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3">
                <button onclick="exitToPortal()" class="bg-red-600/30 hover:bg-red-600 text-red-200 hover:text-white border border-red-500/30 px-4 py-2 rounded-xl text-xs font-bold transition-all">
                    🚪 Keluar
                </button>
                <button onclick="toggleMobileMenu('admin')" class="md:hidden text-white text-2xl p-1">☰</button>
            </div>
        </div>
    </div>
    <!-- Mobile Dropdown Admin -->
    <div id="mobile-menu-admin" class="hidden md:hidden bg-gray-950 border-b border-gray-800 px-4 pt-2 pb-4 space-y-2">
        <button id="nav-admin-mobile-finansial" onclick="navToAdminPage('finansial'); toggleMobileMenu('admin')" class="w-full text-left px-4 py-2 rounded-xl text-xs font-bold">📊 Ringkasan Finansial</button>
        <button id="nav-admin-mobile-pengeluaran" onclick="navToAdminPage('pengeluaran'); toggleMobileMenu('admin')" class="w-full text-left px-4 py-2 rounded-xl text-xs font-bold">💸 Pengeluaran Bahan</button>
        <button id="nav-admin-mobile-input" onclick="navToAdminPage('input'); toggleMobileMenu('admin')" class="w-full text-left px-4 py-2 rounded-xl text-xs font-bold">➕ Input Transaksi</button>
        <button id="nav-admin-mobile-catatan" onclick="navToAdminPage('catatan'); toggleMobileMenu('admin')" class="w-full text-left px-4 py-2 rounded-xl text-xs font-bold">📋 Catatan Transaksi</button>
    </div>
</nav>
