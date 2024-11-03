-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2024 at 01:03 PM
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
  `assigned_to` varchar(50) DEFAULT NULL,
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
(40, 'Maintenance', 'Concierge', 'Low', 'I want a concierge', 12, 'Caleb Njobvu', 'In Progress', '2024-11-01 07:41:56', '2024-11-03 12:00:11', NULL, 12, 'elishotech1@gmail.com'),
(41, 'Electrical', NULL, 'High', 'There is an electriacal socket in my room to the upper right of my bed I need it replaced asap!', 12, NULL, 'Resolved', '2024-11-01 07:43:09', '2024-11-01 08:17:42', NULL, 12, 'elishotech1@gmail.com'),
(42, 'Maintenance', 'Laundry', 'Medium', 'test3', 12, 'Mirriam Mbasha', 'In Progress', '2024-11-01 10:49:20', '2024-11-02 14:29:33', NULL, 12, 'elishotech1@gmail.com'),
(43, 'Electrical', 'Laundry', 'High', 'Please I need laudry services asap', 13, 'Sasha Musenge', 'In Progress', '2024-11-01 12:10:40', '2024-11-03 11:47:11', NULL, 13, 'Manja@gmail.com'),
(44, 'Cleanliness', NULL, 'Critical', 'wefgh66t', 13, 'Elisha Tech', 'In Progress', '2024-11-01 12:11:20', '2024-11-03 11:56:27', NULL, 13, 'Manja@gmail.com');

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
(52, 'Clinton Manja', 'soqoheca@mailinator.com', 'Superior Room', 'Single', 1, '2024-09-09', '2024-09-13', 4, 12000.00, 120.00, 'Room only', 0.00, 12120.00),
(53, 'Elisha Musenge', 'elishotech1@gmail.com', 'Superior Room', 'Single', 1, '2024-09-24', '2024-09-27', 3, 9000.00, 90.00, 'Breakfast', 180.00, 9270.00),
(54, 'Abednego Mwanza', 'MwanzaAzariah23@gmai.com', 'Superior Room', 'Triple', 1, '2024-09-23', '2024-09-26', 3, 9000.00, 270.00, 'Full Board', 1080.00, 10350.00),
(55, 'Abednego Mwanza', 'MwanzaAzariah23@gmai.com', 'Superior Room', 'Triple', 1, '2024-09-23', '2024-09-26', 3, 9000.00, 270.00, 'Full Board', 1080.00, 10350.00),
(56, 'Abednego Mwanza', 'MwanzaAzariah23@gmai.com', 'Superior Room', 'Triple', 1, '2024-09-23', '2024-09-26', 3, 9000.00, 270.00, 'Full Board', 1080.00, 10350.00),
(57, 'Melvien', 'Musenge@gmail.com', 'Deluxe Room', 'Triple', 1, '2024-10-30', '2024-10-30', 0, 0.00, 0.00, 'Room only', 0.00, 0.00),
(58, 'Melvien', 'Musenge@gmail.com', 'Deluxe Room', 'Triple', 1, '2024-10-30', '2024-10-30', 0, 0.00, 0.00, 'Room only', 0.00, 0.00),
(59, 'Melvien', 'Musenge@gmail.com', 'Deluxe Room', 'Triple', 1, '2024-10-30', '2024-10-30', 0, 0.00, 0.00, 'Room only', 0.00, 0.00),
(61, 'Melvien', 'Musenge@gmail.com', 'Deluxe Room', 'Triple', 1, '2024-10-30', '2024-10-30', 0, 0.00, 0.00, 'Room only', 0.00, 0.00),
(64, 'John', 'Johnmfula@probasegroup.com', 'Superior Room', 'Double', 1, '2024-10-30', '2024-11-02', 3, 9000.00, 180.00, 'Breakfast', 360.00, 9540.00),
(65, 'Jerome Aphrodite Mckee Washing', 'soqoheca@mailinator.com', 'Single Room', 'Double', 1, '2024-10-30', '2024-11-05', 6, 6000.00, 120.00, '', 0.00, 6120.00),
(66, 'Elisha Musenge', 'elishotech1@gmail.com', 'Deluxe Room', 'Double', 1, '2024-10-30', '2024-10-31', 1, 2000.00, 40.00, 'Room only', 0.00, 2040.00),
(67, 'Newton Mwitumwa', 'newton@gmail.com', 'Deluxe Room', 'Triple', 1, '2024-10-31', '2024-11-05', 5, 10000.00, 300.00, 'Lunch', 0.00, 10300.00),
(68, 'Fridah Mutetema', 'Mutetema23@gmail.com', 'Superior Room', 'Single', 1, '2024-10-31', '2024-11-02', 2, 6000.00, 60.00, 'Breakfast', 120.00, 6180.00);

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
('Jerome Aphrodite Mckee Washington', 'soqoheca@mailinator.com', 'edrtfgyuhjiok', 'awsedrtfvyibuojnk', 2),
('cee', 'elishotech1@gmail.com', 'efef', 'efe', 3),
('cee', 'elishotech1@gmail.com', 'efef', 'efe', 4),
('cee', 'elishotech1@gmail.com', 'efef', 'efe', 5),
('cee', 'elishotech1@gmail.com', 'efef', 'efe', 6),
('cee', 'elishotech1@gmail.com', 'efef', 'efe', 7),
('cee', 'elishotech1@gmail.com', 'efef', 'efe', 8),
('cee', 'elishotech1@gmail.com', 'efef', 'efe', 9),
('cee', 'elishotech1@gmail.com', 'efef', 'efe', 10),
('cee', 'elishotech1@gmail.com', 'efef', 'efe', 11),
('cee', 'elishotech1@gmail.com', 'efef', 'efe', 12),
('cee', 'elishotech1@gmail.com', 'efef', 'efe', 13),
('Elisha', 'elishotech1@gmail.com', 'Appreciation over stay at SINAMU lodge', 'Appreciation over stay at SINAMU lodge', 14),
('ben', 'Ben@gmail.com', 'dv', 'rvr', 15),
('cee', 'elishotech1@gmail.com', 'efef', 'efe', 16);

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
(8, 'Deluxe Room', 'Single'),
(9, 'Deluxe Room', 'Double'),
(16, 'Superior Room', 'Double'),
(20, 'Single Room', 'Single'),
(22, 'Superior Room', 'Single'),
(23, 'Deluxe Room', 'Single'),
(32, 'Guest House', 'Single');

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
(65, 'Jerome Aphrodite Mckee Washington', 'soqoheca@mailinator.com', 'Zambia', '+260178195398', 'Single Room', 'Double', '', '1', '2024-10-30', '2024-11-05', 6, 'APPROVED'),
(66, 'Elisha Musenge', 'elishotech1@gmail.com', 'Zambia', '0978195399', 'Deluxe Room', 'Double', 'Room only', '1', '2024-10-30', '2024-10-31', 1, 'APPROVED'),
(67, 'Newton Mwitumwa', 'newton@gmail.com', 'Anguilla', '9075392748', 'Deluxe Room', 'Triple', 'Lunch', '1', '2024-10-31', '2024-11-05', 5, 'APPROVED'),
(68, 'Fridah Mutetema', 'Mutetema23@gmail.com', 'Antarctica', '9078432189', 'Superior Room', 'Single', 'Breakfast', '1', '2024-10-31', '2024-11-02', 2, 'APPROVED');

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
(27, 'Sasha Musenge', 'Receptionist', NULL),
(31, 'Caleb Njobvu', 'Bar_man', NULL),
(34, 'Jerome Aphrodite Mckee Washing', 'Chef', NULL),
(37, 'Elisha Tech', 'Helper', NULL),
(38, 'Elisha Techa', 'Cook', NULL),
(39, 'Melvien1', 'Electrician', NULL),
(40, 'Elisha Tech', 'Bar Attendant', NULL),
(43, 'judi', 'Cleaner', NULL),
(44, 'Elisha Tech', 'Helper', NULL),
(45, 'Salome', 'Waiter', NULL);

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
(11, 'Joshua', 'Mapili45@gmail.com', '$2y$10$Ju7IbSKQAS2ygUQARaNLfesGVgFg4MvfQKym2b5TYOAUavtTaWOHC'),
(12, 'Elisha', 'elishotech1@gmail.com', '$2y$10$eyhGtkIetnqTuJwLm90KM.4oNB9GWtFe7g/BDuy3z39JM0j3aOLDW'),
(13, 'Clinton', 'Manja@gmail.com', '$2y$10$d08PtHkiM13BZDOo6w6HaO.vWiQUEhubWW0valCG0kK0DVa2PIEpS');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `roombook`
--
ALTER TABLE `roombook`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `fk_issue_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_reported_by_user` FOREIGN KEY (`reported_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
