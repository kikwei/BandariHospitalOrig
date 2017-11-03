
   <!doctype html>
  <html>
<head>
	<title>Pharmacy Staff Homepage Page</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#00FFFF;">
<
<?php include 'header.php' ?>
<h2>Welcome
    Pharmacist <?php
    require ('Connection.php');
   session_start();
    if(isset($_SESSION['logInPharmacist'])){
        echo$_SESSION['logInPharmacist'];
    }
    else
        header('Location:staffLogIn.php');
    ?></h2>
	   <div class="row">
	       <div class="col-md-3">
		      <div id="aside">
			      <h3><u>Staff's Account</u> </h3>
				  
				  <ul>
				  <li><a href="pharmacistProfile.php">Profile </a></li><br />
<!--				  <li><a href="#">Bandari Chat</a></li><br />-->
				  <li><a href="pharmChangePassword.php">Change Password</a></li><br />
				  <li><a href="pharmLogOut.php"> Logout </a></li>
				  </ul>
				  
		</div>
		 </div>
   <div class="col-md-8">

       <div class="panel panel-default">
           <div class="row">
               <div class="col-md-12">
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           <h3 class="panel-title text-center"><b>View Patient Details</b></h3>
                       </div>
                       <div class="panel-body">
                           <div class="panel-footer">
                               <h3 class="text-center"><a href="pharmacyViewPatient.php" style="color: whitesmoke"><button type="submit" class="btn btn-success">Pharmacy View Patient Details</button></a></h3>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <br/><br/><br/><br/>
           <div class="row">
               <div class="col-md-12">
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           <h3 class="panel-title text-center"><b><?php
                                   require ('Connection.php');

                                   $sql="SELECT COUNT(*) FROM PHARMACIST WHERE STATUS='UNATTENDED'";
                                   $result=mysqli_query($connection,$sql);
                                   $resultArray=mysqli_fetch_array($result);

                                   echo$resultArray[0].' Unattended Patients';
                                   ?></b></h3>
                       </div>
                       <div class="panel-body">
                           <div class="panel-footer">
                               <h3 class="text-center"><a href="pharmViewUnattendedPatients.php" style="color: whitesmoke"><button type="submit" class="btn btn-success">View Unattended Patients</button></a></h3>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="row">
               <div class="col-md-6 col-md-offset-3">
                   <h3 class="text-center"><a href="pharmacyDrugManagement.php" style="color: whitesmoke"><button type="submit" class="btn btn-success">Drug Management</button></a></h3>
               </div>
           </div>
       </div>

<!--       <div id="aside">-->
<!--           <h3><u>Staff's Home</u></h3>-->
<!--     <ul>-->
<!--	         <li><a href="pharmacyViewPatient.php">View Patients Information</a></li><br />-->
<!--	 </ul>-->
<!--</div>-->

</div>
</div>
<script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
   

</body>
</html>   