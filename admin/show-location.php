<?php include('top.php'); ?>
<?php include('auth.php'); ?>
<title>Show Location | Admin</title>
<script type="text/javascript">
	function confirmDeleteaction(anchor)
  {
    if (confirm('Are you sure?'))
    {
     <!-- anchor.href += '&confirm=1';-->
      return true;
    }
    return false;
  }
</script>
</head>
<?php 
	if(isset($_GET['action'])=='unapprove') {
		$qre = mysql_query("UPDATE tbl_location SET isdisplay='0' WHERE id='".$_GET['id']."' ");
		if($qre) {
			header("location:show-location.php");
			exit;
		}
	} 
	if(isset($_GET['actions'])=='approve' && $_GET['id']!='') {
		$qre = mysql_query("UPDATE tbl_location SET isdisplay='1' WHERE id='".$_GET['id']."' ");
		if($qre) {
			header("location:show-location.php");
			exit;
		}
	}
	if(isset($_GET['act'])=='delete' && $_GET['id']!='') {
		$qre = mysql_query("DELETE FROM tbl_location WHERE id='".$_GET['id']."' ");
		if($qre) {
			header("location:show-location.php");
			exit;
		}
	}	
?>
<body>
<?php include('includes/navbar.php'); ?>
<div class="container">
  	<h1>Location Manager</h1>
  	<?php ShowLocation() ?>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/app.js"></script>
  </body>
</html>