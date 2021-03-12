-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2020 at 11:43 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alphafk6_smartparking`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `id` int(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `address` longtext NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id`, `Username`, `first_name`, `last_name`, `Email`, `Password`, `phone_number`, `image`, `dob`, `address`, `gender`) VALUES
(1, 'Admin', 'admin', '', 'alphawizz@gmail.com', 'e6e061838856bf47e1de730719fb2609', '5656598598', 'user1.png', '12/12/1998', '', 'Male'),
(2, 'Gopal123', 'Gopal', 'Sharma', 'gopal@alphawizz.awsapps.com', 'ccd5e84f60d8694f5bcad804f151c29b', '4545556656', 'myw3schoolsimage.jpg', '19/02/1998', 'PU-3 Commercial, Princes Business Skypark, 6th Floor, 611, AB Rd, Scheme No 54, Indore, Madhya Pradesh 452010', 'Male'),
(3, 'alphawizz@gmail.com', 'admin', 'smart', 'alphawizz@gmail.com', 'e6e061838856bf47e1de730719fb2609', '8956230223', 'user1.png', '04/01/1996', 'PU-3 Commercial, Princes Business Skypark, 6th Floor, 611, AB Rd, Scheme No 54, Indore, Madhya Pradesh 452010', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `department_id` int(100) NOT NULL,
  `appointment_date` varchar(100) NOT NULL,
  `appointment_time` varchar(100) NOT NULL,
  `status` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `full_name` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `shifting` int(10) NOT NULL,
  `appointment_reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`appointment_id`, `patient_id`, `doctor_id`, `department_id`, `appointment_date`, `appointment_time`, `status`, `created`, `full_name`, `phone_number`, `gender`, `address`, `age`, `description`, `shifting`, `appointment_reason`) VALUES
(2, 80, 71, 0, '2020-03-05', '02:39:36 pm', 0, '2020-05-27 08:55:26', 'seema', '7485096354', 'Female', '', 42, '', 1, ''),
(6, 80, 63, 0, '2020-03-06', '03:18:41 pm', 0, '2020-03-04 09:49:41', 'yash', '8079468497', 'Male', '', 25, '', 1, ''),
(7, 80, 71, 0, '2020-03-06', '04:50:57 PM', 0, '2020-03-05 11:21:19', 'uma', '8745624488', 'Female', '', 25, '', 1, ''),
(8, 74, 69, 0, '2020-03-07', '09:06:59 pm', 0, '2020-03-05 15:37:36', 'ibrar ', '7084110844', 'Male', 'bzha', 35, '', 1, ''),
(9, 74, 69, 0, '2020-03-07', '09:07:59 pm', 1, '2020-03-05 15:45:58', 'asfak', '9956039060', 'Male', 'ksvaj', 38, '', 1, ''),
(10, 74, 69, 0, '2020-03-07', '09:09:09 pm', 0, '2020-03-05 15:40:14', 'Abhishek', '7838586182', 'Male', 'nznaj', 45, '', 1, ''),
(11, 74, 69, 0, '2020-03-07', '09:11:00 pm', 0, '2020-03-05 15:42:12', 'ajeet', '8738815758', 'Male', 'jsjs', 41, '', 1, ''),
(12, 74, 69, 0, '2020-03-07', '09:12:38 pm', 0, '2020-03-05 15:43:37', 'aksh', '7239010509', 'Male', 'b HGH hi bg', 43, '', 1, ''),
(13, 74, 69, 0, '2020-03-07', '09:14:23 pm', 0, '2020-03-05 15:45:39', 'anjni', '6005341685', 'Male', 'giddy', 48, '', 1, ''),
(14, 74, 69, 0, '2020-03-07', '09:16:35 pm', 0, '2020-03-05 15:47:25', 'apretr', '8115985211', 'Male', 'bafggss', 40, '', 1, ''),
(15, 74, 69, 0, '2020-03-07', '09:18:48 pm', 0, '2020-03-05 15:49:40', 'puspendr', '6207751325', 'Male', ', n him', 39, '', 1, ''),
(16, 74, 69, 0, '2020-03-07', '09:19:58 pm', 0, '2020-03-05 15:51:26', 'golu', '8317012242', 'Male', 'cinch', 35, '', 1, ''),
(17, 74, 69, 0, '2020-03-07', '09:21:38 pm', 0, '2020-03-05 15:53:04', 'jubair', '9838713717', 'Male', 'vino sah', 42, '', 1, ''),
(18, 82, 69, 0, '2020-03-07', '09:41:45 PM', 1, '2020-03-06 03:36:03', 'chs', '0798521025', 'Male', 'ysdfg', 35, '', 1, ''),
(19, 82, 69, 0, '2020-03-07', '09:41:45 PM', 1, '2020-03-05 16:15:18', 'chs', '0798521025', 'Male', 'ysdfg', 35, '', 1, ''),
(20, 36, 7, 0, '2020-03-09', '10:16:21 AM', 0, '2020-03-09 04:54:38', 'Rahul', '9895656565', '?????', '', 12, '', 1, ''),
(21, 36, 7, 0, '2020-03-09', '10:39:20 AM', 0, '2020-03-09 05:10:00', 'rahul', '9907898654', 'Male', '', 12, '', 1, ''),
(22, 36, 7, 0, '2020-03-09', '11:14:44 AM', 0, '2020-03-09 05:45:14', 'rahul', '7845454545', 'Male', '', 45, '', 1, ''),
(23, 36, 7, 0, '2020-03-09', '11:24:37 AM', 0, '2020-03-09 05:55:18', 'rahul sharma', '1221212121', 'Male', 'test', 21, '', 1, ''),
(24, 36, 7, 0, '2020-03-09', '06:07:28 pm', 0, '2020-03-09 12:37:47', 'rahul ', '9988588855', 'Male', '', 35, '', 1, ''),
(25, 83, 71, 0, '2020-03-12', '12:58:39 p.m.', 0, '2020-03-11 07:29:37', 'raju', '9855478632', 'Male', '', 52, '', 1, ''),
(26, 83, 72, 0, '2020-03-13', '02:09:31 p.m.', 0, '2020-03-11 08:40:20', 'monu', '9663280480', 'Male', '', 22, '', 1, ''),
(27, 83, 72, 0, '2020-03-13', '02:11:44 p.m.', 0, '2020-03-11 08:42:08', 'sonu', '7480566458', 'Male', '', 22, '', 2, ''),
(28, 83, 71, 0, '2020-03-12', '02:13:26 p.m.', 0, '2020-03-11 08:43:56', 'mona', '8796624581', 'Female', '', 20, '', 2, ''),
(29, 83, 72, 0, '2020-03-13', '02:22:17 p.m.', 0, '2020-03-11 08:52:57', 'sona', '8967618878', 'Female', '', 20, '', 1, ''),
(30, 83, 71, 0, '2020-03-12', '02:36:44 p.m.', 0, '2020-03-11 09:08:26', 'rona', '8055475776', 'Female', '', 22, '', 2, ''),
(31, 36, 7, 0, '2020-03-16', '07:09:47 PM', 0, '2020-03-16 13:40:19', 'neha', '1212121212', 'Female', '', 2, '', 2, ''),
(32, 36, 7, 0, '2020-03-17', '06:37:20 pm', 1, '2020-03-17 13:11:04', 'Shubham Sharma', '9586858585', 'Male', '', 25, '', 2, ''),
(33, 36, 7, 0, '2020-03-24', '09:37:28 am', 1, '2020-03-24 11:50:10', 'rahul', '9907898654', 'Male', '', 25, '', 1, ''),
(34, 88, 126, 0, '2020-03-26', '03:53:45 p.m.', 1, '2020-03-24 10:31:29', 'sonu', '7412580963', 'Male', '', 20, '', 1, ''),
(35, 88, 71, 0, '2020-03-26', '03:55:24 p.m.', 0, '2020-03-24 10:25:58', 'garima', '8741253690', 'Female', '', 26, '', 2, ''),
(36, 88, 126, 0, '2020-03-30', '03:58:00 p.m.', 0, '2020-03-24 10:29:17', 'xyz', '9856325840', 'Female', '', 8, '', 2, ''),
(37, 90, 7, 0, '2020-03-24', '05:14:54 pm', 1, '2020-03-24 11:50:13', 'Rahul', '9907854884', 'Male', '', 25, '', 2, ''),
(38, 90, 7, 0, '2020-03-24', '07:34:16 pm', 0, '2020-03-24 14:05:24', 'rahul', '9907898645', 'Male', 'aggag', 25, '', 2, ''),
(39, 90, 7, 0, '2020-03-24', '07:47:48 pm', 0, '2020-03-24 14:18:53', 'jjjj', '5555555555', 'Male', '', 5, '', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `Banner`
--

CREATE TABLE `Banner` (
  `id` int(100) NOT NULL,
  `banner_image` varchar(190) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Banner`
--

INSERT INTO `Banner` (`id`, `banner_image`) VALUES
(1, 'b1.png'),
(2, 'b2.png'),
(3, 'b3.png'),
(4, 'b4.png'),
(5, 'b5.png'),
(6, 'b6.png'),
(7, 'b7.png'),
(8, 'b8.png');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `pick_location` text NOT NULL,
  `drop_location` text NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `pick_time` varchar(255) DEFAULT NULL,
  `pick_date` varchar(255) DEFAULT NULL,
  `phonenum` varchar(30) NOT NULL,
  `stuf_name` varchar(255) NOT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `packaging_required` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `attachment_image` text,
  `receiver_name` varchar(100) NOT NULL,
  `receiver_mobilenumber` varchar(100) NOT NULL,
  `lift_facility` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `pick_date_time` varchar(255) NOT NULL,
  `user_id` int(25) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `driver_location` varchar(255) NOT NULL,
  `latitude` text NOT NULL,
  `longnitue` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `booking_date` varchar(255) NOT NULL,
  `booking_time` varchar(255) NOT NULL,
  `pick_up_letter` int(11) NOT NULL DEFAULT '0',
  `date_time` varchar(255) NOT NULL,
  `is_status` int(11) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `is_booking_verify` int(11) NOT NULL DEFAULT '0',
  `customer_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `pick_location`, `drop_location`, `vehicle_type`, `pick_time`, `pick_date`, `phonenum`, `stuf_name`, `floor`, `packaging_required`, `amount`, `payment_type`, `distance`, `attachment_image`, `receiver_name`, `receiver_mobilenumber`, `lift_facility`, `landmark`, `description`, `pick_date_time`, `user_id`, `driver_id`, `driver_location`, `latitude`, `longnitue`, `status`, `booking_date`, `booking_time`, `pick_up_letter`, `date_time`, `is_status`, `otp`, `is_booking_verify`, `customer_name`) VALUES
(1, '[{\"address\":\" Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.933476835689625,\"longitude\":75.88625404983759}]', '[{\"address\":\" Maharajganj, Madhya Pradesh 453771, India\\n\",\"latitude\":0,\"longitude\":0,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '45.0 ETB', 'Cash', '7 km', NULL, '', '', '0', '', 'xyz', 'Jun 30 2020 12:20', 4, 0, '', '', '', '', '2020-06-29', '18:45:35', 1, '2020-06-30 12:20', 0, '', 0, ''),
(2, '[{\"address\":\" Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.933476835689625,\"longitude\":75.88625404983759}]', '[{\"address\":\"Manglaya Sadak, Indore, Madhya Pradesh 453771, India\\n\",\"latitude\":22.96012398209156,\"longitude\":75.88180996477604,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '50.0 ETB', 'Cash', '8 km', NULL, '', '', '0', '', 'xcd', 'Jun 30 2020 00:15', 4, 1, '\"[{\\\"address\\\":\\\" Guran, Madhya Pradesh 453771, India\\\\n\\\",\\\"latitude\\\":22.9334767,\\\"longitude\\\":75.8862541}]\"', '', '', '', '2020-06-29', '18:46:50', 0, '2020-06-30 00:15', 3, '', 0, ''),
(3, '[{\"address\":\" Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.933476835689625,\"longitude\":75.88625404983759}]', '[{\"address\":\" Panod, Madhya Pradesh 453771, India\\n\",\"latitude\":23.001137875653278,\"longitude\":75.86490266025066,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '65.0 ETB', 'Cash', '11 km', NULL, '', '', '0', '', 'cvg', 'Jun 30 2020 00:34', 4, 4, '', '', '', '', '2020-06-29', '19:06:28', 0, '2020-06-30 00:34', 3, '', 0, ''),
(4, '[{\"address\":\" Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.933476835689625,\"longitude\":75.88625404983759}]', '[{\"address\":\"Ujjain, Madhya Pradesh, India\",\"latitude\":23.1764665,\"longitude\":75.7885163,\"reciver_name\":\"Abhinav Seo\",\"reciver_number\":\"9752225415\"},{\"address\":\"Dewas, Madhya Pradesh, India\",\"latitude\":22.9675929,\"longitude\":76.0534454,\"reciver_name\":\"Abhishek\",\"reciver_number\":\"9617041225\"},{\"address\":\"Bhopal, Madhya Pradesh, India\",\"latitude\":23.2599333,\"longitude\":77.412615,\"reciver_name\":\"Ajay Shukla Delhi\",\"reciver_number\":\"+91 97701 94565\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '1110.0 ETB', 'Cash', '220 km', NULL, '', '', '0', '', 'xyz', 'Jun 30 2020 00:44', 4, 4, '\"[{\\\"address\\\":\\\" Guran, Madhya Pradesh 453771, India\\\\n\\\",\\\"latitude\\\":22.9334767,\\\"longitude\\\":75.8862541}]\"', '', '', '', '2020-06-29', '19:16:44', 0, '2020-06-30 00:44', 3, '', 0, ''),
(5, '[{\"address\":\" Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.933476835689625,\"longitude\":75.88625404983759}]', '[{\"address\":\" Panod, Madhya Pradesh 453771, India\\n\",\"latitude\":23.006515792825798,\"longitude\":75.8577736839652,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '65.0 ETB', 'Cash', '11 km', NULL, '', '', '0', '', 'xyz', 'Jun 30 2020 00:55', 4, 4, '\"[{\\\"address\\\":\\\" Guran, Madhya Pradesh 453771, India\\\\n\\\",\\\"latitude\\\":22.9334767,\\\"longitude\\\":75.8862541}]\"', '', '', '', '2020-06-29', '19:26:22', 0, '2020-06-30 00:55', 3, '', 0, ''),
(6, '[{\"address\":\" Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.933476835689625,\"longitude\":75.88625404983759}]', '[{\"address\":\"Ujjain, Madhya Pradesh, India\",\"latitude\":23.1764665,\"longitude\":75.7885163,\"reciver_name\":\"Abhinav Seo\",\"reciver_number\":\"9752225415\"},{\"address\":\"Dewas, Madhya Pradesh, India\",\"latitude\":22.9675929,\"longitude\":76.0534454,\"reciver_name\":\"Abhishek\",\"reciver_number\":\"9617041225\"},{\"address\":\"Bhopal, Madhya Pradesh, India\",\"latitude\":23.2599333,\"longitude\":77.412615,\"reciver_name\":\"Ajay Shukla Delhi\",\"reciver_number\":\"+91 97701 94565\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '1110.0 ETB', 'Cash', '220 km', NULL, '', '', '0', '', 'xgf', 'Jun 30 2020 00:58', 4, 4, '\"[{\\\"address\\\":\\\" Guran, Madhya Pradesh 453771, India\\\\n\\\",\\\"latitude\\\":22.9334767,\\\"longitude\\\":75.8862541}]\"', '', '', '', '2020-06-29', '19:28:50', 0, '2020-06-30 00:58', 3, '', 0, ''),
(7, '[{\"address\":\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.30603509654716,\"longitude\":55.3685238584876}]', '[{\"address\":\"Wasit St - Mughaidir SuburbAl Khezamia - Sharjah - United Arab Emirates\",\"latitude\":25.34186799999999,\"longitude\":55.4318351,\"reciver_name\":\"abdu\",\"reciver_number\":\"+251944725933\"},{\"address\":\"Sharjah - Al Nahda - Sharjah - United Arab Emirates\",\"latitude\":25.3012255,\"longitude\":55.3691873,\"reciver_name\":\"abdulalaziz\",\"reciver_number\":\"+971555528213\"}]', '1', NULL, NULL, '', 'Grocery', NULL, 'No', '125.0 ETB', 'Cash', '23 km', NULL, '', '', '0', '', '', 'Jun 30 2020 02:41', 2, 3, '\"[{\\\"address\\\":\\\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\\\n\\\",\\\"latitude\\\":25.3059909,\\\"longitude\\\":55.3685482}]\"', '', '', '', '2020-06-29', '22:41:40', 0, '2020-06-30 02:41', 3, '', 0, ''),
(8, '[{\"address\":\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.306047220634614,\"longitude\":55.3685238584876}]', '[{\"address\":\"20 15b St - Al TwarAl Twar 2 - Dubai - United Arab Emirates\\n\",\"latitude\":25.260526067733117,\"longitude\":55.3885941579938,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '65.0 ETB', 'Cash', '11 km', NULL, '', '', '0', '', '', 'Jun 30 2020 11:12', 2, 0, '', '', '', '', '2020-06-30', '07:13:07', 0, '2020-06-30 11:12', 0, '', 0, ''),
(9, '[{\"address\":\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.30604812994113,\"longitude\":55.36853425204753}]', '[{\"address\":\"Fly dubai - Dubai - United Arab Emirates\\n\",\"latitude\":25.2566199771925,\"longitude\":55.34990396350622,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '3', NULL, NULL, '', 'Electronics', NULL, 'Yes', '115.0 ETB', 'Cash', '21 km', NULL, '', '', '0', '', '', 'Jun 30 2020 11:14', 2, 0, '', '', '', '', '2020-06-30', '07:14:43', 0, '2020-06-30 11:14', 0, '', 0, ''),
(10, '[{\"address\":\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.306044492715053,\"longitude\":55.368530228734016}]', '[{\"address\":\"60a 23d St - Garhoud - Dubai - United Arab Emirates\\n\",\"latitude\":25.24147685199871,\"longitude\":55.355973802506924,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '3', NULL, NULL, '', 'Spareparts', NULL, 'Yes', '95.0 ETB', 'Cash', '17 km', NULL, '', '', '0', '', '', 'Jun 30 2020 11:14', 2, 5, '\"[{\\\"address\\\":\\\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\\\n\\\",\\\"latitude\\\":25.3060107,\\\"longitude\\\":55.3685297}]\"', '', '', '', '2020-06-30', '07:16:33', 0, '2020-06-30 11:14', 3, '', 0, ''),
(11, '[{\"address\":\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.30605146406495,\"longitude\":55.36852754652501}]', '[{\"address\":\"[{\\\"address\\\":\\\"40 19b St - Al Qusais 1Al Qusais 2 - Dubai - United Arab Emirates\\\\n\\\",\\\"latitude\\\":0,\\\"longitude\\\":0,\\\"reciver_name\\\":\\\"\\\",\\\"reciver_number\\\":\\\"\\\"}]\",\"latitude\":0,\"longitude\":0,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Grocery', NULL, 'No', '65.0 ETB', 'Cash', '11 km', NULL, '', '', '0', '', '', 'Jun 30 2020 11:22', 2, 0, '', '', '', '', '2020-06-30', '07:22:55', 1, '2020-06-30 11:22', 0, '', 0, ''),
(12, '[{\"address\":\"Sharjah - United Arab Emirates\",\"latitude\":\"22.9331491\",\"longitude\":\"75.8826237\"}]', '[{\"address\":\"Ajman - United Arab Emirates\",\"latitude\":\"22.9331491\",\"longitude\":\"75.8826237\"}]', '1', '1:07 AM', '30/06/2020', '0522462818', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '', 2, 0, '', '', '', '', '2020-06-30', '08:08:54', 0, '2020-06-30 08:08', 0, '', 0, ''),
(13, '[{\"address\":\"Abha Saudi Arabia\",\"latitude\":\"22.9331491\",\"longitude\":\"75.8826237\"}]', '[{\"address\":\"Hail Saudi Arabia\",\"latitude\":\"22.9331491\",\"longitude\":\"75.8826237\"}]', '1', '9:30 PM', '30/06/2020', '55555555555', 'Document', NULL, '', '', '', '', NULL, '', '', '', '', 'Document ', '', 1, 0, '', '', '', '', '2020-06-30', '09:01:19', 0, '2020-06-30 09:01', 0, '', 0, ''),
(14, '[{\"address\":\" Riyadh 13464, Saudi Arabia\\n\",\"latitude\":24.99579786480426,\"longitude\":46.758177280426025}]', '[{\"address\":\"15514, Saudi Arabia\\n\",\"latitude\":25.369664075514404,\"longitude\":45.36031253635883,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '915.0 ETB', 'Cash', '181 km', NULL, '', '', '0', '', 'xyz', 'Jun 30 2020 15:26', 4, 0, '', '', '', '', '2020-06-30', '09:59:13', 0, '2020-06-30 15:26', 0, '', 0, ''),
(15, '[{\"address\":\"19625, Saudi Arabia\\n\",\"latitude\":24.25727415244961,\"longitude\":45.86947493255138}]', '[{\"address\":\"40, Jilah 19636, Saudi Arabia\\n\",\"latitude\":24.34650434888337,\"longitude\":45.82605231553316,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '70.0 ETB', 'Cash', '12 km', NULL, '', '', '0', '', 'xtz', 'Jun 30 2020 21:22', 4, 0, '', '', '', '', '2020-06-30', '15:59:18', 0, '2020-06-30 21:22', 0, '', 0, ''),
(16, '[{\"address\":\"19625, Saudi Arabia\\n\",\"latitude\":24.25378605218662,\"longitude\":45.87039526551962}]', '[{\"address\":\" ????? 19639, Saudi Arabia\\n\",\"latitude\":24.340153377520004,\"longitude\":45.84099490195513,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '55.0 ETB', 'Cash', '9 km', NULL, '', '', '0', '', 'sdr', 'Jun 30 2020 21:29', 4, 0, '', '', '', '', '2020-06-30', '16:01:39', 0, '2020-06-30 21:29', 0, '', 0, ''),
(17, '[{\"address\":\"\",\"latitude\":\"\",\"longitude\":\"\"}]', '[{\"address\":\" Jilah 19639, Saudi Arabia\",\"latitude\":\"\",\"longitude\":\"\"}]', '', '4:04 PM', '', '', 'Document', NULL, 'Yes', '70.0 ETB', 'Cash', '12 km', NULL, '', '', '0', '', 'xyz', 'Jun 30 2020 21:33', 0, 4, '\"[{\\\"address\\\":\\\"19625, Saudi Arabia\\\\n\\\",\\\"latitude\\\":24.25375684074993,\\\"longitude\\\":45.87038687578648}]\"', '', '', '', '2020-06-30', '16:04:13', 0, '2020-06-30 21:33', 1, '', 0, ''),
(20, '[{\"address\":\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.306016304209216,\"longitude\":55.368405841290944}]', '[{\"address\":\"304 19 A St - Al NahdaAl Nahda 2 - Dubai - United Arab Emirates\\n\",\"latitude\":25.289895042150363,\"longitude\":55.377014055848115,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Grocery', NULL, 'Yes', '55.0 ETB', 'Cash', '9 km', NULL, '', '', '0', '', '', 'Jul 1 2020 15:13', 2, 3, '\"[{\\\"address\\\":\\\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\\\n\\\",\\\"latitude\\\":25.30598,\\\"longitude\\\":55.368406}]\"', '', '', '', '2020-07-01', '11:13:20', 0, '2020-07-01 15:13', 3, '', 0, ''),
(18, '[{\"address\":\"Sharjah - United Arab Emirates\",\"latitude\":\"22.9331491\",\"longitude\":\"75.8826237\"}]', '[{\"address\":\"Ajman - United Arab Emirates\",\"latitude\":\"22.9331491\",\"longitude\":\"75.8826237\"}]', '1', '4:11 PM', '30/06/2020', '0522462818', 'Document', NULL, '', '', '', '', NULL, '', '', '', '', 'Document', '', 2, 0, '', '', '', '', '2020-06-30', '11:12:09', 0, '2020-06-30 11:12', 0, '', 0, ''),
(19, '[{\"address\":\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.30602054764062,\"longitude\":55.36840684711933}]', '[{\"address\":\"Dubai International Airport (DXB) - Dubai - United Arab Emirates\\n\",\"latitude\":25.25947723927254,\"longitude\":55.3523451089859,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Grocery', NULL, 'Yes', '125.0 ETB', 'Cash', '23 km', NULL, '', '', '0', '', '', 'Jul 1 2020 11:45', 2, 0, '', '', '', '', '2020-07-01', '07:45:52', 0, '2020-07-01 11:45', 0, '', 0, ''),
(21, '[{\"address\":\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.306019638333904,\"longitude\":55.36840919405221}]', '[{\"address\":\"Sharjah - United Arab Emirates\",\"latitude\":25.3284352,\"longitude\":55.5122577,\"reciver_name\":\"abdula\",\"reciver_number\":\"050 759 0800\"},{\"address\":\"Al Nahda St - Al NahdaAl Nahda 1 - Sharjah - United Arab Emirates\",\"latitude\":25.2978251,\"longitude\":55.3740256,\"reciver_name\":\"Aidi\",\"reciver_number\":\"+447496577210\"}]', '3', NULL, NULL, '', 'Tyres', NULL, 'Yes', '290.0 ETB', 'Cash', '56 km', NULL, '', '', '0', '', 'tesr', 'Jul 2 2020 17:40', 2, 5, '\"[{\\\"address\\\":\\\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\\\n\\\",\\\"latitude\\\":25.3059764,\\\"longitude\\\":55.3684079}]\"', '', '', '', '2020-07-02', '13:41:54', 0, '2020-07-02 17:40', 3, '', 0, ''),
(22, '[{\"address\":\"128 Al Nahda St - Al NahdaAl Nahda 1 - Sharjah - United Arab Emirates\\n\",\"latitude\":25.298595830888708,\"longitude\":55.36875519901514}]', '[{\"address\":\"35 10th St - Al Qusais 1Al Qusais - Dubai - United Arab Emirates\\n\",\"latitude\":25.280784659743656,\"longitude\":55.36996856331825,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Grocery', NULL, 'Yes', '50.0 ETB', 'Cash', '8 km', NULL, '', '', '0', '', '', 'Jul 4 2020 13:07', 2, 0, '', '', '', '', '2020-07-04', '09:14:52', 0, '2020-07-04 13:07', 0, '', 0, ''),
(23, '[{\"address\":\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.30601175767538,\"longitude\":55.36840282380581}]', '[{\"address\":\"Fly dubai - Dubai - United Arab Emirates\\n\",\"latitude\":25.255065935580244,\"longitude\":55.3512728959322,\"reciver_name\":\"Abdu\",\"reciver_number\":\"+971588065245\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '95.0 ETB', 'Cash', '17 km', NULL, 'Abdu', '+971588065245', '0', '+971588065245', 'documents', 'Jul 5 2020 17:38', 2, 3, '\"[{\\\"address\\\":\\\"Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\\\\n\\\",\\\"latitude\\\":25.3059206,\\\"longitude\\\":55.3687241}]\"', '', '', '', '2020-07-05', '13:39:22', 0, '2020-07-05 17:38', 3, '', 0, ''),
(24, '[{\"address\":\" Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.9329787803849,\"longitude\":75.88613267987967}]', '[{\"address\":\"Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.94802584985931,\"longitude\":75.88445127010345,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '15.0 ETB', 'Cash', '1 km', NULL, '', '', '0', '', '', 'Jul 6 2020 12:14', 3, 0, '', '', '', '', '2020-07-06', '06:48:05', 0, '2020-07-06 12:14', 0, '', 0, ''),
(25, '[{\"address\":\" Tarana, Madhya Pradesh 453771, India\\n\",\"latitude\":22.92287030123644,\"longitude\":75.8615653216839}]', '[{\"address\":\"Ujjain - Indore Rd, Tarana, Madhya Pradesh 453771, India\\n\",\"latitude\":22.93521430256284,\"longitude\":75.85384625941515,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Document', NULL, 'No', '40.0 ETB', 'Cash', '6 km', NULL, '', '', '0', '', '', 'Jul 6 2020 12:23', 3, 6, '\"[{\\\"address\\\":\\\" Tarana, Madhya Pradesh 453771, India\\\\n\\\",\\\"latitude\\\":22.9228702,\\\"longitude\\\":75.8615654}]\"', '', '', '', '2020-07-06', '06:54:20', 0, '2020-07-06 12:23', 3, '', 0, ''),
(26, '[{\"address\":\" Tarana, Madhya Pradesh 453771, India\\n\",\"latitude\":22.92287030123644,\"longitude\":75.8615653216839}]', '[{\"address\":\"Ujjain, Madhya Pradesh, India\",\"latitude\":23.1764665,\"longitude\":75.7885163,\"reciver_name\":\"Abhinav Seo\",\"reciver_number\":\"9752225415\"},{\"address\":\"Dewas, Madhya Pradesh, India\",\"latitude\":22.9675929,\"longitude\":76.0534454,\"reciver_name\":\"Abhishek\",\"reciver_number\":\"9617041225\"},{\"address\":\"Bhopal, Madhya Pradesh, India\",\"latitude\":23.2599333,\"longitude\":77.412615,\"reciver_name\":\"Ajay Shukla Delhi\",\"reciver_number\":\"+91 97701 94565\"}]', '1', NULL, NULL, '', 'Document', NULL, 'No', '1110.0 ETB', 'Cash', '220 km', NULL, '', '', '0', '', '', 'Jul 6 2020 12:26', 3, 0, '', '', '', '', '2020-07-06', '06:56:49', 0, '2020-07-06 12:26', 0, '', 0, ''),
(27, '[{\"address\":\" Tarana, Madhya Pradesh 453771, India\\n\",\"latitude\":22.92287030123644,\"longitude\":75.8615653216839}]', '[{\"address\":\"589, Kudana, Madhya Pradesh 453551, India\\n\",\"latitude\":22.960270930066613,\"longitude\":75.85555415600538,\"reciver_name\":\"Abhinav Seo\",\"reciver_number\":\"9752225415\"}]', '2', NULL, NULL, '', 'Tyres', NULL, 'No', '42.0 ETB', 'Cash', '8 km', NULL, 'Abhinav Seo', '9752225415', '2', '9752225415', '', 'Jul 6 2020 17:54', 5, 0, '', '', '', '', '2020-07-06', '12:25:41', 0, '2020-07-06 17:54', 0, '', 0, ''),
(28, '[{\"address\":\" Tarana, Madhya Pradesh 453771, India\\n\",\"latitude\":22.925050407276473,\"longitude\":75.86432565003633}]', '[{\"address\":\" Ugam Khedi, Madhya Pradesh 453771, India\\n\",\"latitude\":22.951179612742173,\"longitude\":75.8591828495264,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '35.0 ETB', 'Cash', '5 km', NULL, '', '', '0', '', 'cvh', 'Jul 6 2020 18:46', 6, 7, '\"[{\\\"address\\\":\\\" Tarana, Madhya Pradesh 453771, India\\\\n\\\",\\\"latitude\\\":22.9228702,\\\"longitude\\\":75.8615654}]\"', '', '', '', '2020-07-06', '13:17:20', 0, '2020-07-06 18:46', 3, '', 0, ''),
(29, '[{\"address\":\" Tarana, Madhya Pradesh 453771, India\\n\",\"latitude\":22.92287030123644,\"longitude\":75.8615653216839}]', '[{\"address\":\"Panod, Madhya Pradesh 453771, India\\n\",\"latitude\":22.991811961823124,\"longitude\":75.86437493562698,\"reciver_name\":\"Abhay\",\"reciver_number\":\"+919993349363\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '65.0 ETB', 'Cash', '11 km', NULL, 'Abhay', '+919993349363', '0', '+919993349363', 'xyz', 'Jul 6 2020 18:49', 6, 7, '\"[{\\\"address\\\":\\\" Tarana, Madhya Pradesh 453771, India\\\\n\\\",\\\"latitude\\\":22.9228702,\\\"longitude\\\":75.8615654}]\"', '', '', '', '2020-07-06', '13:20:56', 0, '2020-07-06 18:49', 3, '', 0, ''),
(30, '[{\"address\":\" Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.933476835689625,\"longitude\":75.88625404983759}]', '[{\"address\":\"Ujjain, Madhya Pradesh, India\",\"latitude\":23.1764665,\"longitude\":75.7885163,\"reciver_name\":\"Abhay\",\"reciver_number\":\"+919993349363\"},{\"address\":\"Dewas, Madhya Pradesh, India\",\"latitude\":22.9675929,\"longitude\":76.0534454,\"reciver_name\":\"Abhi Eq Chaat Puchka\",\"reciver_number\":\"+917995250921\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '345.0 ETB', 'Cash', '67 km', NULL, '', '', '0', '', 'xyz', 'Jul 6 2020 19:01', 6, 7, '\"[{\\\"address\\\":\\\" Guran, Madhya Pradesh 453771, India\\\\n\\\",\\\"latitude\\\":22.9334767,\\\"longitude\\\":75.8862541}]\"', '', '', '', '2020-07-06', '13:34:47', 0, '2020-07-06 19:01', 3, '', 0, ''),
(31, '[{\"address\":\" Guran, Madhya Pradesh 453771, India\\n\",\"latitude\":22.933476835689625,\"longitude\":75.88625404983759}]', '[{\"address\":\" Kudana, Madhya Pradesh 453771, India\\n\",\"latitude\":22.96578383347545,\"longitude\":75.87532605975865,\"reciver_name\":\"Abhinav Seo\",\"reciver_number\":\"9752225415\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '40.0 ETB', 'Cash', '6 km', NULL, 'Abhinav Seo', '9752225415', '0', '9752225415', 'xfd', 'Jul 6 2020 19:18', 6, 7, '\"[{\\\"address\\\":\\\" Guran, Madhya Pradesh 453771, India\\\\n\\\",\\\"latitude\\\":22.9257909,\\\"longitude\\\":75.8898844}]\"', '', '', '', '2020-07-06', '13:49:10', 0, '2020-07-06 19:18', 1, '', 0, ''),
(32, '[{\"address\":\" Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.306025700378534,\"longitude\":55.36840986460448}]', '[{\"address\":\"181 Al Nahda St - Al Qusais 1Al Qusais 2 - Dubai - United Arab Emirates\\n\",\"latitude\":25.265411081446093,\"longitude\":55.384801179170616,\"reciver_name\":\"abdula\",\"reciver_number\":\"050 759 0800\"}]', '1', NULL, NULL, '', 'Document', NULL, 'Yes', '65.0 ETB', 'Cash', '11 km', NULL, 'abdula', '050 759 0800', '0', '050 759 0800', 'dubai', 'Jul 7 2020 15:32', 2, 3, '', '', '', '', '2020-07-07', '11:33:11', 0, '2020-07-07 15:32', 3, '', 0, ''),
(33, '[{\"address\":\" Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.306019638333904,\"longitude\":55.36843165755272}]', '[{\"address\":\"Al Nahda 2,Next Ministry of Labour - Al NahdaAl Nahda 2 - Dubai - United Arab Emirates\\n\",\"latitude\":25.287256763744253,\"longitude\":55.37409380078315,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Grocery', NULL, 'Yes', '60.0 ETB', 'Cash', '10 km', NULL, '', '', '0', '', '', 'Jul 11 2020 17:09', 2, 3, '', '', '', '', '2020-07-11', '18:04:40', 0, '2020-07-11 17:09', 3, '', 0, ''),
(34, '[{\"address\":\" Darjikaradia, Madhya Pradesh 453771, India\\n\",\"latitude\":22.931859770341013,\"longitude\":75.88044539093971}]', '[{\"address\":\"Kudana, Madhya Pradesh 453771, India\\n\",\"latitude\":22.961048578562,\"longitude\":75.86591519415379,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', 'Grocery', NULL, 'Yes', '35.0 ETB', 'Cash', '5 km', NULL, '', '', '0', '', 'sd', 'Jul 13 2020 11:49', 3, 0, '', '', '', '', '2020-07-13', '06:19:55', 0, '2020-07-13 11:49', 0, '', 0, ''),
(35, '[{\"address\":\" Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.306019941436134,\"longitude\":55.368435010313995}]', '[{\"address\":\"[{\\\"address\\\":\\\"8 13 A St - Al TwarAl Twar 2 - Dubai - United Arab Emirates\\\\n\\\",\\\"latitude\\\":25.263670679509925,\\\"longitude\\\":55.37891507148743,\\\"reciver_name\\\":\\\"\\\",\\\"reciver_number\\\":\\\"\\\"}]\",\"latitude\":25.263670679509925,\"longitude\":55.37891507148743,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '2', NULL, NULL, '', '??? ???', NULL, 'No', '54.0 ETB', 'Cash', '11 km', NULL, '', '', '0', '', '', 'Jul 13 2020 20:24', 2, 0, '', '', '', '', '2020-07-13', '16:27:43', 0, '2020-07-13 20:24', 0, '', 0, ''),
(36, '[{\"address\":\" Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.305960230280235,\"longitude\":55.36847122013569}]', '[{\"address\":\" Al QusaisAl Qusais 1 - Dubai - United Arab Emirates\\n\",\"latitude\":25.278649447524305,\"longitude\":55.3721833974123,\"reciver_name\":\"abdulalaziz\",\"reciver_number\":\"+971555528213\"}]', '1', NULL, NULL, '', '????', NULL, 'Yes', '65.0 ETB', 'Cash', '11 km', NULL, 'abdulalaziz', '+971555528213', '0', '+971555528213', '?????\n????\n??????\n???', 'Jul 15 2020 06:04', 2, 3, '\"[{\\\"address\\\":\\\" Al Taawun - Sharjah - United Arab Emirates\\\\n\\\",\\\"latitude\\\":25.3059389,\\\"longitude\\\":55.3684851}]\"', '', '', '', '2020-07-15', '02:05:44', 0, '2020-07-15 06:04', 3, '', 0, ''),
(37, '[{\"address\":\" Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.305961745792175,\"longitude\":55.36847859621048}]', '[{\"address\":\"Dubai International Airport (DXB) - Dubai - United Arab Emirates\\n\",\"latitude\":25.261085499850804,\"longitude\":55.3577034920454,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', '???', NULL, 'No', '125.0 ETB', 'Cash', '23 km', NULL, '', '', '0', '', '', 'Jul 15 2020 06:08', 2, 3, '\"[{\\\"address\\\":\\\" Al Taawun - Sharjah - United Arab Emirates\\\\n\\\",\\\"latitude\\\":25.3059241,\\\"longitude\\\":55.3684744}]\"', '', '', '', '2020-07-15', '02:08:46', 0, '2020-07-15 06:08', 3, '', 0, ''),
(38, '[{\"address\":\" Al Taawun - Sharjah - United Arab Emirates\\n\",\"latitude\":25.306022972458486,\"longitude\":55.36846250295638}]', '[{\"address\":\"19 5th St - Al QusaisAl Qusais 2 - Dubai - United Arab Emirates\\n\",\"latitude\":25.26853434298202,\"longitude\":55.38335546851158,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '1', NULL, NULL, '', '??????', NULL, 'Yes', '70.0 ETB', 'Cash', '12 km', NULL, '', '', '0', '', '', 'Jul 22 2020 18:02', 2, 3, '\"[{\\\"address\\\":\\\" Al Taawun - Sharjah - United Arab Emirates\\\\n\\\",\\\"latitude\\\":25.3059804,\\\"longitude\\\":55.3684627}]\"', '', '', '', '2020-07-22', '14:03:22', 0, '2020-07-22 18:02', 3, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `booking_drop_location`
--

CREATE TABLE `booking_drop_location` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `reciver_name` varchar(255) NOT NULL,
  `reciver_number` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `is_booking_verify` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_drop_location`
--

INSERT INTO `booking_drop_location` (`id`, `booking_id`, `address`, `latitude`, `longitude`, `reciver_name`, `reciver_number`, `otp`, `is_booking_verify`) VALUES
(1, 1, ' Maharajganj, Madhya Pradesh 453771, India\n', '0', '0', '', '', '9214', 0),
(2, 2, 'Manglaya Sadak, Indore, Madhya Pradesh 453771, India\n', '22.960123982092', '75.881809964776', '', '', '2461', 0),
(3, 3, ' Panod, Madhya Pradesh 453771, India\n', '23.001137875653', '75.864902660251', '', '', '7493', 0),
(4, 4, 'Ujjain, Madhya Pradesh, India', '23.1764665', '75.7885163', 'Abhinav Seo', '9752225415', '7102', 0),
(5, 4, 'Dewas, Madhya Pradesh, India', '22.9675929', '76.0534454', 'Abhishek', '9617041225', '4580', 0),
(6, 4, 'Bhopal, Madhya Pradesh, India', '23.2599333', '77.412615', 'Ajay Shukla Delhi', '+91 97701 94565', '7534', 0),
(7, 5, ' Panod, Madhya Pradesh 453771, India\n', '23.006515792826', '75.857773683965', '', '', '9928', 0),
(8, 6, 'Ujjain, Madhya Pradesh, India', '23.1764665', '75.7885163', 'Abhinav Seo', '9752225415', '2275', 0),
(9, 6, 'Dewas, Madhya Pradesh, India', '22.9675929', '76.0534454', 'Abhishek', '9617041225', '3972', 0),
(10, 6, 'Bhopal, Madhya Pradesh, India', '23.2599333', '77.412615', 'Ajay Shukla Delhi', '+91 97701 94565', '6033', 0),
(11, 7, 'Wasit St - Mughaidir SuburbAl Khezamia - Sharjah - United Arab Emirates', '25.341868', '55.4318351', 'abdu', '+251944725933', '2753', 0),
(12, 7, 'Sharjah - Al Nahda - Sharjah - United Arab Emirates', '25.3012255', '55.3691873', 'abdulalaziz', '+971555528213', '8056', 0),
(13, 8, '20 15b St - Al TwarAl Twar 2 - Dubai - United Arab Emirates\n', '25.260526067733', '55.388594157994', '', '', '6250', 0),
(14, 9, 'Fly dubai - Dubai - United Arab Emirates\n', '25.256619977192', '55.349903963506', '', '', '6225', 0),
(15, 10, '60a 23d St - Garhoud - Dubai - United Arab Emirates\n', '25.241476851999', '55.355973802507', '', '', '1487', 0),
(16, 11, '[{\"address\":\"40 19b St - Al Qusais 1Al Qusais 2 - Dubai - United Arab Emirates\\n\",\"latitude\":0,\"longitude\":0,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '0', '0', '', '', '9553', 0),
(17, 12, 'Ajman - United Arab Emirates', '22.9331491', '75.8826237', '', '', '', 0),
(18, 13, 'Hail Saudi Arabia', '22.9331491', '75.8826237', '', '', '', 0),
(19, 14, '15514, Saudi Arabia\n', '25.369664075514', '45.360312536359', '', '', '9832', 0),
(20, 15, '40, Jilah 19636, Saudi Arabia\n', '24.346504348883', '45.826052315533', '', '', '4858', 0),
(21, 16, ' ????? 19639, Saudi Arabia\n', '24.34015337752', '45.840994901955', '', '', '6968', 0),
(22, 17, ' Jilah 19639, Saudi Arabia\n', '24.352679676537', '45.850539878011', '', '', '2227', 0),
(23, 18, 'Ajman - United Arab Emirates', '22.9331491', '75.8826237', '', '', '', 0),
(24, 19, 'Dubai International Airport (DXB) - Dubai - United Arab Emirates\n', '25.259477239273', '55.352345108986', '', '', '2003', 0),
(25, 20, '304 19 A St - Al NahdaAl Nahda 2 - Dubai - United Arab Emirates\n', '25.28989504215', '55.377014055848', '', '', '4302', 0),
(26, 21, 'Sharjah - United Arab Emirates', '25.3284352', '55.5122577', 'abdula', '050 759 0800', '3948', 0),
(27, 21, 'Al Nahda St - Al NahdaAl Nahda 1 - Sharjah - United Arab Emirates', '25.2978251', '55.3740256', 'Aidi', '+447496577210', '4901', 0),
(28, 22, '35 10th St - Al Qusais 1Al Qusais - Dubai - United Arab Emirates\n', '25.280784659744', '55.369968563318', '', '', '8811', 0),
(29, 23, 'Fly dubai - Dubai - United Arab Emirates\n', '25.25506593558', '55.351272895932', 'Abdu', '+971588065245', '6722', 0),
(30, 24, 'Guran, Madhya Pradesh 453771, India\n', '22.948025849859', '75.884451270103', '', '', '4839', 0),
(31, 25, 'Ujjain - Indore Rd, Tarana, Madhya Pradesh 453771, India\n', '22.935214302563', '75.853846259415', '', '', '4332', 0),
(32, 26, 'Ujjain, Madhya Pradesh, India', '23.1764665', '75.7885163', 'Abhinav Seo', '9752225415', '8904', 0),
(33, 26, 'Dewas, Madhya Pradesh, India', '22.9675929', '76.0534454', 'Abhishek', '9617041225', '7228', 0),
(34, 26, 'Bhopal, Madhya Pradesh, India', '23.2599333', '77.412615', 'Ajay Shukla Delhi', '+91 97701 94565', '9713', 0),
(35, 27, '589, Kudana, Madhya Pradesh 453551, India\n', '22.960270930067', '75.855554156005', 'Abhinav Seo', '9752225415', '9086', 0),
(36, 28, ' Ugam Khedi, Madhya Pradesh 453771, India\n', '22.951179612742', '75.859182849526', '', '', '6512', 0),
(37, 29, 'Panod, Madhya Pradesh 453771, India\n', '22.991811961823', '75.864374935627', 'Abhay', '+919993349363', '9596', 0),
(38, 30, 'Ujjain, Madhya Pradesh, India', '23.1764665', '75.7885163', 'Abhay', '+919993349363', '5510', 0),
(39, 30, 'Dewas, Madhya Pradesh, India', '22.9675929', '76.0534454', 'Abhi Eq Chaat Puchka', '+917995250921', '4078', 0),
(40, 31, ' Kudana, Madhya Pradesh 453771, India\n', '22.965783833475', '75.875326059759', 'Abhinav Seo', '9752225415', '3272', 0),
(41, 32, '181 Al Nahda St - Al Qusais 1Al Qusais 2 - Dubai - United Arab Emirates\n', '25.265411081446', '55.384801179171', 'abdula', '050 759 0800', '1215', 0),
(42, 33, 'Al Nahda 2,Next Ministry of Labour - Al NahdaAl Nahda 2 - Dubai - United Arab Emirates\n', '25.287256763744', '55.374093800783', '', '', '3613', 0),
(43, 34, 'Kudana, Madhya Pradesh 453771, India\n', '22.961048578562', '75.865915194154', '', '', '9441', 0),
(44, 35, '[{\"address\":\"8 13 A St - Al TwarAl Twar 2 - Dubai - United Arab Emirates\\n\",\"latitude\":25.263670679509925,\"longitude\":55.37891507148743,\"reciver_name\":\"\",\"reciver_number\":\"\"}]', '25.26367067951', '55.378915071487', '', '', '8767', 0),
(45, 36, ' Al QusaisAl Qusais 1 - Dubai - United Arab Emirates\n', '25.278649447524', '55.372183397412', 'abdulalaziz', '+971555528213', '7030', 0),
(46, 37, 'Dubai International Airport (DXB) - Dubai - United Arab Emirates\n', '25.261085499851', '55.357703492045', '', '', '7127', 0),
(47, 38, '19 5th St - Al QusaisAl Qusais 2 - Dubai - United Arab Emirates\n', '25.268534342982', '55.383355468512', '', '', '5766', 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking_notificaion`
--

CREATE TABLE `booking_notificaion` (
  `notification_id` int(11) NOT NULL,
  `paitent_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `vehicle_type` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `read_status` int(11) NOT NULL,
  `is_status` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_notificaion`
--

INSERT INTO `booking_notificaion` (`notification_id`, `paitent_id`, `doctor_id`, `booking_id`, `vehicle_type`, `title`, `message`, `read_status`, `is_status`, `date_time`) VALUES
(1, 4, 1, 2, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-06-30 00:16:50'),
(2, 4, 4, 2, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-06-30 00:16:50'),
(3, 4, 1, 3, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-06-30 00:36:29'),
(4, 4, 4, 3, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-06-30 00:36:29'),
(5, 4, 1, 4, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-06-30 00:46:45'),
(6, 4, 4, 4, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-06-30 00:46:45'),
(7, 4, 1, 5, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-06-30 00:56:23'),
(8, 4, 4, 5, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-06-30 00:56:23'),
(9, 4, 1, 6, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-06-30 00:58:51'),
(10, 4, 4, 6, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-06-30 00:58:51'),
(11, 2, 2, 7, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-06-30 04:11:41'),
(12, 2, 2, 7, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-06-30 04:11:41'),
(13, 2, 3, 7, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-06-30 04:11:41'),
(14, 2, 3, 7, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-06-30 04:11:41'),
(15, 2, 2, 8, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 12:43:07'),
(16, 2, 3, 8, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 12:43:07'),
(17, 2, 2, 9, 3, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 12:44:43'),
(18, 2, 2, 9, 3, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 12:44:43'),
(19, 2, 3, 9, 3, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 12:44:44'),
(20, 2, 3, 9, 3, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 12:44:44'),
(21, 2, 2, 10, 3, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-06-30 12:46:33'),
(22, 2, 3, 10, 3, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-06-30 12:46:33'),
(23, 2, 5, 10, 3, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-06-30 12:46:33'),
(24, 2, 2, 11, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 12:52:55'),
(25, 2, 3, 11, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 12:52:55'),
(26, 2, 5, 11, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 12:52:55'),
(27, 2, 1, 12, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-06-30 13:38:54'),
(28, 2, 4, 12, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 13:38:54'),
(29, 1, 1, 13, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-06-30 14:31:19'),
(30, 1, 4, 13, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 14:31:19'),
(31, 4, 4, 15, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 21:29:18'),
(32, 4, 4, 16, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 21:31:39'),
(33, 4, 4, 17, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-06-30 21:34:13'),
(34, 2, 1, 18, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-01 04:42:09'),
(35, 2, 2, 19, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-01 13:15:53'),
(36, 2, 2, 19, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-01 13:15:53'),
(37, 2, 3, 19, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-01 13:15:53'),
(38, 2, 3, 19, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-01 13:15:53'),
(39, 2, 5, 19, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-01 13:15:54'),
(40, 2, 5, 19, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-01 13:15:54'),
(41, 2, 2, 20, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-01 16:43:21'),
(42, 2, 2, 20, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-01 16:43:21'),
(43, 2, 3, 20, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-01 16:43:21'),
(44, 2, 3, 20, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-01 16:43:21'),
(45, 2, 5, 20, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-01 16:43:21'),
(46, 2, 5, 20, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-01 16:43:21'),
(47, 2, 2, 21, 3, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-02 19:11:55'),
(48, 2, 3, 21, 3, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-02 19:11:55'),
(49, 2, 5, 21, 3, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-02 19:11:55'),
(50, 2, 2, 22, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-04 14:44:52'),
(51, 2, 3, 22, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-04 14:44:53'),
(52, 2, 5, 22, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-04 14:44:53'),
(53, 2, 2, 23, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-05 19:09:23'),
(54, 2, 3, 23, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-05 19:09:23'),
(55, 2, 5, 23, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-05 19:09:23'),
(56, 3, 1, 24, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-06 12:18:05'),
(57, 3, 1, 25, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-06 12:24:20'),
(58, 3, 4, 25, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-06 12:24:20'),
(59, 3, 6, 25, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-06 12:24:21'),
(60, 3, 1, 26, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-06 12:26:50'),
(61, 3, 4, 26, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-06 12:26:50'),
(62, 3, 6, 26, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-06 12:26:50'),
(63, 5, 1, 27, 2, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-06 17:55:42'),
(64, 5, 4, 27, 2, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-06 17:55:42'),
(65, 5, 6, 27, 2, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-06 17:55:42'),
(66, 6, 1, 28, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-06 18:47:21'),
(67, 6, 4, 28, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-06 18:47:21'),
(68, 6, 6, 28, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-06 18:47:21'),
(69, 6, 7, 28, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-06 18:47:21'),
(70, 6, 1, 29, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-06 18:50:57'),
(71, 6, 4, 29, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-06 18:50:57'),
(72, 6, 6, 29, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-06 18:50:57'),
(73, 6, 7, 29, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-06 18:50:57'),
(74, 6, 1, 30, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-06 19:04:48'),
(75, 6, 4, 30, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-06 19:04:48'),
(76, 6, 6, 30, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-06 19:04:48'),
(77, 6, 7, 30, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-06 19:04:48'),
(78, 6, 1, 31, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-06 19:19:10'),
(79, 6, 4, 31, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-06 19:19:10'),
(80, 6, 6, 31, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-06 19:19:10'),
(81, 6, 7, 31, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-06 19:19:10'),
(82, 2, 2, 32, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-07 17:03:11'),
(83, 2, 3, 32, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-07 17:03:11'),
(84, 2, 5, 32, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-07 17:03:11'),
(85, 2, 2, 33, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-11 23:34:40'),
(86, 2, 3, 33, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-11 23:34:41'),
(87, 2, 5, 33, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-11 23:34:41'),
(88, 3, 1, 34, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-13 11:49:55'),
(89, 3, 4, 34, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-13 11:49:55'),
(90, 3, 6, 34, 1, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-13 11:49:56'),
(91, 3, 7, 34, 1, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-13 11:49:56'),
(92, 2, 2, 35, 2, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-13 21:57:43'),
(93, 2, 3, 35, 2, 'New Booking', 'You have received a New Booking Request', 1, 0, '2020-07-13 21:57:44'),
(94, 2, 5, 35, 2, 'New Booking', 'You have received a New Booking Request', 0, 0, '2020-07-13 21:57:44'),
(95, 2, 2, 36, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-15 07:35:44'),
(96, 2, 3, 36, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-15 07:35:44'),
(97, 2, 5, 36, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-15 07:35:44'),
(98, 2, 2, 37, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-15 07:38:46'),
(99, 2, 2, 37, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-15 07:38:46'),
(100, 2, 3, 37, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-15 07:38:47'),
(101, 2, 3, 37, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-15 07:38:47'),
(102, 2, 5, 37, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-15 07:38:47'),
(103, 2, 5, 37, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-15 07:38:47'),
(104, 2, 2, 38, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-22 19:33:22'),
(105, 2, 3, 38, 1, 'New Booking', 'You have received a New Booking Request', 1, 1, '2020-07-22 19:33:22'),
(106, 2, 5, 38, 1, 'New Booking', 'You have received a New Booking Request', 0, 1, '2020-07-22 19:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `iso2` char(2) DEFAULT NULL,
  `phonecode` varchar(255) DEFAULT NULL,
  `capital` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` tinyint(1) NOT NULL DEFAULT '1',
  `wikiDataId` varchar(255) DEFAULT NULL COMMENT 'Rapid API GeoDB Cities'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso3`, `iso2`, `phonecode`, `capital`, `currency`, `created_at`, `updated_at`, `flag`, `wikiDataId`) VALUES
(1, 'Afghanistan', 'AFG', 'AF', '93', 'Kabul', 'AFN', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q889'),
(2, 'Aland Islands', 'ALA', 'AX', '+358-18', 'Mariehamn', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(3, 'Albania', 'ALB', 'AL', '355', 'Tirana', 'ALL', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q222'),
(4, 'Algeria', 'DZA', 'DZ', '213', 'Algiers', 'DZD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q262'),
(5, 'American Samoa', 'ASM', 'AS', '+1-684', 'Pago Pago', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(6, 'Andorra', 'AND', 'AD', '376', 'Andorra la Vella', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q228'),
(7, 'Angola', 'AGO', 'AO', '244', 'Luanda', 'AOA', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q916'),
(8, 'Anguilla', 'AIA', 'AI', '+1-264', 'The Valley', 'XCD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(9, 'Antarctica', 'ATA', 'AQ', '', '', '', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(10, 'Antigua And Barbuda', 'ATG', 'AG', '+1-268', 'St. John\'s', 'XCD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q781'),
(11, 'Argentina', 'ARG', 'AR', '54', 'Buenos Aires', 'ARS', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q414'),
(12, 'Armenia', 'ARM', 'AM', '374', 'Yerevan', 'AMD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q399'),
(13, 'Aruba', 'ABW', 'AW', '297', 'Oranjestad', 'AWG', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(14, 'Australia', 'AUS', 'AU', '61', 'Canberra', 'AUD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q408'),
(15, 'Austria', 'AUT', 'AT', '43', 'Vienna', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q40'),
(16, 'Azerbaijan', 'AZE', 'AZ', '994', 'Baku', 'AZN', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q227'),
(17, 'Bahamas The', 'BHS', 'BS', '+1-242', 'Nassau', 'BSD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q778'),
(18, 'Bahrain', 'BHR', 'BH', '973', 'Manama', 'BHD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q398'),
(19, 'Bangladesh', 'BGD', 'BD', '880', 'Dhaka', 'BDT', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q902'),
(20, 'Barbados', 'BRB', 'BB', '+1-246', 'Bridgetown', 'BBD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q244'),
(21, 'Belarus', 'BLR', 'BY', '375', 'Minsk', 'BYR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q184'),
(22, 'Belgium', 'BEL', 'BE', '32', 'Brussels', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q31'),
(23, 'Belize', 'BLZ', 'BZ', '501', 'Belmopan', 'BZD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q242'),
(24, 'Benin', 'BEN', 'BJ', '229', 'Porto-Novo', 'XOF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q962'),
(25, 'Bermuda', 'BMU', 'BM', '+1-441', 'Hamilton', 'BMD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(26, 'Bhutan', 'BTN', 'BT', '975', 'Thimphu', 'BTN', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q917'),
(27, 'Bolivia', 'BOL', 'BO', '591', 'Sucre', 'BOB', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q750'),
(28, 'Bosnia and Herzegovina', 'BIH', 'BA', '387', 'Sarajevo', 'BAM', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q225'),
(29, 'Botswana', 'BWA', 'BW', '267', 'Gaborone', 'BWP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q963'),
(30, 'Bouvet Island', 'BVT', 'BV', '', '', 'NOK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(31, 'Brazil', 'BRA', 'BR', '55', 'Brasilia', 'BRL', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q155'),
(32, 'British Indian Ocean Territory', 'IOT', 'IO', '246', 'Diego Garcia', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(33, 'Brunei', 'BRN', 'BN', '673', 'Bandar Seri Begawan', 'BND', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q921'),
(34, 'Bulgaria', 'BGR', 'BG', '359', 'Sofia', 'BGN', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q219'),
(35, 'Burkina Faso', 'BFA', 'BF', '226', 'Ouagadougou', 'XOF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q965'),
(36, 'Burundi', 'BDI', 'BI', '257', 'Bujumbura', 'BIF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q967'),
(37, 'Cambodia', 'KHM', 'KH', '855', 'Phnom Penh', 'KHR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q424'),
(38, 'Cameroon', 'CMR', 'CM', '237', 'Yaounde', 'XAF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1009'),
(39, 'Canada', 'CAN', 'CA', '1', 'Ottawa', 'CAD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q16'),
(40, 'Cape Verde', 'CPV', 'CV', '238', 'Praia', 'CVE', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1011'),
(41, 'Cayman Islands', 'CYM', 'KY', '+1-345', 'George Town', 'KYD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(42, 'Central African Republic', 'CAF', 'CF', '236', 'Bangui', 'XAF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q929'),
(43, 'Chad', 'TCD', 'TD', '235', 'N\'Djamena', 'XAF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q657'),
(44, 'Chile', 'CHL', 'CL', '56', 'Santiago', 'CLP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q298'),
(45, 'China', 'CHN', 'CN', '86', 'Beijing', 'CNY', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q148'),
(46, 'Christmas Island', 'CXR', 'CX', '61', 'Flying Fish Cove', 'AUD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(47, 'Cocos (Keeling) Islands', 'CCK', 'CC', '61', 'West Island', 'AUD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(48, 'Colombia', 'COL', 'CO', '57', 'Bogota', 'COP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q739'),
(49, 'Comoros', 'COM', 'KM', '269', 'Moroni', 'KMF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q970'),
(50, 'Congo', 'COG', 'CG', '242', 'Brazzaville', 'XAF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q971'),
(51, 'Congo The Democratic Republic Of The', 'COD', 'CD', '243', 'Kinshasa', 'CDF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q974'),
(52, 'Cook Islands', 'COK', 'CK', '682', 'Avarua', 'NZD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q26988'),
(53, 'Costa Rica', 'CRI', 'CR', '506', 'San Jose', 'CRC', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q800'),
(54, 'Cote D\'Ivoire (Ivory Coast)', 'CIV', 'CI', '225', 'Yamoussoukro', 'XOF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1008'),
(55, 'Croatia (Hrvatska)', 'HRV', 'HR', '385', 'Zagreb', 'HRK', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q224'),
(56, 'Cuba', 'CUB', 'CU', '53', 'Havana', 'CUP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q241'),
(57, 'Cyprus', 'CYP', 'CY', '357', 'Nicosia', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q229'),
(58, 'Czech Republic', 'CZE', 'CZ', '420', 'Prague', 'CZK', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q213'),
(59, 'Denmark', 'DNK', 'DK', '45', 'Copenhagen', 'DKK', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q35'),
(60, 'Djibouti', 'DJI', 'DJ', '253', 'Djibouti', 'DJF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q977'),
(61, 'Dominica', 'DMA', 'DM', '+1-767', 'Roseau', 'XCD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q784'),
(62, 'Dominican Republic', 'DOM', 'DO', '+1-809 and 1-829', 'Santo Domingo', 'DOP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q786'),
(63, 'East Timor', 'TLS', 'TL', '670', 'Dili', 'USD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q574'),
(64, 'Ecuador', 'ECU', 'EC', '593', 'Quito', 'USD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q736'),
(65, 'Egypt', 'EGY', 'EG', '20', 'Cairo', 'EGP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q79'),
(66, 'El Salvador', 'SLV', 'SV', '503', 'San Salvador', 'USD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q792'),
(67, 'Equatorial Guinea', 'GNQ', 'GQ', '240', 'Malabo', 'XAF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q983'),
(68, 'Eritrea', 'ERI', 'ER', '291', 'Asmara', 'ERN', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q986'),
(69, 'Estonia', 'EST', 'EE', '372', 'Tallinn', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q191'),
(70, 'Ethiopia', 'ETH', 'ET', '251', 'Addis Ababa', 'ETB', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q115'),
(71, 'Falkland Islands', 'FLK', 'FK', '500', 'Stanley', 'FKP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(72, 'Faroe Islands', 'FRO', 'FO', '298', 'Torshavn', 'DKK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(73, 'Fiji Islands', 'FJI', 'FJ', '679', 'Suva', 'FJD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q712'),
(74, 'Finland', 'FIN', 'FI', '358', 'Helsinki', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q33'),
(75, 'France', 'FRA', 'FR', '33', 'Paris', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q142'),
(76, 'French Guiana', 'GUF', 'GF', '594', 'Cayenne', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(77, 'French Polynesia', 'PYF', 'PF', '689', 'Papeete', 'XPF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(78, 'French Southern Territories', 'ATF', 'TF', '', 'Port-aux-Francais', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(79, 'Gabon', 'GAB', 'GA', '241', 'Libreville', 'XAF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1000'),
(80, 'Gambia The', 'GMB', 'GM', '220', 'Banjul', 'GMD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1005'),
(81, 'Georgia', 'GEO', 'GE', '995', 'Tbilisi', 'GEL', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q230'),
(82, 'Germany', 'DEU', 'DE', '49', 'Berlin', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q183'),
(83, 'Ghana', 'GHA', 'GH', '233', 'Accra', 'GHS', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q117'),
(84, 'Gibraltar', 'GIB', 'GI', '350', 'Gibraltar', 'GIP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(85, 'Greece', 'GRC', 'GR', '30', 'Athens', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q41'),
(86, 'Greenland', 'GRL', 'GL', '299', 'Nuuk', 'DKK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(87, 'Grenada', 'GRD', 'GD', '+1-473', 'St. George\'s', 'XCD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q769'),
(88, 'Guadeloupe', 'GLP', 'GP', '590', 'Basse-Terre', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(89, 'Guam', 'GUM', 'GU', '+1-671', 'Hagatna', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(90, 'Guatemala', 'GTM', 'GT', '502', 'Guatemala City', 'GTQ', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q774'),
(91, 'Guernsey and Alderney', 'GGY', 'GG', '+44-1481', 'St Peter Port', 'GBP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(92, 'Guinea', 'GIN', 'GN', '224', 'Conakry', 'GNF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1006'),
(93, 'Guinea-Bissau', 'GNB', 'GW', '245', 'Bissau', 'XOF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1007'),
(94, 'Guyana', 'GUY', 'GY', '592', 'Georgetown', 'GYD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q734'),
(95, 'Haiti', 'HTI', 'HT', '509', 'Port-au-Prince', 'HTG', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q790'),
(96, 'Heard and McDonald Islands', 'HMD', 'HM', ' ', '', 'AUD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(97, 'Honduras', 'HND', 'HN', '504', 'Tegucigalpa', 'HNL', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q783'),
(98, 'Hong Kong S.A.R.', 'HKG', 'HK', '852', 'Hong Kong', 'HKD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(99, 'Hungary', 'HUN', 'HU', '36', 'Budapest', 'HUF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q28'),
(100, 'Iceland', 'ISL', 'IS', '354', 'Reykjavik', 'ISK', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q189'),
(101, 'India', 'IND', 'IN', '91', 'New Delhi', 'INR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q668'),
(102, 'Indonesia', 'IDN', 'ID', '62', 'Jakarta', 'IDR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q252'),
(103, 'Iran', 'IRN', 'IR', '98', 'Tehran', 'IRR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q794'),
(104, 'Iraq', 'IRQ', 'IQ', '964', 'Baghdad', 'IQD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q796'),
(105, 'Ireland', 'IRL', 'IE', '353', 'Dublin', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q27'),
(106, 'Israel', 'ISR', 'IL', '972', 'Jerusalem', 'ILS', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q801'),
(107, 'Italy', 'ITA', 'IT', '39', 'Rome', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q38'),
(108, 'Jamaica', 'JAM', 'JM', '+1-876', 'Kingston', 'JMD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q766'),
(109, 'Japan', 'JPN', 'JP', '81', 'Tokyo', 'JPY', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q17'),
(110, 'Jersey', 'JEY', 'JE', '+44-1534', 'Saint Helier', 'GBP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q785'),
(111, 'Jordan', 'JOR', 'JO', '962', 'Amman', 'JOD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q810'),
(112, 'Kazakhstan', 'KAZ', 'KZ', '7', 'Astana', 'KZT', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q232'),
(113, 'Kenya', 'KEN', 'KE', '254', 'Nairobi', 'KES', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q114'),
(114, 'Kiribati', 'KIR', 'KI', '686', 'Tarawa', 'AUD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q710'),
(115, 'Korea North\n', 'PRK', 'KP', '850', 'Pyongyang', 'KPW', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q423'),
(116, 'Korea South', 'KOR', 'KR', '82', 'Seoul', 'KRW', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q884'),
(117, 'Kuwait', 'KWT', 'KW', '965', 'Kuwait City', 'KWD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q817'),
(118, 'Kyrgyzstan', 'KGZ', 'KG', '996', 'Bishkek', 'KGS', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q813'),
(119, 'Laos', 'LAO', 'LA', '856', 'Vientiane', 'LAK', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q819'),
(120, 'Latvia', 'LVA', 'LV', '371', 'Riga', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q211'),
(121, 'Lebanon', 'LBN', 'LB', '961', 'Beirut', 'LBP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q822'),
(122, 'Lesotho', 'LSO', 'LS', '266', 'Maseru', 'LSL', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1013'),
(123, 'Liberia', 'LBR', 'LR', '231', 'Monrovia', 'LRD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1014'),
(124, 'Libya', 'LBY', 'LY', '218', 'Tripolis', 'LYD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1016'),
(125, 'Liechtenstein', 'LIE', 'LI', '423', 'Vaduz', 'CHF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q347'),
(126, 'Lithuania', 'LTU', 'LT', '370', 'Vilnius', 'LTL', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q37'),
(127, 'Luxembourg', 'LUX', 'LU', '352', 'Luxembourg', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q32'),
(128, 'Macau S.A.R.', 'MAC', 'MO', '853', 'Macao', 'MOP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(129, 'Macedonia', 'MKD', 'MK', '389', 'Skopje', 'MKD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q221'),
(130, 'Madagascar', 'MDG', 'MG', '261', 'Antananarivo', 'MGA', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1019'),
(131, 'Malawi', 'MWI', 'MW', '265', 'Lilongwe', 'MWK', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1020'),
(132, 'Malaysia', 'MYS', 'MY', '60', 'Kuala Lumpur', 'MYR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q833'),
(133, 'Maldives', 'MDV', 'MV', '960', 'Male', 'MVR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q826'),
(134, 'Mali', 'MLI', 'ML', '223', 'Bamako', 'XOF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q912'),
(135, 'Malta', 'MLT', 'MT', '356', 'Valletta', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q233'),
(136, 'Man (Isle of)', 'IMN', 'IM', '+44-1624', 'Douglas, Isle of Man', 'GBP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(137, 'Marshall Islands', 'MHL', 'MH', '692', 'Majuro', 'USD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q709'),
(138, 'Martinique', 'MTQ', 'MQ', '596', 'Fort-de-France', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(139, 'Mauritania', 'MRT', 'MR', '222', 'Nouakchott', 'MRO', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1025'),
(140, 'Mauritius', 'MUS', 'MU', '230', 'Port Louis', 'MUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1027'),
(141, 'Mayotte', 'MYT', 'YT', '262', 'Mamoudzou', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(142, 'Mexico', 'MEX', 'MX', '52', 'Mexico City', 'MXN', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q96'),
(143, 'Micronesia', 'FSM', 'FM', '691', 'Palikir', 'USD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q702'),
(144, 'Moldova', 'MDA', 'MD', '373', 'Chisinau', 'MDL', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q217'),
(145, 'Monaco', 'MCO', 'MC', '377', 'Monaco', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(146, 'Mongolia', 'MNG', 'MN', '976', 'Ulan Bator', 'MNT', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q711'),
(147, 'Montenegro', 'MNE', 'ME', '382', 'Podgorica', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q236'),
(148, 'Montserrat', 'MSR', 'MS', '+1-664', 'Plymouth', 'XCD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(149, 'Morocco', 'MAR', 'MA', '212', 'Rabat', 'MAD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1028'),
(150, 'Mozambique', 'MOZ', 'MZ', '258', 'Maputo', 'MZN', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1029'),
(151, 'Myanmar', 'MMR', 'MM', '95', 'Nay Pyi Taw', 'MMK', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q836'),
(152, 'Namibia', 'NAM', 'NA', '264', 'Windhoek', 'NAD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1030'),
(153, 'Nauru', 'NRU', 'NR', '674', 'Yaren', 'AUD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q697'),
(154, 'Nepal', 'NPL', 'NP', '977', 'Kathmandu', 'NPR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q837'),
(155, 'Netherlands Antilles', 'ANT', 'AN', '', '', '', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(156, 'Netherlands The', 'NLD', 'NL', '31', 'Amsterdam', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q55'),
(157, 'New Caledonia', 'NCL', 'NC', '687', 'Noumea', 'XPF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(158, 'New Zealand', 'NZL', 'NZ', '64', 'Wellington', 'NZD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q664'),
(159, 'Nicaragua', 'NIC', 'NI', '505', 'Managua', 'NIO', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q811'),
(160, 'Niger', 'NER', 'NE', '227', 'Niamey', 'XOF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1032'),
(161, 'Nigeria', 'NGA', 'NG', '234', 'Abuja', 'NGN', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1033'),
(162, 'Niue', 'NIU', 'NU', '683', 'Alofi', 'NZD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q34020'),
(163, 'Norfolk Island', 'NFK', 'NF', '672', 'Kingston', 'AUD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(164, 'Northern Mariana Islands', 'MNP', 'MP', '+1-670', 'Saipan', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(165, 'Norway', 'NOR', 'NO', '47', 'Oslo', 'NOK', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q20'),
(166, 'Oman', 'OMN', 'OM', '968', 'Muscat', 'OMR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q842'),
(167, 'Pakistan', 'PAK', 'PK', '92', 'Islamabad', 'PKR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q843'),
(168, 'Palau', 'PLW', 'PW', '680', 'Melekeok', 'USD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q695'),
(169, 'Palestinian Territory Occupied', 'PSE', 'PS', '970', 'East Jerusalem', 'ILS', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(170, 'Panama', 'PAN', 'PA', '507', 'Panama City', 'PAB', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q804'),
(171, 'Papua new Guinea', 'PNG', 'PG', '675', 'Port Moresby', 'PGK', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q691'),
(172, 'Paraguay', 'PRY', 'PY', '595', 'Asuncion', 'PYG', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q733'),
(173, 'Peru', 'PER', 'PE', '51', 'Lima', 'PEN', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q419'),
(174, 'Philippines', 'PHL', 'PH', '63', 'Manila', 'PHP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q928'),
(175, 'Pitcairn Island', 'PCN', 'PN', '870', 'Adamstown', 'NZD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(176, 'Poland', 'POL', 'PL', '48', 'Warsaw', 'PLN', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q36'),
(177, 'Portugal', 'PRT', 'PT', '351', 'Lisbon', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q45'),
(178, 'Puerto Rico', 'PRI', 'PR', '+1-787 and 1-939', 'San Juan', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(179, 'Qatar', 'QAT', 'QA', '974', 'Doha', 'QAR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q846'),
(180, 'Reunion', 'REU', 'RE', '262', 'Saint-Denis', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(181, 'Romania', 'ROU', 'RO', '40', 'Bucharest', 'RON', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q218'),
(182, 'Russia', 'RUS', 'RU', '7', 'Moscow', 'RUB', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q159'),
(183, 'Rwanda', 'RWA', 'RW', '250', 'Kigali', 'RWF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1037'),
(184, 'Saint Helena', 'SHN', 'SH', '290', 'Jamestown', 'SHP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(185, 'Saint Kitts And Nevis', 'KNA', 'KN', '+1-869', 'Basseterre', 'XCD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q763'),
(186, 'Saint Lucia', 'LCA', 'LC', '+1-758', 'Castries', 'XCD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q760'),
(187, 'Saint Pierre and Miquelon', 'SPM', 'PM', '508', 'Saint-Pierre', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(188, 'Saint Vincent And The Grenadines', 'VCT', 'VC', '+1-784', 'Kingstown', 'XCD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q757'),
(189, 'Saint-Barthelemy', 'BLM', 'BL', '590', 'Gustavia', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(190, 'Saint-Martin (French part)', 'MAF', 'MF', '590', 'Marigot', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(191, 'Samoa', 'WSM', 'WS', '685', 'Apia', 'WST', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q683'),
(192, 'San Marino', 'SMR', 'SM', '378', 'San Marino', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q238'),
(193, 'Sao Tome and Principe', 'STP', 'ST', '239', 'Sao Tome', 'STD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1039'),
(194, 'Saudi Arabia', 'SAU', 'SA', '966', 'Riyadh', 'SAR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q851'),
(195, 'Senegal', 'SEN', 'SN', '221', 'Dakar', 'XOF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1041'),
(196, 'Serbia', 'SRB', 'RS', '381', 'Belgrade', 'RSD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q403'),
(197, 'Seychelles', 'SYC', 'SC', '248', 'Victoria', 'SCR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1042'),
(198, 'Sierra Leone', 'SLE', 'SL', '232', 'Freetown', 'SLL', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1044'),
(199, 'Singapore', 'SGP', 'SG', '65', 'Singapur', 'SGD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q334'),
(200, 'Slovakia', 'SVK', 'SK', '421', 'Bratislava', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q214'),
(201, 'Slovenia', 'SVN', 'SI', '386', 'Ljubljana', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q215'),
(202, 'Solomon Islands', 'SLB', 'SB', '677', 'Honiara', 'SBD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q685'),
(203, 'Somalia', 'SOM', 'SO', '252', 'Mogadishu', 'SOS', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1045'),
(204, 'South Africa', 'ZAF', 'ZA', '27', 'Pretoria', 'ZAR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q258'),
(205, 'South Georgia', 'SGS', 'GS', '', 'Grytviken', 'GBP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(206, 'South Sudan', 'SSD', 'SS', '211', 'Juba', 'SSP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q958'),
(207, 'Spain', 'ESP', 'ES', '34', 'Madrid', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q29'),
(208, 'Sri Lanka', 'LKA', 'LK', '94', 'Colombo', 'LKR', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q854'),
(209, 'Sudan', 'SDN', 'SD', '249', 'Khartoum', 'SDG', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1049'),
(210, 'Suriname', 'SUR', 'SR', '597', 'Paramaribo', 'SRD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q730'),
(211, 'Svalbard And Jan Mayen Islands', 'SJM', 'SJ', '47', 'Longyearbyen', 'NOK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(212, 'Swaziland', 'SWZ', 'SZ', '268', 'Mbabane', 'SZL', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1050'),
(213, 'Sweden', 'SWE', 'SE', '46', 'Stockholm', 'SEK', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q34'),
(214, 'Switzerland', 'CHE', 'CH', '41', 'Berne', 'CHF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q39'),
(215, 'Syria', 'SYR', 'SY', '963', 'Damascus', 'SYP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q858'),
(216, 'Taiwan', 'TWN', 'TW', '886', 'Taipei', 'TWD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q865'),
(217, 'Tajikistan', 'TJK', 'TJ', '992', 'Dushanbe', 'TJS', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q863'),
(218, 'Tanzania', 'TZA', 'TZ', '255', 'Dodoma', 'TZS', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q924'),
(219, 'Thailand', 'THA', 'TH', '66', 'Bangkok', 'THB', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q869'),
(220, 'Togo', 'TGO', 'TG', '228', 'Lome', 'XOF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q945'),
(221, 'Tokelau', 'TKL', 'TK', '690', '', 'NZD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(222, 'Tonga', 'TON', 'TO', '676', 'Nuku\'alofa', 'TOP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q678'),
(223, 'Trinidad And Tobago', 'TTO', 'TT', '+1-868', 'Port of Spain', 'TTD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q754'),
(224, 'Tunisia', 'TUN', 'TN', '216', 'Tunis', 'TND', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q948'),
(225, 'Turkey', 'TUR', 'TR', '90', 'Ankara', 'TRY', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q43'),
(226, 'Turkmenistan', 'TKM', 'TM', '993', 'Ashgabat', 'TMT', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q874'),
(227, 'Turks And Caicos Islands', 'TCA', 'TC', '+1-649', 'Cockburn Town', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(228, 'Tuvalu', 'TUV', 'TV', '688', 'Funafuti', 'AUD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q672'),
(229, 'Uganda', 'UGA', 'UG', '256', 'Kampala', 'UGX', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q1036'),
(230, 'Ukraine', 'UKR', 'UA', '380', 'Kiev', 'UAH', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q212'),
(231, 'United Arab Emirates', 'ARE', 'AE', '971', 'Abu Dhabi', 'AED', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q878'),
(232, 'United Kingdom', 'GBR', 'GB', '44', 'London', 'GBP', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q145'),
(233, 'United States', 'USA', 'US', '1', 'Washington', 'USD', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q30'),
(234, 'United States Minor Outlying Islands', 'UMI', 'UM', '1', '', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(235, 'Uruguay', 'URY', 'UY', '598', 'Montevideo', 'UYU', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q77'),
(236, 'Uzbekistan', 'UZB', 'UZ', '998', 'Tashkent', 'UZS', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q265'),
(237, 'Vanuatu', 'VUT', 'VU', '678', 'Port Vila', 'VUV', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q686'),
(238, 'Vatican City State (Holy See)', 'VAT', 'VA', '379', 'Vatican City', 'EUR', '2018-07-20 14:41:03', '2019-08-02 19:38:22', 1, 'Q237'),
(239, 'Venezuela', 'VEN', 'VE', '58', 'Caracas', 'VEF', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q717'),
(240, 'Vietnam', 'VNM', 'VN', '84', 'Hanoi', 'VND', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q881'),
(241, 'Virgin Islands (British)', 'VGB', 'VG', '+1-284', 'Road Town', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(242, 'Virgin Islands (US)', 'VIR', 'VI', '+1-340', 'Charlotte Amalie', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(243, 'Wallis And Futuna Islands', 'WLF', 'WF', '681', 'Mata Utu', 'XPF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(244, 'Western Sahara', 'ESH', 'EH', '212', 'El-Aaiun', 'MAD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1, NULL),
(245, 'Yemen', 'YEM', 'YE', '967', 'Sanaa', 'YER', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q805'),
(246, 'Zambia', 'ZMB', 'ZM', '260', 'Lusaka', 'ZMK', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q953'),
(247, 'Zimbabwe', 'ZWE', 'ZW', '263', 'Harare', 'ZWL', '2018-07-20 14:41:03', '2019-08-02 19:38:23', 1, 'Q954');

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
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `coupon_name`, `description`, `discount`, `discount_type`, `coupon_applied_for`, `start_date`, `end_date`, `created_at`) VALUES
(2, 'xyz', 'promo', 'company promo', 20, '', 'shops', '2020-07-03', '2020-07-28', '2020-07-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE `Department` (
  `id` int(100) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`id`, `department_name`, `description`, `status`) VALUES
(2, 'Nuero', 'edited', 1),
(4, 'dental', 'dsfsfdsf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Doctors`
--

CREATE TABLE `Doctors` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fees` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `education` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(10) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `joning_date` varchar(255) NOT NULL,
  `assign_id` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `biography` longtext NOT NULL,
  `status` int(2) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `exp` int(11) NOT NULL,
  `hospital_id` varchar(100) NOT NULL,
  `Appointment_limit` int(11) NOT NULL,
  `Firebase_token` longtext NOT NULL,
  `otp` int(11) NOT NULL,
  `latitude` text NOT NULL,
  `longnitue` text NOT NULL,
  `user_type` int(25) NOT NULL,
  `Vehicle_Type` varchar(111) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `available_staus` int(11) NOT NULL DEFAULT '1' COMMENT '1=available,2=active',
  `online_status` int(11) NOT NULL DEFAULT '1',
  `device_token` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doctors`
--

INSERT INTO `Doctors` (`id`, `first_name`, `last_name`, `username`, `fees`, `email`, `password`, `dob`, `gender`, `address`, `Country`, `education`, `city`, `state`, `postal_code`, `joning_date`, `assign_id`, `phone_number`, `image`, `biography`, `status`, `profession`, `exp`, `hospital_id`, `Appointment_limit`, `Firebase_token`, `otp`, `latitude`, `longnitue`, `user_type`, `Vehicle_Type`, `vehicle_number`, `available_staus`, `online_status`, `device_token`) VALUES
(1, '', '', 'Shubham', 0, '', '', '', '', '', '', '', '', '', '', '2020-06-26 09:34:26', '', '6268506394', '', '', 0, '', 0, '', 0, 'f2VkOzX3TaqpxuIqqhaqiD:APA91bEi7ecu9fDJMksxyLTqnqcULiQS_yKP4zUIRK5tAJDUkZXxtW3s9qH-SKhu4ig-oPPSorcQeU6cWtGG_piIzIgkKM3ztMztqkpXrAVyvakfH9sIuTMuf9xsCGthfrYhA38HZn9J', 5190, '22.9305301', '75.885891', 0, '1', 'mp098765', 0, 1, ''),
(2, '', '', 'test', 0, '', '', '', '', '', '', '', '', '', '', '2020-06-26 23:37:46', '', '0523464112', '', '', 0, '', 0, '', 0, 'd_FfXQxwSbGJabyAaPFT9N:APA91bHndCxhEuHW_9BH7n4EHgTXvgn3SJaAQNlwzTB9U9j0PBAVvrKyt2-FSr0L5ahzrQCVdN2b3hxMk_SURNmmdEEAc6Dk7tYbrXbCdCKkYhr4GRIm0RSL9Vw3_Pl5D5j6PxUwfmle', 8097, '25.3059709', '55.3684607', 0, '3', 'AA-345678', 1, 1, ''),
(3, '', '', 'test', 0, '', '', '', '', '', '', '', '', '', '', '2020-06-27 20:25:17', '', '0921028180', '', '', 0, '', 0, '', 0, 'd_FfXQxwSbGJabyAaPFT9N:APA91bHndCxhEuHW_9BH7n4EHgTXvgn3SJaAQNlwzTB9U9j0PBAVvrKyt2-FSr0L5ahzrQCVdN2b3hxMk_SURNmmdEEAc6Dk7tYbrXbCdCKkYhr4GRIm0RSL9Vw3_Pl5D5j6PxUwfmle', 3409, '25.3059692', '55.3684608', 0, '1', 'bbb', 0, 1, ''),
(4, '', '', 'Abhay', 0, '', '', '', '', '', '', '', '', '', '', '2020-06-29 19:46:39', '', '9977937566', '', '', 0, '', 0, '', 0, 'd5nS9RMATVeP4KTMdHtzT1:APA91bEdptn2xxole7HMnZxWwLlyJF1DcJK2r4x2rQVSPu3jBPVHcNQG2OYsB2o7rLBkn2vmX_rCMPz9Necyo0hrtBga5fPZz705x91SQ0WR8g-mp1fDrWtVrTd5p6JULi1k1DCEnmRt', 3921, '22.9228702', '75.8615654', 0, '1', 'Mp09GH7898', 2, 1, ''),
(5, '', '', 'test ethiopia', 0, '', '', '', '', '', '', '', '', '', '', '2020-06-30 12:45:49', '', '0912609455', '', '', 0, '', 0, '', 0, 'd_FfXQxwSbGJabyAaPFT9N:APA91bHndCxhEuHW_9BH7n4EHgTXvgn3SJaAQNlwzTB9U9j0PBAVvrKyt2-FSr0L5ahzrQCVdN2b3hxMk_SURNmmdEEAc6Dk7tYbrXbCdCKkYhr4GRIm0RSL9Vw3_Pl5D5j6PxUwfmle', 5282, '25.305978', '55.3684122', 0, '3', 'AA-3-12345', 0, 1, ''),
(6, '', '', 'Satish', 0, 'satish@gmail.com', '', '01-07-2020', '?????', 'indore', '', '', '', '', '', '2020-07-06 12:20:14', '', '9179004542', '', '', 0, '', 0, '', 0, 'dr3FvPxSTt2cu1NTb6YKnM:APA91bGenHq2pTkpmhckJDHLPfAgnLLvg0svHuKsVafe3a4J2ZUFndFOTFIL6TP6IHmY0JsCBL8Z3f5PrDDFHCSFNSMXmHYa2jOF6mxjKMDlE7oRcqr8Y_aqD7HJoCfOcsrbO8ckgzMs', 9011, '22.9228702', '75.8615654', 0, '1', 'mp09786566', 0, 1, ''),
(7, '', '', 'Ravi', 0, 'ravi@gmail.com', '', '06-07-2015', 'male', 'indore', '', '', '', '', '', '2020-07-06 18:10:03', '', '9009009009', '', '', 0, '', 0, '', 0, 'fPUH4k8iSeePh_wdZmvUQI:APA91bG47yb6J9BQU_YthWTth5XCM4hWOW-_7Hq-ZoHmMW3m40Yj8q994yioZGh4p0abbluF28oUO0pFyx7B_hjyOMNqmpe9RCvHOXSptfoO7-hSGabIEBYMu8dY7jhty4_SiFQuvtM0', 1663, '22.9333399', '75.8524876', 0, '1', 'mp09GH7865', 2, 1, ''),
(8, '', '', 'vasim', 0, '', '', '', '', '', '', '', '', '', '', '2020-07-13 19:31:46', '', '7974072472', '', '', 0, '', 0, '', 0, 'fcEfwVH5TL6HZ_mpc41qLh:APA91bE_i3ZrroO2hjpB-bZbRADv40KdkBrORQL7v2ALexX6nxpY5_n5YDGJ2XabadJ58TeQdyCCkexQaPWZTjS_Lrmh-URzvbuy6yAszSrdSe5EFA5-Va-QK1ooLDzfPhVuD0Rpyfvs', 7262, '23.4602698', '75.4097064', 0, '1', 'mp13dy5566', 1, 1, ''),
(9, '', '', 'driver five', 0, '', '', '', '', '', '', '', '', '', '', '2020-07-23 17:54:01', '', '0923588225', '', '', 0, '', 0, '', 0, 'd_FfXQxwSbGJabyAaPFT9N:APA91bHndCxhEuHW_9BH7n4EHgTXvgn3SJaAQNlwzTB9U9j0PBAVvrKyt2-FSr0L5ahzrQCVdN2b3hxMk_SURNmmdEEAc6Dk7tYbrXbCdCKkYhr4GRIm0RSL9Vw3_Pl5D5j6PxUwfmle', 3185, '25.3059621', '55.3684603', 0, '', '3-12345', 1, 1, ''),
(10, '', '', 'druvr', 0, '', '', '', '', '', '', '', '', '', '', '2020-07-23 17:56:52', '', '0522462814', '', '', 0, '', 0, '', 0, 'd_FfXQxwSbGJabyAaPFT9N:APA91bHndCxhEuHW_9BH7n4EHgTXvgn3SJaAQNlwzTB9U9j0PBAVvrKyt2-FSr0L5ahzrQCVdN2b3hxMk_SURNmmdEEAc6Dk7tYbrXbCdCKkYhr4GRIm0RSL9Vw3_Pl5D5j6PxUwfmle', 7239, '25.3059665', '55.3684659', 0, '', 'A8', 1, 1, ''),
(11, '', '', 'driver f', 0, '', '', '', '', '', '', '', '', '', '', '2020-07-23 18:11:54', '', '0522346415', '', '', 0, '', 0, '', 0, 'd_FfXQxwSbGJabyAaPFT9N:APA91bHndCxhEuHW_9BH7n4EHgTXvgn3SJaAQNlwzTB9U9j0PBAVvrKyt2-FSr0L5ahzrQCVdN2b3hxMk_SURNmmdEEAc6Dk7tYbrXbCdCKkYhr4GRIm0RSL9Vw3_Pl5D5j6PxUwfmle', 7252, '25.3059827', '55.3684655', 0, '1', 'd', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `Doctors_availablity`
--

CREATE TABLE `Doctors_availablity` (
  `id` int(11) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doctors_availablity`
--

INSERT INTO `Doctors_availablity` (`id`, `from_date`, `to_date`, `doctor_id`, `status`) VALUES
(16, '1970-01-01 12:00:00', '1970-01-01 12:00:00', 7, 0),
(15, '2020-01-12 12:00:00', '2020-01-16 12:00:00', 7, 0),
(14, '2020-01-12 12:00:00', '2020-01-16 12:00:00', 7, 0),
(13, '2020-01-12 12:00:00', '2020-01-16 12:00:00', 7, 0),
(12, '2020-01-12 12:00:00', '2020-01-16 12:00:00', 7, 0),
(11, '2020-01-12 12:00:00', '2020-01-16 12:00:00', 7, 0),
(10, '2020-01-12 12:00:00', '2020-01-16 12:00:00', 7, 0),
(17, '2020-01-29 12:00:00', '2020-01-29 12:00:00', 7, 1),
(18, '2020-01-29 12:00:00', '2020-01-30 12:00:00', 7, 0),
(19, '2020-01-29 12:00:00', '2020-01-30 12:00:00', 7, 1),
(20, '2020-01-30 12:00:00', '2020-01-30 12:00:00', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Doctor_review`
--

CREATE TABLE `Doctor_review` (
  `id` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `comment` longtext NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doctor_review`
--

INSERT INTO `Doctor_review` (`id`, `doctor_id`, `patient_id`, `comment`, `rating`) VALUES
(3, 14, 34, 'hii ', 4),
(4, 14, 34, 'hii ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Doctor_schedule`
--

CREATE TABLE `Doctor_schedule` (
  `id` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `department_id` int(100) NOT NULL,
  `available` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `status` int(10) NOT NULL,
  `morning_start_time` varchar(100) NOT NULL,
  `morning_end_time` varchar(100) NOT NULL,
  `evening_start_time` varchar(100) NOT NULL,
  `evening_end_time` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `evening_morning_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doctor_schedule`
--

INSERT INTO `Doctor_schedule` (`id`, `doctor_id`, `department_id`, `available`, `start_time`, `end_time`, `status`, `morning_start_time`, `morning_end_time`, `evening_start_time`, `evening_end_time`, `from_date`, `to_date`, `evening_morning_status`) VALUES
(2, 12, 2, '[\"Monday\"]', '12.00', '6.00 AM', 1, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(4, 11, 2, '[\"Tuesday\",\"Wednesday\",\"Thursday\"]', '10:00 AM', '8:00 PM', 1, '8.00AM', '12.30AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(29, 7, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '1:03 PM', '1:03 PM', 1, '08:00 Am', '11:00 Am', '04:00 PM', '09:00 PM', '2020-03-07', '2020-03-08', '1,1'),
(49, 14, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '9:00 AM', '6:30 PM', 1, '8.00AM', '11.30AM', '6.00PM', '8.30PM', '2020-01-30', '2020-01-30', '1,1'),
(50, 57, 2, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Friday\"]', '5:00 PM', '11:00 PM', 1, '08.00 AM', '11.00AM', '05.00 PM', '09.00 PM', '2020-01-31', '2020-02-22', '1,1'),
(51, 42, 0, '[\"Tuesday\",\"Thursday\",\"Saturday\"]', '', '', 1, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(52, 43, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\",\"Sunday\"]', '', '', 1, '', '', '5.00PM', '9.00PM', '0000-00-00', '0000-00-00', '0,1'),
(53, 44, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '3:00 PM', '9:00 PM', 1, '', '', '5.00PM', '9.00PM', '0000-00-00', '0000-00-00', '1,1'),
(55, 11, 2, '[\"Tuesday\",\"Thursday\",\"Saturday\"]', '12:00 PM', '10:30 PM', 1, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(56, 13, 2, '[\"Monday\"]', '12:39 PM', '12:39 PM', 1, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(57, 46, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '', '', 1, '8.00AM', '11.00AM', '', '', '2020-02-23', '2020-02-23', '0,1'),
(58, 20, 2, '[\"Sunday\",\"Monday\",\"Tuesday\"]', '5:28 PM', '5:28 PM', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(59, 27, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(60, 28, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(61, 29, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(62, 30, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(63, 31, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(64, 32, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(65, 34, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(66, 35, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(67, 36, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,1'),
(68, 37, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(69, 38, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(70, 40, 2, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday...', '', '', 0, '8.00AM', '11.00AM', '', '', '0000-00-00', '0000-00-00', '1,0'),
(71, 57, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Friday\",\"Sunday\"]', '', '', 0, '08.00 AM', '11.00 AM', '04.00 PM', '07.00 PM', '2020-02-26', '2020-02-29', '1,1'),
(72, 53, 2, '[\"Sunday\",\"Monday\"]', '6:03 PM', '6:03 PM', 0, '8.00AM', '11.00AM', '', '', '2020-02-13', '2020-02-19', '1,1'),
(82, 58, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '', '', 1, '10:30 PM', '12.00 PM', '04.00 PM', '07.00 PM', '0000-00-00', '0000-00-00', '1,1'),
(83, 54, 0, '', '', '', 0, '08.00 AM', '11.00 AM', '04.00 PM', '07.00 PM', '0000-00-00', '0000-00-00', '1,1'),
(87, 55, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\",\"Sunday\"]', '', '', 0, '9:30AM', '07:00 AM', '02:00 PM', '9:30PM', '2020-02-29', '2020-03-01', '1,1'),
(88, 71, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\"]', '', '', 1, '08:00 Am', '10:00 Am', '07:00 PM', '22:00 PM', '2020-03-10', '2020-03-11', '1,1'),
(89, 57, 0, '', '', '', 0, '08.00 AM', '11.00 AM', '04.00 PM', '07.00 PM', '0000-00-00', '0000-00-00', '1,1'),
(90, 62, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\"]', '', '', 0, '11:00 AM', '12:00 PM', '04:00 PM', '8:00 PM', '2020-02-29', '2020-03-01', '1,1'),
(91, 63, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\",\"Sunday\"]', '', '', 1, '07:00 Am', '12:00 PM', '07:00 PM', '22:16 PM', '2020-03-07', '2020-03-08', '1,1'),
(92, 64, 0, '[\"Monday\",\"Wednesday\",\"Friday\"]', '', '', 0, '9:0AM', '12:0AM', '5:0PM', '9:0PM', '2020-03-02', '2020-03-05', '1,1'),
(93, 65, 0, '', '', '', 0, '', '', '', '', '2020-02-28', '2020-02-28', ''),
(94, 66, 0, '[\"Monday\",\"Wednesday\",\"Friday\",\"Sunday\"]', '', '', 1, '9:0PM', '1:0PM', '5:30PM', '10:46PM', '2020-03-02', '2020-03-08', '1,1'),
(95, 67, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Sunday\"]', '', '', 0, '9:0PM', '11:0PM', '', '', '2020-03-01', '2020-03-05', '1,0'),
(96, 70, 0, '[\"Monday\",\"Wednesday\",\"Friday\"]', '', '', 1, '', '', '', '', '0000-00-00', '0000-00-00', ''),
(97, 69, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '', '', 1, '9:12PM', '1:12PM', '3:37PM', '5:37PM', '2020-03-13', '2020-03-22', '1,1'),
(98, 72, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\"]', '', '', 0, '8:00 Am', '11:00 Am', '7:00 PM', '10:00 PM', '2020-03-14', '2020-03-15', '1,1'),
(99, 126, 0, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '', '', 1, '8:00 Am', '11:00 Am', '7:00 PM', '10:00 PM', '2020-03-25', '2020-03-25', '1,1');

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE `Feedback` (
  `id` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Feedback`
--

INSERT INTO `Feedback` (`id`, `doctor_id`, `patient_id`, `feedback`) VALUES
(1, 7, 20, 'best doctor'),
(2, 11, 20, 'best doctor'),
(3, 13, 20, 'best doctor'),
(4, 14, 20, 'best doctor'),
(5, 20, 20, 'best doctor'),
(6, 20, 20, 'best doctor'),
(7, 20, 21, 'best doctor'),
(8, 20, 23, 'best doctor');

-- --------------------------------------------------------

--
-- Table structure for table `Hospital`
--

CREATE TABLE `Hospital` (
  `id` int(100) NOT NULL,
  `hospital_name` varchar(100) NOT NULL,
  `hospital_address` varchar(100) NOT NULL,
  `hospital_service` longtext NOT NULL,
  `hospital_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Hospital`
--

INSERT INTO `Hospital` (`id`, `hospital_name`, `hospital_address`, `hospital_service`, `hospital_image`) VALUES
(6, 'Bombay Hospital', 'Bombay Hospital, Eastern Ring Road, Tulsi Nagar, Vijay Nagar, Indore, Madhya Pradesh, India', 'Considered the premier private trust hospital in India which was Set up in 1950s by the great philan', 'famous_hospital2.jpeg'),
(13, 'AIIMS, All India Institute of Medical Sciences', 'All India Institute of Medical Sciences. Ansari Nagar, New Delhi - 110029', 'Considered the premier private trust hospital in India which was Set up in 1930s by the great philan', 'famous_hospital1.jpeg'),
(19, 'King Edward Memorial Hospital', ' Acharya Donde Marg, Parel, Mumbai, Maharashtra 400012', 'Top 15 Best Hospitals in India – Most Reputed & TrustedHOSPITALS BY SANTOSH JULY 12, 2019 NO COMMENTS Share 5 Tweet Share Pin 5SHARES    Over a period of time, India has gained a global reputation as medical hub.', 'King_Edward_Memorial_Hospital.jpg'),
(20, 'Hiranandani Hospital', 'Hill Side Avenue, Hiranandani Gardens, Powai, Mumbai – 400 076. Phone: 022 25763300 / 3333 – 022 710', 'Top 15 Best Hospitals in India – Most Reputed & TrustedHOSPITALS BY SANTOSH JULY 12, 2019 NO COMMENTS Share 5 Tweet Share Pin 5SHARES    Over a period of time, India has gained a global reputation as medical hub, where patients get world class healthcare facilities, coming at affordable prices. Hospitals all over the country are equipped with trained doctors, medical staff and infrastructure, to help the patient get fit and fine with the best possible treatment.   Listed below are top 15 best hospitals in India:  15. Sir Ganga Ram Hospital Sir-Ganga-Ram-Hospital  This is a 675 bed multi-specialty hospital located in New Delhi. The Minimal Access Surgery Department of the hospital is the first of its kind in South Asia.', 'hirandani-hospital.jpg'),
(6, 'Bombay Hospital', 'Bombay Hospital, Eastern Ring Road, Tulsi Nagar, Vijay Nagar, Indore, Madhya Pradesh, India', 'Considered the premier private trust hospital in India which was Set up in 1950s by the great philan', 'famous_hospital2.jpeg'),
(13, 'AIIMS, All India Institute of Medical Sciences', 'All India Institute of Medical Sciences. Ansari Nagar, New Delhi - 110029', 'Considered the premier private trust hospital in India which was Set up in 1930s by the great philan', 'famous_hospital1.jpeg'),
(19, 'King Edward Memorial Hospital', ' Acharya Donde Marg, Parel, Mumbai, Maharashtra 400012', 'Top 15 Best Hospitals in India – Most Reputed & TrustedHOSPITALS BY SANTOSH JULY 12, 2019 NO COMMENTS Share 5 Tweet Share Pin 5SHARES    Over a period of time, India has gained a global reputation as medical hub.', 'King_Edward_Memorial_Hospital.jpg'),
(20, 'Hiranandani Hospital', 'Hill Side Avenue, Hiranandani Gardens, Powai, Mumbai – 400 076. Phone: 022 25763300 / 3333 – 022 710', 'Top 15 Best Hospitals in India – Most Reputed & TrustedHOSPITALS BY SANTOSH JULY 12, 2019 NO COMMENTS Share 5 Tweet Share Pin 5SHARES    Over a period of time, India has gained a global reputation as medical hub, where patients get world class healthcare facilities, coming at affordable prices. Hospitals all over the country are equipped with trained doctors, medical staff and infrastructure, to help the patient get fit and fine with the best possible treatment.   Listed below are top 15 best hospitals in India:  15. Sir Ganga Ram Hospital Sir-Ganga-Ram-Hospital  This is a 675 bed multi-specialty hospital located in New Delhi. The Minimal Access Surgery Department of the hospital is the first of its kind in South Asia.', 'hirandani-hospital.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Loan`
--

CREATE TABLE `Loan` (
  `id` int(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `loan_amount` int(100) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `loan_interest` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `patient_name` varchar(111) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Loan`
--

INSERT INTO `Loan` (`id`, `patient_id`, `loan_amount`, `from`, `to`, `loan_interest`, `status`, `patient_name`, `phone_number`) VALUES
(9, '', 25, '2020-01-31', '2020-02-02', 0, 1, 'gopal sharma', 2147483647),
(10, '', 25, '2020-01-31', '2020-03-02', 0, 0, 'rahul sharma', 2147483647),
(11, '', 55, '2020-01-31', '2021-01-31', 0, 2, 'mukesh dubey', 2147483647),
(16, '90', 12, '2020-12-12', '2020-04-12', 0, 1, 'gopal sharma', 2147483647),
(17, '20', 23000, '2020-12-05', '2020-12-06', 5, 0, 'gopal sharma', 2147483647),
(18, '20', 23000, '1970-01-01', '1970-01-01', 5, 2, 'gopal sharma', 2147483647),
(19, '20', 23000, '2020-12-05', '2020-12-06', 5, 0, 'gopal sharma', 2147483647),
(20, '36', 1000, '2020-02-22', '2020-02-22', 2020, 0, 'tedd', 2147483647),
(21, '36', 1000, '2020-02-22', '2020-02-22', 2020, 2, 'test', 2147483647),
(22, '36', 4800, '2020-02-23', '2020-02-25', 2020, 0, 'mikesh', 2147483647),
(23, '50', 1000, '2020-02-29', '2020-11-08', 2020, 2, 'bf', 2147483647),
(24, '36', 10000000, '2020-02-26', '2020-03-27', 2020, 0, 'THAKUR ', 2147483647),
(25, '36', 1000, '2020-02-29', '2020-02-29', 2020, 0, 'tkfkfktkrrk', 2147483647),
(26, '36', 1000, '2020-02-25', '2020-02-25', 2020, 2, 'fifjfk', 2147483647),
(27, '72', 1000, '2020-03-01', '2020-03-22', 2020, 0, 'THAKUR ', 2147483647),
(28, '72', 12, '2020-03-04', '2020-03-22', 2020, 0, 'munna singh', 2147483647),
(29, '73', 3500, '2020-02-29', '2020-03-28', 2020, 0, 'manash', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `Loan_amount`
--

CREATE TABLE `Loan_amount` (
  `id` int(100) NOT NULL,
  `loan_amount` int(100) NOT NULL,
  `loan_intrest` int(10) NOT NULL,
  `weekly_payment` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Loan_amount`
--

INSERT INTO `Loan_amount` (`id`, `loan_amount`, `loan_intrest`, `weekly_payment`) VALUES
(1, 1000, 5, 200),
(2, 2000, 5, 200),
(3, 3500, 6, 300),
(4, 4800, 6, 400),
(5, 5200, 6, 400),
(6, 6500, 6, 400),
(7, 7000, 6, 400),
(8, 12, 3, 1),
(9, 10000000, 50, 1000),
(10, 10000000, 50, 1000),
(11, 10000000, 50, 1000),
(12, 10000000, 34, 12000),
(13, 34000, 35, 1200),
(14, 34000, 35, 1200),
(15, 34000, 35, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `latitude` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `location_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `location_info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vehicle_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vehicle_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `driver_id`, `latitude`, `longitude`, `location_name`, `location_info`, `vehicle_type`, `vehicle_icon`, `status`) VALUES
(1, 1, '24.774265', '46.738586', 'Riyadh', 'Riyadh, Saudi Arabia', '1', 'https://alphawizz.com/SmartParking/assets/img/bike.png', 1),
(2, 3, '25.3059804', '55.3684627', '', ' Al Taawun - Sharjah - United Arab Emirates\n', '1', 'https://alphawizz.com/SmartParking/assets/img/bike.png', 1),
(3, 4, '24.25375684074993', '45.87038687578648', '', '19625, Saudi Arabia\n', '1', 'https://alphawizz.com/SmartParking/assets/img/bike.png', 1),
(4, 5, '25.3059764', '55.3684079', '', 'Unnamed Road - Al Taawun - Sharjah - United Arab Emirates\n', '3', 'https://alphawizz.com/SmartParking/assets/img/mark.png', 1),
(5, 6, '22.9228702', '75.8615654', '', ' Tarana, Madhya Pradesh 453771, India\n', '1', 'https://alphawizz.com/SmartParking/assets/img/bike.png', 1),
(6, 7, '22.9257909', '75.8898844', '', ' Guran, Madhya Pradesh 453771, India\n', '1', 'https://alphawizz.com/SmartParking/assets/img/bike.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Notification`
--

CREATE TABLE `Notification` (
  `notification_id` int(100) NOT NULL,
  `user_type` int(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `appointment_id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `notification` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `read_status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Notification`
--

INSERT INTO `Notification` (`notification_id`, `user_type`, `user_id`, `doctor_id`, `appointment_id`, `title`, `notification`, `status`, `date_time`, `read_status`, `created`) VALUES
(1, 0, 4, 4, 2, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-06-30 00:17:08', 1, '2020-06-29 18:47:58'),
(2, 0, 0, 4, 2, 'Ride End', 'Your Ride is End', 3, '2020-06-30 00:34:48', 0, '2020-06-29 19:04:48'),
(3, 0, 0, 4, 3, 'Ride End', 'Your Ride is End', 3, '2020-06-30 00:40:55', 0, '2020-06-29 19:10:55'),
(4, 0, 0, 4, 3, 'Ride End', 'Your Ride is End', 3, '2020-06-30 00:42:55', 0, '2020-06-29 19:12:55'),
(5, 0, 0, 4, 3, 'Ride End', 'Your Ride is End', 3, '2020-06-30 00:46:15', 0, '2020-06-29 19:16:15'),
(6, 0, 4, 4, 4, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-06-30 00:47:24', 1, '2020-06-29 19:17:45'),
(7, 0, 0, 4, 4, 'Ride End', 'Your Ride is End', 3, '2020-06-30 00:48:09', 0, '2020-06-29 19:18:09'),
(8, 0, 4, 4, 5, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-06-30 00:57:35', 1, '2020-06-29 19:28:00'),
(9, 0, 0, 4, 5, 'Ride End', 'Your Ride is End', 3, '2020-06-30 00:59:34', 0, '2020-06-29 19:29:34'),
(10, 0, 4, 4, 6, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-06-30 00:59:47', 1, '2020-06-29 19:30:11'),
(11, 0, 2, 3, 7, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-06-30 04:12:09', 1, '2020-06-29 22:42:19'),
(12, 0, 0, 1, 2, 'Ride End', 'Your Ride is End', 3, '2020-06-30 11:49:38', 0, '2020-06-30 06:19:38'),
(13, 0, 2, 5, 10, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-06-30 13:28:41', 1, '2020-06-30 11:46:07'),
(14, 0, 0, 5, 10, 'Ride End', 'Your Ride is End', 3, '2020-06-30 13:32:03', 0, '2020-06-30 08:02:03'),
(15, 0, 0, 4, 6, 'Ride End', 'Your Ride is End', 3, '2020-06-30 15:57:11', 0, '2020-06-30 10:27:11'),
(16, 0, 0, 3, 7, 'Ride End', 'Your Ride is End', 3, '2020-06-30 17:16:15', 0, '2020-06-30 11:46:15'),
(17, 0, 4, 4, 17, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-06-30 21:34:42', 1, '2020-07-06 04:47:04'),
(18, 0, 2, 3, 20, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-01 16:45:38', 1, '2020-07-02 13:40:43'),
(19, 0, 0, 3, 20, 'Ride End', 'Your Ride is End', 3, '2020-07-01 16:49:23', 0, '2020-07-01 11:19:23'),
(20, 0, 2, 5, 21, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-02 19:12:24', 1, '2020-07-03 10:18:32'),
(21, 0, 0, 5, 21, 'Ride End', 'Your Ride is End', 3, '2020-07-02 19:14:55', 0, '2020-07-02 13:44:55'),
(22, 0, 2, 3, 23, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-05 19:10:27', 1, '2020-07-06 14:17:13'),
(23, 0, 3, 6, 25, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-06 12:24:44', 1, '2020-07-06 06:54:57'),
(24, 0, 0, 6, 25, 'Ride End', 'Your Ride is End', 3, '2020-07-06 12:25:09', 0, '2020-07-06 06:55:09'),
(25, 0, 6, 7, 28, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-06 18:49:25', 1, '2020-07-06 13:19:40'),
(26, 0, 0, 7, 28, 'Ride End', 'Your Ride is End', 3, '2020-07-06 18:51:27', 0, '2020-07-06 13:21:27'),
(27, 0, 6, 7, 29, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-06 18:51:37', 1, '2020-07-06 13:22:22'),
(28, 0, 0, 7, 29, 'Ride End', 'Your Ride is End', 3, '2020-07-06 18:52:10', 0, '2020-07-06 13:22:10'),
(29, 0, 6, 7, 30, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-06 19:12:11', 1, '2020-07-06 13:46:42'),
(30, 0, 0, 7, 30, 'Ride End', 'Your Ride is End', 3, '2020-07-06 19:20:02', 0, '2020-07-06 13:50:02'),
(31, 0, 6, 7, 31, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-06 19:20:17', 1, '2020-07-06 13:53:07'),
(32, 0, 0, 3, 23, 'Ride End', 'Your Ride is End', 3, '2020-07-07 17:03:36', 0, '2020-07-07 11:33:36'),
(33, 0, 2, 3, 32, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-07 17:04:11', 1, '2020-07-07 11:35:16'),
(34, 0, 0, 3, 32, 'Ride End', 'Your Ride is End', 3, '2020-07-07 17:05:22', 0, '2020-07-07 11:35:22'),
(35, 0, 2, 3, 33, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-11 23:35:00', 1, '2020-07-11 18:05:12'),
(36, 0, 0, 3, 33, 'Ride End', 'Your Ride is End', 3, '2020-07-11 23:35:37', 0, '2020-07-11 18:05:37'),
(37, 0, 2, 3, 36, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-15 07:37:31', 1, '2020-07-15 02:07:48'),
(38, 0, 0, 3, 36, 'Ride End', 'Your Ride is End', 3, '2020-07-15 07:38:24', 0, '2020-07-15 02:08:24'),
(39, 0, 0, 3, 36, 'Ride End', 'Your Ride is End', 3, '2020-07-15 07:38:30', 0, '2020-07-15 02:08:30'),
(40, 0, 2, 3, 37, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-15 07:39:02', 1, '2020-07-15 18:33:01'),
(41, 0, 0, 3, 37, 'Ride End', 'Your Ride is End', 3, '2020-07-16 00:03:13', 0, '2020-07-15 18:33:13'),
(42, 0, 2, 3, 38, 'Booking Accepted', 'Your Booking is Accepted', 1, '2020-07-22 19:34:12', 1, '2020-07-22 14:04:31'),
(43, 0, 0, 3, 38, 'Ride End', 'Your Ride is End', 3, '2020-07-22 19:34:23', 0, '2020-07-22 14:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `Patients`
--

CREATE TABLE `Patients` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(10) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `Firebase_token` longtext NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Patients`
--

INSERT INTO `Patients` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `dob`, `gender`, `disease`, `address`, `Country`, `city`, `state`, `postal_code`, `phone_number`, `vehicle_number`, `image`, `status`, `Firebase_token`, `otp`) VALUES
(1, '', '', 'Gopal', 'gopal@gmail.com', '', '23-06-2015', 'Male', '', 'Indore', '', '', '', '', '7440498598', '', 'Screenshot_20200616-214117_Google_Play_Store.jpg', 0, '', 5847),
(2, '', '', 'test', '', '', '', '', '', '', '', '', '', '', '0522462818', '', '', 0, 'erQ6IXDoTE601QUvTh2Kem:APA91bEGWfv_1A-9jT5CB432hkxYXsqbxUPeEKmKTL5Zne3gxxWCJu2OleErxL8x5PQrNoHiy7xl4gA-6UMssLuPu3EyU-7FUy9_kUCaRTtJbGDu4vquacQ_YmSa8BhVjA13zPAGQJMY', 8552),
(3, '', '', 'Rahul', 'rahul@gmail.com', '', '10-06-2020', 'Female', '', 'indore', '', '', '', '', '9907898654', '', 'images_(7).jpeg', 0, 'dEOZplmGR8SMWi7ImsdjEv:APA91bF187QMJbB1mQhLBU5rCYUVbIM91eP5IEAb9d3OSJnQtzmgR-JNe-Bosn0yNInOJfEDqPtVUJS3KUGyNdyCzBCYm2VA6hXsiIgmYJyvJBZYw2lq7D6WS3xDRdxsnxzpd8Q-TO_f', 6650),
(4, '', '', 'Aaryan', '', '', '', '', '', '', '', '', '', '', '7869393241', '', '', 0, 'fmj8FeOBTHSxOUD8OeWi_S:APA91bGBm0tcUVX5pHWza_Q8YaQDaSIVu0MCRx40tgqiyj7vTbTlee7k9HTpbCddlQY9nE6VdXM5BLkpywuESEuerMHRYRZH9UP1W0vi_NSpA-3rcnj2yS7nB_G8LRml76Amonu70lQk', 4565),
(5, '', '', 'Babu', 'babu@gmail.com', '', '06-07-2014', 'male', '', 'indore', '', '', '', '', '8526539653', '', '', 0, 'd1AUykX9Rp27JxUUnPXQpQ:APA91bGOHAivLVBgDY_3xtli9h_laslJEXtd4Cr29Od7Soa-41C1-MG99yNb38Z0uOiZAVC5vFWOXwd_y2WR9nrhhnO-0C6Auqr53RP6UASssluDV6u7vh47ghGMrCTs0ZlEZGLwSZ1b', 3316),
(6, '', '', 'Kapil', 'kapil@gmail.com', '', '06-07-2015', 'male', '', 'Bhopal', '', '', '', '', '9876543217', '', '', 0, 'eBpain9eQ5CqisnypTcPVD:APA91bHLyvUJ3iuR-9AOQqYg94snwg3mY5bKuRGz0vVj5Sedp-PiyDqD3i23r_SqqrhVo3Ubn-_PCkXYc-vnZEVjv0QX_Cq6AYCKTs5rgq5fNzdXL6DeywLh9RbzomaJbMMtU15duBYh', 6172),
(7, '', '', 'wasim', '', '', '', '', '', '', '', '', '', '', '7974072472', '', '', 0, 'eXmjS97TR2OZWoZa6q-707:APA91bG-SkvSZpI7ZErKogvdBQS6sAf2K6tjLjf4bES5nk9sQm6t4u6ihe6_BEk0xn6AjkDb1F4NLqrg3R3ozo-ZMxZYTDIr8_dmdAOON-ptfXJohrSIgTjTqiDDLGquJ9_DFj6wM4Xj', 7233);

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `content`, `date`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '2020-08-04 13:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `english_name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`, `english_name`, `date_created`, `date_updated`, `status`, `cat_id`) VALUES
(1, 'አስቤዛ', 'Grocery', '2020-04-23 00:00:00', '2020-07-13 09:04:14', 1, 1),
(2, 'ዶኪዩመንት', 'Document', '2020-04-23 00:00:00', '2020-07-13 09:04:21', 1, 1),
(3, 'ምግብ', 'Food', '2020-04-23 00:00:00', '2020-07-13 09:04:27', 1, 1),
(4, 'ትናንሽ እቃ', 'Small item ', '2020-04-23 00:00:00', '2020-07-13 09:04:33', 1, 1),
(5, 'ስፔርፓርት', 'Sparepart', '2020-04-23 00:00:00', '2020-07-13 09:04:38', 1, 1),
(6, 'ሌሎች', 'Other', '2020-04-23 00:00:00', '2020-07-13 09:04:44', 1, 1),
(7, 'የቤት ቅየራ', 'Housemove', '2020-04-23 00:00:00', '2020-07-13 09:04:51', 1, 2),
(8, 'ጎማ', 'Tyre', '2020-04-23 00:00:00', '2020-07-13 09:04:59', 1, 2),
(9, 'ስፔርፓርት', 'Sparepart', '2020-04-23 00:00:00', '2020-07-13 09:05:11', 1, 2),
(10, 'ፈርኒቸር', 'Furniture', '2020-04-23 00:00:00', '2020-07-13 09:05:18', 1, 2),
(11, 'ኤሌክትሮኒክስ', 'Electronics', '2020-04-23 00:00:00', '2020-07-13 09:05:24', 1, 2),
(12, 'Other', '', '2020-04-23 00:00:00', '2020-04-23 10:50:23', 1, 2),
(13, 'Housemove', '', '2020-04-23 00:00:00', '2020-04-23 10:50:28', 1, 3),
(14, 'Tyres', '', '2020-04-23 00:00:00', '2020-04-23 10:50:32', 1, 3),
(15, 'Spareparts', '', '2020-04-23 00:00:00', '2020-04-23 10:50:37', 1, 3),
(16, 'Electronics', '', '2020-04-23 00:00:00', '2020-04-23 10:50:41', 1, 3),
(17, 'Furniture', '', '2020-04-23 00:00:00', '2020-04-23 10:50:44', 1, 3),
(18, 'Other', '', '2020-04-23 00:00:00', '2020-04-23 10:50:48', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_category`
--

CREATE TABLE `vehicle_category` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pricing` varchar(255) NOT NULL,
  `commission` varchar(255) NOT NULL,
  `price_per_distance` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_category`
--

INSERT INTO `vehicle_category` (`id`, `name`, `pricing`, `commission`, `price_per_distance`, `date_created`, `date_updated`, `status`) VALUES
(1, 'Motorcycle', '500', '10', '5 ', '2020-04-23 00:00:00', '2020-06-11 09:26:23', 1),
(2, 'Pickup', '200', '10', '4', '2020-04-23 00:00:00', '2020-05-26 07:36:42', 1),
(3, 'Truck', '1000', '10', '5 ', '2020-04-23 00:00:00', '2020-05-29 13:58:30', 1),
(8, 'minivan', '500', '10', '5', '0000-00-00 00:00:00', '2020-06-11 09:26:11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `Banner`
--
ALTER TABLE `Banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_drop_location`
--
ALTER TABLE `booking_drop_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_notificaion`
--
ALTER TABLE `booking_notificaion`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Doctors`
--
ALTER TABLE `Doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Doctors_availablity`
--
ALTER TABLE `Doctors_availablity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Doctor_review`
--
ALTER TABLE `Doctor_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Doctor_schedule`
--
ALTER TABLE `Doctor_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Loan`
--
ALTER TABLE `Loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Loan_amount`
--
ALTER TABLE `Loan_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Notification`
--
ALTER TABLE `Notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `Patients`
--
ALTER TABLE `Patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `booking_drop_location`
--
ALTER TABLE `booking_drop_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `booking_notificaion`
--
ALTER TABLE `booking_notificaion`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Doctors`
--
ALTER TABLE `Doctors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Notification`
--
ALTER TABLE `Notification`
  MODIFY `notification_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `Patients`
--
ALTER TABLE `Patients`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
