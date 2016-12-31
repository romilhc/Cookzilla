<?php

require 'dbconn.php';
session_start();
echo "Hello";

if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['rating']) && isset($_POST['rid'])){
	echo "Success";
	
	$retitle = $_POST['title'];
	$retext = $_POST['text'];
	$rid = $_POST['rid'];
	$rating = $_POST['rating'];
	$uname = $_SESSION['user'];
	
	
	
	
	$sql2 = "INSERT into rec_rate(rid,retitle,retext,uname,ratings,ctime)values(".$rid.", '".$retitle."','".$retext."','".$uname."',".$rating.",NOW())";
	
	
	if ($conn->query($sql2) === TRUE ){
		echo " Records Inserted";
		
	}
}


?>