<?php

require('Connection.php');
session_start();

if(!isset($_SESSION['logInAdministrator']))
    header('Location:AdminLogIn.php');

if(isset($_POST['TrackDisease']))
{


    $startDate=$_POST['startDate'];
    $endDate=$_POST['endDate'];

    $query="SELECT DISTINCT disease from diseases_occured WHERE Date_treated>='" . $_POST['startDate'] . "' AND Date_treated<='" . $_POST['endDate'] . "'";


   $result=mysqli_query($connection,$query);
    echo"<div class='container'>";
    echo"<table border='1' class='table table-hover text-center'>";
    echo "<caption align='center' style='color:#2E4372'><h3 class='text-center'><u>Diseases Trend</u></h3></caption>";
    echo"<th class='text-center'>Disease</th><th class='text-center'>Treated People</th>";

    while($queryResult=mysqli_fetch_array($result))
    {
        echo "<tr><td>$queryResult[0]</td>";

        $count="SELECT COUNT(DISEASE) FROM diseases_occured  WHERE Date_treated>='" . $_POST['startDate'] . "' AND Date_treated<='" . $_POST['endDate'] . "' AND DISEASE='$queryResult[0]'";
        $countResult=mysqli_query($connection,$count);

        while($numberOfPeople=mysqli_fetch_array($countResult))
        {
            echo"<td>$numberOfPeople[0]</td></tr>";
        }

        //echo"<tr><td>$disease</td><td>$queryResult[1]</td></tr>";
    }
    echo"</table>";
}
echo "</div>";


?>

<!Doctype html>
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
</html>
