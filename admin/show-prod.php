<?php include('top.php'); ?>
<?php include('auth.php'); ?>
<title>Show Products | Admin</title>
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
		$qre = mysql_query("UPDATE tbl_product SET isdisplay='0' WHERE id='".$_GET['id']."' ");
		if($qre) {
			header("location:show-prod.php");
			exit;
		}		
	} 
	if(isset($_GET['actions'])=='approve' && $_GET['id']!='') {
		$qre = mysql_query("UPDATE tbl_product SET isdisplay='1' WHERE id='".$_GET['id']."' ");
		if($qre) {
			header("location:show-prod.php");
			exit;
		}		
	}
	if(isset($_GET['act'])=='delete' && $_GET['id']!='') {
		$qre = mysql_query("DELETE FROM tbl_product WHERE id='".$_GET['id']."' ");
		if($qre) {
			header("location:show-prod.php");
			exit;
		}		
	}	
?>
</head>
<body>
<?php include('includes/navbar.php'); ?>
<div class="container">
  	<h1>Product Manager</h1>
  	<?php ShowProduct() ?>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/app.js"></script>
  </body>
</html>