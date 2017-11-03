
   <!doctype html>
  <html>
<head>
	<title>Laboratory staff Homepage Page</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#00FFFF;">
<?php include 'header.php' ?>
<!--<h2>Welcome-->
<!--    Technician --><?php
//    require ('Connection.php');
//    session_start();
//    if(isset($_SESSION['logInLabTech'])){
//        echo$_SESSION['logInLabTech'];
//    }
//    else
//        header('Location:staffLogIn.php');
//    ?><!--</h2>-->
       
	   <div class="row">
	       <div class="col-md-3">
		      <div id="aside">
			      <h3><u>Staff's Account</u> </h3>
				  
				  <ul>
				  <li><a href="labTechProfile.php">Profile </a></li><br />
<!--				  <li><a href="#">Bandari Chat</a></li><br />-->
				  <li><a href="labChangePassword.php">Change Password</a></li><br />
				  <li><a href="labLogOut.php"> Logout </a></li>
				  </ul>
				  
		</div>
		 </div>
   <div class="col-md-8">

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
                                   <h3 class="text-center"><a href="labSearchPatient.php" style="color: whitesmoke"><button type="submit" class="btn btn-success">View Patient Details</button></a></h3>
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

                                       $sql="SELECT COUNT(*) FROM LABORATORY WHERE STATUS='NOT TESTED'";
                                       $result=mysqli_query($connection,$sql);
                                       $resultArray=mysqli_fetch_array($result);

                                       echo$resultArray[0].' Posted Tests';
                                       ?></b></h3>
                           </div>
                           <div class="panel-body">
                               <div class="panel-footer">
                                   <h3 class="text-center"><a href="labViewPostedTests.php" style="color: whitesmoke"><button type="submit" class="btn btn-success">View Posted Tests</button></a></h3>
                               </div>
                           </div>
                       </div>
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