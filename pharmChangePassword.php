<?php
require('Connection.php');
session_start();
if(!isset($_SESSION['logInPharmacist']))
    header('Location:AdminLogIn.php');
if(isset($_SESSION['logInPharmacist']) && isset($_POST['changePassword'])) {
    $username = $_SESSION['logInPharmacist'];
    $oldPassword = $_POST['oldPassword'];
    $hashOld = hash('sha256', $oldPassword);
    $newPassword = $_POST['newPassword'];
    $hashNew = hash('sha256', $newPassword);
    $confirmPassword = $_POST['confirmPassword'];
    $hashConfirm = hash('sha256', $confirmPassword);
//    $name='Lagat';
//    $name1='Lagat';
//    if($name==$name1)
//        echo"Success";
//    else
//        echo "Fail";
    //Session initialization
    $username = $_SESSION['logInPharmacist'];
    $oldPasswordQuery = "SELECT PASSWORD FROM Staff WHERE USERNAME='" . $_SESSION['logInPharmacist'] . "'";
    $result = mysqli_query($connection, $oldPasswordQuery);
    $passArray = array();
    while ($oldPass = mysqli_fetch_assoc($result)) {
        $passArray[] = $oldPass;
        $oldPassArray=$oldPass['PASSWORD'];
//        echo $hashOld;
//        echo "<br>";
//        echo $oldPass['PASSWORD'];
//        echo "<br>";
//        echo $hashNew;
//        echo "<br>";
//        echo $hashConfirm;
//        echo "<br>";

        if ($hashOld ==$oldPassArray)
        {
            if($hashNew == $hashConfirm)
            {
                $insertNewPassword = "UPDATE  Staff SET PASSWORD='$hashNew' WHERE  USERNAME='" . $_SESSION['logInPharmacist'] . "'";
                mysqli_query($connection, $insertNewPassword);
                if (mysqli_affected_rows($connection) > 0)
                {
                    echo "<p class='alert alert-success'>Password change successful</p>";
                } else{
                    echo "<p class='alert alert-danger'>No change was done</p>";
                }

            }
            else{
                echo "<p class='alert alert-danger'>Your new Passwords doesn't match!</p>";
            }
        }
        else
        {
            echo "<p class='alert alert-danger'>Your old Password doesn't match the one provided!</p>";
        }

    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Password Change</title>
</head>
<body>
<h3>Change Your password
   Pharmacist <?php
    require ('Connection.php');
    if(isset($_SESSION['logInPharmacist'])){
        echo$_SESSION['logInPharmacist'];
    }
    ?></h3>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Password Change</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" action="pharmChangePassword.php" method="POST">
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Old Password</label>
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="oldPassword" placeholder="Enter your old password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-md-4 control-label">New Password</label>
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="newPassword" placeholder="Enter your new password" required>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="confirmPassword" placeholder="Confirm your new password" required>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success pull-right btn-sm" name="changePassword">Change password</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>