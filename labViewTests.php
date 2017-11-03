<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    </head>
<body>
<div class="container">
    <table class="table table-hover text-center" border="1">

        <caption align='center' style='color:#2E4372'><h3 class="text-center"><u>Posted Tests</u></h3></caption>

        <th class="text-center">Patients Name</th>
        <th class="text-center">Patients Id</th>
        <th class="text-center">Tests</th>
        <th class="text-center">TestsPostedAt</th>

        <?php
        require('Connection.php');
        session_start();

        if(!isset($_SESSION['logInLabTech']))
            header('Location:staffLogIn.php');
        if(isset($_POST['search']))
        {
            $patientsId=$_POST['searchId'];

            $query="SELECT FULLNAME AS PatientsName,tests,TestsPostedAt FROM PATIENTS  NATURAL JOIN LABORATORY WHERE  LabPatientsId='$patientsId'";

            $result=mysqli_query($connection,$query);

            while($rows=mysqli_fetch_array($result))
            {
                echo"<tr><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td></tr>";
            }


        }

        ?>

    </table>

    <button type="submit" class="btn btn-info pull-right"><a href="postLabResults.php">Enter Results</a> </button>

    <h3 class='text-center'><a href='consultation_staffhome.php'>Back</a></h3>


</div>

</body>
</html>
