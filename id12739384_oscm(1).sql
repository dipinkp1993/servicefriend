-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2020 at 06:10 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12739384_oscm`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `parts` (
  `pid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pslno` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`pid`, `pname`, `pslno`, `price`) VALUES
(1, 'Clutch cable', 'A10001', '500'),
(2, 'break cable', 'A10002', '550'),
(3, 'helmet vega', 'A10003', '1900'),
(4, 'side mirror maruti swift', 'A7890', '3000'),
(5, 'cylinder 45pzcv', 'CY4567', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `partsrequest`
--

CREATE TABLE `partsrequest` (
  `cprid` int(11) NOT NULL,
  `serviceid` int(11) NOT NULL,
  `vpid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `noofparts` int(11) NOT NULL,
  `request_status` varchar(50) NOT NULL,
  `tot_price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partsrequest`
--

INSERT INTO `partsrequest` (`cprid`, `serviceid`, `vpid`, `customerid`, `noofparts`, `request_status`, `tot_price`) VALUES
(1, 1, 1, 1, 3, 'paid', 'Request should be accepted'),
(2, 1, 2, 1, 8, 'paid', 'Request should be accepted');

-- --------------------------------------------------------

--
-- Table structure for table `partsrequesttows`
--

CREATE TABLE `partsrequesttows` (
  `prwid` int(11) NOT NULL,
  `serviid` int(11) NOT NULL,
  `parid` int(11) NOT NULL,
  `numparts` int(11) NOT NULL,
  `reqstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partsrequesttows`
--

INSERT INTO `partsrequesttows` (`prwid`, `serviid`, `parid`, `numparts`, `reqstatus`) VALUES
(1, 1, 2, 5, 'paid'),
(2, 1, 1, 4, 'paid'),
(3, 1, 1, 4, 'paid'),
(4, 1, 1, 6, 'paid'),
(5, 1, 1, 5, 'paid'),
(6, 1, 1, 5, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `parts_stock`
--

CREATE TABLE `parts_stock` (
  `stockid` int(11) NOT NULL,
  `partid` int(11) NOT NULL,
  `stock_quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts_stock`
--

INSERT INTO `parts_stock` (`stockid`, `partid`, `stock_quantity`) VALUES
(1, 2, '200'),
(2, 3, '568'),
(3, 5, '450'),
(4, 4, '300'),
(5, 1, '61');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicecenters`
--

CREATE TABLE `servicecenters` (
  `sid` bigint(20) UNSIGNED NOT NULL,
  `centername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `licenseno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicecenters`
--

INSERT INTO `servicecenters` (`sid`, `centername`, `email`, `email_verified_at`, `password`, `cno`, `address`, `licenseno`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Motor Friend', 'motorfriend@gmail.com', NULL, '$2y$10$6SOmsaQUBFmkdPlhKm9NqOzM6XtEB1StzkocyT8PFdu/doV61l.IK', '9947456321', 'kochi,kadavantra', 'sgsdg456', 'ORXtO3YsAV8gwxirXWV9BgnUrSv8f482qOxpKUdLHgkbCNp81tw6bNV9qiCt', '2020-02-16 06:39:31', '2020-02-26 04:50:33'),
(2, 'Service king', 'sk@gmail.com', NULL, '$2y$10$uYVz8zuLHkwuCMxdOhVyHu4FqleMeaVPXUhsMNsDALAmghzE/eu9.', '8890456123', 'kochi', 'zdzdf789', NULL, '2020-02-16 06:45:27', '2020-02-16 06:45:27'),
(3, 'motorcrew', 'mcrew@gmail.com', NULL, '$2y$10$b8Yeu7RIb4xe1kbTAoXb5uJvl0oQanOix.ITzdaYVfqHmPsjYHMa2', '8075014084', 'sdfssdfsd', 'zvzvzvzxv', NULL, '2020-02-16 06:49:30', '2020-02-16 06:49:30'),
(4, 'tvssc', 'tvssc@gmail.com', NULL, '$2y$10$m1GnfStBGbs7imHoNt3bFuEELvqP.C2oDVc1VlZb65g184kU6NYSW', '8903123489', 'zvxzvx', 'zdfdzfszdf', NULL, '2020-02-16 06:51:46', '2020-02-16 06:51:46'),
(5, 'sking', 'sd@gmail.com', NULL, '$2y$10$yoBelMVtr5Y2b0ZGO.m7vOgPAlPnQn2g5FoF/KbN2HUWgz76LPD.G', '9876456123', 'hjbhjbjhb', 'hvhjb', NULL, '2020-02-16 08:09:31', '2020-02-16 08:09:31'),
(6, 'racevilla', 'racevilla@gmail.com', NULL, '$2y$10$6vI2NPucYRxXtd19YJxsW.JWjj5KD1.2xj3/tNnYVUHc2j9E0cPBu', '9087123567', 'hfghzfhvhdsf', 'adad5353', NULL, '2020-02-19 00:18:52', '2020-02-19 00:18:52'),
(7, 'vechicle world', 'vewo@gmail.com', NULL, '$2y$10$FAv4ySQpxOu4YmKFc5ri3e5JFoUzKs5aULZzyNy4LCPTOYes1NQkC', '9087123678', 'kannur', 'vgh789', NULL, '2020-02-23 06:57:54', '2020-02-23 06:57:54'),
(8, 'motorcrewkl86', 'motorcrewkl86@gmail.com', NULL, '$2y$10$vjtFEHjm3vhqWYaw1MZwjeDRcGFt8hOUk8vAMHmF/QyFA5Bcw0Lke', '8075014084', 'jsdfjbfs', 'dgdfgd456', NULL, '2020-02-26 23:19:51', '2020-02-26 23:19:51'),
(9, 'servestar', 'servestar@gmail.com', NULL, '$2y$10$KKqbzU9pX39hVuxcszCNn.DKIbVTakiFb1oZPAOO3OtDVp1cTpPGO', '9845123456', 'zfzfvzxcvzxc', '1234', NULL, '2020-06-09 11:42:15', '2020-06-09 11:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `servicerequests`
--

CREATE TABLE `servicerequests` (
  `rid` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicerequests`
--

INSERT INTO `servicerequests` (`rid`, `customerid`, `serviceid`, `catname`, `vname`, `vmodel`, `vbrand`, `sdate`, `stime`, `request_status`, `request_type`, `service_charge`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'two wheeler', 'Hornett', '2016', 'Honda', '2020-03-10', '12:25:00', 'paid', '1', '2500', '2020-03-06 05:54:39', '2020-03-06 05:54:39'),
(2, 1, 1, 'four wheeler', 'Tiago', '2016', 'Tata', '2020-03-17', '12:26:00', 'paid', '1', '120', '2020-03-06 05:55:22', '2020-03-06 05:55:22'),
(3, 1, 1, 'two wheeler', 'Apache', '165cc', 'TVS', '2020-03-16', '12:47:00', 'pending', '1', '0', '2020-03-06 06:16:08', '2020-03-06 06:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `service_doneby`
--

CREATE TABLE `service_doneby` (
  `sdbid` int(11) NOT NULL,
  `rqid` int(11) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `remarks` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_doneby`
--

INSERT INTO `service_doneby` (`sdbid`, `rqid`, `mname`, `remarks`) VALUES
(1, 1, 'Satheesh M', 'Break cable changed'),
(2, 2, 'Arun P P', 'washed');

-- --------------------------------------------------------

--
-- Table structure for table `service_status`
--

CREATE TABLE `service_status` (
  `statusid` int(11) NOT NULL,
  `reqid` int(11) NOT NULL,
  `customid` int(11) NOT NULL,
  `datstatus` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_status`
--

INSERT INTO `service_status` (`statusid`, `reqid`, `customid`, `datstatus`, `status`) VALUES
(1, 1, 1, '2006-03-20', 'approved'),
(2, 1, 1, '2006-03-20', 'completed'),
(3, 2, 1, '2006-03-20', 'approved'),
(4, 2, 1, '2006-03-20', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_parts`
--

CREATE TABLE `transaction_parts` (
  `trpaid` int(11) NOT NULL,
  `secenid` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `dot` date NOT NULL,
  `prid` int(11) NOT NULL,
  `transactionnumber` varchar(50) NOT NULL,
  `cuuid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_parts`
--

INSERT INTO `transaction_parts` (`trpaid`, `secenid`, `amount`, `dot`, `prid`, `transactionnumber`, `cuuid`) VALUES
(1, 1, '1500', '2020-03-06', 1, 'P6zUWzW4', 1),
(2, 1, '4400', '2020-03-06', 2, 'HHZbVWCY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'DIPIN KP', 'dipinpnambiar@gmail.com', NULL, '$2y$10$xaZie/b2VULTBME1hFss6Ooz0DgoJRm3tJWzxZP0cAD29lOfU1wJ6', 'bkjbjhbh', 'ph6HKUKVeNWjX5Yur3KJJ0S6N6n9pHa5Kvk5rIsFRkAO84PoNthIVpas3xMs', '2020-02-16 05:03:59', '2020-02-26 04:13:01'),
(2, 'varun p  p', 'var123@gmail.com', NULL, '$2y$10$Q907ufLbSMqeLcIbSAgrVu3hIYjNDu5rn8GSKgwuWkZzb9d8CHMvi', 'kannur', NULL, '2020-02-23 06:58:43', '2020-02-23 06:58:43'),
(3, 'Jithin N T', 'jithinnt@gmail.com', NULL, '$2y$10$T7TEmNG.yTIxkvn3lYtkvejUOdP37fNbfb/o9CljYGF3Dqqj04Zoa', 'Nettikattu house keoth', NULL, '2020-02-26 23:10:41', '2020-02-26 23:10:41'),
(4, 'test', 'tt@tt.com', NULL, '$2y$10$HZ2rHe5hLTDRegGN08oi2esU99DnM013mcY87qGRkXhipG.krwSUe', 'test', NULL, '2020-03-07 04:47:41', '2020-03-07 04:47:41'),
(5, 'op', 'op@op.com', NULL, '$2y$10$HczO4zFsUkCumsE.U9fzzuXE1aU6rk.kcDEm1L1rph.dbOyMiCYi6', 'op', NULL, '2020-03-07 05:17:08', '2020-03-07 05:17:08'),
(6, 'Hemanth', 'hemanth123@gmail.com', NULL, '$2y$10$KsXQpKbcxOeGKS4vGfGpE.jN3BHMoYRbEXhD5zLV8hBEcziMbIHAu', 'Deepam villa .Payyannur', NULL, '2020-03-07 09:11:14', '2020-03-07 09:11:14'),
(7, 'Jithin N T', '525jithin@gmail.com', NULL, '$2y$10$HcoRJ4ht4vlJXC2oXKPG2eNJoReQawFhJ0DVoIwIW5zwOMubNFYe2', 'Nettikkattu house,keloth Payyanur', NULL, '2020-03-07 12:51:34', '2020-03-07 12:51:34'),
(8, 'Vinay K', 'vinay123@gmail.com', NULL, '$2y$10$7JicORszKhohPOKoT7Af2uBEYYo4xmSoLrj3gosaiPdwNO9wp.n9W', 'Deepam Villa,Kannur,Payyannur', 'xVLUa4bDeEd37740yDJfpbo89IKhATCyUdwVjsBhldanPYDYJtBgoUsOVesZ', '2020-03-19 14:39:10', '2020-03-19 14:39:10'),
(9, 'siju', 'siju@gmail.com', NULL, '$2y$10$zuNczAqBrQpI6T/7Y/8cMueu2QkEAMYxAVh0FGaBBrLKZz9r9DYp6', 'Gui', NULL, '2020-04-20 18:10:32', '2020-04-20 18:10:32'),
(10, 'siju', 'siju123@gmail.com', NULL, '$2y$10$1e9au36GxqWZRp6UDY9RYunMmUYZXEJdzson6t2Gc2T2yfBVhn4Pi', 'sample adderss', NULL, '2020-06-09 11:39:00', '2020-06-09 11:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `wholesalers`
--

CREATE TABLE `wholesalers` (
  `wid` bigint(20) UNSIGNED NOT NULL,
  `wholesalername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wholesalers`
--

INSERT INTO `wholesalers` (`wid`, `wholesalername`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ServiceAdmin', 'serviceadmin@gmail.com', NULL, '$2y$10$LzUIKLOEwde0w/Lxb4KmfOxSDbcCzgFEansMg4YEK.k1Lf70YQHGm', '2020-02-23 05:40:28', '2020-03-09 11:14:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `partsrequest`
--
ALTER TABLE `partsrequest`
  ADD PRIMARY KEY (`cprid`);

--
-- Indexes for table `partsrequesttows`
--
ALTER TABLE `partsrequesttows`
  ADD PRIMARY KEY (`prwid`);

--
-- Indexes for table `parts_stock`
--
ALTER TABLE `parts_stock`
  ADD PRIMARY KEY (`stockid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `servicecenters`
--
ALTER TABLE `servicecenters`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `servicecenters_email_unique` (`email`);

--
-- Indexes for table `servicerequests`
--
ALTER TABLE `servicerequests`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `service_doneby`
--
ALTER TABLE `service_doneby`
  ADD PRIMARY KEY (`sdbid`);

--
-- Indexes for table `service_status`
--
ALTER TABLE `service_status`
  ADD PRIMARY KEY (`statusid`);

--
-- Indexes for table `transaction_parts`
--
ALTER TABLE `transaction_parts`
  ADD PRIMARY KEY (`trpaid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wholesalers`
--
ALTER TABLE `wholesalers`
  ADD PRIMARY KEY (`wid`),
  ADD UNIQUE KEY `wholesalers_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partsrequest`
--
ALTER TABLE `partsrequest`
  MODIFY `cprid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partsrequesttows`
--
ALTER TABLE `partsrequesttows`
  MODIFY `prwid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parts_stock`
--
ALTER TABLE `parts_stock`
  MODIFY `stockid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `servicecenters`
--
ALTER TABLE `servicecenters`
  MODIFY `sid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `servicerequests`
--
ALTER TABLE `servicerequests`
  MODIFY `rid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_doneby`
--
ALTER TABLE `service_doneby`
  MODIFY `sdbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_status`
--
ALTER TABLE `service_status`
  MODIFY `statusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction_parts`
--
ALTER TABLE `transaction_parts`
  MODIFY `trpaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wholesalers`
--
ALTER TABLE `wholesalers`
  MODIFY `wid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
