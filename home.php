<?php session_start(); if (!isset($_SESSION[ 'first_name'])) { header( 'Location: index.php'); } ?>


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
            //Global variable!!! Good thing Brother Helfrich won't be looking at my code
            data = google.visualization.arrayToDataTable([
      ['Food', 'Percentage of total storage (lbs)'],
      ['Wheat', 210],
      ['Fruit', 200],
      ['Vegtables', 175],
      ['Other', 15]
    ]);

            //Global variable!!! Good thing Brother Helfrich won't be looking at my code
            chart = new google.visualization.PieChart(
                document.getElementById('piechart'));

            var wheatColor = getWheatColor();
            var fruitColor = getFruitColor();
            var vegtablesColor = getVegtablesColor();
            var otherColor = getOtherColor();
            
            //All of the desired options for the pie chart
            var options = {
                legend: 'none',
                pieSliceText: 'label',
                colors: [wheatColor, fruitColor, vegtablesColor, otherColor],
                pieSliceBorderColor: 'black',
                pieStartAngle: 100,
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
            }
            );

            chart.draw(data, options);
        }

        function HTMLContent(e) {
            var FoodType = data.getFormattedValue(e.row, 0);
            
            return '<div style="padding:5px 5px 5px 5px;"> html content! ' + FoodType + '</div>';
        }
    </script>

    <script>
        
        function getWheatColor() {
            return 'red';   
        }
        
        function getFruitColor() {
            return 'red';   
        }
        
        function getVegtablesColor() {
            return 'red';   
        }
        
        function getOtherColor() {
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
