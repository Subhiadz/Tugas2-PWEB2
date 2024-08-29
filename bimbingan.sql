-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Agu 2024 pada 19.22
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbingan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guidance`
--

CREATE TABLE `guidance` (
  `id_guidance` int NOT NULL,
  `id_student` int DEFAULT NULL,
  `problem` text,
  `solution` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `guidance`
--

INSERT INTO `guidance` (`id_guidance`, `id_student`, `problem`, `solution`) VALUES
(1, 1, 'Judul kurang nyambung', 'Memperbaiki redaksi judul yang lebih berelasi'),
(2, 2, 'Terkendala di abstarak', 'Cari referensi di buka yang bersangkutan '),
(3, 3, 'Deadline terlewat', 'Menetapkan jadwal yang lebih realistis'),
(4, 4, 'Proyek tidak sesuai', 'Menyesuaikan proyek dengan pedoman yang ada'),
(5, 5, 'Kesulitan memahami materi', 'Melakukan diskusi tambahan dengan dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id_student` int NOT NULL,
  `id_class` int DEFAULT NULL,
  `student_number` char(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` text,
  `id_user` int DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id_student`, `id_class`, `student_number`, `name`, `phone_number`, `address`, `id_user`, `signature`) VALUES
(1, 1, '230202017', 'Muhamad Subhi Adzani', '08976353264', 'Jl. abiyasa No. 2', 1, 'acc'),
(2, 2, '230202019', 'Muhammad Bondan Rahardinata', '089653173152', 'Jl. Donan No.1', 2, 'acc'),
(3, 3, '230202020', 'Dewi Sartika', '0897654321', 'Jl. Raya No. 10', 3, 'acc'),
(4, 4, '230202021', 'Andi Setiawan', '0898765432', 'Jl. Merdeka 1', 4, 'acc'),
(5, 5, '230202022', 'Sari Wulandari', '0898877665', 'Jl. Kembang 3', 5, 'acc');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guidance`
--
ALTER TABLE `guidance`
  ADD PRIMARY KEY (`id_guidance`),
  ADD KEY `id_student` (`id_student`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_student`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guidance`
--
ALTER TABLE `guidance`
  MODIFY `id_guidance` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id_student` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guidance`
--
ALTER TABLE `guidance`
  ADD CONSTRAINT `guidance_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
