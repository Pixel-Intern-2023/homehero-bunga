-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 09:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homehero`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_profile` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `name`, `img_profile`, `password`) VALUES
(1, 'tes', 'tes1', '64b94648015da.jpg', '$2y$10$iGYcRkuVEpFn5W0psBlIb.TI3GuOWHPoG8ObXhliDn3xtzcVduyuq'),
(11, 'tes1', 'Bunga Nabila Rahmadhani', '', '$2y$10$sKa4PjoUgRqIy6mYPIquUOhpQraC3K8GIznnuOM3kEpQwif46EMfC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `id_employee` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_Occupation` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `img_profile` varchar(255) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`id_employee`, `name`, `id_Occupation`, `salary`, `description`, `created_at`, `update_at`, `img_profile`, `id_status`) VALUES
(150, 'Bunga Nabila Rahmadhani', 1, 0, '', '2023-07-20 21:42:06', '0000-00-00 00:00:00', '64b9f07eedcc3.jpg', 1),
(151, 'suwirno', 2, 0, '', '2023-07-20 21:42:54', '0000-00-00 00:00:00', '64b9f0ae3657c.jpg', 1),
(152, 'Asep', 3, 0, '', '2023-07-20 21:43:10', '2023-07-21 02:43:40', '64b9f0be8bb35.jpg', 2),
(153, 'nabnab', 7, 0, '', '2023-07-20 21:43:26', '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_occupation`
--

CREATE TABLE `tb_occupation` (
  `id_Occupation` int(11) NOT NULL,
  `occupation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_occupation`
--

INSERT INTO `tb_occupation` (`id_Occupation`, `occupation`) VALUES
(1, 'Manajer Operasional'),
(2, 'Manajer Layanan Pelanggan'),
(3, 'Manajer Pemeliharaan Rumah'),
(4, 'Staf Administrasi dan Keuangan'),
(5, 'Spesialis Pemasaran dan Promosi'),
(6, 'Teknisi Pemeliharaan Rumah'),
(7, 'Teknisi Perbaikan'),
(8, 'Teknisi Kebersihan'),
(9, 'Teknisi Penataan & Desain Interior');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`) VALUES
(1, 'Working'),
(2, 'Fired');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `id_Occupation` (`id_Occupation`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `tb_occupation`
--
ALTER TABLE `tb_occupation`
  ADD PRIMARY KEY (`id_Occupation`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `tb_occupation`
--
ALTER TABLE `tb_occupation`
  MODIFY `id_Occupation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD CONSTRAINT `tb_employee_ibfk_1` FOREIGN KEY (`id_Occupation`) REFERENCES `tb_occupation` (`id_Occupation`),
  ADD CONSTRAINT `tb_employee_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
