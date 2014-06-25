<?php session_start();
    if (!isset($_SESSION[ 'user_id']) && !empty($_SESSION['user_id'])) { 
        header( 'Location: index.php');
    } 

    $query = "SELECT * FROM user WHERE email ='" . $_SESSION['user_id'] . "'";
                
    $result = mysqli_query($con, $query);
?>


<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jared Wadsworth">
    <link rel="shortcut icon" href="images/wheat-icon.ico">
    <title>FoodTracker login</title>

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

            /*** Size (lbs) ***/
            var grainsSize  = 210;
            var fatsSize    = 210;
            var legumesSize = 210;
            var sugarsSize  = 210;
            var milkSize    = 210;
            var cookingSize = 210;
            var waterSize   = 210;

            
            /*** Colors ***/
            var grainsColor  = 'red';
            var fatsColor    = 'red';
            var legumesColor = 'red';
            var sugarsColor  = 'red';
            var milkColor    = 'red';
            var cookingColor = 'red';
            var waterColor   = 'red';

            //Global variable!!! Good thing Brother Helfrich won't be looking at my code
            data = google.visualization.arrayToDataTable([
      ['Food', 'Percentage of total storage (lbs)'],
      ['Grains', grainsSize],
      ['Fats and Oils', fatsSize],
      ['Legumes', legumesSize],
      ['Sugars', sugarsSize],
      ['Milk', milkSize],
      ['Cooking Essentials', cookingSize],
      ['Water', waterSize]
    ]);

            //Global variable!!! Good thing Brother Helfrich won't be looking at my code
            chart = new google.visualization.PieChart(
                document.getElementById('piechart'));


            //All of the desired options for the pie chart
            var options = {
                legend: 'none',
                pieSliceText: 'label',
                colors: [grainsColor, fatsColor, legumesColor, sugarsColor, milkColor, cookingColor, waterColor],
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
            });

            chart.draw(data, options);
        }

        function HTMLContent(e) {
            var FoodType = data.getFormattedValue(e.row, 0);

            return '<div style="padding:5px 5px 5px 5px;"> html content! ' + FoodType + '</div>';
        }
    </script>

    <script>
        function getGrainsColor(grainsSize) {
            return 'red';
        }

        function getFatsColor(fatsSize) {
            return 'red';
        }

        function getLegumesColor(legumesSize) {
            return 'red';
        }

        function getSugarsColor(sugarsSize) {
            return 'red';
        }

        $(document).ready(function () {
            $('#example').popover({
                trigger: "hover",
                placement: "bottom",
                title: "This is a default title",
            });
        });
    </script>

</head>

<body>

    <!--Div that will hold the pie chart-->

    <div id="piechart" class="centeredPie"></div>

</body>

</html>
