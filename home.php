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

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="home.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>

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
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

            // Set chart options
            var options = {
                //                'title': "<?//php echo $_SESSION['first_name'] . "'s Stroage Chart"; ?>",
                'width': 1000,
                'height': 800,
                'is3D': true,
                'colors': ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6']
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

    <script>
        $(document).ready(function () {
            $("#modalButton").click(function () {
                $("#myModal").modal("toggle");
            });
        });
    </script>

</head>

<body>
    <button class="btn btn-primary btn-lg" id="modalButton">
        Launch demo modal
    </button>
    <!-- Button trigger modal -->
    <a class="btn" data-toggle="modal" href="#myModal">Launch Modal</a>


    <div class="modal hide" id="myModal">
        <!-- note the use of "hide" class -->
        <div class="modal-header">
            <button class="close" data-dismiss="modal">×</button>
            <h3>Modal header</h3>
        </div>
        <div class="modal-body">
            <p>One fine body…</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
            <!-- note the use of "data-dismiss" -->
            <a href="#" class="btn btn-primary">Save changes</a>
        </div>
    </div>​
    <div class="container">

        <!--Div that will hold the pie chart-->
        <!--        <div id="chart_div" class="centeredPie"></div>
-->
        <!-- Button trigger modal -->

    </div>
</body>

</html>
