-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 12:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `publish_date` date NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `genre`, `authors`, `publisher`, `country`, `publish_date`, `price`) VALUES
(1, 'The Da Vinci Code', 'Thriller', 'Dan Brown', 'Doubleday', 'USA', '2003-03-18', 15.99),
(2, 'Harry Potter and the Philosopher\'s Stone', 'Fantasy', 'J.K. Rowling', 'Bloomsbury', 'UK', '1997-06-26', 12.99),
(3, 'The Alchemist', 'Adventure', 'Paulo Coelho', 'HarperOne', 'Brazil', '1988-04-15', 10.99),
(4, 'The Hunger Games', 'Dystopian', 'Suzanne Collins', 'Scholastic Press', 'USA', '2008-09-14', 14.99),
(5, 'The Silent Patient', 'Thriller', 'Alex Michaelides', 'Celadon Books', 'UK', '2019-02-05', 12.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
