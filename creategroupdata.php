 


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
					
					$gname = $_POST['gname'];
					$gdesc = $_POST['gdesc'];
						
					//echo $gname.' '.$gdesc;

					if(isset($_POST['gname']) and isset($_POST['gdesc'])) 
					{
					
						$gname = $_POST['gname'];
						$gdesc = $_POST['gdesc'];
							
						//echo $gname.' '.$gdesc;
						
						$sql_getid=
						"select (max(gid)+1) as gid from cookzilla.group";
						
						$result_getid=$conn->query($sql_getid);
						$rowgetid = $result_getid->fetch_assoc();
						//echo $rowgetid['gid'];
						
						
						
						
						
						$sql_creategroup=
						"insert into cookzilla.group (gid,gname,cookzilla.group.desc) values (".$rowgetid['gid'].",'".$gname."','".$gdesc."')";
						$sql_addtogmem=
						"insert into g_mem (gid,uname,jgtime) values (".$rowgetid['gid'].",'".$_SESSION['user']."',NOW())";
						
						
						if( $conn->query($sql_creategroup) and $conn->query($sql_addtogmem))
						{
							echo"Success";
							
							header('location: creategroup.php');
							
						}
						
						
						
					}
				}
		
		?>
    
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
  </body>
</html>
