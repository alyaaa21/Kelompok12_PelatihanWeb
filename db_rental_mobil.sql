
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `db_rental_mobil` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_rental_mobil`;


CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `mobil` (`id`, `nama_mobil`, `tipe`, `harga_sewa`, `gambar`) VALUES
(1, 'Toyota Avanza', 'MPV', 500000, 'avanza.jpg'),
(2, 'Honda CR-V', 'SUV', 750000, 'crv.jpg'),
(3, 'Suzuki Ertiga', 'MPV', 600000, 'ertiga.jpg'),
(4, 'Daihatsu Xenia', 'MPV', 550000, 'xenia.jpg'),
(5, 'Nissan Livina', 'MPV', 650000, 'livina.jpg'),
(6, 'Mitsubishi Xpander', 'MPV', 700000, 'xpander.jpg'),
(7, 'Toyota Fortuner', 'SUV', 1200000, 'fortuner.jpg'),
(8, 'Honda Jazz', 'Hatchback', 400000, 'jazz.jpg');


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin', 'admin@rental.com', 'admin123', 'admin', '2025-10-05 00:00:00');


ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

