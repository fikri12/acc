-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2017 at 09:02 AM
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
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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

INSERT INTO `tcashflow` (`no`, `date_add`, `tanggal`, `debet`, `kredit`, `posisi`, `keterangan`, `staktif`) VALUES
('CF171116001', '2017-12-12 23:49:11', '2017-11-16', 1000000, 0, 1000000, 'Tambah Saldo Posisi', '1'),
('CF171116002', '2017-12-12 23:49:11', '2017-11-16', 500000, 0, 1500000, 'Tambah Saldo Posisi', '1'),
('CF171116003', '2017-12-12 23:49:11', '2017-11-16', 0, 10000, 2990000, 'beli 10 kopi', '1'),
('CF171116004', '2017-12-12 23:49:40', '2017-11-16', 0, 20000, 2970000, 'beli 10 mie instan', '1');

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
(1, 'admin', '1,2,3,4,5,6,7,8,9,10,11'),
(2, 'user', '6,7'),
(3, 'Maker', '1,2,3,4,5,6,7,8,9,10,11'),
(4, 'Checker', '1,2,3,4,5,6,7,8,9,10,11'),
(5, 'Signer', '1,2,3,4,5,6,7,8,9,10,11'),
(6, 'Signer2', '1,2,3,4,5,6,7,8,9,10,11');

-- --------------------------------------------------------

--
-- Table structure for table `xnotif`
--

