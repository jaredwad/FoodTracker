<?php
        //Start the session
        session_start();
        
        // checks if the the user came here through a post (most likely itself)
        if (!empty($_POST["email"]) && !empty($_POST["pass"])) {
            // create connection
            $con = mysqli_connect("localhost", "FTselect", "select", "FoodTracker");
            
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            
            else { 
                
                $query = "SELECT * FROM user WHERE email ='" . $_POST['email'] . "'";
                
                $result = mysqli_query($con, $query);
                
                // Checks if the query is returning a result
                if (!$result) { echo "error in query"; }

                //  Loops through data set and checks for the user               
                while($row = mysqli_fetch_array($result)) {
                    //redirect them to the home page if they are a registered user   
                    if ($row['email'] == $_POST['email'] && $row['pass'] == $_POST['pass']) {
                        
                        $_SESSION['user_id']     = $row['user_id'];
                        $_SESSION['first_name']  = $row['first_name'];
                        $_SESSION['middle_name'] = $row['middle_name'];
                        $_SESSION['last_name']   = $row['last_name'];
                        $_SESSION['email']       = $row['email'];
                        $_SESSION['last_login']  = $row['last_login'];
                        header('Location: home.php');
                    }
                }
            }
        }
        
        mysqli_close($mysqli);
        
    ?>

<html>

<head>
    
    <!-- Technologies used so far in this project:
    PHP
    HTML5
    CSS
    Bootstrap
    Google jsAPI
    JavaScript
    JQuery
    MySQL
    Bash scripting
    PHPMyAdmin
    MAMP
    Amazon AWS server
    Adobe Brackets
    GitHub
    -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Jared Wadsworth homepage">
    <meta name="author" content="Jared Wadsworth">
    <link rel="shortcut icon" href="images/wheat-icon.ico">

    <title>FoodTracker login</title>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- Minified JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container">

        <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <h2 class="form-signin-heading">Please Sign In</h2>
            <input name="email" type="email" class="form-control" placeholder="Email address" required autofocus>
            <input name="pass" type="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

</body>

</html>