-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 05:25 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oscm`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_15_091101_create_wholesalers_table', 1),
(4, '2020_02_15_091152_create_servicecenters_table', 1),
(5, '2020_02_16_170224_create_servicerequests_table', 2),
(6, '2020_02_16_171222_create_servicerequests_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE IF NOT EXISTS `parts` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `pslno` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`pid`, `pname`, `pslno`, `price`) VALUES
(1, 'Clutch cable', 'A10001', '500'),
(2, 'break cable', 'A10002', '550'),
(3, 'helmet vega', 'A10003', '1900'),
(4, 'side mirror maruti swift', 'A7890', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicecenters`
--

CREATE TABLE IF NOT EXISTS `servicecenters` (
  `sid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `centername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `licenseno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `servicecenters_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `servicecenters`
--

INSERT INTO `servicecenters` (`sid`, `centername`, `email`, `email_verified_at`, `password`, `cno`, `address`, `licenseno`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Motor Friend', 'motorfriend@gmail.com', NULL, '$2y$10$vTBDFKEyhHnBQzPupx1QcuV515iXoZPTTo2VI5V59YvCjWBqKKDVC', '9947456321', 'kochi,kadavantra', 'sgsdg456', 'ORXtO3YsAV8gwxirXWV9BgnUrSv8f482qOxpKUdLHgkbCNp81tw6bNV9qiCt', '2020-02-16 06:39:31', '2020-02-16 06:39:31'),
(2, 'Service king', 'sk@gmail.com', NULL, '$2y$10$uYVz8zuLHkwuCMxdOhVyHu4FqleMeaVPXUhsMNsDALAmghzE/eu9.', '8890456123', 'kochi', 'zdzdf789', NULL, '2020-02-16 06:45:27', '2020-02-16 06:45:27'),
(3, 'motorcrew', 'mcrew@gmail.com', NULL, '$2y$10$b8Yeu7RIb4xe1kbTAoXb5uJvl0oQanOix.ITzdaYVfqHmPsjYHMa2', '8075014084', 'sdfssdfsd', 'zvzvzvzxv', NULL, '2020-02-16 06:49:30', '2020-02-16 06:49:30'),
(4, 'tvssc', 'tvssc@gmail.com', NULL, '$2y$10$m1GnfStBGbs7imHoNt3bFuEELvqP.C2oDVc1VlZb65g184kU6NYSW', '8903123489', 'zvxzvx', 'zdfdzfszdf', NULL, '2020-02-16 06:51:46', '2020-02-16 06:51:46'),
(5, 'sking', 'sd@gmail.com', NULL, '$2y$10$yoBelMVtr5Y2b0ZGO.m7vOgPAlPnQn2g5FoF/KbN2HUWgz76LPD.G', '9876456123', 'hjbhjbjhb', 'hvhjb', NULL, '2020-02-16 08:09:31', '2020-02-16 08:09:31'),
(6, 'racevilla', 'racevilla@gmail.com', NULL, '$2y$10$6vI2NPucYRxXtd19YJxsW.JWjj5KD1.2xj3/tNnYVUHc2j9E0cPBu', '9087123567', 'hfghzfhvhdsf', 'adad5353', NULL, '2020-02-19 00:18:52', '2020-02-19 00:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `servicerequests`
--

CREATE TABLE IF NOT EXISTS `servicerequests` (
  `rid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  `serviceid` int(11) NOT NULL,
  `catname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vmodel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vbrand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdate` date NOT NULL,
  `stime` time NOT NULL,
  `request_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `servicerequests`
--

INSERT INTO `servicerequests` (`rid`, `customerid`, `serviceid`, `catname`, `vname`, `vmodel`, `vbrand`, `sdate`, `stime`, `request_status`, `request_type`, `service_charge`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'four wheeler', 'Alto', '2012 LXI 800', 'Maruti suzuki', '2020-02-24', '12:45:00', 'completed', '1', '2500', '2020-02-17 23:31:39', '2020-02-17 23:31:39'),
(2, 1, 1, 'two wheeler', 'Wego', '2014 125cc', 'TVS', '2020-02-24', '15:30:00', 'completed', '1', '1500', '2020-02-18 23:47:38', '2020-02-18 23:47:38'),
(3, 1, 3, 'three wheeler', 'Ape', '2015', 'Bajaj', '2020-02-28', '18:45:00', 'approved', '1', '0', '2020-02-19 01:44:06', '2020-02-19 01:44:06'),
(4, 1, 1, 'four wheeler', 'Tiago', '2016', 'Tata', '2020-02-21', '09:30:00', 'pending', '1', '0', '2020-02-19 06:29:10', '2020-02-19 06:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `service_doneby`
--

CREATE TABLE IF NOT EXISTS `service_doneby` (
  `sdbid` int(11) NOT NULL AUTO_INCREMENT,
  `rqid` int(11) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `remarks` varchar(191) NOT NULL,
  PRIMARY KEY (`sdbid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `service_doneby`
--

INSERT INTO `service_doneby` (`sdbid`, `rqid`, `mname`, `remarks`) VALUES
(1, 1, 'Sanal', 'Break cable changed'),
(2, 2, 'Sanal', 'Water service done');

-- --------------------------------------------------------

--
-- Table structure for table `service_status`
--

CREATE TABLE IF NOT EXISTS `service_status` (
  `statusid` int(11) NOT NULL AUTO_INCREMENT,
  `reqid` int(11) NOT NULL,
  `customid` int(11) NOT NULL,
  `datstatus` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`statusid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `service_status`
--

INSERT INTO `service_status` (`statusid`, `reqid`, `customid`, `datstatus`, `status`) VALUES
(1, 1, 1, '2019-02-20', 'approved'),
(2, 1, 1, '2019-02-20', 'completed'),
(3, 2, 1, '2019-02-20', 'approved'),
(4, 2, 1, '2019-02-20', 'completed'),
(5, 3, 1, '2019-02-20', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'DIPIN KP', 'dipinpnambiar@gmail.com', NULL, '$2y$10$eN2I3Sc7LqP7XCpoiHhm9.IrgKBX/fpcE7dzZdSpwXXB6BSzF8.TG', 'bkjbjhbh', 'uz09UmgLf4DcAM4tTdE0ns7eKMzaqdOZUp8oyIu5ktqchd0Y3l1mcjnlqfAr', '2020-02-16 05:03:59', '2020-02-16 05:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `wholesalers`
--

CREATE TABLE IF NOT EXISTS `wholesalers` (
  `wid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `wholesalername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`wid`),
  UNIQUE KEY `wholesalers_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wholesalers`
--

INSERT INTO `wholesalers` (`wid`, `wholesalername`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'servicefriendadmin', 'servicefriend@gmail.com', NULL, '$2y$10$uK4xRLECAYU193MQsjD3g.G0m98lY9wWegtjQGE16cjNeMG7YW2.i', '2020-02-19 02:28:37', '2020-02-19 02:28:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
