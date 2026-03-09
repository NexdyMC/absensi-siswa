-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Feb 2026 pada 04.59
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
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int NOT NULL,
  `nis` int NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `status` enum('hadir','sakit','izin','alpa') NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `alasan` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `kelas`, `status`, `tanggal`, `waktu`, `alasan`) VALUES
(35, 5, '11-RPL-1', 'alpa', '2026-02-06', '12:52:29', ''),
(36, 7, '11-RPL-1', 'alpa', '2026-02-06', '12:52:53', ''),
(37, 3, '11-RPL-1', 'hadir', '2026-02-06', '12:53:30', ''),
(38, 1, '11-RPL-1', 'sakit', '2026-02-06', '12:53:44', ''),
(39, 6, '11-RPL-1', 'izin', '2026-02-06', '12:53:53', ''),
(40, 5, '11-RPL-1', 'hadir', '2026-02-05', '12:54:05', ''),
(41, 3, '11-RPL-1', 'hadir', '2026-02-04', '12:54:55', ''),
(42, 1, '11-RPL-1', 'sakit', '2026-02-03', '12:55:27', ''),
(43, 6, '11-RPL-1', 'hadir', '2026-02-01', '12:55:53', ''),
(44, 1, '11-RPL-1', 'alpa', '2026-02-01', '12:56:58', ''),
(45, 5, '11-RPL-1', 'alpa', '2026-02-02', '12:57:28', ''),
(46, 3, '11-RPL-1', 'alpa', '2026-02-03', '12:58:06', ''),
(47, 7, '11-RPL-1', 'alpa', '2026-02-04', '13:09:27', ''),
(48, 6, '11-RPL-1', 'alpa', '2026-02-04', '22:39:13', ''),
(49, 6, '11-RPL-1', 'izin', '2026-02-05', '22:44:01', ''),
(50, 5, '11-RPL-1', 'izin', '2026-02-01', '22:44:35', ''),
(51, 7, '11-RPL-1', 'hadir', '2026-02-01', '22:44:48', ''),
(52, 3, '11-RPL-1', 'izin', '2026-02-01', '22:45:18', ''),
(53, 5, '11-RPL-1', 'sakit', '2026-02-03', '22:54:53', 'mengalami gejala sakit pinggang \r\n'),
(54, 3, '11-RPL-1', 'sakit', '2026-02-08', '23:13:43', 'flu karena kedinginan pas melaksanakan pramuka pelantikan bantara\r\n\r\n'),
(55, 5, '11-RPL-1', 'hadir', '2026-02-09', '08:43:09', ''),
(56, 7, '11-RPL-1', 'hadir', '2026-02-09', '08:43:29', ''),
(57, 3, '11-RPL-1', 'hadir', '2026-02-09', '08:43:37', ''),
(58, 1, '11-RPL-1', 'hadir', '2026-02-09', '08:43:50', ''),
(59, 6, '11-RPL-1', 'hadir', '2026-02-09', '08:44:04', ''),
(60, 3, '11-RPL-1', 'izin', '2026-02-07', '08:51:13', 'ikutan panitia pelantikan bantara pada tanggal 7 - 8 feb '),
(64, 15, '11-RPL-1', 'alpa', '2026-02-10', '13:24:20', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
