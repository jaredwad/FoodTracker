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
  var dataTable = new google.visualization.DataTable();
  dataTable.addColumn('string', 'Country');
  // Use custom HTML content for the domain tooltip.
  dataTable.addColumn({'type': 'string', 'role': 'tooltip', 'p': {'html': true}});
  dataTable.addColumn('number', 'Gold');
  dataTable.addColumn('number', 'Silver');
  dataTable.addColumn('number', 'Bronze');

  dataTable.addRows([
    ['USA', createCustomHTMLContent('http://upload.wikimedia.org/wikipedia/commons/2/28/Flag_of_the_USA.svg', 46, 29, 29), 46, 29, 29],
    ['China', createCustomHTMLContent('http://upload.wikimedia.org/wikipedia/commons/f/fa/Flag_of_the_People%27s_Republic_of_China.svg', 38, 27, 23), 38, 27, 23],
    ['UK', createCustomHTMLContent('http://upload.wikimedia.org/wikipedia/commons/a/ae/Flag_of_the_United_Kingdom.svg', 29, 17, 19), 29, 17, 19]
  ]);

  var options = {
    title: 'London Olympics Medals',
    colors: ['#FFD700', '#C0C0C0', '#8C7853'],
    // This line makes the entire category's tooltip active.
    focusTarget: 'category',
    // Use an HTML tooltip.
    tooltip: { isHtml: true }
  };

  // Create and draw the visualization.
  new google.visualization.ColumnChart(document.getElementById('piechart')).draw(dataTable, options);
}

function createCustomHTMLContent(flagURL, totalGold, totalSilver, totalBronze) {
  return '<div style="padding:5px 5px 5px 5px;">' +
      '<img src="' + flagURL + '" style="width:75px;height:50px"><br/>' +
      '<table id="medals_layout">' + '<tr>' +
      '<td><img src="http://upload.wikimedia.org/wikipedia/commons/1/15/Gold_medal.svg" style="width:25px;height:25px"/></td>' +
      '<td><b>' + totalGold + '</b></td>' + '</tr>' + '<tr>' +
      '<td><img src="http://upload.wikimedia.org/wikipedia/commons/0/03/Silver_medal.svg" style="width:25px;height:25px"/></td>' +
      '<td><b>' + totalSilver + '</b></td>' + '</tr>' + '<tr>' +
      '<td><img src="http://upload.wikimedia.org/wikipedia/commons/5/52/Bronze_medal.svg" style="width:25px;height:25px"/></td>' +
      '<td><b>' + totalBronze + '</b></td>' + '</tr>' + '</table>' + '</div>';
}
    </script>

</head>

<body>

    <!--Div that will hold the pie chart-->

    <div id="piechart" class="centeredPie"></div>

</body>

</html>