-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 03:12 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `type`, `description`, `image`, `price`) VALUES
(9, 'Daily Flight Fight Night', 'daily flight', 'shirt', '', 'dfightnight.jpg', 600),
(10, 'Daily Flight Marilyn', 'daily flight', 'shirt', '', 'dmarilyn.jpg', 600),
(13, 'Daily Flight Prayer', 'daily flight', 'shirt', '', 'dprayer.jpg', 600),
(15, 'Daily Flight Millionaire', 'daily flight', 'shirt', '', 'dmillionaire.jpg', 600),
(16, 'Daily Flight Rosa', 'daily flight', 'shirt', '', 'drosa.jpg', 600),
(17, 'Daily Flight Rosa(Black)', 'daily flight', 'shirt', '', 'drosablack.jpg', 600),
(18, 'Daily Flight 2 Joints Hoodie', 'daily flight', 'hoodie', '', 'd2j.jpg', 1200),
(19, 'Gnarly AMFAF', 'gnarly', 'long sleeves', 'Trust no one, g\r\n\r\nA super soft black crewneck stating our worldview on friends and mates. All your friends are fake!', 'gamfar.jpg', 1200),
(20, 'Gnarly Pink Hood!', 'gnarly', 'hoodie', '', 'gpinkhood.jpg', 1700),
(21, 'Gnarly FBC', 'gnarly', 'shirt', 'Nothing more; nothing less.\r\n\r\nSimple words should suffice. White tee. Face of an icon. 100% awesome.', 'gfbc.jpg', 650),
(22, 'Gnarly Hello Yellow', 'gnarly', 'shirt', 'Superheroes are real, g.\r\n\r\nA comfy yellow tee inspired by one of the biggest comic publishers in the universe. The real superheroes are those who create these bad-ass panels for our enjoyment, yo! Praise the true godz.', 'ghello yellow.jpg', 600),
(23, 'Gnarly Gnarcity Crew', 'gnarly', 'long sleeves', '', 'gnarcity.jpg', 1200),
(24, 'Gnarly SAD', 'gnarly', 'shirt', 'Bear game strong, brah!\r\n\r\nTo be part of the big leagues, you gotta know that sometimes, being loosey-goosey is still all good. With the Bear and this white tee, we just had fun, ya know?', 'gsadbear.jpg', 650),
(25, 'Gnarly SEAL', 'gnarly', 'shirt', 'A gentle reminder: no one fucks w/ us.', 'gseal.jpg', 650),
(26, 'ILLEST Racing', 'illest', 'shirt', '', 'iracing.jpg', 1302.25),
(27, 'ILLEST Predict', 'illest', 'shirt', '', 'ipredict.jpg', 1302.25),
(28, 'KUSH ACDC', 'kush', 'shirt', '', 'kacdc black.jpg', 600),
(29, 'KUSH Basic Hoodie', 'kush', 'hoodie', '', 'kbasic hoodie.jpg', 1200),
(30, 'KUSH Basic Spiral', 'kush', 'shirt', '', 'kbasic spiral.jpg', 600),
(31, 'KUSH Grand Daddy Purple', 'kush', 'shirt', '', 'kdaddy.jpg', 600),
(32, 'KUSH Neon', 'kush', 'shirt', '', 'kneon.jpg', 600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
