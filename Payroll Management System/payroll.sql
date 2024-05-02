-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost: 3307
-- Generation Time: May 01, 2024 at 10:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_records`
--

CREATE TABLE `employee_records` (
  `Id` int(50) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Mname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Hiredate` date NOT NULL,
  `Dept` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_records`
--

INSERT INTO `employee_records` (`Id`, `Fname`, `Mname`, `Lname`, `Email`, `Contact`, `Hiredate`, `Dept`, `Role`, `Birthdate`) VALUES
(2, 'Sean Jesbert', '', 'Medel', 'SeanJesbert@gmail.com', '09522122212', '2014-11-14', 'Hospital', 'Doctor', '2003-10-03'),
(3, 'Nathaniel', '', 'Bautista', 'NathanielBautista@gmail.com', '09545445484', '2024-05-05', 'English Communication', 'Instructor', '2003-05-05'),
(4, 'Divine Angel', '', 'Brasales', 'Divina@gmail.com', '09564548546', '2022-05-05', 'Hospital', 'Nurse', '2002-12-22'),
(5, 'Christian', '', 'Bolima', 'Chan210@gmail.com', '09888455524', '2022-05-05', 'Information Technology', 'Programmer', '2003-06-06'),
(6, 'Emmanuel', 'Guela', 'Caballes', 'Billionaire@gmail.com', '09545484545', '2003-05-05', 'Engineering', 'Computer Engineer', '2000-12-25'),
(7, 'Fender', '', 'Legaspi', 'Fender10@gmail.com', '09558457454', '2003-05-05', 'Customer Service Provider', 'Technical Support', '2003-05-05'),
(8, 'Eli Emmanuel', '', 'David', 'Eli10@gmail.com', '0958545454', '2019-05-05', 'Information Technology', 'Programmer', '2003-04-04'),
(9, 'Denzel', 'Rusiana', 'Dela', 'Denzel10@gmail.com', '09548454575', '2014-05-05', 'Engineering', 'Electrical Engineer', '2003-05-17'),
(10, 'Jherrie ', '', 'Alba', 'Jherrie@yahoo.com', '0955458454', '2016-05-05', 'Information Technology', 'Programmer', '2003-10-19'),
(11, 'Nicole', '', 'Endrina', 'NicoleEndrina@gmail.com', '09545485454', '2017-05-05', 'Information Technology', 'IT Support', '2003-04-30'),
(12, 'Karl', '', 'Feudo', 'KarlFeudo@gmail.com', '09545458454', '2024-05-05', 'Information Technology', 'IT Specialist', '2003-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `Id` int(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`Id`, `Email`, `password`, `account_type`) VALUES
(1, 'admin', 'admin123', '1'),
(2, 'user', 'user123', '2'),
(3, 'hr', 'hr123', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user_leave_requests`
--

CREATE TABLE `user_leave_requests` (
  `Id` int(50) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Type_of_leave` varchar(255) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_leave_requests`
--

INSERT INTO `user_leave_requests` (`Id`, `Name`, `Type_of_leave`, `Start_date`, `End_date`, `Description`, `Status`) VALUES
(1, 'Sean Jesbert Medel', 'Maternity Leave', '2024-05-05', '2024-06-05', 'Lorem Ipsum Arli', 'Approved'),
(2, 'Joshua Saldivar', 'Maternity Leave', '2024-06-06', '2024-07-08', 'saket', 'Declined'),
(3, 'Denzel Rusiana Dela', 'Vision Appointment Leave', '2006-07-08', '2006-09-08', 'awts', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_records`
--
ALTER TABLE `employee_records`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `login_tbl`
--
ALTER TABLE `login_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user_leave_requests`
--
ALTER TABLE `user_leave_requests`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_records`
--
ALTER TABLE `employee_records`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_leave_requests`
--
ALTER TABLE `user_leave_requests`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
