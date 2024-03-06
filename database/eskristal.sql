-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 10:29 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eskristal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('9fvcsuu2jb1fa8663go25db2dvqoi159', '::1', 1709706524, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393730363338313b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('67aiv7nv048q5fdlpink367tqohmalte', '::1', 1709706821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393730363730323b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('k4grv0vmn1h556foihbd4hvjg91ifp0r', '::1', 1709707083, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393730373037343b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('dff7viumla5uvlb5q8fth5arkcdqupfj', '::1', 1709707618, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393730373434303b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('1l0bd9btqem2q7h1ae5h1oone30s7f44', '::1', 1709708313, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393730383136353b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('6c2uql1k5kbov9gglhakuodh9mte3g1u', '::1', 1709708557, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393730383535373b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('86o88eiq8f1fuur810amlanccr2fdikl', '::1', 1709709287, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393730393130383b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('t3om37n4e98i4k5me1ndblokv2it5v41', '::1', 1709710414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393731303237353b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('1kchtkc9ju1g7pblavi87m1oruoosp5s', '::1', 1709711103, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393731303832353b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('2qhik686a5u3rei3r4mu60r19pt6mch4', '::1', 1709711154, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393731313132383b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('dceuniv5udu0fmu2ous3ugsohthu6f8n', '::1', 1709711683, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393731313433333b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('n27v402gop4lhnp5kveroq2lf2t2aea2', '::1', 1709712048, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393731313739303b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('ncpp6gltfi50v9nigljia3nsq4ml2hsf', '::1', 1709712554, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393731323238323b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('4djjutgaukiljdashliqaf30rel16012', '::1', 1709713258, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393731323939333b5573657249447c733a313a2237223b557365727c733a363a224172697a6b79223b6c6576656c7c733a373a2270656761776169223b666f746f7c733a31313a2264656661756c742e6a7067223b),
('fae18dennmj5ilkmk03i6mgsmo5ujn4f', '::1', 1709713550, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393731333534323b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('chmakdcu4qqn4e5l03u843t07oih5k19', '::1', 1709713990, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393731333938333b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('fb57iaf8s7jlcoo0f0tv3kdl4odg47cv', '::1', 1709714031, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393731343032363b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('udri3sfkqdp4ss82b3q48m44h319ek7d', '::1', 1709714648, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393731343633383b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('5loe99d950gg4qhagl2o8s21idebo9me', '::1', 1709715577, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393731353531373b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kode_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT '0',
  `harga` double NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kode_barang`, `nama_barang`, `brand`, `stok`, `harga`, `active`) VALUES
('ESBLK', 'Es Balok', 'Es kristal mantap', 75, 50000, 'Y'),
('ESKRS', 'Es Kristal', 'Es kristal mantap', 61, 20000, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pembelian`
--

CREATE TABLE `tbl_detail_pembelian` (
  `id_pembelian` varchar(20) NOT NULL,
  `id_barang` varchar(6) NOT NULL,
  `qty` smallint(6) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_pembelian`
--

INSERT INTO `tbl_detail_pembelian` (`id_pembelian`, `id_barang`, `qty`, `harga`) VALUES
('ID1595997781', 'ADVSPK', 2, 35000),
('ID1595997781', 'CTR810', 1, 190000),
('ID1596005126', 'CTR811', 1, 245000);

--
-- Triggers `tbl_detail_pembelian`
--
DELIMITER $$
CREATE TRIGGER `pembelian_barang` AFTER INSERT ON `tbl_detail_pembelian` FOR EACH ROW BEGIN
	UPDATE tbl_barang b SET b.stok = b.stok + new.qty
    WHERE b.kode_barang = new.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_pembelian` AFTER DELETE ON `tbl_detail_pembelian` FOR EACH ROW BEGIN
	UPDATE tbl_barang b SET b.stok = b.stok - old.qty
    WHERE b.kode_barang = old.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_penjualan`
--

CREATE TABLE `tbl_detail_penjualan` (
  `id_penjualan` varchar(20) NOT NULL,
  `id_barang` varchar(6) NOT NULL,
  `qty` smallint(6) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `tbl_detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `penjualan_barang` AFTER INSERT ON `tbl_detail_penjualan` FOR EACH ROW BEGIN
	UPDATE tbl_barang b SET b.stok = b.stok - new.qty
    WHERE b.kode_barang = new.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_penjualan` AFTER DELETE ON `tbl_detail_penjualan` FOR EACH ROW BEGIN
	UPDATE tbl_barang b SET b.stok = b.stok + old.qty
    WHERE b.kode_barang = old.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ongkir`
--

CREATE TABLE `tbl_ongkir` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ongkir`
--

INSERT INTO `tbl_ongkir` (`id`, `jenis`, `harga`) VALUES
(1, 'agen', '16500'),
(2, 'pelanggan', '12500');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` varchar(20) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `id_supplier` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiriman`
--

CREATE TABLE `tbl_pengiriman` (
  `id` int(11) NOT NULL,
  `id_pengiriman` varchar(255) NOT NULL,
  `id_penjualan` varchar(255) NOT NULL,
  `id_pelanggan` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `ongkir` varchar(255) NOT NULL,
  `kurir` varchar(255) NOT NULL,
  `no_kendaraan` varchar(255) NOT NULL,
  `no_po` varchar(255) DEFAULT NULL,
  `penerima` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` varchar(20) NOT NULL,
  `id_pelanggan` varchar(255) NOT NULL,
  `nama_pembeli` varchar(30) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` varchar(15) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `alamat`, `telp`) VALUES
('ID1595997179', 'Aipel Computer', 'Ds. Manyar, Sidoarjo', '085731109556'),
('ID1595998788', 'Sarana Informasi Computer', 'Jl. Imam Bonjol No. 16 Nganjuk', '08392193833');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `level` enum('admin','pegawai') NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `fullname`, `password`, `alamat`, `hp`, `foto`, `level`, `active`, `last_login`) VALUES
(1, 'admin', 'Administrator', '$2y$08$BO41OJFfhPPPzjKdWw2I6OyUElK1mkD43UVt1ss6J1xrVUExC1lRy', '', '', 'foto1596017847.png', 'admin', 'Y', '2024-03-06 15:32:10'),
(2, 'pegawai', 'Pegawai', '$2y$10$bZkYvXB4K93BWcR05e92r.Vcyq1PrnGFtzougX0LdN5bLaGY/1gPa', 'Jl. Semeru No.90', '085731109355', 'foto1596071469.png', 'pegawai', 'Y', '2020-07-18 15:18:43'),
(6, 'user2', 'Pegawai Kedua', '$2y$10$swIMV3E0b6nRrDXnyBgjO.tN7vMLNmYf6Zm76CG.TO7WH9sZU5LTm', 'Jl. Nanas No. 24, Pace - Nganjuk', '085731109355', 'foto1595054714.png', 'pegawai', 'Y', '2020-07-22 07:59:43'),
(7, 'rizky', 'Arizky', '$2y$10$yJj5Y7Px1djPVHnSZcr21.5IOdyE8HiM.OcZRxtOQrPDF9ueV8OFu', 'Medan timur', '082288337744', 'default.jpg', 'pegawai', 'Y', '2024-03-06 15:33:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD UNIQUE KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pengiriman` (`id_pengiriman`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
