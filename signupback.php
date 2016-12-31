<?php
//require 'navbar.php';
require 'dbconn.php';


if (isset($_POST['uname']) and isset($_POST['fname']) and isset($_POST['lname']) and isset($_POST['password']) and isset($_POST['zip']) and isset($_POST['country']) and isset($_POST['city'])
  and isset($_POST['street']) and isset($_POST['state']) ) {

        $uname = $_POST['uname'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname =$_POST['lname'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $street = $_POST['street'];
        $zip = $_POST['zip'];
        $country  = $_POST['country'];

        $sql = "INSERT into user(uname,fname,lname,street,city,state,zip,country,password)values('".$uname."','".$fname."','".$lname."','".$street."','".$city."','".$state."','".$zip."','".$country."','".$password."')";
        echo $sql;
        if ($conn->query($sql) === TRUE){
        echo "Success Record Inserted";
        //session_destroy();
        session_start();
        $_SESSION['user']=$_POST['uname'];
        header('location: homepage.php');
        }
        else{

        }
  # code...
}


else{
   echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Oh snap! All the details for Sign Up are not added properly.
        </div>';
}



  ?>

