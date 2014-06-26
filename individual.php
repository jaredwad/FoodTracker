<?php session_start();

    if (!function_exists('lcfirst')) {

        function lcfirst($str)
        {
            $str = is_string($str) ? $str : '';
            if(mb_strlen($str) > 0) {
                $str[0] = mb_strtolower($str[0]);
            }
            return $str;
        }
    }

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

    $table = str_replace(" ","_",$name);


    $query = "SELECT * FROM " . lcfirst($table) . " WHERE user_id ='" . $_SESSION['user_id'] . "'";

//   echo $query;
                
    $set = mysqli_query($con, $query);
    $totalSize = 0;
    $neededSize = 0;
    $list = '';

    // Checks if the query is returning a result
    if (!$set) { echo "error in query " . $query; }

    $data = array();
    $typeArray = array();
    $amountArray = array();
    $colors = array();
    while($row = mysqli_fetch_array($set)) {
        $totalSize  += $row['amount'];
        $neededSize += $row['amount_needed'];
        $list = $list . $row['type'] . " <br> " . $row['amount'] . $row['measure'] . 
            " / " . $row['amount_needed'] . $row['measure'] . " <br> <br>\r\n" .
            "<form action='add.php' method='post'>\r\nAdd:&nbsp;\r\n" . 
            "<input type='number' min='1' name='amount' required>\r\n<input type='submit'>\r\n" .
            "<input type='hidden' value='" . $row['amount'] . "' name='current'>\r\n" .
            "<input type='hidden' value='" . $row['type'] . "' name='type'>\r\n" .
            "<input type='hidden' value='" . $table . "' name='table'>\r\n</form>\r\n\r\n" .
            
            "<form action='sub.php' method='post'>\r\nSub:&nbsp;\r\n" . 
            "<input type='number' min='1' max='" . $row['amount'] . "' name='amount' required>\r\n" . 
            "<input type='submit'>\r\n" . 
            "<input type='hidden' value='" . $row['amount'] . "' name='current'>\r\n" .
            "<input type='hidden' value='" . $row['type'] . "' name='type'>\r\n" .
            "<input type='hidden' value='" . $table . "' name='table'>\r\n</form>\r\n\r\n";
        
        $color = $row['amount'] / $row['amount_needed'];
        
        if ($color <= .75)
            $color = 'red';
        else if ($color < 1)
            $color = 'yellow';
        else
            $color = 'green';
        
        $data[] = $row;
        $typeArray[] = $row['type'];
        $amountArray[] = $row['amount'];
        $colors[] = $color;
    }

//    $list = $list . "<form name='" . $row['type'] . "' action='new.php' method='post'>New Type:&nbsp;" . 
//            "<input type='number' min='1' max='" . $row['amount'] . "' name='sub'><input type='submit'></form>";

//    $data = array($name => $customer);
//    echo json_encode($data);
//    echo json_encode($array);

//    echo $list;
    
//    while ($row = mysql_fetch_assoc($set)) {
//        echo $row['user_id'];
//        $customer[] = $row;
//    }
//
//    $struct = array("Customer" => $customer);
//    print json_encode($struct);

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
    <link rel="stylesheet" href="individual.css">

    <!-- Minified JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {
            packages: ["corechart"]
        });
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            /*****  Get all the variables needed for this chart *****/
            //Global variable!!! Good thing Brother Helfrich won't be looking at my code
            data = google.visualization.arrayToDataTable([
      ['Food', 'Percentage of total storage (lbs)'],
    <?php  
//        while (

    for ($i = 0; $i < count($typeArray); ++$i) {
        echo "['" . $typeArray[$i] . "'," . $amountArray[$i] . "],\r\n";
//        print $array[$i];
    }
    
    ?>
      
    ]);

            //Global variable!!! Good thing Brother Helfrich won't be looking at my code
            chart = new google.visualization.PieChart(
                document.getElementById('piechart'));


            //All of the desired options for the pie chart
            var options = {
                legend: 'none',
                pieSliceText: 'label',
                pieSliceTextStyle: {color: 'black', fontName: 'Arial', fontSize: 'automatic' },
                <?php 
                    
                    $string = "colors: [";
                    foreach ($colors as &$color) {
                        $string = $string . "'" . $color . "',";
                    }
                    
                    echo rtrim($string, ",") . "],\r\n";
                ?>
                pieSliceBorderColor: 'black',
                'tooltip' : { trigger: 'none'},
                pieStartAngle: 30,
            };

            

            chart.draw(data, options);
        }

        
    </script>
    
</head>

<body>

    <!--Div that will hold the pie chart-->
    <div id="piechart" class="centeredPie"></div>
    <div class="right" style="background-color: 'black';"><?php echo $list; ?></div>

</body>

</html>
