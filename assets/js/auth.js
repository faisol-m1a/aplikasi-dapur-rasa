// Auth & Role Management
let currentRole = 'portal'; // 'portal', 'pelanggan', 'admin'

async function enterRole(role) {
    if (role === 'pelanggan') {
        const response = await fetch('api/login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ role: 'pelanggan' })
        });
        const result = await response.json();
        if (!response.ok || !result.success) {
            window.alert(result.message || 'Tidak dapat masuk sebagai pelanggan.');
            return;
        }

        currentRole = 'pelanggan';
        document.getElementById('portal-gate').classList.add('hidden');
        document.getElementById('navbar-pelanggan').classList.remove('hidden');
        document.getElementById('navbar-admin').classList.add('hidden');
        document.getElementById('footer-pelanggan').classList.remove('hidden');
        document.getElementById('footer-admin').classList.add('hidden');
        document.getElementById('main-pelanggan-container').classList.remove('hidden');
        document.getElementById('main-admin-container').classList.add('hidden');
        navToPelangganPage('beranda');
    } else if (role === 'admin') {
        openAdminModal();
    }
}

async function exitToPortal() {
    try {
        await fetch('api/logout.php', { method: 'POST' });
    } catch (error) {
        console.error('Gagal menghapus sesi login:', error);
    }

    currentRole = 'portal';
    document.getElementById('portal-gate').classList.remove('hidden');
    document.getElementById('navbar-pelanggan').classList.add('hidden');
    document.getElementById('navbar-admin').classList.add('hidden');
    document.getElementById('footer-pelanggan').classList.add('hidden');
    document.getElementById('footer-admin').classList.add('hidden');
    document.getElementById('main-pelanggan-container').classList.add('hidden');
    document.getElementById('main-admin-container').classList.add('hidden');
    closeAdminModal();
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function openAdminModal() {
    document.getElementById('modal-login-admin').classList.remove('hidden');
    document.getElementById('admin-user').value = '';
    document.getElementById('admin-pass').value = '';
    document.getElementById('admin-login-error').classList.add('hidden');
}

function closeAdminModal() {
    document.getElementById('modal-login-admin').classList.add('hidden');
}

async function handleAdminLogin(event) {
    event.preventDefault();
    const user = document.getElementById('admin-user').value;
    const pass = document.getElementById('admin-pass').value;

    try {
        const response = await fetch('api/login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ role: 'admin', username: user, password: pass })
        });
        const result = await response.json();

        if (response.ok && result.success) {
        currentRole = 'admin';
        closeAdminModal();
        document.getElementById('portal-gate').classList.add('hidden');
        document.getElementById('navbar-pelanggan').classList.add('hidden');
        document.getElementById('navbar-admin').classList.remove('hidden');
        document.getElementById('footer-pelanggan').classList.add('hidden');
        document.getElementById('footer-admin').classList.remove('hidden');
        document.getElementById('main-pelanggan-container').classList.add('hidden');
        document.getElementById('main-admin-container').classList.remove('hidden');
        navToAdminPage('finansial');
        } else {
            document.getElementById('admin-login-error').classList.remove('hidden');
        }
    } catch (error) {
        document.getElementById('admin-login-error').classList.remove('hidden');
    }
}
