 


<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Bootstrap 101 Template</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

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

				//echo $_POST["uname"];
				//echo $_POST["password"];

				if (empty($_POST['uname'])){
				  echo "Enter Username Please";
				}
				else if(!empty($_POST)) {


				if(isset($_POST['uname']) and isset($_POST['password'])) {
				
				
				$uname = $_POST['uname'];
				$password = $_POST['password'];
				//echo $movieName;
				


				// Query
				$sql =
				"SELECT uname,fname,lname from user where uname = '".$uname."' and password ='".$password."'";
				$result = $conn->query($sql);


				// Checking for Invalid Movie Option

				
				if ($result->num_rows === 0) { 
				  echo "";
				  echo '<div class="alert alert-dismissible alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Oh snap! Invalid Username or Password</strong> <a href="index.php" class="alert-link">Change a few things up</a> and try submitting again.
				</div>';
				 
				
				
				}

				else {
					session_start();
					$_SESSION['user']=$_POST['uname'];
					while ($row = $result->fetch_assoc()) {
					
						  echo '<div class="alert alert-dismissible alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Welcome To CookZilla!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
								</div>';
						  header('location: homepage.php');
					}
			}
		}
		}
		?>
    
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
