-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 10:14 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cias1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) NOT NULL,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coareport`
--

CREATE TABLE `coareport` (
  `projectTitle` varchar(128) NOT NULL,
  `proponent` varchar(128) NOT NULL,
  `province` varchar(50) NOT NULL,
  `unliquidatedBalance` int(11) NOT NULL,
  `status` mediumtext NOT NULL,
  `evidence` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `legiacest`
--

CREATE TABLE `legiacest` (
  `no` int(11) NOT NULL,
  `projectCode` varchar(128) NOT NULL,
  `projectTitle` text NOT NULL,
  `location` text NOT NULL,
  `responsiblePerson` text NOT NULL,
  `retentionPeriod` text NOT NULL,
  `methodDisposal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lgia_actual_details`
--

CREATE TABLE `lgia_actual_details` (
  `projectTitle` varchar(128) NOT NULL,
  `internal` varchar(16) NOT NULL,
  `external` varchar(16) NOT NULL,
  `projectCode` varchar(128) NOT NULL,
  `tsdControl` varchar(128) NOT NULL,
  `routingSlipControl` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `detailedChronoCompliance` varchar(128) NOT NULL,
  `tpc` int(11) NOT NULL,
  `dostXContribution` int(11) NOT NULL,
  `equity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `list_received_report`
--

