 


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
				session_start();
				//echo $_POST["uname"];
				//echo $_POST["password"];

				if (empty($_SESSION['user'])){
				  echo "Enter Username Please";
				}
				else {
					/*
					$fname = $_POST['fname'];
						$lname = $_POST['lname'];
						$street = $_POST['street'];
						$city = $_POST['city'];
						$state = $_POST['state'];
						$zip = $_POST['zip'];
						$country = $_POST['country'];
					echo $fname.' '.$lname.' '.$street.' '.$city.' '.$state.' '.$zip.' '.$country;*/

					if(isset($_POST['fname']) and isset($_POST['lname']) and isset($_POST['street']) and isset($_POST['city']) and isset($_POST['state']) and isset($_POST['zip']) and isset($_POST['country'])) 
					{
					
					
						
						$fname = $_POST['fname'];
						$lname = $_POST['lname'];
						$street = $_POST['street'];
						$city = $_POST['city'];
						$state = $_POST['state'];
						$zip = $_POST['zip'];
						$country = $_POST['country'];
						echo $fname.' '.$lname.' '.$street.' '.$city.' '.$state.' '.$zip.' '.$country;
						
						
						$sql_proupdate=
						"UPDATE cookzilla.user SET fname='".$fname."',lname='".$lname."',street='".$street."',city='".$city."',state='".$state."',
						zip='".$zip."',country='".$country."' WHERE `uname`='".$_SESSION['user']."'";
						
						if($conn->query($sql_proupdate))
						{
							echo"Success";
							
							header('location: profile.php?uname='.$_SESSION['user']);
							
						}
						

						
					}
				}
		
		?>
    
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
  </body>
</html>
