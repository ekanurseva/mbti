-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 14 Jan 2024 pada 11.00
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(20) NOT NULL,
  `gejala` text NOT NULL,
  `id_kepribadian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran_mbti`
--

CREATE TABLE `saran_mbti` (
  `id_saran` int(11) NOT NULL,
  `id_tpmbti` int(11) NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_mbti`
--

CREATE TABLE `tipe_mbti` (
  `id_tpmbti` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama_mbti` varchar(5) NOT NULL,
  `skala_1` int(11) NOT NULL,
  `skala_2` int(11) NOT NULL,
  `skala_3` int(11) NOT NULL,
  `skala_4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_mbti`
--

INSERT INTO `tipe_mbti` (`id_tpmbti`, `kode`, `nama_mbti`, `skala_1`, `skala_2`, `skala_3`, `skala_4`) VALUES
(1, 'T1', 'INFP', 1, 4, 5, 7),
(2, 'T2', 'ISFP', 1, 3, 5, 7),
(3, 'T3', 'INTP', 1, 4, 6, 7),
(4, 'T4', 'ISTP', 1, 3, 6, 7),
(5, 'T5', 'INFJ', 1, 4, 5, 8),
(6, 'T6', 'ISFJ', 1, 3, 5, 8),
(7, 'T7', 'INTJ', 1, 4, 6, 8),
(8, 'T8', 'ISTJ', 1, 3, 6, 8),
(9, 'T9', 'ESTJ', 2, 3, 6, 8),
(10, 'T10', 'ENTJ', 2, 4, 6, 8),
(11, 'T11', 'ESFJ', 2, 3, 5, 8),
(12, 'T12', 'ENFJ', 2, 4, 5, 8),
(13, 'T13', 'ESTP', 2, 3, 6, 7),
(14, 'T14', 'ENTP', 2, 4, 6, 7),
(15, 'T15', 'ESFP', 2, 3, 5, 7),
(16, 'T16', 'ENFP', 2, 4, 5, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tp_kepribadian`
--

CREATE TABLE `tp_kepribadian` (
  `id_kepribadian` int(11) NOT NULL,
  `kode_kepribadian` varchar(20) NOT NULL,
  `kepribadian` varchar(30) NOT NULL,
  `inisial` varchar(10) NOT NULL,
  `skala` int(5) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tp_kepribadian`
--

INSERT INTO `tp_kepribadian` (`id_kepribadian`, `kode_kepribadian`, `kepribadian`, `inisial`, `skala`, `deskripsi`) VALUES
(1, 'TK1', 'Introvert', 'I', 1, 'Introvert yaitu tipe pribadi yang suka dunia dalam diri sendiri. Seorang yang memiliki tipe pribadi introvert lebih suka menyendiri, merenung, membaca, menulis, dan tidak terlalu suka bergaul dengan banyak orang.'),
(2, 'TK2', 'Extrovert', 'E', 1, 'Extrovert yaitu tipe pribadi yang suka dunia luar. seorang yang memiliki tipe extrovert ini pandai bergaul, senang dengan interaksi sosial, dan beraktifitas dengan orang lain.'),
(3, 'TK3', 'Sensing', 'S', 2, 'Sensing yaitu tipe pribadi yang memproses data dengan cara bersandar pada fakta yang konkrit, praktis, realistis, dan melihat data apa adanya.'),
(4, 'TK4', 'Intuition', 'N', 2, 'Intuition yaitu tipe pribadi yang memproses data dengan melihat pola dan hubungan, pemikir abstrak, konseptual, serta melihat berbagai kemungkinan yang bisa terjadi.'),
(5, 'TK5', 'Feeling', 'F', 3, 'Feeling yaitu tipe pribadi yang melibatkan perasaan, empati serta nilai-nilai yang diyakini ketika hendak mengambil keputusan. Mereka berorientasi pada hubungan dan subjektif, serta akomodatif namun sering terkesan memihak.'),
(6, 'TK6', 'Thinking', 'T', 3, 'Thinking merupakan tipe pribadi yang selalu menggunakan logika dan kekuatan analisa untuk mengambil keputusan, terkesan kaku dan keras kepala, namun mereka yang memiliki tipe ini menerapkan prinsip dengan konsisten. '),
(7, 'TK7', 'Perceiving', 'P', 4, 'Perceiving adalah tipe orang yang fleksibel, spontan, adaptif, dan bertindak secara acak untuk melihat beragam peluang yang muncul. Seorang yang memiliki tipe ini tidak masalah jika terjadi perubahan yang mendadak.'),
(8, 'TK8', 'Judging', 'J', 4, 'Judging diartikan sebagai tipe orang yang selalu bertumpu pada rencana yang sistematis, serta senantiasa berpikir dan bertindak teratur. Mereka tidak suka hal-hal mendadak dan diluar perencanaan.');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`id_tpmbti`),
  ADD KEY `skala_1` (`skala_1`),
  ADD KEY `skala_2` (`skala_2`),
  ADD KEY `skala_3` (`skala_3`),
  ADD KEY `skala_4` (`skala_4`);

--
-- Indeks untuk tabel `tp_kepribadian`
--
ALTER TABLE `tp_kepribadian`
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
  MODIFY `id_tpmbti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tp_kepribadian`
--
ALTER TABLE `tp_kepribadian`
  MODIFY `id_kepribadian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tipe_mbti`
--
ALTER TABLE `tipe_mbti`
  ADD CONSTRAINT `tipe_mbti_ibfk_1` FOREIGN KEY (`skala_1`) REFERENCES `tp_kepribadian` (`id_kepribadian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipe_mbti_ibfk_2` FOREIGN KEY (`skala_2`) REFERENCES `tp_kepribadian` (`id_kepribadian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipe_mbti_ibfk_3` FOREIGN KEY (`skala_3`) REFERENCES `tp_kepribadian` (`id_kepribadian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipe_mbti_ibfk_4` FOREIGN KEY (`skala_4`) REFERENCES `tp_kepribadian` (`id_kepribadian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
