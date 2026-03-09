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
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nis` int NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `mata_pelajaran` varchar(120) NOT NULL,
  `hobi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','tidak_ingin_diketahui') NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nis`, `nama_guru`, `mata_pelajaran`, `hobi`, `tanggal_lahir`, `jenis_kelamin`, `email`, `no_telepon`, `password`) VALUES
(1, 'Hani', 'Basis Data', 'ngoding data', '12-02-2005', 'perempuan', 'buhanidatabae@gmail.com', '821256897', 'nnhhnnhh'),
(2, 'Bu astri', 'PBTGM', 'ngoding', '2006-februari-26', 'perempuan', NULL, '082125689760', '$2y$10$wO0NPdtl1eNyh7h7I60QJet6OtKxqPf/mMtbRwUPAQLBzbJbP/r6a'),
(3, 'Bu astri', 'PBTGM', 'ngoding', '2006-februari-26', 'perempuan', NULL, '082125689760', '$2y$10$wiCXdmhaGAY7b0i0cXmP3OVFtBIcgaxha9gAVui5HNys6iImE.P7e'),
(4, 'Bu astri', 'PBTGM', 'ngoding', '2006-februari-26', 'perempuan', NULL, '082125689760', '$2y$10$GVvuw3y5/nBbOeDzsA1tOOxPAA9g6ScsihVKuJ/4lMaqSQc.HLnM6'),
(5, 'Bu astri', 'PBTGM', 'ngoding', '2006-februari-26', 'perempuan', NULL, '082125689760', '$2y$10$GjR8DlvCZ32NnV.wKuj/DOs2JXk3BnkclCDOQD5fwCA1jWOsjnUBG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `guru` varchar(100) NOT NULL,
  `waktu` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `nama_pelajaran`, `hari`, `guru`, `waktu`) VALUES
(2, 'math', 'senin', 'Rita', '12:00-15:00'),
(3, 'Data Base', 'selasa', 'Hani', '09:00-15:00'),
(4, 'B.Inggris', 'jumat', 'Cintia', '07:00-09:00'),
(5, 'PJOK', 'senin', 'Pa Yusep', '07:15-08:45'),
(6, 'PBTGM', 'senin', 'Bu Astri', '08:45-12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `hobi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `hari` int NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int NOT NULL,
  `gender` enum('laki-laki','perempuan','tidak_ingin_diketahui') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `kelas`, `hobi`, `hari`, `bulan`, `tahun`, `gender`, `alamat`, `email`, `password`) VALUES
(1, 'Nexdy Experimen', '11 RPL 1', NULL, 12, 'januari', 2002, 'perempuan', 'jepang', 'febripratama1786@gmail.com', 'nxy222'),
(3, 'Febri Pratama', '11 RPL 1', 'coding, rubik, catur, nonton anime, menggambar, desain, ngomong sendiri, utak atik dari barang elektronik maupun sistem, main game, membuat benda, searching lebih dalam, dll ', 25, 'februari', 2008, 'laki-laki', 'link. Lio rt 06 rw 06', 'febripratama1786@gmail.com', 'fff'),
(5, 'Aditya Anugrah', '11 RPL 1', 'coding, baca buku', 1, 'mei', 2007, 'laki-laki', 'cipada', 'adityaanugrah@gmail.com', 'aaaa'),
(6, 'Sri.Sukma Nurrohman', '11 RPL 1', 'menggambar, coding', 20, 'april', 2007, 'perempuan', 'pandai', 'srisukmanurrohman@gmail.com', 'srisukma'),
(7, 'Agustina Sumyati', '11 RPL 1', 'nonton', 26, 'agustus', 2008, 'perempuan', 'china', 'agustinasumyati@gmail.com', 'agustina'),
(15, 'Syarif', '11-RPL-1', 'catur', 26, 'maret', 2008, 'tidak_ingin_diketahui', 'panday', 'syarifkuy@gmail.com', 'syarif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `nis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
