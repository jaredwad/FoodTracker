<?php session_start(); ?>
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
        // Load the Visualization API and the piechart package.
        google.load('visualization', '1.0', {
            'packages': ['corechart']
        });

         // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

         // Callback that creates and populates a data table,
         // instantiates the pie chart, passes in the data and
         // draws it.
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Name');
            data.addColumn('number', 'Amount');
            data.addRows([
                         ['Wheat', 3],
                         ['Fruit', 1],
                         ['Vegtables', 1],
                         ['Other', 1],
                         ['Pepperoni', 2]
                                        ]);

            // Set chart options
            var options = {
                //                'title': "<?//php echo $_SESSION['first_name'] . "'s Stroage Chart"; ?>",
                'width': 1000,
                'height': 800,
                'is3D': true,
                'colors': ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
                'enableInteractivity': true
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
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
    <div id="chart_div" class="centeredPie"></div>

    <!--
<div id="example" style="text-align:center;" href="#" data-content="This is the content for the popover.">Your Popover Text Here.</div>
-->

    </div>
</body>

</html>
