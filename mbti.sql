-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Apr 2024 pada 05.12
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

--
-- Dumping data untuk tabel `ciri_mbti`
--

INSERT INTO `ciri_mbti` (`id_ciri`, `id_tpmbti`, `ciri`) VALUES
(1, 1, 'Serius, tenang, stabil &amp; damai.'),
(2, 1, 'Senang pada fakta, logis, obyektif, praktis &amp; realistis.'),
(3, 1, 'Task oriented, tekun, teratur, menepati janji, dapat diandalkan, &amp; bertanggung jawab.'),
(4, 1, 'Pendengar yang baik, setia, hanya mau berbagi dengan orang dekat.'),
(5, 1, 'Memegang aturan, standar, &amp; prosedur yang teguh.'),
(6, 2, 'Berpikiran simpel &amp; praktis, fleksibel, sensitif, ramah, tidak\r\nmenonjolkan diri, rendah hati pada kemampuannya.'),
(7, 2, 'Menghindari konflik, tidak memaksakan pendapat atau nilai-nilainya pada orang lain.'),
(8, 2, 'Biasanya tidak mau memimpin tetapi menjadi pengikut dan pelaksana yang setia.'),
(9, 2, 'Seringkali santai menyelesaikan sesuatu karena sangat menikmati apa yang terjadi saat ini.'),
(10, 2, 'Menunjukkan perhatian lebih banyak melalui tindakan dibandingkan kata-kata.'),
(11, 3, 'Sangat menghargai intelektualitas dan pengetahuan, menikmati hal-hal teoritis dan ilmiah, senang memecahkan masalah dengan logika dan analisa.'),
(12, 3, 'Diam dan menahan diri, lebih suka bekera sendiri.'),
(13, 3, 'Cenderung kritis, skeptis, mudah curiga dan pesimis.'),
(14, 3, 'Tidak suka memimpin dan bisa menjadi pengikut yang tidak banyak menuntut.'),
(15, 3, 'Cenderung memiliki minat yang jelas. Jika menemukan sesuatu yang menarik minatnya, ia akan sangat serius dan antusias menekuninya'),
(16, 4, 'Tenang, pendiam, cenderung kaku, dingin, hati-hati, penuh pertimbangan.'),
(17, 4, 'Logis, rasional, kritis, objektif, mampu mengesampingkan perasaan.'),
(18, 4, 'Mampu menghadapi perubahan mendadak dengan cepat dan tenang.'),
(19, 4, 'Percaya diri, tegas, dan mampu menghadapi perbedaan atau kritik.'),
(20, 4, 'Mampu menganalisa, mengorganisir, dan mendelegasikan.'),
(21, 4, 'Pemecah masalah yang baik, terutama untuk masalah teknis dan keadaan mendadak.'),
(22, 5, 'Pehatian, empati, sensitif dan berkomitmen terhadap sebuah hubungan.'),
(23, 5, 'Sukses karena ketekunan, dan keinginan kuat untuk melakukan apa saja yang diperlukan termasuk memberikan yang terbaik dalam pekerjaan.'),
(24, 5, 'Idealis, perfeksionis, memegang teguh pada prinsip.'),
(25, 5, 'Visioner, penuh ide, kreatif, suka merenung dan menginspirasi.'),
(26, 5, 'Biasanya diikuti dan dihormati karena kejelasan visi serta dedikasi pada hal-hal baik.'),
(27, 6, 'Penuh pertimbangan, teliti, dan akurat.'),
(28, 6, 'Serius, tenang, stabil tetapi sensitif.'),
(29, 6, 'Ramah, perhatian pada perasaan dan kebutuhan orang lain, setia, kooperatif, dan pendengar yang baik.'),
(30, 6, 'Sangat bertanggung jawab dan dapat diandalkan.'),
(31, 7, 'Visioner, memiliki perencanaan praktis dan biasanya memiliki ide-ide original dan dorongan kuat untuk mencapainya.'),
(32, 7, 'Mandiri dan percaya diri.'),
(33, 7, 'Memiliki kemampuan analisa yang baik serta dapat menyederhanakan sesuatu yang rumit menjadi sesuatu yang praktis, mudah dipahami, dan dipraktekan.'),
(34, 7, 'Logis, kritis, dan kadang keras kepala.'),
(35, 7, 'Memiliki keinginan untuk berkembang serta selalu ingin lebih maju dari orang lain.'),
(36, 8, 'Serius, tenang, stabil, dan damai.'),
(37, 8, 'Senang pada fakta, logis, objektif, dan realistis.'),
(38, 8, 'Tekun, teratur, menepati janji, dapat diandalkan dan bertanggung jawab.'),
(39, 8, 'Pendengar yang baik, setia, hanya mau berbagi dengan orang dekat.'),
(40, 8, 'Memegang aturan, standar dan prosedur dengan teguh.'),
(41, 9, 'Realistis, berpegang teguh pada fakta, dan praktis.'),
(42, 9, 'Sangat sistematis, prosedural, dan terencana.'),
(43, 9, 'Disiplin, tepat waktu, dan pekerja keras.'),
(44, 9, 'Cenderung kaku.'),
(45, 9, 'Tidak tertarik pada subjek yang tidak berguna baginya, tetapi dapat menyesuaikan diri jika diperlukan.'),
(46, 10, 'Tegas, jujur, terus terang, objektif, kritis, dan punya standar tinggi.'),
(47, 10, 'Dominan, mempunyai kemauan yang kuat, perfeksionis, dan kompetitif.'),
(48, 10, 'Tangguh, disiplin, dan sangat menghargai komitmen.'),
(49, 10, 'Cenderung menutupi perasaan dan menyembunyikan kelemahan.'),
(50, 10, 'Berkarisma dan mempunyai komunikasi yang baik.'),
(51, 10, 'Berbakat untuk menjadi pemimpin.'),
(52, 11, 'Hangat, banyak bicara, populer, dilahirkan untuk bekerjasama, suportif, dan anggota kelompok yang aktif.'),
(53, 11, 'Membutuhkan keseimbangan dan baik dalam menciptakan harmoni.'),
(54, 11, 'Santai, mudah bergaul, sederhana, tidak berfikir panjang.'),
(55, 11, 'Teliti, dan rajin merawat apa yang ia miliki.'),
(56, 12, 'Kreatif, imajinatif, peka, sensitif, loyal.'),
(57, 12, 'Cenderung melakukan sesuatu dengan memperhatikan perasaan orang lain.'),
(58, 12, 'Pandai bergaul, meyakinkan, ramah, menyenangkan, populer, simpatik.'),
(59, 12, 'Menyukai tantangan baru.'),
(60, 12, 'Butuh apresiasi dan penerimaan.'),
(61, 13, 'Spontan, aktif, enerjik, cekatan, antusias, dan menyenangkan.'),
(62, 13, 'Komunikator, ceplas-ceplos, berkarisma.'),
(63, 13, 'Mampu menghadapi masalah, konflik, dan kritik. Tidak khawatir, menikmati apapun yang terjadi.'),
(64, 13, 'Cenderung menyukai kegiatan bersama dan olahraga.'),
(65, 13, 'Mudah beradaptasi, toleran, dan tidak menyukai penjelasan yang terlalu panjang.'),
(66, 14, 'Gesit, kreatif, inovatif, cerdik, logis, baik dalam banyak hal.'),
(67, 14, 'Banyak bicara dan punya kemampuan debat yang baik.'),
(68, 14, 'Fleksibel, mempunyai banyak cara untuk memecahkan masalah dan tantangan.'),
(69, 14, 'Kurang konsisten.'),
(70, 14, 'Mempunyai keinginan kuat untuk mengembangkan diri.'),
(71, 15, 'Mudah berteman, bersahabat, ramah, hangat, dan menyenangkan.'),
(72, 15, 'Optimis, ceria, antusias, suka menjadi perhatian.'),
(73, 15, 'Menghindari konflik dan menjaga keharmonisan suatu hubungan.'),
(74, 16, 'Ramah, hangat, enerjik, optimis, antusias, menyenangkan.'),
(75, 16, 'Imajinatif, penuh dengan ide, kreatif, inovatif.'),
(76, 16, 'Mampu beradaptasi dengan beragam situasi dan perubahan.'),
(77, 16, 'Pandai berkomunikasi, senang bersosialisasi, dan membawa suasana positif.'),
(78, 16, 'Mudah membaca perasaan dan kebutuhan orang lain.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `id_kepribadian` int(11) NOT NULL,
  `kode_gejala` varchar(20) NOT NULL,
  `gejala` text NOT NULL,
  `nilai_pakar` double NOT NULL,
  `relasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `id_kepribadian`, `kode_gejala`, `gejala`, `nilai_pakar`, `relasi`) VALUES
(1, 1, 'G1', 'Mencari kesempatan untuk berkomunikasi secara perorangan', 0.7, 1),
(2, 1, 'G2', 'Lebih memilih tempat yang tenang dan pribadi untuk berkonsentrasi', 0.8, 2),
(3, 1, 'G3', 'Berinisiatif bila situasi memaksa atau berhubungan dengan kepentingan sendiri', 0.6, 3),
(4, 1, 'G4', 'Beraktivitas sendirian di rumah menyenangkan', 0.7, 4),
(5, 1, 'G5', 'Tertutup dan mandiri', 0.7, 5),
(6, 1, 'G6', 'Fokus pada sedikit hobi namun mendalam', 0.8, 6),
(7, 1, 'G7', 'Berorientasi pada dunia internal (memori, pemikiran, ide).', 0.7, 7),
(8, 1, 'G8', 'Menemukan dan mengembangkan ide dengan merenung', 0.6, 8),
(9, 2, 'G9', 'Mudah bergaul dengan siapa saja', 0.8, 1),
(10, 2, 'G10', 'Beraktivitas di rumah sendirian membosankan', 0.7, 2),
(11, 2, 'G11', 'Lebih suka berkomunikasi langsung (tatap muka)', 0.7, 3),
(12, 2, 'G12', 'Memilih berkomunikasi pada sekelompok orang', 0.6, 4),
(13, 2, 'G13', 'Sosial dan ekspresif', 0.7, 5),
(14, 2, 'G14', 'Berani bertindak tanpa terlalu lama berpikir', 0.7, 6),
(15, 2, 'G15', 'Berorientasi pada dunia eksternal (kegiatan, orang)', 0.7, 7),
(16, 2, 'G16', 'Menemukan dan mengembangkan ide dengan mendiskusikannya', 0.7, 8),
(17, 3, 'G17', 'Memilih cara yang sudah ada dan sudah terbukti', 0.8, 9),
(18, 3, 'G18', 'Tidak mudah menyimpulkan', 0.8, 10),
(19, 3, 'G19', 'Mengklarifikasi ide dan teori sebelum dipraktikkan', 0.7, 11),
(20, 3, 'G20', 'Menarik kesimpulan dengan lama dan hati-hati', 0.7, 12),
(21, 3, 'G21', 'Kontinuitas dan stabilitas lebih diutamakan', 0.7, 13),
(22, 3, 'G22', 'Memilih fakta lebih penting daripada ide inspiratif', 0.7, 14),
(23, 3, 'G23', 'SOP sangat membantu\r\n', 0.7, 15),
(24, 3, 'G24', 'Bergerak dari detail ke gambaran umum sebagai kesimpulan akhir', 0.7, 16),
(25, 4, 'G25', 'Perubahan dan variasi lebih diutamakan', 0.8, 9),
(26, 4, 'G26', 'Menarik kesimpulan dengan cepat sesuai naluri', 0.7, 10),
(27, 4, 'G27', 'Mengamati dan mengingat detail hanya bila berhubungan dengan pola', 0.7, 11),
(28, 4, 'G28', 'Senang berasumsi dan memberikan ide tentang suatu perkara', 0.7, 12),
(29, 4, 'G29', 'Bebas dan dinamis', 0.7, 13),
(30, 4, 'G30', 'Berbicara mengenai visi masa depan dan konsep-konsep mengenai visi tersebut', 0.7, 14),
(31, 4, 'G31', 'Berbicara mengenai visi masa depan dan konsep-konsep mengenai visi tersebutSOP sangat membosankan', 0.7, 15),
(32, 4, 'G32', 'Bergerak dari gambaran umum baru ke detail', 0.7, 16),
(33, 5, 'G33', 'Mementingkan nilai-nilai personal', 0.7, 17),
(34, 5, 'G34', 'Perasaan manusia lebih penting dari sekedar standar (benda mati)', 0.7, 18),
(35, 5, 'G35', 'Mudah tersentuh apabila ada teman yang kesusahan', 0.6, 19),
(36, 5, 'G36', 'Sering dianggap terlalu memihak', 0.7, 20),
(37, 5, 'G37', 'Berempati', 0.7, 21),
(38, 5, 'G38', 'Yang penting menjaga hubungan sosial/pertemanan', 0.7, 22),
(39, 5, 'G39', 'Berorientasi pada manusia dan hubungan\r\n', 0.7, 23),
(40, 5, 'G40', 'Subjektif\r\n', 0.7, 24),
(42, 6, 'G41', 'Menuntut perlakuan yang adil dan sama pada semua orang', 0.7, 17),
(43, 6, 'G42', 'Standar harus ditegakkan di atas segalanya (itu menunjukkan kehormatan dan harga diri)', 0.7, 18),
(44, 6, 'G43', 'Bersemangat saat mengkritik dan menemukan kesalahan', 0.7, 19),
(45, 6, 'G44', 'Sering dianggap keras kepala', 0.7, 20),
(46, 6, 'G45', 'Menghargai seseorang karena skill dan faktor teknis', 0.7, 21),
(47, 6, 'G46', 'Yang penting tujuan tercapai', 0.7, 22),
(48, 6, 'G47', 'Berorientasi pada tugas dan job description', 0.7, 23),
(49, 6, 'G48', 'Objektif', 0.7, 24),
(50, 7, 'G49', 'Menyukai hal baru, mudah berubah, dan cepat bosan', 0.6, 25),
(51, 7, 'G50', 'Daftar dan checklist adalah tugas dan beban', 0.7, 26),
(52, 7, 'G51', 'Hidup seharusnya mengalir sesuai kondisi', 0.7, 27),
(53, 7, 'G52', 'Bertindak sesuai situasi dan kondisi yang terjadi saat itu', 0.7, 28),
(54, 7, 'G53', 'Situasi last minute membuat bersemangat dan memunculkan potensi', 0.7, 29),
(55, 7, 'G54', 'Memperhatikan hal-hal baru dan siap menyesuaikan diri serta mengubah target', 0.7, 30),
(56, 7, 'G55', 'Aturan, jadwal, target sangat mengikat dan membebani', 0.7, 31),
(57, 7, 'G56', 'Spontan, fleksibel, tidak diikat waktu', 0.7, 32),
(58, 8, 'G57', 'Perubahan adalah musuh', 0.7, 25),
(59, 8, 'G58', 'Hidup harus sudah diatur dari awal', 0.7, 26),
(60, 8, 'G59', 'Berpegang teguh pada pendirian', 0.6, 27),
(61, 8, 'G60', 'Bertindak sesuai apa yang sudah direncanakan', 0.6, 28),
(62, 8, 'G61', 'Situasi last minute sangat menyiksa, membuat stres dan merupakan kesalahan', 0.7, 29),
(63, 8, 'G62', 'Fokus pada target dan mengabaikan hal-hal baru', 0.7, 30),
(64, 8, 'G63', 'Menjalani segala aktivitas dengan teratur', 0.6, 31),
(65, 8, 'G64', 'Aturan, jadwal, dan target akan sangat membantu dan memperjelas tindakan', 0.7, 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` int(11) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `tanggal_tes` timestamp NOT NULL DEFAULT current_timestamp(),
  `umur` int(5) NOT NULL,
  `introvert_cf` double NOT NULL,
  `introvert_bayes` double NOT NULL,
  `extrovert_cf` double NOT NULL,
  `extrovert_bayes` double NOT NULL,
  `sensing_cf` double NOT NULL,
  `sensing_bayes` double NOT NULL,
  `intuition_cf` double NOT NULL,
  `intuition_bayes` double NOT NULL,
  `feeling_cf` double NOT NULL,
  `feeling_bayes` double NOT NULL,
  `thinking_cf` double NOT NULL,
  `thinking_bayes` double NOT NULL,
  `perceiving_cf` double NOT NULL,
  `perceiving_bayes` double NOT NULL,
  `judging_cf` double NOT NULL,
  `judging_bayes` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `nama`, `nim`, `jk`, `angkatan`, `prodi`, `tanggal_tes`, `umur`, `introvert_cf`, `introvert_bayes`, `extrovert_cf`, `extrovert_bayes`, `sensing_cf`, `sensing_bayes`, `intuition_cf`, `intuition_bayes`, `feeling_cf`, `feeling_bayes`, `thinking_cf`, `thinking_bayes`, `perceiving_cf`, `perceiving_bayes`, `judging_cf`, `judging_bayes`) VALUES
