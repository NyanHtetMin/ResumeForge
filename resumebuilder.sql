-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2026 at 07:27 AM
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
-- Database: `resumebuilder`
--

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `course` varchar(250) NOT NULL,
  `institute` varchar(250) NOT NULL,
  `started` varchar(250) NOT NULL,
  `ended` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `resume_id`, `course`, `institute`, `started`, `ended`) VALUES
(2, 2, 'Complete Zoology', 'MErto', 'December 2022', 'January'),
(3, 2, 'art class', 'MErto', 'October 3', 'Currently'),
(26, 14, 'Computer Science', 'Aston University', 'January 3', 'February 3'),
(28, 18, 'Diploma In System Creator ', 'Metro IT', 'Feb 2023', 'Fe 2024'),
(29, 18, 'BSC.Zoology', 'Yangon University of Distance Education', '2023', '2026'),
(30, 18, 'Professional Web Developer Course I', 'Fairway Technology', 'Feb 2025', 'April 2025'),
(31, 18, 'Professional Web Developer Course II', 'Fairway Technology', 'Dec 2025', 'Feb 2026');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `position` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `job_desc` text NOT NULL,
  `started` varchar(250) NOT NULL,
  `ended` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `resume_id`, `position`, `company`, `job_desc`, `started`, `ended`) VALUES
(11, 2, 'Java Developer', 'Micro Company', 'Checking\r\n', 'December 2022', 'Currently'),
(12, 2, 'Python Develper', 'abs company', 'code check', 'October 3', 'January'),
(35, 14, 'Java Developer', 'Microsoft Company', 'Assistance', 'December 2022', 'Currently');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `marital_status` varchar(250) NOT NULL,
  `hobbies` varchar(250) NOT NULL,
  `languages` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `objective` text NOT NULL,
  `slug` varchar(250) NOT NULL,
  `updated_at` int(20) NOT NULL,
  `resume_title` varchar(250) NOT NULL,
  `background` varchar(250) NOT NULL DEFAULT '"',
  `font` varchar(250) NOT NULL DEFAULT '''Poppins'', sans-serif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `full_name`, `email_id`, `mobile_no`, `dob`, `gender`, `religion`, `nationality`, `marital_status`, `hobbies`, `languages`, `address`, `objective`, `slug`, `updated_at`, `resume_title`, `background`, `font`) VALUES
(2, 1, 'Nyan Htet MIn', 'nyanhtetmin3@gmail.com', '09447490586', '2025-12-29', 'Male', 'Buddhist', 'Myanmar', 'Single', 'reading', 'English', '12bahan', 'a widely-used, open-source server-side scripting language for web development', '12096q6f73v00_5k9d', 1765824012, 'Java Developer', 'tile12.png', '\'Gloria Hallelujah\', cursive'),
(14, 2, 'Min Win Mhan Hein', 'minwinmhanhein2005@gmail.com', '0973456729', '2005-09-15', 'Male', 'Buddhist', 'Mon', 'Divorced', 'masturbation', 'English & Japanese', 'a nee gar street', 'Superman', 'q_56smz5o97n5gh9yc', 1766945822, 'Java Developer', 'tile12.png', '\'Poppins\', sans-serif'),
(17, 3, 'Nyan htet Min', 'nyanhtetmin3@gmail.com', '+959447490586', '2004-12-29', 'Male', 'Buddhist', 'Myanmar', 'Single', 'Travel', 'English & Japanese', 'Yangon', 'I want to be Project Manager\r\n', '1ja71_7k3h2w7eqf1y', 1779111281, 'Java Developer', 'tile22.png', '\'Poppins\', sans-serif'),
(18, 4, 'Nyan htet Min', 'nyanhtetmin3@gmail.com', '+959447490586', '2004-12-29', 'Male', 'Buddhist', 'Myanmar', 'Single', 'Traveling', 'English & Japanese&Myanmar', 'Yangon', 'I want to Senior Developer ', 'fyn6c_75v37ljbiz02', 1782071132, 'Junior Web Developer', '\"', '\'Poppins\', sans-serif');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `resume_id`, `skill`) VALUES
(2, 2, 'php'),
(3, 2, 'Java'),
(26, 14, 'Java & Python & PHP & JavaScript');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email_id`, `password`) VALUES
(4, 'Nyan Htet Min', 'nyanhtetmin3@gmail.com', 'ea18c18691ed877962441124307d0835');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
