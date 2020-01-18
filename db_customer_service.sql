-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2020 at 05:50 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_customer_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telepon_admin` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `username_akun` varchar(100) NOT NULL,
  `email_akun` varchar(100) NOT NULL,
  `telepon_akun` int(25) NOT NULL,
  `password_akun` varchar(100) NOT NULL,
  `alamat_akun` text NOT NULL,
  `status_akun` varchar(50) NOT NULL DEFAULT 'Tidak Aktif',
  `akses_akun` varchar(50) NOT NULL,
  `registrasi_akun` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `username_akun`, `email_akun`, `telepon_akun`, `password_akun`, `alamat_akun`, `status_akun`, `akses_akun`, `registrasi_akun`) VALUES
(1, 'admin', 'admin@localhost.com', 1234567, '21232f297a57a5a743894a0e4a801fc3', 'Gunungjati - Cirebon', 'Aktif', 'admin', '2020-01-16'),
(2, 'user', 'user@localhost.com', 123456, 'ee11cbb19052e40b07aac0ca060c23ee', 'Grogol - Jakarta', 'Aktif', 'admin', '2020-01-16'),
(10, 'admin2', 'admin2@localhost.com', 12234324, 'c84258e9c39059a89ab77d846ddab909', 'Jamblang - Cirebon', 'Aktif', 'admin', '2020-01-17'),
(11, 'user2', 'user2@lohalhost.com', 4535453, '7e58d63b60197ceb55a1c487989a3720', 'Pekalipan - Cirebon\r\n', 'Aktif', 'user', '2020-01-17'),
(12, 'abusahl444@gmail.com', 'abusahl444@gmail.com', 435345, 'c12e01f2a13ff5587e1e9e4aedb8242d', 'fsss', 'Aktif', 'user', '2020-01-17'),
(13, 'sahal', 'sahal@localhost.com', 98585734, 'e517abcdbf397a6311d7a9ba18b0ddb5', 'Kesambi - Cirebon', 'Tidak Aktif', 'user', '2020-01-17'),
(14, 'zahrina', 'zahrina@localhost.com', 234234, 'ac5eec7ed181714036838c57d216164f', 'wdaw', 'Tidak Aktif', 'user', '2020-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `subjek_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `subjek_kategori`) VALUES
(1, 'Internet', 'Internet lelet, lemot, bermasalah, LAN tidak erhubung, kabel berantakan, Server bermasalah'),
(2, 'Domain', 'Doman error, subdomain error, host bermasalah atau error, ftb tidak berfungsi, domain tidak terdaftar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluhan`
--

CREATE TABLE `tb_keluhan` (
  `id_keluhan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `tanggal_keluhan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD PRIMARY KEY (`id_keluhan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  MODIFY `id_keluhan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
