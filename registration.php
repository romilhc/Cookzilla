 


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CookZilla</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.7/validator.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
   <body>
   <?php require 'navbar.php'; 
   require 'dbconn.php';
   ?>

   <form data-toggle="validator" role="form" method="POST" action="signupback.php">
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
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 

  </body>
  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
</html>
