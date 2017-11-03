<?php

session_start();
if(!isset($_SESSION['logInReceptionist']))
    header('Location:staffLogIn.php');
require('Connection.php');
	if(isset($_POST['register'])) {
        $fullName = $_POST['fullName'];
        $dateOfBirth = $_POST['DOB'];
        $residential = $_POST['residence'];
        $nextOfKin = $_POST['nextOfKin'];
        $patientsId = $_POST['userId'];
        $birthCert = $_POST['birthCert'];
        $nationalId = $_POST['id'];
        $gender = $_POST['Gender'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $nextOfKinTelephone = $_POST['nextOfKinTelephone'];
        $dateOfRegistration = date('Y-m-d H:i:s');


        $dupId = mysqli_query($connection, "SELECT PatientsId FROM PATIENTS WHERE PatientsId='" . $_POST['userId'] . "'");
        $rowId = mysqli_num_rows($dupId);
        if ($rowId > 0) {

            $msg = "Patients' ID Taken!!";
            $msgType = 'alert alert-danger';
        } else {
            //Insert table patients

            $insert = "INSERT INTO PATIENTS(FullName,DateOfBirth,Residential,NextOfKin,PatientsId,BirthCertificate,NationalId,Gender,Address,Telephone,NextOfKinTelephone,DateOfRegistration)
VALUES('$fullName','$dateOfBirth','$residential','$nextOfKin','$patientsId','$birthCert','$nationalId','$gender','$address',$telephone,$nextOfKinTelephone,'$dateOfRegistration')";
            $realInsert = mysqli_query($connection, $insert);


            $query = "SELECT PatientsId FROM PATIENTS WHERE PatientsId='" . $_POST['userId'] . "'";

            $result = mysqli_query($connection, $query);
            $rows = mysqli_num_rows($result);
            if ($rows > 0) {

                $msg = "Patient Registered Successfully";
                $msgType = 'alert alert-success';

                echo "<br/>";
                echo "<a href=patientsRegistration.php>Back</a>";
            } else {

                $msg = "Patient Not Registered";
                $msgType = 'alert alert-danger';
            }
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

</head>
    <body>

    <?php if (@$msg!="") { ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="<?php echo $msgType?>">
                <button data-dismiss="alert" class="close" type="button">x</button>
                <p><?php echo $msg; ?></p>
            </div>
            <?php }?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Register New Patient</h3>
                </div>
                <div class="panel-footer">
                    <form class="form-horizontal" action="patientsRegistration.php" method="POST">
                        <div class="form-group" role="form">

                            <fieldset>
                                <legend>Personal Information</legend>
                                    <div class="form-group">
                                        <label  class="col-md-4 control-label">Full Name</label>
                                        <div class="col-md-6">
                                            <input type="text" name="fullName" class="form-control" placeholder="Enter Full Name" required/>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label  class="col-md-4 control-label">Date of Birth</label>
                                        <div class="col-md-6">
                                            <input type="date" name="DOB" class="form-control" placeholder="Enter Birth Date" required/>
                                        </div>
                                    </div>



                                <div class="form-group">
                                    <label  class="col-md-4 control-label ">Place of Residence</label>
                                    <div class="col-md-6">
                                        <input type="text" name="residence" class="form-control" placeholder="Enter place of Residence" required/>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label  class="col-md-4 control-label ">Next of Kin</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nextOfKin" class="form-control" placeholder="Enter Next of Kin" required/>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label class="col-md-4 control-label ">Birth Certificate</label>
                                    <div class="col-md-6">
                                        <input type="text" name="birthCert" class="form-control" placeholder="Birth Certificate Number" required/>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-md-4 control-label ">National Id</label>
                                    <div class="col-md-6">
                                        <input type="text" name="id" class="form-control" placeholder="National Id Number" required/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label ">Card Number</label>
                                    <div class="col-md-6">
                                        <input type="text" name="userId" class="form-control" placeholder="Patients ID" required/>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="Gender" class="col-md-4 control-label">Gender:</label>
                                    <div class="col-md-6">
                                        <select name="Gender" class="form-control" required>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>




                            <fieldset>
                                <legend>Contact Details</legend>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Address</label>
                                        <div class="col-md-6">
                                            <input type="text" name="address" class="form-control" placeholder="Enter home address" required/>
                                        </div>
                                    </div>


                                <div class="form-group">
                                    <label  class="col-md-4 control-label">Telephone</label>
                                    <div class="col-md-6">
                                        <input type="tel" name="telephone" class="form-control" placeholder="Enter Phone Number" required/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label  class="col-md-4 control-label">Next of Kin Telephone</label>
                                    <div class="col-md-6">
                                        <input type="tel" name="nextOfKinTelephone" class="form-control" placeholder="Enter Next of Kin Phone Number" required/>
                                    </div>
                                </div>

                            </fieldset>
                            <br/>
<div class="col-md-6 col-md-offset-4">
    <input type="submit" class="btn btn-info pull-right" name="register" value="Register"/>
</div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>

