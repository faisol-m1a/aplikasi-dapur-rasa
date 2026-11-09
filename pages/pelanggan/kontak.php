<!-- Halaman Kontak Pelanggan -->
<div id="view-pelanggan-kontak" class="space-y-12 py-8 hidden">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Form Reservasi -->
        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm space-y-6">
            <div>
                <span class="text-xs font-bold text-red-600 uppercase tracking-widest">Hubungi Kami</span>
                <h3 class="text-2xl font-extrabold text-gray-900 mt-1">Form Reservasi & Katering</h3>
                <p class="text-xs text-gray-500 mt-1">Kirimkan pertanyaan atau jadwal pemesanan acara Anda.</p>
            </div>

            <form onsubmit="alert('Terima kasih! Pesan Anda telah terkirim.'); return false;" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                    <input type="text" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs focus:outline-none focus:border-red-600">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nomor WhatsApp</label>
                    <input type="tel" required placeholder="081234567890" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs focus:outline-none focus:border-red-600">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Jenis Layanan</label>
                    <select class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs focus:outline-none focus:border-red-600">
                        <option>Reservasi Meja Makan</option>
                        <option>Katering Kantor / Event</option>
                        <option>Pesan Prasmanan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Catatan Pesanan</label>
                    <textarea rows="3" placeholder="Tuliskan detail pesanan Anda..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs focus:outline-none focus:border-red-600"></textarea>
                </div>
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-xl text-xs shadow-md">
                    Kirim Pesan
                </button>
            </form>
        </div>

        <!-- Info & Map -->
        <div class="space-y-6">
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm space-y-4">
                <h4 class="font-bold text-lg text-gray-900">Alamat Utama Warung</h4>
                <p class="text-xs text-gray-600 leading-relaxed">
                    Jl. Kuliner Nusantara No. 88, Kebayoran Baru, Jakarta Selatan, DKI Jakarta 12110
                </p>
                <div class="space-y-2 text-xs text-gray-600 pt-2">
                    <p>📞 <strong>Telepon:</strong> (021) 7890-1234</p>
                    <p>💬 <strong>WhatsApp:</strong> +62 812-3456-7890</p>
                    <p>✉️ <strong>Email:</strong> info@dapurrasanusantara.id</p>
                </div>
            </div>

            <div class="bg-red-900 text-white rounded-3xl p-8 shadow-lg flex items-center justify-between">
                <div>
                    <h4 class="font-bold text-lg">Buka Setiap Hari</h4>
                    <p class="text-xs text-red-200 mt-1">08.00 - 21.00 WIB</p>
                </div>
                <span class="text-4xl">🕒</span>
            </div>
        </div>
    </div>
</div>
