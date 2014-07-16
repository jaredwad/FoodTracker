TEE /var/www/html/FoodTracker/resetDB.txt

-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 11, 2014 at 05:40 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `FoodTracker`
--
CREATE DATABASE IF NOT EXISTS `FoodTracker` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `FoodTracker`;

-- --------------------------------------------------------

--
-- Drop all tables
--
SELECT "DROP" AS "TABLES";

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `cooking_essentials`;
DROP TABLE IF EXISTS `fats_and_oils`;
DROP TABLE IF EXISTS `grains`;
DROP TABLE IF EXISTS `legumes`;
DROP TABLE IF EXISTS `milk`;
DROP TABLE IF EXISTS `sugars`;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `water`;

SET FOREIGN_KEY_CHECKS=1;

-- --------------------------------------------------------

--
-- Table structure for table `cooking_essentials`
--
SELECT "CREATE" AS "cooking_essentials";

CREATE TABLE `cooking_essentials` (
  `cooking_essentials_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `amount_needed` int(10) unsigned NOT NULL,
  `measure` varchar(10) NOT NULL,
  PRIMARY KEY (`cooking_essentials_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `fats_and_oils`
--
SELECT "CREATE" AS "fats_and_oils";

CREATE TABLE `fats_and_oils` (
  `fats_and_oils_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `amount_needed` int(10) unsigned NOT NULL,
  `measure` varchar(10) NOT NULL,
  PRIMARY KEY (`fats_and_oils_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `grains`
--
SELECT "CREATE" AS "grains";

CREATE TABLE `grains` (
  `grain_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `amount_needed` int(10) unsigned NOT NULL,
  `measure` varchar(10) NOT NULL,
  PRIMARY KEY (`grain_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `legumes`
--
SELECT "CREATE" AS "legumes";

CREATE TABLE `legumes` (
  `legumes_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `amount_needed` int(10) unsigned NOT NULL,
  `measure` varchar(10) NOT NULL,
  PRIMARY KEY (`legumes_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `milk`
--
SELECT "CREATE" AS "milk";

CREATE TABLE `milk` (
  `milk_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `amount_needed` int(10) unsigned NOT NULL,
  `measure` varchar(10) NOT NULL,
  PRIMARY KEY (`milk_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `sugars`
--
SELECT "CREATE" AS "sugars";

CREATE TABLE `sugars` (
  `sugars_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `amount_needed` int(10) unsigned NOT NULL,
  `measure` varchar(10) NOT NULL,
  PRIMARY KEY (`sugars_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
SELECT "CREATE" AS "user";

CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `token` varchar(30) DEFAULT NULL,
  `last_login` date NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `water`
--
SELECT "CREATE" AS "water";

CREATE TABLE `water` (
  `water_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `amount_needed` int(10) unsigned NOT NULL,
  `measure` varchar(10) NOT NULL,
  PRIMARY KEY (`water_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Insert data
--

\. insertData.sql

-- --------------------------------------------------------

--
-- Constraints for dumped tables
--
SELECT "Constraints" AS "Constraints";

--
-- Constraints for table `cooking_essentials`
--
ALTER TABLE `cooking_essentials`
  ADD CONSTRAINT `cooking_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fats_and_oils`
--
ALTER TABLE `fats_and_oils`
  ADD CONSTRAINT `fats_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grains`
--
ALTER TABLE `grains`
  ADD CONSTRAINT `wheat_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `legumes`
--
ALTER TABLE `legumes`
  ADD CONSTRAINT `vegtables_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `milk`
--
ALTER TABLE `milk`
  ADD CONSTRAINT `milk_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sugars`
--
ALTER TABLE `sugars`
  ADD CONSTRAINT `sugars_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `water`
--
ALTER TABLE `water`
  ADD CONSTRAINT `water_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

NOTEE