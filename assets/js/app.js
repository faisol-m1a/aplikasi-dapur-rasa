// Main App JS Router & Initialize
function navToPelangganPage(pageId) {
    const pages = ['beranda', 'katalog', 'tentang', 'kontak'];
    pages.forEach(p => {
        const view = document.getElementById(`view-pelanggan-${p}`);
        const btnDesktop = document.getElementById(`nav-pelanggan-${p}`);
        const btnMobile = document.getElementById(`nav-pelanggan-mobile-${p}`);

        if (view) view.classList.add('hidden');
        if (btnDesktop) {
            btnDesktop.classList.remove('text-red-600', 'font-bold', 'border-b-2', 'border-red-600');
            btnDesktop.classList.add('text-gray-700');
        }
        if (btnMobile) {
            btnMobile.classList.remove('bg-red-50', 'text-red-600', 'font-bold');
            btnMobile.classList.add('text-gray-700');
        }
    });

    const activeView = document.getElementById(`view-pelanggan-${pageId}`);
    const activeBtnDesktop = document.getElementById(`nav-pelanggan-${pageId}`);
    const activeBtnMobile = document.getElementById(`nav-pelanggan-mobile-${pageId}`);

    if (activeView) activeView.classList.remove('hidden');
    if (activeBtnDesktop) {
        activeBtnDesktop.classList.add('text-red-600', 'font-bold', 'border-b-2', 'border-red-600');
        activeBtnDesktop.classList.remove('text-gray-700');
    }
    if (activeBtnMobile) {
        activeBtnMobile.classList.add('bg-red-50', 'text-red-600', 'font-bold');
        activeBtnMobile.classList.remove('text-gray-700');
    }

    if (pageId === 'katalog') {
        renderKatalogMenu('semua');
    }
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function renderKatalogMenu(category = 'semua', searchQuery = '') {
    const container = document.getElementById('katalog-cards-container');
    if (!container) return;

    let filtered = menuData;

    if (category !== 'semua') {
        filtered = filtered.filter(m => m.category === category);
    }

    if (searchQuery.trim() !== '') {
        const q = searchQuery.toLowerCase();
        filtered = filtered.filter(m => m.name.toLowerCase().includes(q) || m.desc.toLowerCase().includes(q));
    }

    if (filtered.length === 0) {
        container.innerHTML = `
            <div class="col-span-full text-center py-12 text-gray-500">
                <span class="text-4xl block mb-2">🔍</span>
                <p class="font-medium text-lg">Menu tidak ditemukan</p>
                <p class="text-sm text-gray-400">Coba gunakan kata kunci atau kategori lain.</p>
            </div>
        `;
        return;
    }

    container.innerHTML = filtered.map(menu => `
        <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group">
            <div class="relative overflow-hidden h-48">
                <img src="${menu.image}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="${menu.name}">
                <span class="absolute top-3 right-3 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold text-gray-800 shadow-sm">
                    🔥 ${menu.calories} Kkal
                </span>
            </div>
            <div class="p-5 flex-1 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-bold text-lg text-gray-900 group-hover:text-red-600 transition-colors">${menu.name}</h3>
                    </div>
                    <p class="text-xs text-gray-600 leading-relaxed mb-4 line-clamp-2">${menu.desc}</p>
                </div>
                <div class="pt-3 border-t border-gray-100 flex items-center justify-between mt-auto">
                    <div>
                        <span class="text-[10px] text-gray-400 uppercase tracking-wider font-semibold">Harga</span>
                        <p class="text-lg font-extrabold text-red-600">Rp ${menu.price.toLocaleString('id-ID')}</p>
                    </div>
                    <button onclick="addToCart(${menu.id})" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-xs font-bold shadow-md hover:shadow-red-200 flex items-center gap-1.5 transition-all active:scale-95">
                        <span>+ Keranjang</span>
                    </button>
                </div>
            </div>
        </div>
    `).join('');
}

function filterKatalogCategory(category, element) {
    document.querySelectorAll('.katalog-tab-btn').forEach(btn => {
        btn.classList.remove('bg-red-600', 'text-white');
        btn.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
    });
    element.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200');
    element.classList.add('bg-red-600', 'text-white');

    const searchInput = document.getElementById('katalog-search-input');
    renderKatalogMenu(category, searchInput ? searchInput.value : '');
}

function searchKatalog() {
    const searchInput = document.getElementById('katalog-search-input');
    const activeTab = document.querySelector('.katalog-tab-btn.bg-red-600');
    let category = 'semua';
    if (activeTab && activeTab.dataset.category) {
        category = activeTab.dataset.category;
    }
    renderKatalogMenu(category, searchInput ? searchInput.value : '');
}

// Mobile Menu Toggle
function toggleMobileMenu(role) {
    const menu = document.getElementById(`mobile-menu-${role}`);
    if (menu) menu.classList.toggle('hidden');
}

// Initialize App
document.addEventListener('DOMContentLoaded', () => {
    updateCartUI();
});
