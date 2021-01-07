-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2021 at 09:06 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `micro-url`
--

-- --------------------------------------------------------

--
-- Table structure for table `asso_kw_url`
--

CREATE TABLE `asso_kw_url` (
  `id` int(11) NOT NULL,
  `id_kw` int(11) NOT NULL,
  `id_url` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `asso_kw_url`
--

INSERT INTO `asso_kw_url` (`id`, `id_kw`, `id_url`) VALUES
(1, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `key-word`
--

CREATE TABLE `key-word` (
  `id` int(11) NOT NULL,
  `mot-cle` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `key-word`
--

INSERT INTO `key-word` (`id`, `mot-cle`) VALUES
(7, 'db, cardi, cardinal, blah');

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `url` text COLLATE utf32_unicode_ci NOT NULL,
  `shortcut` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `datetime` date NOT NULL,
  `description` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `url`, `shortcut`, `datetime`, `description`) VALUES
(1, 'https://www.base-de-donnees.com/cardinalites/', 'cardinalite', '2021-01-05', 'Ouah que c\'est beau'),
(2, 'https://stackoverflow.com/questions/5280180/warning-implode-function-implode-invalid-arguments-passed', 'stackoverwlooooow', '2021-01-05', 'stack trop cooll ouaaaaich'),
(3, 'https://stackoverflow.com/questions/5280180/warning-implode-function-implode-invalid-arguments-passed', 'stackoverwlooooow', '2021-01-05', 'stack trop cooll ouaaaaich'),
(4, 'https://stackoverflow.com/questions/5280180/warning-implode-function-implode-invalid-arguments-passed', 'stackoverwlooooow', '2021-01-05', 'stack trop cooll ouaaaaich'),
(5, 'https://stackoverflow.com/questions/5280180/warning-implode-function-implode-invalid-arguments-passed', 'stackoverwlooooow', '2021-01-05', 'stack trop cooll ouaaaaich'),
(6, 'https://stackoverflow.com/questions/5280180/warning-implode-function-implode-invalid-arguments-passed', 'stackoverwlooooow', '2021-01-05', 'stack trop cooll ouaaaaich'),
(7, 'https://stph.scenari-community.org/bdd/0/co/eaUL018.html', 'cardi', '2021-01-07', 'site de cardinalité');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asso_kw_url`
--
ALTER TABLE `asso_kw_url`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kw` (`id_kw`,`id_url`),
  ADD KEY `id_url` (`id_url`);

--
-- Indexes for table `key-word`
--
ALTER TABLE `key-word`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asso_kw_url`
--
ALTER TABLE `asso_kw_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `key-word`
--
ALTER TABLE `key-word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asso_kw_url`
--
ALTER TABLE `asso_kw_url`
  ADD CONSTRAINT `asso_kw_url_ibfk_1` FOREIGN KEY (`id_url`) REFERENCES `url` (`id`),
  ADD CONSTRAINT `asso_kw_url_ibfk_2` FOREIGN KEY (`id_kw`) REFERENCES `key-word` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
