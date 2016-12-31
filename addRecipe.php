 


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
	
		$recid=1;
		
		



		if (!isset($_SESSION['user'])){
		  echo "Enter Username Please";
		}
		else{
			
			

			// Query: Get recipe and title
			$sql =
			"SELECT recipe.rid,rtitle,recipe.desc from recipe where recipe.rid=$recid";
			$result = $conn->query($sql);
			
			
			
			
			
			$row = $result->fetch_assoc();
		}

	?>

<ul class="nav nav-tabs">
  <li class="active"><a href="#recipeDetails" data-toggle="tab" aria-expanded="false">Add Recipe Details</a></li>
  <li class=""><a href="#ingredients" data-toggle="tab" aria-expanded="true">Ingredients</a></li>
  <li class=""><a href = "#Tags" data-toggle="tab" aria-expanded="false">Tags</a></li>
  
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade" id="ingredients">
  	<div class = "container">
  		<div class = "row">
  			<div class = "col-sm-3">
  				 
    				<label for="inputName" class="control-label">Choose Ingredients</label>
    				<select class="form-control" id="ingre_choose">
          			  <?php
          			  $sql_select = "SELECT iname from ingredients";
          			  $results = $conn->query($sql_select);

          			  while($rows=$results->fetch_assoc()){
          			  	echo "<option value='" . $rows['iname'] . "'>" . $rows['iname'] . "</option>";
          			  }
          			  ?>
			        </select>
			</div>
			<div class = "col-sm-3">
			        <label for="inputName" class="control-label">Choose Quantity</label>
			        <select class="form-control" id="qty_choose">
          			  <option>1</option>
			          <option>2</option>
			          <option>3</option>
			          <option>4</option>
			          <option>5</option>
			        </select>
			</div>
			<div class = "col-sm-3">
			        <label for="inputName" class="control-label">Choose Expression</label>
			        <select class="form-control" id= "exp_choose">
			        	<?php 
			        		 $sql_select = "SELECT expname from exp_unit";
          			  		 $results = $conn->query($sql_select);

          			  		while($rows=$results->fetch_assoc()){
          			  		echo "<option value='" . $rows['expname'] . "'>" . $rows['expname'] . "</option>";

          			  }
			        	?>
			        	
			        </select>

			</div>
  			<div class = "col-sm-3">
  			<br>
  				<button type="button" href= "#ingredients" class="btn btn-primary" onclick="addIngredients()">Next</button>
  			</div>	
  			</div>
  			
  		</div>
  	</div>
    
  
  <div class="tab-pane fade active in" id="recipeDetails">
  	<div class = "container">
  		<div class = "row">
  			<div class = "col-sm-6">
  				 
    				<label for="inputName" class="control-label">Recipe Title</label>
    				<input type="text" class="form-control" id="retitle" name="fname" placeholder="Enter Recipe Title" required>

    				<label for="inputName" class="control-label">Description</label>
            		<textarea class="form-control" rows="3" id="desc"></textarea>

            		<label for="inputName" class="control-label">Number of Servings</label>
            		<select class="form-control" id="nos">
          			  <option>1</option>
			          <option>2</option>
			          <option>3</option>
			          <option>4</option>
			          <option>5</option>
			        </select>
        			
        			<br><button type="button" href= "#ingredients" class="btn btn-primary" onclick="addRecipeDetails()">Next</button>	
      				
  			</div>
  			
  		</div>
  	</div>
    
  </div>

   <div class="tab-pane fade" id="Tags">
  	<div class = "container">
  		<div class = "row">
  			<div class = "col-sm-6">
  				 
    				<label for="inputName" class="control-label">Choose Expression</label>
			        <select class="form-control" id= "tags_choose">
			        	<?php 
			        		 $sql_select = "SELECT tname from tags";
          			  		 $results = $conn->query($sql_select);

          			  		while($rows=$results->fetch_assoc()){
          			  		echo "<option value='" . $rows['tname'] . "'>" . $rows['tname'] . "</option>";

          			  }
			        	?>
			        	
			        </select>
    				
      				<br><button type="button" href= "" class="btn btn-primary" onclick="addTags()">Add Tag</button>
  			</div>
  			
  		</div>
  	</div>
    
  </div>

</div>		


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
  </body>
  <script type="text/javascript">
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

  	function addTags(){

  		var tname = $('#tags_choose').val();

  		var jsonData2 = {
  			'tname':tname
  		};

  		$.ajax({
                  type:"POST",
                  url:"insertTags.php",
                  data:jsonData2,
                  dataType: 'json',
                  cache: false,
                  success: function(result){
                      

                  }

                });
  		$('#Tags').prop('selectedIndex',0);
  	}
  </script>
</html>
