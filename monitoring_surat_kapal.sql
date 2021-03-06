-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 11:16 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_surat_kapal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berlaku`
--

CREATE TABLE `tbl_berlaku` (
  `berlakuCode` int(11) NOT NULL,
  `sertifikatCode` int(11) NOT NULL,
  `kapalCode` int(11) NOT NULL,
  `pemberiCode` int(11) NOT NULL,
  `berlakuTanggalAwal` varchar(255) NOT NULL,
  `berlakuTanggalAkhir` varchar(255) NOT NULL DEFAULT 'permanen',
  `file` varchar(70) NOT NULL,
  `userCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berlaku`
--

INSERT INTO `tbl_berlaku` (`berlakuCode`, `sertifikatCode`, `kapalCode`, `pemberiCode`, `berlakuTanggalAwal`, `berlakuTanggalAkhir`, `file`, `userCode`) VALUES
(3, 2, 1, 2, '2020-06-01', '2020-12-27', '', 1),
(5, 1, 1, 2, '2020-06-06', '2020-12-28', '3e2579d186941ec4beb8433fe0901e03.pdf', 1),
(6, 3, 1, 5, '2020-06-06', 'PERMANEN', '9c2f9c90348560d3cc6ab139da7534c6.pdf', 1),
(7, 9, 1, 2, '2020-12-25', 'PERMANEN', '64b10394605a335a36e7e34c0930bae8.pdf', 1),
(8, 14, 1, 9, '2020-12-08', 'PERMANEN', 'default.pdf', 1),
(9, 6, 1, 5, '2020-12-30', 'PERMANEN', 'default.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kapal`
--

