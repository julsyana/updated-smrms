-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2023 at 08:02 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u121162919_clinicms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `contact_num` varchar(13) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `isArchive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `unique_id`, `email`, `password`, `fname`, `lname`, `img`, `contact_num`, `birthdate`, `birthplace`, `gender`, `address`, `isArchive`) VALUES
(1, '23-826341', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'Rochell', 'Pascual', 'rpascualrn.JPG', '09123456789', '0000-00-00', '', '', '', 0),
(2, '23-116373', 'julsbalingasa@gmail.com', '3a94f4b35451fee93f13c0f7dd27475a', 'Christine Jean', 'Bautista', 'cjbautista.JPG', '09871287328', '0000-00-00', '', '', '', 0),
(4, '23-722709', 'julsbalingasa@gmail.com', '9716ad09125adc5978281cc9670f3006', 'Sample', 'Sample', 'machingrn.JPG', '09208398232', '0000-00-00', '', '', '', 1),
(5, '23-736573', 'minervalovescats@gmail.com', 'b05a014419f2fdade349abace1137c42', 'Minerva', 'McGonagall', '', '09123456789', '0000-00-00', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `announcement` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announce`
--

INSERT INTO `announce` (`id`, `emp_id`, `position`, `lastname`, `firstname`, `announcement`, `image`, `date`, `time`) VALUES
(1, '23-1234', 'School Nurse', 'Casipit', 'Mary Ann', 'Greetings! Be ready.', 'macasipitrn.JPG', '05-01-23', '03:49:27pm'),
(2, '1', 'Head Nurse', 'Pascual', 'Rochell', 'Hi everyone! The ff needs to comply their med reqs.:\r\n\r\n1. Juan Dela Cruz\r\n2. Sample Name', 'rpascualrn.JPG', '05-01-23', '03:53:41pm'),
(7, '1', '', 'Pascual', 'Rochell', 'There will be a dental caravan on our university on April 1, 2023 as part of the University Week.', 'rpascualrn.JPG', '05-02-23', '09:42:38pm'),
(11, '1', '', 'Pascual', 'Rochell', 'Doctors schedule every Thursday', 'rpascualrn.JPG', '05-03-23', '10:45:59pm'),
(14, '1', '', 'Pascual', 'Rochell', '000000000000000', 'rpascualrn.JPG', '05-04-23', '09:37:17am'),
(15, '1', '', 'Pascual', 'Rochell', 'Good Day!\r\n\r\nMeeting today. Attendance is a must!\r\nThanks!', 'rpascualrn.JPG', '05-04-23', '10:33:18am');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `app_id` varchar(55) NOT NULL,
  `app_type` varchar(55) NOT NULL,
  `date_filed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `app_id`, `app_type`, `date_filed`) VALUES
(2, 'appzsXqpJCOJZ9o9S', 'Medical', '2023-04-20 07:22:50'),
(3, 'appARlMb5R7GD84w1', 'Medical', '2023-04-22 13:13:19'),
(4, 'appNj2YP8MXdTmD5A', 'Medical', '2023-04-22 13:13:19'),
(5, 'appDZROVEIirmSyo3', 'Medical', '2023-04-23 22:33:28'),
(6, 'appDN1zxKQxlnKEMl', 'Dental', '2023-04-23 22:34:10'),
(7, 'app1pATM9s735Oa7v', 'Medical', '2023-04-24 22:31:36'),
(13, 'appdqFpbbCThzEQKU', 'Medical', '2023-05-04 06:14:55'),
(14, 'appSIU7y4nZjkAVSx', 'Dental', '2023-05-04 06:16:11'),
(15, 'appvpbDEIdmXlPSeE', 'Medical', '2023-05-04 09:49:06'),
(16, 'appeUSDjZgDTqqqcd', 'Medical', '2023-05-04 10:37:36'),
(17, 'app3CSlKY1CQY9yJO', 'Medical', '2023-05-04 10:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_dates`
--

