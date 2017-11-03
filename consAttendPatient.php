<?php
    session_start();
    require_once ('Connection.php');
    if(!isset($_SESSION['logInConsultant']))
        header('Location:staffLogIn.php');

   if(isset($_GET['patientsId'])) {

        $id=$_GET['patientsId'];

        if (isset($_POST['postToPharmacy'])) {


            $drug=$_POST['drug'];
            $drugs = implode(" ",$_POST['drug']);
            $dosage=$_POST['prescription'];
            $prescription=explode(',',$dosage);
            $date = date('Y-m-d');

            $drugArrayNum=count($drug);//Number of Array Elements
            $drugNum=$drugArrayNum-1;//Index of Array Element

           $prescriptionArrayNum=count($prescription);
           $prescriptionNum=$prescriptionArrayNum-1;

            $drugPrescription='';
            for($j=$drugNum;$j>=0;$j--) {

                    $drugPrescription.= $drug[$j] . '  ' . $prescription[$j].',';

                if ($j != 0) {


                }else{
                    $sql = "UPDATE patients_disease_record  SET prescribedDrugs='$drugPrescription', Status='Attended' WHERE PatientsId='$id' AND Status='UnAttended'";

                    mysqli_query($connection, $sql);

                    $query = "INSERT INTO  PHARMACIST(PatientsId,DrugsPrescribed,AdministrationDate)VALUES ('$id','".$drugPrescription."','$date')";

                    mysqli_query($connection, $query);
                }


            }





            $sql = "UPDATE PATIENTS SET `status`='ATTENDED' WHERE `PatientsId`='$id'";
            $sqlResult = mysqli_query($connection, $sql);

            $update = "UPDATE LABORATORY SET `ConsultationStatus`='RECEIVED' WHERE `LabPatientsId`='$id'";
            $updateResult = mysqli_query($connection, $update);



        } elseif (isset($_POST['postLab'])) {

            $tests = implode("  ",$_POST['test']);
            $date = date('Y-m-d');

            $query = "INSERT INTO Laboratory(LabPatientsId,Tests,TestsPostedAt)VALUES ('$id','$tests','$date')";

            mysqli_query($connection, $query);

            if (mysqli_affected_rows($connection) > 0) {
                $msg="Tests Submitted Successfully";
                $msgType='alert alert-success';
            } else {
                $msg = 'No Tests Submitted';
                $msgType = 'alert alert-danger';
            }
        } elseif (isset($_POST['postDiagnosis'])) {

            $dis=$_POST['disease'];
            $signs=$_POST['signs'];
            $disease = implode(" , ",$_POST['disease']);
            $date = date('Y-m-d');


            $ageSql=mysqli_query($connection,"SELECT `age` FROM `patients` WHERE `PatientsId`='$id' ");

            $age=mysqli_fetch_array($ageSql);


            $arrayNum=count($dis);
            $diseaseNum=$arrayNum-1;

            for($i=$diseaseNum;$i>=0;$i--){



                $query = "INSERT INTO diseases_occured(PatientsId,Age,Disease,Date_treated)VALUES('$id','$age[0]','$dis[$i]','$date')";
                mysqli_query($connection, $query);

            }


            $query = "INSERT INTO patients_disease_record(PatientsId,SignsAndSymptoms,Disease,DateOfTreatment)VALUES ('$id','$signs','$disease','$date')";

            mysqli_query($connection, $query);

            if (mysqli_affected_rows($connection) > 0) {
                $msg="Patient Diagnosis Posted Successfully";
                $msgType='alert alert-success';
            } else {
                $msg='No Medical Record Posted';
                $msgType = 'alert alert-danger';
            }
        } else if (isset($_POST['postToWard'])) {


            $disease = implode("",$_POST['disease']);
            $condition = $_POST['condition'];
            $date = date('Y-m-d');



            $sql = "UPDATE PATIENTS SET `status`='ATTENDED' WHERE `PatientsId`='$id'";
            $query = mysqli_query($connection, $sql);


            $query = "INSERT INTO ADMIT(PatientsId,Disease,PatientsCondition,AdmissionPostedAt)VALUES ('$id','$disease','$condition','$date')";

            mysqli_query($connection, $query);

            if (mysqli_affected_rows($connection) > 0) {

                $msg="Admission Submitted Successfully";
                $msgType='alert alert-success';
            } else{
                $msg="No Admission Submitted";
                $msgType='alert alert-danger';
            }

        }
    }else{
        $msg="Choose Patient to Serve";
        $msgType='alert alert-danger';
    }
