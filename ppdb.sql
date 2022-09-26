-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 10:43 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(10) UNSIGNED NOT NULL,
  `namaadmin` varchar(30) DEFAULT NULL,
  `login` varchar(10) DEFAULT NULL,
  `passwd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `namaadmin`, `login`, `passwd`) VALUES
(1, 'Belum', '-', ''),
(2, 'Sutikno', 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Susana S', 'susana', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `autonum`
--

CREATE TABLE `autonum` (
  `akey` varchar(10) NOT NULL,
  `aval` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autonum`
--

INSERT INTO `autonum` (`akey`, `aval`) VALUES
('IDPRES', 2),
('NODAFTAR', 8);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `idbank` int(3) UNSIGNED NOT NULL,
  `namabank` varchar(20) DEFAULT NULL,
  `norekening` varchar(20) DEFAULT NULL,
  `atasnama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`idbank`, `namabank`, `norekening`, `atasnama`) VALUES
(1, 'Belum Bayar', '-', '-'),
(2, 'Bayar Di Sekolah', '-', '-'),
(3, 'BNI46', '2423423424', 'dfgdfgdfg'),
(4, 'Bank BCA', '8989898989898', 'Susanti'),
(5, 'Mandiri', '2423423424', 'dfgdfgdfg'),
(6, 'Permata', '89898989898', 'Susana');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `idberita` int(10) UNSIGNED NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isiberita` text NOT NULL,
  `tglpost` timestamp NOT NULL DEFAULT current_timestamp(),
  `namaadmin` varchar(30) NOT NULL,
  `dibaca` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `aktif` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`idberita`, `judul`, `isiberita`, `tglpost`, `namaadmin`, `dibaca`, `aktif`) VALUES
