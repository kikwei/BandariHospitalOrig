<!Doctype html>
<html>
<head>
    <title>Unattended Patients</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for patient..Enter Patients' Id" title="Type in the Patients Id" class="form-control input-md">
    </div>
    <form action="postDrugsIssued.php" method="GET">
        <table border='1' align='center' class='table table-hover text-center' id="myTable">
            <caption align='center' style='color:#2E4372'><h3 class="text-center"><u>Unattended Patients</u></h3></caption>

            <th>Serve</th>
            <th>Patients Id</th>
            <th>Drugs</th>
            <th>Status</th>
            <th>Administration Posted Date</th>


            <?php

            session_start();
            require ('Connection.php');
            if(!isset($_SESSION['logInPharmacist'])){
                header('Location:staffLogIn.php');
            }


            $query="SELECT * FROM PHARMACIST WHERE STATUS='UNATTENDED' ORDER BY ADMINISTRATIONDATE ASC";

            $queryResult=mysqli_query($connection,$query);



            while($rows=mysqli_fetch_array($queryResult)){

                echo "<tr><td><input type='radio' value='$rows[0]' name='patientsId'> </td><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td></tr>";



            }
            ?>


        </table>
        <h3 class='text-center'><button type="submit" class="btn btn-primary">Attend Patient</button> </h3>

    </form>

     <h3 class='text-center'><button type="button" class="btn btn-primary"><a href="postDrugsIssued.php" target="_blank" style="color: #0fe94e">Post Drugs Issued</a></button> </h3>
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
            td = tr[i].getElementsByTagName("td")[1];
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