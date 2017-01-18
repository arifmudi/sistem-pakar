-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2017 at 12:40 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa_hasil`
--

CREATE TABLE `analisa_hasil` (
  `id` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `kd_penyakit` varchar(4) NOT NULL,
  `noip` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa_hasil`
--

INSERT INTO `analisa_hasil` (`id`, `nama`, `kelamin`, `alamat`, `pekerjaan`, `kd_penyakit`, `noip`, `tanggal`) VALUES
(55, 'doni sanjaya', 'L', 'melati', 'mahasiswa', 'P003', '::1', '2017-01-11 15:32:16'),
(56, 'aaaa', 'L', 'qqqq', 'aaaa', 'P002', '::1', '2017-01-11 15:33:11'),
(57, 'fffff', 'L', 'hggggg', 'hhhhh', 'P003', '::1', '2017-01-11 15:38:43'),
(58, 'doni', 'L', 'aaaa', 'aaaa', 'P001', '::1', '2017-01-11 15:42:20'),
(59, 'aaaaaaaaaa', 'L', 'aaaaaaaa', 'aaaaaaaaaaa', 'P004', '::1', '2017-01-11 16:17:13'),
(60, 'qqqqqqqqq', 'L', 'qqqqqqqqqq', 'qqqqqqqqq', 'P004', '::1', '2017-01-11 16:22:35'),
(61, 'qqqqqqqqqq', 'L', 'qqqqqq', 'qqqqqqqqqqqqq', 'P001', '::1', '2017-01-11 16:26:25'),
(62, 'wwwwwwwwwww', 'L', 'eeeeeeeee', 'eeeeeeeeee', 'P002', '::1', '2017-01-11 16:28:17'),
(63, 'qqqqqqqqqqq', 'L', 'qqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqq', 'P004', '::1', '2017-01-11 16:30:08'),
(64, 'uuuuu', 'L', 'uuuuuuuu', 'uuuuuuuu', 'P001', '::1', '2017-01-11 16:30:50'),
(65, 'oooooooooo', 'L', '0000000', 'ooooo', 'P002', '::1', '2017-01-11 16:31:30'),
(66, 'oooooo', 'L', 'oo', 'o', 'P003', '::1', '2017-01-11 16:34:46'),
(67, 'i', 'L', 'i', 'i', 'P003', '::1', '2017-01-11 16:38:09'),
(68, '66666666', 'L', '555555555', '5555555555555', 'P002', '::1', '2017-01-11 16:51:33'),
(69, 'uuuuuuuuuuu', 'L', 'uuuuuuuuuuuuu', 'uuuuuuuuuuuuuuu', 'P003', '::1', '2017-01-11 16:54:38'),
(70, 'qqqqqqqqqqqqqqqqq', 'L', 'qqqqqqqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqq', 'P004', '::1', '2017-01-11 16:56:41'),
(71, '0ooooooo', 'L', 'jhhhhhhhhh', 'hhhhh', 'P001', '::1', '2017-01-11 16:57:10'),
(72, '3', 'L', 'ftt', 'hfghh', 'P002', '::1', '2017-01-11 16:57:53'),
(73, 'ftrthghg', 'L', 'fyfhfgfhg', 'yyghgf', 'P004', '::1', '2017-01-11 16:59:56'),
(74, 'yyuyyy', 'L', 'hhhh', 'jjhhhh', 'P002', '::1', '2017-01-11 17:01:15'),
(75, 'fhyyyy', 'L', 'fjhhf', 'gfjfj', 'P001', '::1', '2017-01-11 17:02:58'),
(76, 'hggggg', 'L', 'hghghgg', 'ggh', 'P003', '::1', '2017-01-11 17:04:17'),
(77, 'hhkkkk', 'L', 'jkkjkkjj', 'jjjjjjkk', 'P004', '::1', '2017-01-11 17:07:43'),
(78, 'dtddfdfdf', 'L', 'ferssfsd', 'fdfdgfdgf', 'P003', '::1', '2017-01-11 17:50:08'),
(79, 'angga', 'L', 'melati', 'mahasiswa', 'P004', '::1', '2017-01-11 18:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` varchar(4) NOT NULL,
  `nm_gejala` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `nm_gejala`) VALUES
('G001', 'Nausea (mual)'),
('G002', 'Muntah'),
('G003', 'Demam'),
('G004', 'Perut cepat terasa penuh saat makan'),
('G005', 'Nyeri perut'),
('G006', 'Feses berdarah'),
('G007', 'Konstipasi'),
('G008', 'Nyeri saat lapar'),
('G009', 'Nyeri Epigastrium Terlokalisasi	'),
('G010', 'Nyeri hilang setelah pemberian antasid.	'),
('G011', 'Nyeri episodik	'),
('G012', 'Mudah kenyang'),
('G013', 'Upper abdominal bloating (bengkak perut bagian atas).'),
('G014', 'Diare'),
('G015', 'Penurunan berat badan'),
('G016', 'Anemia'),
('G017', 'Turgor kulit menurun'),
('G018', 'Feses seperti air'),
('G019', 'Adanya psoas');

