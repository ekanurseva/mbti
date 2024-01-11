-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2024 pada 17.04
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
-- Database: `mbti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ciri_mbti`
--

CREATE TABLE `ciri_mbti` (
  `id_ciri` int(11) NOT NULL,
  `id_tpmbti` int(11) NOT NULL,
  `ciri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(20) NOT NULL,
  `gejala` text NOT NULL,
  `id_kepribadian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran_mbti`
--

CREATE TABLE `saran_mbti` (
  `id_saran` int(11) NOT NULL,
  `id_tpmbti` int(11) NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_mbti`
--

CREATE TABLE `tipe_mbti` (
  `id_tpmbti` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama_mbti` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tp_kepribadia`
--

CREATE TABLE `tp_kepribadia` (
  `id_kepribadian` int(11) NOT NULL,
  `kode_kepribadian` varchar(20) NOT NULL,
  `kepribadian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`, `email`, `foto`) VALUES
(1, 'Admin 1', 'admin', '$2y$10$P8kpflwJHTXnNUYIUxjc8un5pw0.YyI1NJY67pdziv.4Vy5n3UrQa', 'administrator@gmail.com', '659f76af2f243.jpg'),
(2, 'Eka Nurseva Saniyah', 'ekans', '$2y$10$e9H4is/mDVjhdIlE/0BbGe3JEG8FZJ.K0yp8NLKY6IzVeCFpJCiya', 'ekanursevas@gmail.com', '659f77d5466cb.jpg'),
(4, 'Admin2', 'admin2', '$2y$10$jVfUu/Ob0cb/FwVtGFPb7OiJicCGe8MBHk7lN94ZVALGkvN.O5yDS', 'admin2@gmail.com', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ciri_mbti`
--
ALTER TABLE `ciri_mbti`
  ADD PRIMARY KEY (`id_ciri`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `saran_mbti`
--
ALTER TABLE `saran_mbti`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tipe_mbti`
--
ALTER TABLE `tipe_mbti`
  ADD PRIMARY KEY (`id_tpmbti`);

--
-- Indeks untuk tabel `tp_kepribadia`
--
ALTER TABLE `tp_kepribadia`
  ADD PRIMARY KEY (`id_kepribadian`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ciri_mbti`
--
ALTER TABLE `ciri_mbti`
  MODIFY `id_ciri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `saran_mbti`
--
ALTER TABLE `saran_mbti`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tipe_mbti`
--
ALTER TABLE `tipe_mbti`
  MODIFY `id_tpmbti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tp_kepribadia`
--
ALTER TABLE `tp_kepribadia`
  MODIFY `id_kepribadian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
