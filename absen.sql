-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 07:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabsen`
--

CREATE TABLE `tabsen` (
  `id_absen` int(24) NOT NULL,
  `id_user` int(24) NOT NULL,
  `longitude` varchar(256) NOT NULL,
  `latitude` varchar(256) NOT NULL,
  `foto_absen` varchar(256) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `att_status` varchar(64) NOT NULL,
  `work_status` varchar(64) NOT NULL,
  `reason` varchar(256) DEFAULT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabsen`
--

INSERT INTO `tabsen` (`id_absen`, `id_user`, `longitude`, `latitude`, `foto_absen`, `create_date`, `att_status`, `work_status`, `reason`, `status`) VALUES
(1, 3, '106.67577960207188', '-6.119598194306859', 'fotouser/6525026c79862.png', '2023-10-10 07:51:08', 'Hadir', 'WFH', '', ''),
(2, 3, '106.67576520254497', '-6.119598226293625', 'fotouser/65250788e961c.png', '2023-10-10 08:12:56', 'Izin', 'WFH', 'asdf', ''),
(3, 3, '106.67577177498055', '-6.1196140579324245', 'fotouser/652511a000b68.png', '2023-10-10 08:56:00', 'Hadir', 'WFO', '', ''),
(4, 3, '106.67573407400036', '-6.119618192974676', 'fotouser/6525193737871.png', '2023-10-10 09:28:23', 'Hadir', 'WFH', 'hadir', ''),
(5, 3, '106.6757906338199', '-6.119577088639611', 'fotouser/65261a097b707.png', '2023-10-11 03:44:09', 'Hadir', 'WFH', '', ''),
(6, 6, '106.67583334987592', '-6.119585281587162', 'fotouser/652e10fa404b0.png', '2023-10-17 04:43:38', 'Hadir', 'WFH', '', 'Masuk'),
(7, 6, '106.67573757888607', '-6.119605592977082', '652e119b36808.png', '2023-10-17 04:46:19', 'Hadir', 'WFH', '', 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id_user` int(11) NOT NULL,
  `nip_user` varchar(64) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `nohp_user` varchar(64) NOT NULL,
  `alamat_user` varchar(256) NOT NULL,
  `fotouser` varchar(256) NOT NULL,
  `password` varchar(64) NOT NULL,
  `id_role` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id_user`, `nip_user`, `nama_user`, `nohp_user`, `alamat_user`, `fotouser`, `password`, `id_role`) VALUES
(1, '2306608', 'Anes', '082347478902', 'Jl. Kebahagiaan', '', '$2y$10$4SFOo/BcnpatzPwAuQQriOh3Z9YYwJNMryFPtA9ag3aX/e4Ppkx4O', 1),
(2, '2306608', 'admin', '08273783990', 'Jl. Lala', 'nama1.PNG', '$2y$10$4SFOo/BcnpatzPwAuQQriOh3Z9YYwJNMryFPtA9ag3aX/e4Ppkx4O', 1),
(3, '023066780', 'silvi', '0872879389', 'Jl. Kegangsaan Timur No.45', 'nama2.PNG', '$2y$10$CF.CQdpVZFwbXefgcv.8suHzx4Sb44HcpMZy7jcBQNFt21uuMZ.D2', 2),
(5, '1234567', 'anes', '08226397389', 'Jl. lalaland', 'app.jpg', '$2y$10$CF.CQdpVZFwbXefgcv.8suHzx4Sb44HcpMZy7jcBQNFt21uuMZ.D2', 1),
(6, '123', 'asdf', '02584666', 'Jl.lalala', 'WANDAWAN-M1900.jpg', '$2y$10$hf08xDnXKvxSd8wOcsB4LOOzLH6P34dEdK6CdgBSGAndQSLWaYR02', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabsen`
--
ALTER TABLE `tabsen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabsen`
--
ALTER TABLE `tabsen`
  MODIFY `id_absen` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
