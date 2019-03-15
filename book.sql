-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 04:45 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(250) NOT NULL,
  `book_desc` varchar(250) NOT NULL,
  `book_amount` varchar(250) NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_desc`, `book_amount`, `cover`) VALUES
(1, 'Python Pocket Reference', 'programming', '2000', 'python.jpg'),
(2, 'Html 5  for Beginners', 'programming', '1500', 'html.jpg'),
(3, 'The Great Gatsby', 'Love and Rommance', '1500', 'gat.jpg'),
(4, 'Python for Data Analysis', 'programming', '1500', 'python2.jpg'),
(5, 'Php, Javascript, Mysql O\'reilly', 'programming', '3500', 'php.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `t_id` int(11) NOT NULL,
  `cart_id` int(30) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `t_date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`t_id`, `cart_id`, `ref`, `amount`, `email`, `t_date`) VALUES
(1, 4, '690319296', '150000', 'adv@gmail.com', '2019-03-08 23:41:07'),
(2, 2, '119565699', '1500', 'adv@gmail.com', '2019-03-10 17:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `add` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `username`, `password`, `email`, `add`) VALUES
(1, '', 'bimbo', 'bimbo', 'adv@gmail.com', ''),
(2, '', 'afeez', 'afeez', 'adva@gmail.com', ''),
(3, 'shina', 's', 'a', 'advan@yahoo.com', 'a'),
(4, 'soneye sina', 'sina', 'sina', 'sina@ya.com', 'ilaro'),
(5, 'cooper', 'cooper', 'cooper', 'mmm@gmail.com', 'ilaro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
