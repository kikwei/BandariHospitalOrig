<?php
session_start();
if(isset($_SESSION['logInLabTech']))
{
    unset($_SESSION['logInLabTech']);
    header('Location:staffLogIn.php');
}
?>