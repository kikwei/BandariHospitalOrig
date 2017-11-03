
<!doctype html>
<html>
<head>
    <title>Staff Contacts</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>

<form action="deleteStaff.php" method="POST">
    <table border='1' align='center' class='table table-hover text-center'>
        <caption align='center' style='color:#2E4372'><h3 class="text-center"><u style="text-align: center">Staff Contacts</u></h3></caption>

        <th class="text-center">DEPARTMENT</th>

        <th class="text-center">PHONE</th>

        <th class="text-center">EMAIL</th>


        <?php
        require ('Connection.php');
        session_start();
        if(!isset($_SESSION['logInAdministrator'])){
            header('Location:AdminLogIn.php');
        }

        $select="SELECT Department,Phone,Email FROM STAFF";

        $result=mysqli_query($connection,$select);

        while($queryResult=mysqli_fetch_array($result))
        {

            echo"<tr><td>$queryResult[0]</td><td> $queryResult[1]</td><td> $queryResult[2]</td></tr>" ;
        }

        ?>
    </table>

</form>

</body>







