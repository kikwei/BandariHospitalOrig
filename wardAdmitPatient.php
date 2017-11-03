<?php
require ('Connection.php');
session_start();
if(!isset($_SESSION['logInWard']))
    header('Location:staffLogIn.php');
if(isset($_POST['admitPatient']))
{
    $patientId=$_POST['patientId'];
    $ward=$_POST['ward'];
    $roomNumber=$_POST['room'];
    $date=date('Y-m-d H:i:s');

    $query="INSERT INTO AdmittedPatients(PatientsId,Ward,RoomNumber,PatientAdmittedAt,Status)VALUES('$patientId','$ward','$roomNumber','$date','Admitted')";

    mysqli_query($connection,$query);


}
?>
<html>
<head>
    <title>Admit Patient</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Admit Patient</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" action="wardAdmitPatient.php" method="POST">
                        <div class="form-group">
                            <label  class="col-md-4 control-label">PatientId</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="patientId" placeholder="Enter Patients' Id" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-md-4 control-label">Ward</label>
                            <div class="col-md-6">
                                <select name="ward" class="form-control">
                                    <option>Women</option>
                                    <option>Men</option>
                                    <option>Children</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Room Number</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="room" placeholder="Enter Room Number" required>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success pull-right btn-sm" name="admitPatient">Admit Patient</button>
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

