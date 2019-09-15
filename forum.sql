-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 09:19 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(8) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `categoryDesc`) VALUES
(1, 'Death Stranding', 'This is the category for Death Stranding'),
(2, 'Halo : Combat Evolved (XBOX)', 'Halo 1 fourm'),
(3, 'Half Life 2 (ORANGE_BOX PS3)', 'Half Life 2 Orange Box version PS3 version '),
(4, 'Playstation 5 and Xbox Specs Discussion', 'We\'re talking specs here.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(8) NOT NULL,
  `postTitle` varchar(32) NOT NULL,
  `postContent` text NOT NULL,
  `postDate` datetime NOT NULL,
  `postTopic` int(8) NOT NULL,
  `postBy` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `postTitle`, `postContent`, `postDate`, `postTopic`, `postBy`) VALUES
(1, 'Bad Framerate', 'Hey why is the framerate so poor throughout the whole level? Sub 30fps constantly.', '2019-09-01 00:00:00', 3, 1),
(2, 'Sluggish Controls', 'Controls feel so rough and slow, they really should\'ve fixed this already.', '2019-09-01 00:00:00', 3, 1),
(3, 'Why?!', 'Why does he always do this? Metal Gear and Death Stranding are overly complicated atrocities.', '2019-09-04 00:00:00', 4, 1),
(4, 'STFU', 'Shut the fuck up, OP! \r\n\r\nKojima is god!', '2019-09-02 00:00:00', 4, 2),
(5, 'Xbox Lan Party for Halo', 'Hey guys, I\'m interested in hosting a LAN party for Halo on XBOX original. The location is CityCityTown 4423XA Ireland.', '2019-09-03 00:00:00', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `reactionID` int(8) NOT NULL,
  `reactionTitle` varchar(100) NOT NULL,
  `reactionContent` text NOT NULL,
  `reactionDate` datetime NOT NULL,
  `reactionPost` int(8) NOT NULL,
  `reactionBy` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`reactionID`, `reactionTitle`, `reactionContent`, `reactionDate`, `reactionPost`, `reactionBy`) VALUES
(1, 'Get together with me (Halo Xbox)', 'Hey I\'d love to get together with you for the lan party. My Xbox live usrname is Nathenal82', '0000-00-00 00:00:00', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topicId` int(8) NOT NULL,
  `topicSubject` varchar(255) NOT NULL,
  `topicDate` datetime NOT NULL,
  `topicCategory` int(8) NOT NULL,
  `topicBy` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topicId`, `topicSubject`, `topicDate`, `topicCategory`, `topicBy`) VALUES
(3, 'Bad Framerate in City17', '2019-09-01 00:00:00', 3, 1),
(4, 'Kojima is crazy', '2019-09-03 00:00:00', 1, 1),
(5, 'LAN play party this December', '2019-09-03 00:00:00', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `createdate` datetime(6) NOT NULL,
  `lastpostdate` datetime NOT NULL,
  `accountstatus` varchar(255) NOT NULL,
  `karma` bigint(20) NOT NULL,
  `userlevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `createdate`, `lastpostdate`, `accountstatus`, `karma`, `userlevel`) VALUES
(1, 'Dudebroson', '666222111', 'email@email.com', '2019-09-01 00:00:00.000000', '0000-00-00 00:00:00', 'ACTIVE', 3, 666),
(2, 'BadBitch666', 'badbitch666', 'email@email.com', '2019-07-10 00:00:00.000000', '0000-00-00 00:00:00', 'ACTIVE', 320, 666),
(3, 'SullyDavy', '$2y$12$uJUH0FXJ4R17X2jfRs4B5OgdK3MalNE3MXO1yv0LnclEk1SHuD3ja', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 666),
(4, 'baconboy2', '$2y$12$jTXDBG0.Wd5OfHyCqX6rxuE5GCbILYjtcC3PVT/iDfAE7Kbcyaooy', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 0),
(5, 'Badcyborg', '$2y$12$ZXZVJhEDigDoG5WdNSD60urKUR3o5W1zuP6ucpxcQiX2iu8udKB0K', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 666);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`),
  ADD UNIQUE KEY `categoryNameUnique` (`categoryName`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `postTopic` (`postTopic`),
  ADD KEY `postBy` (`postBy`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`reactionID`),
  ADD KEY `foreignPostID` (`reactionPost`),
  ADD KEY `foreignPostByID` (`reactionBy`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topicId`),
  ADD KEY `topicCategory` (`topicCategory`),
  ADD KEY `topicBy` (`topicBy`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `reactionID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topicId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`postTopic`) REFERENCES `topics` (`topicId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`postBy`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `foreignPostByID` FOREIGN KEY (`reactionBy`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `foreignPostID` FOREIGN KEY (`reactionPost`) REFERENCES `posts` (`postID`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topicCategory`) REFERENCES `categories` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topicBy`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
