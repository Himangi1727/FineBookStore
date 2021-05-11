-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2021 at 12:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(12) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `title`, `author`, `price`, `quantity`) VALUES
('0498861929', 'Computer Software Engineer', 'Annabell Bruen', '2554.00', 80),
('0949301450', 'Lodging Manager', 'Mr. Nolan Hettinger Sr.', '526.00', 74),
('1127592726', 'System Administrator', 'Miss Shanna Walter', '6558.00', 24),
('1718564821', 'Distribution Manager', 'Kurt Stamm PhD', '2166.00', 77),
('21839', 'Kilo Arts', 'Kilo Bean', '89000.00', 3),
('2402674261', 'Travel Guide', 'Yasmin Schowalter', '2804.00', 30),
('3633474188', 'Forest Fire Inspector', 'Nash Green', '5113.00', 8),
('5679689413', 'Home Economics Teacher', 'Ludwig Balistreri', '4580.00', 98),
('6304609116', 'Battery Repairer', 'Anita Bayer', '9569.00', 69),
('8206206574', 'Social Worker', 'Makayla Nader', '4505.00', 13),
('9010453766', 'Ticket Agent', 'Morton Lakin', '7800.00', 68);

-- --------------------------------------------------------

--
-- Table structure for table `bookStock`
--

CREATE TABLE `bookStock` (
  `ISBN` varchar(12) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(11) NOT NULL,
  `firstName` varchar(200) DEFAULT NULL,
  `lastName` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `firstName`, `lastName`, `email`) VALUES
(1, 'Cow', 'Brown', 'brown@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `buyerID` int(11) DEFAULT NULL,
  `ISBN` varchar(12) DEFAULT NULL,
  `purchaseDate` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`buyerID`, `ISBN`, `purchaseDate`) VALUES
(1, '1718564821', '2021-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `userPassword` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `name`, `userPassword`) VALUES
(1, 'cow@gmail.com', 'cow', '$2y$10$rTYn.x7MS9cJ33dNuai7VuBEnoziJliS5eKvDVg6c9qC6f3VO160W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `bookStock`
--
ALTER TABLE `bookStock`
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD KEY `buyerID` (`buyerID`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookStock`
--
ALTER TABLE `bookStock`
  ADD CONSTRAINT `bookStock_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`buyerID`) REFERENCES `buyer` (`id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
