<?php
require ('Connection.php');
session_start();
if(!isset($_SESSION['logInConsultant']))
    header('Location:staffLogIn.php');
if(isset($_POST['postToWard']))
{
    $patientId=$_POST['patientId'];
    $disease=$_POST['disease'];
    $condition=$_POST['condition'];
    $date=date('Y-m-d H:i:s');


    $insertDisease=mysqli_query($connection,"INSERT INTO DISEASES (Disease,TreatmentDate)VALUES ('$disease','$date')");

    $query="INSERT INTO ADMIT(PatientsId,Disease,PatientsCondition,AdmissionPostedAt)VALUES ('$patientId','$disease','$condition','$date')";

    mysqli_query($connection,$query);

    if(mysqli_affected_rows($connection)>0)
    {
        echo "<p class='alert alert-success'>Admission Submitted Successfully</p>";
    }else
        echo "<p class='alert alert-danger'>No Admission Submitted</p>";
}
?>
<html>
<head>
    <title>Post to Ward</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="border: groove;">

                <form class="form-horizontal" action="consPostToWard.php" method="post">
                    <fieldset>
                        <legend>Post to Ward</legend>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Patients Id</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="patientId" placeholder="Enter Patients' Id" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Disease</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="disease" placeholder="Enter the Disease that the patient is Suffering from" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Condition</label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="condition" placeholder="Enter Patients Condition" required></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-success pull-right btn-sm" name="postToWard">Post to Ward</button>
                            </div>
                        </div>


                    </fieldset>



                </form>
            </div>

        </div>
    </div>

</body>
</html>
