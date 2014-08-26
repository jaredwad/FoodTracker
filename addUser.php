<?php session_start();

$first    = $_POST['first_name'];
$middle   = ($_POST['middle_name'] != '' ? "'" . $_POST['middle_name'] . "'" : 'NULL');
$last     = $_POST['last_name'];
$email    = $_POST['email'];
$password = $_POST['pass'];


// Establish database connection
$con = mysqli_connect("localhost", "FTselect", "select", "FoodTracker");
            
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT `email` FROM `user` WHERE `email`='" . $email . "'";

$set = mysqli_query($con, $query);

$row = mysqli_fetch_array($set);

if ($row !== NULL) {
    return false;
}
mysqli_close($con);

$con = mysqli_connect("localhost", "FTinsert", "insert", "FoodTracker");

$query = "INSERT INTO `user`(`first_name`, `middle_name`, `last_name`, `email`, `pass`, `last_login`) values('" 
       . $first . "', " . $middle . ", '" . $last . "', '" . $email . "', '" . $password . "', NOW())";

mysqli_query($con, $query);

mysqli_close($con);

//Later will add an if here so they can decide to start with a base or not
include 'createBaseStorage.php';

$con = mysqli_connect("localhost", "FTselect", "select", "FoodTracker");

$query = "SELECT `user_id` FROM `user` WHERE `email` = '" . $_POST['email'] . "'";

$set = mysqli_query($con, $query);

$row = mysqli_fetch_array($set);
$userID  = $row['user_id'];

mysqli_close($con);

$_SESSION['user_id'] = $userID;
$_SESSION['email']   = $email;
$_SESSION['pass']    = $password;

include 'home.php';