(1, 'loli', 1297036, 'L', 20, 'Teknik Informatika', '2024-01-22 12:07:26', 22, 64.91, 23.8, 33.65, 23.21, 51.22, 22.73, 52.99, 24.71, 33.5, 20.13, 62.23, 24.88, 41.82, 22.45, 57.08, 24.21),
(2, 'kiko', 21313, 'L', 19, 'Teknik Industri', '2024-01-28 03:57:00', 23, 52.72, 22.54, 37.17, 23.18, 45.29, 23.75, 42.8, 24.04, 40.44, 22.14, 41.15, 22.4, 36.53, 22.91, 42.96, 24.81),
(3, 'Ali Asyidiqiansyah', 1092113, 'L', 25, 'Teknik Informatika', '2024-01-28 04:20:18', 13, 56.64, 26.23, 41.35, 19.8, 45.51, 23.75, 37.04, 25.7, 53.18, 24.85, 46.45, 23.28, 47.54, 25.86, 44, 20),
(4, 'uki', 238913, 'P', 20, 'Teknik Peternakan', '2024-01-28 04:23:04', 23, 33.12, 21.05, 41.59, 24.6, 39.15, 25.22, 34.55, 20.25, 61.61, 24.64, 32.85, 21.05, 41.7, 24.6, 52.18, 25.3),
(5, 'Rury', 173601, 'P', 19, 'Teknik Informatika', '2024-02-04 05:03:29', 20, 46.67, 23.97, 45.57, 21.14, 59.96, 21.87, 61.68, 23.02, 47.11, 22.12, 45.24, 23.04, 50.18, 24.37, 62.64, 24.88),
(6, 'lili', 1391, 'L', 92, 'Teknik Informatika', '2024-02-04 05:42:50', 20, 40.44, 25.42, 41.68, 24.8, 48.61, 25.33, 39.4, 22.87, 31.35, 20.83, 46.11, 23.25, 41.94, 22.45, 40.44, 22.14),
(7, 'koko', 389017, 'L', 19, 'Teknik Peternakan', '2024-02-07 05:38:34', 21, 53.55, 24.71, 64.99, 23.8, 58.74, 22.5, 60.64, 24.51, 56.75, 22.76, 55.94, 25.56, 60.36, 23.19, 66.58, 23.65),
(11, 'Percobaan 1', 13091, 'P', 2021, 'Teknik Informatika', '2024-02-27 13:48:08', 19, 96.03, 71.72, 96.39, 71.25, 98.96, 72.21, 93.69, 71.4, 97.69, 68.75, 93.7, 70, 96.23, 68.62, 94.59, 66.47),
(12, 'Percobaan 2', 12910, 'P', 2020, 'Teknik Industri', '2024-02-27 14:17:21', 20, 98.69, 73.17, 97.23, 71.25, 98.22, 72.36, 99.18, 70.94, 96.37, 68.62, 97.48, 70, 99.34, 68.95, 97.41, 67.78),
(13, 'Percobaan 3', 9121, 'L', 9, 'Teknik Peternakan', '2024-02-27 14:44:18', 20, 96.98, 69.69, 95.79, 70.67, 98.27, 71.73, 99.02, 70.98, 94.06, 68.45, 98.61, 70, 96.58, 68.62, 98.47, 68.32),
(14, 'Percobaan 4', 12391, 'P', 1999, 'Teknik Peternakan', '2024-02-27 15:02:39', 20, 93.03, 68.9, 93.12, 70.75, 95.08, 71.49, 96.5, 71.25, 97.24, 68.69, 97.48, 70, 97.69, 68.75, 95.95, 66.67),
(16, 'Percobaan 5', 1238961, 'L', 19, 'Teknik Industri', '2024-02-28 00:23:35', 21, 99.16, 68.95, 98.04, 73.05, 99.96, 71.74, 99.6, 72.31, 98.49, 68.47, 99.52, 70, 99.86, 69.16, 99.19, 67.13),
(27, 'Eka', 29074, 'L', 19, 'Teknik Informatika', '2024-03-24 15:36:40', 23, 99.89, 70.95, 99.46, 70.8, 99.91, 72.94, 99.31, 70.9, 99.15, 68.95, 99.29, 70, 99.86, 68.58, 99.56, 65.56),
(28, 'Eka Nurseva Saniyah', 190511012, 'P', 2019, 'Teknik Informatika', '2024-03-24 15:47:18', 23, 99.64, 69.57, 99.58, 70.22, 99.41, 73.64, 98.65, 71.03, 98.49, 68.81, 99.77, 70, 99.72, 68.43, 99.73, 66.68),
(29, 'Eka', 21931, 'Perempuan', 19, 'Teknik Informatika', '2024-03-24 16:01:39', 90, 99.28, 71.3, 98.71, 70.13, 96.82, 72.34, 95.17, 71.97, 98.85, 68.86, 96.5, 70, 98.89, 69.21, 97.56, 65.83),
(30, 'Gitar Yamaha', 12839891, 'Laki-Laki', 19, 'Teknik Informatika', '2024-03-25 01:24:06', 90, 96.46, 69.54, 98.76, 71.1, 98.45, 71.53, 97.8, 71.13, 99.56, 68.37, 96.67, 70, 98.97, 68.54, 99.71, 66.89),
(31, 'Eka Nurseva Saniyah', 1901293712, 'Perempuan', 19, 'Teknik Informatika', '2024-04-01 02:26:11', 80, 99.16, 71.72, 99.23, 70.11, 99.57, 72.22, 99.41, 72.41, 97.54, 69.13, 99.67, 70, 98.2, 69.17, 99.29, 65.57),
(32, 'Eka Nurseva Saniyah', 1901293712, 'Perempuan', 19, 'Teknik Informatika', '2024-04-01 02:27:09', 80, 99.16, 71.72, 99.23, 70.11, 99.57, 72.22, 99.41, 72.41, 97.54, 69.13, 99.67, 70, 98.2, 69.17, 99.29, 65.57),
(33, 'Eka Nurseva Saniyah', 1901293712, 'Perempuan', 19, 'Teknik Informatika', '2024-04-01 02:27:09', 80, 99.16, 71.72, 99.23, 70.11, 99.57, 72.22, 99.41, 72.41, 97.54, 69.13, 99.67, 70, 98.2, 69.17, 99.29, 65.57),
(34, 'Rury', 891702641, 'Perempuan', 2019, 'Teknik Informatika', '2024-04-01 02:30:51', 80, 98.37, 69.21, 99.52, 70, 99.49, 72.31, 99.43, 70.94, 98.6, 67.99, 99.63, 70, 99.29, 68.6, 98.68, 66.86),
(35, 'Rury', 891702641, 'Perempuan', 2019, 'Teknik Informatika', '2024-04-01 02:30:51', 80, 98.37, 69.21, 99.52, 70, 99.49, 72.31, 99.43, 70.94, 98.6, 67.99, 99.63, 70, 99.29, 68.6, 98.68, 66.86);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran_mbti`
--

CREATE TABLE `saran_mbti` (
  `id_saran` int(11) NOT NULL,
  `id_tpmbti` int(11) NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saran_mbti`
