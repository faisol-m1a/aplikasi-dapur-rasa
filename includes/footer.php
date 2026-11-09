<!-- Footer Dynamic Component -->
<!-- Pelanggan Footer -->
<footer id="footer-pelanggan" class="bg-gray-900 text-white pt-16 pb-12 border-t border-gray-800 hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-600 rounded-xl flex items-center justify-center text-white text-xl">🍱</div>
                    <span class="text-xl font-bold">Dapur Rasa Nusantara</span>
                </div>
                <p class="text-gray-400 text-xs leading-relaxed">
                    Menyajkan kenikmatan cita rasa otentik kuliner dari berbagai penjuru Nusantara dengan bahan 100% halal dan higienis.
                </p>
            </div>
            <div>
                <h4 class="font-bold text-sm uppercase tracking-wider mb-4 text-red-500">Navigasi Utama</h4>
                <ul class="space-y-2 text-xs text-gray-400">
                    <li><button onclick="navToPelangganPage('beranda')" class="hover:text-white">Beranda</button></li>
                    <li><button onclick="navToPelangganPage('katalog')" class="hover:text-white">Katalog Menu & Harga</button></li>
                    <li><button onclick="navToPelangganPage('tentang')" class="hover:text-white">Tentang Kami</button></li>
                    <li><button onclick="navToPelangganPage('kontak')" class="hover:text-white">Kontak & Reservasi</button></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-sm uppercase tracking-wider mb-4 text-red-500">Jam Operasional</h4>
                <ul class="space-y-2 text-xs text-gray-400">
                    <li>Senin - Jumat: 08.00 - 21.00 WIB</li>
                    <li>Sabtu - Minggu: 09.00 - 22.00 WIB</li>
                    <li class="text-emerald-400 font-semibold pt-2">✓ Melayani Katering & Event Prasmanan</li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-sm uppercase tracking-wider mb-4 text-red-500">Hubungi Kami</h4>
                <p class="text-xs text-gray-400 leading-relaxed mb-3">Jl. Kuliner Nusantara No. 88, Jakarta Selatan</p>
                <p class="text-xs text-gray-400">WhatsApp: +62 812-3456-7890</p>
            </div>
        </div>
        <div class="pt-8 border-t border-gray-800 text-center text-xs text-gray-500">
            © <?php echo date('Y'); ?> Dapur Rasa Nusantara. Seluruh Hak Cipta Dilindungi.
        </div>
    </div>
</footer>

<!-- Admin Footer -->
<footer id="footer-admin" class="bg-gray-950 text-gray-500 py-6 text-center text-xs border-t border-gray-900 hidden">
    <div class="max-w-7xl mx-auto px-4">
        Sistem Manajemen Operasional & Keuangan Internal - Dapur Rasa Nusantara
    </div>
</footer>
