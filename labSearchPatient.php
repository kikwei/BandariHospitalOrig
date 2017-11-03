<?php
session_start();
if(!isset($_SESSION['logInLabTech']))
    header('Location:staffLogIn.php');
?>

<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Search Patient</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="labViewTests.php" method="POST">
                    <div class="form-group" role="form">

                        <div class="form-group">
                            <label  class="col-md-4 control-label">Search Id</label>
                            <div class="col-md-6">
                                <input type="text" name="searchId" class="form-control" placeholder="Enter Search Id" autocomplete="on" required/>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" class="btn btn-info pull-right" name="search" value="Search"/>
                        </div>

                    </div>
                </form>
            </div>



        </div>
    </div>
</div>


</body>
</html>