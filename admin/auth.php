<?php 	
	if(!isset($_SESSION['AID'])) {
		header("location:index.php");
		exit;
	}
?>