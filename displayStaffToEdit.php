
<!doctype html>
<html>
<head>
    <title>Admin Edit Staff Details</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
<!--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
<!--    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>

<form action="EditStaffForm.php" method="POST">
    <table border='1' align='center' class='table table-hover text-center' style="font-family: 'Arial Black'">
        <caption  style='color:#2E4372'><h3 class="text-center"><u >Staff Details</u></h3></caption>
        <th>Radio Button</th>
        <th>FULL NAME</th>
        <th>NATIONAL ID</th>
        <th>DEPARTMENT</th>
        <th>PHONE</th>
        <th>EMAIL</th>
        <th>USERNAME</th>

        <?php
        require ('Connection.php');
        session_start();
        if(!isset($_SESSION['logInAdministrator'])){
            header('Location:AdminLogIn.php');
        }

        $select="SELECT * FROM STAFF";

        $result=mysqli_query($connection,$select);

        $selectMin="SELECT MIN(NATIONALID) FROM STAFF";

        $resultMin=mysqli_query($connection,$selectMin);
        $queryResultMin=mysqli_fetch_array($resultMin);





        while($queryResult=mysqli_fetch_array($result))
        {
            echo "<tr><td><input type='radio' name='staffId' value='$queryResult[1]'";

            if($queryResult[1]==$queryResultMin[0])  echo' checked';
            echo "/></td>";

            echo"<td>$queryResult[0]</td><td> $queryResult[1]</td><td> $queryResult[2]</td><td>$queryResult[3]</td><td> $queryResult[4]</td><td>$queryResult[5]</td></tr>" ;
        }

        ?>
    </table>

    <button type="submit" name="editStaff" class="text-center btn btn-info">EDIT STAFF</button>
</form>

</body>







