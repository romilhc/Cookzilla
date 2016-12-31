 


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
			"SELECT eid,ename,cookzilla.group.gid,gname,cookzilla.group.desc ,cookzilla.event.edate,TIME_FORMAT(cookzilla.event.estime, '%H:%i') as  estime,TIME_FORMAT(cookzilla.event.eetime, '%H:%i') as eetime
			from cookzilla.event join cookzilla.group on cookzilla.event.gid=cookzilla.group.gid 
			join g_mem on g_mem.gid=cookzilla.group.gid 
			where CONCAT(edate, ' ', estime)>now() and g_mem.uname = '".$_SESSION['user']."' and cookzilla.event.eid not in (select eid from attendees where uname='".$_SESSION['user']."')";
			$result = $conn->query($sql);
			/*
			$sql_events =
			"SELECT gid,gname,cookzilla.group.desc from cookzilla.group join g_mem on g_mem.gid=cookzilla.group.gid where g_mem.uname = '".$_SESSION['user']."'";
			$result_events = $conn->query($sql_events);
			*/
			

			// Checking for Invalid Option
			if ($result->num_rows === 0) { 
				
				echo "";
				echo '<div class="alert alert-dismissible alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Oh snap! No upcoming events.</strong>
				</div>';
			
			}

			else {
				//$tableclass=;
				echo 
					"<table class="."table table-striped table-hover".">
					  <thead>
						<tr>
							<th><b>Group Name</b></th> 
							<th><b>Event Name</b></th> 
							<th><b>Event Date</b></th>
							<th><b>Event Start Time</b></th>
							<th><b>Event End Time</b></th>
							<th></th>
							<th></th>
						</tr>
					  </thead>
					  <tbody>";
				
				while ($row = $result->fetch_assoc()) {
				  
				  echo "<tr><td>" . $row["gname"]."</td><td>" . $row["ename"]."</td><td>" . $row["edate"]."</td><td>" . $row["estime"]. "</td><td>" . $row["eetime"]. "</td><td><a href='viewemem.php?eid=".$row['eid']."' class='btn btn-primary btn-sm'>View Attendees!</a></td><td><a href='rsvp.php?eid=".$row['eid']."' class='btn btn-primary btn-sm'>RSVP!</a></td></tr>";
				
				}
				echo"</tbody></table> ";
			}
		}
	?>
	<!--
	<script>
    function rsvp()
	{
		alert('Something');
		var recipeid = <?php echo $recid; ?>;
		var text1 = $('#ev1').val();
		
			//alert(text1+text2+text3+recipeid);
		var jsonData = {
			'evenid': text1,
			
		};
	
	
	$.ajax({
		type: "POST",
		url: "rsvp.php",
		data: jsonData,
		dataType: 'json',
		success: function(result){
			//alert(result);
			// CALL OTHER FUNCTION
			
		}
		
	});
		location.reload();
		
		
	}
	</script>-->
	<script>
	
	</script>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
  </body>
</html>
