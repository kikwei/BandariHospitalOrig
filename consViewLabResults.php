<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <form action="consAttendPatient.php" method="GET">
    <table class="table table-hover text-center" border="1">
        <caption align='center' style='color:#2E4372'><h3 class="text-center"><u>Laboratory Results</u></h3></caption>
        <th class="text-center">Choose Patient</th>
        <th class="text-center">Patients Id</th>
        <th class="text-center">Tests</th>
        <th class="text-center">Tests Date</th>
        <th class="text-center">Results</th>
        <th class="text-center">Results Date</th>

        <?php
        require('Connection.php');
        session_start();

        if(!isset($_SESSION['logInConsultant']))

            header('Location:staffLogIn.php');


          $query="SELECT LabPatientsId,tests,TestsPostedAt,Results,ResultsPostedAt FROM LABORATORY   WHERE ConsultationStatus='NOT RECEIVED' AND Status='Tested' ORDER BY ResultsPostedAt ASC ";


            $result=mysqli_query($connection,$query);

            while($rows=mysqli_fetch_array($result))
            {
                echo"<tr><td><input type='checkbox' value='$rows[0]' name='patientsId'> </td><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td></tr>";
            }


echo $rows[0];

        ?>

    </table>
        <h3 class='text-center'><button type="submit" class="btn btn-primary">Attend Patient</button> </h3>
    </form>

   <h3 class='text-center'><a href='consultation_staffhome.php'>Back</a></h3>



</div>

</body>
</html>
