-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2015 at 07:45 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Soccerdome`
--

-- --------------------------------------------------------

--
-- Table structure for table `champ`
--

CREATE TABLE IF NOT EXISTS `champ` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `points` int(255) NOT NULL DEFAULT '0',
  `goaldiff` int(255) NOT NULL DEFAULT '0',
  `tg` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No Goals Scored'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `champ`
--

INSERT INTO `champ` (`id`, `name`, `points`, `goaldiff`, `tg`) VALUES
(1, 'Newcastke', 10, 0, 'No Goals Scored'),
(2, 'MettyHoppers', 100, 0, 'No Goals Scored'),
(3, 'Langly FC', 4, 0, 'No Goals Scored'),
(4, 'Callum Ross', 1, 0, 'No Goals Scored');

-- --------------------------------------------------------

--
-- Table structure for table `conf`
--

CREATE TABLE IF NOT EXISTS `conf` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `points` int(255) NOT NULL DEFAULT '0',
  `goaldiff` int(255) NOT NULL DEFAULT '0',
  `tg` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No Goals Scored'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conf`
--

INSERT INTO `conf` (`id`, `name`, `points`, `goaldiff`, `tg`) VALUES
(1, 'RealSoSoBad', 10, 0, 'No Goals Scored'),
(2, 'MettyHoppers', 100, 0, 'No Goals Scored'),
(3, 'Langly FC', 4, 0, 'No Goals Scored'),
(4, 'Callum Ross', 1, 0, 'No Goals Scored');

-- --------------------------------------------------------

--
-- Table structure for table `d1`
--

CREATE TABLE IF NOT EXISTS `d1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `points` int(255) NOT NULL DEFAULT '0',
  `goaldiff` int(255) NOT NULL DEFAULT '0',
  `tg` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No Goals Scored'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `d1`
--

INSERT INTO `d1` (`id`, `name`, `points`, `goaldiff`, `tg`) VALUES
(1, 'RealSoSoBad', 10, 0, 'No Goals Scored'),
(2, 'MettyHoppers', 100, 0, 'No Goals Scored'),
(3, 'Langly FC', 4, 0, 'No Goals Scored'),
(4, 'Callum Ross', 1, 0, 'No Goals Scored');

-- --------------------------------------------------------

--
-- Table structure for table `d2`
--

CREATE TABLE IF NOT EXISTS `d2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `points` int(255) NOT NULL DEFAULT '0',
  `goaldiff` int(255) NOT NULL DEFAULT '0',
  `tg` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No Goals Scored'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `d2`
--

INSERT INTO `d2` (`id`, `name`, `points`, `goaldiff`, `tg`) VALUES
(1, 'RealSoSoBad', 10, 0, 'No Goals Scored'),
(2, 'MettyHoppers', 100, 0, 'No Goals Scored'),
(3, 'Langly FC', 4, 0, 'No Goals Scored'),
(4, 'Callum Ross', 1, 0, 'No Goals Scored');

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE IF NOT EXISTS `fixtures` (
  `id` int(11) NOT NULL,
  `team_a` varchar(255) NOT NULL,
  `team_b` varchar(255) NOT NULL,
  `score` varchar(6) NOT NULL DEFAULT '0-0',
  `startTime` time NOT NULL,
  `date` date NOT NULL,
  `progress` int(3) NOT NULL DEFAULT '0' COMMENT '1 = Started, 0 = Not Started, 3 = Full Time',
  `time` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`id`, `team_a`, `team_b`, `score`, `startTime`, `date`, `progress`, `time`) VALUES
