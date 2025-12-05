# TravelUmroh - Website Travel Umroh & Haji

## 📁 Struktur Folder

```
TravelUmroh/
│
├── 📄 index.php              # Homepage utama
├── 📄 paket.php              # Halaman paket umroh
├── 📄 haji.php               # Halaman haji
├── 📄 galeri.php             # Halaman galeri
├── 📄 testimoni.php          # Halaman testimoni
├── 📄 blog.php               # Halaman blog
├── 📄 kontak.php             # Halaman kontak
├── 📄 tentang-kami.php       # Halaman tentang kami
├── 📄 detail-paket.php       # Detail paket
├── 📄 detail-blog.php        # Detail artikel
├── 📄 landing.php            # SEO Landing page per kota
├── 📄 sitemap.php            # Auto-generate XML sitemap
├── 📄 .htaccess              # Apache rewrite rules
│
├── 📁 assets/                # Static assets
│   ├── css/
│   │   └── style.css         # Custom CSS styles
│   ├── js/                   # JavaScript files
│   └── images/               # Static images
│
├── 📁 config/                # Configuration files
│   ├── app.php               # App configuration
│   ├── koneksi.php           # Database connection & helpers
│   └── bootstrap.php         # Application bootstrap
│
├── 📁 core/                  # Core classes
│   ├── Database.php          # Database class (PDO)
│   ├── Security.php          # Security functions
│   └── ImageUploader.php     # Image upload handler
│
├── 📁 includes/              # PHP includes & templates
│   ├── header.php            # Header template (navbar, head)
│   ├── footer.php            # Footer template (scripts)
│   └── cities_data.php       # Database kota untuk SEO
│
├── 📁 components/            # Komponen reusable
│   └── chat-widget.php       # Widget chat WA
│
├── 📁 database/              # SQL files
│   ├── database.sql          # Schema database utama
│   └── database_gambar.sql   # Schema pengaturan gambar
│
├── 📁 admin/                 # Panel admin
│   ├── index.php             # Dashboard admin
│   ├── login.php             # Login admin
│   ├── logout.php            # Logout
│   ├── includes/             # Admin includes
│   │   ├── header.php
│   │   └── sidebar.php
│   ├── paket_umroh.php       # Kelola paket umroh
│   ├── paket_haji.php        # Kelola paket haji
│   ├── muthawif.php          # Kelola muthawif
│   ├── galeri.php            # Kelola galeri
│   ├── testimoni.php         # Kelola testimoni
│   ├── blog.php              # Kelola blog
│   ├── pengaturan_gambar.php # Pengaturan gambar website
│   ├── tambah_*.php          # Form tambah data
│   ├── edit_*.php            # Form edit data
│   └── hapus_*.php           # Hapus data
│
├── 📁 uploads/               # File uploads
│   ├── paket/                # Gambar paket
│   ├── galeri/               # Gambar galeri
│   ├── muthawif/             # Foto muthawif
│   ├── testimoni/            # Foto testimoni
│   ├── haji/                 # Gambar haji
│   └── website/              # Gambar website (hero, dll)
│
└── 📁 logs/                  # Log files
    └── .htaccess             # Deny access to logs
```

## 🔗 URL Structure

| URL Pattern | File Target |
|-------------|-------------|
| `/` | `index.php` |
| `/paket.php` | `paket.php` |
| `/travel-umrah-{city}` | `landing.php?city={city}` |
| `/sitemap.xml` | `sitemap.php` |

## 🚀 Quick Start

1. Import database:
   ```sql
   -- Import file dari folder database/
   source database/database.sql
   source database/database_gambar.sql
   ```

2. Konfigurasi database di `config/koneksi.php`

3. Akses website: `http://localhost/TravelUmroh/`

4. Akses admin: `http://localhost/TravelUmroh/admin/`

## 📝 Notes

### Programmatic SEO
- Landing pages per kota di-handle oleh `landing.php`
- Data kota tersimpan di `includes/cities_data.php`
- URL: `/travel-umrah-bandung`, `/travel-umrah-surabaya`, dll

### Gambar
- Upload gambar di folder `uploads/`
- Pengaturan gambar website via admin di `pengaturan_gambar.php`
- Fungsi `getGambar()` di `config/koneksi.php` untuk mengambil gambar

### Security
- Core security functions di `core/Security.php`
- PDO database wrapper di `core/Database.php`
- Image validation di `core/ImageUploader.php`
