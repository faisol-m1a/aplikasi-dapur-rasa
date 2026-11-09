<!-- Halaman Beranda Pelanggan -->
<div id="view-pelanggan-beranda" class="space-y-16 py-8">
    <!-- Hero Banner -->
    <section class="relative bg-gradient-to-r from-red-900 via-red-800 to-red-950 rounded-3xl overflow-hidden shadow-2xl text-white p-8 md:p-16">
        <div class="max-w-2xl space-y-6 relative z-10">
            <span class="inline-block bg-red-500/30 text-red-200 border border-red-400/30 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider">
                🇮🇩 Cita Rasa Otentik Nusantara
            </span>
            <h1 class="text-3xl md:text-5xl font-black tracking-tight leading-tight">
                Keakraban Rasa Kuliner Tradisional Indonesia
            </h1>
            <p class="text-red-100 text-sm md:text-base leading-relaxed">
                Nikmati keberagaman 24 hidangan khas daerah pilihan chef berpengalaman. Dibuat dari rempah segar alami, 100% Halal dan Higienis.
            </p>
            <div class="pt-4 flex flex-wrap gap-4">
                <button onclick="navToPelangganPage('katalog')" class="bg-white text-red-700 hover:bg-red-50 font-bold px-7 py-3.5 rounded-2xl text-sm shadow-lg transition-all active:scale-95">
                    Lihat Katalog Menu 🍛
                </button>
                <button onclick="navToPelangganPage('kontak')" class="bg-red-700/50 hover:bg-red-700 text-white border border-red-400/30 font-bold px-7 py-3.5 rounded-2xl text-sm transition-all">
                    Pesan Katering 📞
                </button>
            </div>
        </div>
    </section>

    <!-- Highlight 4 Menu Favorit Pilihan Chef -->
    <section class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <span class="text-xs font-bold text-red-600 uppercase tracking-widest">Favorit Pelanggan</span>
                <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">Hidangan Utama Pilihan Chef</h2>
            </div>
            <button onclick="navToPelangganPage('katalog')" class="text-sm font-bold text-red-600 hover:text-red-700 flex items-center gap-1">
                Jelajahi Semua 24 Menu →
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Rendang Minang -->
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all p-4 flex flex-col justify-between">
                <div>
                    <img src="https://images.unsplash.com/photo-1626777552726-4a6b54c97e46?auto=format&fit=crop&w=600&q=80" class="w-full h-40 object-cover rounded-xl mb-4" alt="Rendang">
                    <span class="text-[10px] font-extrabold bg-red-100 text-red-700 px-2.5 py-1 rounded-md uppercase">Protein Tinggi</span>
                    <h3 class="font-bold text-base text-gray-900 mt-2">Rendang Minang</h3>
                    <p class="text-xs text-gray-500 mt-1 line-clamp-2">Daging sapi empuk bumbu rempah kelapa gurih meresap.</p>
                </div>
                <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
                    <span class="font-extrabold text-red-600 text-sm">Rp 55.000</span>
                    <button onclick="addToCart(7)" class="bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs font-bold">+ Keranjang</button>
                </div>
            </div>

            <!-- Ayam Betutu -->
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all p-4 flex flex-col justify-between">
                <div>
                    <img src="https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?auto=format&fit=crop&w=600&q=80" class="w-full h-40 object-cover rounded-xl mb-4" alt="Betutu">
                    <span class="text-[10px] font-extrabold bg-red-100 text-red-700 px-2.5 py-1 rounded-md uppercase">Khas Bali</span>
                    <h3 class="font-bold text-base text-gray-900 mt-2">Ayam Betutu Gilimanuk</h3>
                    <p class="text-xs text-gray-500 mt-1 line-clamp-2">Ayam utuh berbumbu base genep harum dipanggang.</p>
                </div>
                <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
                    <span class="font-extrabold text-red-600 text-sm">Rp 48.000</span>
                    <button onclick="addToCart(8)" class="bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs font-bold">+ Keranjang</button>
                </div>
            </div>

            <!-- Nasi Liwet Solo -->
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all p-4 flex flex-col justify-between">
                <div>
                    <img src="https://images.unsplash.com/photo-1512058564366-18510be2db19?auto=format&fit=crop&w=600&q=80" class="w-full h-40 object-cover rounded-xl mb-4" alt="Liwet">
                    <span class="text-[10px] font-extrabold bg-amber-100 text-amber-700 px-2.5 py-1 rounded-md uppercase">Makanan Harian</span>
                    <h3 class="font-bold text-base text-gray-900 mt-2">Nasi Liwet Solo</h3>
                    <p class="text-xs text-gray-500 mt-1 line-clamp-2">Nasi santan gurih dengan sayur labu siam dan ayam suwir.</p>
                </div>
                <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
                    <span class="font-extrabold text-red-600 text-sm">Rp 38.000</span>
                    <button onclick="addToCart(2)" class="bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs font-bold">+ Keranjang</button>
                </div>
            </div>

            <!-- Es Cendol Dawet -->
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all p-4 flex flex-col justify-between">
                <div>
                    <img src="https://images.unsplash.com/photo-1551024709-8f23befc6f87?auto=format&fit=crop&w=600&q=80" class="w-full h-40 object-cover rounded-xl mb-4" alt="Cendol">
                    <span class="text-[10px] font-extrabold bg-blue-100 text-blue-700 px-2.5 py-1 rounded-md uppercase">Minuman Lokal</span>
                    <h3 class="font-bold text-base text-gray-900 mt-2">Es Cendol Dawet Ayu</h3>
                    <p class="text-xs text-gray-500 mt-1 line-clamp-2">Cendol pandan suji gurih santan dan manis nangka gula aren.</p>
                </div>
                <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
                    <span class="font-extrabold text-red-600 text-sm">Rp 18.000</span>
                    <button onclick="addToCart(19)" class="bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs font-bold">+ Keranjang</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner Promo Katering -->
    <section class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-3xl p-8 md:p-12 text-white flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl">
        <div class="space-y-3 max-w-xl">
            <span class="bg-white/20 text-white px-3 py-1 rounded-full text-xs font-bold uppercase">Layanan Spesial</span>
            <h3 class="text-2xl md:text-3xl font-extrabold">Katering & Event Prasmanan Nusantara</h3>
            <p class="text-amber-100 text-xs md:text-sm">Terima pesanan acara syukuran, rapat kantor, hingga pesta pernikahan dengan menu prasmanan khas daerah.</p>
        </div>
        <button onclick="navToPelangganPage('kontak')" class="bg-white text-amber-900 hover:bg-amber-50 font-bold px-6 py-3 rounded-xl text-sm whitespace-nowrap shadow-md">
            Konsultasi Katering 📩
        </button>
    </section>
</div>
