-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 06:06 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkamping`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `idbanner` int(11) NOT NULL,
  `img` text NOT NULL,
  `text1` text NOT NULL,
  `text2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`idbanner`, `img`, `text1`, `text2`) VALUES
(1, 'slide-06.jpg', 'New arrivals', 'Men Collection 2020'),
(2, 'slide-02.jpg', 'Jackets & Coats', 'Men New-Season'),
(3, 'slide-04.jpg', 'NEW SEASON', 'Women Collection 2020');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `sitename` varchar(40) NOT NULL,
  `tagline` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `addressStore` text NOT NULL,
  `noTlp` varchar(14) NOT NULL,
  `tentangToko` text NOT NULL,
  `fotoToko` varchar(50) NOT NULL,
  `fotoLogo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `sitename`, `tagline`, `email`, `addressStore`, `noTlp`, `tentangToko`, `fotoToko`, `fotoLogo`) VALUES
(1, 'Ryan Jeans', 'Your Best Adventure Partner edit', 'hyugadventure@gmail.comdit', '<p>Desa Surabayan Rt 03 Rw 02 Kec wonopringgo Kab Pekallongan Kota Pekalongan edit</p>', '085773222616', '', 'fotoToko.jpg', 'logoSite.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kodebarang` int(11) NOT NULL,
  `kodedetil` int(1) DEFAULT NULL,
  `namabarang` varchar(80) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `stok` int(4) NOT NULL,
  `deskripsiSingkat` varchar(200) NOT NULL,
  `deskripsi` text,
  `foto` text,
  `counter` int(5) NOT NULL,
  `view` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kodebarang`, `kodedetil`, `namabarang`, `harga`, `stok`, `deskripsiSingkat`, `deskripsi`, `foto`, `counter`, `view`) VALUES
(7, 6, 'Tenda Proterra Tent', 750000, 8, '', '<p>-</p>', '', 1, '2020-07-01'),
(8, 6, 'Tenda Montana X4 Tent', 700000, 10, '', '<p>-</p>', '', 1, '2020-06-30'),
(9, 6, 'Tenda Great Outdoor 2', 725000, 10, '', '<p>-</p>', '', 2, '2020-06-29'),
(10, 3, 'Ultra Bright 67-c', 125000, 10, '', '<p>Ultra Bright 67-LED 4-Mode Headlamp. Light up through darkness.</p>', '', 5, '2020-06-30'),
(11, 7, 'Tas Carrier REI Inthanon', 225000, 10, '', '<p>-</p>', '', 5, '2020-06-29'),
(12, 7, 'Tas Carrier x', 200000, 10, '', '<p>-</p>', '', 1, '2020-06-29'),
(13, 3, 'Ultra Bright a', 125000, 10, '', '<p>Ultra Bright 67-LED 4-Mode Headlamp. Light up through darkness.</p>', '', 13, '2020-06-29'),
(14, 3, 'Ultra Bright 67-LED 4-Mode', 125000, 10, '', '<p>Ultra Bright 67-LED 4-Mode Headlamp. Light up through darkness.</p>', '', 10, '2020-06-29'),
(15, 3, 'Ultra Bright 67-b', 125000, 10, '', '<p>Ultra Bright 67-LED 4-Mode Headlamp. Light up through darkness.</p>', '', 4, '2020-06-30'),
(16, 7, 'Tas Carrier hhh', 200000, 10, '', '<p>-</p>', '', 5, '2020-06-29'),
(17, 7, 'Tas Carrier REI ', 200000, 10, '', '<p>-</p>', '', 1, '2020-06-29'),
(18, 7, 'Tas Carrier b', 200000, 10, '', '<p>-</p>', '', 4, '2020-06-30'),
(19, 7, 'Tas Carrier a', 240000, 1, '', '<p>-</p>', '', 5, '2020-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_content`
--

