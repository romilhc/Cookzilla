 


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CookZilla</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/timeline.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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

   <?php 
   require 'navbar.php'; 
   require 'dbconn.php';


   ?>

<div class ="container">  
  <div class ="row">
    <blockquote>
      <h5><p>Recently Viewed</p><h5>
      <small>Here's are some <cite title="Source Title">Recipes which you viewed Recently</cite></small>
    </blockquote>
 




<?php
  
    if (!isset($_SESSION['user'])){
      echo "Enter Username Please";
    }
    else{
      
      $uname = $_SESSION['user'];

      $sql =          "select recipe.rid as rid,rtitle,pics from recipe,
                      (select distinct rid from views
                      where views.timestamp > DATE_SUB(NOW(), INTERVAL 1 DAY) 
                      and uname = '".$uname."' order by views.timestamp desc) as t1
                      where t1.rid = recipe.rid LIMIT 3";

     // $sql = "SELECT rid,rtitle,recipe.desc from recipe where uname = '".$_SESSION['user']."'";
            

            $result = $conn->query($sql);

            if ($result->num_rows === 0) { 
              echo "<br>No Recently Viewed Recipes Exists in the Database ";
    
    
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
                      <!--/.Card content-->
                  </div>
                  </div>';
                # code...
              }
            }
    }
    ?>
    </div>
</div>
  


<div class ="container">  
  
</div>




</div><!-- /row -->

</div><!-- /container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


    <div class="container">
    <div class="page-header">
        <h1 id="timeline">Timeline</h1>
    </div> 
    <ul class="timeline">
    <?php
          if (!isset($_SESSION['user'])){
      echo "Enter Username Please";
    }
    else{
      
      $uname = $_SESSION['user'];

                $sql =          "select user.propic,retext, rec_rate.uname as RecentUpdatesFrom, recipe.rtitle, CAST(NOW() AS time),Hour(Timediff(NOW(),ctime)) as timer
                                  from recipe,rec_rate, follows, user where
                                  rec_rate.uname = follows.funame and 
                                  follows.uname = '".$uname."'
                                  and ctime<(NOW()) and ctime>(NOW()-INTERVAL 10 HOUR)
                                  and recipe.rid = rec_rate.rid and rec_rate.uname = user.uname
                                  order by rec_rate.uname desc LIMIT 5";

     // $sql = "SELECT rid,rtitle,recipe.desc from recipe where uname = '".$_SESSION['user']."'";
            

            $result = $conn->query($sql);

            if ($result->num_rows === 0) { 
              echo "<br>";
    
    
            }
            else{

              while ($row = $result->fetch_assoc()) {
                

                  echo '<li>
          <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">'.$row['RecentUpdatesFrom'].'</h4>
              <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'.$row['timer'].' hours ago </small></p>
            </div>
            <div class="timeline-body">
              <p>'.$row['RecentUpdatesFrom'].' commented on '.$row['rtitle'].'<br> Comment is: 
              '.$row['retext'].'</p>
            </div>
          </div>
        </li>';
              }
            }
    }
    ?>

  
    <?php

if (!isset($_SESSION['user'])){
      echo "Enter Username Please";
    }
    else{
      
      $uname = $_SESSION['user'];

                      $sql =          "select likes.uname as RecentLikesFrom, recipe.rtitle as LikedRecipe , CAST(NOW() AS time),Hour(Timediff(NOW(),ltime)) as timer
      from recipe,likes,follows 
      where
      follows.funame = likes.uname and follows.uname='".$uname."'
      and recipe.rid = likes.rid
      and ltime<(NOW()) and ltime>(NOW()-INTERVAL 10 HOUR)
      order by likes.uname limit 5";

     // $sql = "SELECT rid,rtitle,recipe.desc from recipe where uname = '".$_SESSION['user']."'";
            

            $result = $conn->query($sql);

            if ($result->num_rows === 0) { 
              echo "<br>";
    
    
            }
            else{

              while ($row = $result->fetch_assoc()) {
                

                  echo '<li class="timeline-inverted">
          <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">'.$row['RecentLikesFrom'].'</h4>
              <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'.$row['timer'].' hours ago </small></p>
            </div>
            <div class="timeline-body">
              <p>'.$row['RecentLikesFrom'].' Liked '.$row['LikedRecipe'].'<br> 
              </p>
            </div>
          </div>
        </li>';
              }
            }
    }

    ?>

    <?php

if (!isset($_SESSION['user'])){
      echo "Enter Username Please";
    }
    else{
      
      $uname = $_SESSION['user'];

                      $sql =          "select recipe.uname as RecentPostsFrom, recipe.rtitle as PostedRecipe ,recipe.desc as RecipeDescription, CAST(NOW() AS time),Hour(Timediff(NOW(),rptime)) as timer
      from recipe,follows 
      where
      follows.funame = recipe.uname and follows.uname='".$uname."'
      
      and rptime<(NOW()) and rptime>(NOW()-INTERVAL 10 HOUR)
      order by recipe.uname limit 5";

     // $sql = "SELECT rid,rtitle,recipe.desc from recipe where uname = '".$_SESSION['user']."'";
            

            $result = $conn->query($sql);

            if ($result->num_rows === 0) { 
              echo "<br>";
    
    
            }
            else{

              while ($row = $result->fetch_assoc()) {
                

                  echo '<li class="timeline-inverted">
          <div class="timeline-badge success"><i class="glyphicon glyphicon-glass"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">'.$row['RecentPostsFrom'].'</h4>
              <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'.$row['timer'].' hours ago </small></p>
            </div>
            <div class="timeline-body">
              <p>'.$row['RecentPostsFrom'].' Posted '.$row['PostedRecipe'].'<br>'.' Description: '.$row['RecipeDescription'].' 
              </p>
            </div>
          </div>
        </li>';
              }
            }
    }

    ?>
       <!-- <li class="timeline-inverted">
          <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Mussum ipsum cacilds</h4>
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
            </div>
          </div>
        </li> -->
    </ul>
</div>
    
  </body>
  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
</html>
