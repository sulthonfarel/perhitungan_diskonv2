CREATE DATABASE db_diskonpamajid;
USE db_diskonpamajid;

CREATE TABLE transaksi(
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    harga INT NOT NULL,
    diskon INT NOT NULL,
    total_harga INT NOT NULL,
    tangal DATETIME DEFAULT CURRENT_TIMESTAMP
);