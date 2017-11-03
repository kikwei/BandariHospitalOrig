
   <!doctype html>
  <html>
<head>
	<title>Reception staff Homepage Page</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#00FFFF;">
<?php include 'header.php' ?>
<?php
    require ('Connection.php');
       session_start();
    if(!isset($_SESSION['logInReceptionist']))

        header('Location:staffLogIn.php');
    ?>
       
	   <div class="row">
	       <div class="col-md-3">
		      <div id="aside">
			      <h3><u>Staff's Account</u> </h3>
				  
				  <ul>
				  <li><a href="receptionistProfile.php">Profile </a></li><br />
<!--				  <li><a href="#">Bandari Chat</a></li><br />-->
				  <li><a href="receptionistChangePassword.php">Change Password</a></li><br />
				  <li><a href="receptionistLogOut.php"> Logout </a></li>
				  </ul>
				  
		</div>
		 </div>
   <div class="col-md-8">


       <div class="panel panel-default">
           <div class="row">

           <div class="col-md-6">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <h3 class="panel-title text-center"><b style="color: blue">Register Patient</b></h3>
                   </div>
                   <div class="panel-body">
                       <div class="panel-footer">
                           <h3 class="text-center"><a href="patientsRegistration.php" style="color: whitesmoke"><button type="submit" class="btn btn-success">Register Patient</button></a></h3>
                       </div>
                   </div>
               </div>
           </div>


               <div class="col-md-6">
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           <h3 class="panel-title text-center"><b style="color: blue">Edit Patient Details</b></h3>
                       </div>
                       <div class="panel-body">
                           <div class="panel-footer">
                               <h3 class="text-center"><a href="SearchPatientToEdit.php" style="color: whitesmoke"><button type="submit" class="btn btn-success">Edit Patient Details</button></a></h3>
                           </div>
                       </div>
                   </div>
               </div>

           </div>
           <div class="row"><br/><br/><br><br/></div>
         <div class="row">
            <div class="col-md-8 col-md-offset-2">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <h3 class="panel-title text-center"><b style="color: blue">Refer already Registered Patient for Consultation</b></h3>
                   </div>
                   <div class="panel-body">
                       <div class="panel-footer">
                           <h3 class="text-center"><a href="displayAlreadyRegisteredPatient.php" style="color: whitesmoke"><button type="submit" class="btn btn-success">Send to Consultant</button></a></h3>
                       </div>
                   </div>
               </div>
           </div>

         </div>

</div>

<script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
   

</body>
</html>   