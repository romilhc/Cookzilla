 


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
	<?php require 'dbconn.php';
          require 'navbar.php';
	?>
	<?php
	
		if (!isset($_SESSION['user'])){
		  echo "Enter Username Please";
		}
		else{
			
			$sql = "SELECT rid,rtitle,recipe.desc,recipe.pics from recipe where uname = '".$_SESSION['user']."'";
            

            $result = $conn->query($sql);

            if ($result->num_rows === 0) { 
              echo "";
				echo '<div class="alert alert-dismissible alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Oh snap! You have not posted any recipe yet.</strong>
				</div>';
    
    
            }
            else{

              while ($row = $result->fetch_assoc()) {
                //echo "Recipe Title".$row['rtitle'];

                //echo "Description".$row['description'];

                echo '<div class ="col-sm-4">  
                        <div class="card">

                          <!--Card image-->
                              <img class="img-fluid" src="data:image;base64,'.$row['pics'].'" alt="Card image cap"  width="200" height ="200">
                            <!--/.Card image-->

                        <!--Card content-->
                            <div class="card-block">
                              <!--Title-->
                            <h4 class="card-title">'.$row['rtitle'].'</h4>
                            <a href="disprecipe.php?recid='.$row['rid'].'" class="btn btn-primary">View Recipe</a>
                        </div>
                        <br><br>
                      <!--/.Card content-->
                  </div>
                  </div>';
                # code...
              }
            }
		}
    ?>
    
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
  </body>
</html>
