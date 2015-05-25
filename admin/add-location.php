<?php include('top.php'); ?>
<?php include('auth.php'); ?>
<title>Add Location | Admin</title>
</head>
<?php 
	if(isset($_POST['submit'])) {
		$location_name = mysql_real_escape_string($_POST['name']);
		if(empty($location_name)) {
			$error = '<div class="alert alert-danger">Enter location name first</div>';
		} else {
			$qre1 = mysql_query("SELECT name FROM tbl_location WHERE name='".$location_name."' ");
			$qre ='';
			if(mysql_num_rows($qre1)!=0) {
				$error = '<div class="alert alert-danger">This location name has already in the list. Try the other one.</div>';
			} else {
				$qre = mysql_query("INSERT INTO `tbl_location`(`name`) VALUES ('$location_name')") or die(mysql_error());
			}			
			if($qre) {
				$error = '<div class="alert alert-success">Success location Inserted</div>';
			}
		}
	}

	if(isset($_POST['submit_close'])) {
		$location_name = mysql_real_escape_string($_POST['name']);
		if(empty($location_name)) {
			$error = '<div class="alert alert-danger">Enter location name first</div>';
		} else {
			$qre1 = mysql_query("SELECT name FROM tbl_location WHERE name='".$location_name."' ");
			$qre ='';
			if(mysql_num_rows($qre1)!=0) {
				$error = '<div class="alert alert-danger">This location name has already in the list. Try the other one.</div>';
			} else {
				$qre = mysql_query("INSERT INTO `tbl_location`(`name`) VALUES ('$location_name')") or die(mysql_error());
			}			
			if($qre) {
				$error = '<div class="alert alert-success">Success location Inserted</div>';
			}
			if($qre) {
				$error = '<div class="alert alert-success">Success location Inserted</div>';
				header('location:'.APP_PATH.'show-location.php');
				exit;
			}
		}
	}
?>
<body>
<?php include('includes/navbar.php'); ?>
<div class="container">
  	<h1>Add Location</h1>
  	<?php 
  		if(isset($error)) {
  			echo $error;
  		}
  	?>
<form action="" method="post">
	<div class="col-md-6">
		<div class="form-group">
			<label for="">Location Name</label>
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