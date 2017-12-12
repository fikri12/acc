/*
Navicat MySQL Data Transfer

Source Server         : PC-INI
Source Server Version : 100128
Source Host           : localhost:3306
Source Database       : me_simpleton

Target Server Type    : MYSQL
Target Server Version : 100128
File Encoding         : 65001

Date: 2017-11-16 21:38:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mposisikas
-- ----------------------------
DROP TABLE IF EXISTS `mposisikas`;
CREATE TABLE `mposisikas` (
  `no` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mposisikas
-- ----------------------------
INSERT INTO `mposisikas` VALUES ('PK171116001', '2017-11-16', '1000000');
INSERT INTO `mposisikas` VALUES ('PK171116002', '2017-11-16', '500000');

-- ----------------------------
-- Table structure for mproyek
-- ----------------------------
DROP TABLE IF EXISTS `mproyek`;
CREATE TABLE `mproyek` (
  `no` varchar(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tipe` char(1) DEFAULT NULL,
  `rekanan` varchar(10) DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `stlunas` char(1) DEFAULT NULL,
  `staktif` char(1) DEFAULT '1',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mproyek
-- ----------------------------
INSERT INTO `mproyek` VALUES ('P001', 'Akunting', '1', 'S001', '1000000', 'Projek Akunting', '0', '1');
INSERT INTO `mproyek` VALUES ('P002', 'Inventory', '1', 'S001', '5000000', 'Projek Inventory', '0', '1');
INSERT INTO `mproyek` VALUES ('P003', 'Akunting', '2', 'S002', '200000', 'Projek Akunting', '0', '1');
INSERT INTO `mproyek` VALUES ('S001', 'Company Profile', '1', 'S002', '10000000', 'bikin web', '0', '1');
INSERT INTO `mproyek` VALUES ('S002', 'Queue', 'P', 'S002', '5000', '-', '0', '1');

-- ----------------------------
-- Table structure for mrekanan
-- ----------------------------
DROP TABLE IF EXISTS `mrekanan`;
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
  `staktif` char(1) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mrekanan
-- ----------------------------
INSERT INTO `mrekanan` VALUES ('S001', 'Iyan Isyanto', 'Pasteur', 'Bandung', 'Jawa Barat', null, '089605411854', null, null, null, null, null, null, '1');
INSERT INTO `mrekanan` VALUES ('S002', 'CV. KurvaSoft', 'Jl Sukamulya No. 45 Sukagalih', 'Bandung', 'Jawa Barat', null, '089605411854', null, null, null, null, null, null, '1');
INSERT INTO `mrekanan` VALUES ('S003', 'Zipho', 'Pasteur', 'Bandung', 'Jawa Barat', null, '089605411', null, null, null, null, null, null, '1');

-- ----------------------------
-- Table structure for tcashflow
-- ----------------------------
DROP TABLE IF EXISTS `tcashflow`;
CREATE TABLE `tcashflow` (
  `no` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `debet` double(255,0) DEFAULT NULL,
  `kredit` double(255,0) DEFAULT NULL,
  `posisi` double(255,0) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `staktif` char(1) DEFAULT '1',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tcashflow
-- ----------------------------
INSERT INTO `tcashflow` VALUES ('CF171116001', '2017-11-16', '1000000', '0', '1000000', 'Tambah Saldo Posisi', '1');
INSERT INTO `tcashflow` VALUES ('CF171116002', '2017-11-16', '500000', '0', '1500000', 'Tambah Saldo Posisi', '1');
INSERT INTO `tcashflow` VALUES ('CF171116003', '2017-11-16', '0', '10000', '2990000', 'beli 10 kopi', '1');
INSERT INTO `tcashflow` VALUES ('CF171116004', '2017-11-16', '0', '20000', '2970000', 'beli 10 mie instan', '1');

-- ----------------------------
-- Table structure for tpiutang
-- ----------------------------
DROP TABLE IF EXISTS `tpiutang`;
CREATE TABLE `tpiutang` (
  `no` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `proyek` varchar(255) DEFAULT NULL,
  `progres` tinyint(4) DEFAULT NULL,
  `dibayar` double DEFAULT NULL,
  `terbayar` double DEFAULT NULL,
  `sisapiutang` double DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tpiutang
-- ----------------------------
INSERT INTO `tpiutang` VALUES ('U171115001', '2017-11-15', 'P001', '5', '10000', '10000', '990000', '-');
INSERT INTO `tpiutang` VALUES ('U171115002', '2017-11-15', 'P001', '10', '5000', '15000', '975000', 'dibayar 5000');
INSERT INTO `tpiutang` VALUES ('U171115003', '2017-11-15', 'P001', '12', '10000', '35000', '940000', 'dibayar 10000');
INSERT INTO `tpiutang` VALUES ('U171115004', '2017-11-15', 'P002', '10', '50000', '50000', '4950000', 'dibayar 50000');
INSERT INTO `tpiutang` VALUES ('U171115005', '2017-11-15', 'P003', '10', '10000', '10000', '190000', '-');
INSERT INTO `tpiutang` VALUES ('U171115006', '2017-11-15', 'P003', '15', '40000', '50000', '150000', '');

-- ----------------------------
-- Table structure for tutang
-- ----------------------------
DROP TABLE IF EXISTS `tutang`;
CREATE TABLE `tutang` (
  `no` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `proyek` varchar(255) DEFAULT NULL,
  `progres` tinyint(4) DEFAULT NULL,
  `dibayar` double DEFAULT NULL,
  `terbayar` double DEFAULT NULL,
  `sisautang` double DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tutang
-- ----------------------------
INSERT INTO `tutang` VALUES ('U171115001', '2017-11-15', 'P001', '10', '100000', '100000', '900000', 'bayar 100ribu');
INSERT INTO `tutang` VALUES ('U171115002', '2017-11-15', 'P001', '15', '50000', '150000', '850000', '-');
INSERT INTO `tutang` VALUES ('U171115003', '2017-11-15', 'P002', '5', '1000000', '1000000', '4000000', '');

-- ----------------------------
-- Table structure for xuser
-- ----------------------------
DROP TABLE IF EXISTS `xuser`;
CREATE TABLE `xuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of xuser
-- ----------------------------
INSERT INTO `xuser` VALUES ('1', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `xuser` VALUES ('2', 'User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

-- ----------------------------
-- Table structure for xuserakses
-- ----------------------------
DROP TABLE IF EXISTS `xuserakses`;
CREATE TABLE `xuserakses` (
  `userid` int(11) NOT NULL,
  `hakaksesid` int(11) NOT NULL,
  PRIMARY KEY (`userid`,`hakaksesid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of xuserakses
-- ----------------------------
INSERT INTO `xuserakses` VALUES ('1', '1');
INSERT INTO `xuserakses` VALUES ('1', '2');
INSERT INTO `xuserakses` VALUES ('1', '3');
INSERT INTO `xuserakses` VALUES ('1', '4');
INSERT INTO `xuserakses` VALUES ('1', '5');
INSERT INTO `xuserakses` VALUES ('1', '6');
INSERT INTO `xuserakses` VALUES ('2', '1');
INSERT INTO `xuserakses` VALUES ('2', '2');
INSERT INTO `xuserakses` VALUES ('2', '6');

-- ----------------------------
-- Table structure for xuserhakakses
-- ----------------------------
DROP TABLE IF EXISTS `xuserhakakses`;
CREATE TABLE `xuserhakakses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urlstring` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of xuserhakakses
-- ----------------------------
INSERT INTO `xuserhakakses` VALUES ('1', 'master/proyek');
INSERT INTO `xuserhakakses` VALUES ('2', 'master/rekanan');
INSERT INTO `xuserhakakses` VALUES ('3', 'transaksi/cashflow');
INSERT INTO `xuserhakakses` VALUES ('4', 'transaksi/utang');
INSERT INTO `xuserhakakses` VALUES ('5', 'transaksi/piutang');
INSERT INTO `xuserhakakses` VALUES ('6', 'dashboard');
