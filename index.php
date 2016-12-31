 


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
  

   <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <center>
      <img src="img/homepage/Img7.jpg" alt="Romia" height="500" width="1200">
    
      <div class="carousel-caption">
    <h3>Find Recipes</h3>
        Cookzilla is perfect website to find recipes

      </div>
    </center>
    </div>
    <div class="item">
      <center>
      <img src="img/homepage/Img8.jpg" alt="Alternaing"  height="500" width="1200">
    <div class="carousel-caption">
    <h3>Post your Recipes</h3>
    <p>Cookzilla is a perfect website for posting and sharing your recipes</p>
    </div>
  </center>
    </div>
    
    <div class="item">
      <center>
      <img src="img/homepage/Img9.jpg" alt="Alternaing"  height="500" width="1200">
    <div class="carousel-caption">
    <h3>Review Recipes</h3>
    <p>Review Recipes from other users and help them with your suggestion</p>
    </div>
  </center>
    </div>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
<br>
<br>
<br>
<div class = "container">
  <div class ="row">
    <div class ="col-sm-6">
      <center><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Sign In</button>
      </center>
    </div>
    

    <div class ="col-sm-6">
      <center><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">Sign Up</button>
      </center>
    </div>
  </div>
  
  </div>


  
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="container-fluid">
				<div class="row">
						<div class="col-sm-6 col-md-4 col-md-offset-4">
								<h1 class="text-center login-title">Sign in to continue</h1>
								<div class="account-wall">
									<form class="form-signin" method ="POST" action="signinbackend.php">
										<input type="text" class="form-control" placeholder="Email" name="uname" required autofocus>
										<input type="password" class="form-control" placeholder="Password" name="password" required>
										<button class="btn btn-lg btn-primary btn-block" type="submit">
											Sign in</button>
									
									
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
            <div class="col-sm-12 col-md-12 col-md-offset-4">
                <h1 class="text-center login-title">Sign up to be a Cookzillian</h1>
                <div class="account-wall">
                  <form class="form-signup" data-toggle="validator" role="form" method="POST" action="signupback.php">
					  <div class="form-group">
					    <label for="inputName" class="control-label">Name</label>
					    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Name" required>
					  </div>


					  <div class="form-group">
					    <label for="inputName" class="control-label">Last Name</label>
					    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
					  </div>
					  


					  <div class="form-group">
					    <label for="inputEmail" class="control-label">Email</label>
					    <input type="email" class="form-control" id="uname" name="uname" placeholder="Email" data-error="Wrong Email id or username" required>
					    <div class="help-block with-errors"></div>
					  </div>

					  <div class="form-group">
					    <label for="inputName" class="control-label">Street</label>
					    <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street">
					  </div>

					  <div class="form-group">
					    <label for="inputName" class="control-label">City</label>
					    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
					  </div>

					  <div class="form-group">
					    <label for="inputName" class="control-label">State</label>
					    <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
					  </div>

					  <div class="form-group">
					    <label for="inputName" class="control-label">zip</label>
					    <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip" required>
					  </div>

					  <div class="form-group">
					    <label for="inputName" class="control-label">Country</label>
					    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" required >
					  </div>

					  <div class="form-group">
					    <label for="inputPassword" class="control-label">Password</label>
					    <div class="form-inline row">
					      <div class="form-group col-sm-6">
					        <input type="password" data-minlength="6" class="form-control" name="password" id="password" placeholder="Password" required>
					        <div class="help-block">Minimum of 6 characters</div>
					      </div>
					      <div class="form-group col-sm-6">
					        <input type="password" class="form-control" id="passwordConfirm" data-match="#password" data-match-error="Oops! Please enter same password" placeholder="Confirm" required>
					        <div class="help-block with-errors"></div>
					      </div>
					    </div>
					  </div>
					  
					  
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.7/validator.js"></script>
  </body>
</html>
