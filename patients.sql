-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 02:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `blood_type` varchar(10) DEFAULT NULL,
  `consultation_date` date DEFAULT NULL,
  `medical_history` text DEFAULT NULL,
  `chief_complaint` text DEFAULT NULL,
  `emergency_contact` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `middle_name`, `last_name`, `age`, `dob`, `gender`, `contact`, `email`, `blood_type`, `consultation_date`, `medical_history`, `chief_complaint`, `emergency_contact`) VALUES
(1, 'MA.', 'SESEÑA', 'I MAGLANA', 29, '1996-01-07', 'FEMALE', '09071057354', 'chinmaglana07@gmail.com', 'O+', '2025-02-12', 'sample', 'sample', '09703919405'),
(2, 'MA.', 'SESEÑA', 'I MAGLANA', 29, '1996-01-07', 'FEMALE', '09071057354', 'chinmaglana07@gmail.com', 'O+', '2025-02-12', 'sample', 'sample', '09703919405'),
(3, 'ponce', 'arat', 'gamana', 22, '2002-06-26', 'MALE', '09704895611', 'chinmaglana07@gmail.com', 'O', '2025-02-12', 'HYPERTENSION', 'BACK PAIN', '09703919406'),
(4, 'LEONORA', 'ARAT', 'MAGLANA', 35, '1990-02-25', 'Female', '09071057354', 'chinmaglana07@gmail.com', 'A+', '2025-02-12', 'MH_SAMPLE', 'CC_SAMPLE', '09703919409'),
(5, 'nove', 'lagawan', 'suico', 33, '1990-11-25', 'Female', '09784551123', 'nove@gmail.com', 'B+', '2025-02-12', 'MH', 'CC', '09703919434');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
