 


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

    <!--<link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />-->
	<script src="js/star-rating.js" type="text/javascript"></script>
	<style>
	   .glyphicon-star {
	        color: #FFDF00;    
	   }

	</style>


  </head>
  <body>
	<?php
		require 'dbconn.php';
		require 'navbar.php';
	?>
	<!--<div class="container">
		<div class="row">
			<div class="col-sm-4 col-md-4 user-details">
				<div class="user-image">
					<img src="http://www.gravatar.com/avatar/2ab7b2009d27ec37bffee791819a090c?s=100&d=mm&r=g" alt="Karan Singh Sisodia" title="Karan Singh Sisodia" class="img-circle">
				</div>
				<div class="user-info-block">
					<div class="user-heading">
						<h3>Karan Singh Sisodia</h3>
						<span class="help-block">Chandigarh, IN</span>
					</div>
					<ul class="nav nav-pills">
						<li class="active">
							<a data-toggle="tab" href="#information">
								<span class="glyphicon glyphicon-user"></span>
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#settings">
								<span class="glyphicon glyphicon-cog"></span>
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#email">
								<span class="glyphicon glyphicon-envelope"></span>
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#events">
								<span class="glyphicon glyphicon-calendar"></span>
							</a>
						</li>
					</ul>
					<div class="user-body">
						<div class="tab-content">
							<div id="information" class="tab-pane active">
								<h4>Account Information</h4>
							</div>
							<div id="settings" class="tab-pane">
								<h4>Settings</h4>
							</div>
							<div id="email" class="tab-pane">
								<h4>Send Message</h4>
							</div>
							<div id="events" class="tab-pane">
								<h4>Events</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<?php
		$recid=$_GET['recid'];
		
		$_SESSION['rid']=$recid;

		if (!isset($_SESSION['user'])){
		  echo "Enter Username Please";
		}
		else{
			//By Drumil Query for insertion in views table
			$uname = $_SESSION['user'];

			$sql_insertview = "INSERT into views(uname,rid,timestamp)values('".$uname."',".$recid.",NOW())";
			if($conn->query($sql_insertview)=== TRUE){
					//echo "Record Inserted";
				//echo'<script>alert("Hello")</script>';
					}
			//By Drumil



			// Query: Get recipe and title
			$sql =
			"SELECT recipe.rid,rtitle,recipe.desc,recipe.pics from recipe where recipe.rid=$recid";
			$result = $conn->query($sql);
			
			
			
			
			
			$row = $result->fetch_assoc();

	?>		
			<div class='container'>
					<div class='row'>
						<div class='col-sm-20 col-md-16 user-details'>
							<div>
							
								<img src='data:image;base64,<?php echo $row['pics'];?>' alt='Recipe Pic' title='Recipe Pic' style="width:128px;height:128px">
							</div>
							<div>
								<div>
									<h3><?php echo $row['rtitle'];
									
									?>
									</h3>
								</div>
								
										
									 <?php
											  $row_geteditrec="select * from recipe where rid=$recid and uname='".$_SESSION['user']."'";
												$result_geteditrec=$conn->query($row_geteditrec);
												if($result_geteditrec->num_rows>0)
												{
													echo '<div class="fileinput fileinput-new" data-provides="fileinput">
											    <form enctype="multipart/form-data" method="post">
													    <span class="btn btn-primary btn-sm"><input type="file" color="#FFFFFF" name="pics"/></span>
													    
													     <input  type="submit" value="Upload" name="up" class="btn btn-primary btn-sm"/>
						                		</form>
											</div>';
													//echo "<a href='deleterecipe.php?recid=".$recid."'' class='btn btn-primary btn-sm'>Delete Recipe!</a><br><br>";
												}
												?>		
											

											  
						                 
						               
						                  <?php
						                  	function saveimg($pics,$recid)
						                    {
						                      require 'dbconn.php';
						                      $sqluploadimg = "UPDATE recipe SET pics='$pics' WHERE rid=$recid";
						                      $resultup=$conn->query($sqluploadimg);
						                      if($resultup)
						                      {
						                        echo"Image uploaded";
						                        
						                        ?>
						                        <script>
						                        window.location.href = 'disprecipe.php?recid=<?php echo $recid;?>';
						                        </script>
						                        <?php

						                      }
						                      else
						                      {
						                        echo"Image not uploaded";
						                      }


						                    }



						                    if(isset($_POST['up']))
						                    {

						                      if(getimagesize($_FILES['pics']['tmp_name'])==FALSE)
						                      {
						                          echo"Please select an image";
						                      }
						                      else
						                      {
						                          $pics=addslashes($_FILES['pics']['tmp_name']);
						                          $pics=file_get_contents($pics);
						                          $pics=base64_encode($pics);
						                          saveimg($pics,$recid);

						                      }
						                    }

											if(isset($_POST['like']))
						                    {

						                      $sql_like="Insert into likes (uname,rid,ltime) values ('".$_SESSION['user']."',$recid,NOW())";
												if($conn->query($sql_like))
												{
													 ?>
								                        <script>
								                        window.location.href = 'disprecipe.php?recid=<?php echo $recid;?>';
								                        </script>
								                        <?php

												}	
						                    }
						                    
						                    ?>
								</div>

								<div>
									<?php $sqllike =
									"SELECT * from recipe join likes on recipe.rid=likes.rid where likes.uname='".$_SESSION['user']."' and recipe.rid=$recid";
									$resultlike = $conn->query($sqllike);
									if ($resultlike->num_rows === 0) { 
										echo "<form enctype='multipart/form-data' method='post'><input  type='submit' value='Like!' name='like' class='btn btn-primary btn-sm'/></form>";
									}

									?>



								</div>
								<br>
								<div>
								<ul class='nav nav-tabs'>
								  <li class='active'><a href='#information' data-toggle='tab'>Recipe Information</a></li>
								  <li><a href='#ingredients' data-toggle='tab'>Ingredients</a></li>
								  <li><a href='#tags' data-toggle='tab'>Tags</a></li>
								  <li><a href='#reviews' data-toggle='tab'>Reviews and Ratings</a></li>
								</ul>
								</div>
								<div id='myTabContent' class='tab-content'>
									<div class='tab-pane fade active in' id='information'>
										
											<table class='table table-user-information'>
											
												<tbody>
												  <tr>
													<td>Recipe Title:</td>
													<td><?php echo $row['rtitle'];?></td>
												  </tr>
												  <tr>
													<td>Description:</td>
													<td><?php echo $row['desc'];?></td>
												  </tr>
												  
												</tbody>
											  </table>

											  <!--By Drumil Button to edit details-->
											  <?php
											  $row_geteditrec="select * from recipe where rid=$recid and uname='".$_SESSION['user']."'";
												$result_geteditrec=$conn->query($row_geteditrec);
												if($result_geteditrec->num_rows>0)
												{
													echo '<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary" >Edit Details</button>';
												}
												?>			
												<!--By Drumil-->


									
									</div>
								   <div class='tab-pane fade' id='ingredients'>
										
										<?php
										
											$sql1 =
											"SELECT recipe.rid,ingredients.iname,exp_unit.expname,rec_ingre.qty
											from recipe join rec_ingre on recipe.rid=rec_ingre.rid 
											join ingredients on rec_ingre.iid=ingredients.iid 
											join exp_unit on rec_ingre.expuid=exp_unit.expid 
											where recipe.rid=$recid";
											$result1 = $conn->query($sql1);
											if ($result1->num_rows === 0) { 
												echo "No Ingredients for this recipe.";
											}
											
											else {
												//$tableclass=;
												echo 
													"<table class="."table table-striped table-hover".">
													   <thead>
														<tr> 
															<th><b>Ingredient Name</b></th>
															<th><b>Expression</b></th>
															<th><b>Quantity</b></th>
															
														</tr>
													  </thead>
													  <tbody>";
												
												while ($row1 = $result1->fetch_assoc()) {
												  
												  echo "<tr><td>" . $row1["iname"]. "</td><td>" . $row1["expname"]. "</td><td>" . $row1["qty"]. "</td></tr>";
												
												}
												echo"</tbody></table> ";
											}
											
		
										?>
										
										 <!--By Drumil Button to edit ingredients-->	
										  <?php
											  $row_geteditrec="select * from recipe where rid=$recid and uname='".$_SESSION['user']."'";
												$result_geteditrec=$conn->query($row_geteditrec);
												if($result_geteditrec->num_rows>0)
												{
													echo '<button type="button" data-toggle="modal" data-target="#myModal2 " class="btn btn-primary">Edit Ingredients</button>';
												}
												?>	
											<!--By Drumil-->

										

									</div>
								
								  <div class='tab-pane fade' id='tags'>
										
										<?php
										
											$sql2 =
											"SELECT recipe.rid,tags.tname from recipe join rec_tag on recipe.rid=rec_tag.rid join tags on rec_tag.tid=tags.tid where recipe.rid=$recid";
											$result2 = $conn->query($sql2);
											if ($result2->num_rows === 0) { 
												echo "No Tags for this recipe.";
											}
											
											else {
												//$tableclass=;
												echo 
													"<table class="."table table-striped table-hover".">
													  
													  <tbody>";
												
												while ($row2 = $result2->fetch_assoc()) {
												  
												  echo "<tr><td>" . $row2["tname"]. "</td></tr>";
												
												}
												echo"</tbody></table> ";
											}
		
										?>

										 <!--By Drumil Button to edit ingredients-->
										 <?php
											  $row_geteditrec="select * from recipe where rid=$recid and uname='".$_SESSION['user']."'";
												$result_geteditrec=$conn->query($row_geteditrec);
												if($result_geteditrec->num_rows>0)
												{
													echo '<button type="button" data-toggle="modal" data-target="#myModal3 " class="btn btn-primary">Edit Tags</button>';
												}
												?>	
										
										<!--By Drumil-->
									</div>
									
									<div class='tab-pane fade' id='reviews'>
										
										<?php
										
											$sql3 =
											"select reviewid,rid,retitle,retext,uname,ratings from rec_rate where rid=$recid";
											$result3 = $conn->query($sql3);
											if ($result2->num_rows === 0) { 
												echo "No Tags for this recipe.";
											}
											
											else {
												
												//$tableclass=;
												/*echo 
													"<table class="."table table-striped table-hover".">
														<thead>
															<tr> 
																<th><b>Review Title</b></th>
																<th><b>Review Description</b></th>
																<th><b>Posted By</b></th>
																<th><b>Rating</b></th>
																
															</tr>
														</thead>
													  <tbody>";
												*/
												while ($row3 = $result3->fetch_assoc()) {
												  
												  $sql_getupropic=
												  "select propic from user where uname='".$row3['uname']."'";
												  $result_getupropic=$conn->query($sql_getupropic);
												  if($result_getupropic->num_rows>0)
												  {
												  	$row_getupropic=$result_getupropic->fetch_assoc();
												  }

												  echo'
												  <div class="container">
											
													
													<div class="col-sm-1">
													<div class="thumbnail">
													<img class="img-responsive user-photo" src="data:image;base64,'.$row_getupropic['propic'].'">
													</div>
													</div>

													<div class="col-sm-8">
													<div class="panel panel-primary">
													<div class="panel-heading">
													<strong>'.$row3['uname'].'</strong> <span><i><b>  Posted   </b></i></span><span>'.$row3['retitle'].'
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					                                
							                               ';
							                                for($x=1;$x<=$row3['ratings'];$x++)
							                                {
							                                	echo'<span class="glyphicon glyphicon-star" ></span>';
							                                }
							                                for($x=5;$x>$row3['ratings'];$x--)
							                                {
							                                	echo'<span class="glyphicon glyphicon-star-empty" ></span>';
							                                }

							                                    
							                                echo'
							                            </span>
													</div>
													<div class="panel-body">
													'.$row3['retext'].'
													</div>
													</div>
													
													</div>
														
													
													</div>


													
												  ';
													
												
												}
												echo'<table class="table table-striped table-hover"><tbody><tr>
													<td><input type="text" class="form-control" placeholder="Title" name="title" id ="tb1"></td>
												
													<td><input type="text" class="form-control" placeholder="Text" name="text" id="tb2"></td>
												
													<td><select class="form-control" id="tb3" name="ratings">
													<option value=1>1</option>
													<option value=2>2</option>
													<option value=3>3</option>
													<option value=4>4</option>
													<option value=5>5</option> 
													</select>
													</td>
												
													<td><a onclick="addReview()" class="btn btn-primary btn-sm">Add my review!</a></td>
												</tr>
												';
												
												echo"</tbody></table> ";
											}
		}
										?>

											<!--<div class="container">
											
											<div class="row">
											<div class="col-sm-1">
											<div class="thumbnail">
											<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
											</div>
											</div>

											<div class="col-sm-8">
											<div class="panel panel-primary">
											<div class="panel-heading">
											<strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
											</div>
											<div class="panel-body">
											Panel content
											</div>
											</div>
											</div>

											

											</div>-->






									</div>
								</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				
	<!--By Drumil Modal Code-->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="container-fluid">
				<div class="row">
						<div class="col-md-6 ">
								<h1 class="text-center login-title">Edit Recipes</h1>
								<div class="account-wall">
									<form class="form-signin" method ="POST" action="updateRec.php">

										<table class='table table-user-information'>
											
												<tbody>
												  <tr>
													<td>Recipe Title:</td>
													<td><input type="text" class="form-control" placeholder="Email" name="retitle" required autofocus value=" <?php echo $row['rtitle'];?>">
													</td>
												  </tr>
												  <tr>
													<td>Description:</td>
													<td><input type="text" class="form-control" placeholder="Email" name="desc" required autofocus value=" <?php echo $row['desc'];?>">
													</td>
												  </tr>
												  

												</tbody>
											  </table>

										 <div class="form-group">
    									<button type="submit" class="btn btn-primary">Submit</button>
 										 </div>
									
									
									</form>
								</div>
							
						</div>
				</div>
			</div>
	  </div>
	</div>

		<div id="myModal2" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="container-fluid">
				<div class="row">
						<div class="col-md-6 ">
								<h1 class="text-center login-title">Edit Recipes</h1>
								<div class="account-wall">
									<form class="form-signin" method ="POST" action="updateIngre.php">

									<?php
									
									$sql1 =
											"SELECT recipe.rid,ingredients.iname,exp_unit.expname,rec_ingre.qty
											from recipe join rec_ingre on recipe.rid=rec_ingre.rid 
											join ingredients on rec_ingre.iid=ingredients.iid 
											join exp_unit on rec_ingre.expuid=exp_unit.expid 
											where recipe.rid=$recid";

											$result1 = $conn->query($sql1);
											if ($result1->num_rows === 0) { 
												echo "No Ingredients for this recipe.";
											}
											
											else {
												//$tableclass=;
												
												$count=0;
												
												while ($row1 = $result1->fetch_assoc()) {
												  
												  $sql_select = "SELECT iname from ingredients";
												  

							          			  $results = $conn->query($sql_select);
							          			  

							          			  echo "<select class='form-control' name='dropdown".$count."' id='dropdown".$count."'>";
							          			  echo "<option selected = 'selected'>".$row1['iname']."</option>";
							          			  while($rows=$results->fetch_assoc()){

							          			  	echo "<option value='" . $rows['iname'] . "'>" . $rows['iname'] . "</option>";
							          			  }
							          			  echo "</select>";

							          			  $count = $count+1;
												 
												
												}


												

												$sql2 =
											"SELECT recipe.rid,ingredients.iname,exp_unit.expname,rec_ingre.qty
											from recipe join rec_ingre on recipe.rid=rec_ingre.rid 
											join ingredients on rec_ingre.iid=ingredients.iid 
											join exp_unit on rec_ingre.expuid=exp_unit.expid 
											where recipe.rid=$recid";
											$result2 = $conn->query($sql2);
											if ($result2->num_rows === 0) { 
												echo "No Tags for this recipe.";
											}
											
											else {
												$count2=0;
												//$tableclass=;
												
													
												
												while ($row2 = $result2->fetch_assoc()) {
												  
												  	$sql_exp = "SELECT expname from exp_unit";
													$res_exp = $conn->query($sql_exp);

												  echo "<select class='form-control' name='dropdownexp".$count2."' id='dropdownexp".$count2."'>";
							          			  echo "<option selected = 'selected'>".$row2['expname']."</option>";

							          			  while($row3=$res_exp->fetch_assoc()){

							          			  	echo "<option value='" . $row3['expname'] . "'>" . $row3['expname'] . "</option>";
							          			  }
							          			  echo "</select>";
												
												$count2 =$count2+1;
												}
												
											}
											// Tagggssss closed


											// Quantity MODAL


												$sql3 =
											"SELECT recipe.rid,ingredients.iname,exp_unit.expname,rec_ingre.qty
											from recipe join rec_ingre on recipe.rid=rec_ingre.rid 
											join ingredients on rec_ingre.iid=ingredients.iid 
											join exp_unit on rec_ingre.expuid=exp_unit.expid 
											where recipe.rid=$recid";
											$result3 = $conn->query($sql3);
											if ($result3->num_rows === 0) { 
												echo "No Tags for this recipe.";
											}
											
											else {
												$count3=0;
												//$tableclass=;
												
													
												
												while ($row3 = $result3->fetch_assoc()) {
												  
												  	//$sql_exp = "SELECT expname from exp_unit";
													//$res_exp = $conn->query($sql_exp);

												  echo "<select class='form-control' name='dropdownqty".$count3."' id='dropdownqty".$count3."'>";
							          			  echo "<option value=1>1</option>
													<option value=2>2</option>
													<option value=3>3</option>
													<option value=4>4</option>
													<option value=5>5</option> ";
							          			  echo "</select>";
							          			  /*while($row3=$res_exp->fetch_assoc()){

							          			  	echo "<option value='" . $row3['expname'] . "'>" . $row3['expname'] . "</option>";
							          			  }*/
												
												$count3 =$count3+1;
												}
												
											}
											// Qunatity Closed


											}	
										?>

											}












							          			<!-- /* echo "<select class='form-control' name='dropdownexp".$count."' id='dropdownexp".$count."'>";
							          			  echo "<option selected = 'selected'>".$row1['iname']."</option>";
							          			  while($rows=$results->fetch_assoc()){

							          			  	echo "<option value='" . $rows['expname'] . "'>" . $rows['expname'] . "</option>";
							          			  }
							          			  echo "</select>";

												  
												//echo"</tbody></table> ";*/ -->

										<!-- Qunatity Dropdowns Filling in Modals -->
									

										<div class="form-group">
    									<button type="submit" class="btn btn-primary">Submit</button>
 										</div>

									</form>
								</div>
							
						</div>
				</div>
			</div>
	  </div>
	</div>

	<div id="myModal3" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="container-fluid">
				<div class="row">
						<div class="col-md-6 ">
								<h1 class="text-center login-title">Edit Recipes</h1>
								<div class="account-wall">
									<form class="form-signin" method ="POST" action="updateTags.php">

									<?php
									
									$sql1 =
											"SELECT recipe.rid,tags.tname from recipe join rec_tag on recipe.rid=rec_tag.rid join tags on rec_tag.tid=tags.tid where recipe.rid=$recid";
											$result1 = $conn->query($sql1);
											if ($result1->num_rows === 0) { 
												echo "No Tags for this recipe.";
											}
											
											else {
												//$tableclass=;
												
												$count=0;
												
												while ($row1 = $result1->fetch_assoc()) {
												  
												  $sql_select = "SELECT tname from tags";
							          			  $results = $conn->query($sql_select);
							          			  echo "<select class='form-control' name='dropdowntags".$count."' id='dropdowntags".$count."'>";
							          			  echo "<option selected = 'selected'>".$row1['tname']."</option>";
							          			  while($rows=$results->fetch_assoc()){

							          			  	echo "<option value='" . $rows['tname'] . "'>" . $rows['tname'] . "</option>";
							          			  }
							          			  echo "</select>";
												  $count = $count+1;
												 
												
												}
												//echo"</tbody></table> ";
											}	
										?>
										

										<div class="form-group">
    									<button type="submit" class="btn btn-primary">Submit</button>
 										</div>

									</form>
								</div>
							
						</div>
				</div>
			</div>
	  </div>
	</div>

	<!--By Drumil-->










	<script>
	

	
	function addReview(){
	var recipeid = <?php echo $recid; ?>;
	var text1 = $('#tb1').val();
	var text2 = $('#tb2').val();
	var text3 = $('#tb3').val();
		//alert(text1+text2+text3+recipeid);
	var jsonData = {
		'title': text1,
		'text': text2,
		'rating':text3,
		'rid':recipeid
	};
	
	$.ajax({
		type: "POST",
		url: "addComment.php",
		data: jsonData,
		dataType: 'json',
		success: function(result){
			//alert(result);
			// CALL OTHER FUNCTION
			
		}
		
	});
		location.reload();
	}
	/*
	function likeRecipe()
	{
		alert('You have liked the recipe!');
		<?php 

		
		
		
		
		
		
		?>;
		
		
		
	}*/
	</script>
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
  </body>
</html>
