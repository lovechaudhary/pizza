      </div>
  <!-- footer -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h3>Menu</h3>
            <ul class="list-unstyled">
              <?php 
                $qre1 = mysql_query("SELECT * FROM tbl_menu WHERE isdisplay=1 ORDER BY RAND() LIMIT 5 ");
                while($res1 = mysql_fetch_array($qre1)) {
                  echo '<li class="menu-item"><a class="menu-item-target" href="our-menu.php?category='.$res1['id'].'">'.$res1['menu_name'].'</a></li>';
                }
              ?>                    
            </ul>
          </div>
          

          <div class="col-md-3">
            <h3>Support</h3>
            <ul class="list-unstyled">
              <li class="menu-item">
              
              
              
                <a class="menu-item-target" href="#" target="_blank">Contact Us</a>
              
              
              
              </li>
              <li class="menu-item">
              
              
              
                <a class="menu-item-target" href="#" target="_blank">Terms &amp; Conditions</a>
              
              
              
              </li>
              <li class="menu-item">
              
              
              
                <a class="menu-item-target" href="#" target="_self">FAQ</a>
              
              
              
              </li>
              <li class="menu-item">
              
              
                <a class="menu-item-target" href="#" target="_self">Mobile Web</a>
              
              
              
              
              </li>
              <li class="menu-item">
              
              
              
                <a class="menu-item-target" href="#" target="_blank">Download our Menu</a>
              
              
              
              </li>
            </ul>
          </div>

          <div class="col-md-3">
            <h3>Follow us</h3>
            <ul class="list-unstyled">
              
                <li class="menu-item">
                  <a class="menu-item-target footer-icon fb" href="#" target="_blank">Facebook</a>
                  
                  
                                                  
                  
                  
                  
                </li>
              
                <li class="menu-item">
                  
                  
                  <a class="menu-item-target footer-icon yt" href="#" target="_blank">YouTube</a>
                                                  
                  
                  
                  
                </li>

              </ul>
          </div>
          


        </div>
        

      </div>
    </div>
  <!-- end footer -->
  <div class="copy">
    <div class="container">
      <div class="row">
          <div class="text-center text-ucase">Copyright © 2015 All Rights Reserved By Pizza O'More</div>
        </div>
    </div>
  </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/cycle.js"></script>
    <script type="text/javascript" src="inner.js"></script>
    <script>
      $(function(){
        $('.slider').cycle();
      });
    </script>

  </body>
</html>