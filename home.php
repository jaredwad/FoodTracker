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
            var data = google.visualization.arrayToDataTable([
      ['Food', 'Percentage of total storage (lbs)'],
      ['Wheat', 217],
      ['Fruit', 203],
      ['Vegtables', 175],
      ['Other', 155]
    ]);

            var chart = new google.visualization.PieChart(
                document.getElementById('piechart'));

            var options = {
                legend: 'none',
                pieSliceText: 'label',
                //is3D: true,
                colors: ['red', 'red', 'red', 'red'],
                pieSliceBorderColor: 'black',
                tooltip: {
                    isHtml: true
                }
            };

            google.visualization.events.addListener(chart, 'onmouseover', function (e) {
                //check row with e.row;                                
                $(".google-visualization-tooltip").html("your html here");
            });

            chart.draw(data, options);
        }

        function HTMLContent(FoodType) {
            return '<div style="padding:5px 5px 5px 5px;">' + FoodType + '</div>';
        }
    </script>

    <script>
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
