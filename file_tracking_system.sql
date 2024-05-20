-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2019 at 04:43 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_tracking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `password`) VALUES
('admin123', '482c811da5d5b4bc6d497ffa98491e38');

-- --------------------------------------------------------

--
-- Table structure for table `audit_final`
--

CREATE TABLE `audit_final` (
  `audit_id` int(10) NOT NULL,
  `doc_id` varchar(100) DEFAULT NULL,
  `ref_id` varchar(100) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_name` varchar(100) DEFAULT NULL,
  `creator` varchar(50) DEFAULT NULL,
  `s_sender` varchar(50) DEFAULT NULL,
  `s_receiver` varchar(50) DEFAULT NULL,
  `r_sender` varchar(50) DEFAULT NULL,
  `r_receiver` varchar(50) DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `c_value` int(20) DEFAULT NULL,
  `r_value` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_final`
--

INSERT INTO `audit_final` (`audit_id`, `doc_id`, `ref_id`, `subject`, `branch`, `time`, `file_name`, `creator`, `s_sender`, `s_receiver`, `r_sender`, `r_receiver`, `update_by`, `c_value`, `r_value`) VALUES
(69, 'doc/19/06/02/1', 'reference/01/6', 'final test', 'SEBA-002', '2019-06-02 15:50:08', 'Members.docx', 'USER/19/001', NULL, NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit_table`
--

CREATE TABLE `audit_table` (
  `doc_id` varchar(50) NOT NULL,
  `ref_id` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(200) NOT NULL,
  `creator` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_table`
--

INSERT INTO `audit_table` (`doc_id`, `ref_id`, `subject`, `branch`, `time`, `file`, `creator`) VALUES
('doc/19/06/02/1', 'reference/01/6', 'final test', 'SEBA-002', '2019-06-02 15:50:08', 'Members.docx', 'USER/19/001');

-- --------------------------------------------------------

--
-- Table structure for table `branch_table`
--

CREATE TABLE `branch_table` (
  `branch_id` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_table`
--

INSERT INTO `branch_table` (`branch_id`, `branch_name`) VALUES
('SEBA-003', 'IT Branch'),
('SEBA-002', 'Accounts Branch'),
('SEBA-001', 'Academic Branch');

-- --------------------------------------------------------

--
-- Table structure for table `designation_table`
--

CREATE TABLE `designation_table` (
  `design_id` varchar(50) NOT NULL,
  `design_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation_table`
--

INSERT INTO `designation_table` (`design_id`, `design_name`) VALUES
('DESG004', 'MY STYLE'),
('DESG-002', 'Account Officer'),
('DESG-003', 'System Analysis'),
('DESG-001', 'Academic Officer');

-- --------------------------------------------------------

--
-- Table structure for table `receive_file`
--

CREATE TABLE `receive_file` (
  `rid` int(50) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `doc_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `send_file`
--

CREATE TABLE `send_file` (
  `send_id` int(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `doc_id` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `branch_id` varchar(50) NOT NULL,
  `design_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `gender`, `email`, `mobile`, `branch_id`, `design_id`, `password`) VALUES
('USER/19/002', 'Pator Phangcho  ', 'Male', 'bikashkonwar085@gmail.com', '9085880128', 'SEBA-002', 'DESG-002', '8075098414caa9fe44ba3dcadfc40d0f'),
('MCA1665004', 'Bikash', 'Male', '085bikashkonwar@gmail.com', '8876653980', 'SEBA-003', 'DESG004', 'bac76b0feb747e3bde11269cf367c97b'),
('USER/19/001', 'Bikash Konwar', 'Male', '085bikashkonwar@gmail.com', '8876653980', 'SEBA-003', 'DESG-003', '9cf400e57e0089232463c5e17f28fd0a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_final`
--
ALTER TABLE `audit_final`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `audit_table`
--
ALTER TABLE `audit_table`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `branch_table`
--
ALTER TABLE `branch_table`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `designation_table`
--
ALTER TABLE `designation_table`
  ADD PRIMARY KEY (`design_id`);

--
-- Indexes for table `receive_file`
--
ALTER TABLE `receive_file`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `send_file`
--
ALTER TABLE `send_file`
  ADD PRIMARY KEY (`send_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_final`
--
ALTER TABLE `audit_final`
  MODIFY `audit_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `receive_file`
--
ALTER TABLE `receive_file`
  MODIFY `rid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `send_file`
--
ALTER TABLE `send_file`
  MODIFY `send_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
