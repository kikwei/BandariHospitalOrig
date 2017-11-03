<!doctype html>
<html>
<head>
	<title> patient registration</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#fffaf0;">
 
 <?php include 'header.php' ?>
  <hr />
 <h2>Welcome
     Receptionist<?php
     require ('Connection.php');
     session_start();
     if(isset($_SESSION['logInUser'])){
         echo$_SESSION['logInUser'];
     }
     ?></h2>
  
<form role="form" name="user" method="post" action="" autocomplete="off">


<div class="row">
     <div class="col-md-3">
	      </div>
	
		
	<div class="col-md-6">
	  <div id="lee">
	      
		
		   <h3 id ="p_details"> Personal Details </h3>
		 <label for="name">Patient's Name</label><br />
                 <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Full name" value="<?php if(isset($error)){ echo $_POST['name'];}?>" tabindex="1" required/>
         
		       <br />

<label for="doj">Date Of Birth</label><br />
                 <input type="text" name="doj" id="doj" class="form-control input-lg" placeholder="Date of join" value="<?php if(isset($error)){ echo $_POST['doj'];}?>" tabindex="2" required/>
         <br />
		 <label for="gender">Gender</label><br />
                 <select class="form-control">
				     <option>MALE</option>
					 <option>FEMALE</option >
					 <option> OTHER</option>
                   </select> <br />
<label for="county">County</label><br />
                 <input type="text" name="county" id="county" class="form-control input-lg" placeholder="County" value="<?php if(isset($error)){ echo $_POST['county'];}?>" tabindex="1" required/>
         <br />

<label for="consituency">Constituency</label><br />
                 <input type="text" name="constituency" id="constituency" class="form-control input-lg" placeholder="Constituency" value="<?php if(isset($error)){ echo $_POST['constituency'];}?>" tabindex="1" required/>
         <br />	
<label for="ward">Ward</label><br />
                 <input type="text" name="ward" id="ward" class="form-control input-lg" placeholder="ward" value="<?php if(isset($error)){ echo $_POST['ward'];}?>" tabindex="1" required/>
         <br />		 
		   
		    <h3 id ="p_details"> Contact Information </h3>
			
			  <label for="email">Email</label><br />
                 <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email'];}?>" tabindex="1" required/>
           <br >
		   
		   <label for="phone">Phone</label><br />
                 <input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="Phone"  tabindex="1" required/>
           
		   <br />
		   <label for="mobile">Mobile Number Of Relative</label><br />
                 <input type="text" name="mobile" id="mobile" class="form-control input-lg" placeholder="mobile number" value="<?php if(isset($error)){ echo $_POST['mobile'];}?>" tabindex="1" required/>
         <br >
		 <label for="address">Address</label><br />
                 <input type="text" name="address" id="address" class="form-control input-lg" placeholder="Address" value="<?php if(isset($error)){ echo $_POST['address'];}?>" tabindex="1" required/>
         
				<br />
								   <input type="submit" name="submit" value="Register patient" class="btn btn-primary btn-block btn-lg" tabindex="5"><br /><br />
		   
				</div></div></div>
				<div class="col-md-3 col-sm-3">
	    </div>
</form>
		   <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
		   </body>
		        </html>
				
				
				<!-- ...........................Redirect    to Payments page ...................-->
		       
			      
	
