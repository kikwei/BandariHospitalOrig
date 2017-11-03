<?php
require('Connection.php');

$error = ""; // Initialize error as blank

if (isset($_POST['submit'])) { // check if the form is submitted
	#### removing extra white spaces & escaping harmful characters ####
	$name = $_POST['fullName'];
	$nationalId=$_POST['nationalId'];
	$department=$_POST['department'];
	$email = $_POST['email'];
	$username= $_POST['username'];
	$mobileNumber= $_POST['mobile'];
	$password=$_POST['password'];
	$username=mysql_real_escape_string($username);
	$password=mysql_real_escape_string($password);


	#### start validating input data ####
	#####################################
	$dupEmail=mysqli_query($connection,"SELECT * FROM staff WHERE email ='".$_POST['email']."'");
	$rowId = mysqli_num_rows($dupEmail);
	if($rowId >0){
		$error .='<p class="alert alert-danger">The email provided is already registered.Please choose another.. </p>';
	}

	# Validate name #
		// if its not alpha numeric, throw error
		if (!ctype_alnum($name)) {
			$error .= '<p class="error">Name should be alpha numeric characters only.</p>';
		}
		
	
		// if name is not 3-20 characters long, throw error
		if (strlen($name) < 3 OR strlen($name) > 20) {
			$error .= '<p class="error"> Name should be within 3-20 characters long.</p>';
		}

	

	# Validate Email #
		// if email is invalid, throw error
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // you can also use regex to do same
			$error .= '<p class="error">Enter a valid email address.</p>';
		}

	# Validate Phone #
		// if phone is invalid, throw error
		if (!ctype_digit($mobileNumber) OR strlen($mobileNumber) != 10) {
			$error .= '<p class="error">Enter a valid phone number.</p>';
		}

    mysqli_query($connection,"INSERT INTO staff(FULLNAME,NATIONALID,DEPARTMENT,PHONE,EMAIL,USERNAME,PASSWORD)
VALUES('$name','$nationalId','$department','$mobileNumber','$email','$username','".md5($password)."')");

 
				
}

 ?>