<?php
session_start();
require ('Connection.php');
if(!isset($_SESSION['logInReceptionist']))
{
    header('Location:staffLogIn.php');
}

if(isset($_POST['searchId'])){
    $id=$_POST['searchId'];
    $query="SELECT * FROM Patients WHERE PatientsId='$id'";
    $result=mysqli_query($connection,$query);
    $queryResult=mysqli_fetch_array($result);


}else{
    $msg="Please Choose a patient to Edit his/her details";
    $msgType='alert alert-danger';
}
if(isset($_POST['editPatientDetails'])){
    $fullName=$_POST['fullName'];
    $dateOfBirth=$_POST['DOB'];
    $age=$_POST['age'];

    $residential=$_POST['residential'];
    $nextOfKin=$_POST['nextOfKin'];

    $patientsId=$_POST['patientId'];
    $birthCert=$_POST['birthCert'];

    $nationalId=$_POST['nationalId'];
    $gender=$_POST['gender'];

    $address=$_POST['address'];
    $telephone=$_POST['telephone'];
    $nextOfKinTelephone=$_POST['nextOfKinTel'];

    $query="UPDATE Patients SET FULLNAME='$fullName',DateOfBirth='$dateOfBirth',Age='$age',Residential='$residential',NextOfKin='$nextOfKin',BirthCertificate='$birthCert',NationalId='$nationalId',Gender='$gender',ADDRESS='$address',Telephone=$telephone,NextOfKinTelephone='$nextOfKinTelephone' WHERE PatientsId='$patientsId'";

    mysqli_query($connection,$query);

    if(mysqli_affected_rows($connection)>0) {

        $msg = "Patient Details Updated Successfully";
        $msgType = 'alert alert-success';

        $id=$_POST['patientId'];
        $query="SELECT * FROM Patients WHERE PatientsId='$id'";
        $result=mysqli_query($connection,$query);
        $queryResult=mysqli_fetch_array($result);
    }
    else {
        $msg = "Patient Details Failed to Update";
        $msgType = 'alert alert-danger';
    }


}
?>
<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, init-scale=1">
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
                    <h3 class="panel-title">Edit Patient Details</h3>
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" name="user" method="POST" action="EditPatientForm.php">
                        <div id="lee">

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name"> Full Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="fullName" id="name" class="form-control " placeholder="Full name" value="<?php echo $queryResult[0]?>" tabindex="1" required/>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="department">Date of Birth</label>
                                <div class="col-md-6">
                                    <input type="datetime" name="DOB" placeholder="Date of Birth" value="<?php echo$queryResult[1]?>" class="form-control">

                                </div>

                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label" for="department">Age</label>
                                <div class="col-md-6">
                                    <input type="text" name="age" placeholder="Patients Age" value="<?php echo$queryResult[2]?>" class="form-control">

                                </div>

                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label" for="mobile">Residential</label>
                                <div class="col-md-6">
                                    <input type="text" name="residential" id="residential" class="form-control " placeholder="mobile number" value="<?php echo $queryResult[3]?>" tabindex="1" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="id">Next of Kin</label>
                                <div class="col-md-6">
                                    <input type="text" name="nextOfKin" id="nextOfKin" class="form-control " placeholder="National Id" value="<?php echo $queryResult[4]?>" tabindex="1" required/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Patients Id</label>
                                <div class="col-md-6">
                                    <input type="text" name="patientId" id="patientId" class="form-control " placeholder="Email Address"  value="<?php echo $queryResult[5]?>" tabindex="1" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Birth Certificate</label>
                                <div class="col-md-6">
                                    <input type="text" name="birthCert" id="birthCert" class="form-control " placeholder="username" value="<?php echo $queryResult[6]?>" tabindex="1" required/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">National Id</label>
                                <div class="col-md-6">
                                    <input type="text" name="nationalId" id="nationalId" class="form-control " placeholder="username" value="<?php echo $queryResult[7]?>" tabindex="1" required/>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Gender</label>
                                <div class="col-md-6">
                                    <input type="text" name="gender" id="gender" class="form-control " placeholder="username" value="<?php echo $queryResult[8]?>" tabindex="1" required/>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Address</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" id="address" class="form-control " placeholder="username" value="<?php echo $queryResult[9]?>" tabindex="1" required/>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Telephone</label>
                                <div class="col-md-6">
                                    <input type="tel" name="telephone" id="telephone" class="form-control " placeholder="username" value="<?php echo $queryResult[10]?>" tabindex="1" required/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Next of Kin Telephone</label>
                                <div class="col-md-6">
                                    <input type="text" name="nextOfKinTel" id="nextOfKinTel" class="form-control " placeholder="username" value="<?php echo $queryResult[11]?>" tabindex="1" required/>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Date of Registration</label>
                                <div class="col-md-6">
                                    <input type="datetime" name="date" id="date" class="form-control " placeholder="username" value="<?php echo $queryResult[12]?>" tabindex="1" required/>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-3">
                                <button type="submit" name="editPatientDetails" class="btn btn-success pull-right">Update Patient Details</button>
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
