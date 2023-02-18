-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 01:29 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(12) NOT NULL,
  `name` varchar(20) NOT NULL,
  `user_id` int(122) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `user_id`) VALUES
(2, 'mmooppp', NULL),
(3, 'mmooppp', NULL),
(5, 'mmooppp', 16),
(6, 'mmooppp', 16),
(11, 'mmooppp', 13),
(13, 'ksjcdcd', 13),
(14, 'ahmw', 13),
(15, 'fatma', 13),
(16, 'mmmmmn', 13),
(17, 'ffffffffff', 13),
(18, 'llll', 13),
(19, 'ppp', 13),
(20, 'ksjcdcd', 16),
(22, 'ppppp', 13),
(23, 'mmm', 13),
(24, 'ppppppppp', 13),
(25, 'rice', 1),
(26, 'pasta', 1),
(27, 'ric', 13),
(28, 'eeee', 1),
(29, 'farrhgfgs', 13);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(12) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `price` varchar(200) DEFAULT NULL,
  `image` mediumtext DEFAULT NULL,
  `user_id` int(200) DEFAULT NULL,
  `category_id` int(202) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `user_id`, `category_id`) VALUES
(4, 'fatma', '444', '6393824de3c5a0.89205958.jpg', 16, 5),
(10, 'fatmat', '555', '6393a9221fb760.02631757.jpg', 13, 16),
(11, 'qqq', '33', '6393a9311db923.70329666.jpg', 13, 22),
(12, 'wwww', '22', '6393a943167405.86048905.jpg', 13, 11),
(13, 'koki', '56', '6393c9f0e28388.58436746.jpg', 13, 13),
(14, 'masry', '300', '63962150672f74.61134903.jpg', 1, 25),
(15, 'fatma', '33', '639627180010a5.96088315.jpg', 13, 16),
(16, 'eeeeeee', '33', '63962d059d9097.51934472.jpg', 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'fatmaameen10@gmail.com', '$2y$10$0/Bl6txX4oPyHEF16vBJ1ulprnEAQ2u3ZexShkGmXC9'),
(2, 'hagerabdo114gogo@gmail.com', '$2y$10$aBBVDoi51tY/PDi06XhF0uOtcL0EL2coP8fpOvAsyML'),
(3, 'fatmaameen10@gmail.com', '$2y$10$ub.vkuzBRHWioU4yEZ9eHed/Yk8lz/vbv3Iz02vqDAy'),
(4, 'fmrknfr@mmjf.com', '$2y$10$ACXQ4ch58s/wfid4a.GWKekkX99pYrdXLoWSsm0ZTPD'),
(5, 'fmrknfr@mmjf.com', '$2y$10$Mh1EmGnEKDxGZia0MmN/cujncVbnGqXdL14/XIFYBOv'),
(6, 'fmrknfr@mmjf.com', '$2y$10$Q9mvOgKD44X1my0mXUHuyu3VekTCNNXP0OWhtdhjTk7'),
(7, 'vrfjiejvfejv@kfjrfk.com', '$2y$10$lnIO5N3p86nDB4VXgiaWjuWrwCNWwuLh571BlOb1lGT'),
(8, 'gahg@gmail.com', '$2y$10$Dmflbkbj/GeiqKRqDhMQcOo5XdApM8C4lJhhH4GeVUk'),
(9, 'eeeee@nnnnn.com', '$2y$10$zw8qM7VlfklAq/sApSr8..zuVmjPfQpZyx1Wyk7kujk'),
(10, 'asasas@as.com', '$2y$10$./lTSIt9O434sdZ.UEUTPuj9RjGf.QwsRbMZ/yssJLh'),
(11, 'ggggg@g.com', '$2y$10$8z9tVe2WwtLn5QkskFYoHuxuSNwDc6pjAWc9Xy/uez/'),
(12, 'ppppp@p.com', '$2y$10$0U9B17BTVOvjcPruwxb1Hey7Isa3cXGbst0EArlQClR'),
(13, 'tota@tota.com', '$2y$10$/b3uZYuO.JaIVaXaxmSsgetfECE.tt2e3n7l5TBpn0d'),
(14, 'fa@fa.com', '$2y$10$U1Vj6Rz2pwr.txWLL4nLyOCXDdCUf9t0hUWv9NBwLOZ'),
(15, 'pppppppp@pp.com', '$2y$10$ypcqlmWspanJD/h45mwQiuO5azJfWqtrRZBbtMk8jaS'),
(16, 'kk@kk.com', '$2y$10$95W.0xwCymTX7ybFwVIsDu60afHIKEeVDZGasiU9/3b'),
(17, 'rr@rr.com', '$2y$10$KUzgprUSvGI4H3rI//qsX.TV5/HvrQIcoLk8VjaAruP'),
(18, 'dd@dd.com', '$2y$10$jHEQ3EwK7JEFaVxZlkzBjeKLUXdtzWBLQw6NHLEkKH3'),
(19, 'oo@l.com', '$2y$10$zKI8GCTrQASgJWSdQwRojeNfBuiEmxASUCwzjeSn9c7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relation1` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relation` (`user_id`),
  ADD KEY `relationn` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `relation1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `relation` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relationn` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
