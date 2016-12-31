<?php
require 'dbconn.php';
require 'navbar.php'; 
echo $_SESSION['rid'];

if (isset($_POST['tname']) and isset($_SESSION['rid'])){

	$tname = $_POST['tname'];

	$sql1 = "SELECT tid from tags where tname ='".$tname."'";
	$res1 = $conn->query($sql1);
	while($row = $res1->fetch_assoc()){
		$tid = $row['tid'];

	}


	
	$rid = $_SESSION['rid'];

	$sql3 = "INSERT into rec_tag(rid,tid)VALUES(".$rid.",".$tid.")";
	if($conn->query($sql3)=== TRUE){
		echo "Record Inserted";
	}
	echo $rid;
	echo $tid;


}
?>