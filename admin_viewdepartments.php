<!doctype html>
  <html>
<head>
	<title> Admin Homepage Page</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#00FFFF;">
<?php include 'header.php';
session_start();
if(!isset($_SESSION['logInUser']))
header('Location:AdminLogIn.php');
?>
	
	 <div class="row">
	     <div class="col-md-2">
		     </div>
			    <div class="col-md-8 col-sm-8">
				     <div id="silvia">
					 <h3><b> Welcome Admin To The Bandari Hospital Departments</b></h3><br />
					 
					 <p style="color:#FF0000;"><b>SELECT A DEPARTMENT BELOW TO VIEW THE DEPARTMENTAL RECORDS</b></p><br />
					 <div id="ul_dep">
					    <ul>
						
						<li><a href="#">RECEPTION DEPARTMENT</a></li><br />
						<li><a href="#">CONSULTATION DEPARTMENT</a></li><br />
						<li><a href="#"> LABORATORY DEPARTMENT</a></li><br />
						<li> <a href="#">MORTUARY DEPARTMENT</a></li><br />
						<li><a href="#"> PHARMACY DEPARTMENT</a></li><br />
						<li><a href="#"> WARD DEPARTMENT</a></li><br />
						
						</ul>
						</div>
				 </div>
				 </div>
		<div class="col-md-2">
		</div>
		</div>
		<script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
	  
	  </body>
	  </html>
             
           			  
				