<?php
session_start();
if(isset($_SESSION['logInPharmacist'])){
    unset($_SESSION['logInPharmacist']);
    header('Location:staffLogIn.php');
}
?>