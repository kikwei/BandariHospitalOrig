<?php
require ('Connection.php');
session_start();
if(!isset($_SESSION['logInPharmacist']))
    header('Location:staffLogIn.php');
if(isset($_POST['administration']))
{
    $id=$_POST['patientId'];
    $drug=$_POST['drug'];
    $dosage=$_POST['dosage'];
    $date=date('Y-m-d H:i:s');

    $query="INSERT INTO DrugAdministration(PatientsId,DrugAdministered,Dosage,AdministrationDate)VALUES ('$id','$drug','$dosage','$date')";

    mysqli_query($connection,$query);

    if(mysqli_affected_rows($connection)>0)
    {
        echo "Drug Administration Recorded";
    }
    else
        echo 'No Administration Recorded';
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
    <title>Drug Administration</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Post Drug Administration</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" action="pharmDrugAdministration.php" method="POST">
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Patients Id</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="patientId" placeholder="Enter patient's Id" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-md-4 control-label">Drug Administered</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="drug" placeholder="Enter drug administered">
                            </div>

                        </div>

                        <div class="form-group">
                            <label  class="col-md-4 control-label">Dosage</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="dosage" placeholder="Enter what to be tested">
                            </div>

                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success pull-right btn-sm" name="administration">Post Drug Administration</button>
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
