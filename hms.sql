-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2022 at 05:43 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `patient_name` text NOT NULL,
  `phone_number` text NOT NULL,
  `doc` text NOT NULL,
  `service` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_name`, `phone_number`, `doc`, `service`, `date`) VALUES
(1, 'Lee Mutai', '0788994433', 'Benson Ndiwa', 'Orthopedics', '2022-01-22'),
(2, 'Lee Mutai', '0788994433', 'Abraham Ndiwa', 'Orthopedics', '2022-01-20\r\n'),
(3, 'John David', '0705664433', 'Benson Ndiwa', 'Boye', '2022-01-29'),
(4, 'Mike', '0788994433', 'Valerie Kitiyo', 'Yao', '2022-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `patients_details`
--

CREATE TABLE `patients_details` (
  `patient_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `number` text NOT NULL,
  `DOB` text NOT NULL,
  `gender` text NOT NULL,
  `kin` text NOT NULL,
  `kin_number` text NOT NULL,
  `national_id` text NOT NULL,
  `kin_relationship` text NOT NULL,
  `residence` text NOT NULL,
  `occupation` text NOT NULL,
  `marital` text NOT NULL,
  `insurance_type` text NOT NULL,
  `insurance_number` text NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients_details`
--

INSERT INTO `patients_details` (`patient_id`, `name`, `number`, `DOB`, `gender`, `kin`, `kin_number`, `national_id`, `kin_relationship`, `residence`, `occupation`, `marital`, `insurance_type`, `insurance_number`, `regDate`) VALUES
(1, 'Raila Odinga', '0788994433', '1999-01-18', 'Female', 'mimi', '0723475848', '', '', '', '', '', '', '', '2022-01-23 11:15:38'),
(3, 'Lee Mutai', '0788994433', '1999-01-18', 'Male', 'mimi', '0723475848', '', '', '', '', '', '', '', '2022-01-23 11:59:32'),
(4, 'mike mondo', '0745362211', '2022-01-19', 'Male', 'ben', '078822233', '', '', '', '', '', '', '', '2022-01-23 11:59:26'),
(5, 'John David', '0788994433', '2022-01-18', 'Male', 'wewe', '0723475848', '', '', '', '', '', '', '', '2022-01-23 11:59:22'),
(6, 'Agnes Moraa', '0788994433', '2010-02-20', 'Female', 'wewe', '0723475848', '', '', '', '', '', '', '', '2022-01-20 14:21:23'),
(7, 'Amina Abdi', '0735467383', '1999-09-20', 'Female', 'Hamza Ali', '072265832', '', '', '', '', '', '', '', '2022-01-21 16:56:59'),
(8, 'James Kamau', '0745635656', '1998-10-23', 'Male', 'val', '073535533543', '', '', '', '', '', '', '', '2022-01-23 11:59:38'),
(9, 'ALBERT KIBUKOSYA', '0729987654', '1964-12-02', 'Male', 'PHOEBE KIBUKOSYA WANDIA', '0789567432', '', '', '', '', '', '', '', '2022-01-23 11:59:44'),
(10, 'RUTH KAMAKI MWANGI', '0729987654', '1978-01-03', 'Female', 'PAUL MWANGI KIUNJURI', '0789567432', '', '', '', '', '', '', '', '2022-01-23 13:01:01'),
(11, 'HELLEN NKATHA MWENDWA', '0722987987', '1987-01-03', 'Female', 'GERALD MWENDWA', '0724567123', '23451789', 'HUSBAND', 'MBOONI', 'HOUSEWIFE', 'Married', 'NHIF', '3456825282', '2022-01-24 20:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `patient_id` text NOT NULL,
  `oxygen_saturation` text NOT NULL,
  `pressure` text NOT NULL,
  `heart_rate` text NOT NULL,
  `weight` text NOT NULL,
  `temp` text NOT NULL,
  `nurse_check` text NOT NULL,
  `symptoms` text NOT NULL,
  `differential_diagnosis` text NOT NULL,
  `lab_request` text NOT NULL,
  `test_types` text NOT NULL,
  `lab_results_out` text NOT NULL,
  `lab_test_done` text NOT NULL,
  `lab_results` text NOT NULL,
  `diagnosis` text NOT NULL,
  `prescription` text NOT NULL,
  `procedures` text NOT NULL,
  `referal` text NOT NULL,
  `doctor_check` text NOT NULL,
  `doctor_attending` text NOT NULL,
  `drugs_given` text NOT NULL,
  `unavailable_drugs` text NOT NULL,
  `consultation_fee` text NOT NULL,
  `medicine_fee` text NOT NULL,
  `lab_fee` text NOT NULL,
  `procedures_fee` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `next_checkup` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `patient_id`, `oxygen_saturation`, `pressure`, `heart_rate`, `weight`, `temp`, `nurse_check`, `symptoms`, `differential_diagnosis`, `lab_request`, `test_types`, `lab_results_out`, `lab_test_done`, `lab_results`, `diagnosis`, `prescription`, `procedures`, `referal`, `doctor_check`, `doctor_attending`, `drugs_given`, `unavailable_drugs`, `consultation_fee`, `medicine_fee`, `lab_fee`, `procedures_fee`, `date`, `next_checkup`, `status`) VALUES
(2, '3', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-19 07:20:27', '', 'closed'),
(3, '1', 'B+', '131', '', '80', '27', '1', 'Stomach Aches', '', 'on', 'Hpylori', '', '', '', '', '', '', '', '', 'Abraham Ndiwa', '', '', '', '', '', '', '2022-01-21 15:29:17', '', 'closed'),
(5, '3', 'sdsd', 'dsadd', '', 'dsad', 'dsadas', '1', '', '', 'off', '', 'on', '', 'tfxcvkghfv\r\ngh\r\nhfdcfv\r\njhlknm\r\n', '', '', '', '', '', 'Abraham Ndiwa', '', '', '', '', '', '', '2022-01-24 21:52:14', '', 'open'),
(6, '1', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-19 07:27:05', '', 'closed'),
(7, '3', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-19 08:14:12', '', 'closed'),
(8, '4', 'o+', '123', '', '55', '23', '1', 'Headache\nStomach AcheHeadache\nStomach AcheHeadache\nStomach AcheHeadache\nStomach Ache', '', '', 'blood2', 'on', 'blood', 'inconclusive', 'Malaria', 'Antimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZAntimalaria\nAL\nAZ', 'None', 'No', 'on', 'Abraham Ndiwa', 'Antimalaria - 300, AL - 200', 'AZ', '', '', '', '', '2022-01-21 15:31:55', '', 'open'),
(9, '5', 'o+', '123', '', '55', '23', '1', 'Rashes', '', '', 'skin', 'on', 'skin', 'Positive', '-1', 'dkdsd', '7', '000', 'on', 'Abraham Ndiwa', 'dfszfdsf', 'fsdfsdfs', '', '', '', '', '2022-01-21 15:31:59', '', 'open'),
(10, '3', 'o+', '123', '', '55', '23', '1', 'Headache\r\nStomach Ache', '', '', '', '', '', '', '', '', '', '', '', 'Abraham Ndiwa', '', '', '', '', '', '', '2022-01-21 15:29:17', '', 'closed'),
(11, '6', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-20 14:22:37', '', 'closed'),
(12, '6', 'B+', '138/78', '', '98', '34.9', '1', 'NOse\r\nproblem', '', 'on', 'nose\r\near\r\ntooth', '', '', '', '', '', '', '', '', 'Abraham Ndiwa', '', '', '', '', '', '', '2022-01-24 21:57:32', '', 'open'),
(13, '7', 'B+', '120', '', '65', '90', '1', 'Headache,vomitting,fever,abdominal pains,back pains,', '', '', 'autopsy,colposcopy,pap smear', 'on', 'Pap smear', 'Positive', 'Ectopic pregnancy,Aspiration pneumonitis', 'Dextroamphetamine,Alprazolam,OxyConti', 'CT Scan,Biopsy,Appendectomy', 'N/A', 'on', 'Abraham Ndiwa', 'Dextroamphetamine', 'OxyConti', '', '', '', '', '2022-01-21 17:49:53', '', 'open'),
(14, '8', 'A', '120/80', '', '60', '36.7', '1', 'diarhoea\r\ncough\r\nvomiting\r\nsweating', '', '', 'stool test\r\nblood test', 'on', 'stool test-', 'cysts present', 'tapeworm\r\n', 'tumbocid', 'none', 'none', 'on', 'Abraham Ndiwa', 'tumbocid', '', '', '', '', '', '2022-01-23 11:41:46', '', 'closed'),
(15, '9', 'O-', '128/30', '', '78', '37.8', '1', 'headache, pain in the left ear, fever,vomiting', '', '', 'Meningococcal test', 'on', 'Meningococcal test, stool', 'Meningococcal test -WBC	19	(4-12 x109/L)\r\nHB	14.4	(12.1-15.2 g/L)\r\nPlatelets	220	(140-450 x109/L)\r\nCRP	65	(0-8mg/l)', 'Localised foci of infection\r\nImmunodeficiency secondary to HIV despite normal CD4 count\r\nPrimary immunodeficiency\r\nCommunity acquired Streptococcus pneumoniae infection\r\nDefective antibody formation such as agammaglobulinemia or hypogammaglobulinemia\r\nDefective complement, absent complement or decreased amounts of C1, C2, C3, or C4\r\nAsplenism', ' IV ceftriaxone\r\nHeptavalent pneumococcal conjugate vaccine', 'HISTERECTOMY', '', 'on', 'Eliud Kipkoech', 'IV ceftriaxone \nHeptavalent \npneumococcal', '', '', '', '', '', '2022-01-24 21:48:16', '', 'open'),
(16, '10', 'O-', '124/30', '', '80', '34.9', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-23 13:08:40', '', 'open'),
(17, '11', '96', '127/80', '65', '98', '36.9', '1', 'Symmetrically distributed\r\nulcerated nodules\r\nplaques on the face, neck and arms', ' Pyoderma\r\nsarcoidosis\r\nSyphillis', '', 'TPPA\r\nVDRL\r\nRPR', 'on', 'TPPA\r\nVDRL\r\nRPR', 'TPPA- 1:327 680\r\nVDRL- 1:16\r\nIgM-ELISA index 1.32 (negative <0.90)\r\nHIV 1/2 \r\nhepatitis B/C negative', 'Secondary Syphilis', 'Three consecutive weekly injections of 2.4 million units benzathine penicillin\r\n50 mg Prednisone', '', '', 'on', 'Abraham Ndiwa', '', '', '', '', '', '', '2022-01-24 22:24:58', '', 'open'),
(18, '8', '', '', '', '', '', '1', '', '', 'off', 'gugu', 'on', 'gugu', 'ugugu', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-24 21:38:05', '', 'open'),
(24, '1', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-25 00:24:06', '', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `staff_logs`
--

CREATE TABLE `staff_logs` (
  `log_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `role` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_logs`
--

INSERT INTO `staff_logs` (`log_id`, `username`, `role`, `date`) VALUES
(1, 'Benson Ndiwa', 'secretary', '2022-01-20 15:01:24'),
(2, 'Philip Ndiwa', 'admin', '2022-01-20 15:02:20'),
(3, 'Philip Ndiwa', 'admin', '2022-01-20 17:23:47'),
(4, 'Philip Ndiwa', 'admin', '2022-01-20 17:25:08'),
(5, 'Benson Ndiwa', 'secretary', '2022-01-20 17:33:19'),
(6, 'Philip Ndiwa', 'admin', '2022-01-20 17:26:57'),
(7, 'Abraham Ndiwa', 'doctor', '2022-01-20 19:05:53'),
(8, 'Benson Ndiwa', 'secretary', '2022-01-20 19:15:50'),
(9, 'Cheptoo Kirwa', 'nurse', '2022-01-21 08:17:56'),
(10, 'Abraham Ndiwa', 'doctor', '2022-01-21 08:19:00'),
(11, 'Cheptoo Kirwa', 'nurse', '2022-01-21 08:22:00'),
(12, 'Cheptoo Kirwa', 'nurse', '2022-01-21 08:29:34'),
(13, 'Abraham Ndiwa', 'doctor', '2022-01-21 10:26:18'),
(14, 'Cheptoo Kirwa', 'nurse', '2022-01-21 10:28:53'),
(15, 'Abraham Ndiwa', 'doctor', '2022-01-21 10:30:45'),
(16, 'Benson Ndiwa', 'secretary', '2022-01-21 10:50:35'),
(17, 'Benson Ndiwa', 'secretary', '2022-01-21 11:27:38'),
(18, 'Philip Ndiwa', 'admin', '2022-01-21 11:35:27'),
(19, 'Benson Ndiwa', 'secretary', '2022-01-21 11:38:13'),
(20, 'Abraham Ndiwa', 'doctor', '2022-01-21 11:42:05'),
(21, 'Abraham Ndiwa', 'doctor', '2022-01-21 11:45:06'),
(22, 'Cheptoo Kirwa', 'nurse', '2022-01-21 11:47:16'),
(23, 'Benson Ndiwa', 'secretary', '2022-01-21 11:48:00'),
(24, 'Benson Ndiwa', 'secretary', '2022-01-21 11:56:58'),
(25, 'Benson Ndiwa', 'secretary', '2022-01-21 11:57:58'),
(26, 'Benson Ndiwa', 'secretary', '2022-01-21 14:52:24'),
(27, 'Benson Ndiwa', 'secretary', '2022-01-21 15:01:23'),
(28, 'Philip Ndiwa', 'admin', '2022-01-21 15:33:39'),
(29, 'Benson Ndiwa', 'secretary', '2022-01-21 15:36:57'),
(30, 'Philip Ndiwa', 'admin', '2022-01-21 15:38:30'),
(31, 'Cheptoo Kirwa', 'nurse', '2022-01-21 15:39:55'),
(32, 'Philip Ndiwa', 'admin', '2022-01-21 15:45:33'),
(33, 'Cheptoo Kirwa', 'nurse', '2022-01-21 15:52:15'),
(34, 'Philip Ndiwa', 'admin', '2022-01-21 15:56:57'),
(35, 'Cheptoo Kirwa', 'nurse', '2022-01-21 16:42:33'),
(36, 'Philip Ndiwa', 'admin', '2022-01-21 16:44:45'),
(37, 'Cheptoo Kirwa', 'nurse', '2022-01-21 16:47:12'),
(38, 'Benson Ndiwa', 'secretary', '2022-01-21 16:51:40'),
(39, 'Cheptoo Kirwa', 'nurse', '2022-01-21 16:58:24'),
(40, 'Abraham Ndiwa', 'doctor', '2022-01-21 16:59:45'),
(41, 'Abraham Ndiwa', 'doctor', '2022-01-21 17:38:24'),
(42, 'Valerie Kitiyo', 'lab', '2022-01-21 17:39:05'),
(43, 'Abraham Ndiwa', 'doctor', '2022-01-21 17:41:06'),
(44, 'Eliud Kipkoech', 'pharmacist', '2022-01-21 17:42:00'),
(45, 'Benson Ndiwa', 'secretary', '2022-01-21 17:43:11'),
(46, 'Cheptoo Kirwa', 'nurse', '2022-01-21 17:44:23'),
(47, 'Valerie Kitiyo', 'lab', '2022-01-21 17:49:15'),
(48, 'Abraham Ndiwa', 'doctor', '2022-01-21 17:50:07'),
(49, 'Cheptoo Kirwa', 'nurse', '2022-01-21 17:50:27'),
(50, 'Abraham Ndiwa', 'doctor', '2022-01-21 17:50:51'),
(51, 'Valerie Kitiyo', 'lab', '2022-01-21 17:51:17'),
(52, 'Philip Ndiwa', 'admin', '2022-01-21 17:53:01'),
(53, 'Philip Ndiwa', 'admin', '2022-01-23 10:34:23'),
(54, 'Cheptoo Kirwa', 'nurse', '2022-01-23 11:25:47'),
(55, 'Abraham Ndiwa', 'doctor', '2022-01-23 11:26:33'),
(56, 'Benson Ndiwa', 'secretary', '2022-01-23 11:28:17'),
(57, 'Valerie Kitiyo', 'lab', '2022-01-23 11:31:02'),
(58, 'Alex Njuguna', 'store', '2022-01-23 11:32:09'),
(59, 'Eliud Kipkoech', 'pharmacist', '2022-01-23 11:38:22'),
(60, 'Benson Ndiwa', 'secretary', '2022-01-23 11:40:05'),
(61, 'Benson Ndiwa', 'secretary', '2022-01-23 11:46:05'),
(62, 'Cheptoo Kirwa', 'nurse', '2022-01-23 11:58:44'),
(63, 'Abraham Ndiwa', 'doctor', '2022-01-23 12:01:56'),
(64, 'Valerie Kitiyo', 'lab', '2022-01-23 12:05:44'),
(65, 'Abraham Ndiwa', 'doctor', '2022-01-23 12:20:45'),
(66, 'Benson Ndiwa', 'secretary', '2022-01-23 12:21:48'),
(67, 'Abraham Ndiwa', 'doctor', '2022-01-23 12:25:10'),
(68, 'Eliud Kipkoech', 'pharmacist', '2022-01-23 12:28:18'),
(69, 'Cheptoo Kirwa', 'nurse', '2022-01-23 12:32:23'),
(70, 'Abraham Ndiwa', 'doctor', '2022-01-23 12:37:53'),
(71, 'Abraham Ndiwa', 'doctor', '2022-01-23 12:40:31'),
(72, 'Cheptoo Kirwa', 'nurse', '2022-01-23 12:40:39'),
(73, 'Cheptoo Kirwa', 'nurse', '2022-01-23 12:49:31'),
(74, 'Cheptoo Kirwa', 'nurse', '2022-01-23 12:49:32'),
(75, 'Abraham Ndiwa', 'doctor', '2022-01-23 12:50:10'),
(76, 'Valerie Kitiyo', 'lab', '2022-01-23 12:54:42'),
(77, 'Benson Ndiwa', 'secretary', '2022-01-23 13:21:20'),
(78, 'Benson Ndiwa', 'secretary', '2022-01-23 13:51:06'),
(79, 'Cheptoo Kirwa', 'nurse', '2022-01-23 13:53:51'),
(80, 'Cheptoo Kirwa', 'nurse', '2022-01-23 13:54:06'),
(81, 'Benson Ndiwa', 'secretary', '2022-01-23 14:01:30'),
(82, 'Cheptoo Kirwa', 'nurse', '2022-01-23 14:11:35'),
(83, 'Cheptoo Kirwa', 'nurse', '2022-01-23 14:35:54'),
(84, 'Abraham Ndiwa', 'doctor', '2022-01-23 14:47:02'),
(85, 'Abraham Ndiwa', 'doctor', '2022-01-23 14:47:31'),
(86, 'Valerie Kitiyo', 'lab', '2022-01-23 15:19:07'),
(87, 'Valerie Kitiyo', 'lab', '2022-01-23 15:26:21'),
(88, 'Abraham Ndiwa', 'doctor', '2022-01-23 15:32:08'),
(89, 'Eliud Kipkoech', 'pharmacist', '2022-01-23 15:38:02'),
(90, 'Eliud Kipkoech', 'pharmacist', '2022-01-23 15:42:13'),
(91, 'Cheptoo Kirwa', 'nurse', '2022-01-23 15:44:17'),
(92, 'Cheptoo Kirwa', 'nurse', '2022-01-23 15:45:50'),
(93, 'Benson Ndiwa', 'secretary', '2022-01-24 20:25:34'),
(94, 'Cheptoo Kirwa', 'nurse', '2022-01-24 20:42:49'),
(95, 'Cheptoo Kirwa', 'nurse', '2022-01-24 20:58:32'),
(96, 'Philip Ndiwa', 'admin', '2022-01-24 21:00:50'),
(97, 'Benson Ndiwa', 'secretary', '2022-01-24 21:04:38'),
(98, 'Cheptoo Kirwa', 'nurse', '2022-01-24 21:20:48'),
(99, 'Abraham Ndiwa', 'doctor', '2022-01-24 21:27:07'),
(100, 'Cheptoo Kirwa', 'nurse', '2022-01-24 21:30:19'),
(101, 'Abraham Ndiwa', 'doctor', '2022-01-24 21:30:58'),
(102, 'Valerie Kitiyo', 'lab', '2022-01-24 21:33:09'),
(103, 'Valerie Kitiyo', 'lab', '2022-01-24 21:35:21'),
(104, 'Valerie Kitiyo', 'lab', '2022-01-24 21:36:12'),
(105, 'Eliud Kipkoech', 'pharmacist', '2022-01-24 21:39:01'),
(106, 'Eliud Kipkoech', 'pharmacist', '2022-01-24 21:39:52'),
(107, 'Philip Ndiwa', 'admin', '2022-01-24 21:42:29'),
(108, 'Abraham Ndiwa', 'doctor', '2022-01-24 21:51:17'),
(109, 'Valerie Kitiyo', 'lab', '2022-01-24 21:55:32'),
(110, 'Abraham Ndiwa', 'doctor', '2022-01-24 21:56:15'),
(111, 'Valerie Kitiyo', 'lab', '2022-01-24 21:56:30'),
(112, 'Philip Ndiwa', 'admin', '2022-01-24 22:01:33'),
(113, 'Abraham Ndiwa', 'doctor', '2022-01-24 22:09:19'),
(114, 'Eliud Kipkoech', 'pharmacist', '2022-01-24 22:24:31'),
(115, 'Cheptoo Kirwa', 'nurse', '2022-01-24 22:32:38'),
(116, 'Valerie Kitiyo', 'lab', '2022-01-24 22:36:22'),
(117, 'Philip Ndiwa', 'admin', '2022-01-24 22:38:54'),
(118, 'Cheptoo Kirwa', 'nurse', '2022-01-24 22:43:55'),
(119, 'Benson Ndiwa', 'secretary', '2022-01-24 23:02:44'),
(120, 'Benson Ndiwa', 'secretary', '2022-01-26 10:27:07'),
(121, 'Benson Ndiwa', 'secretary', '2022-01-26 11:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `store_received`
--

CREATE TABLE `store_received` (
  `item_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `quantity` text NOT NULL,
  `type` text NOT NULL,
  `received_from` text NOT NULL,
  `received_by` text NOT NULL,
  `issued_by` text NOT NULL,
  `issued_to` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_received`
--

INSERT INTO `store_received` (`item_id`, `name`, `quantity`, `type`, `received_from`, `received_by`, `issued_by`, `issued_to`, `date`) VALUES
(1, 'Desk', '1', 'Furniture', 'Watchman', 'Alex Njuguna', '', '', '2022-01-18'),
(2, 'Syringe', '2', 'Medical Equipment', '', '', 'Alex Njuguna', 'Abraham Ndiwa', '2022-01-19'),
(3, 'Scissors', '10', 'Medical Equipment', 'Lisa Works', 'Alex Njuguna', '', '', '2022-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `id_number` text NOT NULL,
  `number` text NOT NULL,
  `role` text NOT NULL,
  `specialty` text NOT NULL,
  `password` text NOT NULL,
  `regDate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `username`, `id_number`, `number`, `role`, `specialty`, `password`, `regDate`) VALUES
