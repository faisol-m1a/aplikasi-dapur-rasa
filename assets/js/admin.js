// Admin Dashboard View Management & Actions
let transactionsList = [];

function navToAdminPage(pageId) {
    const adminViews = ['finansial', 'pengeluaran', 'input', 'catatan'];
    adminViews.forEach(v => {
        const el = document.getElementById(`view-admin-${v}`);
        const btnDesktop = document.getElementById(`nav-admin-${v}`);
        const btnMobile = document.getElementById(`nav-admin-mobile-${v}`);

        if (el) el.classList.add('hidden');
        if (btnDesktop) {
            btnDesktop.classList.remove('bg-red-600', 'text-white');
            btnDesktop.classList.add('text-gray-700', 'hover:bg-gray-100');
        }
        if (btnMobile) {
            btnMobile.classList.remove('bg-red-600', 'text-white');
            btnMobile.classList.add('text-gray-700');
        }
    });

    const activeEl = document.getElementById(`view-admin-${pageId}`);
    const activeBtn = document.getElementById(`nav-admin-${pageId}`);
    const activeBtnMobile = document.getElementById(`nav-admin-mobile-${pageId}`);

    if (activeEl) activeEl.classList.remove('hidden');
    if (activeBtn) {
        activeBtn.classList.add('bg-red-600', 'text-white');
        activeBtn.classList.remove('text-gray-700', 'hover:bg-gray-100');
    }
    if (activeBtnMobile) {
        activeBtnMobile.classList.add('bg-red-600', 'text-white');
        activeBtnMobile.classList.remove('text-gray-700');
    }

    if (pageId === 'catatan') {
        loadTransactions();
    }
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function renderTransactionsTable() {
    const tbody = document.getElementById('table-transactions-body');
    if (!tbody) return;

    tbody.replaceChildren();
    transactionsList.forEach(tx => {
        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-50 transition-colors';

        [
            [tx.id, 'px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900'],
            [tx.date, 'px-6 py-4 whitespace-nowrap text-sm text-gray-600'],
            [tx.customer, 'px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800'],
            [tx.type, 'px-6 py-4 whitespace-nowrap text-sm text-gray-600'],
            [tx.payment_method, 'px-6 py-4 whitespace-nowrap text-sm text-gray-600'],
            [tx.items.length ? tx.items.map(item => `${item.name} x${item.quantity}`).join(', ') : '-', 'px-6 py-4 min-w-56 text-sm text-gray-600'],
            [`Rp ${Number(tx.amount).toLocaleString('id-ID')}`, 'px-6 py-4 whitespace-nowrap text-sm font-bold text-red-600']
        ].forEach(([value, className]) => {
            const cell = document.createElement('td');
            cell.className = className;
            cell.textContent = value;
            row.appendChild(cell);
        });

        const statusCell = document.createElement('td');
        statusCell.className = 'px-6 py-4 whitespace-nowrap text-sm';
        const status = document.createElement('span');
        status.className = `px-3 py-1 rounded-full text-xs font-semibold ${tx.status === 'Menunggu' ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800'}`;
        status.textContent = tx.status;
        statusCell.appendChild(status);
        row.appendChild(statusCell);

        const actionCell = document.createElement('td');
        actionCell.className = 'px-6 py-4 whitespace-nowrap text-sm text-right';
        const deleteButton = document.createElement('button');
        deleteButton.className = 'text-red-500 hover:text-red-700 font-medium text-xs bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg transition-all';
        deleteButton.textContent = 'Hapus';
        deleteButton.addEventListener('click', () => deleteTransaction(tx.id));
        actionCell.appendChild(deleteButton);
        row.appendChild(actionCell);
        tbody.appendChild(row);
    });
}

async function requestTransactions(url = 'api/transactions.php', options = {}) {
    const response = await fetch(url, options);
    const result = await response.json();
    if (!response.ok || !result.success) {
        throw new Error(result.message || 'Permintaan transaksi gagal.');
    }
    return result;
}

async function loadTransactions() {
    try {
        const result = await requestTransactions();
        transactionsList = result.data;
        renderTransactionsTable();
    } catch (error) {
        console.error('Gagal memuat transaksi:', error);
        window.alert(error.message || 'Data transaksi tidak dapat dimuat.');
    }
}

async function handleAddTransaction(event) {
    event.preventDefault();
    const customer = document.getElementById('input-customer-name').value.trim();
    const type = document.getElementById('input-order-type').value;
    const amount = Number(document.getElementById('input-total-amount').value);

    try {
        await requestTransactions('api/transactions.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ customer, type, amount })
        });
        document.getElementById('form-add-transaction').reset();
        navToAdminPage('catatan');
    } catch (error) {
        console.error('Gagal menyimpan transaksi:', error);
        window.alert(error.message || 'Transaksi tidak dapat disimpan.');
    }
}

async function deleteTransaction(id) {
    if (!window.confirm('Apakah Anda yakin ingin menghapus transaksi ini?')) return;

    try {
        const result = await requestTransactions(
            `api/transactions.php?id=${encodeURIComponent(id)}`,
            { method: 'DELETE' }
        );
        transactionsList = result.data;
        renderTransactionsTable();
    } catch (error) {
        console.error('Gagal menghapus transaksi:', error);
        window.alert(error.message || 'Transaksi tidak dapat dihapus.');
    }
}
