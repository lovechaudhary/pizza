<?php include('top.php'); ?>
<?php include('auth.php'); ?>
<title>Add Postcode | Admin</title>
</head>
<?php 
	if(isset($_POST['submit'])) {
		$postcode 			= 	mysql_real_escape_string($_POST['postcode']);
		$delivery_charge 	= 	mysql_real_escape_string($_POST['delivery_charge']);
		$coventry 			= 	mysql_real_escape_string($_POST['coventry']);
		$loc 				=	array();
		foreach ($_POST['loc'] as $key => $value) {
			$loc[] = $value;
		}
		$location = implode(',', $loc);
		if(empty($postcode)) {
			$error = '<div class="alert alert-danger">Enter Postcode first</div>';
		} else if(empty($delivery_charge)) {
			$error = '<div class="alert alert-danger">Enter Delivery Charge first</div>';
		} else if(empty($coventry)) {
			$error = '<div class="alert alert-danger">Select Coventry</div>';
		} else if(empty($location)) {
			$error = '<div class="alert alert-danger">Select At least one location</div>';
		} else {
			$qre = mysql_query("INSERT INTO `tbl_postcode`(`postcode`, `delivery_charge`, `coventry`, `locations`) VALUES ('$postcode', '$delivery_charge', '$coventry', '$location')") or die(mysql_error());
			if($qre) {
				$error = '<div class="alert alert-success">Success Postcode Inserted</div>';
			}
		}
	}

	if(isset($_POST['submit_close'])) {
		$postcode 			= 	mysql_real_escape_string($_POST['postcode']);
		$delivery_charge 	= 	mysql_real_escape_string($_POST['delivery_charge']);
		$coventry 			= 	mysql_real_escape_string($_POST['coventry']);
		$loc 				=	array();
		foreach ($_POST['loc'] as $key => $value) {
			$loc[] = $value;
		}
		$location = implode(',', $loc);
		if(empty($postcode)) {
			$error = '<div class="alert alert-danger">Enter Postcode first</div>';
		} else if(empty($delivery_charge)) {
			$error = '<div class="alert alert-danger">Enter Delivery Charge first</div>';
		} else if(empty($coventry)) {
			$error = '<div class="alert alert-danger">Select Coventry</div>';
		} else if(empty($location)) {
			$error = '<div class="alert alert-danger">Select At least one location</div>';
		} else {
			$qre = mysql_query("INSERT INTO `tbl_postcode`(`postcode`, `delivery_charge`, `coventry`, `locations`) VALUES ('$postcode', '$delivery_charge', '$coventry', '$location')") or die(mysql_error());
			if($qre) {
				$error = '<div class="alert alert-success">Success Postcode Inserted</div>';
				header('location:'.APP_PATH.'show-postcode.php');
				exit;
			}
		}
	}
?>
<style type="text/css">
	.loc{
		width:540px;		
		border: 1px solid #EEE;
	}
	.loc .tag{
		float: left;
		margin: 5px 10px 5px 15px;
	}
</style>
<body>
<?php include('includes/navbar.php'); ?>
<div class="container">
  	<h1>Add Postcode</h1>
  	<?php 
  		if(isset($error)) {
  			echo $error;
  		}
  	?>
<form action="" method="post">
	<div class="col-md-6">
		<div class="form-group">
			<label for="">Postcode</label>
			<input type="text" name="postcode" class="form-control" id="">
		</div>
		<div class="form-group">
			<label for="">Delivery Charge</label>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input type="text" name="delivery_charge" class="form-control" id="">
			</div>
		</div>		
		<div class="form-group">
			<label for="">Coventry</label>
			<select name="coventry" id="coventry" class="form-control">
				<option value="">Select one</option>
				<option value="C">Center</option>
				<option value="NE">North East</option>
				<option value="SE">South East</option>
				<option value="NW">North West</option>
				<option value="N">North</option>
				<option value="Coventry">Coventry</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Location</label>
			<div class="loc">
				<?php 
					$qre = mysql_query("SELECT * FROM tbl_location ORDER BY name ASC");
					while($res = mysql_fetch_array($qre)) {
						echo '<span class="tag"><input type="checkbox" name="loc[]" value="'.$res['id'].'"/>&nbsp;'.$res['name'].'</span>';
					}
				?>				
				<br clear="all"/>
			</div>			
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