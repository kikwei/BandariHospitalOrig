<!Doctype html>
<html>
<head>
    <title>Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"
</head>
<body >
<div class="panel panel-success">
    <div class="panel-body" >
        <div class="panel panel-heading">
            <h3 class="panel-title">Welcome to Your Profile
                    Administrator <?php
                    require ('Connection.php');
                    session_start();
                    if(isset($_SESSION['logInAdministrator']))
                    {
                        echo$_SESSION['logInAdministrator'];
                    }
                    else
                        header('Location:AdminLogIn.php');
                    ?></h3>
        </div>
        <table class="table table-responsive" border="1" style="background-color: aquamarine">

<?php
require ('Connection.php');

if(!isset($_SESSION['logInAdministrator']))
    header('AdminLogIn.php');
else
{
    $query="SELECT * FROM Admins ";
    $result=mysqli_query($connection,$query);



    while($queryArray=mysqli_fetch_array($result))
    {
        echo "<tr><td>Full Name</td><td>$queryArray[0]</td></tr>";
        echo "<tr><td>ID Number</td><td>$queryArray[1]</td></tr>";
        echo "<tr><td>Phone Number</td><td>$queryArray[2]</td></tr>";
        echo "<tr><td>Email</td><td>$queryArray[3]</td></tr>";
        echo "<tr><td>Username</td><td>$queryArray[4]</td></tr>";
    }

}
?>
        </table>
    </div>
</div>
</body>
</html>
