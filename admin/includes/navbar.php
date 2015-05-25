<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=".">Pizza O' More</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menus <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo APP_PATH ?>add-menus.php">Add Menus</a></li>
              <li><a href="<?php echo APP_PATH ?>show-menus.php">Show Menus</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Products <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo APP_PATH ?>add-prod.php">Add Products</a></li>
              <li><a href="<?php echo APP_PATH ?>show-prod.php">Show Products</a></li>
          </ul>
        </li>   
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Postcodes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo APP_PATH ?>add-postcode.php">Add Postcode</a></li>
              <li><a href="<?php echo APP_PATH ?>show-postcode.php">Show Postcode</a></li>
          </ul>
        </li>                        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Locations <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo APP_PATH ?>add-location.php">Add Location</a></li>
              <li><a href="<?php echo APP_PATH ?>show-location.php">Show Location</a></li>
          </ul>
        </li>                
		    <li><a href="<?php echo APP_PATH ?>change-password.php">Change Password</a></li>
		    <li><a href="<?php echo APP_PATH ?>logout.php">Logout</a></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="javascript:;">Welcome Admin</a></li>
      </ul>
    </div>
  </div>
</nav>