CREATE TABLE `appointment_dates` (
  `id` int(11) NOT NULL,
  `app_id` varchar(255) NOT NULL,
  `app_dates` date NOT NULL,
  `app_slot` int(11) NOT NULL,
  `app_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment_dates`
--

INSERT INTO `appointment_dates` (`id`, `app_id`, `app_dates`, `app_slot`, `app_status`) VALUES
(4, 'appzsXqpJCOJZ9o9S', '2023-05-01', 50, 'on'),
(5, 'appzsXqpJCOJZ9o9S', '2023-05-03', 50, 'on'),
(6, 'appzsXqpJCOJZ9o9S', '2023-05-05', 50, 'on'),
(7, 'appARlMb5R7GD84w1', '2023-04-28', 100, 'on'),
(8, 'appARlMb5R7GD84w1', '2023-05-06', 100, 'on'),
(9, 'appARlMb5R7GD84w1', '2023-05-27', 100, 'on'),
(10, 'appARlMb5R7GD84w1', '2023-05-04', 100, 'on'),
(11, 'appNj2YP8MXdTmD5A', '2023-04-28', 100, 'on'),
(12, 'appNj2YP8MXdTmD5A', '2023-05-06', 100, 'on'),
(13, 'appNj2YP8MXdTmD5A', '2023-05-27', 100, 'on'),
(14, 'appNj2YP8MXdTmD5A', '2023-05-04', 100, 'on'),
(15, 'appDZROVEIirmSyo3', '2023-04-23', 100, 'on'),
(16, 'appDN1zxKQxlnKEMl', '2023-04-23', 100, 'on'),
(17, 'appDN1zxKQxlnKEMl', '2023-04-24', 100, 'on'),
(19, 'appDN1zxKQxlnKEMl', '2023-04-26', 100, 'on'),
(21, 'app1pATM9s735Oa7v', '2023-04-24', 100, 'on'),
(22, 'app1pATM9s735Oa7v', '2023-04-25', 100, 'on'),
(23, 'app1pATM9s735Oa7v', '2023-04-26', 100, 'on'),
(24, 'appb41mjLFOpoxmDq', '2023-04-26', 100, 'on'),
(26, 'appPUo1YFKga5jW19', '2023-05-01', 100, 'on'),
(27, 'appAEQoVT9ddoKwpf', '2023-05-01', 100, 'on'),
(28, 'appnXFpdVraGa0hWU', '2023-02-22', 100, 'on'),
(29, 'appTWtzXcMHqpnB9A', '2023-05-10', 50, 'on'),
(30, 'appU7IhnoWNAbaQNB', '2023-05-19', 100, 'on'),
(31, 'appjpGbAtYHXZumrh', '2023-05-19', 100, 'on'),
(32, 'appKOkuTo8FaWItMV', '2023-05-19', 100, 'on'),
(33, 'appdqFpbbCThzEQKU', '2023-05-04', 100, 'on'),
(34, 'appdqFpbbCThzEQKU', '2023-05-05', 100, 'on'),
(35, 'appdqFpbbCThzEQKU', '2023-05-06', 100, 'on'),
(36, 'appdqFpbbCThzEQKU', '2023-05-27', 100, 'on'),
(37, 'appSIU7y4nZjkAVSx', '2023-05-10', 100, 'on'),
(38, 'appSIU7y4nZjkAVSx', '2023-05-12', 100, 'on'),
(39, 'appSIU7y4nZjkAVSx', '2023-05-17', 100, 'on'),
(40, 'appvpbDEIdmXlPSeE', '2023-05-08', 30, 'on'),
(41, 'appvpbDEIdmXlPSeE', '2023-05-10', 30, 'on'),
(42, 'appvpbDEIdmXlPSeE', '2023-05-12', 30, 'on'),
(43, 'appvpbDEIdmXlPSeE', '2023-05-15', 30, 'on'),
(44, 'appeUSDjZgDTqqqcd', '2023-05-09', 30, 'on'),
(45, 'appeUSDjZgDTqqqcd', '2023-05-27', 30, 'on'),
(46, 'appeUSDjZgDTqqqcd', '2023-05-18', 30, 'on'),
(47, 'app3CSlKY1CQY9yJO', '2023-05-25', 0, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `archive_id` varchar(55) NOT NULL,
  `archive_name` varchar(255) NOT NULL,
  `archive_type` varchar(255) NOT NULL,
  `archive_datetime` datetime NOT NULL,
  `archive_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`id`, `archive_id`, `archive_name`, `archive_type`, `archive_datetime`, `archive_img`) VALUES
(1, '23-736573', 'Minerva McGonagall', 'admin', '2023-05-03 22:07:07', ''),
(4, 'M-8738', 'ALUMINUM HYDROXIDE MAGNESIUM HYDROXIDE', 'medicine', '2023-05-04 10:42:19', 'aluminum-hydroxide.png');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` int(20) NOT NULL,
  `reference_no` varchar(100) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `date_of_consultation` date NOT NULL,
  `symptoms` varchar(255) NOT NULL,
  `othersymptoms` varchar(150) NOT NULL,
  `body_temp` varchar(20) NOT NULL,
  `suspected_covid` varchar(20) NOT NULL,
  `tested_covid` varchar(20) NOT NULL,
  `confined` varchar(10) NOT NULL,
  `how_long` int(20) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `referred` varchar(10) NOT NULL,
  `hospital` varchar(150) NOT NULL,
  `hospital_add` varchar(150) NOT NULL,
  `reason` varchar(150) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `reference_no`, `student_id`, `emp_id`, `date_of_consultation`, `symptoms`, `othersymptoms`, `body_temp`, `suspected_covid`, `tested_covid`, `confined`, `how_long`, `medicine`, `quantity`, `referred`, `hospital`, `hospital_add`, `reason`, `status`) VALUES
(3, '', '16-0243', '23-1234', '2023-05-03', 'Fever or chills, Cough, Headache', 'Dizziness', '38', 'no', 'Antigen Test', 'Yes', 3, 'ZINC OXIDE + CALAMINE LOTION, METOCLOPRAMIDE', 3, 'Yes', 'Quezon City General Hospital & Medical Center', 'Seminary Rd, Project 8, Quezon City, Metro Manila', '', ''),
(5, '', '17-1499', '23-1234', '2023-05-03', 'Congestion or runny nose, Sore throat', 'Dizziness', '37', 'Yes', 'Antigen Test', 'Yes', 3, 'LOPERAMIDE, SALBUTAMOL', 4, 'No', '', '', '', ''),
(7, '', '19-1206', '23-1234', '2023-05-03', 'Difficulty breathing, Nausea or vomitting', 'Dizziness', '38', 'Yes', 'Antigen Test', 'Yes', 3, 'LORATADINE', 2, 'No', '', '', '', ''),
(11, '', '17-1499', '23-1234', '2023-05-04', 'Cough', 'Dizziness', '38', 'no', 'Antigen Test', 'Yes', 2, 'PARACETAMOL', 2, 'No', '', '', '', ''),
(12, '', '17-1499', '23-1234', '2023-05-04', 'Cough', 'Dizziness', '38', 'no', 'Antigen Test', 'Yes', 2, 'PARACETAMOL', 2, 'No', '', '', '', ''),
(13, '', '17-1499', '23-1234', '2023-05-04', 'Headache, New loss of taste or smell', 'Dizziness', '38', 'no', 'Antigen Test', 'Yes', 3, 'MEFINAMIC ACID', 2, 'Yes', 'Novaliches District Hospital', '683 Quirino Highway, Barangay San Bartolome, Novaliches, Quezon City', '', ''),
(14, '', '17-1499', '23-1234', '2023-05-04', 'Headache, New loss of taste or smell', 'Dizziness', '38', 'no', 'Antigen Test', 'Yes', 3, 'MEFINAMIC ACID', 2, 'Yes', 'Novaliches District Hospital', '683 Quirino Highway, Barangay San Bartolome, Novaliches, Quezon City', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `consultations_med`
--

CREATE TABLE `consultations_med` (
  `id` int(255) NOT NULL,
  `medicine_ref` int(20) NOT NULL,
  `medicine` varchar(255) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `emp_id` varchar(50) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `building_name` varchar(100) NOT NULL,
  `room_num` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `course_program` varchar(200) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_num` varchar(13) NOT NULL,
  `position` varchar(100) NOT NULL,
  `isArchive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`emp_id`, `dept_name`, `building_name`, `room_num`, `image`, `course_program`, `firstname`, `lastname`, `email`, `contact_num`, `position`, `isArchive`) VALUES
('23-0603', 'BSECE', 'Bautista', 'IC301a', 'BSECE.jpg', 'BS Electrical Engineering', '', '', 'julsbalingasa@gmail.com', '', '', 0),
('23-1100', 'BSA', 'Belmonte', 'IC305a', 'BSA.jpg', 'BS Accountancy', '', '', 'sample@gmail.com', '', '', 0),
('23-1774', 'BSIE', 'TechVoc', 'IC303a', 'BSIE.jpg', 'BS Industrial Engineering', 'BS', 'Industrial Engineering', 'juliana.young.balingasa07112001@gmail.com', '09123456789', 'head', 0),
('23-1828', 'BSENT', 'TechVoc', 'IC302a', 'BSENT.jpg', 'BS Entrepreneurship', '', '', 'john.nicole.abihay@gmail.com', '', '', 0),
('23-7402', 'BSIT', 'Bautista', 'IC304a', 'BSA.png', 'BS Information Technology', '', '', 'julsbalingasa@gmail.com', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `entrance_log`
--

CREATE TABLE `entrance_log` (
  `id` int(11) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `timein` time NOT NULL,
  `logdate` date NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entrance_log`
--

INSERT INTO `entrance_log` (`id`, `student_number`, `timein`, `logdate`, `Status`) VALUES
(1, '16-0243', '01:39:19', '2023-04-25', 'Cleared'),
(2, '16-0243', '10:32:19', '2023-04-25', 'Cleared'),
(9, '19-1204', '12:17:04', '2023-04-26', 'Cleared'),
(10, '20-0437', '14:42:03', '2023-04-26', 'Cleared'),
(11, '16-0243', '14:43:30', '2023-04-26', 'Cleared'),
(12, '20-0437', '15:27:49', '2023-04-26', 'Cleared'),
(13, '16-0243', '15:43:34', '2023-04-26', 'Pending'),
(14, '19-1323', '15:44:49', '2023-04-26', 'Cleared'),
(15, '17-1534', '03:09:35', '2023-04-27', 'Cleared'),
(16, '19-1307', '03:12:03', '2023-04-27', 'Cleared'),
(17, '19-1350', '03:15:03', '2023-04-27', 'Cleared'),
(18, '19-1402', '03:15:42', '2023-04-27', 'Cleared'),
(19, '19-0718', '03:15:59', '2023-04-27', 'Cleared'),
(20, '19-1347', '03:18:55', '2023-04-27', 'Cleared'),
(21, '17-1500', '03:19:09', '2023-04-27', 'Cleared'),
(22, '19-1297', '03:21:40', '2023-04-27', 'Cleared'),
(23, '18-1546', '03:22:14', '2023-04-27', 'Cleared'),
(24, '17-1500', '09:52:22', '2023-04-27', 'Cleared'),
(25, '17-1500', '09:52:29', '2023-04-27', 'Cleared'),
(26, '19-0718', '09:53:47', '2023-04-27', 'Cleared'),
(27, '19-1307', '09:53:52', '2023-04-27', 'Cleared'),
(28, '19-1297', '09:54:00', '2023-04-27', 'Cleared'),
(29, '19-1323', '16:02:17', '2023-04-28', 'Cleared'),
(30, '22-1486', '16:05:51', '2023-04-28', 'Cleared'),
(31, '19-0718', '16:06:03', '2023-04-28', 'Cleared'),
(32, '19-1350', '16:09:22', '2023-04-28', 'Cleared'),
(33, '19-1307', '16:16:34', '2023-04-28', 'Cleared'),
(34, '19-1297', '16:17:26', '2023-04-28', 'Cleared'),
(35, '19-1347', '18:16:07', '2023-04-28', 'Cleared'),
(36, '19-1347', '18:16:21', '2023-04-28', 'Cleared'),
(37, '19-1347', '18:16:27', '2023-04-28', 'Cleared'),
(38, '18-1546', '16:53:37', '2023-05-01', 'Cleared'),
(39, '18-1546', '16:55:06', '2023-05-01', 'Cleared'),
(40, '18-1546', '16:55:11', '2023-05-01', 'Cleared'),
(41, '18-1546', '16:55:16', '2023-05-01', 'Cleared'),
(42, '18-1546', '16:55:21', '2023-05-01', 'Cleared'),
(43, '18-1546', '16:55:26', '2023-05-01', 'Cleared'),
(44, '18-1546', '16:55:31', '2023-05-01', 'Cleared'),
(45, '18-1546', '16:55:37', '2023-05-01', 'Cleared'),
(46, '18-1546', '16:57:41', '2023-05-01', 'Cleared'),
(47, '18-1546', '16:57:46', '2023-05-01', 'Cleared'),
(48, '18-1546', '16:57:51', '2023-05-01', 'Cleared'),
(49, '18-1546', '16:58:08', '2023-05-01', 'Cleared'),
(50, '18-1546', '16:58:15', '2023-05-01', 'Cleared'),
(51, '18-1546', '16:58:20', '2023-05-01', 'Cleared'),
(52, '19-1347', '14:46:01', '2023-05-03', 'Cleared'),
(53, '19-1347', '14:46:06', '2023-05-03', 'Cleared'),
(54, '19-1347', '14:46:11', '2023-05-03', 'Cleared'),
(55, '19-1347', '14:47:53', '2023-05-03', 'Cleared'),
(56, '19-1402', '15:02:21', '2023-05-03', 'Cleared'),
(57, '19-1402', '15:02:27', '2023-05-03', 'Cleared'),
(58, '19-1402', '15:02:32', '2023-05-03', 'Cleared'),
(59, '19-1402', '15:09:52', '2023-05-03', 'Cleared'),
(60, '19-1402', '15:09:52', '2023-05-03', 'Cleared'),
(61, '19-1402', '15:10:01', '2023-05-03', 'Cleared'),
(62, '19-1402', '15:10:12', '2023-05-03', 'Cleared'),
(63, '19-1402', '15:10:22', '2023-05-03', 'Cleared'),
(64, '19-1402', '15:11:27', '2023-05-03', 'Cleared'),
(65, '19-1402', '15:11:28', '2023-05-03', 'Cleared'),
(66, '19-1402', '15:12:17', '2023-05-03', 'Cleared'),
(67, '19-1350', '15:12:44', '2023-05-03', 'Cleared'),
(68, '19-1350', '15:12:44', '2023-05-03', 'Cleared'),
(69, '19-1297', '15:13:33', '2023-05-03', 'Cleared'),
(70, '19-1402', '16:02:40', '2023-05-03', 'Cleared'),
(71, '19-1402', '16:02:46', '2023-05-03', 'Cleared'),
(72, '17-1534', '16:18:36', '2023-05-03', 'Cleared'),
(73, '19-1307', '16:19:26', '2023-05-03', 'Cleared'),
(74, '19-1350', '16:19:55', '2023-05-03', 'Cleared'),
(75, '19-1206', '09:11:26', '2023-05-04', 'Cleared'),
(76, '19-1206', '09:12:14', '2023-05-04', 'Cleared'),
(78, '19-1347', '09:37:25', '2023-05-04', 'Cleared');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(20) NOT NULL,
  `hospi_id` varchar(20) NOT NULL,
  `hospital` varchar(150) NOT NULL,
  `hospital_add` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_num` varchar(50) NOT NULL,
  `campus` varchar(50) NOT NULL,
  `isArchive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `hospi_id`, `hospital`, `hospital_add`, `email`, `contact_num`, `campus`, `isArchive`) VALUES
(1, 'A10-0982', 'Novaliches District Hospital', '683 Quirino Highway, Barangay San Bartolome, Novaliches, Quezon City', 'NDH@quezoncity.gov.ph', '8931-0307', 'San Bartolome', 0),
(2, 'A10-0543', 'Quezon City General Hospital & Medical Center', 'Seminary Rd, Project 8, Quezon City, Metro Manila', 'QCGH@quezoncity.gov.ph', '8863-0800', 'San Francisco', 0),
(3, 'A10-0234', 'Rosario Maclang Bautista General Hospital', 'IBP Road Batasan Hills, Quezon City, Philippines', 'RMBGH@quezoncity.gov.ph', '8451-1567/8459-0378', 'Batasan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `prod_id` varchar(55) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `num_stocks` int(20) NOT NULL,
  `expirationDate` date NOT NULL,
  `description` varchar(300) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `isArchive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `prod_id`, `name`, `image`, `num_stocks`, `expirationDate`, `description`, `campus`, `qr_code`, `isArchive`) VALUES
(6, 'M-4292', 'PHENYLPROPANOLAMINE HCL+CPM+PARACETAMOL', 'phenyl-paracetamol.png', 400, '2023-12-30', 'It is used to treat nasal congestion. Phenylpropanolamine is found in appetite suppressant formulations and with guaifenesin in cough-cold formulations.', 'San Bartolome', 'M-4292.png', 0),
(7, 'M-0900', 'ALUMINUM HYDROXIDE MAGNESIUM HYDROXIDE', 'aluminum-hydroxide.png', 200, '2023-08-30', 'It is used to treat these symptoms in patients with peptic ulcer, gastritis, esophagitis, hiatal hernia, or too much acid in the stomach (gastric hyperacidity).', 'San Bartolome', 'M-0900.png', 0),
(8, 'M-7039', 'LORATADINE', 'loratadine.png', 400, '2023-09-29', 'It is an antihistamine medicine that helps with the symptoms of allergies. It\'s used to treat: hay fever. conjunctivitis (red, itchy eyes) eczema.', 'San Bartolome', 'M-7039.png', 0),
(9, 'M-2055', 'METOCLOPRAMIDE', 'metoclopramide.png', 40, '2023-08-30', 'It is a dopamine receptor antagonist and has been approved by the FDA to treat nausea and vomiting in patients with gastroesophageal reflux disease or diabetic gastroparesis by increasing gastric motility. ', 'San Bartolome', 'M-2055.png', 0),
(10, 'M-0472', 'MEFINAMIC ACID', 'mefenamic.png', 400, '2024-10-30', 'It is used to relieve mild to moderate pain, including menstrual pain (pain that happens before or during a menstrual period). Mefenamic acid is in a class of medications called NSAIDs.', 'San Bartolome', 'M-0472.png', 0),
(11, 'M-7253', 'SALBUTAMOL', 'ventolin-salbutamol.png', 60, '2024-06-30', 'It is used to rapidly treat asthma, bronchospasm and reversible airways obstruction by widening the airways of the lungs. ', 'San Bartolome', 'M-7253.png', 0),
(12, 'M-1979', 'HYOSCINE N-BUTYLBROMIDE (HNBB)', 'hyoscine.png', 300, '2024-04-30', 'It is a quaternary ammonium derivative that exerts peripheral anticholinergic effects by inhibiting muscarinic acetylcholine (ACh) receptors in the smooth-muscle cells of the visceral hollow organs.', 'San Bartolome', 'M-1979.png', 0),
(13, 'M-4123', 'LOPERAMIDE', 'loperamide.png', 300, '2025-03-30', 'It is a medication used in the treatment of diarrhea. It classifies as an anti-diarrheal agent. The use of loperamide in high doses has been associated with a significant increase in morbidity and mortality.', 'San Bartolome', 'M-4123.png', 0),
(14, 'M-9895', 'PARACETAMOL', 'paracetamol.png', 400, '2024-09-30', 'It is a commonly used medicine that can help treat pain and reduce a high temperature (fever). ', 'San Bartolome', 'M-9895.png', 0),
(15, 'M-0882', 'ZINC OXIDE + CALAMINE LOTION', 'zinc-oxide.png', 260, '2024-03-30', 'It is used as a dusting powder, cream, lotion or ointment in a variety of skin conditions. Zinc oxide has a mildly antiseptic action and is a mild astringent, it has soothing and protective properties.', 'San Bartolome', 'M-0882.png', 0),
(16, 'M-5183', 'LORATADINE', 'loratadine.png', 200, '2023-09-29', 'Used as pain relievers and for headaches', 'San Francisco', 'M-5183.png', 1),
(17, 'M-0432', 'LORATADINE', 'loratadine.png', 200, '2023-05-31', 'Used as pain relievers and for headaches', 'Batasan', 'M-0432.png', 1),
(19, 'M-3830', 'PHENYLPROPANOLAMINE HCL+CPM+PARACETAMOL', 'phenyl-paracetamol.png', 200, '2023-12-30', 'It is used to treat nasal congestion. Phenylpropanolamine is found in appetite suppressant formulations and with guaifenesin in cough-cold formulations.', 'Batasan', 'M-3830.png', 0),
(20, 'M-8738', 'ALUMINUM HYDROXIDE MAGNESIUM HYDROXIDE', 'aluminum-hydroxide.png', 100, '2023-10-30', 'It is used to treat these symptoms in patients with peptic ulcer, gastritis, esophagitis, hiatal hernia, or too much acid in the stomach (gastric hyperacidity). ', 'San Francisco', 'M-8738.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mis.emergency_contact`
--

CREATE TABLE `mis.emergency_contact` (
  `id` int(11) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `relation` varchar(55) NOT NULL,
  `emergency_contact` varchar(13) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mis.emergency_contact`
--

INSERT INTO `mis.emergency_contact` (`id`, `student_id`, `fullname`, `relation`, `emergency_contact`, `address`) VALUES
(1, '17-1499', 'Cherry Ombao Bulleque', 'Mother', '2147483647', '2756 Ninada Street, Brgy Commonwealth, Quezon City, Metro Manila, District 2, 1119'),
(2, '16-0243', 'Melvin Mark De Leon Bacabis', 'Father', '2147483647', '056 Area 1B Luzon Avenue, Matandang Balara, Quezon City, Metro Manila, District 2, 1119'),
(3, '19-1206', 'Cheryl Young Balingasa', 'Mother', '09684422430', 'Lot 1 Blk 1, Madjaas Street, Brgy. Payatas, Quezon City'),
(4, '19-1214', 'Marites A. Pike', 'Mother', '09771068666', 'BistekVille 19 Luzon Avenue Matandang Balara Quezon City'),
(5, '19-1230', 'Julieta Lomboy Sorbeto', 'Mother', '09275252950', 'Bicol Street Alley 4, Barangay Payatas, Quezon City'),
(6, '19-1327', 'Gloria Jalmasco', 'Mother', '09959755622', '344 Narra St. Payatas B. Quezon City, District 2, 1119'),
(7, '19-1074', 'Elizabeth D. Ponce', 'Grandmother', '09159552095', '54-X Poblete St., Brgy. Milagrosa, Project 4, Quezon City'),
(8, '19-1282', 'Nelia L. Calubaquib', 'Mother', '09068885742', '770 Tandang Sora Avenue,Matandang Balara, Quezon City'),
(9, '17-504', 'Flordeliza Arceo', 'Mother', '09103563950', '333 JP Rizal St Alley one Brgy Bagong Silangan, Quezon City, 1119'),
(10, '19-1300', 'Cecilia B. Mara-asin', 'Mother', '09993178760', 'Pinaglaban Extension Talanay Area-A Batasan Hills Quezon City'),
(11, '19-1299', 'Rodolfo C. Dela Cruz', 'Father', '09652297818', '5110 Nikon St. IBP Road Brgy. Commonwealth District II, Quezon City, 1121'),
(12, '19-1392', 'Sephora T. Dela cruz', 'Mother', '09355924102', 'Peseta Street Phase 8 North Fairview Quezon City'),
(13, '22-1679', 'Marcelina M. Tabil', 'Mother', '09300855717', '15A K2 Street Area 6B Nawasaline, Brgy. Holy Spirit, Quezon City'),
(14, '22-1623', 'Ma.lynn S. Lora', 'Mother', '09701513343', '116 Kaligtasan Ext., Brgy. Holy spirit, Quezon City'),
(15, '22-1486', 'Ligaya C. Cunana', 'Auntie', '09123456678', '2 Technical Sargent Soldiers Home IBP Road, Batasan Hills, Quezon City'),
(16, '19-1350', 'Victor Nunag/Marly Nunag', 'Parents', '09286728356', 'Blk 33 Lt 14 Violago Homes Parkwood Hills, Brgy. Bagong Silangan, District II, Quezon City, 1119'),
(17, '19-1402', 'Sotera C. Pacomios', 'Mother', '09355924102', 'Peseta Street, Phase 8, North Fairview, Quezon City'),
(18, '19-0718', 'Alexes B. Mallapre', 'Father', '09773366986', '135 Don Julio Gregorio St. Sauyo Rd. Brgy. Sauyo Quezon City'),
(19, '17-1500', 'Merwin Lopez', 'Sister', '09618838354', '141 Phase 3 Acorda St, Payatas B, Quezon City, 1119'),
(20, '17-1534', 'Rosalie Chua', 'Mother', '09979013233', 'Block 31 Lot 22 Bistekville2 Barangay Kaliagayahan, Novaliches, Quezon City District V, 1124'),
(21, '19-1307', 'Alma Francisco', 'Mother', '09616046868', 'Block 2 Lot 18, Area 7 Luzon Ave, Quezon City, District 3, 1119'),
(22, '19-1323', 'Mhea Madeja', 'Partner', '09059583429', 'Blk 6, Lot 34 Bansalangin St., Payatas B, Quezon City'),
(23, '19-1347', 'Rosalinda Tabunan', 'Mother', '09306838116', 'Blk 12 Lot 1 Rowhouse Pilot Drive, Brgy. Commonwealth, Quezon City'),
(24, '20-1273', 'Flora Baja', 'Mother', '09236452154', '3 k-1 Area 6B Nawasaline Street, Holy Spirit, Quezon City'),
(25, '20-0437', 'Agustina Baltazar', 'Mother', '09461662068', '17 Sto Ni?o Extension, Barangay Holy Spirit, Quezon City'),
(26, '18-1546', 'Lourdes V. Obias', 'Grand Mother', '09518893107', '49-D Sct. Borromeo, Brgy. South Triangle, Quezon City 1103'),
(27, '19-0622', 'Edna P. Marco', 'Mother', '09983743839', '10 Sterling St. Jem 9&10 Subd, Tandang Sora Quezon City'),
(28, '19-1297', 'Evangeline C.  Bation', 'Mother', '09381821297', '155 A Area 7 Nawasa Line,  Brgy.  Holy Spirit,  Quezon City'),
(29, '19-1283', 'Aida Ranuco', 'Mother', '9262925503', '37-C Sapphire St. Payatas B, Quezon City, District II, 1119'),
(30, '19-1213', 'Rosario Aguidan', 'Mother', '9468040804', '164 Kalinisan St. Brgy. Commonwealth Q.C. , 1121'),
(31, '19-1229', 'Romelie Habay', 'Mother', '9976608544', '12 1119 District 12 Sta. Veronica St. Brgy Payatas A Q.C'),
(32, '17-1446', 'Edna B. Flagne', 'Mother', '9494119772', ' Purok 20 Unit 5 Barangay Commonwealth, Quezon City'),
(33, '19-1380', 'Mary Grace Abeleda', 'Mother', '9297312288', '11 Dama De Noche St. Brgy. Payatas A, QC, 1119'),
(34, '19-1235', 'Osvaldo P. Tabasa Jr. ', 'Father ', '9606324177', '17 Flores, Damayan SFDM, QC 1104'),
(35, '19-1377', 'Mayleen A. Cabayao', 'Sibling', '9754574275', '201 Mabuhay Compound Sauyo Rd. District 6 Novaliches Quezon City, 1116'),
(36, '19-1204', 'Marietta Tercenio', 'Mother', '9559429508', 'Block 6 Unit 11 Rowhouse  Q.C'),
(37, '19-0902', 'Merlyn Aquino Suano', 'Mother', '9263426175', 'Merryfield Compound Dizon St. Barangay San Bartolome Novaliches , District V , Quezon City , 1116'),
(38, '19-1281', 'Abigail Mugas', 'Sister', '9453057471', '170 Don Fabian Ext. Brgy., Commonwealth Q.C'),
(39, '19-1211', 'Jelly Serafin', 'Mother', '9506346975', '125 Don Primitivo St. Brgy. Holy Spirit Quezon City'),
(40, '19-1280', 'Maria Teresa V. Parangalan', 'Mother', '9095599059', '127 Ilocos Sur St. Brgy. Ramon Magsaysay, Bago Bantay, Quezon City'),
(41, '19-1267', 'Ben Montallana', 'Father ', '9662711117', 'freedom park batasan hills qc , district 2 , 1126'),
(42, '19-1381', 'Memchie Hinunangan', 'Sister', '9363909165', '9B Saphire St. Nelson Village Batasan Hills Qc'),
(43, '20-1188', 'Rico Tiagan ', 'Father', '9196184986', '50 Kalamansi St. Pasong Tamo Q.C.'),
(44, '19-1406', 'Joan ', 'Mother', '9172723639', 'niks.bayan@gmail.com'),
(45, '17-1389', 'Yolita A. Yu', 'Mother', '9354207191', '158 san miguel st. Brgy. Commonwealth, Quezon City'),
(46, '18-0921', 'Wilson Vargas', 'Father', '9058600196', 'Sta. Rita. Sta. Barbara St Gulod Nova Qc'),
(47, '19-0802', 'Mary Grace Cordero', 'Mother', '9674578211', '62 purok 1a luzon ave. Brgy.Culiat QC'),
(48, '17-1509', 'Josephine Adarlo', 'Mother', '9682347547', 'Azucena St, Payatas A, Quezon City 1119'),
(49, '19-1061', 'Soledad Marcos', 'Mother', '9073532950', '9 Pingkian 1 Pasong Tamo Quezon City, 1107'),
(50, '20-0345', 'Hiacyn Agbayani', 'Sister', '12345678909', '44 area 9b sampaguita st veterans village qc 1107'),
(51, '19-1362', 'Joanne A. Salvador', 'Mother', '9758374953', '2384 bicoleyte st. brgy. commonwealtg QC'),
(52, '19-1329', 'Gloria D. Bona', 'Mother', '9086097078', 'Lower Narra St. Payatas B. Q.C'),
(53, '18-3662', 'Abegail Bungay', 'Sister', '09613319987', 'Goodwill Homes II bagbag novaliches. QC'),
(54, '19-1328', 'Delfa Rivera / Geronimo Rivera', 'Mother and Father', '09999681621/0', '6B Tiburcio Ext Brgy Krus Na Ligas, District 4, 1101, Quezon City, Philippines'),
(55, '17-1497', 'Audita Garcia', 'Grandmother', '9606876679', '047 Kaunlaran St., Brgy. Commonwealth, Quezon City 1121'),
(56, '19-1053 ', 'Sherry Lou G. Tibang', 'Mother', '9653399835', '156 Pantranco Compound Right Side Himlayan road brgy. Pasong Tamo  Quezon City'),
(57, '17-1259', 'Bernardo R. Mendoza', 'Father', '9277713093', '3307 Francesca Royale, Old Sauyo Rd., Nova, QC'),
(58, '17-1264', 'Jocelyn Irinco ', 'Mother', '9169490957', 'Dirham St., Phase 8, North Fairview, Quezon City'),
(59, '19-1238', 'Cheery Baly', 'Mother', '9152573813', '26 Jonas st. Freedom Park 4, Batasan Hills Q.C / 1126'),
(60, '19-1330', 'Antonia Echavez Escribano', 'Mother', '9434649028', '067 Lower Narra St. Payatas B. Quezon City, Metro Manila II District'),
(61, '19-1202', 'Rubelit M. Casta?eda ', 'Mother', '9955463158', 'Purok 14 Unit 5 Martinez St. Brgy. Commonwealth, Quezon City, 1121'),
(62, '19-1291', 'Cherel G. Villarma', 'Mother', '9456727546', '25 B Guilder St. Phase 8 North Fairview Q.C 1121'),
(63, '19-1348', 'Ramil B. Deocariza Sr.', 'Father', '9661771640', '39 Lilac St. West Fairview, Quezpn City'),
(64, '19-2448', 'Patricia S. Dela Peña', 'Mother', '9478339501', '6 Punay St. Novaville Brgy170 Caloocan City'),
(65, '20-1051', 'NEMIA EMEN QUIZAN', 'Mother', '09232967852', 'BLPC ROAD 3 BRGY BAGONG PAG ASA QUEZON CITY'),
(66, '17-1300', 'JESON CASTORICO', 'Father', '9633949071', '20P. Dela Cruz St. Nagkaisang Nayon Novaliches Quezon City 1125'),
(67, '19-1298', 'Maria. Luisa F. De Leon', 'MOTHER', '9095511131', 'Area 3 Heron St. Sitio Veterans, Brgy. BagongSilangan Quezon City, 1119'),
(68, '19-1388', 'SHIELA BANANIA', 'Mother', '9636212752', '136 Sampaguita Street Barangay Holy Spirit Quezon city, District 2, 1127'),
(69, '19-1385', 'Maricel Dela Cruz', 'Sister', '9355315361', '385 Area 2 Eagle st. sitio Veterans brgy bagong silangan qc, 1119'),
(70, '20-0895', 'ROWENA BARCEBAL', 'AUNTIE', '9167452635', '354 AREA 6 SITIO CABUYAO BRGY. SAUYO QUEZON CUTY'),
(71, '19-1346', 'Dolores de guzman', 'mother', '9606324243', '32b kaunlaran st batasan hills qc'),
(72, '19-1234', 'Shirley Nartea', 'MOTHER', '9099754220', '280 Infantry, Barangay Holy Spirit, QC'),
(73, '20-0819', 'Flordeliza A. Lery', 'MOTHER', '9182150129', '148 Pingkian 1 Central Barangay Pasong Tamo Dist 6 QC, 1107'),
(74, '20-0194', 'Brenda Pasaol', 'Mother', '9308061217', '99 Sauyo, Nova. QC'),
(75, '21-0427', 'Rachel Minoy', 'Sister', '9510754890', '757 Area A Sauyo Rd Quezon City District 6 1116'),
(76, '20-0991', 'Maria lilibeth M, Osorio', 'Mother', '9915988744', '19 santos street brgy krus na ligas Q,C'),
(77, '20-0954', 'Magna Navarro', 'Mother', '9481430425', 'Blk 3 Lot 24 Lawaan St. Novahomes District 5 1103'),
(78, '20-0714', 'Liza A. Gacula', 'Mother', '9107348474', '772 Area-6 Sitio Cabuyao Brgy. Sauyo Novaliches Quezon City'),
(79, '21-1585', 'Erlinda Acuesta', 'Sister', '9262661524', '27 Saplan Cmpd, Doña Faustina Village 1, Brgy. Culiat Q.C'),
(80, '20-0419', 'Marjorie C. Avellana', 'Mother', '9948717044', 'Carlos St. San Bartolome Novaliches, Quezon City, District 5, 1116'),
(81, '20-0364', 'AGAPITO ALEJO', 'Brother', '09266206584 ', 'MALIGAYA CAMARIN CALOOCAN ST, PARKLAND, 9969'),
(82, '19-0739', 'Joan M. Bernardo', 'Mother', '9509556345', '#12F2 Bayes st. Brgy. Gulod Novaliches, Quezon City 1117'),
(83, '17-1213', 'joann layan', 'Mother', '9303584790', 'B3 L1 Tawid Sapa 2 Phase II brgym kaligayahan nova qc District 5 1124'),
(84, '20-0741', 'Maricel Garcia', 'Mother', '9127472628', '27 Ibayo II Bagbag Nova. Q.C'),
(85, '21-1791', 'Rubelyn Gonzaga', 'Mother', '9306080060', '71 Virginia Street Barangay Gulod Novaliches, District 5 Quezon City, Metro Manila 1117'),
(86, '19-0639', 'MARIFE TILOS', 'Mother', '9518631135', '28 GERONIMO STREET BRGY STA MONICA NOVALICHES QUEZON CITY'),
(87, '19-0625', 'Vince Ricaforte', 'Partner', '9606326686', '20 Pugong Ginto St. Gulod Novaliches Quezon City'),
(88, '19-1287', 'Jose Mumar', 'Father', '9606326831', 'Taniman de Gloria Extension Area B2 Talanay, Batasan Hills, Quezon City 1126'),
(89, '19-0759', 'Marina Enovejas', 'Mother', '9123617198', '12 Carnation Ext. Area 2 Brgy. Capri Novaliches, Quezon City, District V, 1117'),
(90, '19-1391', 'Lovelyn D. Bercadez', 'Mother', '9685438600', '23 Doña Rosario Subd, Novaliches Proper, Quezon City 1123/1121'),
(91, '19-1351', 'ANNABEL AUMENTADO', 'Mother', '9691955479', '5046 Rolex St. IBP Road Brgy. Commonwealth Q.C'),
(92, '20-1010', 'Marietta G. Pambuena', 'Mother', '9812983742', '36 Payna St. Brgy. Bungad Quezon City'),
(93, '19-1376', 'Kristine R. Dumancas', 'Sister', '9999346758', '129 de gloria extn. Talanay area B Batasan Hills QC'),
(94, '21-1313', 'RICH MAR CHAVEZ', 'BROTHER', '9491199323', '104  Seminary Road Brgy Bahay Toro Quezon City'),
(95, '20-1671', 'Arvin Moquete', 'Father', '9874512596', '046 Cleofas Barangay Pasong Tamo Tandang Sora QC. 1107'),
(96, '19-1737', 'Jocelyn L. Mauro', 'Mother', '9457141020', '67 Tatlong Hari st, Brgy. Santa monica, Novaliches, Quezon City'),
(97, '20-0882', 'Violeta O. Mananghaya', 'Mother', '9484542759', '066 Tatlong Hari Street Barangay Gulod Novaliches Quezon City'),
(98, '17-1247', 'Nelson C. Ilao', 'Father', '9122553293', 'Block 23 lot 31 Pechayan Kanan Ilang-Ilangg St. Brgy Pasong Putik Novaliches Quezon City'),
(99, '19-1290', 'Virginia Donato', 'Mother', '9979777568', '6 Atis St. Group 1 Payatas B, Quezon City, District 2, 1119'),
(100, '19-0809', 'Cristina E. Encarnado', 'Mother', '9212582308', 'Riverdale St. Forest hill Subdivision Novaliches Quezon city - 1117');

-- --------------------------------------------------------

--
-- Table structure for table `mis.enrollment_status`
--

CREATE TABLE `mis.enrollment_status` (
  `id` int(11) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `code` varchar(55) NOT NULL,
  `program` varchar(255) NOT NULL,
  `year_level` varchar(255) NOT NULL,
  `section` varchar(20) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mis.enrollment_status`
--

INSERT INTO `mis.enrollment_status` (`id`, `student_id`, `code`, `program`, `year_level`, `section`, `branch`) VALUES
(1, '17-1499', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(2, '16-0243', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4I', 'San Bartolome'),
(3, '19-1206', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(4, '19-1214', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(5, '19-1230', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4G', 'San Bartolome'),
(6, '19-1327', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(7, '19-1074', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(8, '19-1282', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(9, '17-504', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(10, '19-1300', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(11, '19-1299', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(12, '19-1392', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(13, '22-1679', 'BSA', 'Bachelor of Science in Accountancy', '1st', 'BAAC-1A', 'Batasan'),
(14, '22-1623', 'BSA', 'Bachelor of Science in Accountancy', '1st', 'BAAC-1A', 'Batasan'),
(15, '22-1486', 'BSENT', 'Bachelor of Science in Entrepreneurship', '1st', 'BAAC-1A', 'Batasan'),
(16, '19-1350', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(17, '19-1402', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(18, '19-0718', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(19, '17-1500', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(20, '17-1534', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(21, '19-1307', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(22, '19-1323', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(23, '19-1347', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(24, '20-1273', 'BSIT', 'Bachelor of Science in Information Technology', '3rd', 'SBIT-3G', 'San Bartolome'),
(25, '20-0437', 'BSENT', 'Bachelor of Science in Entrepreneurship', '3rd', 'BAENT-3B', 'Batasan/San Bartolome'),
(26, '18-1546', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(27, '19-0622', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(28, '19-1297', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(29, '19-1283', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4D', 'San Bartolome'),
(30, '19-1213', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4A', 'San Bartolome'),
(31, '19-1229', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4I', 'San Bartolome'),
(32, '17-1446', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4C', 'San Bartolome'),
(33, '19-1380', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4I', 'San Bartolome'),
(34, '19-1235', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4A', 'San Bartolome'),
(35, '19-1377', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4G', 'San Bartolome'),
(36, '19-1204', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4G', 'San Bartolome'),
(37, '19-0902', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4D', 'San Bartolome'),
(38, '19-1281', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4D', 'San Bartolome'),
(39, '19-1211', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4G', 'San Bartolome'),
(40, '19-1280', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4A', 'San Bartolome'),
(41, '19-1267', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4B', 'San Bartolome'),
(42, '19-1381', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4J', 'San Bartolome'),
(43, '20-1188', 'BSENT', 'Bachelor of Science in Entrepreneurship', '3rd', 'SFENT-3A', 'San Francisco'),
(44, '19-1406', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4B', 'San Bartolome'),
(45, '17-1389', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4D', 'San Bartolome'),
(46, '18-0921', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4H', 'San Bartolome'),
(47, '19-0802', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4H', 'San Bartolome'),
(48, '17-1509', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4G', 'San Bartolome'),
(49, '19-1061', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4D', 'San Bartolome'),
(50, '20-0345', 'BSENT', 'Bachelor of Science in Entrepreneurship', '3rd', 'BAENT-3C', 'Batasan'),
(51, '19-1362', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4G', 'San Bartolome'),
(52, '19-1329', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4G', 'San Bartolome'),
(53, '18-3662', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4A', 'San Bartolome'),
(54, '19-1328', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4H', 'San Bartolome'),
(55, '17-1497', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4C', 'San Bartolome'),
(56, '19-1053 ', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4B', 'San Bartolome'),
(57, '17-1259', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4D', 'San Bartolome'),
(58, '17-1264', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4H', 'San Bartolome'),
(59, '19-1238', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4G', 'San Bartolome'),
(60, '19-1330', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4G', 'San Bartolome'),
(61, '19-1202', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4A', 'San Bartolome'),
(62, '19-1291', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4I', 'San Bartolome'),
(63, '19-1348', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4D', 'San Bartolome'),
(64, '19-2448', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4C', 'San Bartolome'),
(65, '20-1051', 'BSENT', 'Bachelor of Science in Entrepreneurship', '3rd', 'SFENT-3B', 'San Francisco'),
(66, '17-1300', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4D', 'San Bartolome'),
(67, '19-1298', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4G', 'San Bartolome'),
(68, '19-1388', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4G', 'San Bartolome'),
(69, '19-1385', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4H', 'San Bartolome'),
(70, '20-0895', 'BSENT', 'Bachelor of Science in Entrepreneurship', '3rd', 'SFIT-4B', 'San Francisco'),
(71, '19-1346', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4B', 'San Bartolome'),
(72, '19-1234', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4A', 'San Bartolome'),
(73, '20-0819', 'BSENT', 'Bachelor of Science in Entrepreneurship', '3rd', 'SFENT-3D', 'San Francisco'),
(74, '20-0194', 'BSA', 'Bachelor of Science in Accountancy', '3rd', 'SFAC-3A', 'San Francisco'),
(75, '21-0427', 'BSENT', 'Bachelor of Science in Entrepreneurship', '2nd', 'BAENT-2B', 'San Bartolome'),
(76, '20-0991', 'BSENT', 'Bachelor of Science in Entrepreneurship', '1st', 'BAENT-1C', 'San Bartolome'),
(77, '20-0954', 'BSENT', 'Bachelor of Science in Entrepreneurship', '3rd', 'SFENT-3A', 'San Francisco'),
(78, '20-0714', 'BSENT', 'Bachelor of Science in Entrepreneurship', '3rd', 'SBENT-3D', 'San Bartolome'),
(79, '21-1585', 'BSIT', 'Bachelor of Science in Information Technology', '2nd', 'SBIT-2D', 'San Bartolome'),
(80, '20-0419', 'BSENT', 'Bachelor of Science in Entrepreneurship', '3rd', 'SFENT-3A', 'San Francisco'),
(81, '20-0364', 'BSENT', 'Bachelor of Science in Entrepreneurship', '3rd', 'SFENT-3D', 'San Francisco'),
(82, '19-0739', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4E', 'San Bartolome'),
(83, '17-1213', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4D', 'San Bartolome'),
(84, '20-0741', 'BSENT', 'Bachelor of Science in Entrepreneurship', '3rd', 'SFENT-3A', 'San Francisco'),
(85, '21-1791', 'BSIT', 'Bachelor of Science in Information Technology', '2nd', 'SBIT-2E', 'San Bartolome'),
(86, '19-0639', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4K', 'San Bartolome'),
(87, '19-0625', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4K', 'San Bartolome'),
(88, '19-1287', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4L', 'San Bartolome'),
(89, '19-0759', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4O', 'San Bartolome'),
(90, '19-1391', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4L', 'San Bartolome'),
(91, '19-1351', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4N', 'San Bartolome'),
(92, '20-1010', 'BSENT', 'Bachelor of Science in Entrepreneurship', '3rd', 'SFENT-3B', 'San Francisco'),
(93, '19-1376', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4J', 'San Bartolome'),
(94, '21-1313', 'BSENT', 'Bachelor of Science in Entrepreneurship', '2nd', 'SFENT-2A', 'San Francisco'),
(95, '20-1671', 'BSIT', 'Bachelor of Science in Information Technology', '3rd', 'SBIT-3B', 'San Bartolome'),
(96, '19-1737', 'BSENT', 'Bachelor of Science in Entrepreneurship', '4th', 'SBIT-4N', 'San Bartolome'),
(97, '20-0882', 'BSENT', 'Bachelor of Science in Entrepreneurship', '4th', 'SBIT-4K', 'San Francisco'),
(98, '17-1247', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4L', 'San Bartolome'),
(99, '19-1290', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4J', 'San Bartolome'),
(100, '19-0809', 'BSIT', 'Bachelor of Science in Information Technology', '4th', 'SBIT-4M', 'San Bartolome');

-- --------------------------------------------------------

--
-- Table structure for table `mis.student_address`
--

CREATE TABLE `mis.student_address` (
  `id` int(11) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `house_no` varchar(55) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(55) NOT NULL,
  `zip_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mis.student_address`
--

INSERT INTO `mis.student_address` (`id`, `student_id`, `house_no`, `street`, `brgy`, `city`, `province`, `district`, `zip_code`) VALUES
(1, '17-1499', '2756', 'Ninada', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1119),
(2, '16-0243', '056', 'Area 1B Luzon Avenue', 'Matandang Balara', 'Quezon City', 'Metro Manila', '3', 1119),
(3, '19-1206', 'Lot 1 Blk 1', 'Madjaas', 'Payatas', 'Quezon City', 'Metro Manila', '2', 1119),
(4, '19-1214', 'BistekVille 19 ', 'Luzon Avenue', 'Matandang Balara', 'Quezon City', 'Metro Manila', '3', 1119),
(5, '19-1230', 'Alley 4', 'Bicol', 'Payatas', 'Quezon City', 'Metro Manila', '2', 1119),
(6, '19-1327', '344', 'Narra', 'Payatas B', 'Quezon City', 'Metro Manila', '2', 1119),
(7, '19-1074', '54-X', 'Poblete', 'Milagrosa, Project 4', 'Quezon City', 'Metro Manila', '3', 1109),
(8, '19-1282', '770', 'Tandang Sora Avenue', 'Matandang Balara', 'Quezon City', 'Metro Manila', '3', 1119),
(9, '17-504', '333 Alley One', 'JP Rizal', 'Bagong Silangan', 'Quezon City', 'Metro Manila', '2', 1119),
(10, '19-1300', 'Pinaglabanan Extension', 'Talanay Area-A', 'Batasan Hills', 'Quezon City', 'Metro Manila', '2', 1126),
(11, '19-1299', '5110 IBP Road', 'Nikon', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1121),
(12, '19-1392', '139 Grp 1 Area B', 'Bansalangin', 'Payatas', 'Quezon City', 'Metro Manila', '2', 1119),
(13, '22-1679', '15A Area 6B Nawasaline', 'K2', 'Holy Spirit', 'Quezon City', 'Metro Manila', '2', 1127),
(14, '22-1623', '116 ', 'Kaligtasan Ext.', 'Holy spirit', 'Quezon City', 'Metro Manila', '2', 1127),
(15, '22-1486', '2', 'Technical Sargent Soldiers Home IBP Road', 'Batasan Hills', 'Quezon City', 'Metro Manila', '2', 1126),
(16, '19-1350', 'Blk 33 Lot 14 ', 'Violago Homes Parkwood Hills', 'Bagong Silangan', 'Quezon City', 'Metro Manila', '2', 1119),
(17, '19-1402', 'Phase 8', 'Peseta', 'North Fairview', 'Quezon City', 'Metro Manila', '5', 1121),
(18, '19-0718', '135 Sauyo Rd', 'Don Julio Gregorio ', 'Sauyo', 'Quezon City', 'Metro Manila', '6', 1116),
(19, '17-1500', '141 Phase 3 ', 'Acorda', 'Payatas B', 'Quezon City', 'Metro Manila', '2', 1119),
(20, '17-1534', 'Block 31 Lot 22', 'Bistekville 2 ', 'Kaliagayahan, Novaliches', 'Quezon City', 'Metro Manila', '5', 1124),
(21, '19-1307', 'Block 2 Lot 18 ', 'Area 7', 'Luzon Avenue', 'Quezon City', 'Metro Manila', '3', 1119),
(22, '19-1323', 'Blk 6 Lot 34 ', 'Bansalangin', 'Payatas B', 'Quezon City', 'Metro Manila', '2', 1116),
(23, '19-1347', 'Blk 12 Lot 1', 'Rowhouse Pilot Drive', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1121),
(24, '20-1273', '3 k-1 Area 6B', 'Nawasaline', 'Holy Spirit', 'Quezon City', 'Metro Manila', '2', 1127),
(25, '20-0437', '17', 'Sto. Ni?o Extension', 'Holy Spirit', 'Quezon City', 'Metro Manila', '2', 1127),
(26, '18-1546', '49-D', 'Sct. Borromeo', 'South Triangle', 'Quezon City', 'Metro Manila', '4', 1103),
(27, '19-0622', '10', 'Sterling Jem 9&10 Subd', 'Tandang Sora', 'Quezon City', 'Metro Manila', '6', 1116),
(28, '19-1297', '155 A Area 7', 'Nawasa Line', 'Holy Spirit', 'Quezon City', 'Metro Manila', '2', 1127),
(29, '19-1283', '37-C', 'Sapphire', 'Payatas B', 'Quezon City', 'Metro Manila', '2', 1119),
(30, '19-1213', '164', 'Kalinisan', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1121),
(31, '19-1229', '', 'Sta. Veronica', 'Payatas', 'Quezon City', 'Metro Manila', '12', 1119),
(32, '17-1446', 'Unit 5', 'Purok 20', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1121),
(33, '19-1380', '11', 'Dama De Noche', 'Payatas A', 'Quezon City', 'Metro Manila', '2', 1119),
(34, '19-1235', '17', 'Flores Damayan', 'SFDM', 'Quezon City', 'Metro Manila', '2', 1104),
(35, '19-1377', '201', 'Mabuhay Compound', 'Sauyo Rd., Novaliches', 'Quezon City', 'Metro Manila', '6', 1116),
(36, '19-1204', 'Block 6 Unit 11', 'Rowhouse', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1121),
(37, '19-0902', 'Merryfield Compound', 'Dizon', 'San Bartolome Novaliches', 'Quezon City', 'Metro Manila', '5', 1116),
(38, '19-1281', '170', 'Don Fabian Ext.', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1121),
(39, '19-1211', '125', 'Don Primitivo', 'Holy Spirit', 'Quezon City', 'Metro Manila', '2', 1127),
(40, '19-1280', '127', 'Ilocos Sur', 'Ramon Magsaysay, Bago Bantay', 'Quezon City', 'Metro Manila', '1', 1105),
(41, '19-1267', '', '', 'Freedom Park, Batasan Hills', 'Quezon City', 'Metro Manila', '2', 1126),
(42, '19-1381', '154', 'Perez', 'Freedom Park, Batasan Hills', 'Quezon City', 'Metro Manila', '2', 1126),
(43, '20-1188', '50', 'Kalamansi', 'Pasong Tamo', 'Quezon City', 'Metro Manila', '6', 1107),
(44, '19-1406', '', 'Mayabya', 'Batasan Hills', 'Quezon City', 'Metro Manila', '2', 1126),
(45, '17-1389', '158', 'San Miguel', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1121),
(46, '18-0921', '', 'Sta. Rita, Sta. Barbara', 'Gulod Nova', 'Quezon City', 'Metro Manila', '5', 1117),
(47, '19-0802', '62 Purok 1A', 'Luzon Ave.', 'Culiat', 'Quezon City', 'Metro Manila', '6', 1128),
(48, '17-1509', '', 'Azucena', 'Payatas A', 'Quezon City', 'Metro Manila', '2', 1119),
(49, '19-1061', '9', 'Pingkian 1', 'Pasong Tamo', 'Quezon City', 'Metro Manila', '6', 1107),
(50, '20-0345', '44 Area 9B', 'Sampaguita', 'Veterans Village', 'Quezon City', 'Metro Manila', '2', 1107),
(51, '19-1362', '2384', 'Bicoleyte', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1121),
(52, '19-1329', '', 'Lower Narra', 'Payatas B', 'Quezon City', 'Metro Manila', '2', 1119),
(53, '18-3662', '', 'Goodwill Homes II', ' Bagbag, Novaliches', 'Quezon City', 'Metro Manila', '5', 1116),
(54, '19-1328', '6B', 'Tiburcio Ext ', 'Krus Na Ligas', 'Quezon City', 'Metro Manila', '4', 1101),
(55, '17-1497', '', '', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1121),
(56, '19-1053 ', '174', 'Banlat Road', 'Tandang Sora', 'Quezon City', 'Metro Manila', '6', 1116),
(57, '17-1259', '3307', 'Francesca Royale', 'Old Sauyo Rd., Novaliches', 'Quezon City', 'Metro Manila', '5', 1116),
(58, '17-1264', '', 'Dirham', 'Phase 8, North Fairview', 'Quezon City', 'Metro Manila', '2', 1121),
(59, '19-1238', '26', 'Jonas, Freedom Park 4', 'Batasan Hills', 'Quezon City', 'Metro Manila', '2', 1126),
(60, '19-1330', '67', 'Lower Narra', 'Payatas B', 'Quezon City', 'Metro Manila', '2', 1119),
(61, '19-1202', 'Purok 14 Unit 5', 'Martinez', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1121),
(62, '19-1291', '25 B', 'Guilder', 'Phase 8 North Fairview', 'Quezon City', 'Metro Manila', '2', 1121),
(63, '19-1348', '', '', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1121),
(64, '19-2448', '6', 'Punay, Novaville', '170', 'Caloocan City', 'Metro Manila', '1', 1400),
(65, '20-1051', 'BLPC ROAD 3', '', 'BAGONG PAG ASA', 'Quezon City', 'Metro Manila', '6', 1105),
(66, '17-1300', '20P', 'Dela Cruz', 'Nagkaisang Nayon Novaliches', 'Quezon City', 'Metro Manila', '5', 1125),
(67, '19-1298', 'Area 3', 'Heron, Sitio Veterans', 'Bagong Silangan', 'Quezon City', 'Metro Manila', '2', 1119),
(68, '19-1388', '136', 'Sampaguita', 'Holy Spirit', 'Quezon City', 'Metro Manila', '2', 1127),
(69, '19-1385', '385 Area 2', 'Eagle, Sitio Veterans ', 'Bagong Silangan', 'Quezon City', 'Metro Manila', '2', 1119),
(70, '20-0895', '455 Area 6', 'Sitio Cabuyao', 'Sauyo', 'Quezon City', 'Metro Manila', '6', 1116),
(71, '19-1346', '32B', 'Kaunlaran ', 'Batasan Hills', 'Quezon City', 'Metro Manila', '2', 1126),
(72, '19-1234', '280', 'Infantry', 'Holy Spirit', 'Quezon City', 'Metro Manila', '2', 1127),
(73, '20-0819', '148', 'Pingkian 1 Central', ' Pasong Tamo', 'Quezon City', 'Metro Manila', '6', 1107),
(74, '20-0194', '99', '', 'Sauyo, Nova', 'Quezon City', 'Metro Manila', '6', 1116),
(75, '21-0427', '757 Area 6 A  ', '', 'Sauyo Rd', 'Quezon City', 'Metro Manila', '6', 1116),
(76, '20-0991', '19', 'Santos', 'Krus na Ligas', 'Quezon City', 'Metro Manila', '5', 1101),
(77, '20-0954', 'Blk 3 Lot 24', 'Lawaan', 'Novahomes', 'Quezon City', 'Metro Manila', '5', 1103),
(78, '20-0714', '772 Area-6', 'Sitio Cabuyao', 'Sauyo Novaliches', 'Quezon City', 'Metro Manila', '5', 1116),
(79, '21-1585', '27 Saplan Cmpd.', 'Do?a Faustina Village 1', 'Culiat', 'Quezon City', 'Metro Manila', '5', 1128),
(80, '20-0419', '', 'Carlos', 'San Bartolome Novaliches', 'Quezon City', 'Metro Manila', '5', 1116),
(81, '20-0364', '', 'Parkland', 'Maligaya Camarin Caloocan ', 'Quezon City', 'Metro Manila', '5', 9969),
(82, '19-0739', '#12F2', 'Bayes', 'Gulod Novaliches', 'Quezon City', 'Metro Manila', '5', 1117),
(83, '17-1213', 'B3 L1', 'Tawid Sapa 2 Phase II', 'Kaligayahan Nova', 'Quezon City', 'Metro Manila', '5', 1124),
(84, '20-0741', '27', 'Ibayo II', 'Bagbag Novaliches', 'Quezon City', 'Metro Manila', '5', 1116),
(85, '21-1791', '71', 'Virginia', 'Gulod Novaliches', 'Quezon City', 'Metro Manila', '5', 1117),
(86, '19-0639', '28', 'Geronimo ', 'Sta Monica Novaliches', 'Quezon City', 'Metro Manila', '5', 1117),
(87, '19-0625', '17', 'San Pablo', 'Gulod Novaliches', 'Quezon City', 'Metro Manila', '5', 1117),
(88, '19-1287', '', 'Taniman de Gloria Extension Area B2 Talanay', 'Batasan Hills', 'Quezon City', 'Metro Manila', '2', 1126),
(89, '19-0759', '12', 'Carnation Ext. Area 2', 'Capri Novaliches', 'Quezon City', 'Metro Manila', '5', 1117),
(90, '19-1391', '23', 'Do?a Rosario Subd', 'Novaliches Proper', 'Quezon City', 'Metro Manila', '5', 1121),
(91, '19-1351', '5046', 'Rolex, IBP Road', 'Commonwealth', 'Quezon City', 'Metro Manila', '2', 1121),
(92, '20-1010', '36', 'Payna', 'Bungad', 'Quezon City', 'Metro Manila', '1', 1105),
(93, '19-1376', '129', 'De Gloria Ext., Talanay area B', 'Batasan Hills', 'Quezon City', 'Metro Manila', '2', 1126),
(94, '21-1313', '104', 'Seminary Road', 'Bahay Toro', 'Quezon City', 'Metro Manila', '1', 1108),
(95, '20-1671', '46', 'Cleofas', 'Pasong Tamo', 'Quezon City', 'Metro Manila', '6', 1107),
(96, '19-1737', '67', 'Tatlong Hari', 'Santa monica, Novaliches', 'Quezon City', 'Metro Manila', '5', 1117),
(97, '20-0882', '66', 'Tatlong Hari', 'Gulod Novaliches', 'Quezon City', 'Metro Manila', '5', 1117),
(98, '17-1247', 'Block 23 lot 31', 'Pechayan Kanan Ilang-Ilangg', 'Pasong Putik Novaliches', 'Quezon City', 'Metro Manila', '5', 1800),
(99, '19-1290', '6, Group 1', 'Atis', 'Payatas B', 'Quezon City', 'Metro Manila', '2', 1119),
(100, '19-0809', '', 'Riverdale', 'Forest hill Subdivision Novaliches', 'Quezon City', 'Metro Manila', '5', 1117);

-- --------------------------------------------------------

--
-- Table structure for table `mis.student_info`
--

CREATE TABLE `mis.student_info` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `extension` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(55) NOT NULL,
  `height` varchar(55) NOT NULL,
  `weight` varchar(55) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mis.student_info`
--

INSERT INTO `mis.student_info` (`id`, `student_id`, `firstname`, `middlename`, `lastname`, `extension`, `age`, `birthdate`, `gender`, `height`, `weight`, `contact_number`, `email`, `id_image`) VALUES
(1, '17-1499', 'Jessica', 'Ombao', 'Bulleque', '', 21, '2001-06-08', 'Female', '4\'9', '37kg', '09123456789', 'jessica.ombao.bulleque@gmail.com', 'student1.jpg'),
(2, '16-0243', 'Mark Melvin', 'Estrera', 'Bacabis', '', 23, '1999-12-08', 'Male', '5\'3', '69kg', '9123456789', 'mark.melvin.bacabis@gmail.com', 'student2.jpg'),
(3, '19-1206', 'Juliana', 'Young', 'Balingasa', '', 21, '2001-07-11', 'Female', '5\'6', '59kg', '9213362300', 'juliana.young.balingasa07112001@gmail.com', 'student1.jpg'),
(4, '19-1214', 'John Nicole', '', 'Abihay', '', 22, '2000-11-24', 'Male', '5\'10', '60kg', '9488922712', 'john.nicole.abihay@gmail.com', 'student2.jpg'),
(5, '19-1230', 'Dexter', 'Sorbeto', 'Rosete', '', 22, '2001-01-10', 'Male', '5\'10', '80kg', '9055632171', 'dexter.sorbeto.rosete@gmail.com', 'student2.jpg'),
(6, '19-1327', 'Angelica', 'Minoza', 'Jalmasco', '', 22, '2000-05-20', 'Female', '5\'4', '48kg', '9127528139', 'angelica.minoza.jalmasco@gmail.com', 'student1.jpg'),
(7, '19-1074', 'Kiara Raye', 'Ponce', 'Carganillo', '', 23, '1999-11-27', 'Female', '5\'2', '55kg', '9064316435', 'kiara.raye.carganillo@gmail.com', 'student1.jpg'),
(8, '19-1282', 'Clarissa', 'Llamera', 'Calubaquib', '', 22, '2001-03-29', 'Female', '5\'2', '40kg', '9770118577', 'clarissa.llamera.calubaquib@gmail.com', 'student1.jpg'),
(9, '17-504', 'Maricar', 'Ablania', 'Arceo', '', 23, '2000-01-22', 'Female', '5\'0', '57kg', '9770176447', 'maricar.ablania.arceo@gmail.com', 'student1.jpg'),
(10, '19-1300', 'Chuck Rey', 'Bogarso', 'Mara-asin', '', 22, '2000-11-21', 'Male', '5\'3', '70kg', '9154512921', 'chuckrey.bogarso.maraasin@gmail.com', 'student2.jpg'),
(11, '19-1299', 'King Jerich', 'Bergonia', 'Dela Cruz', '', 22, '2000-10-01', 'Male', '5\'2', '60kg', '9517872813', 'kingjerich.bergonia.delacruz@gmail.con', 'student2.jpg'),
(12, '19-1392', 'Sofiabelle', 'Blaco', 'Tome', '', 24, '1999-03-03', 'Female', '5\'0', '45kg', '9185125822', 'sofiabelle.tome1@gmail.com', 'student1.jpg'),
(13, '22-1679', 'Glenda', 'Mangaoang', 'Tabil', '', 20, '2003-03-17', 'Female', '5’0', '42kg', '9708212358', 'tabilglenda17@gmail.com', 'student1.jpg'),
(14, '22-1623', 'Jemalyn', 'Satajo', 'Lora', '', 19, '2003-09-23', 'Female', '5\'2', '48kg', '9454481602', 'lora.jemalyn.satajo@gmail.com', 'student1.jpg'),
(15, '22-1486', 'James', '', 'Cuntapay', '', 20, '2002-07-28', 'Male', '5\'6', '60kg', '9994065271', 'jc550542@gmail.com', 'student2.jpg'),
(16, '19-1350', 'Kenneth', 'Salamoding', 'Nunag', '', 21, '2001-08-30', 'Male', '5\'4', '55kg', '9951471086', 'kenneth.s.nunag@gmail.com', 'student2.jpg'),
(17, '19-1402', 'Hazel Joy', 'Colonia', 'Pacomios', '', 22, '2000-10-08', 'Female', '5\'4', '46kg', '9518600619', 'hazel.joy.colonia.pacomios@gmail.com', 'student1.jpg'),
(18, '19-0718', 'Princess Kaye', 'Dudang', 'Mallapre', '', 22, '2000-11-06', 'Female', '5\'3', '47kg', '9054694688', 'princess.kaye.mallapre@gmail.com', 'student1.jpg'),
(19, '17-1500', 'Theresa', 'Duran', 'Lopez', '', 19, '2003-07-06', 'Female', '4\'7', '48kg', '9954693598', 'theresa.duran.lopez@gmail.com', 'student1.jpg'),
(20, '17-1534', 'Israel Yumiri', 'Doctor', 'Chua', '', 21, '2001-06-01', 'Male', '5\'5', '56kg', '9364072062', 'israelyumiri.chua@gmail.com', 'student2.jpg'),
(21, '19-1307', 'Mary Joy', 'Matulac', 'Francisco', '', 22, '2000-12-26', 'Female', '5\'1', '40kg', '9491453909', 'mary.joy.matulac.francisco@gmail.com', 'student1.jpg'),
(22, '19-1323', 'Justine', 'Dela Torre', 'Halliasgo', '', 22, '2000-08-12', 'Female', '4\'7', '45kg', '9976682431', 'justinedelatorre56@gmail.com', 'student1.jpg'),
(23, '19-1347', 'Lawrence', 'Alburo', 'Tabunan', '', 22, '2000-06-13', 'Male', '5\'8', '55kg', '9063434096', 'lawrence.alburo.tabunan@gmail.com', 'student2.jpg'),
(24, '20-1273', 'Kristine', 'Galay', 'Baja', '', 20, '2002-05-09', 'Female', '5\'1', '56kg', '9463549761', 'baja.kristine19@gmail.com', 'student1.jpg'),
(25, '20-0437', 'Ma. Daphnie', 'Cacayan', 'Baltazar', '', 21, '2001-10-14', 'Female', '5\'2', '48kg', '9451137291', 'madaphnie.baltazar14@gmail.com', 'student1.jpg'),
(26, '18-1546', 'Clarice', 'Perez', 'Obias', '', 22, '2000-05-29', 'Female', '5\'3', '55kg', '9289581836', 'clarice.perez.obias@gmail.com', 'student1.jpg'),
(27, '19-0622', 'Leonardo', 'Peñaflorida', 'Marco', 'Jr.', 23, '1999-05-17', 'Male', '5\'8', '70kg', '9212001360', 'rjmarco924@gmail.com', 'student2.jpg'),
(28, '19-1297', 'Regine Marie', 'Casabuena', 'Bation', '', 22, '2001-03-30', 'Female', '4\'8', '49kg', '9092875093', 'regine.marie.casabuena.bation@gmail.com', 'student1.jpg'),
(29, '19-1283', 'Angelika Dinah', 'Tamondez', 'Ranuco', '', 22, '2001-03-03', 'Female', '5\'2', '58kg', '9291407345', 'angelika.dinah.t.ranuco@gmail.com', 'student1.jpg'),
(30, '19-1213', 'Rofer Jhone', 'Villamor ', 'Aguidan', '', 22, '2000-07-04', 'Male', '5\'1', '50kg', '9462316657', 'rofer.jhone.aguidan@gmail.com', 'student2.jpg'),
(31, '19-1229', 'Charles Daniel', 'Donggoy', 'Habay', '', 22, '2000-10-17', 'Male', '5\'4', '50kg', '9953310799', 'charles.daniel.habay@gmail.com', 'student2.jpg'),
(32, '17-1446', ' Katrina', ' Buenconsejo', 'Flagne', '', 21, '2001-09-12', 'Male', '5\'4', '50kg', '9983682252', 'katrina.buenconsejo.flagne@gmail.com', 'student1.jpg'),
(33, '19-1380', 'Jayhan', ' Gabriel ', ' Abeleda', '', 24, '1999-02-06', 'Female', ' 5\'3', '50kg', '9297312288', 'jayhan.gabriel.abeleda@gmail.com', 'student1.jpg'),
(34, '19-1235', 'Danica Rose ', 'Merjudio', 'Tabasa', '', 22, '2001-02-24', 'Female', '4\'9', '47kg', '9606324177', 'danica.rose.merjudio.tabasa@gmail.com ', 'student1.jpg'),
(35, '19-1377', 'Wilmer', 'Apolinario', 'Cabayao', '', 22, '2000-05-30', 'Male', '5\'6', '60kg', '9291407345', 'wilmer.cabayao@gmail.com', 'student2.jpg'),
(36, '19-1204', 'Caryl Joy', 'Parma ', 'Tercenio', '', 22, '2000-09-10', 'Female', '5\'3', '50kg', '9266755612', 'caryl.joy.tercenio@gmail.com', 'student1.jpg'),
(37, '19-0902', 'Mary Grace', 'Aquino', 'Suano', '', 22, '2000-12-18', 'Female', '5\'0', '45kg', '9304126175', 'marygracesuano19@gmail.com', 'student1.jpg'),
(38, '19-1281', 'Caizzy Lyne', 'Zerna', 'Mugas', '', 23, '1999-08-17', 'Female', '5\'2', '60kg', '9952859004', 'caizzy.lyne.mugas@gmail.com', 'student1.jpg'),
(39, '19-1211', 'Mark Jay', 'Porminto', 'Serafin', '', 21, '2001-12-19', 'Male', '5\'6', '43kg', '9085168569', 'mark.jay.serafin@gmail.com', 'student2.jpg'),
(40, '19-1280', 'Lance Alfeo', 'Villarino', 'Parangalan', '', 21, '2000-04-21', 'Male', '5\'5', '72kg', '9338539940', 'lance.alfeo.parangalan04212000@gmail.com', 'student2.jpg'),
(41, '19-1267', 'Jayson', 'Pantinople', 'Montallana', '', 21, '2001-09-09', 'Male', '5\'6', '55kg', '9432937313', 'jayson.pantinople.montallana@gmail.com', 'student2.jpg'),
(42, '19-1381', 'Xytuz Shean', 'Luto', 'Reponte', '', 21, '2001-05-08', 'Female', '5\'1', '53kg', '9301038872', 'xytuzsheanreponte@gmail.com', 'student1.jpg'),
(43, '20-1188', 'Andrea', ' Ferrera', 'Tiagan', '', 21, '2002-02-19', 'Female', '4\'9', '40kg', '9514402045', 'andrea.tiagan019@gmail.com', 'student1.jpg'),
(44, '19-1406', 'Nikko', 'Ocampo', 'Bayan', '', 24, '1998-02-05', 'Male', '5\'7', '90kg', '9935654750', 'niks.bayan@gmail.com', 'student1.jpg'),
(45, '17-1389', 'Nicole', 'Yu', 'Delantar', '', 22, '2000-11-17', 'Female', '5\'1', '58kg', '9362210271', 'nicole.y.delantar@gmail.com', 'student1.jpg'),
(46, '18-0921', 'Emmanuel David', 'Reña', 'Lopez', '', 22, '2000-06-30', 'Male', '5\'7', '70kg', '9058600196', 'emmanuel.david.lopez30@gmail.com', 'student2.jpg'),
(47, '19-0802', 'Joshua', 'Dayday', 'Cordero', '', 22, '2000-08-15', 'Male', '5\'4', '55kg', '9550963791', 'joshua.dayday.cordero@gmail.com', 'student2.jpg'),
(48, '17-1509', 'Reniel John', 'Ong', 'Adarlo', '', 21, '2001-06-15', 'Male', '5\'3', '71kg', '9652364284', 'reniel.john.adarlo@gmail.com', 'student2.jpg'),
(49, '19-1061', 'Riza', 'Rivera', 'Marcos', '', 23, '1999-08-08', 'Female', '4\'11', '60kg', '9153201850', 'riza.rivera.marcos08081999@gmail.com', 'student1.jpg'),
(50, '20-0345', 'May Ann', 'Macasinag', 'Agbayani', '', 21, '2001-05-11', 'Female', '5\'5', '59kg', '9306678095', 'agbayanimayannm@gmail.com', 'student1.jpg'),
(51, '19-1362', 'Avery Christine', 'Antonio', 'Salvador', '', 23, '1999-09-21', 'Female', '5\'3', '43kg', '9301758202', 'avery.christine.salvador@gmail.com', 'student1.jpg'),
(52, '19-1329', 'Christine Joy', 'Dumadigo', 'Bona', '', 22, '2000-12-09', 'Female', '5\'5', '65kg', '9086097078', 'christinejoybona12@gmail.com', 'student1.jpg'),
(53, '18-3662', 'Angelica', '', 'Bungay', '', 24, '1999-02-03', 'Female', '5\'3', '53kg', '09613319987', 'angelica.bungay.bungay@gmail.com', 'student1.jpg'),
(54, '19-1328', 'Andrea', 'Dela Pena', 'Rivera', '', 21, '2001-05-10', 'Female', '5\'8', '65kg', '9219700503', 'andrea.may.delapena.rivera@gmail.com ', 'student1.jpg'),
(55, '17-1497', 'Lance Vincent ', 'De Guzman ', 'Garcia ', '', 22, '2000-09-06', 'Male', '5\'6', '70kg', '9099151379', 'lance.vincent.deguzman.garcia@gmail.com', 'student2.jpg'),
(56, '19-1053 ', 'Angelica Mae', '', 'Tibang', '', 23, '1999-10-31', 'Female', '4’11', '37kg', '9466509975', 'angelica.mae.tibang10311999@gmail.com', 'student1.jpg'),
(57, '17-1259', 'Bianca Lou', 'Cabaluna', 'Mendoza', '', 22, '2000-08-15', 'Female', '5\'4', '51kg', '9279590197', 'bianca.lou.mendoza08152000@gmail.com', 'student1.jpg'),
(58, '17-1264', 'Princes Joana ', 'Bulado', 'Irinco', '', 22, '2000-09-28', 'Female', '5\'2', '40kg', '9673042003', 'princes.joana.bulado.irinco@gmail.com', 'student1.jpg'),
(59, '19-1238', 'Luis Liam ', 'Ortega', 'Baly', '', 25, '1997-12-30', 'Male', '6\'0', '65kg', '9567167879', 'Luisliam.baly@gmail.com', 'student2.jpg'),
(60, '19-1330', 'Chemuel', 'Echavez', 'Escribano', '', 22, '2000-09-20', 'Male', '5\'6', '55kg', '9306709978', 'escribanoc.qcydoqcu@gmail.com', 'student2.jpg'),
(61, '19-1202', 'Kristine Joy', 'Magalong', 'Castaneda ', '', 22, '2000-11-24', 'Female', '5\'2', '48kg', '9677168386', 'kristine.joy.magalong.castaneda@gmail.com', 'student1.jpg'),
(62, '19-1291', 'Kim', 'Galve', 'Villarma', '', 22, '2000-08-08', 'Female', '5\'0', '50kg', '9457387673', 'kimgalvevillarma@gmail.com', 'student1.jpg'),
(63, '19-1348', 'Jonna Mae', 'Villarosa', 'Deocariza', '', 22, '2000-05-01', 'Female', '5\'4', '48kg', '9271432661', 'jonna.mae.deocariza05012000@gmail.com', 'student1.jpg'),
(64, '19-2448', 'Gabriel', 'Salafranca', 'Dela Peña', '', 21, '2001-10-13', 'Male', '5\'6', '60kg', '9563782161', 'gdp101301@gmail.com', 'student2.jpg'),
(65, '20-1051', 'John Willy', 'Emen', 'Quizan', '', 22, '2001-01-03', 'Male', '5\'1', '44kg', '09364536239', 'johnwilly.quizan@gmail.com', 'student2.jpg'),
(66, '17-1300', 'Jia', 'Amarille', 'Castorico', '', 22, '2000-07-25', 'Female', '5\'2', '65kg', '9501409348', 'jia.amarille.castorico@gmail.com', 'student1.jpg'),
(67, '19-1298', 'Ma. Eloisa', 'Fajardo', 'De Leon', '', 23, '1999-09-03', 'Female', '5\'1', '55kg', '9122173293', 'ma.eloisa.fajardo.deleon@gmail.com', 'student1.jpg'),
(68, '19-1388', 'John Rey', 'Taniega', 'Consulta', '', 22, '2000-07-25', 'Male', '5\'9', '70kg', '9092444131', 'john.rey.taniega.consulta@gmail.com', 'student2.jpg'),
(69, '19-1385', 'Mharnel', 'Agpalza', 'Dela Cruz', '', 23, '1999-09-05', 'Male', '4\'9', '50kg', '9489689908', 'mharnel.agpalza.delacruz@gmail.com', 'student2.jpg'),
(70, '20-0895', 'Kayzale', 'Barcebal', 'Maramag', '', 22, '2001-03-26', 'Female', '5\'4', '51kg', '9511839245', 'kayzale.maramag26@gmail.com', 'student1.jpg'),
(71, '19-1346', 'Ramon', 'Mabalot', 'de Guzman', 'Jr.', 22, '2000-07-21', 'Male', '5\'5', '50kg', '9055777043', 'ramonjrdeguzman993@gmail.com', 'student2.jpg'),
(72, '19-1234', 'Nicole', 'Argente', 'Nartea', '', 21, '2001-07-12', 'Female', '5\'1', '52kg', '9959542994', 'nicole.argente.nartea', 'student1.jpg'),
(73, '20-0819', 'Aldine', 'Lery', 'Ladjabangsa', '', 21, '2001-12-09', 'Male', '5\'7', '64kg', '9182150129', 'aldine.ladjabangsa09@gmail.com', 'student2.jpg'),
(74, '20-0194', 'Rubielyn', 'Judiadan', 'Pasaol', '', 21, '2001-12-26', 'Female', '5\'1', '37kg', '9218987037', 'rubielyn.pasaol023@gmail.com', 'student1.jpg'),
(75, '21-0427', 'Honeylyn', 'Valenzuela', 'Minoy', '', 20, '2002-04-30', 'Female', '4\'9', '49kg', '9465725517', 'minoy.honeylyn.04302002@gmail.com', 'student1.jpg'),
(76, '20-0991', 'Acer Austin', 'Martinez', 'Osorio', '', 21, '2001-07-10', 'Male', '5\'11', '64kg', '9161687081', 'osorio.aceraustin10@gmail.com', 'student2.jpg'),
(77, '20-0954', 'Jhon Carl', 'Potot', 'Navarro', '', 21, '2001-12-19', 'Male', '5\'8', '84kg', '9638640161', 'jhoncarl.navarro091@gmail.com', 'student2.jpg'),
(78, '20-0714', 'Camille', 'Abayon', 'Gacula', '', 21, '2002-03-20', 'Female', '5\'2', '48kg', '9128723456', 'camille.gacula020@gmail.com', 'student1.jpg'),
(79, '21-1585', 'Erron Jay', 'Delacruz', 'Acuesta', '', 20, '2003-04-12', 'Male', '5\'5', '58kg', '99887675675', 'acuesta.erronjay.04122003@gmail.com', 'student2.jpg'),
(80, '20-0419', 'Josemari', 'Carlos', 'Avellana', '', 20, '2002-05-30', 'Male', '5\'5', '55kg', '9266969209', 'josemari.avellana023@gmail.com', 'student2.jpg'),
(81, '20-0364', 'Emmanuel', 'Amper', 'Alejo', '', 21, '2001-06-25', 'Male', '5\'4', '54kg', '09266206584', 'eemmanalejo@gmail.com', 'student1.jpg'),
(82, '19-0739', 'EmilJhon', 'Moscoso', 'Bernardo', '', 22, '2001-03-14', 'Male', '5\'7', '63kg', '9498662446', 'emiljhon.bernardo@gmail.com', 'student2.jpg'),
(83, '17-1213', 'Jorick Ivan', 'Javier', 'Layan', '', 21, '2001-05-10', 'Male', '5\'3', '50kg', '9758618983', 'jorick.ivan.javier.layan@gmail.com', 'student2.jpg'),
(84, '20-0741', 'Arcel', 'Bagtas', 'Garcia', '', 21, '2001-12-31', 'Female', '5\'5', '44kg', '9467106275', 'arcelgarcia926@gmail.com', 'student1.jpg'),
(85, '21-1791', 'Divine Grace', 'Gonzaga', 'Papa', '', 20, '2002-12-27', 'Female', '5\'1', '40kg', '9163004593', 'papa.divinegrace.12272002@gmail.com', 'student1.jpg'),
(86, '19-0639', 'James Paulo ', 'Bonguit', 'Tilos', '', 22, '2001-03-05', 'Male', '5\'10', '70kg', '9518631135', 'james.paulo.tilos@gmail.com', 'student2.jpg'),
(87, '19-0625', 'Sharlotte', 'Asoño', 'Oronce', '', 22, '2001-04-08', 'Female', '5\'3', '50kg', '9105785261', 'sharlotte.oronce.040801@gmail.com', 'student1.jpg'),
(88, '19-1287', 'Gwenn-Earl', 'Mondido', 'Mumar', '', 22, '2000-11-24', 'Female', '5\'0', '60kg', '9606326831', 'gwennearl.mumar@gmail.com', 'student1.jpg'),
(89, '19-0759', 'Ahra Marie', 'Erracho', 'Enovejas', '', 22, '2001-01-07', 'Female', '5\'2', '70kg', '9152262085', 'ahra.marie.erracho@gmail.com', 'student1.jpg'),
(90, '19-1391', 'Lady Lee', '', 'Bercadez', '', 21, '2001-04-25', 'Female', '5\'2', '49kg', '9632939276', 'ladylee.bercadez@gmail.com', 'student1.jpg'),
(91, '19-1351', 'Maria Lyka', 'Flores', 'Aumentado', '', 22, '2000-09-13', 'Female', '5\'4', '80kg', '9205501885', 'aumentadolyka171@gmail.com', 'student1.jpg'),
(92, '20-1010', 'Dexter', '', 'Pambuena', '', 22, '2000-11-28', 'Male', '5\'3', '75kg', '9510593302', 'dexter.pambuena028@gmail.com', 'student2.jpg'),
(93, '19-1376', 'Kelyn', 'Artiola', 'Rapal', '', 22, '2000-05-23', 'Female', '5\'5', '158', '9478830395', 'kelyn.mae.rapal023@gmail.com', 'student1.jpg'),
(94, '21-1313', 'RICHARD', 'BUENDIA', 'CHAVEZ', 'JR.', 21, '2001-11-08', 'Male', '5\'9', '85kg', '9950862838', 'chavezjr.richard.11082001@gmail.com', 'student2.jpg'),
(95, '20-1671', 'Aldrin', 'Dinglasa', 'Moquete', '', 21, '2002-02-23', 'Male', '5\'10', '50kg', '9081776594', 'aldrin.moquete023@gmail.com', 'student2.jpg'),
(96, '19-1737', 'James Miguel', 'Labudahon', 'Mauro', '', 22, '2000-07-13', 'Male', '5\'2', '64kg', '9511547136', 'jamesmiguellabudahonmauro@gmail.com', 'student2.jpg'),
(97, '20-0882', 'Justin', 'Ofreneo', 'Mananghaya', '', 21, '2001-06-29', 'Female', '4\'11', '43kg', '9127989749', 'justin.mananghaya023@gmail.com', 'student1.jpg'),
(98, '17-1247', 'James Ryan', 'Fernandez', 'Ilao', '', 23, '2001-03-10', 'Male', '5\'7', '69kg', '9122553293', 'jame.ryan.fernandez.ilao@gmail.com', 'student2.jpg'),
(99, '19-1290', 'Wendilyn', 'Credo', 'Donato', '', 22, '2000-12-05', 'Female', '4\'10', '46kg', '9386017090', 'wendilyn.credo.donato@gmail.com', 'student1.jpg'),
(100, '19-0809', 'Aira Mae', 'Eramis', 'Encarnado', '', 22, '2000-12-23', 'Female', '5\'2', '53kg', '9077192390', 'aira.mae.encarnado@gmail.com', 'student1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(255) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `campus` varchar(50) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `contact_num` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `yrs_of_service` int(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `isArchive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `emp_id`, `username`, `password`, `profile_pic`, `lastname`, `firstname`, `middlename`, `gender`, `position`, `campus`, `Department`, `contact_num`, `email`, `yrs_of_service`, `qr_code`, `birthdate`, `isArchive`) VALUES
(1, '23-1234', 'SN231742', 'casipit123', 'macasipitrn.JPG', 'Casipit', 'Mary Ann', 'B.', 'Female', 'School Nurse', 'Batasan', 'School Clinic Department', '09123456789', 'julsybalingasa@gmail.com', 5, '22-1234', '1996-07-11', 0),
(4, '23-8435', 'SN239564', 'bediola123', 'machingrn.JPG', 'Ching', 'Marie Angeline', 'S.', 'Female', 'School Nurse', 'Batasan', 'School Clinic Department', '09987654321', 'zarnaihmarchessa@gmail.com', 5, '22-8435', '1994-02-02', 0),
(9, '23-4873', 'SN234873', 'aJedXVC6WUR0i9W', 'abendiolarn.JPG', 'Bendiola', 'Analyn', 'A.', 'Female', 'School Nurse', 'San Bartolome', 'School Clinic Department', '09123456789', 'melvinbacabis19@gmail.com', 0, '23-4873', NULL, 0),
(10, '23-5120', 'SN235120', '0HWI8D3cfnv$BHt', 'gsayotorn.JPG', 'Sayoto', 'Glenn', 'R.', 'Male', 'School Nurse', 'San Francisco', 'School Clinic Department', '009987654321', 'julsbalingasa@gmail.com', 0, '23-5120', NULL, 0),
(11, '23-9560', 'SN239560', '8vIoVdLChYGTE0I', 'wnmalquezrn.JPG', 'Malquez', 'William Nelson', 'L.', 'Male', 'School Nurse', 'San Francisco', 'School Clinic Department', '09123456789', 'julsbalingasa@gmail.com', 0, '23-9560', NULL, 0),
(13, '23-0960', 'SN230960', '$lCHNhcPX28HYNg', 'rpascualrn.JPG', 'Pascual', 'Rochell', 'I.', 'Female', 'Chief/School Nurse', 'San Bartolome', 'School Clinic Department', '09987654321', 'julsbalingasa@gmail.com', 0, '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nurse_schedule`
--

CREATE TABLE `nurse_schedule` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `schedule_day` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse_schedule`
--

INSERT INTO `nurse_schedule` (`id`, `emp_id`, `schedule_day`) VALUES
(1, '23-8435', 'Monday'),
(2, '23-8435', 'Tuesday'),
(3, '23-8435', 'Friday'),
(4, '23-1234', 'Monday'),
(5, '23-1234', 'Wednesday'),
(6, '23-1234', 'Friday'),
(7, '23-5846', 'Tuesday'),
(8, '23-5846', 'Thursday'),
(9, '23-5846', 'Saturday'),
(10, '23-2153', 'Tuesday'),
(11, '23-2153', 'Friday'),
(12, '23-4873', 'Tuesday'),
(13, '23-4873', 'Thursday'),
(14, '23-4873', 'Saturday'),
(15, '23-5120', 'Monday'),
(16, '23-5120', 'Wednesday'),
(17, '23-5120', 'Friday'),
(18, '23-9560', 'Monday'),
(19, '23-9560', 'Tuesday'),
(20, '23-9560', 'Wednesday'),
(21, '23-0192', 'Monday'),
(22, '23-0192', 'Tuesday'),
(23, '23-0192', 'Friday'),
(24, '23-0192', 'Saturday'),
(25, '23-8047', 'Monday'),
(26, '23-8047', 'Tuesday'),
(27, '23-8047', 'Friday'),
(28, '23-8047', 'Saturday'),
(29, '23-7130', 'Monday'),
(30, '23-7130', 'Tuesday'),
(31, '23-7130', 'Wednesday'),
(32, '23-7130', 'Thursday'),
(33, '23-7130', 'Friday'),
(34, '23-7130', 'Saturday'),
(35, '23-0960', 'Monday'),
(36, '23-0960', 'Tuesday'),
(37, '23-0960', 'Thursday'),
(38, '23-0960', 'Friday'),
(39, '23-1954', 'Monday'),
(40, '23-1954', 'Wednesday'),
(41, '23-1954', 'Friday'),
(42, '23-8890', 'Monday'),
(43, '23-8890', 'Wednesday'),
(44, '23-8890', 'Friday'),
(45, '23-3564', 'Monday'),
(46, '23-3564', 'Wednesday'),
(47, '23-3564', 'Friday'),
(48, '23-5719', 'Monday'),
(49, '23-5719', 'Wednesday'),
(50, '23-5719', 'Friday'),
(51, '23-1674', 'Monday'),
(52, '23-1674', 'Wednesday'),
(53, '23-1674', 'Friday'),
(54, '23-7703', 'Monday'),
(55, '23-7703', 'Wednesday'),
(56, '23-7703', 'Friday'),
(57, '23-2943', 'Monday'),
(58, '23-6943', 'Monday'),
(59, '23-2943', 'Wednesday'),
(60, '23-6943', 'Wednesday'),
(61, '23-2943', 'Friday'),
(62, '23-6943', 'Friday'),
(63, '23-0162', 'Tuesday'),
(64, '23-0162', 'Thursday'),
(65, '23-0162', 'Friday'),
(66, '23-0291', 'Monday'),
(67, '23-0291', 'Tuesday'),
(68, '23-0291', 'Wednesday'),
(69, '23-4060', 'Monday'),
(70, '23-4060', 'Tuesday'),
(71, '23-4060', 'Wednesday'),
(72, '23-4060', 'Thursday'),
(73, '23-4060', 'Friday'),
(74, '23-4060', 'Saturday'),
(75, '23-8502', 'Monday'),
(76, '23-8502', 'Tuesday'),
(77, '23-8502', 'Wednesday'),
(78, '23-8502', 'Thursday'),
(79, '23-8502', 'Friday'),
(80, '23-8502', 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `sample_stud_data`
--

CREATE TABLE `sample_stud_data` (
  `id` int(6) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sample_stud_data`
--

INSERT INTO `sample_stud_data` (`id`, `student_id`, `Status`) VALUES
(1, '17-1499', 'Cleared'),
(2, '16-0243', 'Cleared'),
(3, '19-1206', 'Cleared'),
(4, '19-1214', 'Not Cleared'),
(5, '19-1230', 'Not Cleared'),
(6, '19-1327', 'Not Cleared'),
(7, '19-1074', 'Not Cleared'),
(8, '19-1282', 'Not Cleared'),
(9, '17-504', 'Not Cleared'),
(10, '19-1300', 'Not Cleared'),
(11, '19-1299', 'Not Cleared'),
(12, '19-1392', 'Not Cleared'),
(13, '22-1679', 'Cleared'),
(14, '22-1623', 'Cleared'),
(15, '22-1486', 'Cleared'),
(16, '19-1350', 'Not Cleared'),
(17, '19-1402', 'Cleared'),
(18, '19-0718', 'Cleared'),
(19, '17-1500', 'Cleared'),
(20, '17-1534', 'Cleared'),
(21, '19-1307', 'Cleared'),
(22, '19-1323', 'Cleared'),
(23, '19-1347', 'Cleared'),
(24, '20-1273', 'Cleared'),
(25, '20-0437', 'Cleared'),
(26, '18-1546', 'Cleared'),
(27, '19-0622', 'Cleared'),
(28, '19-1297', 'Cleared'),
(29, '19-1283', 'Cleared'),
(30, '19-1213', 'Cleared'),
(31, '19-1229', 'Cleared'),
(32, '17-1446', 'Cleared'),
(33, '19-1380', 'Cleared'),
(34, '19-1235', 'Cleared'),
(35, '19-1377', 'Cleared'),
(36, '19-1204', 'Cleared'),
(37, '19-0902', 'Cleared'),
(38, '19-1281', 'Cleared'),
(39, '19-1211', 'Cleared'),
(40, '19-1280', 'Cleared'),
(41, '19-1267', 'Cleared'),
(42, '19-1381', 'Cleared'),
(43, '20-1188', 'Cleared'),
(44, '19-1406', 'Cleared'),
(45, '17-1389', 'Cleared'),
(46, '18-0921', 'Cleared'),
(47, '19-0802', 'Cleared'),
(48, '17-1509', 'Cleared'),
(49, '19-1061', 'Cleared'),
(50, '20-0345', 'Cleared'),
(51, '19-1362', 'Cleared'),
(52, '19-1329', 'Cleared'),
(53, '18-3662', 'Cleared'),
(54, '19-1328', 'Cleared'),
(55, '17-1497', 'Cleared'),
(56, '19-1053 ', 'Not Cleared'),
(57, '17-1259', 'Not Cleared'),
(58, '17-1264', 'Not Cleared'),
(59, '19-1238', 'Not Cleared'),
(60, '19-1330', 'Not Cleared'),
(61, '19-1202', 'Not Cleared'),
(62, '19-1291', 'Cleared'),
(63, '19-1348', 'Cleared'),
(64, '19-2448', 'Cleared'),
(65, '19-0622', 'Cleared'),
(66, '17-1300', 'Cleared'),
(67, '19-1298', 'Cleared'),
(68, '19-1388', 'Cleared'),
(69, '19-1385', 'Cleared'),
(70, '20-0895', 'Cleared'),
(71, '19-1346', 'Cleared'),
(72, '19-1234', 'Cleared'),
(73, '20-0819', 'Cleared'),
(74, '20-0194', 'Cleared'),
(75, '21-0427', 'Cleared'),
(76, '20-0991', 'Cleared'),
(77, '20-0954', 'Cleared'),
(78, '20-0714', 'Cleared'),
(79, '21-1585', 'Cleared'),
(80, '20-0419', 'Cleared'),
(81, '20-0364', 'Cleared'),
(82, '19-0739', 'Cleared'),
(83, '17-1213', 'Cleared'),
(84, '20-0741', 'Cleared'),
(85, '21-1791', 'Cleared'),
(86, '19-0639', 'Cleared'),
(87, '19-0625', 'Cleared'),
(88, '19-1287', 'Cleared'),
(89, '19-0759', 'Cleared'),
(90, '19-1391', 'Cleared'),
(91, '19-1351', 'Cleared'),
(92, '20-1010', 'Cleared'),
(93, '19-1376', 'Cleared'),
(94, '21-1313', 'Cleared'),
(95, '20-1671', 'Cleared'),
(96, '19-1737', 'Cleared'),
(97, '20-0882', 'Cleared'),
(98, '17-1247', 'Cleared'),
(99, '19-1290', 'Cleared'),
(100, '19-0809', 'Cleared'),
(101, '17-1499', 'Cleared'),
(102, '17-1499', 'Cleared'),
(103, '17-1499', 'Cleared'),
(104, '17-1499', 'Cleared'),
(105, '17-1499', 'Cleared'),
(106, '16-0243', 'Cleared'),
(107, '17-1499', 'Cleared'),
(108, '17-1499', 'Cleared'),
(109, '17-1499', 'Cleared');

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE `student_account` (
  `id` int(11) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` int(6) NOT NULL,
  `isVerified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_account`
--

INSERT INTO `student_account` (`id`, `student_id`, `email`, `password`, `otp`, `isVerified`) VALUES
(17, '17-1499', 'jessica.ombao.bulleque@gmail.com', 'chickennuggets', 247265, 1),
(20, '19-1206', 'juliana.young.balingasa07112001@gmail.com', 'julianabalingasa', 576833, 1),
(27, '19-1214', 'john.nicole.abihay@gmail.com', 'nikol123', 80766, 1),
(32, '19-1323', 'justinedelatorre56@gmail.com', 'Sample123', 448485, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `clinic_status` varchar(55) NOT NULL,
  `date_register` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stud_appointment`
--

CREATE TABLE `stud_appointment` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `app_type` varchar(55) NOT NULL,
  `app_reason` varchar(255) NOT NULL,
  `app_date` date NOT NULL,
  `app_time` varchar(55) NOT NULL,
  `date_apply` datetime NOT NULL,
  `app_status` varchar(55) NOT NULL,
  `app_qr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_appointment`
--

INSERT INTO `stud_appointment` (`id`, `reference_no`, `student_id`, `app_type`, `app_reason`, `app_date`, `app_time`, `date_apply`, `app_status`, `app_qr`) VALUES
(1, 'MED3YHM28B1PQPB', '19-1214', 'Medical', 'Pass docu', '2023-04-27', '10:00 AM - 12:00 PM', '2023-04-27 09:57:22', 'Done', 'MED3YHM28B1PQPB.png'),
(2, 'MED52JH5J3ORI7J', '19-1206', 'Medical', 'Pass docu', '2023-04-29', '10:00 AM - 12:00 PM', '2023-04-28 15:49:36', 'Done', 'MED52JH5J3ORI7J.png'),
(3, 'MED33I07QAG6P7X', '17-1499', 'Medical', 'Stomach Ache', '2023-04-29', '8:00 AM - 10:00 AM', '2023-04-28 19:39:57', 'Done', 'MED33I07QAG6P7X.png'),
(4, 'MEDBOPJRUYFIRMF', '17-1499', 'Medical', 'Sample appointment ', '2023-04-30', '1:00 PM - 3:00 PM', '2023-04-29 20:06:11', 'Done', 'MEDBOPJRUYFIRMF.png'),
(5, 'DEN6BYNCQVGSEOD', '17-1499', 'Dental', 'Tooth extraction', '0000-00-00', '8:00 AM - 10:00 AM', '2023-04-30 09:38:17', 'Done', 'DEN6BYNCQVGSEOD.png'),
(6, 'MEDFH4EYHSNT4V4', '19-1214', 'Medical', 'Updated Medical Requirements', '0000-00-00', '8:00 AM - 10:00 AM', '2023-04-30 10:27:58', 'Done', 'MEDFH4EYHSNT4V4.png'),
(7, 'MEDWFBL7MDLFQOJ', '17-1499', 'Medical', 'documents', '2023-05-11', '10:00 AM - 12:00 PM', '2023-05-03 12:19:09', 'Done', 'MEDWFBL7MDLFQOJ.png'),
(8, 'MEDB5UWXJAQA50M', '17-1499', 'Medical', 'Pass docu', '2023-05-05', '10:00 AM - 12:00 PM', '2023-05-03 15:27:45', 'Done', 'MEDB5UWXJAQA50M.png'),
(9, 'MED9P0CMUP9V5H0', '17-1499', 'Medical', 'Pass Docu', '2023-05-05', '8:00 AM - 10:00 AM', '2023-05-04 06:15:24', 'scheduled', 'MED9P0CMUP9V5H0.png'),
(10, 'MED7BYOR7F8VNBY', '19-1323', 'Medical', 'Pass docu', '2023-05-05', '8:00 AM - 10:00 AM', '2023-05-04 09:22:33', 'scheduled', 'MED7BYOR7F8VNBY.png'),
(15, 'MEDXL73D7AA7BOX', '19-1206', 'Medical', 'PASS DOCU', '2023-05-12', '8:00 AM - 10:00 AM', '2023-05-04 10:10:34', 'Done', 'MEDXL73D7AA7BOX.png'),
(16, 'MEDQPV6JL0NYP4O', '19-1206', 'Medical', 'safdsgdfgdf', '2023-05-05', '', '2023-05-04 11:00:52', 'scheduled', 'MEDQPV6JL0NYP4O.png'),
(17, 'MEDH9LLMSFL4SVA', '19-1206', 'Medical', 'hfkf', '2023-05-05', '', '2023-05-04 11:03:31', 'scheduled', 'MEDH9LLMSFL4SVA.png'),
(18, 'MED4JJ6OL552O8X', '19-1206', 'Medical', 'ghj', '2023-05-05', '', '2023-05-04 11:03:55', 'scheduled', 'MED4JJ6OL552O8X.png'),
(19, 'MEDG1HINHEU4JWO', '19-1206', 'Medical', 'jfkj', '2023-05-05', '', '2023-05-04 11:04:16', 'scheduled', 'MEDG1HINHEU4JWO.png'),
(20, 'MEDH2NRVIKVL9F2', '19-1206', 'Medical', 'khfvhkfh', '0000-00-00', '', '2023-05-04 11:04:33', 'scheduled', 'MEDH2NRVIKVL9F2.png'),
(21, 'MEDO7ZU40HSJ15F', '19-1206', 'Medical', 'hvkjvk', '2023-05-05', '', '2023-05-04 11:04:51', 'scheduled', 'MEDO7ZU40HSJ15F.png'),
(22, 'MEDIXP7TIN2TKAL', '19-1206', 'Medical', 'vjv', '2023-05-05', '', '2023-05-04 11:05:15', 'scheduled', 'MEDIXP7TIN2TKAL.png'),
(23, 'MEDMLS6GVPA6XF8', '19-1206', 'Medical', 'vjkj', '2023-05-05', '', '2023-05-04 11:05:34', 'scheduled', 'MEDMLS6GVPA6XF8.png'),
(24, 'MED8AUR74PEBB40', '19-1206', 'Medical', 'hfkh', '2023-05-05', '', '2023-05-04 11:05:52', 'scheduled', 'MED8AUR74PEBB40.png'),
(25, 'MEDDGIJB9I7D8NP', '19-1206', 'Medical', 'hkjv', '2023-05-05', '', '2023-05-04 11:06:24', 'scheduled', 'MEDDGIJB9I7D8NP.png'),
(26, 'MEDG465ZUEIRIJJ', '19-1206', 'Medical', 'hkhv', '2023-05-05', '', '2023-05-04 11:06:39', 'scheduled', 'MEDG465ZUEIRIJJ.png'),
(27, 'MED6LMLQHTMNQ8X', '19-1206', 'Medical', 'hvkhv', '0000-00-00', '', '2023-05-04 11:06:54', 'scheduled', 'MED6LMLQHTMNQ8X.png'),
(28, 'MEDM7HWJMFULWPE', '19-1206', 'Medical', 'mhvhkv', '0000-00-00', '', '2023-05-04 11:07:12', 'scheduled', 'MEDM7HWJMFULWPE.png'),
(29, 'MEDR0M8CFQZAEYO', '19-1206', 'Medical', 'vkjvkj', '0000-00-00', '', '2023-05-04 11:07:41', 'scheduled', 'MEDR0M8CFQZAEYO.png'),
(30, 'MEDMBXTNBMLKXEZ', '19-1206', 'Medical', 'vkvkj', '0000-00-00', '', '2023-05-04 11:08:00', 'scheduled', 'MEDMBXTNBMLKXEZ.png'),
(31, 'MEDM1LYAX8QX3XG', '19-1206', 'Medical', 'vkvkj', '0000-00-00', '', '2023-05-04 11:08:03', 'scheduled', 'MEDM1LYAX8QX3XG.png'),
(32, 'MEDHDT7P8LVV4P0', '19-1206', 'Medical', 'hvkhv', '0000-00-00', '', '2023-05-04 11:08:26', 'scheduled', 'MEDHDT7P8LVV4P0.png'),
(33, 'MEDFXTDCEFX4ALH', '19-1206', 'Medical', 'jbj', '2023-05-05', '', '2023-05-04 11:08:45', 'scheduled', 'MEDFXTDCEFX4ALH.png');

-- --------------------------------------------------------

--
-- Table structure for table `stud_app_files`
--

CREATE TABLE `stud_app_files` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `img_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_app_files`
--

INSERT INTO `stud_app_files` (`id`, `reference_no`, `img_name`) VALUES
(1, 'DENCI638JNKAZ01', 'img_0844.jpg'),
(2, 'DENCI638JNKAZ01', 'img_0845.jpg'),
(3, 'MEDTYWO2SWGBNAE', 'img_20220819_113321.jpg'),
(4, 'MEDTYWO2SWGBNAE', 'img_20220819_113329.jpg'),
(5, 'MEDTYWO2SWGBNAE', 'isca 1x1 cropted final.jpg'),
(6, 'MEDJCKUA4NQ20AG', 'org-chart.png'),
(7, 'MEDO96V26JUVSQP', 'org-chart.png'),
(8, 'DENISI2AP6O0ZQ5', 'dex.png'),
(9, 'MEDNI4UOE74TMO2', 'school.jpg'),
(10, 'MEDAR997J0PHGBW', 'id9.jpg'),
(11, 'MEDAR997J0PHGBW', 'id10.jpg'),
(12, 'MEDAR997J0PHGBW', 'id11.jpg'),
(13, 'MEDAR997J0PHGBW', 'id12.jpg'),
(14, 'MED3YHM28B1PQPB', 'medical requirements_page-0001.jpg'),
(15, 'MED52JH5J3ORI7J', 'img_20230426_145707.jpg'),
(16, 'MED33I07QAG6P7X', 'screenshot (5).png'),
(17, 'MEDBOPJRUYFIRMF', 'img_20230429_184719.jpg'),
(18, 'DEN6BYNCQVGSEOD', 'img_20230429_184711.jpg'),
(19, 'MEDFH4EYHSNT4V4', 'qcu-clinic-header.png'),
(20, 'MEDWFBL7MDLFQOJ', 'balingasa, juliana y. - 1x1 photo.jpg'),
(21, 'MEDB5UWXJAQA50M', 'medical requirements_page-0001.jpg'),
(22, 'MED9P0CMUP9V5H0', 'design of software keme.png'),
(23, 'MED7BYOR7F8VNBY', 'medical requirements sample_page-0001.jpg'),
(24, 'MEDMERXCPJ2B5MB', 'medical requirements sample_page-0001.jpg'),
(25, 'MEDQ6AHZK09HQDL', 'medical requirements sample_page-0001.jpg'),
(26, 'MEDZZ8KGEVN1YZE', 'medical requirements sample_page-0001.jpg'),
(27, 'MEDFCPVXXLQS38Z', 'medical requirements sample_page-0001.jpg'),
(28, 'MEDXL73D7AA7BOX', 'medical requirements sample_page-0001.jpg'),
(29, 'MEDQPV6JL0NYP4O', 'error'),
(30, 'MEDH9LLMSFL4SVA', 'error'),
(31, 'MED4JJ6OL552O8X', 'error'),
(32, 'MEDG1HINHEU4JWO', 'error'),
(33, 'MEDH2NRVIKVL9F2', 'error'),
(34, 'MEDO7ZU40HSJ15F', 'error'),
(35, 'MEDIXP7TIN2TKAL', 'error'),
(36, 'MEDMLS6GVPA6XF8', 'error'),
(37, 'MED8AUR74PEBB40', 'error'),
(38, 'MEDDGIJB9I7D8NP', 'error'),
(39, 'MEDG465ZUEIRIJJ', 'error'),
(40, 'MED6LMLQHTMNQ8X', 'error'),
(41, 'MEDM7HWJMFULWPE', 'error'),
(42, 'MEDR0M8CFQZAEYO', 'error'),
(43, 'MEDMBXTNBMLKXEZ', 'error'),
(44, 'MEDM1LYAX8QX3XG', 'error'),
(45, 'MEDHDT7P8LVV4P0', 'error'),
(46, 'MEDFXTDCEFX4ALH', 'error');

-- --------------------------------------------------------

--
-- Table structure for table `stud_archive`
--

CREATE TABLE `stud_archive` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date_archive` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_archive`
--

INSERT INTO `stud_archive` (`id`, `student_id`, `role`, `date_archive`, `time`) VALUES
(1, '20-1444', 'outsider', '2023-05-02', '22:52:47'),
(2, '19-1269', 'outsider', '2023-05-02', '22:52:56'),
(3, '19-1405', 'outsider', '2023-05-02', '22:53:02'),
(4, '19-1214', 'student', '2023-05-03', '12:25:47'),
(5, '17-1504', 'outsider', '2023-05-03', '15:10:04'),
(6, '19-1392', 'student', '2023-05-03', '03:10:28'),
(7, '17-1504', 'outsider', '2023-05-03', '15:10:51'),
(8, '19-1340', 'outsider', '2023-05-03', '15:11:08'),
(9, '19-1340', 'outsider', '2023-05-03', '15:11:14'),
(10, '19-1327', 'student', '2023-05-03', '03:12:29'),
(11, '17-1504', 'outsider', '2023-05-03', '15:13:00'),
(12, '17-1504', 'outsider', '2023-05-03', '15:13:05'),
(13, '17-1504', 'outsider', '2023-05-03', '15:13:16'),
(14, '17-1504', 'outsider', '2023-05-03', '15:13:16'),
(15, '19-1392', 'student', '2023-05-03', '03:13:24'),
(16, '19-1299', 'student', '2023-05-03', '04:18:44'),
(17, '19-1300', 'student', '2023-05-03', '04:19:15'),
(18, '17-1499', 'outsider', '2023-05-03', '16:19:32'),
(19, '17-1499', 'outsider', '2023-05-03', '16:19:42'),
(20, '17-1499', 'outsider', '2023-05-03', '16:19:51'),
(21, '19-1282', 'student', '2023-05-04', '07:29:11'),
(22, '19-0622', 'outsider', '2023-05-04', '09:10:37'),
(23, '19-0622', 'outsider', '2023-05-04', '09:10:45'),
(24, '19-1282', 'student', '2023-05-04', '09:10:52'),
(25, '19-0622', 'outsider', '2023-05-04', '09:10:57'),
(26, '19-0622', 'outsider', '2023-05-04', '09:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `stud_booster_shot`
--

CREATE TABLE `stud_booster_shot` (
  `id` int(20) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `first-booster` varchar(255) NOT NULL,
  `first-booster_date` date NOT NULL,
  `second-booster` varchar(255) NOT NULL,
  `second-booster_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_booster_shot`
--

INSERT INTO `stud_booster_shot` (`id`, `student_id`, `first-booster`, `first-booster_date`, `second-booster`, `second-booster_date`) VALUES
(2, '17-1499', 'N/A', '0000-00-00', 'N/A', '0000-00-00'),
(4, '19-1206', 'N/A', '0000-00-00', 'N/A', '0000-00-00'),
(6, '19-1214', 'N/A', '0000-00-00', 'N/A', '0000-00-00'),
(7, '19-1323', 'N/A', '0000-00-00', 'N/A', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `stud_covid_vaccine`
--

CREATE TABLE `stud_covid_vaccine` (
  `id` int(20) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `isVaccinated` varchar(55) NOT NULL,
  `first-vaccine` varchar(255) NOT NULL,
  `first-vaccine_date` date NOT NULL,
  `second-vaccine` varchar(255) NOT NULL,
  `second-vaccine_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_covid_vaccine`
--

INSERT INTO `stud_covid_vaccine` (`id`, `student_id`, `isVaccinated`, `first-vaccine`, `first-vaccine_date`, `second-vaccine`, `second-vaccine_date`) VALUES
(2, '17-1499', 'Yes', 'Astrazeneca', '2023-04-05', 'Astrazeneca', '2023-05-05'),
(4, '19-1206', 'Yes', 'Sinovac', '2021-09-29', 'Sinovac', '2021-10-27'),
(6, '19-1214', 'Yes', 'Astrazeneca', '2022-10-29', 'Astrazeneca', '2022-12-12'),
(7, '19-1323', 'Yes', 'Pfizer-BioNTech', '2021-06-04', 'Pfizer-BioNTech', '2021-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `stud_family_med_history`
--

CREATE TABLE `stud_family_med_history` (
  `id` int(11) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_family_med_history`
--

INSERT INTO `stud_family_med_history` (`id`, `student_id`, `father`, `mother`) VALUES
(2, '17-1499', 'N/A', 'N/A'),
(5, '19-1206', 'None', 'None'),
(7, '19-1214', 'None', 'HyperTension'),
(8, '19-1323', 'Rayuma', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `stud_health_history`
--

CREATE TABLE `stud_health_history` (
  `id` int(20) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `head_injury` varchar(55) NOT NULL,
  `eye_problem` varchar(55) NOT NULL,
  `wear_lenses` varchar(55) NOT NULL,
  `ear_problem` varchar(55) NOT NULL,
  `has_asthma` varchar(55) NOT NULL,
  `asthma_med` varchar(255) NOT NULL,
  `asthma_date` date NOT NULL,
  `has_ulcer` varchar(55) NOT NULL,
  `ulcer_med` varchar(255) NOT NULL,
  `has_ptb` varchar(55) NOT NULL,
  `ptb_date_diag` date NOT NULL,
  `ptb_date_med_start` date NOT NULL,
  `heart_problem` varchar(55) NOT NULL,
  `hp_spec` varchar(255) NOT NULL,
  `hp_med` varchar(255) NOT NULL,
  `has_allergy` varchar(55) NOT NULL,
  `allergy_spec` varchar(255) NOT NULL,
  `allergy_med` varchar(255) NOT NULL,
  `hospitalized` varchar(55) NOT NULL,
  `hospitalized_details` varchar(255) NOT NULL,
  `has_seizure` varchar(55) NOT NULL,
  `has_fracture` varchar(55) NOT NULL,
  `has_vices` varchar(55) NOT NULL,
  `other` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_health_history`
--

INSERT INTO `stud_health_history` (`id`, `student_id`, `head_injury`, `eye_problem`, `wear_lenses`, `ear_problem`, `has_asthma`, `asthma_med`, `asthma_date`, `has_ulcer`, `ulcer_med`, `has_ptb`, `ptb_date_diag`, `ptb_date_med_start`, `heart_problem`, `hp_spec`, `hp_med`, `has_allergy`, `allergy_spec`, `allergy_med`, `hospitalized`, `hospitalized_details`, `has_seizure`, `has_fracture`, `has_vices`, `other`) VALUES
(2, '17-1499', 'None', 'Yes', 'Yes', 'None', 'None', 'None', '0000-00-00', 'None', 'None', 'None', '0000-00-00', '0000-00-00', 'None', 'None', 'None', 'on', 'Paracetamol', 'N/A', 'None', 'None', 'None', 'None', 'None', 'None'),
(5, '19-1206', 'None', 'Yes', 'No', 'None', 'None', 'None', '0000-00-00', 'None', 'None', 'None', '0000-00-00', '0000-00-00', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None'),
(7, '19-1214', 'None', 'Yes', 'Yes', 'None', 'None', 'None', '0000-00-00', 'None', 'None', 'None', '0000-00-00', '0000-00-00', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None'),
(8, '19-1323', 'None', 'Yes', 'No', 'None', 'None', 'None', '0000-00-00', 'None', 'None', 'None', '0000-00-00', '0000-00-00', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `stud_medical_requirements`
--

CREATE TABLE `stud_medical_requirements` (
  `id` int(11) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `cbc_file` varchar(255) NOT NULL,
  `cbc_date_submitted` datetime NOT NULL,
  `cbc_status` varchar(55) NOT NULL,
  `cbc_reason` varchar(255) NOT NULL,
  `uri_file` varchar(255) NOT NULL,
  `uri_date_submitted` datetime NOT NULL,
  `uri_status` varchar(55) NOT NULL,
  `uri_reason` varchar(255) NOT NULL,
  `xray_file` varchar(255) NOT NULL,
  `xray_date_submitted` datetime NOT NULL,
  `xray_status` varchar(55) NOT NULL,
  `xray_reason` varchar(255) NOT NULL,
  `med_cert_file` varchar(255) NOT NULL,
  `med_cert_date_submitted` datetime NOT NULL,
  `med_cert_status` varchar(55) NOT NULL,
  `med_cert_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_medical_requirements`
--

INSERT INTO `stud_medical_requirements` (`id`, `student_id`, `cbc_file`, `cbc_date_submitted`, `cbc_status`, `cbc_reason`, `uri_file`, `uri_date_submitted`, `uri_status`, `uri_reason`, `xray_file`, `xray_date_submitted`, `xray_status`, `xray_reason`, `med_cert_file`, `med_cert_date_submitted`, `med_cert_status`, `med_cert_reason`) VALUES
(2, '17-1499', '17-1499-CBC.pdf', '2023-04-05 08:37:48', 'approved', '-', '17-1499-Urinalysis.pdf', '2023-04-05 08:37:48', 'approved', '-', '17-1499-Xray.pdf', '2023-04-05 08:37:48', 'approved', '-', '17-1499-Medical-Certificate.pdf', '2023-04-05 08:37:48', 'approved', '-'),
(5, '19-1206', '19-1206-CBC.pdf', '2023-04-18 16:55:26', 'declined', 'Failed, need to re-submit new docu.', '19-1206-Urinalysis.pdf', '2023-04-18 16:55:26', 'declined', 'Failed, need to re-submit new docu.', '19-1206-Xray.pdf', '2023-04-18 16:55:26', 'approved', '-', '19-1206-Medical-Certificate.pdf', '2023-04-18 16:55:26', 'approved', '-'),
(7, '19-1214', '19-1214-CBC.pdf', '2023-04-30 10:21:02', 'pending', '-', '19-1214-Urinalysis.pdf', '2023-04-30 10:21:02', 'pending', '-', '19-1214-Xray.pdf', '2023-04-30 10:21:02', 'pending', '-', '19-1214-Medical-Certificate.pdf', '2023-04-30 10:21:02', 'pending', '-'),
(8, '19-1323', '19-1323-CBC.pdf', '2023-05-04 09:06:41', 'declined', 'Need to resubmit ', '19-1323-Urinalysis.pdf', '2023-05-04 09:06:41', 'pending', '-', '19-1323-Xray.pdf', '2023-05-04 09:06:41', 'pending', '-', '19-1323-Medical-Certificate.pdf', '2023-05-04 09:06:41', 'pending', '-');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `contact_num` varchar(12) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `fullname`, `contact_num`, `purpose`, `department`, `date`, `timein`, `timeout`) VALUES
(1, 'John Nicole Abihay', '09488922712', 'Inquiry', '', '2023-04-22', '16:07:35', '00:00:00'),
(2, 'John Nicole Abihay', '09488922712', 'Inquire', '', '2023-04-23', '23:00:27', '00:00:00'),
(3, 'Albert Anasco', '09372934783', 'Gala', '', '2023-04-23', '23:26:34', '00:00:00'),
(4, 'JOhn Nicole Abihay', '094737847347', 'inquire', '', '2023-04-25', '11:30:29', '00:00:00'),
(5, 'john nicole abihay', '094784783647', 'inquire', '', '2023-04-26', '15:46:22', '00:00:00'),
(6, 'Juan Dela Cruz', '09478392093', 'Inquire', 'Admin Blg.', '2023-04-27', '04:02:19', '00:00:00'),
(7, 'Jaslene Althea P. Obias', '09331106851', 'Admission Test AY 2023-2024', 'BSIE', '2023-05-01', '17:15:59', '00:00:00'),
(8, 'Denis John B. Santos', '09152068384', 'Submit requirements for Admission Test', 'Registrar', '2023-05-01', '21:47:32', '00:00:00'),
(9, 'Sample Name', '09123456789', 'Inquiry', 'Registrar', '2023-05-02', '23:03:54', '00:00:00'),
(10, 'john nicole abihay', '09477649857', 'inquire', 'IT dept', '2023-05-03', '12:27:20', '00:00:00'),
(21, '1', '1', '1', '1', '2023-05-04', '09:31:33', '00:00:00'),
(22, '2', '2', '2', '2', '2023-05-04', '09:31:51', '00:00:00'),
(23, 'Joan', 'asdd', 'qwww', '1122', '2023-05-04', '09:34:13', '00:00:00'),
(24, '0987654', '0987654', '09876543', '09876543', '2023-05-04', '09:34:35', '00:00:00'),
(25, '1', '============', '1', '====================================================================================================', '2023-05-04', '09:48:18', '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_dates`
--
ALTER TABLE `appointment_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultations_med`
--
ALTER TABLE `consultations_med`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `entrance_log`
--
ALTER TABLE `entrance_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mis.emergency_contact`
--
ALTER TABLE `mis.emergency_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mis.enrollment_status`
--
ALTER TABLE `mis.enrollment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mis.student_address`
--
ALTER TABLE `mis.student_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mis.student_info`
--
ALTER TABLE `mis.student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse_schedule`
--
ALTER TABLE `nurse_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_stud_data`
--
ALTER TABLE `sample_stud_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_account`
--
ALTER TABLE `student_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_appointment`
--
ALTER TABLE `stud_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_app_files`
--
ALTER TABLE `stud_app_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_archive`
--
ALTER TABLE `stud_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_booster_shot`
--
ALTER TABLE `stud_booster_shot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_covid_vaccine`
--
ALTER TABLE `stud_covid_vaccine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_family_med_history`
--
ALTER TABLE `stud_family_med_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_health_history`
--
ALTER TABLE `stud_health_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_medical_requirements`
--
ALTER TABLE `stud_medical_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `announce`
--
ALTER TABLE `announce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `appointment_dates`
--
ALTER TABLE `appointment_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `consultations_med`
--
ALTER TABLE `consultations_med`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entrance_log`
--
ALTER TABLE `entrance_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mis.emergency_contact`
--
ALTER TABLE `mis.emergency_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `mis.enrollment_status`
--
ALTER TABLE `mis.enrollment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `mis.student_address`
--
ALTER TABLE `mis.student_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `mis.student_info`
--
ALTER TABLE `mis.student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `nurse_schedule`
--
ALTER TABLE `nurse_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `sample_stud_data`
--
ALTER TABLE `sample_stud_data`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `student_account`
--
ALTER TABLE `student_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stud_appointment`
--
ALTER TABLE `stud_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stud_app_files`
--
ALTER TABLE `stud_app_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `stud_archive`
--
ALTER TABLE `stud_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `stud_booster_shot`
--
ALTER TABLE `stud_booster_shot`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stud_covid_vaccine`
--
ALTER TABLE `stud_covid_vaccine`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stud_family_med_history`
--
ALTER TABLE `stud_family_med_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stud_health_history`
--
ALTER TABLE `stud_health_history`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stud_medical_requirements`
--
ALTER TABLE `stud_medical_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