?>
<html>
<head>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-multiselect-master/dist/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="bootstrap-multiselect-master/dist/css/bootstrap-multiselect.css">




</head>
<body>
<div class="row">
<?php
require_once ('Connection.php');

$query="SELECT FullName FROM `PATIENTS` WHERE `PatientsId`='".$_GET['patientsId']."'";
$result=mysqli_query($connection,$query);

$nameArray=mysqli_fetch_array($result);
echo "<p class='col-md-6 col-md-offset-5' style='color: blue'>Patient  $nameArray[0] $id</p>";
?>
</div>
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
    <div class="col-md-1"></div>

    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><b style="color: blue">Patients Diagnosis</b></h3>
            </div>
            <div class="panel-footer">
                <form class="form-horizontal" action="" method="POST" id="diagnosisForm">

                    <div class="form-group">
                        <label  class="col-md-3 control-label">Signs and Symptoms</label>
                        <div class="col-md-9">
                            <input class="form-control" name="signs" placeholder="Enter signs and symptoms" required>
                        </div>

                    </div>


                    <div class="form-group">
                        <label  class="col-md-3 control-label">Disease</label>
                        <div class="col-md-9">
                            <select name="disease[]" id="diseases"  multiple class="form-control">

                                <?php
                                require_once ('Connection.php');

                                $sql="SELECT `disease` FROM `all_diseases`";
                                $sqlResult=mysqli_query($connection,$sql);

                                while($disease=mysqli_fetch_array($sqlResult)){?>
                                    <option value="<?php echo $disease[0];?>"><?php
                                        echo $disease[0];
                                        ?></option>
                               <?php }
                                ?>
                            </select>

                    </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-success pull-right" id="btnSelected" value="Get Selected" name="postDiagnosis">Post Diagnosis</button>
                        </div>
                    </div>


                </form>
            </div>

        </div>
    </div>

    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><b style="color: blue">Patients' Previous Medical Record</b></h3>
            </div>
<!--            <div class="panel-body">-->
                <div class="panel-footer">




                                <?php
                                require('Connection.php');

                                if(isset($_GET['patientsId']))

                                    $id=$_GET['patientsId'];

                                        $_SESSION['patient']=$id;


                                $query="SELECT Disease,DateofTreatment FROM  patients_disease_record WHERE PatientsId='$id'";


                                $result=mysqli_query($connection,$query);

                                $rowsAff=mysqli_affected_rows($connection);

                                if($rowsAff>0) {
                                    ?>
                                    <table class="table table-hover text-center" border="1">

                                        <th class="text-center" style="color: blue">Disease</th>
                                        <th class="text-center" style="color: blue">Treatment Date</th>
                                        <?php


                                        while ($rows = mysqli_fetch_array($result)) {

                                            echo "<tr><td>$rows[0]</td><td><a href='patientsPreviousMedicalRecord.php?DateofTreatment=$rows[1]' target='_blank'>$rows[1]</a></td></tr>";
                                        }

                                        ?>

                                    </table>
                                    <?php
                                }else{
                                    echo"<p class='alert alert-danger text-center'>No Previous Medical Record!</p>";
                                }
                    ?>




                    </div>
            </div>
        </div>
    </div>




