<!Doctype html>
<html>
<head>
    <title>Registered Patients</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>
<div class="container">
    <table border='1' align='center' class='table table-hover text-center pagination'>
        <caption ><h3 class="text-center"><u style="color: #0000FF">Registered Patients</u></h3></caption>

        <th class="text-center">Full Name</th>
        <th class="text-center">Date of Birth</th>
        <th class="text-center">Age</th>
        <th class="text-center">Residential</th>
        <th class="text-center">Next of Kin</th>
        <th class="text-center">Patients Id</th>
        <th class="text-center">Birth Certificate</th>
        <th class="text-center">National Id</th>
        <th class="text-center">Gender</th>
        <th class="text-center">Address</th>
        <th class="text-center">Telephone</th>
        <th class="text-center">Next of Kin Telephone</th>
        <th class="text-center">Date of Registration</th>
        <?php
        /**
         * Created by PhpStorm.
         * User: Lagat
         * Date: 3/19/2017
         * Time: 14:06
         */
        session_start();
        require ('Connection.php');
        if(!isset($_SESSION['logInReceptionist'])){
            header('Location:staffLogIn.php');
        }

        $viewRegisteredPatients="SELECT * FROM PATIENTS";
        $query=mysqli_query($connection,$viewRegisteredPatients);
        while($rows=mysqli_fetch_array($query)){
            echo "<tr><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td><td>$rows[5]</td><td>$rows[6]</td><td>$rows[7]</td><td>$rows[8]</td><td>$rows[9]</td><td>$rows[10]</td><td>$rows[11]</td><td>$rows[12]</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
