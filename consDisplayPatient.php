<?php
include 'header.php';
?>
<!Doctype html>
<html>
<head>
    <title>View Patient</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>
<div class="col-md-6 col-md-offset-3">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for patient..Enter Patients' Id" title="Type in the Patients Id" class="form-control input-md">
</div>
<div class="col-md-9">

    <form action="" method="POST">
        <table border='1' align='center' class='table table-hover text-center' id="myTable">
            <caption align='center' style='color:#2E4372'><h3 class="text-center"><u>View Patient</u></h3></caption>


            <th>Full Name</th>
            <th>Date of Birth</th>
            <th>Age</th>
            <th>Residential</th>
            <th>Next of Kin</th>
            <th>Patients Id</th>
            <th>Birth Certificate</th>
            <th>National Id</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Telephone</th>
            <th>Next of Kin Telephone</th>
            <th>Status</th>
            <th>Date of Registration</th>
            <?php

            session_start();
            require ('Connection.php');
            if(!isset($_SESSION['logInConsultant'])){
                header('Location:staffLogIn.php');
            }else{


                $search="SELECT * FROM PATIENTS ";

                $query=mysqli_query($connection,$search);



                while($rows=mysqli_fetch_array($query)){


                    echo "<tr><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td><td>$rows[5]</td><td>$rows[6]</td><td>$rows[7]</td><td>$rows[8]</td><td>$rows[9]</td><td>$rows[10]</td><td>$rows[11]</td><td>$rows[12]</td><td>$rows[13]</td></tr>";
                }



            }
            ?>


        </table>

    </form>

    <h3 class='text-center'><a href='consultation_staffhome.php'>Back</a></h3>





</div>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

</body>
</html>