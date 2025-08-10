-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2025 pada 13.36
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `quantity`, `total`) VALUES
(1, 1, 1, 1, 15000000.00),
(2, 1, 2, 2, 500000.00),
(3, 2, 4, 1, 2000000.00),
(4, 2, 5, 1, 500000.00),
(5, 3, 8, 1, 7000000.00),
(6, 4, 3, 1, 750000.00),
(7, 4, 9, 2, 600000.00),
(8, 5, 7, 1, 8500000.00),
(9, 5, 10, 3, 450000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `nama_produk`, `harga`, `deskripsi`, `stok`) VALUES
(1, 'Laptop Gaming', 14000000.00, 'Laptop gaming high-end', 10),
(2, 'Mouse Wireless', 250000.00, 'Mouse tanpa kabel dengan koneksi USB receiver', 50),
(3, 'Keyboard Mechanical', 750000.00, 'Keyboard mechanical switch blue', 30),
(4, 'Monitor 24 Inch', 2000000.00, 'Monitor LED Full HD 24 inci', 15),
(5, 'Headset Gaming', 500000.00, 'Headset dengan mic noise cancelling', 25),
(6, 'Printer Inkjet', 1200000.00, 'Printer warna untuk dokumen dan foto', 20),
(7, 'Kamera DSLR', 8500000.00, 'Kamera DSLR profesional dengan lensa kit', 5),
(8, 'Smartphone 5G', 7000000.00, 'Ponsel 5G dengan layar AMOLED 120Hz', 40),
(9, 'Power Bank 20.000mAh', 300000.00, 'Power bank kapasitas besar dengan fast charging', 100),
(10, 'Flashdisk 64GB', 150000.00, 'Flashdisk USB 3.0 kecepatan tinggi', 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Budi Santoso', 'budi@example.com', 'password123'),
(2, 'Andi Wijaya', 'andi@example.com', 'password456'),
(3, 'Siti Nurhaliza', 'siti@example.com', 'password789'),
(4, 'Rudi Hartono', 'rudi@example.com', 'passwordabc'),
(5, 'Maya Putri', 'maya@example.com', 'passwordxyz');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO products (nama_produk, harga, deskripsi, stok) 
VALUES ('Laptop Gaming', 15000000, 'Laptop gaming high-end', 10);


SELECT * FROM products;


UPDATE products 
SET harga = 14000000
WHERE id = 1;


DELETE FROM products
WHERE id = 1;
