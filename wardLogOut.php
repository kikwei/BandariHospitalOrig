<?php
session_start();
if(isset($_SESSION['logInWard']))
{
    unset($_SESSION['logInWard']);
    header('Location:staffLogIn.php');
}
?>