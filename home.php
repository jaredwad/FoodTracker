<?php session_start();
    if (!isset($_SESSION[ 'user_id'])) { 
        header( 'Location: index.php');
    } 


    // Establish database connection
    $con = mysqli_connect("localhost", "FTselect", "select", "FoodTracker");
            
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

//
// ====================== cooking_essentials Query ======================
//

    $query = "SELECT * FROM cooking_essentials WHERE user_id ='" . $_SESSION['user_id'] . "'";
                
    $cookingSet = mysqli_query($con, $query);
    $cookingTotalSize = 0;
    $cookingNeededSize = 0;
    $cookingList = '';

    // Checks if the query is returning a result
    if (!$cookingSet) { echo "error in cooking_essentials query"; }

    while($row = mysqli_fetch_array($cookingSet)) {
        $cookingTotalSize  += $row['amount'];
        $cookingNeededSize += $row['amount_needed'];
        $cookingList = $cookingList . $row['type'] . " <br> " . $row['amount'] . $row['measure'] . 
            " / " . $row['amount_needed'] . $row['measure'] . " <br> <br>";
    }

    $cookingList = "<div style='border-bottom:1px solid #000;'><b>Cooking Essentials</b></div><br>" . $cookingList;

//
// ====================== fats_and_oils Query ======================
//

    $query = "SELECT * FROM fats_and_oils WHERE user_id ='" . $_SESSION['user_id'] . "'";
                
    $fatsSet = mysqli_query($con, $query);
    $fatsTotalSize;
    $fatsNeededSize;
    $fatsList = '';

    // Checks if the query is returning a result
    if (!$fatsSet) { echo "error in fats_and_oils query"; }

    while($row = mysqli_fetch_array($fatsSet)) {
        $fatsTotalSize  += $row['amount'];
        $fatsNeededSize += $row['amount_needed'];
        $fatsList = $fatsList . $row['type'] . " <br> " . $row['amount'] . $row['measure'] . 
            " / " . $row['amount_needed'] . $row['measure'] . " <br> <br> ";
    }

    $fatsList = "<div style='border-bottom:1px solid #000;'><b>Fats and Oils</b></div><br>" . $fatsList;

//
// ====================== grains Query ======================
//

    $query = "SELECT * FROM grains WHERE user_id ='" . $_SESSION['user_id'] . "'";
                
    $grainsSet = mysqli_query($con, $query);
    $grainsTotalSize;
    $grainsNeededSize;
    $grainsList = '';

    // Checks if the query is returning a result
    if (!$grainsSet) { echo "error in grains query"; }

    while($row = mysqli_fetch_array($grainsSet)) {
        $grainsTotalSize  += $row['amount'];
        $grainsNeededSize += $row['amount_needed'];
        $grainsList = $grainsList . $row['type'] . " <br> " . $row['amount'] . $row['measure'] . 
            " / " . $row['amount_needed'] . $row['measure'] . " <br> <br>";
    }

    $grainsList = "<div style='border-bottom:1px solid #000;'><b>Grains</b></div><br>" . $grainsList;

//
// ====================== legumes Query ======================
//

    $query = "SELECT * FROM legumes WHERE user_id ='" . $_SESSION['user_id'] . "'";
                
    $legumesSet = mysqli_query($con, $query);
    $legumesTotalSize;
    $legumesNeededSize;
    $legumesList = '';

    // Checks if the query is returning a result
    if (!$legumesSet) { echo "error in legumes query"; }

    while($row = mysqli_fetch_array($legumesSet)) {
        $legumesTotalSize  += $row['amount'];
        $legumesNeededSize += $row['amount_needed'];
        $legumesList = $legumesList . $row['type'] . " <br> " . $row['amount'] . $row['measure'] . 
            " / " . $row['amount_needed'] . $row['measure'] . " <br> <br>";
    }

    $legumesList = "<div style='border-bottom:1px solid #000;'><b>Legumes</b></div><br>" . $legumesList;

