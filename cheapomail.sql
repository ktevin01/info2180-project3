-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2015 at 02:27 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cheapomail`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id` int(11) NOT NULL,
  `body` text NOT NULL,
  `subject` varchar(80) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipient_ids` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `body`, `subject`, `user_id`, `recipient_ids`) VALUES
(165, 'Hi, how are you?', 'Hello', 2, '|5|6|7|'),
(166, 'Curabitur sollicitudin lectus nulla, eu mattis sapien lobortis sed. Ut turpis leo, sollicitudin non orci nec, bibendum tristique ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis quam urna, porta eu risus faucibus, aliquam interdum ex. Suspendisse felis odio, gravida sit amet consequat eget, maximus nec nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla sapien eros, bibendum vitae pulvinar et, vestibulum sit amet nulla. Nunc quis quam et ante malesuada pharetra. Mauris pretium ligula et vehicula egestas. Vivamus posuere viverra odio vel pretium. Etiam sit amet nunc metus. Suspendisse rhoncus, erat non porttitor malesuada, tortor quam fermentum felis, nec pellentesque massa quam sit amet urna. Sed aliquet condimentum diam non ornare. Aenean non finibus odio. Phasellus accumsan libero quis egestas feugiat. Aliquam non augue eget mauris malesuada faucibus eu auctor dui.', 'Food', 2, '|2|3|'),
(167, 'Curabitur sollicitudin lectus nulla, eu mattis sapien lobortis sed. Ut turpis leo, sollicitudin non orci nec, bibendum tristique ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis quam urna, porta eu risus faucibus, aliquam interdum ex. Suspendisse felis odio, gravida sit amet consequat eget, maximus nec nibh. ', 'Shop', 2, '|2|3|4|5|'),
(168, 'Duis quam urna, porta eu risus faucibus, aliquam interdum ex. Suspendisse felis odio, gravida sit amet consequat eget, maximus nec nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla sapien eros, bibendum vitae pulvinar et, vestibulum sit amet nulla. ', 'Home', 2, '|2|4|6|7|'),
(169, 'Nulla sapien eros, bibendum vitae pulvinar et, vestibulum sit amet nulla. Nunc quis quam et ante malesuada pharetra. Mauris pretium ligula et vehicula egestas. Vivamus posuere viverra odio vel pretium. Etiam sit amet nunc metus. Suspendisse rhoncus, erat non porttitor malesuada, tortor quam fermentum felis, nec pellentesque massa quam sit amet urna. Sed aliquet condimentum diam non ornare. Aenean non finibus odio. Phasellus accumsan libero quis egestas feugiat. Aliquam non augue eget mauris malesuada faucibus eu auctor dui.', 'School', 6, '|3|4|5|');

-- --------------------------------------------------------

--
-- Table structure for table `message_read`
--

CREATE TABLE IF NOT EXISTS `message_read` (
`id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `reader_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_read`
--

INSERT INTO `message_read` (`id`, `message_id`, `reader_id`, `date`) VALUES
(7, 166, 2, 'December 18, 2015, 8:23 pm'),
(8, 168, 6, 'December 18, 2015, 8:26 pm'),
(9, 165, 6, 'December 18, 2015, 8:26 pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` char(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`) VALUES
(2, 'admin', 'admin', 'admin', 'Admin123'),
(3, 'Mini', 'Mini', 'Mouse', 'Mouse123'),
(4, 'Ironman', 'Tony', 'Stark', 'Ironman123'),
(5, 'Hulk', 'Bruce', 'Banner', 'Avengers123'),
(6, 'Rand', 'Randy', 'john', 'Randy123'),
(7, 'drake', 'Drakey', 'dr', 'Drake123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_read`
--
ALTER TABLE `message_read`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `firstname` (`firstname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT for table `message_read`
--
ALTER TABLE `message_read`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
