-- 1. Önce eskiyi temizleyelim, sıfırdan kuralım (Reset)
DROP DATABASE IF EXISTS muzik_dukkani;
CREATE DATABASE muzik_dukkani;
USE muzik_dukkani;

-- 2. Kullanıcılar Masası (Artık Email ile giriş var)
CREATE TABLE kullanicilar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    sifre VARCHAR(50) NOT NULL,
    rol VARCHAR(20) NOT NULL -- 'bayi' (admin) veya 'musteri'
);

-- 3. Enstrümanlar Masası (Ürünler)
CREATE TABLE enstrumanlar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ad VARCHAR(100) NOT NULL,
    tur VARCHAR(50),
    fiyat DECIMAL(10, 2) NOT NULL,
    stok INT DEFAULT 0
);

-- 4. Siparişler Masası (Alışveriş Geçmişi)
CREATE TABLE siparisler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kullanici_id INT NOT NULL,
    urun_ad VARCHAR(100) NOT NULL,
    fiyat DECIMAL(10, 2) NOT NULL,
    tarih TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (kullanici_id) REFERENCES kullanicilar(id) ON DELETE CASCADE
);

-- 5. Sahneye Adamları Alalım (Sample Data)
-- Admin (Bayi) -> Email: admin@dukkan.com | Şifre: 123
-- Müşteri -> Email: musteri@gmail.com | Şifre: 123

INSERT INTO kullanicilar (email, sifre, rol) VALUES 
('admin@dukkan.com', '123', 'bayi'),
('musteri@gmail.com', '123', 'musteri');

-- 6. Dükkan Boş Kalmasın, Birkaç Gitar Atalım
INSERT INTO enstrumanlar (ad, tur, fiyat, stok) VALUES 
('Fender Stratocaster', 'Gitar', 25000.00, 5),
('Yamaha Kuyruklu Piyano', 'Piyano', 150000.00, 1),
('Pearl Bateri Seti', 'Bateri', 35000.00, 3);