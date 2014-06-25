TEE /var/www/html/FoodTracker/insertData.txt

-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 26, 2014 at 01:48 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `FoodTracker`
--

--
-- Dumping data for table `cooking_essentials`
--

INSERT INTO `cooking_essentials` (`cooking_essentials_id`, `user_id`, `type`, `amount`, `amount_needed`, `measure`) VALUES
(1, 1, 'baking powder', 6, 6, 'lbs'),
(2, 1, 'yeast', 4, 3, 'lbs');

--
-- Dumping data for table `fats_and_oils`
--

INSERT INTO `fats_and_oils` (`fats_and_oils_id`, `user_id`, `type`, `amount`, `amount_needed`, `measure`) VALUES
(1, 1, 'shortening', 10, 24, 'lbs'),
(2, 1, 'beanut butter', 24, 24, 'lbs');

--
-- Dumping data for table `grains`
--

INSERT INTO `grains` (`grain_id`, `user_id`, `type`, `amount`, `amount_needed`, `measure`) VALUES
(3, 1, 'Flour', 75, 150, 'lbs'),
(4, 1, 'Rice', 100, 300, 'lbs');

--
-- Dumping data for table `legumes`
--

INSERT INTO `legumes` (`legumes_id`, `user_id`, `type`, `amount`, `amount_needed`, `measure`) VALUES
(1, 1, 'lentils', 10, 30, 'lbs'),
(2, 1, 'dry soup mix', 20, 30, 'lbs');

--
-- Dumping data for table `milk`
--

INSERT INTO `milk` (`milk_id`, `user_id`, `type`, `amount`, `amount_needed`, `milk`) VALUES
(1, 1, 'dry milk', 20, 360, 'lbs'),
(2, 1, 'other', 5, 78, 'lbs');

--
-- Dumping data for table `sugars`
--

INSERT INTO `sugars` (`sugars_id`, `user_id`, `type`, `amount`, `amount_needed`, `sugars`) VALUES
(1, 1, 'sugar', 100, 240, 'lbs'),
(2, 1, 'fruit drink powdered', 5, 36, 'lbs');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `middle_name`, `last_name`, `email`, `pass`, `token`, `last_login`) VALUES
(1, 'Jared', NULL, 'Wadsworth', 'wad09007@byui.edu', 'password', NULL, '2014-06-25');

--
-- Dumping data for table `water`
--

INSERT INTO `water` (`water_id`, `user_id`, `type`, `amount`, `amount_needed`, `measure`) VALUES
(1, 1, 'water', 84, 84, 'gals'),
(2, 1, 'bleach', 6, 6, 'gals');

NOTEE