CREATE TABLE `xnotif` (
  `id` int(11) NOT NULL,
  `judul_notif` varchar(160) NOT NULL,
  `isi_notif` text NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `akses` int(11) NOT NULL,
  `readed` int(1) NOT NULL DEFAULT '0',
  `read_at` datetime DEFAULT NULL,
  `action` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xnotif`
--

INSERT INTO `xnotif` (`id`, `judul_notif`, `isi_notif`, `id_pengajuan`, `id_user`, `akses`, `readed`, `read_at`, `action`) VALUES
(1, 'Maker Approve pengajuan biaya', 'Pengajuan Biaya anda telah di approve oleh maker', 0, 2, 0, 1, '2017-12-12 12:00:35', 0),
(2, 'Maker Approve pengajuan biaya', 'Pengajuan Biaya anda telah di approve oleh maker', 0, 2, 0, 1, '2017-12-12 12:05:35', 0),
(3, 'Maker Approve pengajuan biaya', 'Pengajuan Biaya anda telah di approve oleh maker', 0, 2, 0, 1, '2017-12-12 13:31:32', 0),
(4, 'Pengajuan Biaya Baru', 'Pemohon User mengajukan biaya', 12, 3, 0, 1, '2017-12-12 14:35:13', 1),
(5, 'Pengajuan Biaya Baru', 'Pemohon User mengajukan biaya', 13, 3, 0, 1, '2017-12-12 14:42:33', 1),
(6, 'Pengajuan Biaya Baru', 'Pemohon User mengajukan biaya', 13, 7, 0, 1, '2017-12-12 15:12:27', 0),
(7, 'Pengajuan Biaya Baru', 'Permohonan konfirmasi pengajuan biaya', 13, 4, 4, 1, '2017-12-12 15:16:32', 1),
(8, 'Pengajuan Biaya Baru', 'Permohonan konfirmasi pengajuan biaya', 13, 5, 5, 1, '2017-12-12 15:17:26', 1),
(9, 'Pengajuan Biaya Baru', 'Permohonan konfirmasi pengajuan biaya', 13, 6, 6, 0, NULL, 0),
(10, 'Pengajuan Biaya Baru', 'Permohonan konfirmasi pengajuan biaya', 10, 4, 4, 1, '2017-12-13 08:31:41', 1),
(11, 'Pengajuan Biaya Baru', 'Permohonan konfirmasi pengajuan biaya', 11, 4, 4, 1, '2017-12-13 08:30:58', 1),
(12, 'Pengajuan Biaya Baru', 'Permohonan konfirmasi pengajuan biaya', 11, 5, 5, 1, '2017-12-13 08:34:59', 0),
(13, 'Pengajuan Biaya Baru', 'Permohonan konfirmasi pengajuan biaya', 10, 5, 5, 1, '2017-12-13 08:33:27', 1),
(14, 'Pengajuan Biaya Baru', 'Permohonan konfirmasi pengajuan biaya', 10, 6, 6, 0, NULL, 0),
(15, 'Pengajuan Biaya Baru', 'Permohonan konfirmasi pengajuan biaya', 11, 4, 4, 0, NULL, 0);

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
(7, '2017/12/MXG/12', '1 Hal', 'Rincian Biaya Perjalanan Dinas', 'ALIP', '2017-12-11', 3000000, 'Perjalanan dinas ke kota asdfgg', 'tiket pesawat, dan hotel 2 hari 1 malam', 0, 7, 1, 'done', 5, 1, 'oke', '2017-12-11 08:27:39', 2),
(8, '2017/12/ASDF/12', '1 Hal', 'Pengajuan Biaya Dinas', 'ALIP', '2017-12-11', 2000000, 'Biaya DInas', 'Biaya', 0, 7, 2, 'Revisi', 5, 1, 'OK', '2017-12-11 10:22:53', 2),
(9, '2017/12/ABC/203', '1 Hal', 'Pengajuan Biaya', 'USER 1', '2017-12-12', 2500000, 'Biaya transportasi ke kota aaaa', 'Biaya transport tasi (tiket pesawat) ke kota aaa', 0, 7, 1, 'done', 5, 1, 'OK', '2017-12-12 01:18:09', 2),
(10, '2017/XII/NO/20', '1 Hal', 'Pengajuan Biaya', 'TEST', '2017-12-12', 2000000, 'Test Notif', 'test', 0, 7, 1, 'OK finish', 5, 1, 'OK', '2017-12-12 07:28:15', 2),
(11, '2018/01/PB/0001', '2 Hal', 'Pengajuan Biaya', 'TEST', '2017-12-12', 1000000, 'test', 'test', 0, 4, 1, 'OK', 3, 2, '-', '2017-12-12 07:30:12', 2),
(12, NULL, '1', 'Pengajuan Biaya', 'testing', '2017-12-12', 500000, 'test', 'test', 0, 2, 2, '-', 3, 0, NULL, '2017-12-12 07:31:04', 2),
(13, '-', '2 Hal', 'Pengajuan Biaya', 'TESTER', '2017-12-12', 1000000, 'test', 'test', 0, -1, 2, '-', 0, 2, '-', '2017-12-12 07:42:17', 2);

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
(20, 7, 6, 4, 2, 'Reject, revisi', '2017-12-11 10:31:44', 6),
(21, 9, 2, 3, 0, 'Pengajuan Biaya dibuat', '2017-12-12 01:18:09', 2),
(22, 9, 3, 4, 1, 'Oke', '2017-12-12 01:20:19', 3),
(23, 9, 4, 5, 1, 'OK', '2017-12-12 01:28:30', 4),
(24, 7, 4, 5, 1, 'oke', '2017-12-12 01:28:40', 4),
(25, 7, 5, 7, 1, 'done', '2017-12-12 01:29:49', 5),
(26, 9, 5, 7, 1, 'done', '2017-12-12 01:29:56', 5),
(27, 10, 2, 3, 0, 'Pengajuan Biaya dibuat', '2017-12-12 07:28:15', 2),
(28, 11, 2, 3, 0, 'Pengajuan Biaya dibuat', '2017-12-12 07:30:13', 2),
(29, 12, 2, 3, 0, 'Pengajuan Biaya dibuat', '2017-12-12 07:31:04', 2),
(30, 12, 3, 2, 2, '-', '2017-12-12 07:35:15', 3),
(31, 13, 2, 3, 0, 'Pengajuan Biaya dibuat', '2017-12-12 07:42:17', 2),
(32, 13, 3, 2, 2, '-', '2017-12-12 07:42:34', 3),
(33, 13, 2, 1, 2, '-', '2017-12-12 08:12:31', 7),
(34, 13, 1, 0, 2, '-', '2017-12-12 08:16:34', 4),
(35, 13, 0, -1, 2, '-', '2017-12-12 08:17:28', 5),
(36, 10, 3, 4, 1, 'OK', '2017-12-13 01:22:43', 3),
(37, 11, 3, 4, 1, 'OK', '2017-12-13 01:23:14', 3),
(38, 11, 4, 3, 2, '-', '2017-12-13 01:30:59', 4),
(39, 10, 4, 5, 1, 'OK', '2017-12-13 01:31:22', 4),
(40, 10, 5, 7, 1, 'OK finish', '2017-12-13 01:33:20', 5),
(41, 11, 3, 4, 1, 'OK', '2017-12-13 01:43:38', 3);

-- --------------------------------------------------------

--
-- Table structure for table `xuser`
--

CREATE TABLE `xuser` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `akses` int(11) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `foto_ttd` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xuser`
--

INSERT INTO `xuser` (`id`, `nama`, `username`, `akses`, `password`, `foto_ttd`) VALUES
(1, 'Admin', 'admin', 1, '21232f297a57a5a743894a0e4a801fc3', '21cd1a5df22d93ca38caf6d31f5e13b2.jpg'),
(2, 'User', 'user', 2, 'ee11cbb19052e40b07aac0ca060c23ee', '21cd1a5df22d93ca38caf6d31f5e13b2.jpg'),
(3, 'Maker', 'maker', 3, '21232f297a57a5a743894a0e4a801fc3', '21cd1a5df22d93ca38caf6d31f5e13b2.jpg'),
(4, 'Chedker', 'checker', 4, '21232f297a57a5a743894a0e4a801fc3', '21cd1a5df22d93ca38caf6d31f5e13b2.jpg'),
(5, 'Signer 1', 'signer1', 5, '21232f297a57a5a743894a0e4a801fc3', '21cd1a5df22d93ca38caf6d31f5e13b2.jpg'),
(6, 'Signer 2', 'signer2', 6, '21232f297a57a5a743894a0e4a801fc3', '21cd1a5df22d93ca38caf6d31f5e13b2.jpg'),
(7, 'Maker2', 'maker2', 3, '21232f297a57a5a743894a0e4a801fc3', '21cd1a5df22d93ca38caf6d31f5e13b2.jpg'),
(8, 'Test admin', 'admin2', 1, '962012d09b8170d912f0669f6d7d9d07', '21cd1a5df22d93ca38caf6d31f5e13b2.jpg'),
(9, 'new user', 'newuser', 1, '962012d09b8170d912f0669f6d7d9d07', '21cd1a5df22d93ca38caf6d31f5e13b2.jpg'),
(10, 'newuser2', 'newuser2', 1, '912ec803b2ce49e4a541068d495ab570', '21cd1a5df22d93ca38caf6d31f5e13b2.jpg');

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
(2, 6),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(9, 7),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `xuserhakakses`
--

CREATE TABLE `xuserhakakses` (
  `id` int(11) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `kode` varchar(18) NOT NULL,
  `urlstring` varchar(255) DEFAULT NULL,
  `nama_menu` varchar(15) NOT NULL,
  `parent` int(11) NOT NULL,
  `urutan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xuserhakakses`
--

INSERT INTO `xuserhakakses` (`id`, `icon`, `kode`, `urlstring`, `nama_menu`, `parent`, `urutan`) VALUES
(1, '', 'proyek', 'master/proyek', 'Proyek', 9, '2.2'),
(2, '', 'rekanan', 'master/rekanan', 'Rekanan', 9, '2.1'),
(3, '', 'cashflow', 'transaksi/cashflow', 'Cash Flow', 10, '3.1'),
(4, '', 'utang', 'transaksi/utang', 'Hutang', 10, '3.2'),
(5, '', 'piutang', 'transaksi/piutang', 'Piutang', 10, '3.3.x'),
(6, 'fa fa-dashboard', 'dashboard', 'dashboard', 'Dashboard', 0, '1.0'),
(7, 'fa fa-circle-o', 'pengajuan_biaya', 'pengajuan_biaya', 'Pengajuan Biaya', 0, '4.0'),
(8, '', 'users', 'master/users', 'User', 9, '2.4.x'),
(9, 'fa fa-money', 'master', '#', 'Master', 0, '2.0'),
(10, 'fa fa-money', 'transaksi', '#', 'Transaksi', 3, '3.0'),
(11, '', 'posisikas', 'master/posisikas', 'Posisi Kas', 9, '2.3');

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
-- Indexes for table `xnotif`
--
ALTER TABLE `xnotif`
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
-- AUTO_INCREMENT for table `xnotif`
--
ALTER TABLE `xnotif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `xpengajuan`
--
ALTER TABLE `xpengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `xpengajuan_log`
--
ALTER TABLE `xpengajuan_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `xuser`
--
ALTER TABLE `xuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `xuserhakakses`
--
ALTER TABLE `xuserhakakses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
