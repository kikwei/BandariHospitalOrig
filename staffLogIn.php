
<html>
<head>
    <title>Staff Login Page</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link  href="css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body style="background-color:#FFF;">
<?php include 'header.php' ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h3 class="panel-title"><b>Staff Log In</b></h3>
            </div>
            <div class="panel-body">
                <?php
                require("Connection.php");
                session_start();
                if(isset($_POST['LogIn'])){
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $hash=hash('sha256',$password);

//$passwordQuery=mysqli_query($connection,"SELECT PASSWORD FROM STAFF WHERE USERNAME='".$_POST['username']."'");
//$passArray=array();
//while($pass=mysqli_fetch_assoc($passwordQuery)){
//    $passArray=$pass;
//    if($pass['PASSWORD']==hash('sha256',$password)){
                    $query=mysqli_query($connection,"SELECT UserName,Password FROM STAFF WHERE USERNAME='".$_POST['username']."' AND PASSWORD='".hash('sha256',$password)."'");
                    $query1=mysqli_query($connection,"SELECT DEPARTMENT FROM STAFF WHERE USERNAME='".$_POST['username']."'");
                    $rows=mysqli_num_rows($query);
                    $rows1=mysqli_num_rows($query1);
                    if($rows==1){
                        $queryArray=array();
                        while($name=mysqli_fetch_assoc($query1)){
                            $queryArray[]=$name;
                            //echo $name['field'];
                            if($name['DEPARTMENT']=='ADMINISTRATOR'){
                                $_SESSION['logInUser']=$username;//initialize session
                                header("Location:admin_homepage.php");
                            }
                            else if($name['DEPARTMENT']=='RECEPTION'){
                                $_SESSION['logInReceptionist']=$username;//initialize session
                                header("Location:reception_staffhome.php");
                            }
                            else if($name['DEPARTMENT']=='LABORATORY'){
                                $_SESSION['logInLabTech']=$username;
                                header("Location:lab_staffhome.php");
                            }
                            else if($name['DEPARTMENT']=='CONSULTATION'){
                                $_SESSION['logInConsultant']=$username;
                                header("Location:consultation_staffhome.php");
                            }

                            else if($name['DEPARTMENT']=='PHARMACY')
                            {
                                $_SESSION['logInPharmacist']=$username;
                                header("Location:pharmacy_staffhomepage.php");
                            }

                            else if($name['DEPARTMENT']=='WARD')
                            {
                                $_SESSION['logInWard']=$username;
                                header("Location:ward_staffhome.php");
                            }
                            else{
                                header('Location:stMarys.html');//->with($error);
                            }
                        }
                    }
                    else
                    {
                        echo "<p class='alert alert-danger'>Wrong credentials</p>";//->with($error);
                    }



                    //$hash=="hash('sha256',$pass['PASSWORD'])";
                }
                ?>
                <form class="form-horizontal" method="post" action="staffLogIn.php">
                    <div class="form-group">
                        <label for="username" class="col-md-2 control-label">Username</label>
                        <div class="col-md-4">
                            <input class="form-control" name="username" type="text" placeholder="Username" required autofocus>
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
</body>
</html>