CREATE TABLE `tb_content` (
  `kodecontent` int(1) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `isicontent` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_content`
--

INSERT INTO `tb_content` (`kodecontent`, `judul`, `isicontent`) VALUES
(4, 'Tata Cara Pemesanan', 'Data Tata Cara Pemesanan Belum Tersedia'),
(3, 'Contact Person', 'Data Contact Person Belum Tersedia'),
(1, 'Profil', 'Data Profil Belum Tersedia'),
(2, 'Cara Pembayaran', 'Cara Pembayaran belum tersedia'),
(5, 'Garansi Uang Kembali', 'informasi Garansi Uang Kembali belum tersedia'),
(6, 'Tentang Kami', 'informasi Tentang Kami belum tersedia'),
(7, 'Ongkos Kirim', 'informasi ongkos kirim belum tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detilkategori`
--

CREATE TABLE `tb_detilkategori` (
  `kodedetil` int(11) NOT NULL,
  `namadetil` varchar(40) DEFAULT NULL,
  `fotoKategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detilkategori`
--

INSERT INTO `tb_detilkategori` (`kodedetil`, `namadetil`, `fotoKategori`) VALUES
(3, 'Headlamp', 'Headlamp.png'),
(6, 'Tenda', 'Tenda.png'),
(7, 'Tas Carrier', 'Tas Carrier.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detilnota`
--

CREATE TABLE `tb_detilnota` (
  `nomornota` varchar(11) NOT NULL,
  `tglnota` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `kodebarang` int(5) DEFAULT NULL,
  `banyak` int(2) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `proses` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detilnota`
--

INSERT INTO `tb_detilnota` (`nomornota`, `tglnota`, `username`, `kodebarang`, `banyak`, `harga`, `proses`) VALUES
('0001', '2020-07-01', 'saputra', 6, 2, 2000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(11) NOT NULL,
  `kodebarang` int(5) DEFAULT NULL,
  `kodepelanggan` int(5) DEFAULT NULL,
  `banyak` int(2) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id`, `kodebarang`, `kodepelanggan`, `banyak`, `harga`) VALUES
(8, 7, 5, 1, NULL),
(9, 14, 5, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kodepelanggan` int(5) NOT NULL,
  `namadepan` varchar(20) DEFAULT NULL,
  `namabelakang` varchar(20) DEFAULT NULL,
  `tempatlahir` varchar(15) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `kota` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `nomorhp` varchar(15) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `alamat` varchar(70) DEFAULT NULL,
  `foto` varchar(60) NOT NULL,
  `codeAktivasiAkun` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kodepelanggan`, `namadepan`, `namabelakang`, `tempatlahir`, `tgllahir`, `kota`, `email`, `nomorhp`, `username`, `password`, `status`, `alamat`, `foto`, `codeAktivasiAkun`) VALUES
(4, 'Saputra', '', 'Pontianak', '1980-01-20', 'Pontianak', 'saputra@yahoo.co.id', '-', 'saputra', '0a659aac1778efd4c118b3ca051d8a42', 1, NULL, '', ''),
(5, 'Lely', 'Yati', 'Pontianak', '1989-11-10', 'Pontianak', 'lely@yahoo.com', '-', 'lely', 'deb574e7ea12208a2846b90e1ade564b', 1, NULL, '', ''),
(6, 'Kristi', 'Yanti', 'Pontianak', '1985-07-06', 'Pontianak', 'kristi@yahoo.com', '-', 'kristi', 'eedf080e46e02c103fb1081643ff90c5', 1, NULL, '', ''),
(8, 'Rahayu', 'Puspita', 'Sragen', '1996-07-13', 'Sragen', 'rahayupuspita@yahoo.co.id', '08321434523', 'rahayu', 'c6e515af5a6de23c1c258be31fca01c8', NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `idpemesanan` int(11) NOT NULL,
  `kodepelanggan` int(11) NOT NULL,
  `kodetransaksi` varchar(15) NOT NULL,
  `namadepan` varchar(20) NOT NULL,
  `namabelakang` varchar(20) NOT NULL,
  `notlp` varchar(14) NOT NULL,
  `alamatpenerima` varchar(200) NOT NULL,
  `daerah` varchar(20) NOT NULL,
  `kdpos` int(5) NOT NULL,
  `tglbeli` date NOT NULL,
  `tglkirim` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`idpemesanan`, `kodepelanggan`, `kodetransaksi`, `namadepan`, `namabelakang`, `notlp`, `alamatpenerima`, `daerah`, `kdpos`, `tglbeli`, `tglkirim`, `status`) VALUES
(4, 4, 'RJG7ZjzJxkDybYX', 'ddd', 'dddd', '3333333', 'dd', 'ddddd', 333, '2020-06-30', '2020-07-01', 'Sukses'),
(5, 4, 'RJj3T8fnRrtVOxC', 'aaa', 'a', '3333333', 'sssss', 'sssssss', 333333, '2020-06-30', '2020-07-01', 'Sukses'),
(6, 4, 'RJr1dcCV4GJEO8f', 'S', 'S', '3333', 'S', 'A', 33, '2020-06-30', '0000-00-00', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_polling`
--

CREATE TABLE `tb_polling` (
  `id` int(11) NOT NULL,
  `question` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `answer1` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `answer2` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `answer3` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `answer4` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `vote1` int(10) NOT NULL,
  `vote2` int(10) NOT NULL,
  `vote3` int(10) NOT NULL,
  `vote4` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_polling`
--

INSERT INTO `tb_polling` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `vote1`, `vote2`, `vote3`, `vote4`) VALUES
(1, 'Menurut Anda Bagaimana Tampilan Website ini?', 'Bagus', 'Lumayan', 'Biasa', 'Jelek', 510, 249, 177, 1095);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transfer`
--

CREATE TABLE `tb_transfer` (
  `nomortransfer` int(5) NOT NULL,
  `nomornota` varchar(5) DEFAULT NULL,
  `tgltransfer` date DEFAULT NULL,
  `namabank` varchar(20) DEFAULT NULL,
  `pemilikrekening` varchar(40) DEFAULT NULL,
  `jumlahuang` double DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `pesan` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transfer`
--

INSERT INTO `tb_transfer` (`nomortransfer`, `nomornota`, `tgltransfer`, `namabank`, `pemilikrekening`, `jumlahuang`, `status`, `pesan`) VALUES
(1, '00001', '2016-06-28', 'Bank Mandiri', 'Saputra', 11499000, 1, 'Telah ditransfer.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`) VALUES
(18, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `vbarang`
--

CREATE TABLE `vbarang` (
  `kodebarang` int(11) DEFAULT NULL,
  `namabarang` varchar(80) DEFAULT NULL,
  `namadetil` varchar(40) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `deskripsi` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vinvoice`
--

CREATE TABLE `vinvoice` (
  `nomornota` varchar(11) DEFAULT NULL,
  `tglnota` date DEFAULT NULL,
  `namabarang` varchar(80) DEFAULT NULL,
  `banyak` int(2) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `proses` int(1) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vkeranjang`
--

CREATE TABLE `vkeranjang` (
  `kodebarang` int(5) DEFAULT NULL,
  `namabarang` varchar(80) DEFAULT NULL,
  `banyak` int(2) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vnota`
--

CREATE TABLE `vnota` (
  `nomornota` int(11) NOT NULL,
  `tglnota` date DEFAULT NULL,
  `idpemesanan` int(5) NOT NULL,
  `kodebarang` int(5) NOT NULL,
  `banyak` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vnota`
--

INSERT INTO `vnota` (`nomornota`, `tglnota`, `idpemesanan`, `kodebarang`, `banyak`) VALUES
(2, '2020-06-30', 4, 8, 3),
(3, '2020-06-30', 5, 7, 1),
(4, '2020-06-30', 5, 10, 2),
(5, '2020-06-30', 6, 10, 1),
(6, '2020-06-30', 6, 18, 4),
(7, '2020-06-30', 5, 7, 1),
(8, '2020-06-30', 5, 7, 1);

--
-- Triggers `vnota`
--
DELIMITER $$
CREATE TRIGGER `jual_produk` AFTER INSERT ON `vnota` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok=stok-NEW.banyak
    WHERE kodebarang=NEW.kodebarang;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`idbanner`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kodebarang`),
  ADD KEY `kodedetil` (`kodedetil`);

--
-- Indexes for table `tb_content`
--
ALTER TABLE `tb_content`
  ADD PRIMARY KEY (`kodecontent`);

--
-- Indexes for table `tb_detilkategori`
--
ALTER TABLE `tb_detilkategori`
  ADD PRIMARY KEY (`kodedetil`);

--
-- Indexes for table `tb_detilnota`
--
ALTER TABLE `tb_detilnota`
  ADD KEY `nomornota` (`nomornota`),
  ADD KEY `kodebarang` (`kodebarang`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodebarang` (`kodebarang`),
  ADD KEY `kodepelanggan` (`kodepelanggan`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kodepelanggan`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`idpemesanan`);

--
-- Indexes for table `tb_polling`
--
ALTER TABLE `tb_polling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transfer`
--
ALTER TABLE `tb_transfer`
  ADD PRIMARY KEY (`nomortransfer`),
  ADD KEY `nomornota` (`nomornota`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vnota`
--
ALTER TABLE `vnota`
  ADD PRIMARY KEY (`nomornota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `idbanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `kodebarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_content`
--
ALTER TABLE `tb_content`
  MODIFY `kodecontent` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_detilkategori`
--
ALTER TABLE `tb_detilkategori`
  MODIFY `kodedetil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `kodepelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `idpemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_polling`
--
ALTER TABLE `tb_polling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_transfer`
--
ALTER TABLE `tb_transfer`
  MODIFY `nomortransfer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vnota`
--
ALTER TABLE `vnota`
  MODIFY `nomornota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
