<?php
require 'dbconn.php';
require 'navbar.php'; 


if (isset($_POST['rid']) and isset($_SESSION['user'])){

	$rid = $_POST['rid'];
	$uname = $_SESSION['user'];


	$sql1 = "INSERT into views(uname,rid,timestamp)values('".$uname."',".$rid.",NOW())";
	if($conn->query($sql1)=== TRUE){
		echo "Record Inserted";
	}


	
	

	


}
?>