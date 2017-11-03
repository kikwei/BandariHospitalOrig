<?php

session_start();
if(isset($_SESSION['patient'])) {



    require('Connection.php');

    $query = "SELECT FullName,SignsAndSymptoms,Disease,prescribedDrugs,DateofTreatment FROM Patients NATURAL JOIN patients_disease_record WHERE PatientsId='" . $_SESSION['patient'] . "' AND DateofTreatment='".$_GET['DateofTreatment']."'";
    $result = mysqli_query($connection, $query);

    $rowsAff = mysqli_affected_rows($connection);

    if ($rowsAff > 0) {
        ?>
        <html>
        <head>
            <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        </head>
        </html>
        <body>
        <div class="container">
        <div class="row">
            <caption align='center' style='color:#2E4372'><h4 class="text-center"><u style="color: blue">Patients' Medical Record as at <?php
            echo $_GET['DateofTreatment'];
                        ?></u></h4></caption>
            <table class="table table-hover text-center" border="1">
            <th class="text-center">Patients' Name</th>
            <th class="text-center">Signs And Symptoms</th>
            <th class="text-center">Disease</th>
            <th class="text-center">Prescribed Drugs</th>
            <th class="text-center">Treatment Date</th>
            <?php
            while ($rows = mysqli_fetch_array($result)) {
                echo "<tr><td>$rows[0]</td><td>$rows[1]</td><td> $rows[2]</td><td>$rows[3]</td><td>$rows[4]</td></tr>";
            }

            ?>

        </table>
        </div>

        <?php
    }else{
        echo "<p class='alert alert-danger text-center'>No Previous Medical Record</p>";
    }?>

    <div class="row">
    <?php
    require('Connection.php');
    $sql = "SELECT Tests,Results,ResultsPostedAt FROM Laboratory WHERE LabPatientsId='" . $_SESSION['patient'] . "' AND ResultsPostedAt='".$_GET['DateofTreatment']."'";
    $labResult = mysqli_query($connection, $sql);

    $rowsAff = mysqli_affected_rows($connection);

    if ($rowsAff > 0) {
        ?>

            <caption align='center' style='color:#2E4372'><h4 class="text-center"><u style="color: blue">Patients' Laboratory tests and results as at <?php
                        echo $_GET['DateofTreatment'];
                        ?></u></h4></caption>
            <table class="table table-hover text-center" border="1">

                <th class="text-center">Lab Tests</th>
                <th class="text-center">Lab results</th>
                <th class="text-center">Results Date</th>
                <?php
                while ($rows = mysqli_fetch_array($labResult)) {
                    echo "<tr><td>$rows[0]</td><td>$rows[1]</td><td> $rows[2]</td></tr>";
                }
                ?>

            </table>
        </div>

        <?php
    }else{
        echo "<p class='alert alert-danger text-center'>No Previous Laboratory Tests and Results Found.</p>";
    }

    ?>

    </div>
        </body>
<?php
}
?>