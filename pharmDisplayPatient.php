<!Doctype html>
<html>
<head>
    <title>Pharmacy View Patient</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>
<div class="container">

    <form action="" method="POST">
        <table border='1' align='center' class='table table-hover text-center'>
            <caption><h3 class="text-center"><u style="color: #0000FF">View Patient</u></h3></caption>


            <th class="text-center">Patients Name</th>
            <th class="text-center">Patients Id</th>
            <th class="text-center">Signs/Symptoms</th>
            <th class="text-center">Drugs</th>
            <th class="text-center">Disease</th>
            <th class="text-center">Administration Date</th>

            <?php

            session_start();
            require ('Connection.php');
            if(!isset($_SESSION['logInPharmacist'])){
                header('Location:staffLogIn.php');
            }
            if(isset($_POST['view'])){
                $patientsId=$_POST['patientId'];


                //$search="SELECT FullName,Patients.PatientsId,SignsAndSymptoms,Drugs,Disease,AdministrationDate FROM `Pharmacist`  NATURAL JOIN `Patients`  WHERE  PatientsId='".$_POST['patientId']."'";
                $search="SELECT FULLNAME AS PatientsName,PatientsId,SignsAndSymptoms,Drugs,Disease,AdministrationDate FROM PATIENTS NATURAL JOIN Pharmacist  WHERE PatientsId='$patientsId'";

                $query=mysqli_query($connection,$search);


                while($rows=mysqli_fetch_array($query)){

                    echo "<tr><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td><td>$rows[5]</td></tr>";
                }



            }
            ?>


        </table>

<!--        <button type="button" class="btn btn-info pull-right"><a href="pharmDrugAdministration.php">Administer Drugs</a> </button>-->

        <h3 class='text-center'><a href='pharmacy_staffhomepage.php'>Back</a></h3>



    </form>





</div>



</body>
</html>