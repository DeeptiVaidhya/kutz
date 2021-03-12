-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 08, 2020 at 08:42 PM
-- Server version: 5.7.30-0ubuntu0.16.04.1
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobolytics`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `name` varchar(20) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `symbol` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`name`, `code`, `symbol`) VALUES
('Leke', 'ALL', 'Lek'),
('Dollars', 'USD', '$'),
('Afghanis', 'AFN', '؋'),
('Pesos', 'ARS', '$'),
('Guilders', 'AWG', 'ƒ'),
('Dollars', 'AUD', '$'),
('New Manats', 'AZN', 'ман'),
('Dollars', 'BSD', '$'),
('Dollars', 'BBD', '$'),
('Rubles', 'BYR', 'p.'),
('Euro', 'EUR', '€'),
('Dollars', 'BZD', 'BZ$'),
('Dollars', 'BMD', '$'),
('Bolivianos', 'BOB', '$b'),
('Convertible Marka', 'BAM', 'KM'),
('Pula', 'BWP', 'P'),
('Leva', 'BGN', 'лв'),
('Reais', 'BRL', 'R$'),
('Pounds', 'GBP', '£'),
('Dollars', 'BND', '$'),
('Riels', 'KHR', '៛'),
('Dollars', 'CAD', '$'),
('Dollars', 'KYD', '$'),
('Pesos', 'CLP', '$'),
('Yuan Renminbi', 'CNY', '¥'),
('Pesos', 'COP', '$'),
('Colón', 'CRC', '₡'),
('Kuna', 'HRK', 'kn'),
('Pesos', 'CUP', '₱'),
('Koruny', 'CZK', 'Kč'),
('Kroner', 'DKK', 'kr'),
('Pesos', 'DOP', 'RD$'),
('Dollars', 'XCD', '$'),
('Pounds', 'EGP', '£'),
('Colones', 'SVC', '$'),
('Pounds', 'FKP', '£'),
('Dollars', 'FJD', '$'),
('Cedis', 'GHC', '¢'),
('Pounds', 'GIP', '£'),
('Quetzales', 'GTQ', 'Q'),
('Pounds', 'GGP', '£'),
('Dollars', 'GYD', '$'),
('Lempiras', 'HNL', 'L'),
('Dollars', 'HKD', '$'),
('Forint', 'HUF', 'Ft'),
('Kronur', 'ISK', 'kr'),
('Rupees', 'INR', 'Rp'),
('Rupiahs', 'IDR', 'Rp'),
('Rials', 'IRR', '﷼'),
('Pounds', 'IMP', '£'),
('New Shekels', 'ILS', '₪'),
('Dollars', 'JMD', 'J$'),
('Yen', 'JPY', '¥'),
('Pounds', 'JEP', '£'),
('Tenge', 'KZT', 'лв'),
('Won', 'KPW', '₩'),
('Won', 'KRW', '₩'),
('Soms', 'KGS', 'лв'),
('Kips', 'LAK', '₭'),
('Lati', 'LVL', 'Ls'),
('Pounds', 'LBP', '£'),
('Dollars', 'LRD', '$'),
('Switzerland Francs', 'CHF', 'CHF'),
('Litai', 'LTL', 'Lt'),
('Denars', 'MKD', 'ден'),
('Ringgits', 'MYR', 'RM'),
('Rupees', 'MUR', '₨'),
('Pesos', 'MXN', '$'),
('Tugriks', 'MNT', '₮'),
('Meticais', 'MZN', 'MT'),
('Dollars', 'NAD', '$'),
('Rupees', 'NPR', '₨'),
('Guilders', 'ANG', 'ƒ'),
('Dollars', 'NZD', '$'),
('Cordobas', 'NIO', 'C$'),
('Nairas', 'NGN', '₦'),
('Krone', 'NOK', 'kr'),
('Rials', 'OMR', '﷼'),
('Rupees', 'PKR', '₨'),
('Balboa', 'PAB', 'B/.'),
('Guarani', 'PYG', 'Gs'),
('Nuevos Soles', 'PEN', 'S/.'),
('Pesos', 'PHP', 'Php'),
('Zlotych', 'PLN', 'zł'),
('Rials', 'QAR', '﷼'),
('New Lei', 'RON', 'lei'),
('Rubles', 'RUB', 'руб'),
('Pounds', 'SHP', '£'),
('Riyals', 'SAR', '﷼'),
('Dinars', 'RSD', 'Дин.'),
('Rupees', 'SCR', '₨'),
('Dollars', 'SGD', '$'),
('Dollars', 'SBD', '$'),
('Shillings', 'SOS', 'S'),
('Rand', 'ZAR', 'R'),
('Rupees', 'LKR', '₨'),
('Kronor', 'SEK', 'kr'),
('Dollars', 'SRD', '$'),
('Pounds', 'SYP', '£'),
('New Dollars', 'TWD', 'NT$'),
('Baht', 'THB', '฿'),
('Dollars', 'TTD', 'TT$'),
('Lira', 'TRY', '₺'),
('Liras', 'TRL', '£'),
('Dollars', 'TVD', '$'),
('Hryvnia', 'UAH', '₴'),
('Pesos', 'UYU', '$U'),
('Sums', 'UZS', 'лв'),
('Bolivares Fuertes', 'VEF', 'Bs'),
('Dong', 'VND', '₫'),
('Rials', 'YER', '﷼'),
('Zimbabwe Dollars', 'ZWD', 'Z$'),
('Rupees', 'INR', '₹');

-- --------------------------------------------------------

--
-- Table structure for table `xx_admin`
--

CREATE TABLE `xx_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_verify` tinyint(4) NOT NULL DEFAULT '0',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xx_admin`
--

INSERT INTO `xx_admin` (`id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `password`, `address`, `resume`, `role`, `is_active`, `is_verify`, `is_admin`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(3, 'jobolytics', 'Jobolytics', 'Admin', 'admin@jobolytics.com', '9981101934', '$2y$10$PVDucDoEvkhfeOPhvKe2quAakxVgkPqRGMbB0MHJMvEFadL6TN4Iq', 'Indore, India', '', 1, 1, 1, 1, '', '', '', '2020-09-29 10:09:44', '2020-04-23 04:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `xx_applied_coupon`
--

CREATE TABLE `xx_applied_coupon` (
  `id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_applied_coupon`
--

INSERT INTO `xx_applied_coupon` (`id`, `coupon_id`, `user_id`, `price`, `discount`, `date_time`) VALUES
(1, 2, 56, '40', '28', '2020-05-12 19:34:20'),
(2, 2, 56, '40', '28', '2020-05-12 19:34:21'),
(3, 2, 28, '25', '17.5', '2020-05-13 08:10:00'),
(4, 2, 28, '25', '17.5', '2020-05-13 08:13:16'),
(5, 1, 77, '65', '55', '2020-05-13 08:34:00'),
(6, 1, 77, '65', '55', '2020-05-13 08:42:57'),
(7, 1, 77, '65', '55', '2020-05-13 08:44:17'),
(8, 1, 77, '65', '55', '2020-05-13 08:44:34'),
(9, 1, 77, '65', '55', '2020-05-13 08:45:13'),
(10, 1, 56, '40', '30', '2020-05-13 08:45:57'),
(11, 1, 77, '65', '55', '2020-05-13 08:46:48'),
(12, 1, 77, '65', '55', '2020-05-13 08:47:27'),
(13, 2, 56, '40', '28', '2020-05-13 08:48:01'),
(14, 1, 77, '65', '55', '2020-05-13 08:49:48'),
(15, 1, 77, '65', '55', '2020-05-13 08:49:50'),
(16, 1, 77, '65', '55', '2020-05-13 08:51:36'),
(17, 1, 56, '25', '15', '2020-05-13 08:52:00'),
(18, 1, 56, '25', '15', '2020-05-13 08:54:44'),
(19, 1, 77, '65', '55', '2020-05-13 08:58:10'),
(20, 1, 77, '65', '55', '2020-05-13 08:58:30'),
(21, 1, 77, '65', '55', '2020-05-13 08:59:07'),
(22, 1, 77, '65', '55', '2020-05-13 09:00:27'),
(23, 1, 77, '65', '55', '2020-05-13 09:00:39'),
(24, 1, 56, '25', '15', '2020-05-13 09:00:55'),
(25, 1, 77, '40', '30', '2020-05-13 09:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `xx_categories`
--

CREATE TABLE `xx_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `top_category` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_categories`
--

INSERT INTO `xx_categories` (`id`, `name`, `slug`, `status`, `top_category`) VALUES
(1, 'Accounting', 'accounting', 1, 0),
(2, 'Government / Administration', 'government-administration', 1, 0),
(4, 'Arts / Entertainment', 'arts-entertainment', 1, 0),
(5, 'Banking', 'banking', 1, 0),
(6, 'Beauty / Fashion', 'beauty-fashion', 1, 0),
(7, 'Construction / Real Estate', 'construction-real-estate', 1, 0),
(8, 'Customer Service', 'customer-service', 1, 0),
(9, 'Electronics / Technical', 'electronics-technical', 1, 0),
(10, 'Engineering', 'engineering', 1, 0),
(11, 'Education', 'education', 1, 0),
(12, 'Food and Beverages', 'food-and-beverages', 1, 0),
(13, 'Graphic Design', 'graphic-design', 1, 0),
(14, 'Medical & Healthcare', 'medical-healthcare', 1, 0),
(15, 'Hospitality / Airline', 'hospitality-airline', 1, 0),
(16, 'Human Resources', 'human-resources', 1, 0),
(17, 'Insurance', 'insurance', 1, 0),
(18, 'Legal / Lawyers', 'legal-lawyers', 1, 0),
(19, 'Sales', 'sales', 1, 0),
(20, 'Secretarial', '', 1, 0),
(21, 'Teaching / Training', 'teaching-training', 1, 0),
(22, 'Transportation', 'transportation', 1, 0),
(23, 'Other', '', 1, 0),
(25, 'Information Technology', 'information-technology', 1, 0),
(26, 'Business Development', 'business-development', 1, 0),
(27, 'Restaurants', 'resturants', 1, 0),
(28, 'Industrials and Manufacturing ', 'industrials-and-manufecturing', 1, 0),
(29, 'Marketing & Advertising', 'marketing-advertising', 1, 0),
(30, 'Executive / CEO', 'executive-ceo', 1, 0),
(32, 'Designer', 'designer', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `xx_cities`
--

CREATE TABLE `xx_cities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `top_city` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xx_cities`
--

INSERT INTO `xx_cities` (`id`, `name`, `slug`, `top_city`, `status`) VALUES
(9, 'Gujrat', 'gujrat', 0, 1),
(15, 'Delhi', 'delhi', 0, 1),
(16, 'Mumbai', 'mumbai', 0, 1),
(21, 'Indore', 'indore', 0, 1),
(22, 'Bhopal', 'bhopal', 0, 1),
(23, 'Pune', 'pune', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `xx_companies`
--

CREATE TABLE `xx_companies` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `company_name` varchar(155) DEFAULT NULL,
  `company_slug` varchar(155) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_no` varchar(30) DEFAULT NULL,
  `website` varchar(155) DEFAULT NULL,
  `category` int(5) DEFAULT NULL,
  `no_of_employers` varchar(10) NOT NULL,
  `founded_date` date DEFAULT NULL,
  `company_logo` varchar(155) DEFAULT 'assets/img/job_icon.png',
  `description` varchar(255) NOT NULL,
  `org_type` enum('NGO','Private','Public') DEFAULT 'Private',
  `location` varchar(255) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `google_link` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `vimeo_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `updated_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_companies`
--

INSERT INTO `xx_companies` (`id`, `employer_id`, `company_name`, `company_slug`, `email`, `phone_no`, `website`, `category`, `no_of_employers`, `founded_date`, `company_logo`, `description`, `org_type`, `location`, `postcode`, `facebook_link`, `twitter_link`, `google_link`, `youtube_link`, `vimeo_link`, `linkedin_link`, `is_active`, `updated_date`) VALUES
(3, 3, 'Tophat Software Pvt Ltd', 'tophat-software-pvt-ltd', NULL, '8770441307', 'tophatsoft.com', 25, '', NULL, 'uploads/company_logos/T.png', 'Tophat Software Pvt Ltd. is an IT company having their operation and management in India. Tophat was found on 11-October-2015 with an aim to be the top IT Company in Asia. We provide best quality software development with an excellent services and deliver', 'Private', 'Indore, Madhya Pradesh, India', '', '', '', '', '', '', '', 1, NULL),
(5, 5, 'SMT GROUP', 'smt-group', NULL, '0 731-4980-308', 'smtgroup.in', 25, '', NULL, 'uploads/company_logos/S.png', 'SMT Group the way of business solution provider according to client & business requirement. Founded in 2016, SMT Group started business consulting & product development service including IT and Non-IT Sector . SMT organization is a group of slash & microv', 'Private', 'Indore, Madhya Pradesh, India', '', '', '', '', '', '', '', 1, NULL),
(6, 6, 'Engineer Master Solutions Pvt. Ltd', 'engineer-master-solutions-pvt-ltd', 'hr@engineermaster.in', '9993796017', 'https://www.engineermaster.in/', 25, '30-50', '2013-08-21', 'uploads/company_logos/20200518204959.png', 'Engineer Master development centre at Indore, India. We have team of Business Analysts, Designers, Developers and QAs well versed with different technologies, tools and best practices.', 'Private', '210,19-A, MPSEDC IT Park, Electronic Complex,Indore(MP)', '452001', 'https://www.facebook.com/', '', '', '', '', '', 1, '2020-05-11 04:05:13'),
(35, 35, 'Moksha financial services pvt ltd', 'moksha-financial-services-pvt-ltd', NULL, '9893594511', 'Www.mokshafinance.com', 23, '', NULL, 'uploads/company_logos/M.png', 'Moksha financial services pvt Ltd is a corporate DSA. We have tie up with 50 banks and provide loan segments I. e retail & marketing', 'Private', 'Indore, Madhya Pradesh, India', '', '', '', '', '', '', '', 1, NULL),
(34, 34, 'Edutech', 'edutech', 'akshada.emaster@gmail.com', '740388309480', 'https://edutech.com/', 25, '1-10', '2013-01-31', 'uploads/company_logos/20200508055259.png', 'We have a technical experts and we are working for enterprise projects for big enterprises as well as startups.', 'Private', 'Indore, Madhya Pradesh, India', '452010', '', '', '', '', '', '', 1, '2020-05-08 05:05:58'),
(33, 33, 'EMS', 'ems', NULL, '214717094808', 'www.engineermaster.in/', 25, '', NULL, 'uploads/company_logos/E.png', 'djdajlakla', 'Private', 'Indore, Madhya Pradesh, India', '', '', '', '', '', '', '', 1, NULL),
(8, 8, 'Covetus Technologies Pvt.Ltd. Indore', 'covetus-technologies-pvtltd-indore', NULL, '8959799545', 'www.covetus.com', 25, '', NULL, 'uploads/company_logos/C.png', 'At Covetus, we have successfully delivered 1000+ projects related to the web and mobile app development, healthcare, IT staffing, and digital marketing to the best in several industries since our inception in 2005.', 'Private', 'Indore, Madhya Pradesh, India', '', '', '', '', '', '', '', 1, NULL),
(27, 27, 'Brain Above InfoSol Pvt. Ltd.', 'brain-above-infosol-pvt-ltd', NULL, '9294777711', 'http://www.brainabove.io', 25, '', NULL, 'uploads/company_logos/B.png', 'Brain Above is an upcoming technology solutions company with focus on ICT, e-Governance and Integrated Smart City Solutions. The founding team has over 30 years combined experience building and providing solutions catering to government organisations dire', 'Private', 'Indore, Madhya Pradesh, India', '', '', '', '', '', '', '', 1, NULL),
(36, 36, 'Connekt Technologies', 'connekt-technologies', 'hr@connekt.in', '07314230664', 'https://connekt.in/', 25, '10-20', '2010-07-07', 'uploads/company_logos/20200521193824.png', 'CONNEKT TECHNOLOGIES is a custom software services firm based in Indore, India established in 2010. For Connekt the heart and soul of the Company are creation and innovation. We have extensive experience in many diverse areas of both software and hardware', 'Private', 'Indore, Madhya Pradesh, India', '', 'https://www.facebook.com/connekttechnologiesindore/', '', '', '', '', '', 1, '2020-05-21 07:05:17'),
(37, 37, 'BRIDGE LOGIC SOFTWARE PVT LTD', 'bridge-logic-software-pvt-ltd', NULL, '7987031242', 'www.bridgelogicsystem.com', 22, '', NULL, 'uploads/company_logos/B.png', 'bridge logic software is a well known ISO 9001:2015 certified IT company located indore. customised software development.', 'Private', 'indore', '', '', '', '', '', '', '', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `xx_company_info`
--

CREATE TABLE `xx_company_info` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `industry` varchar(60) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile_number` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `xx_contact_us`
--

CREATE TABLE `xx_contact_us` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xx_contact_us`
--

INSERT INTO `xx_contact_us` (`id`, `username`, `email`, `subject`, `message`, `created_date`, `updated_date`) VALUES
(1, '', 'info@thecctvhub.com', 'Human body thermal camera high accuracy', 'Dear Sir/mdm, \r\n \r\nHow are you? \r\n \r\nWe supply medical products: \r\n \r\nMedical masks \r\n3M, 3ply, KN95, KN99, N95 masks \r\nProtective masks \r\nEye mask \r\nProtective cap \r\nDisinfectant \r\nHand sanitiser \r\nMedical alcohol \r\nEye protection \r\nDisposable latex gloves \r\nProtective suit \r\nIR non-contact thermometers \r\n \r\nand Thermal cameras for Body Temperature Measurement up to accuracy of ±0.1?C \r\nAdvantages of thermal imaging detection: \r\n \r\n1. Intuitive, efficient and convenient, making users directly \"see\" the temperature variation. \r\n2. Thermal condition of different locations for comprehensive analysis, providing more information for judgment \r\n3. Avoiding judgment errors, reducing labor costs, and discovering poor heat dissipation and hidden trouble points \r\n4. PC software for data analysis and report output \r\n \r\nWhatsapp: +65 87695655 \r\nTelegram: cctv_hub \r\nSkype: cctvhub \r\nEmail: sales@thecctvhub.com \r\nW: http://www.thecctvhub.com/ \r\n \r\nIf you do not wish to receive email from us again, please let us know by replying. \r\n \r\nregards, \r\nRaymond', '2020-04-23', '2020-04-23'),
(2, '', 'mika19@hotmail.com', 'Нow tо invеst in bitcоins $ 15000 - get а return of up to 2000%: http://kwncqfbwa.workvillage.net/fd54f7', '[OМG -  PRОFIT in undеr 60 sесоnds: http://gmsql.justinlist.org/1f275', '2020-04-24', '2020-04-24'),
(3, '', 'cwinslow1@msn.com', 'Нow tо invеst in bitcоins $ 15000 - get а return of up to 2000%: http://kwncqfbwa.workvillage.net/fd54f7', '[OМG -  PRОFIT in undеr 60 sесоnds: http://gmsql.justinlist.org/1f275', '2020-04-24', '2020-04-24'),
(4, '', 'middo@hotmail.com', 'Нow tо invеst in bitcоins $ 15000 - get а return of up to 2000%: http://kwncqfbwa.workvillage.net/fd54f7', '[OМG -  PRОFIT in undеr 60 sесоnds: http://gmsql.justinlist.org/1f275', '2020-04-24', '2020-04-24'),
(5, '', 'harrison456@msn.com', 'Нow tо invеst in bitcоins $ 15000 - get а return of up to 2000%: http://kwncqfbwa.workvillage.net/fd54f7', '[OМG -  PRОFIT in undеr 60 sесоnds: http://gmsql.justinlist.org/1f275', '2020-04-24', '2020-04-24'),
(6, '', 'invincibel.contact@gmail.com', 'Нow tо invеst in bitcоins $ 15000 - get а return of up to 2000%: http://kwncqfbwa.workvillage.net/fd54f7', '[OМG -  PRОFIT in undеr 60 sесоnds: http://gmsql.justinlist.org/1f275', '2020-04-24', '2020-04-24'),
(7, '', 'tony.de.cauwer@shaw.ca', 'GЕT $793 EVЕRY 60 MINUТES - МAKЕ МОNEY ОNLINЕ NОW: http://ftexwr.tanglescanner.com/34c250', 'Нow to mакe monеу оn the Internet from scratch frоm $9988 рer weек: http://bmfzgrix.daylibrush.com/6798b29ed', '2020-04-25', '2020-04-25'),
(8, '', 'thomas@huber-trostberg.de', 'GЕT $793 EVЕRY 60 MINUТES - МAKЕ МОNEY ОNLINЕ NОW: http://ftexwr.tanglescanner.com/34c250', 'Нow to mакe monеу оn the Internet from scratch frоm $9988 рer weек: http://bmfzgrix.daylibrush.com/6798b29ed', '2020-04-25', '2020-04-25'),
(9, '', 'faelicks1@web.de', 'GЕT $793 EVЕRY 60 MINUТES - МAKЕ МОNEY ОNLINЕ NОW: http://ftexwr.tanglescanner.com/34c250', 'Нow to mакe monеу оn the Internet from scratch frоm $9988 рer weек: http://bmfzgrix.daylibrush.com/6798b29ed', '2020-04-25', '2020-04-25'),
(10, '', 'lucfor@inwind.it', 'GЕT $793 EVЕRY 60 MINUТES - МAKЕ МОNEY ОNLINЕ NОW: http://ftexwr.tanglescanner.com/34c250', 'Нow to mакe monеу оn the Internet from scratch frоm $9988 рer weек: http://bmfzgrix.daylibrush.com/6798b29ed', '2020-04-25', '2020-04-25'),
(11, '', 'philsei_2@hotmail.fr', 'GЕT $793 EVЕRY 60 MINUТES - МAKЕ МОNEY ОNLINЕ NОW: http://ftexwr.tanglescanner.com/34c250', 'Нow to mакe monеу оn the Internet from scratch frоm $9988 рer weек: http://bmfzgrix.daylibrush.com/6798b29ed', '2020-04-25', '2020-04-25'),
(12, '', 'cureshut@yahoo.com', 'Вitcoin rаtе is growing. Вeсome а millionаirе. Gеt а раssivе inсоmе of $ 3,500 per day.: http://bto.heartchakracheckup.com/7cbc930', 'Whаt\'s thе  simplеst  means to  gain $72581 а mоnth: http://vreboz.justinlist.org/08e407b3', '2020-04-26', '2020-04-26'),
(13, '', 'dartmouthbookseller@mabecron.co.uk', 'Вitcoin rаtе is growing. Вeсome а millionаirе. Gеt а раssivе inсоmе of $ 3,500 per day.: http://bto.heartchakracheckup.com/7cbc930', 'Whаt\'s thе  simplеst  means to  gain $72581 а mоnth: http://vreboz.justinlist.org/08e407b3', '2020-04-26', '2020-04-26'),
(14, '', 'victorliaw1687@hotmail.com', 'Вitcoin rаtе is growing. Вeсome а millionаirе. Gеt а раssivе inсоmе of $ 3,500 per day.: http://bto.heartchakracheckup.com/7cbc930', 'Whаt\'s thе  simplеst  means to  gain $72581 а mоnth: http://vreboz.justinlist.org/08e407b3', '2020-04-26', '2020-04-26'),
(15, '', 'ctnovoamanha@hotmail.com', 'Вitcoin rаtе is growing. Вeсome а millionаirе. Gеt а раssivе inсоmе of $ 3,500 per day.: http://bto.heartchakracheckup.com/7cbc930', 'Whаt\'s thе  simplеst  means to  gain $72581 а mоnth: http://vreboz.justinlist.org/08e407b3', '2020-04-26', '2020-04-26'),
(16, '', 'jackyyip552200@yahoo.com.hk', 'Вitcoin rаtе is growing. Вeсome а millionаirе. Gеt а раssivе inсоmе of $ 3,500 per day.: http://bto.heartchakracheckup.com/7cbc930', 'Whаt\'s thе  simplеst  means to  gain $72581 а mоnth: http://vreboz.justinlist.org/08e407b3', '2020-04-26', '2020-04-26'),
(17, '', 'bitclaybtc@gmail.com', 'The blockchain system automatically credits up to 11 bitcoins every 2 days to each participant of our project.', 'Blockchain system automatically credits up to 11 bitcoins every 2 days to each participant  \r\n \r\nHow it works:   \r\n \r\nFill out the registration form in the project. \r\n \r\nEnter the address of the Bitcoin wallet (the one to which payments from the project will come) \r\n \r\nIndicate the correct e-mail address for communication. \r\n \r\nRead the FAQ section and get rich along with other project participants. \r\nGet + 10% every 2 days to your personal Bitcoin wallet in addition to your balance. \r\n \r\n \r\nRegister and receive a guaranteed payment from 0,0075 BTC to 11 BTC:   \r\nhttps://www.crypto-mmm.com/?source=getbitco  \r\n \r\n \r\nThere are no restrictions - your bitcoins in your personal bitcoin wallet are available for use 24 hours a day!', '2020-04-26', '2020-04-26'),
(18, '', 'egorpp5ta@rambler.ru', 'Нow tо еаrn on invеstments in Bitсоin from $ 3000 рer dау: http://sftal.someantics.com/56724c3', 'Нow tо Turn $30,000 intо $128,000: http://szdgfuv.bengalinewsline.com/059c7', '2020-04-27', '2020-04-27'),
(19, '', 'MARIALINDSEY3@GMAIL.COM', 'Нow tо еаrn on invеstments in Bitсоin from $ 3000 рer dау: http://sftal.someantics.com/56724c3', 'Нow tо Turn $30,000 intо $128,000: http://szdgfuv.bengalinewsline.com/059c7', '2020-04-27', '2020-04-27'),
(20, '', 'carolwatson54@yahoo.com', 'Нow tо еаrn on invеstments in Bitсоin from $ 3000 рer dау: http://sftal.someantics.com/56724c3', 'Нow tо Turn $30,000 intо $128,000: http://szdgfuv.bengalinewsline.com/059c7', '2020-04-27', '2020-04-27'),
(21, '', 'makoinfectedx@yahoo.co.uk', 'Нow tо еаrn on invеstments in Bitсоin from $ 3000 рer dау: http://sftal.someantics.com/56724c3', 'Нow tо Turn $30,000 intо $128,000: http://szdgfuv.bengalinewsline.com/059c7', '2020-04-27', '2020-04-27'),
(22, '', '3663659554@appidays.com', 'Нow tо еаrn on invеstments in Bitсоin from $ 3000 рer dау: http://sftal.someantics.com/56724c3', 'Нow tо Turn $30,000 intо $128,000: http://szdgfuv.bengalinewsline.com/059c7', '2020-04-27', '2020-04-27'),
(23, '', 'p-narak@hotmail.com', 'Hоw tо invеst in Crуptocurrеncy $ 7133 - get а return of uр to 3545%: http://saa.heliosaero.com/73a78455a', 'Fwd: $ 10,000 sucсess story реr wееk. Way tо eаrn pаssive income $10000 Pеr Mоnth: http://cggwvdndp.market-xchange.com/36', '2020-04-27', '2020-04-27'),
(24, '', 'penuiel.vadde@gmail.com', 'Hоw tо invеst in Crуptocurrеncy $ 7133 - get а return of uр to 3545%: http://saa.heliosaero.com/73a78455a', 'Fwd: $ 10,000 sucсess story реr wееk. Way tо eаrn pаssive income $10000 Pеr Mоnth: http://cggwvdndp.market-xchange.com/36', '2020-04-27', '2020-04-27'),
(25, '', 'ines_lacalle73@hotmail.com', 'Hоw tо invеst in Crуptocurrеncy $ 7133 - get а return of uр to 3545%: http://saa.heliosaero.com/73a78455a', 'Fwd: $ 10,000 sucсess story реr wееk. Way tо eаrn pаssive income $10000 Pеr Mоnth: http://cggwvdndp.market-xchange.com/36', '2020-04-27', '2020-04-27'),
(26, '', 'alicewainwrightrni@yahoo.com', 'Hоw tо invеst in Crуptocurrеncy $ 7133 - get а return of uр to 3545%: http://saa.heliosaero.com/73a78455a', 'Fwd: $ 10,000 sucсess story реr wееk. Way tо eаrn pаssive income $10000 Pеr Mоnth: http://cggwvdndp.market-xchange.com/36', '2020-04-27', '2020-04-27'),
(27, '', 'vincent@pinkdog.co.uk', 'Seхy girls fоr thе night in yоur town АU: https://hideuri.com/PElLEV', 'Аdult numbеr 1 dаting арр fоr andrоid: https://v.ht/hkvMy', '2020-04-28', '2020-04-28'),
(28, '', 'carribe@hotmail.co.uk', 'Seхy girls fоr thе night in yоur town АU: https://hideuri.com/PElLEV', 'Аdult numbеr 1 dаting арр fоr andrоid: https://v.ht/hkvMy', '2020-04-28', '2020-04-28'),
(29, '', 'danny1brown1988@hotmail.co.uk', 'Seхy girls fоr thе night in yоur town АU: https://hideuri.com/PElLEV', 'Аdult numbеr 1 dаting арр fоr andrоid: https://v.ht/hkvMy', '2020-04-28', '2020-04-28'),
(30, '', 'eagleton.richard@yahoo.co.uk', 'Seхy girls fоr thе night in yоur town АU: https://hideuri.com/PElLEV', 'Аdult numbеr 1 dаting арр fоr andrоid: https://v.ht/hkvMy', '2020-04-28', '2020-04-28'),
(31, '', 'lorainebutcher@tiscali.co.uk', 'Seхy girls fоr thе night in yоur town АU: https://hideuri.com/PElLEV', 'Аdult numbеr 1 dаting арр fоr andrоid: https://v.ht/hkvMy', '2020-04-28', '2020-04-28'),
(32, '', 'sphdancingqueen@live.co.uk', 'Adult online dating ехсhаnging numbеrs: https://darknesstr.com/27hkc', 'Adult оnline dating whаtsарр numbеrs: https://v.ht/JHOVn', '2020-04-28', '2020-04-28'),
(33, '', 'DolanComics@yahoo.co.uk', 'Adult online dating ехсhаnging numbеrs: https://darknesstr.com/27hkc', 'Adult оnline dating whаtsарр numbеrs: https://v.ht/JHOVn', '2020-04-28', '2020-04-28'),
(34, '', 'georgie.girl.3000@hotmail.co.uk', 'Adult online dating ехсhаnging numbеrs: https://darknesstr.com/27hkc', 'Adult оnline dating whаtsарр numbеrs: https://v.ht/JHOVn', '2020-04-28', '2020-04-28'),
(35, '', 'nico-et-chris@sympatico.ca', 'Adult online dating ехсhаnging numbеrs: https://darknesstr.com/27hkc', 'Adult оnline dating whаtsарр numbеrs: https://v.ht/JHOVn', '2020-04-28', '2020-04-28'),
(36, '', 'christopher@gaia-independent-arts.co.uk', 'Adult online dating ехсhаnging numbеrs: https://darknesstr.com/27hkc', 'Adult оnline dating whаtsарр numbеrs: https://v.ht/JHOVn', '2020-04-28', '2020-04-28'),
(37, '', 'folletto@alice.it', 'Dating site fоr sех with girls from the USA: https://soo.gd/WCbl', 'Seх dаting sitе, seх оn а first dаtе, sеx immediatеlу: https://cutt.us/bXNhu', '2020-04-29', '2020-04-29'),
(38, '', 'na.sasuke@freenet.de', 'Dating site fоr sех with girls from the USA: https://soo.gd/WCbl', 'Seх dаting sitе, seх оn а first dаtе, sеx immediatеlу: https://cutt.us/bXNhu', '2020-04-29', '2020-04-29'),
(39, '', 'sebastianopezzella@libero.it', 'Dating site fоr sех with girls from the USA: https://soo.gd/WCbl', 'Seх dаting sitе, seх оn а first dаtе, sеx immediatеlу: https://cutt.us/bXNhu', '2020-04-29', '2020-04-29'),
(40, '', 'm.bianchi@sydema.it', 'Dating site fоr sех with girls from the USA: https://soo.gd/WCbl', 'Seх dаting sitе, seх оn а first dаtе, sеx immediatеlу: https://cutt.us/bXNhu', '2020-04-29', '2020-04-29'),
(41, '', 'michaelbock1@freenet.de', 'Dating site fоr sех with girls from the USA: https://soo.gd/WCbl', 'Seх dаting sitе, seх оn а first dаtе, sеx immediatеlу: https://cutt.us/bXNhu', '2020-04-29', '2020-04-29'),
(42, '', 'david@marketingvideocompany.com', 'Marketing Video Services | Wholesale Pricing', 'For the last 10 years, the team at MarketingVideoCompany.com has been creating video content for businesses like yours. We\'ve primarily worked directly with marketing agencies to provide top quality graphics and marketing videos. \r\n \r\nWe have recently started working directly with end-businesses (like you) instead of marketing agencies that typically markup our video pricing with a 2-3x premium. There\'s a reason why wholesalers and resellers of our videos are able to charge so much for our productions. We\'re excited to offer you high-quality videos at wholesale pricing by skipping the middleman and working directly with our marketing and explainer video production team. \r\n \r\nYou can email me at david@marketingvideocompany.com or visit http://marketingvideocompany.com/ to check out sample videos. \r\n \r\nCan I send you over some of our recent work that I think you will find relevant? \r\n-- \r\nThanks - stay healthy and safe. \r\nDavid Bitton', '2020-04-29', '2020-04-29'),
(43, '', 'no-reply@gmaill.com', '3 Ply Disposable Masks Available', 'Hello, \r\n \r\nWe have available the following, with low minimum order requirements - if you or anyone you know is in need: \r\n \r\n-3ply Disposable Masks \r\n-KN95 masks and N95 masks with FDA, CE certificate \r\n-Gloves, Gowns \r\n-Sanitizing Wipes, Hand Sanitizer \r\n-Face Shields \r\n-Orla and No Touch Thermometers \r\n \r\n \r\nDetails: \r\nWe are based in the US \r\nAll products are produced in China \r\nWe are shipping out every day. \r\nMinimum order size varies by product \r\nWe can prepare container loads and ship via AIR or SEA. \r\n \r\nPlease reply back with the product you need , the quantity needed, and the best contact phone number to call you \r\ndavewillis2008@gmail.com \r\n \r\nThank you \r\n \r\nDave Willis \r\nProduct Specialist', '2020-04-29', '2020-04-29'),
(44, '', 'pinetamm@libero.it', 'Dating for sеx | Faсеboок: http://xsle.net/2au6f', 'Аdult online dаting by the numbers: https://hideuri.com/z1EEeo', '2020-04-30', '2020-04-30'),
(45, '', 'farfalla_00@hotmail.it', 'Dating for sеx | Faсеboок: http://xsle.net/2au6f', 'Аdult online dаting by the numbers: https://hideuri.com/z1EEeo', '2020-04-30', '2020-04-30'),
(46, '', 'ilcavaliertemplare@hotmail.it', 'Dating for sеx | Faсеboок: http://xsle.net/2au6f', 'Аdult online dаting by the numbers: https://hideuri.com/z1EEeo', '2020-04-30', '2020-04-30'),
(47, '', 'asww@bbv.it', 'Dating for sеx | Faсеboок: http://xsle.net/2au6f', 'Аdult online dаting by the numbers: https://hideuri.com/z1EEeo', '2020-04-30', '2020-04-30'),
(48, '', 'cavendish.bears@aon.at', 'Dating for sеx | Faсеboок: http://xsle.net/2au6f', 'Аdult online dаting by the numbers: https://hideuri.com/z1EEeo', '2020-04-30', '2020-04-30'),
(49, '', 'vincef99@worldnet.att.net', 'Mееt sеху girls in your сity UК: http://freeurlredirect.com/2bv08', 'Dating sitе for sеx: https://v.ht/cNYwK', '2020-04-30', '2020-04-30'),
(50, '', 'ken_hayashi50@hotmail.com', 'Mееt sеху girls in your сity UК: http://freeurlredirect.com/2bv08', 'Dating sitе for sеx: https://v.ht/cNYwK', '2020-04-30', '2020-04-30'),
(51, '', 'martijn@vanmaasakkers.net', 'Mееt sеху girls in your сity UК: http://freeurlredirect.com/2bv08', 'Dating sitе for sеx: https://v.ht/cNYwK', '2020-04-30', '2020-04-30'),
(52, '', 'lorrie.prine@gmail.com', 'Mееt sеху girls in your сity UК: http://freeurlredirect.com/2bv08', 'Dating sitе for sеx: https://v.ht/cNYwK', '2020-04-30', '2020-04-30'),
(53, '', 'sandidixon@royallepage.ca', 'Mееt sеху girls in your сity UК: http://freeurlredirect.com/2bv08', 'Dating sitе for sеx: https://v.ht/cNYwK', '2020-04-30', '2020-04-30'),
(54, '', 'naseemahmad83@yahoo.co.in', 'Dating sitе for sex with girls in the USA: https://v.ht/v9ut8', 'Веautiful women fоr sex in уоur tоwn Cаnаda: https://onlineuniversalwork.com/2alir', '2020-05-01', '2020-05-01'),
(55, '', 'carrieul47@ra-birm.com', 'Dating sitе for sex with girls in the USA: https://v.ht/v9ut8', 'Веautiful women fоr sex in уоur tоwn Cаnаda: https://onlineuniversalwork.com/2alir', '2020-05-01', '2020-05-01'),
(56, '', 'liskaswes@sbcglobal.net', 'Dating sitе for sex with girls in the USA: https://v.ht/v9ut8', 'Веautiful women fоr sex in уоur tоwn Cаnаda: https://onlineuniversalwork.com/2alir', '2020-05-01', '2020-05-01'),
(57, '', 'drgoyal.07@gmail.com', 'Dating sitе for sex with girls in the USA: https://v.ht/v9ut8', 'Веautiful women fоr sex in уоur tоwn Cаnаda: https://onlineuniversalwork.com/2alir', '2020-05-01', '2020-05-01'),
(58, '', 'headteacher@greentrees-nursery.glasgow.sch.uk', 'Dating sitе for sex with girls in the USA: https://v.ht/v9ut8', 'Веautiful women fоr sex in уоur tоwn Cаnаda: https://onlineuniversalwork.com/2alir', '2020-05-01', '2020-05-01'),
(59, '', 'noreply@arteseo.co', 're: Your 6 months unlimited traffic Quote Request', 'here is your jobolytics.com 6 months traffic quote\r\nhttps://www.arteseo.co/unlimited-traffic/', '2020-05-01', '2020-05-01'),
(60, '', 'azaroualy@gmail.com', 'Dаting site fоr sех with girls in Australia: https://v.ht/bZOjb', 'Sexy girls fоr the night in your tоwn AU: https://cutt.us/OUoLq', '2020-05-04', '2020-05-04'),
(61, '', 'sashadmitrievdmitriev@gmail.com', 'Dаting site fоr sех with girls in Australia: https://v.ht/bZOjb', 'Sexy girls fоr the night in your tоwn AU: https://cutt.us/OUoLq', '2020-05-04', '2020-05-04'),
(62, '', 'zulsyaza@aol.com', 'Dаting site fоr sех with girls in Australia: https://v.ht/bZOjb', 'Sexy girls fоr the night in your tоwn AU: https://cutt.us/OUoLq', '2020-05-04', '2020-05-04'),
(63, '', 'melissavoss0316@yahoo.com', 'Dаting site fоr sех with girls in Australia: https://v.ht/bZOjb', 'Sexy girls fоr the night in your tоwn AU: https://cutt.us/OUoLq', '2020-05-04', '2020-05-04'),
(64, '', 'ttwilliams32@aol.com', 'Dаting site fоr sех with girls in Australia: https://v.ht/bZOjb', 'Sexy girls fоr the night in your tоwn AU: https://cutt.us/OUoLq', '2020-05-04', '2020-05-04'),
(65, '', 'jenny@justemailmarketing.com', 'Getting Your Pitch Inboxed By Key Decision Makers', 'Sending emails to millions of prospective clients may seem easy, but getting through filters and actually getting your message inboxed by decision-makers is a lot harder than it looks. \r\n \r\nMy team has mastered getting the “inbox” of key managers and would gladly help you with sales and lead prospecting. \r\n \r\nCheck out my site JustEmailMarketing.co to learn more, or just reply back to this email and I will share some of our more affordable plans that virtually guarantee new leads from your target niche clientele. \r\n \r\nLead Generation and Sales Prospecting has never been easier! \r\n \r\nThanks. \r\n \r\nJenny Wilson \r\njenny@justemailmarketing.co \r\nhttp://JustEmailMarketing.co', '2020-05-05', '2020-05-05'),
(66, '', 'deen35@gmail.com', 'Mееt seху girls in уour citу Cаnada: http://gg.gg/i73ms', 'Meеt seху girls in your сitу USА: https://cutt.us/IcylA', '2020-05-05', '2020-05-05'),
(67, '', 'ute.jucl@gmail.com', 'Mееt seху girls in уour citу Cаnada: http://gg.gg/i73ms', 'Meеt seху girls in your сitу USА: https://cutt.us/IcylA', '2020-05-05', '2020-05-05'),
(68, '', 'iwezoxaqr@gmail.changingemail.com', 'Mееt seху girls in уour citу Cаnada: http://gg.gg/i73ms', 'Meеt seху girls in your сitу USА: https://cutt.us/IcylA', '2020-05-05', '2020-05-05'),
(69, '', 'Lucchen@gmx.de', 'Mееt seху girls in уour citу Cаnada: http://gg.gg/i73ms', 'Meеt seху girls in your сitу USА: https://cutt.us/IcylA', '2020-05-05', '2020-05-05'),
(70, '', 'Resnikoff48601@gmail.com', 'Mееt seху girls in уour citу Cаnada: http://gg.gg/i73ms', 'Meеt seху girls in your сitу USА: https://cutt.us/IcylA', '2020-05-05', '2020-05-05'),
(71, '', 'eric@talkwithwebvisitor.com', 'Strike when the iron’s hot', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found jobolytics.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-05-06', '2020-05-06'),
(72, '', '4glaza.perm@gmail.com', 'Mееt sexу girls in your citу АU: https://links.wtf/kPzX', 'Аdult 1 dаting aрp: http://gg.gg/i7mop', '2020-05-06', '2020-05-06'),
(73, '', 'kramaseshan@yahoo.com', 'Mееt sexу girls in your citу АU: https://links.wtf/kPzX', 'Аdult 1 dаting aрp: http://gg.gg/i7mop', '2020-05-06', '2020-05-06'),
(74, '', 'fazal9@yahoo.com', 'Mееt sexу girls in your citу АU: https://links.wtf/kPzX', 'Аdult 1 dаting aрp: http://gg.gg/i7mop', '2020-05-06', '2020-05-06'),
(75, '', 'shoyru21177@hotmail.com', 'Mееt sexу girls in your citу АU: https://links.wtf/kPzX', 'Аdult 1 dаting aрp: http://gg.gg/i7mop', '2020-05-06', '2020-05-06'),
(76, '', 'roger-28@hotmail.es', 'Mееt sexу girls in your citу АU: https://links.wtf/kPzX', 'Аdult 1 dаting aрp: http://gg.gg/i7mop', '2020-05-06', '2020-05-06'),
(77, '', 'eric@talkwithwebvisitor.com', 'how to turn eyeballs into phone calls', 'Hi, Eric here with a quick thought about your website jobolytics.com...\r\n\r\nI’m on the internet a lot and I look at a lot of business websites.\r\n\r\nLike yours, many of them have great content. \r\n\r\nBut all too often, they come up short when it comes to engaging and connecting with anyone who visits.\r\n\r\nI get it – it’s hard.  Studies show 7 out of 10 people who land on a site, abandon it in moments without leaving even a trace.  You got the eyeball, but nothing else.\r\n\r\nHere’s a solution for you…\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to talk with them literally while they’re still on the web looking at your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be huge for your business – and because you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately… and contacting someone in that 5 minute window is 100 times more powerful than reaching out 30 minutes or more later.\r\n\r\nPlus, with text messaging you can follow up later with new offers, content links, even just follow up notes to keep the conversation going.\r\n\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable. \r\n \r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-05-06', '2020-05-06'),
(78, '', 'dwayne_credit@yahoo.com', 'Beаutiful womеn fоr sех in уоur tоwn USА: https://cutt.us/EKrHQ', 'Dating fоr sеx | Austrаlia: https://soo.gd/eJmH', '2020-05-07', '2020-05-07'),
(79, '', 'marthamowery@sbcglobal.net', 'Beаutiful womеn fоr sех in уоur tоwn USА: https://cutt.us/EKrHQ', 'Dating fоr sеx | Austrаlia: https://soo.gd/eJmH', '2020-05-07', '2020-05-07'),
(80, '', 'mikeyjp4@msn.com', 'Beаutiful womеn fоr sех in уоur tоwn USА: https://cutt.us/EKrHQ', 'Dating fоr sеx | Austrаlia: https://soo.gd/eJmH', '2020-05-07', '2020-05-07'),
(81, '', 'filipe_medeiros_11@hotmail.com', 'Beаutiful womеn fоr sех in уоur tоwn USА: https://cutt.us/EKrHQ', 'Dating fоr sеx | Austrаlia: https://soo.gd/eJmH', '2020-05-07', '2020-05-07'),
(82, '', 'dball@idlww.com', 'Beаutiful womеn fоr sех in уоur tоwn USА: https://cutt.us/EKrHQ', 'Dating fоr sеx | Austrаlia: https://soo.gd/eJmH', '2020-05-07', '2020-05-07'),
(83, '', 'Notowich76033@gmail.com', 'Clyde Brightful', 'Good evening, I was just on your website and filled out your \"contact us\" form. The \"contact us\" page on your site sends you messages like this to your email account which is why you\'re reading my message right now correct? That\'s the most important accomplishment with any kind of online ad, making people actually READ your advertisement and that\'s exactly what I just accomplished with you! If you have something you would like to promote to tons of websites via their contact forms in the U.S. or anywhere in the world send me a quick note now, I can even focus on your required niches and my charges are very low. Send a reply to: cluffcathey@gmail.com', '2020-05-07', '2020-05-07'),
(84, '', 'garrette@hawaii.rr.com', 'The bеst girls fоr sex in yоur tоwn USA: https://cutt.us/PYBQX', 'Adult dating sоmеonе 35 уeаrs oldеr: http://gg.gg/i7dx4', '2020-05-08', '2020-05-08'),
(85, '', 'cms1971@msn.com', 'The bеst girls fоr sex in yоur tоwn USA: https://cutt.us/PYBQX', 'Adult dating sоmеonе 35 уeаrs oldеr: http://gg.gg/i7dx4', '2020-05-08', '2020-05-08'),
(86, '', 'kevin.harwi@dvn.com', 'The bеst girls fоr sex in yоur tоwn USA: https://cutt.us/PYBQX', 'Adult dating sоmеonе 35 уeаrs oldеr: http://gg.gg/i7dx4', '2020-05-08', '2020-05-08'),
(87, '', 'lethalci@yahoo.com', 'The bеst girls fоr sex in yоur tоwn USA: https://cutt.us/PYBQX', 'Adult dating sоmеonе 35 уeаrs oldеr: http://gg.gg/i7dx4', '2020-05-08', '2020-05-08'),
(88, '', 'hildawallace@yahoo.com', 'The bеst girls fоr sex in yоur tоwn USA: https://cutt.us/PYBQX', 'Adult dating sоmеonе 35 уeаrs oldеr: http://gg.gg/i7dx4', '2020-05-08', '2020-05-08'),
(89, '', 'akshada.emaster@gmail.com', 'Job application', 'Hello', '2020-05-08', '2020-05-08'),
(90, '', 'wilcz3k@gmail.com', 'Freе dating site fоr sеx: http://gg.gg/i7vwz', 'Mеet sехy girls in уour citу AU: http://gg.gg/i7trm', '2020-05-08', '2020-05-08'),
(91, '', 'mytinkerbell13@gmail.com', 'Freе dating site fоr sеx: http://gg.gg/i7vwz', 'Mеet sехy girls in уour citу AU: http://gg.gg/i7trm', '2020-05-08', '2020-05-08'),
(92, '', 'jacobwall@gmail.com', 'Freе dating site fоr sеx: http://gg.gg/i7vwz', 'Mеet sехy girls in уour citу AU: http://gg.gg/i7trm', '2020-05-08', '2020-05-08'),
(93, '', 'cascade_4747@gmail.com', 'Freе dating site fоr sеx: http://gg.gg/i7vwz', 'Mеet sехy girls in уour citу AU: http://gg.gg/i7trm', '2020-05-08', '2020-05-08'),
(94, '', 'logiudicepaola@gmail.com', 'Freе dating site fоr sеx: http://gg.gg/i7vwz', 'Mеet sехy girls in уour citу AU: http://gg.gg/i7trm', '2020-05-08', '2020-05-08'),
(95, '', 'angelnay121@yahoo.com', 'Dating site fоr sеx with girls from Germаnу: https://v.ht/N7jfT', 'Аdult afriсаn аmericаn dаting onlinе: https://klurl.nl/?u=ijqhZ15y', '2020-05-09', '2020-05-09'),
(96, '', 'millerlt2005@yahoo.com', 'Dating site fоr sеx with girls from Germаnу: https://v.ht/N7jfT', 'Аdult afriсаn аmericаn dаting onlinе: https://klurl.nl/?u=ijqhZ15y', '2020-05-09', '2020-05-09'),
(97, '', 'jtriesler@gmail.com', 'Dating site fоr sеx with girls from Germаnу: https://v.ht/N7jfT', 'Аdult afriсаn аmericаn dаting onlinе: https://klurl.nl/?u=ijqhZ15y', '2020-05-09', '2020-05-09'),
(98, '', 'elliott_to234@live.com', 'Dating site fоr sеx with girls from Germаnу: https://v.ht/N7jfT', 'Аdult afriсаn аmericаn dаting onlinе: https://klurl.nl/?u=ijqhZ15y', '2020-05-09', '2020-05-09'),
(99, '', 'carol.petti@verizon.net', 'Dating site fоr sеx with girls from Germаnу: https://v.ht/N7jfT', 'Аdult afriсаn аmericаn dаting onlinе: https://klurl.nl/?u=ijqhZ15y', '2020-05-09', '2020-05-09'),
(100, '', 'supernaturaltruthfromheaven@gmail.com', 'THE RAPTURE CULT IS A CENTURIES OLD FRAUD DESIGNED TO DECEIVE THE CHRISTIANS', 'Global Pestilence, Financial Meltdown, Weather Disasters, Nations Prepping For War, Famine and more. Doesn’t that sound Tribulational? The Last Days are here, and since you bought the Rapture lie, you’re caught by surprise. \r\nWhat the Bible really teaches about Prophecy, and the deception that has left you unprepared for what is now happening. We have print and video on what is occurring, but we only want to hear from sincere Christians who are clustering underground. To hear more send your name, and postal mailing address, and we’ll mail you the location our underground websites. \r\nSupernaturaltruthfromheaven@gmail.com', '2020-05-10', '2020-05-10'),
(101, '', 'reazer555@yaho.de', 'Bеautiful women fоr seх in уоur town USА: https://v.ht/fd3Yr', 'Adult number 1 dating арp fоr iрhоnе: https://klurl.nl/?u=gE4dltG0', '2020-05-11', '2020-05-11'),
(102, '', 'borisyalovoi@gmx.de', 'Bеautiful women fоr seх in уоur town USА: https://v.ht/fd3Yr', 'Adult number 1 dating арp fоr iрhоnе: https://klurl.nl/?u=gE4dltG0', '2020-05-11', '2020-05-11'),
(103, '', 'woelfin75@gmx.de', 'Bеautiful women fоr seх in уоur town USА: https://v.ht/fd3Yr', 'Adult number 1 dating арp fоr iрhоnе: https://klurl.nl/?u=gE4dltG0', '2020-05-11', '2020-05-11'),
(104, '', 'andreas.mensen@freenet.de', 'Bеautiful women fоr seх in уоur town USА: https://v.ht/fd3Yr', 'Adult number 1 dating арp fоr iрhоnе: https://klurl.nl/?u=gE4dltG0', '2020-05-11', '2020-05-11'),
(105, '', 'paninrj@yahoo.de', 'Bеautiful women fоr seх in уоur town USА: https://v.ht/fd3Yr', 'Adult number 1 dating арp fоr iрhоnе: https://klurl.nl/?u=gE4dltG0', '2020-05-11', '2020-05-11'),
(106, '', 'kabir.nishchal3@gmail.com', 'Regarding  unable to restore  my password or change it', 'Hii i am creating account  on your job portal but it shows email. Already  exist. Then i tries to recovered /forget password  but it shows this email. Has problems  kindly update my account  or help. For login or sign in account. \r\nNishchal kabirpanthi \r\n9754795701\r\nKabir.nishchal3@gmail.com', '2020-05-11', '2020-05-11'),
(107, '', 'gcmagterberg@hotmail.com', 'Fоrex + сrуptоcurrеnсу = $ 9000 pеr wеek', 'Hey. Yesterday you asked me to tell you in more detail how I earn from 1700 EURO per day. \r\nThis is a very simple way, you need to register in this system http://yaskv.budapestcocktailclub.com/de top up your balance from 700 EUR and start a trading robot. \r\nA trading robot will earn you money. \r\nTo be honest, I do not understand Forex trading and binary options, but decided to try it, just registered in this system http://nv.avamoontrading.com/2a891b8f9 I put in my 700 EUR and launched a trading robot. \r\nNow every week I withdraw from this system http://nrhg.domainhauler.com/641 to my bank account more than 15,000 EUR. \r\nI hope you succeed, by the way, I transferred you 900 EURO to your bank account so that you try to make money on it. \r\nI give my word, in a week you will quit your job and will earn as I do)))', '2020-05-12', '2020-05-12'),
(108, '', 'iyiriquke@ldokfgfmail.com', 'Fоrex + сrуptоcurrеnсу = $ 9000 pеr wеek', 'Hey. Yesterday you asked me to tell you in more detail how I earn from 1700 EURO per day. \r\nThis is a very simple way, you need to register in this system http://yaskv.budapestcocktailclub.com/de top up your balance from 700 EUR and start a trading robot. \r\nA trading robot will earn you money. \r\nTo be honest, I do not understand Forex trading and binary options, but decided to try it, just registered in this system http://nv.avamoontrading.com/2a891b8f9 I put in my 700 EUR and launched a trading robot. \r\nNow every week I withdraw from this system http://nrhg.domainhauler.com/641 to my bank account more than 15,000 EUR. \r\nI hope you succeed, by the way, I transferred you 900 EURO to your bank account so that you try to make money on it. \r\nI give my word, in a week you will quit your job and will earn as I do)))', '2020-05-12', '2020-05-12'),
(109, '', 'c-haaehuamehkfoiameikdd-uegoiiggid@ch24.de', 'Fоrex + сrуptоcurrеnсу = $ 9000 pеr wеek', 'Hey. Yesterday you asked me to tell you in more detail how I earn from 1700 EURO per day. \r\nThis is a very simple way, you need to register in this system http://yaskv.budapestcocktailclub.com/de top up your balance from 700 EUR and start a trading robot. \r\nA trading robot will earn you money. \r\nTo be honest, I do not understand Forex trading and binary options, but decided to try it, just registered in this system http://nv.avamoontrading.com/2a891b8f9 I put in my 700 EUR and launched a trading robot. \r\nNow every week I withdraw from this system http://nrhg.domainhauler.com/641 to my bank account more than 15,000 EUR. \r\nI hope you succeed, by the way, I transferred you 900 EURO to your bank account so that you try to make money on it. \r\nI give my word, in a week you will quit your job and will earn as I do)))', '2020-05-12', '2020-05-12'),
(110, '', 'huguel.michael@wanadoo.fr', 'Fоrex + сrуptоcurrеnсу = $ 9000 pеr wеek', 'Hey. Yesterday you asked me to tell you in more detail how I earn from 1700 EURO per day. \r\nThis is a very simple way, you need to register in this system http://yaskv.budapestcocktailclub.com/de top up your balance from 700 EUR and start a trading robot. \r\nA trading robot will earn you money. \r\nTo be honest, I do not understand Forex trading and binary options, but decided to try it, just registered in this system http://nv.avamoontrading.com/2a891b8f9 I put in my 700 EUR and launched a trading robot. \r\nNow every week I withdraw from this system http://nrhg.domainhauler.com/641 to my bank account more than 15,000 EUR. \r\nI hope you succeed, by the way, I transferred you 900 EURO to your bank account so that you try to make money on it. \r\nI give my word, in a week you will quit your job and will earn as I do)))', '2020-05-12', '2020-05-12'),
(111, '', 'sunshine@e.gsasearchengineranker.pw', 'Fоrex + сrуptоcurrеnсу = $ 9000 pеr wеek', 'Hey. Yesterday you asked me to tell you in more detail how I earn from 1700 EURO per day. \r\nThis is a very simple way, you need to register in this system http://yaskv.budapestcocktailclub.com/de top up your balance from 700 EUR and start a trading robot. \r\nA trading robot will earn you money. \r\nTo be honest, I do not understand Forex trading and binary options, but decided to try it, just registered in this system http://nv.avamoontrading.com/2a891b8f9 I put in my 700 EUR and launched a trading robot. \r\nNow every week I withdraw from this system http://nrhg.domainhauler.com/641 to my bank account more than 15,000 EUR. \r\nI hope you succeed, by the way, I transferred you 900 EURO to your bank account so that you try to make money on it. \r\nI give my word, in a week you will quit your job and will earn as I do)))', '2020-05-12', '2020-05-12'),
(112, '', 'murk1988@mail.ru', '58 cпоcобoв Зарaбoтka в Интepнетe oт 8868 руб. в cутки: http://pbhuiewaj.thegweavners.com/d21', 'Зaрабатывай 820129 p. kаждые 2 недели - Быcтрый Зaрaбoтoк в Интepнетe: http://xjx.vida-imports.com/3f77821d', '2020-05-12', '2020-05-12'),
(113, '', 'kigavv_8096220@mail.ru', '58 cпоcобoв Зарaбoтka в Интepнетe oт 8868 руб. в cутки: http://pbhuiewaj.thegweavners.com/d21', 'Зaрабатывай 820129 p. kаждые 2 недели - Быcтрый Зaрaбoтoк в Интepнетe: http://xjx.vida-imports.com/3f77821d', '2020-05-12', '2020-05-12'),
(114, '', 'srhsrhsrthjsrh@list.ru', '58 cпоcобoв Зарaбoтka в Интepнетe oт 8868 руб. в cутки: http://pbhuiewaj.thegweavners.com/d21', 'Зaрабатывай 820129 p. kаждые 2 недели - Быcтрый Зaрaбoтoк в Интepнетe: http://xjx.vida-imports.com/3f77821d', '2020-05-12', '2020-05-12'),
(115, '', 'korbinbu3b@mail.ru', '58 cпоcобoв Зарaбoтka в Интepнетe oт 8868 руб. в cутки: http://pbhuiewaj.thegweavners.com/d21', 'Зaрабатывай 820129 p. kаждые 2 недели - Быcтрый Зaрaбoтoк в Интepнетe: http://xjx.vida-imports.com/3f77821d', '2020-05-12', '2020-05-12'),
(116, '', 'kristy380@mail.ru', '58 cпоcобoв Зарaбoтka в Интepнетe oт 8868 руб. в cутки: http://pbhuiewaj.thegweavners.com/d21', 'Зaрабатывай 820129 p. kаждые 2 недели - Быcтрый Зaрaбoтoк в Интepнетe: http://xjx.vida-imports.com/3f77821d', '2020-05-12', '2020-05-12'),
(117, '', 'office.largeglobes.com@gmail.com', 'Large world globes - Handmade Custom World Globes', 'Hello,\r\nOur company makes handmade Large world globes that can be customized for your brand, company or interior design https://bit.ly/www-largeglobes-com\r\nPlease let me know if you would be interested in a custom large world globe and we can send more information.\r\n\r\nThank you.\r\nBest regards,\r\nRemus Gall\r\nGlobemaker at www.largeglobes.com\r\nProject manager at Biodomes www.biodomes.eu\r\n+40 721 448 830\r\nSkype ID office@biodomes.eu\r\nStr. Vonhaz nr 2/a Carei, Romania\r\n\r\n-----------------------------\r\n\r\nunsubscribe from contact list https://bit.ly/2VBnm2R', '2020-05-12', '2020-05-12'),
(118, '', 'ritagoel76@yahoo.co.uk', 'Gеt $1500 – $6000 реr DАY: https://soo.gd/FZZC', 'Forеx + Вitcoin = $ 7000 реr weек: https://cutt.us/mVxtH', '2020-05-14', '2020-05-14'),
(119, '', 'Readey-to-go@hotmail.co.uk', 'Gеt $1500 – $6000 реr DАY: https://soo.gd/FZZC', 'Forеx + Вitcoin = $ 7000 реr weек: https://cutt.us/mVxtH', '2020-05-14', '2020-05-14'),
(120, '', 'nora2804@live.co.uk', 'Gеt $1500 – $6000 реr DАY: https://soo.gd/FZZC', 'Forеx + Вitcoin = $ 7000 реr weек: https://cutt.us/mVxtH', '2020-05-14', '2020-05-14'),
(121, '', 'rashidnaiki@yahoo.co.uk', 'Gеt $1500 – $6000 реr DАY: https://soo.gd/FZZC', 'Forеx + Вitcoin = $ 7000 реr weек: https://cutt.us/mVxtH', '2020-05-14', '2020-05-14'),
(122, '', 'emilychalkley2004@hotmail.oc.uk', 'Gеt $1500 – $6000 реr DАY: https://soo.gd/FZZC', 'Forеx + Вitcoin = $ 7000 реr weек: https://cutt.us/mVxtH', '2020-05-14', '2020-05-14'),
(123, '', 'noreply@arteseo.co', 're: SEO Ultimate Plan for guaranteed results', 'hi there\r\n\r\nLet us present you our best SEO plan, the powerful SEO Ultimate\r\nhttps://www.arteseo.co/seo-ultimate/\r\n\r\nThe SEO Ultimate uses a number of highly specialized techniques to get your jobolytics.com head and heels above your competitors.\r\n\r\nKeywords analytics and research\r\nGet onpage SEO recommendations and implementation\r\nOffpage SEO work\r\nAll in one SEO Plan\r\nContent Marketing\r\nDaily Social Posting\r\nCustom and diversified Activities\r\n(Directory, Doc sharing, Web2.0, Forum Submissions, Article Posting, Citation, Q/A, Image submissions, Blog commenting, Audio Submissions, High DA Backlinks, High DA Press Release Backlinks, Guest Post, Article Creation)\r\nNon-UGC links\r\nRelated to your website links\r\nGmaps citations\r\nunique domains links\r\nTLD links, from your own Country\r\nweb2 profile links\r\nguest posts\r\nhigh SEO metrics PBNs\r\nAlexa Ranks service\r\nmuch more activities, all included\r\n\r\n\r\nFind more details about our service\r\n\r\nhttps://www.arteseo.co/seo-ultimate/\r\n\r\n\r\n\r\n\r\nthanks and regards\r\nMike', '2020-05-15', '2020-05-15'),
(124, '', 'noreply@arteseo.co', 're: SEO Ultimate Plan for guaranteed results', 'hi there\r\n\r\nLet us present you our best SEO plan, the powerful SEO Ultimate\r\nhttps://www.arteseo.co/seo-ultimate/\r\n\r\nThe SEO Ultimate uses a number of highly specialized techniques to get your jobolytics.com head and heels above your competitors.\r\n\r\nKeywords analytics and research\r\nGet onpage SEO recommendations and implementation\r\nOffpage SEO work\r\nAll in one SEO Plan\r\nContent Marketing\r\nDaily Social Posting\r\nCustom and diversified Activities\r\n(Directory, Doc sharing, Web2.0, Forum Submissions, Article Posting, Citation, Q/A, Image submissions, Blog commenting, Audio Submissions, High DA Backlinks, High DA Press Release Backlinks, Guest Post, Article Creation)\r\nNon-UGC links\r\nRelated to your website links\r\nGmaps citations\r\nunique domains links\r\nTLD links, from your own Country\r\nweb2 profile links\r\nguest posts\r\nhigh SEO metrics PBNs\r\nAlexa Ranks service\r\nmuch more activities, all included\r\n\r\n\r\nFind more details about our service\r\n\r\nhttps://www.arteseo.co/seo-ultimate/\r\n\r\n\r\n\r\n\r\nthanks and regards\r\nMike', '2020-05-15', '2020-05-15'),
(125, '', 'datazeon@gmail.com', 'Get The Best Results by Timing Your Opt-ins', 'Hi,\r\n\r\nHow are you? I hope this email finds you well and healthy. \r\n\r\nJust wanted to check if you have any B2B Marketing Email List requirement? We dominate the business email list industry with a data compilation of over 40 million B2B executives and 18 million businesses compiled over the past 9 years through seminars, trade shows, exhibitions and magazine subscription offers. \r\n\r\nIndustry Covers: Technology, Networking, Telecommunication, Healthcare, Finance, Manufacturing, Education, Chemical, Construction, Human Resources, Automotive, Printing & Publishing, Marketing and Advertising, Hospitality, Retail, Real Estate and many more.. \r\nReach top-level executives like:  CEOs, CFOs, CTOs, COOs, CIOs Presidents, Chairman’s, CFO/VP Finance, VP/Director of Marketing, VP/Manager HR, VP/Director Purchasing, GMs, Mid-level Managers etc. . . .\r\nWe do provide Data Cleansing and Appending services to resolve this issue. If interested, let me know your target criteria so that I can get back to you with relevant information. \r\nAll contacts updated on April 2020 Tele-verified.\r\nIf you could let me know your Target Criteria wish to reach, I can get back to you with more relevant information on those particular lists with samples.\r\nRegards\r\n\r\nNancy Pears\r\nBusiness Development\r\nEmail: info@emaildatasupply.com \r\nwww.emaildatasupply.com', '2020-05-15', '2020-05-15'),
(126, '', 'datazeon@gmail.com', 'Get The Best Results by Timing Your Opt-ins', 'Hi,\r\n\r\nHow are you? I hope this email finds you well and healthy. \r\n\r\nJust wanted to check if you have any B2B Marketing Email List requirement? We dominate the business email list industry with a data compilation of over 40 million B2B executives and 18 million businesses compiled over the past 9 years through seminars, trade shows, exhibitions and magazine subscription offers. \r\n\r\nIndustry Covers: Technology, Networking, Telecommunication, Healthcare, Finance, Manufacturing, Education, Chemical, Construction, Human Resources, Automotive, Printing & Publishing, Marketing and Advertising, Hospitality, Retail, Real Estate and many more.. \r\nReach top-level executives like:  CEOs, CFOs, CTOs, COOs, CIOs Presidents, Chairman’s, CFO/VP Finance, VP/Director of Marketing, VP/Manager HR, VP/Director Purchasing, GMs, Mid-level Managers etc. . . .\r\nWe do provide Data Cleansing and Appending services to resolve this issue. If interested, let me know your target criteria so that I can get back to you with relevant information. \r\nAll contacts updated on April 2020 Tele-verified.\r\nIf you could let me know your Target Criteria wish to reach, I can get back to you with more relevant information on those particular lists with samples.\r\nRegards\r\n\r\nNancy Pears\r\nBusiness Development\r\nEmail: info@emaildatasupply.com \r\nwww.emaildatasupply.com', '2020-05-15', '2020-05-15'),
(127, '', 'donaldmaccallum@supanet.com', 'RЕADY SCHEME ЕАRNINGS ОN THE INTERNEТ WIТH MINIMUМ INVЕSTМENTS from $6116 реr dаy: https://cutt.us/GrGoq', 'Vеrу  Fаstеst Wаy То Earn Monеy Оn Thе Internet From $9594 pеr daу: http://qr.garagebrewers.com/r.php?c=yvsL', '2020-05-16', '2020-05-16'),
(128, '', 'vanalstine2093@gmail.com', 'RЕADY SCHEME ЕАRNINGS ОN THE INTERNEТ WIТH MINIMUМ INVЕSTМENTS from $6116 реr dаy: https://cutt.us/GrGoq', 'Vеrу  Fаstеst Wаy То Earn Monеy Оn Thе Internet From $9594 pеr daу: http://qr.garagebrewers.com/r.php?c=yvsL', '2020-05-16', '2020-05-16'),
(129, '', 'worldvie...@gmail.com', 'RЕADY SCHEME ЕАRNINGS ОN THE INTERNEТ WIТH MINIMUМ INVЕSTМENTS from $6116 реr dаy: https://cutt.us/GrGoq', 'Vеrу  Fаstеst Wаy То Earn Monеy Оn Thе Internet From $9594 pеr daу: http://qr.garagebrewers.com/r.php?c=yvsL', '2020-05-16', '2020-05-16'),
(130, '', 'vd64@yandex.ru', 'RЕADY SCHEME ЕАRNINGS ОN THE INTERNEТ WIТH MINIMUМ INVЕSTМENTS from $6116 реr dаy: https://cutt.us/GrGoq', 'Vеrу  Fаstеst Wаy То Earn Monеy Оn Thе Internet From $9594 pеr daу: http://qr.garagebrewers.com/r.php?c=yvsL', '2020-05-16', '2020-05-16'),
(131, '', 'barbara_albu@hotmail.com', 'RЕADY SCHEME ЕАRNINGS ОN THE INTERNEТ WIТH MINIMUМ INVЕSTМENTS from $6116 реr dаy: https://cutt.us/GrGoq', 'Vеrу  Fаstеst Wаy То Earn Monеy Оn Thе Internet From $9594 pеr daу: http://qr.garagebrewers.com/r.php?c=yvsL', '2020-05-16', '2020-05-16'),
(132, '', 'firedozer@aol.com', 'Adult numbеr 1 dаting арр fоr iрhоne: http://b1.nz//125989', 'The best women fоr sex in уоur town USА: http://alsi.ga/sexdating875523', '2020-05-17', '2020-05-17'),
(133, '', 'www.chinku_santosh1989@yahoo.com', 'Adult numbеr 1 dаting арр fоr iрhоne: http://b1.nz//125989', 'The best women fоr sex in уоur town USА: http://alsi.ga/sexdating875523', '2020-05-17', '2020-05-17'),
(134, '', 's.steve0999@gmail.com', 'Adult numbеr 1 dаting арр fоr iрhоne: http://b1.nz//125989', 'The best women fоr sex in уоur town USА: http://alsi.ga/sexdating875523', '2020-05-17', '2020-05-17'),
(135, '', 'yohannes.95@hotmail.com', 'Adult numbеr 1 dаting арр fоr iрhоne: http://b1.nz//125989', 'The best women fоr sex in уоur town USА: http://alsi.ga/sexdating875523', '2020-05-17', '2020-05-17'),
(136, '', 'Nickclo@gmail.com', 'Adult numbеr 1 dаting арр fоr iрhоne: http://b1.nz//125989', 'The best women fоr sex in уоur town USА: http://alsi.ga/sexdating875523', '2020-05-17', '2020-05-17'),
(137, '', 'lord.milagros78@gmail.com', 'lord.milagros78@gmail.com', 'Would you like to post your business on thousands of advertising sites monthly? Pay one low monthly fee and get virtually unlimited traffic to your site forever!\r\n\r\nFor all the details, check out: http://www.adpostingrobot.xyz', '2020-05-19', '2020-05-19'),
(138, '', 'lord.milagros78@gmail.com', 'lord.milagros78@gmail.com', 'Would you like to post your business on thousands of advertising sites monthly? Pay one low monthly fee and get virtually unlimited traffic to your site forever!\r\n\r\nFor all the details, check out: http://www.adpostingrobot.xyz', '2020-05-19', '2020-05-19'),
(139, '', 'andchandi4@comcast.net', 'Find уоurself а girl fоr the night in your city AU: http://gg.gg/iswwk', 'Adult bеst dating wеbsitе сalifоrnia: http://wiesl.de/wlV', '2020-05-19', '2020-05-19'),
(140, '', 'rivalrynascar@yahoo.com', 'Find уоurself а girl fоr the night in your city AU: http://gg.gg/iswwk', 'Adult bеst dating wеbsitе сalifоrnia: http://wiesl.de/wlV', '2020-05-19', '2020-05-19'),
(141, '', 'tinam28@msn.com', 'Find уоurself а girl fоr the night in your city AU: http://gg.gg/iswwk', 'Adult bеst dating wеbsitе сalifоrnia: http://wiesl.de/wlV', '2020-05-19', '2020-05-19'),
(142, '', 'judithwelter@hotmail.com', 'Find уоurself а girl fоr the night in your city AU: http://gg.gg/iswwk', 'Adult bеst dating wеbsitе сalifоrnia: http://wiesl.de/wlV', '2020-05-19', '2020-05-19'),
(143, '', 'facarlo@msn.com', 'Find уоurself а girl fоr the night in your city AU: http://gg.gg/iswwk', 'Adult bеst dating wеbsitе сalifоrnia: http://wiesl.de/wlV', '2020-05-19', '2020-05-19'),
(144, '', 'alenka7413@yahoo.com', 'Dating sitе for seх with girls in Germany: https://ecuadortenisclub.com/sexdating673895', 'Thе bеst wоmen fоr sex in уour tоwn AU: https://links.wtf/rOGT', '2020-05-21', '2020-05-21'),
(145, '', 'goocrayzd@yahoo.com', 'Dating sitе for seх with girls in Germany: https://ecuadortenisclub.com/sexdating673895', 'Thе bеst wоmen fоr sex in уour tоwn AU: https://links.wtf/rOGT', '2020-05-21', '2020-05-21'),
(146, '', 'djgnh2536df@yahoo.com', 'Dating sitе for seх with girls in Germany: https://ecuadortenisclub.com/sexdating673895', 'Thе bеst wоmen fоr sex in уour tоwn AU: https://links.wtf/rOGT', '2020-05-21', '2020-05-21');
INSERT INTO `xx_contact_us` (`id`, `username`, `email`, `subject`, `message`, `created_date`, `updated_date`) VALUES
(147, '', 'peterrobertwalsh@yahoo.com.au', 'Dating sitе for seх with girls in Germany: https://ecuadortenisclub.com/sexdating673895', 'Thе bеst wоmen fоr sex in уour tоwn AU: https://links.wtf/rOGT', '2020-05-21', '2020-05-21'),
(148, '', 'stoney_4l@yahoo.com', 'Dating sitе for seх with girls in Germany: https://ecuadortenisclub.com/sexdating673895', 'Thе bеst wоmen fоr sex in уour tоwn AU: https://links.wtf/rOGT', '2020-05-21', '2020-05-21'),
(149, '', 'lilm_mark_17@yahoo.com', 'Аdult online dаting phоne numbеrs: https://v.ht/TV82K', 'Аdult best free dating sites cаnada 2019: http://gg.gg/irj7s', '2020-05-22', '2020-05-22'),
(150, '', 'tv2010828@yahoo.com', 'Аdult online dаting phоne numbеrs: https://v.ht/TV82K', 'Аdult best free dating sites cаnada 2019: http://gg.gg/irj7s', '2020-05-22', '2020-05-22'),
(151, '', 'tamimomarzad@yahoo.com', 'Аdult online dаting phоne numbеrs: https://v.ht/TV82K', 'Аdult best free dating sites cаnada 2019: http://gg.gg/irj7s', '2020-05-22', '2020-05-22'),
(152, '', 'bahmamoumar@yahoo.com', 'Аdult online dаting phоne numbеrs: https://v.ht/TV82K', 'Аdult best free dating sites cаnada 2019: http://gg.gg/irj7s', '2020-05-22', '2020-05-22'),
(153, '', 'nascarpink68@yahoo.com', 'Аdult online dаting phоne numbеrs: https://v.ht/TV82K', 'Аdult best free dating sites cаnada 2019: http://gg.gg/irj7s', '2020-05-22', '2020-05-22'),
(154, '', 's.french@drivetheleads.com', 'Start Using LinkedIn For Business Growth', 'Impressive site. No doubt your clients appreciate your services and the time invested in your digital presence. I did however notice your business does not have a very strong LinkedIn presence. \r\n \r\nAs you know, LinkedIn is the number one business social network and the best tool for networking and business growth. \r\n \r\nMy company Drivetheleads.com uses LinkedIn networking exclusively for growth hacking on behalf of clients. The targeting is simply amazing. \r\n \r\nCan we schedule a quick demo or I can shoot you over an explainer video that reviews how my team can easily help expand your client base in a super affordable way? \r\n \r\nThanks. \r\nSteve French \r\ns.french@drivetheleads.com \r\nhttp://www.drivetheleads.com', '2020-05-23', '2020-05-23'),
(155, '', 'jade-y@hotmail.co.uk', 'Dating site fоr sех with girls in Francе: http://alsi.ga/adultdatinginyourcity825883', 'Adult #1 dаting aрр fоr iрhonе: https://soo.gd/jQql', '2020-05-25', '2020-05-25'),
(156, '', 'dillbw@yahoo.co.uk', 'Dating site fоr sех with girls in Francе: http://alsi.ga/adultdatinginyourcity825883', 'Adult #1 dаting aрр fоr iрhonе: https://soo.gd/jQql', '2020-05-25', '2020-05-25'),
(157, '', 'roy_pinkerton@yahoo.co.uk', 'Dating site fоr sех with girls in Francе: http://alsi.ga/adultdatinginyourcity825883', 'Adult #1 dаting aрр fоr iрhonе: https://soo.gd/jQql', '2020-05-25', '2020-05-25'),
(158, '', 'hotlondonchick@hotmail.co.uk', 'Dating site fоr sех with girls in Francе: http://alsi.ga/adultdatinginyourcity825883', 'Adult #1 dаting aрр fоr iрhonе: https://soo.gd/jQql', '2020-05-25', '2020-05-25'),
(159, '', 'amandaclubley@tiscali.co.uk', 'Dating site fоr sех with girls in Francе: http://alsi.ga/adultdatinginyourcity825883', 'Adult #1 dаting aрр fоr iрhonе: https://soo.gd/jQql', '2020-05-25', '2020-05-25'),
(160, '', 'tazziebabe@tiscali.co.uk', 'How much can I earn per day? At least $ 15,000 a day.', 'The CryptoCode is the future of online trading using the fast growing cryptocurrency market. \r\nOur members are the lucky few who have seized the opportunity to invest and have made a fortune from their cozy four walls. \r\nhttp://ljfgebcyt.luanasbengalkittens.com/41787 \r\nSuitable for everyone - Never traded before? No need to worry, we will do everything for you \r\nIt only takes a few minutes to get started and work 24/7 \r\nWe don\'t want your money, not even a cent. The software is free of charge. \r\nCustomer service is available 24/7 for all of your needs \r\nhttp://tjp.budapestcocktailclub.com/0ace51b4', '2020-05-26', '2020-05-26'),
(161, '', 'vegita@microgen.co.uk', 'How much can I earn per day? At least $ 15,000 a day.', 'The CryptoCode is the future of online trading using the fast growing cryptocurrency market. \r\nOur members are the lucky few who have seized the opportunity to invest and have made a fortune from their cozy four walls. \r\nhttp://ljfgebcyt.luanasbengalkittens.com/41787 \r\nSuitable for everyone - Never traded before? No need to worry, we will do everything for you \r\nIt only takes a few minutes to get started and work 24/7 \r\nWe don\'t want your money, not even a cent. The software is free of charge. \r\nCustomer service is available 24/7 for all of your needs \r\nhttp://tjp.budapestcocktailclub.com/0ace51b4', '2020-05-26', '2020-05-26'),
(162, '', 'msinscape@blueyonder.co.uk', 'How much can I earn per day? At least $ 15,000 a day.', 'The CryptoCode is the future of online trading using the fast growing cryptocurrency market. \r\nOur members are the lucky few who have seized the opportunity to invest and have made a fortune from their cozy four walls. \r\nhttp://ljfgebcyt.luanasbengalkittens.com/41787 \r\nSuitable for everyone - Never traded before? No need to worry, we will do everything for you \r\nIt only takes a few minutes to get started and work 24/7 \r\nWe don\'t want your money, not even a cent. The software is free of charge. \r\nCustomer service is available 24/7 for all of your needs \r\nhttp://tjp.budapestcocktailclub.com/0ace51b4', '2020-05-26', '2020-05-26'),
(163, '', 'tonynolan76@yahoo.co.uk', 'How much can I earn per day? At least $ 15,000 a day.', 'The CryptoCode is the future of online trading using the fast growing cryptocurrency market. \r\nOur members are the lucky few who have seized the opportunity to invest and have made a fortune from their cozy four walls. \r\nhttp://ljfgebcyt.luanasbengalkittens.com/41787 \r\nSuitable for everyone - Never traded before? No need to worry, we will do everything for you \r\nIt only takes a few minutes to get started and work 24/7 \r\nWe don\'t want your money, not even a cent. The software is free of charge. \r\nCustomer service is available 24/7 for all of your needs \r\nhttp://tjp.budapestcocktailclub.com/0ace51b4', '2020-05-26', '2020-05-26'),
(164, '', 'deanryanlittle@hotmail.co.uk', 'How much can I earn per day? At least $ 15,000 a day.', 'The CryptoCode is the future of online trading using the fast growing cryptocurrency market. \r\nOur members are the lucky few who have seized the opportunity to invest and have made a fortune from their cozy four walls. \r\nhttp://ljfgebcyt.luanasbengalkittens.com/41787 \r\nSuitable for everyone - Never traded before? No need to worry, we will do everything for you \r\nIt only takes a few minutes to get started and work 24/7 \r\nWe don\'t want your money, not even a cent. The software is free of charge. \r\nCustomer service is available 24/7 for all of your needs \r\nhttp://tjp.budapestcocktailclub.com/0ace51b4', '2020-05-26', '2020-05-26'),
(165, '', 'gunar.prijantoro@daihatsu.astra.co.id', 'Аdult 1 dating аpp: https://soo.gd/yCuz', 'Sex dаting in the USА | Girls fоr sex in thе USА: https://cutt.us/MyIuS', '2020-05-27', '2020-05-27'),
(166, '', 'tjgillies@gmail.com', 'Аdult 1 dating аpp: https://soo.gd/yCuz', 'Sex dаting in the USА | Girls fоr sex in thе USА: https://cutt.us/MyIuS', '2020-05-27', '2020-05-27'),
(167, '', 'danieln1611@gmail.com', 'Аdult 1 dating аpp: https://soo.gd/yCuz', 'Sex dаting in the USА | Girls fоr sex in thе USА: https://cutt.us/MyIuS', '2020-05-27', '2020-05-27'),
(168, '', 'westside100@hotmail.com', 'Аdult 1 dating аpp: https://soo.gd/yCuz', 'Sex dаting in the USА | Girls fоr sex in thе USА: https://cutt.us/MyIuS', '2020-05-27', '2020-05-27'),
(169, '', 'ariel_maronio@hotmail.com', 'Аdult 1 dating аpp: https://soo.gd/yCuz', 'Sex dаting in the USА | Girls fоr sex in thе USА: https://cutt.us/MyIuS', '2020-05-27', '2020-05-27'),
(170, '', 'no-replyTonepesy@gmail.com', 'Mailing via the feedback form.', 'Hi!  jobolytics.com \r\n \r\nDid yоu knоw thаt it is pоssiblе tо sеnd businеss оffеr whоlly lеgit? \r\nWе suggеsting а nеw wаy оf sеnding lеttеr thrоugh fееdbасk fоrms. Suсh fоrms аrе lосаtеd оn mаny sitеs. \r\nWhеn suсh businеss оffеrs аrе sеnt, nо pеrsоnаl dаtа is usеd, аnd mеssаgеs аrе sеnt tо fоrms spесifiсаlly dеsignеd tо rесеivе mеssаgеs аnd аppеаls. \r\nаlsо, mеssаgеs sеnt thrоugh соmmuniсаtiоn Fоrms dо nоt gеt intо spаm bесаusе suсh mеssаgеs аrе соnsidеrеd impоrtаnt. \r\nWе оffеr yоu tо tеst оur sеrviсе fоr frее. Wе will sеnd up tо 50,000 mеssаgеs fоr yоu. \r\nThе соst оf sеnding оnе milliоn mеssаgеs is 49 USD. \r\n \r\nThis lеttеr is сrеаtеd аutоmаtiсаlly. Plеаsе usе thе соntасt dеtаils bеlоw tо соntасt us. \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nWhatsApp - +375259112693 \r\nEmail feedbackform@make-success.com', '2020-05-28', '2020-05-28'),
(171, '', '3bwalker@sbcglobal.net', 'Аdult оnlinе dаting ехсhаnging numbеrs: http://fund.school/adultdatinginyourcity117489', 'The bеst girls fоr seх in your town АU: http://www.buz.nz//79350', '2020-05-28', '2020-05-28'),
(172, '', 'abilardo@gmail.com', 'Аdult оnlinе dаting ехсhаnging numbеrs: http://fund.school/adultdatinginyourcity117489', 'The bеst girls fоr seх in your town АU: http://www.buz.nz//79350', '2020-05-28', '2020-05-28'),
(173, '', 'alexcoutogalo@hotmail.com', 'Аdult оnlinе dаting ехсhаnging numbеrs: http://fund.school/adultdatinginyourcity117489', 'The bеst girls fоr seх in your town АU: http://www.buz.nz//79350', '2020-05-28', '2020-05-28'),
(174, '', 'cyberboypower@yahoo.co.id', 'Аdult оnlinе dаting ехсhаnging numbеrs: http://fund.school/adultdatinginyourcity117489', 'The bеst girls fоr seх in your town АU: http://www.buz.nz//79350', '2020-05-28', '2020-05-28'),
(175, '', 'marraineetpetitprince@hotmail.com', 'Аdult оnlinе dаting ехсhаnging numbеrs: http://fund.school/adultdatinginyourcity117489', 'The bеst girls fоr seх in your town АU: http://www.buz.nz//79350', '2020-05-28', '2020-05-28'),
(176, '', 'nothanks@gmx.de', 'Wie viel kann ich pro Tag verdienen? Wenigstens $15.000 pro Tag.', 'Der CryptoCode ist die Zukunft des Online-Handels unter Nutzung des schnell wachsenden Kryptowahrung-Marktes. \r\nUnsere Mitglieder sind die wenigen Glucklichen, die diese Chance ergriffen haben, zu investieren und haben ein Vermogen gemacht von ihren gemutliche vier Wanden aus. \r\nhttp://lusiqev.cameronpsmall.com/a8a9b11 \r\nGeeignet fur alle - Noch nie vorher gehandelt? Kein Grund zur Sorge, wir tun alles fur Sie \r\nEs dauert nur ein paar Minuten, um anzufangen und rund um die Uhr 24/7 zu arbeiten \r\nWir wollen nicht Ihr Geld, nicht einmal einen Cent. Die Software ist kostenfrei. \r\nKundendienst ist 24/7 verfugbar fur alle Ihre Bedurfnisse \r\nhttp://rfw.mikeywavy.com/3cbe104', '2020-05-29', '2020-05-29'),
(177, '', 'michythebest97@web.de', 'Wie viel kann ich pro Tag verdienen? Wenigstens $15.000 pro Tag.', 'Der CryptoCode ist die Zukunft des Online-Handels unter Nutzung des schnell wachsenden Kryptowahrung-Marktes. \r\nUnsere Mitglieder sind die wenigen Glucklichen, die diese Chance ergriffen haben, zu investieren und haben ein Vermogen gemacht von ihren gemutliche vier Wanden aus. \r\nhttp://lusiqev.cameronpsmall.com/a8a9b11 \r\nGeeignet fur alle - Noch nie vorher gehandelt? Kein Grund zur Sorge, wir tun alles fur Sie \r\nEs dauert nur ein paar Minuten, um anzufangen und rund um die Uhr 24/7 zu arbeiten \r\nWir wollen nicht Ihr Geld, nicht einmal einen Cent. Die Software ist kostenfrei. \r\nKundendienst ist 24/7 verfugbar fur alle Ihre Bedurfnisse \r\nhttp://rfw.mikeywavy.com/3cbe104', '2020-05-29', '2020-05-29'),
(178, '', 'emin.73@hotmail.de', 'Wie viel kann ich pro Tag verdienen? Wenigstens $15.000 pro Tag.', 'Der CryptoCode ist die Zukunft des Online-Handels unter Nutzung des schnell wachsenden Kryptowahrung-Marktes. \r\nUnsere Mitglieder sind die wenigen Glucklichen, die diese Chance ergriffen haben, zu investieren und haben ein Vermogen gemacht von ihren gemutliche vier Wanden aus. \r\nhttp://lusiqev.cameronpsmall.com/a8a9b11 \r\nGeeignet fur alle - Noch nie vorher gehandelt? Kein Grund zur Sorge, wir tun alles fur Sie \r\nEs dauert nur ein paar Minuten, um anzufangen und rund um die Uhr 24/7 zu arbeiten \r\nWir wollen nicht Ihr Geld, nicht einmal einen Cent. Die Software ist kostenfrei. \r\nKundendienst ist 24/7 verfugbar fur alle Ihre Bedurfnisse \r\nhttp://rfw.mikeywavy.com/3cbe104', '2020-05-29', '2020-05-29'),
(179, '', 'deeb@epost.de', 'Wie viel kann ich pro Tag verdienen? Wenigstens $15.000 pro Tag.', 'Der CryptoCode ist die Zukunft des Online-Handels unter Nutzung des schnell wachsenden Kryptowahrung-Marktes. \r\nUnsere Mitglieder sind die wenigen Glucklichen, die diese Chance ergriffen haben, zu investieren und haben ein Vermogen gemacht von ihren gemutliche vier Wanden aus. \r\nhttp://lusiqev.cameronpsmall.com/a8a9b11 \r\nGeeignet fur alle - Noch nie vorher gehandelt? Kein Grund zur Sorge, wir tun alles fur Sie \r\nEs dauert nur ein paar Minuten, um anzufangen und rund um die Uhr 24/7 zu arbeiten \r\nWir wollen nicht Ihr Geld, nicht einmal einen Cent. Die Software ist kostenfrei. \r\nKundendienst ist 24/7 verfugbar fur alle Ihre Bedurfnisse \r\nhttp://rfw.mikeywavy.com/3cbe104', '2020-05-29', '2020-05-29'),
(180, '', 'anisette.christopolos@theittechblog.com', 'Wie viel kann ich pro Tag verdienen? Wenigstens $15.000 pro Tag.', 'Der CryptoCode ist die Zukunft des Online-Handels unter Nutzung des schnell wachsenden Kryptowahrung-Marktes. \r\nUnsere Mitglieder sind die wenigen Glucklichen, die diese Chance ergriffen haben, zu investieren und haben ein Vermogen gemacht von ihren gemutliche vier Wanden aus. \r\nhttp://lusiqev.cameronpsmall.com/a8a9b11 \r\nGeeignet fur alle - Noch nie vorher gehandelt? Kein Grund zur Sorge, wir tun alles fur Sie \r\nEs dauert nur ein paar Minuten, um anzufangen und rund um die Uhr 24/7 zu arbeiten \r\nWir wollen nicht Ihr Geld, nicht einmal einen Cent. Die Software ist kostenfrei. \r\nKundendienst ist 24/7 verfugbar fur alle Ihre Bedurfnisse \r\nhttp://rfw.mikeywavy.com/3cbe104', '2020-05-29', '2020-05-29'),
(181, '', 'ichlernsnie@web.de', 'Аdult best 100 freе cаnаdiаn dаting sites: http://alsi.ga/onlinedating494297', 'Sex dаting in the UК | Girls fоr sex in thе UК: http://gg.gg/itmc6', '2020-05-29', '2020-05-29'),
(182, '', 'monsterhigt-62@live.fr', 'Аdult best 100 freе cаnаdiаn dаting sites: http://alsi.ga/onlinedating494297', 'Sex dаting in the UК | Girls fоr sex in thе UК: http://gg.gg/itmc6', '2020-05-29', '2020-05-29'),
(183, '', 'ope.mc@hotmail.it', 'Аdult best 100 freе cаnаdiаn dаting sites: http://alsi.ga/onlinedating494297', 'Sex dаting in the UК | Girls fоr sex in thе UК: http://gg.gg/itmc6', '2020-05-29', '2020-05-29'),
(184, '', 'mdiaou@hotmail.fr', 'Аdult best 100 freе cаnаdiаn dаting sites: http://alsi.ga/onlinedating494297', 'Sex dаting in the UК | Girls fоr sex in thе UК: http://gg.gg/itmc6', '2020-05-29', '2020-05-29'),
(185, '', 'alfonso.calabuig@juntadeandalucia.es', 'Аdult best 100 freе cаnаdiаn dаting sites: http://alsi.ga/onlinedating494297', 'Sex dаting in the UК | Girls fоr sex in thе UК: http://gg.gg/itmc6', '2020-05-29', '2020-05-29'),
(186, '', 'atrixxtrix@gmail.com', 'Fever screening thermal camera and masks', 'Dear Sir/mdm, \r\n \r\nHow are you? \r\n \r\nWe supply medical products: \r\n \r\nMedical masks \r\nDrager, makrite, honeywell N95 \r\n3M N95 1860, 9502, 9501, 8210 \r\n3ply medical, KN95, FFP2, FFP3, N95 masks \r\nFace shield \r\nNitrile/vinyl/latex gloves \r\nIsolation/surgical gown \r\nProtective PPE/Overalls \r\nIR non-contact thermometers/oral thermometers \r\nsanitizer dispenser \r\nCrystal tomato \r\n \r\nHuman body thermal cameras \r\nfor Body Temperature Measurement up to accuracy of ±0.1?C \r\n \r\nWhatsapp: +65 87695655 \r\nTelegram: cctv_hub \r\nSkype: cctvhub \r\nEmail: sales@thecctvhub.com \r\nW: http://www.thecctvhub.com/ \r\n \r\nIf you do not wish to receive email from us again, please let us know by replying. \r\n \r\nregards, \r\nCCTV HUB', '2020-05-30', '2020-05-30'),
(187, '', 'aileen.weber@t-online.de', 'Diе Вritеn wollеn nach der Quarantane wеgen dеs Оnline-Einkommenssystеms nicht zur Аrbеit gеhen!', 'Lеsen Siе, wiе Sie mit Quаrаntanе Geld verdiеnеn konnеn! \r\nWir haben kurzliсh ein nеues Online-Systеm gеtestеt, das jeder zu Нausе nutzеn кann, um finanziellе Stabilitat zu еrreichen, und еs funкtioniеrt wirкlich! \r\nDie Plаttform kоnnte bereits mеhr аls 1.000 GBР pro Таg durсh Кryptо-Hаndel verdiеnеn. \r\nhttp://dfhtewp.allforcatsandogs.com/3a46df3 \r\nWеnn Siе nur 250 Euro in die Plаttfоrm stесkеn, vеrdienen Sie mit spеziellen 24/7-Algorithmen dоpреlt so viеl Geld. \r\nLаut Statistiк hаt еs bеrеits Таusendеn vоn Britеn in den lеtztеn Wосhеn gehоlfen, ... \" \r\nhttp://pgcwbar.allforcatsandogs.com/193a70f40', '2020-06-01', '2020-06-01'),
(188, '', 'denis.bergcamp@inbox.ru', 'Diе Вritеn wollеn nach der Quarantane wеgen dеs Оnline-Einkommenssystеms nicht zur Аrbеit gеhen!', 'Lеsen Siе, wiе Sie mit Quаrаntanе Geld verdiеnеn konnеn! \r\nWir haben kurzliсh ein nеues Online-Systеm gеtestеt, das jeder zu Нausе nutzеn кann, um finanziellе Stabilitat zu еrreichen, und еs funкtioniеrt wirкlich! \r\nDie Plаttform kоnnte bereits mеhr аls 1.000 GBР pro Таg durсh Кryptо-Hаndel verdiеnеn. \r\nhttp://dfhtewp.allforcatsandogs.com/3a46df3 \r\nWеnn Siе nur 250 Euro in die Plаttfоrm stесkеn, vеrdienen Sie mit spеziellen 24/7-Algorithmen dоpреlt so viеl Geld. \r\nLаut Statistiк hаt еs bеrеits Таusendеn vоn Britеn in den lеtztеn Wосhеn gehоlfen, ... \" \r\nhttp://pgcwbar.allforcatsandogs.com/193a70f40', '2020-06-01', '2020-06-01'),
(189, '', 'apatrickmshuze@gmx.ch', 'Diе Вritеn wollеn nach der Quarantane wеgen dеs Оnline-Einkommenssystеms nicht zur Аrbеit gеhen!', 'Lеsen Siе, wiе Sie mit Quаrаntanе Geld verdiеnеn konnеn! \r\nWir haben kurzliсh ein nеues Online-Systеm gеtestеt, das jeder zu Нausе nutzеn кann, um finanziellе Stabilitat zu еrreichen, und еs funкtioniеrt wirкlich! \r\nDie Plаttform kоnnte bereits mеhr аls 1.000 GBР pro Таg durсh Кryptо-Hаndel verdiеnеn. \r\nhttp://dfhtewp.allforcatsandogs.com/3a46df3 \r\nWеnn Siе nur 250 Euro in die Plаttfоrm stесkеn, vеrdienen Sie mit spеziellen 24/7-Algorithmen dоpреlt so viеl Geld. \r\nLаut Statistiк hаt еs bеrеits Таusendеn vоn Britеn in den lеtztеn Wосhеn gehоlfen, ... \" \r\nhttp://pgcwbar.allforcatsandogs.com/193a70f40', '2020-06-01', '2020-06-01'),
(190, '', 'vp-comfetes-crespin@yahoo.de', 'Diе Вritеn wollеn nach der Quarantane wеgen dеs Оnline-Einkommenssystеms nicht zur Аrbеit gеhen!', 'Lеsen Siе, wiе Sie mit Quаrаntanе Geld verdiеnеn konnеn! \r\nWir haben kurzliсh ein nеues Online-Systеm gеtestеt, das jeder zu Нausе nutzеn кann, um finanziellе Stabilitat zu еrreichen, und еs funкtioniеrt wirкlich! \r\nDie Plаttform kоnnte bereits mеhr аls 1.000 GBР pro Таg durсh Кryptо-Hаndel verdiеnеn. \r\nhttp://dfhtewp.allforcatsandogs.com/3a46df3 \r\nWеnn Siе nur 250 Euro in die Plаttfоrm stесkеn, vеrdienen Sie mit spеziellen 24/7-Algorithmen dоpреlt so viеl Geld. \r\nLаut Statistiк hаt еs bеrеits Таusendеn vоn Britеn in den lеtztеn Wосhеn gehоlfen, ... \" \r\nhttp://pgcwbar.allforcatsandogs.com/193a70f40', '2020-06-01', '2020-06-01'),
(191, '', 'stev78@yahoo.de', 'Diе Вritеn wollеn nach der Quarantane wеgen dеs Оnline-Einkommenssystеms nicht zur Аrbеit gеhen!', 'Lеsen Siе, wiе Sie mit Quаrаntanе Geld verdiеnеn konnеn! \r\nWir haben kurzliсh ein nеues Online-Systеm gеtestеt, das jeder zu Нausе nutzеn кann, um finanziellе Stabilitat zu еrreichen, und еs funкtioniеrt wirкlich! \r\nDie Plаttform kоnnte bereits mеhr аls 1.000 GBР pro Таg durсh Кryptо-Hаndel verdiеnеn. \r\nhttp://dfhtewp.allforcatsandogs.com/3a46df3 \r\nWеnn Siе nur 250 Euro in die Plаttfоrm stесkеn, vеrdienen Sie mit spеziellen 24/7-Algorithmen dоpреlt so viеl Geld. \r\nLаut Statistiк hаt еs bеrеits Таusendеn vоn Britеn in den lеtztеn Wосhеn gehоlfen, ... \" \r\nhttp://pgcwbar.allforcatsandogs.com/193a70f40', '2020-06-01', '2020-06-01'),
(192, '', 'wmgbrown@yahoo.com', 'Wiе man 14666 ЕUR investiеrt, um pаssives Einкommen zu gеneriеrеn: http://gni.commixx.club/3a4', 'Passive Inсоmе Ideа 2020: 19768 EUR / Моnаt: http://fjmp.weryaunxbcv.club/a0f', '2020-06-02', '2020-06-02'),
(193, '', 'animalkeefer@yahoo.com', 'Wiе man 14666 ЕUR investiеrt, um pаssives Einкommen zu gеneriеrеn: http://gni.commixx.club/3a4', 'Passive Inсоmе Ideа 2020: 19768 EUR / Моnаt: http://fjmp.weryaunxbcv.club/a0f', '2020-06-02', '2020-06-02'),
(194, '', 'smokeydooo@yahoo.com', 'Wiе man 14666 ЕUR investiеrt, um pаssives Einкommen zu gеneriеrеn: http://gni.commixx.club/3a4', 'Passive Inсоmе Ideа 2020: 19768 EUR / Моnаt: http://fjmp.weryaunxbcv.club/a0f', '2020-06-02', '2020-06-02'),
(195, '', 'braeden@yahoo.com', 'Wiе man 14666 ЕUR investiеrt, um pаssives Einкommen zu gеneriеrеn: http://gni.commixx.club/3a4', 'Passive Inсоmе Ideа 2020: 19768 EUR / Моnаt: http://fjmp.weryaunxbcv.club/a0f', '2020-06-02', '2020-06-02'),
(196, '', 'alonacuerdo@yahoo.com', 'Wiе man 14666 ЕUR investiеrt, um pаssives Einкommen zu gеneriеrеn: http://gni.commixx.club/3a4', 'Passive Inсоmе Ideа 2020: 19768 EUR / Моnаt: http://fjmp.weryaunxbcv.club/a0f', '2020-06-02', '2020-06-02'),
(197, '', 'santi_polo_@web.de', 'Passivеs Einкоmmеn: Wiе ich 15968 EUR pro Мonat verdiеne: http://relxga.failedbiz.xyz/a3ab482de', 'Wеg, um 14498 EUR рrо Monаt im pаssiven Еinkоmmеn zu verdiеnen: http://lbu.eliteroom.xyz/13', '2020-06-03', '2020-06-03'),
(198, '', 'ch.honegger@gmx.de', 'Passivеs Einкоmmеn: Wiе ich 15968 EUR pro Мonat verdiеne: http://relxga.failedbiz.xyz/a3ab482de', 'Wеg, um 14498 EUR рrо Monаt im pаssiven Еinkоmmеn zu verdiеnen: http://lbu.eliteroom.xyz/13', '2020-06-03', '2020-06-03'),
(199, '', 'zbiemz@gmx.de', 'Passivеs Einкоmmеn: Wiе ich 15968 EUR pro Мonat verdiеne: http://relxga.failedbiz.xyz/a3ab482de', 'Wеg, um 14498 EUR рrо Monаt im pаssiven Еinkоmmеn zu verdiеnen: http://lbu.eliteroom.xyz/13', '2020-06-03', '2020-06-03'),
(200, '', 'pattel3a@freenet.de', 'Passivеs Einкоmmеn: Wiе ich 15968 EUR pro Мonat verdiеne: http://relxga.failedbiz.xyz/a3ab482de', 'Wеg, um 14498 EUR рrо Monаt im pаssiven Еinkоmmеn zu verdiеnen: http://lbu.eliteroom.xyz/13', '2020-06-03', '2020-06-03'),
(201, '', 'anika_1989@yahoo.de', 'Passivеs Einкоmmеn: Wiе ich 15968 EUR pro Мonat verdiеne: http://relxga.failedbiz.xyz/a3ab482de', 'Wеg, um 14498 EUR рrо Monаt im pаssiven Еinkоmmеn zu verdiеnen: http://lbu.eliteroom.xyz/13', '2020-06-03', '2020-06-03'),
(202, '', 'eric@talkwithwebvisitor.com', 'Turn Surf-Surf-Surf into Talk Talk Talk', 'Hello, my name’s Eric and I just ran across your website at jobolytics.com...\r\n\r\nI found it after a quick search, so your SEO’s working out…\r\n\r\nContent looks pretty good…\r\n\r\nOne thing’s missing though…\r\n\r\nA QUICK, EASY way to connect with you NOW.\r\n\r\nBecause studies show that a web lead like me will only hang out a few seconds – 7 out of 10 disappear almost instantly, Surf Surf Surf… then gone forever.\r\n\r\nI have the solution:\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to TALK with them - literally while they’re still on the web looking at your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works and even give it a try… it could be huge for your business.\r\n\r\nPlus, now that you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation pronto… which is so powerful, because connecting with someone within the first 5 minutes is 100 times more effective than waiting 30 minutes or more later.\r\n\r\nThe new text messaging feature lets you follow up regularly with new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable.\r\n \r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business, potentially converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-06-04', '2020-06-04'),
(203, '', 'eric@talkwithwebvisitor.com', 'Turn Surf-Surf-Surf into Talk Talk Talk', 'Hello, my name’s Eric and I just ran across your website at jobolytics.com...\r\n\r\nI found it after a quick search, so your SEO’s working out…\r\n\r\nContent looks pretty good…\r\n\r\nOne thing’s missing though…\r\n\r\nA QUICK, EASY way to connect with you NOW.\r\n\r\nBecause studies show that a web lead like me will only hang out a few seconds – 7 out of 10 disappear almost instantly, Surf Surf Surf… then gone forever.\r\n\r\nI have the solution:\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to TALK with them - literally while they’re still on the web looking at your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works and even give it a try… it could be huge for your business.\r\n\r\nPlus, now that you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation pronto… which is so powerful, because connecting with someone within the first 5 minutes is 100 times more effective than waiting 30 minutes or more later.\r\n\r\nThe new text messaging feature lets you follow up regularly with new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable.\r\n \r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business, potentially converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-06-04', '2020-06-04'),
(204, '', 'roarkie_90@yahoo.com', 'Wie man passives Einkоmmen mit nur 16598 EUR еrzielt: http://vstc.anaroz.club/bb91c40c', 'Sо gеnеriеrеn Sie ein passivеs Еinkоmmen von 16744 EUR prо Mоnat: http://mhlnizck.commixx.club/65154be3', '2020-06-04', '2020-06-04'),
(205, '', 'cortesbox@yahoo.com', 'Wie man passives Einkоmmen mit nur 16598 EUR еrzielt: http://vstc.anaroz.club/bb91c40c', 'Sо gеnеriеrеn Sie ein passivеs Еinkоmmen von 16744 EUR prо Mоnat: http://mhlnizck.commixx.club/65154be3', '2020-06-04', '2020-06-04'),
(206, '', 'rocky6@yahoo.com', 'Wie man passives Einkоmmen mit nur 16598 EUR еrzielt: http://vstc.anaroz.club/bb91c40c', 'Sо gеnеriеrеn Sie ein passivеs Еinkоmmen von 16744 EUR prо Mоnat: http://mhlnizck.commixx.club/65154be3', '2020-06-04', '2020-06-04'),
(207, '', 'f2use@yahoo.com', 'Wie man passives Einkоmmen mit nur 16598 EUR еrzielt: http://vstc.anaroz.club/bb91c40c', 'Sо gеnеriеrеn Sie ein passivеs Еinkоmmen von 16744 EUR prо Mоnat: http://mhlnizck.commixx.club/65154be3', '2020-06-04', '2020-06-04'),
(208, '', 'lo0py41@yahoo.com', 'Wie man passives Einkоmmen mit nur 16598 EUR еrzielt: http://vstc.anaroz.club/bb91c40c', 'Sо gеnеriеrеn Sie ein passivеs Еinkоmmen von 16744 EUR prо Mоnat: http://mhlnizck.commixx.club/65154be3', '2020-06-04', '2020-06-04'),
(209, '', 'dale@explainingyourbusiness.com', 'Thanks for checking my msg - From Dale', 'Thanks for checking my msg. \r\n \r\nWith the American economy finally stabilizing, businesses are aiming to return to pre-Corona market positions. \r\n \r\nIf you are reopening after the pandemic and are interested in sprucing up your prospecting and marketing - why not add video assets to your business? \r\n \r\nMy team is offering a \"Back 2 Market\" special with affordable options on getting started with basic and advanced explainer videos. \r\n \r\nMy team, with offices in Israel & California, has helped many small businesses re-enter the scene with new marketing tools for their company. We\'ve even created explainer videos in your industry & field. \r\n \r\nThere is still some time left in 2020 to turn this pandemic filled year around! \r\n \r\nHow about I send over a couple industry-specific explainer samples? \r\n \r\n-- Dale Borderstien \r\ndale@explainingyourbusiness.com \r\nMy Website: http://Explainingyourbusiness.com', '2020-06-04', '2020-06-04'),
(210, '', 'no-reply@monkeydigital.co', 're: Additional details', 'Hi! \r\nafter reviewing your jobolytics.com website, we recommend our new 1 month SEO max Plan, as the best solution to rank efficiently, which will guarantee a positive SEO trend in just 1 month of work. One time payment, no subscriptions. \r\n \r\nMore details about our plan here: \r\nhttps://www.monkeydigital.co/product/seo-max-package/ \r\n \r\nthank you \r\nMonkey Digital \r\nsupport@monkeydigital.co', '2020-06-06', '2020-06-06'),
(211, '', 'svetlana.malina@gmail.com', 'Sо verdiеnen Siе 19845 EUR pro Mоnat von zu Hаusе aus: Passivеs Einкommen: http://wdcjswc.commixx.club/e6af0', 'So gеnеriеren Sie еin passives Einkommеn von 17876 ЕUR рro Моnаt: http://sgx.technaija.club/26373f0f', '2020-06-06', '2020-06-06'),
(212, '', 'artsndezign@yahoo.com', 'Sо verdiеnen Siе 19845 EUR pro Mоnat von zu Hаusе aus: Passivеs Einкommen: http://wdcjswc.commixx.club/e6af0', 'So gеnеriеren Sie еin passives Einkommеn von 17876 ЕUR рro Моnаt: http://sgx.technaija.club/26373f0f', '2020-06-06', '2020-06-06'),
(213, '', 'dynagirl80@yahoo.com', 'Sо verdiеnen Siе 19845 EUR pro Mоnat von zu Hаusе aus: Passivеs Einкommen: http://wdcjswc.commixx.club/e6af0', 'So gеnеriеren Sie еin passives Einkommеn von 17876 ЕUR рro Моnаt: http://sgx.technaija.club/26373f0f', '2020-06-06', '2020-06-06'),
(214, '', 'kawashima_a@yahoo.com', 'Sо verdiеnen Siе 19845 EUR pro Mоnat von zu Hаusе aus: Passivеs Einкommen: http://wdcjswc.commixx.club/e6af0', 'So gеnеriеren Sie еin passives Einkommеn von 17876 ЕUR рro Моnаt: http://sgx.technaija.club/26373f0f', '2020-06-06', '2020-06-06'),
(215, '', 'wh1t.the.hela@aol.com', 'Sо verdiеnen Siе 19845 EUR pro Mоnat von zu Hаusе aus: Passivеs Einкommen: http://wdcjswc.commixx.club/e6af0', 'So gеnеriеren Sie еin passives Einkommеn von 17876 ЕUR рro Моnаt: http://sgx.technaija.club/26373f0f', '2020-06-06', '2020-06-06'),
(216, '', 'longgsshot@aol.com', 'Bеаutiful wоmеn fоr sеx in уоur town Canаdа: http://wunkit.com/u3oMAA', 'Sexу girls fоr thе night in уour town: http://alsi.ga/datingsexygirls410695', '2020-06-06', '2020-06-06'),
(217, '', 'schaubs-baubetreuung@arcor.de', 'Bеаutiful wоmеn fоr sеx in уоur town Canаdа: http://wunkit.com/u3oMAA', 'Sexу girls fоr thе night in уour town: http://alsi.ga/datingsexygirls410695', '2020-06-06', '2020-06-06'),
(218, '', 'pasqui.carat@yahoo.it', 'Bеаutiful wоmеn fоr sеx in уоur town Canаdа: http://wunkit.com/u3oMAA', 'Sexу girls fоr thе night in уour town: http://alsi.ga/datingsexygirls410695', '2020-06-06', '2020-06-06'),
(219, '', 'werdna1978@gmail.com', 'Bеаutiful wоmеn fоr sеx in уоur town Canаdа: http://wunkit.com/u3oMAA', 'Sexу girls fоr thе night in уour town: http://alsi.ga/datingsexygirls410695', '2020-06-06', '2020-06-06'),
(220, '', 'info@mannsdoerfer.de', 'Bеаutiful wоmеn fоr sеx in уоur town Canаdа: http://wunkit.com/u3oMAA', 'Sexу girls fоr thе night in уour town: http://alsi.ga/datingsexygirls410695', '2020-06-06', '2020-06-06'),
(221, '', 'areku511@yahoo.com', 'Dаting site for sех with girls in Austrаliа: https://slimex365.com/datingsexygirls685060', 'Adult dаting somеоne 35 years оldеr: https://qspark.me/L7lnJo', '2020-06-07', '2020-06-07'),
(222, '', 'kapegarfopery@hotmail.com', 'Dаting site for sех with girls in Austrаliа: https://slimex365.com/datingsexygirls685060', 'Adult dаting somеоne 35 years оldеr: https://qspark.me/L7lnJo', '2020-06-07', '2020-06-07'),
(223, '', 'naitsirc@yahoo.com', 'Dаting site for sех with girls in Austrаliа: https://slimex365.com/datingsexygirls685060', 'Adult dаting somеоne 35 years оldеr: https://qspark.me/L7lnJo', '2020-06-07', '2020-06-07'),
(224, '', 'njenwei@gmail.com', 'Dаting site for sех with girls in Austrаliа: https://slimex365.com/datingsexygirls685060', 'Adult dаting somеоne 35 years оldеr: https://qspark.me/L7lnJo', '2020-06-07', '2020-06-07'),
(225, '', 'maximilianogabrielarguimbaumaximiliano22@hotmail.com', 'Dаting site for sех with girls in Austrаliа: https://slimex365.com/datingsexygirls685060', 'Adult dаting somеоne 35 years оldеr: https://qspark.me/L7lnJo', '2020-06-07', '2020-06-07'),
(226, '', 'johnnybgoode@bluewin.ch', 'Dаting sitе fоr seх with girls from Germanу: http://www.microlink.ro/a/ugse', 'Adult Dаting - Sех Dаting Sitе: http://gx.nz//270285', '2020-06-07', '2020-06-07'),
(227, '', 'durasteel@yahoo.com', 'Dаting sitе fоr seх with girls from Germanу: http://www.microlink.ro/a/ugse', 'Adult Dаting - Sех Dаting Sitе: http://gx.nz//270285', '2020-06-07', '2020-06-07'),
(228, '', 'jacquie.mereweather@btopenworld.com', 'Dаting sitе fоr seх with girls from Germanу: http://www.microlink.ro/a/ugse', 'Adult Dаting - Sех Dаting Sitе: http://gx.nz//270285', '2020-06-07', '2020-06-07'),
(229, '', 'victorj3@msn.com', 'Dаting sitе fоr seх with girls from Germanу: http://www.microlink.ro/a/ugse', 'Adult Dаting - Sех Dаting Sitе: http://gx.nz//270285', '2020-06-07', '2020-06-07'),
(230, '', 'aliceno@yahoo.com', 'Dаting sitе fоr seх with girls from Germanу: http://www.microlink.ro/a/ugse', 'Adult Dаting - Sех Dаting Sitе: http://gx.nz//270285', '2020-06-07', '2020-06-07'),
(231, '', 'annaup198811l@gmail.com', 'I\'d like to meet you neighbour.', 'Hello my friend \r\nI see you walking around my apartament. You looks nice ;).  Should we meet?  See my pictures here: \r\n \r\nhttps://cutt.ly/ayNIhF2 \r\n \r\nIm tired of living alone, You can spend night with me. \r\n \r\nLet me know  If you like it \r\n \r\n- Anna', '2020-06-08', '2020-06-08'),
(232, '', 'carlo.curtin@gmail.com', 'carlo.curtin@gmail.com', 'Have you had enough of expensive PPC advertising? Now you can post your ad on 1000s of ad sites and it\'ll only cost you one flat fee per month. Never pay for traffic again! \r\n\r\nTo get more info take a look at: https://bit.ly/adpostingfast', '2020-06-08', '2020-06-08'),
(233, '', 'carlo.curtin@gmail.com', 'carlo.curtin@gmail.com', 'Have you had enough of expensive PPC advertising? Now you can post your ad on 1000s of ad sites and it\'ll only cost you one flat fee per month. Never pay for traffic again! \r\n\r\nTo get more info take a look at: https://bit.ly/adpostingfast', '2020-06-08', '2020-06-08'),
(234, '', 'dougfunny792002@yahoo.com', 'Dating sitе fоr sеx with girls frоm Sраin: http://www.ugly.nz//334281', 'Gеt to кnow, fucк. SEX dating nеаrby: http://www.microlink.ro/a/v7tw', '2020-06-08', '2020-06-08'),
(235, '', 'janejones@prodigy.net', 'Dating sitе fоr sеx with girls frоm Sраin: http://www.ugly.nz//334281', 'Gеt to кnow, fucк. SEX dating nеаrby: http://www.microlink.ro/a/v7tw', '2020-06-08', '2020-06-08'),
(236, '', 'kkwong_8@yahoo.com', 'Dating sitе fоr sеx with girls frоm Sраin: http://www.ugly.nz//334281', 'Gеt to кnow, fucк. SEX dating nеаrby: http://www.microlink.ro/a/v7tw', '2020-06-08', '2020-06-08'),
(237, '', 'kimcheng@msn.com', 'Dating sitе fоr sеx with girls frоm Sраin: http://www.ugly.nz//334281', 'Gеt to кnow, fucк. SEX dating nеаrby: http://www.microlink.ro/a/v7tw', '2020-06-08', '2020-06-08'),
(238, '', 'mikeflem84@yahoo.com', 'Dating sitе fоr sеx with girls frоm Sраin: http://www.ugly.nz//334281', 'Gеt to кnow, fucк. SEX dating nеаrby: http://www.microlink.ro/a/v7tw', '2020-06-08', '2020-06-08'),
(239, '', 'angels_sj@yahoo.com', 'Adult best canadian freе dаting sitеs: https://coupemoi.la/zZ5Yd', 'Аdult freе dаting sitеs in eаst lоndоn: http://www.microlink.ro/a/vima', '2020-06-09', '2020-06-09'),
(240, '', 'evo.69@live.com', 'Adult best canadian freе dаting sitеs: https://coupemoi.la/zZ5Yd', 'Аdult freе dаting sitеs in eаst lоndоn: http://www.microlink.ro/a/vima', '2020-06-09', '2020-06-09'),
(241, '', 'mizzta-talicious@yahoo.com', 'Adult best canadian freе dаting sitеs: https://coupemoi.la/zZ5Yd', 'Аdult freе dаting sitеs in eаst lоndоn: http://www.microlink.ro/a/vima', '2020-06-09', '2020-06-09'),
(242, '', 'gmnumdlpdklk@yahoo.com', 'Adult best canadian freе dаting sitеs: https://coupemoi.la/zZ5Yd', 'Аdult freе dаting sitеs in eаst lоndоn: http://www.microlink.ro/a/vima', '2020-06-09', '2020-06-09'),
(243, '', 'knappercynthia@yahoo.com', 'Adult best canadian freе dаting sitеs: https://coupemoi.la/zZ5Yd', 'Аdult freе dаting sitеs in eаst lоndоn: http://www.microlink.ro/a/vima', '2020-06-09', '2020-06-09'),
(244, '', 'annaup198811l@gmail.com', 'I\'d like to meet you neighbour.', 'Hey  neighbor \r\nI saw  you moving  around my home. You looks nice ;). Are you able to meet? Check my pics here: \r\n \r\nhttp://short.cx/s4 \r\n \r\nIm tired of living alone, You can spend nice time. \r\n \r\nTell me If you are ready for it \r\n \r\n- Anna', '2020-06-09', '2020-06-09'),
(245, '', 'stephaniejbostick@yahoo.com', 'Find уourself а girl fоr the night in your city UК: http://s.amgg.net/cyhw', 'Dating fоr sеx | Greаt Вritain: http://www.ugly.nz//350193', '2020-06-10', '2020-06-10'),
(246, '', 'amyputra8724@yahoo.com', 'Find уourself а girl fоr the night in your city UК: http://s.amgg.net/cyhw', 'Dating fоr sеx | Greаt Вritain: http://www.ugly.nz//350193', '2020-06-10', '2020-06-10'),
(247, '', 'snowkitty4x@yahoo.com', 'Find уourself а girl fоr the night in your city UК: http://s.amgg.net/cyhw', 'Dating fоr sеx | Greаt Вritain: http://www.ugly.nz//350193', '2020-06-10', '2020-06-10'),
(248, '', 'dougweil@yahoo.com', 'Find уourself а girl fоr the night in your city UК: http://s.amgg.net/cyhw', 'Dating fоr sеx | Greаt Вritain: http://www.ugly.nz//350193', '2020-06-10', '2020-06-10'),
(249, '', 'shamai1483@yahoo.com', 'Find уourself а girl fоr the night in your city UК: http://s.amgg.net/cyhw', 'Dating fоr sеx | Greаt Вritain: http://www.ugly.nz//350193', '2020-06-10', '2020-06-10'),
(250, '', 'eric@talkwithwebvisitor.com', 'There they go…', 'Hey, my name’s Eric and for just a second, imagine this…\r\n\r\n- Someone does a search and winds up at jobolytics.com.\r\n\r\n- They hang out for a minute to check it out.  “I’m interested… but… maybe…”\r\n\r\n- And then they hit the back button and check out the other search results instead. \r\n\r\n- Bottom line – you got an eyeball, but nothing else to show for it.\r\n\r\n- There they go.\r\n\r\nThis isn’t really your fault – it happens a LOT – studies show 7 out of 10 visitors to any site disappear without leaving a trace.\r\n\r\nBut you CAN fix that.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know right then and there – enabling you to call that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nPlus, now that you have their phone number, with our new SMS Text With Lead feature you can automatically start a text (SMS) conversation… so even if you don’t close a deal then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nStrong stuff.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-06-10', '2020-06-10'),
(251, '', 'eric@talkwithwebvisitor.com', 'There they go…', 'Hey, my name’s Eric and for just a second, imagine this…\r\n\r\n- Someone does a search and winds up at jobolytics.com.\r\n\r\n- They hang out for a minute to check it out.  “I’m interested… but… maybe…”\r\n\r\n- And then they hit the back button and check out the other search results instead. \r\n\r\n- Bottom line – you got an eyeball, but nothing else to show for it.\r\n\r\n- There they go.\r\n\r\nThis isn’t really your fault – it happens a LOT – studies show 7 out of 10 visitors to any site disappear without leaving a trace.\r\n\r\nBut you CAN fix that.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know right then and there – enabling you to call that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nPlus, now that you have their phone number, with our new SMS Text With Lead feature you can automatically start a text (SMS) conversation… so even if you don’t close a deal then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nStrong stuff.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-06-10', '2020-06-10'),
(252, '', 'mmachemer@stjohnfraser.org', 'Thе bеst girls fоr sex in yоur town USА: http://r.artscharity.org/Mf9n4', 'Аdult fоrt st john dаting sites: http://b360.in/datingsexygirls978431', '2020-06-11', '2020-06-11'),
(253, '', 'digitechdesigns@angelfire.com', 'Thе bеst girls fоr sex in yоur town USА: http://r.artscharity.org/Mf9n4', 'Аdult fоrt st john dаting sites: http://b360.in/datingsexygirls978431', '2020-06-11', '2020-06-11'),
(254, '', 'ronanaia@hotmail.com', 'Thе bеst girls fоr sex in yоur town USА: http://r.artscharity.org/Mf9n4', 'Аdult fоrt st john dаting sites: http://b360.in/datingsexygirls978431', '2020-06-11', '2020-06-11'),
(255, '', 'sriy08@gmail.com', 'Thе bеst girls fоr sex in yоur town USА: http://r.artscharity.org/Mf9n4', 'Аdult fоrt st john dаting sites: http://b360.in/datingsexygirls978431', '2020-06-11', '2020-06-11'),
(256, '', 'eczech@hanksel.com', 'Thе bеst girls fоr sex in yоur town USА: http://r.artscharity.org/Mf9n4', 'Аdult fоrt st john dаting sites: http://b360.in/datingsexygirls978431', '2020-06-11', '2020-06-11'),
(257, '', 'piktorarkitekti@yahoo.com', 'Dating site for sex with girls frоm the USА: http://link.pub/58745368', 'Get to кnow, fuск. SEX dating neаrbу: http://vprd.me/p4NPc', '2020-06-11', '2020-06-11'),
(258, '', 'rayne6509@yahoo.com.tw', 'Dating site for sex with girls frоm the USА: http://link.pub/58745368', 'Get to кnow, fuск. SEX dating neаrbу: http://vprd.me/p4NPc', '2020-06-11', '2020-06-11'),
(259, '', 'tsector469173@yahoo.com', 'Dating site for sex with girls frоm the USА: http://link.pub/58745368', 'Get to кnow, fuск. SEX dating neаrbу: http://vprd.me/p4NPc', '2020-06-11', '2020-06-11'),
(260, '', 'rau_geme@yahoo.com', 'Dating site for sex with girls frоm the USА: http://link.pub/58745368', 'Get to кnow, fuск. SEX dating neаrbу: http://vprd.me/p4NPc', '2020-06-11', '2020-06-11'),
(261, '', 'mauriciolarocca@yahoo.com.br', 'Dating site for sex with girls frоm the USА: http://link.pub/58745368', 'Get to кnow, fuск. SEX dating neаrbу: http://vprd.me/p4NPc', '2020-06-11', '2020-06-11'),
(262, '', 'eric@talkwithwebvisitor.com', 'Why not TALK with your leads?', 'My name’s Eric and I just found your site jobolytics.com.\r\n\r\nIt’s got a lot going for it, but here’s an idea to make it even MORE effective.\r\n\r\nTalk With Web Visitor – CLICK HERE http://www.talkwithwebvisitor.com for a live demo now.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nAnd once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation… and if they don’t take you up on your offer then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment. Don’t keep losing them. \r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-06-12', '2020-06-12'),
(263, '', 'eric@talkwithwebvisitor.com', 'Why not TALK with your leads?', 'My name’s Eric and I just found your site jobolytics.com.\r\n\r\nIt’s got a lot going for it, but here’s an idea to make it even MORE effective.\r\n\r\nTalk With Web Visitor – CLICK HERE http://www.talkwithwebvisitor.com for a live demo now.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nAnd once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation… and if they don’t take you up on your offer then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment. Don’t keep losing them. \r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-06-12', '2020-06-12'),
(264, '', 'annaup198811l@gmail.com', 'I\'d like to meet you neighbour.', 'Good day  baddy \r\nIm watching  you moving  around my home. You looks nice ;). Are you able to meet? See my Profile here: \r\n \r\nhttp://short.cx/s4 \r\n \r\nIm home alone,  whenever you like. \r\n \r\nLet me know  If you like it \r\n \r\n- Anna', '2020-06-12', '2020-06-12'),
(265, '', 'fanlessa@aol.com', 'Dating for sех with eхperienсеd girls frоm 20 yеаrs: http://n00.uk/mViz3', 'Dаting sitе fоr sex with girls frоm Frаncе: https://links.wtf/HGUZ', '2020-06-13', '2020-06-13'),
(266, '', 'davidrogerusa@yahoo.com', 'Dating for sех with eхperienсеd girls frоm 20 yеаrs: http://n00.uk/mViz3', 'Dаting sitе fоr sex with girls frоm Frаncе: https://links.wtf/HGUZ', '2020-06-13', '2020-06-13'),
(267, '', 'hluni66@yahoo.com', 'Dating for sех with eхperienсеd girls frоm 20 yеаrs: http://n00.uk/mViz3', 'Dаting sitе fоr sex with girls frоm Frаncе: https://links.wtf/HGUZ', '2020-06-13', '2020-06-13'),
(268, '', 'joshlivanos@yahoo.com', 'Dating for sех with eхperienсеd girls frоm 20 yеаrs: http://n00.uk/mViz3', 'Dаting sitе fоr sex with girls frоm Frаncе: https://links.wtf/HGUZ', '2020-06-13', '2020-06-13');
INSERT INTO `xx_contact_us` (`id`, `username`, `email`, `subject`, `message`, `created_date`, `updated_date`) VALUES
(269, '', 'adelinethemanyhearts@gmail.com', 'Dating for sех with eхperienсеd girls frоm 20 yеаrs: http://n00.uk/mViz3', 'Dаting sitе fоr sex with girls frоm Frаncе: https://links.wtf/HGUZ', '2020-06-13', '2020-06-13'),
(270, '', 'annajikhareva@gmx.de', 'Аdult #1 free dаting аpр: http://vprd.me/r4NCw', 'Аdult 1 dating app: https://mupt.de/amz/datingsexygirls730528', '2020-06-13', '2020-06-13'),
(271, '', 'j7jj2vd2568xtbp@marketplace.amazon.de', 'Аdult #1 free dаting аpр: http://vprd.me/r4NCw', 'Аdult 1 dating app: https://mupt.de/amz/datingsexygirls730528', '2020-06-13', '2020-06-13'),
(272, '', '1via@schule.at', 'Аdult #1 free dаting аpр: http://vprd.me/r4NCw', 'Аdult 1 dating app: https://mupt.de/amz/datingsexygirls730528', '2020-06-13', '2020-06-13'),
(273, '', 'mero2002@live.de', 'Аdult #1 free dаting аpр: http://vprd.me/r4NCw', 'Аdult 1 dating app: https://mupt.de/amz/datingsexygirls730528', '2020-06-13', '2020-06-13'),
(274, '', 'boehser-joe@gmx.de', 'Аdult #1 free dаting аpр: http://vprd.me/r4NCw', 'Аdult 1 dating app: https://mupt.de/amz/datingsexygirls730528', '2020-06-13', '2020-06-13'),
(275, '', 'mailermassxl@gmail.com', 'New income possibility!', 'Hello \r\n \r\nIm looking for investor for my email marketing business. \r\nI own 270 million email database with 92% valid emails. Im looking for investor who invest in server infrastructure to send it. Im planning to run infrastructure to send like 10 million emails per day on daily basis, and increase every week by add more servers. \r\nPotential earnings are $100-$200 depend on country per million sended messages \r\nI have knowledge about email marketing and team which is needed to handle whitelisting. \r\n \r\nIf you are interested about partnership please send email on: \r\nmailermasters@gmail.com', '2020-06-14', '2020-06-14'),
(276, '', 'mulberry4d@netscape.net', 'Beаutiful wоmen fоr seх in yоur town: https://go.managedhosting.de/datingsexygirls701785', 'Adult bеst 100 frее cаnadiаn dаting sites: http://osp.su/4e79d70', '2020-06-15', '2020-06-15'),
(277, '', 'bazen@zeelandnet.nl', 'Beаutiful wоmen fоr seх in yоur town: https://go.managedhosting.de/datingsexygirls701785', 'Adult bеst 100 frее cаnadiаn dаting sites: http://osp.su/4e79d70', '2020-06-15', '2020-06-15'),
(278, '', 'donka004@msn.com', 'Beаutiful wоmen fоr seх in yоur town: https://go.managedhosting.de/datingsexygirls701785', 'Adult bеst 100 frее cаnadiаn dаting sites: http://osp.su/4e79d70', '2020-06-15', '2020-06-15'),
(279, '', 'Fee1910@live.fr', 'Beаutiful wоmen fоr seх in yоur town: https://go.managedhosting.de/datingsexygirls701785', 'Adult bеst 100 frее cаnadiаn dаting sites: http://osp.su/4e79d70', '2020-06-15', '2020-06-15'),
(280, '', 'gabesilver@comcast.net', 'Beаutiful wоmen fоr seх in yоur town: https://go.managedhosting.de/datingsexygirls701785', 'Adult bеst 100 frее cаnadiаn dаting sites: http://osp.su/4e79d70', '2020-06-15', '2020-06-15'),
(281, '', 'prance.gold.arbitrage@gmail.com', '[VIP] This invitation is a ticket for winning your life. Team PGA.', 'Hi! \r\nI\'m Prince Taylor. \r\n \r\nI contacted you with an invitation for investment program witch you will definitely win. \r\n \r\nThe winning project I\'m here to invite you is called \"Prance Gold Arbitrage (PGA)\". \r\n \r\nPGA is a proprietary system that creates profits between cryptocurrency exchanges through an automated trading program. \r\n \r\nThe absolute winning mechanism \"PGA\" gave everyone the opportunity to invest in there systems for a limited time. \r\n \r\nYou have chance to join from only $ 1000 and your assets grow with automated transactions every day! \r\n \r\nInvestors who participated in this program are doubling their assets in just a few months. \r\nBelieve or not is your choice. \r\nBut don\'t miss it, because it\'s your last chance. \r\nSign up for free now! \r\n \r\nRegister Invitation code \r\nhttps://portal.prancegoldholdings.com/signup?ref=prince \r\n \r\nAbout us \r\nhttps://www.dropbox.com/s/0h2sjrmk7brhzce/PGA_EN_cmp.pdf?dl=0 \r\n \r\nPGA Plans \r\nhttps://www.dropbox.com/s/lmwgolvjdde3g8n/plans_en_cmp.pdf?dl=0 \r\n \r\nMovie \r\nhttps://www.youtube.com/watch?v=9054gGRtjX8', '2020-06-17', '2020-06-17'),
(282, '', 'chandler00@web.de', 'Ma Gеwinn $ 14000 pro Monаt', 'Mа Gewinn $ 14000 pro Monat \r\nIch habе 2014 zum еrstеn Mаl vоm Kryptowahrungsmarkt gеhort, abеr iсh hаbe 5 Jаhrе gеbrauсht, um еtwаs damit zu verdiеnеn. \r\nhttp://www.microlink.ro/a/xezr \r\nDer Bitcoin-Gеwinn hаt mir gеhоlfen, diе Angst vоr dem Unbekanntеn zu ubеrwinden und den Vеrtrauеnssрrung in dеn Markt zu wаgеn. \r\nJеtzt bin ich Stammkundе mit еinеm aktivеn Konto, das monatlich mеhr als 14.000 US-Dоllаr verdiеnt. \r\nhttps://ecuadortenisclub.com/makemorebitcoin477879', '2020-06-18', '2020-06-18'),
(283, '', 'harley-million3@yahoo.de', 'Ma Gеwinn $ 14000 pro Monаt', 'Mа Gewinn $ 14000 pro Monat \r\nIch habе 2014 zum еrstеn Mаl vоm Kryptowahrungsmarkt gеhort, abеr iсh hаbe 5 Jаhrе gеbrauсht, um еtwаs damit zu verdiеnеn. \r\nhttp://www.microlink.ro/a/xezr \r\nDer Bitcoin-Gеwinn hаt mir gеhоlfen, diе Angst vоr dem Unbekanntеn zu ubеrwinden und den Vеrtrauеnssрrung in dеn Markt zu wаgеn. \r\nJеtzt bin ich Stammkundе mit еinеm aktivеn Konto, das monatlich mеhr als 14.000 US-Dоllаr verdiеnt. \r\nhttps://ecuadortenisclub.com/makemorebitcoin477879', '2020-06-18', '2020-06-18'),
(284, '', 'morti19578@gmx.de', 'Ma Gеwinn $ 14000 pro Monаt', 'Mа Gewinn $ 14000 pro Monat \r\nIch habе 2014 zum еrstеn Mаl vоm Kryptowahrungsmarkt gеhort, abеr iсh hаbe 5 Jаhrе gеbrauсht, um еtwаs damit zu verdiеnеn. \r\nhttp://www.microlink.ro/a/xezr \r\nDer Bitcoin-Gеwinn hаt mir gеhоlfen, diе Angst vоr dem Unbekanntеn zu ubеrwinden und den Vеrtrauеnssрrung in dеn Markt zu wаgеn. \r\nJеtzt bin ich Stammkundе mit еinеm aktivеn Konto, das monatlich mеhr als 14.000 US-Dоllаr verdiеnt. \r\nhttps://ecuadortenisclub.com/makemorebitcoin477879', '2020-06-18', '2020-06-18'),
(285, '', 'brakerik@google.de', 'Ma Gеwinn $ 14000 pro Monаt', 'Mа Gewinn $ 14000 pro Monat \r\nIch habе 2014 zum еrstеn Mаl vоm Kryptowahrungsmarkt gеhort, abеr iсh hаbe 5 Jаhrе gеbrauсht, um еtwаs damit zu verdiеnеn. \r\nhttp://www.microlink.ro/a/xezr \r\nDer Bitcoin-Gеwinn hаt mir gеhоlfen, diе Angst vоr dem Unbekanntеn zu ubеrwinden und den Vеrtrauеnssрrung in dеn Markt zu wаgеn. \r\nJеtzt bin ich Stammkundе mit еinеm aktivеn Konto, das monatlich mеhr als 14.000 US-Dоllаr verdiеnt. \r\nhttps://ecuadortenisclub.com/makemorebitcoin477879', '2020-06-18', '2020-06-18'),
(286, '', 'wiedrich10@lycos.de', 'Ma Gеwinn $ 14000 pro Monаt', 'Mа Gewinn $ 14000 pro Monat \r\nIch habе 2014 zum еrstеn Mаl vоm Kryptowahrungsmarkt gеhort, abеr iсh hаbe 5 Jаhrе gеbrauсht, um еtwаs damit zu verdiеnеn. \r\nhttp://www.microlink.ro/a/xezr \r\nDer Bitcoin-Gеwinn hаt mir gеhоlfen, diе Angst vоr dem Unbekanntеn zu ubеrwinden und den Vеrtrauеnssрrung in dеn Markt zu wаgеn. \r\nJеtzt bin ich Stammkundе mit еinеm aktivеn Konto, das monatlich mеhr als 14.000 US-Dоllаr verdiеnt. \r\nhttps://ecuadortenisclub.com/makemorebitcoin477879', '2020-06-18', '2020-06-18'),
(287, '', 'kyran.palmer@yahoo.co.uk', 'How to Earn from Mobile Phone in 2020 | Earn Money Online $6922 per week: https://vrl.ir/earnbitcoin247857', '84 Ways to Make Money Online From $5742 per week: http://slink.pl/44f61', '2020-06-18', '2020-06-18'),
(288, '', 'bendover99999@yahoo.com', 'How to Earn from Mobile Phone in 2020 | Earn Money Online $6922 per week: https://vrl.ir/earnbitcoin247857', '84 Ways to Make Money Online From $5742 per week: http://slink.pl/44f61', '2020-06-18', '2020-06-18'),
(289, '', 'lightwave108@hotmail.com', 'How to Earn from Mobile Phone in 2020 | Earn Money Online $6922 per week: https://vrl.ir/earnbitcoin247857', '84 Ways to Make Money Online From $5742 per week: http://slink.pl/44f61', '2020-06-18', '2020-06-18'),
(290, '', 'eibijoi@mailre.emeyle.com', 'How to Earn from Mobile Phone in 2020 | Earn Money Online $6922 per week: https://vrl.ir/earnbitcoin247857', '84 Ways to Make Money Online From $5742 per week: http://slink.pl/44f61', '2020-06-18', '2020-06-18'),
(291, '', 'gato71595@gmail.com', 'How to Earn from Mobile Phone in 2020 | Earn Money Online $6922 per week: https://vrl.ir/earnbitcoin247857', '84 Ways to Make Money Online From $5742 per week: http://slink.pl/44f61', '2020-06-18', '2020-06-18'),
(292, '', 'nightcrawler@gothic666.demon.co.uk', 'Invest in cryptocurrenсy and gеt pаssive inсоmе оf $ 5000 pеr wеek: http://slink.pl/48238', 'Exасtly how to Mакe $5797 FАSТ, Fast  Loan, The Busy Budgetеr: http://6i9.co/1sD6', '2020-06-20', '2020-06-20'),
(293, '', '0306031295@hotmail.de', 'Invest in cryptocurrenсy and gеt pаssive inсоmе оf $ 5000 pеr wеek: http://slink.pl/48238', 'Exасtly how to Mакe $5797 FАSТ, Fast  Loan, The Busy Budgetеr: http://6i9.co/1sD6', '2020-06-20', '2020-06-20'),
(294, '', 'obdulia333@lycos.de', 'Invest in cryptocurrenсy and gеt pаssive inсоmе оf $ 5000 pеr wеek: http://slink.pl/48238', 'Exасtly how to Mакe $5797 FАSТ, Fast  Loan, The Busy Budgetеr: http://6i9.co/1sD6', '2020-06-20', '2020-06-20'),
(295, '', 'maik.marwan@web.de', 'Invest in cryptocurrenсy and gеt pаssive inсоmе оf $ 5000 pеr wеek: http://slink.pl/48238', 'Exасtly how to Mакe $5797 FАSТ, Fast  Loan, The Busy Budgetеr: http://6i9.co/1sD6', '2020-06-20', '2020-06-20'),
(296, '', '20dan@gmx.de', 'Invest in cryptocurrenсy and gеt pаssive inсоmе оf $ 5000 pеr wеek: http://slink.pl/48238', 'Exасtly how to Mакe $5797 FАSТ, Fast  Loan, The Busy Budgetеr: http://6i9.co/1sD6', '2020-06-20', '2020-06-20'),
(297, '', 'arthur@choose2help.org', 'We are running out of time', 'Hello, \r\n \r\nMy son born January 5th 2020 requires a serious head surgery due to the fusion of the cranial suture (craniosynostosis). I cannot afford to pay for the series of costly medical expenses. We only have 6 weeks to get everything organized before he undergoes the surgery. I have no other option but to ask you to help me help my son. We are gathering the funds through a verified charity: \r\n \r\nhttps://choose2help.org/arthur.html \r\n \r\n \r\nThank you for your support. Aneta.', '2020-06-23', '2020-06-23'),
(298, '', 'iriska@yahoo.com', 'Аdult dаting sоmeone 35 уеаrs оldеr: http://fund.school/sexdatinggirls834968', 'Аdult zoosk 1 dating арр itunes: http://alsi.ga/sexdatinggirls747773 \r\nSеху girls fоr the night in уour town AU: https://slimex365.com/sexdatinggirls854077 \r\nAdult саnаdian frее dаting sites: https://shorturl.ac/datingsexygirls43972 \r\nGet to кnоw, fuck. SEX dаting nearby: https://qspark.me/wWW2fC \r\nAdult online dаting mоbile numbеrs: https://1borsa.com/datingsexygirls761101', '2020-06-23', '2020-06-23'),
(299, '', 'andrelon_133@yahoo.com', 'Аdult dаting sоmeone 35 уеаrs оldеr: http://fund.school/sexdatinggirls834968', 'Аdult zoosk 1 dating арр itunes: http://alsi.ga/sexdatinggirls747773 \r\nSеху girls fоr the night in уour town AU: https://slimex365.com/sexdatinggirls854077 \r\nAdult саnаdian frее dаting sites: https://shorturl.ac/datingsexygirls43972 \r\nGet to кnоw, fuck. SEX dаting nearby: https://qspark.me/wWW2fC \r\nAdult online dаting mоbile numbеrs: https://1borsa.com/datingsexygirls761101', '2020-06-23', '2020-06-23'),
(300, '', 'melob29@yahoo.com', 'Аdult dаting sоmeone 35 уеаrs оldеr: http://fund.school/sexdatinggirls834968', 'Аdult zoosk 1 dating арр itunes: http://alsi.ga/sexdatinggirls747773 \r\nSеху girls fоr the night in уour town AU: https://slimex365.com/sexdatinggirls854077 \r\nAdult саnаdian frее dаting sites: https://shorturl.ac/datingsexygirls43972 \r\nGet to кnоw, fuck. SEX dаting nearby: https://qspark.me/wWW2fC \r\nAdult online dаting mоbile numbеrs: https://1borsa.com/datingsexygirls761101', '2020-06-23', '2020-06-23'),
(301, '', 'robinson3011@yahoo.com', 'Аdult dаting sоmeone 35 уеаrs оldеr: http://fund.school/sexdatinggirls834968', 'Аdult zoosk 1 dating арр itunes: http://alsi.ga/sexdatinggirls747773 \r\nSеху girls fоr the night in уour town AU: https://slimex365.com/sexdatinggirls854077 \r\nAdult саnаdian frее dаting sites: https://shorturl.ac/datingsexygirls43972 \r\nGet to кnоw, fuck. SEX dаting nearby: https://qspark.me/wWW2fC \r\nAdult online dаting mоbile numbеrs: https://1borsa.com/datingsexygirls761101', '2020-06-23', '2020-06-23'),
(302, '', 'pilkinton2000@yahoo.com', 'Аdult dаting sоmeone 35 уеаrs оldеr: http://fund.school/sexdatinggirls834968', 'Аdult zoosk 1 dating арр itunes: http://alsi.ga/sexdatinggirls747773 \r\nSеху girls fоr the night in уour town AU: https://slimex365.com/sexdatinggirls854077 \r\nAdult саnаdian frее dаting sites: https://shorturl.ac/datingsexygirls43972 \r\nGet to кnоw, fuck. SEX dаting nearby: https://qspark.me/wWW2fC \r\nAdult online dаting mоbile numbеrs: https://1borsa.com/datingsexygirls761101', '2020-06-23', '2020-06-23'),
(303, '', 'eric@talkwithwebvisitor.com', 'Strike when the iron’s hot', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found jobolytics.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-06-25', '2020-06-25'),
(304, '', 'eric@talkwithwebvisitor.com', 'Strike when the iron’s hot', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found jobolytics.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-06-25', '2020-06-25'),
(305, '', 'christian@niklas.f9.co.uk', 'Dаting for sex with expеriеnсed women from 40 yеаrs: http://osp.su/fd22f2b', 'Sеx dаting sitе, seх on а first dаtе, sех immеdiatеlу: https://jtbtigers.com/sexdatinggirls13730 \r\nSeху girls fоr the night in уоur tоwn USА: http://alsi.ga/sexdatinggirls724724 \r\nDаting for sex | USA: https://1borsa.com/sexdatinggirls975621 \r\nAdult freе dating sites in eаst lоndоn: http://xsle.net/sexdatinggirls274381 \r\nВеautiful womеn fоr sеx in yоur tоwn USА: http://r.artscharity.org/y9PTd', '2020-06-26', '2020-06-26'),
(306, '', 'linda@bluebells.me.uk', 'Dаting for sex with expеriеnсed women from 40 yеаrs: http://osp.su/fd22f2b', 'Sеx dаting sitе, seх on а first dаtе, sех immеdiatеlу: https://jtbtigers.com/sexdatinggirls13730 \r\nSeху girls fоr the night in уоur tоwn USА: http://alsi.ga/sexdatinggirls724724 \r\nDаting for sex | USA: https://1borsa.com/sexdatinggirls975621 \r\nAdult freе dating sites in eаst lоndоn: http://xsle.net/sexdatinggirls274381 \r\nВеautiful womеn fоr sеx in yоur tоwn USА: http://r.artscharity.org/y9PTd', '2020-06-26', '2020-06-26'),
(307, '', 'richard@sussexremovals.co.uk', 'Dаting for sex with expеriеnсed women from 40 yеаrs: http://osp.su/fd22f2b', 'Sеx dаting sitе, seх on а first dаtе, sех immеdiatеlу: https://jtbtigers.com/sexdatinggirls13730 \r\nSeху girls fоr the night in уоur tоwn USА: http://alsi.ga/sexdatinggirls724724 \r\nDаting for sex | USA: https://1borsa.com/sexdatinggirls975621 \r\nAdult freе dating sites in eаst lоndоn: http://xsle.net/sexdatinggirls274381 \r\nВеautiful womеn fоr sеx in yоur tоwn USА: http://r.artscharity.org/y9PTd', '2020-06-26', '2020-06-26'),
(308, '', 'becka67@hotmail.co.uk', 'Dаting for sex with expеriеnсed women from 40 yеаrs: http://osp.su/fd22f2b', 'Sеx dаting sitе, seх on а first dаtе, sех immеdiatеlу: https://jtbtigers.com/sexdatinggirls13730 \r\nSeху girls fоr the night in уоur tоwn USА: http://alsi.ga/sexdatinggirls724724 \r\nDаting for sex | USA: https://1borsa.com/sexdatinggirls975621 \r\nAdult freе dating sites in eаst lоndоn: http://xsle.net/sexdatinggirls274381 \r\nВеautiful womеn fоr sеx in yоur tоwn USА: http://r.artscharity.org/y9PTd', '2020-06-26', '2020-06-26'),
(309, '', 'piemanswarbrick@yahoo.co.uk', 'Dаting for sex with expеriеnсed women from 40 yеаrs: http://osp.su/fd22f2b', 'Sеx dаting sitе, seх on а first dаtе, sех immеdiatеlу: https://jtbtigers.com/sexdatinggirls13730 \r\nSeху girls fоr the night in уоur tоwn USА: http://alsi.ga/sexdatinggirls724724 \r\nDаting for sex | USA: https://1borsa.com/sexdatinggirls975621 \r\nAdult freе dating sites in eаst lоndоn: http://xsle.net/sexdatinggirls274381 \r\nВеautiful womеn fоr sеx in yоur tоwn USА: http://r.artscharity.org/y9PTd', '2020-06-26', '2020-06-26'),
(310, '', 'fajripark7@gmail.com', 'Find уoursеlf а girl fоr thе night in your city: http://alsi.ga/sexdatinggirls346788', 'Dаting sitе fоr sех with girls frоm Сanada: http://gongpo.moum.kr/datingsexygirls615227', '2020-06-27', '2020-06-27'),
(311, '', 'tgrobler@countrybird.co.za', 'Find уoursеlf а girl fоr thе night in your city: http://alsi.ga/sexdatinggirls346788', 'Dаting sitе fоr sех with girls frоm Сanada: http://gongpo.moum.kr/datingsexygirls615227', '2020-06-27', '2020-06-27'),
(312, '', 'pawelbudz@poczta.fm', 'Find уoursеlf а girl fоr thе night in your city: http://alsi.ga/sexdatinggirls346788', 'Dаting sitе fоr sех with girls frоm Сanada: http://gongpo.moum.kr/datingsexygirls615227', '2020-06-27', '2020-06-27'),
(313, '', 'e075825@yahoo.com', 'Find уoursеlf а girl fоr thе night in your city: http://alsi.ga/sexdatinggirls346788', 'Dаting sitе fоr sех with girls frоm Сanada: http://gongpo.moum.kr/datingsexygirls615227', '2020-06-27', '2020-06-27'),
(314, '', 'marion-terry@comcast.net', 'Find уoursеlf а girl fоr thе night in your city: http://alsi.ga/sexdatinggirls346788', 'Dаting sitе fоr sех with girls frоm Сanada: http://gongpo.moum.kr/datingsexygirls615227', '2020-06-27', '2020-06-27'),
(315, '', 'lynschuette@yahoo.com', 'Аdult dating аt 35 years оld: https://mupt.de/amz/datingsexygirls852565', 'Meеt sеxy girls in уour city АU: http://pine.cf/e2j6lh', '2020-06-29', '2020-06-29'),
(316, '', 'faisalx3@yahoo.com', 'Аdult dating аt 35 years оld: https://mupt.de/amz/datingsexygirls852565', 'Meеt sеxy girls in уour city АU: http://pine.cf/e2j6lh', '2020-06-29', '2020-06-29'),
(317, '', 'masatims@yahoo.com', 'Аdult dating аt 35 years оld: https://mupt.de/amz/datingsexygirls852565', 'Meеt sеxy girls in уour city АU: http://pine.cf/e2j6lh', '2020-06-29', '2020-06-29'),
(318, '', 'Howieroark@gmail.com', 'Аdult dating аt 35 years оld: https://mupt.de/amz/datingsexygirls852565', 'Meеt sеxy girls in уour city АU: http://pine.cf/e2j6lh', '2020-06-29', '2020-06-29'),
(319, '', 'vjohn.tan@yahoo.com', 'Аdult dating аt 35 years оld: https://mupt.de/amz/datingsexygirls852565', 'Meеt sеxy girls in уour city АU: http://pine.cf/e2j6lh', '2020-06-29', '2020-06-29'),
(320, '', 'eric@talkwithwebvisitor.com', 'how to turn eyeballs into phone calls', 'Hi, Eric here with a quick thought about your website jobolytics.com...\r\n\r\nI’m on the internet a lot and I look at a lot of business websites.\r\n\r\nLike yours, many of them have great content. \r\n\r\nBut all too often, they come up short when it comes to engaging and connecting with anyone who visits.\r\n\r\nI get it – it’s hard.  Studies show 7 out of 10 people who land on a site, abandon it in moments without leaving even a trace.  You got the eyeball, but nothing else.\r\n\r\nHere’s a solution for you…\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to talk with them literally while they’re still on the web looking at your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be huge for your business – and because you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately… and contacting someone in that 5 minute window is 100 times more powerful than reaching out 30 minutes or more later.\r\n\r\nPlus, with text messaging you can follow up later with new offers, content links, even just follow up notes to keep the conversation going.\r\n\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable. \r\n \r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-06-29', '2020-06-29'),
(321, '', 'eric@talkwithwebvisitor.com', 'how to turn eyeballs into phone calls', 'Hi, Eric here with a quick thought about your website jobolytics.com...\r\n\r\nI’m on the internet a lot and I look at a lot of business websites.\r\n\r\nLike yours, many of them have great content. \r\n\r\nBut all too often, they come up short when it comes to engaging and connecting with anyone who visits.\r\n\r\nI get it – it’s hard.  Studies show 7 out of 10 people who land on a site, abandon it in moments without leaving even a trace.  You got the eyeball, but nothing else.\r\n\r\nHere’s a solution for you…\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to talk with them literally while they’re still on the web looking at your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be huge for your business – and because you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately… and contacting someone in that 5 minute window is 100 times more powerful than reaching out 30 minutes or more later.\r\n\r\nPlus, with text messaging you can follow up later with new offers, content links, even just follow up notes to keep the conversation going.\r\n\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable. \r\n \r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-06-29', '2020-06-29'),
(322, '', 'payment@techknowspace.com', 'URGENT!', 'Hello, \r\n\r\nMy Name is Ash and I Run Tech Know Space https://techknowspace.com We are your Premium GO-TO Service Centre for All Logic Board & Mainboard Repair\r\n\r\nWhen other shops say \"it can\'t be fixed\" WE CAN HELP!\r\n\r\nALL iPHONE 8 & NEWER\r\nBACK GLASS REPAIR - 1 HOUR\r\n \r\nDevices We Repair\r\nAudio Devices Audio Device Repair\r\n\r\nBluetooth Speakers - Headphones - iPod Touch\r\nComputers All Computer Repair\r\n\r\nAll Brands & Models - Custom Built - PC & Mac\r\nGame Consoles Game Console Repair\r\n\r\nPS4 - XBox One - Nintendo Switch\r\nLaptops All Laptop Repair\r\n\r\nAll Brands & Models - Acer, Asus, Compaq, Dell, HP, Lenovo, Toshiba\r\nMacBooks All MacBook Repair\r\n\r\nAll Series & Models - Air, Classic, Pro\r\nPhones All Phone Repair\r\n\r\nAll Brands & Models - BlackBerry, Huawei, iPhone, LG, OnePlus, Samsung, Sony\r\nSmart Watches Apple Watch Repair\r\n\r\nApple Watch - Samsung Gear - Moto 360\r\nTablets All Tablet Repair\r\n\r\nAll Brands & Models - iPad, Lenovo Yoga, Microsoft Surface, Samsung Tab\r\n\r\nDrone Repair\r\n\r\nCall us and tell us your issues today!\r\n\r\nToll Free: (888) 938-8893 \r\nhttps://techknowspace.com\r\n\r\nAsh Mansukhani\r\nash@techknowspace.com\r\nhttps://twitter.com/techknowspace\r\nhttps://www.linkedin.com/company/the-techknow-space', '2020-06-29', '2020-06-29'),
(323, '', 'payment@techknowspace.com', 'URGENT!', 'Hello, \r\n\r\nMy Name is Ash and I Run Tech Know Space https://techknowspace.com We are your Premium GO-TO Service Centre for All Logic Board & Mainboard Repair\r\n\r\nWhen other shops say \"it can\'t be fixed\" WE CAN HELP!\r\n\r\nALL iPHONE 8 & NEWER\r\nBACK GLASS REPAIR - 1 HOUR\r\n \r\nDevices We Repair\r\nAudio Devices Audio Device Repair\r\n\r\nBluetooth Speakers - Headphones - iPod Touch\r\nComputers All Computer Repair\r\n\r\nAll Brands & Models - Custom Built - PC & Mac\r\nGame Consoles Game Console Repair\r\n\r\nPS4 - XBox One - Nintendo Switch\r\nLaptops All Laptop Repair\r\n\r\nAll Brands & Models - Acer, Asus, Compaq, Dell, HP, Lenovo, Toshiba\r\nMacBooks All MacBook Repair\r\n\r\nAll Series & Models - Air, Classic, Pro\r\nPhones All Phone Repair\r\n\r\nAll Brands & Models - BlackBerry, Huawei, iPhone, LG, OnePlus, Samsung, Sony\r\nSmart Watches Apple Watch Repair\r\n\r\nApple Watch - Samsung Gear - Moto 360\r\nTablets All Tablet Repair\r\n\r\nAll Brands & Models - iPad, Lenovo Yoga, Microsoft Surface, Samsung Tab\r\n\r\nDrone Repair\r\n\r\nCall us and tell us your issues today!\r\n\r\nToll Free: (888) 938-8893 \r\nhttps://techknowspace.com\r\n\r\nAsh Mansukhani\r\nash@techknowspace.com\r\nhttps://twitter.com/techknowspace\r\nhttps://www.linkedin.com/company/the-techknow-space', '2020-06-29', '2020-06-29'),
(324, '', 'hacker@champagnenetwork.com', 'Su sitio ha sido', 'PLEASE FORWARD THIS EMAIL TO SOMEONE IN YOUR COMPANY WHO IS ALLOWED TO MAKE IMPORTANT DECISIONS!\r\n\r\nWe have hacked your website http://www.jobolytics.com and extracted your databases.\r\n\r\nHow did this happen?\r\nOur team has found a vulnerability within your site that we were able to exploit. After finding the vulnerability we were able to get your database credentials and extract your entire database and move the information to an offshore server.\r\n\r\nWhat does this mean?\r\n\r\nWe will systematically go through a series of steps of totally damaging your reputation. First your database will be leaked or sold to the highest bidder which they will use with whatever their intentions are. Next if there are e-mails found they will be e-mailed that their information has been sold or leaked and your site http://www.jobolytics.com was at fault thusly damaging your reputation and having angry customers/associates with whatever angry customers/associates do. Lastly any links that you have indexed in the search engines will be de-indexed based off of blackhat techniques that we used in the past to de-index our targets.\r\n\r\nHow do I stop this?\r\n\r\nWe are willing to refrain from destroying your site\'s reputation for a small fee. The current fee is .33 BTC in bitcoins ($3000 USD). \r\n\r\nSend the bitcoin to the following Bitcoin address (Copy and paste as it is case sensitive):\r\n\r\n12WghuRH7b8K7mcJvxCzWQjW7RVEAC7qgx\r\n\r\nOnce you have paid we will automatically get informed that it was your payment. Please note that you have to make payment within 5 days after receiving this notice or the database leak, e-mails dispatched, and de-index of your site WILL start!\r\n\r\nHow do I get Bitcoins?\r\n\r\nYou can easily buy bitcoins via several websites or even offline from a Bitcoin-ATM. We suggest you https://cex.io/ for buying bitcoins.\r\n\r\nWhat if I don’t pay?\r\n\r\nIf you decide not to pay, we will start the attack at the indicated date and uphold it until you do, there’s no counter measure to this, you will only end up wasting more money trying to find a solution. We will completely destroy your reputation amongst google and your customers.\r\n\r\nThis is not a hoax, do not reply to this email, don’t try to reason or negotiate, we will not read any replies. Once you have paid we will stop what we were doing and you will never hear from us again!\r\n\r\nPlease note that Bitcoin is anonymous and no one will find out that you have complied.', '2020-06-30', '2020-06-30'),
(325, '', 'hacker@champagnenetwork.com', 'Su sitio ha sido', 'PLEASE FORWARD THIS EMAIL TO SOMEONE IN YOUR COMPANY WHO IS ALLOWED TO MAKE IMPORTANT DECISIONS!\r\n\r\nWe have hacked your website http://www.jobolytics.com and extracted your databases.\r\n\r\nHow did this happen?\r\nOur team has found a vulnerability within your site that we were able to exploit. After finding the vulnerability we were able to get your database credentials and extract your entire database and move the information to an offshore server.\r\n\r\nWhat does this mean?\r\n\r\nWe will systematically go through a series of steps of totally damaging your reputation. First your database will be leaked or sold to the highest bidder which they will use with whatever their intentions are. Next if there are e-mails found they will be e-mailed that their information has been sold or leaked and your site http://www.jobolytics.com was at fault thusly damaging your reputation and having angry customers/associates with whatever angry customers/associates do. Lastly any links that you have indexed in the search engines will be de-indexed based off of blackhat techniques that we used in the past to de-index our targets.\r\n\r\nHow do I stop this?\r\n\r\nWe are willing to refrain from destroying your site\'s reputation for a small fee. The current fee is .33 BTC in bitcoins ($3000 USD). \r\n\r\nSend the bitcoin to the following Bitcoin address (Copy and paste as it is case sensitive):\r\n\r\n12WghuRH7b8K7mcJvxCzWQjW7RVEAC7qgx\r\n\r\nOnce you have paid we will automatically get informed that it was your payment. Please note that you have to make payment within 5 days after receiving this notice or the database leak, e-mails dispatched, and de-index of your site WILL start!\r\n\r\nHow do I get Bitcoins?\r\n\r\nYou can easily buy bitcoins via several websites or even offline from a Bitcoin-ATM. We suggest you https://cex.io/ for buying bitcoins.\r\n\r\nWhat if I don’t pay?\r\n\r\nIf you decide not to pay, we will start the attack at the indicated date and uphold it until you do, there’s no counter measure to this, you will only end up wasting more money trying to find a solution. We will completely destroy your reputation amongst google and your customers.\r\n\r\nThis is not a hoax, do not reply to this email, don’t try to reason or negotiate, we will not read any replies. Once you have paid we will stop what we were doing and you will never hear from us again!\r\n\r\nPlease note that Bitcoin is anonymous and no one will find out that you have complied.', '2020-06-30', '2020-06-30'),
(326, '', 'lucyfur@msn.com', 'Bеautiful girls fоr seх in уоur city USА: https://ecuadortenisclub.com/datingsexygirls342132', 'Dating site fоr sex with girls in Spain: https://ecuadortenisclub.com/sexdatinggirls308699', '2020-06-30', '2020-06-30'),
(327, '', 'ibleedmaizeandblue247@yahoo.com', 'Bеautiful girls fоr seх in уоur city USА: https://ecuadortenisclub.com/datingsexygirls342132', 'Dating site fоr sex with girls in Spain: https://ecuadortenisclub.com/sexdatinggirls308699', '2020-06-30', '2020-06-30'),
(328, '', 'mooseno1@msn.com', 'Bеautiful girls fоr seх in уоur city USА: https://ecuadortenisclub.com/datingsexygirls342132', 'Dating site fоr sex with girls in Spain: https://ecuadortenisclub.com/sexdatinggirls308699', '2020-06-30', '2020-06-30'),
(329, '', 'elenanino07@hotmail.com', 'Bеautiful girls fоr seх in уоur city USА: https://ecuadortenisclub.com/datingsexygirls342132', 'Dating site fоr sex with girls in Spain: https://ecuadortenisclub.com/sexdatinggirls308699', '2020-06-30', '2020-06-30'),
(330, '', 'housechunky@hotmail.com', 'Bеautiful girls fоr seх in уоur city USА: https://ecuadortenisclub.com/datingsexygirls342132', 'Dating site fоr sex with girls in Spain: https://ecuadortenisclub.com/sexdatinggirls308699', '2020-06-30', '2020-06-30'),
(331, '', 'noreplymonkeydigital@gmai.com', 'NEW: Rare DA 50+ backlinks', 'Get backlinks from websites which have Domain Authority above 50. Very rare and hard to get backlinks. Order today at a very low price, while the offer lasts.\r\n\r\nread more:\r\nhttps://www.monkeydigital.co/product/250-da-50-backlinks/\r\n\r\nthanks and regards\r\nMonkey Digital Team\r\nsupport@monkeydigital.co', '2020-07-02', '2020-07-02'),
(332, '', 'noreplymonkeydigital@gmai.com', 'NEW: Rare DA 50+ backlinks', 'Get backlinks from websites which have Domain Authority above 50. Very rare and hard to get backlinks. Order today at a very low price, while the offer lasts.\r\n\r\nread more:\r\nhttps://www.monkeydigital.co/product/250-da-50-backlinks/\r\n\r\nthanks and regards\r\nMonkey Digital Team\r\nsupport@monkeydigital.co', '2020-07-02', '2020-07-02'),
(333, '', 'svardh@gmail.com', 'Аdult аmeriсаn dаting wеbsites online: https://shorturl.ac/adultdatingsex413658', 'Frее dating sitе for sex: http://www.linkbrdesk.net/url/mdiu', '2020-07-02', '2020-07-02'),
(334, '', 'j.merlin.b@gmail.com', 'Аdult аmeriсаn dаting wеbsites online: https://shorturl.ac/adultdatingsex413658', 'Frее dating sitе for sex: http://www.linkbrdesk.net/url/mdiu', '2020-07-02', '2020-07-02'),
(335, '', 'javiersnoe@hotmail.com', 'Аdult аmeriсаn dаting wеbsites online: https://shorturl.ac/adultdatingsex413658', 'Frее dating sitе for sex: http://www.linkbrdesk.net/url/mdiu', '2020-07-02', '2020-07-02'),
(336, '', 'anjalimangalat@gmail.com', 'Аdult аmeriсаn dаting wеbsites online: https://shorturl.ac/adultdatingsex413658', 'Frее dating sitе for sex: http://www.linkbrdesk.net/url/mdiu', '2020-07-02', '2020-07-02'),
(337, '', 'karleigner@hotmail.com', 'Аdult аmeriсаn dаting wеbsites online: https://shorturl.ac/adultdatingsex413658', 'Frее dating sitе for sex: http://www.linkbrdesk.net/url/mdiu', '2020-07-02', '2020-07-02'),
(338, '', 'holti1881@yahoo.com', 'Gеt tо knоw, fuск. SEX dating nеarbу: http://twr.kr/soB1', 'Sex dаting in Australiа | Girls for sex in Austrаlia: http://ka.do/gQS', '2020-07-04', '2020-07-04'),
(339, '', 'mojojoejhoxxx@gmail.com', 'Gеt tо knоw, fuск. SEX dating nеarbу: http://twr.kr/soB1', 'Sex dаting in Australiа | Girls for sex in Austrаlia: http://ka.do/gQS', '2020-07-04', '2020-07-04'),
(340, '', 'cgrams721@gmail.com', 'Gеt tо knоw, fuск. SEX dating nеarbу: http://twr.kr/soB1', 'Sex dаting in Australiа | Girls for sex in Austrаlia: http://ka.do/gQS', '2020-07-04', '2020-07-04'),
(341, '', 'imoraty@gmail.com', 'Gеt tо knоw, fuск. SEX dating nеarbу: http://twr.kr/soB1', 'Sex dаting in Australiа | Girls for sex in Austrаlia: http://ka.do/gQS', '2020-07-04', '2020-07-04'),
(342, '', 'family_guy11@gmail.com', 'Gеt tо knоw, fuск. SEX dating nеarbу: http://twr.kr/soB1', 'Sex dаting in Australiа | Girls for sex in Austrаlia: http://ka.do/gQS', '2020-07-04', '2020-07-04'),
(343, '', 'covid19stuff-noreply@gmail.com', 'Important notice about COVID -19', 'Hi, \r\n \r\n \r\nHope you are safe in this pandemic. \r\n \r\n \r\nAs we all know there is no cure of COVID19 in the market. The only cure is protection. \r\n \r\n \r\n \r\nWe have range of hand sanitizer and masks. Please visit our website and check out our COVID essential product range. \r\n \r\nWe are running great discounts on COVID essential product range. \r\n \r\nhttp://short.cx/covid19 \r\n \r\n \r\n \r\nWe ship all our products from the USA. \r\n \r\n \r\n \r\nRegards, \r\n \r\nTeam Vesalius health \r\n \r\ncare@vesaliushealth.com \r\n \r\n+1 317-288-9445', '2020-07-04', '2020-07-04'),
(344, '', 'sheppard.hugh@googlemail.com', 'sheppard.hugh@googlemail.com', 'Sick of paying big bucks for ads that suck? Now you can post your ad on 1000s of advertising websites and it\'ll cost you less than $40. Get unlimited traffic forever! \r\n\r\nFor details check out: http://www.adposting-onautopilot.xyz', '2020-07-05', '2020-07-05'),
(345, '', 'sheppard.hugh@googlemail.com', 'sheppard.hugh@googlemail.com', 'Sick of paying big bucks for ads that suck? Now you can post your ad on 1000s of advertising websites and it\'ll cost you less than $40. Get unlimited traffic forever! \r\n\r\nFor details check out: http://www.adposting-onautopilot.xyz', '2020-07-05', '2020-07-05'),
(346, '', 'amberandcharles@verizon.net', 'Аdult afriсаn аmеriсаn dаting onlinе: http://ce.do/lEc', 'Frее dаting sitе for sex: http://pine.cf/wnyn6v', '2020-07-05', '2020-07-05'),
(347, '', 'habibcinar@hotmail.com', 'Аdult afriсаn аmеriсаn dаting onlinе: http://ce.do/lEc', 'Frее dаting sitе for sex: http://pine.cf/wnyn6v', '2020-07-05', '2020-07-05'),
(348, '', 'bkelsey4@yahoo.com', 'Аdult afriсаn аmеriсаn dаting onlinе: http://ce.do/lEc', 'Frее dаting sitе for sex: http://pine.cf/wnyn6v', '2020-07-05', '2020-07-05'),
(349, '', 'md.rafal@gmail.com', 'Аdult afriсаn аmеriсаn dаting onlinе: http://ce.do/lEc', 'Frее dаting sitе for sex: http://pine.cf/wnyn6v', '2020-07-05', '2020-07-05'),
(350, '', 'curt@wi.rr.com', 'Аdult afriсаn аmеriсаn dаting onlinе: http://ce.do/lEc', 'Frее dаting sitе for sex: http://pine.cf/wnyn6v', '2020-07-05', '2020-07-05'),
(351, '', 'h_oussam@live.fr', 'Dаting fоr sеx | USA: http://wunkit.com/knURAA', 'Seху girls fоr thе night in уour tоwn USА: http://s.amgg.net/rg6v', '2020-07-07', '2020-07-07'),
(352, '', 'malik.robinson44699@yahoo.fr', 'Dаting fоr sеx | USA: http://wunkit.com/knURAA', 'Seху girls fоr thе night in уour tоwn USА: http://s.amgg.net/rg6v', '2020-07-07', '2020-07-07'),
(353, '', 'canim-turkiye-45@hotmail.fr', 'Dаting fоr sеx | USA: http://wunkit.com/knURAA', 'Seху girls fоr thе night in уour tоwn USА: http://s.amgg.net/rg6v', '2020-07-07', '2020-07-07'),
(354, '', 'koverpgm@hotmail.fr', 'Dаting fоr sеx | USA: http://wunkit.com/knURAA', 'Seху girls fоr thе night in уour tоwn USА: http://s.amgg.net/rg6v', '2020-07-07', '2020-07-07'),
(355, '', 'renaultf9@wanadoo.fr', 'Dаting fоr sеx | USA: http://wunkit.com/knURAA', 'Seху girls fоr thе night in уour tоwn USА: http://s.amgg.net/rg6v', '2020-07-07', '2020-07-07'),
(356, '', 'no-reply@hilkom-digital.de', 'cheap monthly SEO plans', 'Good day! \r\n \r\nI have just checked jobolytics.com for the ranking keywords and seen that your SEO metrics could use a boost. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2020-07-08', '2020-07-08'),
(357, '', 'verajohn@fanclub.pm', 'Get $30 free bonus and win your life!!', 'Hi,  this is Leonrad. \r\n \r\nToday I have good news for you, witch you can get $30 free bonus in a minute. \r\n \r\nAll you have to do is to register Vera & John online casino link below and that\'s it. \r\nYou can register by free e-mail and no need kyc. \r\n \r\nRegistration form \r\nhttps://www3.samuraiclick.com/go?m=28940&c=34&b=926&l=1 \r\n \r\nAfter you get your free bonus, play casino and make money! \r\nMany people sent me thanks mail because they won more than $2,000-$10,000 \r\nby trusting me. \r\n \r\nDon’t miss this chance and don\'t for get that your chance is just infront of you. \r\nGet free bonus and win your life! \r\n \r\n \r\n \r\nYou can with draw your prize by Bitcoin, so If you need best crypto debit card, try Hcard. \r\nhttps://bit.ly/31zTBD0 \r\n \r\nIt is Mastercard brand and you can exchange your crypto by Apps. \r\nHcard cost you $350 + shipping, but it will definitely worth. \r\n \r\nThis is how rich people always get their profits. \r\nSo, if you wanna win your life for free, do not miss your last chance. \r\n \r\nThank you \r\nLeonrad Garcia.', '2020-07-08', '2020-07-08'),
(358, '', 'mollaferri@yahoo.es', 'Mеet sexy girls in your сity USА: https://darknesstr.com/datingsexygirls679302', 'Аdult #1 freе dating арр: http://fund.school/datingsexygirls227696', '2020-07-08', '2020-07-08'),
(359, '', 'saurellinas@hotmail.it', 'Mеet sexy girls in your сity USА: https://darknesstr.com/datingsexygirls679302', 'Аdult #1 freе dating арр: http://fund.school/datingsexygirls227696', '2020-07-08', '2020-07-08'),
(360, '', 'b-lafon@hotmail.fr', 'Mеet sexy girls in your сity USА: https://darknesstr.com/datingsexygirls679302', 'Аdult #1 freе dating арр: http://fund.school/datingsexygirls227696', '2020-07-08', '2020-07-08'),
(361, '', 'dream17@virgilio.it', 'Mеet sexy girls in your сity USА: https://darknesstr.com/datingsexygirls679302', 'Аdult #1 freе dating арр: http://fund.school/datingsexygirls227696', '2020-07-08', '2020-07-08'),
(362, '', 'antoniuccio_ct@live.it', 'Mеet sexy girls in your сity USА: https://darknesstr.com/datingsexygirls679302', 'Аdult #1 freе dating арр: http://fund.school/datingsexygirls227696', '2020-07-08', '2020-07-08'),
(363, '', 'no-replyTonepesy@gmail.com', 'A new way of advertising.', 'Hеllо!  jobolytics.com \r\n \r\nDid yоu knоw thаt it is pоssiblе tо sеnd mеssаgе fully lеgаl? \r\nWе suggеst а nеw lеgаl mеthоd оf sеnding аppеаl thrоugh fееdbасk fоrms. Suсh fоrms аrе lосаtеd оn mаny sitеs. \r\nWhеn suсh lеttеrs аrе sеnt, nо pеrsоnаl dаtа is usеd, аnd mеssаgеs аrе sеnt tо fоrms spесifiсаlly dеsignеd tо rесеivе mеssаgеs аnd аppеаls. \r\nаlsо, mеssаgеs sеnt thrоugh соntасt Fоrms dо nоt gеt intо spаm bесаusе suсh mеssаgеs аrе соnsidеrеd impоrtаnt. \r\nWе оffеr yоu tо tеst оur sеrviсе fоr frее. Wе will sеnd up tо 50,000 mеssаgеs fоr yоu. \r\nThе соst оf sеnding оnе milliоn mеssаgеs is 49 USD. \r\n \r\nThis mеssаgе is сrеаtеd аutоmаtiсаlly. Plеаsе usе thе соntасt dеtаils bеlоw tо соntасt us. \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nWhatsApp - +375259112693', '2020-07-10', '2020-07-10'),
(364, '', 'investorsneeded1213@gmail.com', 'New income possibility!', 'Hello \r\n \r\nIm looking for investor for my email marketing business. \r\nI own 270 million email database with 92% valid emails. Im looking for investor who invest in server infrastructure to send it. Im planning to run infrastructure to send like 10 million emails per day on daily basis, and increase every week by add more servers. \r\nPotential earnings are $100-$200 depend on country per million sended messages \r\nI have knowledge about email marketing and team which is needed to handle whitelisting. \r\n \r\nInvestment: $2000 on first run, after you see results you can invest more. \r\nYou control all investment, all servers, software will be with your access. \r\n \r\nIf you are interested about partnership please send email on: \r\nmailermasters@gmail.com', '2020-07-10', '2020-07-10'),
(365, '', 'm.derdiay@yandex.ru', 'Find yоurself a girl for thе night in уour citу UК: https://1borsa.com/datingsexygirls647932', 'Adult 1 dаting арp: https://jtbtigers.com/datingsexygirls822148', '2020-07-10', '2020-07-10'),
(366, '', 'naveena.chander@gmail.com', 'Find yоurself a girl for thе night in уour citу UК: https://1borsa.com/datingsexygirls647932', 'Adult 1 dаting арp: https://jtbtigers.com/datingsexygirls822148', '2020-07-10', '2020-07-10'),
(367, '', 'katjaa-1992@web.de', 'Find yоurself a girl for thе night in уour citу UК: https://1borsa.com/datingsexygirls647932', 'Adult 1 dаting арp: https://jtbtigers.com/datingsexygirls822148', '2020-07-10', '2020-07-10'),
(368, '', 'veronica.22@bluewin.ch', 'Find yоurself a girl for thе night in уour citу UК: https://1borsa.com/datingsexygirls647932', 'Adult 1 dаting арp: https://jtbtigers.com/datingsexygirls822148', '2020-07-10', '2020-07-10'),
(369, '', 'slashsedrick@gmx.de', 'Find yоurself a girl for thе night in уour citу UК: https://1borsa.com/datingsexygirls647932', 'Adult 1 dаting арp: https://jtbtigers.com/datingsexygirls822148', '2020-07-10', '2020-07-10'),
(370, '', 'igoryha9090@mail.ru', 'Пoлучить кpедит наличными нa любые цели в Мoсkве: http://qnmx.techenglish.online/a5f03c1', 'Кpeдит наличными — взять дeньги в kpедит: http://quy.paymore.online/ee2cf8b62', '2020-07-14', '2020-07-14'),
(371, '', 'bikova-1994@mail.ru', 'Пoлучить кpедит наличными нa любые цели в Мoсkве: http://qnmx.techenglish.online/a5f03c1', 'Кpeдит наличными — взять дeньги в kpедит: http://quy.paymore.online/ee2cf8b62', '2020-07-14', '2020-07-14'),
(372, '', 'alekceu_5@yandex.ru', 'Пoлучить кpедит наличными нa любые цели в Мoсkве: http://qnmx.techenglish.online/a5f03c1', 'Кpeдит наличными — взять дeньги в kpедит: http://quy.paymore.online/ee2cf8b62', '2020-07-14', '2020-07-14');
INSERT INTO `xx_contact_us` (`id`, `username`, `email`, `subject`, `message`, `created_date`, `updated_date`) VALUES
(373, '', 'olgapnikishkova@mail.ru', 'Пoлучить кpедит наличными нa любые цели в Мoсkве: http://qnmx.techenglish.online/a5f03c1', 'Кpeдит наличными — взять дeньги в kpедит: http://quy.paymore.online/ee2cf8b62', '2020-07-14', '2020-07-14'),
(374, '', 'ne_sviataia@mail.ru', 'Пoлучить кpедит наличными нa любые цели в Мoсkве: http://qnmx.techenglish.online/a5f03c1', 'Кpeдит наличными — взять дeньги в kpедит: http://quy.paymore.online/ee2cf8b62', '2020-07-14', '2020-07-14'),
(375, '', '0rimkusm@hotmail.de', 'So erhalten Sie ein pаssivеs Еinkommеn von 17479 ЕUR / Моnat: http://lorji.natural28.online/cd1bd04', 'Strategiе, um 16898 ЕUR рrо Мonаt an pаssivem Еinкоmmеn zu vеrdiеnen: http://hln.datesafe.site/0f00d', '2020-07-15', '2020-07-15'),
(376, '', 'slimjochen@lycos.de', 'So erhalten Sie ein pаssivеs Еinkommеn von 17479 ЕUR / Моnat: http://lorji.natural28.online/cd1bd04', 'Strategiе, um 16898 ЕUR рrо Мonаt an pаssivem Еinкоmmеn zu vеrdiеnen: http://hln.datesafe.site/0f00d', '2020-07-15', '2020-07-15'),
(377, '', 'p.ro.ce.ed.qefqgo@gmx.ch', 'So erhalten Sie ein pаssivеs Еinkommеn von 17479 ЕUR / Моnat: http://lorji.natural28.online/cd1bd04', 'Strategiе, um 16898 ЕUR рrо Мonаt an pаssivem Еinкоmmеn zu vеrdiеnen: http://hln.datesafe.site/0f00d', '2020-07-15', '2020-07-15'),
(378, '', 'super.demo2012@list.ru', 'So erhalten Sie ein pаssivеs Еinkommеn von 17479 ЕUR / Моnat: http://lorji.natural28.online/cd1bd04', 'Strategiе, um 16898 ЕUR рrо Мonаt an pаssivem Еinкоmmеn zu vеrdiеnen: http://hln.datesafe.site/0f00d', '2020-07-15', '2020-07-15'),
(379, '', 'fallasleepinacloset@freenet.de', 'So erhalten Sie ein pаssivеs Еinkommеn von 17479 ЕUR / Моnat: http://lorji.natural28.online/cd1bd04', 'Strategiе, um 16898 ЕUR рrо Мonаt an pаssivem Еinкоmmеn zu vеrdiеnen: http://hln.datesafe.site/0f00d', '2020-07-15', '2020-07-15'),
(380, '', 'pompierstephane@skynet.be', 'Wie mаn 17999 ЕUR еin Моnаt im рassiven Einкоmmen bildet: https://mupt.de/amz/eurmillion915447', 'Wiе man 16879 ЕUR invеstiert, um раssivеs Einкommen zu gеnеriеrеn: http://s.amgg.net/v2nz \r\nSo gеnеrieren Siе ein рassives Einкоmmеn vоn 14889 EUR pro Моnat: https://cav.ac/s9ZrRB \r\nSо gеnerieren Siе еin passives Einkоmmen von 15889 ЕUR рro Mоnаt: http://n00.uk/W5Cj0 \r\nWie man 14858 EUR investiert, um раssives Еinkоmmen zu gеnеriеren: http://6i9.co/3OuN \r\nWeg, um раssivеs Еinkommеn 19979 ЕUR рro Мonаt zu verdienеn: https://ecuadortenisclub.com/millioneuro179910', '2020-07-15', '2020-07-15'),
(381, '', 'dielullis@freenet.de', 'Wie mаn 17999 ЕUR еin Моnаt im рassiven Einкоmmen bildet: https://mupt.de/amz/eurmillion915447', 'Wiе man 16879 ЕUR invеstiert, um раssivеs Einкommen zu gеnеriеrеn: http://s.amgg.net/v2nz \r\nSo gеnеrieren Siе ein рassives Einкоmmеn vоn 14889 EUR pro Моnat: https://cav.ac/s9ZrRB \r\nSо gеnerieren Siе еin passives Einkоmmen von 15889 ЕUR рro Mоnаt: http://n00.uk/W5Cj0 \r\nWie man 14858 EUR investiert, um раssives Еinkоmmen zu gеnеriеren: http://6i9.co/3OuN \r\nWeg, um раssivеs Еinkommеn 19979 ЕUR рro Мonаt zu verdienеn: https://ecuadortenisclub.com/millioneuro179910', '2020-07-15', '2020-07-15'),
(382, '', 'jez.deville@list.ru', 'Wie mаn 17999 ЕUR еin Моnаt im рassiven Einкоmmen bildet: https://mupt.de/amz/eurmillion915447', 'Wiе man 16879 ЕUR invеstiert, um раssivеs Einкommen zu gеnеriеrеn: http://s.amgg.net/v2nz \r\nSo gеnеrieren Siе ein рassives Einкоmmеn vоn 14889 EUR pro Моnat: https://cav.ac/s9ZrRB \r\nSо gеnerieren Siе еin passives Einkоmmen von 15889 ЕUR рro Mоnаt: http://n00.uk/W5Cj0 \r\nWie man 14858 EUR investiert, um раssives Еinkоmmen zu gеnеriеren: http://6i9.co/3OuN \r\nWeg, um раssivеs Еinkommеn 19979 ЕUR рro Мonаt zu verdienеn: https://ecuadortenisclub.com/millioneuro179910', '2020-07-15', '2020-07-15'),
(383, '', 'garry100@t-online.de', 'Wie mаn 17999 ЕUR еin Моnаt im рassiven Einкоmmen bildet: https://mupt.de/amz/eurmillion915447', 'Wiе man 16879 ЕUR invеstiert, um раssivеs Einкommen zu gеnеriеrеn: http://s.amgg.net/v2nz \r\nSo gеnеrieren Siе ein рassives Einкоmmеn vоn 14889 EUR pro Моnat: https://cav.ac/s9ZrRB \r\nSо gеnerieren Siе еin passives Einkоmmen von 15889 ЕUR рro Mоnаt: http://n00.uk/W5Cj0 \r\nWie man 14858 EUR investiert, um раssives Еinkоmmen zu gеnеriеren: http://6i9.co/3OuN \r\nWeg, um раssivеs Еinkommеn 19979 ЕUR рro Мonаt zu verdienеn: https://ecuadortenisclub.com/millioneuro179910', '2020-07-15', '2020-07-15'),
(384, '', 'senson72@freenet.de', 'Wie mаn 17999 ЕUR еin Моnаt im рassiven Einкоmmen bildet: https://mupt.de/amz/eurmillion915447', 'Wiе man 16879 ЕUR invеstiert, um раssivеs Einкommen zu gеnеriеrеn: http://s.amgg.net/v2nz \r\nSo gеnеrieren Siе ein рassives Einкоmmеn vоn 14889 EUR pro Моnat: https://cav.ac/s9ZrRB \r\nSо gеnerieren Siе еin passives Einkоmmen von 15889 ЕUR рro Mоnаt: http://n00.uk/W5Cj0 \r\nWie man 14858 EUR investiert, um раssives Еinkоmmen zu gеnеriеren: http://6i9.co/3OuN \r\nWeg, um раssivеs Еinkommеn 19979 ЕUR рro Мonаt zu verdienеn: https://ecuadortenisclub.com/millioneuro179910', '2020-07-15', '2020-07-15'),
(385, '', 'sxycwgirl11@yahoo.com', 'Wie mаn раssivеs Einкоmmеn mit nur 16584 EUR erziеlt: http://noqcv.cschan.website/caa1', 'Gеnerieren Sie ein mоnаtliсhes pаssivеs Еinkommen vоn 16989 ЕUR: http://qfyxu.alejandroibanezgomez.com/01', '2020-07-16', '2020-07-16'),
(386, '', 'KLJohns925@yahoo.com', 'Wie mаn раssivеs Einкоmmеn mit nur 16584 EUR erziеlt: http://noqcv.cschan.website/caa1', 'Gеnerieren Sie ein mоnаtliсhes pаssivеs Еinkommen vоn 16989 ЕUR: http://qfyxu.alejandroibanezgomez.com/01', '2020-07-16', '2020-07-16'),
(387, '', 'yulko_aleksandrovna@yahoo.com', 'Wie mаn раssivеs Einкоmmеn mit nur 16584 EUR erziеlt: http://noqcv.cschan.website/caa1', 'Gеnerieren Sie ein mоnаtliсhes pаssivеs Еinkommen vоn 16989 ЕUR: http://qfyxu.alejandroibanezgomez.com/01', '2020-07-16', '2020-07-16'),
(388, '', 'thuynsmas@yahoo.com', 'Wie mаn раssivеs Einкоmmеn mit nur 16584 EUR erziеlt: http://noqcv.cschan.website/caa1', 'Gеnerieren Sie ein mоnаtliсhes pаssivеs Еinkommen vоn 16989 ЕUR: http://qfyxu.alejandroibanezgomez.com/01', '2020-07-16', '2020-07-16'),
(389, '', 'cuppycakes11@aol.com', 'Wie mаn раssivеs Einкоmmеn mit nur 16584 EUR erziеlt: http://noqcv.cschan.website/caa1', 'Gеnerieren Sie ein mоnаtliсhes pаssivеs Еinkommen vоn 16989 ЕUR: http://qfyxu.alejandroibanezgomez.com/01', '2020-07-16', '2020-07-16'),
(390, '', 'no-replyLam@google.com', 'New: DA50 for jobolytics.com', 'Hеllо! \r\nIf you want to get ahead of your competition, have a higher Domain Authority score. Its just simple as that. \r\nWith our service you get Domain Authority above 50 points in just 30 days. \r\n \r\nThis service is guaranteed \r\n \r\nFor more information, check our service here \r\nhttps://www.monkeydigital.co/Get-Guaranteed-Domain-Authority-50/ \r\n \r\nthank you \r\nMike Salomon\r\n \r\nMonkey Digital \r\nsupport@monkeydigital.co', '2020-07-17', '2020-07-17'),
(391, '', 'kristoffer.anthonsen@yahoo.com', 'Vеrdienen Siе Gеld оnline - 16449 ЕUR + раssivеs Еinкоmmen: http://pine.cf/o7hbhb', 'So vеrdienen Siе 17569 EUR рrо Monat аls рassivеs Еinkоmmеn: https://shorturl.ac/millioneuro496069 \r\nSо gеnеriеren Siе ein passivеs Einкommen vоn 17464 EUR рrо Моnat: http://n00.uk/mLSgZ \r\nWeg, um 16596 ЕUR prо Мonаt im раssiven Еinkоmmen zu vеrdienеn: https://gmy.su/:o9Lob \r\nWeg, um passivеs Еinkommеn 16775 ЕUR рrо Мonаt zu verdiеnеn: https://darknesstr.com/millioneuro263860 \r\nWeg, um passives Еinkommen 16475 EUR рro Monаt zu vеrdienen: https://onlineuniversalwork.com/millioneuro412051', '2020-07-17', '2020-07-17'),
(392, '', 'kerol7792@yahoo.com', 'Vеrdienen Siе Gеld оnline - 16449 ЕUR + раssivеs Еinкоmmen: http://pine.cf/o7hbhb', 'So vеrdienen Siе 17569 EUR рrо Monat аls рassivеs Еinkоmmеn: https://shorturl.ac/millioneuro496069 \r\nSо gеnеriеren Siе ein passivеs Einкommen vоn 17464 EUR рrо Моnat: http://n00.uk/mLSgZ \r\nWeg, um 16596 ЕUR prо Мonаt im раssiven Еinkоmmen zu vеrdienеn: https://gmy.su/:o9Lob \r\nWeg, um passivеs Еinkommеn 16775 ЕUR рrо Мonаt zu verdiеnеn: https://darknesstr.com/millioneuro263860 \r\nWeg, um passives Еinkommen 16475 EUR рro Monаt zu vеrdienen: https://onlineuniversalwork.com/millioneuro412051', '2020-07-17', '2020-07-17'),
(393, '', 'awalker713@aol.com', 'Vеrdienen Siе Gеld оnline - 16449 ЕUR + раssivеs Еinкоmmen: http://pine.cf/o7hbhb', 'So vеrdienen Siе 17569 EUR рrо Monat аls рassivеs Еinkоmmеn: https://shorturl.ac/millioneuro496069 \r\nSо gеnеriеren Siе ein passivеs Einкommen vоn 17464 EUR рrо Моnat: http://n00.uk/mLSgZ \r\nWeg, um 16596 ЕUR prо Мonаt im раssiven Еinkоmmen zu vеrdienеn: https://gmy.su/:o9Lob \r\nWeg, um passivеs Еinkommеn 16775 ЕUR рrо Мonаt zu verdiеnеn: https://darknesstr.com/millioneuro263860 \r\nWeg, um passives Еinkommen 16475 EUR рro Monаt zu vеrdienen: https://onlineuniversalwork.com/millioneuro412051', '2020-07-17', '2020-07-17'),
(394, '', 'aurel_lebreton@yahoo.com', 'Vеrdienen Siе Gеld оnline - 16449 ЕUR + раssivеs Еinкоmmen: http://pine.cf/o7hbhb', 'So vеrdienen Siе 17569 EUR рrо Monat аls рassivеs Еinkоmmеn: https://shorturl.ac/millioneuro496069 \r\nSо gеnеriеren Siе ein passivеs Einкommen vоn 17464 EUR рrо Моnat: http://n00.uk/mLSgZ \r\nWeg, um 16596 ЕUR prо Мonаt im раssiven Еinkоmmen zu vеrdienеn: https://gmy.su/:o9Lob \r\nWeg, um passivеs Еinkommеn 16775 ЕUR рrо Мonаt zu verdiеnеn: https://darknesstr.com/millioneuro263860 \r\nWeg, um passives Еinkommen 16475 EUR рro Monаt zu vеrdienen: https://onlineuniversalwork.com/millioneuro412051', '2020-07-17', '2020-07-17'),
(395, '', 'ashsaf_1975@yahoo.com', 'Vеrdienen Siе Gеld оnline - 16449 ЕUR + раssivеs Еinкоmmen: http://pine.cf/o7hbhb', 'So vеrdienen Siе 17569 EUR рrо Monat аls рassivеs Еinkоmmеn: https://shorturl.ac/millioneuro496069 \r\nSо gеnеriеren Siе ein passivеs Einкommen vоn 17464 EUR рrо Моnat: http://n00.uk/mLSgZ \r\nWeg, um 16596 ЕUR prо Мonаt im раssiven Еinkоmmen zu vеrdienеn: https://gmy.su/:o9Lob \r\nWeg, um passivеs Еinkommеn 16775 ЕUR рrо Мonаt zu verdiеnеn: https://darknesstr.com/millioneuro263860 \r\nWeg, um passives Еinkommen 16475 EUR рro Monаt zu vеrdienen: https://onlineuniversalwork.com/millioneuro412051', '2020-07-17', '2020-07-17'),
(396, '', 'jonathanc1@worldnet.att.net', 'So vеrdienеn Siе 18556 EUR рrо Моnat als раssives Einkommen: http://jgkulus.ipms.website/0e5519fd', 'Wеg, um раssives Еinkommen 15946 EUR рrо Mоnat zu vеrdienеn: http://lkezintd.laptop100.website/76b', '2020-07-17', '2020-07-17'),
(397, '', 'rtnelson24@aol.com', 'So vеrdienеn Siе 18556 EUR рrо Моnat als раssives Einkommen: http://jgkulus.ipms.website/0e5519fd', 'Wеg, um раssives Еinkommen 15946 EUR рrо Mоnat zu vеrdienеn: http://lkezintd.laptop100.website/76b', '2020-07-17', '2020-07-17'),
(398, '', 'kranchod1@gmail.com', 'So vеrdienеn Siе 18556 EUR рrо Моnat als раssives Einkommen: http://jgkulus.ipms.website/0e5519fd', 'Wеg, um раssives Еinkommen 15946 EUR рrо Mоnat zu vеrdienеn: http://lkezintd.laptop100.website/76b', '2020-07-17', '2020-07-17'),
(399, '', 'jadeann35@yahoo.com', 'So vеrdienеn Siе 18556 EUR рrо Моnat als раssives Einkommen: http://jgkulus.ipms.website/0e5519fd', 'Wеg, um раssives Еinkommen 15946 EUR рrо Mоnat zu vеrdienеn: http://lkezintd.laptop100.website/76b', '2020-07-17', '2020-07-17'),
(400, '', 'mprokop@sipwise.com', 'So vеrdienеn Siе 18556 EUR рrо Моnat als раssives Einkommen: http://jgkulus.ipms.website/0e5519fd', 'Wеg, um раssives Еinkommen 15946 EUR рrо Mоnat zu vеrdienеn: http://lkezintd.laptop100.website/76b', '2020-07-17', '2020-07-17'),
(401, '', 'arise1992@yahoo.com', 'Sо vеrdiеnen Sie 17996 EUR pro Моnat von zu Hаuse аus: Раssivеs Einкommеn: https://gmy.su/:qALob', 'Wiе iсh mit pаssivem Einкоmmen 14649 EUR im Mоnat vеrdiеnе: http://vprd.me/r5YJq \r\nDer Lеitfаdеn fur pаssives Einкommen in Нohе von 19999 EUR рrо Mоnаt: https://mupt.de/amz/millioneuro709275 \r\nWiе man 17866 ЕUR investiеrt, um раssives Einкommеn zu gеnеrieren: http://wunkit.com/AUsTAA \r\nSo genеrierеn Siе ein passives Einkommen von 14947 EUR рro Мonаt: https://vrl.ir/millioneuro696006 \r\nWie man 15695 EUR еin Моnat im passiven Еinкоmmen bildеt: http://n00.uk/mhcfB', '2020-07-18', '2020-07-18'),
(402, '', 'hailendeshazer@yahoo.com', 'Sо vеrdiеnen Sie 17996 EUR pro Моnat von zu Hаuse аus: Раssivеs Einкommеn: https://gmy.su/:qALob', 'Wiе iсh mit pаssivem Einкоmmen 14649 EUR im Mоnat vеrdiеnе: http://vprd.me/r5YJq \r\nDer Lеitfаdеn fur pаssives Einкommen in Нohе von 19999 EUR рrо Mоnаt: https://mupt.de/amz/millioneuro709275 \r\nWiе man 17866 ЕUR investiеrt, um раssives Einкommеn zu gеnеrieren: http://wunkit.com/AUsTAA \r\nSo genеrierеn Siе ein passives Einkommen von 14947 EUR рro Мonаt: https://vrl.ir/millioneuro696006 \r\nWie man 15695 EUR еin Моnat im passiven Еinкоmmen bildеt: http://n00.uk/mhcfB', '2020-07-18', '2020-07-18'),
(403, '', 'butterican419@yahoo.com', 'Sо vеrdiеnen Sie 17996 EUR pro Моnat von zu Hаuse аus: Раssivеs Einкommеn: https://gmy.su/:qALob', 'Wiе iсh mit pаssivem Einкоmmen 14649 EUR im Mоnat vеrdiеnе: http://vprd.me/r5YJq \r\nDer Lеitfаdеn fur pаssives Einкommen in Нohе von 19999 EUR рrо Mоnаt: https://mupt.de/amz/millioneuro709275 \r\nWiе man 17866 ЕUR investiеrt, um раssives Einкommеn zu gеnеrieren: http://wunkit.com/AUsTAA \r\nSo genеrierеn Siе ein passives Einkommen von 14947 EUR рro Мonаt: https://vrl.ir/millioneuro696006 \r\nWie man 15695 EUR еin Моnat im passiven Еinкоmmen bildеt: http://n00.uk/mhcfB', '2020-07-18', '2020-07-18'),
(404, '', 'mccaffertykerstin@yahoo.com', 'Sо vеrdiеnen Sie 17996 EUR pro Моnat von zu Hаuse аus: Раssivеs Einкommеn: https://gmy.su/:qALob', 'Wiе iсh mit pаssivem Einкоmmen 14649 EUR im Mоnat vеrdiеnе: http://vprd.me/r5YJq \r\nDer Lеitfаdеn fur pаssives Einкommen in Нohе von 19999 EUR рrо Mоnаt: https://mupt.de/amz/millioneuro709275 \r\nWiе man 17866 ЕUR investiеrt, um раssives Einкommеn zu gеnеrieren: http://wunkit.com/AUsTAA \r\nSo genеrierеn Siе ein passives Einkommen von 14947 EUR рro Мonаt: https://vrl.ir/millioneuro696006 \r\nWie man 15695 EUR еin Моnat im passiven Еinкоmmen bildеt: http://n00.uk/mhcfB', '2020-07-18', '2020-07-18'),
(405, '', 'jeorgematthewvergara@yahoo.com', 'Sо vеrdiеnen Sie 17996 EUR pro Моnat von zu Hаuse аus: Раssivеs Einкommеn: https://gmy.su/:qALob', 'Wiе iсh mit pаssivem Einкоmmen 14649 EUR im Mоnat vеrdiеnе: http://vprd.me/r5YJq \r\nDer Lеitfаdеn fur pаssives Einкommen in Нohе von 19999 EUR рrо Mоnаt: https://mupt.de/amz/millioneuro709275 \r\nWiе man 17866 ЕUR investiеrt, um раssives Einкommеn zu gеnеrieren: http://wunkit.com/AUsTAA \r\nSo genеrierеn Siе ein passives Einkommen von 14947 EUR рro Мonаt: https://vrl.ir/millioneuro696006 \r\nWie man 15695 EUR еin Моnat im passiven Еinкоmmen bildеt: http://n00.uk/mhcfB', '2020-07-18', '2020-07-18'),
(406, '', 'atrixxtrix@gmail.com', 'Fever screening thermal CCTV camera and masks', 'Dear Sir/mdm, \r\n \r\nHow are you? \r\n \r\nWe supply Professional surveillance & medical products: \r\n \r\nMoldex, makrite and 3M N95 1860, 9502, 9501, 8210 \r\n3ply medical, KN95, FFP2, FFP3, PPDS masks \r\nFace shield/medical goggles \r\nNitrile/vinyl/PP gloves \r\nIsolation/surgical gown lvl1-4 \r\nProtective PPE/Overalls lvl1-4 \r\nIR non-contact thermometers/oral thermometers \r\nsanitizer dispenser \r\nCrystal tomato \r\n \r\nLogitech/OEM webcam \r\nMarine underwater CCTV \r\nExplosionproof CCTV \r\n4G Solar CCTV \r\nHuman body thermal cameras \r\nfor Body Temperature Measurement up to accuracy of ±0.1?C \r\n \r\nLet us know which products you are interested and we can send you our full pricelist. \r\n \r\nWhatsapp: +65 87695655 \r\nTelegram: cctv_hub \r\nSkype: cctvhub \r\nEmail: sales@thecctvhub.com \r\nW: http://www.thecctvhub.com/ \r\n \r\nIf you do not wish to receive email from us again, please let us know by replying. \r\n \r\nregards, \r\nCCTV HUB', '2020-07-21', '2020-07-21'),
(407, '', 'lottie.lockhart@hilma.bheckintocash-here.com', 'Рassive Incоmе Idеа 2020: 14897 EUR / Monаt: http://n00.uk/GGBby', 'Wiе man 15599 EUR invеstiert, um pаssives Еinкоmmеn zu gеnеrieren: https://onlineuniversalwork.com/millioneuro967256', '2020-07-21', '2020-07-21'),
(408, '', 'wenthomp23@yahoo.com', 'Рassive Incоmе Idеа 2020: 14897 EUR / Monаt: http://n00.uk/GGBby', 'Wiе man 15599 EUR invеstiert, um pаssives Еinкоmmеn zu gеnеrieren: https://onlineuniversalwork.com/millioneuro967256', '2020-07-21', '2020-07-21'),
(409, '', 'lord-coake@rogers.com', 'Рassive Incоmе Idеа 2020: 14897 EUR / Monаt: http://n00.uk/GGBby', 'Wiе man 15599 EUR invеstiert, um pаssives Еinкоmmеn zu gеnеrieren: https://onlineuniversalwork.com/millioneuro967256', '2020-07-21', '2020-07-21'),
(410, '', 'kimberl909@aol.com', 'Рassive Incоmе Idеа 2020: 14897 EUR / Monаt: http://n00.uk/GGBby', 'Wiе man 15599 EUR invеstiert, um pаssives Еinкоmmеn zu gеnеrieren: https://onlineuniversalwork.com/millioneuro967256', '2020-07-21', '2020-07-21'),
(411, '', 'guptenilima@yahoo.com', 'Рassive Incоmе Idеа 2020: 14897 EUR / Monаt: http://n00.uk/GGBby', 'Wiе man 15599 EUR invеstiert, um pаssives Еinкоmmеn zu gеnеrieren: https://onlineuniversalwork.com/millioneuro967256', '2020-07-21', '2020-07-21'),
(412, '', 'heike.sen@divas-it.de', 'Pаssivеs Еinкommen: Wie iсh 18546 ЕUR рrо Моnаt verdiene: http://n00.uk/kQuRJ', 'Gеnеriеren Siе ein monаtliсhes passivеs Еinkommen vоn 19876 ЕUR: http://xsle.net/millioneuro542806', '2020-07-22', '2020-07-22'),
(413, '', 'jihaney@hotmail.fr', 'Pаssivеs Еinкommen: Wie iсh 18546 ЕUR рrо Моnаt verdiene: http://n00.uk/kQuRJ', 'Gеnеriеren Siе ein monаtliсhes passivеs Еinkommen vоn 19876 ЕUR: http://xsle.net/millioneuro542806', '2020-07-22', '2020-07-22'),
(414, '', 'mdm@spc-office.de', 'Pаssivеs Еinкommen: Wie iсh 18546 ЕUR рrо Моnаt verdiene: http://n00.uk/kQuRJ', 'Gеnеriеren Siе ein monаtliсhes passivеs Еinkommen vоn 19876 ЕUR: http://xsle.net/millioneuro542806', '2020-07-22', '2020-07-22'),
(415, '', 'wines23@hotmail.fr', 'Pаssivеs Еinкommen: Wie iсh 18546 ЕUR рrо Моnаt verdiene: http://n00.uk/kQuRJ', 'Gеnеriеren Siе ein monаtliсhes passivеs Еinkommen vоn 19876 ЕUR: http://xsle.net/millioneuro542806', '2020-07-22', '2020-07-22'),
(416, '', 'alex_1980mo@hotmail.it', 'Pаssivеs Еinкommen: Wie iсh 18546 ЕUR рrо Моnаt verdiene: http://n00.uk/kQuRJ', 'Gеnеriеren Siе ein monаtliсhes passivеs Еinkommen vоn 19876 ЕUR: http://xsle.net/millioneuro542806', '2020-07-22', '2020-07-22'),
(417, '', 'marktomson40@gmail.com', 'Want to have a fast growing and profitable business without competitors?!', 'Want to have a fast growing and profitable business without competitors?! \r\nLooking for a new progressive direction in business?! \r\nWant to owe the high profits despite the market situation?! \r\nWe invite you to be a part of our successful Team. Become a dealer in your region.  We are manufacturers of grain cleaning equipment of a new generation: www.graincleaner.com. \r\nOur unique equipment has no analogues in the world. We have very favorable terms  for cooperation.  Write us on info@graincleaner.com and we will send you the business offer. \r\nTo see our videos go to: \r\nhttps://vimeo.com/showcase/6600548', '2020-07-22', '2020-07-22'),
(418, '', 'abjroxmysox64@yahoo.com', 'Wie ich mit pаssivеm Еinkоmmеn 16858 ЕUR im Моnat vеrdiene: https://s.coop/millioneuro51289', 'Wеg, um 17798 ЕUR рrо Моnаt im раssivеn Einкommen zu vеrdiеnen: http://6i9.co/3Mqa', '2020-07-23', '2020-07-23'),
(419, '', 'dzingaj@gmail.com', 'Wie ich mit pаssivеm Еinkоmmеn 16858 ЕUR im Моnat vеrdiene: https://s.coop/millioneuro51289', 'Wеg, um 17798 ЕUR рrо Моnаt im раssivеn Einкommen zu vеrdiеnen: http://6i9.co/3Mqa', '2020-07-23', '2020-07-23'),
(420, '', 'bapitcher@juno.com', 'Wie ich mit pаssivеm Еinkоmmеn 16858 ЕUR im Моnat vеrdiene: https://s.coop/millioneuro51289', 'Wеg, um 17798 ЕUR рrо Моnаt im раssivеn Einкommen zu vеrdiеnen: http://6i9.co/3Mqa', '2020-07-23', '2020-07-23'),
(421, '', 'Betsytee@mac.com', 'Wie ich mit pаssivеm Еinkоmmеn 16858 ЕUR im Моnat vеrdiene: https://s.coop/millioneuro51289', 'Wеg, um 17798 ЕUR рrо Моnаt im раssivеn Einкommen zu vеrdiеnen: http://6i9.co/3Mqa', '2020-07-23', '2020-07-23'),
(422, '', 'dahotness23@yahoo.com', 'Wie ich mit pаssivеm Еinkоmmеn 16858 ЕUR im Моnat vеrdiene: https://s.coop/millioneuro51289', 'Wеg, um 17798 ЕUR рrо Моnаt im раssivеn Einкommen zu vеrdiеnen: http://6i9.co/3Mqa', '2020-07-23', '2020-07-23'),
(423, '', 'bee.pannell7184@gmail.com', 'How to Write SEO Content that Ranks #1 in Google [Live Webinar]', 'Are you struggling to optimize your website content? \r\nWednesday at 12 PM (Pacific Time) I will teach you how to ensure you have SEO friendly content with high search volume keywords. \r\nLearn tips, tricks, and tools that work in 2020 that the Google algorithm loves. \r\nSignup here to get the webinar link https://www.eventbrite.com/e/113229598778', '2020-07-24', '2020-07-24'),
(424, '', 'eric@talkwithwebvisitor.com', 'Why not TALK with your leads?', 'My name’s Eric and I just found your site jobolytics.com.\r\n\r\nIt’s got a lot going for it, but here’s an idea to make it even MORE effective.\r\n\r\nTalk With Web Visitor – CLICK HERE http://www.talkwithwebvisitor.com for a live demo now.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nAnd once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation… and if they don’t take you up on your offer then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment. Don’t keep losing them. \r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-07-25', '2020-07-25'),
(425, '', 'eric@talkwithwebvisitor.com', 'Why not TALK with your leads?', 'My name’s Eric and I just found your site jobolytics.com.\r\n\r\nIt’s got a lot going for it, but here’s an idea to make it even MORE effective.\r\n\r\nTalk With Web Visitor – CLICK HERE http://www.talkwithwebvisitor.com for a live demo now.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nAnd once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation… and if they don’t take you up on your offer then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment. Don’t keep losing them. \r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-07-25', '2020-07-25'),
(426, '', 'server134@hotmail.com', 'Wеg, um 17895 ЕUR prо Mоnаt im passivеn Einкommеn zu verdiеnеn: https://s.coop/eurmillion172975', 'Рassivеs Еinкommеn: Weg, um 14745 EUR рro Monаt von zu Hausе аus zu vеrdienen: https://vrl.ir/millioneuro756341', '2020-07-25', '2020-07-25'),
(427, '', 'jasonb1172@yahoo.com', 'Wеg, um 17895 ЕUR prо Mоnаt im passivеn Einкommеn zu verdiеnеn: https://s.coop/eurmillion172975', 'Рassivеs Еinкommеn: Weg, um 14745 EUR рro Monаt von zu Hausе аus zu vеrdienen: https://vrl.ir/millioneuro756341', '2020-07-25', '2020-07-25'),
(428, '', 'prsoberano@yahoo.com', 'Wеg, um 17895 ЕUR prо Mоnаt im passivеn Einкommеn zu verdiеnеn: https://s.coop/eurmillion172975', 'Рassivеs Еinкommеn: Weg, um 14745 EUR рro Monаt von zu Hausе аus zu vеrdienen: https://vrl.ir/millioneuro756341', '2020-07-25', '2020-07-25'),
(429, '', 'jujuube@yahoo.com', 'Wеg, um 17895 ЕUR prо Mоnаt im passivеn Einкommеn zu verdiеnеn: https://s.coop/eurmillion172975', 'Рassivеs Еinкommеn: Weg, um 14745 EUR рro Monаt von zu Hausе аus zu vеrdienen: https://vrl.ir/millioneuro756341', '2020-07-25', '2020-07-25'),
(430, '', 'cedarbrown@hotmail.com', 'Wеg, um 17895 ЕUR prо Mоnаt im passivеn Einкommеn zu verdiеnеn: https://s.coop/eurmillion172975', 'Рassivеs Еinкommеn: Weg, um 14745 EUR рro Monаt von zu Hausе аus zu vеrdienen: https://vrl.ir/millioneuro756341', '2020-07-25', '2020-07-25'),
(431, '', 'intothemask@gmail.com', 'Yоur card is crеditеd $27 732: http://xsle.net/moneytransfer296064', 'Yоur асcount hаs rеcеived $27 732: http://xsle.net/moneytransfer81520', '2020-07-25', '2020-07-25'),
(432, '', 'angryelf_32@yahoo.com', 'Yоur card is crеditеd $27 732: http://xsle.net/moneytransfer296064', 'Yоur асcount hаs rеcеived $27 732: http://xsle.net/moneytransfer81520', '2020-07-25', '2020-07-25'),
(433, '', 'antes.mcvinney@mailyu.com', 'Yоur card is crеditеd $27 732: http://xsle.net/moneytransfer296064', 'Yоur асcount hаs rеcеived $27 732: http://xsle.net/moneytransfer81520', '2020-07-25', '2020-07-25'),
(434, '', 'mdambriz@msn.com', 'Yоur card is crеditеd $27 732: http://xsle.net/moneytransfer296064', 'Yоur асcount hаs rеcеived $27 732: http://xsle.net/moneytransfer81520', '2020-07-25', '2020-07-25'),
(435, '', 'brunoserrao@msn.com', 'Yоur card is crеditеd $27 732: http://xsle.net/moneytransfer296064', 'Yоur асcount hаs rеcеived $27 732: http://xsle.net/moneytransfer81520', '2020-07-25', '2020-07-25'),
(436, '', 'grf45hy6u645ythgfhfh@mail.ru', 'Dgdhttjytjyhd hfdgfdhgjgkhgjb hgfhgfhf', 'Nvbdfjgvdsi hifhdifjsdifh iifhdsufhsduhgu fhdsifjsidfh jifdfidhsfhdughu hsifjsihfidghr jfiehfihgrhgu https://jfgdjfhjdgfhehdugfegge.com/fjsdfjdshfjdsgfhsjfhfew', '2020-07-25', '2020-07-25'),
(437, '', 'grf45hy6u645ythgfhfh@mail.ru', 'Dgdhttjytjyhd hfdgfdhgjgkhgjb hgfhgfhf', 'Nvbdfjgvdsi hifhdifjsdifh iifhdsufhsduhgu fhdsifjsidfh jifdfidhsfhdughu hsifjsihfidghr jfiehfihgrhgu https://jfgdjfhjdgfhehdugfegge.com/fjsdfjdshfjdsgfhsjfhfew', '2020-07-25', '2020-07-25'),
(438, '', 'grf45hy6u645ythgfhfh@mail.ru', 'Dgdhttjytjyhd hfdgfdhgjgkhgjb hgfhgfhf', 'Nvbdfjgvdsi hifhdifjsdifh iifhdsufhsduhgu fhdsifjsidfh jifdfidhsfhdughu hsifjsihfidghr jfiehfihgrhgu https://jfgdjfhjdgfhehdugfegge.com/fjsdfjdshfjdsgfhsjfhfew', '2020-07-25', '2020-07-25'),
(439, '', 'grf45hy6u645ythgfhfh@mail.ru', 'Dgdhttjytjyhd hfdgfdhgjgkhgjb hgfhgfhf', 'Nvbdfjgvdsi hifhdifjsdifh iifhdsufhsduhgu fhdsifjsidfh jifdfidhsfhdughu hsifjsihfidghr jfiehfihgrhgu https://jfgdjfhjdgfhehdugfegge.com/fjsdfjdshfjdsgfhsjfhfew', '2020-07-25', '2020-07-25'),
(440, '', 'grf45hy6u645ythgfhfh@mail.ru', 'Dgdhttjytjyhd hfdgfdhgjgkhgjb hgfhgfhf', 'Nvbdfjgvdsi hifhdifjsdifh iifhdsufhsduhgu fhdsifjsidfh jifdfidhsfhdughu hsifjsihfidghr jfiehfihgrhgu https://jfgdjfhjdgfhehdugfegge.com/fjsdfjdshfjdsgfhsjfhfew', '2020-07-25', '2020-07-25'),
(441, '', 'wpdeveloperfiver@gmail.com', 'Hi, I can help you with your website', 'Hi friend! I found your website jobolytics.com in Google. I am highly reputed seller in Fiverr, from Bangladesh. The pandemic has severely affected our online businesses and the reason for this email is simply to inform you that I am willing to work at a very low prices (5$), without work I can?t support my family. I offer my WP knowledge to fix bugs, Wordpress optimizations and any type of problem you could have on your website. Feel free to contact me through my service on Fiverr (Contact button), I thank you from my heart: \r\n \r\nhttps://track.fiverr.com/visit/?bta=127931&brand=fiverrcpa&landingPage=https://www.fiverr.com/uixpider/fix-wordpress-error-or-wordpress-website-problems \r\n \r\nRegards,', '2020-07-25', '2020-07-25'),
(442, '', 'chatfield.cruz@outlook.com', 'chatfield.cruz@outlook.com', 'Quit paying way too much money for overpriced Google ads! I\'ve got a system that needs only a small bit of money and generates an almost endless amount of visitors to your website\r\n\r\nTo get more info take a look at: https://bit.ly/continual-free-traffic', '2020-07-27', '2020-07-27'),
(443, '', 'chatfield.cruz@outlook.com', 'chatfield.cruz@outlook.com', 'Quit paying way too much money for overpriced Google ads! I\'ve got a system that needs only a small bit of money and generates an almost endless amount of visitors to your website\r\n\r\nTo get more info take a look at: https://bit.ly/continual-free-traffic', '2020-07-27', '2020-07-27'),
(444, '', 'eric@talkwithwebvisitor.com', 'instead, congrats', 'Good day, \r\n\r\nMy name is Eric and unlike a lot of emails you might get, I wanted to instead provide you with a word of encouragement – Congratulations\r\n\r\nWhat for?  \r\n\r\nPart of my job is to check out websites and the work you’ve done with jobolytics.com definitely stands out. \r\n\r\nIt’s clear you took building a website seriously and made a real investment of time and resources into making it top quality.\r\n\r\nThere is, however, a catch… more accurately, a question…\r\n\r\nSo when someone like me happens to find your site – maybe at the top of the search results (nice job BTW) or just through a random link, how do you know? \r\n\r\nMore importantly, how do you make a connection with that person?\r\n\r\nStudies show that 7 out of 10 visitors don’t stick around – they’re there one second and then gone with the wind.\r\n\r\nHere’s a way to create INSTANT engagement that you may not have known about… \r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know INSTANTLY that they’re interested – so that you can talk to that lead while they’re literally checking out jobolytics.com.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be a game-changer for your business – and it gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately (and there’s literally a 100X difference between contacting someone within 5 minutes versus 30 minutes.)\r\n\r\nPlus then, even if you don’t close a deal right away, you can connect later on with text messages for new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything I’ve just described is simple, easy, and effective. \r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-07-28', '2020-07-28'),
(445, '', 'eric@talkwithwebvisitor.com', 'instead, congrats', 'Good day, \r\n\r\nMy name is Eric and unlike a lot of emails you might get, I wanted to instead provide you with a word of encouragement – Congratulations\r\n\r\nWhat for?  \r\n\r\nPart of my job is to check out websites and the work you’ve done with jobolytics.com definitely stands out. \r\n\r\nIt’s clear you took building a website seriously and made a real investment of time and resources into making it top quality.\r\n\r\nThere is, however, a catch… more accurately, a question…\r\n\r\nSo when someone like me happens to find your site – maybe at the top of the search results (nice job BTW) or just through a random link, how do you know? \r\n\r\nMore importantly, how do you make a connection with that person?\r\n\r\nStudies show that 7 out of 10 visitors don’t stick around – they’re there one second and then gone with the wind.\r\n\r\nHere’s a way to create INSTANT engagement that you may not have known about… \r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know INSTANTLY that they’re interested – so that you can talk to that lead while they’re literally checking out jobolytics.com.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be a game-changer for your business – and it gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately (and there’s literally a 100X difference between contacting someone within 5 minutes versus 30 minutes.)\r\n\r\nPlus then, even if you don’t close a deal right away, you can connect later on with text messages for new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything I’ve just described is simple, easy, and effective. \r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=jobolytics.com', '2020-07-28', '2020-07-28'),
(446, '', 'aaron.whiticks33@gmail.com', 'Hey, about your website...', 'Hey there, I stumbled on your site yesterday and I like the design (I\'ve been making websites since 2005). What platform is it made with? WordPress? \r\n \r\nThe only thing I noticed was that you appeared a bit low on Google search results and the home page took kind of long to load for me. \r\n \r\nI\'ve recently joined a private group for website owners. They send free periodic tips to get your site ranking higher and improve overall performance. \r\n \r\nBasically, a free consulting service for website owners... \r\n \r\nIt has really helped me improve the two sites I run. Their advice got me to double my visitors and improve loading speed. \r\n \r\nIf you\'d like to join, maybe it can help you with your website as well. \r\n \r\nCheck it out and join here: \r\n \r\nhttps://webgeeksgroup.weebly.com/ \r\n \r\nIf you\'re not interested, no worries, best of luck on your site! \r\n \r\nAaron', '2020-07-28', '2020-07-28'),
(447, '', 'benjafield.jewell@gmail.com', 'The Great Economic Apocalypse of 2020?', 'Dear jobolytics.com owner,\r\n\r\nIn an alarming 10 Dec 2019 article in CNN, Morgan Stanley has proclaimed \r\nthat we may see the “MOTHER OF ALL RECESSIONS” in 2020.  The recession has already started.\r\n\r\nWhat are you doing to prepare for it?\r\n\r\nClick here for a bona-fide solution http://www.zoomsoft.net/PerpetualIncome\r\n\r\nIn the recent minor recession of 2018, people lost jobs, livelihoods and \r\nassets. Imagine what would happen if the major one hits?\r\n\r\nIt will be an economic tsunami! You have an obligation to protect your \r\nfinances at any cost.\r\n\r\nHere’s a way to thrive in any market. http://www.zoomsoft.net/PerpetualIncome\r\n\r\nHere’s to a breakthrough 2020.\r\n\r\nBest,\r\n\r\nP.S. If you’re living from paycheck to paycheck, you’re in the most \r\ndanger if things go wrong and companies start cutting jobs.\r\nClick here for a Plan B that can even make you rich http://www.zoomsoft.net/PerpetualIncome\r\n\r\nUNSUBSCRIBE http://www.zoomsoft.net/unsubscribe', '2020-07-28', '2020-07-28'),
(448, '', 'benjafield.jewell@gmail.com', 'The Great Economic Apocalypse of 2020?', 'Dear jobolytics.com owner,\r\n\r\nIn an alarming 10 Dec 2019 article in CNN, Morgan Stanley has proclaimed \r\nthat we may see the “MOTHER OF ALL RECESSIONS” in 2020.  The recession has already started.\r\n\r\nWhat are you doing to prepare for it?\r\n\r\nClick here for a bona-fide solution http://www.zoomsoft.net/PerpetualIncome\r\n\r\nIn the recent minor recession of 2018, people lost jobs, livelihoods and \r\nassets. Imagine what would happen if the major one hits?\r\n\r\nIt will be an economic tsunami! You have an obligation to protect your \r\nfinances at any cost.\r\n\r\nHere’s a way to thrive in any market. http://www.zoomsoft.net/PerpetualIncome\r\n\r\nHere’s to a breakthrough 2020.\r\n\r\nBest,\r\n\r\nP.S. If you’re living from paycheck to paycheck, you’re in the most \r\ndanger if things go wrong and companies start cutting jobs.\r\nClick here for a Plan B that can even make you rich http://www.zoomsoft.net/PerpetualIncome\r\n\r\nUNSUBSCRIBE http://www.zoomsoft.net/unsubscribe', '2020-07-28', '2020-07-28'),
(449, '', 'yourmyheart@gmail.com', 'You are my heart', 'You are my heart: http://clickfrm.com/z8EK', '2020-07-30', '2020-07-30'),
(450, '', 'eric@talkwithwebvisitor.com', 'Cool website!', 'Cool website!\r\n\r\nMy name’s Eric, and I just found your site - jobolytics.com - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what you’re doing is pretty cool.\r\n \r\nBut if you don’t mind me asking – after someone like me stumbles across jobolytics.com, what usually happens?\r\n\r\nIs your site generating leads for your business? \r\n \r\nI’m guessing some, but I also bet you’d like more… studies show that 7 out 10 who land on a site wind up leaving without a trace.\r\n\r\nNot good.\r\n\r\nHere’s a thought – what if there was an easy way for every visitor to “raise their hand” to get a phone call from you INSTANTLY… the second they hit your site and said, “call me now.”\r\n\r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nThat’s why we built out our new SMS Text With Lead feature… because once you’ve captured the visitor’s phone number, you can automatically start a text message (SMS) conversation.\r\n  \r\nThink about the possibilities – even if you don’t close a deal then and there, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nWouldn’t that be cool?\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\nEric\r\n\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=jobolytics.com', '2020-08-03', '2020-08-03'),
(451, '', 'eric@talkwithwebvisitor.com', 'Cool website!', 'Cool website!\r\n\r\nMy name’s Eric, and I just found your site - jobolytics.com - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what you’re doing is pretty cool.\r\n \r\nBut if you don’t mind me asking – after someone like me stumbles across jobolytics.com, what usually happens?\r\n\r\nIs your site generating leads for your business? \r\n \r\nI’m guessing some, but I also bet you’d like more… studies show that 7 out 10 who land on a site wind up leaving without a trace.\r\n\r\nNot good.\r\n\r\nHere’s a thought – what if there was an easy way for every visitor to “raise their hand” to get a phone call from you INSTANTLY… the second they hit your site and said, “call me now.”\r\n\r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nThat’s why we built out our new SMS Text With Lead feature… because once you’ve captured the visitor’s phone number, you can automatically start a text message (SMS) conversation.\r\n  \r\nThink about the possibilities – even if you don’t close a deal then and there, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nWouldn’t that be cool?\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\nEric\r\n\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=jobolytics.com', '2020-08-03', '2020-08-03'),
(452, '', 'salesrep@fastypharma.com', 'Your drugs are current in stock at Fasty Pharma', 'US ONLINE PHARMACY - GET UP 30% AT THE CHECKOUT PAGE \r\n \r\nI just wanted to inform you that all our meds are currently in stock at Fasty Pharma \r\nhttps://www.fastypharma.com \r\n \r\nEnjoy a modern checkout experience with multiple payment and shipping methods. Our popular \r\ncategories are: \r\n- Pain Relievers \r\n- Muscle Relaxant \r\n- Anti Anxiety \r\n- Sleeping Pills \r\n- Erectile Dysfunction \r\n \r\nTake a second to visit our shelf at https://www.fastypharma.com/ \r\n \r\nYou can write to us directly via the live chat on our site, or email us at support@fastypharma.com, we \r\nare available to answer all your concerns. \r\n \r\nBest Regards, \r\n \r\nCindy | Customer Service Manager \r\n+18443008187 \r\nFastyPharma®', '2020-08-05', '2020-08-05'),
(453, '', 'hamann.quinton@gmail.com', 'cheap monthly SEO plans', 'hi there\r\nI have just checked jobolytics.com for the ranking keywords and seen that your SEO metrics could use a boost.\r\n\r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support.\r\n\r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/\r\n\r\nStart increasing your sales and leads with us, today!\r\n\r\nBe safe and best regards\r\n\r\nMike\r\nHilkom Digital Team\r\nsupport@hilkom-digital.de', '2020-08-05', '2020-08-05'),
(454, '', 'hamann.quinton@gmail.com', 'cheap monthly SEO plans', 'hi there\r\nI have just checked jobolytics.com for the ranking keywords and seen that your SEO metrics could use a boost.\r\n\r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support.\r\n\r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/\r\n\r\nStart increasing your sales and leads with us, today!\r\n\r\nBe safe and best regards\r\n\r\nMike\r\nHilkom Digital Team\r\nsupport@hilkom-digital.de', '2020-08-05', '2020-08-05'),
(455, '', 'atrixxtrix@gmail.com', 'Fever screening thermal CCTV camera and medical masks', 'Dear Sir/mdm, \r\n \r\nHow are you? \r\n \r\nWe supply Professional surveillance & medical products: \r\n \r\nMoldex, makrite and 3M N95 1860, 9502, 9501, 8210 \r\n3ply medical, KN95, FFP2, FFP3, PPDS masks \r\nFace shield/medical goggles \r\nNitrile/vinyl/Latex/PP gloves \r\nIsolation/surgical gown lvl1-4 \r\nProtective PPE/Overalls lvl1-4 \r\nIR non-contact/oral thermometers \r\nsanitizer dispenser \r\n \r\nLogitech/OEM webcam \r\nMarine underwater CCTV \r\nExplosionproof CCTV \r\n4G Solar CCTV \r\nHuman body thermal cameras \r\nIP & analog cameras for homes/industrial/commercial \r\n \r\nLet us know which products you are interested and we can send you our full pricelist. \r\n \r\nWhatsapp: +65 87695655 \r\nTelegram: cctv_hub \r\nSkype: cctvhub \r\nEmail: sales@thecctvhub.com \r\nW: http://www.thecctvhub.com/ \r\n \r\nIf you do not wish to receive email from us again, please let us know by replying. \r\n \r\nregards, \r\nCCTV HUB', '2020-08-07', '2020-08-07'),
(456, '', 'jimmyscowley@gmail.com', 'Ready-made scale models of World of Tanks', 'Dear Sir/mdm, \r\n \r\nOur company Resinscales is looking for distributors and resellers for its unique product: ready-made tank models from the popular massively multiplayer online game - World of Tanks. \r\n \r\nSuch models are designed for fans of the game WoT and collectors of military models. \r\n \r\nWhat makes our tank models stand out? \r\n \r\n- We are focusing on tanks not manfactured by any companies, therefore we have no competitors \r\n- Accurately made in 1/35 scale \r\n- Very high accuracy of details and colors \r\n- The price of the model tank is the same as the production cost \r\n \r\nIf you are interested to be our distributor/reseller then please let us know from the contacts below. \r\n \r\nhttps://www.resinscales.com/ \r\nhttps://www.facebook.com/resinscales.models/ \r\ncontact@resinscales.com \r\n \r\nIgnore this message if it had been wrongly sent to you.', '2020-08-08', '2020-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `xx_countries`
--

CREATE TABLE `xx_countries` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `top_country` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_countries`
--

INSERT INTO `xx_countries` (`id`, `name`, `slug`, `top_country`, `status`) VALUES
(1, 'Pakistan', 'pakistan', 0, 1),
(2, 'United Arab Emirates', 'united-arab-emirates', 0, 1),
(3, 'India', 'india', 0, 1),
(4, 'Germany', 'germany', 0, 1),
(5, 'United States', 'united-states', 0, 1),
(6, 'United Kingdom', 'united-kingdom', 0, 1),
(7, 'Qatar', 'qatar', 0, 1),
(9, 'Indonesia', 'indonesia', 0, 1),
(10, 'France', 'france', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `xx_coupon`
--

CREATE TABLE `xx_coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `discount` int(11) NOT NULL,
  `discount_type` enum('Flat','Percent') NOT NULL,
  `coupon_applied_for` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_coupon`
--

INSERT INTO `xx_coupon` (`coupon_id`, `coupon_code`, `coupon_name`, `description`, `discount`, `discount_type`, `coupon_applied_for`, `start_date`, `end_date`, `created_at`) VALUES
(2, 'RESUME30', '30% Off', '30% off', 30, 'Percent', '', '2020-05-12', '2020-06-30', '2020-05-12 12:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `xx_cv_shortlisted`
--

CREATE TABLE `xx_cv_shortlisted` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xx_cv_shortlisted`
--

INSERT INTO `xx_cv_shortlisted` (`id`, `employer_id`, `user_id`, `status`, `created_date`) VALUES
(1, 25, 41, 0, NULL),
(2, 25, 41, 0, NULL),
(3, 6, 36, 0, NULL),
(4, 6, 36, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `xx_education`
--

CREATE TABLE `xx_education` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xx_education`
--

INSERT INTO `xx_education` (`id`, `type`) VALUES
(1, 'BE/B.Tech'),
(2, 'MCA'),
(3, 'ME/M.Tech'),
(4, 'BCA'),
(5, 'MBA'),
(6, 'Other Course');

-- --------------------------------------------------------

--
-- Table structure for table `xx_employers`
--

CREATE TABLE `xx_employers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_verify` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `emp_img` varchar(255) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_verify` tinyint(4) NOT NULL DEFAULT '0',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `device_type` varchar(255) NOT NULL,
  `device_token` text NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xx_employers`
--

INSERT INTO `xx_employers` (`id`, `firstname`, `lastname`, `email`, `email_verify`, `password`, `emp_img`, `designation`, `mobile_no`, `dob`, `gender`, `address`, `description`, `role`, `is_active`, `is_verify`, `is_admin`, `token`, `password_reset_code`, `last_ip`, `device_type`, `device_token`, `created_date`, `updated_date`) VALUES
(33, 'Akshada', 'Bhoite', 'ab20@gmail.com', 0, '$2y$10$7w1HzWeJlfsHF7HMAGsccOfl9iffR1oOR1ByyBh6rsygYeIGdY.Se', '', '', '', '', '', '', '', 1, 1, 0, 0, '', '', '', '', '', '2020-05-08 05:05:56', '2020-05-08 05:05:56'),
(34, 'Akshada', 'Bhoite', 'akshadab481@gmail.com', 1, '$2y$10$7tJmvgXHgurEs7A6KFRvAO4zkdAppW.alBHXtfFwQxdnDRHres9rK', 'assets/uploads/_thumb/20200508054806.png', 'BDE', '31948038409', '04/17/2019', '', 'dgsgsfgas', 'dsgsfgshhhhhhhh', 1, 1, 0, 0, '', '', '', '', '', '2020-05-08 05:05:55', '2020-05-08 05:05:41'),
(3, 'Tophat', 'Software', 'hr.tophatindore@gmail.com', 1, '$2y$10$fMS2gsKsh7sc9z7hbBivG.tSkGoTADqh9jxbqy2XzuNiAc8ysieLm', '', 'HR Executive', '8770441307', '1992-01-15', '', '401, Westend Corporate New lalasa , Indore 452010', 'Tophat Software Pvt Ltd. is an IT company having their operation and management in India. Tophat was found on 11-October-2015 with an aim to be the top IT Company in Asia. We provide best quality software development with an excellent services and deliver', 1, 1, 0, 0, '', '', '', '', '', '2020-04-28 09:04:32', '2020-04-28 10:04:48'),
(4, 'Kapil', 'Kapil', 'sodanishubham75@gmail.com', 1, '$2y$10$dkFg0B0ZDl4CSdwY2NJ0xe8ZRuC25LL75dGGLweh4GXwWxF0bWoTO', '', '78979898', 'dfghjkdfghjf', '111111111111111111111111111111', '', 'tdfgvhbjnkml', 'fcgvbhjnkmlfgvhbjnkm', 1, 1, 0, 0, '', '', '', '', '', '2020-04-29 02:04:28', '2020-05-02 11:05:41'),
(5, 'Iram', 'Ahmed', 'hrsmt007@gmail.com', 1, '$2y$10$sOEAs4.H1TU7G40s8K0.Y.Om7Gh6oxZlDu9zB4mLBfEdj8JSaFCEe', '', 'HR Executive', '7415300897', '1997-05-04', '', '101 Royal Ratan Building Near Indraprsath tower', 'SMT Group the way of business solution provider according to client & business requirement. Founded in 2016, SMT Group started business consulting & product development service including IT and Non-IT Sector . SMT organization is a group of slash & microv', 1, 1, 0, 0, '', '', '', '', '', '2020-04-29 02:04:13', '2020-04-29 02:04:14'),
(6, 'Bhumika', 'Goswami', 'hr@engineermaster.in', 1, '$2y$10$FhpvWCKD8jzIxj/P9LxHw.udGLsBIRGKzKv3N3HuvPwLHaK8cCoCK', 'assets/uploads/_thumb/20200518205016.png', 'Human Resource', '9993796017', '02/13/2018', '', 'Meghdoot Nagar Indore ', 'Engineer Master development centre at Indore, India. We have team of Business Analysts, Designers, Developers and QAs well versed with different technologies, tools and best practices.', 1, 1, 0, 0, '', '43b9787b8a0cd00a8115c14b2b7c3a27', '', 'wdsfdcfdsf', 'dfsdfdsdfdvfdvf', '2020-04-29 02:04:02', '2020-05-08 03:05:52'),
(8, 'Rupesh', 'Chhabra', 'hr@covetus.com', 1, '$2y$10$GazgiJltz9ZWqR/en54Ya.g5scPxS3h2tL7c7yjQiVtkHnmrudH/O', '', '', '', '', '', '', '', 1, 1, 0, 0, '', '97ffcbd95363387c7e371563057eb02f', '', '', '', '2020-04-29 06:04:54', '2020-04-29 06:04:54'),
(32, 'deepti', 'vaidhya', 'deeptivaidhya02@gmail.com', 1, '$2y$10$c9HdYvkilmKVfCzjEQHlNOwgAq04oRZH9FM30881aSQCK8PaSxwaW', '', '', '', '', '', '', '', 1, 1, 0, 0, '', '677fa4059ee76333f9bb9a7920aef719', '', '', '', '2020-05-08 05:05:17', '2020-05-08 05:05:17'),
(35, 'Madhuri', 'Patel', 'hr@mokshafinance.com', 0, '$2y$10$iJzALPn2bH0U4OJZS6O5QuHfQsser2fwVhOTlOQL2nKYkkVcD9MsG', '', '', '', '', '', '', '', 1, 1, 0, 0, '', '', '', '', '', '2020-05-11 07:05:49', '2020-05-11 07:05:49'),
(27, 'Deepika', 'Kapil', 'deepika.k@brainabove.io', 1, '$2y$10$z.dLt7QuNuBJsmKFInFpse0SWAPy2HwgJTopHWFOVGjjLuHPNd146', '', 'HRManager', '9294777711', '10/09/1989', '', 'Scheme no.54 , Indore', 'Working as an HR Manager', 1, 1, 0, 0, '', '', '', '', '', '2020-05-07 08:05:25', '2020-05-07 09:05:09'),
(28, 'Shubham', 'Sodani', 'sodanishubham@gmail.com', 0, '$2y$10$ALQ5TJJuokK2rH34Bf8tCup1i5FegbuE5eocWVLwvoQ5HR/I8rMbu', '', '', '', '', '', '', '', 1, 1, 0, 0, '', '', '', '', '', '2020-05-07 10:05:40', '2020-05-07 10:05:40'),
(36, 'Swati', 'Jaiswal', 'hr@connekt.in', 1, '$2y$10$cH1JLkXFFTz7nfkw3eAv7.X4Fkee/Hnf7N6AQuBb53hWfpcWLfVcm', '', '', '', '', '', '', '', 1, 1, 0, 0, '', '', '', '', '', '2020-05-21 07:05:59', '2020-05-21 07:05:59'),
(37, 'RITIKA', 'NARWARE', 'hr@bridgelogicsystem.com', 0, '$2y$10$v3BiLZO4mWBM1D7QUckMq.JdPYMNM3Ulo77NuN3M4fjVvA2gC7fyC', '', '', '', '', '', '', '', 1, 1, 0, 0, '', '', '', '', '', '2020-05-28 05:05:32', '2020-05-28 05:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `xx_expected_salary`
--

CREATE TABLE `xx_expected_salary` (
  `id` int(11) NOT NULL,
  `sal_range` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `xx_feedback`
--

CREATE TABLE `xx_feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_feedback`
--

INSERT INTO `xx_feedback` (`id`, `username`, `email`, `phone`, `subject`, `message`, `created_at`) VALUES
(1, 'Akshada ', 'akshada.emaster@gmail.com', 'akshada bhoite', 'Request Information', 'Hello', '2020-05-06 09:32:12'),
(2, 'Akshada', 'ab@gmail.com', '494029-0492-', 'Request Information', 'Hello', '2020-05-06 09:32:48'),
(3, 'Akshada', 'abcd@gmail.com', 'daflkasjlkfSJLKf', 'General Feedback', 'Hello\r\nTest', '2020-05-06 09:33:15'),
(4, 'Akshada', 'ab@gmail.com', '7409385093589', 'Request Information', 'Test', '2020-05-06 09:36:23'),
(5, '47948209482', '4709480q9280@gmail.com', '4830480284', 'General Feedback', '372894709820', '2020-05-06 09:39:56'),
(6, '74305830985039e3543', 'akshada.emaster@gmail.com', '472098209808', 'Problems with the Site', 'Feedback', '2020-05-07 13:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `xx_industries`
--

CREATE TABLE `xx_industries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `top_industry` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_industries`
--

INSERT INTO `xx_industries` (`id`, `name`, `slug`, `status`, `top_industry`) VALUES
(1, 'Accountant', 'accountant', 1, 0),
(2, 'Advertising', 'advertising', 1, 0),
(3, 'Airlines', 'airlines', 1, 0),
(4, 'Architect', 'architect', 1, 0),
(5, 'Audit', 'audit', 1, 0),
(6, 'Aviation', 'aviation', 1, 0),
(7, 'Back Office', 'back-office', 1, 0),
(8, 'Banking', 'banking', 1, 0),
(9, 'Broking', 'broking', 1, 0),
(10, 'CAD CAM', 'cad-cam', 1, 0),
(11, 'Chef', 'chef', 1, 0),
(12, 'Civil Engineering', 'civil-engineering', 1, 0),
(85, 'IT', 'it', 1, 0),
(15, 'Construction', 'construction', 1, 0),
(16, 'Customer service', 'customer-service', 1, 0),
(17, 'Data Entry', 'data-entry', 1, 0),
(18, 'Design Engineer', 'design-engineer', 1, 0),
(19, 'Doctor', 'doctor', 1, 0),
(20, 'Education', 'education', 1, 0),
(21, 'Fashion', 'fashion', 1, 0),
(22, 'Film', 'film', 1, 0),
(23, 'Finance', 'finance', 1, 0),
(24, 'Food and Beverage', 'food-and-beverage', 1, 0),
(25, 'Front Office', 'front-office', 1, 0),
(26, 'Graphic Designer', 'graphic-designer', 1, 0),
(27, 'Hardware', 'hardware', 1, 0),
(28, 'Health Care', 'health-care', 1, 0),
(29, 'Hotel', 'hotel', 1, 0),
(30, 'HR', 'hr', 1, 0),
(31, 'Electrical Engineering', 'electrical-engineering', 1, 0),
(32, 'Industrial', 'industrial', 1, 0),
(33, 'Insurance', 'insurance', 1, 0),
(34, 'Interior Desing', 'interior-desing', 1, 0),
(35, 'IT Hardware', 'it-hardware', 1, 0),
(36, 'IT Networking', 'it-networking', 1, 0),
(37, 'IT Software', 'it-software', 1, 0),
(38, 'Jurnalism', 'jurnalism', 1, 0),
(39, 'Languages', 'languages', 1, 0),
(40, 'Lawyer', 'lawyer', 1, 0),
(41, 'Legal Advisor', 'legal-advisor', 1, 0),
(42, 'Logistics', 'logistics', 1, 0),
(43, 'Maintenance', 'maintenance', 1, 0),
(44, 'Management', 'management', 1, 0),
(45, 'Manufacturing', 'manufacturing', 1, 0),
(46, 'Marketing', 'marketing', 1, 0),
(47, 'Media Planning', 'media-planning', 1, 0),
(48, 'Medical', 'medical', 1, 0),
(49, 'Teaching', 'teaching', 1, 0),
(50, 'MR', 'mr', 1, 0),
(51, 'Nurse', 'nurse', 1, 0),
(52, 'Oil and Gas', 'oil-and-gas', 1, 0),
(53, 'Operation', 'operation', 1, 0),
(54, 'Petroleum', 'petroleum', 1, 0),
(55, 'Pharma', 'pharma', 1, 0),
(56, 'PR', 'pr', 1, 0),
(57, 'Production', 'production', 1, 0),
(58, 'Projects', 'projects', 1, 0),
(59, 'Purchase', 'purchase', 1, 0),
(60, 'Quality', 'quality', 1, 0),
(61, 'Real Estate', 'real-estate', 1, 0),
(62, 'Repair', 'repair', 1, 0),
(63, 'Research and Development', 'research-and-development', 1, 0),
(64, 'Restaurunt', 'restaurunt', 1, 0),
(65, 'Retailing', 'retailing', 1, 0),
(66, 'Sales', 'sales', 1, 0),
(67, 'Secretary', 'secretary', 1, 0),
(68, 'Security', 'security', 1, 0),
(69, 'Shipping', 'shipping', 1, 0),
(70, 'Site Engineering', 'site-engineering', 1, 0),
(71, 'Supply Chain', 'supply-chain', 1, 0),
(72, 'Tax', 'tax', 1, 0),
(73, 'Administration', 'administration', 1, 0),
(74, 'Telecalling', 'telecalling', 1, 0),
(75, 'Telecom', 'telecom', 1, 0),
(76, 'Testing', 'testing', 1, 0),
(77, 'Government', 'government', 1, 0),
(78, 'Textile', 'textile', 1, 0),
(79, 'Ticketing', 'ticketing', 1, 0),
(80, 'Top Management', 'top-management', 1, 0),
(81, 'Traveling', 'traveling', 1, 0),
(82, 'TV', 'tv', 1, 0),
(83, 'Visualizer', 'visualizer', 1, 0),
(84, 'Web Designer', 'web-designer', 1, 0),
(86, 'Mechanical Engineering', 'mechanical-engineering', 1, 0),
(87, 'Photography', 'photography', 1, 0),
(88, 'Ozient12345', 'ozient12345', 1, 0),
(89, 'Wwe', 'wwe', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `xx_job_category`
--

CREATE TABLE `xx_job_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_job_category`
--

INSERT INTO `xx_job_category` (`cat_id`, `cat_name`, `cat_icon`) VALUES
(1, 'Accounting', 'o1.png'),
(2, 'Construction', 'o2.png'),
(3, 'Technology', 'o3.png'),
(4, 'Sales', 'o4.png'),
(5, 'Medical', 'o5.png'),
(6, 'Engineering', 'o6.png');

-- --------------------------------------------------------

--
-- Table structure for table `xx_job_post`
--

CREATE TABLE `xx_job_post` (
  `id` int(4) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_title` varchar(60) NOT NULL,
  `job_slug` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `category` varchar(60) NOT NULL,
  `industry` varchar(40) NOT NULL,
  `job_type` varchar(40) NOT NULL,
  `employment_type` varchar(40) NOT NULL,
  `description` longtext NOT NULL,
  `min_salary` int(10) NOT NULL,
  `max_salary` int(10) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `experience` varchar(40) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `total_positions` int(11) NOT NULL,
  `skills` longtext NOT NULL,
  `location` varchar(255) NOT NULL,
  `is_featured` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_status` enum('active','inactive','pending','blocked') NOT NULL DEFAULT 'active',
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xx_job_post`
--

INSERT INTO `xx_job_post` (`id`, `admin_id`, `employer_id`, `company_id`, `job_title`, `job_slug`, `company_name`, `page_title`, `category`, `industry`, `job_type`, `employment_type`, `description`, `min_salary`, `max_salary`, `currency`, `education`, `experience`, `gender`, `total_positions`, `skills`, `location`, `is_featured`, `is_status`, `created_date`, `updated_date`) VALUES
(1, 0, 1, 6, 'PHP Developer', 'php-developer-job-in-', 'Engineer Master', NULL, '25', '85', 'full-time', 'employee', 'Looking for Full - Stack PHP Developer.', 10000, 15000, 'INR', '1', '1-2', 'Female', 1, 'PHP, Codeigniter, Laravel, Wordpress', 'Indore', 'no', 'active', '2020-04-27 02:04:58', '2020-04-27 02:04:58'),
(3, 0, 5, 5, 'Android Developer', 'android-developer-job-in-', 'SMT GROUP', NULL, '25', '85', 'full-time', 'employee', 'We are looking for an Android developer responsible for the development and maintenance of applications aimed at a vast number of diverse Android devices. Your primary focus will be the development of Android applications and their integration with back-end services. \r\nResponsibilities:\r\nTranslate designs and wire frames into high quality code\r\nDesign, build, and maintain high performance, reusable, and reliable Java code\r\nEnsure the best possible performance, quality, and responsiveness of the application\r\nIdentify and correct bottlenecks and fix bugs\r\nHelp maintain code quality, organization, and automatization\r\nStrong knowledge of Android SDK, different versions of Android, and how to deal with different screen sizes\r\nFamiliarity with RESTful APIs to connect Android applications to back-end services\r\nStrong knowledge of Android UI design principles, patterns, and best practices\r\nExperience with offline storage, threading, and performance tuning\r\nAbility to design applications around natural user interfaces, such as “touch”\r\nFamiliarity with the use of additional sensors, such as gyroscopes and accelerometers\r\nKnowledge of the open-source Android ecosystem and the libraries available for common tasks\r\nAbility to understand business requirements and translate them into technical requirements\r\nFamiliarity with cloud message APIs and push notifications\r\nA knack for benchmarking and optimization\r\nUnderstanding of Google’s Android design principles and interface guidelines\r\nProficient understanding of code versioning tools, such as Git\r\nFamiliarity with continuous integration', 2111, 2377, 'INR', '1', '1-2', 'No Preference', 1, 'XML, Android Studio', 'Indore', 'no', 'active', '2020-04-29 03:04:08', '2020-04-29 03:04:08'),
(4, 0, 5, 5, 'UI/UX Designer', 'uiux-designer-job-in-', 'SMT GROUP', NULL, '25', '85', 'full-time', 'employee', 'We are looking for an experienced and creative UI/UX Designer to join our team!\r\nResponsibilities\r\nplan and implement new designs \r\nOptimize existing user interface designs\r\nTest for intuitivity and experience\r\nCommunicate with clients to understand their business goals and objectives\r\nDevelop technical and business requirements and always strive to deliver intuitive and user-centered solutions\r\nCombine creativity with an awareness of the design elements\r\nCreate prototypes for new product ideas\r\nTest new ideas before implementing \r\nConduct an ongoing user research', 2000, 2377, 'INR', '2', '1-2', 'No Preference', 1, 'Photoshop, Illustrator, Acrobat, User empathy, Dreamweaver,Coding, HTML5 & CSS3', 'Indore', 'no', 'active', '2020-04-29 03:04:12', '2020-04-29 03:04:12'),
(5, 0, 5, 5, 'Business Development Manager', 'business-development-manager-job-in-', 'SMT GROUP', NULL, '25', '85', 'full-time', 'employee', 'Responsibilities:\r\nContacting potential clients to establish rapport and arrange meetings.\r\nPlanning and overseeing new marketing initiatives.\r\nResearching organizations and individuals to find new opportunities.\r\nIncreasing the value of current customers while attracting new ones.\r\nFinding and developing new markets and improving sales.\r\nAttending conferences, meetings, and industry events.\r\nDeveloping quotes and proposals for clients.\r\nDeveloping goals for the development team and business growth and ensuring they are met.\r\nTraining personnel and helping team members develop their skills.\r\nRequirements:\r\nStrong communication skills and IT fluency.\r\nAbility to manage complex projects and multi-task.\r\nExcellent organizational skills.\r\nAbility to flourish with minimal guidance, be proactive, and handle uncertainty.\r\nProficient in Word, Excel, Outlook, and PowerPoint.\r\nComfortable using a computer for various tasks.', 2000, 2377, 'INR', '4', '1-2', 'No Preference', 1, 'Guru, Fiver, Upwork & people per hour', 'Indore', 'no', 'active', '2020-04-29 03:04:26', '2020-04-29 03:04:26'),
(6, 0, 3, 3, 'MEAN Stack Developer', 'mean-stack-developer-job-in-', 'Tophat Software Pvt Ltd', NULL, '25', '37', 'full-time', 'employee', 'Tophat is seeking an experienced MEAN Stack Professional to join our innovative team in Indore. Candidate will be part of the team working on exciting scalable product catering to a huge consumer base. We encourage people who can dive headlong into situations to get things done, set their own direction and feel pride about what they create.', 500, 500, 'INR', '1', '2-5', 'No Preference', 1, 'MongoDB, ExpressJS, AngularJS, NodeJS, Backend, Frontend, Software, APi, AWS, Plugin, PHP, MySQL, JQuery, OOPS,', 'Indore', 'no', 'active', '2020-04-29 03:04:57', '2020-04-29 03:04:07'),
(7, 0, 3, 3, 'Wordpress Developer', 'wordpress-developer-job-in-', 'Tophat Software Pvt Ltd', NULL, '25', '37', 'full-time', 'employee', 'Meeting with clients to discuss website design and function.\r\nDesigning and building the website front-end.\r\nCreating the website architecture.\r\nDesigning and managing the website back-end including database and server integration.\r\nGenerating WordPress themes and plugins.\r\nConducting website performance tests.\r\nTroubleshooting content issues.\r\nConducting WordPress training with the client.\r\nMonitoring the performance of the live website.', 500, 500, 'INR', '1', '2-5', 'No Preference', 1, 'Wordpress. Development, Design, Frontend, Backend, Server Integration, Wordpress themes, Plugin, Website Architecture', 'Indore', 'no', 'active', '2020-04-29 04:04:05', '2020-04-29 04:04:05'),
(9, 0, 6, 6, 'Web Developer PHP', 'web-developer-php-job-in-', 'Engineer Master Solutions Pvt. Ltd', NULL, '25', '37', 'full-time', 'employee', '- Experience WordPress,CI & Laravel conversion\r\n- HTML to Wordpress\r\n- Theme and plugin development and customization\r\n- Woo commerce development and troubleshooting\r\n- Good knowledge of HTML5, CSS3, JavaScript, jQuery,JSON\r\n- PSD to HTML\r\n- PHP developer proficient in Codeigniter framework\r\n- Knowledge of APIs integration (JSON, XML)', 135, 300, 'INR', '1', '1-2', 'No Preference', 3, 'Laravel, Code Igniter, Wordpres', 'Indore', 'no', 'active', '2020-04-29 04:04:25', '2020-04-29 04:04:25'),
(11, 0, 8, 8, 'Business Development Executive', 'business-development-executive-job-in-', 'Covetus Technologies Pvt.Ltd. Indore', NULL, '26', '37', 'full-time', 'employee', 'We are INDIA and US-based Web and Mobile App Development Company. Now we are expanding our team and are adding some more talent. We have requirement of International sales\r\n\r\nTitle : Business Development Executive \r\n\r\nPosition - 3 \r\n\r\nJob Type - Full time\r\n \r\nExperience - 1 - 4 years  (IT sales preferred)\r\n\r\nRequired Skills - Hands on Upwork, freelancer, Linkedin etc. online bidding, lead generation, rapport with client, IT sales , good verbal & written communication\r\n\r\nResponsibilities:-\r\n1. Generating business leads through the online portal.\r\n2. Cold calling potential customers and building relationships.\r\n3. Open to traveling outside India for growing business, client meetings, and \r\n events.\r\n4. Arranging meetings with clients and carrying out product demonstrations.\r\n5. Work with weekly and monthly sales targets.\r\n6. Work closely with other teams to develop new business.\r\n7. Create leads from various internet sources/forums/blogs/groups\r\n8. Be able to mine potential client data from various overseas business directories for cold calling.\r\n9. Flexible, reliable and passionate about sales and interaction with potential clients through video conferencing.\r\n10. Possessing excellent communication and presentation skills (both written and oral), a knack for concept selling and proposal making.\r\n\r\nFor more details contact us here at hr.covetus@gmail.com/ hr@covetus.com\r\nwww.covetus.com', 10000, 30000, 'INR', '1', '0-1', 'No Preference', 3, 'Skills : Hands on Upwork, freelancer etc, online bidding, lead generation, rapport with client, IT sales , good verbal & written communication', 'Indore', 'no', 'active', '2020-04-29 07:04:44', '2020-04-29 07:04:44'),
(23, 0, 27, 27, 'FrontendDeveloper', 'frontenddeveloper-job-in-', 'Brain Above InfoSol Pvt. Ltd.', NULL, '10', '37', 'full-time', 'employee', 'Key Responsibilities: \r\n\r\n\r\n- Participate in the full software development life cycle\r\n- Own the delivery of an entire piece of a system or application, and lead on small to mid size complex projects\r\n- Ability to handle multiple competing priorities in a fast-paced environment\r\n- Great understanding of software development in a team, and a track record of shipping software on time\r\n- Writing reusable, testable, and efficient code \r\n- Comfortable working in product development environment, building version 1.0 from scratch\r\n- Excited about developing innovative software applications on latest technology platforms\r\n- Able to work closely with UI developers to collect requirements and build solutions\r\n- Able to solve problems creatively and effectively\r\n- Experience with web business applications (and not website)\r\n- Capable of making right decisions while dealing with uncertainties & inadequate information\r\n- Self-starter, strong sense of ownership, gets things done\r\n- Passion for technology, commitment to build products that dazzle and have fun doing it\r\n- Ability to learn quickly and intellectually curious\r\n- Effective communication with stakeholders (product owner and anyone else involved)\r\n\r\nRequirements:\r\n\r\n\r\n- Expertise of JavaScript/TypeScript, ES6/ES2016/ES2017 and Angular 2/4/5/6/7 or React+Redux\r\n- Experience with HTML5/CSS3\r\n- Experience using Promises\r\n- Experience with JSON based RESTful API integrations\r\n- Experience with using utilities like Lodash, Async etc.,\r\n- Good Knowledge of object-oriented programming\r\n- Working knowledge of Node.js\r\n- Good communication skills (oral and written)\r\n- User authentication and authorisation between multiple systems, servers, and environments\r\n- Experience with build scripts and tools like Bower, Grunt, and Gulp \r\n- Experience building data-driven web applications \r\n- Understanding of HTTP protocol including WebSockets\r\n- Proficient understanding of Git and related services like GitHub, Gitlab, etc.\r\n- Energetic and motivated self-starter\r\n- Ability to learn quickly and intellectually curious\r\n- Desire to work in a fast-paced, dynamic environment\r\n- Strong focus and drive to solve problems.', 300000, 800000, 'INR', '1', '2-5', 'No Preference', 2, 'Angular 2/4/5/6/7/8', 'Indore', 'no', 'active', '2020-05-07 09:05:13', '2020-05-07 09:05:13'),
(26, 0, 6, 6, 'Web Designer', 'web-designer-job-in-', 'Engineer Master Solutions Pvt. Ltd', NULL, '25', '37', 'full-time', 'employee', 'We are looking for a Web Designer who will be responsible for creating great websites for our clients. Primary duties include conceptualizing and implementing creative ideas for client websites, as well as creating visual elements that are in line with our clients\' branding. You will be working closely with our web development team to ensure a proper and hassle-free implementation.\r\n\r\nTo be successful in this role, you will need to have excellent visual design skills and be proficient in graphic design software such as Adobe Photoshop and Adobe Illustrator.\r\n\r\nWeb Designer Requirements :\r\n\r\n*Proficiency in graphic design software including Adobe Photoshop, Adobe Illustrator, and other visual design tools.\r\n*Proficiency in front-end development web programming languages such as                        HTML and CSS, JQuery, and JavaScript.\r\n* Good understanding of content management systems.\r\n* Good understanding of search engine optimization principles.\r\n* Proficient understanding of cross-browser compatibility issues.\r\n  Excellent visual design skills.\r\n* Creative and open to new ideas.\r\n* Adaptable and willing to learn new techniques.\r\n* Excellent communication skills.', 10000, 20000, 'INR', '1', '1-2', 'Male', 2, 'Visual Design. A web designer will often thrive if his visual designing skills are advanced. UX, Print Design Skills,  Resourcefulness,  CSS, HTML, Communication Skills, Time-Management Skills.', 'Indore, Madhya Pradesh, India', 'no', 'active', '2020-05-14 09:05:45', '2020-05-14 09:05:45'),
(27, 0, 6, 6, 'Web Developer PHP', 'web-developer-php-job-in-', 'Engineer Master Solutions Pvt. Ltd', NULL, '25', '37', 'full-time', 'employee', '- Experience WordPress,CI & Laravel conversion\r\n- HTML to Wordpress\r\n- Theme and plugin development and customization\r\n- Woo commerce development and troubleshooting\r\n- Good knowledge of HTML5, CSS3, JavaScript, jQuery,JSON\r\n- PSD to HTML\r\n- PHP developer proficient in Codeigniter framework\r\n- Knowledge of APIs integration (JSON, XML)', 10000, 20000, 'INR', '1', '1-2', 'Male', 2, 'Laravel, Code Igniter, Wordpres.....', 'Indore, Madhya Pradesh, India', 'no', 'active', '2020-05-18 02:05:48', '2020-05-18 02:05:48'),
(28, 0, 6, 6, 'Graphic Designer', 'graphic-designer-job-in-', 'Engineer Master Solutions Pvt. Ltd', NULL, '13', '37', 'full-time', 'employee', '-Meet with clients or the art director to determine the scope of a project.\r\n-Use digital illustration, photo editing software, and layout software to create                designs.\r\n-Design layouts, including selection of colors, images, and typefaces.\r\n-Present design concepts to clients or art directors.\r\n-Incorporate changes recommended by clients or art directors into final designs.\r\n-Review designs for errors before printing or publishing them.', 9000, 15000, 'INR', '1', '1-2', 'Male', 2, 'Creativity,Communication,Interactive media,Coding,Branding.', 'Indorė, Madhya Pradesh, India', 'no', 'active', '2020-05-18 02:05:48', '2020-05-18 02:05:48'),
(29, 0, 36, 36, 'Xamarin Developer', 'xamarin-developer-job-in-', 'Connekt Technologies', NULL, '25', '37', 'full-time', 'employee', 'The Software Developer\'s role is to design, code, test, and analyze software programs and applications. This includes researching, designing, documenting, and modifying software specifications throughout the production life-cycle. \r\n1-4 years of experience needed\r\n\r\nPOSITION RESPONSIBILITIES:\r\n*Develop applications based on an internally defined architecture and software development best practices\r\n* Maintain source code, source documentation, and version control\r\n* Code and debug internally developed applications\r\n* Develop plug-in modules to third party software\r\n\r\nKeyskills\r\nXamarin, C#, XAML, XML, Android, Android, Data Structure, Dot Net, MVC, OOPS, MVC, etc', 15000, 25000, 'INR', '1', '2-5', 'No Preference', 1, 'Xamarin, C#, XAML, XML, Android, Android, Data Structure, Dot Net, MVC, OOPS, MVC, etc', 'Indore, Madhya Pradesh, India', 'no', 'active', '2020-05-21 07:05:35', '2020-05-21 07:05:35'),
(30, 0, 6, 6, 'Node js Developer', 'node-js-developer-job-in-', 'Engineer Master Solutions Pvt. Ltd', NULL, '25', '37', 'full-time', 'employee', 'Job Summary :\r\nWe are hiring Node JS Developer.\r\n\r\nResponsibilities and Duties :\r\n1) Strong proficiency with JavaScript.\r\n2) Knowledge of Node.js and frameworks.\r\n3) Good understanding of server-side CSS preprocessors .\r\n4) Basic understanding of front-end technologies, such as HTML5, and CSS3\r\n5) Proficient understanding of code versioning tools, such as Git.\r\nRequired Experience, Skills and Qualifications\r\nLocation: Indore\r\nExperience: 6 Month to 1.5 Year\r\nJob Type: Full-time\r\nSalary: ₹9,000.00 to ₹15,000.00 /month\r\n\r\nJob Type: Full-time', 9000, 15000, 'INR', '1', '1-2', 'No Preference', 3, 'Node.js, MongoDB, MySq, MsSql.', 'Indore, Madhya Pradesh, India', 'no', 'active', '2020-05-26 05:05:52', '2020-05-26 05:05:19'),
(31, 0, 6, 6, 'Web Developer', 'web-developer-job-in-', 'Engineer Master Solutions Pvt. Ltd', NULL, '25', '37', 'full-time', 'employee', 'We are looking for best IT Professionals from the industry for #phpdeveloper #meanstack #Laravel #nodejsdeveloper\r\n\r\n*PHP Developer : 6 month to 2 years\r\n*MEAN Stack : 6 month to 2 years\r\n*Laravel Developer : 6 month to 2 years\r\n*Nodejs Developer : 1+ years\r\n\r\n*Benefits :\r\n#5 days_working\r\n#Work_From_Home\r\n#Flexible_Timing\r\n\r\nInterested candidates may share their updated resume on hr@engineermaster.in\r\n\r\nIf this job is not relevant to you than do #like, #comment, and #share it with your friends and colleagues. It might help them to get the right job.', 9000, 20000, 'INR', '1', '1-2', 'No Preference', 4, 'HTML5, CSS3, Javascript, Jquery, PHP, NodeJs.', 'Indore, Madhya Pradesh, India', 'no', 'active', '2020-05-28 10:05:58', '2020-05-28 10:05:58'),
(32, 0, 6, 6, 'Android Developer', 'android-developer-job-in-', 'Engineer Master Solutions Pvt. Ltd', NULL, '25', '37', 'full-time', 'employee', 'We are looking for an Android developer responsible for the development and maintenance of applications aimed at a vast number of diverse Android devices. Your primary focus will be the development of Android applications and their integration with back-end services. You will be working along-side other engineers and developers working on different layers of the infrastructure. Therefore, commitment to collaborative problem solving, sophisticated design, and creating quality products is essential.', 6000, 12000, 'INR', '1', '0-1', 'Male', 4, 'Java, oop\'s concepts,  android studio, XML,', 'Indore, Madhya Pradesh, India', 'no', 'active', '2020-07-02 05:07:45', '2020-07-02 05:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `xx_prohibited_keywords`
--

CREATE TABLE `xx_prohibited_keywords` (
  `ID` int(11) NOT NULL,
  `keyword` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_prohibited_keywords`
--

INSERT INTO `xx_prohibited_keywords` (`ID`, `keyword`) VALUES
(8, 'idiot'),
(9, 'fuck'),
(10, 'bitch');

-- --------------------------------------------------------

--
-- Table structure for table `xx_resume`
--

CREATE TABLE `xx_resume` (
  `r_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile_number` text NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `resume_title` varchar(255) NOT NULL,
  `resume_price` varchar(255) NOT NULL,
  `permanent_address` longtext NOT NULL,
  `current_address` longtext NOT NULL,
  `degree` text NOT NULL,
  `certificate` text NOT NULL,
  `company` text NOT NULL,
  `skills` text NOT NULL,
  `achivments` text NOT NULL,
  `zip_file` varchar(255) NOT NULL,
  `profile_photo` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=>pending 1=> success 2=> cancel',
  `coupon_id` int(11) NOT NULL,
  `payment_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_resume`
--

INSERT INTO `xx_resume` (`r_id`, `user_id`, `first_name`, `last_name`, `mobile_number`, `email_id`, `resume_title`, `resume_price`, `permanent_address`, `current_address`, `degree`, `certificate`, `company`, `skills`, `achivments`, `zip_file`, `profile_photo`, `status`, `coupon_id`, `payment_status`, `created_date`, `updated_date`) VALUES
(60, 28, 'Kapil', 'Karda', '+919981101934', 'kkarda77@gmail.com', '', '', '106/3 Meghdoot Nagar Opposite Hotel Fortune Landmark', '106/3 Meghdoot Nagar Opposite Hotel Fortune Landmark', '[[{\"name\":\"BE\",\"specialization\":\"CS\",\"year_of_admission\":\"2020-06-17\",\"year_of_passing\":\"2020-06-17\"}]]', '[[{\"name\":\"Dummy\",\"year_of_certificate\":\"2020-06-23\"}]]', '[{\"companyname\":\"TEST\",\"companyemail\":\"kkarda77@gmail.com\",\"startdate\":\"2020-06-01\",\"enddate\":\"2020-06-08\",\"designation\":\"TEST\",\"cts_lakhs\":\"12\",\"cts_thousands\":\"12\",\"pro_detail\":[{\"project\":\"TEst\",\"project_description\":\"test\",\"project_url\":\"http:\\/\\/www.engineermaster.in\"}]}]', '\"JavaScript\"', 'TEst', '', 'ankur.jpg', 2, 0, '0', '0000-00-00 00:00:00', '2020-06-03 05:36:54'),
(73, 28, 'Kapil', 'Karda', '+919981101934', 'kkarda77@gmail.com', '', '', '106/3 Meghdoot Nagar Opposite Hotel Fortune Landmark', '106/3 Meghdoot Nagar Opposite Hotel Fortune Landmark', '[[{\"name\":\"BE\",\"specialization\":\"CSE\",\"year_of_admission\":\"2018-01-24\",\"year_of_passing\":\"2020-06-23\"}]]', '[[{\"name\":\"TESTING\",\"year_of_certificate\":\"2020-06-16\"}]]', '[{\"companyname\":\"Engineer Master Solutions Pvt Ltd\",\"companyemail\":\"kapil.karda@engineermaster.in\",\"startdate\":\"2019-01-08\",\"enddate\":\"2020-06-17\",\"designation\":\"TESTING\",\"cts_lakhs\":\"10\",\"cts_thousands\":\"12\",\"pro_detail\":[{\"project\":\"Testing\",\"project_description\":\"TEstin\",\"project_url\":\"https:\\/\\/www.engineermaster.in\"}]}]', '\"JavaScript,PHP\"', 'Testing', '81TTYqGWKTL__UL1500_10.zip', '39369.jpg', 2, 0, '0', '2020-06-08 13:12:50', '2020-06-08 00:36:50'),
(74, 94, 'Sumit', 'Kumar', '8770513012', 'sumit@gmail.com', 'Php developer', '', 'indore', 'indore', '[[{\"name\":\"B.COM\",\"specialization\":\"MCA\",\"year_of_admission\":\"2020-06-08\",\"year_of_passing\":\"2020-06-30\"}]]', '[[{\"name\":\"Php developer\",\"year_of_certificate\":\"2020-06-30\"}]]', '[{\"companyname\":\"emaster\",\"companyemail\":\"sumit@gmail.com\",\"startdate\":\"2020-06-08\",\"enddate\":\"2020-06-30\",\"designation\":\"php developer\",\"cts_lakhs\":\"3\",\"cts_thousands\":\"5\",\"pro_detail\":[{\"project\":\"jb\",\"project_description\":\"drgergterter\",\"project_url\":\"www.example.com\"}]}]', '\"PHP\"', 'sdfdfhdh', '81TTYqGWKTL__UL1500_9.zip', '48353f81e43aeaf72298d69ad5aa8644 (1)-min.jpg', 2, 0, '0', '2020-06-08 12:00:04', '2020-06-07 23:36:04'),
(87, 28, 'Kapil', 'Karda', '+919981101934', 'kkarda77@gmail.com', 'CTO', '', '106/3 Meghdoot Nagar Opposite Hotel Fortune Landmark', '106/3 Meghdoot Nagar Opposite Hotel Fortune Landmark', '[[{\"name\":\"BE\",\"specialization\":\"CS\",\"year_of_admission\":\"1993-03-23\",\"year_of_passing\":\"2001-10-30\"}]]', '[[{\"name\":\"Testing\",\"year_of_certificate\":\"2009-05-15\"}]]', '[{\"companyname\":\"TEsting\",\"companyemail\":\"kapil.karda@engineermaster.in\",\"startdate\":\"2015-06-16\",\"enddate\":\"2020-06-08\",\"designation\":\"CTO\",\"cts_lakhs\":\"12\",\"cts_thousands\":\"000000\",\"pro_detail\":[{\"project\":\"Testing\",\"project_description\":\"Testing\",\"project_url\":\"Testing\"}]}]', '\"JavaScript,flutter,react native\"', 'Testing', '01_splash.zip', '3731109 (1).jpg', 2, 0, '0', '2020-06-08 11:49:22', '2020-06-07 23:36:22'),
(88, 94, 'Kumar', 'Rahul', '8770513012', 'kumar@gmail.com', 'Php developer', '', 'indore', 'indore', '[[{\"name\":\"BE\",\"specialization\":\"CS\",\"year_of_admission\":\"2020-06-08\",\"year_of_passing\":\"2020-06-30\"}]]', '[[{\"name\":\"php developer\",\"year_of_certificate\":\"2020-06-08\"}]]', '[{\"companyname\":\"emaster\",\"companyemail\":\"kumar@gmail.com\",\"startdate\":\"2020-06-08\",\"enddate\":\"2020-06-30\",\"designation\":\"web developer\",\"cts_lakhs\":\"3\",\"cts_thousands\":\"00000\",\"pro_detail\":[{\"project\":\"Testing\",\"project_description\":\"testing\",\"project_url\":\"www.testing.com\"}]}]', '\"PHP,flutter,html\"', 'gfhtrj', '', '48353f81e43aeaf72298d69ad5aa8644 (1)-min.jpg', 1, 0, '0', '2020-06-08 13:17:29', '2020-06-08 13:17:29'),
(89, 156, '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', 0, 0, '0', '2020-06-20 19:36:38', '2020-06-21 07:48:38'),
(90, 156, 'Shubham', 'Sodani', '9425106802', 'anmol.up11@gmail.com', '', '', 'Palasia', 'Test', '[[{\"name\":\"BE\",\"specialization\":\"CS\",\"year_of_admission\":\"2020-12-31\",\"year_of_passing\":\"2018-12-31\"}]]', '[[{\"name\":\"C++\",\"year_of_certificate\":\"2063-12-30\"}]]', '[{\"companyname\":\"Bye\",\"companyemail\":\"sd@gmail.com\",\"startdate\":\"2026-12-31\",\"enddate\":\"0011-01-01\",\"designation\":\"Manager\",\"cts_lakhs\":\"gbbjhb\",\"cts_thousands\":\"jhnbjhbn\",\"pro_detail\":[{\"project\":\"nkhnj\",\"project_description\":\"knkjn\",\"project_url\":\"knkjn\"}]}]', '\"PHP\"', 'kdmckd', '', '02-home.png', 1, 0, '0', '2020-06-21 08:07:49', '2020-06-21 08:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `xx_resume_price`
--

CREATE TABLE `xx_resume_price` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `duration` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_resume_price`
--

INSERT INTO `xx_resume_price` (`id`, `title`, `price`, `duration`) VALUES
(1, 'Master', 65, '3'),
(2, 'Platinum', 40, '8'),
(3, 'Normal', 25, '12');

-- --------------------------------------------------------

--
-- Table structure for table `xx_seeker_applied_job`
--

CREATE TABLE `xx_seeker_applied_job` (
  `id` int(11) NOT NULL,
  `seeker_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `cover_letter` longtext NOT NULL,
  `is_shortlisted` tinyint(4) NOT NULL DEFAULT '0',
  `is_interviewed` tinyint(4) NOT NULL DEFAULT '0',
  `applied_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xx_seeker_applied_job`
--

INSERT INTO `xx_seeker_applied_job` (`id`, `seeker_id`, `employer_id`, `job_id`, `cover_letter`, `is_shortlisted`, `is_interviewed`, `applied_date`) VALUES
(1, 27, 1, 1, 'Applied for PHP Job', 0, 0, '2020-04-27 02:04:03'),
(2, 36, 6, 9, 'Hello\r\nTest', 1, 0, '2020-05-02 11:05:16'),
(3, 41, 6, 9, 'Applying for this job.', 1, 0, '2020-05-05 03:05:52'),
(4, 41, 4, 17, 'Looking for job in accountant profile', 0, 0, '2020-05-05 03:05:31'),
(5, 41, 5, 5, 'Hello\r\n\r\nTest', 0, 0, '2020-05-05 03:05:11'),
(6, 42, 25, 19, 'Hello\r\nTest', 1, 0, '2020-05-06 05:05:12'),
(7, 42, 1, 1, 'Hello\r\n\r\nTest', 0, 0, '2020-05-06 05:05:22'),
(8, 42, 25, 22, 'Hello\r\n\r\nHere I applying for this position.', 1, 0, '2020-05-06 09:05:52'),
(9, 43, 6, 9, 'Hello\r\n\r\nTest', 0, 0, '2020-05-07 10:05:36'),
(10, 54, 6, 9, 'Applied for Job', 0, 0, '2020-05-08 03:05:17'),
(11, 194, 6, 28, 'I,m looking for the job change indore location.\r\nhaving 8+ years of experience in Graphic Design\r\n(Coraldraw, photoshop, illustrator, video editing and many more.)\r\nif u have a suitble vacancy please reply me\r\n\r\nThank you\r\nRegards\r\nAjay sharma\r\nmob. 8109482054\r\nemail. ajjusharma707@gmail.com', 0, 0, '2020-05-26 02:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `xx_seeker_education`
--

CREATE TABLE `xx_seeker_education` (
  `id` tinyint(4) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `degree` varchar(40) NOT NULL,
  `degree_title` varchar(40) NOT NULL,
  `major_subjects` varchar(40) NOT NULL,
  `country` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `completion_year` varchar(30) NOT NULL,
  `result_type` varchar(30) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `xx_seeker_experience`
--

CREATE TABLE `xx_seeker_experience` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `country` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `starting_month` varchar(30) NOT NULL,
  `starting_year` varchar(30) NOT NULL,
  `ending_month` varchar(30) DEFAULT NULL,
  `ending_year` varchar(30) DEFAULT NULL,
  `currently_working_here` tinyint(4) DEFAULT NULL,
  `description` longtext NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `xx_seeker_languages`
--

CREATE TABLE `xx_seeker_languages` (
  `id` tinyint(4) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `language` varchar(40) NOT NULL,
  `proficiency` varchar(40) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `xx_seeker_skill`
--

CREATE TABLE `xx_seeker_skill` (
  `id` tinyint(4) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `new_skill` varchar(40) NOT NULL,
  `experience` varchar(40) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `xx_seeker_summary`
--

CREATE TABLE `xx_seeker_summary` (
  `id` tinyint(4) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `summary` longtext NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `xx_subscribe`
--

CREATE TABLE `xx_subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_subscribe`
--

INSERT INTO `xx_subscribe` (`id`, `email`, `created_date`, `created_at`) VALUES
(1, 'sensanjay42@gmail.com', '2020-04-27 : 06:04:39', '2020-04-27 10:39:39'),
(2, '', '2020-04-27 : 07:04:16', '2020-04-27 11:20:16'),
(3, 'deeptivaidya25@gmail.com', '2020-04-27 : 08:04:18', '2020-04-27 12:22:18'),
(4, 'deeptivaidya125@gmail.com', '2020-04-27 : 08:04:25', '2020-04-27 12:28:25'),
(5, 'deeptivaidya1125@gmail.com', '2020-04-27 : 08:04:27', '2020-04-27 12:28:27'),
(6, 'deepsanjay@gmail.com', '2020-04-27 : 08:04:56', '2020-04-27 12:32:56'),
(7, 'akshada.emaster@gmail.com', '2020-04-27 : 10:04:30', '2020-04-27 14:16:30'),
(8, 'sensanjay@gmail.com', '2020-05-02 : 05:05:14', '2020-05-02 09:13:14'),
(9, 'abcd20@gmail.com', '2020-05-05 : 03:05:04', '2020-05-05 07:07:04'),
(10, 'deeptivaidya@gmail.com', '2020-05-05 : 03:05:34', '2020-05-05 07:09:34'),
(11, 'abcd@gmail.com', '2020-05-05 : 04:05:50', '2020-05-05 08:00:50'),
(12, 'girisumit78@gmail.com', '2020-05-11 : 04:05:32', '2020-05-11 08:31:32'),
(13, 'sahu.megha30@gmail.com', '2020-05-13 : 03:05:20', '2020-05-13 07:43:20'),
(14, 'pawarpranjali1991@gmail.com', '2020-05-15 : 05:05:58', '2020-05-15 09:42:58'),
(15, 'pawar@123#', '2020-05-15 : 11:05:06', '2020-05-15 15:05:06'),
(16, 'Chandrashekharprajapati76887@email.co', '2020-05-17 : 12:05:14', '2020-05-17 04:22:14'),
(17, 'umaahirwar821@gmail.com', '2020-05-17 : 12:05:16', '2020-05-17 04:30:16'),
(18, 'dawarhira0143@gmail.com', '2020-05-17 : 12:05:10', '2020-05-17 04:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `xx_transaction`
--

CREATE TABLE `xx_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL DEFAULT '0',
  `txn_id` varchar(100) NOT NULL,
  `payment_amt` float NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `currency_code` text NOT NULL,
  `payment_status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_transaction`
--

INSERT INTO `xx_transaction` (`id`, `user_id`, `product_id`, `req_id`, `txn_id`, `payment_amt`, `user_email`, `currency_code`, `payment_status`) VALUES
(19, 28, 56, 0, '7T551403F1102873T', 75.32, '', 'INR', 'Completed'),
(18, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(17, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(16, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(14, 28, 34, 0, '3', 76, '', 'INR', 'Completed'),
(15, 28, 38, 0, '2', 76, '', 'INR', 'Completed'),
(20, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(21, 28, 55, 0, '2VD95539Y0871560Auser_id=94', 75.56, '', 'INR', 'Completed'),
(22, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(23, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(24, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(25, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(26, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(27, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(28, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(29, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(30, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(31, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(32, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(33, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(34, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(35, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(36, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(37, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(38, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(39, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(40, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(41, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(42, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(43, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(44, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(45, 28, 59, 0, '43758350N70852523', 75.56, '', 'INR', 'Completed'),
(46, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(47, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed'),
(48, 28, 55, 0, '2VD95539Y0871560A', 75.56, '', 'INR', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `xx_urgency`
--

CREATE TABLE `xx_urgency` (
  `id` int(11) NOT NULL,
  `time` text NOT NULL,
  `price` int(11) NOT NULL,
  `price_after_discount` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xx_users`
--

CREATE TABLE `xx_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_verify` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `userimg` varchar(255) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `nationality` varchar(40) NOT NULL,
  `category` varchar(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `postcode` varchar(30) NOT NULL,
  `location` varchar(255) NOT NULL,
  `experience` varchar(40) NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `skills` longtext NOT NULL,
  `current_salary` varchar(40) NOT NULL,
  `expected_salary` varchar(40) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `profile_completed` tinyint(4) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_verify` tinyint(4) NOT NULL DEFAULT '0',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `device_type` varchar(255) NOT NULL,
  `device_token` text NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xx_users`
--

INSERT INTO `xx_users` (`id`, `firstname`, `lastname`, `email`, `email_verify`, `password`, `userimg`, `dob`, `age`, `mobile_no`, `nationality`, `category`, `job_title`, `description`, `gender`, `marital_status`, `postcode`, `location`, `experience`, `education_level`, `skills`, `current_salary`, `expected_salary`, `currency`, `resume`, `role`, `profile_completed`, `is_active`, `is_verify`, `is_admin`, `token`, `password_reset_code`, `last_ip`, `device_type`, `device_token`, `created_date`, `updated_date`) VALUES
(72, 'Priyanka', 'Vishwakarma', 'priya.bhavya94@gmail.com', 0, '$2y$10$jicQ3KSuWES4E2tIxwDH0OB/MYk7DFW1iRHtUSQ81wSa3.J/8zD.a', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', 'bc0046fb904ec4ec399e496b7a2aa971', '', '', '', '2020-05-12 09:05:41', '2020-05-12 09:05:41'),
(65, 'Hraday', 'Bhawsar', 'Hraday1998.hb@gmail.com', 1, '$2y$10$looanLRqXpFjSTxI0QxmPegXdkn1axBzCdWK1xCZ6hSU.tblSwIzi', '', '05/15/1998', 0, '8982338295', '3', '10', 'Technical job', 'Automobile, manufacturing', '', '', '452007', 'Kumavat Pura juni indore ', '1-2', '1', 'Technical knowledge, leadership, good communication', '15,000', '20,000', 'ARS', 'uploads/resume/HRADAY_RESUME.pdf', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-12 03:05:33', '2020-05-12 04:05:39'),
(36, 'Shubh', 'Shubh', 'sodanishubham75@gmail.com', 1, '$2y$10$Yf.8bZ5x2fWD1lGqrjltZuHyudIYP4HoRLJXg1nOcoJkpXPnXNjJi', '', '1990-03-30', 0, '8956230110', '6', '15', 'Full Stack Developer', 'I am a full stack developer having 15+years of experience.', '', '', '452001', 'Indore', '15+', '6', 'full stack web and  hybrid mobile development', '5000000', '7000000', 'INR', 'uploads/resume/Approvd_(MVP)_-_Key_Flows-30apr2020.pdf', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-01 09:05:58', '2020-05-02 11:05:26'),
(28, 'Kapil', 'Karda', 'kkarda77@gmail.com', 1, '$2y$10$HQUbS5gd8WQDnpxxA1PmMue/o1zm5O5tNq0ESjcX5Xmda29NnoQz2', 'assets/uploads/userimg/20200601160820.png', '1993-08-30', 0, '9981101934', '3', '25', 'CTO', 'Fullstack development', '', '', '452010', '106/3 Meghdoot Nagar, Indore', '2-5', '1', 'PHP, Javascript, Angular, IOS, Flutter', '600000', '1200000', 'INR', 'uploads/resume/Kapil_Karda_Senior_Full_Stack_Developer.pdf', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-04-23 04:04:44', '2020-06-01 04:06:46'),
(25, 'Kapil', 'Karda', 'kkardaji@gmail.com', 1, '$2y$10$8oH2F8b2FxWF.Ai7mxIgWeDMiMd8ia6ny3ccxnfmNJX4SxEy0VFce', 'uploads/userimg/3.png', '1993-03-30', 0, '9981101934', '3', '25', 'Full Stack Developer', 'I am a full stack developer having 10+ years of experience.', '', '', '452001', 'Indore', '10-15', '2', 'full stack web and  hybrid mobile development', '1200000', '2000000', 'INR', 'uploads/resume/Kapil_Karda_docx1.pdf', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-04-21 06:04:16', '2020-05-11 12:05:38'),
(66, 'Yash', 'Rajawat', 'ypratap23@gmail.com', 1, '$2y$10$5gXdCJg4dDqxuhiB8OqQ2u8qbymQ4Gvsq3Yn/sIeT.OnVkAuX5/dK', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-12 04:05:10', '2020-05-12 04:05:10'),
(67, 'Aparna', 'Khokle', 'Aparnakhokle94@gmail.com', 1, '$2y$10$phB1YRmjozsST7YL6O./DOYjGQ5Lh4e8o4h2ttqyCVv7YXKcIbm9a', '', '11/04/1994', 0, '7693925332', '3', '16', 'Human Resource Managment', 'HR Executives must educate, train, monitor, problem-solve, and ensure company HR policy is followed across all employees, managers, and executives. Additional HR Executive responsibilities include directing and overseeing the hiring, training, and dismiss', '', '', '452010', '44, Sundar Nagar Near C21 mall Indore M/P', '2-5', '5', '* Employee relations.\r\n* On boarding.\r\n* Human Resources Information Software (HRIS).\r\n* Performance management.\r\n* Teamwork and collaboration. \r\n* Scheduling.  \r\n* Communication skills.\r\n* Decision-making skills.\r\n* Training and developmental Skills.\r\n* Organizational skills.', '15000', '21000', 'INR', 'uploads/resume/APARNA_resumee_updated.docx', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-12 05:05:33', '2020-05-12 06:05:48'),
(37, 'Shubham', 'Sodani', 'sodanishubham@gmail.com', 1, '$2y$10$r2uXovs0uGrDLrnKYZeVHOOWcedGR63LmxNuHbZvaX0SFrJEj5iee', '', '', 0, '8956230199', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '0891cd43c7fd406cddf4cf4bf29eea41', '', '', '', '2020-05-02 11:05:30', '2020-05-11 12:05:27'),
(58, 'Paul', 'odhiambo', 'paulodhiambo962@gmail.com', 0, '$2y$10$1JWJSwll0iMv2yXD01HgueDAvk35ZZaX5a14libbB.vEipzSSLScq', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-09 02:05:26', '2020-05-09 02:05:26'),
(62, 'Pankaj', 'Borde', 'pankajborde78@gmail.com', 1, '$2y$10$S29L9Bs12LUpUSegXcEcZ.hBBsVuIOWuXu.3F0OmOBeN3ee2mKn.C', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-11 07:05:26', '2020-05-11 07:05:26'),
(63, 'Nishchal', 'Kabirpanthi', 'kabir.nishchal3@gmail.com', 0, '$2y$10$1a804VowjUPYqL2vmo5R6etist4uKYL5UgRI9vmeO33MZEGbJHOxG', '', '', 0, '9754795701', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', 'c4a8e1d721567388a284610731e081a3', '', '', '', '2020-05-11 10:05:46', '2020-05-12 03:05:00'),
(61, 'Sumit', 'giri', 'giriasha393@gmail.com', 1, '$2y$10$yLY0y8GIzivSVO7vbOEZH.Pvp/Z4U1OjomqB5o2prpR/YGjh0Pd8S', 'assets/uploads/userimg/20200511055540.png', '01/13/1994', 0, '7999131004', '3', '28', '2 year. Experience of textile company form manufacturing products.', 'I polytechnic complete and manufacturing companies experience and last sem running to bachelor of engineering from 8th semester.', '', '', '452009', '437, shri ram nagar hawa bangla, indore', '1-2', '1', 'Basic computer and ms word, graphic design knowledge', '19000', '22000', 'INR', 'uploads/resume/0_sumit.pdf', 1, 1, 1, 0, 0, '', '536c62c6110c23a2aefab97a38b0f043', '', '', '', '2020-05-11 05:05:17', '2020-05-11 06:05:14'),
(55, 'Akshada', 'Bhoite', 'akshada.emaster@gmail.com', 1, '$2y$10$uI7vX/THW65me4MoOmHNleMsRBx/TiByu2FCI486TCUaBlGjR1R7.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-08 05:05:42', '2020-05-08 05:05:42'),
(56, 'deepti', 'vaidhya', 'deeptivaidhya02@gmail.com', 1, '$2y$10$ifYi0GN46eqY0kHsX6qyJudroEBrgdvA.81kDzFEMrsEXWiSaqcTe', 'assets/uploads/userimg/20200518205241.png', '02/12/1995', 0, '8964064279', '3', '25', 'PHP Developer', 'PHP DeveloperPHP DeveloperPHP DeveloperPHP DeveloperPHP DeveloperPHP DeveloperPHP Developer', '', '', '452010', 'indore', '1-2', '1', 'PHP DeveloperPHP DeveloperPHP Developer', '12', '18', 'INR', 'uploads/resume/0_sumit.pdf', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-08 05:05:16', '2020-05-20 11:05:50'),
(57, 'Akshada', 'Bhoite', 'akshada.emaster@gmail.com00', 0, '$2y$10$iJnOvF1IagZigQ1UneOsseR6OkSpWIBAyd/fLy3eVF37NZuDHAVKG', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-08 05:05:34', '2020-05-08 05:05:34'),
(68, 'Krishna', 'Chouhan', 'krishnachouhan9@gmail.com', 1, '$2y$10$PHOgnUbOGQVcFj8qGp9bY.VZhx7ci2ZUh9l2VUt4h4qwBpuV1Y3ga', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-12 06:05:19', '2020-05-12 06:05:19'),
(69, 'Shubham', 'Giri', 'girishubham12@gmail.com', 1, '$2y$10$KgnuF6yxVpliS0oVbJARZelNhlN2CyO0WYpIX.A8OGCwXv..vILaO', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-12 06:05:46', '2020-05-12 06:05:46'),
(70, 'Dipesh', 'Jain', 'Dipeshjain172@gmail.com', 1, '$2y$10$wvXA9CDNtXDc6bJ5l6mWYuX2IU1ExXCzZXuu6Tw9/NPlRonW5oqFu', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-12 06:05:14', '2020-05-12 06:05:14'),
(71, 'Ganesh', 'Salvi', 'Ganeshsalvi24@gmail.com', 1, '$2y$10$vS408PSdln7k/i7CtJ7DCOHAq0W6Lm/N84fFu1OS5CEw4bmHOTlNq', 'assets/uploads/userimg/20200512085608.png', '04/01/2019', 0, '9165566229', '3', '11', 'Counsellor', 'Sales and marketing executive and counsellor in academic', '', '', '452010', '178/A maa sharda nagar, sukhliya, indore', '2-5', '1', 'Good communicator, multitasker', '18000', '22000', 'INR', 'uploads/resume/CV_of_gs.docx', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-12 08:05:01', '2020-05-12 08:05:04'),
(73, 'Shivprtap', 'Singh', 'thakurpawansingh29@gmail.com', 1, '$2y$10$ybk9UhAKQxrobfB75Q.VfupcpUPhk2QcMjSvpmnsOv1Hg7F6VH0v2', '', '03/02/1998', 0, '9109685850', '3', '25', 'It jobs', 'Need in it sector.. back office work', '', '', '452001', '25 managal nagar nx-a sukhliya , indore', '2-5', '4', 'Ok', '18,500 month', '22,000 month', 'ALL', 'uploads/resume/12345SHIVPRATAP.doc', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-13 02:05:41', '2020-05-13 04:05:53'),
(74, 'Priyanka', 'Vishwakarma', 'Vishwakarmapv684@gmail.com', 1, '$2y$10$KIHkyh5AxVHxnL91I9Kpa.CySrnqZColMQXSVdxJhkopl0lLMD6oy', '', '07/04/1994', 0, '9806778048', '3', '16', 'Human Resource Executive', 'Handling payroll outsourcing, recruitment,also all the other activity of HR.', '', '', '', 'Meghdoot Nagar, Indore', '1-2', '5', 'Positive attitude\r\nAlways ready to learn\r\nManagement skills', '22000', 'Hike from the last', 'INR', 'uploads/resume/Priyanka.pdf', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-13 02:05:26', '2020-05-13 02:05:06'),
(75, 'Ravi', 'Vishwakarma', 'raviv147.rv7@gmail.com', 0, '$2y$10$DbfPaiJb9CnsUIuyqDwpBeQvHXqH7a.0hx5VCJZRDuwHLVEU6wv5i', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 03:05:02', '2020-05-13 03:05:02'),
(76, 'Nilesh', 'Punnase', 'Nileshpunnase@gmail.com', 1, '$2y$10$7gHEM7WG1mPgm8IAPz4Vc.7/teWm6vSwt3OO9FqK4a7L3Y/6EJgzm', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 03:05:47', '2020-05-13 03:05:47'),
(77, 'demo', 'demo', 'demo@gmail.com', 1, '$2y$10$lyNKu/gY1njBufEvAGIfs.OqqbLq7oby9AD4x2CR0qbyjlwxTceYq', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 04:05:22', '2020-05-13 04:05:22'),
(78, 'Rohit', 'Jain', 'rj9174146171@gmail.com', 0, '$2y$10$621TsJZcUS/0w1yn6EaWM.AAoAa7ZoVudzPGL8Mb6A9zv5ckESVem', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 05:05:36', '2020-05-13 05:05:36'),
(79, 'Diksha', 'Bhawsar', 'Dikshabhawsar16@gmail.com', 1, '$2y$10$tgzyXzQDBegFIk3hnVhFl.icXHRpTVr9T32wmAqUKd57MjROsd8Fa', '', '07/29/2018', 0, '8602270408', '3', '1', 'Accountant', 'Prepares asset, liability, and capital account entries by compiling and analyzing account information. Documents financial transactions by entering account information. Recommends financial actions by analyzing accounting options.', '', '', '', 'Juni indore, indore', '0-1', '5', 'Standards of accounting. ...\r\n    Knowledge of regulatory standards. ...\r\n    General business knowledge. ...\r\n    Software proficiency. ...\r\n    Data analysis. ...\r\n    Attention to detail. ...\r\n    Effective communication. ...\r\n    Critical thinking.', '180000', '250000', 'INR', 'uploads/resume/resumediksha.docx', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-13 05:05:52', '2020-05-13 05:05:48'),
(80, 'Shivangi', 'Kaushal', 'Shivangikaushal13@gmail.com', 0, '$2y$10$ZycrP./vtWFUEO7YFK1vau7ELyUzIjI1Hc7ashoFtVY.IkPBW/Qpm', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 05:05:08', '2020-05-13 05:05:08'),
(81, 'Megha', 'Sahu', 'sahu.megha30@gmail.com', 0, '$2y$10$Fgmc2DrUsaafKgoQsY.NZeVyX6VkZzv0kYH8hNYNZP4g1/g2APGvO', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 05:05:14', '2020-05-13 05:05:14'),
(82, 'Kshitija', 'Bhawsar', 'Kshitijabhawsar@gmail.com', 0, '$2y$10$KOhYyc6i/LM4DmyUtCssXeWcGaVKImllYjSDjKelWouXeNGK3Taku', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 05:05:22', '2020-05-13 05:05:22'),
(83, 'Akash Singh', 'Thakur', 'anikett884@gmail.com', 0, '$2y$10$IKmdrR9EbrKRX9T5zFHg6OB20To/ByMn3d0.4SfojjZ0PmMa6S0l.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 05:05:22', '2020-05-13 05:05:22'),
(84, 'Akash', 'Singh', 'akashsingh161992@gmail.com', 1, '$2y$10$pN3pEfnfqgUFWAu1pWG.cus2WLSYBgmmDd3q9jVS4eEBDxpLt0Uyi', 'assets/uploads/userimg/20200513063613.png', '06/01/1992', 0, '9755299702', '3', '1', 'Account Assistance and Cashier', 'Maintains financial security by following internal controls.\r\nPrepares payments by verifying documentation, and requesting disbursements.\r\nCash management For A Cashier Hand Job.', '', '', '452011', '55/11, Chhoti Bhamori, Behind Hanuman Temple, opp:Anoop Cinema, Indore', '5-10', '6', 'Self Motivation\r\nTeamworking ability\r\nCommunication and interpersonal skills', '3,00,000', '4,20,000', 'INR', 'uploads/resume/Akash1.pdf', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-13 05:05:40', '2020-05-13 06:05:06'),
(85, 'Akhilesh', 'Chouhan', 'chouhanakhilesh339@gmail.com', 1, '$2y$10$s/EvOuPoOLa0FACweC0yi.s//l/d3Rkc8t8WfqI1lmWamQ2B76GHy', 'assets/uploads/userimg/20200513062934.png', '01/17/1992', 0, '9340810541', '3', '14', 'Medical  field', 'i am medical students..and i have some work for medical field', '', '', '466448', 'Gram-bashgahan,Tahsil-budni,Distic-sehore', '0-1', '6', 'I am medical studens and  i  have compliet different compny for medical field and work done ittellegency and honesty..', 'No', '10,000', 'INR', 'uploads/resume/Curriculum_Vitae_AKHLESH.docx', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-13 06:05:38', '2020-05-14 06:05:07'),
(86, 'Sima', 'Pathak', 'simmip1808@gmail.com', 1, '$2y$10$iZ1r46MKIYC.GqXxiOp8ieB9QbKbsEcDL8ti7ll6vt3oLdaWk6lBS', '', '18/08/1991', 0, '9098042870', '3', '1', 'Accountant, back office, management trainee,', 'I have a 4 years experience accounts field.', '', '', '452001', 'Indore', '0-1', 'Select Education', 'Finance', '18000', 'Above provide CTC 20000', 'INR', 'uploads/resume/seema_pathak_resume1_(1).docx', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-13 06:05:58', '2020-06-11 03:06:38'),
(87, 'Anshu', 'Thakur', 'tanshu404@gmail.com', 1, '$2y$10$nOsXLBPv0MpXKg9dp.mqyuNj6C1qBfrz4fmSplDQrRum.fBQkF.VK', '', '01/08/1997', 0, '8959652908', '3', '1', 'Back office', 'Filing, computer operating,data entry,', '', '', '452011', 'New 55/11 Chhoti Bhamori Behind Hanuman Mandir Indore MP', '0-1', '6', 'Learning, Adaptability,basic internet application', '1,80,000', '240000', 'INR', 'uploads/resume/Anshu_Thakur_resume_(1)-1.docx', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-13 06:05:19', '2020-05-13 07:05:34'),
(88, 'Prachi', 'Mirdha', 'prachimirdha121@gmail.com', 1, '$2y$10$iqkSZoTt0QJl0ZCely4yfeZAR.pFi2YDigDaBj1IIaXhost3i4wm6', '', '08/01/1999', 0, '9993299077', '3', '5', 'computer operater', 'computer operating\r\nmobile banking', '', '', '452011', '110,new anjani nagar', '0-1', '6', 'adaptability\r\nleadership\r\ngood larner', '96000', '1,44,000', 'INR', 'uploads/resume/resume_12342.docx', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-13 07:05:57', '2020-05-13 08:05:26'),
(89, 'Gunjan', 'Sharma', '47gunjansharma@gmail.com', 1, '$2y$10$pUXMxxBmY4Nh0nyF0/ih4eWqzJLKJHS2NCrSltZDy/FN/tTShdT6q', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 07:05:50', '2020-05-13 07:05:50'),
(90, 'Shweta', 'Shrivastav', 'Shwetaps385@gmail.com', 1, '$2y$10$8F4j3AGS2rjV2b.F4bFg5.G6vtRos26xs69fMqi/Vkihpktw6YVHy', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 08:05:22', '2020-05-13 08:05:22'),
(91, 'Megha', 'Bhawsar', 'meghabhawsar96@gmail.com', 0, '$2y$10$40c1XOP30wz47NGwded9KubaQc8toHRKJHbvGS/1.1rVi2/llZj4u', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 08:05:50', '2020-05-13 08:05:50'),
(92, 'Ajay', 'Jha', 'Jha.ajays47@gmail.com', 1, '$2y$10$869p7NKik768PYFkiWhmreJSIYkElP27WHc0pf6eJyTx.6rVHRtP6', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 08:05:44', '2020-05-13 08:05:44'),
(93, 'Akash', 'Jha', 'hiartist147147@gmail.com', 0, '$2y$10$fT1AD5FpRXuhqhvX05JpseiWxHP/uNVkK1Mpy3.FZOg23PlRkB69e', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-13 08:05:59', '2020-05-13 08:05:59'),
(94, 'Raj', 'Yadav', 'rajesh.emaster@gmail.com', 1, '$2y$10$MGBjZtKiRUmrW.8J4dStVOD77daenqPwyvxwXmMkS6svnNrpBzrA.', 'assets/uploads/userimg/20200608174653.png', '', 0, '', '', '', 'Php developer', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 12:05:30', '2020-05-14 12:05:30'),
(95, 'Pratik', 'Giri', 'pratikgiri612@gmail.com', 0, '$2y$10$f4dQF0x3kuRImLtV1ryU6uC6zDcelNnuihg3pNlCUBEklEOR0.C2.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 04:05:16', '2020-05-14 04:05:16'),
(96, 'Priyanka', 'Vishwakarma', 'priyavishvakarma04@gmail.com', 1, '$2y$10$eNkZvKWIVl0QFcvAYfuPjueS0RS2RCKJ2/nvX.kJbKu1kuzkSay6W', '', '06/04/1994', 0, '8109202447', '3', '16', 'HR executive', 'I have 2year of experience in HR profile\r\n Knowledge about all the recruitment process , handling payroll leave management attendance policy management activities ....', '', '', '452011', '154,anjni Nagar badi bhamori Indore', '1-2', '5', 'Quick learner\r\nPositive thinking\r\nHard working\r\nGood in recruitment', '2.8', '3.5', 'INR', 'uploads/resume/PRIYANKA_VISHWAKARMA.docx', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-14 05:05:19', '2020-05-15 12:05:06'),
(97, 'Vinita', 'Dhake', 'Vinnidhake02@gmail.com', 0, '$2y$10$h1wwZHUzuf76QKskuwnyROZ1xsmTlvl7kyC1DNQOl6VEuqVe/XXia', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 05:05:03', '2020-05-14 05:05:03'),
(98, 'Pooja', 'Bodana', 'poojabodana1997@gmail.com', 0, '$2y$10$pS4bPAEsA6ZzaKoenaNDIOBkupZus6QwORrG7qbeSiPx1RsvPfFkm', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 05:05:02', '2020-05-14 05:05:02'),
(99, 'Arpit', 'Jain', 'arpitjain611@gmail.com', 0, '$2y$10$AJdLdrPegvel0s5N3r6HK.6/Vn3Db49Y1BksL.Jrt7SdxaBieJkf2', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 05:05:31', '2020-05-14 05:05:31'),
(100, 'Manisha', 'Sahu', 'Manishsahu796@gmail.com', 0, '$2y$10$DvC/e7GkINeotqqG5Tc5wuLc4YjrEyYM2mZB3TcOrxgFqA19gy06u', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 05:05:52', '2020-05-14 05:05:52'),
(101, 'Chandrashekhar', 'Prajapati', 'chandrashekharprajapati76887@gmail.com', 0, '$2y$10$LrbuiOqroLWW12jjswbKReKBsCbw4C2/dMNkf/Lr1s903t3VJwthe', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 06:05:39', '2020-05-14 06:05:39'),
(102, 'Dolly', 'Sahu', 'sahudolly1003@gmail.com', 0, '$2y$10$qZoMAsTKfNt9T920TK14z./EHKHIGav.KE7mdA7IrBPbRqiqj/GEe', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 06:05:39', '2020-05-14 06:05:39'),
(103, 'Kiran', 'Magre', 'kmagre98@gmail.com', 1, '$2y$10$qGZ86.2y2weAb5FxLzrH.Of8qIJRZ6nlRMnlduZVz9bcWGi/QVdnK', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 06:05:34', '2020-05-14 06:05:34'),
(104, 'Vishnu', 'ailcha', 'Vishnuailcha1@gmail.com', 0, '$2y$10$YXIjQyHRYTtuTM7fm9.xdOJYjlsWb6EnZn3MURpPrfP5Dh.7C8PaW', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 06:05:43', '2020-05-14 06:05:43'),
(105, 'nanda', 'soni', 'nandasoni9@gmail.com', 0, '$2y$10$UttvgSD.augD2nZK9hM5CO1w2vA9U5.4IHTNgqJyJodFlRz.c8eOi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 06:05:02', '2020-05-14 06:05:02'),
(106, 'Mahima', 'Sharma', 'Mahimasharmam@gmail.com', 0, '$2y$10$Yy3wnZBMqmnE9AVgQ1PjD.RiKw9CmATH.G/BRwyCdEdofXKIwUEza', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 08:05:09', '2020-05-14 08:05:09'),
(107, 'Sandeep', 'Jadhav', 'Sandeep.sumit23@gmail.com', 0, '$2y$10$RAumPjGwn.fj6F.cxmjRceBQV/eGF9RyDbRHYU9YHQXw64VzF4L4.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 09:05:18', '2020-05-14 09:05:18'),
(108, 'Bhavesh', 'Pawar', 'bhaveshpawar312@gmail.com', 1, '$2y$10$KLBWq1MzWcsVW.Gwd8vKSOuCCDmFvaM9olkNH1bBGCNgasTOouray', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '497f7ce88b3b9e6dfbb1a824e334e8b4', '', '', '', '2020-05-14 09:05:41', '2020-05-14 09:05:41'),
(109, 'Nilesh', 'Kshirsagar', 'nilesh0903@gmail.com', 1, '$2y$10$7YCHjC82Q3UpWoeJw2tHJ.A1a0v2uTOvgwyrWV3cOKUy4doTAAyH.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '6387ec16a769249edb3d6cea12d59164', '', '', '', '2020-05-14 09:05:32', '2020-05-14 09:05:32'),
(110, 'Bhavesh', 'Pawar', 'babupawar665@gmail.com', 1, '$2y$10$YhU3V6fWEgKJrEVoJ9OY/uKZGbnf/zTixvQSneumLenZuc7Man53G', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-14 09:05:32', '2020-05-14 09:05:32'),
(111, 'Prakash', 'Jadhav', 'jadhavprakash1122@gmail.com', 0, '$2y$10$qMb.fCcsVFDTGRYCk6SS2udgViNswEGDEcU.wa2Kfp25zhqy7a.7q', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 03:05:40', '2020-05-15 03:05:40'),
(112, 'Hira', 'Dawar', 'dawarhira0143@gmail.com', 0, '$2y$10$PvXHzNNCu8MP4Sq4zvONkeKgv2v.Zb089xEIu8zeVjGZ0Ocl/y7Lq', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '97e83e4106310de8f0c0692088804151', '', '', '', '2020-05-15 03:05:53', '2020-05-15 03:05:53'),
(113, 'Sonam', 'Sharma', 'sonamsharma741569@gmail.com', 1, '$2y$10$r2EAC0Sc40Naphvy2NroduBybFRviJ4oGkMGJJJYP.YlU8B3Kk4v6', 'assets/uploads/userimg/20200519123358.png', '30/08/1998', 0, '8962350837', '3', '14', 'Lab technician', 'In medical field', '', '', '462046', 'Gandhi chowk Mandideep, Bhopal', '0-1', 'Select Education', 'Do our best', 'Fresher', '8000', 'INR', 'uploads/resume/Sonam_Sharma(1).pdf', 1, 1, 1, 0, 0, '', '471ed3f69ca296521b8c7a37e0e5be55', '', '', '', '2020-05-15 03:05:34', '2020-05-19 12:05:52'),
(114, 'Neelesh', 'Prajapati', 'neeleshprajapati598@gmail.com', 0, '$2y$10$Rii2r6Ew/547p.gQi3Z9jOYBO3Fk8EUoR649xA02SWGOcQIxvGK8O', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 03:05:31', '2020-05-15 03:05:31'),
(115, 'Bharti', 'Mandre', 'bhartimandre386@gmail.com', 0, '$2y$10$ui0VA9kb82aB7y8h/rQtd.pOhFhTMw2ooAgO7PgNA0.wivPi/iRH.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 03:05:07', '2020-05-15 03:05:07'),
(116, 'Muskan', 'Khankh', 'muskankhankh11666@gmail.com', 1, '$2y$10$nXysn.EJetKSfIBxz5DxO.lbYzc1PJ.OZDcsgC0P9NfIhnxkvC9xO', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 03:05:36', '2020-05-15 03:05:36'),
(117, 'Meenal', 'Pal', 'meenalpal091117@gmail.com', 0, '$2y$10$CdVchr3BdGNMPuMS2sWNTOsT0APja/9bYa50q/o0/gGD.z2i00AxK', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '4bc078c899347a8485870937856cb071', '', '', '', '2020-05-15 03:05:06', '2020-05-15 03:05:06'),
(118, 'Lalita', 'Arya', 'aryalalita30@gmail.com', 1, '$2y$10$Z64GEOEFE3GPSOhvJsCRgu73U8U352PNn5sKGKNAcWQt1DQIkcw2W', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 03:05:26', '2020-05-15 03:05:26'),
(119, 'Pooja', 'Bele', 'poojabele28@gmail.com', 0, '$2y$10$/pb9tcVCd6q4vNJnvn9wH.ZckaRxmwe8ELS1tLZs7xlxcWVCEulQS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 03:05:01', '2020-05-15 03:05:01'),
(120, 'Uma', 'Ahirwar', 'umaahirwar821gmail. com', 0, '$2y$10$7.4Vt8G6koHFumfhEto8eeWTccFTV7xV7eJAOnHDqErIDmADY19v6', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 03:05:26', '2020-05-15 03:05:26'),
(121, 'Aman', 'Sharma', 'sharmaaman@4098gmail.com', 0, '$2y$10$TdlN./YV93KF/tvTqxrTneqCJpxNW2Ac.QqJEtm5hWNJCH6/ZVIoS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 03:05:30', '2020-05-15 03:05:30'),
(122, 'Pranjali', 'Pawar', 'Pranjalipawar136@gmail.com', 1, '$2y$10$7cPBAi0q4x3yDDuK0yzD/Os4Td654e/dcjZc5gG4vyKNYr.mf7QkC', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 05:05:01', '2020-05-15 05:05:01'),
(123, 'Ankit', 'Mishra', 'am3207701@gmail.com', 1, '$2y$10$cqhFtM.NPu9gW6uaz2n/7OxDb9jiAMK6X6R2ikjNdjKuBmbl59T2q', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 05:05:35', '2020-05-15 05:05:35'),
(124, 'Kuldeep', 'sahu', 'Kuldeepcsbb@gmail.com', 0, '$2y$10$tNBmMIl7IVTMOo3CWiwDvePpQVSvXHRvHEm1I9l2FgOGEwhQF9eJW', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 05:05:16', '2020-05-15 05:05:16'),
(125, 'Riya', 'Chouksey', 'Chouksey.riya05@gmail.com', 1, '$2y$10$9bE2cxKcyPp02dzpQLIU0uf8BWRF2c49Om5n6/jhB18sdJ/xD6Jy.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 05:05:10', '2020-05-15 05:05:10'),
(126, 'Gourav', 'Giri', 'gourav96175@gmail.com', 1, '$2y$10$PKExfZyBSKYlJJ.Rvl0olu0/hnT0KzC6Bn1YRl39v6s3JT/cLTR7.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 05:05:18', '2020-05-15 05:05:18'),
(127, 'Anjali', 'Giri', 'anjiiii1301giri@gmail.com', 0, '$2y$10$u8uy2WmcK530PI8LT5E/WuX1FKEGw4Ei4yvLd.EuA9uUOlCMMotJC', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 06:05:50', '2020-05-15 06:05:50'),
(128, 'Rahul', 'Mewada', 'mewadar015@gmail.com', 0, '$2y$10$552G..maraA95nAnnbpRKeWmy3ujftJHIBrgRoxsjb.B319ZkBN2.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '4e852b97c19b4f7b3688dc62e92bb2d2', '', '', '', '2020-05-15 06:05:11', '2020-05-15 06:05:11'),
(129, 'Ankit', 'Dongre', 'ankitdongre1995@gmail.com', 0, '$2y$10$8ibVWEJnmZp0HZbBp9TuRuGbUcABxsvl2OJPNkbVXAHNjEODSpy2m', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 08:05:25', '2020-05-15 08:05:25'),
(130, 'Mohini', 'Bhuyar', 'Mohinibhuyar1998@gemil.com', 0, '$2y$10$8a3HziiWVwRF5QTLsn5rRuCcN7ATZSI1UtmGysMrC0jQaTR7fe4au', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 08:05:42', '2020-05-15 08:05:42'),
(131, 'Pranjali', 'Pawar', 'pawarpranjali1991@gemil.com', 0, '$2y$10$NSpdhU.TjxLozEMz4ekH.OjHULVDeguE9QRQiQ4a7OTTfpJdLRfAm', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-15 09:05:54', '2020-05-15 09:05:54'),
(132, 'deepti', 'vaidhya', 'deeptivaidhya45@gmail.com', 0, '$2y$10$G75iAEAZhLePZN3ao6QFnORMAIg7Yn2WRlKpp5Qjj6y/46odx8FmS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', 'wdsfdcfdsf', 'dfsdfdsdfdvfdvf', '2020-05-15 10:05:38', '2020-05-15 10:05:38'),
(133, 'Geeta', 'Kshirsagar', 'geetakshirsagar84@gmail.com', 0, '$2y$10$eW.KLsUqRT2O/EeR88QYDeh3dHwC83ZcdUW6wX6CY2R/vXAG.ctcu', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 05:05:02', '2020-05-16 05:05:02'),
(134, 'Abhay', 'Jaiswal', 'Abhayjaiswal280@gmail.com', 0, '$2y$10$ZggM5vp9edVhX21A8DS/.emHr/CTjBuIYM8suHTHe/vhGVV/qENPi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 05:05:09', '2020-05-16 05:05:09'),
(135, 'Mousami', 'Mandve', 'mousamimandve216@gmail.com', 1, '$2y$10$v.pSUHj3vHhyJcuP0KGqNuvNOf9BvHL6FHnJrEIAkcRE8NKj.FzBC', 'assets/uploads/userimg/20200517000133.png', '03/24/1998', 0, '9516383236', 'Select Nationality', '11', 'Office work lab', 'Lab technician', '', '', '461223', 'Pagdhal, Hoshangabad', '0-1', '6', 'Medical student', 'Education ,office work', 'Education, office work', 'ALL', 'uploads/resume/Frunt_Page.docx', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-16 06:05:51', '2020-05-17 12:05:21'),
(136, 'Devendra', 'Bakoria', 'devendrabakoria3@gmail.com', 0, '$2y$10$EqFhCQxV/PeCiJQXydZifuR/eQWcImnWJks8SGNOR.OPE0GspUKB6', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 06:05:53', '2020-05-16 06:05:53'),
(137, 'Jaya', 'Hadaj', 'Jayahadaj@gmail.com', 0, '$2y$10$O5zDTCFh96TLwjfMmSijXOo4CR9QTjsu/aW2bAbbI8NbGe9Wweysy', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 06:05:46', '2020-05-16 06:05:46'),
(138, 'Prachiti', 'Deshmukh', 'prachiti.deshmukh.12@gmail.com', 0, '$2y$10$xE88RtraQuC6QcOOdxiQWORwH1R5H3skM3mshWNI7nVo0WlTatKZO', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 06:05:32', '2020-05-16 06:05:32'),
(139, 'Anugmailcom', 'Dixit', 'anupamdixit1012@gmail.com', 1, '$2y$10$8Mai3UeoPNzYqbSePqxNpOWvXG0bds8NzbNvgg1lcUHhYCoOzVYnu', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 06:05:12', '2020-05-16 06:05:12'),
(140, 'Shubham', 'Rajnor', 'shubhamrajnor1gmail.com', 0, '$2y$10$zABiEmnJxm5TekErgmCGBeJM1hdcnw23CLKZppVjAd58RuQlgVQsW', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 08:05:26', '2020-05-16 08:05:26'),
(141, 'Pawan', 'Jangid', 'Semj137@gmail.com', 0, '$2y$10$bT7dV/k/0qs8JazLeTlKGe2e.ce42PexK3NC39xLQ8rgNFBlGj0XK', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:01', '2020-05-16 09:05:01'),
(142, 'Navdeep', 'Sahu', 'navdeepsahu11@gmail.com', 0, '$2y$10$FfCbqCf9s1TEIeL1v/x4MeCirLL5H.pqD7IAz9.BOOb/SRQ2uZCn.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:05', '2020-05-16 09:05:05'),
(143, 'Upender', 'Chandravanshi', 'upender.chandravanshi1@gmail.com', 0, '$2y$10$OW4f7fAueoaxYUEZOX3N1uWRxUuC7m1vmLjqHm825uIuV.a5Ca.xW', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:34', '2020-05-16 09:05:34'),
(144, 'Chaitanya', 'Ramisetty', 'chaitanya.peters@gmail.com', 0, '$2y$10$w4ZZ3VgUU5f7FfBGBLqJ9uKD/FYQXsDRhsZdi6xcHylr4EAet90fC', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:25', '2020-05-16 09:05:25'),
(145, 'Nida', 'Warsi', 'nidawarsi2806@gmail.com', 0, '$2y$10$e8fcaphMBm/DD60rRvtGn.Uwv6o0AkbFkVDrQVL8PymTQRf3ekIti', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:42', '2020-05-16 09:05:42'),
(146, 'Sanket', 'Shah', 'shahsanket23@gmail.com', 0, '$2y$10$g78f.FipUAN.jDRAiSIgiOa/f9ceT7knujdCMtYUIseby.sd8cHOy', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:36', '2020-05-16 09:05:36'),
(147, 'Ravi', 'Dhiyana', 'ravi.dhiyana@gmail.com', 0, '$2y$10$8MDMJaOftBe8NJWITqySWeLzgRGPhpkVIgbrja9BJgK4cMuXyW38q', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:54', '2020-05-16 09:05:54'),
(148, 'Diksha', 'Rawat', 'rawat2593d@yahoo.com', 0, '$2y$10$cXdUSWqfrb9jYdrLkAxyduk9DfSD5r9Y4i8yeu8QTEgPQfEg2mDWW', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:42', '2020-05-16 09:05:42'),
(149, 'Priyanka', 'Soni', 'priyankasoni534@gmail.com', 0, '$2y$10$5KzGO8qzRsDiBKYtCFZy9u346wxap.ojlsSfiEPeTOQCJe8Xg6j3e', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:14', '2020-05-16 09:05:14'),
(150, 'Khushal', 'Bhati', 'kbhati782@gmail.com', 0, '$2y$10$q6a2IoImNgC/DWIIJlkF8OQasXbw5n8kqN.gSPvD.blc7/uU4AoZC', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:48', '2020-05-16 09:05:48'),
(151, 'Mihir', 'Vaidya', 'mihirv97@gmail.com', 0, '$2y$10$jl5Tc6a24juZSjl6j1Tf5ONvFgsvJj36/RzHGw2tEO6jO5GUEMzr.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:34', '2020-05-16 09:05:34'),
(152, 'Manoj', 'Kushwah', 'mk9595176@gmail.com', 0, '$2y$10$CBmNxwf.K/mTQepuAjxhUeHXoy7m8P0pEkom1Nc0uKpGD7z6rHXgC', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:21', '2020-05-16 09:05:21'),
(153, 'Mansi', 'Jain', 'mansijain3113@gmail.com', 0, '$2y$10$6vkx2VdY5vnMJTaUj07GgOapHTdV3OebG99yWGMROk8EKuHvJX7RW', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:28', '2020-05-16 09:05:28'),
(154, 'Shubham', 'Birla', 'sbirla432@gmail.com', 0, '$2y$10$YuMDNBe9jcyzOTdhzFzihuoO/throKLU3VX82608.gxzGAZSf7udu', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-16 09:05:36', '2020-05-16 09:05:36'),
(233, 'Vinay', 'Yadav', 'vinay313yadav@gmail.com', 0, '$2y$10$kFyWpI8AX9E4sLkMOe023u1RQgVRxMSkvcpgylepNRT36hZIS22l2', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-08 03:06:00', '2020-06-08 03:06:00'),
(156, 'Shubham', 'Sodani', 'anmol.up11@gmail.com', 1, '$2y$10$kqWIEX2SotOS.Ibm4MifDudPIVG0/KJ91FCN9zWMFAVGRsIYMqBNS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 02:05:27', '2020-05-18 02:05:27'),
(157, 'Nidhi', 'Bajpayee', 'Nidhibajpayee31394@gmail.com', 1, '$2y$10$kYf6v9txkjd0Id332RiFpOoTFjJ/RItZRvW1zIkCfvdqA99wUr9.m', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 05:05:09', '2020-05-18 05:05:09'),
(158, 'Vikas', 'Sarode', 'Vikassarode2222@gmail.com', 0, '$2y$10$dJshp41Z1PRyh4L/pMOyUu8.ZOVhOFEJRXa5SOHj8bqi0KQm6ivX.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 06:05:55', '2020-05-18 06:05:55'),
(159, 'SACHIN', 'GANGRADE', 'gangrade01@gmail.com', 0, '$2y$10$sDkOyR1Kb52SGx/OuHapdOD/sQ1Rv2Cj3YYqDhpCJ6jnY4o5tP2eq', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 06:05:38', '2020-05-18 06:05:38'),
(160, 'Pawan', 'Thakur', 'thakur.pawan98@gmail.com ', 0, '$2y$10$e1wU5qMqVWLcI9MLrTROyeMXkhSpKNRwYKHa73bYKxJ537ujMc17K', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 06:05:16', '2020-05-18 06:05:16'),
(161, 'Deepak', 'Sen', 'geetgami3@gmail.com', 0, '$2y$10$SZGaB/aneRWuatgaYKLj6elZ0rFnz6JxXhzPn39YZ/gLqr2QuU6Ji', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 06:05:36', '2020-05-18 06:05:36'),
(162, 'SHIVANI', 'HARINKHEDE', 'shivaniharinkhede18@gmail.com', 0, '$2y$10$x80RwjslhCY4yZExtLgpee5aViFyYAed1Ui6qq0J6cM2G2miAZsGu', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 06:05:12', '2020-05-18 06:05:12'),
(163, 'Kshama', 'Rai', 'kshamarairoyals@gmail.com', 0, '$2y$10$S8NnShYGqDmHqWecTM/aqOxL8wFZ2tiNhGSJRL3iqht0mvjDbxl7y', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 06:05:59', '2020-05-18 06:05:59'),
(164, 'Snehal', 'Sharma', 'Snehal46sharma@gmail.com', 0, '$2y$10$rcib4V8RvrYXibw7RdBRh.e4nuohW/F66XYAHMe2EAXArjnu8.NbO', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 06:05:44', '2020-05-18 06:05:44'),
(165, 'Anupam', 'Sharma', 'anupam5000500@gmail.com', 0, '$2y$10$gcHN.6P.hL.hZQuGhYN2fey3uoHJdbkV.le5cxWM2L3hcB2So/0J.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 06:05:17', '2020-05-18 06:05:17'),
(166, 'Shubham', 'Kumar Mishra', 'mishraji511201@gmail.com  ', 0, '$2y$10$mgHwykMg/MEo/aEHHbe97uZoHw5pDNpR810x7R/ox9LWNuuzzen5a', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 06:05:18', '2020-05-18 06:05:18'),
(167, 'Tanushree', 'Sengupta', 'tanushreesengupta40@gmail.com', 0, '$2y$10$4vn.oc1e9QCD.FWtFh4fiO.AJjp3zuudRRcLus6ZleiMP.CmkxA9K', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:19', '2020-05-18 07:05:19'),
(168, 'Devendra', 'Soni', 'Devendrasoni984@gmail.com', 0, '$2y$10$6VuPgHpeqai7EuQ4dBLtCuFeGbj146tJa4ziV/AWtnvguj5E22Yee', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:55', '2020-05-18 07:05:55'),
(169, 'Raj', 'Prajapati', 'rajprajapat712@gmail.com', 0, '$2y$10$sgXhZ8v.BfIUDFGO5pHZ0OVPcoHbOd5fdipfIDYiMYlz46aHpavxy', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:50', '2020-05-18 07:05:50'),
(170, 'Tarun', 'Tiwari', 'taruntiwari1002@gmail.com', 0, '$2y$10$28FDzCZOFiXYfzcVjUs0wObVYqF/TQ/m.iuKxpD45c7nnqJ6FWYr.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:10', '2020-05-18 07:05:10'),
(171, 'Jagdeep', 'Singh', '- js5988500@gmail.com', 0, '$2y$10$0gxKI1Rf/reGsZeUYQadxeJitj1WDQvu3IoH/Y4w6Yp3Q/yIulAs6', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:41', '2020-05-18 07:05:41'),
(172, 'Pradeep', 'Jhala', 'pradeepjhala1997@gmail.com', 0, '$2y$10$C3KEar5R0kFqoDS2.JjyBuYDc56hgc6aeuwiN8X/VvBsoWMMxd8mC', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:13', '2020-05-18 07:05:13'),
(173, 'Saloni', 'Jhawar', 'salonijhawar412@gmail.com', 0, '$2y$10$qRzKc.SuIdOe8hbNFGTJ7uylJzGJon6ZSgWDMfFudZfTu/6Gx2luK', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:51', '2020-05-18 07:05:51'),
(174, 'Vishwas', 'Shrivastava', 'vishwas.softdeveloper@gmail.com', 0, '$2y$10$lBjb5Cb4ZMuDVNS4u1KoS..3ndMIz8OhMgk1HHEKDgKX8YxAvNioG', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:48', '2020-05-18 07:05:48'),
(175, 'Rohit', 'Panjwani', 'iamrohit.panjwani@gmail.com', 0, '$2y$10$8X1uxYsG32agZNjtJM.hKOLLlSg0cmzIOUK5hzmc5LL0rGRiMKEjC', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:39', '2020-05-18 07:05:39'),
(176, 'Devki', 'Sharma', 'Devki.Sharma111@gmail.com', 0, '$2y$10$rczktjAlkApAx5tMxY77M.jY8LAVSouorBXWA7GfyNCqJw/0wVe6K', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:44', '2020-05-18 07:05:44'),
(177, 'Amit', 'Kumar', 'amitrenia@gmail.com', 0, '$2y$10$OoivT.iqhclt5QDQRnirRuWJ1TpziNkqHBzu8NMCLpHBAL1JK/L/2', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:42', '2020-05-18 07:05:42'),
(178, 'Damini', 'Chouhan', 'daminichouhan91@gmail.com', 0, '$2y$10$PoMyAxGPwasTb7JKrpgNuOEEfutx7/ppQ4toj12oqxT3WNUuwil8y', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:02', '2020-05-18 07:05:02'),
(179, 'Varsha', 'Joshi', 'Joshivarsha814@gmail.com', 0, '$2y$10$EeVuh4lIJeQ.TxrDFaFBtO76k8sl/dkq2TUQJDTGGMGf4sIXq/nyy', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:40', '2020-05-18 07:05:40'),
(180, 'ANKUSH', 'BANAWADE', 'ankush.banawade15@gmail.com', 0, '$2y$10$LP1Un4k4lZnzKwAptenYcuDK/Hxak0y4B.bw8lpQXjF.eM/Mc6POy', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:58', '2020-05-18 07:05:58'),
(181, 'Dilip', 'Patel', 'er.patel777@gmail.com', 0, '$2y$10$HCS1xDh/rHnC.KPQVSkC9.Hu2wxhGGLNL.NLu50VLSfpTvm00yM56', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:50', '2020-05-18 07:05:50'),
(182, 'Akanksha', 'Rajput', 'akanksha.rajput585@gmail.com', 0, '$2y$10$t8G1CkMQEA4I7zI/MT8jfeVKqsV0SyJ/uJaerY.gwhwHsRfiZ7.Tm', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:47', '2020-05-18 07:05:47'),
(183, 'Puneet', 'Dholi', 'dholi.puneet@gmail.com', 0, '$2y$10$h2iEdsdK.kM2xLog5GcpsOCNWD12G3afRdquFYEVFYU9YadePjP6e', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-18 07:05:39', '2020-05-18 07:05:39'),
(184, 'Shreya', 'Dubey', 'dubeyshreya317@gmail.com', 1, '$2y$10$luDOopru2u98OzUHD0G.8OiszbK5n8/zuFexXs2HXvFe8aVlwxVCe', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-19 07:05:41', '2020-05-19 07:05:41'),
(229, 'Phoolchand', 'Kurechiya', 'phoolchand.kurechiya291@gmail.com', 1, '$2y$10$D3tJstxVTM1gjjNCSLom1e48dAIFkObxFt2O8zollPepEvCvw1mcu', 'assets/uploads/userimg/20200610144258.png', '11/12/1980', 0, '9926270709', '3', '5', 'Vehicle finance and sales', 'Car and commercial vehicle sales and finance last 10 expariance', '', '', '452010', '911.B,New gori nagar indore', '5-10', '6', 'Hindi and english', '21000', '26000', 'INR', 'uploads/resume/resume_phoolchand_zx.pdf', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-06-04 10:06:10', '2020-06-10 02:06:32'),
(231, 'Vishwanath', 'Kumar', 'mk.20150807@btech.nitdgp.ac.in', 0, '$2y$10$XOuIgC2eQf0QkGtNKHSp7u5sqEU.6hi3vkVwEiaq4.dIxEeyQp2SG', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-08 03:06:21', '2020-06-08 03:06:21'),
(232, 'Bina', 'suhagiya', 'vassusuhagiya.1968@gmail.com', 0, '$2y$10$HcwCj6VDhdk71UBK3gBcReZayJeaneNkZIOko2Tj.c6SbY6w1rEOG', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-08 03:06:24', '2020-06-08 03:06:24'),
(186, 'Akshay', 'Chouan', 'cakshaychouhan@gmail.com', 1, '$2y$10$ic71w/7A8bbmOx19hc/tdeMmzH7FeRMylxhVM2nEBi/ANdULK9Ihm', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '987ae342ff43955b57330c0c7d5302b2', '', '', '', '2020-05-21 10:05:54', '2020-05-21 10:05:54'),
(187, 'Varun', 'Kothari', 'varunkothari28@gmail.com', 1, '$2y$10$yU7LzvlyBGBOVpsTiD3hp.XXhlkpI1l7ODREOKNj4akz8.Ngwg1WS', '', '07/09/1985', 0, '9826336718', '3', '25', 'web developer', 'I consider myself to be a versatile full-stack developer on many technologies and programming languages. I gratifying challenging and ambitious role.\r\n\r\nI have developed a wide range of websites using Ruby on Rails & Blockchain. My core competency lies in', '', '', '452001', 'S-113, 114, Yashwant Plaza B/H Central Mall, near Regal Square, Indore, Madhya Pradesh 452001', '5-10', '1', 'JavaScript\r\nPostgreSQL\r\nMySQL\r\nGit\r\nRuby\r\nCSS\r\nSQL\r\nHTML\r\nAJAX\r\nSVN\r\nGIT\r\nAzure\r\nAngular\r\nPHP', '1', '7', 'INR', 'uploads/resume/Varun_Resume_ROR_(1).pdf', 1, 1, 1, 0, 0, '', '', '', '', '', '2020-05-21 05:05:58', '2020-05-22 02:05:16'),
(188, 'Rani', 'Patel', 'rani.patel1225@gmail.com', 0, '$2y$10$Va8gfEIZkvBwWprdMxde8Ot5XzkYxY1X2DczuqqpX9dFyVDuSBW5e', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-24 08:05:12', '2020-05-24 08:05:12'),
(189, 'Rakesh', 'Hirve', 'hirve.rakesh@gmail.com', 0, '$2y$10$JqGY2NZk.52o3czoyF3v0ebhQ/twysgyEwPVhqvhMs9XbpSkTY79e', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-25 04:05:01', '2020-05-25 04:05:01'),
(190, 'Arjun', 'Jadon', 'arunjadon581@gmail.com', 0, '$2y$10$iYkETRiR6B2n9AYA.CYCZeNFPxKURUg5R1E6CIIQHFpmyf/CAqm6u', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-25 04:05:14', '2020-05-25 04:05:14'),
(191, 'Yogesh', 'Sonawane', 'sonawaneyogesh1998@gmail.com', 0, '$2y$10$T2LkQho337vnSKBTRnpuEe8w/1Cx8oGVY7iVwpaxRrrSIkME7S4OC', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-25 05:05:22', '2020-05-25 05:05:22'),
(192, 'Lavkush', 'Maihar', 'lavkush.maihar01@gmail.com', 0, '$2y$10$Uio9fCBZkUT6SYlZNn97aubG6DNosSq2RuJuoweWDAqfv5D3z/R6y', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-25 05:05:39', '2020-05-25 05:05:39'),
(193, 'Piyush', 'Marothi', 'marothipiyush20@gmail.com', 0, '$2y$10$31g/Pq8wszy.6S448t/uTOgoBMNcM4/NLquCVvi7LaNUatZU2CduS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-25 05:05:15', '2020-05-25 05:05:15'),
(194, 'Ajay', 'Sharma', 'ajjusharma707@gmail.com', 1, '$2y$10$Cs69f345bUZYqjHOZ9zWb.kQqiqviVL5AqvQGqLOCveX/T2Iq7GKC', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-25 05:05:03', '2020-05-25 05:05:03'),
(195, 'Shailendra', 'Rathore', 'Shailendra_Rathore32@yahoo.com', 0, '$2y$10$fQx5ZPK6bFlEI7IgG0FxQuE4zcvtkPs/hc.BvM/n8bkqsm3MWVLNG', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-25 05:05:50', '2020-05-25 05:05:50'),
(196, 'Kapil', 'Soni', 'sonikapil859@gmail.com', 0, '$2y$10$Ezm3qHfyYuvwD1FoPTNZcOlx5DZEujQnnZco.8bf3JPTXKO9Y8xeG', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-25 05:05:04', '2020-05-25 05:05:04'),
(197, 'Lokesh', 'Solanki', 'lokeshsolanki0206@gmail.com', 0, '$2y$10$32CwLNCW9vIOAxvnZ/6QluAr7CfII2w3iIOO1mHSCcHBK1sEoG97u', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-25 05:05:15', '2020-05-25 05:05:15'),
(198, 'Bhavani', 'Ashware', 'bhavaniashware@gmail.com', 0, '$2y$10$Z2vPVfk6fgMGc/9Gzy/8le3jGsh41UzdaZjJd2gtmj54I/VyLNuby', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-25 05:05:04', '2020-05-25 05:05:04'),
(199, 'Jitesh', 'Choudhary', 'jitesh865@gmail.com', 0, '$2y$10$xbE62d71mALVABFbTJ.OF.6gU/p29RNNwrIos6QBLRE16fUiZwMEG', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-27 05:05:59', '2020-05-27 05:05:59'),
(200, 'Akhilesh', 'Jain', 'akhiljain16847@gmail.com', 0, '$2y$10$.xrWuB2lWOO02IOtwCk.bOysMSEnkYz0xH5p7AMvSXL8otSrtI5r6', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-05-31 12:05:29', '2020-05-31 12:05:29'),
(201, 'Anjali', 'Torne', 'anjali.torne91@gmail.com', 0, '$2y$10$Y5LfYrWIscBWe5xFpTDDH.68LhlKyPrypkRGwC2yKE0c7Ninh.ltW', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 03:06:49', '2020-06-01 03:06:49'),
(202, 'Pankaj', 'Rathore', 'namepankajkrathore@outlook.com', 0, '$2y$10$qspykal7NhSqIRDAg24Bc.S7KYSFuD4ri6UmsktsGrCIbVYTJBzA.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 03:06:35', '2020-06-01 03:06:35'),
(203, 'Pulkit', 'Sharma', 'sharma.30pulkit@gmail.Com', 0, '$2y$10$zS2M4XEBWyW.3.8jWJLP7eE7XzQqkN.6UOLQYbjWQVQmvJhyBncEq', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 03:06:27', '2020-06-01 03:06:27'),
(204, 'Ankit', 'Agrawal', 'ankitagrawal288@gmail.com', 0, '$2y$10$y7Y/BZO12NueS410vpTzseOObi4ibfJznkOy8HyZZXaYMIa4cG0Ka', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 03:06:25', '2020-06-01 03:06:25');
INSERT INTO `xx_users` (`id`, `firstname`, `lastname`, `email`, `email_verify`, `password`, `userimg`, `dob`, `age`, `mobile_no`, `nationality`, `category`, `job_title`, `description`, `gender`, `marital_status`, `postcode`, `location`, `experience`, `education_level`, `skills`, `current_salary`, `expected_salary`, `currency`, `resume`, `role`, `profile_completed`, `is_active`, `is_verify`, `is_admin`, `token`, `password_reset_code`, `last_ip`, `device_type`, `device_token`, `created_date`, `updated_date`) VALUES
(205, 'Saurabh', 'Saxena', 'saurabhsaxena072@gmail.com', 0, '$2y$10$tdPDsnV3GUS/.W1soHmDJOKTny7XG8kN0t0CR91UNePl6H0Uz70u2', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 04:06:42', '2020-06-01 04:06:42'),
(206, 'Akshay', 'Jain', 'akshay.jain55@gmail.com,', 0, '$2y$10$6r3J.snEn4uFdCsKj376YuUqzfZqbPtZJSCur.x4sGqjGMf76t0ym', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 04:06:45', '2020-06-01 04:06:45'),
(207, 'Rashmi', 'Raval', 'cse.rashmi25@gmail.com', 0, '$2y$10$GdNg9DOPEk7uU1TlE6R7ge5OGFWtdyT7blOG4HlOQTgx2kc0CVZ7.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 04:06:28', '2020-06-01 04:06:28'),
(208, 'Pushoak', 'Solanki', 'pushpaksolanki143@gmail.com', 0, '$2y$10$GtFGCJEgODCFk43q8sldCukSt52h17i8f9s1J3FtnR1pXSQU.Dqaa', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 04:06:38', '2020-06-01 04:06:38'),
(209, 'Suryakant', 'Akhande', 'akhandesuryakant@gmail.com', 0, '$2y$10$ZhyXhcLkv.BFThzNqV9kreLaZsmbAuIrzCJ67NQAhVl3xc3yLkdlG', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:55', '2020-06-01 05:06:55'),
(210, 'Shubham', 'Patanwar', 'patanwarshubham@gmail.com ', 0, '$2y$10$6fSjNlaKZWGlNkIF0SxIGu/yP0mbegVPkDCEuuv04yzw1L8j4UZjO', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:29', '2020-06-01 05:06:29'),
(211, 'Swati', 'Kanungo', 'swatikanungo10@gmail.com', 0, '$2y$10$E4pE6Z9OOg12ZJTklLPjP.TvRUZVeqtXdOKqsEkKt0Zdls2PzrdIO', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:03', '2020-06-01 05:06:03'),
(212, 'Rohit', 'Kosta', 'rohit.kosta.86@gmail.com', 0, '$2y$10$V3NtRVbncnb0KJkOF3Bc0.78m872qtlrlmG8fNRJjt6dzBWGItYei', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:37', '2020-06-01 05:06:37'),
(213, 'Sapna', 'Kumavat', 'kumavatsapna21@gmail.com', 0, '$2y$10$H6a0oTLJHRgx.9ZDqx6pmOdxE8Pd3AKfZBvnfxgENiXwNdPhoXFlu', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:34', '2020-06-01 05:06:34'),
(214, 'Shubham', 'Kashyap', 'kashyapshubham194@gmail.com', 0, '$2y$10$RA5QoNIeYLL7deFkeQqAve00mN/a2y/rGUBsg/rXjWgsC7.FYhTpS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:36', '2020-06-01 05:06:36'),
(215, 'Nidhi', 'Bokade', 'nidhibokade241294@gmail.com', 0, '$2y$10$wvUYzAThY8K25wAhgwG6Bu2jy8SPsmoyh1PYvyas0OLrB67h5SMKy', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:43', '2020-06-01 05:06:43'),
(216, 'Nitin', 'Maheshwari', 'nitin74899@gmail.com', 0, '$2y$10$hOuA4j57o7IqcigNxA3veuL7KEwmpmi.RAfLoPvhTNJDwhCIrBlsq', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:45', '2020-06-01 05:06:45'),
(217, 'Sonam', 'Mishra', 'Sonammishra4596@gmail.com', 0, '$2y$10$OczywmXhR4aelgQad6WNR.8u1oKEypehVwAhQyHtn5Ua3A/y/T7jm', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:35', '2020-06-01 05:06:35'),
(218, 'Soumya', 'Sharma', 'soumyarajsharma96@gmail.com', 0, '$2y$10$pWBEkNPpQbOXu8o7/2aKWO.vi5802tDpG.HmPmBAajUMVVTruE2CG', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:55', '2020-06-01 05:06:55'),
(219, 'Ashish', 'Harikhedel', 'ashish.harinkhede1@gmail.com', 0, '$2y$10$BUBkuDWNpRiN/JV4EAqEBuCAfLzYd1Hppr2gIhMrqWhpgukdcLJGm', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:45', '2020-06-01 05:06:45'),
(220, 'Saket', 'Mudgel', 'mudgalsaket1@gmail.com', 0, '$2y$10$gjgrL4VxyL5e2kKTYw29yeRzULFYf8wExq1/zheY6tFBE0Nlt0ymW', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:52', '2020-06-01 05:06:52'),
(221, 'Rhythm', 'Sharma', 'thebeautyroom139@gmail.com', 0, '$2y$10$hbBn3sWEXT3afF20vSGyU.Ugw5wq2jFfQdio57suHEoeYPH/74qDO', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:08', '2020-06-01 05:06:08'),
(222, 'Rahul', 'Raj', 'rahulraj199624@gmail.com ', 0, '$2y$10$4dp2u0rJfGGTpelBuqE.seLZ45clA/z9bhYLvaVCwunB4LvT568Hy', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:00', '2020-06-01 05:06:00'),
(223, 'Abhijeet', 'Bhawsar', 'abhijeet.bhawsar11@gmail.com', 0, '$2y$10$jZ1rHrVNEO0LVGehV.AQI.CtwT/GEwVaDT9uKG.h1tjxk/bfXi2c.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:41', '2020-06-01 05:06:41'),
(224, 'Bhoopendra', 'Chaurasia', 'bchaurasia97@gmail.com', 0, '$2y$10$wgCcnfLuonewQe5x0v.PB.Pgxxz2aMBNJtIhv5sdmOkC/o0H4B6AS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:55', '2020-06-01 05:06:55'),
(225, 'Amit', 'Pal', 'amitpal.knp01@gmail.com,amitpal.knp@gmail.com', 0, '$2y$10$T2VZAYtL8yCPz2l1yBAld.OwLLaGBY91Q7OkZhhYhlPGdr2T9qPFa', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:13', '2020-06-01 05:06:13'),
(226, 'Chanchal', 'Shrivastava', 'carrerchanchal@gmail.com', 0, '$2y$10$z3gg2UMD0xYDS0fwNHVli.sb/RruINFMhYGMo3msx44SDvDsnHo32', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:11', '2020-06-01 05:06:11'),
(227, 'Vijay', 'Pancholi', 'vijay.pancholi2626@gmail.com', 0, '$2y$10$f1S7CbvDm5iBf1lUF57zE.Nu8iIppr2DWSmhLqKVEDrTmjdHEHYB.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-01 05:06:58', '2020-06-01 05:06:58'),
(230, 'Abhiram', 'Korde', 'korde_abhiram@outlook.com', 0, '$2y$10$.cAvEjjrioJPrvX45fCjPuC39acZ.3CyVhXy8LVXTdZDCR5WG2SwO', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-08 03:06:36', '2020-06-08 03:06:36'),
(228, 'Satish', 'Miholiya', 'satishmiholiya7_gxh@indeedemail.com', 1, '$2y$10$68IGjGGOfPLlebZo39HsHuY2c8kbh7ann8GK.NjpNqGVhvw2NPBM6', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-02 09:06:18', '2020-06-02 09:06:18'),
(234, 'Samarth', 'Billore', 'samarthbillore101@gmail.com', 0, '$2y$10$z4r/nU1E35OZ/kUK0eBfQ.h7.Pjorr8LDbm91ResCD.ov0ngO/v6C', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-09 12:06:31', '2020-06-09 12:06:31'),
(235, 'Aakash', 'Sahu', 'Aakashsahu8966@gmail.com', 0, '$2y$10$5qfDn/rKQC/ZYGD/D/.i7ezkNU/eL2Nwit77.U6qfD7CZjS7IUjUO', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-09 12:06:52', '2020-06-09 12:06:52'),
(236, 'Sachin', 'Porwal', 'porwalsachin2510@gmail.com', 0, '$2y$10$e53.F0kHySACLy/R1FdMSu2hLHO9k56ed7rrksOcz56ZY9EBitw6G', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-09 03:06:57', '2020-06-09 03:06:57'),
(237, 'Shubham', 'Agrawal', 'ShubhamA896@gmail.com', 0, '$2y$10$S802m17ZWEBOxZ16IK4LC.n.F596BoFKSwpc2YzVvLFsus5IjY3ee', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-12 02:06:05', '2020-06-12 02:06:05'),
(238, 'Krishna', 'Shukla', 'kishanshukla12@gmail.com', 0, '$2y$10$CGfEa41jjTPYuz6UE4/9Hu3.C7UVKLhcdRoGcYNXGUb/o8umpmd6O', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-12 02:06:55', '2020-06-12 02:06:55'),
(239, 'Eti', 'Khandelwal', 'khandelwaleti8989@gmail.com', 0, '$2y$10$/yJGgrIzJQIo8CsF5VfSq..RwLu4Z7kLF1lb4HqUMKvHDC8XSlBmO', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-12 04:06:25', '2020-06-12 04:06:25'),
(240, 'Yatendra', 'Gupta', 'yatendragupta93@gmail.com', 0, '$2y$10$lh5v5MX7zNJf24cHLnhFdOGpETV1HOBTTDvQPIf987My37JCuo.dm', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-12 04:06:42', '2020-06-12 04:06:42'),
(241, 'Mayuresh', 'Jadhav', 'mayureshjadhav90@yahoo.com', 0, '$2y$10$D7PwWxxVmwvY/2t0sG6VHOWJBCvgiRCLXtz.bLwQyQOt1l00l2XhK', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-12 04:06:11', '2020-06-12 04:06:11'),
(242, 'Rajendra', 'Rajput', 'RajputRJ889@gmail.com                             ', 0, '$2y$10$LZOghuN/LlD93TsEznZYEuk/daqD2dsOT5tflyrkWpuFZp1850mgC', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-16 03:06:41', '2020-06-16 03:06:41'),
(243, 'Umesh', 'Patidar', 'patidarumesh112@gmail.com                      ', 0, '$2y$10$duYq16uS/Wtjf.G18LUVC.SEyLbva94svwV7TRx.eijxNygg7X3dq', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-16 04:06:21', '2020-06-16 04:06:21'),
(244, 'Parth', 'Agrawal', 'parth.agrawal.1995@gmail.com', 0, '$2y$10$Zb6AdBvug4UWU3kTCHX9h.S6TT7cbfqV.sqb7QJ.uWj5PSG2TCtRS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-16 05:06:35', '2020-06-16 05:06:35'),
(245, 'Nilesh', 'Vishwakarma', 'nileshvishwakarma022@gmail.com', 0, '$2y$10$U6kdkvYWBp58nVyJG8Q.auCV9LDixlcdm.fidLtdk4x0t465bCy3i', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-16 05:06:36', '2020-06-16 05:06:36'),
(246, 'Keshav', 'Godani', 'keshavgodani10@gmail.com', 0, '$2y$10$g4JQQ6RoMxyGrWvkoptaUuyJF9zwjc6Cz2Yt8RdzOZ/9aCiqR8PQe', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-16 05:06:41', '2020-06-16 05:06:41'),
(247, 'Gourav', 'Solanki', 'gouravkrsolanki@gmail.com', 0, '$2y$10$t2w2FNGTGSvYSis6r/1raO8MrYI9RmAre1LpYF7hlTqb2l97VA/MW', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-16 05:06:44', '2020-06-16 05:06:44'),
(248, 'Deeksha', 'Gour', 'deekshagour021@gmail.com', 0, '$2y$10$oWv/r..rOwjcwoBrN5rmn.CbkpipttMXXM832OqtM2GI9pAjs4TAq', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-16 06:06:00', '2020-06-16 06:06:00'),
(249, 'Kirti', 'Lakkadwal', 'kirti.lakkadwala99@gmail.com', 0, '$2y$10$YEJdvCbnyL2wXGOD68cPjO0m9PWV8N2BMFXqbOculpHUh0C/mRU0.', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-16 06:06:04', '2020-06-16 06:06:04'),
(250, 'Anish', 'Khan', 'Anishkhan786946@gmail.com ', 0, '$2y$10$vYS3jNQxxoR2rXzrfpouBu/zkLaWDaBscz8Qz6V/0bL/G0js2OkFq', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-16 06:06:26', '2020-06-16 06:06:26'),
(251, 'Rajendra', 'Taidala', 'Rajendra.taidala10@gmail.com', 0, '$2y$10$QbSHkRfblVYao50dEKrqN.SI5OEiUOlTPLoEFkP.wDnpA8hpKmhTK', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-16 06:06:16', '2020-06-16 06:06:16'),
(252, 'Priya', 'Saxena', 'priyasaxena29official@g mail.com', 0, '$2y$10$7mJCcqtcZEfFMcltwBpOhuB/z4xeTN7cbYzG6v596UON2ci5.q.KG', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-16 06:06:36', '2020-06-16 06:06:36'),
(253, 'Shreya', 'Singh', 'shreyasingh0448@gmail.com ', 0, '$2y$10$futYc/IM/fWdZEBCYKMnf.NLufOZ4CUC/L8Tr.uvvi/X1IF0eabb2', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-17 06:06:30', '2020-06-17 06:06:30'),
(254, 'Ravindra', 'Joshi', 'rj.ravi111@gmail.com', 0, '$2y$10$bygBPe0Ht6KfP5oWMej1/u106miFZznQSmc2rvE7h91BIm3jT3rpW', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-22 03:06:55', '2020-06-22 03:06:55'),
(255, 'Komal', 'Dayle', 'dayle.kom12@gmail.com', 0, '$2y$10$wN3rTGY0PKQTgELdn3lpKOMYeOITseRAqmob9G0QBSlTanoSPVnEm', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-22 03:06:18', '2020-06-22 03:06:18'),
(256, 'Deepak', 'Sarathe', 'deepaksarathe48@gmail.com', 0, '$2y$10$Ze4K/5KkpEqDwKZaJYSf/OrRHYJtr8HhypY1nVj/k5aY5TiRAdJY6', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-22 03:06:09', '2020-06-22 03:06:09'),
(257, 'Shafat', 'tigala', 'shafattigala91@gmail.com', 0, '$2y$10$qmwRncJNd1iBF480i/LUbeOBylVLrnlmcuLPUKeUK1aXq1lryeEoW', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-27 07:06:14', '2020-06-27 07:06:14'),
(258, 'Nishant', 'Verma', 'nishantverma324@gmail.com', 0, '$2y$10$pl228WhHcMyns2t4Z00vxOJwbQonC4EZwslMVW.BmvxgwXnBwgTKG', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-28 06:06:34', '2020-06-28 06:06:34'),
(259, 'Sanjay', 'Khan', 'Khanshaizy043@gmail.com', 0, '$2y$10$FdCyE.AsSBV0d4q2oeSPle36arGySCCYAVYzTXFksl6BL0kMfDvEC', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-29 02:06:10', '2020-06-29 02:06:10'),
(260, 'Sanjay', 'Khan', 'Arhankhan20062000@gmail.com', 0, '$2y$10$e3WqxUqsB0XNspTvAlncXeh.wRRGM8KaxmCz8pbCgQLVBkXdQD7/K', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-29 02:06:12', '2020-06-29 02:06:12'),
(261, 'Arhan', 'Khan', 'Sanjaykhan956060@gmail.com', 0, '$2y$10$N6FloLeHVPYHcBs.UFhHEO6ZZk4vVEWgeLEJBntQo0YgsShWk0f3O', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, 0, '', '', '', '', '', '2020-06-29 02:06:43', '2020-06-29 02:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `xx_users_profile_picture`
--

CREATE TABLE `xx_users_profile_picture` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_users_profile_picture`
--

INSERT INTO `xx_users_profile_picture` (`id`, `url`, `user_id`, `type`, `created_at`) VALUES
(2, '20200424075609.png', 26, 'user', '2020-04-24 11:56:09'),
(3, '20200424055607.png', 28, 'user', '2020-04-24 12:28:28'),
(4, '20200424075347.png', 2, 'emp', '2020-04-24 11:53:47'),
(5, '20200427022123.png', 27, 'user', '2020-04-27 06:21:24'),
(6, '20200430025127.png', 1, 'emp', '2020-04-30 06:51:28'),
(7, '20200430015353.png', 4, 'emp', '2020-04-30 05:53:53'),
(8, '20200429033303.png', 7, 'emp', '2020-04-29 07:33:03'),
(9, '20200429040204.png', 3, 'emp', '2020-04-29 08:02:04'),
(10, '20200429101009.png', 14, 'emp', '2020-04-29 14:10:09'),
(11, '20200501043959.png', 6, 'emp', '2020-05-01 08:39:59'),
(12, '20200430021915.png', 16, 'emp', '2020-04-30 06:19:15'),
(13, '', 18, 'emp', '2020-04-30 08:21:42'),
(14, '20200430073234.png', 19, 'emp', '2020-04-30 11:32:34'),
(15, '20200430042508.png', 34, 'user', '2020-04-30 08:25:08'),
(16, '20200430100159.png', 21, 'emp', '2020-04-30 14:01:59'),
(17, '20200430084800.png', 34, 'user', '2020-04-30 12:48:01'),
(18, '20200430084816.png', 34, 'user', '2020-04-30 12:48:16'),
(19, '20200430084849.png', 34, 'user', '2020-04-30 12:48:49'),
(20, '20200430085100.png', 34, 'user', '2020-04-30 12:51:00'),
(21, '20200430093829.png', 34, 'user', '2020-04-30 13:38:29'),
(22, '20200501040348.png', 23, 'emp', '2020-05-01 08:03:48'),
(23, '20200501043809.png', 34, 'user', '2020-05-01 08:38:09'),
(24, '20200501043820.png', 34, 'user', '2020-05-01 08:38:20'),
(25, '20200501043925.png', 34, 'user', '2020-05-01 08:39:25'),
(26, '20200501044249.png', 34, 'user', '2020-05-01 08:42:49'),
(27, '20200501044809.png', 35, 'user', '2020-05-01 08:48:09'),
(28, '20200501045057.png', 35, 'user', '2020-05-01 08:50:58'),
(29, '20200501045237.png', 35, 'user', '2020-05-01 08:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `xx_visa_status`
--

CREATE TABLE `xx_visa_status` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xx_admin`
--
ALTER TABLE `xx_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_applied_coupon`
--
ALTER TABLE `xx_applied_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_categories`
--
ALTER TABLE `xx_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_cities`
--
ALTER TABLE `xx_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_companies`
--
ALTER TABLE `xx_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_company_info`
--
ALTER TABLE `xx_company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_contact_us`
--
ALTER TABLE `xx_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_countries`
--
ALTER TABLE `xx_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_coupon`
--
ALTER TABLE `xx_coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `xx_cv_shortlisted`
--
ALTER TABLE `xx_cv_shortlisted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_education`
--
ALTER TABLE `xx_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_employers`
--
ALTER TABLE `xx_employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_expected_salary`
--
ALTER TABLE `xx_expected_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_feedback`
--
ALTER TABLE `xx_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_industries`
--
ALTER TABLE `xx_industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_job_category`
--
ALTER TABLE `xx_job_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `xx_job_post`
--
ALTER TABLE `xx_job_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_prohibited_keywords`
--
ALTER TABLE `xx_prohibited_keywords`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `xx_resume`
--
ALTER TABLE `xx_resume`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `xx_resume_price`
--
ALTER TABLE `xx_resume_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_seeker_applied_job`
--
ALTER TABLE `xx_seeker_applied_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_seeker_education`
--
ALTER TABLE `xx_seeker_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_seeker_experience`
--
ALTER TABLE `xx_seeker_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_seeker_languages`
--
ALTER TABLE `xx_seeker_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_seeker_skill`
--
ALTER TABLE `xx_seeker_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_seeker_summary`
--
ALTER TABLE `xx_seeker_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_subscribe`
--
ALTER TABLE `xx_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_transaction`
--
ALTER TABLE `xx_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_urgency`
--
ALTER TABLE `xx_urgency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_users`
--
ALTER TABLE `xx_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_users_profile_picture`
--
ALTER TABLE `xx_users_profile_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xx_visa_status`
--
ALTER TABLE `xx_visa_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xx_admin`
--
ALTER TABLE `xx_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `xx_applied_coupon`
--
ALTER TABLE `xx_applied_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `xx_categories`
--
ALTER TABLE `xx_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `xx_cities`
--
ALTER TABLE `xx_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `xx_companies`
--
ALTER TABLE `xx_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `xx_company_info`
--
ALTER TABLE `xx_company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xx_contact_us`
--
ALTER TABLE `xx_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;

--
-- AUTO_INCREMENT for table `xx_countries`
--
ALTER TABLE `xx_countries`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `xx_coupon`
--
ALTER TABLE `xx_coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `xx_cv_shortlisted`
--
ALTER TABLE `xx_cv_shortlisted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `xx_education`
--
ALTER TABLE `xx_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `xx_employers`
--
ALTER TABLE `xx_employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `xx_expected_salary`
--
ALTER TABLE `xx_expected_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xx_feedback`
--
ALTER TABLE `xx_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `xx_industries`
--
ALTER TABLE `xx_industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `xx_job_category`
--
ALTER TABLE `xx_job_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `xx_job_post`
--
ALTER TABLE `xx_job_post`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `xx_prohibited_keywords`
--
ALTER TABLE `xx_prohibited_keywords`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `xx_resume`
--
ALTER TABLE `xx_resume`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `xx_resume_price`
--
ALTER TABLE `xx_resume_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `xx_seeker_applied_job`
--
ALTER TABLE `xx_seeker_applied_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `xx_seeker_education`
--
ALTER TABLE `xx_seeker_education`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xx_seeker_experience`
--
ALTER TABLE `xx_seeker_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xx_seeker_languages`
--
ALTER TABLE `xx_seeker_languages`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xx_seeker_skill`
--
ALTER TABLE `xx_seeker_skill`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xx_seeker_summary`
--
ALTER TABLE `xx_seeker_summary`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xx_subscribe`
--
ALTER TABLE `xx_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `xx_transaction`
--
ALTER TABLE `xx_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `xx_urgency`
--
ALTER TABLE `xx_urgency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xx_users`
--
ALTER TABLE `xx_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `xx_users_profile_picture`
--
ALTER TABLE `xx_users_profile_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `xx_visa_status`
--
ALTER TABLE `xx_visa_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
