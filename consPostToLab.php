<?php
require ('Connection.php');
session_start();
if(!isset($_SESSION['logInConsultant']))
    header('Location:staffLogIn.php');
if(isset($_POST['tests']))
{
    $id=$_POST['patientId'];
    $tests=$_POST['tests'];
    $date=date('Y-m-d H:i:s');

    $query="INSERT INTO LabTests(PatientsId,Tests,TestsPostedAt)VALUES ('$id','$tests','$date')";

    mysqli_query($connection,$query);

    if(mysqli_affected_rows($connection)>0)
    {
        $msg="Tests Submitted Successfully";
        $msgTpe="alert alert-success";
    }
    else
        $msg='No Tests Submitted';
        $msgTpe="alert alert-danger";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Tests</title>
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
                    <h3 class="panel-title">Post to Laboratory</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" action="consPostToLab.php" method="POST">
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Patients Id</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="patientId" placeholder="Enter patient's Id" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-md-4 control-label">Tests</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="tests" placeholder="Enter what to be tested"></textarea>
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success pull-right btn-sm" name="postLab">Post to Lab</button>
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
