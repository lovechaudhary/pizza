<?php require('dbconfig.php'); ?>
<?php $title="Home"; ?>
<?php require 'header.php'; ?>  

<div class="row">
    <div class="col-md-12"><!-- slider -->
      <div class="hero-wall">
      
        <div class="signin">
              <h1 class="text-center">Signin to start</h1>
              <div class="form-group">
                <input type="text" placeholder="email" class="form-control" id="">
              </div>
              <div class="form-group">
                <input type="password" placeholder="password" class="form-control" id="">
              </div>
              <button class="btn btn-danger btn-block btnlarge btn-lg">Sign In</button>
              <a href="#" class="forgot">forgot password</a>
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
