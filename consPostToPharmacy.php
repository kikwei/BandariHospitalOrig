<?php
require ('Connection.php');
session_start();
if(!isset($_SESSION['logInConsultant']))
    header('Location:staffLogIn.php');
if(isset($_POST['postToPharmacy']))
{
    $id=$_POST['patientId'];

    $signs=$_POST['symptoms'];
    $drugs=$_POST['drugs'];
    $disease=$_POST['disease'];
    $date=date('Y-m-d H:i:s');

    $insertDisease=mysqli_query($connection,"INSERT INTO DISEASES (Disease,TreatmentDate)VALUES ('$disease','$date')");



    $query="INSERT INTO  ADMINISTRATION(PatientsId,SignsAndSymptoms,Drugs,Disease,AdministrationDate)VALUES ('$id','$signs','$drugs','$disease','$date')";

    mysqli_query($connection,$query);

    if(mysqli_affected_rows($connection)>0)
    {
        echo "Administration Submitted Successfully";
    }
    else
        echo 'No Administration Submitted';
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
                    <h3 class="panel-title">Administer Drugs</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" action="consPostToPharmacy.php" method="POST">
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Patients Id</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="patientId" placeholder="Enter patient's Id" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-md-4 control-label">Drugs</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="drugs" placeholder="Enter Drugs to Administer">
                            </div>

                        </div>


                        <div class="form-group">
                            <label  class="col-md-4 control-label">Symptoms</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="symptoms" placeholder="Enter Signs and Symptoms"></textarea>
                            </div>

                        </div>



                        <div class="form-group">
                            <label  class="col-md-4 control-label">Disease</label>
                            <div class="col-md-6">
                                <input class="form-control" name="disease" placeholder="Enter Disease">
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success pull-right btn-sm" name="postToPharmacy">Post to Pharmacy</button>
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
