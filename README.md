# 🍱 Dapur Rasa Nusantara - Web Application

Aplikasi web modern berbasis PHP, HTML5, Tailwind CSS, dan JavaScript murni (Vanilla JS) untuk "Dapur Rasa Nusantara" dengan pemisahan peran (*Role-Based Access*) terpisah rapat antara **Pelanggan** dan **Admin Warung**.

---

## 📁 Struktur Folder Project

```
dapur-rasa-nusantara/
├── config.php                     # Konfigurasi aplikasi & sesi PHP
├── index.php                      # File utama (Master SPA Layout)
├── README.md                      # Dokumentasi & panduan penggunaan
├── database/
│   └── schema.sql                 # Skema SQLite admin, transaksi, dan item pesanan
├── api/                           # Endpoint API PHP
│   ├── login.php                  # Endpoint validasi login admin
│   ├── logout.php                 # Endpoint logout / reset sesi
│   ├── orders.php                 # Endpoint checkout pelanggan
│   └── transactions.php           # Endpoint pengelolaan transaksi
├── assets/
│   ├── css/
│   │   └── style.css              # Custom styling, Tailwind setup & animasi
│   └── js/
│       ├── app.js                 # Router utama SPA pelanggan
│       ├── auth.js                # Pengelolaan peran & modal verifikasi
│       ├── cart.js                # Kalkulator kalori & checkout pesanan
│       ├── admin.js               # Router halaman terpisah Admin & aksi tabel
│       └── data.js                # Data 24 menu Nusantara
├── includes/
│   ├── footer.php                 # Footer dinamis (Pelanggan vs Admin)
│   ├── header.php                 # Header Navbar dinamis terpisah
│   ├── modal-login.php            # Modal pop-up login admin (tanpa petunjuk teks)
│   └── portal.php                 # Layar Gerbang Portal Utama
└── pages/
    ├── admin/                     # Halaman Terpisah Admin
    │   ├── catatan-transaksi.php  # View: Tabel catatan transaksi harian
    │   ├── finansial.php          # View: Ringkasan finansial & omzet
    │   ├── header-admin.php       # Header khusus admin (spasi luas)
    │   ├── input-transaksi.php    # View: Form transaksi kasir baru
    │   └── pengeluaran.php        # View: Analisis biaya bahan baku
    └── pelanggan/                 # Halaman Terpisah Pelanggan
        ├── beranda.php            # View: Hero banner, chef picks, promo
        ├── katalog.php            # View: 24 menu, filter tab, pencarian
        ├── kontak.php             # View: Form reservasi & lokasi
        └── tentang.php            # View: Statistik, 4 keunggulan
```

---

## 🔑 Validasi Admin dan Pelanggan
- **Admin** wajib mengisi nama pengguna dan kata sandi. Server memverifikasi kredensial terhadap hash di tabel `admins`; endpoint transaksi hanya menerima sesi admin.
- **Pelanggan** masuk sebagai pengunjung tanpa akun untuk melihat katalog dan menggunakan keranjang. Sesi pelanggan tidak memberi akses ke dasbor maupun data transaksi admin.
- Checkout pelanggan memverifikasi menu dan harga di server, lalu menyimpan pesanan berstatus **Menunggu** dengan metode pembayaran **Tunai** atau **Transfer**. Admin dapat melihat nama, jenis, metode pembayaran, detail menu, jumlah, dan total pesanan pada Catatan Transaksi.
- Database SQLite dibuat otomatis saat login pertama dan disimpan di luar folder web. Skemanya ada di `database/schema.sql`.
- Kredensial admin awal untuk kompatibilitas instalasi lama: username `admin`, kata sandi `12345678f`. Atur `DRN_ADMIN_USERNAME` dan `DRN_ADMIN_PASSWORD` sebelum database dibuat untuk mengganti kredensial awal. Kata sandi disimpan sebagai hash.
- Lokasi database dapat diatur dengan `DRN_DB_PATH`. Mengubah kredensial lingkungan setelah akun pertama dibuat tidak otomatis mengganti akun di database.

---

## 🚀 Cara Menjalankan Project

### Cara 1: Menggunakan PHP Built-in Server (Tercepat)
1. Ekstrak file `.zip` ke folder pilihan Anda.
2. Buka Terminal / Command Prompt di dalam folder `dapur-rasa-nusantara`.
3. Jalankan perintah:
   ```bash
   php -S localhost:8000
   ```
4. Buka browser dan kunjungi: `http://localhost:8000`

### Cara 2: Menggunakan XAMPP / Laragon / WampServer
1. Ekstrak folder `dapur-rasa-nusantara` ke dalam direktori `htdocs` (XAMPP) atau `www` (Laragon).
2. Nyalakan Service Apache pada kontrol panel XAMPP / Laragon.
3. Buka browser dan akses: `http://localhost/dapur-rasa-nusantara`
4. Pastikan ekstensi PDO SQLite PHP aktif. Database akan dibuat otomatis di folder instalasi XAMPP saat aplikasi pertama kali memvalidasi admin.

---

## 🎯 Fitur Utama Aplikasi
1. **Pemisahan Navigasi Peran Total**:
   - Mode Pelanggan hanya menampilkan: *Beranda*, *Menu & Harga*, *Tentang Kami*, *Kontak*, dan *Keranjang 🛒*.
   - Mode Admin hanya menampilkan: *Ringkasan Finansial*, *Pengeluaran Bahan*, *Input Transaksi*, dan *Catatan Transaksi*.
2. **Katalog 24 Menu Nusantara**: Lengkap dengan foto, deskripsi, estimasi kalori (Kkal), harga (Rp), serta filter tab kategori dan pencarian *real-time*.
3. **Checkout Pesanan Pelanggan**: Keranjang mengirim nama pemesan, jenis pesanan, dan item menu ke admin; harga dihitung ulang di server dan pesanan tercatat dengan status Menunggu.
4. **Header Admin Rapi & Bebas Menempel**: Judul `Pengelolaan Warung Internal` dirancang dengan padding dan margin yang luas sehingga terbebas dari garis batas layar.
5. **Database SQLite**: Data transaksi admin tersimpan persisten dan validasi akses dijalankan di server berdasarkan peran sesi.
