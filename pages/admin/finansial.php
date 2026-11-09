<!-- Admin View: Ringkasan Finansial -->
<div id="view-admin-finansial" class="space-y-8">
    <?php include __DIR__ . '/header-admin.php'; ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Omzet -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Omzet Bulan Ini</span>
                <span class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-sm">📈</span>
            </div>
            <p class="text-2xl font-black text-gray-900">Rp 48.500.000</p>
            <p class="text-[11px] text-emerald-600 font-semibold mt-1">↑ +14% dibanding bulan lalu</p>
        </div>

        <!-- Pengeluaran -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Pengeluaran Bahan</span>
                <span class="w-9 h-9 rounded-xl bg-red-100 text-red-600 flex items-center justify-center font-bold text-sm">💸</span>
            </div>
            <p class="text-2xl font-black text-gray-900">Rp 18.200.000</p>
            <p class="text-[11px] text-gray-500 font-medium mt-1">Target biaya < 40% dari omzet</p>
        </div>

        <!-- Profit Bersih -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Profit Bersih</span>
                <span class="w-9 h-9 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">💰</span>
            </div>
            <p class="text-2xl font-black text-gray-900">Rp 30.300.000</p>
            <p class="text-[11px] text-blue-600 font-semibold mt-1">Margin bersih 62.4%</p>
        </div>

        <!-- Member Katering -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Member Katering</span>
                <span class="w-9 h-9 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-sm">👥</span>
            </div>
            <p class="text-2xl font-black text-gray-900">42 Klien</p>
            <p class="text-[11px] text-purple-600 font-semibold mt-1">12 Instansi Aktif</p>
        </div>
    </div>
</div>
