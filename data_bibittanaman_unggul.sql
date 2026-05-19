-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2026 at 07:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_bibittanaman_unggul`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, '24130007', '2006', 'surya edi utama');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'sayuran'),
(2, 'tanaman hias'),
(3, 'tanaman pokok'),
(4, 'Buah-Buahan');

-- --------------------------------------------------------

--
-- Table structure for table `tanaman`
--

CREATE TABLE `tanaman` (
  `id_tanaman` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_tanaman` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cara_tanam` text DEFAULT NULL,
  `masa_panen` varchar(50) DEFAULT NULL,
  `keunggulan` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanaman`
--

INSERT INTO `tanaman` (`id_tanaman`, `id_kategori`, `nama_tanaman`, `deskripsi`, `cara_tanam`, `masa_panen`, `keunggulan`, `gambar`) VALUES
(1, 1, 'Tomat Servo F1', 'Varietas tomat hibrida determinit yang sangat populer di kalangan petani dataran rendah hingga menengah.', 'Benih disemai terlebih dahulu selama 2-3 minggu. Pindahkan bibit ke bedengan dengan mulsa plastik. Pasang ajir (bambu penopang) agar tanaman tidak roboh saat berbuah.', '60 - 70 hari setelah tanam (HST).', 'Sangat tahan terhadap virus kuning dan layu bakteri. Buahnya padat, keras, dan tahan transportasi jarak jauh..', 'https://beta.panahmerah.id/uploads/ngc_master_item_images/63eb5b8ee460a_20230214165942-1.jpg'),
(2, 1, 'Cabai Rawit Bara', 'Cabai rawit tipe menggantung yang sangat cocok ditanam di dataran rendah hingga tinggi.', 'Semaikan benih di tray semai. Setelah berdaun 4 helai, pindahkan ke lahan dengan jarak tanam sekitar 50 	imes 60 cm. Lakukan pemangkasan tunas air untuk pengoptimalan buah.', '75 - 85 HST.', 'Memiliki potensi hasil yang sangat tinggi (bisa mencapai 1 kg per pohon), buahnya sangat pedas, dan tanaman relatif tahan terhadap rontok bunga.', 'https://down-id.img.susercontent.com/file/id-11134207-7rbkb-m9le88p447ry94'),
(3, 1, 'Sawi Sendok (Pakcoy) Nauli F1', 'Jenis pakcoy hibrida berukuran seragam dengan batang yang tebal dan daun berwarna hijau segar.', 'Bisa ditanam di tanah (bedengan) maupun sistem hidroponik. Benih disemai 7-10 hari, lalu dipindahkan ke media pembesaran. Cukupi kebutuhan air dan matahari langsung.', 'Sangat genjah, sekitar 25 - 30 HST.', 'Pertumbuhannya sangat cepat dan seragam, tidak mudah berbunga (bolting), dan teksturnya renyah (tidak berserat).', 'https://tse4.mm.bing.net/th/id/OIP.rKxHcaE3c7BssSDGSjUKvwHaEr?rs=1&pid=ImgDetMain&o=7&rm=3'),
(4, 1, 'Kangkung Bangkok LP-1', 'Varietas kangkung darat unggul dengan daun lebar, panjang, dan berwarna hijau cerah.', 'Dapat ditanam langsung tanpa semai (tugal langsung ke tanah dengan kedalaman 1-2 cm). Jaga kelembapan tanah karena kangkung sangat menyukai air.', '20 - 25 HST.', 'Tumbuh tegak dan tidak menjalar berlebihan, lambat berbunga, serta memiliki daya simpan pascapanen yang lebih baik dibanding kangkung biasa.', 'https://www.panahmerah.id/uploads/ngc_master_item_images/63a1256d2a726_20221220100101-1-800.jpg'),
(5, 2, 'Aglaonema Suksom Jaipong', 'Salah satu varietas rutilant (berwarna merah) terbaik dari keluarga talas-talasan (Araceae) yang memiliki warna merah menyala yang sangat kontras.', 'Tempatkan pada media tanam yang porous (campuran sekam bakar, cocopeat, dan andam). Jangan terkena matahari langsung agar daunnya tidak terbakar, cukup di bawah naungan paranet atau teras rumah.', 'Daun mudanya akan mulai memunculkan warna merah pe', 'Warna merahnya jauh lebih solid dan cerah dibanding jenis Aglaonema lokal lainnya, serta memiliki nilai ekonomi dan estetika yang sangat tinggi.', 'https://tse4.mm.bing.net/th/id/OIP.4UV3l9pGZZh2eE2TjOljcAHaHa?rs=1&pid=ImgDetMain&o=7&rm=3'),
(6, 2, 'Janda Bolong (Monstera Adansonii Variegata)', 'Tanaman merambat dengan karakteristik daun berlubang alami, di mana varietas unggulnya memiliki corak variegata (perpaduan warna hijau, putih, atau kuning).', 'Sediakan turus (tiang penyangga dari sabut kelapa) agar akarnya bisa merambat ke atas. Menyukai tempat yang lembap namun tidak becek.', 'Pertumbuhan daun baru terjadi setiap $2 - 3$ mingg', 'Bentuknya yang unik memberikan kesan tropis yang mewah dan modern. Sangat adaptif dijadikan tanaman hias indoor.', 'https://asset.kompas.com/crops/Knv55dCArF5f2DTSxyNedmkb_34=/0x0:1000x667/750x500/data/photo/2021/05/25/60abe03baa79d.jpg'),
(7, 3, 'Padi Inpari 32 HDB', 'Varietas padi sawah inbrida unggulan yang sangat populer di kalangan petani Indonesia karena menghasilkan beras pulen berkualitas.', ' Benih disemai selama 15 - 21 hari, kemudian dipindahkan ke sawah dengan sistem jajar legowo (atur jarak tanam). Membutuhkan penggenangan air yang teratur dan pemupukan NPK secara berkala.', '120 hari setelah sebar (HSS).', 'Sangat tahan terhadap penyakit Hawar Daun Bakteri (HDB) dan blas, serta memiliki potensi hasil yang tinggi mencapai 8,42 ton per hektar.', 'https://cdn.antaranews.com/cache/1200x800/2018/01/0120F8FF-832A-4BAC-9A06-B13D4EA8A2ED.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tanaman`
--
ALTER TABLE `tanaman`
  ADD PRIMARY KEY (`id_tanaman`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tanaman`
--
ALTER TABLE `tanaman`
  MODIFY `id_tanaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tanaman`
--
ALTER TABLE `tanaman`
  ADD CONSTRAINT `tanaman_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
