<?php
session_start();
if(isset($_SESSION['logInReceptionist']))
{
    unset($_SESSION['logInReceptionist']);
    header('Location:staffLogIn.php');
}
?>