<?php require('dbconfig.php'); ?>
<?php $title="Home"; ?>
<?php 
  // code here
  if(isset($_POST['login'])) {
    $uname  = $_POST['uname'];
    $pass   = $_POST['pass'] ;
    $hash   = sha1($pass);
    if(empty($uname)) {
      $error = '
        <div class="alert alert-warning">
        Enter Email
        </div>
      ';
    } else if(empty($pass)) {
      $error = '
        <div class="alert alert-warning">
        Enter Password
        </div>
      ';
    } else {
      $qre = mysql_query("SELECT * FROM tbl_signup WHERE email='".$uname."' AND password='".$hash."' ");
      if(mysql_num_rows($qre)==0) {
        $error = '
            <div class="alert alert-warning">
            Wrong Email or Password
            </div>
        ';
      } else {
        $res = mysql_fetch_array($qre);
        $_SESSION['UID'] = $res['id'];
        $_SESSION['UNAME'] = $res['cust_name'];
        header("location:our-menu.php");
        exit;
      }
    }
  }
?>
<?php require 'header.php'; ?>  

<div class="row">
    <div class="col-md-12"><!-- slider -->
      <div class="hero-wall">
      
        <div class="signin">
            <form method="post">
              <h1 class="text-center">Signin to start</h1>
              <?php echo (isset($error)) ? $error : ''; ?>
              <div class="form-group">
                <input type="text" placeholder="email" name="uname" class="form-control" id="" />
              </div>
              <div class="form-group">
                <input type="password" placeholder="password" name="pass" class="form-control" id="" />
              </div>
              <button class="btn btn-danger btn-block btnlarge btn-lg" type="submit" name="login">Sign In</button>
              <a href="#" class="forgot">forgot password</a>
            </form>  
              <h2 class="text-center" style="text-decoration:underline;font-weight:normal">New Customer?</h2>
              <a href="signup.php" class="newaccount">Create a new account</a>
            </div>
      
        <div class="slider">
              <img src="images/banner2.jpg" width="100%" alt="">
              <img src="images/banner3.jpg" width="100%" alt="">
              <img src="images/banner1.jpg" width="100%" alt="">
        </div>
      </div>
      </div>
  </div>  <!-- end-slider -->

  <div class="row" id="small_banners">
      <div class="col-md-4">
        <img class="img-responsive" src="images/add1.jpg">
      </div>
      <div class="col-md-4">
        <img class="img-responsive" src="images/add2.jpg">
      </div>
      <div class="col-md-4">
        <img class="img-responsive" src="images/add3.jpg">
      </div>

  </div>
<br clear="all">
  <hr>

  <div class="row">
    <h2>How does Pizza O'More Work?</h2>
    <div class="col-md-12">
      <img class="img-responsive" alt="" src="images/odelivery.jpg">

    </div>
  </div>

<?php require 'footer.php'; ?>  
