<?php include('top.php'); ?>
<?php include('auth.php'); ?>
<title>Add Menu | Admin</title>
</head>
<?php 
	if(isset($_POST['submit'])) {
		$menu_name = mysql_real_escape_string($_POST['name']);
		if(empty($menu_name)) {
			$error = '<div class="alert alert-danger">Enter Menu name first</div>';
		} else {
			$qre = mysql_query("INSERT INTO `tbl_menu`(`menu_name`) VALUES ('$menu_name')") or die(mysql_error());
			if($qre) {
				$error = '<div class="alert alert-success">Success Menu Inserted</div>';
			}
		}
	}

	if(isset($_POST['submit_close'])) {
		$menu_name = mysql_real_escape_string($_POST['name']);
		if(empty($menu_name)) {
			$error = '<div class="alert alert-danger">Enter Menu name first</div>';
		} else {
			$qre = mysql_query("INSERT INTO `tbl_menu`(`menu_name`) VALUES ('$menu_name')") or die(mysql_error());
			if($qre) {
				$error = '<div class="alert alert-success">Success Menu Inserted</div>';
				header('location:'.APP_PATH.'show-menus.php');
				exit;
			}
		}
	}
?>
<body>
<?php include('includes/navbar.php'); ?>
<div class="container">
  	<h1>Add Menus</h1>
  	<?php 
  		if(isset($error)) {
  			echo $error;
  		}
  	?>
<form action="" method="post">
	<div class="col-md-6">
		<div class="form-group">
			<label for="">Menu Name</label>
				<input type="text" name="name" class="form-control" id="">
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Save & New" class="btn btn-primary">
			<input type="submit" name="submit_close" value="Save & Close" class="btn btn-primary">
		</div>
	</div>
</form>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/app.js"></script>
  </body>
</html>