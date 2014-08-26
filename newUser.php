<html>

<head>
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
        <form class="form-signin" role="form" action="addUser.php" method="post">
            <h2 class="form-signin-heading">Please Enter Your Information</h2>
            <input name="first_name"            class="form-control" placeholder="First Name"        required autofocus >
            <input name="middle_name"           class="form-control" placeholder="Middle Name"                          >
            <input name="last_name"             class="form-control" placeholder="Last Name"                   required >
            <input name="family_size"           class="form-control" placeholder="Number of people in familly" required >
            <input name="email" type="email"    class="form-control" placeholder="Email address"               required >
            <input name="pass"  type="password" class="form-control" placeholder="Password"                    required >
            <button class="btn btn-lg btn-primary btn-block" type="submit">Create User!</button>
        </form>
    </div>
</body>

</html>