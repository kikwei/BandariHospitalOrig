<?php
require("Connection.php");
session_start();
if(isset($_POST['LogIn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = hash('sha256', $password);

    $query=mysqli_query($connection,"SELECT UserName,Password FROM Admins WHERE USERNAME='".$_POST['username']."' AND PASSWORD='".hash('sha256',$password)."'");

    $rows=mysqli_num_rows($query);

    if($rows==1){
        $_SESSION['logInAdministrator']=$username;
        header('Location:admin_homepage.php');
    }else {
        $msg = "Wrong Credentials";
        $msgType = "alert alert-danger";
    }
}
 include 'header.php';
?>


<!Doctype html>
<html>
<head>
	<title> Administrator Login Page</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="bandaricss.css">

</head>

<body style="background-color:#FFF;">


        <?php if (@$msg!="") { ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-danger">
                    <button data-dismiss="alert" class="close" type="button">x</button>
                    <p class="text-center"><?php echo $msg; ?></p>
                </div>
                <?php }?>
            </div>
        </div>


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <h3 class="panel-title"><b>Admin Log In</b></h3>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal" method="post" action="AdminLogIn.php">

                        <div class="form-group">
                            <label for="username" class="col-md-2 control-label">Username</label>
                            <div class="col-md-4">
                                <input class="form-control" name="username" type="text" placeholder="Username" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-md-2 control-label">Password</label>
                            <div class="col-md-4">
                                <input class="form-control" name="password" type="password" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-5">
                                <input type="submit" name="LogIn" value="login" class="btn btn-primary btn-sm" tabindex="5"><br />
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

        <script src="js/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>
</body>

