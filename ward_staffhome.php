
   <!doctype html>
  <html>
<head>
	<title>Ward Staff Homepage Page</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#00FFFF;">
<?php include 'header.php' ?>
<h2>Welcome
    Attendant <?php
    require ('Connection.php');
    session_start();
    if(isset($_SESSION['logInWard'])){
        echo$_SESSION['logInWard'];
    }
    else
        header('Location:staffLogIn.php');
    ?></h2>
       
	   <div class="row">
	       <div class="col-md-6">
		      <div id="aside">
			      <h3><u>Staff's Account</u> </h3>
				  
				  <ul>
				  <li><a href="wardAttendantProfile.php">Profile </a></li><br />
<!--				  <li><a href="#">Bandari Chat</a></li><br />-->
				  <li><a href="wardChangePassword.php">Change Password</a></li><br />
				  <li><a href="wardLogOut.php"> Logout </a></li>
				  </ul>
				  
		</div>
		 </div>
   <div class="col-md-6">
       <div id="aside">
           <h3><u>Staff's Home</u></h3>
     <ul>
<!--	         <li><a href="#">Bandari Wards</a></li><br />-->
	         <li class="dropdown">
                 <a class="dropdown-toggle" data-toggle="dropdown"  data-hover="dropdown" href="#" role="button" aria-hashpopup="true" aria-expanded="false" >View Patients Admissions Information</a>
                 <ul class="dropdown-menu">
                     <li class="dropdown-item"><a href="wardSearchPatient.php">View Posted Admissions</a> </li>
                     <li class="dropdown-item"><a href="wardViewAdmittedPatients.php">View Admitted Patients</a> </li>
                 </ul>
             </li><br />
			 <li><a href="wardAdmitPatient.php"> Admit Patient</a></li><br />
			
			 <li><a href="wardDischargePatient.php">Discharge  Patient </a></li><br />
<!--			  <li> Post Patient's Information To</li>-->
<!--			        <ul>-->
<!--			        <li><a href="#"> Pharmacy Department</a></li>-->
<!--					<li><a href="#"> Mortuary Department</a></li>-->
<!--					</ul>-->
<!--		<li><a href="#">Messages</a></li>-->
	        
	 </ul>	
 

</div>
</div>
</div>
<script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
   

</body>
</html>   