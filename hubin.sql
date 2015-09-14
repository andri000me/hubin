-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.11 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table hubin.album
CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `nama_album` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tgl_album` date NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.album: 3 rows
DELETE FROM `album`;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` (`id_album`, `nama_album`, `tgl_album`) VALUES
	(2, 'PRAKERIN REPLIKA\'S', '2014-05-20'),
	(4, 'DESIGN GRAPHIC', '2014-05-20'),
	(11, 'Pemandangan', '2014-05-23');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;


-- Dumping structure for table hubin.configs
CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(32) DEFAULT NULL,
  `config_kode` varchar(64) DEFAULT NULL,
  `config_status` enum('active','non') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table hubin.configs: ~1 rows (approximately)
DELETE FROM `configs`;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
INSERT INTO `configs` (`id`, `config_name`, `config_kode`, `config_status`) VALUES
	(1, 'quick_register', 'alhamdulillah', 'non');
/*!40000 ALTER TABLE `configs` ENABLE KEYS */;


-- Dumping structure for table hubin.gallery
CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `title_gallery` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `img_gallery` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `thumb_gallery` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `ket_gallery` text COLLATE latin1_general_ci NOT NULL,
  `role_gallery` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `status` enum('active','non') COLLATE latin1_general_ci NOT NULL DEFAULT 'non',
  PRIMARY KEY (`id_gallery`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.gallery: 73 rows
DELETE FROM `gallery`;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` (`id_gallery`, `id_user`, `id_album`, `title_gallery`, `img_gallery`, `thumb_gallery`, `ket_gallery`, `role_gallery`, `status`) VALUES
	(17, 1, 0, 'Website Koperasi', '1398919373Web - Simpanan.png', '1398919373Web - Simpanan_thumb.png', '', 'portofolio', 'non'),
	(18, 1, 0, 'Website REPLIKA’S Sharing Creation', '1398919425Forum HTML - Home.png', '1398919425Forum HTML - Home_thumb.png', '', 'portofolio', 'non'),
	(16, 1, 0, 'Website Koperasi', '1398919373Web - Home.png', '1398919373Web - Home_thumb.png', '', 'portofolio', 'non'),
	(15, 1, 0, 'Website Future Jobs Lomba Kompetensi Siswa', '1398919272Future Jobs - jobs.png', '1398919272Future Jobs - jobs_thumb.png', '', 'portofolio', 'non'),
	(14, 1, 0, 'Website Future Jobs Lomba Kompetensi Siswa', '1398919264Untitled.png', '1398919264Untitled_thumb.png', '', 'portofolio', 'non'),
	(9, 1, 0, 'Website Wing Korps Karbol', '1398918592Wing Korps Karbol.png', '1398918592Wing Korps Karbol_thumb.png', '', 'portofolio', 'non'),
	(19, 1, 0, 'Website REPLIKA’S Sharing Creation', '1398919425Forum HTML - HTML.png', '1398919425Forum HTML - HTML_thumb.png', '', 'portofolio', 'non'),
	(123, 1, 0, 'Website Zona Replika', '1400855836S - 0.1949.png', '1400855836S - 0.1949_thumb.png', '', 'portofolio', 'non'),
	(49, 0, 4, '', '140059630301_preview1.jpg', '140059630301_preview1_thumb.jpg', '', 'gallery', 'non'),
	(38, 0, 2, '', '1400558969__Sidney_Crosby_2009___by_loveinjected.jpg', '1400558969__Sidney_Crosby_2009___by_loveinjected_thumb.jpg', '', 'gallery', 'non'),
	(39, 0, 2, '', '14005589690b7f7a69198082aba7fa54b43e0bb10c-d351m9l.png', '14005589690b7f7a69198082aba7fa54b43e0bb10c-d351m9l_thumb.png', '', 'gallery', 'non'),
	(40, 0, 2, '', '14005589701b954647e5bc6a4bc4a324b7c3adc5ff.jpg', '14005589701b954647e5bc6a4bc4a324b7c3adc5ff_thumb.jpg', '', 'gallery', 'non'),
	(41, 0, 2, '', '14005589701e935da02e0582dd8c61711e1e7d748f.png', '14005589701e935da02e0582dd8c61711e1e7d748f_thumb.png', '', 'gallery', 'non'),
	(42, 0, 2, '', '14005589701Three_by_BboyWicked.jpg', '14005589701Three_by_BboyWicked_thumb.jpg', '', 'gallery', 'non'),
	(43, 0, 2, '', '14005589702c4d8d89483851b41eace8cb334adc98.jpg', '14005589702c4d8d89483851b41eace8cb334adc98_thumb.jpg', '', 'gallery', 'non'),
	(44, 0, 2, '', '14005589702e3810f0ed655d6c.jpg', '14005589702e3810f0ed655d6c_thumb.jpg', '', 'gallery', 'non'),
	(46, 0, 2, '', '14005953958d6ac79a4462b22f.jpg', '14005953958d6ac79a4462b22f_thumb.jpg', '', 'gallery', 'non'),
	(47, 0, 2, '', '140059539541ad65f055212eca3cd76f379c56e864.jpg', '140059539541ad65f055212eca3cd76f379c56e864_thumb.jpg', '', 'gallery', 'non'),
	(48, 0, 2, '', '140059539586d29d046b764110845c0beb5ddc3d80.png', '140059539586d29d046b764110845c0beb5ddc3d80_thumb.png', '', 'gallery', 'non'),
	(50, 0, 4, '', '1400596303590(2).jpg', '1400596303590(2)_thumb.jpg', '', 'gallery', 'non'),
	(51, 0, 4, '', '1400596303590_px_preview (1).jpg', '1400596303590_px_preview (1)_thumb.jpg', '', 'gallery', 'non'),
	(53, 0, 4, '', '1400596303590-2.jpg', '1400596303590-2_thumb.jpg', '', 'gallery', 'non'),
	(55, 0, 4, '', '140059630395087.jpg', '140059630395087_thumb.jpg', '', 'gallery', 'non'),
	(56, 0, 4, '', '1400596303107184.jpg', '1400596303107184_thumb.jpg', '', 'gallery', 'non'),
	(57, 0, 4, '', '1400596303107687.jpg', '1400596303107687_thumb.jpg', '', 'gallery', 'non'),
	(58, 0, 4, '', '1400596303120539.jpg', '1400596303120539_thumb.jpg', '', 'gallery', 'non'),
	(59, 0, 4, '', '1400596303120817.jpg', '1400596303120817_thumb.jpg', '', 'gallery', 'non'),
	(60, 0, 4, '', '1400596303168635.jpg', '1400596303168635_thumb.jpg', '', 'gallery', 'non'),
	(61, 0, 4, '', '1400596303186034.jpg', '1400596303186034_thumb.jpg', '', 'gallery', 'non'),
	(62, 0, 4, '', '1400596303195150.jpg', '1400596303195150_thumb.jpg', '', 'gallery', 'non'),
	(63, 0, 4, '', '1400596303203777.jpg', '1400596303203777_thumb.jpg', '', 'gallery', 'non'),
	(64, 0, 4, '', '1400596303206329.jpg', '1400596303206329_thumb.jpg', '', 'gallery', 'non'),
	(65, 0, 4, '', '1400596303207950.jpg', '1400596303207950_thumb.jpg', '', 'gallery', 'non'),
	(66, 0, 4, '', '1400596303226449.jpg', '1400596303226449_thumb.jpg', '', 'gallery', 'non'),
	(122, 1, 0, 'Website Zona Replika', '1400855835S - 0.1949 (1).png', '1400855835S - 0.1949 (1)_thumb.png', '', 'portofolio', 'non'),
	(112, 0, 11, '', '1400850171wallpaper-1375832.jpg', '1400850171wallpaper-1375832_thumb.jpg', '', 'gallery', 'non'),
	(111, 0, 11, '', '1400850139wallpaper-34553.jpg', '1400850139wallpaper-34553_thumb.jpg', '', 'gallery', 'non'),
	(110, 0, 11, '', '1400850137wallpaper-20614.jpg', '1400850137wallpaper-20614_thumb.jpg', '', 'gallery', 'non'),
	(108, 0, 11, '', '1400850135wallpaper-2814.jpg', '1400850135wallpaper-2814_thumb.jpg', '', 'gallery', 'non'),
	(109, 0, 11, '', '1400850136wallpaper-4635.jpg', '1400850136wallpaper-4635_thumb.jpg', '', 'gallery', 'non'),
	(106, 4, 0, 'dfgdfg', '1400850008wallpa.per-547.jpg', '1400850008wallpa.per-547_thumb.jpg', '', 'portofolio', 'non'),
	(107, 0, 11, '', '1400850133wallpa.per-547.jpg', '1400850133wallpa.per-547_thumb.jpg', '', 'gallery', 'non'),
	(113, 0, 11, '', '1400850173wallpaper-2063804.jpg', '1400850173wallpaper-2063804_thumb.jpg', '', 'gallery', 'non'),
	(114, 0, 11, '', '1400850175wallpaper-2932481.jpg', '1400850175wallpaper-2932481_thumb.jpg', '', 'gallery', 'non'),
	(115, 0, 11, '', '1400850204wallpaper-133593.jpg', '1400850204wallpaper-133593_thumb.jpg', '', 'gallery', 'non'),
	(116, 0, 11, '', '1400850205wallpaper-286060.jpg', '1400850205wallpaper-286060_thumb.jpg', '', 'gallery', 'non'),
	(117, 0, 11, '', '1400850206wallpaper-301287.jpg', '1400850206wallpaper-301287_thumb.jpg', '', 'gallery', 'non'),
	(118, 0, 11, '', '1400850209wallpaper-427887.jpg', '1400850209wallpaper-427887_thumb.jpg', '', 'gallery', 'non'),
	(119, 0, 11, '', '1400850211wallpaper-486570.jpg', '1400850211wallpaper-486570_thumb.jpg', '', 'gallery', 'non'),
	(120, 0, 11, '', '1400850214wallpaper-734416.jpg', '1400850214wallpaper-734416_thumb.jpg', '', 'gallery', 'non'),
	(121, 0, 11, '', '1400850216wallpaper-966364.jpg', '1400850216wallpaper-966364_thumb.jpg', '', 'gallery', 'non'),
	(127, 6, 0, 'Refreshing', '1401350139gambar2.jpg', '1401350139gambar2_thumb.jpg', '', 'prakerin', 'active'),
	(126, 6, 0, 'Refreshing', '1401350131gambar1.jpg', '1401350131gambar1_thumb.jpg', '', 'prakerin', 'active'),
	(128, 6, 0, 'Refreshing', '1401350140gambar3.jpg', '1401350140gambar3_thumb.jpg', '', 'prakerin', 'active'),
	(129, 6, 0, 'Refreshing', '1401350149gambar4.JPG', '1401350149gambar4_thumb.JPG', '', 'prakerin', 'active'),
	(130, 6, 0, 'Refreshing', '1401350150gambar5.jpg', '1401350150gambar5_thumb.jpg', '', 'prakerin', 'active'),
	(131, 6, 0, 'Refreshing', '1401350155gambar6.jpg', '1401350155gambar6_thumb.jpg', '', 'prakerin', 'active'),
	(132, 6, 0, 'Refreshing', '1401350156gambar7.JPG', '1401350156gambar7_thumb.JPG', '', 'prakerin', 'active'),
	(133, 6, 0, 'Refreshing', '1401350157gambar8.jpg', '1401350157gambar8_thumb.jpg', '', 'prakerin', 'active'),
	(134, 6, 0, 'Refreshing', '1401350160gambar9.jpg', '1401350160gambar9_thumb.jpg', '', 'prakerin', 'active'),
	(135, 6, 0, 'Refreshing', '1401350165img1.jpg', '1401350165img1_thumb.jpg', '', 'prakerin', 'active'),
	(136, 6, 0, 'Refreshing', '1401350170img2.JPG', '1401350170img2_thumb.JPG', '', 'prakerin', 'active'),
	(140, 6, 0, 'Website', '1401381113Wing Korps Karbol.png', '1401381113Wing Korps Karbol_thumb.png', '', 'prakerin', 'active'),
	(153, 8, 0, 'dfgdg', '1401678163Cascadia-Bear-Illustration.jpg', '1401678163Cascadia-Bear-Illustration_thumb.jpg', '', 'prakerin', 'active'),
	(154, 8, 0, 'dfgdg', '1401678163eyeball-invaders-01.jpg', '1401678163eyeball-invaders-01_thumb.jpg', '', 'prakerin', 'active'),
	(155, 8, 0, 'dfgdg', '1401678164fully-illustrated-3d-rooms-03.jpg', '1401678164fully-illustrated-3d-rooms-03_thumb.jpg', '', 'prakerin', 'active'),
	(156, 8, 0, 'dfgdg', '1401678164fully-illustrated-3d-rooms-05.jpg', '1401678164fully-illustrated-3d-rooms-05_thumb.jpg', '', 'prakerin', 'active'),
	(157, 8, 0, 'dfgdg', '1401678165fully-illustrated-abitofcode-cartoon-cows.jpg', '1401678165fully-illustrated-abitofcode-cartoon-cows_thumb.jpg', '', 'prakerin', 'active'),
	(158, 8, 0, 'dfgdg', '1401678165Fully-Illustrated-accidental-fish.jpg', '1401678165Fully-Illustrated-accidental-fish_thumb.jpg', '', 'prakerin', 'active'),
	(162, 11, 0, 'Peta Bogor', '1401691978saadbina.jpg', '1401691978saadbina_thumb.jpg', '', 'portofolio', 'non'),
	(163, 11, 0, 'Peta Bogor', '1401691978kupu_kupu_by_poogi.jpg', '1401691978kupu_kupu_by_poogi_thumb.jpg', '', 'portofolio', 'non'),
	(164, 11, 0, 'Peta Bogor', '1401691979panjihitam-1024x378.jpg', '1401691979panjihitam-1024x378_thumb.jpg', '', 'portofolio', 'non'),
	(165, 11, 0, 'Peta Bogor', '1401691980khalifah.jpg', '1401691980khalifah_thumb.jpg', '', 'portofolio', 'non');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;


-- Dumping structure for table hubin.hubin
CREATE TABLE IF NOT EXISTS `hubin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_hubin` varchar(32) DEFAULT NULL,
  `title_hubin` varchar(64) DEFAULT NULL,
  `content_hubin` text,
  `status_hubin` enum('active','non') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table hubin.hubin: ~1 rows (approximately)
DELETE FROM `hubin`;
/*!40000 ALTER TABLE `hubin` DISABLE KEYS */;
INSERT INTO `hubin` (`id`, `role_hubin`, `title_hubin`, `content_hubin`, `status_hubin`) VALUES
	(1, 'about', 'Hubin Adi Sangoro', 'Desciption About HUBIN Adi Sanggoro Here', NULL);
/*!40000 ALTER TABLE `hubin` ENABLE KEYS */;


-- Dumping structure for table hubin.jurusan
CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ket_jurusan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `warna_jurusan` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `hast_jurusan` varchar(3) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.jurusan: 4 rows
DELETE FROM `jurusan`;
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `ket_jurusan`, `warna_jurusan`, `hast_jurusan`) VALUES
	(1, 'SURTA', 'Survey Dan Pemetaan', '#23A240', '01'),
	(2, 'RPL', 'Rekayasa Perangkat Lunak', '#3598db', '02'),
	(3, 'GEOTA', 'Geologi Pertambangan', '#E99D23', '03'),
	(4, 'GARMEN', 'Tata Busana', '#8c47a4', '04');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;


-- Dumping structure for table hubin.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `value_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.kategori: 10 rows
DELETE FROM `kategori`;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id_kategori`, `kategori`, `value_kategori`) VALUES
	(1, 'agama', 'Islam'),
	(2, 'agama', 'Kristen Protestan'),
	(3, 'agama', 'Kristen Katolik'),
	(4, 'agama', 'Hindu'),
	(5, 'agama', 'Budha'),
	(6, 'agama', 'Konghuchu'),
	(7, 'jk', 'Laki-laki'),
	(8, 'jk', 'Perempuan'),
	(9, 'status', 'Menikah'),
	(10, 'status', 'Belum Menikah');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;


-- Dumping structure for table hubin.keahlian_siswa
CREATE TABLE IF NOT EXISTS `keahlian_siswa` (
  `id_keahlian` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `ket_keahlian` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_keahlian`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.keahlian_siswa: 6 rows
DELETE FROM `keahlian_siswa`;
/*!40000 ALTER TABLE `keahlian_siswa` DISABLE KEYS */;
INSERT INTO `keahlian_siswa` (`id_keahlian`, `id_siswa`, `ket_keahlian`) VALUES
	(1, 1, 'Mampu membuat sistem aplikasi berbasis web (WordPress, Joomla, HTML, PHP, CSS, AJAX, Javascript, jQuery, JSON, CI, Bootstrap)'),
	(3, 1, 'Memahami konsep RDBMS dan mampu mengaplikasikannya dalam pembuatan sistem aplikasi berbasis database'),
	(4, 1, 'Memahami cara instalasi software'),
	(5, 1, 'Mampu mengoperasikan program komputer Microsoft Office (MS Word, MSExcel, MS Power Point, MS Access)'),
	(6, 1, 'Mudah beradaptasi dan mempunyai kemampuan berkomunikasi'),
	(7, 1, 'Mempunyai motivasi tinggi, amanah, jujur, ulet, dan energik');
/*!40000 ALTER TABLE `keahlian_siswa` ENABLE KEYS */;


-- Dumping structure for table hubin.kel_prakerin
CREATE TABLE IF NOT EXISTS `kel_prakerin` (
  `id_siswa_prakerin` int(11) NOT NULL AUTO_INCREMENT,
  `id_prakerin` int(11) NOT NULL,
  `nama_siswa_prakerin` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_siswa_prakerin`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.kel_prakerin: 5 rows
DELETE FROM `kel_prakerin`;
/*!40000 ALTER TABLE `kel_prakerin` DISABLE KEYS */;
INSERT INTO `kel_prakerin` (`id_siswa_prakerin`, `id_prakerin`, `nama_siswa_prakerin`, `id_siswa`) VALUES
	(2, 6, 'Zainu Rochim', 1),
	(3, 6, 'Imam Teguh', NULL),
	(4, 6, 'Aprilianti', NULL),
	(5, 6, 'Yuni Anggraeni', NULL),
	(7, 8, 'Zainu Rochim', 1);
/*!40000 ALTER TABLE `kel_prakerin` ENABLE KEYS */;


-- Dumping structure for table hubin.loker
CREATE TABLE IF NOT EXISTS `loker` (
  `id_loker` int(11) NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `judul_loker` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jumlah_requitment` int(11) NOT NULL,
  `deskripsi_loker` text COLLATE latin1_general_ci NOT NULL,
  `tgl_loker` date NOT NULL,
  `status` enum('active','non') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_loker`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.loker: 2 rows
DELETE FROM `loker`;
/*!40000 ALTER TABLE `loker` DISABLE KEYS */;
INSERT INTO `loker` (`id_loker`, `id_perusahaan`, `id_jurusan`, `judul_loker`, `jumlah_requitment`, `deskripsi_loker`, `tgl_loker`, `status`) VALUES
	(1, 2, 2, 'Website Developer', 5, 'Spesifikasi :<br><ul><li>Ahli pemograman html5, css3, php5, javascript</li><li>Bisa bermain Query</li><li>Familiar dengan Jquery, Bootstrap</li></ul>', '2014-05-30', 'active'),
	(3, 2, 1, 'Pengolah Data', 3, 'Dibutuhkan Surveyor yang dapat mengolah data diexcel DLL<br>Spesifikasi :<br><ul><li>Bisa mengunakan aplikasi autocad</li><li>Familiar dengan microsoft office</li><li>Cepat dalam menyeselaikan tugas&nbsp;</li></ul>', '2014-05-30', 'active');
/*!40000 ALTER TABLE `loker` ENABLE KEYS */;


-- Dumping structure for table hubin.pendidikan_formal
CREATE TABLE IF NOT EXISTS `pendidikan_formal` (
  `id_pndk_formal` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `awal_pndk_formal` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `akhir_pndk_formal` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `nama_pndk_formal` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_pndk_formal`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.pendidikan_formal: 3 rows
DELETE FROM `pendidikan_formal`;
/*!40000 ALTER TABLE `pendidikan_formal` DISABLE KEYS */;
INSERT INTO `pendidikan_formal` (`id_pndk_formal`, `id_siswa`, `awal_pndk_formal`, `akhir_pndk_formal`, `nama_pndk_formal`) VALUES
	(8, 1, '2002', '2008', 'SDN PAGELARAN 04 BOGOR'),
	(9, 1, '2008', '2011', 'SMPN 1 CIOMAS BOGOR'),
	(10, 1, '2011', '2014', 'SMK ADI SANGGORO BOGOR');
/*!40000 ALTER TABLE `pendidikan_formal` ENABLE KEYS */;


-- Dumping structure for table hubin.pendidikan_informal
CREATE TABLE IF NOT EXISTS `pendidikan_informal` (
  `id_pndk_informal` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `awal_pndk_informal` int(6) NOT NULL,
  `akhir_pndk_informal` int(6) NOT NULL,
  `nama_pndk_informal` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_pndk_informal`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.pendidikan_informal: 1 rows
DELETE FROM `pendidikan_informal`;
/*!40000 ALTER TABLE `pendidikan_informal` DISABLE KEYS */;
INSERT INTO `pendidikan_informal` (`id_pndk_informal`, `id_siswa`, `awal_pndk_informal`, `akhir_pndk_informal`, `nama_pndk_informal`) VALUES
	(1, 1, 2008, 2008, 'Mengikuti Workshop Startup Asia 7 Cities Road, Jakarta');
/*!40000 ALTER TABLE `pendidikan_informal` ENABLE KEYS */;


-- Dumping structure for table hubin.pengalaman_kerja
CREATE TABLE IF NOT EXISTS `pengalaman_kerja` (
  `id_kerja` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `pengalaman_kerja` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kerja`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.pengalaman_kerja: 5 rows
DELETE FROM `pengalaman_kerja`;
/*!40000 ALTER TABLE `pengalaman_kerja` DISABLE KEYS */;
INSERT INTO `pengalaman_kerja` (`id_kerja`, `id_siswa`, `pengalaman_kerja`) VALUES
	(3, 1, 'PRAKERIN di PT Dwi Barma Indo Mandiri AUU Yogyakarta'),
	(4, 1, 'Pembuatan Website E-Commerce (http//djasmineshop.com)'),
	(5, 1, 'Pembuatan Website REPLIKA’S Sharing Creation'),
	(6, 1, 'Pembuatan Website Koperasi'),
	(7, 1, 'Pembuatan Website ZONA REPLIKA’S (http://zonareplika.net)');
/*!40000 ALTER TABLE `pengalaman_kerja` ENABLE KEYS */;


-- Dumping structure for table hubin.pengalaman_organisasi
CREATE TABLE IF NOT EXISTS `pengalaman_organisasi` (
  `id_org` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `awal_org` int(6) NOT NULL,
  `akhir_org` int(6) NOT NULL,
  `nama_org` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `posisi_org` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_org`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.pengalaman_organisasi: 4 rows
DELETE FROM `pengalaman_organisasi`;
/*!40000 ALTER TABLE `pengalaman_organisasi` DISABLE KEYS */;
INSERT INTO `pengalaman_organisasi` (`id_org`, `id_siswa`, `awal_org`, `akhir_org`, `nama_org`, `posisi_org`) VALUES
	(5, 1, 2012, 2013, 'ROHIS SMK Adi Sanggoro Bogor', 'Pengurus Devisi Dana Usaha'),
	(3, 1, 2009, 2011, 'PASKIBRA SMPN 1 CIOMAS BOGOR', 'Anggota'),
	(6, 1, 2013, 2014, 'ROHIS SMK Adi Sanggoro Bogor', 'Pembimbing Devisi Dana Usaha'),
	(7, 1, 2013, 2014, 'REPLIKA\'S SMK Adi Sanggoro Bogor', 'Ketua');
/*!40000 ALTER TABLE `pengalaman_organisasi` ENABLE KEYS */;


-- Dumping structure for table hubin.perusahaan
CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `nama_perusahaan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `alamat_perusahaan` text COLLATE latin1_general_ci NOT NULL,
  `tlp_perusahaan` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `link_perusahaan` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `email_perusahaan` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `about_perusahaan` text COLLATE latin1_general_ci NOT NULL,
  `logo_perusahaan` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `sampul_perusahaan` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `minat_jurusan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` enum('active','non') COLLATE latin1_general_ci NOT NULL DEFAULT 'non',
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.perusahaan: 3 rows
DELETE FROM `perusahaan`;
/*!40000 ALTER TABLE `perusahaan` DISABLE KEYS */;
INSERT INTO `perusahaan` (`id_perusahaan`, `user`, `pass`, `nama_perusahaan`, `alamat_perusahaan`, `tlp_perusahaan`, `link_perusahaan`, `email_perusahaan`, `about_perusahaan`, `logo_perusahaan`, `sampul_perusahaan`, `minat_jurusan`, `status`) VALUES
	(1, 'indomedia', '8cb2237d0679ca88db6464eac60da96345513964', 'Indomendia', 'Gedung E Lantai II\nUniversitas Kristen Satya Wacana\nJl. Diponegoro no. 52 – 60 , Salatigad', '0298321212', 'http://www.indomedia.net.id/', 'info@indomedianet.net', '<b>INDOMEDIA </b>, adalah  brand di bawah badan hukum <u>PT Indonesia</u> Media Komunikasi Masyrakat , sebagai perusahaan yang bergerak di bidang layanan jasa berbasis TIK , pengembangan infrastruktur jaringan, dan aplikasi dengan bisnis utama jasa layanan internet.\nBerkantor pusat Jl.Diponegoro 52-60 , Gedung E/lt-2 Kampus UKSW, dan Jl.Kartini No.17 kampus STIBA Satyawacana Salatiga, INDOMEDIA  berusaha untuk turut serta berpartisipasi dalam pemenuhan kebutuhan teknologi komunikasi data dan akses informasi bagi masyarakat Indonesia secara nasional.', '', '', 'SURTA/RPL', 'active'),
	(2, 'rhino', '8cb2237d0679ca88db6464eac60da96345513964', 'Rhino Technology', 'Graha Pool Building. 3rd Floor, 307-308 Jl. Merdeka No. 110\nBogor 16122, West Java, Indonesia', '02518313668', 'http://www.rhino.co.id/', 'info@rhino.co.id', 'Rhino Technology as an IT Solutions Provider addresses these organisation\'s information technology needs and challenges with a range of products, technologies, services, and partnerships for business computing. Our commitment is to serving customers , we believe that our services are of value to your organization and that you can customize the services you receive from us just as easily as you can customize other software products.<br>', '1400910034logo - Copy.png', '1400910276rhino.png', 'SURTA/RPL/GEOTA', 'active'),
	(3, 'javateklab', '8cb2237d0679ca88db6464eac60da96345513964', 'Javatek Lab', 'Jakarta bla bla bla', '085777909254', 'http://www.javatek.co.id', 'javatek@gmail.com', 'JavatekLab didirikan pada tahun 2013 merupakan perusahaan yang mendedikasikan pada web design, software development, marketing consultancy, maintenance software dan hardware. Kami membantu memberikan solusi IT bagi pelaku bisnis dengan metode penerapan IT sebagai inti bisnis dalam meningkatkan profil perusahaan anda, meningkatkan produktivitas perusahaan, efisiensi bisnis, memperluas pangsa pasar, dan sebagai dasar keputusan bagi eksekutif dalam menentukan arah kebijakan perusahaan.\n\nDengan dedikasi yang tak kenal lelah kami menentukan standar pelayanan tertinggi pada setiap project, solusi yang kami tawarkan dapat digunakan perusahaan skala kecil, menengah atau bahkan perusahaan dengan skala besar. Dimanapun anda berada kami selalu tertarik bertatap muka secara langsung untuk berdiskusi dalam menentukan solusi yang anda perlukan. hubungi kami sekarang untuk menemukan bagaimana kami dapat membantu bisnis anda!', '', '', 'RPL', 'active');
/*!40000 ALTER TABLE `perusahaan` ENABLE KEYS */;


-- Dumping structure for table hubin.posting
CREATE TABLE IF NOT EXISTS `posting` (
  `id_posting` int(11) NOT NULL AUTO_INCREMENT,
  `title_posting` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `content_posting` text COLLATE latin1_general_ci NOT NULL,
  `date_posting` date NOT NULL,
  `role_posting` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `status` enum('active','non') COLLATE latin1_general_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id_posting`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.posting: 9 rows
DELETE FROM `posting`;
/*!40000 ALTER TABLE `posting` DISABLE KEYS */;
INSERT INTO `posting` (`id_posting`, `title_posting`, `content_posting`, `date_posting`, `role_posting`, `status`) VALUES
	(1, 'Reqruitment', 'Madu adalah penyembuh untuk penyakit dan Al-Qur’an adalah penyembuh bagi penyakit dalam hati maka hendaklah kamu berobat dengan madu dan Al-Qur’an', '2014-06-03', 'informasi', 'active'),
	(9, 'Pengalaman', 'Jadikanlah masa yang berlalu itu pengalaman dan pengajaran, masa yang sedang berjalan kita isi dengan amalan dan masa hadapan jangan terlalu diangan-angankan', '2014-06-03', 'informasi', 'active'),
	(21, 'dfg', 'adsfdg', '2014-06-03', 'informasi', 'non'),
	(14, 'Ibnu Mas’ud', 'Sabar memiliki dua sisi, sisi yang satu adalah sabar, sisi yang lain adalah bersyukur kepada Allah', '2014-06-03', 'mutiara', 'active'),
	(15, 'Imam An Nawawi', 'Niat adalah ukuran dalam menilai benarnya suatu perbuatan, oleh karenanya, ketika niatnya benar, maka perbuatan itu benar, dan jika niatnya buruk, maka perbuatan itu buruk', '2014-06-03', 'mutiara', 'active'),
	(16, 'Bediuzzaman Said Nursi', 'Penderitaan jiwa mengarahkan keburukan. Putus asa adalah sumber kesesatan dan kegelapan hati, pangkal penderitaan jiwa', '2014-06-03', 'mutiara', 'active'),
	(17, 'Imam Al Ghazali', 'Kecintaan kepada Allah melingkupi hati, kecintaan ini membimbing hati dan bahkan merambah ke segala hal', '2014-06-03', 'mutiara', 'active'),
	(18, 'Saiyidina Umar bin Khattab', 'Barangsiapa takut kepada Allah SWT niscaya tidak akan dapat dilihat kemarahnnya. Dan barangsiapa takut kepada Allah, tidak sia-sia apa yang dia kehendaki', '2014-06-03', 'mutiara', 'active'),
	(19, 'free', 'Setiap orang itu lemah apabila ia menyerang karena dia hanya mempunyai satu tangan untuk mempertahankan diri dan satu lagi digunakan untuk menyerang', '2014-06-03', 'mutiara', 'active');
/*!40000 ALTER TABLE `posting` ENABLE KEYS */;


-- Dumping structure for table hubin.prakerin
CREATE TABLE IF NOT EXISTS `prakerin` (
  `id_prakerin` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `salt` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_perusahaan` int(11) NOT NULL DEFAULT '1',
  `id_jurusan` int(11) NOT NULL DEFAULT '1',
  `judul_laporan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `hasil_laporan` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `tgl_prakerin` date NOT NULL,
  `id_ta` int(11) NOT NULL,
  `about_prakerin` text COLLATE latin1_general_ci NOT NULL,
  `status_prakerin` enum('active','non') COLLATE latin1_general_ci NOT NULL DEFAULT 'non',
  PRIMARY KEY (`id_prakerin`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.prakerin: 2 rows
DELETE FROM `prakerin`;
/*!40000 ALTER TABLE `prakerin` DISABLE KEYS */;
INSERT INTO `prakerin` (`id_prakerin`, `user`, `pass`, `salt`, `id_perusahaan`, `id_jurusan`, `judul_laporan`, `hasil_laporan`, `tgl_prakerin`, `id_ta`, `about_prakerin`, `status_prakerin`) VALUES
	(6, 'barma', '8cb2237d0679ca88db6464eac60da96345513964', '1202', 2, 2, 'Website Wings Kork Karbol', '1401371374buku_mentoring_islam_elektronik_41.pdf', '2014-05-29', 3, '', 'active'),
	(8, 'indomedia', '8cb2237d0679ca88db6464eac60da96345513964', '1301', 1, 1, 'Website Indomedia', '14013713431.-pengenalan.pdf', '2014-05-29', 4, '', 'active');
/*!40000 ALTER TABLE `prakerin` ENABLE KEYS */;


-- Dumping structure for table hubin.prestasi_siswa
CREATE TABLE IF NOT EXISTS `prestasi_siswa` (
  `id_prestasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `prestasi` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_prestasi`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.prestasi_siswa: 5 rows
DELETE FROM `prestasi_siswa`;
/*!40000 ALTER TABLE `prestasi_siswa` DISABLE KEYS */;
INSERT INTO `prestasi_siswa` (`id_prestasi`, `id_siswa`, `prestasi`) VALUES
	(1, 1, 'Rangking 5 & 2 kelas X semester I & II di SMK Adi Sanggoro'),
	(2, 1, 'Rangking 2 & 1 kelas XI semester III & IV  di SMK Adi Sanggoro'),
	(3, 1, 'Rangking 1 XII semester V di SMK Adi Sanggoro'),
	(4, 1, 'Juara 7 LKS Web Design Kabupaten Bogor, tahun 2012'),
	(5, 1, 'Juara 3 LKS Web Design Kabupaten Bogor, tahun 2013');
/*!40000 ALTER TABLE `prestasi_siswa` ENABLE KEYS */;


-- Dumping structure for table hubin.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `salt` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nama_siswa` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_jurusan` int(11) NOT NULL DEFAULT '1',
  `tmp_lhr_siswa` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tgl_lhr_siswa` date NOT NULL,
  `jk_siswa` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `negara_siswa` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `agama_siswa` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `status_siswa` enum('Menikah','Belum Menikah') COLLATE latin1_general_ci NOT NULL DEFAULT 'Belum Menikah',
  `alamat_siswa` text COLLATE latin1_general_ci NOT NULL,
  `tlp_siswa` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email_siswa` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `foto_siswa` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `ktp_siswa` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `id_ta` int(11) NOT NULL DEFAULT '1',
  `ket_siswa` enum('lulus','belum') COLLATE latin1_general_ci NOT NULL DEFAULT 'belum',
  `siswa_ket` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tempat_ket` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `posisi_ket` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `pesan_ket` text COLLATE latin1_general_ci NOT NULL,
  `status_reg` enum('active','non') COLLATE latin1_general_ci NOT NULL,
  `status` enum('active','non') COLLATE latin1_general_ci NOT NULL DEFAULT 'non',
  PRIMARY KEY (`id_siswa`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.siswa: 10 rows
DELETE FROM `siswa`;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`id_siswa`, `user`, `pass`, `salt`, `nama_siswa`, `id_jurusan`, `tmp_lhr_siswa`, `tgl_lhr_siswa`, `jk_siswa`, `negara_siswa`, `agama_siswa`, `status_siswa`, `alamat_siswa`, `tlp_siswa`, `email_siswa`, `foto_siswa`, `ktp_siswa`, `id_ta`, `ket_siswa`, `siswa_ket`, `tempat_ket`, `posisi_ket`, `pesan_ket`, `status_reg`, `status`) VALUES
	(1, 'eiji', '14d60b9d8c3c46e1451e186ede16ec54bfe7eee0', '1402', 'Zainu Rochim', 2, 'Tangerang', '1996-08-22', 'Laki-laki', 'Indonesia', 'Islam', 'Belum Menikah', 'Bukit Asri Block C 20 No 10 Kec. Ciomas Kab.Bogor', '085777909254', 'rochimeiji96@gmail.com', '1401845399400x522.jpg', '3201292308860004', 5, 'lulus', 'Kuliah', 'Balkan', 'IT Management', 'Mencari ilmu sebanyak-banyaknya', 'active', 'active'),
	(2, 'fauzi', '8cb2237d0679ca88db6464eac60da96345513964', '1402', 'Fauzi Fathurrahman', 2, 'Bogor', '1996-01-17', 'Laki-laki', '', '', 'Belum Menikah', '', '', 'fauzi@gmail.com', '1400871054KL2.jpg', '', 5, 'lulus', 'Mencari Kerja', '', 'Web Design And Development', 'Ingin mencari tempat kerja yang gajinya besar dan dapat jaminan,.', 'active', 'active'),
	(3, 'hizbi', '8cb2237d0679ca88db6464eac60da96345513964', '1401', 'Nurul Hizbi Mubarok', 1, 'Bogor', '1996-12-14', 'Laki-laki', 'Indonesia', 'Islam', 'Belum Menikah', 'Desa Cinangneng Rt 08/01 Tenjolaya Bogor', '085779629404', 'mn.hizbi@gmail.com', '1400871000CAM00444.jpg', '', 5, 'lulus', '', '', '', '', 'active', 'active'),
	(4, 'tita', '8cb2237d0679ca88db6464eac60da96345513964', '1402', 'Tita Aprilianti', 2, 'Bogor', '0000-00-00', 'Perempuan', '', 'Islam', 'Belum Menikah', '', '', 'tita@gmail.com', '13990378492525_320243721448857_572526467_n.png', '', 5, 'lulus', 'Bekerja', 'PT AIR', 'Design Graphic', 'SubhanAllah berkerja di PT AIR menyenangkan ^^', 'active', 'active'),
	(5, 'rochman', '8cb2237d0679ca88db6464eac60da96345513964', '1401', 'Zainu Rochman', 1, '', '0000-00-00', '', '', '', 'Belum Menikah', '', '', 'rochman.ryeka@gmail.com', '', '', 5, 'belum', '', '', '', '', 'active', 'active'),
	(6, 'abdul', '8cb2237d0679ca88db6464eac60da96345513964', '1402', 'Abdul Rahmat', 2, '', '0000-00-00', '', '', '', 'Belum Menikah', '', '', 'abdul@gmail.com', '', '', 5, 'belum', '', '', '', '', 'active', 'active'),
	(8, 'sehab', '8cb2237d0679ca88db6464eac60da96345513964', '1403', 'Sehab', 3, '', '0000-00-00', '', '', '', 'Belum Menikah', '', '', '', '', '', 5, 'belum', '', '', '', '', 'active', 'active'),
	(9, 'maudiawan', '8cb2237d0679ca88db6464eac60da96345513964', '1401', 'Maudiawan', 1, '', '0000-00-00', '', '', '', 'Belum Menikah', '', '', '', '', '', 5, 'belum', '', '', '', '', 'active', 'active'),
	(10, 'ridwan', '8cb2237d0679ca88db6464eac60da96345513964', '1401', 'Ridwan Fadli', 1, '', '0000-00-00', '', '', '', 'Belum Menikah', '', '', '', '', '', 5, 'belum', '', '', '', '', 'active', 'active'),
	(11, 'febri', '8cb2237d0679ca88db6464eac60da96345513964', '1401', 'Febriansyah', 1, '', '0000-00-00', 'Laki-laki', 'Indonesia', 'Islam', 'Menikah', '', '', '', '1401691916CAM00508 copy.jpg', '', 5, 'belum', '', '', '', '', 'active', 'active');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;


-- Dumping structure for table hubin.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `img_slider` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `content_slider` text COLLATE latin1_general_ci NOT NULL,
  `status` enum('active','non') COLLATE latin1_general_ci NOT NULL DEFAULT 'non',
  PRIMARY KEY (`id_slider`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.slider: 5 rows
DELETE FROM `slider`;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` (`id_slider`, `img_slider`, `content_slider`, `status`) VALUES
	(1, 'slider1.jpg', '<h1 style=\'color:#333\'>Only Love Allah SWT</h1>\r\n          <p>The believers are only those who, when Allâh is mentioned, feel a fear in their hearts and when .... One I seek, One I worship, One I love, One I call. my ALLAH</p>\r\n          <p><a class="btn btn-large btn-primary" href="#">To Allah :)</a></p>', 'active'),
	(2, 'slider2.jpg', '<p>#IndnonesiaMilikAllah #Khilafah</p>', 'active'),
	(3, 'slider3.jpg', '<h1>Example headline.</h1>\r\n          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n          <p><a class="btn btn-large btn-primary" href="#">Sign up today</a></p>', 'active'),
	(4, '1401416335wallpaper-2465749.jpg', '<p>A Beautyfull Landscape<br></p>', 'active'),
	(7, '1401418674wallpaper-34553.jpg', '<p>Sunset from mountain</p>', 'active');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;


-- Dumping structure for table hubin.ta
CREATE TABLE IF NOT EXISTS `ta` (
  `id_ta` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ta` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `lulusan` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `hast_ta` varchar(5) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_ta`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.ta: 7 rows
DELETE FROM `ta`;
/*!40000 ALTER TABLE `ta` DISABLE KEYS */;
INSERT INTO `ta` (`id_ta`, `nama_ta`, `lulusan`, `hast_ta`) VALUES
	(1, '2009 / 2010', '2010', '10'),
	(2, '2010 / 2011', '2011', '11'),
	(3, '2011 / 2012', '2012', '12'),
	(4, '2012 / 2013', '2013', '13'),
	(5, '2013 / 2014', '2014', '14'),
	(6, '2014 / 2015', '2015', '15'),
	(7, '2015 / 2016', '2016', '16');
/*!40000 ALTER TABLE `ta` ENABLE KEYS */;


-- Dumping structure for table hubin.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `nama_user` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `foto_user` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `role` enum('admin','user') COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `status` enum('active','non') COLLATE latin1_general_ci NOT NULL DEFAULT 'non',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table hubin.user: 2 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `user`, `pass`, `nama_user`, `foto_user`, `role`, `status`) VALUES
	(1, 'admin', '22d43d6b3444e3103b6e397be0ceec94f59eb465', 'Admin', '', 'admin', 'active'),
	(2, 'hubin', '22d43d6b3444e3103b6e397be0ceec94f59eb465', 'Neng Erlita', '', 'admin', 'active');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
