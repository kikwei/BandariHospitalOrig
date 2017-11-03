<!Doctype html>
<html>
<head>
    <title>Posted Tests</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>
<div class="container">

    <form action="postLabResults.php" method="GET">
        <table border='1' align='center' class='table table-hover text-center'>
            <caption align='center' style='color:#2E4372'><h3 class="text-center"><u>Unattended Patients</u></h3></caption>

            <th>Serve</th>
            <th>Patients Id</th>
            <th>Tests</th>
            <th>Status</th>
            <th>Tests Posted Date</th>

            <?php

            session_start();
            require ('Connection.php');
            if(!isset($_SESSION['logInLabTech'])){
                header('Location:staffLogIn.php');
            }


            $query="SELECT * FROM LABORATORY WHERE STATUS='NOT TESTED' ORDER BY TestsPostedAT ASC";

            $queryResult=mysqli_query($connection,$query);



            while($rows=mysqli_fetch_array($queryResult)){

                echo "<tr><td><input type='radio' value='$rows[0]' name='patientsId'> </td><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td></tr>";




            }
            ?>


        </table>
        <h3 class='text-center'><button type="submit" class="btn btn-primary">Post Results</button> </h3>
    </form>


    <h3 class='text-center'><a href='lab_staffhome.php'>Back</a></h3>





</div>



</body>
</html>