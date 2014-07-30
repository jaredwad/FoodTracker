<?php session_start();

function lcallfirst($string)
{
$string=explode("_",$string);
$i=0;
while($i<count($string))
{$string[$i]=lcfirst($string[$i]);
$i++;}
return implode("_",$string);
}

/*========== Begin main php code =========*/

    if (!function_exists('lcfirst')) {

        function lcfirst($str)
        {
            $str = is_string($str) ? $str : '';
            if(mb_strlen($str) > 0) {
                for ($i=0; $i<=mb_strlen($str); $i++) {
                    $str[$i] = mb_strtolower($str[$i]);
                } 
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


    $query = "SELECT * FROM " . lcallfirst($table) . " WHERE user_id ='" . $_SESSION['user_id'] . "'";

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
        $list = $list . "<b>" . $row['type'] . " <br> Current: " . $row['amount'] . ' ' . $row['measure'] . 
            " <br>Storage Goal: " . $row['amount_needed'] . ' ' . $row['measure'] . " </b> <br> <br>\r\n" .
            "<form action='add.php' method='post'>\r\nChange:&nbsp;\r\n" . 
            "<input type='number' name='amount' required>\r\n<input type='submit' value='Submit'>\r\n" .
            "<input type='hidden' value='" . $row['amount'] . "' name='current'>\r\n" .
            "<input type='hidden' value='" . $row['type'] . "' name='type'>\r\n" .
            "<input type='hidden' value='" . $table . "' name='table'>\r\n</form>\r\n\r\n" ;
            
//            "<form action='sub.php' method='post'>\r\nSubtract:&nbsp;\r\n" . 
//            "<input type='number' min='1' max='" . $row['amount'] . "' name='amount' required>\r\n" . 
//            "<input type='submit'value='SUB'>\r\n" . 
//            "<input type='hidden' value='" . $row['amount'] . "' name='current'>\r\n" .
//            "<input type='hidden' value='" . $row['type'] . "' name='type'>\r\n" .
//            "<input type='hidden' value='" . $table . "' name='table'>\r\n</form>\r\n\r\n" . "<br />";
        
        $color = $row['amount'] / $row['amount_needed'];
        
        if ($color <= .50)
            $color = 'red';
        else if ($color < 1)
            $color = 'yellow';
        else
            $color = 'green';
        
        $data[$row['type']] = $row;
        $typeArray[] = $row['type'];
        $amountArray[] = $row['amount'];
        $colors[] = $color;
    }    

//    $list = $list . "\r\n<br> <br> <a href='home.php'> Back to home </a>"

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
    <meta name="description" content="Food storage, Jared Wadsworth, Osprey, FoodTracker">
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

            if(! <?php echo $totalSize; ?> ) {
               $(document).ready( function() {
                $('#piechart').text('You currently have no data in your chart. \r\n Lets add some!');
                $('#piechart').css("text-align","center");
            });
               
               return;
            }
            
            /*****  Get all the variables needed for this chart *****/
            //Global variable!!! Good thing Brother Helfrich won't be looking at my code
            data = google.visualization.arrayToDataTable([
      ['Food', 'Percentage of total storage (lbs)'],
    <?php

    for ($i = 0; $i < count($typeArray); ++$i) {
        echo "['" . $typeArray[$i] . "'," . $amountArray[$i] . "],\r\n";
    }
    
    ?>
      
    ]);

            //Global variable!!! Good thing Brother Helfrich won't be looking at my code
            chart = new google.visualization.PieChart(
                document.getElementById('piechart'));


            //All of the desired options for the pie chart
            var options = {
                title: "<?php echo $_POST['type']; ?>",
                legend: { position:'labeled', textStyle: {color:'black', fontSize:'10'}},
                sliceVisibilityThreshold: 1/1000,
                pieSliceText: 'none',
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
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Back to Home</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li style="border-left:1px solid #000;">
                        <a href="home.php"> My Profile</a>
                    </li>
                    <li style="border-left:1px solid #000;">
                        <a href="http://ec2-54-187-58-229.us-west-2.compute.amazonaws.com/">About Osprey</a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
<br />
        <!--Div that will hold the pie chart-->
    <div class=container>

        <div class="jumbotron">
            <div id="piechart" class="centeredPie"></div>
            <div class="pieText">
            <br /><br />To add or subtract storage quantities, enter amount desired in specified units and click the coresponding button
                <?php echo "<br /><br />" . $list; ?></div>
        </div>
        

        <div class="footer">
            <p>&copy; OspreySecurity 2014</p>
        </div>
    </div> <!-- container -->

</body>

</html>
