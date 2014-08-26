
<html><body>

<?php
$email = $_POST["email"];
$pass  = $_POST["pass"];

echo $email;
echo " : " + $pass;

$con = mysql_connect("localhost","FTselect","select");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }



mysql_close($con);
?>
</body></html>