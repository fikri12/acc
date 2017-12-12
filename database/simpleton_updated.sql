-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2017 at 08:59 PM
-- Server version: 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 5.6.32-1+ubuntu17.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpleton`
--

-- --------------------------------------------------------

--
-- Table structure for table `mposisikas`
--

CREATE TABLE `mposisikas` (
  `no` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nominal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mposisikas`
--

INSERT INTO `mposisikas` (`no`, `tanggal`, `nominal`) VALUES
('PK171116001', '2017-11-16', 1000000),
('PK171116002', '2017-11-16', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `mproyek`
--

CREATE TABLE `mproyek` (
  `no` varchar(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tipe` char(1) DEFAULT NULL,
  `rekanan` varchar(10) DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `stlunas` char(1) DEFAULT NULL,
  `staktif` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mproyek`
--

INSERT INTO `mproyek` (`no`, `nama`, `tipe`, `rekanan`, `nominal`, `keterangan`, `stlunas`, `staktif`) VALUES
('P001', 'Akunting', '1', 'S001', '1000000', 'Projek Akunting', '0', '1'),
('P002', 'Inventory', '1', 'S001', '5000000', 'Projek Inventory', '0', '1'),
('P003', 'Akunting', '2', 'S002', '200000', 'Projek Akunting', '0', '1'),
('S001', 'Company Profile', '1', 'S002', '10000000', 'bikin web', '0', '1'),
('S002', 'Queue', 'P', 'S002', '5000', '-', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mrekanan`
--

CREATE TABLE `mrekanan` (
  `no` varchar(15) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(60) DEFAULT NULL,
  `provinsi` varchar(60) DEFAULT NULL,
  `kodepos` varchar(6) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `cp` varchar(60) DEFAULT NULL,
  `cptlp` varchar(15) DEFAULT NULL,
  `owner` varchar(60) DEFAULT NULL,
  `ownertlp` varchar(15) DEFAULT NULL,
  `staktif` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mrekanan`
--

INSERT INTO `mrekanan` (`no`, `nama`, `alamat`, `kota`, `provinsi`, `kodepos`, `telepon`, `fax`, `npwp`, `cp`, `cptlp`, `owner`, `ownertlp`, `staktif`) VALUES
('S001', 'Iyan Isyanto', 'Pasteur', 'Bandung', 'Jawa Barat', NULL, '089605411854', NULL, NULL, NULL, NULL, NULL, NULL, '1'),
('S002', 'CV. KurvaSoft', 'Jl Sukamulya No. 45 Sukagalih', 'Bandung', 'Jawa Barat', NULL, '089605411854', NULL, NULL, NULL, NULL, NULL, NULL, '1'),
('S003', 'Zipho', 'Pasteur', 'Bandung', 'Jawa Barat', NULL, '089605411', NULL, NULL, NULL, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tcashflow`
--

CREATE TABLE `tcashflow` (
  `no` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `debet` double(255,0) DEFAULT NULL,
  `kredit` double(255,0) DEFAULT NULL,
  `posisi` double(255,0) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `staktif` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcashflow`
--

INSERT INTO `tcashflow` (`no`, `tanggal`, `debet`, `kredit`, `posisi`, `keterangan`, `staktif`) VALUES
('CF171116001', '2017-11-16', 1000000, 0, 1000000, 'Tambah Saldo Posisi', '1'),
('CF171116002', '2017-11-16', 500000, 0, 1500000, 'Tambah Saldo Posisi', '1'),
('CF171116003', '2017-11-16', 0, 10000, 2990000, 'beli 10 kopi', '1'),
('CF171116004', '2017-11-16', 0, 20000, 2970000, 'beli 10 mie instan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tpiutang`
--

CREATE TABLE `tpiutang` (
  `no` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `proyek` varchar(255) DEFAULT NULL,
  `progres` tinyint(4) DEFAULT NULL,
  `dibayar` double DEFAULT NULL,
  `terbayar` double DEFAULT NULL,
  `sisapiutang` double DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpiutang`
--

INSERT INTO `tpiutang` (`no`, `tanggal`, `proyek`, `progres`, `dibayar`, `terbayar`, `sisapiutang`, `keterangan`) VALUES
('U171115001', '2017-11-15', 'P001', 5, 10000, 10000, 990000, '-'),
('U171115002', '2017-11-15', 'P001', 10, 5000, 15000, 975000, 'dibayar 5000'),
('U171115003', '2017-11-15', 'P001', 12, 10000, 35000, 940000, 'dibayar 10000'),
('U171115004', '2017-11-15', 'P002', 10, 50000, 50000, 4950000, 'dibayar 50000'),
('U171115005', '2017-11-15', 'P003', 10, 10000, 10000, 190000, '-'),
('U171115006', '2017-11-15', 'P003', 15, 40000, 50000, 150000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tutang`
--

CREATE TABLE `tutang` (
  `no` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `proyek` varchar(255) DEFAULT NULL,
  `progres` tinyint(4) DEFAULT NULL,
  `dibayar` double DEFAULT NULL,
  `terbayar` double DEFAULT NULL,
  `sisautang` double DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutang`
--

INSERT INTO `tutang` (`no`, `tanggal`, `proyek`, `progres`, `dibayar`, `terbayar`, `sisautang`, `keterangan`) VALUES
('U171115001', '2017-11-15', 'P001', 10, 100000, 100000, 900000, 'bayar 100ribu'),
('U171115002', '2017-11-15', 'P001', 15, 50000, 150000, 850000, '-'),
('U171115003', '2017-11-15', 'P002', 5, 1000000, 1000000, 4000000, '');

-- --------------------------------------------------------

--
-- Table structure for table `xakses`
--

CREATE TABLE `xakses` (
  `id` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xakses`
--

INSERT INTO `xakses` (`id`, `nama`, `menu`) VALUES
(1, 'admin', '1,2,3,4,5,6'),
(2, 'user', '1,2,6'),
(3, 'Maker', ''),
(4, 'Checker', ''),
(5, 'Signer', ''),
(6, 'Signer2', '');

-- --------------------------------------------------------

--
-- Table structure for table `xpengajuan`
--

CREATE TABLE `xpengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `no_pengajuan` text,
  `lampiran` varchar(300) NOT NULL,
  `perihal` varchar(300) NOT NULL,
  `pelaksana` varchar(300) NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `nominal_biaya` float NOT NULL,
  `tujuan_penggunaan` text NOT NULL,
  `keterangan` text NOT NULL,
  `pemohon` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL COMMENT '1 pemohon, 2 maker, 3 checker, 4 signer, 5 approved',
  `action` int(11) NOT NULL DEFAULT '0' COMMENT '0 pending, 1 = approve, 2 = reject',
  `comment` text COMMENT 'komentar',
  `last_position` int(11) NOT NULL DEFAULT '0',
  `last_action` int(11) NOT NULL DEFAULT '0' COMMENT '1 approve, 2 reject',
  `last_comment` text,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `add_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xpengajuan`
--

INSERT INTO `xpengajuan` (`id_pengajuan`, `no_pengajuan`, `lampiran`, `perihal`, `pelaksana`, `tanggal_pelaksanaan`, `nominal_biaya`, `tujuan_penggunaan`, `keterangan`, `pemohon`, `position`, `action`, `comment`, `last_position`, `last_action`, `last_comment`, `date_add`, `add_by`) VALUES
(1, '', '1 Hal', 'Pengajuan Biaya Hosting', 'Alip S', '2017-12-11', 2000000, 'Bayar Hosting', 'ini ayar hosting', 0, 1, 0, NULL, 0, 0, NULL, '2017-12-11 04:12:06', 1),
(2, '', '1 Hal', 'Pengajuan Biaya Hosting', 'Alip S', '2017-12-12', 2000000, 'Test', 'Qwerty', 0, 1, 0, NULL, 0, 0, NULL, '2017-12-11 04:26:05', 1),
(3, '', '1 Hal', 'Pengajuan Biaya', 'ALIP', '2017-12-11', 1500000, 'Testing qwerty', 'asdfgh', 0, 1, 0, NULL, 0, 0, NULL, '2017-12-11 05:10:47', 1),
(4, '', '1 Hal', 'Bayar VPS', 'TEST', '2017-12-11', 11000000, 'Bayar VPS', 'BAYAR VPS DI PT ASDFGH', 0, 1, 0, NULL, 0, 0, NULL, '2017-12-11 06:00:28', 1),
(5, '2017/12/II/91', '1 berkas', 'Bayar VPS', 'PEMOHON 1', '2017-12-11', 11000000, 'Bayar VPS', 'BAYAR VPS', 0, 7, 1, 'Oke selesai', 6, 1, 'Ok lanjut', '2017-12-11 06:20:45', 2),
(6, '2017/12/ASDF/123', '1 Hal', 'Biaya Perjalanan Dinas', 'ALIPS', '2017-12-11', 4000000, 'Perjalan dinas ke PT asdfg', 'Perjalanan dinas ke PT asdf selama 1 bulan + transport pp', 0, 7, 1, 'oke', 5, 1, 'Oke Lanjut\r\n', '2017-12-11 06:25:43', 2),
(7, '2017/12/MXG/12', '1 Hal', 'Rincian Biaya Perjalanan Dinas', 'ALIP', '2017-12-11', 3000000, 'Perjalanan dinas ke kota asdfgg', 'tiket pesawat, dan hotel 2 hari 1 malam', 0, 4, 2, 'Reject, revisi', 6, 1, 'OK', '2017-12-11 08:27:39', 2),
(8, '2017/12/ASDF/12', '1 Hal', 'Pengajuan Biaya Dinas', 'ALIP', '2017-12-11', 2000000, 'Biaya DInas', 'Biaya', 0, 7, 2, 'Revisi', 5, 1, 'OK', '2017-12-11 10:22:53', 2);

-- --------------------------------------------------------

--
-- Table structure for table `xpengajuan_log`
--

CREATE TABLE `xpengajuan_log` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `from_position` int(11) NOT NULL,
  `to_position` int(11) NOT NULL,
  `action` int(11) NOT NULL COMMENT '1 approve, 2 reject',
  `comment` text NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `add_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xpengajuan_log`
--

INSERT INTO `xpengajuan_log` (`id`, `id_pengajuan`, `from_position`, `to_position`, `action`, `comment`, `date_add`, `add_by`) VALUES
(1, 5, 0, 0, 0, 'Pengajuan Biaya dibuat', '2017-12-11 06:20:46', 2),
(2, 6, 0, 0, 0, 'Pengajuan Biaya dibuat', '2017-12-11 06:25:43', 2),
(3, 5, 3, 3, 2, 'Reject, belum ada surat', '2017-12-11 07:57:02', 4),
(4, 5, 3, 2, 2, 'Turun', '2017-12-11 07:59:17', 4),
(5, 6, 3, 4, 1, 'Oke Lanjut', '2017-12-11 07:59:25', 4),
(6, 5, 2, 3, 1, 'Oke, ', '2017-12-11 08:00:29', 3),
(7, 5, 3, 4, 1, 'Nah, Oke nih', '2017-12-11 08:02:01', 4),
(8, 5, 4, 6, 1, 'Ok lanjut', '2017-12-11 08:16:13', 4),
(9, 6, 4, 5, 1, 'Oke Lanjut\r\n', '2017-12-11 08:16:22', 4),
(10, 5, 6, 7, 1, 'Oke selesai', '2017-12-11 08:17:24', 6),
(11, 6, 5, 7, 1, 'oke', '2017-12-11 08:19:20', 6),
(12, 7, 0, 0, 0, 'Pengajuan Biaya dibuat', '2017-12-11 08:27:39', 2),
(13, 7, 3, 4, 1, 'Oke, surat terlampir di email maker@asdgf.com', '2017-12-11 08:30:51', 3),
(14, 8, 0, 0, 0, 'Pengajuan Biaya dibuat', '2017-12-11 10:22:54', 2),
(15, 8, 3, 4, 1, 'Oke', '2017-12-11 10:23:54', 3),
(16, 8, 4, 5, 1, 'OK', '2017-12-11 10:24:18', 4),
(17, 7, 4, 5, 1, 'OK\r\n', '2017-12-11 10:24:25', 4),
(18, 7, 5, 6, 1, 'OK', '2017-12-11 10:24:45', 5),
(19, 8, 5, 7, 2, 'Revisi', '2017-12-11 10:24:54', 5),
(20, 7, 6, 4, 2, 'Reject, revisi', '2017-12-11 10:31:44', 6);

-- --------------------------------------------------------

--
-- Table structure for table `xuser`
--

CREATE TABLE `xuser` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `akses` int(11) NOT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xuser`
--

INSERT INTO `xuser` (`id`, `nama`, `username`, `akses`, `password`) VALUES
(1, 'Admin', 'admin', 1, '21232f297a57a5a743894a0e4a801fc3'),
(2, 'User', 'user', 2, 'ee11cbb19052e40b07aac0ca060c23ee'),
(3, 'Maker', 'maker', 3, '21232f297a57a5a743894a0e4a801fc3'),
(4, 'Chedker', 'checker', 4, '21232f297a57a5a743894a0e4a801fc3'),
(5, 'Signer 1', 'signer1', 5, '21232f297a57a5a743894a0e4a801fc3'),
(6, 'Signer 2', 'signer2', 6, '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `xuserakses`
--

CREATE TABLE `xuserakses` (
  `userid` int(11) NOT NULL,
  `hakaksesid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xuserakses`
--

INSERT INTO `xuserakses` (`userid`, `hakaksesid`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 1),
(2, 2),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `xuserhakakses`
--

CREATE TABLE `xuserhakakses` (
  `id` int(11) NOT NULL,
  `urlstring` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xuserhakakses`
--

INSERT INTO `xuserhakakses` (`id`, `urlstring`) VALUES
(1, 'master/proyek'),
(2, 'master/rekanan'),
(3, 'transaksi/cashflow'),
(4, 'transaksi/utang'),
(5, 'transaksi/piutang'),
(6, 'dashboard');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mposisikas`
--
ALTER TABLE `mposisikas`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `mproyek`
--
ALTER TABLE `mproyek`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `mrekanan`
--
ALTER TABLE `mrekanan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tcashflow`
--
ALTER TABLE `tcashflow`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tpiutang`
--
ALTER TABLE `tpiutang`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tutang`
--
ALTER TABLE `tutang`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `xakses`
--
ALTER TABLE `xakses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xpengajuan`
--
ALTER TABLE `xpengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `xpengajuan_log`
--
ALTER TABLE `xpengajuan_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xuser`
--
ALTER TABLE `xuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xuserakses`
--
ALTER TABLE `xuserakses`
  ADD PRIMARY KEY (`userid`,`hakaksesid`);

--
-- Indexes for table `xuserhakakses`
--
ALTER TABLE `xuserhakakses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xakses`
--
ALTER TABLE `xakses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `xpengajuan`
--
ALTER TABLE `xpengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `xpengajuan_log`
--
ALTER TABLE `xpengajuan_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `xuser`
--
ALTER TABLE `xuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `xuserhakakses`
--
ALTER TABLE `xuserhakakses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
