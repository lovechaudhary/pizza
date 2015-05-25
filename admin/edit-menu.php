<?php include('top.php'); ?>
<?php include('auth.php'); ?>
<title>Edit Menu | Admin</title>
</head>
<?php 
	if(isset($_POST['submit'])) {
		$menu_name = mysql_real_escape_string($_POST['name']);
		if(empty($menu_name)) {
			$error = '<div class="alert alert-danger">Enter Menu name first</div>';
		} else {
			$qre = mysql_query("UPDATE `tbl_menu` SET `menu_name`='$menu_name' WHERE id='".$_GET['id']."' ") or die(mysql_error());
			if($qre) {
				$error = '<div class="alert alert-success">Success Menu Updated</div>';
			}
		}
	}
?>
<body>
<?php include('includes/navbar.php'); ?>
<div class="container">
  	<h1>Edit Menus</h1>
  	<?php 
  		if(isset($error)) {
  			echo $error;
  		}

  		$qre = mysql_query("SELECT * FROM tbl_menu WHERE id='".$_GET['id']."' ");
  		$res = mysql_fetch_array($qre);
  	?>
<form action="" method="post">
	<div class="col-md-6">
		<div class="form-group">
			<label for="">Menu Name</label>
				<input type="text" name="name" class="form-control" id="" value="<?php echo $res['menu_name']; ?>">
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Update" class="btn btn-primary">
		</div>
	</div>
</form>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/app.js"></script>
  </body>
</html>