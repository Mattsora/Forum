-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 sep 2019 om 14:31
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

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
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(8) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `categoryDesc`) VALUES
(1, 'Death Stranding', 'This is the category for Death Stranding'),
(2, 'Halo : Combat Evolved (XBOX)', 'Halo 1 fourm'),
(3, 'Half Life 2 (ORANGE_BOX PS3)', 'Half Life 2 Orange Box version PS3 version '),
(4, 'Playstation 5 and Xbox Specs Discussion', 'We\'re talking specs here.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nametags`
--

CREATE TABLE `nametags` (
  `nametagID` int(11) NOT NULL,
  `nametagName` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `nametags`
--

INSERT INTO `nametags` (`nametagID`, `nametagName`) VALUES
(1, 'Fresh'),
(2, 'Spicy'),
(3, 'Mild'),
(4, 'Banned');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
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
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`postID`, `postTitle`, `postContent`, `postDate`, `postKarma`, `postTopic`, `postBy`) VALUES
(1, 'Bad Framerate', 'Hey why is the framerate so poor throughout the whole level? Sub 30fps constantly.', '2019-09-01 00:00:00', 0, 3, 1),
(2, 'Sluggish Controls', 'Controls feel so rough and slow, they really should\'ve fixed this already.', '2019-09-01 00:00:00', 0, 3, 1),
(3, 'Why?!', 'Why does he always do this? Metal Gear and Death Stranding are overly complicated atrocities.', '2019-09-04 00:00:00', 6, 4, 1),
(4, 'STFU', 'Shut the fuck up, OP! \r\n\r\nKojima is god!', '2019-09-02 00:00:00', 0, 4, 2),
(5, 'Xbox Lan Party for Halo', 'Hey guys, I\'m interested in hosting a LAN party for Halo on XBOX original. The location is CityCityTown 4423XA Ireland.', '2019-09-03 00:00:00', 0, 5, 2),
(6, 'a', 'bbbb', '0000-00-00 00:00:00', 0, 4, 6),
(9, 'fdsafdsafdsa', 'fdsafdsafdsafdsa', '0000-00-00 00:00:00', 0, 4, 6),
(10, 'PostTestOp', 'TestOp', '0000-00-00 00:00:00', 11, 6, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reactions`
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
-- Gegevens worden geëxporteerd voor tabel `reactions`
--

INSERT INTO `reactions` (`reactionID`, `reactionTitle`, `reactionContent`, `reactionKarma`, `reactionDate`, `reactionPost`, `reactionBy`) VALUES
(1, 'Get together with me (Halo Xbox)', 'Hey I\'d love to get together with you for the lan party. My Xbox live usrname is Nathenal82', 0, '0000-00-00 00:00:00', 5, 4),
(2, 'Hoi ik ben aaron', 'aaron is echt een coole gast wajoo!', 0, '0000-00-00 00:00:00', 4, 3),
(3, 'aaaaaa', 'bbbb', 0, '0000-00-00 00:00:00', 6, 6),
(4, 'aaaaaa', 'bbbbbbbbbbbbbb', 0, '0000-00-00 00:00:00', 6, 6),
(6, 'aaaaaa', 'bbbbbbbbbbbbbb', 0, '0000-00-00 00:00:00', 6, 6),
(8, 'jemoeder', 'bbbbbbbbbbbbbb', 0, '0000-00-00 00:00:00', 4, 6),
(9, 'jemoeder', 'bbbb', 0, '0000-00-00 00:00:00', 5, 6),
(10, 'deze moet highlighten', 'deze moet highlighten', 3, '0000-00-00 00:00:00', 10, 6),
(11, 'Deze niet', 'Deze niet', 0, '0000-00-00 00:00:00', 10, 7),
(13, 'aaaaaa', 'bbbbbbbbbbbbbb', 1, '0000-00-00 00:00:00', 3, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `topics`
--

CREATE TABLE `topics` (
  `topicId` int(8) NOT NULL,
  `topicSubject` varchar(255) NOT NULL,
  `topicDate` datetime NOT NULL,
  `topicCategory` int(8) NOT NULL,
  `topicBy` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `topics`
--

INSERT INTO `topics` (`topicId`, `topicSubject`, `topicDate`, `topicCategory`, `topicBy`) VALUES
(3, 'Bad Framerate in City17', '2019-09-01 00:00:00', 3, 1),
(4, 'Kojima is crazy', '2019-09-03 00:00:00', 1, 1),
(5, 'LAN play party this December', '2019-09-03 00:00:00', 2, 2),
(6, 'Test OP', '0000-00-00 00:00:00', 4, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
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
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `createdate`, `lastpostdate`, `accountstatus`, `karma`, `userlevel`) VALUES
(1, 'Dudebroson', '666222111', 'email@email.com', '2019-09-01 00:00:00.000000', '0000-00-00 00:00:00', 'ACTIVE', 3, 666),
(2, 'BadBitch666', 'badbitch666', 'email@email.com', '2019-07-10 00:00:00.000000', '0000-00-00 00:00:00', 'ACTIVE', 320, 666),
(3, 'SullyDavy', '$2y$12$uJUH0FXJ4R17X2jfRs4B5OgdK3MalNE3MXO1yv0LnclEk1SHuD3ja', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 666),
(4, 'baconboy2', '$2y$12$jTXDBG0.Wd5OfHyCqX6rxuE5GCbILYjtcC3PVT/iDfAE7Kbcyaooy', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 0),
(5, 'Badcyborg', '$2y$12$ZXZVJhEDigDoG5WdNSD60urKUR3o5W1zuP6ucpxcQiX2iu8udKB0K', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 666),
(6, 'jemoeder', '$2y$12$X3qsCruw.zTJ/UijFDaOeuvbFRuLzpjGYQn3CezBVUhE0wY0eLKoK', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 666),
(7, 'Testjes', '$2y$12$vIutJAqZBO6LKwKNkIYfM.E225U6SpF1b9wgoSXryes8GXeh0rWsa', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, -420),
(8, 'pieterisgay', '$2y$12$gQoY2YE4Vvsi7u8M7uO45.UQZ7mrrAadm24tgWXSVIn.SDUYUgEfi', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 0),
(9, 'pieterisgay2', '$2y$12$RkN8Pwxf/wTf5jkhTjWsZ.03sKueGgEmL1tWIbKBEQl/Tudk8XvsG', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00', '', 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`),
  ADD UNIQUE KEY `categoryNameUnique` (`categoryName`);

--
-- Indexen voor tabel `nametags`
--
ALTER TABLE `nametags`
  ADD PRIMARY KEY (`nametagID`);

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `postTopic` (`postTopic`),
  ADD KEY `postBy` (`postBy`);

--
-- Indexen voor tabel `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`reactionID`),
  ADD KEY `foreignPostID` (`reactionPost`),
  ADD KEY `foreignPostByID` (`reactionBy`);

--
-- Indexen voor tabel `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topicId`),
  ADD KEY `topicCategory` (`topicCategory`),
  ADD KEY `topicBy` (`topicBy`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `nametags`
--
ALTER TABLE `nametags`
  MODIFY `nametagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `reactions`
--
ALTER TABLE `reactions`
  MODIFY `reactionID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `topics`
--
ALTER TABLE `topics`
  MODIFY `topicId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`postTopic`) REFERENCES `topics` (`topicId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`postBy`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `foreignPostByID` FOREIGN KEY (`reactionBy`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `foreignPostID` FOREIGN KEY (`reactionPost`) REFERENCES `posts` (`postID`);

--
-- Beperkingen voor tabel `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topicCategory`) REFERENCES `categories` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topicBy`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
