-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 06:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `default`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbmaster_menu`
--

CREATE TABLE `tbmaster_menu` (
  `menu_id` varchar(4) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_url` text DEFAULT NULL,
  `menu_icon` varchar(100) NOT NULL,
  `menu_parent_id` varchar(4) DEFAULT NULL,
  `menu_is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbmaster_menu`
--

INSERT INTO `tbmaster_menu` (`menu_id`, `menu_name`, `menu_url`, `menu_icon`, `menu_parent_id`, `menu_is_active`) VALUES
('M000', 'USER MANAGEMENT', NULL, 'fas fw fa-users', NULL, 1),
('M001', 'USER AKSES', 'akses', 'fas faw fa-users', 'M000', 1),
('M002', 'DAFTAR USER', 'user', 'fas faw fa-users', 'M000', 1),
('M003', 'PENGATURAN', NULL, 'fas faw fa-cog', NULL, 1),
('M004', 'MENU', 'menu', 'fas faw fa-bars', 'M003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbmaster_user`
--

CREATE TABLE `tbmaster_user` (
  `user_flag` varchar(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip_address` varchar(15) DEFAULT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` text NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_level` varchar(1) NOT NULL,
  `user_session` text DEFAULT NULL,
  `user_is_active` enum('0','1') NOT NULL DEFAULT '1',
  `user_created_by` varchar(20) NOT NULL,
  `user_created_at` datetime NOT NULL,
  `user_updated_by` varchar(20) DEFAULT NULL,
  `user_updated_at` datetime DEFAULT NULL,
  `user_deleted_by` varchar(20) DEFAULT NULL,
  `user_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbmaster_user`
--

INSERT INTO `tbmaster_user` (`user_flag`, `user_id`, `user_ip_address`, `user_username`, `user_password`, `user_fullname`, `user_email`, `user_level`, `user_session`, `user_is_active`, `user_created_by`, `user_created_at`, `user_updated_by`, `user_updated_at`, `user_deleted_by`, `user_deleted_at`) VALUES
(NULL, 1, '::1', 'SADMIN', '$2y$10$bRpZeqDerbkcIOX/7MkBluATvzcqImk7MMKzwwYkpPX2/P4SiFO66', 'SUPER ADMINISTRATOR', 'lawangs@outlook.com', '0', '10238899195ebf56bb52bc6', '1', 'SYSTEM', '2020-05-06 04:54:35', NULL, NULL, NULL, NULL),
(NULL, 6, NULL, 'ADMIN', '$2y$10$3s4T/bbV0oFeORlC6YlU/uxNHMMpmq8nZSRk3SAYXvYr5vQVc8C2a', 'Administrator', 'admin@gmail.com', '1', NULL, '1', 'SADMIN', '2020-05-08 05:46:35', 'SADMIN', '2020-05-13 04:06:56', 'SADMIN', '2020-05-13 04:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbmaster_user_access`
--

CREATE TABLE `tbmaster_user_access` (
  `uac_id` int(11) NOT NULL,
  `uac_user_level` int(1) NOT NULL,
  `uac_menu_id` varchar(4) NOT NULL,
  `uac_baca` varchar(1) NOT NULL,
  `uac_tambah` varchar(1) NOT NULL,
  `uac_ubah` varchar(1) NOT NULL,
  `uac_hapus` varchar(1) NOT NULL,
  `uac_created_by` varchar(14) NOT NULL,
  `uac_created_at` datetime NOT NULL,
  `uac_updated_by` varchar(14) DEFAULT NULL,
  `uac_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbmaster_user_access`
--

INSERT INTO `tbmaster_user_access` (`uac_id`, `uac_user_level`, `uac_menu_id`, `uac_baca`, `uac_tambah`, `uac_ubah`, `uac_hapus`, `uac_created_by`, `uac_created_at`, `uac_updated_by`, `uac_updated_at`) VALUES
(1, 0, 'M000', '1', '0', '0', '0', 'SADMIN', '2020-05-05 20:33:48', NULL, NULL),
(2, 0, 'M001', '1', '1', '1', '1', 'SADMIN', '2020-05-05 20:33:48', NULL, NULL),
(3, 0, 'M002', '1', '1', '1', '1', 'SADMIN', '2020-05-08 20:33:48', NULL, NULL),
(4, 1, 'M000', '1', '0', '0', '0', 'SADMIN', '2020-05-05 20:33:48', NULL, NULL),
(5, 1, 'M001', '1', '0', '0', '0', 'SADMIN', '2020-05-10 20:33:48', NULL, NULL),
(7, 1, 'M002', '1', '1', '1', '1', 'SADMIN', '2020-05-08 20:33:48', NULL, NULL),
(8, 0, 'M003', '1', '1', '1', '1', 'SADMIN', '2020-05-16 20:33:48', NULL, NULL),
(9, 1, 'M003', '1', '1', '1', '1', 'SADMIN', '2020-05-16 20:33:48', NULL, NULL),
(10, 0, 'M004', '1', '1', '1', '1', 'SADMIN', '2020-05-16 20:33:48', NULL, NULL),
(11, 1, 'M004', '1', '1', '1', '1', 'SADMIN', '2020-05-16 20:33:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbmaster_user_level`
--

CREATE TABLE `tbmaster_user_level` (
  `uvel_id` int(11) NOT NULL,
  `uvel_level` varchar(1) NOT NULL,
  `uvel_nama` varchar(50) NOT NULL,
  `uvel_keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbmaster_user_level`
--

INSERT INTO `tbmaster_user_level` (`uvel_id`, `uvel_level`, `uvel_nama`, `uvel_keterangan`) VALUES
(1, '0', 'Super Administrator', NULL),
(2, '1', 'Admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbmaster_menu`
--
ALTER TABLE `tbmaster_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbmaster_user`
--
ALTER TABLE `tbmaster_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`);

--
-- Indexes for table `tbmaster_user_access`
--
ALTER TABLE `tbmaster_user_access`
  ADD PRIMARY KEY (`uac_id`);

--
-- Indexes for table `tbmaster_user_level`
--
ALTER TABLE `tbmaster_user_level`
  ADD PRIMARY KEY (`uvel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbmaster_user`
--
ALTER TABLE `tbmaster_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbmaster_user_access`
--
ALTER TABLE `tbmaster_user_access`
  MODIFY `uac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbmaster_user_level`
--
ALTER TABLE `tbmaster_user_level`
  MODIFY `uvel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
