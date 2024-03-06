-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 04:04 PM
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
('ve898jk9j5lo1p3dudg09me7ddpb2g63', '::1', 1709733539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393733333237303b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('sfvuqfssbnl3ih8sg6061t1v6bid4039', '::1', 1709733753, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393733333630353b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('n76dda0o2mejdqp47snismbe4r7tqm4m', '::1', 1709734529, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393733343236313b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('9m71ku393sci3jil22alt894ou5vsdlf', '::1', 1709734798, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393733343732353b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('dkin35ptevj272gbao8c3lj4ol6md0j2', '::1', 1709735584, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393733353131333b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('nbn0qaekjs2hp2drg8ql7cs6hkadilj3', '::1', 1709736236, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393733353932323b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('h02vqp30945qcc2k31aq6b1ltqmmr7vf', '::1', 1709736661, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393733363337313b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('rb6h5o3o6b8mjtvqn7li32bkeq2bdka1', '::1', 1709737039, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393733363734343b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('7p6i60l49g6cf6dfho24uhre3oiqgc3t', '::1', 1709737389, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393733373039313b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b),
('of7m6jtra1vqm7het1l9jpkhhffmh9fm', '::1', 1709737427, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393733373339323b5573657249447c733a313a2231223b557365727c733a31333a2241646d696e6973747261746f72223b6c6576656c7c733a353a2261646d696e223b666f746f7c733a31383a22666f746f313539363031373834372e706e67223b);

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
  `jenis` varchar(255) NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kode_barang`, `nama_barang`, `brand`, `stok`, `harga`, `jenis`, `active`) VALUES
('ESAGN', 'Es Kristal', 'Es SPA', 90, 12500, 'agen', 'Y'),
('ESPLG', 'Es Kristal', 'Es SPA', 90, 16000, 'pelanggan', 'Y');

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
-- Dumping data for table `tbl_detail_penjualan`
--

INSERT INTO `tbl_detail_penjualan` (`id_penjualan`, `id_barang`, `qty`, `harga`) VALUES
('ID1709736469', 'ESPLG', 10, 16000),
('ID1709737360', 'ESAGN', 10, 12500);

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

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama`, `phone`, `alamat`, `fasilitas`, `jenis`, `status`) VALUES
('CST1709699611', 'Ahmad', '082134123442', 'Medan timur', 'Cool Box', 'agen', 'aktif'),
('CST1709710851', 'Madan', '082277338899', 'Medan tembung', 'Cool Box', 'pelanggan', 'aktif');

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

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pembelian`, `tgl_pembelian`, `id_supplier`, `id_user`) VALUES
('ID1595997781', '2020-07-29', 'ID1595998788', 1),
('ID1596005126', '2020-07-28', 'ID1595997179', 1);

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
  `ongkir` varchar(255) DEFAULT NULL,
  `kurir` varchar(255) NOT NULL,
  `no_kendaraan` varchar(255) NOT NULL,
  `no_po` varchar(255) DEFAULT NULL,
  `penerima` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengiriman`
--

INSERT INTO `tbl_pengiriman` (`id`, `id_pengiriman`, `id_penjualan`, `id_pelanggan`, `date`, `ongkir`, `kurir`, `no_kendaraan`, `no_po`, `penerima`, `keterangan`, `status`) VALUES
(3, 'ID1709736835', 'ID1709736469', 'CST1709710851', '2024-03-07', NULL, 'TRIBUDI', 'BK 1234 ABC', NULL, 'Yudi', 'Diterima', 'berhasil'),
(4, 'ID1709737388', 'ID1709737360', 'CST1709699611', '2024-03-07', NULL, 'TRIBUDI', 'BK 1234 ABC', NULL, 'Yudi', 'Diterima', 'berhasil');

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

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `id_pelanggan`, `nama_pembeli`, `tgl_penjualan`, `id_user`) VALUES
('ID1709736469', 'CST1709699611', 'Madan', '2024-03-06', 1),
('ID1709737360', 'CST1709699611', 'Ahmad', '2024-03-06', 1);

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
(1, 'admin', 'Administrator', '$2y$08$BO41OJFfhPPPzjKdWw2I6OyUElK1mkD43UVt1ss6J1xrVUExC1lRy', '', '', 'foto1596017847.png', 'admin', 'Y', '2020-07-30 07:59:43'),
(2, 'pegawai', 'Pegawai', '$2y$10$bZkYvXB4K93BWcR05e92r.Vcyq1PrnGFtzougX0LdN5bLaGY/1gPa', 'Jl. Semeru No.90', '085731109355', 'foto1596071469.png', 'pegawai', 'Y', '2020-07-18 15:18:43'),
(6, 'user2', 'Pegawai Kedua', '$2y$10$swIMV3E0b6nRrDXnyBgjO.tN7vMLNmYf6Zm76CG.TO7WH9sZU5LTm', 'Jl. Nanas No. 24, Pace - Nganjuk', '085731109355', 'foto1595054714.png', 'pegawai', 'Y', '2020-07-22 07:59:43');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
