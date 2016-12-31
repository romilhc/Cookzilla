 


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

		$keyword = $_POST['keyword'];
		$flag=0;

		if (!isset($_SESSION['user'])){
		  echo "Enter Username Please";
		}
		else{
			echo"<h5>Your searched for $keyword<h5>";
			// Query: Search functionality for recipes and tags
			$sql =
			"SELECT recipe.rid,uname,rtitle,recipe.desc,tags.tname from recipe join rec_tag on recipe.rid=rec_tag.rid join tags on rec_tag.tid=tags.tid 
			where rtitle like '%$keyword%' or recipe.desc like '%$keyword%'";
			$result = $conn->query($sql);
			
			
			// Checking for Invalid Option
			if ($result->num_rows === 0) { 
				
			
			}

			else {
				$flag=1;
				//$tableclass=;
				echo"<div class='panel panel-primary'>
				  <div class='panel-heading'>
					<h3 class='panel-title'>Recipe</h3>
				  </div>
				  <div class='panel-body'>";
				echo 
					"<table class="."table table-striped table-hover".">
					  <thead>
						<tr> 
							<th><b>Recipe Title</b></th>
							<th><b>Posted By</b></th>
							<th><b>Description</b></th>
							
						</tr>
					  </thead>
					  <tbody>";
				
				while ($row = $result->fetch_assoc()) {
				  
				  echo "<tr><td><a href='disprecipe.php?recid=".$row['rid']."'>" . $row["rtitle"]. "</a></td><td>" . $row["uname"]. "</td><td>" . $row["desc"]. "</td></tr>";
				
				}
				echo"</tbody></table> </div></div>";
			}
			
			
			// Query: Search functionality for recipes and tags
			$sql =
			"SELECT recipe.rid,uname,rtitle,recipe.desc,tags.tname from recipe join rec_tag on recipe.rid=rec_tag.rid join tags on rec_tag.tid=tags.tid 
			where tags.tname like '%$keyword%'";
			$result = $conn->query($sql);
			
			
			// Checking for Invalid Option
			if ($result->num_rows === 0) { 
				
			
			}

			else {
				$flag=1;
				//$tableclass=;
				echo"<div class='panel panel-primary'>
				  <div class='panel-heading'>
					<h3 class='panel-title'>Tags</h3>
				  </div>
				  <div class='panel-body'>";
				echo 
					"<table class="."table table-striped table-hover".">
					  <thead>
						<tr> 
							<th><b>Recipe Title</b></th>
							<th><b>Posted By</b></th>
							<th><b>Description</b></th>
							<th><b>Tag</b></th>
						</tr>
					  </thead>
					  <tbody>";
				
				while ($row = $result->fetch_assoc()) {
				  
				  echo "<tr><td><a href='disprecipe.php?recid=".$row['rid']."'>" . $row["rtitle"]. "</a></td><td>" . $row["uname"]. "</td><td>" . $row["desc"]. "</td><td>" . $row["tname"]. "</td></tr>";
				
				}
				echo"</tbody></table> </div></div>";
			}



			// Query: Search functionality for Groups
			$sql =
			"SELECT g.gid,gname, g.desc,count(uname) as nou 
			from cookzilla.group as g join g_mem on g.gid=g_mem.gid 
			where gname like '%$keyword%' or g.desc like '%$keyword%' 
			group by g.gid";
			$result = $conn->query($sql);
			
			
			// Checking for Invalid Option
			if ($result->num_rows === 0) { 
				
			
			}

			else {
				$flag=1;
				//$tableclass=;
				echo"<div class='panel panel-primary'>
				  <div class='panel-heading'>
					<h3 class='panel-title'>Groups</h3>
				  </div>
				  <div class='panel-body'>";
				echo 
					"<table class="."table table-striped table-hover".">
					  <thead>
						<tr> 
							<th><b>Group Name</b></th>
							<th><b>Group Description</b></th>
							<th><b>No. of Members</b></th>
						</tr>
					  </thead>
					  <tbody>";
				
				while ($row = $result->fetch_assoc()) {
				  
				  echo "<tr><td>" . $row["gname"]. "</td><td>" . $row["desc"]. "</td><td>" . $row["nou"]. "</td></tr>";
				
				}
				echo"</tbody></table> </div></div>";
			}
			
			
			
			// Query: Search functionality for events
			$sql =
			"SELECT gname,g.desc,e.ename,TIME_FORMAT(e.estime, '%H:%i') as estime,TIME_FORMAT(e.eetime, '%H:%i') as eetime,e.edate
			from cookzilla.group as g join cookzilla.event as e on g.gid=e.eid
			where e.ename like '%$keyword%'";
			$result = $conn->query($sql);
			
			
			// Checking for Invalid Option
			if ($result->num_rows === 0) { 
				
				$flag=1;
			
			}

			else {
				//$tableclass=;
				echo"<div class='panel panel-primary'>
				  <div class='panel-heading'>
					<h3 class='panel-title'>Events</h3>
				  </div>
				  <div class='panel-body'>";
				echo 
					"<table class="."table table-striped table-hover".">
					  <thead>
						<tr>
							<th><b>Group Name</b></th> 
							<th><b>Group Description</b></th>
							<th><b>Event Name</b></th>
							<th><b>Start Time</b></th>
							<th><b>End Time</b></th>
							<th><b>Date</b></th>
						</tr>
					  </thead>
					  <tbody>";
				
				while ($row = $result->fetch_assoc()) {
				  
				  echo "<tr><td>" . $row["gname"]."</td><td>" . $row["desc"]. "</td><td>" . $row["ename"]. "</td><td>" . $row["estime"]. "</td><td>" . $row["eetime"]. "</td><td>" . $row["edate"]. "</td></tr>";
				
				}
				echo"</tbody></table> </div></div>";
			}
			
			
		}
		if($flag===0)
			{
				
				echo"<h5>No result found.<h5>";
			}
	?>
    
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
  </body>
</html>
