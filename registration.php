
<?php require 'db.php' ?>
<?php  include 'validate.php' ?>
<!doctype html>
        
		<html>
		    <head>
			      
			<title>Form validation testing</title>
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link rel="stylesheet" href="testing.css">
			
			</head>
			
	<body>
	
	          
	     <div class="row-fluid">
			    <div class="col-md-3"> </div>
				
				
				
		<div class="col-md-6">
		
		<!-- errors displayed here -->
		
	 <?=$error?>
	 
	 <form  action="registration.php" method="post">
		<div class="panel panel-primary">
		  <div class="panel-heading">
				
		<h3 class="panel-title">Personal details- form validation test </h3>
  </div>		
     
  	     <div class="panel-body">
		 <label for="name">Patient's Name</label><br />
                 <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Full name" value="<?=@$name?>" required/>
         
		       <br />

			   
			   
<label for="dob">Date Of Birth</label><br />
                 <input type="text" name="dob" id="dob" class="form-control input-lg" placeholder="Date of join" value="<?=@$dob?>" required/>
         <br />
		 
		 
		 
		 <label for="gender">Gender</label><br />
                 <select class="form-control">
				     <option>MALE</option>
					 <option>FEMALE</option >
					 <option> OTHER</option>
                   </select> <br />
				   
				   
<label for="county">County</label><br />
                 <input type="text" name="county" id="county" class="form-control input-lg" placeholder="County" value="<?=@$county?>" required/>
         <br />
		 
		 

<label for="consituency">Constituency</label><br />
                 <input type="text" name="constituency" id="constituency" class="form-control input-lg" placeholder="Constituency" value="<?=@$constituency?>" required/>
         <br />	
		 
		 
		 
<label for="ward">Ward</label><br />
                 <input type="text" name="ward" id="ward" class="form-control input-lg" placeholder="ward" value="<?=@$ward?>" required/>
         <br />		 
		 
		 </div> 
		    </div>
		 <br />
		     <div class="panel panel-primary">
			 <div class="panel-heading">
		    <h3 class="panel-title"> Contact Information </h3>
			   </div>
			      
				  
				 <div class="panel-body"> 
				 
			  <label for="email">Email</label><br />
                 <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?=@$email?>" required/>
           <br >
		   
		   
		   
		   <label for="phone">Phone</label><br />
                 <input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="Phone" value="<?=@$phone?>" required/>
           
		   <br />
		   
		   
		   
		   <label for="mobile">Mobile Number Of Relative</label><br />
                 <input type="text" name="mobile" id="mobile" class="form-control input-lg" placeholder="mobile number" value="<?=@$mobile?> " required/>
         <br >
		 
		 
		 
		 <label for="address">Address</label><br />
                 <input type="text" name="address" id="address" class="form-control input-lg" placeholder="Address" value="<?=@$address?>" required/>
         
				<br />
				
				
				
								   <input type="submit" name="submit" value="Register patient" class="btn btn-primary btn-block btn-lg"><br /><br />
		   
				</div></div>
				
				 </form>
				 <?php if (isset($_POST['submit']) && $error == '') { // if there is no error, then process further
				echo "<p class='success'>Form has been submitted successfully.</p>"; // showing success message
				
}		?>
				 
				 
		<div class="col-md-3">
		  </div>
		  
		    </div>
			
		    
			<script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
			
			</body>
			
			</html>
			
			
	<?php


//insert data in to database
if (isset($_POST['submit'])) { // check if the form is submitted
	#### removing extra white spaces & escaping harmful characters ####
	$name 	  = trim($_POST['name']);
	$dob      =$_POST['dob'];
	$email 	  = $_POST['email'];
	$phone	  = $_POST['phone'];
	@$gender	  = $_POST['gender'];
	$mobile	  = $_POST['mobile'];
    $county	  = $_POST['county'];
		
	$constituency	  = $_POST['constituency'];
	$ward  = $_POST['ward'];
	$address= $_POST['address'];
	

	
    $query = "INSERT into `patients` (name, dob, gender, county, constituency, ward, email, phone,mobile,address) VALUES ('$name','$dob','$gender', '$county', '$constituency', '$ward','$email','$phone','$mobile','$address')";
    
		 }


	?>