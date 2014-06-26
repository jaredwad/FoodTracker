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

    $data = array();
    $array = array();
    $colors = array();
    while($row = mysqli_fetch_array($set)) {
        $totalSize  += $row['amount'];
        $neededSize += $row['amount_needed'];
        $list = $list . $row['type'] . " <br> " . $row['amount'] . $row['measure'] . 
            " / " . $row['amount_needed'] . $row['measure'] . " <br> <br>";
        
        $color = $row['amount'] / $row['amount_needed'];
        
        if ($color <= .75)
            $color = 'red';
        else if ($color < 1)
            $color = 'yellow';
        else
            $color = 'green';
        
        $data[] = $row;
        $array[] = array( ucwords($row['type']), $row['amount']);
        $colors[] = $color;
    }

//    $data = array($name => $customer);
    echo json_encode($data);
    echo json_encode($array);

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
    <link rel="stylesheet" href="home.css">

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

            /*** Size ***/
            var grainsSize  = <?php echo $grainsTotalSize;  ?>;
            var fatsSize    = <?php echo $fatsTotalSize;    ?>;
            var legumesSize = <?php echo $legumesTotalSize; ?>;
            var sugarsSize  = <?php echo $sugarsTotalSize;  ?>;
            var milkSize    = <?php echo $milkTotalSize;    ?>;
            var cookingSize = <?php echo $cookingTotalSize; ?>;
            var waterSize   = <?php echo $waterTotalSize;   ?>;
            
            /*** Colors ***/
            var grainsColor  = getColor(<?php echo ($grainsTotalSize  / $grainsNeededSize ); ?>);
            var fatsColor    = getColor(<?php echo ($fatsTotalSize    / $fatsNeededSize   ); ?>);
            var legumesColor = getColor(<?php echo ($legumesTotalSize / $legumesNeededSize); ?>);
            var sugarsColor  = getColor(<?php echo ($sugarsTotalSize  / $sugarsNeededSize ); ?>);
            var milkColor    = getColor(<?php echo ($milkTotalSize    / $milkNeededSize   ); ?>);
            var cookingColor = getColor(<?php echo ($cookingTotalSize / $cookingNeededSize); ?>);
            var waterColor   = getColor(<?php echo ($waterTotalSize   / $waterNeededSize  ); ?>);
            
            /*** HTML Content ***/
            grainsContent  = "<?php echo $grainsList;  ?>";
            fatsContent    = "<?php echo $fatsList;    ?>";
            legumesContent = "<?php echo $legumesList; ?>";
            sugarsContent  = "<?php echo $sugarsList;  ?>";
            milkContent    = "<?php echo $milkList;    ?>";
            cookingContent = "<?php echo $cookingList; ?>";
            waterContent   = "<?php echo $waterList;   ?>";

            //Global variable!!! Good thing Brother Helfrich won't be looking at my code
            data = google.visualization.arrayToDataTable([
      ['Food', 'Percentage of total storage (lbs)'],
    <?php  
//        while (

    foreach ($array as list($a, $b)) {
        echo "['" . $a . "'," . $b . "],\r\n";
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
                        $string = $string . $color . ',';
                    }
                    
                    echo rtrim($string, ",") . "],\r\n";
                ?>
                pieSliceBorderColor: 'black',
                pieStartAngle: 30,
                tooltip: {
                    isHtml: true
                }
            };

            //This allows the creation of custom HTML tooltips which are created in
            //the function HTMLContent(FoodType)
            google.visualization.events.addListener(chart, 'onmouseover', function (e) {
                //check row with e.row;                                
                $(".google-visualization-tooltip").html(HTMLContent(e));
            });

            //This prevents the pie chart from reverting to default tooltip content
            //when clicked
            google.visualization.events.addListener(chart, 'select', function (e) {
                //check row with e.row;
                e = chart.getSelection();
                $(".google-visualization-tooltip").html(HTMLContent(e[0]));
                
                var url = getURL(e[0]);
                var form = $('<form action="' + url + '" method="post">' +
                             '<input type="text" name="type" value="' + data.getFormattedValue(e[0].row, 0) + '" />' +
                             '</form>');
                $('body').append(form);  // This line is not necessary
                $(form).submit();
                
//                console.log(url);
//                window.location = getURL(e[0]);
            });

            chart.draw(data, options);
        }
        
        function getURL(e) {
            var FoodType = data.getFormattedValue(e.row, 0);
            
            var url = document.URL.substr(0, document.URL.lastIndexOf("/") + 1);
            
//            return url + FoodType.toLowerCase().replace(/\s+/g, '') + ".php";
            
            return document.URL.substr(0, document.URL.lastIndexOf("/") + 1) + "individual.php"
        }
        
        function getColor(percent) {
            if (percent <= .75)
                return 'red';
            else if (percent < 1)
                return 'yellow';
            else
                return 'green';
        }

        function HTMLContent(e) {
            var FoodType = data.getFormattedValue(e.row, 0);
            var content  = getContent(FoodType);
            var num      = (content.split("<br>").length - 1) * 10;

//            $(".google-visualization-tooltip").style("height: 800px");
            return '<div class="test">' + content + '</div>';
        }
        
        function getContent(FoodType) {
            switch(FoodType) {
                case 'Grains':
                    return grainsContent;
                
                case 'Fats and Oils':
                    return fatsContent;
                
                case 'Legumes':
                    return legumesContent;
                
                case 'Sugars':
                    return sugarsContent;
                
                case 'Milk':
                    return milkContent;
                
                case 'Cooking Essentials':
                    return cookingContent;
                
                case 'Water':
                    return waterContent;
            }
            
            return "We're sorry, but there appears to be an error in our data <br>";
        }
    </script>
    
</head>

<body>

    <div><?php echo $list; ?></div>
    <!--Div that will hold the pie chart-->
    <div id="piechart" class="centeredPie">got here</div>

</body>

</html>
