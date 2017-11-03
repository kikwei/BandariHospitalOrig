<!doctype html>
<html>
<head>
	<title> admin add staff</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#fffaf0;">
 
 <?php
 include 'header.php';

session_start();
if(!isset($_SESSION['logInAdministrator']))
    header('Location:AdminLogIn.php');


if (isset($_POST['submit'])) {
    require('Connection.php');


    $name = $_POST['fullName'];
    $nationalId = $_POST['nationalId'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $mobileNumber = $_POST['mobile'];
    $password = $_POST['password'];
    $hash = hash('sha256', $password);

    $dupEmail = mysqli_query($connection, "SELECT * FROM staff WHERE email ='" . $_POST['email'] . "'");
    $rowId = mysqli_num_rows($dupEmail);
    if ($rowId > 0) {
        $msg = "The email provided is already registered.Please choose another";
        $msgType = "alert alert-danger";

    }


    $dupId = mysqli_query($connection, "SELECT * FROM staff WHERE nationalId ='" . $_POST['nationalId'] . "'");
    $rowId1 = mysqli_num_rows($dupId);

    if ($rowId1 > 0) {
        $msg = "The national ID provided is already used";
        $msgType = "alert alert-danger";

    }


    // Check if name is not alpha numeric, throw error
    if (!ctype_alnum($name)) {
        $msg = "Name should be alpha numeric characters only.";
        $msgType = "alert alert-danger";

    }


    // if name is not 3-20 characters long, throw error
    if (strlen($name) < 3 OR strlen($name) > 20) {
        $msg = "Name should be within 3-20 characters long.";
        $msgType = "alert alert-danger";
    }


    # Validate Email #
    // if email is invalid, throw error
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // you can also use regex to do same
        $msg = "Enter a valid email address.";
        $msgType = "alert alert-danger";
    }

    # Validate Phone #
    // if phone is invalid, throw error
    if (!ctype_digit($mobileNumber) OR strlen($mobileNumber) != 10) {
        $msg = "Enter a valid phone number.";
        $msgType = "alert alert-danger";
    }
    $insert = "INSERT INTO staff(FULLNAME,NATIONALID,DEPARTMENT,PHONE,EMAIL,USERNAME,PASSWORD)
VALUES('$name','$nationalId','$department','$mobileNumber','$email','$username','$hash')";

    mysqli_query($connection, $insert);
    if (mysqli_affected_rows($connection) > 0) {
        $msg = "Staff added Successfully";
        $msgType = "alert alert-success";
    } else {
        $msg = "No Staff Added";
        $msgType = "alert alert-danger";
    }
}
 ?>




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
                    <h3 class="panel-title">Staff Details</h3>
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" name="user" method="POST" action="add_staff.php" >
                        <div id="lee">
                            <div class="form-group">

                                <label class="col-md-4 control-label" for="name"> Full Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="fullName" id="name" class="form-control input-lg" placeholder="Full name" value="<?=@$fullName?>" tabindex="1" required/>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="department">Department</label>
                                <div class="col-md-6">
                                    <select name="department" class="form-control">
                                        <option>ADMINISTRATOR</option>
                                        <option>RECEPTION </option>
                                        <option>CONSULTATION</option>
                                        <option>LABORATORY</option>
                                        <option>WARD</option>
                                        <option>PHARMACY</option>
                                        <option>MORTUARY</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-4 control-label" for="mobile">Mobile Number</label>
                                <div class="col-md-6">
                                    <input type="tel" name="mobile" id="mobile" class="form-control input-lg" placeholder="mobile number" value="<?=@$mobile?>" tabindex="1" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="id">National Id</label>
                                <div class="col-md-6">
                                    <input type="text" name="nationalId" id="nationalid" class="form-control input-lg" placeholder="National Id" value="<?=@$nationalId?>" tabindex="1" required/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address"  value="<?=@$email?>" tabindex="1" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Username</label>
                                <div class="col-md-6">
                                    <input type="text" name="username" id="username" class="form-control input-lg" placeholder="username" value="<?=@$username?>" tabindex="1" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"for="password">Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password"  tabindex="1" required/>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-6">
                                <button name="submit" class="btn btn-success pull-right">ADD STAFF</button>
                                </div>
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