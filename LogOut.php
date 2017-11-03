<?php
session_start();
if(isset($_SESSION['logInAdministrator'])){
    unset($_SESSION['logInAdministrator']);
    header('Location:AdminLogIn.php');
}
?>