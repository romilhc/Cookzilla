 


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CookZilla</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
   

  
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

		<form class="form-horizontal" method="POST" action="creategroupdata.php">
		  <fieldset>
			<legend>Create Group</legend>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Group Name</label>
			  <div class="col-lg-6">
				<input type="text" class="form-control" name="gname" placeholder="Group Name">
			  </div>
			</div>
			
			<div class="form-group">
			  <label for="textArea" class="col-lg-2 control-label">Group Description</label>
			  <div class="col-lg-6">
				<textarea class="form-control" rows="3" name="gdesc" placeholder="Describe your group"></textarea>
				
			  </div>
			</div>
			<div class="form-group">
			  <div class="col-lg-10 col-lg-offset-2">
				<button type="reset" class="btn btn-default">Cancel</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			  </div>
			</div>
		  </fieldset>
		</form>
		
		
	</body>

	<script type="text/javascript">

		var ename;
		var gname;
		var estime;
		var eetime;
		var edate;




	   



		  function sendRecords(){

			ename = $('#event_name').val();
			edate = $('#pickDate').val();
			estime = $('#datetimepicker3').val();
			
			eetime = $('#datetimepicker4').val();
			

			var formData ={
			  'ename':ename,
			  'gname':gname,
			  'edate':edate,
			  'estime':estime,
			  'eetime':eetime
			};

			alert (formData);
			$.ajax({
			  type:"POST",
			  url:"events_back.php",
			  data:formData,
			  dataType: 'json',
			  cache: false,
			  success: function(result){
				  alert ("Event Created");
			  }
			});

			
		  }
	</script>
  
</html>




