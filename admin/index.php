<?php include('top.php'); ?>
<title>Login | Admin</title>
</head>
<?php 
	if(isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		if(empty($username)) {
			$error = '<div class="alert alert-danger">Enter username</div>';
		} else if(empty($password)) {
			$error = '<div class="alert alert-danger">Enter password</div>';
		} else {
			$qre = mysql_query("SELECT * FROM admin WHERE username='".$username."' AND password='".$password."' ");
			$num = mysql_num_rows($qre);
			if($num != 0) {
				$res = mysql_fetch_array($qre);
				$_SESSION['AID'] = $res['id'];
				header('location:dashboard.php');
				exit;
			} else {
				$error = '<div class="alert alert-danger">Invalid username/password</div>';
			}
		}

	}
?>
<body>
  <nav class="navbar navbar-default">   
    <a class="navbar-brand" href="#">Admin Panel</a>
  </nav>
  <div class="container">
  <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="panel-title">Sign In</div>        
      </div>
      <div style="padding-top:30px" class="panel-body">
          <?php 
          	if(isset($error)) {
          		echo $error;
          	}
          ?>
        <form id="loginform" class="form-horizontal" role="form" method="post">
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">
          </div>
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
          </div>
          <div style="margin-top:10px" class="form-group">
            <!-- Button -->

            <div class="col-sm-12 controls">
              <input type="submit" id="btn-login" name="login" class="btn btn-success" value="Login">
       <a href='/password/remind'>Forgot password</a>
                  </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
</div>
<?php include('footer.php'); ?>