-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Jun 2023 pada 08.05
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
-- Database: `tubespw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `id` int NOT NULL,
  `judul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ekstrakulikuler`
--

INSERT INTO `ekstrakulikuler` (`id`, `judul`, `deskripsi`, `gambar`) VALUES
(9, 'Club Olahraga', 'Club olahraga mencakup berbagai cabang olahraga, seperti sepak bola, basket, voli, bulu tangkis, atau atletik. Siswa dapat berpartisipasi dalam latihan rutin, pertandingan antar sekolah, dan turnamen olahraga regional atau nasional.', 'olahraga.jpg'),
(21, 'Club Bahasa Asing', 'Club bahasa asing memberikan kesempatan kepada siswa untuk mempelajari bahasa asing tambahan di luar kurikulum reguler. Siswa dapat belajar dan mempraktikkan keterampilan berbicara, membaca, dan menulis dalam bahasa target melalui berbagai kegiatan dan permainan.', 'asing.jpg'),
(22, 'Club Jurnalistik', 'Club jurnalistik membantu siswa mengasah keterampilan menulis dan jurnalisme. Siswa dapat terlibat dalam kegiatan seperti menulis artikel untuk koran sekolah, menerbitkan majalah sekolah, atau membuat konten multimedia.', 'jurnalis.jpg'),
(23, 'Club Musik', 'Club musik memungkinkan siswa untuk mengeksplorasi minat dan bakat mereka dalam musik. Aktivitas klub musik dapat mencakup berbagai genre musik, seperti paduan suara, ansambel musik, atau band sekolah.', 'musik.jpg'),
(24, 'Club Seni Rupa', 'Club seni rupa memberikan kesempatan kepada siswa untuk mengeksplorasi kreativitas mereka melalui seni visual, seperti menggambar, melukis, dan membuat karya seni tiga dimensi. Siswa dapat belajar teknik seni, mengembangkan gaya pribadi, dan memamerkan karya seni mereka di pameran sekolah.', 'senirupa.jpg'),
(25, 'Club Sains dan Teknologi', 'Club sains dan teknologi mengajak siswa untuk menggali minat dan pengetahuan mereka dalam bidang ilmu pengetahuan dan teknologi. Aktivitas klub ini dapat meliputi eksperimen sains, robotika, pemrograman komputer, atau persiapan kompetisi ilmiah.', 'programmer-1653351_960_720.webp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `gambar`) VALUES
(8, 'gallery2.jpg'),
(9, 'gallery4.jpg'),
(11, 'gallery3.jpg'),
(14, 'robotic.jpg'),
(21, 'gallery5.jpg'),
(22, 'taman.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`) VALUES
(1, 'melindaa', 'melinda@gmail.com', '12345', 'admin'),
(2, 'melinda2', 'melinda2@gmail.com', '9876', 'user'),
(3, 'melinda', 'melinda@gmail.com', '1234', 'user'),
(4, 'jdsj', 'ghsghzxj@gmail.com', '567', 'user'),
(5, 'Mlind__', 'melin@gmail.com', '2345', 'user'),
(6, 'trsy', 'jagxj@gmail.com', '4567', 'user'),
(7, 'z', 'dzikrisee2002@gmail.com', 'z', 'user'),
(8, 'masjo', 'dzikrisee2002@gmail.com', 'z', 'user'),
(9, 'masjoo', 'marlianawatiazzahra@gmail.com', 'z', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
