<?php
require("Connection.php");
if(isset($_POST['delete']))
{
    $id=$_POST['searchId'];

    $deleteQuery="DELETE FROM PATIENTS WHERE PatientsId='".$_POST['searchId']."'";

    mysqli_query($connection,$deleteQuery);
    header('Location:viewRegisterdPatients.php');
}