--

INSERT INTO `saran_mbti` (`id_saran`, `id_tpmbti`, `saran`) VALUES
(1, 1, 'Belajarlah memahami perasaan dan kebutuhan orang lain.'),
(2, 1, 'Kurangi keinginan untuk mengontrol orang lain atau memerintah mereka untuk menegakkan aturan.'),
(3, 1, 'Lihatlah lebih banyak sisi positif pada orang lain atau hal lainnya.'),
(4, 1, 'Terbukalah terhadap perubahan. '),
(5, 2, 'Jangan takut pada penolakan dan konflik. Anda tidak perlu menyenangkan semua orang.'),
(6, 2, 'Cobalah untuk mulai memikirkan dampak jangka panjang dari keputusan-keputusan kecil di hari ini.'),
(7, 2, 'Asah dan kembangkan sisi kreatifitas dan seni dalam diri anda sebagai modal bagus dalam diri anda.'),
(8, 2, 'Mencoba untuk lebih terbuka dan lebih mengekpresikan perasaan anda.'),
(9, 3, ' Belajar untuk membangun hubungan dengan orang lain, berempati, dan menjadi pendengar aktif, memberi perhatian serta bertukar pendapat.'),
(10, 3, 'Tenang, jangan terlalu banyak berfikir. Nikmati\r\nhidup ini tanpa harus bertanya mengapa dan bagaimana.'),
(11, 3, 'Cobalah untuk menemukan suatu ide, merencanakan dan mewujudkannya. Jangan terlalu sering berganti-ganti ide tetapi tidak satupun yang terwujud.'),
(12, 4, ' Observasi mengenai kehidupan sosial, seperti apa yang membuat orang marah, cinta, senang, termotivasi, dan terapkan pada hubungan anda.'),
(13, 4, 'Belajarlah untuk mengenali perasaan anda dan mengekspresikannya.'),
(14, 4, 'Jadilah orang yang lebih terbuka, keluar dari zona nyaman, eksplorasi ide baru, dan berdiskusi dengan orang lain.'),
(15, 4, 'Jangan mencari-cari kesalahan orang hanya untuk menyelesaikan masalahnya.'),
(16, 4, 'Jangan menyimpan informasi yang harusnya dibagi dan belajar untuk mempercayakan tanggungjawab pada orang lain.'),
(17, 5, 'Jangan hanya melihat ke sisi negatif dan resikonya, coba untuk melihat sisi positif dan peluangnya.'),
(18, 5, 'Sabar, jangan mudah marah dan menyalahkan orang lain.'),
(19, 5, 'Tenang dan jangan terus menerus berfikir atau menyelesaikan tanggungjawab.'),
(20, 6, 'Belajar untuk mengatakan “tidak”, jangan berusaha untuk menyenangkan semua orang.'),
(21, 6, 'Cobalah melakukan hal baru, jangan terjebak di zona nyaman dan melakukan rutinitas yang sama.'),
(22, 7, 'Belajarlah untuk mengungkapkan emosi dan perasaan anda.'),
(23, 7, 'Hindari perdebatan tidak penting.'),
(24, 7, 'Belajarlah untuk berempati, memberi perhatian dan lebih peka terhadap orang lain.'),
(25, 8, 'Belajar memahami perasaan dan kebutuhan orang lain.'),
(26, 8, 'Kurangi untuk mengontrol orang lain atau memerintah mereka untuk menegakan aturan.'),
(27, 8, 'Lihatlah lebih banyak sisi positif pada orang lain atau hal lainnya.'),
(28, 8, 'Terbukalah terhadap perubahan.'),
(29, 9, 'Kurangi keinginan untuk mengontrol dan memaksa orang lain.'),
(30, 9, 'Belajar untuk mengontrol emosi dan amarah anda.'),
(31, 9, 'Belajarlah untuk lebih sabar dan memahami orang lain.'),
(32, 9, 'Cobalah untuk intospeksi diri dan meluangkan waktu sejenak untuk merenung.'),
(33, 10, 'Belajarlah untuk tenang, tidak perlu perfeksionis dan selalu kompetitif dengan semua orang.'),
(34, 10, 'Ungkapkan perasaanmu. Menyatakan perasaan bukanlah suatu kelemahan.'),
(35, 10, 'Belajarlah untuk mengelola emosi anda.'),
(36, 10, 'Belajarlah untuk menghargai dan mengapresiasi orang lain.'),
(37, 10, 'Jangan terlalu arogan dan menganggap remeh orang lain.'),
(38, 11, 'Jangan mengorbankan diri hanya untuk menyenangkan orang lain.'),
(39, 11, 'Jangan mengukur harga dirimu dari perlakuan, penghargaan, dan pujian orang lain.'),
(40, 11, 'Belajarlah untuk lebih tegas.'),
(41, 11, 'Terima tanggungjawab hidup dan belajarlah untuk lebih dewasa. Jangan mengasihani diri sendiri.'),
(42, 11, 'Hadapi kritik dan konflik, jangan lari.'),
(43, 12, 'Jangan mengorbankan diri hanya untuk menyenangkan orang lain.'),
(44, 12, 'Jangan mengukur harga dirimu dari perlakuan orang lain. Jangan mudah kecewa jika mereka tidak seperti yang anda inginkan.'),
(45, 12, 'Belajar untuk tegas dan berani mengambil keputusan.'),
(46, 12, 'Jangan terlalu keras terhadap diri sendiri.'),
(47, 13, 'Belajar untuk lebih memahami perasaan dan pemikiran orang lain terutama ketika berbicara dengan mereka.'),
(48, 13, 'Belajarlah untuk sabar, lebih menikmati proses, tidak semua hal bisa dicapai dengan cepat.'),
(49, 13, 'Sesekali luangkan waktu untuk merenung dan merencanakan masa depan.'),
(50, 14, 'Belajar untuk lebih disiplin dan konsisten.'),
(51, 14, 'Hindari perdebatan tidak penting.'),
(52, 14, 'Belajarlah untuk sedikit waspada. Seimbangkan cara pandang anda agar tidak terlalu optimis dan mengambil resiko yang tidak realistis.'),
(53, 14, 'Belajar untuk memberi perhatian pada perasaan orang lain.'),
(54, 15, 'Jangan terburu-buru dalam mengambil keputusan.'),
(55, 15, 'Jangan menyenangkan semua orang.'),
(56, 15, 'Belajar untuk menghadapi kritik dan konflik.'),
(57, 15, 'Lebih berhati-hati karena tidak semua hal dapat diukur dengan materi (uang).'),
(58, 16, 'Belajar untuk fokus, disiplin, tegas, dan konsisten.'),
(59, 16, 'Belajar untuk menghadapi konflik dan kritik.'),
(60, 16, 'Pikirkan kebutuhan diri sendiri.'),
(61, 16, 'Jangan terlalu boros, belajarlah untuk mengelola keuangan sedikit demi sedikit.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_mbti`
--

CREATE TABLE `tipe_mbti` (
  `id_tpmbti` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama_mbti` varchar(5) NOT NULL,
  `skala_1` int(11) DEFAULT NULL,
  `skala_2` int(11) DEFAULT NULL,
  `skala_3` int(11) DEFAULT NULL,
  `skala_4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`, `email`, `foto`) VALUES
(8, 'Rury', 'rury', '$2y$10$7qjQQ6GBxNc49Mx4RGlsgOi4Ar4IaQwkxd255Mb45/Vcmce7Areda', 'ruryafrilcis99@gmail.com', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ciri_mbti`
--
ALTER TABLE `ciri_mbti`
  ADD PRIMARY KEY (`id_ciri`),
  ADD KEY `id_tpmbti` (`id_tpmbti`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`),
  ADD KEY `id_kepribadian` (`id_kepribadian`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `saran_mbti`
--
ALTER TABLE `saran_mbti`
  ADD PRIMARY KEY (`id_saran`),
  ADD KEY `id_tpmbti` (`id_tpmbti`);

--
-- Indeks untuk tabel `tipe_mbti`
--
ALTER TABLE `tipe_mbti`
  ADD PRIMARY KEY (`id_tpmbti`),
  ADD KEY `fk_mbti_1` (`skala_1`),
  ADD KEY `fk_mbti_2` (`skala_2`),
  ADD KEY `fk_mbti_3` (`skala_3`),
  ADD KEY `fk_mbti_4` (`skala_4`);

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
  MODIFY `id_ciri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `saran_mbti`
--
ALTER TABLE `saran_mbti`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `tipe_mbti`
--
ALTER TABLE `tipe_mbti`
  MODIFY `id_tpmbti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tp_kepribadian`
--
ALTER TABLE `tp_kepribadian`
  MODIFY `id_kepribadian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ciri_mbti`
--
ALTER TABLE `ciri_mbti`
  ADD CONSTRAINT `ciri_mbti_ibfk_1` FOREIGN KEY (`id_tpmbti`) REFERENCES `tipe_mbti` (`id_tpmbti`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD CONSTRAINT `gejala_ibfk_1` FOREIGN KEY (`id_kepribadian`) REFERENCES `tp_kepribadian` (`id_kepribadian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `saran_mbti`
--
ALTER TABLE `saran_mbti`
  ADD CONSTRAINT `saran_mbti_ibfk_1` FOREIGN KEY (`id_tpmbti`) REFERENCES `tipe_mbti` (`id_tpmbti`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tipe_mbti`
--
ALTER TABLE `tipe_mbti`
  ADD CONSTRAINT `fk_mbti_1` FOREIGN KEY (`skala_1`) REFERENCES `tp_kepribadian` (`id_kepribadian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mbti_2` FOREIGN KEY (`skala_2`) REFERENCES `tp_kepribadian` (`id_kepribadian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mbti_3` FOREIGN KEY (`skala_3`) REFERENCES `tp_kepribadian` (`id_kepribadian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mbti_4` FOREIGN KEY (`skala_4`) REFERENCES `tp_kepribadian` (`id_kepribadian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
