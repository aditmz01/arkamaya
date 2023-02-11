-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 05:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project_aditya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_m_client`
--

CREATE TABLE `tb_m_client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(30) NOT NULL,
  `client_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_m_client`
--

INSERT INTO `tb_m_client` (`client_id`, `client_name`, `client_address`) VALUES
(1, 'NEC', 'Jakarta'),
(2, 'TAM', 'Jakarta'),
(3, 'TUA', 'Jakarta'),
(4, 'BDG', 'Surabaya\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_m_project`
--

CREATE TABLE `tb_m_project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_start` date NOT NULL,
  `project_end` date NOT NULL,
  `project_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_m_project`
--

INSERT INTO `tb_m_project` (`project_id`, `project_name`, `client_id`, `project_start`, `project_end`, `project_status`) VALUES
(59, 'WMS', 1, '2022-07-28', '2022-08-28', 'OPEN'),
(60, 'FILMS', 2, '2023-12-31', '2023-12-31', 'DOING'),
(61, 'DOC', 3, '2019-06-28', '2019-10-31', 'DONE'),
(65, 'POS', 4, '2023-12-31', '2023-12-31', 'Choose Status Project...');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`) VALUES
(1, 'arkamaya', 'arkamaya', 'PT.Arkamaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_m_client`
--
ALTER TABLE `tb_m_client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `tb_m_project`
--
ALTER TABLE `tb_m_project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_m_client`
--
ALTER TABLE `tb_m_client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_m_project`
--
ALTER TABLE `tb_m_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_m_project`
--
ALTER TABLE `tb_m_project`
  ADD CONSTRAINT `tb_m_project_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `tb_m_client` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
