-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2013 at 12:44 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sepak_bola`
--

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_berita`
--

CREATE TABLE IF NOT EXISTS `dlmbg_berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `dlmbg_berita`
--

INSERT INTO `dlmbg_berita` (`id_berita`, `id_kategori`, `judul`, `isi`) VALUES
(1, 78520101, 'Rio Ferdinand melarang Wayne Rooney pindah dari MU', '<p>Bek tengah Manchester United, Rio Ferdinand meminta kepada rekan setimnya Wayne Rooney untuk tetap bermain di Manchester United.</p>'),
(11, 78520098, '', '<p><img alt="" style="width: 50px; height: 50px;" src="/ci-bola/asset/content_upload/images/371318_1393292659_1396900492_q.jpg" /></p>'),
(12, 78520104, 'dsdsdd', '<p><img alt="" style="width: 100px; height: 96px; float: left;" src="/ci-bola/asset/content_upload/images/gede-lumbung1.jpg" />dsdsdsd&nbsp;</p>'),
(13, 78520103, 'TPU Carenang', '<p><img alt="" style="width: 200px; height: 136px; float: left;" src="/ci-bola/asset/content_upload/images/maddy12L.jpg" />aselole lorem ipsum&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_buku_tamu`
--

CREATE TABLE IF NOT EXISTS `dlmbg_buku_tamu` (
  `id_buku_tamu` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `st` int(1) NOT NULL,
  PRIMARY KEY (`id_buku_tamu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dlmbg_buku_tamu`
--

INSERT INTO `dlmbg_buku_tamu` (`id_buku_tamu`, `nama`, `email`, `pesan`, `st`) VALUES
(5, 'Herry Rindajawa', 'heribertus@yahoo.co.id', 'Tolong lengkapi berita Rio Ferdinand dan Wayne Rooney. Di berita pertama.\r\nTrim''s.', 1),
(6, 'Gede Becing Becing', 'nadhifa_rava@gmail.com', 'WOW, mantap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_contact`
--

CREATE TABLE IF NOT EXISTS `dlmbg_contact` (
  `id_contact` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dlmbg_contact`
--

INSERT INTO `dlmbg_contact` (`id_contact`, `nama`, `email`, `alamat`, `telepon`, `pesan`) VALUES
(3, 'asu', 'dd', '<p>dd</p>', 'dd', '<p>d</p>');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_galeri`
--

CREATE TABLE IF NOT EXISTS `dlmbg_galeri` (
  `id_galeri` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `dlmbg_galeri`
--

INSERT INTO `dlmbg_galeri` (`id_galeri`, `judul`, `gambar`) VALUES
(10, 'AMD Umuman APU E-Series Terbaru', '22578adf21c5a8a02169047051f2584f.jpg'),
(11, 'sss', 'a7c65174f2d1bfeb6cf8e5b08293b684.png');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_jadwal`
--

CREATE TABLE IF NOT EXISTS `dlmbg_jadwal` (
  `id_jadwal` int(5) NOT NULL AUTO_INCREMENT,
  `id_team_1` int(5) NOT NULL,
  `id_team_2` int(5) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `lapangan` varchar(100) NOT NULL,
  `id_wasit` int(5) NOT NULL,
  `alamat_lapangan` text NOT NULL,
  `id_team_menang` int(10) NOT NULL,
  `score_team1` int(5) NOT NULL,
  `score_team2` int(5) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dlmbg_jadwal`
--

INSERT INTO `dlmbg_jadwal` (`id_jadwal`, `id_team_1`, `id_team_2`, `tanggal`, `lapangan`, `id_wasit`, `alamat_lapangan`, `id_team_menang`, `score_team1`, `score_team2`) VALUES
(4, 34, 15, '2014-08-17', '1', 5, '0', 34, 3, 2),
(5, 31, 26, '2013-08-18', 'Stadion Oepoi', 4, 'Oebufu', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_kabupaten`
--

CREATE TABLE IF NOT EXISTS `dlmbg_kabupaten` (
  `id_kabupaten` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kabupaten` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kabupaten`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `dlmbg_kabupaten`
--

INSERT INTO `dlmbg_kabupaten` (`id_kabupaten`, `nama_kabupaten`) VALUES
(1, 'Kota Kupang'),
(2, 'Kupang'),
(3, 'Belu'),
(4, 'Timur Tengah Utara'),
(5, 'Timur Tengah Selatan'),
(6, 'Alor'),
(7, 'Sikka'),
(8, 'Sabu Raijua'),
(9, 'Rote Ndao'),
(10, 'Nagekeo'),
(11, 'Sumba Barat Daya'),
(12, 'Sumba Barat'),
(13, 'Sumba Timur'),
(14, 'Ende'),
(15, 'Manggarai Timur'),
(16, 'Manggarai Barat'),
(17, 'Flores Timur'),
(18, 'Malaka'),
(19, 'Lembata'),
(20, 'Manggarai'),
(21, 'Ngada'),
(22, 'Sumba Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_kategori`
--

CREATE TABLE IF NOT EXISTS `dlmbg_kategori` (
  `id_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78520105 ;

--
-- Dumping data for table `dlmbg_kategori`
--

INSERT INTO `dlmbg_kategori` (`id_kategori`, `nama_kategori`) VALUES
(78520104, 'Regional NTT'),
(78520103, 'Internasional'),
(78520102, 'Nasional');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_klasemen`
--

CREATE TABLE IF NOT EXISTS `dlmbg_klasemen` (
  `id_klasemen` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `id_team` int(5) NOT NULL,
  `win` int(5) NOT NULL,
  `draw` int(5) NOT NULL,
  `lose` int(5) NOT NULL,
  `gol` int(5) NOT NULL,
  `kms` varchar(100) NOT NULL,
  `poin` int(5) NOT NULL,
  PRIMARY KEY (`id_klasemen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dlmbg_klasemen`
--

INSERT INTO `dlmbg_klasemen` (`id_klasemen`, `nama`, `id_team`, `win`, `draw`, `lose`, `gol`, `kms`, `poin`) VALUES
(5, 'Grup B', 31, 1, 0, 0, 15, '2', 3),
(4, 'Grup A', 34, 2, 0, 1, 20, '0', 3),
(6, 'Grup A', 15, 0, 0, 2, 2, '17', 0),
(7, 'Grup B', 26, 0, 0, 1, 2, '15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_lapangan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_lapangan` (
  `id_lapangan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_lapangan` varchar(100) NOT NULL,
  `alamat_lapangan` text NOT NULL,
  PRIMARY KEY (`id_lapangan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dlmbg_lapangan`
--

INSERT INTO `dlmbg_lapangan` (`id_lapangan`, `nama_lapangan`, `alamat_lapangan`) VALUES
(1, 'Lapangan Buyung', 'Jln. Kompyang Sujanaa');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_menu`
--

CREATE TABLE IF NOT EXISTS `dlmbg_menu` (
  `id_menu` int(5) NOT NULL AUTO_INCREMENT,
  `id_parent` int(5) NOT NULL DEFAULT '0',
  `menu` varchar(50) NOT NULL,
  `url_route` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `dlmbg_menu`
--

INSERT INTO `dlmbg_menu` (`id_menu`, `id_parent`, `menu`, `url_route`, `content`, `jenis`, `posisi`) VALUES
(1, 0, 'Home', 'web', '', '', 'atas'),
(2, 0, 'Berita', 'web/berita', '', '', 'atas'),
(3, 0, 'Pengumuman', 'web/pengumuman', '', '', 'atas'),
(4, 0, 'Galeri', 'web/galeri', '', '', 'atas'),
(5, 0, 'Contact', 'web/contact', '', '', 'atas'),
(6, 0, 'Data Pemain', 'web/pemain', '', '', 'bawah'),
(7, 0, 'Data Team', 'web/team', '', '', 'bawah'),
(8, 0, 'Jadwal Pertandingan', 'web/jadwal', '', '', 'bawah'),
(9, 0, 'Data Wasit', 'web/wasit', '', '', 'bawah'),
(10, 0, 'Data Klasemen', 'web/klasemen', '', '', 'bawah'),
(11, 0, 'Profil', '', '', '', 'atas'),
(12, 0, 'Pendaftaran Team', 'web/pendaftaran', '', '', 'bawah'),
(13, 0, 'Buku Tamu', 'web/buku_tamu', '', '', 'atas'),
(14, 0, 'Log In', 'login', '', '', 'atas');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_pemain`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pemain` (
  `id_pemain` int(5) NOT NULL AUTO_INCREMENT,
  `id_team` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_pemain`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `dlmbg_pemain`
--

INSERT INTO `dlmbg_pemain` (`id_pemain`, `id_team`, `nama`, `keterangan`) VALUES
(8, 31, 'Reynold Dethan', '<p>Kapten Tim - Penyerang</p>'),
(7, 34, 'Rolli Gomes', '<p>Kapten Tim - Penyerang</p>'),
(9, 26, 'Heribertus Rindajawa', '<p>Penjaga Gawang</p>'),
(10, 15, 'Fransisco M. U. Ngedo', '<p>Pemain Belakang</p>'),
(11, 14, 'Januarius Djati', '<p>Penjaga Gawang</p>'),
(12, 13, 'Donatus Boling', '<p>Gelandang Bertahan</p>'),
(13, 25, 'melkianus B. V. Bire', '<p>Pemain Belakang</p>'),
(14, 16, 'Albertus Oktovianus Doni', '<p>Penjaga Gawang</p>');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pendaftaran` (
  `id_pendaftaran` int(10) NOT NULL AUTO_INCREMENT,
  `nama_team` varchar(100) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `promotor` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_pendaftaran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dlmbg_pendaftaran`
--


-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_pengumuman`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pengumuman` (
  `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dlmbg_pengumuman`
--

INSERT INTO `dlmbg_pengumuman` (`id_pengumuman`, `judul`, `isi`) VALUES
(6, 'Upacara Pembukaan El Tari Memorial CUP 2014', ''),
(5, 'Pembukaan pendaftaran El Tari Memorial CUP 2014', '<p>Pendaftaran dibuka pada tanggal 14 Mei 2014.<br />Biaya pendaftaran : Gratis.<br />Dibuka untuk semua Kabupaten yang ada di Nusa Tenggara Timur.</p><p>Batas akhir pendaftaran, 30 Mei 2014.</p><p>Untuk info personal hubungi Reynold Dethan, (082145030891)</p>');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_setting`
--

CREATE TABLE IF NOT EXISTS `dlmbg_setting` (
  `id_setting` int(10) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `dlmbg_setting`
--

INSERT INTO `dlmbg_setting` (`id_setting`, `tipe`, `title`, `content_setting`) VALUES
(1, 'site_title', 'Nama Situs', 'Website Sepak Bola'),
(2, 'site_footer', 'Teks Footer', 'Copyright &copy; 2013 Website Sepak Bola -&nbsp;Designed &amp; Developed by Rolli Gomes'),
(3, 'site_quotes', 'Quotes Situs', 'Media Informasi Seputar Dunia Sepak Bola'),
(4, 'site_theme', 'Nama Tampilan', 'black-inverse'),
(5, 'key_login', 'Key Hash Login', 'AppBola'),
(6, 'site_limit_small', 'Limit Data Kecil', '5'),
(7, 'site_limit_medium', 'Limit Data Medium', '12'),
(8, 'site_welcome', 'Kata Sambutan', 'Kami Menyambut baik terbitnya Website SMAN 9 Pekanbaru yang baru , dengan harapan dipublikasinya website ini sekolah berharap : Peningkatan layanan pendidikan kepada siswa, orangtua, dan masyarakat pada umumnya semakin meningkat. Sebaliknya orangtua dapat mengakses informasi tentang kegiatan akademik dan non akademik putra - puterinya di sekolah ini. Dengan fasilitas ini Siswa dapat mengakses berbagai informasi pembelajaran dan informasi akademik.');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_team`
--

CREATE TABLE IF NOT EXISTS `dlmbg_team` (
  `id_team` int(5) NOT NULL AUTO_INCREMENT,
  `id_kabupaten` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id_team`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `dlmbg_team`
--

INSERT INTO `dlmbg_team` (`id_team`, `id_kabupaten`, `nama`) VALUES
(20, 16, 'PERSAMBA'),
(19, 20, 'PERSIM'),
(18, 19, 'PERSEBATA'),
(17, 2, 'PSK'),
(16, 17, 'PERSEFTIM'),
(15, 14, 'PERSE'),
(14, 3, 'PERSAB'),
(13, 6, 'PERSAP'),
(21, 15, 'PS MARITIM'),
(22, 21, 'PSN'),
(23, 10, 'PERSENA'),
(24, 9, 'PERSEROND'),
(25, 8, 'PERSARA'),
(26, 7, 'PERSAMI'),
(27, 12, 'PERSESBA'),
(28, 11, 'PERSEDAYA'),
(29, 22, 'PERSITENG'),
(30, 13, 'PERSEWA'),
(31, 5, 'PERSS'),
(32, 4, 'PSKN'),
(33, 1, 'PSKK'),
(34, 18, 'PERSEMAL');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_user`
--

CREATE TABLE IF NOT EXISTS `dlmbg_user` (
  `kode_user` binary(24) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dlmbg_user`
--

INSERT INTO `dlmbg_user` (`kode_user`, `username`, `password`, `nama_user`) VALUES
('5e7b22acc62a11e291df14da', 'admin', '176d793476ed8ef48e6bc626f03c2222', 'Rolli Gomes');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_wasit`
--

CREATE TABLE IF NOT EXISTS `dlmbg_wasit` (
  `id_wasit` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_wasit`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `dlmbg_wasit`
--

INSERT INTO `dlmbg_wasit` (`id_wasit`, `nama`, `keterangan`) VALUES
(5, 'Agustinus Fahik', ''),
(4, 'Geraldus da Silva', ''),
(6, 'Muhamad Riber', ''),
(7, 'Dominikus Istanto', ''),
(8, 'Hendrikus Boy Feo', ''),
(9, 'Bernadus Belang', '');
