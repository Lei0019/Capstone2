-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2025 at 11:34 AM
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
-- Database: `jolo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(2, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(10, 'jane opiaal', 'jane', 'janeopiala@ymail.com', '123'),
(11, 'marc montero', 'marc montero', 'marc.montero@gmail.com', '123456'),
(12, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(13, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(14, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(15, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(16, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(17, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(18, 'jolo rebua', 'jolo', 'jolorebua25@gmail.com', '123'),
(19, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(20, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(21, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(22, 'Justine Gomez', 'sdfghj', 'jus@gmail.com', '123'),
(23, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(24, 'Jolo Rebua', 'jol', 'jol@gmail.com', '12345'),
(25, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(26, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(27, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123'),
(28, 'sad11', 'sad', 'sad11@gmail.com', '123'),
(29, 'sad11', 'sad', 'sad11@gmail.com', '123'),
(30, 'sad11', 'sad', 'sad11@gmail.com', '123'),
(31, 'Jolo Rebua', 'jol', 'jol@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
