 


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
	
		//$recid=1;
		
		



		if (!isset($_SESSION['user'])){
		  echo "Enter Username Please";
		}
		else{
			
			$uname = $_SESSION['user'];

			// Query: Get recipe and title
			/*$sql =
			"SELECT recipe.rid,rtitle,recipe.desc from recipe where recipe.rid=$recid";
			$result = $conn->query($sql);
			
			
			
			
			
			$row = $result->fetch_assoc();*/
		}

	?>

  	<!--<div class = "container">
  		<div class = "row">
			<div>
			<ul class="nav nav-tabs">
			  <li class="active"><a href="#past" data-toggle="tab" aria-expanded="false">Unattended Events</a></li>
			  <li class=""><a href="#attended" data-toggle="tab" aria-expanded="true">Attended Events</a></li>
			  
			  
			</ul>
			</div>
			<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade" id="attended">-->
				
	  
		  			
		  				 
		    				
		    				
		          			  <?php
		                  $sql_select = "select e.eid,e.ename,e.edate,TIME_FORMAT(e.estime, '%H:%i') as  estime,TIME_FORMAT(e.eetime, '%H:%i') as eetime 
									from attendees join cookzilla.event as e on attendees.eid=e.eid 
									where  CONCAT(edate,' ',eetime)<NOW() and attendees.uname='".$uname."'";
		          			  //$sql_select = "select ename, edate from cookzilla.event where edate < CURDATE() and uname='".$uname."'";
		                  //echo $sql_select;
		          			  $results = $conn->query($sql_select);
		                  echo "<table class="."table table-striped table-hover".">
		                            
		                            <tbody>";

		                  echo "<tr><td><b>Event Name</b></td><td><b>Event Date</b></td><td><b>Event Start Time</b></td><td><b>Event End Time</b></td></tr>";
		          			  while($rows = $results->fetch_assoc()){
		          			  	echo "<tr><td>" . $rows['ename']. "</td><td>" . $rows['edate']. "</td><td>" . $rows['estime']. "</td><td>" . $rows['eetime']. "</td><td><a href='viewemem.php?eid=".$rows['eid']."' class='btn btn-primary btn-sm'>View Attendees!</a></td></tr>";
		          			  }
		                  echo "</table>";
		          			  ?>
					           
					
					
	  			
	  			
	  		<!--</div>
    
    
  
  			<div class="tab-pane fade active in" id="past">
  	
	  			
	  				 
	           		<?php
	                  $sql_select = "select e.gid,e.ename,e.edate,TIME_FORMAT(e.estime, '%H:%i') as  estime,TIME_FORMAT(e.eetime, '%H:%i') as eetime 
								from attendees join cookzilla.event as e on attendees.eid=e.eid 
								where  CONCAT(edate,' ',eetime)<NOW() and attendees.uname<>'".$uname."'  and e.gid in (SELECT cookzilla.group.gid 
				from cookzilla.group join g_mem on g_mem.gid=cookzilla.group.gid 
			    where g_mem.uname ='".$uname."')";
	                  //$sql_select = "select ename, edate from cookzilla.event where edate < CURDATE() and uname='".$uname."'";
	                  //echo $sql_select;
	                  $results = $conn->query($sql_select);
	                  echo "<table class="."table table-striped table-hover".">
	                            
	                            <tbody>";

	                  echo "<tr><td><b>Event Name</b></td><td><b>Event Date</b></td><td><b>Event Start Time</b></td><td><b>Event End Time</b></td></tr>";
		          			  while($rows = $results->fetch_assoc()){
		          			  	echo "<tr><td>" . $rows['ename']. "</td><td>" . $rows['edate']. "</td><td>" . $rows['estime']. "</td><td>" . $rows['eetime']. "</td></tr>";
		          			  }
		                  echo "</table>";
		          			  ?>
	    				
	      				
	  			
  			
  			</div>
  			</div>
  		</div>
    
  </div>-->
 
	


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
  </body>
  <!--<script type="text/javascript">
  		var retitle;
  		var desc;
  		var nos;

  		var iname;
  		var qty;
  		var expname;

  	function addRecipeDetails() {
  		
  		
  		retitle = $('#retitle').val();
  		desc = $('#desc').val();
  		nos = $('#nos').val();

  		alert (retitle+desc+nos);
  		var jsonData = {
  			'retitle':retitle,
  			'desc': desc,
  			'nos': nos
  		};

  		$.ajax({
                  type:"POST",
                  url:"insertRecDetails.php",
                  data:jsonData,
                  dataType: 'json',
                  cache: false,
                  success: function(result){
                      alert ("Awesome");

                  }

                });

  	}

  	function addIngredients() {

  		iname = $('#ingre_choose').val();
  		qty = $('#qty_choose').val();
  		expname = $('#exp_choose').val();
  		alert(iname+qty+expname);
  		var jsonData1 = {
  			'iname':iname,
  			'qty':qty,
  			'expname':expname
  		};
  		$('#ingre_choose').prop('selectedIndex',0);
  		$.ajax({
                  type:"POST",
                  url:"insertIngredients.php",
                  data:jsonData1,
                  dataType: 'json',
                  cache: false,
                  success: function(result){
                      

                  }

                });
  		// body...
  		
  		$('#qty_choose').prop('selectedIndex',0);
  		$('#exp_choose').prop('selectedIndex',0);

  	}
  </script>-->
</html>
