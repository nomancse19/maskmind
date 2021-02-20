-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 10:15 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maskmind`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_user_id` int(11) NOT NULL,
  `admin_user_name` varchar(300) NOT NULL,
  `admin_user_email` varchar(300) NOT NULL,
  `admin_user_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_user_id`, `admin_user_name`, `admin_user_email`, `admin_user_password`) VALUES
(1, 'Noman', 'noman.cse19@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `gift_card`
--

CREATE TABLE `gift_card` (
  `gift_card_id` int(11) NOT NULL,
  `gift_card_token` varchar(400) NOT NULL,
  `gift_card_token_qr_code` varchar(300) NOT NULL,
  `gift_card_mask_number` varchar(200) NOT NULL,
  `gift_card_used_user_id` int(11) DEFAULT NULL,
  `gift_card_is_used` int(11) NOT NULL DEFAULT 0,
  `gift_card_created_date` datetime NOT NULL,
  `gift_card_created_admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_given_mask`
--

CREATE TABLE `user_given_mask` (
  `user_given_mask_id` int(11) NOT NULL,
  `user_given_mask_number` int(11) NOT NULL,
  `user_given_mask_user_id` int(11) NOT NULL,
  `user_given_mask_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(350) DEFAULT NULL,
  `user_email` varchar(350) DEFAULT NULL,
  `user_number` varchar(300) DEFAULT NULL,
  `user_home_address` varchar(350) DEFAULT NULL,
  `user_firebase_token` varchar(350) DEFAULT NULL,
  `user_ref_code` varchar(300) DEFAULT NULL,
  `user_point` varchar(200) DEFAULT '0',
  `user_mask` varchar(200) DEFAULT '0',
  `user_total_mask` varchar(300) DEFAULT '0',
  `user_type` varchar(150) NOT NULL,
  `user_created_date` datetime NOT NULL,
  `user_device_id` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `user_email`, `user_number`, `user_home_address`, `user_firebase_token`, `user_ref_code`, `user_point`, `user_mask`, `user_total_mask`, `user_type`, `user_created_date`, `user_device_id`) VALUES
(1, '', '', '017546565665', '', 'dfgdfgd', '1100', '0', '2', '2', 'new', '2020-08-27 16:50:12', '');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `video_link` varchar(400) NOT NULL,
  `video_thumb` varchar(300) NOT NULL,
  `video_count` int(11) NOT NULL DEFAULT 0,
  `video_created_date` datetime NOT NULL,
  `video_is_publish` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `videos_watch`
--

CREATE TABLE `videos_watch` (
  `video_watch_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_watch_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- Indexes for table `gift_card`
--
ALTER TABLE `gift_card`
  ADD PRIMARY KEY (`gift_card_id`);

--
-- Indexes for table `user_given_mask`
--
ALTER TABLE `user_given_mask`
  ADD PRIMARY KEY (`user_given_mask_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `videos_watch`
--
ALTER TABLE `videos_watch`
  ADD PRIMARY KEY (`video_watch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gift_card`
--
ALTER TABLE `gift_card`
  MODIFY `gift_card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_given_mask`
--
ALTER TABLE `user_given_mask`
  MODIFY `user_given_mask_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos_watch`
--
ALTER TABLE `videos_watch`
  MODIFY `video_watch_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
