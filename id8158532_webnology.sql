-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2020 at 09:16 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8158532_webnology`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `name` text NOT NULL,
  `occupation` text NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `text`, `name`, `occupation`, `stars`) VALUES
(9, 'tst-image1.jpg', 'I joined WebnoLogy And Found\r\nThe Course To Be Very Useful\r\nOur Teacher Taught us Each And\r\nEvery Concept In Detail And Now \r\nI can Build Any Website. Thanks \r\nFor Providing The 45 Day Web \r\nDevelopment Course.', 'Divyansh Bhardwaj', 'Web Developer', 5),
(10, 'tst-image2.jpg', 'I Got The a great Service\r\nFrom WebnoLogy Institute And \r\nFound It Really Helpful As I Got\r\nA Really Proffesional Teacher Who \r\nServed Me Well To Clear My Exams', 'Muskan Chawla', 'Student', 4),
(11, 'tst-image3.jpg', 'Still Studying in Webnology. Beleive Me Guys The Institute Is\r\nReally Good At Providing Helpful Knowledge\r\nAnd The Teachers Are Also Very Supportive.', 'Priyanshu', 'Student', 5);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'alok', 'a03a2f5701e56e7322091ba9485f075f');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `head` text NOT NULL,
  `disc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `head`, `disc`) VALUES
(1, 'Flutter nad Dart', 'Batch Starts On 1st of june'),
(2, 'Vacancy For DS Teacher', 'Freshers As Well As Experienced Teachers Required'),
(3, 'Apply Online For Web Development Course', 'From Now On wards Students Can Apply Online'),
(4, 'WebnoLogy', 'Admissions Open Till 15th June');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `ph_no` text NOT NULL,
  `course` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `ph_no`, `course`) VALUES
(34, 'soni', 'soni@gmail.com', '8219338068', 'Home Tutions'),
(37, 'Mohit', 'mohit@gmail.com', '8219338068', 'Web Development'),
(39, 'Papa ji', 'thesocialtorque@gmail.com', '7529862727', 'Teacher'),
(40, 'Papa ji', 'thesocialtorque@gmail.com', '7529862727', 'Teacher'),
(41, 'Papa ji', 'thesocialtorque@gmail.com', '7529862727', 'Teacher'),
(42, 'Papa ji', 'thesocialtorque@gmail.com', '7529862727', 'Web Development');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
