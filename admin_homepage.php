

<!doctype html>
  <html>
<head>
	<title> Admin Homepage Page</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#00FFFF;">

<?php include 'header.php' ?>

          <div class="row">
		      <div class="col-md-6">
			      <div id="aside">
				        <h3> Admin Account</h3></br />
						   <ul>
						   <li><a href="AdminProfile.php"> Admin Profile </a></li><br />
						   <li><a href="#"> Bandari Chat</a></li><br />
						   <li><a href="changePasswordAdmin.php"> Change Password</a></li><br />
						   <li><a href="LogOut.php">Log Out </a></li><br />
						   
						   </ul>
					</div>
</div>
               <div class="col-md-6">
                    <div id="aside">
                           <h3>Admin Home</h3><br />
						   <ul>
						   <li><a href="add_staff.php"> Add Staff Member</a></li><br />
						   <li><a href="displayStaffToEdit.php"> Edit Staff Member</a></li><br />
						   <li><a href="displayStaffToDelete.php"> Delete staff Member</a></li><br />

						    <li><a href="staffContacts.php"> Staffs Contacts</a></li><br />

                            <li> <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#TrackDisease">TrackDiseases</button></li>
<br/>
                            <li> <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#TrackDrugs"> Track Drugs </button></li>


                               <br/>

                               <li> <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#ageDiseaseTrend">Disease Age Trend </button></li>


						   </ul>

                        <div class="modal" id="TrackDisease" tabindex="-1" role="dialog" aria-labelledby="TrackDisease" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h5 class="modal-title" id="dModalLabel">Track Diseases Trend</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form action="adminTrackDisease.php" method="POST" class="form-horizontal">

                                            <div class="form-group">
                                                <label class="col-md-4 col-md-offset-1">Start Date</label>
                                                <div class="col-md-5">
                                                    <input type="date" name="startDate" class="form-control" placeholder="Enter Starting Date" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-md-offset-1">End Date</label>
                                                <div class="col-md-5">
                                                    <input type="date" name="endDate" class="form-control" placeholder="Enter Ending Date">
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div class="col-md-2 col-md-offset-8">
                                                    <button type="submit" name="TrackDisease" class="btn btn-success pull-right">Track Diseases</button>
                                                </div>
                                            </div>

<!--                                            <div class="form-group">-->
<!--                                                <div class="col-md-2 col-md-offset-8">-->
<!--                                                    <button type="submit" name="TrackDisease" class="btn btn-success pull-right"><a href="drugsTrend.php">Trend of Drugs</a></button>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal" id="TrackDrugs" tabindex="-1" role="dialog" aria-labelledby="TrackDrugs" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h5 class="modal-title" id="dModalLabel">Track Drugs Trend</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form action="drugsTrend.php" method="POST" class="form-horizontal">

                                            <div class="form-group">
                                                <label class="col-md-4 col-md-offset-1">Start Date</label>
                                                <div class="col-md-5">
                                                    <input type="date" name="startDate" class="form-control" placeholder="Enter Starting Date" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-md-offset-1">End Date</label>
                                                <div class="col-md-5">
                                                    <input type="date" name="endDate" class="form-control" placeholder="Enter Ending Date">
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div class="col-md-2 col-md-offset-8">
                                                    <button type="submit" name="TrackDrug" class="btn btn-success pull-right">Track Drugs</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal" id="ageDiseaseTrend" tabindex="-1" role="dialog" aria-labelledby="ageDiseaseTrend" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h5 class="modal-title" id="dModalLabel">Track Diseases Trend By Age</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form action="diseaseTrendByAge.php" method="POST" class="form-horizontal">

                                            <div class="form-group">
                                                <label class="col-md-4 col-md-offset-1">Start Date</label>
                                                <div class="col-md-5">
                                                    <input type="date" name="startDate" class="form-control" placeholder="Enter Starting Date" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-md-offset-1">End Date</label>
                                                <div class="col-md-5">
                                                    <input type="date" name="endDate" class="form-control" placeholder="Enter Ending Date">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-4 col-md-offset-1">Start Age</label>
                                                <div class="col-md-5">
                                                    <input type="text" name="startAge" class="form-control" placeholder="Enter Starting Age" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-md-offset-1">End Age</label>
                                                <div class="col-md-5">
                                                    <input type="text" name="endAge" class="form-control" placeholder="Enter Ending Age">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-md-2 col-md-offset-8">
                                                    <button type="submit" name="ageDiseaseTrend" class="btn btn-success pull-right">Track Diseases By Age</button>
                                                </div>
                                            </div>

                                            <!--                                            <div class="form-group">-->
                                            <!--                                                <div class="col-md-2 col-md-offset-8">-->
                                            <!--                                                    <button type="submit" name="TrackDisease" class="btn btn-success pull-right"><a href="drugsTrend.php">Trend of Drugs</a></button>-->
                                            <!--                                                </div>-->
                                            <!--                                            </div>-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                              	
       <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>


						</body>
        </html>						
						   
