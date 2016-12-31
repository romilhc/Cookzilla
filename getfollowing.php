 


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

	$us=$_GET['uname'];


		if (!isset($_SESSION['user'])){
		  echo "Enter Username Please";
		}
		else{

			// Query: Get recipe and title
			/*if($us===$_SESSION['user'])
		      {
		        $flag=TRUE;
		  			$sql =
		  			"SELECT uname,fname,lname,street,city,country,state,zip,propic from user join follows on user.uname=follows.uname where funame = '".$_SESSION['user']."'";
		  		}
		      else
		      {*/
		        $sql =
		        "SELECT user.uname,fname,lname,street,city,country,state,zip,propic from user join follows on user.uname=follows.funame where follows.uname = '".$us."'";
		      //}


			
			$result = $conn->query($sql);


			// Checking for Invalid Option
			if ($result->num_rows === 0) { 
				
				echo "";
				echo '<div class="alert alert-dismissible alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Oh snap! There are no followings for the requested user.</strong>
				</div>';
			
			}

			else {
				//$tableclass=;
				echo 
					"<table class="."table table-striped table-hover".">
					  
					  <tbody>";
				
				while ($row = $result->fetch_assoc()) {
				  


				  
					echo "<tr><td><div class='col-sm-2'><div class='thumbnail'><img class='img-responsive user-photo' src='data:image;base64,".$row['propic']."'>				  </div></div></td><td><h5>" . $row['fname'].' '.$row['lname']. "</h5></td><td></td><td>";
				  
	              

                  //$result_checkfollower=$conn->query($sql_checkfollower);
                  //$row_checkfollower=$result_checkfollower->fetch_assoc();
                  /*if($result_checkfollower->num_rows===0)
                  {
                     echo"<a href='addfollow.php?uname=".$row['uname']."' class='btn btn-primary btn-sm'>Follow</a>";
                   }
                   else
                   {
                     echo"<a href='unfollow.php?uname=".$row['uname']."' class='btn btn-primary btn-sm'>Unfollow</a>";
                   }*/

                   if($row['uname']===$_SESSION['user'])
				  {
				  	echo'</td></tr>';
				  }
					else{


						$sql_checkfollower=
	                  "select uname as uname1,funame as uname2 from follows where uname='".$us."' and funame='".$row['uname']."'";
	                  $result_checkfollower=$conn->query($sql_checkfollower);
						if($result_checkfollower->num_rows===0)
	                  {
	                     echo"<a href='addfollow.php?uname=".$row['uname']."' class='btn btn-primary btn-sm'>Follow</a>";
	                   }
	                   else
	                   {
	                     echo"<a href='unfollow.php?uname=".$row['uname']."' class='btn btn-primary btn-sm'>Unfollow</a>";
	                   }
						echo"</td><td><a href='profile.php?uname=".$row['uname']."' class='btn btn-primary btn-sm'>View Profile</a></td></tr>";
					}
				  
				
				}
				echo"</tbody></table> ";
			}
		}
	?>
    
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
  </body>
</html>
