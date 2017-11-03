<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['submit'])){
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
        $username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];
		$username = stripslashes($username);
		$username = mysql_real_escape_string($username);
		$email = stripslashes($email);
		$email = mysql_real_escape_string($email);
		$password = stripslashes($password);
		$password = mysql_real_escape_string($password);
		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (firstname,lastname,username, password, email, trn_date) VALUES ('$firstname','$lastname','$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysql_query($query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='logiin.php'>Login</a></div>";
        }
    }else{
?>
<div class="form" style="background-color:#FFFF00">
<h1>Registration Form</h1>
<form name="registration" border="10"action="" method="post">
First Name:<br />
<input type="text" name="firstname" placeholder="firstname" required /><br /><br />
Last Name:<br />
<input type="text" name="lastname" placeholder="lastname" required /><br /><br />
Username:<br />
<input type="text" name="username" placeholder="Username" required /><br /><br />
Email:<br />
<input type="email" name="email" placeholder="Email" required /><br /><br />
Password:<br />
<input type="password" name="password" placeholder="Password" required /><br /><br />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>
