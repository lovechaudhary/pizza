<?php 
	session_start();
	if(isset($_SESSION['AID'])) {
		session_destroy();
		header('location:index.php');
		exit;
	}
?>