(1, 'bnkimtai@gmail.com', 'Benson Ndiwa', '36371864', '0707357072', 'secretary', 'sec81', '12345', '2022-01-20'),
(2, 'kezkeisy@gmail.com', 'Cheptoo Kirwa', '', '', 'nurse', '', '12345', '2021-09-10'),
(3, 'abu@gmail.com', 'Abraham Ndiwa', '', '', 'doctor', '', '12345', '2022-01-01'),
(4, 'eliud@gmail.com', 'Eliud Kipkoech', '36371865', '0705664433', 'pharmacist', 'Gynecologist', '12345', '2022-01-20'),
(5, 'val@gmail.com', 'Valerie Kitiyo', '', '', 'lab', '', '12345', '2022-01-20'),
(6, 'alex@gmail.com', 'Alex Njuguna', '', '', 'store', '', '12345', '2022-01-20'),
(7, 'philip@gmail.com', 'Philip Ndiwa', '', '', 'admin', '', '12345', '2022-01-20'),
(15, 'kezkeisy1@gmail.com', 'kirwa cheptoo', 'tuuiguigj', '74826478', 'lab', 'Homeopath', '12345', '2022-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `ward_id` int(11) NOT NULL,
  `patient_id` text NOT NULL,
  `session_id` text NOT NULL,
  `ward_number` text NOT NULL,
  `bed_number` text NOT NULL,
  `patient_condition` text NOT NULL,
  `drugs_given` text NOT NULL,
  `procedures_done` text NOT NULL,
  `admitted_by` text NOT NULL,
  `admission_date` text NOT NULL,
  `checked_out_by` text NOT NULL,
  `check_out_date` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`ward_id`, `patient_id`, `session_id`, `ward_number`, `bed_number`, `patient_condition`, `drugs_given`, `procedures_done`, `admitted_by`, `admission_date`, `checked_out_by`, `check_out_date`, `status`) VALUES
