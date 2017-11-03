<?php

require('Connection.php');
session_start();

if(!isset($_SESSION['logInAdministrator']))
    header('Location:AdminLogIn.php');

if(isset($_POST['TrackDrug']))
{


    $startDate=$_POST['startDate'];
    $endDate=$_POST['endDate'];

    $query="SELECT DISTINCT drug from track_drugs WHERE Date_issued>='" . $_POST['startDate'] . "' AND Date_issued<='" . $_POST['endDate'] . "'";


    $result=mysqli_query($connection,$query);

    echo"<div class='container'>";
    echo"<table border='1' class='table table-hover text-center'>";
    echo "<caption align='center' style='color:#2E4372'><h3 class='text-center'><u>Drug Movement</u></h3></caption>";
    echo"<th class='text-center'>Drug</th><th class='text-center'>Amount Issued</th>";


    while($queryResult=mysqli_fetch_array($result))
    {
        echo "<tr><td>$queryResult[0]</td>";

        $count="SELECT SUM(Quantity) FROM track_drugs  WHERE Date_issued>='$startDate' AND Date_issued<='$endDate' AND DRUG='$queryResult[0]'";
        $countResult=mysqli_query($connection,$count);


        while ($numberIssued=mysqli_fetch_array($countResult)){
            echo "<td>$numberIssued[0]</td></tr>";
        }


//      $drugIssuedTimes=count($numberIssued);
//
//      echo $drugIssuedTimes;
//
//      $arrayNum=$drugIssuedTimes-1;
//
//echo "<br/>";
//        $amountOfDrugsIssued=0;
//        for($i=$arrayNum;$i>=0;$i--){
//            $amountOfDrugsIssued+=$numberIssued[$i];
//
//
//            if($i!=0){
//
//            }else{
//                echo "<td>$amountOfDrugsIssued</td></tr>";
//            }
//        }

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
