-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 04:29 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(255) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `CompanyCellphone` varchar(15) NOT NULL,
  `CompanyAddress` varchar(50) NOT NULL,
  `CompanyEmail` varchar(50) NOT NULL,
  `CompanyManager` varchar(50) NOT NULL,
  `ManagerCellphone` varchar(15) NOT NULL,
  `ManagerEmail` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `CompanyName`, `CompanyCellphone`, `CompanyAddress`, `CompanyEmail`, `CompanyManager`, `ManagerCellphone`, `ManagerEmail`, `comment`) VALUES
(1, 'Amazon', '7879876543', 'San German, PR', 'amz@gmail.com', 'N/A', 'N/A', 'amz@gmail.com', 'A++'),
(2, 'Claro PR', '787 333 4444', 'Ponce, PR', 'Claro@hotmail.com', 'Jose', '787 7775555', 'JoseClaro@gmail.com', ''),
(3, 'Liberty PR', '787 333 4444', 'San Juan, PR', 'LibertyPR@gmail.com', 'Juan Del Pueblo', '787 555 5555', 'JuanLiberty@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(200) NOT NULL,
  `Company` varchar(200) NOT NULL,
  `DepartmentManager` varchar(200) NOT NULL,
  `DepartmentManagerPhone` varchar(200) NOT NULL,
  `c_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `DepartmentName`, `Company`, `DepartmentManager`, `DepartmentManagerPhone`, `c_id`, `status`, `comment`) VALUES
(2, 'Marketing ', 'Claro PR', 'Joe', 'N/A', 2, 1, ''),
(3, 'Production', 'Amazon', 'Jeff', 'N/A', 1, 1, 'hi'),
(28, 'Research and Development', 'Amazon', 'Jose', '777 888 9999', 1, 1, 'Hello World');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `Semesters` varchar(100) NOT NULL,
  `StartOfSemester` date NOT NULL,
  `EndOfSemester` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`Semesters`, `StartOfSemester`, `EndOfSemester`) VALUES
('Aug-Dec-2021', '2021-08-12', '2021-12-10'),
('Jan-May-2022', '2022-01-14', '2022-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `setup`
--

CREATE TABLE `setup` (
  `UniName` varchar(300) NOT NULL,
  `UniAddress` varchar(300) NOT NULL,
  `UniDepartment` varchar(300) NOT NULL,
  `UniNumber` varchar(100) NOT NULL,
  `DirectorName` varchar(100) NOT NULL,
  `ProfessorName` varchar(100) NOT NULL,
  `CurrentSemester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup`
--

INSERT INTO `setup` (`UniName`, `UniAddress`, `UniDepartment`, `UniNumber`, `DirectorName`, `ProfessorName`, `CurrentSemester`) VALUES
('Interamerican University of Puerto Rico', 'San German Campus', 'Department of Science and Technology', '7871234567', 'John', 'Doe', 'Aug-Dec-2021');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `StudentCellphone` varchar(15) NOT NULL,
  `StudentEmail` varchar(50) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Semester` varchar(100) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `FirstName`, `LastName`, `StudentCellphone`, `StudentEmail`, `Company`, `Department`, `Semester`, `Gender`, `comment`) VALUES
(2, 'Mickey', 'Mouse', '7871234567', 'mickey@gmail.com', 'Amazon', 'Production', 'Aug-Dec-2021', 'male', ''),
(8, 'Minnie', 'Mouse', '7871234567', 'Minnie@gmail.com', 'Amazon', 'Production', 'Aug-Dec-2021', 'female', ''),
(12, 'John', 'Doe', 'na', 'jd@gmail.com', 'Amazon', 'Research and Development', 'Aug-Dec-2021', 'male', 'John Doe...'),
(13, 'Emily', 'Alicea', '7871234567', 'EAlicea@intersg.edu', 'Amazon', 'Production', 'Jan-May-2022', 'female', ''),
(16, 'Mikey', 'NA', '7871234567', 'mikey@gmail.com', 'Claro PR', 'Marketing ', 'Aug-Dec-2021', 'male', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_ibfk_1` (`c_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`Semesters`);

--
-- Indexes for table `setup`
--
ALTER TABLE `setup`
  ADD PRIMARY KEY (`UniName`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentEmail` (`StudentEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
