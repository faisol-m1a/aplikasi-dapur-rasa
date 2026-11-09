<!-- Admin View: Input Transaksi -->
<div id="view-admin-input" class="space-y-8 hidden">
    <?php include __DIR__ . '/header-admin.php'; ?>

    <div class="max-w-2xl bg-white p-8 rounded-3xl border border-gray-100 shadow-sm space-y-6">
        <h3 class="font-extrabold text-xl text-gray-900">Form Input Transaksi Baru Kasir</h3>
        
        <form id="form-add-transaction" onsubmit="handleAddTransaction(event)" class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nama Pelanggan / Instansi</label>
                <input type="text" id="input-customer-name" required placeholder="Contoh: Rina Wijaya" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs focus:outline-none focus:border-red-600">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Jenis Pesanan</label>
                    <select id="input-order-type" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs focus:outline-none focus:border-red-600">
                        <option value="Dine-In">Dine-In</option>
                        <option value="Takeaway">Takeaway</option>
                        <option value="Katering">Katering</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Total Pembayaran (Rp)</label>
                    <input type="number" id="input-total-amount" min="1" step="1" required placeholder="150000" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs focus:outline-none focus:border-red-600">
                </div>
            </div>

            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-xl text-xs shadow-md transition-all">
                Simpan Transaksi Baru
            </button>
        </form>
    </div>
</div>
