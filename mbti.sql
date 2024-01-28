-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2024 pada 05.34
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
  `nilai_pakar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `id_kepribadian`, `kode_gejala`, `gejala`, `nilai_pakar`) VALUES
(1, 1, 'G1', 'Tidak terlalu suka bergaul dengan banyak orang', 0.15),
(2, 1, 'G2', 'Lebih memilih berkomunikasi dengan menulis ', 0.2),
(3, 1, 'G3', 'Senang sendiri dan merenung atau berkontemplasi', 0.35),
(4, 1, 'G4', 'Lebih suka pada tugas pengolahan data secara internal', 0.1),
(5, 1, 'G5', 'Bersemangat pada pekerjaan yang menuntut konsentrasi, fokus, dan dilakukan sendiri', 0.2),
(6, 2, 'G6', 'Suka berinteraksi dengan orang lain', 0.15),
(7, 2, 'G7', 'Lebih memilih berkomunikasi dengan berbicara', 0.2),
(8, 2, 'G8', 'Senang bergaul dan memiliki banyak teman', 0.35),
(9, 2, 'G9', 'Lebih suka pada tugas operasional diluar', 0.1),
(10, 2, 'G10', 'Bersemangat pada pekerjaan yang melayani orang lain dan dilakukan bersama-sama', 0.2),
(11, 3, 'G11', 'Memproses data bersandar pada fakta yang konkrit dan praktis', 0.15),
(12, 3, 'G12', 'Menggunakan pengalaman sebagai pedoman', 0.2),
(13, 3, 'G13', 'Memahami informasi dengan melihat secara realistis dan apa adanya', 0.35),
(14, 3, 'G14', 'Memilih cara-cara yang sudah terbukti dalam memproses data', 0.1),
(15, 3, 'G15', 'Fokus pada masa kini, melihat apa yang bisa diperbaiki sekarang', 0.2),
(16, 4, 'G16', 'Memproses data bersandar pada konsep dan kemungkinan yang bisa terjadi', 0.15),
(17, 4, 'G17', 'Menggunakan imajinasi dan perenungan sebagai pedoman', 0.2),
(18, 4, 'G18', 'Memahami informasi dengan melihat pola dan hubungan', 0.35),
(19, 4, 'G19', 'Memilih cara-cara yang unik dalam memproses data', 0.1),
(20, 4, 'G20', 'Fokus pada masa depan, melihat apa yang mungkin dicapai dimasa mendatang', 0.2),
(21, 5, 'G21', 'Menghargai seseorang karena sifat dan perilakunya', 0.15),
(22, 5, 'G22', 'Mengambil keputusan menggunakan perasaan dan nilai-nilai yang diyakini', 0.2),
(23, 5, 'G23', 'Terkesan akomodatif (dapat menyesuaikan diri) tapi memihak', 0.35),
(24, 5, 'G24', 'Menerapkan hubungan dengan harmoni dan empatik', 0.1),
(25, 5, 'G25', 'Bagus dalam menjaga keharmonisan dan memelihara hubungan', 0.2),
(26, 6, 'G26', 'Menghargai seseorang karena skill (keahlian) dan faktor teknis', 0.15),
(27, 6, 'G27', 'Mengambil keputusan menggunakan logika dan kekuatan analisa', 0.2),
(28, 6, 'G28', 'Terkesan kaku dan keras kepala', 0.35),
(29, 6, 'G29', 'Menerapkan hubungan berdasarkan prinsip dengan konsisten', 0.1),
(30, 6, 'G30', 'Bagus dalam melakukan analisa dan menjaga prosedur atau standar', 0.2),
(31, 7, 'G31', 'Bertindak sesuai situasi dan kondisi yang terjadi saat itu', 0.15),
(32, 7, 'G32', 'Berpikir lebih fleksibel dan spontan', 0.2),
(33, 7, 'G33', 'Bekerja acak dan berdasarkan peluang yang muncul', 0.35),
(34, 7, 'G34', 'Siap menghadapi perubahan dan situasi yang mendadak', 0.1),
(35, 7, 'G35', 'Hidup dalam ketidakpastian dan siap menghadapi perubahan', 0.2),
(36, 8, 'G36', 'Bertindak sesuai dengan apa yang sudah direncanakan', 0.15),
(37, 8, 'G37', 'Berpikir lebih sistematis dan sesuai prosedur', 0.2),
(38, 8, 'G38', 'Bekerja sesuai jadwal dan tahapan yang sudah dibuat', 0.35),
(39, 8, 'G39', 'Tidak siap menghadapi pekerjaan yang tidak sesuai dengan rencana yang telah dibuat', 0.1),
(40, 8, 'G40', 'Hidup dalam keteraturan, dan tidak siap menghadapi perubahan', 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
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

INSERT INTO `hasil` (`id_hasil`, `nama`, `tanggal_tes`, `umur`, `introvert_cf`, `introvert_bayes`, `extrovert_cf`, `extrovert_bayes`, `sensing_cf`, `sensing_bayes`, `intuition_cf`, `intuition_bayes`, `feeling_cf`, `feeling_bayes`, `thinking_cf`, `thinking_bayes`, `perceiving_cf`, `perceiving_bayes`, `judging_cf`, `judging_bayes`) VALUES
(1, 'Fillah Zaki Alhaqi', '2024-01-22 12:07:26', 22, 64.91, 23.8, 33.65, 23.21, 51.22, 22.73, 52.99, 24.71, 33.5, 20.13, 62.23, 24.88, 41.82, 22.45, 57.08, 24.21),
(2, 'Eka Nurseva', '2024-01-28 03:57:00', 23, 52.72, 22.54, 37.17, 23.18, 45.29, 23.75, 42.8, 24.04, 40.44, 22.14, 41.15, 22.4, 36.53, 22.91, 42.96, 24.81),
(3, 'Ali Asyidiqiansyah', '2024-01-28 04:20:18', 13, 56.64, 26.23, 41.35, 19.8, 45.51, 23.75, 37.04, 25.7, 53.18, 24.85, 46.45, 23.28, 47.54, 25.86, 44, 20),
(4, 'Eka Nurseva Saniyah', '2024-01-28 04:23:04', 23, 33.12, 21.05, 41.59, 24.6, 39.15, 25.22, 34.55, 20.25, 61.61, 24.64, 32.85, 21.05, 41.7, 24.6, 52.18, 25.3);

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
(1, 'Admin 1', 'admin', '$2y$10$P8kpflwJHTXnNUYIUxjc8un5pw0.YyI1NJY67pdziv.4Vy5n3UrQa', 'administrator@gmail.com', '659f76af2f243.jpg'),
(2, 'Eka Nurseva Saniyah', 'ekans', '$2y$10$IZNY8cV4yYNQt9AXbr5x0Os0sP4oJ2Lp6YgiyD0zgaGUBMYuPgita', 'ekanursevas@gmail.com', '65b4abc1ebc54.jpg'),
(4, 'Admin2', 'admin2', '$2y$10$jVfUu/Ob0cb/FwVtGFPb7OiJicCGe8MBHk7lN94ZVALGkvN.O5yDS', 'admin2@gmail.com', 'default.png'),
(7, 'Fillah Zaki Alhaqi', 'fillah21', '$2y$10$NnRFlc3dFczJS6JUeu8m4OBU.fjjim2KyE84Gv8blSvEkvbUufdPy', 'fillah.alhaqi11@gmail.com', 'default.png');

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
  MODIFY `id_ciri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `saran_mbti`
--
ALTER TABLE `saran_mbti`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `tipe_mbti`
--
ALTER TABLE `tipe_mbti`
  MODIFY `id_tpmbti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tp_kepribadian`
--
ALTER TABLE `tp_kepribadian`
  MODIFY `id_kepribadian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