(1, '5', '9', '7', '21', 'good1', 'good1', 'good1', 'Cheptoo Kirwa', '2022-01-21T16:36', 'Abraham Ndiwa', '2022-01-27T00:28', 'closed'),
(2, '3', '5', '4', '545', '5454', '545', '545', 'Cheptoo Kirwa', '2022-01-21T18:52', '', '', 'open'),
(3, '4', '8', '4', '45', '545', '54545', '5455445', 'Cheptoo Kirwa', '2022-01-13T18:52', '', '', 'open'),
(4, '5', '9', '2', '2', 'good1', 'good1', 'good1', 'Cheptoo Kirwa', '2022-01-07T18:53', 'Abraham Ndiwa', '2022-01-27T00:28', 'closed'),
(5, '7', '13', '3', '12', 'Good', 'Ocrtsaj', 'X-ray', 'Cheptoo Kirwa', '2022-01-21T20:45', 'Cheptoo Kirwa', '2022-01-21T20:46', 'closed'),
(6, '9', '15', '', '', 'RECURRENT FITS\r\nEPILEPSY', 'DIAZEPAM\r\nAZITHRYOMYCIN', 'CRANIAL SURGERY', 'Cheptoo Kirwa', '2022-01-31T07:03', 'Cheptoo Kirwa', '2022-01-23T19:29', 'closed'),
(7, '5', '9', '', '', 'good1', 'good1', 'good1', 'Abraham Ndiwa', '2022-01-25T00:28', 'Abraham Ndiwa', '2022-01-27T00:28', 'open');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `patients_details`
--
ALTER TABLE `patients_details`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `staff_logs`
--
ALTER TABLE `staff_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `store_received`
--
ALTER TABLE `store_received`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients_details`
--
ALTER TABLE `patients_details`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staff_logs`
--
ALTER TABLE `staff_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `store_received`
--
ALTER TABLE `store_received`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `ward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
