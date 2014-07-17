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
SELECT "INSERT" AS "cooking_essentials";

INSERT INTO `cooking_essentials` (`cooking_essentials_id`, `user_id`, `type`, `amount`, `amount_needed`, `measure`) VALUES
(1, 1, 'Baking Powder', 6, 6, 'lbs'),
(2, 1, 'Yeast', 4, 3, 'lbs');

--
-- Dumping data for table `fats_and_oils`
--
SELECT "INSERT" AS "fats_and_oils";

INSERT INTO `fats_and_oils` (`fats_and_oils_id`, `user_id`, `type`, `amount`, `amount_needed`, `measure`) VALUES
(1, 1, 'Shortening', 13, 24, 'lbs'),
(2, 1, 'Peanut Butter', 24, 24, 'lbs');

--
-- Dumping data for table `grains`
--
SELECT "INSERT" AS "grains";

INSERT INTO `grains` (`grain_id`, `user_id`, `type`, `amount`, `amount_needed`, `measure`) VALUES
(3, 1, 'Flour', 75, 150, 'lbs'),
(4, 1, 'Rice', 100, 300, 'lbs');

--
-- Dumping data for table `legumes`
--
SELECT "INSERT" AS "legumes";

INSERT INTO `legumes` (`legumes_id`, `user_id`, `type`, `amount`, `amount_needed`, `measure`) VALUES
(1, 1, 'Lentils', 10, 30, 'lbs'),
(2, 1, 'Dry soup Mix', 20, 30, 'lbs');

--
-- Dumping data for table `milk`
--
SELECT "INSERT" AS "milk";

INSERT INTO `milk` (`milk_id`, `user_id`, `type`, `amount`, `amount_needed`, `measure`) VALUES
(1, 1, 'Dry Milk', 20, 360, 'lbs'),
(2, 1, 'Other', 5, 78, 'lbs');

--
-- Dumping data for table `sugars`
--
SELECT "INSERT" AS "sugars";

INSERT INTO `sugars` (`sugars_id`, `user_id`, `type`, `amount`, `amount_needed`, `measure`) VALUES
(1, 1, 'Sugar', 100, 240, 'lbs'),
(2, 1, 'Powdered Fruit Drink', 5, 36, 'lbs');

--
-- Dumping data for table `user`
--
SELECT "INSERT" AS "user";

INSERT INTO `user` (`user_id`, `first_name`, `middle_name`, `last_name`, `email`, `pass`, `token`, `last_login`) VALUES
(1, 'Jared', NULL, 'Wadsworth', 'wad09007@byui.edu', 'password', NULL, '2014-06-25');

--
-- Dumping data for table `water`
--
SELECT "INSERT" AS "water";

INSERT INTO `water` (`water_id`, `user_id`, `type`, `amount`, `amount_needed`, `measure`) VALUES
(1, 1, 'Water', 84, 84, 'gals'),
(2, 1, 'Bleach', 6, 6, 'gals');

NOTEE