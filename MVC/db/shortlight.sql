-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 11:25 PM
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
-- Database: `shortlight`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_pass_hash` varchar(255) NOT NULL,
  `admin_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_pass_hash`, `admin_mail`) VALUES
(0, 'WEBMASTER', '$2y$10$ZPcxXymHJCrLMXAY0Zs.OuQgYi5ccuzdgMMepL.tPfuVlgWzRhhNO', 'joel@fuckyou.com'),
(1, 'armen', 'hashedpass', 'yogmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `form_response`
--

CREATE TABLE `form_response` (
  `form_id` int(11) NOT NULL,
  `service` varchar(20) NOT NULL,
  `client_name` varchar(20) NOT NULL,
  `client_surname` varchar(20) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_phone` varchar(15) DEFAULT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_response`
--

INSERT INTO `form_response` (`form_id`, `service`, `client_name`, `client_surname`, `client_email`, `client_phone`, `message`) VALUES
(1, 'wedding', 'Armen ', 'Jabamikos', 'armenjamgotchian@gmail.com', '5146639579', 'hi guys first time trying');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `post_title` varchar(40) NOT NULL,
  `post_media_source` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `description`, `post_title`, `post_media_source`, `admin_id`) VALUES
(1, 'description of the asdlfas', 'title of the post', 'https://www.youtube.com/embed/2ANtdCySCRY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `telemetry_action`
--

CREATE TABLE `telemetry_action` (
  `action_id` int(11) NOT NULL,
  `action_type` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `telemetry_action`
--

INSERT INTO `telemetry_action` (`action_id`, `action_type`, `timestamp`, `ip_address`, `admin_id`) VALUES
(1, 'TELEMETRY_READ', 1651969594, '127.0.0.1', NULL),
(2, 'TELEMETRY_READ', 1652044291, '127.0.0.1', NULL),
(3, 'ADMIN_CREATE', 1652044523, '127.0.0.1', NULL),
(4, 'ADMIN_LOGIN_FAIL', 1652044561, '127.0.0.1', NULL),
(5, 'ADMIN_LOGIN_FAIL', 1652044583, '127.0.0.1', NULL),
(6, 'ADMIN_CREATE', 1652044612, '127.0.0.1', NULL),
(7, 'ADMIN_LOGIN', 1652044625, '127.0.0.1', NULL),
(8, 'ADMIN_LOGIN', 1652044723, '127.0.0.1', NULL),
(9, 'ADMIN_LOGIN', 1652044750, '127.0.0.1', NULL),
(10, 'ADMIN_LOGIN', 1652044878, '127.0.0.1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `form_response`
--
ALTER TABLE `form_response`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `admin_ids` (`admin_id`);

--
-- Indexes for table `telemetry_action`
--
ALTER TABLE `telemetry_action`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_response`
--
ALTER TABLE `form_response`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `telemetry_action`
--
ALTER TABLE `telemetry_action`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `admin_ids` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`);

--
-- Constraints for table `telemetry_action`
--
ALTER TABLE `telemetry_action`
  ADD CONSTRAINT `admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;