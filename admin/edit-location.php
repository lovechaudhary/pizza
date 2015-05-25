<?php include('top.php'); ?>
<?php include('auth.php'); ?>
<title>Edit Location | Admin</title>
</head>
<?php 
	if(isset($_POST['submit'])) {
		$location_name = mysql_real_escape_string($_POST['name']);
		if(empty($location_name)) {
			$error = '<div class="alert alert-danger">Enter location name first</div>';
		} else {
			$qre = mysql_query("UPDATE `tbl_location` SET `name`='$location_name' WHERE id='".$_GET['id']."' ") or die(mysql_error());
			if($qre) {
				$error = '<div class="alert alert-success">Success Location Updated</div>';
			}
		}
	}
?>
<body>
<?php include('includes/navbar.php'); ?>
<div class="container">
  	<h1>Edit Location</h1>
  	<?php 
  		if(isset($error)) {
  			echo $error;
  		}

  		$qre = mysql_query("SELECT * FROM tbl_location WHERE id='".$_GET['id']."' ");
  		$res = mysql_fetch_array($qre);
  	?>
<form action="" method="post">
	<div class="col-md-6">
		<div class="form-group">
			<label for="">Location Name</label>
				<input type="text" name="name" class="form-control" id="" value="<?php echo $res['name']; ?>">
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