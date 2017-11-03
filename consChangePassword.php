<?php
require('Connection.php');
session_start();
if(!isset($_SESSION['logInConsultant']))
    header('Location:AdminLogIn.php');
if(isset($_SESSION['logInConsultant']) && isset($_POST['changePassword'])) {
    $username = $_SESSION['logInConsultant'];
    $oldPassword = $_POST['oldPassword'];
    $hashOld = hash('sha256', $oldPassword);
    $newPassword = $_POST['newPassword'];
    $hashNew = hash('sha256', $newPassword);
    $confirmPassword = $_POST['confirmPassword'];
    $hashConfirm = hash('sha256', $confirmPassword);

    //Session initialization
    $username = $_SESSION['logInReceptionist'];
    $oldPasswordQuery = "SELECT PASSWORD FROM Staff WHERE USERNAME='" . $_SESSION['logInConsultant'] . "'";
    $result = mysqli_query($connection, $oldPasswordQuery);
    $passArray = array();
    while ($oldPass = mysqli_fetch_assoc($result)) {
        $passArray[] = $oldPass;
        $oldPassArray=$oldPass['PASSWORD'];


        if ($hashOld ==$oldPassArray)
        {
            if($hashNew == $hashConfirm)
            {
                $insertNewPassword = "UPDATE  Staff SET PASSWORD='$hashNew' WHERE  USERNAME='" . $_SESSION['logInConsultant'] . "'";
                mysqli_query($connection, $insertNewPassword);
                if (mysqli_affected_rows($connection) > 0)
                {
                    $msg="Password change successful";
                    $msgType="alert alert-success";
                } else{

                $msg="Password Change Failed!";
                $msgType="alert alert-danger";
                }

            }
            else{

                $msg="Your new Passwords doesn't match!";
                $msgType="alert alert-danger";

            }
        }
        else
        {
            $msg="Your old Password doesn't match the one provided!";
            $msgType="alert alert-danger";
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

<div class="container">

    <?php if (@$msg!="") { ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="<?php echo $msgType?>">
                <button data-dismiss="alert" class="close" type="button">x</button>
                <p class="text-center"><?php echo $msg; ?></p>
            </div>
            <?php }?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Password Change</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" action="consChangePassword.php" method="POST">
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

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>