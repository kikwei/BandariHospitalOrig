<?php
require("Connection.php");
if(isset($_POST['displayRegisteredPatient']))
{
    $id=$_POST['searchId'];

    $updateQuery="UPDATE PATIENTS SET STATUS='UNATTENDED' WHERE PatientsId='".$_POST['searchId']."'";

    mysqli_query($connection,$updateQuery);
    header('Location:reception_staffhome.php');
}