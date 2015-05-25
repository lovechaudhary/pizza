<?php include('top.php'); ?>
<?php include('auth.php'); ?>
<title>Dashboard | Admin</title>
</head>

<body>
<?php include('includes/navbar.php'); ?>
<div class="container">
	<div style="padding:20px;;border:1px solid #EEE; border-radius:4px;">
		<a href="<?php echo APP_PATH ?>add-menus.php">Add Menus</a> 		
	</div>	
	<br />
	<div style="padding:20px;;border:1px solid #EEE; border-radius:4px;">
		<a href="<?php echo APP_PATH ?>add-prod.php">Add Products</a>
	</div>
	<br />
	<div style="padding:20px;;border:1px solid #EEE; border-radius:4px;">
		<a href="<?php echo APP_PATH ?>add-postcode.php">Add Postcode</a>
	</div>	
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/app.js"></script>
  </body>
</html>