(1, 'Disnaker Banyumas tinjau Bursa Kerja Khusus Giripuro Sumpiuh', '<p>Banyumas , &ndash; Karena perubahan peraturan tentang Perizinan Bursa Kerja Disnaker Kabupaten Banyumas turun lakukan peninjauan ke BKK seperti yang terpantau Sumaterapot Banyumas Selasa (23/3)</p>\r\n\r\n<p>Tampak hadir Slamet Solechan Kabid P3K2T ,Maya Yuliani Kasi Penempatan TK,Agus Widodo-Pengantar Kerja Ahli Madia dan Riza Susanto-operator disambut staf BKK memasuki ruangan kantor mengawali kunjungannya.</p>\r\n\r\n<p>Bertempat di ruang Kantor BKK Giripuro ,Slamet Solechan selaku yg mewakili Dinas mengatakan &rdquo; Untuk aturan perizinan Bursa Kerja yang dulunya setiap tahun sekarang cukup sekali dan melaporkan input data ke Disnaker setiap bulannya&rdquo;jadi cuma satu kali saja tambahnya.Ia pun melakukan pemeriksaan fasilitas BKK seperti tempat pencari kerja maupun ruangan yang lain yang kebetulan juga selesai renofasi.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Andi selaku pengurus BKK Giripuro mengatakan &rdquo; BKK Giripuro mempunyai program menawarkan lowongan kerja kepada para alumni SMK Giripuro Sumpiuh dar berbagai perusahaan di wilayah Jakarta dan sekitarnya&rdquo; dan juga secara ijon artinya rencana untuk yang masih klas XII sehingga letika lulus bisa lamgsung bekerja imbuhnya.</p>\r\n\r\n<p>Bkk Giripuro juga bekerja sama dengan Assosiasi Bursa Kerja Khusus diberbagai daerah termasuk Kebumen dan Purwokerto dalam perekrutan sehingga bisa dengan cepat dan setiap saat bisa mengirim tenaga kerja yang dibutuhkan Industri .</p>\r\n', '2021-06-26 04:40:31', 'Sutikno', 2, 'Y'),
(2, 'Kegiatan Pramuka SMK Giripuro Sumpiuh\r\n', '<p>Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh</p>\r\n<p>Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh</p>\r\n<p>Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh</p>\r\n<p>Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh Kegiatan Pramuka SMK Giripuro Sumpiuh</p>', '2021-06-26 04:41:51', 'Juni Astuti', 1, 'Y'),
(3, 'Pendaftaran Peserta Didik Baru SMK Giripuro Sumpiuh', '<p>The development of computer technology in this saaat semangkin sophisticated and have entered the international market, many offices and private agencies that use this tekniologi. The computer is a tool that komunikjasi familiar among the public, but can be used as a tool to ease the work of man can also be used as a means of communication through the virtual world by interacting with each other from one country to another. By this author conducted research at the school SDN 8 SEMULUT. In SDN 8 SEMULUT currently in dire need of the existence of a system of information that is very helpful in the process of admission of new students, a new student information system. Few existing SD N 8 SEMULUT can be solved with this system. Because of the above, the authors feel that the computerized system is needed for enrollment information system barupada SDN 8 SEMULUT. So it can cope with experiences to the system that is currently running. With this system expected administrative errors and delays in reporting that often happened before can be minimized, thus resulting information will be more quickly and accurately</p>\r\n', '2021-07-31 04:35:09', 'Sutikno', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `bukutamu`
--

CREATE TABLE `bukutamu` (
  `idbktamu` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `komentar` text NOT NULL,
  `tglpost` timestamp NOT NULL DEFAULT current_timestamp(),
  `tampil` varchar(1) NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukutamu`
--

INSERT INTO `bukutamu` (`idbktamu`, `email`, `nama`, `komentar`, `tglpost`, `tampil`) VALUES
(1, 'mascantik@gmail.com', 'Uedan tenan', 'wow, bagua sekali sekolahnya, bermutu', '2021-06-07 17:00:00', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `gurustaff`
--

CREATE TABLE `gurustaff` (
  `idgurustaff` int(10) UNSIGNED NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tugas` varchar(30) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gurustaff`
--

INSERT INTO `gurustaff` (`idgurustaff`, `nama`, `tugas`, `facebook`, `instagram`) VALUES
(1, 'Suparmi', 'Guru Matematika', 'http://facebook.com', 'http://instagram.com'),
(2, 'Nandart Karyono', 'Guru Otomotif', 'http://facebook.com', 'http://instagram.com');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `idjurusan` varchar(10) NOT NULL,
  `namajurusan` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `ppdbsiswa` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`idjurusan`, `namajurusan`, `deskripsi`, `ppdbsiswa`) VALUES
('DPIB', 'Desain Pemodelan Informasi Bangunan', 'Kompetensi keahlian yang mempelajari tentang perencanaan bangunan, pelaksanaan pembuatan gedung dan perbaikan gedung. kegiatannya adalah belajar menggambar rumah, gedung dan apartemen, menghitung biaya bangunan, melaksankan pembangunan dan memelihara kontruksi.', 50),
('TITL', 'Teknik Instalasi Tenaga Listrik', 'Kompetensi Keahlian Teknik Keahlian Teknik Instalasi Tenaga Listrik mendidik peserta didik dengan keahlian dan ketrampilan dalam Perencanaan  dan Pemasangan Panel control, Instalasi gudang, Instalasi Pembumian dan Tenaga. Agar  lulusannya dapat  bekerja, baik secara mandiri maupun di Dunia Industri sebagai  tenaga  kerja  tingkat  Menengah.', 50),
('TKJ', 'Teknik Komputer dan Jaringan', 'Kompetensi Keahlian ini membekali peserta didik menguasai konsep dan mendesain suatu jaringan komputer dengan metode keamanan data pada komputer, konsep subneting routing dan setting internet. Lulusan Teknik Komputer Jaringan mampu untuk menjadi profesi sebagai Computer Network Engineer, Network Administrator, Security System, Cyber Security Analyst, dan lain-lain.', 50),
('TKRO', 'Teknik Kendaraan Ringan Otomotif', 'Kompetensi keahlian Teknik Kendaraan Ringan Otomotif dibekali dengan ilmu pengetahuan dan keterampilan dalam perawatan dan perbaikan motor otomotif, Perawatan dan perbaikan system pemindah tenaga otomotif,  Perawatan dan perbaikan chasis dan suspense otomotif, Perawatan dan perbaikan system kelistrikan otomotif serta dibekali kemampuan dalam berwirausaha sesuai dengan perkembangan kebutuhan masyarakat, dunia industri.', 50),
('TP', 'Teknik Pemesinan', 'Kompeteni Keahlian Teknik Perkakas jurusan yang mempelajari tentang energi dan sumber energinya. Hal-hal yang dipelajari dalam teknik mesin seperti Las Bubut, Frais  CNC, Fabrikasi logam dan CAD/ Auto Cad.', 50),
('XXX', 'Belum Ada', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `nodaftar` varchar(8) NOT NULL,
  `tgldaftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(40) NOT NULL,
  `passwd` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jeniskel` varchar(1) NOT NULL DEFAULT 'L',
  `tmplahir` varchar(30) NOT NULL,
  `tgllahir` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(40) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `asalsekolah` varchar(40) NOT NULL,
  `kotasekolah` varchar(40) NOT NULL,
  `namaayah` varchar(40) NOT NULL,
  `pekerjaanayah` varchar(20) NOT NULL,
  `namaibu` varchar(40) NOT NULL,
  `pekerjaanibu` varchar(20) NOT NULL,
  `teleponayah` varchar(20) NOT NULL,
  `teleponibu` varchar(20) NOT NULL,
  `namawali` varchar(40) NOT NULL,
  `pekerjaanwali` varchar(20) NOT NULL,
  `teleponwali` varchar(20) NOT NULL,
  `nilaiijazah` decimal(10,2) NOT NULL,
  `nilaiun` decimal(10,2) NOT NULL,
  `sertifikat` decimal(10,2) NOT NULL,
  `score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `idjurusan` varchar(10) NOT NULL DEFAULT 'XXX',
  `tglbayar` varchar(10) DEFAULT '0000-00-00',
  `jmlbayar` int(10) DEFAULT 0,
  `tglverifikasi` varchar(10) DEFAULT '0000-00-00',
  `idadmin` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `idbank` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`nodaftar`, `tgldaftar`, `email`, `passwd`, `nama`, `jeniskel`, `tmplahir`, `tgllahir`, `alamat`, `kota`, `telepon`, `asalsekolah`, `kotasekolah`, `namaayah`, `pekerjaanayah`, `namaibu`, `pekerjaanibu`, `teleponayah`, `teleponibu`, `namawali`, `pekerjaanwali`, `teleponwali`, `nilaiijazah`, `nilaiun`, `sertifikat`, `score`, `idjurusan`, `tglbayar`, `jmlbayar`, `tglverifikasi`, `idadmin`, `idbank`) VALUES
('20210008', '2021-08-05 16:24:23', 'adi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Adi Saptono', 'L', 'Banyumas', '2005-10-18', 'Karangsalam', 'Kemranjen', '0123456789', 'SMP N2 Kemranjen', 'Kemranjen', 'Budi', 'Wiraswasta', 'Ani', 'Ibu Rumah Tangga', '0123456789', '0123456789', '', '', '', '89.00', '34.00', '0.00', '123.00', 'DPIB', '2021-08-01', 150000, '2021-08-06', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `idprestasi` varchar(12) NOT NULL,
  `nodaftar` varchar(8) NOT NULL,
  `keterangan` text NOT NULL,
  `tingkat` tinyint(1) UNSIGNED NOT NULL,
  `peringkat` tinyint(1) UNSIGNED NOT NULL,
  `nilai` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `idprofil` int(10) UNSIGNED NOT NULL,
  `judul` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `tampil` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`idprofil`, `judul`, `deskripsi`, `tampil`) VALUES
(1, 'Sambutan', '<p>SMK Giripuro Sumpiuh adalah Sekolah Menengah Kejuruan yang berbasis khusus di bidang Teknologi yang saat ini bernaung di Yayasan Pendidikan Teknilogi Giripuro.</p>', 'Y'),
(2, 'Sejarah', '<p>Sekolah Menengah Kejuruan (SMK) Giripuro Sumpiuh merupakan SMK tertua di kawasan Kecamatan Sumpiuh berdiri sejak tahun 1968 sehingga menjadikan SMK Giripuro handal dan terpercaya. Terakreditasi A dan ISO 9001:2015.</p>\r\n<p>\r\nDahulu bernama STM (Sekolah Teknik Menengah) Giripuro Sumpiuh. Seiring dengan perkembangan dunia pendidikan sekarang bernama SMK Giripuro Sumpiuh dengan sebutan keren SMK GP.</p>', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `namasekolah` varchar(40) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(40) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `teleponwa` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `gmap` varchar(30) NOT NULL,
  `intro` text NOT NULL,
  `ppdbaktif` varchar(1) NOT NULL DEFAULT 'Y',
  `ppdbmulai` varchar(10) NOT NULL,
  `ppdbselesai` varchar(10) NOT NULL,
  `wappdb` varchar(16) DEFAULT NULL,
  `biayappdb` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `namasekolah`, `alamat`, `kota`, `telepon`, `teleponwa`, `email`, `facebook`, `instagram`, `youtube`, `gmap`, `intro`, `ppdbaktif`, `ppdbmulai`, `ppdbselesai`, `wappdb`, `biayappdb`) VALUES
(1, 'SMK Giripuro Sumpiuh', 'Jalan Giritomo No. 15 Sumpiuh (Belakang SMPN 2 Sumpiuh)', 'Kab. Banyumas, Jawa Tengah', '(0282) 497681', '888999888', 'smkgp_sph@ymail.com', 'https://www.facebook.com/SMK-Giripuro-Sumpiuh-204553102931386/', 'https://www.instagram.com/smkgiripurosumpiuh/', 'https://www.youtube.com/watch?v=RX963kT5SU4&t=63s', '-7.6086405,109.3540306', 'Sekolah Menengah Kejuruan (SMK) Giripuro Sumpiuh merupakan SMK tertua di kawasan Kecamatan Sumpiuh berdiri sejak tahun 1968 sehingga menjadikan SMK Giripuro handal dan terpercaya. Terakreditasi A dan ISO 9001:2015. Dahulu bernama STM (Sekolah Teknik Menengah) Giripuro Sumpiuh. Seiring dengan perkembangan dunia pendidikan sekarang bernama SMK Giripuro Sumpiuh dengan sebutan keren SMK GP.', 'Y', '2021-06-20', '2021-08-31', '888999888', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `idsertifikat` int(10) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`idsertifikat`, `nama`) VALUES
(1, 'iso-9001'),
(2, 'akreditas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `autonum`
--
ALTER TABLE `autonum`
  ADD PRIMARY KEY (`akey`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`idbank`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`idberita`);

--
-- Indexes for table `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`idbktamu`);

--
-- Indexes for table `gurustaff`
--
ALTER TABLE `gurustaff`
  ADD PRIMARY KEY (`idgurustaff`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`idjurusan`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`nodaftar`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`idprestasi`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`idprofil`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`idsertifikat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `idbank` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `idberita` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `idbktamu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gurustaff`
--
ALTER TABLE `gurustaff`
  MODIFY `idgurustaff` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `idprofil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `idsertifikat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
