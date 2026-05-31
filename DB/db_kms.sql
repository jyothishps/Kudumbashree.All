-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 09:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(11, 'Kanaka Gangadharan', 'kanaka@gmail.com', 'Kanaka@2024');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `complaint_date` date NOT NULL,
  `member_id` int(11) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_reply`, `complaint_date`, `member_id`, `complaint_status`) VALUES
(18, 'hi', 'i am sura', 'ytyfty', '2024-09-25', 2, 1),
(20, 'hello', 'i am dultas', 'hi dultas', '2024-09-25', 2, 0),
(24, 'Adon', 'hi guys', '0', '2024-10-08', 4, 0),
(25, 'hello', 'hbvhjdv hjkbsv', 'jhbfd jhbvjhdfvb', '2024-10-08', 4, 1),
(30, 'hebrjhgfer', 'hjbfjher', 'ok', '2024-10-09', 16, 1),
(31, 'Issue 1', 'I am not ok', 'set akkam', '2024-10-21', 16, 1),
(32, 'Issue', 'I have a complaint.', '', '2024-10-21', 16, 0),
(33, 'Cmp 2', 'I also have a complaint', '', '2024-12-26', 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(100) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `member_id`) VALUES
(6, 'I have a feedback.', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_file` varchar(100) NOT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_file`, `program_id`) VALUES
(5, 'IMG_20231207_225024.jpg', 1),
(7, 'IMG_20231207_225024.jpg', 6),
(8, 'Screenshot (1).png', 1),
(9, 'Screenshot 2024-07-20 214416.png', 8),
(10, 'program.jpg', 13),
(11, 'program.jpg', 16),
(12, 'program.jpg', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan`
--

