<!-- Admin View: Catatan Transaksi -->
<div id="view-admin-catatan" class="space-y-8 hidden">
    <?php include __DIR__ . '/header-admin.php'; ?>

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-extrabold text-lg text-gray-900">Catatan Transaksi Harian</h3>
            <span class="text-xs text-gray-500">Data Pembaruan Real-Time</span>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-[11px] font-bold text-gray-500 uppercase tracking-wider">
                        <th class="px-6 py-4">ID Transaksi</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Pelanggan</th>
                        <th class="px-6 py-4">Tipe</th>
                        <th class="px-6 py-4">Pembayaran</th>
                        <th class="px-6 py-4">Detail Pesanan</th>
                        <th class="px-6 py-4">Nominal</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-transactions-body" class="divide-y divide-gray-100">
                    <!-- Rendered dynamically by admin.js -->
                </tbody>
            </table>
        </div>
    </div>
</div>
