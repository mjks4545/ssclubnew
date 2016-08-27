-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2016 at 03:37 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sstechn1_fiver`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(18) NOT NULL,
  `cno` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `coments` varchar(300) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pwd`, `cno`, `address`, `coments`, `status`, `created_at`) VALUES
(1, 'admin', 'admin@ssclub.com', 'admin', '00923429818632', 'GHQ Peshawar', '1st Admin', 1, '06/09/2016 03:43 pm');

-- --------------------------------------------------------

--
-- Table structure for table `billinfo`
--

CREATE TABLE `billinfo` (
  `b_id` int(11) NOT NULL,
  `b_details` varchar(50) NOT NULL,
  `b_quantity` varchar(50) NOT NULL,
  `b_rates` varchar(50) NOT NULL,
  `b_amount` varchar(50) NOT NULL,
  `b_rectification` varchar(50) NOT NULL,
  `b_grandtotal` varchar(50) NOT NULL,
  `c_id` varchar(50) NOT NULL,
  `b_status` varchar(50) NOT NULL,
  `per_id` int(11) NOT NULL,
  `bill_date` varchar(50) NOT NULL,
  `bill_pay_status` varchar(50) NOT NULL,
  `bill_tax` varchar(120) NOT NULL,
  `bill_extra` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billinfo`
--

INSERT INTO `billinfo` (`b_id`, `b_details`, `b_quantity`, `b_rates`, `b_amount`, `b_rectification`, `b_grandtotal`, `c_id`, `b_status`, `per_id`, `bill_date`, `bill_pay_status`, `bill_tax`, `bill_extra`) VALUES
(50, 'de', '0', '0', '0', '2000', '2000', '', '1', 586, '2016-08-24', '1', '3%', '5%'),
(51, 'de', '0', '0', '0', '300', '300', '72', '1', 586, '2016-08-24', '0', '5%', '5%');

-- --------------------------------------------------------

--
-- Table structure for table `booths`
--

CREATE TABLE `booths` (
  `bo_id` int(11) NOT NULL,
  `bo_no` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `no_persons` varchar(244) NOT NULL,
  `range_charges` varchar(244) NOT NULL,
  `remarks` varchar(244) NOT NULL,
  `c_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booths`
--

INSERT INTO `booths` (`bo_id`, `bo_no`, `status`, `no_persons`, `range_charges`, `remarks`, `c_id`, `per_id`) VALUES
(1, '1', 0, '5', '500', 'remarksss', 69, 374),
(2, '2', 1, '3', '600', 'remarksss', 73, 586),
(3, '3', 0, '3', '600', 'remarksss', 69, 374),
(4, '4', 0, '5', '500', 'remarksss', 69, 374),
(5, '5', 0, '3', '600', 'remarksss', 70, 379),
(6, '6', 0, '3', '600', 'remarksss', 54, 122),
(7, '7', 0, '3', '600', 'remarksss', 60, 343),
(8, '8', 0, '3', '600', 'remarksss', 61, 347),
(9, '9', 0, '3', '600', 'remarksss', 59, 339),
(10, '10', 0, '3', '600', 'remarksss', 0, 0),
(11, '11', 0, '3', '600', 'remarksss', 0, 0),
(12, '12', 0, '3', '600', 'remarksss', 55, 122),
(13, '13', 0, '3', '500', 'remarksss', 69, 374),
(14, '14', 0, '3', '600', 'remarksss', 0, 0),
(15, '15', 0, '3', '600', 'remarksss', 72, 586);

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `c_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `c_weapon` varchar(20) NOT NULL,
  `c_weapon_name` varchar(20) NOT NULL,
  `c_arrival_date` varchar(20) NOT NULL,
  `c_arrival_time` varchar(20) NOT NULL,
  `c_departure_date` varchar(50) NOT NULL,
  `c_departure_time` varchar(50) NOT NULL,
  `c_time_out` varchar(20) NOT NULL,
  `c_fire` varchar(20) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `c_status` tinyint(1) NOT NULL,
  `c_profession` varchar(50) NOT NULL,
  `boot_no` varchar(255) NOT NULL,
  `no_persons` varchar(255) NOT NULL,
  `range_charge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='members will check in in this table';

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`c_id`, `m_id`, `c_weapon`, `c_weapon_name`, `c_arrival_date`, `c_arrival_time`, `c_departure_date`, `c_departure_time`, `c_time_out`, `c_fire`, `remarks`, `c_status`, `c_profession`, `boot_no`, `no_persons`, `range_charge`) VALUES
(72, 134, 'self', '9mm', '2016-08-17', '01:00', '2016-08-24', '13:00', '00:45', '311', 'remarks', 0, 'Buisnessman', '15', '123', '500'),
(73, 134, 'self', '9mm', '2016-08-11', '12:30', '2016-08-26', '01:30', '', '312', 'm,n, ', 1, 'dqwdqwdwq', '2`131', '23213', '23123');

-- --------------------------------------------------------

--
-- Table structure for table `emergencydetails`
--

CREATE TABLE `emergencydetails` (
  `e_id` int(11) NOT NULL,
  `Per_id` int(11) NOT NULL,
  `e_services` varchar(50) NOT NULL,
  `m_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergencydetails`
--

INSERT INTO `emergencydetails` (`e_id`, `Per_id`, `e_services`, `m_id`) VALUES
(47, 587, 'brother', '134');

-- --------------------------------------------------------

--
-- Table structure for table `guest_checkin`
--

CREATE TABLE `guest_checkin` (
  `g_id` int(11) NOT NULL,
  `Per_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `g_status` int(1) NOT NULL,
  `g_date` varchar(20) NOT NULL,
  `g_nic_1` varchar(90) NOT NULL,
  `g_nic_2` varchar(90) NOT NULL,
  `g_profile_img` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_checkin`
--

INSERT INTO `guest_checkin` (`g_id`, `Per_id`, `c_id`, `g_status`, `g_date`, `g_nic_1`, `g_nic_2`, `g_profile_img`) VALUES
(121, 592, 72, 1, '2016-08-24', 'gnic1.jpg', 'gnic3.jpg', 'g1.jpg'),
(122, 593, 72, 1, '2016-08-24', 'ssss.png', 'sssxx.png', 'img.png'),
(123, 594, 72, 1, '2016-08-24', 'aaa.jpg', 'nic3.jpg', 'pic.jpg'),
(124, 597, 73, 1, '2016-08-17', '14063864_1769529779954811_6718480932559379678_n.jpg', '14063864_1769529779954811_6718480932559379678_n.jpg', '14063864_1769529779954811_6718480932559379678_n.jpg'),
(125, 598, 73, 1, '2016-08-17', '14063864_1769529779954811_6718480932559379678_n.jpg', '14063864_1769529779954811_6718480932559379678_n.jpg', '14063864_1769529779954811_6718480932559379678_n.jpg'),
(126, 599, 73, 1, '2016-08-17', '14063864_1769529779954811_6718480932559379678_n.jpg', '14063864_1769529779954811_6718480932559379678_n.jpg', '14063864_1769529779954811_6718480932559379678_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `m_id` int(11) NOT NULL,
  `Per_id` int(11) NOT NULL,
  `m_date_of_birth` varchar(15) NOT NULL,
  `m_service` varchar(20) NOT NULL,
  `m_type` varchar(20) NOT NULL,
  `m_image` varchar(50) NOT NULL,
  `m_card_no` varchar(15) NOT NULL,
  `m_valid_from` varchar(15) NOT NULL,
  `m_valid_to` varchar(15) NOT NULL,
  `m_refrance_name` varchar(20) NOT NULL,
  `m_w_type` varchar(50) NOT NULL,
  `m_f_shadule` varchar(50) NOT NULL,
  `m_payment` varchar(50) NOT NULL,
  `m_education` varchar(50) NOT NULL,
  `m_employment` varchar(50) NOT NULL,
  `m_no_w` varchar(50) NOT NULL,
  `m_conviction` varchar(50) NOT NULL,
  `m_status` int(11) NOT NULL,
  `m_reason` varchar(444) NOT NULL,
  `m_date` varchar(111) NOT NULL,
  `m_nic_image1` varchar(90) NOT NULL,
  `m_nic_image2` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='members data only';

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`m_id`, `Per_id`, `m_date_of_birth`, `m_service`, `m_type`, `m_image`, `m_card_no`, `m_valid_from`, `m_valid_to`, `m_refrance_name`, `m_w_type`, `m_f_shadule`, `m_payment`, `m_education`, `m_employment`, `m_no_w`, `m_conviction`, `m_status`, `m_reason`, `m_date`, `m_nic_image1`, `m_nic_image2`) VALUES
(134, 586, '2016-08-24', 'Brother', 'Gold', 'pic.jpg', '4444', '2016-08-24', '2016-08-31', 'Khan', '30 board pistol', 'Select Fee Schedule', '4000', 'MSC', 'Buisnessman', '344', 'asd', 1, '', '2016-08-25', '2.png', '3.jpg'),
(135, 601, '', '', 'Gold', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2016-08-15', '', ''),
(136, 602, '', '', 'Gold', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2016-08-02', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `membership_renewal`
--

CREATE TABLE `membership_renewal` (
  `r_id` int(11) NOT NULL,
  `r_payment` varchar(20) NOT NULL,
  `r_date` varchar(20) NOT NULL,
  `r_valid_to` varchar(20) NOT NULL,
  `r_valid_from` varchar(20) NOT NULL,
  `r_status` tinyint(1) NOT NULL,
  `m_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nominated_guests`
--

CREATE TABLE `nominated_guests` (
  `n_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL DEFAULT '0',
  `Per_id` int(11) NOT NULL DEFAULT '0',
  `n_date` int(11) NOT NULL DEFAULT '0',
  `n_notes` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here are some nominated guests of the members';

--
-- Dumping data for table `nominated_guests`
--

INSERT INTO `nominated_guests` (`n_id`, `m_id`, `Per_id`, `n_date`, `n_notes`) VALUES
(129, 134, 589, 0, '0'),
(130, 134, 590, 0, '0'),
(131, 134, 591, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `Per_id` int(11) NOT NULL,
  `Per_name` varchar(50) NOT NULL,
  `Per_f_name` varchar(50) NOT NULL,
  `Per_number` varchar(15) NOT NULL,
  `Per_cnic` varchar(15) NOT NULL,
  `Per_address` varchar(50) NOT NULL,
  `Per_license_no` varchar(15) NOT NULL,
  `Per_weapon_no` varchar(15) NOT NULL,
  `Per_experience` varchar(15) NOT NULL,
  `Per_date` varchar(15) NOT NULL,
  `Per_type` varchar(55) DEFAULT NULL,
  `Per_notes` varchar(200) DEFAULT NULL,
  `purchase_from` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='person table here we will get all of the detail realated to human being....';

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Per_id`, `Per_name`, `Per_f_name`, `Per_number`, `Per_cnic`, `Per_address`, `Per_license_no`, `Per_weapon_no`, `Per_experience`, `Per_date`, `Per_type`, `Per_notes`, `purchase_from`) VALUES
(586, 'shahid', 'khan 1', '01234567890', '1234567891231', 'peshawar s', '33443', '9mm', 'yes ', '2016-08-25', 'M', '', ''),
(587, 'emergency name', '', '123123', '123123', 'Pesahawar', '', '', '', '2016-08-25', 'E', NULL, ''),
(588, 'Khan', '', '3333333333333', '33333333', 'Peshawar', '', '', '', '2016-08-25', 'R', NULL, ''),
(589, 'junaid', '', '12333333333333', '123123', 'New Peshawar ', '', '', '', '2016-08-25', 'N', NULL, ''),
(590, 'hamayun', '', '33333333333', '33333333', 'Peshawar', '', '', '', '2016-08-25', 'N', NULL, ''),
(591, 'Sher Muhammad', '', '34343434', '4444444444', 'peshawar', '', '', '', '2016-08-25', 'N', NULL, ''),
(592, 'guest_1', '', '123123', '1231231', 'New Peshawar s', '', '', '', '2016-08-24', 'C_G', NULL, ''),
(593, 'guest_2', '', '123123312', '12331233', 'Peshawar', '', '', '', '', '2016-08-24', NULL, ''),
(594, 'guest_3', '', '34343434', '4444444444', 'peshawar', '', '', '', '', '2016-08-24', NULL, ''),
(595, 'khan arms', '', '1234567', '123456789', 'peshawar', '1234', '', '', '2016-07-24', 'p', NULL, 'Dealer'),
(596, 'sdf', '', '', '', '', '', '', '', '', 'M', '', ''),
(597, 'kjqwefj', '', '312312312312312', '3131231212331', 'qwhfgwefg', '', '', '', '2016-08-17', 'C_G', NULL, ''),
(598, 'sbdwhfve', '', '724672845127645', '2133333323123', 'asahdgfhwq', '', '', '', '', '2016-08-17', NULL, ''),
(599, 'jewf4kjf', '', '248623784623784', '1312312312344', 'casdvcadbavcd', '', '', '', '', '2016-08-17', NULL, ''),
(600, 'asdwdf', '', '', '', '', '', '', '', '', 'M', '', ''),
(601, 'dcasfd', '', '246254127645415', '7823452178421', 'fejhwfgwy', '12131', '', '', '2016-08-15', 's', NULL, ''),
(602, 'fdfd', '', '54455646646464', '6546456456454', 'gdgfdfgdf', 'fdfsf', '', '', '2016-08-02', 's', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(10) UNSIGNED NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_type` varchar(50) NOT NULL,
  `p_model` varchar(50) NOT NULL,
  `p_code` varchar(50) NOT NULL,
  `p_status` tinyint(1) UNSIGNED NOT NULL,
  `p_quantity` varchar(12) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `p_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this is product table...';

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_type`, `p_model`, `p_code`, `p_status`, `p_quantity`, `notes`, `p_date`) VALUES
(15, 'Pistol', '10mm', '2016', '1222', 0, '1', 'This is the product of accessory', '2016-08-24'),
(16, 'Pistol', 'aGDHFQWD', 'ASDGFQWTY', '1', 0, '', '1', '2016-08-24'),
(17, 'Ammunition', '9 MM BULLET', 'S & B', '2', 0, '', '1', '2016-08-24'),
(18, 'Ammunition', '9 MM BULLET', 'NATO', '3', 0, '', 'A', '2016-08-24'),
(19, 'Ammunition', '9 MM BULLET', 'AMERICAN EGAL', '4', 0, '', '1', '2016-08-24'),
(20, 'Ammunition', 'SHORT GUN', 'SHAHEEN 4 NO', '4', 0, '', '1', '2016-08-24'),
(21, 'Ammunition', 'SHORT GUN', 'SHAHEEN 6 NO', '6', 0, '', '1', '2016-08-24'),
(22, 'Ammunition', 'SHORT GUN', 'SHAHEEN 7 NO', '7', 0, '', '1', '2016-08-24'),
(23, 'Ammunition', 'SHORT GUN', 'SHANEEN 8 NO', '8', 0, '', '1', '2016-08-24'),
(24, 'Ammunition', 'SHORT GUN', 'SHAHEEN SG', 'SG', 0, '', '1', '2016-08-24'),
(25, 'Ammunition', '30 BORE', 'CHINEES', '30C', 0, '', '1', '2016-08-24'),
(26, 'Ammunition', '9 MM BULLET', 'AMERICAN EGAL', '9A', 0, '', '1', '2016-08-24'),
(27, 'Ammunition', '9 MM BULLET', 'CHINEES', '9C', 0, '', '1', '2016-08-24'),
(28, 'Ammunition', '9 MM BULLET', 'S & B', '9S', 0, '', '1', '2016-08-24'),
(29, 'Ammunition', '9 MM BULLET', 'NATO', '9N', 0, '', '1', '2016-08-24'),
(30, 'Ammunition', 'wr', 'r23', 'gegaer', 0, '', '', '2016-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `par_id` int(11) NOT NULL,
  `p_id` int(10) UNSIGNED NOT NULL,
  `par_weapon_no` varchar(15) NOT NULL,
  `Per_id` int(10) UNSIGNED NOT NULL,
  `p_quantity` varchar(15) NOT NULL,
  `par_price` varchar(15) NOT NULL,
  `sale_price` varchar(15) NOT NULL,
  `par_date` varchar(15) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this is our purchase table';

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`par_id`, `p_id`, `par_weapon_no`, `Per_id`, `p_quantity`, `par_price`, `sale_price`, `par_date`, `remarks`) VALUES
(151, 15, '', 595, '1', '3000', '4000', '2016-07-24', 'registred');

-- --------------------------------------------------------

--
-- Table structure for table `reference_person`
--

CREATE TABLE `reference_person` (
  `ref_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `ref_service` varchar(200) NOT NULL,
  `m_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference_person`
--

INSERT INTO `reference_person` (`ref_id`, `per_id`, `ref_service`, `m_id`) VALUES
(47, 588, 'uncle', '134');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `s_id` int(11) NOT NULL,
  `Per_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `s_weapon_no` varchar(50) NOT NULL,
  `s_quantity` varchar(15) NOT NULL,
  `s_price` varchar(15) NOT NULL,
  `p_price` varchar(15) NOT NULL,
  `s_total_price` varchar(15) NOT NULL,
  `b_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `s_date` varchar(15) NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `trans_status` int(9) NOT NULL,
  `par_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `sale_save_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='sales table which will control all of the sellings';

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`s_id`, `Per_id`, `p_id`, `s_weapon_no`, `s_quantity`, `s_price`, `p_price`, `s_total_price`, `b_id`, `status`, `s_date`, `notes`, `trans_status`, `par_id`, `c_id`, `sale_save_status`) VALUES
(189, 586, 15, '', '100', '4000', '3000', '400000', 50, 1, '2016-08-24', 'de', 0, 151, 0, '1'),
(190, 586, 15, '', '20', '4000', '3000', '80000', 51, 1, '2016-08-24', 'details', 0, 151, 72, '1'),
(191, 586, 15, '', '100', '4000', '3000', '400000', 0, 1, '2016-08-23', 'sdaasd', 1, 151, 0, ''),
(192, 586, 15, '', '100', '4000', '3000', '400000', 0, 1, '2016-08-23', 'sfwef', 1, 151, 0, ''),
(193, 586, 15, '', '100', '4000', '3000', '400000', 0, 1, '2016-08-02', 'wefqwfq3', 1, 151, 0, ''),
(194, 586, 15, '', '20', '4000', '3000', '80000', 0, 1, '2016-08-23', 'asfqw', 1, 151, 0, ''),
(195, 601, 15, '', '20', '4000', '3000', '80000', 0, 1, '2016-08-15', 'fwefwe', 1, 151, 0, ''),
(196, 586, 15, '', '10', '4000', '3000', '40000', 0, 1, '2016-08-23', 'dfsds', 1, 151, 0, ''),
(197, 586, 15, '', '3', '50000', '', '150000', 0, 1, '2016-08-09', 'fdfgsgr', 1, 151, 0, ''),
(198, 586, 15, '', '20', '4000', '3000', '80000', 0, 1, '2016-08-27', '', 1, 151, 0, ''),
(199, 586, 15, '', '1', '4000', '3000', '4000', 0, 1, '2016-08-17', 'dd', 1, 151, 0, ''),
(200, 586, 15, '', '1', '4000', '3000', '4000', 0, 1, '2016-09-09', 'dddd', 1, 151, 73, ''),
(201, 586, 15, '', '3', '4000', '3000', '12000', 0, 1, '2016-08-08', 'sesese', 1, 151, 0, ''),
(202, 586, 15, '', '1', '4000', '3000', '4000', 0, 1, '2016-08-08', 'fxdgd', 1, 151, 0, ''),
(203, 602, 15, '', '0', '4000', '3000', '0', 0, 1, '2016-08-02', '54564', 1, 151, 0, ''),
(204, 586, 15, '', '0', '4000', '3000', '0', 0, 1, '2016-08-17', 'asdd', 1, 151, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billinfo`
--
ALTER TABLE `billinfo`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `booths`
--
ALTER TABLE `booths`
  ADD PRIMARY KEY (`bo_id`);

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `emergencydetails`
--
ALTER TABLE `emergencydetails`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `guest_checkin`
--
ALTER TABLE `guest_checkin`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `membership_renewal`
--
ALTER TABLE `membership_renewal`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `nominated_guests`
--
ALTER TABLE `nominated_guests`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`Per_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`par_id`);

--
-- Indexes for table `reference_person`
--
ALTER TABLE `reference_person`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `billinfo`
--
ALTER TABLE `billinfo`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `booths`
--
ALTER TABLE `booths`
  MODIFY `bo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `emergencydetails`
--
ALTER TABLE `emergencydetails`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `guest_checkin`
--
ALTER TABLE `guest_checkin`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `membership_renewal`
--
ALTER TABLE `membership_renewal`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nominated_guests`
--
ALTER TABLE `nominated_guests`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `Per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=603;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `reference_person`
--
ALTER TABLE `reference_person`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
