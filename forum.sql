-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2019 at 10:31 AM
-- Server version: 10.2.26-MariaDB-cll-lve
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u54899p52177_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(8) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDesc` varchar(255) NOT NULL,
  `categoryBy` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `categoryDesc`, `categoryBy`) VALUES
(6, 'Old School RuneScape', 'RuneScape is a fantasy massively multiplayer online role-playing game (MMORPG) developed and published by Jagex', 12),
(7, 'Death Stranding', 'Kojima\'s new game.', 15),
(8, 'Nier Automata', 'Yoko Taro\'s most popular title.', 15),
(9, 'Anime UwU', 'Weebs in', 14),
(11, 'Little Big Planet', 'LBP, LBP2, LBP3', 15);

-- --------------------------------------------------------

--
-- Table structure for table `nametags`
--

CREATE TABLE `nametags` (
  `nametagID` int(11) NOT NULL,
  `nametagName` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nametags`
--

INSERT INTO `nametags` (`nametagID`, `nametagName`) VALUES
(1, 'Fresh'),
(2, 'Spicy'),
(3, 'Mild'),
(4, 'Banned');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(8) NOT NULL,
  `postTitle` varchar(32) NOT NULL,
  `postContent` text NOT NULL,
  `postDate` datetime NOT NULL,
  `postKarma` int(32) NOT NULL,
  `postTopic` int(8) NOT NULL,
  `postBy` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `postTitle`, `postContent`, `postDate`, `postKarma`, `postTopic`, `postBy`) VALUES
(11, 'Runecrafting is so slow!', 'I have been runecrafting for hours and I am still not even halfway to level 99!', '0000-00-00 00:00:00', -93, 9, 12),
(12, 'How big is the world?', 'Guys? How big do you think the world in Death Stranding is?', '0000-00-00 00:00:00', 1, 7, 15),
(13, 'Here\'s for a sequel with the tri', '2B, 9S and A2 need to star together in a sequel in the new world.', '0000-00-00 00:00:00', 0, 10, 15),
(14, 'Minda Asido is love', 'Minda Asido is love, Minda Asido is life.', '0000-00-00 00:00:00', 0, 11, 15),
(15, 'WHAT ARE THEY?', 'They are like some weird baby demon sensor thing?', '0000-00-00 00:00:00', 0, 8, 15),
(16, 'Cop Craft sucks', 'Seriously, it sucks.', '0000-00-00 00:00:00', 0, 14, 15),
(17, 'Runescape Cheats', 'Sssssssh! This is a secret post for RuneScape cheats! Comment all your hacks and cheats!', '0000-00-00 00:00:00', 0, 12, 12),
(19, 'How do I runescape', 'How is it done, please explain', '0000-00-00 00:00:00', 98, 9, 18),
(21, 'How to NOT get bored of Runecraf', 'Step 1. Try, Step 2. Stop trying after an hour and do another skill.', '0000-00-00 00:00:00', 26493, 9, 21);

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `reactionID` int(8) NOT NULL,
  `reactionTitle` varchar(100) NOT NULL,
  `reactionContent` text NOT NULL,
  `reactionKarma` int(32) NOT NULL,
  `reactionDate` datetime NOT NULL,
  `reactionPost` int(8) NOT NULL,
  `reactionBy` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`reactionID`, `reactionTitle`, `reactionContent`, `reactionKarma`, `reactionDate`, `reactionPost`, `reactionBy`) VALUES
(15, 'I agree!', 'I have gotten to 99 runecrafting, but it took me a massive 500 hours! way too slow, fix it JaGeX!', -51, '0000-00-00 00:00:00', 11, 16),
(16, 'Please', 'How', -24, '0000-00-00 00:00:00', 19, 18),
(18, 'Agree', 'Fishing more exciting?', -50, '0000-00-00 00:00:00', 11, 21),
(19, 'Good suggestion', 'Very good suggestion JoeriH! Thanks.', 3, '0000-00-00 00:00:00', 21, 12),
(20, '10.000 upvotes! We did it!', 'Thanks. This was easier to grind than runecrafting. We did it boys!', 6, '0000-00-00 00:00:00', 21, 21),
(21, 'Google', 'Use google noob', 2, '0000-00-00 00:00:00', 19, 12),
(23, 'Runscape is good but...', 'It needs better graphics.', 1, '0000-00-00 00:00:00', 17, 15);

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
(7, 'World Size', '0000-00-00 00:00:00', 7, 15),
(8, 'What are the BBs?', '0000-00-00 00:00:00', 7, 15),
(9, 'Runecrafting', '0000-00-00 00:00:00', 6, 12),
(10, 'Sequel Ideas', '0000-00-00 00:00:00', 8, 15),
(11, 'Imagine being a My Hero Academia fan', '0000-00-00 00:00:00', 9, 14),
(12, 'How to Play FF XIV instead.', '0000-00-00 00:00:00', 6, 15),
(14, 'Cop Craft', '0000-00-00 00:00:00', 9, 15);

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
(12, 'Mattsora', '$2y$12$mHyJVNPxstfwN7uonfP3DOdQK8uEe7mXu7MUKAt.TBv91FvNcrG5W', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 666),
(13, 'KillTehBunny', '$2y$12$pbRJLxysGGicfUkM2PxW5uRfLyemMIexvdBw3QFyrzKpwkCnHP/NW', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 666),
(14, 'Weebsout', '$2y$12$hBhMBGbhr59cmOSsq9IaQeTahdFUpaZ.7Kkd2e0WE24P6LbRRPCIG', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 666),
(15, 'BadcyborgTheLord', '$2y$12$1BPcKM3QXop.o2aPZO1YvuVSz.nu5coS9xHqw04E7GThj5VXi23Te', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 666),
(16, 'ikbenaaron', '$2y$12$c4Qb.fIGsoFdLbn1Fu8K4.0m.EzwSnqam3mctBXsGlV3UVTO7pEk.', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 0),
(17, 'GeMaykeVlak', '$2y$12$A8JymP8xBU/SqCMiDq454emVjhnbg9kXK3UQLYVj1gBvEDDZM0MUe', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 0),
(18, 'Homolomo', '$2y$12$2cRRzsx4t7Esq7E88Xa.FewDXSomqiDoAfVEwz8YmFa1/dlLov5X.', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 0),
(19, 'Geitkipj', '$2y$12$zSVOTDv6v574gJlLD8NmuOXQnBUuJBPIQ6u8boD2mzSJop1wSz4q6', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 0),
(20, 'Harigebilnaad', '$2y$12$3oSDlPiwavm/SI5rMihyKekPgL8A61FKiwuKmfgEQ7NNLd2MklwVK', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 0),
(21, 'JoeriH', '$2y$12$yWRfbF60mZCpTy/FdNzdZeD7qMR1424XBYGh7FpzU6HYoou6F5XUK', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, -420),
(22, 'Roelsande', '$2y$12$h.rVpQXWybD498NPdkjMEu8kjJBCQMEI.E7OuAvmP029ySTCLpnmq', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`),
  ADD UNIQUE KEY `categoryNameUnique` (`categoryName`),
  ADD KEY `categories_ibfk_1` (`categoryBy`);

--
-- Indexes for table `nametags`
--
ALTER TABLE `nametags`
  ADD PRIMARY KEY (`nametagID`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usernameForeign` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nametags`
--
ALTER TABLE `nametags`
  MODIFY `nametagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `reactionID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topicId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`categoryBy`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
