<?php

require ("Connection.php");
session_start();

if(!isset($_SESSION['logInAdministrator']))
    header('Location:AdminLogIn.php');

if(isset($_POST['editStaff']))
{
    $name = $_POST['fullName'];
    $nationalId = $_POST['nationalId'];

    $department = $_POST['department'];
    $mobileNumber = $_POST['telephone'];

    $email = $_POST['email'];
    $username = $_POST['userName'];


    $query = "UPDATE Staff SET FULLNAME='$name',Department='$department',Phone='$mobileNumber',Email='$email',UserName='$username' WHERE NationalId='$nationalId'";

    mysqli_query($connection, $query);


    if(mysqli_affected_rows($connection)>0)
    {
        echo "UPDATED SUCCESSFULLY";
header('Location:admin_homepage.php');
    }

}
