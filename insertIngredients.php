<?php
require 'dbconn.php';
require 'navbar.php'; 
echo $_SESSION['rid'];

if (isset($_POST['iname']) and isset($_POST['qty']) and isset($_POST['expname']) and isset($_SESSION['rid'])){

	$iname = $_POST['iname'];

	$sql1 = "SELECT iid from ingredients where iname ='".$iname."'";
	$res1 = $conn->query($sql1);
	while($row = $res1->fetch_assoc()){
		$iid = $row['iid'];

	}

	$expname = $_POST['expname'];

	$sql2 = "SELECT expid from exp_unit where expname ='".$expname."';";
	$res2 = $conn->query($sql2);
	while($row = $res2->fetch_assoc()){
		$expid = $row['expid'];
		
	}
	$qty = $_POST['qty'];
	$rid = $_SESSION['rid'];

	$sql3 = "INSERT into rec_ingre(rid,iid,qty,expuid)VALUES(".$rid.",".$iid.",".$qty.",".$expid.")";
	if($conn->query($sql3)=== TRUE){
		echo "Record Inserted";
	}
	echo $rid;
	echo $iid;
	echo $expid;
	echo $qty;

}
?>