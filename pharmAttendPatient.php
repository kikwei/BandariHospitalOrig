<?php
require_once ('Connection.php');
session_start();

if(!isset($_SESSION['logInPharmacist']))
    header('Location:staffLogIn.php');
if(isset($_GET['patientsId'])) {
    $sql = "UPDATE `PHARMACIST` SET `Status`='ATTENDED' WHERE PatientsId='" . $_GET['patientsId'] . "'";
    $result = mysqli_query($connection,$sql);

        header('Location:postDrugsIssued.php');

}
?>