(6, 'METTY HOPPERS', 'REALSOSOBAD', '1-0', '18:30:00', '2015-11-02', 0, '00:00:00'),
(7, 'CALLUM ROSS', 'AFC TELFORD', '4-4', '19:00:00', '2015-11-02', 0, '00:00:00'),
(8, 'TRIANGLE', 'LANGLEY FC', '0-0', '00:00:00', '2015-10-31', 0, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pitches`
--

CREATE TABLE IF NOT EXISTS `pitches` (
  `id` int(255) NOT NULL,
  `pitchNumber` int(20) NOT NULL,
  `availability` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pitches`
--

INSERT INTO `pitches` (`id`, `pitchNumber`, `availability`, `date`, `time`) VALUES
(1, 3, 'league_match', '2015-12-12', '13:00:00'),
(2, 4, 'booked', '2015-12-12', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prem`
--

CREATE TABLE IF NOT EXISTS `prem` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `points` int(255) NOT NULL DEFAULT '0',
  `goaldiff` int(255) NOT NULL DEFAULT '0',
  `tg` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No Goals Scored'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prem`
--

INSERT INTO `prem` (`id`, `name`, `points`, `goaldiff`, `tg`) VALUES
(1, 'RealSoSoBad', 0, 0, 'No Goals Scored'),
(2, 'MettyHoppers', 0, 1, 'No Goals Scored'),
(3, 'Langly FC', 0, 0, 'No Goals Scored'),
(4, 'Callum Ross', 0, 0, 'No Goals Scored'),
(5, 'Newcastle', 0, 0, 'No Goals Scored');

-- --------------------------------------------------------

--
-- Table structure for table `u15`
--

CREATE TABLE IF NOT EXISTS `u15` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `points` int(255) NOT NULL DEFAULT '0',
  `goaldiff` int(255) NOT NULL DEFAULT '0',
  `tg` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No Goals Scored'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `u15`
--

INSERT INTO `u15` (`id`, `name`, `points`, `goaldiff`, `tg`) VALUES
(1, 'RealSoSoBad', 10, 0, 'No Goals Scored'),
(2, 'MettyHoppers', 100, 0, 'No Goals Scored'),
(3, 'Langly FC', 4, 0, 'No Goals Scored'),
(4, 'Callum Ross', 1, 0, 'No Goals Scored');

-- --------------------------------------------------------

--
-- Table structure for table `u17`
--

CREATE TABLE IF NOT EXISTS `u17` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `points` int(255) NOT NULL DEFAULT '0',
  `goaldiff` int(255) NOT NULL DEFAULT '0',
  `tg` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No Goals Scored'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `u17`
--

INSERT INTO `u17` (`id`, `name`, `points`, `goaldiff`, `tg`) VALUES
(1, 'RealSoSoBad', 10, 0, 'No Goals Scored'),
(2, 'MettyHoppers', 100, 0, 'No Goals Scored'),
(3, 'Langly FC', 4, 0, 'No Goals Scored'),
(4, 'Callum Ross', 1, 0, 'No Goals Scored');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `forename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(255) DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'newUser'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `forename`, `surname`, `username`, `password`, `email`, `phone`, `type`) VALUES
(1, 'John', 'Smith', 'admin', '$2y$10$INlFaVJjoSOC50ji2ppFm.WweSVDsqqha33jnVhhwg81FXHE102Wm', NULL, NULL, 'admin'),
(2, 'Sam', 'Nockels', 'user', '$2y$10$INlFaVJjoSOC50ji2ppFm.WweSVDsqqha33jnVhhwg81FXHE102Wm', NULL, NULL, 'team_member'),
(3, 'Sam', 'Nockels', 'samnockels', '$2y$10$9h8MDb9lzD9EpbVg.u6iqun4O3D1OdDxcG1axd7NGlRnVE3QrgoIK', 'samnockels@gmail.com', 1912403206, 'new_member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `champ`
--
ALTER TABLE `champ`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conf`
--
ALTER TABLE `conf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d1`
--
ALTER TABLE `d1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d2`
--
ALTER TABLE `d2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pitches`
--
ALTER TABLE `pitches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prem`
--
ALTER TABLE `prem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u15`
--
ALTER TABLE `u15`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u17`
--
ALTER TABLE `u17`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `champ`
--
ALTER TABLE `champ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `conf`
--
ALTER TABLE `conf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `d1`
--
ALTER TABLE `d1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `d2`
--
ALTER TABLE `d2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fixtures`
--
ALTER TABLE `fixtures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pitches`
--
ALTER TABLE `pitches`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prem`
--
ALTER TABLE `prem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `u15`
--
ALTER TABLE `u15`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `u17`
--
ALTER TABLE `u17`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
