-- Database: travel_umroh

CREATE DATABASE IF NOT EXISTS travel_umroh;
USE travel_umroh;

-- Table Admin
CREATE TABLE IF NOT EXISTS admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default Admin (password: admin123)
INSERT INTO admins (username, password) VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Table Paket Umroh
CREATE TABLE IF NOT EXISTS paket_umroh (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_paket VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    harga DECIMAL(15, 2) NOT NULL,
    durasi VARCHAR(50),
    pesawat VARCHAR(100),
    hotel_makkah VARCHAR(100),
    hotel_madinah VARCHAR(100),
    keberangkatan DATE,
    gambar VARCHAR(255),
    is_featured BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table Paket Haji
CREATE TABLE IF NOT EXISTS paket_haji (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_paket VARCHAR(100) NOT NULL,
    tipe_haji ENUM('Plus', 'Furoda') NOT NULL,
    deskripsi TEXT,
    harga_usd DECIMAL(15, 2) NOT NULL,
    estimasi_keberangkatan VARCHAR(100),
    hotel_makkah VARCHAR(100),
    hotel_madinah VARCHAR(100),
    pesawat VARCHAR(100),
    gambar VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table Muthawif
CREATE TABLE IF NOT EXISTS muthawif (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    peran VARCHAR(100),
    deskripsi TEXT,
    gambar VARCHAR(255),
    instagram VARCHAR(100),
    facebook VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table Testimoni
CREATE TABLE IF NOT EXISTS testimoni (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_jamaah VARCHAR(100) NOT NULL,
    paket_diambil VARCHAR(100),
    isi_testimoni TEXT NOT NULL,
    rating INT DEFAULT 5,
    gambar VARCHAR(255),
    is_featured BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table Galeri
CREATE TABLE IF NOT EXISTS galeri (
    id INT PRIMARY KEY AUTO_INCREMENT,
    judul VARCHAR(100),
    kategori VARCHAR(50),
    gambar VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
