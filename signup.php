<?php require('dbconfig.php'); ?>
<?php $title="Signup"; ?>
<?php 
	if(isset($_POST['submit'])) {
		$cust_name 			=	$_POST['cust_name'];
		$email 				=	$_POST['email'];
		$password 			=	$_POST['password'];
		$c_password			=	$_POST['confirm'];
		$hash				=	sha1($password);
		$mobile 			=	$_POST['mobile'];
		$postcode 			=	$_POST['postcode'];
		$hno				=	$_POST['hno'];
		$location 			=	$_POST['location'];
		$valid_email  		=	filter_var($email, FILTER_VALIDATE_EMAIL);

		if(!$valid_email) {
			echo "Enter valid Email";
		} else {
			$qre = mysql_query("INSERT INTO tbl_signup (cust_name, email, password, c_password, mobile, house_no, location, postcode) VALUES ('$cust_name', '$email', '$hash', '$password', '$mobile', '$hno', '$location', '$postcode')") or die(mysql_error());
			if($qre) {
				echo "Regitered successfully......................";
			}
		}
	}
?>
<?php require 'header.php'; ?>
<h2>Sign Up</h2>
<div class="row">
	<form action="" method="post">
	<div class="col-md-6">		
					<div class="form-group">
						<label for="">Customer name</label>
						<input type="text" class="form-control" name="cust_name" value="<?php echo (isset($cust_name)) ? $cust_name : ''; ?>" required/>
					</div>
	
					<div class="form-group">
						<label for="">Password</label>
						<input class="form-control" type="password" name="password" value="<?php echo (isset($password)) ? $password : ''; ?>" required/>			
					</div>
	
					<div class="form-group">
						<label for="">Mobile</label>
						<input type="text" class="form-control" name="mobile" value="<?php echo (isset($mobile)) ? $mobile : ''; ?>" maxlength="12" required/>
					</div>
	
					<div class="form-group">
						<label for="">House no</label>
						<input class="form-control" type="text" name="hno" value="<?php echo (isset($hno)) ? $hno : ''; ?>" required/>			
					</div>
		
					<input type="submit" name="submit" class="btn btn-danger" value="Sign up">		
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="">Email</label>
			<input class="form-control" type="text" name="email" value="<?php echo (isset($email)) ? $email : ''; ?>" required/>
		</div>

		<div class="form-group">
			<label for="">Confirm Password</label>
			<input class="form-control" type="password" name="confirm" value="<?php echo (isset($c_password)) ? $c_password : ''; ?>" required/>		
		</div>

		<div class="form-group">
			<label for="">Postcode</label>					
			<select class="form-control" name="postcode" id="postcode" required>
				<option value="">Select Postcode</option>
				<?php 
					$qre= mysql_query("SELECT * FROM tbl_postcode");
					while($res = mysql_fetch_array($qre)) {
						if($postcode==$res['id']) {
							echo '<option value="'.$res['id'].'" selected>'.$res['postcode'].'</option>';
						} else {
							echo '<option value="'.$res['id'].'">'.$res['postcode'].'</option>';
						}						
					}
				?>
			</select>
		</div>
		<div class="show_location"></div>
		<div class="form-group">
			<label for="">Location</label>
			<input type="text" class="form-control" name="location" value="<?php echo (isset($location)) ? $location : ''; ?>" required/>			
		</div>
	</div>
	</form>
</div>
<?php require 'footer.php'; ?>