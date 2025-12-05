-- Tabel untuk menyimpan gambar-gambar statis website
CREATE TABLE IF NOT EXISTS pengaturan_gambar (
    id INT PRIMARY KEY AUTO_INCREMENT,
    kode VARCHAR(50) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    gambar VARCHAR(500) NOT NULL,
    kategori VARCHAR(50) DEFAULT 'umum',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert default images
INSERT INTO pengaturan_gambar (kode, nama, deskripsi, gambar, kategori) VALUES
('hero_bg', 'Background Hero Beranda', 'Gambar latar belakang utama di halaman beranda', 'https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=2070&auto=format&fit=crop', 'beranda'),
('why_choose_us', 'Gambar Kenapa Memilih Kami', 'Gambar di section Kenapa Memilih Kami', 'https://images.unsplash.com/photo-1537181534458-75f69493922c?q=80&w=1976&auto=format&fit=crop', 'beranda'),
('about_hero', 'Background Hero Tentang Kami', 'Gambar header halaman Tentang Kami', 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=2070&auto=format&fit=crop', 'tentang'),
('about_profile', 'Gambar Profil Perusahaan', 'Gambar di section profil perusahaan', 'https://images.unsplash.com/photo-1577046848358-4623c085f0ea?q=80&w=2070&auto=format&fit=crop', 'tentang'),
('about_ceo', 'Foto CEO/Direktur', 'Foto direktur utama', 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1974&auto=format&fit=crop', 'tentang'),
('paket_hero', 'Background Hero Paket', 'Gambar header halaman Paket Umroh', 'https://images.unsplash.com/photo-1596386461350-326ea7750f69?q=80&w=2070&auto=format&fit=crop', 'paket'),
('haji_hero', 'Background Hero Haji', 'Gambar di halaman Haji', 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=2070&auto=format&fit=crop', 'haji'),
('haji_content', 'Gambar Konten Haji', 'Gambar di section konten Haji', 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=2070&auto=format&fit=crop', 'haji');
