-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 08:21 AM
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
-- Database: `portfolio_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_subject` varchar(255) NOT NULL,
  `c_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_ID`, `user_ID`, `c_name`, `c_email`, `c_subject`, `c_message`) VALUES
(2, 1, 'Jane Dane', 'JaneDane@email.com', 'I want to test your project 2', 'YAYYY'),
(3, 1, 'das', 'dsa@email.com', 'dasdas', 'dsadas'),
(4, 1, 'dsadsa', 'dsa@email.com', 'dasdasda', 'dsadas'),
(5, 1, 'ewq', 'dsa@email.com', 'dasdasdadada', 'dsadsa'),
(6, 1, 'ewq', 'dsa@email.com', 'dasdasdadada', 'dadsa'),
(7, 1, 'ewq', 'dsa@email.com', 'dasdasdadada', 'pls work'),
(8, 1, 'ewqss', 'dsa@email.com', 'dasdasdadadas', 'pls worksss');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `educational_level` varchar(255) NOT NULL,
  `campus_name` varchar(255) NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `attainments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_ID`, `user_ID`, `educational_level`, `campus_name`, `school_year`, `attainments`) VALUES
(9, 1, 'High School', 'Canossa Academy', '(2014 - 2018)', 'Graduated as an achiever and as an active member of the Math Honor\'s Society, Chess, and Taekwondo Club.'),
(10, 1, 'Senior High School', 'APEC Schools Lipa City', '(2019 - 2021)', 'Graduated with Excellence and Merit awards.'),
(11, 1, 'Bachelor of Science in Computer Science', 'National University Lipa City', '(2022 - Present)', 'Made the Dean\'s List for 3 terms.');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projects_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_description` text NOT NULL,
  `project_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projects_ID`, `user_ID`, `project_title`, `project_description`, `project_photo`) VALUES
(6, 1, 'LAYA (Legal Aid at Your Access)', 'An AI chatbot designed to address all your inquiries and needs related to Philippine laws. This advanced virtual assistant provides comprehensive and accurate information, helping you navigate legal questions, understand regulations, and stay informed about legal matters specific to the Philippines.', 'Project-1.png'),
(7, 1, 'iPaws', 'A comprehensive pet tracker app that enables you to connect with fellow pet owners, locate the nearest veterinary services, and monitor your pet&#039;s daily activities and needs.', 'Project-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skills_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `skill_name` varchar(255) NOT NULL,
  `skill_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skills_ID`, `user_ID`, `skill_name`, `skill_description`) VALUES
(7, 1, 'Time Management', 'I excel in time management, effectively prioritizing tasks and meeting deadlines consistently. I organize my workload to maximize productivity and ensure timely completion of projects, all while balancing multiple responsibilities with ease.'),
(13, 1, 'Quick Learner', 'I have a strong ability to rapidly grasp new concepts and technologies. I adapt quickly to changing environments and integrate new knowledge into practical applications, which enhances my efficiency and performance in various tasks and projects.'),
(14, 1, 'Web Design', 'I am proficient in web design, utilizing HTML, CSS, PHP, and MySQL to create visually appealing and functional websites. I develop responsive web pages, implement server-side scripting, and manage databases to deliver seamless user experiences and robust backend functionalities.'),
(15, 1, 'Coding', 'I have an extensive experience with Java and Python, leveraging these languages to develop efficient and scalable software solutions. I write clean, well-documented code and solve complex problems through innovative programming techniques and practices.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `user_name`, `user_password`) VALUES
(1, 'JM', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projects_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skills_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projects_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skills_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
