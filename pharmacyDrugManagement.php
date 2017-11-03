<?php

session_start();
if(!isset($_SESSION['logInPharmacist']))
    header('Location:staffLogIn.php');
require('Connection.php');
if(isset($_POST['register'])) {
    $drudName = $_POST['drugName'];
    $quantity = $_POST['quantity'];
    $units = $_POST['units'];



    $dupDrug = mysqli_query($connection, "SELECT Drugs FROM Drugs WHERE Drugs='" . $_POST['drugName'] . "'");
    $rowId = mysqli_num_rows($dupDrug);
    if ($rowId > 0) {

    $updateQuantity="UPDATE Drugs SET Quantity=Quantity+'$quantity',Units='$units' WHERE Drugs='".$_POST['drugName']."'";
    $update=mysqli_query($connection,$updateQuantity);

    if($rows=mysqli_affected_rows($connection)>0){
        $msg="Drug Quantity updated Successfully";
        $msgType="alert alert-success";
    }else{
        $msg="Drug Quantity update Failed";
        $msgType="alert alert-danger";
    }
    } else {


        $insert = "INSERT INTO DRUGS(Drugs,Quantity,Units)
VALUES('$drudName','$quantity','$units')";

        $realInsert = mysqli_query($connection, $insert);


        $query = "SELECT Drugs FROM Drugs WHERE Drugs='" . $_POST['drugName'] . "'";

        $result = mysqli_query($connection, $query);
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {

            $msg = "Drug Registered Successfully";
            $msgType = 'alert alert-success';

            echo "<br/>";

        } else {

            $msg = "Drug  Registration Failed";
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
                <h3 class="panel-title text-center">Enter New Drug</h3>
            </div>
            <div class="panel-footer">
                <form class="form-horizontal" action="pharmacyDrugManagement.php" method="POST">
                    <div class="form-group" role="form">

                        <fieldset>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Drug Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="drugName" class="form-control" placeholder="Enter Drug Name" required/>
                                </div>

                            </div>

                            <div class="form-group">
                                <label  class="col-md-4 control-label">Quantity</label>
                                <div class="col-md-6">
                                    <input type="text" name="quantity" class="form-control" placeholder="Quantity" required/>
                                </div>
                            </div>



                            <div class="form-group">
                                <label  class="col-md-4 control-label ">Units</label>
                                <div class="col-md-6">
                                    <input type="text" name="units" class="form-control" placeholder="Units" required/>
                                </div>
                            </div>




                            </fieldset>
                            <br/>
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-info pull-right" name="register" value="Register"/>
                            </div>

                </form>
            </div>
            <h3 class="text-center"><a href="pharmacyViewAvailableDrugs.php" style="color: whitesmoke"><button type="submit" class="btn btn-success">View Available Drugs</button></a></h3>
        </div>
    </div>



</div>

</body>

</html>

