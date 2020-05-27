-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 07:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_pickup`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usn` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `g_email` varchar(150) NOT NULL,
  `class` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `pickup` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `media_id` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usn`, `fname`, `lname`, `phone`, `email`, `gname`, `g_email`, `class`, `id`, `pass`, `pickup`, `type`, `media_id`, `created_at`) VALUES
('1234567890', 'Manish', 'Alva', 'manish@gmail.com', 'manish@gmail.com', 'Akshay', 'akshaya@gmail.com', '3A', 1, '12345678', 'Kalladka', 'Student', 'uploads/abc.png', '2020-04-19 06:53:31'),
('admin1234', 'Admin', 'Admin', '123456789', 'admin@gmail.com', 'admin', 'admin@gmail.com', '3', 2, '12345678', 'Admin', 'Admin', '', '2020-04-19 06:53:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
