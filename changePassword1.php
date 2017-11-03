
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>Password Change</title>
</head>
<body>
<!--<h2>Change Your password-->
<!--    Administrator --><?php
//     require ('Connection.php');
//     session_start();
//     if(isset($_SESSION['logInUser'])){
//         echo$_SESSION['logInUser'];
//     }
//     ?><!--</h2>-->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Password Change</h3>
                </div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="changePassword.php" method="POST">
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
                                <div class="col-md-8 col-md-offset-4">
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