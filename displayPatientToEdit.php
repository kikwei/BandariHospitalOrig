<!Doctype html>
<html>
<head>
    <title>Edit Patient</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>
<div class="container">

    <form action="EditPatientForm.php" method="POST">
        <table border='1' align='center' class='table table-hover text-center'>
            <caption align='center' style='color:#2E4372'><h3><u>Edit Patient</u></h3></caption>

            <th>Radio Button</th>
            <th>Full Name</th>
            <th>Date of Birth</th>
            <th>Residential</th>
            <th>Next of Kin</th>
            <th>Patients Id</th>
            <th>Birth Certificate</th>
            <th>National Id</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Telephone</th>
            <th>Next of Kin Telephone</th>
            <th>Date of Registration</th>
            <?php

            session_start();
            require ('Connection.php');
            if(!isset($_SESSION['logInReceptionist'])){
                header('Location:staffLogIn.php');
            }
            if(isset($_POST['search'])){
                $searchId=$_POST['searchId'];
//                $search="SELECT * FROM PATIENTS";

                $selectId="SELECT * FROM patients WHERE PatientsId='$searchId'";
                $patient=mysqli_query($connection,$selectId);

                $rows=mysqli_num_rows($patient);

                if($rows==0)
                {
                    header('Location:SearchPatientToEdit.php');
                    echo "<p class='alert alert-danger'>No Patient Found</p>";
                }
                else
                    {
                    $search="SELECT * FROM PATIENTS WHERE PatientsId='".$_POST['searchId']."' OR  BirthCertificate='".$_POST['searchId']."' OR NationalId='".$_POST['searchId']."'";

                    $query=mysqli_query($connection,$search);



                    while($rows=mysqli_fetch_array($query))
                    {


                        echo "<tr><td><input type='radio' name='searchId' value='".$rows[4]."'></td><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td><td>$rows[5]</td><td>$rows[6]</td><td>$rows[7]</td><td>$rows[8]</td><td>$rows[9]</td><td>$rows[10]</td><td>$rows[11]</td></tr>";
                    }



                }


                }

?>




        </table>
        <button type="submit" name="editPatient" class="alert alert-info">Edit</button>
        <?php
        echo"<a href='reception_staffhome.php'>Back</a>";
        ?>
    </form>





</div>



</body>
</html>