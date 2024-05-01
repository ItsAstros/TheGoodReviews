-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2024 at 12:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TheGoodReviews`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`CategoryID`, `CategoryName`) VALUES
(180, 'Adventure'),
(214, 'Art'),
(181, 'Board Game Adaptation'),
(182, 'Card'),
(183, 'Casual'),
(220, 'Competitive'),
(215, 'Construction and Management Simulation'),
(221, 'Cooperative'),
(212, 'Educational'),
(229, 'Exploration'),
(208, 'Fantasy'),
(184, 'Fighting'),
(185, 'FPS'),
(209, 'Historical'),
(186, 'Horror'),
(187, 'Indie'),
(216, 'Life Simulation'),
(226, 'Local Multiplayer'),
(219, 'Massively Multiplayer'),
(188, 'MMORPG'),
(189, 'MOBA'),
(223, 'Multiplayer'),
(213, 'Music'),
(210, 'Mystery'),
(228, 'Narrative'),
(225, 'Offline'),
(224, 'Online'),
(190, 'Open World'),
(191, 'Party'),
(192, 'Platformer'),
(193, 'Puzzle'),
(194, 'Racing'),
(195, 'Roguelike'),
(196, 'Role-playing'),
(197, 'RTS'),
(198, 'Sandbox'),
(207, 'Sci-Fi'),
(199, 'Simulation'),
(222, 'Single Player'),
(200, 'Social Simulation'),
(201, 'Sports'),
(211, 'Stealth'),
(227, 'Story Rich'),
(202, 'Strategy'),
(203, 'Survival'),
(204, 'TBS'),
(217, 'Time Management'),
(205, 'TPS'),
(218, 'Virtual Reality'),
(206, 'Visual Novel');

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `CommentID` int(11) NOT NULL,
  `ReviewID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CommentText` text NOT NULL,
  `CommentDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `GameCategories`
--

CREATE TABLE `GameCategories` (
  `GameID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `GameCategories`
--

INSERT INTO `GameCategories` (`GameID`, `CategoryID`) VALUES
(1, 215),
(2, 185),
(3, 198),
(4, 221),
(5, 209);

-- --------------------------------------------------------

--
-- Table structure for table `Games`
--

CREATE TABLE `Games` (
  `GameID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `ReleaseDate` date DEFAULT NULL,
  `Developer` varchar(100) DEFAULT NULL,
  `Platform` varchar(50) DEFAULT NULL,
  `path` varchar(250) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `PathDetails` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Games`
--

INSERT INTO `Games` (`GameID`, `Title`, `Description`, `ReleaseDate`, `Developer`, `Platform`, `path`, `Price`, `PathDetails`) VALUES
(1, 'The Witcher 3: Wild Hunt', 'An open-world action RPG', '2015-05-19', 'CD Projekt Red', '../../media/platform/PLAYSTATION.png', '../../media/games/TheWitcher3WildHunt.png', 35, '../../media/games/TheWitcher3WildHunt_details.png'),
(2, 'Grand Theft Auto V', 'An action-adventure game', '2013-09-17', 'Rockstar North', '../../media/platform/PLAYSTATION.png', '../../media/games/GTAV.png', 35, '../../media/games/GTAV_details.png'),
(3, 'Minecraft', 'A sandbox video game', '2011-11-18', 'Mojang', '../../media/platform/PC.png', '../../media/games/Minecraft.png', 25, '../../media/games/Minecraft_details.png'),
(4, 'Red Dead Redemption 2', 'An action-adventure game', '2018-10-26', 'Rockstar Games', '../../media/platform/PLAYSTATION.png', '../../media/games/RedDeadRedemption2.png', 60, '../../media/games/RedDeadRedemption2_details.png'),
(5, 'The Legend of Zelda: Breath of the Wild', 'An action-adventure game', '2017-03-03', 'Nintendo EPD', '../../media/platform/SWITCH.png', '../../media/games/ZeldaBreathOfTheWild.png', 50, '../../media/games/ZeldaBreathOfTheWild_details.png');

-- --------------------------------------------------------

--
-- Table structure for table `Likes`
--

CREATE TABLE `Likes` (
  `LikeID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ReviewID` int(11) DEFAULT NULL,
  `LikeDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `ReviewID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `GameID` int(11) DEFAULT NULL,
  `ReviewText` text DEFAULT NULL,
  `Rating` decimal(3,2) DEFAULT NULL,
  `ReviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL,
  `icone` varchar(128) NOT NULL DEFAULT '../../media/pp/defaultpp.png',
  `X` varchar(128) DEFAULT NULL,
  `Discord` varchar(128) DEFAULT NULL,
  `datecreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `full_name`, `email`, `password`, `reset_token_hash`, `reset_token_expires_at`, `icone`, `X`, `Discord`, `datecreation`) VALUES
(1, 'Flo', 'flor.cliquet@gmail.com', '$2y$10$AwwMSLsmy2bBCRcF.rUp4ORFrOB0XRSyjaV2ILRfGJKjbXsVodwBK', NULL, NULL, '../../media/pp/66314c41a6332_denji', NULL, NULL, '2024-04-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `ReviewID` (`ReviewID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `GameCategories`
--
ALTER TABLE `GameCategories`
  ADD PRIMARY KEY (`GameID`,`CategoryID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `Games`
--
ALTER TABLE `Games`
  ADD PRIMARY KEY (`GameID`);

--
-- Indexes for table `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`LikeID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ReviewID` (`ReviewID`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `GameID` (`GameID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Games`
--
ALTER TABLE `Games`
  MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Likes`
--
ALTER TABLE `Likes`
  MODIFY `LikeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`ReviewID`) REFERENCES `Reviews` (`ReviewID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `GameCategories`
--
ALTER TABLE `GameCategories`
  ADD CONSTRAINT `GameCategories_ibfk_1` FOREIGN KEY (`GameID`) REFERENCES `Games` (`GameID`) ON DELETE CASCADE,
  ADD CONSTRAINT `GameCategories_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `Categories` (`CategoryID`) ON DELETE CASCADE;

--
-- Constraints for table `Likes`
--
ALTER TABLE `Likes`
  ADD CONSTRAINT `Likes_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Likes_ibfk_2` FOREIGN KEY (`ReviewID`) REFERENCES `Reviews` (`ReviewID`) ON DELETE CASCADE;

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `Reviews_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Reviews_ibfk_2` FOREIGN KEY (`GameID`) REFERENCES `Games` (`GameID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
