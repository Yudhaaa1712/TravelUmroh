# TravelUmroh - Struktur Folder Website

## 📁 Root Directory (/)
```
TravelUmroh/
│
├── 📄 index.php              # Homepage utama
├── 📄 header.php             # Header template (navbar, head)
├── 📄 footer.php             # Footer template (scripts)
├── 📄 koneksi.php            # Database connection & helper functions
├── 📄 sitemap.php            # Auto-generate XML sitemap
├── 📄 style.css              # Custom CSS styles
├── 📄 .htaccess              # Apache rewrite rules
│
├── 📁 pages/                 # Halaman-halaman website
│   ├── paket.php             # Halaman paket umrah
│   ├── haji.php              # Halaman haji
│   ├── galeri.php            # Halaman galeri
│   ├── testimoni.php         # Halaman testimoni
│   ├── blog.php              # Halaman blog
│   ├── kontak.php            # Halaman kontak
│   ├── tentang-kami.php      # Halaman tentang kami
│   ├── detail-paket.php      # Detail paket
│   ├── detail-blog.php       # Detail artikel
│   └── landing.php           # SEO Landing page per kota
│
├── 📁 includes/              # PHP includes & helpers
│   └── cities_data.php       # Database kota untuk SEO
│
├── 📁 components/            # Komponen reusable
│   └── chat-widget.php       # Widget chat WA
│
├── 📁 admin/                 # Panel admin
│   ├── index.php             # Dashboard admin
│   ├── login.php             # Login admin
│   ├── logout.php            # Logout
│   ├── includes/             # Admin includes
│   │   ├── header.php
│   │   └── sidebar.php
│   ├── paket_umroh.php       # Kelola paket umrah
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
│   ├── blog/                 # Gambar artikel
│   └── website/              # Gambar website (hero, dll)
│
└── 📁 sql/                   # Database SQL files
    ├── database.sql          # Schema database utama
    └── database_gambar.sql   # Schema pengaturan gambar
```

## 🔗 URL Structure (Clean URLs via .htaccess)

| URL Pattern | File Target |
|-------------|-------------|
| `/` | `index.php` |
| `/paket.php` | `paket.php` |
| `/travel-umrah-{city}` | `landing.php?city={city}` |
| `/sitemap.xml` | `sitemap.php` |

## 📝 Notes

### Programmatic SEO
- Landing pages per kota di-handle oleh `landing.php`
- Data kota tersimpan di `includes/cities_data.php`
- URL: `/travel-umrah-bandung`, `/travel-umrah-surabaya`, dll

### Gambar
- Upload gambar di folder `uploads/`
- Pengaturan gambar website via admin di `pengaturan_gambar.php`
- Fungsi `getGambar()` di `koneksi.php` untuk mengambil gambar

### Database
- Import `sql/database.sql` terlebih dahulu
- Import `sql/database_gambar.sql` untuk tabel pengaturan gambar
