<!-- Modal Login Admin (No hint text in UI) -->
<div id="modal-login-admin" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 hidden">
    <div class="bg-white w-full max-w-md rounded-3xl p-7 shadow-2xl border border-gray-100 relative animate-fade-in">
        <button onclick="closeAdminModal()" class="absolute top-5 right-5 text-gray-400 hover:text-gray-600 w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center font-bold">✕</button>
        
        <div class="text-center mb-6">
            <div class="w-14 h-14 bg-red-100 text-red-600 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-3">
                🔐
            </div>
            <h3 class="text-2xl font-bold text-gray-900">Verifikasi Admin</h3>
            <p class="text-xs text-gray-500 mt-1">Masukkan kredensial pengelola warung untuk melanjutkan</p>
        </div>

        <div id="admin-login-error" class="hidden mb-4 p-3 bg-red-50 border border-red-200 rounded-xl text-red-600 text-xs font-semibold text-center">
            ⚠️ Nama Pengguna atau Kata Sandi tidak sesuai!
        </div>

        <form onsubmit="handleAdminLogin(event)" class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Nama Pengguna</label>
                <input type="text" id="admin-user" required placeholder="Masukkan nama pengguna" class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-100 transition-all">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Kata Sandi</label>
                <input type="password" id="admin-pass" required placeholder="Masukkan kata sandi" class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-red-600 focus:ring-2 focus:ring-red-100 transition-all">
            </div>
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3.5 rounded-xl text-sm shadow-lg shadow-red-200 transition-all active:scale-98">
                Masuk Dasbor Admin
            </button>
        </form>
    </div>
</div>
