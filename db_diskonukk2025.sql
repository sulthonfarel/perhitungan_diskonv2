CREATE DATABASE db_diskonukk2025;
USE db_diskonukk2025;

CREATE TABLE transaksi(
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    diskon INT NOT NULL,
    total_harga INT NOT NULL,
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP
);