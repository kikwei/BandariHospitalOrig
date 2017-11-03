<?php
session_start();
if(isset($_SESSION['logInConsultant']))
{
    unset($_SESSION['logInConsultant']);
    header('Location:staffLogIn.php');
}
?>