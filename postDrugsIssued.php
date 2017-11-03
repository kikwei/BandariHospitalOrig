<?php
if(isset($_POST['postDrugs']))
{
    require_once ('Connection.php');

    $drugIssued=implode($_POST['drug']);
    $amount=$_POST['amount'];
    $date = date('Y-m-d');

    $quantity="SELECT Quantity FROM Drugs WHERE Drugs ='$drugIssued'";
    $resultQuantity=mysqli_query($connection,$quantity);

    $realQuantity=mysqli_fetch_array($resultQuantity);

    if($amount>$realQuantity[0]){
        $msg="Amount Required is not Available in the Stock. Please refer the patient to a nearby Chemist";
        $msgType="alert alert-danger";
    }else {

        $sql = "INSERT INTO `track_drugs`(Drug,Quantity,Date_issued)VALUES('$drugIssued','$amount','$date')";
        $insert = mysqli_query($connection, $sql);


        $updateQuantity="UPDATE Drugs SET Quantity=Quantity-'$amount' WHERE Drugs='$drugIssued'";
        $update=mysqli_query($connection,$updateQuantity);

        if (mysqli_affected_rows($connection) > 0) {
            $msg = "Record Posted Successfully";
            $msgType = "alert alert-success";
        } else {
            $msg = "No Record Submitted";
            $msgType = "alert alert-danger";
        }
    }
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

<?php if (@$msg!="") { ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="<?php echo $msgType?>">
            <button data-dismiss="alert" class="close" type="button">x</button>
            <p><?php echo $msg; ?></p>
        </div>
        <?php }?>
    </div>
</div>

<div class="row">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><b style="color: blue">Drugs to Issued</b></h3>
        </div>
        <!--            <div class="panel-body">-->
        <div class="panel-footer">




            <?php
            require('Connection.php');

            if(isset($_GET['patientsId']))

                $id=$_GET['patientsId'];

           // $_SESSION['patient']=$id;


            $query="SELECT DrugsPrescribed FROM  Pharmacist WHERE PatientsId='$id' AND Status='Unattended'";


            $result=mysqli_query($connection,$query);

            $rowsAff=mysqli_affected_rows($connection);

            if($rowsAff>0) {
                ?>
                <table class="table table-hover text-center" border="1">

                    <th class="text-center" style="color: blue">Drugs</th>

                    <?php


                    while ($rows = mysqli_fetch_array($result)) {

                        echo "<tr><td>$rows[0]</td></tr>";
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

<div class="col-md-6">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title text-center"><b style="color: blue">Post Drugs Issued</b></h3>
    </div>
    <div class="panel-footer">
        <form class="form-horizontal" action="" method="POST">

            <div class="form-group">
                <label  class="col-md-3 control-label">Drugs</label>
                <div class="col-md-9">
                    <select name="drug[]" id="drugs"  multiple class="form-control">
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
                <label class="col-md-3 control-label">Amount</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="amount" placeholder="Enter Drugs Amount" required>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-success pull-right" name="postDrugs">Post Drugs </button>
                </div>

            </div>
        </form>
    </div>
</div>
</div>

</div>

<script>
$(document).ready(function () {
$('#drugs').multiselect({
nonSelectedText:"Select Drugs",
enableFiltering:true,
enableCaseInsensitiveFiltering:true,
buttonWidth:'450px'
});
});
</script>
</body>