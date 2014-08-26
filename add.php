<?php session_start();

    if (!isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) { 
        header( 'Location: index.php');
    } 

    $amount = $_POST['amount'] + $_POST['current'];
    $type   = strtolower($_POST['type']);
    $table  = strtolower($_POST['table']);
    $id     = $_SESSION['user_id'];

    // Establish database connection
    $con = mysqli_connect("localhost", "FTupdate", "update", "FoodTracker");
            
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $query = "UPDATE `FoodTracker`.`" . $table . "` SET `amount`= '" . $amount . "' WHERE `" 
           . $table . "`.`type`= '" . $type . "' AND `user_id`=" . $id;

    mysqli_query($con, $query);

    mysqli_close($con);
?>
<html>

<head>

    <!-- Minified JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

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
