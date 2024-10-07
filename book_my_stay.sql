-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 10:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book my stay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Email`, `Password`) VALUES
(1, 'Elisha', 'Admin@gmail.com', '$2y$10$mfYUsQ5XJ1L6IFXwWkRloebfIefeZ3uhjwZxk8hxK9LgJ45D5tUVK');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `issue_type` varchar(255) NOT NULL,
  `guest_service` varchar(255) DEFAULT NULL,
  `severity` enum('Low','Medium','High','Critical') NOT NULL,
  `message` text NOT NULL,
  `reported_by` int(11) NOT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `status` enum('Reported','In Progress','Resolved','Closed') DEFAULT 'Reported',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `room_id` int(30) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `usermail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `issue_type`, `guest_service`, `severity`, `message`, `reported_by`, `assigned_to`, `status`, `created_at`, `updated_at`, `room_id`, `user_id`, `usermail`) VALUES
(3, 'Maintenance', 'Concierge', 'Medium', '0', 8, NULL, 'Reported', '2024-09-22 09:41:36', '2024-09-22 09:41:36', NULL, 8, 'Musenge@gmail.com'),
(4, 'Cleanliness', 'Room Service', 'Low', '0', 8, NULL, 'Reported', '2024-09-22 09:46:34', '2024-09-22 09:46:34', NULL, 8, 'Musenge@gmail.com'),
(5, 'Maintenance', 'Tea', 'Low', '0', 8, NULL, 'Reported', '2024-09-22 09:55:56', '2024-09-22 09:55:56', NULL, 8, 'Musenge@gmail.com'),
(6, 'Maintenance', 'Room Service', 'High', '0', 8, NULL, 'Reported', '2024-09-23 06:28:15', '2024-09-23 06:28:15', NULL, 8, 'Musenge@gmail.com'),
(7, 'Electrical', 'Tea', 'Medium', '0', 8, NULL, 'Reported', '2024-09-23 08:27:10', '2024-09-23 08:27:10', NULL, 8, 'Musenge@gmail.com'),
(8, 'Cleanliness', NULL, 'Medium', '0', 8, NULL, 'Reported', '2024-09-23 08:51:19', '2024-09-23 08:51:19', NULL, 8, 'Musenge@gmail.com'),
(9, 'Maintenance', 'Tea', 'High', '0', 8, NULL, 'Reported', '2024-09-23 10:19:09', '2024-09-23 10:19:09', NULL, 8, 'Musenge@gmail.com'),
(10, 'Electrical', 'Laundry', 'Low', '0', 8, NULL, 'Reported', '2024-09-23 10:45:59', '2024-09-23 10:45:59', NULL, 8, 'Musenge@gmail.com'),
(11, 'Electrical', 'Laundry', 'Low', '0', 8, NULL, 'Reported', '2024-09-23 10:46:06', '2024-09-23 10:46:06', NULL, 8, 'Musenge@gmail.com'),
(12, 'Electrical', 'Laundry', 'Low', '0', 8, NULL, 'Reported', '2024-09-23 10:46:08', '2024-09-23 10:46:08', NULL, 8, 'Musenge@gmail.com'),
(13, 'Electrical', 'Laundry', 'Low', '0', 8, NULL, 'Reported', '2024-09-23 10:46:09', '2024-09-23 10:46:09', NULL, 8, 'Musenge@gmail.com'),
(14, 'Electrical', 'Laundry', 'Low', '0', 8, NULL, 'Reported', '2024-09-23 10:46:09', '2024-09-23 10:46:09', NULL, 8, 'Musenge@gmail.com'),
(15, 'Electrical', 'Laundry', 'Low', '0', 8, NULL, 'Reported', '2024-09-23 10:46:11', '2024-09-23 10:46:11', NULL, 8, 'Musenge@gmail.com'),
(16, 'Maintenance', 'Laundry', 'Low', '0', 8, NULL, 'Reported', '2024-09-23 10:47:11', '2024-09-23 10:47:11', NULL, 8, 'Musenge@gmail.com'),
(17, 'Fire', NULL, 'Critical', '0', 8, NULL, 'Reported', '2024-09-23 12:45:06', '2024-09-23 12:45:06', NULL, 8, 'Musenge@gmail.com'),
(18, 'Electrical', 'Laundry', 'Medium', '0', 8, NULL, 'Reported', '2024-09-23 12:45:41', '2024-09-23 12:45:41', NULL, 8, 'Musenge@gmail.com'),
(19, 'Electrical', 'Tea', 'Critical', '0', 8, NULL, 'Reported', '2024-09-28 12:00:17', '2024-09-28 12:00:17', NULL, 8, 'Musenge@gmail.com'),
(20, 'Cleanliness', 'Laundry', 'Medium', '0', 11, NULL, 'Reported', '2024-10-04 14:05:10', '2024-10-04 14:05:10', NULL, 11, 'Mapili45@gmail.com'),
(21, 'Electrical', 'Laundry', 'High', '0', 11, NULL, 'Reported', '2024-10-04 14:10:37', '2024-10-04 14:10:37', NULL, 11, 'Mapili45@gmail.com'),
(22, 'Electrical', 'Concierge', 'Medium', '0', 11, NULL, 'Reported', '2024-10-04 14:11:38', '2024-10-04 14:11:38', NULL, 11, 'Mapili45@gmail.com'),
(23, 'Fire', 'Concierge', 'High', '0', 11, NULL, 'Reported', '2024-10-04 14:12:08', '2024-10-04 14:12:08', NULL, 11, 'Mapili45@gmail.com'),
(24, 'Electrical', 'Laundry', 'Medium', '0', 11, NULL, 'Reported', '2024-10-04 14:12:28', '2024-10-04 14:12:28', NULL, 11, 'Mapili45@gmail.com'),
(25, 'Cleanliness', 'Laundry', 'Medium', '0', 11, NULL, 'Reported', '2024-10-04 14:12:47', '2024-10-04 14:12:47', NULL, 11, 'Mapili45@gmail.com'),
(26, 'Electrical', 'Concierge', 'Low', '0', 11, NULL, 'Reported', '2024-10-04 14:13:22', '2024-10-04 14:13:22', NULL, 11, 'Mapili45@gmail.com'),
(27, 'Maintenance', 'Tea', 'Low', '0', 11, NULL, 'Reported', '2024-10-04 14:14:48', '2024-10-04 14:14:48', NULL, 11, 'Mapili45@gmail.com'),
(28, 'Cleanliness', 'Laundry', 'High', '0', 11, NULL, 'Reported', '2024-10-04 14:15:05', '2024-10-04 14:15:05', NULL, 11, 'Mapili45@gmail.com'),
(29, 'Maintenance', 'Laundry', 'Low', '0', 11, NULL, 'Reported', '2024-10-04 14:15:27', '2024-10-04 14:15:27', NULL, 11, 'Mapili45@gmail.com'),
(30, 'Cleanliness', 'Concierge', 'Low', '0', 11, NULL, 'Reported', '2024-10-04 14:18:22', '2024-10-04 14:18:22', NULL, 11, 'Mapili45@gmail.com'),
(31, 'Electrical', 'Tea', 'High', '0', 11, NULL, 'Reported', '2024-10-04 14:21:50', '2024-10-04 14:21:50', NULL, 11, 'Mapili45@gmail.com'),
(32, 'Electrical', 'Tea', 'Medium', '0', 11, NULL, 'Reported', '2024-10-04 14:23:05', '2024-10-04 14:23:05', NULL, 11, 'Mapili45@gmail.com'),
(33, 'Maintenance', 'Laundry', 'Medium', '0', 11, NULL, 'Reported', '2024-10-04 14:55:18', '2024-10-04 14:55:18', NULL, 11, 'Mapili45@gmail.com'),
(34, 'Electrical', 'Concierge', 'Low', '0', 11, NULL, 'Reported', '2024-10-05 07:10:00', '2024-10-05 07:10:00', NULL, 11, 'Mapili45@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `RoomType` varchar(30) NOT NULL,
  `Bed` varchar(30) NOT NULL,
  `NoofRoom` int(30) NOT NULL,
  `cin` date NOT NULL,
  `cout` date NOT NULL,
  `noofdays` int(30) NOT NULL,
  `roomtotal` double(8,2) NOT NULL,
  `bedtotal` double(8,2) NOT NULL,
  `meal` varchar(30) NOT NULL,
  `mealtotal` double(8,2) NOT NULL,
  `finaltotal` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `Name`, `Email`, `RoomType`, `Bed`, `NoofRoom`, `cin`, `cout`, `noofdays`, `roomtotal`, `bedtotal`, `meal`, `mealtotal`, `finaltotal`) VALUES
