<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <table class="table table-hover text-center" border="1">
        <caption class="text-center"><u style="color: #0000FF">Admitted Patients</u></caption>

        <th>Patients Name</th>
        <th>Patients Id</th>
        <th>NextOfKinTelephone</th>
        <th>Ward</th>
        <th>Room Number</th>

        <th>PatientAdmittedAt</th>


        <?php
        require('Connection.php');
        session_start();

        if(!isset($_SESSION['logInWard'])) {
            header('Location:staffLogIn.php');
        }

            $query="SELECT FullName ,PatientsId,NextOfKinTelephone,Ward,RoomNumber,PatientAdmittedAt FROM AdmittedPatients NATURAL JOIN Patients  WHERE STATUS='ADMITTED'";

           // $query="SELECT * FROM  AdmittedPatients  WHERE STATUS='ADMITTED'";

            $result=mysqli_query($connection,$query);

            while($rows=mysqli_fetch_array($result))
            {
                echo"<tr><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td><td>$rows[5]</td></tr>";
            }




        ?>

    </table>

    <h3 class="text-center"><a href="ward_staffhome.php">Back</a></h3>

</div>

</body>
</html>
