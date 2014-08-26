<?php

$con = mysqli_connect("localhost", "FTselect", "select", "FoodTracker");

$query = "SELECT `user_id` FROM `user` WHERE `email` = '" . $_POST['email'] . "'";

echo $query;

$set = mysqli_query($con, $query);

$row = mysqli_fetch_array($set);
$userID  = $row['user_id'];

mysqli_close($con);

$con = mysqli_connect("localhost", "FTinsert", "insert", "FoodTracker");

/*
 * For now, this will add storage norms for a single person. Later I would like to add 
 * logic for multiple people, and the entire family's storage.
 */

$query = "INSERT INTO `cooking_essentials`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'yeast', 0, 3, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `cooking_essentials`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'baking powder', 0, 6, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `fats_and_oils`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'shortening', 0, 24, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `fats_and_oils`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'peanut butter', 0, 24, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `grains`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'flour', 0, 150, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `grains`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'rice', 0, 300, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `grains`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'oats', 0, 150, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `grains`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'pasta', 0, 150, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `legumes`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'lentils', 0, 30, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `legumes`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'dry soup mix', 0, 30, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `milk`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'dry milk', 0, 360, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `milk`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'other', 0, 78, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `sugars`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'sugar', 0, 240, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `sugars`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'fruit drink powdered', 0, 36, 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `water`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'water', 0, 84, 'gals')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `water`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'bleach', 0, 6, 'gals')";

echo $query;
mysqli_query($con, $query);