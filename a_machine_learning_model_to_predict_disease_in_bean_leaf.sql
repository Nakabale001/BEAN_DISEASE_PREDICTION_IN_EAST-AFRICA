-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2026 at 09:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_machine_learning_model_to_predict_disease_in_bean_leaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `predictions`
--

CREATE TABLE `predictions` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `confidence` decimal(5,2) NOT NULL,
  `language` varchar(10) NOT NULL,
  `prediction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `predictions`
--

INSERT INTO `predictions` (`id`, `image_name`, `disease`, `confidence`, `language`, `prediction_date`) VALUES
(1, 'healthy_leaf.jpg', 'healthy', '98.75', 'en', '2026-06-02 14:01:03'),
(2, 'rust_leaf.jpg', 'Minor_bean_rust', '92.40', 'en', '2026-06-02 14:01:03'),
(3, 'angular_leaf.jpg', 'Minor_angular_leaf_spot', '95.20', 'lg', '2026-06-02 14:01:03'),
(4, 'bean_20260602171849_6a1ee64939a62.jpg', 'severe_bean_rust', '43.58', 'en', '2026-06-02 14:19:03'),
(5, 'bean_20260602172130_6a1ee6ea0c032.jpg', 'healthy', '41.96', 'en', '2026-06-02 14:21:45'),
(6, 'bean_20260602172229_6a1ee7258b852.jpg', 'healthy', '74.82', 'en', '2026-06-02 14:22:44'),
(7, 'bean_20260602175340_6a1eee74c52a6.jpg', 'healthy', '75.14', 'en', '2026-06-02 14:53:55'),
(8, 'bean_20260602180041_6a1ef019cba7f.jpg', 'healthy', '38.59', 'en', '2026-06-02 15:00:56'),
(9, 'bean_20260602185600_6a1efd10661ab.jpg', 'healthy', '55.54', 'en', '2026-06-02 15:56:22'),
(10, 'bean_20260602185651_6a1efd434c69f.jpg', 'severe_bean_rust', '62.35', 'en', '2026-06-02 15:57:12'),
(11, 'bean_20260602185740_6a1efd74209aa.jpg', 'severe_bean_rust', '90.94', 'en', '2026-06-02 15:58:00'),
(12, 'bean_20260602185837_6a1efdadf1cbe.jpg', 'healthy', '44.25', 'lg', '2026-06-02 15:58:58'),
(13, 'bean_20260602190102_6a1efe3eea1dc.jpg', 'healthy', '75.14', 'sw', '2026-06-02 16:01:24'),
(14, 'bean_20260602195317_6a1f0a7dcd116.jpg', 'severe_bean_rust', '40.36', 'en', '2026-06-02 16:53:46'),
(15, 'bean_20260602195454_6a1f0adeda98b.jpg', 'healthy', '44.25', 'en', '2026-06-02 16:55:11'),
(16, 'bean_20260602230329_6a1f37114be02.jpg', 'healthy', '74.82', 'en', '2026-06-02 20:03:47'),
(17, 'bean_20260602230906_6a1f38623e9c0.jpg', 'severe_angular_leaf_spot', '42.37', 'lg', '2026-06-02 20:09:20'),
(18, 'bean_20260603193510_6a2057be37d04.jpg', 'healthy', '41.96', 'en', '2026-06-03 16:35:30'),
(19, 'bean_20260604171617_6a2188b18ad4e.png', 'Minor_angular_leaf_spot', '26.51', 'en', '2026-06-04 14:16:42'),
(20, 'bean_20260605134947_6a22a9cb89855.jpg', 'severe_angular_leaf_spot', '53.65', 'en', '2026-06-05 10:50:14'),
(21, 'bean_20260605135522_6a22ab1a45b01.jpg', 'Minor_bean_rust', '50.16', 'en', '2026-06-05 10:55:37'),
(22, 'bean_20260605170355_6a22d74bc77b2.jpg', 'severe_angular_leaf_spot', '44.78', 'lg', '2026-06-05 14:04:14'),
(23, 'bean_20260613094423_6a2cfc4774070.jpg', 'severe_angular_leaf_spot', '44.78', 'en', '2026-06-13 06:44:47'),
(24, 'bean_20260615110653_6a2fb29d228db.jpg', 'severe_angular_leaf_spot', '53.65', 'en', '2026-06-15 08:07:20'),
(25, 'bean_20260615111355_6a2fb44346cdb.jpg', 'healthy', '75.14', 'en', '2026-06-15 08:14:10'),
(26, 'bean_20260615111601_6a2fb4c146a91.jpg', 'severe_bean_rust', '40.36', 'en', '2026-06-15 08:16:23'),
(27, 'bean_20260615112915_6a2fb7dbc2c43.jpg', 'healthy', '75.14', 'en', '2026-06-15 08:29:38'),
(28, 'bean_20260617115511_6a3260efa819b.jpg', 'healthy', '75.14', 'en', '2026-06-17 08:55:33'),
(29, 'bean_20260617115853_6a3261cd3655f.jpg', 'Minor_bean_rust', '50.16', 'lg', '2026-06-17 08:59:02'),
(30, 'bean_20260621181444_6a37ffe442028.jpg', 'healthy', '38.59', 'en', '2026-06-21 15:15:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `predictions`
--
ALTER TABLE `predictions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `predictions`
--
ALTER TABLE `predictions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