(41, 'Tushar pankhaniya', 'pankhaniyatushar9@gmail.com', 'Single Room', 'Single', 1, '2022-11-09', '2022-11-10', 1, 1000.00, 10.00, 'Room only', 0.00, 1010.00),
(52, 'Clinton Manja', 'soqoheca@mailinator.com', 'Superior Room', 'Single', 1, '2024-09-09', '2024-09-13', 4, 12000.00, 120.00, 'Room only', 0.00, 12120.00),
(53, 'Elisha Musenge', 'elishotech1@gmail.com', 'Superior Room', 'Single', 1, '2024-09-24', '2024-09-27', 3, 9000.00, 90.00, 'Breakfast', 180.00, 9270.00),
(54, 'Abednego Mwanza', 'MwanzaAzariah23@gmai.com', 'Superior Room', 'Triple', 1, '2024-09-23', '2024-09-26', 3, 9000.00, 270.00, 'Full Board', 1080.00, 10350.00),
(55, 'Abednego Mwanza', 'MwanzaAzariah23@gmai.com', 'Superior Room', 'Triple', 1, '2024-09-23', '2024-09-26', 3, 9000.00, 270.00, 'Full Board', 1080.00, 10350.00),
(56, 'Abednego Mwanza', 'MwanzaAzariah23@gmai.com', 'Superior Room', 'Triple', 1, '2024-09-23', '2024-09-26', 3, 9000.00, 270.00, 'Full Board', 1080.00, 10350.00);

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`name`, `email`, `subject`, `message`, `id`) VALUES
('Jerome Aphrodite Mckee Washington', 'soqoheca@mailinator.com', 'edrtfgyuhjiok', 'awsedrtfvyibuojnk', 1),
('Jerome Aphrodite Mckee Washington', 'soqoheca@mailinator.com', 'edrtfgyuhjiok', 'awsedrtfvyibuojnk', 2);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(30) NOT NULL,
  `type` varchar(50) NOT NULL,
  `bedding` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `type`, `bedding`) VALUES
