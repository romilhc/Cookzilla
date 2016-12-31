<?php
require 'dbconn.php';
//require 'navbar.php'; 
//echo $_SESSION['rid'];
session_start();


/*if (isset($_POST['tname']) and isset($_SESSION['rid'])){


	//echo $rid;
	//echo $tid;


}*/


if( isset($_SESSION['rid'])){

$rid = $_SESSION['rid'];

$select_count = "select count(iid) as counter from rec_ingre where rid =".$rid;
$count_res = $conn->query($select_count);

while($rows = $count_res->fetch_assoc()){

	$count_row = $rows['counter'];
}
echo "Total Rows Returned ".$count_row;
$sql_delete = "DELETE FROM rec_ingre where rid=".$rid;
if ($conn->query($sql_delete)=== TRUE){
echo "RECORDS DELETED. READY FOR INSERTION";
}


$count = 0;
while($count < $count_row){
echo "Helloo";

echo "dropdown".$count;

echo "Ingredients Name is ".$_POST["dropdown".$count];
echo "Expression Name is ".$_POST["dropdownexp".$count];
echo "Quantity is ".$_POST["dropdownqty".$count];


$iname = $_POST["dropdown".$count];
$expname = $_POST["dropdownexp".$count];
$qty = $_POST["dropdownqty".$count];

// CODE TO retrieve IID
$sql1 = "SELECT iid from ingredients where iname ='".$iname."'";
	$res1 = $conn->query($sql1);
	while($row = $res1->fetch_assoc()){
		$iid = $row['iid'];


	}

$sql2 = "SELECT expid from exp_unit where expname ='".$expname."'";
	$res2 = $conn->query($sql2);
	while($row2 = $res2->fetch_assoc()){
		$expid = $row2['expid'];


	}

echo "ID is ".$iid;
echo "Expression ID is ".$expid;
//echo $_SESSION['rid'];

if (isset($_SESSION['rid'])){

//echo $sql_delete;
	
		//echo "Records Deleted";
		//$qty = 1;
		//$expid = 2;
		$sql3 = "INSERT into rec_ingre(rid,iid,qty,expuid)VALUES(".$rid.",".$iid.",".$qty.",".$expid.")";
				if($conn->query($sql3)=== TRUE){
				echo "Record Inserted And Updated";
				header('location: homepage.php');
				}
		
	else{

	}
}

$count = $count+1;
}
}
else{
	echo "Session not set";
}
?>