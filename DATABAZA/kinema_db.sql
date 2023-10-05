-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 04:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_filma`
--

CREATE TABLE `filma` (
  `film_id` int(11) NOT NULL primary key auto_increment,
  `kinema_id` int(11) DEFAULT NULL,
  `emer_film` varchar(255) NOT NULL,
  `kasti` varchar(500) NOT NULL,
  `pershkrimi` varchar(1000) NOT NULL,
  `data_lancimit` date NOT NULL,
  `foto` varchar(200) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `gjendja` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kinema`
--

CREATE TABLE `kinema` (
  `kinema_id` int(11) NOT NULL primary key auto_increment,
  `emri` varchar(100) NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `qyteti` varchar(100) NOT NULL,
  `shteti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontakt`
--

CREATE TABLE `kontakt` (
  `kontakt_id` int(11) NOT NULL primary key auto_increment,
  `emri` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `subjekti` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lajmerime`
--

CREATE TABLE `lajmerime` (
  `lajmerim_id` int(11) NOT NULL primary key auto_increment,
  `emri` varchar(100) NOT NULL,
  `kasti` varchar(100) NOT NULL,
  `data_lajmerim` date NOT NULL,
  `pershkrimi` varchar(200) NOT NULL,
  `bashkangjitje` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `identifikimi` (
  `perdorues_id` int(11) NOT NULL primary key auto_increment,
  `emer_perdorues` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` varchar(12) NOT NULL,
  `mosha` int(2) NOT NULL,
  `gjinia` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipi_perdorues` int(1) NOT NULL,
  `menaxher_id` int(5)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orari`
--

CREATE TABLE `orari` (
  `orari_id` int(11) NOT NULL primary key auto_increment,
  `salla_id` int(11) DEFAULT NULL,
  `koha_nisjes` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `rezervimet` (
  `rezervimi_id` int(11) NOT NULL primary key auto_increment,
  `bileta_id` varchar(30) NOT NULL,
  `kinema_id` int(11) DEFAULT NULL,
  `perdorues_id` int(11) DEFAULT NULL,
  `shfaqja_id` int(11) DEFAULT NULL,
  `salla_id` int(11) DEFAULT NULL,
  `nr_karrige` int(3) NOT NULL,
  `shuma` int(5) NOT NULL,
  `nr_bileta` int(5) NOT NULL,
  `data_bileta` date NOT NULL,
  `data_rezervim` date NOT NULL,
  `gjendja` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- Table structure for table `tbl_salla`
--

CREATE TABLE `salla` (
  `salla_id` int(11) NOT NULL Primary key Auto_Increment,
  `kinema_id` int(11) DEFAULT NULL,
  `emer_salla` varchar(110) NOT NULL,
  `nr_karrige` int(11) NOT NULL,
  `cmimi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shfaqja`
--

CREATE TABLE `shfaqja` (
  `shfaqja_id` int(11) NOT NULL primary key Auto_increment,
  `orari_id` int(11) DEFAULT NULL,
  `kinema_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  `gjendja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `salla` ADD `cmimi` INT(10) NOT NULL AFTER `nr_karrige`;

-- Constraints for table `tbl_filma`
--
ALTER TABLE `filma`
  ADD CONSTRAINT `filma_ibfk_1` FOREIGN KEY (`kinema_id`) REFERENCES `kinema` (`kinema_id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Constraints for table `tbl_orari`
--
ALTER TABLE `orari`
  ADD CONSTRAINT `orari_ibfk_1` FOREIGN KEY (`salla_id`) REFERENCES `salla` (`salla_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rezervimet`
--
ALTER TABLE `rezervimet`
  ADD CONSTRAINT `rezervimet_ibfk_1` FOREIGN KEY (`shfaqja_id`) REFERENCES `shfaqja` (`shfaqja_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervimet_ibfk_2` FOREIGN KEY (`salla_id`) REFERENCES `salla` (`salla_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervimet_ibfk_3` FOREIGN KEY (`perdorues_id`) REFERENCES `identifikimi` (`perdorues_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervimet_ibfk_4` FOREIGN KEY (`kinema_id`) REFERENCES `kinema` (`kinema_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_salla`
--
ALTER TABLE `salla`
  ADD CONSTRAINT `salla_ibfk_1` FOREIGN KEY (`kinema_id`) REFERENCES `kinema` (`kinema_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_shfaqja`
--
ALTER TABLE `shfaqja`
  ADD CONSTRAINT `shfaqja_ibfk_1` FOREIGN KEY (`kinema_id`) REFERENCES `kinema` (`kinema_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shfaqja_ibfk_2` FOREIGN KEY (`orari_id`) REFERENCES `orari` (`orari_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shfaqja_ibfk_3` FOREIGN KEY (`film_id`) REFERENCES `filma` (`film_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

