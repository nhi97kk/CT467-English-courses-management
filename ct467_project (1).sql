-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 06:44 AM
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
-- Database: `ct467_project`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CountCourses` ()   BEGIN
    SELECT COUNT(*) AS total_courses FROM courses;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CountStudents` ()   BEGIN
    SELECT COUNT(*) AS total_students FROM students;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CountTeachers` ()   BEGIN
    SELECT COUNT(*) AS total_teachers FROM teachers;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `countStudentInClass` (`courseId` INT) RETURNS INT(11)  BEGIN
    DECLARE count INT;
    
    SELECT COUNT(*) INTO count
    FROM results
    WHERE course_id = courseId;
    
    RETURN count;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `name` char(100) NOT NULL,
  `desc` char(200) NOT NULL,
  `start` date NOT NULL DEFAULT current_timestamp(),
  `end` date NOT NULL DEFAULT current_timestamp(),
  `teacher_id` int(10) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `desc`, `start`, `end`, `teacher_id`, `updated_at`, `created_at`) VALUES
(15, 'Toiec', 'tieng anh toiec', '2023-11-16', '2023-11-24', 3, '2023-11-14 19:51:58', '2023-11-11 01:41:40'),
(16, 'B2', 'Lớp tiếng anh B2_02', '2023-11-14', '2023-11-14', 3, '2023-11-14 00:48:22', '2023-11-11 04:01:20'),
(17, 'B2', 'Lớp tiếng anh B2_01', '2023-11-14', '2023-11-14', 8, '2023-11-14 00:48:08', '2023-11-13 18:41:24'),
(18, 'Toiec', 'tieng anh toiec', '2023-11-15', '2023-11-16', 3, '2023-11-14 19:50:10', '2023-11-14 19:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `result` int(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `course_id`, `result`, `updated_at`, `created_at`) VALUES
(2, 4, 15, 9, '2023-11-11 13:20:27', '2023-11-11 05:36:17'),
(3, 5, 16, 750, '2023-11-13 18:46:01', '2023-11-11 05:36:42'),
(6, 1, 15, 6, '2023-11-11 13:20:52', '2023-11-11 12:13:57');

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
(5, 102, 'Floor 1', '2023-11-13 08:45:33', '2023-11-13 08:45:33'),
(6, 202, 'Floor 2', '2023-11-13 18:44:33', '2023-11-13 18:44:33'),
(7, 203, 'Floor 2', '2023-11-14 22:01:45', '2023-11-14 22:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `time_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `teacher_id`, `room_id`, `time_id`, `course_id`, `updated_at`, `created_at`) VALUES
(12, 8, 2, 4, 0, '2023-11-14 10:25:01', '2023-11-13 12:18:13'),
(13, 3, 2, 3, 16, '2023-11-13 21:40:32', '2023-11-13 12:18:58'),
(15, 3, 5, 1, 15, '2023-11-14 00:50:33', '2023-11-13 19:11:55'),
(16, 8, 5, 4, 0, '2023-11-13 19:12:11', '2023-11-13 19:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `name` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `address`, `updated_at`, `created_at`) VALUES
(1, 'Võ Thị Yến Nhi 0', 'yennhi20vl@gmail.com', '0794944429', 'Ki tuc xa khu A', 2023, 2023),
(4, 'Võ Thị Yến Nhi 1', 'yennhi21vl@gmail.com', '0794944427', 'Ki tuc xa khu A', 2023, 2023),
(5, 'Võ Thị Yến Nhi 2', 'yennhi22vl@gmail.com', '0794944430', 'Ki tuc xa khu A', 2023, 2023),
(7, 'Võ Thị Yến Nhi', 'admin@gmail.com', '0794944428', 'Ki tuc xa khu A', 2023, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `major` text NOT NULL,
  `exp` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 10,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `major`, `exp`, `phone`, `password`, `role`, `updated_at`, `created_at`) VALUES
(3, 'Võ Thị Yến Nhi', 'yennhi20vl@gmail.com', 'Information technology', '1 year at FPTsoft', '0794944427', '$2y$10$X7/bG3/ZmW1Glqpgpgmfzef1FKql3Rq2aQsJAevlag23D/Qootkni', 0, '2023-11-14 20:26:38', '2023-11-06 15:42:26'),
(4, 'Admin', 'admin@gmail.com', '', '', '0', '$2y$10$kchfOUompmtNP9luOaPfrOLEz4.un1ofjtIYZjmB2w1C39UXfWEH6', 1, '2023-11-13 19:50:36', '2023-11-06 23:51:04'),
(8, 'Võ Thị Ngọc Giàu', 'yennhi21vl@gmail.com', '', '', '0', '$2y$10$Ry2Qfnivr6RGT4Sz8ZBBcOwtV91glt/HzXkY33i2zrllMjuV5qjia', 0, '2023-11-13 18:40:40', '2023-11-13 18:40:40'),
(15, 'Võ Hữu Tiến', 'tien@gmail.com', '', '', '0', '$2y$10$6KCFmKaV6/NEyVW74y2LX.H8ddBTgAq1fPk0Q7ZfcnvsM5J3WsOHC', 0, '2023-11-14 02:22:36', '2023-11-14 02:22:36'),
(16, 'Mr Lee', 'lee@gmail.com', 'Information technology', '1 year at FPTsoft', '0794944430', '$2y$10$dSYQaRYJ6LyaFwl8cdAI.uo4vdAi22jQ2GStqRtODwW9PYedUlrPO', 0, '2023-11-14 20:34:11', '2023-11-14 20:34:11');

--
-- Triggers `teachers`
--
DELIMITER $$
CREATE TRIGGER `newreg` BEFORE INSERT ON `teachers` FOR EACH ROW BEGIN
    SET new.role = 0;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `day` varchar(20) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `name`, `day`, `start`, `end`, `updated_at`, `created_at`) VALUES
(1, 'MON_E8', 'Monday', '20:00:00', '21:00:00', '2023-11-08 14:19:08', '2023-11-08 14:19:08'),
(3, 'MON_E6', 'Monday', '18:00:00', '19:00:00', '2023-11-08 19:28:13', '2023-11-08 19:28:13'),
(4, 'TUES_E8', 'Tuesday', '20:00:00', '21:00:00', '2023-11-13 08:45:13', '2023-11-13 08:45:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
