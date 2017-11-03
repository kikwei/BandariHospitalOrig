<!doctype html>
<html>
<head>
    <title>Available Drugs</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
    <table border='1' align='center' class='table table-hover text-center'>
        <caption align='center' style='color:#2E4372'><h3 class="text-center"><u>Available Drugs</u></h3></caption>

        <th class="text-center">Drug</th>
        <th class="text-center">Available Quantity</th>

        <?php
        require ('Connection.php');
        session_start();
        if(!isset($_SESSION['logInPharmacist'])){
            header('Location:staffLogIn.php');
        }

        $select="SELECT * FROM Drugs";

        $result=mysqli_query($connection,$select);

        while($queryResult=mysqli_fetch_array($result))
        {
            echo "<tr><td> $queryResult[1]</td><td> $queryResult[2]  $queryResult[3]</td></tr>" ;

        }

        ?>
    </table>

</body>
