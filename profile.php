


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
    if(isset($_GET['uname']))
    {
    $us=$_GET['uname'];
  }
  else
  {
    $us=$_SESSION['user'];
  }
    $flag=FALSE;

		if (!isset($_SESSION['user'])){
		  echo "Enter Username Please";
		}
		else{

			// Query: Get recipe and title
      if($us===$_SESSION['user'])
      {
        $flag=TRUE;
  			$sql =
  			"SELECT uname,fname,lname,street,city,country,state,zip,propic from user where uname = '".$_SESSION['user']."'";
  		}
      else
      {
        $sql =
        "SELECT uname,fname,lname,street,city,country,state,zip,propic from user where uname = '".$us."'";
      }


      $result = $conn->query($sql);


			// Checking for Invalid Option
			if ($result->num_rows === 0) { 
				
				echo "";
				
			
			}

			else {
				//$tableclass=;
				$row = $result->fetch_assoc();
				
			}
		}
	?>
	
	<div class="container">
      <div class="row">
      <!--<div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <A href="edit.html" >Edit Profile</A>

        <A href="edit.html" >Logout</A>
       <br>
		
      </div>-->
       
   

          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row['fname'].' '.$row['lname'];  ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                  <!--<?php
                     
                    

                         // get the image from the db
                         $sqlgetimg = "SELECT propic FROM cookzilla.user WHERE uname='" .$_SESSION['user'] . "'";

                         // the result of the query
                         $result = $conn->query($sqlgetimg) or die("Invalid query: " . mysql_error());

                         // set the header for the image
                         header("Content-type: image/jpeg");
                        echo mysql_result($result, 0);

                         // close the db link
                         
                     
                    ?>-->
                    
                    
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="data:image;base64,<?php echo $row['propic'];?>" class="img-circle img-responsive"> 
                <?php
                    if($flag===TRUE)
                    {
                    echo'
                <form enctype="multipart/form-data"  method="post" >
                  <!--<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="10000000" />-->
                  
                  <input  name="propic" type="file" class="btn btn-primary btn-sm">
                  <input  type="submit" value="Upload" name="up" class="btn btn-primary btn-sm"/>
                </form>';
                }
                else
                {

                  $sql_checkfollower=
                  "select uname as uname1,funame as uname2 from follows where uname='".$_SESSION['user']."' and funame='".$us."'";
                  $result_checkfollower=$conn->query($sql_checkfollower);
                  //$row_checkfollower=$result_checkfollower->fetch_assoc();
                  if($result_checkfollower->num_rows===0)
                  {
                     echo"<br><a href='addfollow.php?uname=".$row['uname']."' class='btn btn-primary btn-sm'>Follow</a>";
                     


                   }
                   else
                   {
                     echo"<br><a href='unfollow.php?uname=".$row['uname']."' class='btn btn-primary btn-sm'>Unfollow</a>&nbsp;&nbsp;&nbsp;";
                     echo"<a href='getfollowers.php?uname=".$row['uname']."' class='btn btn-primary btn-sm'>Followers</a>&nbsp;&nbsp;&nbsp;";
                     echo"<a href='getfollowing.php?uname=".$row['uname']."' class='btn btn-primary btn-sm'>Following</a>";
                   }
                 

                }
                ?>

                </div>


                  <?php
                    if(isset($_POST['up']))
                    {

                      if(getimagesize($_FILES['propic']['tmp_name'])==FALSE)
                      {
                          echo"Please select an image";
                      }
                      else
                      {
                          $propic=addslashes($_FILES['propic']['tmp_name']);
                          $propic=file_get_contents($propic);
                          $propic=base64_encode($propic);
                          saveimg($propic);

                      }
                    }

                    function saveimg($propic)
                    {
                      require 'dbconn.php';
                      $sqluploadimg = "UPDATE cookzilla.user SET propic='$propic' WHERE uname='".$_SESSION['user']."'";
                      $resultup=$conn->query($sqluploadimg);
                      if($resultup)
                      {
                        echo"Image uploaded";
                        
                        ?>
                        <script>
                        window.location.href = 'profile.php';
                        </script>
                        <?php

                      }
                      else
                      {
                        echo"Image not uploaded";
                      }


                    }




                    /*
                    // check if a file was submitted
                    if(!isset($_FILES['userfile']))
                    {
                        echo '<p>Please select a file</p>';
                    }
                    else
                    {
                        try {
                        $msg= upload();  //this will upload your image
                        echo $msg;  //Message showing success or failure.
                        }
                        catch(Exception $e) {
                        echo $e->getMessage();
                        echo 'Sorry, could not upload file';
                        }
                    }

                    // the upload function

                    function upload() {
                       
                        $maxsize = 10000000; //set to approx 10 MB

                        //check associated error code
                        if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

                            //check whether file is uploaded with HTTP POST
                            if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    

                                //checks size of uploaded image on server side
                                if( $_FILES['userfile']['size'] < $maxsize) {  
                      
                                   //checks whether uploaded file is of image type
                                  //if(strpos(mime_content_type($_FILES['userfile']['tmp_name']),"image")===0) {
                                     $finfo = finfo_open(FILEINFO_MIME_TYPE);
                                    if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    

                                        // prepare the image for insertion
                                        $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));

                                        

                                        // our sql query
                                        $sqluploadimg = "UPDATE cookzilla.user SET propic='{$imgData}' WHERE uname='".$_SESSION['user']."'";
                                        /*
                                        (image, name)
                                        VALUES
                                        ('{$imgData}', '{$_FILES['userfile']['name']}');";

                                        // insert the image
                                        $conn->query($sqluploadimg);
                                        /*$msg='<p>Image successfully saved in database with id ='. mysql_insert_id().' </p>';
                                    }
                                    else
                                        $msg="<p>Uploaded file is not an image.</p>";
                                }
                                 else {
                                    // if the file is not less than the maximum allowed, print an error
                                    $msg='<div>File exceeds the Maximum File limit</div>
                                    <div>Maximum File limit is '.$maxsize.' bytes</div>
                                    <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                                    ' bytes</div><hr />';
                                    }
                            }
                            else
                                $msg="File not uploaded successfully.";

                        }
                        else {
                            $msg= file_upload_error_message($_FILES['userfile']['error']);
                        }
                        return $msg;
                    }

                    // Function to return error message based on error code

                    function file_upload_error_message($error_code) {
                        switch ($error_code) {
                            case UPLOAD_ERR_INI_SIZE:
                                return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                            case UPLOAD_ERR_FORM_SIZE:
                                return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
                            case UPLOAD_ERR_PARTIAL:
                                return 'The uploaded file was only partially uploaded';
                            case UPLOAD_ERR_NO_FILE:
                                return 'No file was uploaded';
                            case UPLOAD_ERR_NO_TMP_DIR:
                                return 'Missing a temporary folder';
                            case UPLOAD_ERR_CANT_WRITE:
                                return 'Failed to write file to disk';
                            case UPLOAD_ERR_EXTENSION:
                                return 'File upload stopped by extension';
                            default:
                                return 'Unknown upload error';
                        }
                    }*/
                    ?>




                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Username:</td>
                        <td><?php echo "<a href=".$row['uname'].">".$row['uname']."</a>";  ?></td>
                      </tr>
                      <tr>
                        <td>First Name:</td>
                        <td><?php echo $row['fname'];  ?></td>
                      </tr>
                      <tr>
                        <td>Last Name:</td>
                        <td><?php echo $row['lname'];  ?></td>
                      </tr>
					<tr>
                         
                        <td>Street:</td>
                        <td><?php echo $row['street'];  ?></td>
                      </tr>
                        <tr>
                        <td>City:</td>
                        <td><?php echo $row['city'];  ?></td>
                      </tr>
                      <tr>
                        <td>State:</td>
                        <td><?php echo $row['state'];  ?></td>
                      </tr>
                        <tr>
						<td>Zip Code:</td>
                        <td><?php echo $row['zip'];  ?></td>
                           
                      </tr>
					<tr>
						<td>Country:</td>
                        <td><?php echo $row['country'];  ?></td>
                           
                      </tr>
						                      

                    </tbody>
                  </table>
                  <?php
                  if($flag===TRUE)
                  {
                  echo'<a href="editprofile.php" class="btn btn-primary">Edit Profile</a>
				  <!--<a href="" class="btn btn-primary">Change Password</a>-->
                  <a href="logout.php" class="btn btn-primary">Log Out</a>';
                }
                  ?>
                </div>
              </div>
            </div>
                 
            
          </div>
        
      </div>
    </div>
	
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
  </body>
</html>
