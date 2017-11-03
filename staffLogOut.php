<?php
session_start();

if(isset($_SESSION['logInUser'])){
    unset($_SESSION['logInUser']);
 header('Location:staffLogIn.php');
//    if(session_destroy())
//        header('Location:staffLogIn.php');

}
?>