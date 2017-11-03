<?php
require("Connection.php");
if(isset($_POST['deleteStaff']))
{
    $id=$_POST['staffId'];

    $deleteQuery="DELETE FROM Staff WHERE NationalId='".$_POST['staffId']."'";

    mysqli_query($connection,$deleteQuery);
    header('Location:displayStaff.php');
}
