-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 07:10 AM
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
  `registrasi_akun` date NOT NULL,
  `motto_akun` text NOT NULL,
  `foto_akun` varchar(100) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `username_akun`, `email_akun`, `telepon_akun`, `password_akun`, `alamat_akun`, `status_akun`, `akses_akun`, `registrasi_akun`, `motto_akun`, `foto_akun`) VALUES
(1, 'admin', 'admin@localhost.com', 1234567, '6b71dfdc4c5603272482f5b80db96a0a', 'Gunungjati - Cirebon', 'Aktif', 'admin', '2020-01-16', '', 'user.png'),
(11, 'Nashiruddin Sahal', 'user@localhost.com2', 2147483644, 'bd3ffb46e7f751c1d27e1c338fa73e14', 'Gunungjati - Cirebon', 'Aktif', 'user', '2020-01-17', 'Banyak kata-kata motivasi lain yang sejalan dengan apa yang diungkapkan Donny dalam bukunya. Misalnya seperti kalimat ‘rumput tetangga selalu terlihat lebih hijau’. Yang memberikan pesan bahwa jika hanya fokus pada orang lain, diri sendiri tidak akan pernah bahagia.Alasannya sederhana, karena terlalu memperhatikan apa yang orang lain miliki dan mampu lakukan, akan bersikap terlalu keras pada diri sendiri. Ini dapat menyebabkan rasa ketidakpuasan yang terlalu berlebihan dan sering menyalahkan diri. Kuncinya adalah selalu bersyukur atas apa yang dimiliki dan kemampuan diri.', 'sahal.png'),
(18, 'Zahrina', 'sahal2@localhost.com', 324243, '3594cedbc9b8a591b25b2b360ebe8520', 'wf', 'Aktif', 'user', '2020-01-27', 'cdcdcdsc', 'user.png'),
(19, 'abusahl444@gmail.com', 'abusahl444@gmail.com', 3324234, '88f23187e687495ee5b34ce2327445b1', 'sffwewf', 'Aktif', 'user', '2020-02-09', '', 'user.png'),
(20, 'danu', 'danuartha@localhost.com', 23456, 'dd7556665c99352ecda3d3bce0192deb', 'Jagasatru', 'Aktif', 'user', '2020-02-12', '', 'user.png'),
(21, 'siswa', 'siswa@localhost.com', 23456, 'bf4c305863ef2ccbf2e576e8411e0f8b', 'Gunung Sari', 'Aktif', 'user', '2020-02-12', '', 'user.png'),
(22, 'mawl', 'mawl@localhost.com', 35467, '7aaf0f734b87d71fd9993ce7bffbb6f2', 'Plumbon', 'Aktif', 'user', '2020-02-12', '', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `subjek_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `subjek_kategori`) VALUES
(1, 'Internet bermasalah', 'Internet bermasalah'),
(2, 'Koneksi acces point lambat', 'Koneksi acces point lambat'),
(3, 'Web Rusak /server rusak', 'Web Rusak /server rusak'),
(4, 'Internet gagal terhubung', 'Internet gagal terhubung'),
(5, 'cctv nggk konek', 'cctv nggk konek'),
(6, 'Biaya tidak sesuai tarif', 'Biaya tidak sesuai tarif'),
(7, 'Sudah bayar tpi blm konfirmasi', 'Sudah bayar tpi blm konfirmasi di server'),
(8, 'Internet mati, nggk bisa nonton violet evergarden', 'Internet mati, nggk bisa nonton violet evergarden');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
