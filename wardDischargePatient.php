<?php
session_start();
require ('Connection.php');
if(!isset($_SESSION['logInWard']))
    header('Location:staffLogIn.php');

if(isset($_POST['discharge']))
{
    $patientId=$_POST['patientId'];
    $date=date('Y-m-d H:i:s');

    $query="UPDATE AdmittedPatients SET STATUS='DISCHARGED',PatientDischargedAt='$date' WHERE PatientsId='$patientId'";

    mysqli_query($connection,$query);
}
?>
<html>
<head>
    <title>Discharge Patient</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="row">
    <div class="col-md-6 col-md-offset-3" style="border: inset">
        <div class="panel">
            <fieldset>
                <legend>Discharge Patient</legend>
            </fieldset>

        </div>
        <form class="form-horizontal" action="wardDischargePatient.php" method="POST">


            <div class="form-group">
                <label class="col-md-3 control-label">Patients Id</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="patientId" placeholder="Enter Patients Id" required>                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-1">
                    <button type="submit" class="btn btn-success pull-right btn-sm" name="discharge">Discharge</button>
                </div>
            </div>


        </form>
    </div>
</div>
</body>
</html>
