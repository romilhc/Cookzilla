 


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<?php
		require 'dbconn.php';
		require 'navbar.php';
	?>
	<?php

		if (!isset($_SESSION['user'])){
		  echo "Enter Username Please";
		}
		else{

			// Query: Get recipe and title
			$sql =
			"SELECT uname,fname,lname,street,city,country,state,zip,propic from user where uname = '".$_SESSION['user']."'";
			$result = $conn->query($sql);


			// Checking for Invalid Option
			if ($result->num_rows === 0) { 
				
				echo "";
				
			
			}

			else {
				//$tableclass=;
				$row = $result->fetch_assoc();
				
			}
		}
	?>
	
	<div class="container">
      <div class="row">
      <!--<div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <A href="edit.html" >Edit Profile</A>

        <A href="edit.html" >Logout</A>
       <br>
		
      </div>-->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row['fname'].' '.$row['lname'];  ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="data:image;base64,<?php echo $row['propic'];?>" class="img-circle img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
				<form class="form-signin" method ="POST" action="editprofiledata.php">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>First Name:</td>
                        <td><input type="text" class="form-control" name="fname" value="<?php echo $row['fname'];  ?>"></td>
                      </tr>
                      <tr>
                        <td>Last Name:</td>
                        <td><input type="text" class="form-control" name="lname" value="<?php echo $row['lname'];  ?>"></td>
                      </tr>
					<tr>
                         
                        <td>Street:</td>
                        <td><input type="text" class="form-control" name="street" value="<?php echo $row['street'];  ?>"></td>
                      </tr>
                        <tr>
                        <td>City:</td>
                        <td><input type="text" class="form-control" name="city" value="<?php echo $row['city'];  ?>"></td>
                      </tr>
                      <tr>
                        <td>State:</td>
                        <td><input type="text" class="form-control" name="state" value="<?php echo $row['state'];  ?>"></td>
                      </tr>
                        <tr>
						<td>Zip Code:</td>
                        <td><input type="text" class="form-control" name="zip" value="<?php echo $row['zip'];  ?>"></td>
                           
                      </tr>
					<tr>
						<td>Country:</td>
                        <td><input type="text" class="form-control" name="country" value="<?php echo $row['country'];  ?>"></td>
                           
                      </tr>
						                      

                    </tbody>
                  </table>
                  
                  <button class="btn btn-primary" type="Submit">Save Changes</button>
				  </form>
				</div>
              </div>
            </div>
                
            
          </div>
        </div>
      </div>
    </div>
	
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
  </body>
</html>
