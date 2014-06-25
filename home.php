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

            alert("made it to drawChart");

            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn('string', 'FoodType');
            // Use custom HTML content for the domain tooltip.
            dataTable.addColumn({
                'type': 'string',
                'role': 'tooltip',
                'p': {
                    'html': true
                }
            });
            dataTable.addColumn('number', 'Size');




            // FoodType : HTML content(FoodType) : Size
            dataTable.addRows([
    ['Wheat', HTMLContent('Wheat'), 29],
    ['Fruit', HTMLContent('Fruit'), 23],
    ['Vegtables', HTMLContent('Vegtables'), 19],
    ['Other', HTMLContent('Other'), 19]
  ]);

            /*var data = google.visualization.arrayToDataTable([
          ['Food Type', 'Percent of total storage'],
          ['Wheat', 11],
          ['Fruit', 2],
          ['Vegtables', 2],
          ['Other', 2]
        ]);*/

            var options = {
                //                title: 'My Daily Activities',
                legend: 'none',
                pieSliceText: 'label',
                //is3D: true,
                colors: ['red', 'red', 'red', 'red'],
                pieSliceBorderColor: 'black',
                // Use an HTML tooltip.
                tooltip: {
                    isHtml: true
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

            // The select handler. Call the chart's getSelection() method
            function selectHandler() {
                var selectedItem = chart.getSelection()[0];
                if (selectedItem) {
                    var topping = dataTable.getValue(selectedItem.row, 0);
                    alert('The user selected ' + topping);
                }
            }

            // Listen for the 'select' event, and call my function selectHandler() when
            // the user selects something on the chart.
            google.visualization.events.addListener(chart, 'select', selectHandler);

            chart.draw(dataTable, options);
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

    <div id="piechart_3d" class="centeredPie"></div>

</body>

</html>
