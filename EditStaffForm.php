<?php
session_start();
require ('Connection.php');
if(!isset($_SESSION['logInAdministrator']))
{
    header('Location:AdminLogIn.php');
}

if(isset($_POST['editStaff'])){
    $id=$_POST['staffId'];
    $query="SELECT * FROM STAFF WHERE NATIONALID='$id'";
    $result=mysqli_query($connection,$query);
    $queryResult=mysqli_fetch_array($result);


}
?>
<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Staff Details</h3>
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" name="user" method="POST" action="EditStaff.php" >
                        <div id="lee">

                            <div class="form-group">
                                <!--                                --><?//=$error ?>
                                <!--                                --><?php //if (isset($_POST['editStaff']) && $error ==''){
                                //                                    echo "<p class='alert alert-success'>Form has been submitted successfully</p>"; } ?>
                                <label class="col-md-4 control-label" for="name"> Full Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="fullName" id="fullName" class="form-control input-lg" placeholder="Full name" value="<?php echo $queryResult[0]?>" tabindex="1" required/>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="department">Department</label>
                                <div class="col-md-6">
                                    <input type="text" name="department" placeholder="department" value="<?php echo$queryResult[2]?>" class="form-control">

                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="mobile">Mobile Number</label>
                                <div class="col-md-6">
                                    <input type="tel" name="telephone" id="telephone" class="form-control input-lg" placeholder="mobile number" value="<?php echo $queryResult[3]?>" tabindex="1" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="id">National Id</label>
                                <div class="col-md-6">
                                    <input type="text" name="nationalId" id="nationalId" class="form-control input-lg" placeholder="National Id" value="<?php echo $queryResult[1]?>" tabindex="1" required/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address"  value="<?php echo $queryResult[4]?>" tabindex="1" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Username</label>
                                <div class="col-md-6">
                                    <input type="text" name="userName" id="username" class="form-control input-lg" placeholder="username" value="<?php echo $queryResult[5]?>" tabindex="1" required/>
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="editStaff" class="btn btn-success pull-right">UPDATE STAFF</button>
                                </div>
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