CREATE TABLE `list_received_report` (
  `no` int(11) NOT NULL,
  `projectTitle` varchar(128) NOT NULL,
  `detChronoQuarProgRep` text NOT NULL,
  `detChronoEvents` text NOT NULL,
  `remark` text NOT NULL,
  `timelinessRPMO` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects_monitoring`
--

CREATE TABLE `projects_monitoring` (
  `projectId` int(11) NOT NULL,
  `projTitle` varchar(128) NOT NULL,
  `projCode` varchar(50) NOT NULL,
  `projLocation` varchar(128) NOT NULL,
  `province` varchar(128) DEFAULT NULL,
  `beneficiaries` varchar(50) NOT NULL,
  `yearCharged` year(4) NOT NULL,
  `dateReleased` date NOT NULL,
  `dateDurFrom` date DEFAULT NULL,
  `dateDurTo` date DEFAULT NULL,
  `collaborator` varchar(128) NOT NULL,
  `budgetdatereleased` date NOT NULL,
  `amountReleased` int(11) DEFAULT NULL,
  `amountLiquidated` int(11) DEFAULT NULL,
  `unliquitedBalance` int(11) DEFAULT NULL,
  `amountDueLiquidation` int(11) DEFAULT NULL,
  `financialReport` text,
  `fundStatus` int(11) DEFAULT NULL,
  `completionReport` varchar(128) DEFAULT NULL,
  `terminalReport` mediumtext,
  `projectStatus` int(11) DEFAULT NULL,
  `quarStatProgRep` longtext,
  `amountDueRefund` text,
  `refund` text,
  `reques` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_monitoring`
--

INSERT INTO `projects_monitoring` (`projectId`, `projTitle`, `projCode`, `projLocation`, `province`, `beneficiaries`, `yearCharged`, `dateReleased`, `dateDurFrom`, `dateDurTo`, `collaborator`, `budgetdatereleased`, `amountReleased`, `amountLiquidated`, `unliquitedBalance`, `amountDueLiquidation`, `financialReport`, `fundStatus`, `completionReport`, `terminalReport`, `projectStatus`, `quarStatProgRep`, `amountDueRefund`, `refund`, `reques`) VALUES
(1, 'joshua project', 'FYHNPVTA', 'dwad', 'dawda', 'fafa', 1999, '0000-00-00', '2019-12-07', '2019-12-09', 'dawd', '0000-00-00', 0, 0, 0, NULL, '', 1, '', '', 1, '', '', '', ''),
(2, 'joshua project nnnnn nnnnnnnnnnnnnnnnn nnnnnnnnnnn nnnnnnnnnnnnnnnnnn nnnnnnnnnnnnnn nnnnnnnnnnn', 'FYHNPVTA', 'dwad', 'dawda', 'fafa', 1999, '0000-00-00', '2019-03-09', '2019-03-09', 'dawd', '0000-00-00', 0, 0, 0, NULL, '', 2, '', '', 2, '', '', '', ''),
(3, 'joshua project', 'dadw', 'dwad', 'dawdaw', 'dawd', 1999, '0000-00-00', '2019-03-09', '2020-03-09', 'dad', '0000-00-00', 0, 0, 0, NULL, '', 3, '', '', 1, '', '', '', ''),
(4, 'joshua project', 'FYHNPVTA', 'dwad', 'dawda', 'dawd', 1999, '2019-12-06', '2019-12-20', '2020-03-09', 'dawd', '0000-00-00', 0, 0, 0, NULL, '', 4, '', '', 2, '', '', '', ''),
(5, 'whaay', 'code', 'dwad', 'bukidnon', 'wala', 2009, '0000-00-00', '2019-12-20', '2019-12-30', 'dawd', '0000-00-00', 0, 0, 0, NULL, '', 1, '', '', 1, '', '', '', ''),
(6, 'title ni', 'code ni', 'project loc', 'cdo', 'yiu', 2001, '0000-00-00', '2019-12-05', '2019-12-30', 'dawd', '0000-00-00', 0, 0, 0, NULL, '', 2, '', '', 2, '', '', '', ''),
(7, 'joshua project', 'FYHNPVTA', 'dwad', 'dawda', 'fafa', 2001, '0000-00-00', '2019-12-26', '2019-12-28', 'dawd', '0000-00-00', 0, 0, 0, NULL, '', 3, '', '', 1, '', '', '', ''),
(8, 'title ikaw duha', 'FYHNPVTA', 'dwad', 'dawda', 'fafa', 1997, '0000-00-00', '2019-12-04', '2019-12-17', 'dawd', '0000-00-00', 0, 0, 0, NULL, '', 4, '', '', 2, '', '', '', ''),
(9, 'joshua project', 'code2', 'dwad1', 'dawda', 'fafa', 1999, '2019-12-01', '2019-12-01', '2019-12-10', 'dawd', '0000-00-00', 0, 0, 0, NULL, '', 1, '', '', 1, '', '', '', ''),
(10, 'joshua project', 'FYHNPVTA', 'dwad', 'dawda', 'fafa', 1999, '0000-00-00', '2019-12-02', '2019-12-03', 'dawd', '0000-00-00', 0, 0, 0, NULL, '', 2, '', '', 2, '', '', '', ''),
(11, 'joshua project', 'FYHNPVTA', 'dwad', 'dawda', 'fafa', 1999, '0000-00-00', '2019-03-09', '2019-12-10', 'dawd', '0000-00-00', 0, 0, 0, NULL, '', 3, '', '', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fund_status`
--

CREATE TABLE `tbl_fund_status` (
  `fundStatusId` int(11) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fund_status`
--

INSERT INTO `tbl_fund_status` (`fundStatusId`, `status`) VALUES
(1, 'Fully Liquidated'),
(2, 'Partially Liquidated'),
(3, 'Unliquidated'),
(4, 'Not yet due'),
(5, 'None'),
(6, 'Nothing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(2, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(3, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(4, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(5, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '0000-00-00 00:00:00'),
(6, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '2019-12-03 07:52:38'),
(7, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '2019-12-03 07:52:53'),
(8, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '2019-12-04 01:24:54'),
(9, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '2019-12-05 00:41:15'),
(10, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '2019-12-05 00:42:46'),
(11, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '2019-12-05 00:50:01'),
(12, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '2019-12-05 08:56:08'),
(13, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '2019-12-06 01:51:59'),
(14, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Administrator\"}', '::1', 'Chrome 78.0.3904.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'Windows 10', '2019-12-09 01:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_status`
--

CREATE TABLE `tbl_project_status` (
  `projectStatusId` int(11) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_status`
--

INSERT INTO `tbl_project_status` (`projectStatusId`, `status`) VALUES
(1, 'Terminited'),
(2, 'Not Terminited'),
(3, 'Nothing'),
(4, 'To Be Add'),
(5, 'To Be Add Again');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(50) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin', 'admin', 'Administrator', NULL, 1, 0, 0, '2019-12-03 06:34:04', NULL, NULL),
(3, 'naruto', 'naruto', 'Naruto Usumaki', '0916994750', 2, 1, 1, '2019-12-05 07:21:18', 1, '2019-12-05 08:21:18'),
(4, 'jmdagala', '12', 'Manager', '091699', 2, 0, 1, '2019-12-04 23:30:50', NULL, NULL),
(5, 'jmdagala', '12', 'Manager', '091699', 2, 0, 1, '2019-12-04 23:31:01', NULL, NULL),
(6, 'jmdagala', '12', 'Manager', '091699', 2, 0, 1, '2019-12-04 23:31:15', NULL, NULL),
(7, 'jmdagala', '12', 'Manager', '091699', 2, 0, 1, '2019-12-04 23:31:26', NULL, NULL),
(8, 'jmdagala', '12', 'Manager', '091699', 2, 0, 1, '2019-12-04 23:31:45', NULL, NULL),
(9, '21', '12', '12', '091699', 2, 0, 1, '2019-12-04 23:31:53', NULL, NULL),
(10, '12', '12', '12', '091699', 2, 0, 1, '2019-12-04 23:32:00', NULL, NULL),
(11, '21', '12', '12', '091699', 2, 1, 1, '2019-12-05 07:20:54', 1, '2019-12-05 08:20:54'),
(12, '12', '12', '12', '12', 2, 1, 1, '2019-12-05 07:20:51', 1, '2019-12-05 08:20:51'),
(13, '12', '12', '12', '12', 2, 1, 1, '2019-12-05 07:20:46', 1, '2019-12-05 08:20:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity` (`last_activity`);

--
-- Indexes for table `projects_monitoring`
--
ALTER TABLE `projects_monitoring`
  ADD PRIMARY KEY (`projectId`),
  ADD KEY `fundStatus` (`fundStatus`),
  ADD KEY `projectStatus` (`projectStatus`);

--
-- Indexes for table `tbl_fund_status`
--
ALTER TABLE `tbl_fund_status`
  ADD PRIMARY KEY (`fundStatusId`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project_status`
--
ALTER TABLE `tbl_project_status`
  ADD PRIMARY KEY (`projectStatusId`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects_monitoring`
--
ALTER TABLE `projects_monitoring`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_fund_status`
--
ALTER TABLE `tbl_fund_status`
  MODIFY `fundStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_project_status`
--
ALTER TABLE `tbl_project_status`
  MODIFY `projectStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
