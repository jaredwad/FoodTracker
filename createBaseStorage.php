<?php

$familySize = $_POST['family'];

echo "<br />family size: " . $familySize . "<br />";

var_dump($_POST);

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
       . $userID . ", 'baking powder', 0, " . 1 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `cooking_essentials`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'baking soda', 0, " . 1 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `cooking_essentials`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'yeast', 0, " . 1 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `cooking_essentials`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'salt', 0, " . 5 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `cooking_essentials`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'vinegar', 0, " . 1 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `fats_and_oils`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'shortening', 0, " . 24 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `fats_and_oils`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'vegtable oil', 0, " . 2 * $familySize . ", 'gals')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `fats_and_oils`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'mayonnaise ', 0, " . 2 * $familySize . ", 'qts')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `fats_and_oils`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'salad dressing ', 0, " . 1 * $familySize . ", 'qts')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `fats_and_oils`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'peanut butter', 0, " . 4 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `grains`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'wheat', 0, " . 150 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `grains`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'flour', 0, " . 25 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `grains`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'corn meal', 0, " . 25 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `grains`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'oats', 0, " . 25 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `grains`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'rice', 0, " . 50 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `grains`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'pasta', 0, " . 25 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `legumes`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'dry beans', 0, " . 30 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `legumes`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'lima beans', 0, " . 5 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `legumes`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'soy beans', 0, " . 10 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `legumes`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'split peas', 0, " . 5 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `legumes`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'lentils', 0, " . 5 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `legumes`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'dry soup mix', 0, " . 5 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `milk`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'dry milk', 0, " . 60 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `milk`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'evaporated  milk', 0, " . 12 * $familySize . ", 'cans')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `milk`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'other', 0, " . 13 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `sugars`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'honey', 0, " . 3 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `sugars`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'sugar', 0, " . 40 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `sugars`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'brown sugar', 0, " . 3 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `sugars`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'molasses ', 0, " . 1 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `sugars`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'corn syrup', 0, " . 3 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `sugars`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'jam', 0, " . 3 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `sugars`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'fruit drink powdered', 0, " . 6 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `sugars`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'flavored gelatin', 0, " . 1 * $familySize . ", 'lbs')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `water`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'water', 0, " . 14 * $familySize . ", 'gals')";

echo $query;
mysqli_query($con, $query);

$query = "INSERT INTO `water`(`user_id`, `type`, `amount`, `amount_needed`, `measure`) values(" 
       . $userID . ", 'bleach', 0, " . 1 * $familySize . ", 'gals')";

echo $query;
mysqli_query($con, $query);