(4, 'Superior Room', 'Single'),
(7, 'Superior Room', 'Quad'),
(8, 'Deluxe Room', 'Single'),
(9, 'Deluxe Room', 'Double'),
(10, 'Deluxe Room', 'Triple'),
(11, 'Guest House', 'Single'),
(12, 'Guest House', 'Double'),
(13, 'Guest House', 'Triple'),
(14, 'Guest House', 'Quad'),
(16, 'Superior Room', 'Double'),
(20, 'Single Room', 'Single'),
(22, 'Superior Room', 'Single'),
(23, 'Deluxe Room', 'Single'),
(24, 'Deluxe Room', 'Triple'),
(27, 'Guest House', 'Double'),
(30, 'Deluxe Room', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `roombook`
--

CREATE TABLE `roombook` (
  `id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `RoomType` varchar(30) NOT NULL,
  `Bed` varchar(30) NOT NULL,
  `Meal` varchar(30) NOT NULL,
  `NoofRoom` varchar(30) NOT NULL,
  `cin` date NOT NULL,
  `cout` date NOT NULL,
  `nodays` int(50) NOT NULL,
  `stat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roombook`
--

INSERT INTO `roombook` (`id`, `Name`, `Email`, `Country`, `Phone`, `RoomType`, `Bed`, `Meal`, `NoofRoom`, `cin`, `cout`, `nodays`, `stat`) VALUES
(41, 'Tushar pankhaniya', 'pankhaniyatushar9@gmail.com', 'India', '9313346569', 'Single Room', 'Single', 'Room only', '1', '2022-11-09', '2022-11-10', 1, 'Confirm'),
(51, 'Jerome Aphrodite Mckee Washington', 'soqoheca@mailinator.com', 'Zambia', '+260978195399', 'Single Room', '', '', '1', '2024-09-27', '2024-09-13', -14, 'Confirm'),
(52, 'Clinton Manja', 'soqoheca@mailinator.com', 'Zambia', '+260978195399', 'Superior Room', 'Single', 'Room only', '1', '2024-09-09', '2024-09-13', 4, 'Confirm'),
(53, 'Elisha Musenge', 'elishotech1@gmail.com', 'Zambia', '+260978195399', 'Superior Room', 'Single', 'Breakfast', '1', '2024-09-24', '2024-09-27', 3, 'Confirm'),
(54, 'Abednego Mwanza', 'MwanzaAzariah23@gmai.com', 'Zambia', '+260978195398', 'Superior Room', 'Triple', 'Full Board', '1', '2024-09-23', '2024-09-26', 3, 'Confirm'),
(55, 'Abednego Mwanza', 'MwanzaAzariah23@gmai.com', 'Zambia', '+260978195398', 'Superior Room', 'Triple', 'Full Board', '1', '2024-09-23', '2024-09-26', 3, 'Confirm'),
(56, 'Abednego Mwanza', 'MwanzaAzariah23@gmai.com', 'Zambia', '+260978195398', 'Superior Room', 'Triple', 'Full Board', '1', '2024-09-23', '2024-09-26', 3, 'Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `UserID` int(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`UserID`, `Username`, `Email`, `Password`) VALUES
(1, 'Tushar Pankhaniya', 'tusharpankhaniya2202@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `work` varchar(30) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `work`, `user_id`) VALUES
(1, 'Tushar pankhaniya', 'Manager', NULL),
(4, 'Dipak', 'Cook', NULL),
(5, 'tirth', 'Helper', NULL),
(6, 'mohan', 'Helper', NULL),
(7, 'shyam', 'cleaner', NULL),
(8, 'rohan', 'weighter', NULL),
(9, 'hiren', 'weighter', NULL),
(10, 'nikunj', 'weighter', NULL),
(11, 'rekha', 'Cook', NULL),
(12, '', '', NULL),
(13, 'Daniel', 'Cook', NULL),
(14, '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Email`, `Password`) VALUES
(8, 'Elisha', 'Musenge@gmail.com', '$2y$10$cFULuMvVtb4HtDZQ0SLlk.lZtFpfwJhTYm4vGLbPPYghv7QSx1Q2u'),
(9, 'Mutale', 'MutaleMwanza@gmail.com', '$2y$10$DGvcxqn73FC8rha1D2DPR.aZ4tP24XKD5d1aRUlslBI9YigSLo5eK'),
(10, 'Daniel', 'DanielMwakamui@gmail.com', '$2y$10$O1vU1/zUEQyYUKwvBo2A0ef.mEo91OZ9d9X1jHy3XXmjTx0GV7ghO'),
(11, 'Joshua', 'Mapili45@gmail.com', '$2y$10$Ju7IbSKQAS2ygUQARaNLfesGVgFg4MvfQKym2b5TYOAUavtTaWOHC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_assigned_to_user` (`assigned_to`),
  ADD KEY `fk_issue_room` (`room_id`),
  ADD KEY `fk_reported_by_user` (`reported_by`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roombook`
--
ALTER TABLE `roombook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_staff_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roombook`
--
ALTER TABLE `roombook`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `fk_assigned_to_user` FOREIGN KEY (`assigned_to`) REFERENCES `staff` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_issue_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_reported_by_user` FOREIGN KEY (`reported_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