CREATE TABLE `tbl_loan` (
  `loan_id` int(11) NOT NULL,
  `loan_name` varchar(50) NOT NULL,
  `loan_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_loan`
--

INSERT INTO `tbl_loan` (`loan_id`, `loan_name`, `loan_desc`) VALUES
(15, 'Loan 1', 'Dear Members,\r\nWe are pleased to inform you that our Kudumbashree Unit is now accepting applications for loan 1 to support our members financial needs. This loan facility aims to provide financial assistance to members for personal and family purposes. Please review the details below for eligibility and application guidelines:\r\nLoan Details:\r\n(Loan Amount: Up to Rs.8000\r\nInterest Rate: 2% per monthly\r\nRepayment Period: 6 months).');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loanapply`
--

CREATE TABLE `tbl_loanapply` (
  `loanapply_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `loanapply_status` int(11) NOT NULL DEFAULT 0,
  `loanapply_date` date NOT NULL,
  `loanapply_content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_loanapply`
--

INSERT INTO `tbl_loanapply` (`loanapply_id`, `loan_id`, `member_id`, `loanapply_status`, `loanapply_date`, `loanapply_content`) VALUES
(13, 15, 16, 1, '2024-10-28', 'Dear Secretary,\r\nI am Saradha Narrayanan, a member of Pulari Kudumbashree, and I am writing to apply for this loan for my sons educational purpose. I propose to repay it over 6 months. This financial support would be immensely helpful for my sons education. I assure you that I will adhere to the repayment terms as set by the unit. Please let me know if any further information or documents are needed for this application. Thank you for considering my request. I look forward to a positive response.'),
(14, 15, 16, 0, '2024-10-30', 'I am Saradha narayanan, a member of Pulari Kudumbashree Unit, and I am writing to apply for a loan to support my sons education. I am requesting a loan of ₹8000 and propose to repay it over 6 months. This financial support would be immensely helpful in my sons edcational purpose. I assure you that I will adhere to the repayment terms as set by the unit. Please let me know if any further information or documents are needed for this application. Thank you for considering my request. I look forward to a positive response.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meeting`
--

CREATE TABLE `tbl_meeting` (
  `meeting_id` int(11) NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_meeting`
--

INSERT INTO `tbl_meeting` (`meeting_id`, `meeting_date`, `meeting_details`) VALUES
(33, '2024-10-27', 'The 1019th meeting of Pulary Kudumbashree Unit was held at the residence of Shailaja Sudhakaran. Presidental speech was conveyed by Kanaka Gangadharan. Suprabha Murali conveyed the welcome speech.'),
(34, '2024-11-08', 'jbh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meetingattendance`
--

CREATE TABLE `tbl_meetingattendance` (
  `meetingattendance_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `meetingattendance_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_meetingattendance`
--

INSERT INTO `tbl_meetingattendance` (`meetingattendance_id`, `member_id`, `meeting_id`, `meetingattendance_status`) VALUES
(13, 2, 7, 1),
(14, 3, 7, 2),
(15, 4, 7, 1),
(16, 2, 17, 2),
(17, 3, 17, 1),
(18, 4, 17, 2),
(19, 3, 18, 1),
(20, 2, 18, 2),
(21, 4, 19, 1),
(22, 2, 19, 2),
(23, 3, 19, 1),
(24, 3, 20, 1),
(25, 2, 24, 1),
(26, 4, 22, 2),
(27, 0, 9, 1),
(28, 4, 24, 1),
(29, 2, 22, 2),
(30, 2, 11, 1),
(31, 4, 12, 1),
(32, 0, 12, 2),
(33, 0, 12, 2),
(34, 10, 0, 2),
(35, 10, 12, 2),
(36, 16, 24, 1),
(37, 16, 25, 2),
(38, 16, 24, 1),
(39, 16, 32, 1),
(40, 24, 32, 1),
(41, 25, 32, 2),
(42, 26, 32, 1),
(43, 27, 32, 1),
(44, 16, 33, 1),
(45, 24, 33, 1),
(46, 25, 33, 2),
(47, 26, 33, 1),
(48, 27, 33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meetingreport`
--

CREATE TABLE `tbl_meetingreport` (
  `meetingreport_id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `meetingreport_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_meetingreport`
--

INSERT INTO `tbl_meetingreport` (`meetingreport_id`, `meeting_id`, `meetingreport_desc`) VALUES
(9, 25, 'nbfhjvdf hjvbhjdfv f shjvjhdfv'),
(14, 26, 'bvchgdvhd'),
(15, 32, 'The meeting started at 2pm with a prayer. The ADS meeting of 13th ward is scheduled on 28th October '),
(16, 32, 'The meeting started at 2pm with a prayer. The ADS meeting of 13th ward is scheduled on 28th October 2024. All the members is requested to participate in the meeting. The meeting takes place at Govt. U. P School Kombanad. The collection amount is Rs.100.\r\nThrift - 250\r\nLoan - 200\r\nAnnual collection - 100\r\nRs. 550 was given to Renjusha jayakrishnan'),
(17, 33, 'The meeting started at 2pm with a prayer. The ADS meeting of 13th ward is scheduled on 28th October 2024. All the members is requested to participate in the meeting. The meeting takes place at Govt. U. P School Kombanad. The collection amount is Rs.100. Thrift - 250, Loan - 200, Annual collection - 100. Rs. 550 was given to Renjusha jayakrishnan.'),
(18, 34, 'hbjhbjh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_address` varchar(100) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_password` varchar(50) NOT NULL,
  `member_proof` varchar(100) NOT NULL,
  `member_photo` varchar(100) NOT NULL,
  `member_status` int(11) NOT NULL DEFAULT 0,
  `member_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `member_name`, `member_address`, `member_email`, `member_password`, `member_proof`, `member_photo`, `member_status`, `member_contact`) VALUES
(8, 'Nisha Satheesan', 'Parachalil (H), Kombanad.P.O', 'nisha@gmail.com', 'Nisha@1982', 'Screenshot 2024-04-05 220532.png', 'Screenshot (2).png', 2, '9744034945'),
(16, 'Saradha Narayanan', 'Njarlakkattukudy (H), Kombanad.P.O', 'saradha@gmail.com', 'Saradha@2024', '7.jpg', 'sharadha.jpeg', 1, '9745739028'),
(24, 'Devaki Velayudhan', 'Parachalil (H), Kombanad.P.O', 'devaki@gmail.com', 'Devaki@2024', '1 (1).jpg', '1 (1).jpg', 1, '7034226825'),
(25, 'Suhasini Raveendran', 'Parachalil (H), Kombanad.P.O', 'suhasini@gmail.com', 'Suhasini@2024', '4.jpeg', '4.jpeg', 1, '7034753524'),
(26, 'Suprabha Murali', 'Parachalil (H), Kombanad.P.O', 'suprabha@gmail.com', 'Suprabha@2024', '5.jpeg', '5.jpeg', 1, '9876543210'),
(27, 'Kanaka Gangadharan', 'Pulimoottikudy (H), Kombanad.P.O', 'kanaka@gmail.com', 'Kanaka@2024', '6.jpeg', '6.jpeg', 1, '8848853679'),
(28, 'Omana Anirudhan', 'Pulimoottikudy (H), Kombanad.P.O', 'omana@gmail.com', 'Omana@2024', '2.jpg', '2.jpg', 1, '7894561230'),
(29, 'Devan', 'oishduiasdhuy', 'devan@gmail.com', 'Devan@2024', 'mellow-beluga-cat-w5m9sbsnv4t4osjr.jpg', 'IMG_20231207_225024.jpg', 0, '9546848135'),
(30, 'Deltaas', 'hsbhds', 'deltas@gmail.com', 'Deltas@2024', 'pexels-catiamatos-1072179.jpg', 'wallpaperflare.com_wallpaper (1).jpg', 0, '8465198416'),
(31, 'Sreekanth', 'jhvghjcvzGDcSDVcs', 'sreekanth@gmail.com', 'Sreekanth@2024', 'upload_img_68380034_07_24_2024_22_40_48_835601_5564738126256000113.jpeg', 'pexels-stywo-1261728.jpg', 0, '9875158416'),
(32, 'Ramani', 'sndfubsduyvbadshjv advbvau', 'ramani@gmail.com', 'Ramani@2024', 'WIN_20241030_14_53_19_Pro.jpg', 'WIN_20240911_13_59_49_Pro.jpg', 0, '9654683465');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `program_details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`program_id`, `program_name`, `program_details`) VALUES
(17, '20th Varshikam', 'Family reunion and Kudumbashree Varshikam was held on 20-10-2024 at residence of Shailaja Sudhakaran. The meeting started by lighting the nilavilaku. The members sang the prayer together. Renjusha Jayakrishnan delivered the welcome speech. The unit was reminded to improve its functioning and to fill the shortcomings. Then Renjusha Jayakrishnan presented the report. There was no significant discussions about the report. 2 folk songs were sung by the unit members. Ex-secretary Saradha Narayanan and current ADS member Rejitha Sajeev delivered the greeting speech. All members sung the National Anthem.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programattendance`
--

CREATE TABLE `tbl_programattendance` (
  `programattendance_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `programattendance_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_programattendance`
--

INSERT INTO `tbl_programattendance` (`programattendance_id`, `program_id`, `member_id`, `programattendance_status`) VALUES
(1, 1, 2, 1),
(2, 6, 2, 2),
(3, 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_secretary`
--

CREATE TABLE `tbl_secretary` (
  `secretary_id` int(11) NOT NULL,
  `secretary_name` varchar(50) NOT NULL,
  `secretary_email` varchar(50) NOT NULL,
  `secretary_contact` varchar(20) NOT NULL,
  `secretary_photo` varchar(100) NOT NULL,
  `secretary_proof` varchar(100) NOT NULL,
  `secretary_address` varchar(100) NOT NULL,
  `secretary_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_secretary`
--

INSERT INTO `tbl_secretary` (`secretary_id`, `secretary_name`, `secretary_email`, `secretary_contact`, `secretary_photo`, `secretary_proof`, `secretary_address`, `secretary_password`) VALUES
(32, 'Renjusha Jayakrishnan', 'renjusha@gmail.com', '7894561230', '8 (1).jpg', '8.jpg', 'Madathedam (H), Kombanad', 'Renjusha@2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_loan`
--
ALTER TABLE `tbl_loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `tbl_loanapply`
--
ALTER TABLE `tbl_loanapply`
  ADD PRIMARY KEY (`loanapply_id`);

--
-- Indexes for table `tbl_meeting`
--
ALTER TABLE `tbl_meeting`
  ADD PRIMARY KEY (`meeting_id`);

--
-- Indexes for table `tbl_meetingattendance`
--
ALTER TABLE `tbl_meetingattendance`
  ADD PRIMARY KEY (`meetingattendance_id`);

--
-- Indexes for table `tbl_meetingreport`
--
ALTER TABLE `tbl_meetingreport`
  ADD PRIMARY KEY (`meetingreport_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `tbl_programattendance`
--
ALTER TABLE `tbl_programattendance`
  ADD PRIMARY KEY (`programattendance_id`);

--
-- Indexes for table `tbl_secretary`
--
ALTER TABLE `tbl_secretary`
  ADD PRIMARY KEY (`secretary_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_loan`
--
ALTER TABLE `tbl_loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_loanapply`
--
ALTER TABLE `tbl_loanapply`
  MODIFY `loanapply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_meeting`
--
ALTER TABLE `tbl_meeting`
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_meetingattendance`
--
ALTER TABLE `tbl_meetingattendance`
  MODIFY `meetingattendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_meetingreport`
--
ALTER TABLE `tbl_meetingreport`
  MODIFY `meetingreport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_programattendance`
--
ALTER TABLE `tbl_programattendance`
  MODIFY `programattendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_secretary`
--
ALTER TABLE `tbl_secretary`
  MODIFY `secretary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
