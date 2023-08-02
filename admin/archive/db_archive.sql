-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2019 at 04:02 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `es_announcement`
--

CREATE TABLE `es_announcement` (
  `id` int(15) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `date_posted` date NOT NULL,
  `view_group` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Table structure for table `es_branch`
--

CREATE TABLE `es_branch` (
  `branch_id` int(10) NOT NULL,
  `branch_group` varchar(150) NOT NULL,
  `branch` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `es_branch`
--

INSERT INTO `es_branch` (`branch_id`, `branch_group`, `branch`, `address`) VALUES
(1, 'APARRI', 'APARRI BRANCH', 'Aparri, Cagayan, Valley'),
(2, 'PAMPANGA', 'ANGELES BRANCH', 'Angeles, Pampanga'),
(4, 'PAMPANGA', 'MABALACAT BRANCH', 'Mabalacat, Pampanga');

-- --------------------------------------------------------

--
-- Table structure for table `es_branch_announcement`
--

CREATE TABLE `es_branch_announcement` (
  `id` int(15) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `date_posted` date NOT NULL,
  `view_group` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `es_lecturers`
--

CREATE TABLE `es_lecturers` (
  `id` int(20) NOT NULL,
  `lecturer_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `photo` text NOT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `educational_attainment` varchar(100) NOT NULL,
  `school` text NOT NULL,
  `year_graduated` int(10) NOT NULL,
  `board_rank` varchar(10) NOT NULL,
  `sex` varchar(15) NOT NULL,
  `age` int(15) NOT NULL,
  `birthday` date NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `rate_per_hour` int(15) NOT NULL,
  `branch` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `es_archive_students`(
  `id` int(20) NOT NULL
);
CREATE TABLE `es_archive_lecturers`(
  `id` int(20) NOT NULL
);
CREATE TABLE `es_archive_programs`(
  `id` int(20) NOT NULL
);
--
-- Dumping data for table `es_lecturers`
--

INSERT INTO `es_lecturers` (`id`, `lecturer_id`, `firstname`, `middle_name`, `lastname`, `suffix`, `photo`, `address`, `contact_number`, `educational_attainment`, `school`, `year_graduated`, `board_rank`, `sex`, `age`, `birthday`, `marital_status`, `rate_per_hour`, `branch`, `status`) VALUES
(5, '1', 'Elon', 'A', 'Musk', '', 'upload/1680148519.png', 'Pampanga', '0917-111-1111', 'Masters Degree', 'NVSU', 2020, 'NONE', 'Male', 32, '2023-03-30', 'Single', 150, 'APARRI BRANCH', 'ACTIVE'),
(6, '1', 'Elon', 'A', 'Musk', '', 'upload/1680154445.png', 'Pampanga', '0917-111-1111', 'Masters Degree', 'NVSU', 2020, 'NONE', 'Male', 32, '2023-03-30', 'Single', 150, 'APARRI BRANCH', 'ACTIVE'),
(7, '1', 'JAMIE', 'MAGUERRA', 'DAVID', '', 'upload/1680158626.png', 'Pampanga', '0917-111-1111', 'Elementary Graduate', 'NVSU', 2020, 'NONE', 'Female', 32, '2023-03-30', 'Single', 100, 'APARRI BRANCH', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `es_payments`
--

CREATE TABLE `es_payments` (
  `id` int(15) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `student_name` varchar(150) NOT NULL,
  `branch` varchar(150) NOT NULL,
  `season` varchar(100) NOT NULL,
  `review_program` varchar(200) NOT NULL,
  `downpayment` varchar(50) NOT NULL,
  `or_date` date NOT NULL,
  `amount` int(20) NOT NULL,
  `pr_number` varchar(15) NOT NULL,
  `balance` int(20) NOT NULL,
  `photo` text NOT NULL,
  `remarks` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `es_rate`
--

CREATE TABLE `es_rate` (
  `rate_id` int(5) NOT NULL,
  `rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `es_rate`
--

INSERT INTO `es_rate` (`rate_id`, `rate`) VALUES
(1, 100),
(2, 150),
(3, 200),
(4, 250),
(6, 300);

-- --------------------------------------------------------

--
-- Table structure for table `es_review_programs`
--

CREATE TABLE `es_review_programs` (
  `program_id` int(10) NOT NULL,
  `program_group` varchar(100) NOT NULL,
  `program_code` varchar(15) NOT NULL,
  `program_description` varchar(100) NOT NULL,
  `program_fee` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `es_review_programs`
--

INSERT INTO `es_review_programs` (`program_id`, `program_group`, `program_code`, `program_description`, `program_fee`) VALUES
(2, 'SEASON1', 'LET', 'Licensure Examination for Teachers', 8000),
(3, 'SEASON2', 'CSE', 'Civil Service Exam', 5000),
(4, 'SEASON2', 'NLE', 'Nurses Licensure Exam', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `es_salary`
--

CREATE TABLE `es_salary` (
  `id` int(15) NOT NULL,
  `lecturer_id` varchar(15) NOT NULL,
  `lecturer_name` varchar(150) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` int(15) NOT NULL,
  `hours` int(15) NOT NULL,
  `total_salary` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `es_schedule`
--

CREATE TABLE `es_schedule` (
  `sched_id` int(15) NOT NULL,
  `lecturer_id` varchar(20) NOT NULL,
  `lecturer_name` varchar(150) NOT NULL,
  `review_program` varchar(200) NOT NULL,
  `day` varchar(15) NOT NULL,
  `time_from` varchar(10) NOT NULL,
  `time_to` varchar(10) NOT NULL,
  `branch` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `es_students`
--

CREATE TABLE `es_students` (
  `id` int(20) NOT NULL,
  `student_number` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `photo` text NOT NULL,
  `cp_number` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `school` text NOT NULL,
  `year_graduated` int(10) NOT NULL,
  `prev_rev_center` text NOT NULL,
  `no_of_times_taken` int(10) NOT NULL,
  `sex` varchar(15) NOT NULL,
  `age` int(15) NOT NULL,
  `birthday` date NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `name_to_contact` varchar(100) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `cp_number_of_cp` varchar(20) NOT NULL,
  `school_location` varchar(100) NOT NULL,
  `school_branch` varchar(150) NOT NULL,
  `terms_condition` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `enrolled_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `es_students`
--

INSERT INTO `es_students` (`id`, `student_number`, `firstname`, `middle_name`, `lastname`, `suffix`, `photo`, `cp_number`, `address`, `school`, `year_graduated`, `prev_rev_center`, `no_of_times_taken`, `sex`, `age`, `birthday`, `marital_status`, `name_to_contact`, `relationship`, `cp_number_of_cp`, `school_location`, `school_branch`, `terms_condition`, `status`, `enrolled_date`) VALUES
(33, '000000', 'DUMMY', 'DUMMY', 'DUMMY', '', '', '', '', '', 0, '', 0, '', 0, '0000-00-00', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `es_users`
--

CREATE TABLE `es_users` (
  `user_id` int(15) NOT NULL,
  `user_firstname` varchar(100) NOT NULL,
  `user_mn` varchar(25) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_suffix` varchar(10) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_photo` text NOT NULL,
  `user_account_type` varchar(100) NOT NULL,
  `user_branch` varchar(50) NOT NULL,
  `user_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `es_users`
--

INSERT INTO `es_users` (`user_id`, `user_firstname`, `user_mn`, `user_lastname`, `user_suffix`, `user_username`, `user_password`, `user_photo`, `user_account_type`, `user_branch`, `user_status`) VALUES
(1, 'Marcus', 'A', 'Neody', '', 'admin', 'admin', 'upload/1677995092.png', 'ADMINISTRATOR', '', 'ACTIVE'),
(29, 'Aparri', 'A', 'Branch', '', 'branch', '12345', 'upload/1680148363.png', 'BRANCH', 'APARRI BRANCH', 'ACTIVE'),
(30, 'Elon', 'A', 'Musk', '', 'Elon', 'Musk', 'upload/1680154445.png', 'LECTURER', 'APARRI BRANCH', 'ACTIVE'),
(31, 'JAMIE', 'MAGUERRA', 'DAVID', '', 'JAMIE', 'DAVID', 'upload/1680158626.png', 'LECTURER', 'APARRI BRANCH', 'ACTIVE'),
(33, 'a', 'a', 'a', '', 'admin', '123', 'admin/upload/1680745082.png', 'STUDENT', 'APARRI BRANCH', 'INACTIVE'),
(34, 'JAMEEL', 'AGUIRRE', 'BASHER', '', 'JAMEEL', '031990', 'admin/upload/1682945585.jpg', 'STUDENT', 'APARRI BRANCH', 'ACTIVE'),
(37, 'JAM', 'AGUIRRE', 'BASHER', '', 'jameel', '12345', 'admin/upload/1683084856.jpg', 'STUDENT', 'APARRI BRANCH', 'ACTIVE'),
(38, 'JAM', 'AGUIRRE', 'BASHER', '', 'jameel', '12345', 'admin/upload/1683086048.jpg', 'STUDENT', '', 'ACTIVE'),
(39, 'Elon', 'A', 'Musk', '', 'elon', '12345', '../admin/upload/1683113128.jpg', 'STUDENT', 'ANGELES BRANCH', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `es_announcement`
--
ALTER TABLE `es_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `es_branch`
--
ALTER TABLE `es_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `es_branch_announcement`
--
ALTER TABLE `es_branch_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `es_lecturers`
--
ALTER TABLE `es_lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `es_payments`
--
ALTER TABLE `es_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `es_rate`
--
ALTER TABLE `es_rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `es_review_programs`
--
ALTER TABLE `es_review_programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `es_salary`
--
ALTER TABLE `es_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `es_schedule`
--
ALTER TABLE `es_schedule`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `es_students`
--
ALTER TABLE `es_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `es_users`
--
ALTER TABLE `es_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `es_announcement`
--
ALTER TABLE `es_announcement`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `es_branch`
--
ALTER TABLE `es_branch`
  MODIFY `branch_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `es_branch_announcement`
--
ALTER TABLE `es_branch_announcement`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `es_lecturers`
--
ALTER TABLE `es_lecturers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `es_payments`
--
ALTER TABLE `es_payments`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `es_rate`
--
ALTER TABLE `es_rate`
  MODIFY `rate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `es_review_programs`
--
ALTER TABLE `es_review_programs`
  MODIFY `program_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `es_salary`
--
ALTER TABLE `es_salary`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `es_schedule`
--
ALTER TABLE `es_schedule`
  MODIFY `sched_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `es_students`
--
ALTER TABLE `es_students`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `es_users`
--
ALTER TABLE `es_users`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
