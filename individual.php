<?php session_start();
    if (!isset($_SESSION[ 'user_id']) && !empty($_SESSION['user_id'])) { 
        header( 'Location: index.php');
    } 

    // Establish database connection
    $con = mysqli_connect("localhost", "FTselect", "select", "FoodTracker");
            
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $name = $_POST['type'];

    $table = strtolower(str_replace(" ","_",$name));


    $query = "SELECT * FROM " . $table . " WHERE user_id ='" . $_SESSION['user_id'] . "'";

//    echo $query;
                
    $set = mysqli_query($con, $query);
    $totalSize = 0;
    $neededSize = 0;
    $list = '';

    // Checks if the query is returning a result
    if (!$set) { echo "error in cooking_essentials query"; }

    while($row = mysqli_fetch_array($set)) {
        $totalSize  += $row['amount'];
        $neededSize += $row['amount_needed'];
        $list = $list . $row['type'] . " <br> " . $row['amount'] . $row['measure'] . 
            " / " . $row['amount_needed'] . $row['measure'] . " <br> <br>";
    }

?>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jared Wadsworth">
    <link rel="shortcut icon" href="images/wheat-icon.ico">
    <title>FoodTracker <?php echo $_POST['type']; ?></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="home.css">

    <!-- Minified JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
</head>

<body>

    <div><?php echo $list; ?></div>
    <!--Div that will hold the pie chart-->
    <div id="piechart" class="centeredPie">got here</div>

</body>

</html>
