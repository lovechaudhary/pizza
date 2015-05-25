<?php include('top.php'); ?>
<?php include('auth.php'); ?>
<title>Change Password | Admin</title>
</head>
<?php 
	if(isset($_POST['submit'])) {
		$old 			=	$_POST['old'];
		$new 			=	$_POST['new'];
		$confirm 		= 	$_POST['confirm'];
		$old_hash		=	sha1($old);
		$new_hash 		=	sha1($new);
		$size_new 		=	strlen($new);
		$size_confirm 	=	strlen($confirm);				
		$qre = mysql_query("SELECT * FROM admin WHERE id='".$_SESSION['AID']."' ");
		$res = mysql_fetch_array($qre);
		if(empty($old)) {
			$error = '<div class="alert alert-danger">Enter old password</div>';
		} else if($old_hash!=$res['password']) {
			$error = '<div class="alert alert-danger">Old Password does not match</div>';
		} else if(empty($new)) {
			$error = '<div class="alert alert-danger">Enter new password</div>';
		} else if($size_new < 6) {
			$error = '<div class="alert alert-danger">New Password should be atleast 6 characters</div>';
		} else if(empty($confirm)) {
			$error = '<div class="alert alert-danger">Enter Confirm password</div>';
		} else if($size_confirm < 6) {
			$error = '<div class="alert alert-danger">Confirm Password should be atleast 6 characters</div>';
		} else if($new!=$confirm) {
			$error = '<div class="alert alert-danger">New and confirm Password does not match</div>';
		} else {
			$qre = mysql_query("UPDATE admin SET password='$new_hash', c_password='$new' WHERE id='".$_SESSION['AID']."' ");
			if($qre) {
				$error = '<div class="alert alert-success">New password has been updated.</div>';
				$after_old 		= '';
				$after_new 		= '';
				$after_confirm 	= '';
			}
		}
	}
?>
<body>
<?php include('includes/navbar.php'); ?>
<div class="container">
  	<h1>Change Password</h1>
  	<?php 
  		if(isset($error)) {
  			echo $error;
  		}
  	?>
<form action="" method="post">
	<div class="col-md-6">
		<div class="form-group">
			<label for="">Old password</label>
			<input type="password" name="old" class="form-control" id="" value="<?php if(isset($after_old)) { echo $after_old; } else { echo $old; } ?>">
		</div>
		<div class="form-group">
			<label for="">New password</label>
			<input type="password" name="new" class="form-control" id="" value="<?php if(isset($after_new)) { echo $after_new; } else { echo $new; } ?>">
		</div>		
		<div class="form-group">
			<label for="">Confirm password</label>
			<input type="password" name="confirm" class="form-control" id="" value="<?php if(isset($after_confirm)) { echo $after_confirm; } else { echo $confirm; } ?>">
		</div>		
		<div class="form-group">
			<input type="submit" name="submit" value="Update Password" class="btn btn-primary">			
		</div>
	</div>
</form>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/app.js"></script>
  </body>
</html>