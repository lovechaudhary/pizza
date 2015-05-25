<?php include('top.php'); ?>
<?php include('auth.php'); ?>
<title>Edit Postcode | Admin</title>
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
			$qre = mysql_query("UPDATE `tbl_postcode` SET `postcode`='$postcode', `delivery_charge`='$delivery_charge', `coventry`='$coventry', `locations`='$location' WHERE id='".$_GET['id']."' ") or die(mysql_error());
			if($qre) {
				$error = '<div class="alert alert-success">Success Postcode Updated</div>';
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
  	<h1>Edit Postcode</h1>
  	<?php 
  		if(isset($error)) {
  			echo $error;
  		}
  		$qre = mysql_query("SELECT * FROM tbl_postcode WHERE id='".$_GET['id']."' ");
  		$res = mysql_fetch_array($qre);
  	?>
<form action="" method="post">
	<div class="col-md-6">
		<div class="form-group">
			<label for="">Postcode</label>
			<input type="text" name="postcode" class="form-control" id="" value="<?php echo $res['postcode'] ?>">
		</div>
		<div class="form-group">
			<label for="">Delivery Charge</label>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input type="text" name="delivery_charge" class="form-control" id="" value="<?php echo $res['delivery_charge'] ?>">
			</div>
		</div>		
		<div class="form-group">
			<label for="">Coventry</label>
			<select name="coventry" id="coventry" class="form-control">
				<option value="">Select one</option>
				<?php 
					if($res['coventry']=='C') {
						echo '<option value="C" selected>Center</option>';
					} else {
						echo '<option value="C">Center</option>';
					}
					if($res['coventry']=='NE') {
						echo '<option value="NE" selected>North East</option>';
					} else {
						echo '<option value="NE">North East</option>';
					}					
					if($res['coventry']=='SE') {
						echo '<option value="SE" selected>South East</option>';
					} else {
						echo '<option value="SE">South East</option>';
					}										
					if($res['coventry']=='NW') {
						echo '<option value="NW" selected>North West</option>';
					} else {
						echo '<option value="NW">North West</option>';
					}										
					if($res['coventry']=='N') {
						echo '<option value="N" selected>North</option>';
					} else {
						echo '<option value="N">North</option>';
					}							
					if($res['coventry']=='Coventry') {
						echo '<option value="Coventry" selected>Coventry</option>';
					} else {
						echo '<option value="Coventry">Coventry</option>';
					}					
				?>																
			</select>
		</div>
		<div class="form-group">
			<label for="">Location</label>
			<div class="loc">
				<?php 
					$qre1 = mysql_query("SELECT * FROM tbl_location ORDER BY name ASC");
					$loc_id = explode(",", $res['locations']);
					$sel = '';
					while($res1 = mysql_fetch_array($qre1)) {
						if(in_array($res1['id'], $loc_id)) {
							$sel = "checked";
						} else {
							$sel = "";
						}
						echo '<span class="tag"><input type="checkbox" name="loc[]" value="'.$res1['id'].'" '.$sel.'/>&nbsp;'.$res1['name'].'</span>';
					}
				?>				
				<br clear="all"/>
			</div>			
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