//
// ====================== milk Query ======================
//

    $query = "SELECT * FROM milk WHERE user_id ='" . $_SESSION['user_id'] . "'";
                
    $milkSet = mysqli_query($con, $query);
    $milkTotalSize;
    $milkNeededSize;
    $milkList = '';

    // Checks if the query is returning a result
    if (!$milkSet) { echo "error in milk query"; }

    while($row = mysqli_fetch_array($milkSet)) {
        $milkTotalSize  += $row['amount'];
        $milkNeededSize += $row['amount_needed'];
        $milkList = $milkList . $row['type'] . " <br> " . $row['amount'] . $row['measure'] . 
            " / " . $row['amount_needed'] . $row['measure'] . " <br> <br>";
    }

    $milkList = "<div style='border-bottom:1px solid #000;'><b>Milk</b></div><br>" . $milkList;

//
// ====================== sugars Query ======================
//

    $query = "SELECT * FROM sugars WHERE user_id ='" . $_SESSION['user_id'] . "'";
                
    $sugarsSet = mysqli_query($con, $query);
    $sugarsTotalSize;
    $sugarsNeededSize;
    $sugarsList = '';

    // Checks if the query is returning a result
    if (!$sugarsSet) { echo "error in sugars query"; }

    while($row = mysqli_fetch_array($sugarsSet)) {
        $sugarsTotalSize  += $row['amount'];
        $sugarsNeededSize += $row['amount_needed'];
        $sugarsList = $sugarsList . $row['type'] . " <br> " . $row['amount'] . $row['measure'] . 
            " / " . $row['amount_needed'] . $row['measure'] . " <br> <br>";
    }

    $sugarsList = "<div style='border-bottom:1px solid #000;'><b>Sugar</b></div><br>" . $sugarsList;

//
// ====================== water Query ======================
//

    $query = "SELECT * FROM water WHERE user_id ='" . $_SESSION['user_id'] . "'";
                
    $waterSet = mysqli_query($con, $query);
    $waterTotalSize;
    $waterNeededSize;
    $waterList = '';
    

    // Checks if the query is returning a result
    if (!$waterSet) { echo "error in water query"; }

    while($row = mysqli_fetch_array($waterSet)) {
        $waterTotalSize  += $row['amount'];
        $waterNeededSize += $row['amount_needed'];
        $waterList = $waterList . $row['type'] . " <br> " . $row['amount'] . $row['measure'] . 
            " / " . $row['amount_needed'] . $row['measure'] . " <br> <br>";
    }

    $waterList = "<div style='border-bottom:1px solid #000;'><b>Water</b></div><br>" . $waterList;
?>


<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jared Wadsworth">
    <link rel="shortcut icon" href="images/wheat-icon.ico">
    <title>FoodTracker Home</title>

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
                title: "<?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>'s Food Storage Chart",
                legend: 'none',
                pieSliceText: 'label',
                pieSliceTextStyle: {color: 'black', fontName: 'Arial', fontSize: 'automatic' },
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
            if (percent <= .50)
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
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">FoodTracker</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li style="border-left:1px solid #000;">
                        <a href="home.php">My Profile</a>
                    </li >
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
            <br /><br />Welcome To FoodTracker!
            <br /><br />To see the status of any category of your food storage hover the cursor over the corresponding pie slice.
            <br /><br />To edit the contents of the category click on the corresponding pie slice. The amounts displayed are in terms of current storage versus your storage goal.
            <br /><br />The colors of the slices corespond to the completeness of each category,
            <span class="red">red   </span> 50% or less,
            <span class="yellow">yellow</span> between 50% and 100%,
            <span class="green">green </span> 100% or more.
        </div>
        </div>
        

        <div class="footer">
            <p>&copy; OspreySecurity 2014</p>
        </div>
    </div> <!-- container -->
</body>

</html>
