-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2025 at 02:29 AM
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
-- Database: `maklumat-pelajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(100) NOT NULL,
  `ic` varchar(12) NOT NULL,
  `class` varchar(3) NOT NULL,
  `kohort` varchar(20) NOT NULL,
  `kelayakan_skm` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `ic`, `class`, `kohort`, `kelayakan_skm`) VALUES
('Hannah Zulaikha', '000407060321', 'CTP', '2022', 1),
('Amirul Syafiq', '000521071234', 'CTP', '2022', 1),
('Nur Aina', '000613070432', 'HSK', '2024', 0),
('Nadia Humaira', '000614010765', 'HSK', '2024', 0),
('Syafiqah Najwa', '000726060432', 'HSK', '2023', 0),
('Nurul Syamimi', '000917050222', 'BPP', '2022', 1),
('Alia Zahrah', '000918060654', 'BPR', '2024', 0),
('Farhan Azmi', '010607090987', 'ISK', '2024', 0),
('Adam Haziq', '010705060111', 'BPR', '2022', 1),
('Muhammad Danish', '010804080999', 'BPP', '2023', 1),
('Muhammad Aiman', '010909030876', 'CTP', '2024', 1),
('Aqil Harith', '010912040765', 'HBP', '2024', 1),
('Dina Amani', '011010080987', 'IPD', '2024', 1),
('Danish Iman', '011110040876', 'IPD', '2023', 1),
('Mohd Irfan', '011212050678', 'CTP', '2023', 1),
('Siti Khadijah', '011219070876', 'CTP', '2023', 1),
('Mohd Hafiz', '020204090678', 'BPR', '2022', 1),
('Hafizuddin', '020503070876', 'BPP', '2022', 1),
('Nursyahirah', '020608070654', 'ISK', '2023', 1),
('Hakim Razak', '020613030789', 'IPD', '2022', 1),
('Muhammad Rayyan', '020801090345', 'HBP', '2024', 1),
('Sabrina Amani', '020805030999', 'BPM', '2024', 0),
('Hakimuddin Omar', '020806030678', 'BPR', '2023', 1),
('Nurul Izzah', '020915050234', 'HSK', '2023', 1),
('Danish Haikal', '021002090876', 'IPD', '2023', 1),
('Siti Amirah', '021007050987', 'HBP', '2023', 1),
('Nur Fatin', '021105040923', 'HBP', '2022', 1),
('Nur Aisyah', '021108050876', 'BPM', '2024', 0),
('Ikhwan Iklil', '021211050345', 'BPM', '2023', 1),
('Afiqah Zahra', '030110080567', 'BPP', '2023', 1),
('Amira Batrisyia', '030306040654', 'ISK', '2022', 1),
('Alya Sofea', '030309020345', 'BPR', '2024', 1),
('Aiman Hakim', '030411080123', 'IPD', '2022', 1),
('Nabila Auni', '030413080567', 'BPP', '2024', 0),
('Ahmad Zhafran', '030514060555', 'BPM', '2024', 0),
('Zulhilmi Amin', '030713090555', 'ISK', '2022', 1),
('Ahmad Luqman', '030914070245', 'ISK', '2024', 1),
('Farid Hamzah', '031205090123', 'HSK', '2022', 0),
('Siti Nabila', '031210020567', 'HBP', '2023', 1),
('Izzati Farhana', '031215090345', 'BPM', '2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `ic` varchar(12) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `ic`, `password`, `role`) VALUES
('admin', '071017110475', 'password', 1),
('user', '071017220475', 'password', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ic`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ic`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
