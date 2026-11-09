<!-- Halaman Menu & Harga (Katalog 24 Menu) -->
<div id="view-pelanggan-katalog" class="space-y-8 py-8 hidden">
    <!-- Header Page -->
    <div class="text-center max-w-2xl mx-auto space-y-3">
        <span class="text-xs font-bold text-red-600 uppercase tracking-widest">Katalog Lengkap</span>
        <h2 class="text-3xl font-extrabold text-gray-900">24 Cita Rasa Otentik Nusantara</h2>
        <p class="text-gray-500 text-xs md:text-sm">Pilih menu favorit Anda berdasarkan kategori hidangan harian, protein tinggi, serba sayur, atau minuman tradisional.</p>
    </div>

    <!-- Filter Tabs & Search Bar -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-4 bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
        <!-- Search Input -->
        <div class="relative w-full md:w-80">
            <input type="text" id="katalog-search-input" onkeyup="searchKatalog()" placeholder="Cari nama menu atau rempah..." class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 text-xs focus:outline-none focus:border-red-600 transition-all">
            <span class="absolute left-3.5 top-3 text-gray-400 text-xs">🔍</span>
        </div>

        <!-- Category Tabs -->
        <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0">
            <button onclick="filterKatalogCategory('semua', this)" data-category="semua" class="katalog-tab-btn px-4 py-2 rounded-xl text-xs font-bold bg-red-600 text-white whitespace-nowrap transition-all">
                Semua (24)
            </button>
            <button onclick="filterKatalogCategory('harian', this)" data-category="harian" class="katalog-tab-btn px-4 py-2 rounded-xl text-xs font-bold bg-white text-gray-700 border border-gray-200 hover:bg-gray-50 whitespace-nowrap transition-all">
                🥗 Makanan Harian (6)
            </button>
            <button onclick="filterKatalogCategory('protein', this)" data-category="protein" class="katalog-tab-btn px-4 py-2 rounded-xl text-xs font-bold bg-white text-gray-700 border border-gray-200 hover:bg-gray-50 whitespace-nowrap transition-all">
                🥩 Tinggi Protein (6)
            </button>
            <button onclick="filterKatalogCategory('sayur', this)" data-category="sayur" class="katalog-tab-btn px-4 py-2 rounded-xl text-xs font-bold bg-white text-gray-700 border border-gray-200 hover:bg-gray-50 whitespace-nowrap transition-all">
                🍄 Serba Sayur (6)
            </button>
            <button onclick="filterKatalogCategory('minuman', this)" data-category="minuman" class="katalog-tab-btn px-4 py-2 rounded-xl text-xs font-bold bg-white text-gray-700 border border-gray-200 hover:bg-gray-50 whitespace-nowrap transition-all">
                🍹 Minuman Lokal (6)
            </button>
        </div>
    </div>

    <!-- Cards Grid -->
    <div id="katalog-cards-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <!-- Rendered dynamically by JavaScript -->
    </div>
</div>
