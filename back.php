 


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CookZilla</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php require 'dbconn.php';
          require 'navbar.php';

          if(isset($_SESSION['user']))
                {
                  $user = $_SESSION['user'];
                  echo "Welcome "."$user"."!";


          $sql = "SELECT rtitle,description from recipe where uname = '".$user."'";
            

            $result = $conn->query($sql);

            if ($result->num_rows === 0) { 
              echo "<br>No Recipes Exists in the Database ";
    
    
            }
            else{

              while ($row = $result->fetch_assoc()) {
                //echo "Recipe Title".$row['rtitle'];

                //echo "Description".$row['description'];

                echo '<div class ="col-sm-4">  
                        <div class="card">

                          <!--Card image-->
                              <img class="img-fluid" src="http://mdbootstrap.com/images/regular/nature/img%20(28).jpg" alt="Card image cap"  width="200" height ="200">
                            <!--/.Card image-->

                        <!--Card content-->
                            <div class="card-block">
                              <!--Title-->
                            <h4 class="card-title">'.$row['rtitle'].'</h4>
                            <!--Text-->
                            <p class="card-text">'.$row['description'].'</p>
                            <a href="#" class="btn btn-primary">Button</a>
                        </div>
                      <!--/.Card content-->
                  </div>
                  </div>';
                # code...
              }
            }
                }
          else
                {
                 echo "Not signed In";
                }

          
    ?>

   </body>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
</html>
