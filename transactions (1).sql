-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2021 at 02:10 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16375850_banking1`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Sender` varchar(20) NOT NULL,
  `Receiver` varchar(20) NOT NULL,
  `Amount` int(50) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `Sender`, `Receiver`, `Amount`, `Date`) VALUES
(1, '1', '4', 1000, '2021-03-05 19:59:40'),
(2, '1', '1', 1000, '2021-03-05 20:28:38'),
(3, '5', '5', 10000, '2021-03-05 20:48:01'),
(4, '6', '6', 1000, '2021-03-07 10:52:15'),
(5, '6', '6', 1000, '2021-03-07 11:01:18'),
(6, '3', '6', 2000, '2021-03-07 11:10:39'),
(7, '6', '10', 1000, '2021-03-07 11:20:29'),
(8, '10', '3', 1000, '2021-03-07 11:25:00'),
(9, '8', '1', 1000, '2021-03-10 19:26:42'),
(10, '3', '1', 1000, '2021-03-10 19:33:56'),
(11, '2', '8', 2000, '2021-03-10 19:53:51'),
(12, '8', '1', 1000, '2021-03-10 20:03:34'),
(13, '1', '3', 1000, '2021-03-10 20:24:52'),
(14, '3', '1', 1000, '2021-03-10 20:26:57'),
(15, '4', '1', 1000, '2021-03-10 20:36:13'),
(16, '10', '1', 1000, '2021-03-14 09:11:54'),
(17, '1', '10', 1000, '2021-03-14 09:15:38'),
(18, '1', '10', 1000, '2021-03-14 09:16:57'),
(19, '10', '1', 1000, '2021-03-14 09:19:04'),
(20, '1', '8', 1000, '2021-03-14 09:27:16'),
(21, '3', '4', 1000, '2021-03-14 09:31:11'),
(22, '6', '3', 1000, '2021-03-14 09:34:50'),
(23, '5', '3', 1000, '2021-03-14 10:20:14'),
(24, '10', '1', 1000, '2021-03-14 10:54:12'),
(25, '3', '10', 100, '2021-03-16 09:46:03'),
(26, '2', '10', 300, '2021-03-16 09:53:06'),
(27, '10', '4', 100, '2021-03-16 10:04:24'),
(28, '10', '4', 900, '2021-03-16 10:23:32'),
(29, '10', '4', 100, '2021-03-16 10:28:08'),
(30, '4', '10', 100, '2021-03-18 14:03:29'),
(31, '1', '7', 1000, '2021-03-18 14:14:20'),
(32, '7', '1', 1000, '2021-03-18 14:25:11'),
(33, '10', '4', 4000, '2021-03-18 14:32:07'),
(34, '1', '5', 1000, '2021-03-19 14:03:41'),
(35, '1', '4', 1000, '2021-03-19 14:08:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
