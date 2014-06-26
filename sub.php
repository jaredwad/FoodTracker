<?php session_start();

    if (!isset($_SESSION[ 'user_id']) && !empty($_SESSION['user_id'])) { 
        header( 'Location: index.php');
    } 

    $amount = $_POST['current'] - $_POST['amount'];
    $type   = strtolower($_POST['type']);
    $table  = strtolower($_POST['table']);

    // Establish database connection
    $con = mysqli_connect("localhost", "FTupdate", "update", "FoodTracker");
            
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $query = "UPDATE `FoodTracker`.`" . $table . "` SET `amount` = '" . $amount . "' WHERE `" . $table . "`.`type` = '" . $type . "'";

    mysqli_query($con, $query);

    mysqli_close($con);
?>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jared Wadsworth">
    <link rel="shortcut icon" href="images/wheat-icon.ico">
    <title>FoodTracker
        <?php echo $_POST[ 'type']; ?>
    </title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="individual.css">

    <!-- Minified JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
                var url = document.URL.substr(0, document.URL.lastIndexOf("/") + 1) + "individual.php";
                var form = $('<form action="' + url + '" method="post">' +
                    '<input type="text" name="type" value="<?php echo $table; ?>" />' +
                    '</form>');
                console.log("made it here");
                $('body').append(form); // This line is not necessary
                $(form).submit();
            });
    </script>

</head>

<body>
</body>

</html>
