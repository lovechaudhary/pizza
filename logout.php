<?php 
	session_start();
	unset($_SESSION['UID']);
	unset($_SESSION['UNAME']);
	session_destroy();
?>
<script type="text/javascript">alert("You are successfully logout...");</script>
<?php 
	header("location:index.php");
	exit;
?>