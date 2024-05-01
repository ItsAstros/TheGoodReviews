-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2024 at 05:17 PM
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
(1, 'The Witcher 3: Wild Hunt', 'An open-world action RPG', '2015-05-19', 'CD Projekt Red', '../../assets/images/platform/PLAYSTATION.png', '../../assets/images/games/TheWitcher3.png', 35, '../../assets/images/games/BANNER/TheWitcher3WildHunt_banner.png'),
(2, 'Grand Theft Auto V', 'An action-adventure game', '2013-09-17', 'Rockstar North', '../../assets/images/platform/PLAYSTATION.png', '../../assets/images/games/GTAV.png', 35, '../../assets/images/games/BANNER/GTAV_banner.jpg'),
(3, 'Minecraft', 'A sandbox video game', '2011-11-18', 'Mojang', '../../assets/images/platform/PC.png', '../../assets/images/games/Minecraft.png', 25, '../../assets/images/games/BANNER/MINECRAFT_banner.jpg'),
(4, 'Red Dead Redemption 2', 'An action-adventure game', '2018-10-26', 'Rockstar Games', '../../assets/images/platform/PLAYSTATION.png', '../../assets/images/games/RedDeadRedemption2.png', 60, '../../assets/images/games/BANNER/RedDeadRedemption2_details.png'),
(5, 'The Legend of Zelda: Breath of the Wild', 'An action-adventure game', '2017-03-03', 'Nintendo EPD', '../../assets/images/platform/SWITCH.png', '../../assets/images/games/ZeldaBreathOfTheWild.png', 50, '../../assets/images/games/BANNER/ZeldaBreathOfTheWild_banner.png'),
(6, 'The Elder Scrolls V: Skyrim', 'An action role-playing game', '2011-11-11', 'Bethesda Game Studios', '../../assets/images/platform/PC.png', '../../assets/images/games/SKYRIM.png', 40, '../../assets/images/games/BANNER/SKYRIM_banner.jpg'),
(7, 'Dark Souls III', 'An action role-playing game', '2016-04-12', 'FromSoftware', '../../assets/images/platform/PLAYSTATION.png', '../../assets/images/games/DARKSOULSIII.png', 30, '../../assets/images/games/banner/DARKSOULSIII.jpg'),
(8, 'Portal 2', 'A puzzle-platform game', '2011-04-19', 'Valve Corporation', '../../assets/images/platform/PC.png', '../../assets/images/games/portal2.png', 20, '../../assets/images/games/BANNER/portal2_banner.jpg'),
(9, 'Super Smash Bros Ultimate', 'A crossover fighting game', '2018-12-07', 'Bandai Namco Studios', '../../assets/images/platform/SWITCH.png', '../../assets/images/games/SMBUltimate.png', 50, '../../assets/images/games/BANNER/SMBUltimate_banner.jpg'),
(10, 'The Last of Us', 'An action-adventure game', '2013-06-14', 'Naughty Dog', '../../assets/images/platform/PLAYSTATION.png', '../../assets/images/games/TheLastOfUs.png', 40, '../../assets/images/games/BANNER/TheLastOfUs_banner.jpg'),
(11, 'Counter Strike 2', 'A first-person shooter game', '2023-04-22', 'Valve Corporation', 'To be added', '../../assets/images/games/CS2.png', NULL, '../../assets/images/games/BANNER/CS2_banner.jpg'),
(12, 'League of Legends', 'A multiplayer online battle arena game', '2009-10-27', 'Riot Games', 'To be added', '../../assets/images/games/LOL.png', NULL, '../../assets/images/games/BANNER/LOL_banner.jpg'),
(13, 'Hades', 'An action roguelike game', '2020-09-17', 'Supergiant Games', '../../assets/images/platform/PC.png', '../../assets/images/games/HADES.png', 25, '../../assets/images/games/BANNER/HADES_banner.jpg'),
(14, 'Cuphead', 'A run and gun indie video game', '2017-09-29', 'Studio MDHR', '../../assets/images/platform/PC.png', '../../assets/images/games/CUPHEAD.png', 20, '../../assets/images/games/BANNER/CUPHEAD_banner.png'),
(15, 'Celeste', 'A platforming video game', '2018-01-25', 'Maddy Makes Games', '../../assets/images/platform/PC.png', '../../assets/images/games/CELESTE.png', 15, '../../assets/images/games/BANNER/CELESTE_banner.jpg'),
(16, 'Fortnite', 'A battle royale game', '2017-07-25', 'Epic Games', 'To be added', '../../assets/images/games/FORTNITE.png', NULL, '../../assets/images/games/BANNER/FORTNITE_banner.jpg'),
(17, 'Rocket League', 'A vehicular soccer game', '2015-07-07', 'Psyonix', 'To be added', '../../assets/images/games/RL.png', NULL, '../../assets/images/games/BANNER/RL_banner.jpg'),
(18, 'Need For Speed Underground 2', 'A racing video game', '2004-11-09', 'EA Black Box', 'To be added', '../../assets/images/games/NFS2.png', NULL, '../../assets/images/games/BANNER/NFS2_banner.jpg'),
(19, 'Need For Speed Most Wanted', 'A racing video game', '2005-11-15', 'EA Black Box', 'To be added', '../../assets/images/games/NFS_MW.png', NULL, '../../assets/images/games/BANNER/NFS_MW_banner.jpg'),
(20, 'Trackmania', 'A racing video game', '2003-11-19', 'Nadeo', 'To be added', '../../assets/images/games/TRACKMANIA.png', NULL, '../../assets/images/games/BANNER/TRACKMANIA_banner.png'),
(21, 'Ori and the Blind Forest', 'A platform-adventure Metroidvania game', '2015-03-11', 'Moon Studios', 'To be added', '../../assets/images/games/ORI.png', NULL, '../../assets/images/games/BANNER/ORI_banner.jpg'),
(22, 'The Forest', 'A survival horror game', '2018-04-30', 'Endnight Games', 'To be added', '../../assets/images/games/TheForest.png', NULL, '../../assets/images/games/BANNER/TheForest_banner.jpg'),
(23, 'Assassins Creed 2', 'An action-adventure video game', '2009-11-17', 'Ubisoft', 'To be added', '../../assets/images/games/AC2.png', NULL, '../../assets/images/games/BANNER/AC2_banner.png'),
(24, 'Call of Duty Black Ops 2', 'A first-person shooter video game', '2012-11-13', 'Treyarch', 'To be added', '../../assets/images/games/BLACKOPS2.png', NULL, '../../assets/images/games/BANNER/BLACKOPS2_banner.jpg'),
(25, 'Subnautica', 'An open-world survival adventure game', '2018-01-23', 'Unknown Worlds Entertainment', 'To be added', '../../assets/images/games/SUBNAUTICA.png', NULL, '../../assets/images/games/BANNER/SUBNAUTICA_banner.jpg'),
(26, 'Sea Of Thieves', 'A pirate-themed action-adventure game', '2018-03-20', 'Rare', 'To be added', '../../assets/images/games/SEAOFTHIEVES.png', NULL, '../../assets/images/games/BANNER/SEAOFTHIEVES_banner.jpg');

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
  `ReviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ReviewTitle` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`ReviewID`, `UserID`, `GameID`, `ReviewText`, `Rating`, `ReviewDate`, `ReviewTitle`) VALUES
(1, 1, 3, 'TEST SEXE', 5.00, '2024-04-30 13:30:00', 'Gros classique');

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
  `datecreation` date NOT NULL,
  `IsAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `full_name`, `email`, `password`, `reset_token_hash`, `reset_token_expires_at`, `icone`, `X`, `Discord`, `datecreation`, `IsAdmin`) VALUES
(1, 'Flo', 'flor.cliquet@gmail.com', '$2y$10$AwwMSLsmy2bBCRcF.rUp4ORFrOB0XRSyjaV2ILRfGJKjbXsVodwBK', NULL, NULL, '../../media/pp/66314c41a6332_denji', NULL, NULL, '2024-04-30', NULL);

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
  MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `Likes`
--
ALTER TABLE `Likes`
  MODIFY `LikeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