CREATE TABLE `tbl_kapal` (
  `kapalCode` int(11) NOT NULL,
  `kapalNama` varchar(255) NOT NULL,
  `kapalBendera` varchar(255) NOT NULL,
  `kapalIsiKotor` varchar(255) NOT NULL,
  `kapalHP-ME` varchar(255) NOT NULL,
  `kapalTahunPembuatan` varchar(4) NOT NULL,
  `kapalNahkoda` varchar(255) NOT NULL,
  `kapalJumlahCrew` varchar(255) NOT NULL,
  `kapalLintasan` varchar(255) NOT NULL,
  `kapalPemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kapal`
--

INSERT INTO `tbl_kapal` (`kapalCode`, `kapalNama`, `kapalBendera`, `kapalIsiKotor`, `kapalHP-ME`, `kapalTahunPembuatan`, `kapalNahkoda`, `kapalJumlahCrew`, `kapalLintasan`, `kapalPemilik`) VALUES
(1, 'KMP. JATRA I', 'INDONESIA', '3.871', '2 X 1600 HP', '1980', 'KHOIRIL SYAIFUL IMRON', '25', 'MERAK - BAKAUHENI', 'PT. ASDP (PERSERO)'),
(2, 'KMP. JATRA II', 'INDONESIA', '3.902', '2 X 1600 PK', '1980', 'PAULUS FAMANI', '26', 'MERAK - BAKAUHENI', 'PT. ASDP (PERSERO)'),
(3, 'KMP. JATRA III', 'INDONESIA', '5.071', '4 X 1800 PS', '1985', 'SUJADI', '25', 'MERAK - BAKAUHENI', 'PT. ASDP (PERSERO)'),
(4, 'KMP. PORTLINK V', 'INDONESIA', '4.028', '2 X 1280 KW', '2011', 'DWI IRIANTO', '25', 'MERAK - BAKAUHENI', 'PT. ASDP (PERSERO)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemberi`
--

CREATE TABLE `tbl_pemberi` (
  `pemberiCode` int(11) NOT NULL,
  `pemberiNama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemberi`
--

INSERT INTO `tbl_pemberi` (`pemberiCode`, `pemberiNama`) VALUES
(1, 'HUBLA/JAKARTA'),
(2, 'ADPEL/TG. PERAK/SURABAYA'),
(3, 'KSOP/PANJANG'),
(4, 'KSOP/BANTEN'),
(5, 'BKI/JAKARTA'),
(6, 'PASCADANA'),
(7, 'KKP/BANTEN'),
(8, 'HUBDAR/JAKARTA'),
(9, 'ADPEL/TANJUNG PRIOK'),
(10, 'HUBLA/PANJANG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sertifikat`
--

CREATE TABLE `tbl_sertifikat` (
  `sertifikatCode` int(11) NOT NULL,
  `sertifikatNama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sertifikat`
--

INSERT INTO `tbl_sertifikat` (`sertifikatCode`, `sertifikatNama`) VALUES
(1, 'SURAT LAUT'),
(2, 'SURAT UKUR'),
(3, 'SKKP'),
(4, 'IOPP SNPP'),
(5, 'SIRK'),
(6, 'DOC'),
(7, 'SMC'),
(8, 'GARIS MUAT'),
(9, 'KLAS MESIN'),
(10, 'KLAS LAMBUNG'),
(11, 'PMK'),
(12, 'ILR'),
(13, 'SANITASI'),
(14, 'IJIN OPERASI'),
(15, 'SPM'),
(16, 'ANTI TERITIP'),
(17, 'ee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userCode` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userNama` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userNoHP` varchar(13) DEFAULT NULL,
  `userAktif` enum('1','0') NOT NULL DEFAULT '0',
  `userNotif` enum('0','1') NOT NULL DEFAULT '0',
  `userLevel` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userCode`, `username`, `password`, `userNama`, `userEmail`, `userNoHP`, `userAktif`, `userNotif`, `userLevel`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'kamuaku20061999@gmail.com', '0895606226096', '1', '1', 1),
(2, 'member', 'aa08769cdcb26674c6706093503ff0a3', 'member', 'member@gmail.com', '08956062260', '1', '1', 2),
(3, 'member2', '88ed421f060aadcacbd63f28d889797f', 'member kedua', 'member2@gmail.com', '09768975447', '0', '0', 2),
(4, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'dikisandi2006@gmail.com', '5678987654', '1', '0', 2),
(5, 'aulia', '614913bc360cdfd1c56758cb87eb9e8f', 'Muh. Aulia', 'muhaulia11@gmail.com', '082376977739', '1', '1', 2),
(6, 'atest', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a@gmail.com', '089111', '0', '0', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_berlaku`
--
ALTER TABLE `tbl_berlaku`
  ADD PRIMARY KEY (`berlakuCode`),
  ADD KEY `sertifikatCode` (`sertifikatCode`),
  ADD KEY `kapalCode` (`kapalCode`),
  ADD KEY `pemberiCode` (`pemberiCode`),
  ADD KEY `userCode` (`userCode`);

--
-- Indexes for table `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  ADD PRIMARY KEY (`kapalCode`);

--
-- Indexes for table `tbl_pemberi`
--
ALTER TABLE `tbl_pemberi`
  ADD PRIMARY KEY (`pemberiCode`);

--
-- Indexes for table `tbl_sertifikat`
--
ALTER TABLE `tbl_sertifikat`
  ADD PRIMARY KEY (`sertifikatCode`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userCode`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `userEmail` (`userEmail`),
  ADD UNIQUE KEY `userNoHP` (`userNoHP`),
  ADD KEY `levelCode` (`userLevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_berlaku`
--
ALTER TABLE `tbl_berlaku`
  MODIFY `berlakuCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  MODIFY `kapalCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pemberi`
--
ALTER TABLE `tbl_pemberi`
  MODIFY `pemberiCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_sertifikat`
--
ALTER TABLE `tbl_sertifikat`
  MODIFY `sertifikatCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_berlaku`
--
ALTER TABLE `tbl_berlaku`
  ADD CONSTRAINT `tbl_berlaku_ibfk_1` FOREIGN KEY (`userCode`) REFERENCES `tbl_user` (`userCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