<div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-5">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b style="color: blue">Refer Patient to the Pharmacist</b></h3>
                        </div>
                        <div class="panel-footer">
                            <form class="form-horizontal" action="" method="POST">

                                <div class="form-group">
                                    <label  class="col-md-3 control-label">Drugs</label>
                                    <div class="col-md-9">
                                        <select name="drug[]" id="drugs"  multiple class="form-control" size="2">
                                            <?php
                                            require_once ('Connection.php');

                                            $sql="SELECT `drugs` FROM `drugs`";
                                            $sqlResult=mysqli_query($connection,$sql);

                                            while($drug=mysqli_fetch_array($sqlResult)){?>
                                                <option value="<?php echo $drug[0];?>"><?php
                                                    echo $drug[0];
                                                    ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>

                                </div>



                                <div class="form-group">
                                    <label class="col-md-3 control-label">Prescription</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="prescription" placeholder="Enter the Drugs Prescription" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" class="btn btn-success pull-right" name="postToPharmacy">Post to Pharmacy</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
    <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b style="color: blue">Refer Patient to Ward</b></h3>
                        </div>

                        <div class="panel-footer">
                            <form class="form-horizontal" action="" method="post">


                                <div class="form-group">
                                    <label class="col-md-3 control-label">Disease</label>
                                    <div class="col-md-9">
                                        <select name="disease[]" id="disease"  multiple class="form-control">

                                            <?php
                                            require_once ('Connection.php');

                                            $sql="SELECT `disease` FROM `all_diseases`";
                                            $sqlResult=mysqli_query($connection,$sql);

                                            while($disease=mysqli_fetch_array($sqlResult)){?>
                                                <option value="<?php echo $disease[0];?>"><?php
                                                    echo $disease[0];
                                                    ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label">Condition</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="condition" placeholder="Enter Patients Condition" required></textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" class="btn btn-success pull-right" name="postToWard">Post to Ward</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>
    <br/><br/>
<div class="row">
    <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b style="color: blue">Refer Patient to the Laboratory</b></h3>
                        </div>
                        <div class="panel-footer">
                            <form class="form-horizontal" action="" method="POST">

                                <div class="form-group">
                                    <label  class="col-md-3 control-label">Tests</label>
                                    <div class="col-md-9">
                                        <select name="test[]" id="tests"  multiple class="form-control" size="2">
                                            <?php
                                            require_once ('Connection.php');

                                            $sql="SELECT `tests` FROM `tests`";
                                            $sqlResult=mysqli_query($connection,$sql);

                                            while($test=mysqli_fetch_array($sqlResult)){?>
                                                <option value="<?php echo $test[0];?>"><?php
                                                    echo $test[0];
                                                    ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn btn-success pull-right" name="postLab">Post to Lab</button>
                                    </div>
                                </div>


                            </form>
                        </div>

                    </div>
                </div>

    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><b style="color: blue"><?php
                        require_once ('Connection.php');
                $query="SELECT COUNT(*) FROM `laboratory` WHERE `Status`='TESTED' AND `ConsultationStatus`='NOT RECEIVED'";
                $queryResult=mysqli_query($connection,$query);

                $resultArray=mysqli_fetch_array($queryResult);
                echo $resultArray[0].' Posted Lab Results.';
                        ?></b></h3>
            </div>
            <div class="panel-body">
                <div class="panel-footer">
                    <h3 class="text-center"><a href="consViewLabResults.php" style="color: whitesmoke"><button type="submit" class="btn btn-success">View Lab Results</button></a></h3>
                </div>

            </div>

        </div>
    </div>


                </div>
<h3 class='text-center'><a href='consultation_staffhome.php'>Back</a></h3>

<script>
    $(document).ready(function () {
        $('#diseases').multiselect({
            nonSelectedText:"Select Disease",
            enableFiltering:true,
            enableCaseInsensitiveFiltering:true,
            buttonWidth:'375px'
        });


//        $('#diagnosisForm').on('submit',function (event) {
//            event.preventDefault();
//            var form_data=$(this).serialize();
//            $.ajax({
//                url:'',
//                method:'POST',
//                data:form_data,
//                success:function (data) {
//                    $('#diseases option:selected').each(function () {
//                        $(this).prop('selected',false);
//                    });
//
//                    $('#diseases').multiselect('refresh');
//
//                }
//            });
//        });
    });

    $(document).ready(function () {
        $('#tests').multiselect({
            nonSelectedText:"Select Test",
            enableFiltering:true,
            enableCaseInsensitiveFiltering:true,
            buttonWidth:'375px'
        });
    });

    $(document).ready(function () {
        $('#drugs').multiselect({
            nonSelectedText:"Select Drugs",
            enableFiltering:true,
            enableCaseInsensitiveFiltering:true,
            buttonWidth:'375px'
        });
    });

    $(document).ready(function () {
        $('#disease').multiselect({
            nonSelectedText:"Select Disease",
            enableFiltering:true,
            enableCaseInsensitiveFiltering:true,
            buttonWidth:'375px'
        });
    });
</script>

</body>
</html>
