-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 04:32 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshrahly_elearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_page`
--

CREATE TABLE `all_page` (
  `id` int(11) NOT NULL,
  `pageName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `policy_type` enum('Teacher','Student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_page`
--

INSERT INTO `all_page` (`id`, `pageName`, `description`, `date`, `status`, `policy_type`) VALUES
(1, 'Privacy Policy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod', '2020-02-01', 0, 'Teacher'),
(2, 'Usage Policy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '2020-02-01', 0, 'Teacher'),
(3, 'Privacy Policy', 'Student Privacy Policy  Lorem ipsum dolor sit amet, consectetur adipiscing eli.                          ', '2020-02-04', 0, 'Student'),
(4, 'Usage Policy', ' وقد وهبوا', '2020-02-04', 0, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `card_holder_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_number` int(22) NOT NULL,
  `expiry_date` int(11) NOT NULL,
  `created_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `n_id` int(11) NOT NULL,
  `city_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `n_id`, `city_name`, `created_at`) VALUES
(1, 1, 'Indore', '2020-01-23 11:29:11'),
(2, 1, 'Bhopal', '2020-01-23 11:29:19'),
(3, 3, 'Tokyo ', '2020-01-23 11:29:39'),
(4, 3, 'Osaka ', '2020-01-23 11:29:49'),
(5, 4, 'Amman', '2020-01-23 11:30:16'),
(6, 4, 'Zarqa', '2020-01-23 11:30:27'),
(7, 6, 'Punakha ', '2020-01-23 11:30:45'),
(8, 6, 'Chirang', '2020-01-23 11:31:07'),
(9, 10, 'Jakarta', '2020-01-23 11:32:04'),
(10, 10, 'Medan', '2020-01-23 11:32:11'),
(11, 11, 'Punjab', '2020-01-23 11:32:30'),
(12, 12, 'riyadh', '2020-01-30 14:17:48'),
(13, 12, 'jedddah', '2020-01-30 14:18:14'),
(14, 1, 'shehor', '2020-02-04 15:08:34'),
(1002, 1, 'محسن', '2020-02-17 08:53:45'),
(1003, 1, 'madana', '2020-03-23 13:24:31'),
(1004, 1, 'Ujjain', '2020-03-24 06:38:24'),
(1005, 1, 'sarangpur', '2020-03-24 07:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `name`, `email`, `message`, `type`, `created_at`) VALUES
(1, 0, 'hfhf', 'kkardaji@gmail.com', 'Vjcjjf', 'Student', '2020-02-27 05:36:04'),
(2, 0, 'test24', 'test24@gmail.com', 'This the test', 'Student', '2020-02-27 10:27:28'),
(3, 0, 'test24', 'test24@gmail.com', 'Test24 ', 'Student', '2020-02-27 10:28:19'),
(4, 0, 'ayush porwal', 'ayushporwal0@gmail.com', 'Fjjffj', 'Student', '2020-02-28 13:26:41'),
(5, 0, 'rohit', 'emaster.freelancer@gmail.com', 'Ghjjjb', 'Student', '2020-03-04 12:46:40'),
(6, NULL, 'kg', 'gi', 'Jcjc', 'teacher', '2020-03-20 10:33:04'),
(7, NULL, 'kg', 'gi', 'Jcjc', 'teacher', '2020-03-20 10:33:43'),
(8, NULL, 'kg', 'gi', 'Jcjcjv', 'teacher', '2020-03-20 10:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `discount` int(11) NOT NULL,
  `discount_type` enum('Flat','Percent') NOT NULL,
  `coupon_applied_for` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `coupon_name`, `description`, `discount`, `discount_type`, `coupon_applied_for`, `start_date`, `end_date`, `created_at`) VALUES
(1, 'GIFTCODE', 'Demo coupon ', 'demo', 50, 'Percent', '', '2020-03-01', '2020-04-14', '2020-03-12 06:31:44'),
(2, 'STUDENTPAYNEW', 'Demo ', 'saSD', 15, 'Percent', '', '2020-03-01', '2020-03-26', '2020-03-12 06:39:54'),
(3, 'STUDENTPAYCARD', 'Demo ', 'fdsf', 15, 'Percent', '', '2020-03-01', '2020-03-30', '2020-03-12 06:30:43'),
(4, 'STUDENTPAY', 'student', 'demo', 20, 'Percent', '', '2020-03-12', '2020-03-15', '2020-03-12 06:36:57'),
(5, 'foz8520', 'ala', 'no', 20, 'Percent', '', '2020-03-13', '2020-03-14', '2020-03-13 14:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `f_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `review` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `learning_level`
--

CREATE TABLE `learning_level` (
  `l_id` int(11) NOT NULL,
  `level_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learning_level`
--

INSERT INTO `learning_level` (`l_id`, `level_name`, `created_at`) VALUES
(1, 'Primary', '2019-12-27 11:50:11'),
(2, 'Preparatory', '2019-12-27 11:50:35'),
(3, 'Secondary', '2019-12-27 11:50:51'),
(4, 'Collectors', '2019-12-27 11:51:04'),
(8, 'Extra level', '2020-01-21 13:48:22'),
(9, 'low', '2020-02-13 08:27:44'),
(11, 'الابتدائية', '2020-02-19 15:38:13'),
(12, 'المتوسطة', '2020-03-04 09:11:51'),
(13, 'الثانوية', '2020-03-04 09:12:07'),
(14, 'جامعي', '2020-03-04 09:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `learning_material`
--

CREATE TABLE `learning_material` (
  `material_id` int(11) NOT NULL,
  `material_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learning_material`
--

INSERT INTO `learning_material` (`material_id`, `material_name`, `created_at`) VALUES
(1, 'History', '2020-01-21 12:49:06'),
(2, 'Physics', '2019-12-27 11:53:29'),
(3, 'Maths', '2019-12-27 11:53:36'),
(4, 'Chemistry', '2019-12-27 11:53:43'),
(5, 'MEAN', '2020-01-21 13:49:31'),
(8, 'Core Java', '2020-02-13 08:30:39'),
(9, 'رياضيات', '2020-02-19 15:37:34'),
(10, 'علوم', '2020-02-19 15:37:47'),
(11, 'فيزياء', '2020-03-04 09:18:07'),
(12, 'كيمياء', '2020-03-04 09:19:18'),
(13, 'علوم', '2020-03-04 09:19:43'),
(14, 'biology', '2020-03-24 08:26:24'),
(15, 'biology', '2020-03-24 08:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `fullname`, `email`, `password`, `mobile`, `image`, `role`, `date_time`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '8956235623', 'user.png', 1, '2020-01-23 10:17:01'),
(2, 'User', 'user@gmail.com', 'user', '0123456789', 'avatar2.png', 2, '2020-01-30 13:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `n_id` int(11) NOT NULL,
  `n_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`n_id`, `n_name`) VALUES
(1, 'Indian'),
(3, 'Japanese'),
(4, 'Jordanian'),
(6, 'Bhutan'),
(10, 'indonesia'),
(11, 'pakistan'),
(12, 'saudi'),
(13, 'Egyption'),
(15, 'China'),
(17, 'يتكلّم '),
(18, 'سيجمع ');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `request_id`, `teacher_id`, `type`, `message`, `status`, `date`, `created_at`) VALUES
(3, 17, 1, 'Request', 'You Have Received New Request', 2, '23-03-2020 12:24:54', '2020-03-23 00:55:25'),
(4, 17, 2, 'Request', 'You Have Received New Request', 2, '23-03-2020 12:24:54', '2020-03-23 00:55:25'),
(9, 24, 2, 'Request', 'You Have Received New Request', 2, '23-03-2020 19:38:52', '2020-03-23 08:11:08'),
(12, 31, 18, 'Request', 'You Have Received New Request', 2, '24-03-2020 14:04:56', '2020-03-24 02:35:23'),
(13, 32, 18, 'Request', 'You Have Received New Request', 2, '24-03-2020 14:07:48', '2020-03-24 02:38:04'),
(14, 33, 18, 'Request', 'You Have Received New Request', 2, '24-03-2020 14:10:19', '2020-03-24 02:40:35'),
(15, 34, 18, 'Request', 'You Have Received New Request', 2, '24-03-2020 14:12:13', '2020-03-24 02:42:44'),
(16, 34, 20, 'Request', 'You Have Received New Request', 2, '24-03-2020 14:12:13', '2020-03-24 02:42:44'),
(17, 35, 18, 'Request', 'You Have Received New Request', 2, '24-03-2020 14:14:24', '2020-03-24 02:44:44'),
(18, 35, 20, 'Request', 'You Have Received New Request', 2, '24-03-2020 14:14:24', '2020-03-24 02:44:44'),
(20, 36, 2, 'Request', 'You Have Received New Request', 2, '24-03-2020 14:26:53', '2020-03-24 02:57:40'),
(21, 36, 15, 'Request', 'You Have Received New Request', 2, '24-03-2020 14:26:53', '2020-03-24 02:57:40'),
(22, 36, 23, 'Request', 'You Have Received New Request', 2, '24-03-2020 14:26:53', '2020-03-24 02:57:40'),
(23, 37, 2, 'Request', 'You Have Received New Request', 2, '24-03-2020 14:33:55', '2020-03-24 03:04:22'),
(24, 37, 23, 'Request', 'You Have Received New Request', 2, '24-03-2020 14:33:55', '2020-03-24 03:04:22'),
(27, 38, 2, 'Request', 'You Have Received New Request', 2, '24-03-2020 17:11:50', '2020-03-24 05:42:53'),
(28, 38, 23, 'Request', 'You Have Received New Request', 2, '24-03-2020 17:11:50', '2020-03-24 05:42:53'),
(30, 39, 18, 'Request', 'You Have Received New Request', 2, '24-03-2020 18:00:59', '2020-03-24 06:31:13'),
(31, 39, 20, 'Request', 'You Have Received New Request', 2, '24-03-2020 18:00:59', '2020-03-24 06:31:13'),
(33, 40, 18, 'Request', 'You Have Received New Request', 2, '25-03-2020 09:47:07', '2020-03-24 22:17:54'),
(34, 40, 20, 'Request', 'You Have Received New Request', 2, '25-03-2020 09:47:07', '2020-03-24 22:17:54'),
(37, 42, 20, 'Request', 'You Have Received New Request', 2, '25-03-2020 10:57:07', '2020-03-24 23:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `other_value`
--

CREATE TABLE `other_value` (
  `other_id` int(11) NOT NULL,
  `value_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_value`
--

INSERT INTO `other_value` (`other_id`, `value_name`, `status`, `created_at`) VALUES
(1, 'Intensive Lession', 0, '2020-01-29 12:14:00'),
(2, 'Lession', 0, '2020-01-29 12:29:34'),
(3, 'Intensive Lession', 0, '2020-01-30 12:43:29'),
(5, 'Automation ', 0, '2020-01-30 12:44:18'),
(6, 'Review', 0, '2020-02-04 15:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `rate_app`
--

CREATE TABLE `rate_app` (
  `rating_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_app`
--

INSERT INTO `rate_app` (`rating_id`, `rate`, `user_id`, `type`, `status`, `created_at`) VALUES
(1, 5, 2, 'student', 0, '2020-02-24 09:05:37'),
(2, 5, 1, 'teacher', 0, '2020-02-19 13:44:37'),
(3, 4, 7, 'teacher', 0, '2020-02-19 13:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT 0,
  `student_id` int(11) DEFAULT 0,
  `student_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_number` int(11) DEFAULT 0,
  `service_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `stage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_second` varchar(255) DEFAULT NULL,
  `remaining_time` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `order_details` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1=>confirm_status_teacher',
  `lat` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `longnitude` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_status` int(11) DEFAULT 0,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `payment_date` varchar(255) DEFAULT NULL,
  `pay_by` varchar(255) DEFAULT NULL,
  `lesson_status` int(11) NOT NULL DEFAULT 0,
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `filter_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `teacher_id`, `student_id`, `student_type`, `student_number`, `service_selector`, `stage`, `subject`, `service_type`, `time`, `total_second`, `remaining_time`, `other`, `order_details`, `price`, `status`, `lat`, `longnitude`, `address`, `is_status`, `payment_status`, `payment_date`, `pay_by`, `lesson_status`, `date`, `filter_date`, `created_at`) VALUES
(1, 1, 1, 'male', 2, NULL, '1', '2', 'lesson', '7.00am', '3600', '3600', '', 'dsafasfdfdf', '2000', 1, 'f', 'fdf', 'Indore', 1, 1, '2020-03-20', 'cash', 0, '24 March 2020', '2020-03-24', '2020-03-20 13:02:19'),
(2, 2, 9, 'Male', 1, NULL, '1', '1', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Bcbc', '582', 1, '22.7525115', '75.8654002', 'Indore', 1, 1, '2020-03-20', 'credit_card', 0, '29 March 2020', '2020-03-29', '2020-03-20 14:42:28'),
(3, 0, 9, 'Male', 1, NULL, '1', '1', 'lesson', '3.00pm', '3600', '3600', 'Other', 'Fh', NULL, 0, '22.752523', '75.8653997', 'Indore', 0, 0, NULL, NULL, 0, '30 March 2020', '2020-03-30', '2020-03-21 05:25:46'),
(4, 0, 9, 'Male', 1, NULL, '3', '3', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Ch', NULL, 0, '22.7525234', '75.8654', 'Indore', 0, 0, NULL, NULL, 0, '29 March 2020', '2020-03-29', '2020-03-21 05:26:30'),
(5, 0, 9, 'Male', 1, NULL, '1', '2', 'lesson', '6.00pm', '3600', '3600', 'Other', 'Ch', NULL, 0, '22.7525236', '75.8654005', 'Indore', 0, 0, NULL, NULL, 0, '22 March 2020', '2020-03-22', '2020-03-21 12:05:20'),
(6, 0, 9, 'Male', 1, NULL, '1', '2', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Hf', NULL, 0, '22.7525233', '75.8654002', 'Indore', 0, 0, NULL, NULL, 0, '23 March 2020', '2020-03-23', '2020-03-21 12:06:23'),
(7, 0, 9, 'Male', 1, NULL, '1', '1', 'lesson', '6.00pm', '3600', '3600', 'Other', 'Cn', NULL, 0, '22.7525307', '75.8653901', 'Indore', 0, 0, NULL, NULL, 0, '22 March 2020', '2020-03-22', '2020-03-21 12:10:36'),
(8, 0, 9, 'Male', 1, NULL, '1', '1', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Bx', NULL, 0, '22.7525313', '75.8653902', 'Indore', 0, 0, NULL, NULL, 0, '23 March 2020', '2020-03-23', '2020-03-21 13:46:00'),
(9, 0, 9, 'Male', 1, NULL, '1', '1', 'lesson', '6.00pm', '3600', '3600', 'Other', 'Vx', NULL, 0, '22.7525304', '75.8653893', 'Indore', 0, 0, NULL, NULL, 0, '29 March 2020', '2020-03-29', '2020-03-21 13:48:33'),
(10, 0, 9, 'Male', 1, NULL, '1', '1', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Nc', NULL, 0, '22.7525306', '75.8653902', 'Indore', 0, 0, NULL, NULL, 0, '30 March 2020', '2020-03-30', '2020-03-21 13:53:14'),
(11, 0, 9, 'Male', 1, NULL, '2', '2', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Jv', NULL, 0, '22.7525352', '75.8654006', 'Indore', 0, 0, NULL, NULL, 0, '29 March 2020', '2020-03-29', '2020-03-23 06:10:28'),
(12, 0, 9, 'Male', 1, NULL, '2', '2', 'lesson', '6.00pm', '3600', '3600', 'Other', 'Hc', NULL, 0, '22.7525308', '75.8653899', 'Indore', 0, 0, NULL, NULL, 0, '29 March 2020', '2020-03-29', '2020-03-23 06:13:52'),
(13, 0, 9, 'Male', 1, NULL, '2', '2', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Ac', NULL, 2, '22.7525284', '75.8654098', 'Indore', 0, 0, NULL, NULL, 0, '31 March 2020', '2020-03-31', '2020-03-23 13:33:39'),
(14, 0, 1, 'male', 2, NULL, '1', '3', 'lesson', '7.00am', '3600', '3600', '', 'dsafasfdfdf', NULL, 0, 'f', 'fdf', 'Indore', 0, 0, NULL, NULL, 0, '23 March 2020', '2020-03-23', '2020-03-23 06:40:19'),
(15, 0, 9, 'Male', 1, NULL, '2', '2', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Fh', NULL, 2, '22.7525154', '75.8654138', 'Indore', 0, 0, NULL, NULL, 0, '29 March 2020', '2020-03-29', '2020-03-23 13:33:36'),
(16, 0, 1, 'male', 2, NULL, '1', '3', 'lesson', '7.00am', '3600', '3600', '', 'dsafasfdfdf', NULL, 0, 'f', 'fdf', 'Indore', 0, 0, NULL, NULL, 0, '23 March 2020', '2020-03-23', '2020-03-23 06:52:08'),
(17, 0, 1, 'male', 2, NULL, '1', '3', 'lesson', '7.00am', '3600', '3600', '', 'dsafasfdfdf', NULL, 0, 'f', 'fdf', 'Indore', 0, 0, NULL, NULL, 0, '23 March 2020', '2020-03-23', '2020-03-23 06:54:54'),
(18, 0, 1, 'male', 2, NULL, '1', '3', 'lesson', '7.00am', '3600', '3600', '', 'dsafasfdfdf', NULL, 0, 'f', 'fdf', 'Indore', 0, 0, NULL, NULL, 0, '23 March 2020', '2020-03-23', '2020-03-23 06:57:09'),
(19, 0, 1, 'male', 2, NULL, '1', '3', 'lesson', '7.00am', '3600', '3600', '', 'dsafasfdfdf', NULL, 0, 'f', 'fdf', 'Indore', 0, 0, NULL, NULL, 0, '23 March 2020', '2020-03-23', '2020-03-23 07:18:19'),
(20, 0, 9, 'Male', 1, NULL, '1', '3', 'lesson', '4.00pm', '3600', '3600', 'Other', 'Test', NULL, 0, '23.5044558', '76.4757704', 'India', 0, 0, NULL, NULL, 0, '24 March 2020', '2020-03-24', '2020-03-23 13:23:19'),
(21, 0, 9, 'Male', 1, NULL, '8', '5', 'lesson', '3.00pm', '3600', '3600', 'Other', 'Test', NULL, 0, '23.513409', '76.4807584', 'India', 0, 0, NULL, NULL, 0, '25 March 2020', '2020-03-25', '2020-03-23 13:30:12'),
(22, 0, 9, 'Male', 1, NULL, '8', '8', 'lesson', '4.00pm', '3600', '3600', 'Other', 'Test', NULL, 0, '23.5044558', '76.4757704', 'India', 0, 0, NULL, NULL, 0, '24 March 2020', '2020-03-24', '2020-03-23 13:34:09'),
(23, 0, 9, 'Male', 1, NULL, '9', '5', 'lesson', '4.00pm', '3600', '3600', 'Other', 'Test', NULL, 0, '23.5044558', '76.4757704', 'India', 0, 0, NULL, NULL, 0, '25 March 2020', '2020-03-25', '2020-03-23 13:51:18'),
(24, 2, 9, 'Male', 1, NULL, '2', '2', 'lesson', '6.00pm', '3600', '3600', 'Other', 'Gjjgjg', '500', 1, '22.689056', '75.8375987', 'Indore', 1, 1, '2020-03-23', 'credit_card', 0, '29 March 2020', '2020-03-29', '2020-03-23 14:14:49'),
(25, 0, 9, 'Male', 1, NULL, '9', '5', 'lesson', '4.00pm', '3600', '3600', 'Other', 'Twst', NULL, 0, '23.5005651', '76.4794032', 'India', 0, 0, NULL, NULL, 0, '25 March 2020', '2020-03-25', '2020-03-23 14:13:45'),
(26, 0, 9, 'Male', 1, NULL, '9', '1', 'lesson', '4.00pm', '3600', '3600', 'Other', 'Test', NULL, 0, '23.5005651', '76.4794032', 'India', 0, 0, NULL, NULL, 0, '24 March 2020', '2020-03-24', '2020-03-23 14:27:47'),
(27, 0, 9, 'Male', 1, NULL, '9', '1', 'lesson', '4.00pm', '3600', '3600', 'Other', 'Test', NULL, 0, '23.5005651', '76.4794032', 'India', 0, 0, NULL, NULL, 0, '24 March 2020', '2020-03-24', '2020-03-23 14:51:53'),
(28, 0, 1, 'male', 2, NULL, '4', '8', 'lesson', '7.00am', '3600', '3600', '', 'dsafasfdfdf', NULL, 0, 'f', 'fdf', 'Indore', 0, 0, NULL, NULL, 0, '23 March 2020', '2020-03-23', '2020-03-24 06:00:28'),
(29, 0, 9, 'الذكر', 2, NULL, '2', '2', 'lesson', '4.00pm', '3600', '3600', 'Other', 'kkfkldklkldkf\n', NULL, 0, '37.421998', '-122.084', 'Ujjain', 0, 0, NULL, NULL, 0, '30 March 2020', '2020-03-30', '2020-03-24 06:49:47'),
(30, 0, 9, 'الذكر', 1, NULL, '2', '2', 'lesson', '5.00pm', '3600', '3600', 'Other', 'fddfdfddfd\n', NULL, 0, '37.421998', '-122.084', 'Ujjain', 0, 0, NULL, NULL, 0, '29 March 2020', '2020-03-29', '2020-03-24 07:18:58'),
(31, 0, 9, 'Male', 1, NULL, '8', '8', 'lesson', '3.00pm', '3600', '3600', 'Other', 'Test', NULL, 2, '23.4836936', '76.4905557', '', 0, 0, NULL, NULL, 0, '25 March 2020', '2020-03-25', '2020-03-24 08:50:57'),
(32, 0, 9, 'Male', 1, NULL, '8', '8', 'lesson', '3.00pm', '3600', '3600', 'Other', 'Test', NULL, 0, '23.4840664', '76.4891753', '', 0, 0, NULL, NULL, 0, '25 March 2020', '2020-03-25', '2020-03-24 08:37:48'),
(33, 18, 9, 'Male', 1, NULL, '8', '8', 'lesson', '2.00pm', '3600', '3600', 'Other', 'Test', '400', 1, '23.4836936', '76.4905557', '', 1, 1, '2020-03-24', 'credit_card', 0, '25 March 2020', '2020-03-25', '2020-03-24 08:56:43'),
(34, 20, 9, 'Male', 1, NULL, '8', '8', 'lesson', '4.00pm', '3600', '3592', 'Other', 'Test', '800', 1, '23.4833208', '76.4919361', '', 1, 1, '2020-03-24', 'cash', 2, '25 March 2020', '2020-03-25', '2020-03-25 04:15:35'),
(35, 0, 9, 'Male', 1, NULL, '8', '8', 'lesson', '4.00pm', '3600', '3600', 'Other', 'Test', NULL, 2, '23.4840664', '76.4891753', '', 0, 0, NULL, NULL, 0, '25 March 2020', '2020-03-25', '2020-03-24 08:50:50'),
(36, 0, 9, 'Male', 1, NULL, '2', '2', 'lesson', '3.00pm', '3600', '3600', 'Other', 'wwwww\n', NULL, 0, '37.421998', '-122.084', '', 0, 0, NULL, NULL, 0, '25 March 2020', '2020-03-25', '2020-03-24 08:56:53'),
(37, 23, 9, 'Male', 1, NULL, '2', '2', 'lesson', '5.00pm', '3600', '3553', 'Other', 'B', '1000', 1, '22.6886591', '75.8372355', 'Indore', 1, 1, '2020-03-24', 'cash', 2, '31 March 2020', '2020-03-31', '2020-03-24 11:37:17'),
(38, 23, 9, 'Male', 1, NULL, '2', '2', 'lesson', '5.00pm', '3600', '3574', 'Other', 'V', '1000', 1, '22.6886591', '75.8372355', 'Indore', 1, 1, '2020-03-25', 'cash', 2, '30 March 2020', '2020-03-30', '2020-03-25 04:30:58'),
(41, 0, 1, 'male', 2, NULL, '1', '3', 'lesson', '7.00am', '3600', '3600', '', 'dsafasfdfdf', NULL, 0, 'f', 'fdf', 'saranpur', 0, 0, NULL, NULL, 0, '23 March 2020', '2020-03-23', '2020-03-25 04:39:57'),
(39, 20, 9, 'Male', 1, NULL, '8', '8', 'lesson', '2.00pm', '3600', '3600', 'Other', 'Test', '900', 1, '23.4945412', '76.4853959', '', 1, 1, '2020-03-24', 'credit_card', 2, '25 March 2020', '2020-03-25', '2020-03-25 04:09:48'),
(40, 20, 9, 'Male', 1, NULL, '8', '8', 'lesson', '4.00pm', '3600', '3596', 'Other', 'Test', '300', 1, '23.4828968', '76.4920046', '', 1, 1, '2020-03-25', 'credit_card', 2, '26 March 2020', '2020-03-26', '2020-03-25 04:20:20'),
(42, 20, 9, 'Male', 1, NULL, '8', '8', 'lesson', '5.00pm', '3600', '3585', 'Other', 'Nv', '1000', 1, '22.6894203', '75.8375987', 'Sarangpur', 1, 1, '2020-03-25', 'cash', 2, '30 March 2020', '2020-03-30', '2020-03-25 05:32:44'),
(43, 0, 9, 'Male', 1, NULL, '2', '2', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Vj', NULL, 0, '22.6894203', '75.8375987', 'Kranti', 0, 0, NULL, NULL, 0, '29 March 2020', '2020-03-29', '2020-03-25 05:44:06'),
(44, 0, 9, 'Male', 1, NULL, '2', '2', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Nc', NULL, 0, '22.6894203', '75.8375987', 'Kranti', 0, 0, NULL, NULL, 0, '30 March 2020', '2020-03-30', '2020-03-25 05:45:10'),
(45, 0, 9, 'Male', 1, NULL, '2', '2', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Jvjg', NULL, 0, '22.6878654', '75.8365092', 'Sudama', 0, 0, NULL, NULL, 0, '29 March 2020', '2020-03-29', '2020-03-25 05:46:08'),
(46, 0, 9, 'Male', 1, NULL, '2', '1', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Kv', NULL, 0, '22.6894203', '75.8375987', 'Kranti', 0, 0, NULL, NULL, 0, '31 March 2020', '2020-03-31', '2020-03-25 05:47:12'),
(47, 0, 9, 'Male', 1, NULL, '1', '3', 'lesson', '5.00pm', '3600', '3600', 'Other', 'Jc', NULL, 0, '22.6894203', '75.8375987', 'Kranti', 0, 0, NULL, NULL, 0, '30 March 2020', '2020-03-30', '2020-03-25 05:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `request_accepted`
--

CREATE TABLE `request_accepted` (
  `id` int(11) NOT NULL,
  `request_id` int(11) DEFAULT 0,
  `teacher_id` int(11) DEFAULT 0,
  `amount` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0,
  `payment` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_accepted`
--

INSERT INTO `request_accepted` (`id`, `request_id`, `teacher_id`, `amount`, `status`, `payment`, `created_at`) VALUES
(1, 1, 1, '2000', 2, 1, '2020-03-20 13:02:19'),
(2, 2, 2, '582', 2, 1, '2020-03-20 14:42:28'),
(3, 13, 2, '1000', 2, 1, '2020-03-23 14:14:49'),
(4, 15, 2, '2000', 2, 1, '2020-03-23 14:14:49'),
(5, 16, 2, '2000', 2, 1, '2020-03-23 14:14:49'),
(6, 17, 2, '3000', 2, 1, '2020-03-23 14:14:49'),
(7, 19, 2, '3000', 2, 1, '2020-03-23 14:14:49'),
(8, 24, 2, '500', 2, 1, '2020-03-23 14:14:49'),
(9, 31, 18, '500', 2, 1, '2020-03-24 08:56:43'),
(10, 32, 18, '300', 2, 1, '2020-03-24 08:56:43'),
(11, 33, 18, '400', 2, 1, '2020-03-24 08:56:43'),
(12, 34, 20, '800', 2, 1, '2020-03-24 09:30:44'),
(13, 35, 20, '300', 2, 1, '2020-03-24 09:30:44'),
(14, 36, 23, '500', 2, 1, '2020-03-24 09:07:15'),
(15, 37, 23, '1000', 2, 1, '2020-03-24 09:07:15'),
(16, 38, 23, '500', 2, 1, '2020-03-24 11:45:54'),
(17, 39, 20, '900', 2, 1, '2020-03-24 12:32:16'),
(18, 40, 20, '300', 2, 1, '2020-03-25 04:19:10'),
(19, 42, 20, '1000', 2, 1, '2020-03-25 05:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `request_reject`
--

CREATE TABLE `request_reject` (
  `reject_id` int(11) NOT NULL,
  `request_id` int(11) DEFAULT 0,
  `teacher_id` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'Panadmin'),
(4, 'Itradmin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_status` int(11) DEFAULT 0,
  `student_phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_image` varchar(255) DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `notification_type` enum('enable','disable') DEFAULT 'enable',
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `password`, `otp`, `otp_status`, `student_phone`, `student_image`, `device_type`, `device_token`, `notification_type`, `created`, `status`) VALUES
(1, 'deepti', '123456', 7772, 1, '7987735353', NULL, 'android', 'c2aGJt6GqzA:APA91bEsmq3sx_XiHCsgyYmtkAq1tnyrKRmT2zNmwCF_OmMao4eUD5d29inAzVgBjNfdhfBXKy77k2ihV7a6ZWK3AMVTfdjPuHpHWWvsCS5fNNvIDSlrX66VPoMYSLjbocvH2PUgNkGZ', 'enable', '2020-03-21 05:55:29', 1),
(2, 'text', NULL, 3213, 0, '1234', NULL, 'android', '', 'enable', '2020-03-20 12:21:59', 1),
(3, 'a', NULL, 1191, 0, '8888888888', NULL, 'android', 'dSRSiquvo7A:APA91bHMIo8EgeMcgEhFRWU0yzXlB1JlLDbIBR-_nvfQUekFMS2r7d9krIfD2lmTmSUhvdnX6aAKpKPOPCohRzduaIlYe_ih1gtOTkTaP2ExAaxomkRyVBkp_Eomhd9eVYFzERR9pzzU', 'enable', '2020-03-20 13:54:40', 1),
(4, 'a', NULL, 8364, 0, '9999999999', NULL, 'android', 'dSRSiquvo7A:APA91bHMIo8EgeMcgEhFRWU0yzXlB1JlLDbIBR-_nvfQUekFMS2r7d9krIfD2lmTmSUhvdnX6aAKpKPOPCohRzduaIlYe_ih1gtOTkTaP2ExAaxomkRyVBkp_Eomhd9eVYFzERR9pzzU', 'enable', '2020-03-20 13:56:27', 1),
(5, 'a', NULL, 5676, 0, '9999999991', NULL, 'android', 'dSRSiquvo7A:APA91bHMIo8EgeMcgEhFRWU0yzXlB1JlLDbIBR-_nvfQUekFMS2r7d9krIfD2lmTmSUhvdnX6aAKpKPOPCohRzduaIlYe_ih1gtOTkTaP2ExAaxomkRyVBkp_Eomhd9eVYFzERR9pzzU', 'enable', '2020-03-20 13:59:21', 1),
(6, 'deepti', NULL, 6521, 0, '7777777777', NULL, 'android', 'vcbgvhngjghj', 'enable', '2020-03-20 14:01:09', 1),
(7, 'a', NULL, 7595, 0, '9999999992', NULL, 'android', 'dSRSiquvo7A:APA91bHMIo8EgeMcgEhFRWU0yzXlB1JlLDbIBR-_nvfQUekFMS2r7d9krIfD2lmTmSUhvdnX6aAKpKPOPCohRzduaIlYe_ih1gtOTkTaP2ExAaxomkRyVBkp_Eomhd9eVYFzERR9pzzU', 'enable', '2020-03-20 14:02:09', 1),
(8, 'a', NULL, 8446, 0, '3333333333', NULL, 'android', 'dSRSiquvo7A:APA91bHMIo8EgeMcgEhFRWU0yzXlB1JlLDbIBR-_nvfQUekFMS2r7d9krIfD2lmTmSUhvdnX6aAKpKPOPCohRzduaIlYe_ih1gtOTkTaP2ExAaxomkRyVBkp_Eomhd9eVYFzERR9pzzU', 'enable', '2020-03-20 14:03:24', 1),
(9, 'a', '123456', 4959, 1, '5555555555', NULL, 'android', 'eUBvvRRGk1I:APA91bHgXMrBWt6xGECzlLfKVYXAcfk6oN7kmZTFGbo80NB7Tt0qaEhN6SE5iNhgfEkZzSZo7a_oGM8KuEhP18V-BS96AQJFsshOFG6D8jE2nt4slF0U7hUlEIXS5e_Z9OunzPbPrEOE', 'enable', '2020-03-25 05:43:34', 1),
(10, 'student', NULL, 3600, 0, '9977662170', NULL, 'android', 'c2aGJt6GqzA:APA91bEsmq3sx_XiHCsgyYmtkAq1tnyrKRmT2zNmwCF_OmMao4eUD5d29inAzVgBjNfdhfBXKy77k2ihV7a6ZWK3AMVTfdjPuHpHWWvsCS5fNNvIDSlrX66VPoMYSLjbocvH2PUgNkGZ', 'enable', '2020-03-20 14:07:14', 1),
(11, 'student1', NULL, 7709, 0, '9977668888', NULL, 'android', 'eb8I8r5d1cA:APA91bFMCgg6OlPTGg3h7rHEP5J4LoeHzG4mAJ0eKBcO3cR6FhZdoCKRfyPHvub_bveWc7_NnEylh3XM-UCrk_LpWjZcGDUNNXlN3AskQz6dv2CV3-7c1QmUVaZL8SKCDmR2gWwl18mT', 'enable', '2020-03-23 12:34:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_notification`
--

CREATE TABLE `student_notification` (
  `notification_id` int(11) NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_notification`
--

INSERT INTO `student_notification` (`notification_id`, `request_id`, `student_id`, `type`, `message`, `status`, `date`, `created_at`) VALUES
(1, 1, 1, 'Accept Request', ' teacher bidded on your request with 2000 SAR please check and confirm.', 2, '20-03-2020 18:32:11', '2020-03-20 13:02:19'),
(2, 2, 9, 'Accept Request', ' ayush bidded on your request with 582 SAR please check and confirm.', 2, '20-03-2020 19:49:59', '2020-03-20 14:42:28'),
(3, 13, 9, 'Accept Request', ' ayush مزايدة على طلبك مع 1000 SAR يرجى التحقق والتأكيد.', 1, '23-03-2020 12:03:59', '2020-03-23 06:33:59'),
(4, 14, 1, 'Accept Request', ' ayush مزايدة على طلبك مع 2000 SAR يرجى التحقق والتأكيد.', 1, '23-03-2020 12:10:37', '2020-03-23 06:40:37'),
(5, 16, 1, 'Accept Request', ' ayush مزايدة على طلبك مع 2000 SAR يرجى التحقق والتأكيد.', 1, '23-03-2020 12:22:58', '2020-03-23 06:52:58'),
(6, 17, 1, 'Accept Request', ' ayush مزايدة على طلبك مع 3000 SAR يرجى التحقق والتأكيد.', 1, '23-03-2020 12:25:25', '2020-03-23 06:55:25'),
(7, 19, 1, 'Accept Request', ' ayush مزايدة على طلبك مع 3000 SAR يرجى التحقق والتأكيد.', 1, '23-03-2020 12:48:43', '2020-03-23 07:18:43'),
(8, 24, 9, 'Accept Request', ' ayush مزايدة على طلبك مع 500 SAR يرجى التحقق والتأكيد.', 2, '23-03-2020 19:41:08', '2020-03-23 14:14:49'),
(9, 31, 9, 'Accept Request', ' teacher مزايدة على طلبك مع 500 SAR يرجى التحقق والتأكيد.', 1, '24-03-2020 14:05:23', '2020-03-24 08:35:23'),
(10, 32, 9, 'Accept Request', ' teacher مزايدة على طلبك مع 300 SAR يرجى التحقق والتأكيد.', 1, '24-03-2020 14:08:04', '2020-03-24 08:38:04'),
(11, 33, 9, 'Accept Request', ' teacher مزايدة على طلبك مع 400 SAR يرجى التحقق والتأكيد.', 2, '24-03-2020 14:10:35', '2020-03-24 08:56:43'),
(12, 34, 9, 'Accept Request', ' teacher مزايدة على طلبك مع 800 SAR يرجى التحقق والتأكيد.', 2, '24-03-2020 14:12:44', '2020-03-24 09:30:44'),
(13, 35, 9, 'Accept Request', ' teacher مزايدة على طلبك مع 300 SAR يرجى التحقق والتأكيد.', 1, '24-03-2020 14:14:44', '2020-03-24 08:44:44'),
(14, 36, 9, 'Accept Request', ' ayus مزايدة على طلبك مع 500 SAR يرجى التحقق والتأكيد.', 1, '24-03-2020 14:27:40', '2020-03-24 08:57:40'),
(15, 37, 9, 'Accept Request', ' ayus مزايدة على طلبك مع 1000 SAR يرجى التحقق والتأكيد.', 2, '24-03-2020 14:34:22', '2020-03-24 09:07:15'),
(16, 38, 9, 'Accept Request', ' ayus مزايدة على طلبك مع 500 SAR يرجى التحقق والتأكيد.', 2, '24-03-2020 17:12:53', '2020-03-24 11:45:54'),
(17, 39, 9, 'Accept Request', ' krish مزايدة على طلبك مع 900 SAR يرجى التحقق والتأكيد.', 2, '24-03-2020 18:01:13', '2020-03-24 12:32:16'),
(18, 40, 9, 'Accept Request', ' krish مزايدة على طلبك مع 300 SAR يرجى التحقق والتأكيد.', 2, '25-03-2020 09:47:54', '2020-03-25 04:19:10'),
(19, 42, 9, 'Accept Request', ' krish مزايدة على طلبك مع 1000 SAR يرجى التحقق والتأكيد.', 2, '25-03-2020 10:57:29', '2020-03-25 05:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `teacher_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `teacher_gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_image` varchar(255) DEFAULT NULL,
  `teacher_password` varchar(255) DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `otp_status` int(11) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `bank_account_no` varchar(255) DEFAULT NULL,
  `learning_levels` varchar(255) DEFAULT NULL,
  `learning_materials` text DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `certi_file_size` varchar(255) DEFAULT NULL,
  `certi_file_name` varchar(255) DEFAULT NULL,
  `personal_card` varchar(255) DEFAULT NULL,
  `pc_file_size` varchar(255) DEFAULT NULL,
  `pc_file_name` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` float NOT NULL DEFAULT 0,
  `app_profit` float NOT NULL DEFAULT 0,
  `wallet_amt` float NOT NULL DEFAULT 0,
  `cash_amount` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_status` varchar(255) NOT NULL DEFAULT '0',
  `device_type` varchar(255) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `notification_type` enum('enable','disable') DEFAULT 'enable',
  `status` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_email`, `teacher_phone`, `teacher_gender`, `teacher_image`, `teacher_password`, `otp`, `otp_status`, `nationality`, `city`, `bankname`, `bank_account_no`, `learning_levels`, `learning_materials`, `certificate`, `certi_file_size`, `certi_file_name`, `personal_card`, `pc_file_size`, `pc_file_name`, `qualification`, `total`, `app_profit`, `wallet_amt`, `cash_amount`, `created_at`, `profile_status`, `device_type`, `device_token`, `notification_type`, `status`) VALUES
(18, 'john', NULL, '9999999999', 'male', 'http://eshrahly.net/eshrahly/uploads/teacher_image/1584968521320profile_image', '123456', '4595', 0, '1', '1', NULL, '1234512345', '4,8', '5,8', 'http://eshrahly.net/eshrahly/uploads/certificate/1584968488425pdf_file', '79422', 'Screenshot_20200323-172806.png', 'http://eshrahly.net/eshrahly/uploads/personal_card/1584968499974pdf_file', '1489258', 'image-8834cce6-f673-4488-a1d9-c8362c3dcd1a.jpg', 'test', 400, 80, 320, '0', '2020-03-24 08:56:43', '1', 'android', 'cwPUn1fI9ok:APA91bHVuo24gwVHG_HbPDsa3dJRvjt2ZWJIxTxslpbMCYRV5kjGsn1ItEm0k1n5jOpPc94QajoXTHXY2H80NCZZf7CY2SYlZxE5mB-bagtjGkHKg6mxdcny-FQlQZrQ-fOajh8KxvmM', 'disable', 1),
(2, 'ram', NULL, '9111111111', 'male', 'http://eshrahly.net/eshrahly/uploads/teacher_image/1584530412838profile_image', '123456', '4321', 1, '1', '1', NULL, '963963963', '1,2', '1,2,3', 'http://eshrahly.net/eshrahly/uploads/certificate/1584530233934pdf_file', '1560010', 'Getting started', 'http://eshrahly.net/eshrahly/uploads/personal_card/1584530332290pdf_file', '2975646', 'IMG_20191119_151712_1.jpg', 'teacher', 1082, 216.4, 865.6, '0', '2020-03-25 05:39:05', '1', 'android', 'ft92Xp8eLyc:APA91bGLzgit5kTI9Pal47hk1tJh-NqF7Ceg-T8AucoIr04r_2agLKlZoXS32pr-YoLUj846lW3G-dBlLb3FJSw0SdGssOMbacjCFjn8KEzAIu9eiyPGbw4Xi3-X6hOBuVp7pRYbOqJ_', 'enable', 1),
(3, 'text', NULL, '1234', NULL, NULL, NULL, '3014', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '0', '2020-03-23 09:17:33', '0', 'android', 'vcbgvhngjghj', 'enable', 1),
(4, 'a', NULL, '9222222222', NULL, NULL, NULL, '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '0', '2020-03-19 15:00:13', '0', 'android', 'vcbgvhngjghj', 'enable', 1),
(5, 'A', NULL, '9333333333', NULL, NULL, '123456', '1234', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '0', '2020-03-19 15:06:18', '0', 'android', 'vcbgvhngjghj', 'enable', 1),
(6, 'ريما فوزي', NULL, '0557343095', 'female', 'http://eshrahly.net/eshrahly/uploads/teacher_image/1584653305662profile_image', '123123', '1234', 1, '12', '12', NULL, '124578', '1,11', '9,3', 'http://eshrahly.net/eshrahly/uploads/certificate/1584653259335pdf_file', '359550', 'Screenshot_20200319-223403.jpg', 'http://eshrahly.net/eshrahly/uploads/personal_card/1584653274687pdf_file', '359550', 'Screenshot_20200319-223403.jpg', 'بكالريوس علوم', 0, 0, 0, '0', '2020-03-20 10:32:13', '1', 'android', 'cFwkeVCf-lo:APA91bH32T8jDF6yKVqMjsj85rKE037aaSAjhtSqLGouWQv9jh3De5p69vzV5iK2fYRs4rSOTsvopFPLZGmRkizaBq7Vox8EEPjrc2QF0FKZj_5Gkwa0XFF2W3zWT55zqvP8TF_G-qg_', 'enable', 1),
(7, '@', NULL, '7777777777', NULL, NULL, '123456', '1234', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '0', '2020-03-20 10:16:23', '0', 'android', 'featF1S0k7w:APA91bFwoodEwVSbQaCnUc4WSs4sbAeMir3P275yIY4YEV_bCdmdfrHmKeV67me5B2_AIwh8e4rqRed20zcg3qbSJUp3zE7e706iEkWDkpkPZC-S4jVpx1WM-nj8bCilGWBOmvPgY6OF', 'enable', 1),
(14, 'eshan', NULL, '6666666666', NULL, NULL, NULL, '7470', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '0', '2020-03-24 08:53:49', '0', 'android', 'vcbgvhngjghj', 'enable', 1),
(10, 'Deepti Vaidhya', NULL, '7987735353', NULL, NULL, NULL, '6839', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '0', '2020-03-21 05:55:49', '0', 'android', 'ttttt', 'enable', 1),
(15, 'eshu', NULL, '8888888888', 'male', 'http://eshrahly.net/eshrahly/uploads/teacher_image/1584967862932profile_image', '123456', '6156', 0, '3', '3', NULL, '6566665556665', '1,2', '1,2', 'http://eshrahly.net/eshrahly/uploads/certificate/1584967940173pdf_file', '200089', 'IMG_20200323_181951.jpg', 'http://eshrahly.net/eshrahly/uploads/personal_card/1584967956676pdf_file', '200701', 'IMG_20200323_180306.jpg', 'hfhfhfh', 0, 0, 0, '0', '2020-03-24 08:53:39', '1', 'android', 'f1BWbqi9lpM:APA91bHZcpc7d2_JpcCZPIqW5nhscg2FG0c15RelzQrXFq9wbkSJ-FwG57SBN2RIueohVKT3ETF3ojiMaS1NPlXKH-5cnlRHJAlconPE0dlBH5tt6CeCRWqlANFnh-Vpnl82VwRfwO6O', 'enable', 1),
(16, 'sem', NULL, '9977662199', NULL, NULL, NULL, '7929', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '0', '2020-03-24 08:51:58', '0', 'android', 'vcbgvhngjghj', 'enable', 1),
(17, 'jonny', NULL, '123456', NULL, NULL, NULL, '9265', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '0', '2020-03-24 08:52:04', '0', 'android', 'vcbgvhngjghj', 'enable', 1),
(19, 'ayush1', NULL, '9777777777', NULL, NULL, NULL, '9589', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '0', '2020-03-23 13:08:32', '0', 'android', 'vcbgvhngjghj', 'enable', 1),
(20, 'krish', NULL, '9999999998', 'male', 'http://eshrahly.net/eshrahly/uploads/teacher_image/1584968521320profile_image', '123456', '8423', 0, '1', '1005', NULL, '1234512345', '4,8', '5,8', 'http://eshrahly.net/eshrahly/uploads/certificate/1584968488425pdf_file', '79422', 'Screenshot_20200323-172806.png', 'http://eshrahly.net/eshrahly/uploads/personal_card/1584968499974pdf_file', '1489258', 'image-8834cce6-f673-4488-a1d9-c8362c3dcd1a.jpg', 'test', 3000, 600, 960, '760', '2020-03-25 06:37:49', '1', 'android', 'cSuVYj-kNfY:APA91bEYTv87lZKrKGSzr6uGZxjNwxF-UtRpURU9Mry5xdu-xyUY0uoT7BzY_CVpggH6mm5kj26WElowjLFAzQ3bTsFQxLW-YL3OQDcdBXfssv4T0FEh4PDJgbbYBrtpBuAkpVPTof7q', 'disable', 1),
(21, 'nk', NULL, '7777777778', NULL, NULL, '123456', '9630', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '0', '2020-03-23 13:46:36', '0', 'android', 'vcbgvhngjghj', 'enable', 1),
(22, 'sanjay', NULL, '9999999990', NULL, NULL, '123456', '1848', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '0', '2020-03-23 13:48:57', '0', 'android', 'vcbgvhngjghj', 'enable', 1),
(23, 'ayus', NULL, '5555555555', 'male', 'http://eshrahly.net/eshrahly/uploads/teacher_image/1585033907542profile_image', '123456', '5008', 0, '1', '1', NULL, '6666666', '1,2', '1,2', 'http://eshrahly.net/eshrahly/uploads/certificate/1585033865303pdf_file', '76372', 'IMG-20200321-WA0003.jpg', 'http://eshrahly.net/eshrahly/uploads/personal_card/1585033846725pdf_file', '77839', 'IMG-20200321-WA0001.jpg', 'jvjv', 2500, 500, 400, '200', '2020-03-25 04:30:58', '1', 'android', 'f1BWbqi9lpM:APA91bHZcpc7d2_JpcCZPIqW5nhscg2FG0c15RelzQrXFq9wbkSJ-FwG57SBN2RIueohVKT3ETF3ojiMaS1NPlXKH-5cnlRHJAlconPE0dlBH5tt6CeCRWqlANFnh-Vpnl82VwRfwO6O', 'enable', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_favorite`
--

CREATE TABLE `teacher_favorite` (
  `t_f_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `review` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher_favorite`
--

INSERT INTO `teacher_favorite` (`t_f_id`, `teacher_id`, `student_id`, `review`, `rate`, `is_status`, `created_at`) VALUES
(1, 1, 1, NULL, NULL, 1, '2020-03-21 07:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_rate`
--

CREATE TABLE `teacher_rate` (
  `rate_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher_rate`
--

INSERT INTO `teacher_rate` (`rate_id`, `teacher_id`, `student_id`, `rate`) VALUES
(1, 46, 2, 5),
(2, 46, 3, 4),
(3, 48, 45, 3),
(4, 8, 4, 5),
(5, 8, 5, 3),
(6, 6, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tran_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT 0,
  `card_holder_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `card_cvv` varchar(255) DEFAULT NULL,
  `expired_date` varchar(255) DEFAULT NULL,
  `expired_month` varchar(255) DEFAULT NULL,
  `ford_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `payment_option` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `total_pay_amount` varchar(255) DEFAULT NULL,
  `cash_amount` varchar(255) DEFAULT '0',
  `credit_card` varchar(255) DEFAULT '0',
  `pay_by` varchar(255) DEFAULT NULL,
  `app_profit` varchar(255) NOT NULL DEFAULT '0',
  `remind` varchar(255) NOT NULL DEFAULT '0',
  `clear_balance` int(11) NOT NULL DEFAULT 0,
  `clear_date` varchar(255) DEFAULT NULL,
  `is_status` int(11) DEFAULT 0,
  `date_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tran_id`, `request_id`, `user_id`, `teacher_id`, `coupon_id`, `card_holder_name`, `card_number`, `card_cvv`, `expired_date`, `expired_month`, `ford_id`, `currency`, `payment_option`, `payment_status`, `total_pay_amount`, `cash_amount`, `credit_card`, `pay_by`, `app_profit`, `remind`, `clear_balance`, `clear_date`, `is_status`, `date_time`) VALUES
(1, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', 'success', '2000', '2000', '0', 'cash', '400', '400', 0, NULL, 1, '2020-03-20'),
(2, 2, 9, 2, 0, 'a', NULL, '', '2102', '', '158471531700000774', 'SAR', 'VISA', 'success', '582', '0', '582', 'credit_card', '116.4', '465.6', 0, NULL, 1, '2020-03-20'),
(3, 24, 9, 2, 0, 'a', NULL, '', '2302', '', '158497285000011968', 'SAR', 'VISA', 'success', '500', '0', '500', 'credit_card', '100', '400', 0, NULL, 1, '2020-03-23'),
(4, 33, 9, 18, 0, 'test', NULL, '', '2302', '', '158504018600015839', 'SAR', 'VISA', 'success', '400', '0', '400', 'credit_card', '80', '320', 0, NULL, 1, '2020-03-24'),
(5, 37, 9, 23, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', 'success', '1000', '1000', '0', 'cash', '200', '200', 0, NULL, 1, '2020-03-24'),
(6, 34, 9, 20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', 'success', '800', '800', '0', 'cash', '160', '160', 0, NULL, 1, '2020-03-24'),
(7, 38, 9, 23, 0, 'a', NULL, '', '2302', '', '158505033000016911', 'SAR', 'VISA', 'success', '500', '0', '500', 'credit_card', '100', '400', 0, NULL, 1, '2020-03-24'),
(8, 39, 9, 20, 0, 'test ', NULL, '', '2302', '', '158505312000017272', 'SAR', 'VISA', 'success', '900', '0', '900', 'credit_card', '180', '720', 0, NULL, 1, '2020-03-24'),
(9, 40, 9, 20, 0, 'test', NULL, '', '2302', '', '158510993300019682', 'SAR', 'VISA', 'success', '300', '0', '300', 'credit_card', '60', '240', 0, NULL, 1, '2020-03-25'),
(10, 38, 9, 23, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', 'success', '1000', '1000', '0', 'cash', '200', '200', 0, NULL, 1, '2020-03-25'),
(11, 42, 9, 20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cash', 'success', '1000', '1000', '0', 'cash', '200', '200', 0, NULL, 1, '2020-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_request`
--

CREATE TABLE `withdraw_request` (
  `withdraw_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `pay_by` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw_request`
--

INSERT INTO `withdraw_request` (`withdraw_id`, `user_id`, `amount`, `pay_by`, `status`, `created_at`) VALUES
(1, 1, 2000, NULL, NULL, '2020-03-21 07:21:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_page`
--
ALTER TABLE `all_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `learning_level`
--
ALTER TABLE `learning_level`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `learning_material`
--
ALTER TABLE `learning_material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `other_value`
--
ALTER TABLE `other_value`
  ADD PRIMARY KEY (`other_id`);

--
-- Indexes for table `rate_app`
--
ALTER TABLE `rate_app`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `request_accepted`
--
ALTER TABLE `request_accepted`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`request_id`);

--
-- Indexes for table `request_reject`
--
ALTER TABLE `request_reject`
  ADD PRIMARY KEY (`reject_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_notification`
--
ALTER TABLE `student_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_favorite`
--
ALTER TABLE `teacher_favorite`
  ADD PRIMARY KEY (`t_f_id`);

--
-- Indexes for table `teacher_rate`
--
ALTER TABLE `teacher_rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tran_id`);

--
-- Indexes for table `withdraw_request`
--
ALTER TABLE `withdraw_request`
  ADD PRIMARY KEY (`withdraw_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_page`
--
ALTER TABLE `all_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learning_level`
--
ALTER TABLE `learning_level`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `learning_material`
--
ALTER TABLE `learning_material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `other_value`
--
ALTER TABLE `other_value`
  MODIFY `other_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rate_app`
--
ALTER TABLE `rate_app`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `request_accepted`
--
ALTER TABLE `request_accepted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `request_reject`
--
ALTER TABLE `request_reject`
  MODIFY `reject_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_notification`
--
ALTER TABLE `student_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `teacher_favorite`
--
ALTER TABLE `teacher_favorite`
  MODIFY `t_f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_rate`
--
ALTER TABLE `teacher_rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `withdraw_request`
--
ALTER TABLE `withdraw_request`
  MODIFY `withdraw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
