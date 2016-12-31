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

$select_count = "select count(tid) as counter from rec_tag where rid =".$rid;
$count_res = $conn->query($select_count);

while($rows = $count_res->fetch_assoc()){

	$count_row = $rows['counter'];
}
echo "Total Rows Returned ".$count_row;
$sql_delete = "DELETE FROM rec_tag where rid=".$rid;
if ($conn->query($sql_delete)=== TRUE){
echo "RECORDS DELETED. READY FOR INSERTION";
}


$count = 0;
while($count < $count_row){
echo "Helloo";

echo "dropdown".$count;

echo "Tag Name is ".$_POST["dropdowntags".$count];
//echo "Expression Name is ".$_POST["dropdownexp".$count];
//echo "Quantity is ".$_POST["dropdownqty".$count];


$tname = $_POST["dropdowntags".$count];
//$expname = $_POST["dropdownexp".$count];
//$qty = $_POST["dropdownqty".$count];

// CODE TO retrieve IID
$sql1 = "SELECT tid from tags where tname ='".$tname."'";
	$res1 = $conn->query($sql1);
	while($row = $res1->fetch_assoc()){
		$tid = $row['tid'];


	}



echo "ID is ".$tid;
//echo "Expression ID is ".$expid;
//echo $_SESSION['rid'];

if (isset($_SESSION['rid'])){

//echo $sql_delete;
	
		//echo "Records Deleted";
		//$qty = 1;
		//$expid = 2;
		$sql3 = "INSERT into rec_tag(rid,tid)VALUES(".$rid.",".$tid.")";
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