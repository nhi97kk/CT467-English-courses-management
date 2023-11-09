-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 10:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `ct467_project`
--
CREATE DATABASE IF NOT EXISTS `ct467_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ct467_project`;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `name` char(100) NOT NULL,
  `desc` char(200) NOT NULL,
  `teacher_id` int(10) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `desc`, `teacher_id`, `updated_at`, `created_at`) VALUES
(8, 'Toiec', 'Tiếng anh Toiec 2 kỹ năng', 4, '2023-11-08 12:33:41', '2023-11-06 23:51:39'),
(11, 'C1', 'Tiếng anh C1', 4, '2023-11-08 12:33:15', '2023-11-07 10:31:19'),
(13, 'B1', 'Tiếng anh B1', 4, '2023-11-08 12:33:01', '2023-11-07 21:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) NOT NULL,
  `num` int(4) NOT NULL,
  `notes` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `num`, `notes`, `updated_at`, `created_at`) VALUES
(2, 201, 'Floor 2', '2023-11-08 13:08:01', '2023-11-08 13:08:01'),
(3, 101, 'Floor 1', '2023-11-08 13:32:33', '2023-11-08 13:32:33'),
(4, 202, 'Floor 2', '2023-11-08 18:49:06', '2023-11-08 18:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `name` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `updated_at`, `created_at`) VALUES
(1, 'Võ Thị Yến Nhi 0', 'yennhi20vl@gmail.com', 794944429, 2023, 2023),
(4, 'Võ Thị Yến Nhi 1', 'yennhi21vl@gmail.com', 794944427, 2023, 2023),
(5, 'Võ Thị Yến Nhi 2', 'yennhi22vl@gmail.com', 794944428, 2023, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `role`, `updated_at`, `created_at`) VALUES
(3, 'Võ Thị Yến Nhi', 'yennhi20vl@gmail.com', '$2y$10$a/dhzlmrZVOu9rpofAXqKOXia06GsSLegoEOeHue0x13qyXW44kd2', 0, '2023-11-08 00:16:27', '2023-11-06 15:42:26'),
(4, 'Admin', 'admin@gmail.com', '$2y$10$Q80xq53zsw3vxrBbXT8JzeJuMqldPWRqrK6uPTHdye.cFUwr2UsSe', 1, '2023-11-06 23:51:04', '2023-11-06 23:51:04'),
(5, 'Bui Vo Quoc Bao', 'baocit@gmail.com', '', 0, '2023-11-07 23:53:09', '2023-11-07 23:53:09'),
(7, 'Võ Thị Ngọc Giàu', 'yennhi21vl@gmail.com', '', 0, '2023-11-08 11:56:42', '2023-11-08 11:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `name`, `start`, `end`, `updated_at`, `created_at`) VALUES
(1, 'M8', '08:00:00', '12:00:00', '2023-11-08 14:19:08', '2023-11-08 14:19:08'),
(3, 'A9', '09:00:00', '11:00:00', '2023-11-08 19:28:13', '2023-11-08 19:28:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;


