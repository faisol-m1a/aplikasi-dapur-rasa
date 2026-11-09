// Shopping Cart Logic
let cart = [];

function toggleCartDrawer() {
    const drawer = document.getElementById('cart-drawer');
    const overlay = document.getElementById('cart-overlay');
    if (drawer.classList.contains('hidden')) {
        drawer.classList.remove('hidden');
        overlay.classList.remove('hidden');
    } else {
        drawer.classList.add('hidden');
        overlay.classList.add('hidden');
    }
}

function addToCart(menuId) {
    const menu = menuData.find(m => m.id === menuId);
    if (!menu) return;

    const existing = cart.find(item => item.id === menuId);
    if (existing) {
        existing.qty += 1;
    } else {
        cart.push({ ...menu, qty: 1 });
    }
    updateCartUI();
    toggleCartDrawer();
}

function updateCartQty(menuId, change) {
    const item = cart.find(i => i.id === menuId);
    if (item) {
        item.qty += change;
        if (item.qty <= 0) {
            cart = cart.filter(i => i.id !== menuId);
        }
    }
    updateCartUI();
}

function removeFromCart(menuId) {
    cart = cart.filter(i => i.id !== menuId);
    updateCartUI();
}

function updateCartUI() {
    const container = document.getElementById('cart-items-container');
    const badge = document.getElementById('cart-badge-count');
    const totalCalEl = document.getElementById('cart-total-calories');
    const totalPriceEl = document.getElementById('cart-total-price');

    const totalCount = cart.reduce((sum, item) => sum + item.qty, 0);
    const totalCalories = cart.reduce((sum, item) => sum + (item.calories * item.qty), 0);
    const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);

    if (badge) badge.innerText = totalCount;
    if (totalCalEl) totalCalEl.innerText = totalCalories.toLocaleString('id-ID') + " Kkal";
    if (totalPriceEl) totalPriceEl.innerText = "Rp " + totalPrice.toLocaleString('id-ID');

    if (!container) return;

    if (cart.length === 0) {
        container.innerHTML = `
            <div class="text-center py-12 text-gray-400">
                <span class="text-5xl block mb-3">🛒</span>
                <p class="font-medium">Keranjang belanja Anda kosong</p>
                <p class="text-xs text-gray-400 mt-1">Pilih menu khas Nusantara favorit Anda!</p>
            </div>
        `;
        return;
    }

    container.innerHTML = cart.map(item => `
        <div class="flex items-center justify-between bg-gray-50 p-3 rounded-xl border border-gray-200">
            <div class="flex items-center gap-3">
                <img src="${item.image}" class="w-14 h-14 rounded-lg object-cover" alt="${item.name}">
                <div>
                    <h4 class="font-bold text-gray-800 text-sm">${item.name}</h4>
                    <p class="text-xs text-red-600 font-semibold">Rp ${item.price.toLocaleString('id-ID')}</p>
                    <p class="text-[10px] text-gray-500">${item.calories * item.qty} Kkal</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button onclick="updateCartQty(${item.id}, -1)" class="w-7 h-7 rounded-lg bg-gray-200 hover:bg-red-100 hover:text-red-600 text-gray-700 font-bold flex items-center justify-center transition-all">-</button>
                <span class="text-sm font-bold w-4 text-center">${item.qty}</span>
                <button onclick="updateCartQty(${item.id}, 1)" class="w-7 h-7 rounded-lg bg-red-600 text-white font-bold flex items-center justify-center hover:bg-red-700 transition-all">+</button>
                <button onclick="removeFromCart(${item.id})" class="ml-2 text-gray-400 hover:text-red-600 text-sm">🗑️</button>
            </div>
        </div>
    `).join('');
}

async function checkoutOrder(event) {
    event.preventDefault();
    if (cart.length === 0) {
        alert("Keranjang belanja Anda masih kosong!");
        return;
    }

    const submitButton = document.getElementById('checkout-submit');
    const customer = document.getElementById('checkout-customer-name').value.trim();
    const type = document.getElementById('checkout-order-type').value;
    const paymentMethod = document.getElementById('checkout-payment-method').value;
    submitButton.disabled = true;
    submitButton.textContent = 'Mengirim pesanan...';

    try {
        const response = await fetch('api/orders.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                customer,
                type,
                payment_method: paymentMethod,
                items: cart.map(item => ({ id: item.id, qty: item.qty }))
            })
        });
        const result = await response.json();
        if (!response.ok || !result.success) {
            throw new Error(result.message || 'Pesanan tidak dapat dikirim.');
        }

        cart = [];
        updateCartUI();
        document.getElementById('form-checkout').reset();
        toggleCartDrawer();
        window.alert(`Pesanan ${result.data.id} berhasil dikirim dan sedang menunggu diproses admin.`);
    } catch (error) {
        window.alert(error.message || 'Pesanan tidak dapat dikirim.');
    } finally {
        submitButton.disabled = false;
        submitButton.innerHTML = '<span>Kirim Pesanan ke Admin</span>';
    }
}
