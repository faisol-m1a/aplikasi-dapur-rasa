<!-- Gerbang Portal Utama (Initial Gate Screen) -->
<div id="portal-gate" class="fixed inset-0 z-50 bg-gradient-to-br from-red-950 via-red-900 to-gray-950 flex items-center justify-center p-4">
    <div class="max-w-xl w-full bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 text-center shadow-2xl text-white">
        <div class="w-20 h-20 bg-red-600 rounded-2xl mx-auto flex items-center justify-center text-4xl shadow-lg mb-6 transform hover:rotate-6 transition-transform">
            🍱
        </div>
        <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight mb-2">Dapur Rasa Nusantara</h1>
        <p class="text-red-200 text-sm md:text-base mb-8 max-w-md mx-auto">
            Selamat datang! Silakan pilih gerbang masuk untuk melanjutkan akses ke aplikasi kuliner otentik Indonesia.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <button onclick="enterRole('pelanggan')" class="group p-6 bg-white rounded-2xl text-left hover:bg-red-50 transition-all duration-300 shadow-lg border border-white/30 active:scale-98">
                <span class="text-3xl block mb-2 group-hover:scale-110 transition-transform">🛒</span>
                <h3 class="font-bold text-gray-900 text-lg group-hover:text-red-600 transition-colors">Pelanggan</h3>
                <p class="text-xs text-gray-500 mt-1">Lihat katalog 24 menu, pesan makanan, & hitung kalori pesanan.</p>
            </button>

            <button onclick="enterRole('admin')" class="group p-6 bg-red-900/40 rounded-2xl text-left hover:bg-red-900/60 transition-all duration-300 border border-red-500/30 active:scale-98">
                <span class="text-3xl block mb-2 group-hover:scale-110 transition-transform">🔑</span>
                <h3 class="font-bold text-white text-lg">Admin Warung</h3>
                <p class="text-xs text-red-200 mt-1">Masuk dengan sandi khusus untuk kelola keuangan & operasional warung.</p>
            </button>
        </div>
    </div>
</div>
