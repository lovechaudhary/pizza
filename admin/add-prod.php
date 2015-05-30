<?php include('top.php'); ?>
<?php include('auth.php'); ?>
<title>Add Product | Admin</title>
</head>
<?php 
	if(isset($_POST['submit'])) {
		$menu_id 		=	mysql_real_escape_string($_POST['menu']);
		$prod_name		=	mysql_real_escape_string($_POST['prod_name']);
		$food_cat		=	mysql_real_escape_string($_POST['food_cat']);
		$price 			=	mysql_real_escape_string($_POST['price']);
		$extra_cost 	=	mysql_real_escape_string($_POST['extra_cost']);
		$img_name 		=	$_FILES['img']['name'];
		$img_tmp_name	=	$_FILES['img']['tmp_name'];
		$img_type       = 	$_FILES['img']['type'];
		$rand			=	rand(1111,9999);
		$img_new_name	=	$rand.$img_name;
		$upload_files   =   'product_images';
		// echo APP_PATH.'product_images/';
		// echo '<br/>';
		// echo dirname(__FILE__);
		if(empty($menu_id)) {
			$error = '<div class="alert alert-danger">Select Menu name first</div>';
		} else if(empty($prod_name)) {
			$error = '<div class="alert alert-danger">Enter product name</div>';
		} else if(empty($food_cat)) {
			$error = '<div class="alert alert-danger">Select food category</div>';
		} else if(empty($price)) {
			$error = '<div class="alert alert-danger">Enter price of product</div>';
		} else if(empty($img_name)) {
			$error = '<div class="alert alert-danger">Select an image of the product</div>';
		} else {
			$qre = mysql_query("INSERT INTO `tbl_product`(`menu_id`, `prod_name`, `food_category`, `price`, `extra_cost`, `img`) VALUES ('$menu_id','$prod_name','$food_cat','$price','$extra_cost','$img_new_name')") or die(mysql_error());
			if($qre) {
				move_uploaded_file($img_tmp_name, $upload_files.'/'.$img_new_name);
				$error = '<div class="alert alert-success">Success Product Inserted</div>';
			}
		}
	}

	// if(isset($_POST['submit_close'])) {
	// 	$menu_name = mysql_real_escape_string($_POST['name']);
	// 	if(empty($menu_name)) {
	// 		$error = '<div class="alert alert-danger">Enter Menu name first</div>';
	// 	} else {
	// 		$qre = mysql_query("INSERT INTO `tbl_menu`(`menu_name`) VALUES ('$menu_name')") or die(mysql_error());
	// 		if($qre) {
	// 			$error = '<div class="alert alert-success">Success Menu Inserted</div>';
	// 			header('location:'.APP_PATH.'show-menus.php');
	// 			exit;
	// 		}
	// 	}
	// }
?>
<body>
<?php include('includes/navbar.php'); ?>
<div class="container">
  	<h1>Add Products</h1>
  	<?php 
  		if(isset($error)) {
  			echo $error;
  		}
  	?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="col-md-6">
		<div class="form-group">
			<label for="">Menu Under *</label>
			<?php MenuList() ?>						
		</div>
		<div class="form-group">
			<label for="">Product Name *</label>
			<input type="text" name="prod_name" class="form-control" id="">
		</div>
		<div class="form-group">
			<label for="">Food Category *</label>
			<?php FoodCat() ?>
		</div>		
		<div class="form-group">
			<label for="">Price *</label>
			<div class="input-group">
				<div class="input-group-addon"><img src="<?php echo IMG ?>pound.png"/></div>
				<input type="text" name="price" class="form-control" id="">
			</div>
		</div>
		<div class="form-group">
			<label for="">Extra Cost</label>
			<div class="input-group">
				<div class="input-group-addon"><img src="<?php echo IMG ?>pound.png"/></div>
				<input type="text" name="extra_cost" class="form-control" id="">
			</div>
		</div>
		<div class="form-group">
			<label for="">Image *</label>
			<input type="file" name="img" id="">
		</div>								
		<div class="form-group">
			<input type="submit" name="submit" value="Save & New" class="btn btn-primary">
			<!-- <input type="submit" name="submit_close" value="Save & Close" class="btn btn-primary"> -->
		</div>
	</div>
</form>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/app.js"></script>
  </body>
</html>