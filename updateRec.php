<?php
require 'dbconn.php';
//require 'navbar.php';

	session_start();
if (isset($_SESSION['rid'])){

	$rtitle = $_POST['retitle'];
	$desc = $_POST['desc'];
	$rid = $_SESSION['rid'];
	echo $rtitle;
	echo $desc;

	$sql_update = "UPDATE recipe SET rtitle = '".$rtitle."', recipe.desc = '".$desc."' where recipe.rid =".$rid;

	if ($conn->query($sql_update)=== TRUE){
		header('location: homepage.php');
		//header('location : disprecipe.php?recid='.$rid);
		echo"Hello";
	}
}
else{
	echo "Session not SET";
}

?>