-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2018 at 10:18 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blueoasis`
--
CREATE DATABASE IF NOT EXISTS `blueoasis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blueoasis`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amenities`
--

CREATE TABLE `tbl_amenities` (
  `id` int(11) NOT NULL,
  `amenityName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `amenityDescription` varchar(255) CHARACTER SET utf8 NOT NULL,
  `amenityPrice` decimal(12,0) NOT NULL,
  `isVisible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_amenities`
--

INSERT INTO `tbl_amenities` (`id`, `amenityName`, `amenityDescription`, `amenityPrice`, `isVisible`) VALUES
(1, 'Room 1', ' Room with Veranda', '3000', 1),
(2, 'Room 2', 'Room by the Pool', '2000', 1),
(3, 'Karaoke', 'Karaoke Amenity', '400', 1),
(4, 'Jacuzzi', 'Jacuzzi Amenity', '600', 1),
(5, 'Hydrojet', 'Hydrojet Amenity', '600', 1),
(6, 'Common Area', 'Common Area', '0', 0),
(7, 'Stove', 'stove', '300', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment`
--

CREATE TABLE `tbl_equipment` (
  `id` int(11) NOT NULL,
  `equipmentName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL,
  `buyingPrice` decimal(6,0) NOT NULL,
  `managerNotes` text CHARACTER SET utf8,
  `amenity_id` int(11) NOT NULL,
  `latestStatus` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `latestComment` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_equipment`
--

INSERT INTO `tbl_equipment` (`id`, `equipmentName`, `quantity`, `buyingPrice`, `managerNotes`, `amenity_id`, `latestStatus`, `latestComment`) VALUES
(1, 'Wireless Bluetooth Speakers', 2, '10000', '', 6, NULL, NULL),
(2, 'Hot/cold Water Dispenser', 1, '2000', '', 6, NULL, NULL),
(3, 'Barbecue Grill', 1, '700', '', 6, NULL, NULL),
(4, 'Picnic Table Set', 1, '10000', '', 6, NULL, NULL),
(5, 'Tables', 4, '500', '', 6, NULL, NULL),
(6, 'Chairs', 30, '150', '3 missing', 6, NULL, NULL),
(7, 'Large cooler', 3, '500', NULL, 6, NULL, NULL),
(8, 'Pillows', 2, '1000', NULL, 1, NULL, NULL),
(9, 'Blanket', 1, '500', NULL, 1, NULL, NULL),
(10, 'Towels', 2, '250', NULL, 1, NULL, NULL),
(11, 'Aircon Remote', 1, '0', NULL, 1, NULL, NULL),
(12, 'Karaoke', 1, '5000', NULL, 3, NULL, NULL),
(13, 'Hydro Jet', 1, '10000', NULL, 5, NULL, NULL),
(14, 'Pillows', 4, '500', NULL, 2, 'Complete', 'asdasasdd'),
(15, 'Blanket', 2, '500', NULL, 2, 'Complete', ''),
(16, 'Towels', 3, '250', NULL, 2, 'Complete', ''),
(17, 'Lamp light bulb', 2, '350', NULL, 2, 'Complete', ''),
(18, 'Aircon Remote', 1, '0', NULL, 2, 'Complete', ''),
(19, 'Jacuzzi', 1, '50000', NULL, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text CHARACTER SET utf8,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `mgr_evaluation` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `rating`, `review`, `image`, `mgr_evaluation`, `user_id`, `reservation_id`) VALUES
(8, 5, 'The quick brown fox jumps over the lazy dog.', 'Chrysanthemum.jpg', 'Approved', 9, 38),
(7, 5, 'asdasdsadasd', 'Jellyfish.jpg', 'Approved', 3, 37),
(9, 3, 'qwertyuiop', 'Tulips.jpg', 'Pending', 1, 21),
(5, 2, 'qwefgqewrgqergwfQSCAsdqw', '1237986_10201840234548097_1855117171_n.jpg', 'Pending', 8, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `imageName` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home`
--

CREATE TABLE `tbl_home` (
  `id` int(8) NOT NULL,
  `imageName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `imageDescription` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_home`
--

INSERT INTO `tbl_home` (`id`, `imageName`, `imageDescription`) VALUES
(1, 'home1.jpg', 'Clear blue water'),
(2, 'home2.jpg', 'AASDFGHJKL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `log_dateTime` datetime(6) NOT NULL,
  `action` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`id`, `user_id`, `log_dateTime`, `action`) VALUES
(1, 1, '2018-01-28 14:50:38.000000', 'Log In'),
(2, 1, '2018-01-28 15:00:55.000000', 'Log Out'),
(3, 1, '2018-01-28 15:11:39.000000', 'Log In'),
(4, 1, '2018-01-28 15:11:42.000000', 'Log Out'),
(5, 1, '2018-01-28 16:26:42.000000', 'Log In'),
(6, 3, '2018-01-28 22:30:54.000000', 'Log In'),
(7, 1, '2018-01-28 22:42:25.000000', 'Log In'),
(8, 4, '2018-01-28 22:47:24.000000', 'Log In'),
(9, 1, '2018-01-28 22:53:14.000000', 'Log In'),
(10, 4, '2018-01-28 23:02:44.000000', 'Log In'),
(11, 4, '2018-01-29 03:39:22.000000', 'Log Out'),
(12, 4, '2018-01-29 03:43:22.000000', 'Log In'),
(13, 4, '2018-01-29 03:44:18.000000', 'Log In'),
(14, 4, '2018-01-29 17:40:20.000000', 'Log In'),
(15, 4, '2018-01-29 17:44:21.000000', 'Log Out'),
(16, 3, '2018-01-29 17:44:43.000000', 'Log In'),
(17, 5, '2018-01-29 18:03:31.000000', 'Log In'),
(18, 5, '2018-01-29 18:08:36.000000', 'Log Out'),
(19, 6, '2018-01-29 21:45:27.000000', 'Log In'),
(20, 4, '2018-01-29 21:58:13.000000', 'Log In'),
(21, 4, '2018-01-29 22:09:48.000000', 'Log Out'),
(22, 4, '2018-01-30 08:13:20.000000', 'Log In'),
(23, 4, '2018-01-30 12:34:16.000000', 'Log In'),
(24, 4, '2018-01-31 00:00:48.000000', 'Log In'),
(25, 4, '2018-01-31 01:07:27.000000', 'Log In'),
(26, 4, '2018-01-31 03:13:49.000000', 'Log Out'),
(27, 3, '2018-01-31 03:14:35.000000', 'Log In'),
(28, 4, '2018-01-31 04:45:18.000000', 'Log In'),
(29, 4, '2018-01-31 04:58:06.000000', 'Log Out'),
(30, 7, '2018-01-31 04:58:23.000000', 'Log In'),
(31, 7, '2018-01-31 19:03:27.000000', 'Log In'),
(32, 7, '2018-01-31 19:04:00.000000', 'Log Out'),
(33, 4, '2018-01-31 19:04:22.000000', 'Log In'),
(34, 4, '2018-01-31 19:04:29.000000', 'Log Out'),
(35, 6, '2018-01-31 19:04:38.000000', 'Log In'),
(36, 6, '2018-01-31 19:08:29.000000', 'Log Out'),
(37, 7, '2018-01-31 19:08:42.000000', 'Log In'),
(38, 3, '2018-02-02 08:20:54.000000', 'Log In'),
(39, 7, '2018-02-02 08:35:40.000000', 'Log In'),
(40, 7, '2018-02-02 09:15:05.000000', 'Log Out'),
(41, 3, '2018-02-02 09:15:15.000000', 'Log In'),
(42, 3, '2018-02-02 13:55:28.000000', 'Log Out'),
(43, 7, '2018-02-02 13:55:56.000000', 'Log In'),
(44, 3, '2018-02-03 09:12:54.000000', 'Log In'),
(45, 3, '2018-02-03 09:12:59.000000', 'Log Out'),
(46, 3, '2018-02-03 18:37:17.000000', 'Log In'),
(47, 3, '2018-02-03 20:08:55.000000', 'Log In'),
(48, 3, '2018-02-03 20:51:26.000000', 'Log In'),
(49, 3, '2018-02-03 21:29:23.000000', 'Log Out'),
(50, 8, '2018-02-03 21:48:45.000000', 'Log In'),
(51, 8, '2018-02-04 04:34:51.000000', 'Log Out'),
(52, 3, '2018-02-04 05:16:55.000000', 'Log In'),
(53, 3, '2018-02-04 05:21:11.000000', 'Log Out'),
(54, 3, '2018-02-04 05:25:52.000000', 'Log In'),
(55, 3, '2018-02-04 05:32:06.000000', 'Log Out'),
(56, 7, '2018-02-04 05:32:20.000000', 'Log In'),
(57, 7, '2018-02-04 07:03:24.000000', 'Log Out'),
(58, 3, '2018-02-04 07:59:10.000000', 'Log In'),
(59, 3, '2018-02-04 08:00:30.000000', 'Log In'),
(60, 3, '2018-02-04 08:17:01.000000', 'Log In'),
(61, 3, '2018-02-04 08:33:06.000000', 'Log In'),
(62, 9, '2018-02-04 11:17:25.000000', 'Log In'),
(63, 9, '2018-02-04 11:22:37.000000', 'Log In'),
(64, 9, '2018-02-04 11:46:05.000000', 'Log In'),
(65, 9, '2018-02-04 11:48:20.000000', 'Log Out'),
(66, 7, '2018-02-04 11:48:30.000000', 'Log In'),
(67, 9, '2018-02-04 12:26:47.000000', 'Log In'),
(68, 9, '2018-02-04 12:27:52.000000', 'Log Out'),
(69, 7, '2018-02-04 12:40:28.000000', 'Log In'),
(70, 10, '2018-02-04 13:13:47.000000', 'Log In'),
(71, 10, '2018-02-04 13:24:35.000000', 'Log Out'),
(72, 10, '2018-02-04 13:25:08.000000', 'Log In'),
(73, 10, '2018-02-04 13:26:46.000000', 'Log Out'),
(74, 3, '2018-02-04 13:27:06.000000', 'Log In'),
(75, 3, '2018-02-04 13:32:38.000000', 'Log Out'),
(76, 7, '2018-02-04 13:33:19.000000', 'Log In'),
(77, 7, '2018-02-04 13:56:08.000000', 'Log Out'),
(78, 10, '2018-02-04 13:56:17.000000', 'Log In'),
(79, 10, '2018-02-04 14:02:40.000000', 'Log Out'),
(80, 7, '2018-02-04 14:02:52.000000', 'Log In'),
(81, 7, '2018-02-04 14:03:28.000000', 'Log Out'),
(82, 10, '2018-02-04 14:03:59.000000', 'Log In'),
(83, 10, '2018-02-04 14:12:07.000000', 'Log In'),
(84, 11, '2018-02-17 11:56:46.000000', 'Log In'),
(85, 11, '2018-02-17 12:08:19.000000', 'Log Out'),
(86, 7, '2018-02-17 12:08:41.000000', 'Log In'),
(87, 7, '2018-02-21 19:15:24.000000', 'Log In'),
(88, 1, '2018-02-26 14:20:28.000000', 'Log In'),
(89, 1, '2018-02-26 14:21:10.000000', 'Log Out'),
(90, 1, '2018-02-26 14:22:39.000000', 'Log In'),
(91, 1, '2018-02-26 14:22:44.000000', 'Log Out'),
(92, 1, '2018-02-26 14:23:20.000000', 'Log In'),
(93, 7, '2018-02-26 14:24:04.000000', 'Log In'),
(94, 7, '2018-02-26 14:24:13.000000', 'Log Out'),
(95, 7, '2018-02-26 14:25:53.000000', 'Log In'),
(96, 7, '2018-02-26 14:26:30.000000', 'Log Out'),
(97, 4, '2018-02-26 14:28:08.000000', 'Log In'),
(98, 4, '2018-02-26 14:51:46.000000', 'Log Out'),
(99, 1, '2018-02-26 14:51:58.000000', 'Log In'),
(100, 1, '2018-02-26 15:06:02.000000', 'Log Out'),
(101, 1, '2018-02-26 15:07:06.000000', 'Log In'),
(102, 1, '2018-02-26 15:09:10.000000', 'Log Out'),
(103, 1, '2018-02-26 16:16:51.000000', 'Log In'),
(104, 1, '2018-02-26 16:16:55.000000', 'Log Out'),
(105, 1, '2018-02-26 16:17:22.000000', 'Log In'),
(106, 1, '2018-02-26 16:25:00.000000', 'Log Out'),
(107, 7, '2018-02-26 16:25:14.000000', 'Log In'),
(108, 1, '2018-02-27 08:43:47.000000', 'Log In'),
(109, 1, '2018-02-27 08:45:56.000000', 'Log Out'),
(110, 7, '2018-02-27 13:16:00.000000', 'Log In'),
(111, 7, '2018-03-03 14:06:44.000000', 'Log In'),
(112, 7, '2018-03-03 14:24:34.000000', 'Log Out'),
(113, 1, '2018-03-03 14:24:43.000000', 'Log In'),
(114, 1, '2018-03-03 14:25:08.000000', 'Log Out'),
(115, 7, '2018-03-03 14:29:02.000000', 'Log In'),
(116, 1, '2018-03-03 16:46:08.000000', 'Log In'),
(117, 1, '2018-03-03 16:51:24.000000', 'Log Out'),
(118, 7, '2018-03-03 16:51:34.000000', 'Log In');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `addressCountry` varchar(255) CHARACTER SET utf8 NOT NULL,
  `addressCity` varchar(255) CHARACTER SET utf8 NOT NULL,
  `addressOthers` varchar(255) CHARACTER SET utf8 NOT NULL,
  `totalAmount` int(11) NOT NULL,
  `dpAmount` int(11) NOT NULL,
  `dpPaidOn` datetime DEFAULT NULL,
  `remainingBalance` int(11) NOT NULL,
  `fullPaidOn` date DEFAULT NULL,
  `paymentStatus` varchar(255) CHARACTER SET utf8 NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `fullName`, `addressCountry`, `addressCity`, `addressOthers`, `totalAmount`, `dpAmount`, `dpPaidOn`, `remainingBalance`, `fullPaidOn`, `paymentStatus`, `reservation_id`) VALUES
(1, 'Marielle S. Banares', 'Philippines', 'Quezon City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(2, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(3, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(4, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(5, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(6, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(7, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(8, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(9, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(10, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(11, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(12, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(13, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(14, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(15, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(16, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(17, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(18, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(19, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(20, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(21, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, NULL, 6500, NULL, 'Pending', 18),
(22, 'Rhouwelle B. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 15000, 7500, NULL, 7500, NULL, 'Pending', 19),
(23, 'Rhouwelle B. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 14000, 7000, '2018-01-28 22:36:55', 7000, NULL, 'DPpaid', 20),
(24, '', '', '', '', 14000, 7000, NULL, 7000, NULL, 'Pending', 20),
(25, '', '', '', '', 14000, 7000, NULL, 7000, NULL, 'Pending', 20),
(26, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 12400, 6200, NULL, 6200, NULL, 'Pending', 21),
(27, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 12400, 6200, NULL, 6200, NULL, 'Pending', 21),
(28, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 12400, 6200, NULL, 6200, NULL, 'Pending', 21),
(29, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 12400, 6200, NULL, 6200, NULL, 'Pending', 21),
(30, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 12400, 6200, NULL, 6200, NULL, 'Pending', 21),
(31, 'Rhouwelle B. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 15400, 7700, NULL, 7700, NULL, 'Pending', 22),
(32, 'Lhiana Reign Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 15400, 7700, '2018-01-29 18:06:54', 7700, NULL, 'DPpaid', 23),
(33, 'Reji Acuna', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 15600, 7800, '2018-01-29 21:52:01', 7800, NULL, 'DPpaid', 24),
(34, 'Rhouwelle B. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 13000, 6500, '2018-02-02 08:29:13', 6500, NULL, 'DPpaid', 26),
(36, 'User One', 'Philippines', 'Quezon City', 'Diliman', 15000, 7500, '2018-02-03 00:00:00', 7500, NULL, 'DPpaid', 28),
(37, 'Rhouwelle B. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 14000, 7000, NULL, 7000, NULL, 'Pending', 29),
(38, 'Rhouwelle B. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 14000, 7000, NULL, 7000, NULL, 'Pending', 30),
(39, 'Rhouwelle B. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 14000, 7000, NULL, 7000, NULL, 'Pending', 31),
(40, 'Rhouwelle B. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 14000, 7000, NULL, 7000, NULL, 'Pending', 32),
(41, 'Rhouwelle B. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 14000, 7000, NULL, 7000, NULL, 'Pending', 33),
(42, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 14000, 7000, NULL, 7000, NULL, 'Pending', 35),
(43, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 14000, 7000, NULL, 7000, NULL, 'Pending', 36),
(44, 'Rhouwelle B. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 11600, 5800, NULL, 5800, NULL, 'Pending', 37),
(45, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 11600, 5800, '2018-02-04 08:40:26', 5800, NULL, 'DPpaid', 37),
(46, 'Marielle S. Banares', 'Philippines', 'Valenzuela City', '006 Dela Cruz Alley, 103 Interior, Brgy. Maysan', 15400, 7700, '2018-02-04 11:18:27', 7700, NULL, 'DPpaid', 38),
(47, 'Lucita BaÃ±ares', 'Philippines', 'Manila', '3f NAESS House, 2215 Leon Guinto St., Malate', 15600, 7800, '2018-02-04 13:16:08', 7800, NULL, 'DPpaid', 40),
(48, 'Lucita BaÃ±ares', 'Philippines', 'Manila', '3f NAESS House, 2215 Leon Guinto St., Malate', 15000, 7500, '2018-02-04 13:26:16', 7500, NULL, 'DPpaid', 42);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ratesandamenities`
--

CREATE TABLE `tbl_ratesandamenities` (
  `id` int(8) NOT NULL,
  `imageName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `display` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `id` int(11) NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `reservedDate` date NOT NULL,
  `time` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`id`, `contactNumber`, `reservedDate`, `time`, `user_id`, `payment_id`) VALUES
(1, '09273535869', '2018-01-31', 'Day', 1, NULL),
(2, '09273535869', '2018-01-30', 'Day', 1, NULL),
(3, '09273535869', '2018-01-29', 'Day', 1, NULL),
(4, '09273535869', '2018-01-28', 'Day', 1, NULL),
(5, '09951112233', '2018-01-28', 'Night', 3, NULL),
(6, 'ascacwec', '2018-01-31', 'Night', 1, NULL),
(7, '09999999', '2018-01-30', 'Night', 1, NULL),
(8, '09273535869', '2018-01-30', 'Day', 1, NULL),
(9, '09273535869', '2018-01-31', 'Day', 1, NULL),
(10, '09273535869', '2018-01-28', 'Night', 1, NULL),
(11, '09273535869', '2018-01-31', 'Night', 1, NULL),
(12, '09273535869', '2018-01-30', 'Night', 1, NULL),
(13, '09273535869', '2018-01-31', 'Night', 1, NULL),
(14, '09273535869', '2018-01-31', 'Night', 1, NULL),
(15, '09273535869', '2018-01-31', 'Night', 1, NULL),
(16, '09273535869', '2018-01-31', 'Night', 1, NULL),
(17, '09273535869', '2018-01-30', 'Night', 1, NULL),
(18, '09273535869', '2018-01-31', 'Night', 1, 21),
(19, '09951112233', '2018-01-31', 'Night', 3, 22),
(20, '09273535869', '2018-01-29', 'Night', 3, 25),
(21, '09273535869', '2018-02-09', 'Day', 1, 30),
(22, '0927353536', '2018-01-31', 'Night', 3, 31),
(23, '12345678', '2018-02-20', 'Night', 5, 32),
(24, '09353947863', '2018-03-04', 'Day', 6, 33),
(25, '0912232312', '2018-02-28', 'Night', 3, NULL),
(26, '09223334455', '2018-02-20', 'Day', 3, 34),
(27, 'rgerheryery', '2018-02-23', 'Day', 3, NULL),
(28, '09171234567', '2018-02-23', 'Day', 8, 36),
(29, '09982221134', '2018-02-27', 'Night', 3, 37),
(30, '09273535869', '2018-02-28', 'Night', 3, 38),
(31, '09273535869', '2018-02-28', 'Night', 3, 39),
(32, 'wefwef', '2018-02-19', 'Night', 3, 40),
(33, '09273535869', '2018-02-28', 'Night', 3, 41),
(34, '09273535869', '2018-02-20', 'Night', 3, NULL),
(35, '09273535869', '2018-02-28', 'Night', 3, 42),
(36, '09273535869', '2018-02-20', 'Night', 3, 43),
(37, '09273535869', '2018-02-19', 'Day', 3, 45),
(38, '09273535869', '2018-02-22', 'Night', 9, 46),
(39, '09273535869', '2018-02-23', 'Night', 9, NULL),
(40, '09177001502', '2018-03-16', 'Day', 10, 47),
(41, '12345678', '2018-02-05', 'Day', 10, NULL),
(42, '12345678', '2018-02-05', 'Night', 10, 48),
(43, '09273535869', '2018-02-28', 'Night', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation_amenities`
--

CREATE TABLE `tbl_reservation_amenities` (
  `reservation_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservation_amenities`
--

INSERT INTO `tbl_reservation_amenities` (`reservation_id`, `amenity_id`) VALUES
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 3),
(5, 5),
(6, 1),
(6, 5),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 3),
(9, 5),
(10, 5),
(11, 2),
(11, 3),
(11, 5),
(12, 3),
(12, 4),
(12, 5),
(13, 2),
(13, 4),
(14, 1),
(14, 3),
(14, 5),
(15, 1),
(15, 2),
(16, 3),
(16, 5),
(17, 3),
(17, 5),
(18, 2),
(18, 3),
(18, 5),
(19, 1),
(19, 2),
(20, 1),
(20, 3),
(20, 5),
(21, 1),
(21, 3),
(22, 1),
(22, 2),
(22, 3),
(23, 1),
(23, 2),
(23, 3),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(25, 1),
(25, 3),
(25, 5),
(26, 1),
(26, 3),
(26, 5),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(28, 3),
(28, 5),
(29, 1),
(29, 3),
(29, 5),
(30, 1),
(30, 3),
(30, 5),
(31, 1),
(31, 3),
(31, 5),
(32, 1),
(32, 3),
(32, 5),
(33, 1),
(33, 3),
(33, 5),
(34, 5),
(35, 1),
(35, 3),
(35, 5),
(36, 1),
(36, 3),
(36, 5),
(37, 2),
(37, 4),
(38, 1),
(38, 2),
(38, 3),
(39, 1),
(39, 3),
(39, 5),
(40, 1),
(40, 2),
(40, 3),
(40, 4),
(40, 5),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 3),
(43, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `levelOfAccess` varchar(255) CHARACTER SET utf8 NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `middleName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `token` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `levelOfAccess`, `firstName`, `middleName`, `lastName`, `email`, `username`, `password`, `token`, `status`) VALUES
(1, 'User', 'Marielle', 'Sano', 'Banares', 'mariellebanares@gmail.com', 'marielle92', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
(2, 'User', 'Lucita', 'Centeno', 'Sano', 'lsbnov@yahoo.com', 'lucy1130', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL),
(3, 'User', 'Rhouwelle', 'Berba', 'Banares', 'rhouwelle@yahoo.com', 'rhouwelle86', 'ef4cdd3117793b9fd593d7488409626d', NULL, NULL),
(4, 'Manager', 'Harley', 'Sano', 'Banares', 'harley@gmail.com', 'harley0615', '518c944f355c35c103e892c24e8ebfc6', NULL, NULL),
(5, 'User', 'Lhiana Reign', 'Sano', 'Banares', 'lhiana_reign@yahoo.com', 'lhiana1214', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
(6, 'User', 'Reji Luiz', 'Concepcion', 'Acuna', 'rlca.rph.dohlmd@gmail.com', 'RejiLuiz', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(7, 'Manager', 'Sebastian Kyle', 'Eltanal', 'Alfonso', 'baste730@yahoo.com', 'baste730', '0289c05ce4675b7ca3cc7b97588715cf', NULL, 'Active'),
(8, 'User', 'user', 'one', 'one', 'userone@gmail.com', 'userone', 'd8578edf8458ce06fbc5bb76a58c5ca4', NULL, NULL),
(9, 'User', 'Yeye', 'Banares', 'Sano', 'yeyebanares@gmail.com', 'yeye0902', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
(10, 'User', 'Lucy', 'Centeno', 'Sano', 'lsbnov@yahoo.com', 'lucita1130', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
(11, 'User', 'Marielle', 'S.', 'Banares', 'mariellebanares@gmail.com', 'marielle0902', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
(12, 'Manager', 'Noah Deecon', '', 'Eltanal', 'noahdeecon@gmail.com', 'noahdeecon', '48eb717bcc142780548400509e2e32d8', NULL, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_home`
--
ALTER TABLE `tbl_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_logs_user` (`user_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_payment_reservation` (`reservation_id`);

--
-- Indexes for table `tbl_ratesandamenities`
--
ALTER TABLE `tbl_ratesandamenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_user` (`user_id`),
  ADD KEY `fk_tbl_reservation_payment` (`payment_id`);

--
-- Indexes for table `tbl_reservation_amenities`
--
ALTER TABLE `tbl_reservation_amenities`
  ADD KEY `fk_tbl_ra_reservation` (`reservation_id`),
  ADD KEY `fk_tbl_ra_amenity` (`amenity_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_home`
--
ALTER TABLE `tbl_home`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_ratesandamenities`
--
ALTER TABLE `tbl_ratesandamenities`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD CONSTRAINT `fk_tbl_logs_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `fk_tbl_payment_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `tbl_reservation` (`id`);

--
-- Constraints for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD CONSTRAINT `fk_tbl_reservation_payment` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payment` (`id`),
  ADD CONSTRAINT `fk_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_reservation_amenities`
--
ALTER TABLE `tbl_reservation_amenities`
  ADD CONSTRAINT `fk_tbl_ra_amenity` FOREIGN KEY (`amenity_id`) REFERENCES `tbl_amenities` (`id`),
  ADD CONSTRAINT `fk_tbl_ra_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `tbl_reservation` (`id`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
