<!doctype html>
<html>
<head>
	<title> Pharmacy Staff Login Page</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#FFF;">
        <?php include 'header.php' ?>

		          <form role="form" method="post" action="" autocomplete="off">
		<div class="container">
<div class="row">
       <div class=" col-sm-6 col-md-6">
		<div class="form-group">
		<b>PHARMACY STAFF LOGIN:</b><br /><br />
		       <label for "username">USERNAME</label>
		<input type="text" name="username" id="username" class="form-control input-lg" placeholder="username" value="<?php if(isset($error)) {echo $_POST['username'];}?>"tabindex="3" required/>
</div>
      </div> 
	         </div>
	              </div>
<div class="container">
         <div class="row">
                  <div class=" col-sm-6 col-md-6">
                         <div  class="form-group">
                              <label for "password">PASSWORD</label>
<input type="password" name="password" id="password" class="form-control input-lg" placeholder="password"  tabindex="1" required/>
            </div> 
			     </div> 
				        </div>
						      </div>
                          <div class="container">
                              <div class="row">
                                  <div class="col-sm-6 col-md-6 ">
                                  <input type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-lg" tabindex="5"><br />
                     </div>
                              </div>
                       </div>
            </form>

                 </div>
	                   </div>
	                     </div>
	              </div> 
				        </div>
	
	               <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
	
	</body>
	</html>