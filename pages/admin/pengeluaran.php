<!-- Admin View: Pengeluaran Bahan -->
<div id="view-admin-pengeluaran" class="space-y-8 hidden">
    <?php include __DIR__ . '/header-admin.php'; ?>

    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm space-y-6">
        <h3 class="font-extrabold text-xl text-gray-900">Rincian Pengeluaran Bahan Baku Bulan Ini</h3>
        
        <div class="space-y-4">
            <div>
                <div class="flex justify-between text-xs font-bold mb-1">
                    <span class="text-gray-700">Daging Sapi & Ayam Kampung</span>
                    <span class="text-red-600">Rp 8.500.000 (46.7%)</span>
                </div>
                <div class="w-full h-3 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-red-600 rounded-full" style="width: 46.7%"></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between text-xs font-bold mb-1">
                    <span class="text-gray-700">Rempah-Rempah & Sayuran Segar</span>
                    <span class="text-amber-600">Rp 4.200.000 (23.0%)</span>
                </div>
                <div class="w-full h-3 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-amber-500 rounded-full" style="width: 23.0%"></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between text-xs font-bold mb-1">
                    <span class="text-gray-700">Beras, Santan & Sembako Utama</span>
                    <span class="text-emerald-600">Rp 3.500.000 (19.2%)</span>
                </div>
                <div class="w-full h-3 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-emerald-500 rounded-full" style="width: 19.2%"></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between text-xs font-bold mb-1">
                    <span class="text-gray-700">Bahan Minuman & Gula Aren</span>
                    <span class="text-blue-600">Rp 2.000.000 (11.1%)</span>
                </div>
                <div class="w-full h-3 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-blue-500 rounded-full" style="width: 11.1%"></div>
                </div>
            </div>
        </div>
    </div>
</div>