-- --------------------------------------------------------

--
-- Table structure for table `pakar`
--

CREATE TABLE `pakar` (
  `userID` varchar(30) NOT NULL,
  `passID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakar`
--

INSERT INTO `pakar` (`userID`, `passID`) VALUES
('admin', '21232f297a57a5a743894a0e4a801f'),
('admin', '21232f297a57a5a743894a0e4a801fc3'),
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kd_penyakit` varchar(4) NOT NULL,
  `nm_penyakit` varchar(60) NOT NULL,
  `keterangan` mediumtext NOT NULL,
  `solusi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kd_penyakit`, `nm_penyakit`, `keterangan`, `solusi`) VALUES
('P001', 'Dispepsia', 'Dispepsia adalah sekumpulan gejala berupa nyeri, perasaan tidak enak pada perut bagian atas yang menetap atau berulang disertai dengan gejala lainnya seperti rasa penuh saat makan, cepat kenyang, kembung, bersendawa, nafsu makan menurun, mual, muntah, dan dada terasa panas yang telah berlangsung sejak 3 bulan terakhir, dengan awal mula gejala timbul dalam 6 bulan sebelumnya. Gejala â€“ gejala tersebut dapat disebabkan oleh berbagai penyakit, tentunya termasuk juga di dalamnya penyakit maag, namun penyebabnya tidak harus selalu oleh penyakit maag, oleh karena itu dalam medis untuk menggambarkan sekumpulan gejala tersebut digunakanlah istilah sindrom dispepsia.', 'Pengobatan akan tergantung pada penyebab dispepsia, penggunaan obat adalah pengobatan yang paling umum diterapkan. Jika ternyata ada ulkus lambung, maka itu bisa disembuhkan dengan meminum obat maag penurun asam lambung seperti antasida, ranitidin, lansoprazole dan omeprazole. Jika disertai dengan infeksi lambung, maka diperlukan juga antibiotik untuk membunuh bakteri penyebab.'),
('P002', 'Penyakit Crohn', 'Penyakit Crohn (Crohnâ€™s disease) adalah kondisi jangka panjang yang menyebabkan peradangan lapisan pada sistem pencernaan. Peradangan dapat mempengaruhi setiap bagian dari sistem pencernaan, dari mulut ke bagian belakang, tapi paling sering terjadi di bagian terakhir yaitu pada usus kecil (ileum) atau usus besar (kolon)', 'Apa saja pilihan pengobatan saya untuk penyakit crohn?\r\nSaat ini tidak ada obat khusus untuk penyakit ini. Tujuan dilakukannya pengobatan adalah untuk mengurangi gejala, mengendalikan peradangan, dan mencegah komplikasi. Pengobatan biasanya melibatkan terapi obat, operasi, dan terapi nutrisi.\r\n\r\nDiare ringan dapat dikendalikan dengan suplemen air dan Oreol cair dan makanan yang tepat.\r\n\r\nJika diare semakin parah dan tidak hilang setelah tiga hari, Anda dapat menggunakan obat anti-inflamasi seperti kortikosteroid, obat imunosupresif seperti azathioprine dan merkaptopurin, antibiotik seperti ciprofloxacin dan metronidazol. Selain itu, dokter dapat menganjurkan Anda menggunakan suplemen vitamin, suplemen kalsium, zat besi dan vitamin D. Anda dapat mangonsumsi obat penghilang rasa sakit jika terjadi sakit yang parah.\r\n\r\nJika obat-obatan dan diet sehat tidak dapat membantu Anda mengontrol penyakit Crohn, dokter dapat merekomendasikan operasi. Setelah itu, pasien masih memerlukan obat-obatan untuk mengurangi risiko kambuhnya penyakit ini.'),
('P003', 'Diare Akut', 'Diare akut (mendadak) adalah diare yang berlangsung kurang dari dua minggu, dengan gejala sebagai berikut: tinja cair, biasanya terjadi mendadak, disertai rasa lemas, kadang-kadang demam atau muntah, biasanya berhenti atau berakhir dalam beberapa jam sampai beberapa hari. ', 'Bawalah penderita diare ke unit pelayanan kesehatan, bila:\r\nBuang air besar makin sering dan banyak sekali\r\nRasa haus yang nyata\r\nTidak dapat makan/minum\r\nDemam tinggi\r\nAda darah dalam tinja\r\nMuntah berulang-ulang\r\n\r\nObat diare\r\n\r\nOralit merupakan satu-satunya obat yang dianjurkan untuk mengatasi diare karena kehilangan cairan tubuh. Oralit tidak menghentikan diare, tapi menggantikan cairan tubuh yang hilang bersama tinja. Dengan menggantikan cairan tubuh tersebut, terjadinya dehidrasi dapat dihindarkan.\r\nOralit tersedia dalam bentuk serbuk untuk dilarutkan dengan air dan dalam bentuk larutan.\r\nPerhatikan cara penggunaannya yang tercantum pada kemasan.\r\n'),
('P004', 'Diare Kronik', 'Diare Kronik adalah diare yang berlangsung lebih dari tiga minggu. Ketentuan ini berlaku bagi orang dewasa, sedangkan pada bayi dan anak ditetapkan batas waktu dua minggu. Diare adalah buang air besar (defekasi) dengan jumlah tinja yang lebih banyak dari biasanya (normal 100Â­200 ml per jam tinja), dengan tinja berbentuk cairan atau setengah cair (setengah padat), dapat pula disertai frekuensi defekasi yang meningkat. Menurut WHO (1980), diare adalah buang air besar encer atau cair lebih dari tiga kali sehari. Diare terbagi dua berdasarkan mula dan lamanya, yaitu diare akut dan diare kronik', 'Saat diare, mengonsumsi air minum dengan cukup sebagai ganti cairan tubuh yang terbuang saat diare adalah cara terbaik untuk menghindari dehidrasi. Meski begitu, hindari minuman yang mengandung banyak gula, kafein, dan alkohol karena berisiko menyebabkan diare memburuk. Selain itu, hindari mengonsumsi makanan pedas, berlemak, dan makanan berat untuk sementara waktu. Nasi dan roti tanpa tambahan apa pun adalah makanan yang disarankan. Obat-obatan bebas antidiare boleh dikonsumsi, meski tidak selalu diperlukan. Namun hindari pemberian obat ini kepada anak di bawah usia 12 tahun.');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `kd_gejala` varchar(4) NOT NULL,
  `kd_penyakit` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`kd_gejala`, `kd_penyakit`) VALUES
('G001', 'P001'),
('G002', 'P001'),
('G003', 'P001'),
('G008', 'P001'),
('G009', 'P001'),
('G010', 'P001'),
('G011', 'P001'),
('G012', 'P001'),
('G013', 'P001'),
('G001', 'P003'),
('G003', 'P003'),
('G004', 'P003'),
('G005', 'P003'),
('G006', 'P003'),
('G007', 'P003'),
('G008', 'P003'),
('G014', 'P003'),
('G001', 'P004'),
('G002', 'P004'),
('G003', 'P004'),
('G004', 'P004'),
('G005', 'P004'),
('G006', 'P004'),
('G007', 'P004'),
('G018', 'P004'),
('G001', 'P002'),
('G002', 'P002'),
('G003', 'P002'),
('G004', 'P002'),
('G015', 'P002'),
('G016', 'P002'),
('G017', 'P002'),
('G019', 'P002');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_analisa`
--

CREATE TABLE `tmp_analisa` (
  `noip` varchar(30) NOT NULL,
  `kd_penyakit` varchar(4) NOT NULL,
  `kd_gejala` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_analisa`
--

INSERT INTO `tmp_analisa` (`noip`, `kd_penyakit`, `kd_gejala`) VALUES
('::1', 'P004', 'G001'),
('::1', 'P004', 'G002'),
('::1', 'P004', 'G003'),
('::1', 'P004', 'G004'),
('::1', 'P004', 'G005'),
('::1', 'P004', 'G006'),
('::1', 'P004', 'G007'),
('::1', 'P004', 'G018');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `noip` varchar(20) NOT NULL,
  `kd_gejala` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`noip`, `kd_gejala`) VALUES
('::1', 'G001'),
('::1', 'G002'),
('::1', 'G003'),
('::1', 'G004'),
('::1', 'G005');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_pasien`
--

CREATE TABLE `tmp_pasien` (
  `id` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `noip` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_pasien`
--

INSERT INTO `tmp_pasien` (`id`, `nama`, `kelamin`, `alamat`, `pekerjaan`, `noip`, `tanggal`) VALUES
(76, 'angga', 'L', 'melati', 'mahasiswa', '::1', '2017-01-11 18:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `noip` varchar(20) NOT NULL,
  `kd_penyakit` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_penyakit`
--

INSERT INTO `tmp_penyakit` (`noip`, `kd_penyakit`) VALUES
('::1', 'P004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indexes for table `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
