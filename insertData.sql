use FoodTracker

TEE /var/www/html/FoodTracker/insertData.txt

--
-- Adds all the basic info into the database
-- Only to be called resetDB.sql
--


-- --------------------------------------------------------

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `middle_name`, `last_name`, `email`, `pass`, `token`, `last_login`) VALUES
(1, 'Jared', NULL, 'Wadsworth', 'wad09007@byui.edu', 'password', NULL, '2014-06-25');

-- --------------------------------------------------------

--
-- Dumping data for table `cooking_essentials`
--

INSERT INTO `cooking_essentials` (`cooking_essentials_id`, `user_id`, `type`, `amount`, `amount_needed`) VALUES
(1, 1, 'baking powder', 6, 6),
(2, 1, 'yeast', 4, 3);

-- --------------------------------------------------------

--
-- Dumping data for table `fats_and_oils`
--

INSERT INTO `fats_and_oils` (`fats_and_oils_id`, `user_id`, `type`, `amount`, `amount_needed`) VALUES
(1, 1, 'shortening', 10, 24),
(2, 1, 'beanut butter', 24, 24);

-- --------------------------------------------------------

--
-- Dumping data for table `grains`
--

INSERT INTO `grains` (`grain_id`, `user_id`, `type`, `amount`, `amount_needed`) VALUES
(3, 1, 'Flour', 75, 150),
(4, 1, 'Rice', 100, 300);

-- --------------------------------------------------------

--
-- Dumping data for table `legumes`
--

INSERT INTO `legumes` (`legumes_id`, `user_id`, `type`, `amount`, `amount_needed`) VALUES
(1, 1, 'lentils', 10, 30),
(2, 1, 'dry soup mix', 20, 30);

-- --------------------------------------------------------

--
-- Dumping data for table `milk`
--

INSERT INTO `milk` (`milk_id`, `user_id`, `type`, `amount`, `amount_needed`) VALUES
(1, 1, 'dry milk', 20, 360),
(2, 1, 'other', 5, 78);

-- --------------------------------------------------------

--
-- Dumping data for table `sugars`
--

INSERT INTO `sugars` (`sugars_id`, `user_id`, `type`, `amount`, `amount_needed`) VALUES
(1, 1, 'sugar', 100, 240),
(2, 1, 'fruit drink powdered', 5, 36);

-- --------------------------------------------------------

--
-- Dumping data for table `water`
--

INSERT INTO `water` (`water_id`, `user_id`, `type`, `amount`, `amount_needed`) VALUES
(1, 1, 'water', 84, 84),
(2, 1, 'bleach', 6, 6);


NOTEE