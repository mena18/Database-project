-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2021 at 09:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `blocker` varchar(255) NOT NULL,
  `blocked` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `writer`, `post_id`, `date`, `text`) VALUES
(5, 'ahmed@gmail.com', 51, '2021-01-16 10:23:19', 'Hello, this is my first comment'),
(6, 'ahmed@gmail.com', 51, '2021-01-16 10:26:00', 'Testing the comment'),
(11, 'ahmed@gmail.com', 47, '2021-01-16 10:43:13', 'Youre so nice'),
(12, 'menan381@gmail.com', 47, '2021-01-16 10:54:06', 'I agree with you, she is so nice'),
(13, 'menan381@gmail.com', 61, '2021-01-16 17:40:10', 'test comment'),
(14, 'menan381@gmail.com', 62, '2021-01-16 18:13:28', 'new comment');

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `user_1` varchar(255) NOT NULL,
  `user_2` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`user_1`, `user_2`, `date`) VALUES
('ahmed@gmail.com', 'menan381@gmail.com', '2021-01-16 20:29:52'),
('first_last@gmail.com', 'ahmed@gmail.com', '2021-01-16 20:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `phone_num` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`phone_num`, `email`) VALUES
('0123123', 'menan381@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_public` tinyint(1) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `writer`, `caption`, `date`, `is_public`, `image`) VALUES
(47, 'ahmed@gmail.com', 'Ahmed Mehanna updated his profile picture', '2021-01-16 03:29:51', 0, 'uploads/60025daf39e8e1.27556737.jpg'),
(51, 'menan381@gmail.com', 'Ahmed Mehanna updated his profile picture', '2021-01-16 03:52:18', 0, 'uploads/600262f2183124.61956336.jpg'),
(60, 'ahmed@gmail.com', 'This is my public post', '2021-01-16 10:51:46', 1, ''),
(61, 'ahmed@gmail.com', 'Akame ga kill', '2021-01-16 10:52:21', 1, 'uploads/6002c5658886f1.42954525.jpg'),
(62, 'ahmed@gmail.com', 'new test', '2021-01-16 17:56:57', 1, NULL),
(63, 'menan381@gmail.com', 'profile picture updated', '2021-01-16 18:17:09', 0, 'uploads/60032da4c88337.83116917.png');

-- --------------------------------------------------------

--
-- Table structure for table `react`
--

CREATE TABLE `react` (
  `post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `react`
--

INSERT INTO `react` (`post_id`, `email`, `date`) VALUES
(47, 'menan381@gmail.com', '2021-01-16 17:39:19'),
(60, 'ahmed@gmail.com', '2021-01-16 20:21:12'),
(61, 'ahmed@gmail.com', '2021-01-16 20:21:10'),
(61, 'menan381@gmail.com', '2021-01-16 10:54:34'),
(62, 'ahmed@gmail.com', '2021-01-16 20:21:07'),
(62, 'menan381@gmail.com', '2021-01-16 18:13:48'),
(63, 'ahmed@gmail.com', '2021-01-16 18:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `response` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`sender`, `receiver`, `date`, `response`) VALUES
('ahmed@gmail.com', 'menan381@gmail.com', '2021-01-16 05:14:17', 'reject'),
('ahmed@gmail.com', 'menan381@gmail.com', '2021-01-16 06:29:16', 'accept'),
('first_last@gmail.com', 'ahmed@gmail.com', '2021-01-16 20:27:53', 'accept'),
('menan381@gmail.com', 'ahmed@gmail.com', '2021-01-16 03:54:41', 'accept'),
('menan381@gmail.com', 'ahmed@gmail.com', '2021-01-16 05:00:16', 'reject'),
('menan381@gmail.com', 'ahmed@gmail.com', '2021-01-16 05:19:11', 'accept'),
('menan381@gmail.com', 'ahmed@gmail.com', '2021-01-16 06:28:50', 'reject'),
('menan381@gmail.com', 'ahmed@gmail.com', '2021-01-16 17:50:02', 'accept'),
('menan381@gmail.com', 'ahmed@gmail.com', '2021-01-16 18:21:29', 'accept'),
('menan381@gmail.com', 'ahmed@gmail.com', '2021-01-16 18:22:24', 'reject'),
('menan381@gmail.com', 'ahmed@gmail.com', '2021-01-16 19:22:41', 'accept'),
('menan381@gmail.com', 'ahmed@gmail.com', '2021-01-16 19:27:21', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`post_id`, `email`, `date`) VALUES
(62, 'ahmed@gmail.com', '2021-01-16 20:21:49'),
(63, 'ahmed@gmail.com', '2021-01-16 20:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`name`) VALUES
('another_one'),
('hello52'),
('one'),
('two');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `email` varchar(400) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nick_name` varchar(255) DEFAULT NULL,
  `password` varchar(300) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `picture` varchar(200) NOT NULL,
  `home_town` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `about_me` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`email`, `first_name`, `last_name`, `nick_name`, `password`, `gender`, `birth_date`, `picture`, `home_town`, `status`, `about_me`) VALUES
('ahmed@gmail.com', 'Ahmed', 'Mehanna', 'mehanna-cw', '$2y$10$8lc/0Eh5RcpZrNcOoGd5AO31yOqNjTMAVVgR3YVkgl3g079iB9fK6', 'male', '2021-01-16', 'uploads/60025daf39e8e1.27556737.jpg', '', '', 'hello world'),
('first_last@gmail.com', 'first', 'last', '', '$2y$10$te7ptigzAKgJJSsK/0kftuIUOXfDRv1Zg.lGdpzP688GwV9Rzai96', 'female', '2021-01-16', '', '', '', ''),
('menan381@gmail.com', 'Mina', 'Naeem', '', '$2y$10$lUuR0Lh8Xj2/Av6Rnuy0z.4nC1V23KAapgcIrJ8S15lQU.wz81HXe', 'male', '2021-01-16', 'uploads/60032da4c88337.83116917.png', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`blocker`,`blocked`),
  ADD KEY `FK_2` (`blocked`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_13` (`post_id`),
  ADD KEY `FK_14` (`writer`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`user_1`,`user_2`),
  ADD KEY `FK_4` (`user_2`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`phone_num`,`email`),
  ADD KEY `FK_7` (`email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `FK_12` (`writer`);

--
-- Indexes for table `react`
--
ALTER TABLE `react`
  ADD PRIMARY KEY (`post_id`,`email`),
  ADD KEY `FK_9` (`email`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`sender`,`receiver`,`date`) USING BTREE,
  ADD KEY `FK_6` (`receiver`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`post_id`,`date`,`email`) USING BTREE,
  ADD KEY `FK_11` (`email`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `block`
--
ALTER TABLE `block`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`blocker`) REFERENCES `User` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`blocked`) REFERENCES `User` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_13` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_14` FOREIGN KEY (`writer`) REFERENCES `User` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `FK_3` FOREIGN KEY (`user_1`) REFERENCES `User` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_4` FOREIGN KEY (`user_2`) REFERENCES `User` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `FK_7` FOREIGN KEY (`email`) REFERENCES `User` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_12` FOREIGN KEY (`writer`) REFERENCES `User` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `react`
--
ALTER TABLE `react`
  ADD CONSTRAINT `FK_8` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_9` FOREIGN KEY (`email`) REFERENCES `User` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `FK_5` FOREIGN KEY (`sender`) REFERENCES `User` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_6` FOREIGN KEY (`receiver`) REFERENCES `User` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `FK_10` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_11` FOREIGN KEY (`email`) REFERENCES `User` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
