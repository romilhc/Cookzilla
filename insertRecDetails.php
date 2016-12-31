<?php
require 'dbconn.php';
require 'navbar.php'; 

echo $_SESSION['rid'];

if (isset($_POST['retitle']) and isset($_POST['desc']) and isset($_POST['nos']) and 
	isset($_SESSION['user']))
	{
	$retitle = $_POST['retitle'];
	$desc = $_POST['desc'];
	$nos = $_POST['nos'];
	$uname = $_SESSION['user'];

	echo "NICE";

	$sql_insert = "insert into recipe(rid,uname,rtitle,nos,recipe.desc,rptime)
				   select max(rid)+1 as recent,'".$uname."','".$retitle."','".$nos."','".$desc."',NOW() from recipe";
	echo $sql_insert;
	if ($conn->query($sql_insert)=== TRUE){
		echo "Record inserted";

		$sql_rid = "SELECT max(rid) as recent from recipe";
		$res = $conn->query($sql_rid);

			while ($rowsp = $res->fetch_assoc()){
				$new_rid = $rowsp['recent'];
			}
			echo "New RID of RECENTLY INSERTED IS ".$new_rid;
			$_SESSION['rid'] = $new_rid;

	}


}


?>