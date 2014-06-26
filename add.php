<?php session_start();

    if (!isset($_SESSION[ 'user_id']) && !empty($_SESSION['user_id'])) { 
        header( 'Location: index.php');
    } 

    $amount = $_POST['amount'] + $_POST['current'];
    $type   = strtolower($_POST['type']);
    $table  = strtolower($_POST['table']);

    echo $amount . "\r\n" . $current . "\r\n" . $type . "\r\n" . $table . "<br>\r\n";//. $table;

    // Establish database connection
    $con = mysqli_connect("localhost", "FTselect", "select", "FoodTracker");
            
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $query = "UPDATE `FoodTracker`.`" . $table . "` SET `amount` = '" . $amount . "' WHERE `" . $table . "`.`type` = '" . $type . "'";

    mysqli_query($con, $query);

    mysqli_close($con);
?>
<script type="text/javascript">
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
        </script>