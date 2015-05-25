<?php require('dbconfig.php'); ?>
<?php $title="Our Menu"; ?>
<?php require 'header.php'; ?>
<?php $return_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>
	<div class="row">
		<div class="col-md-2">
			<div class="yellow_menu">
				<h3><a href='our-menu.php'>Menu</a></h3>
				<ul class="nav nav-pills nav-stacked">					
					<?php 
						$qre1 = mysql_query("SELECT * FROM tbl_menu WHERE isdisplay=1 ORDER BY menu_name ASC");
						while($res1 = mysql_fetch_array($qre1)) {
							echo '<li><a href="our-menu.php?category='.$res1['id'].'"><i class="fa fa-cutlery"></i>'.$res1['menu_name'].'</a></li>';
						}
					?>
				</ul>
			</div>

		</div>
		
		<div class="col-md-7">
			<div class="row">				
				<?php 		
					if(isset($_GET['category'])){
						$qre = mysql_query("SELECT * FROM tbl_product WHERE isdisplay=1 and menu_id='".$_GET['category']."' ORDER BY id");
					}else{							
						$qre = mysql_query("SELECT * FROM tbl_product WHERE isdisplay=1 ORDER BY id");
					}
					while($res = mysql_fetch_array($qre)) {
				?>
				<div class="col-md-4"> 
					<div class="product_block">
						<img src="admin/product_images/<?php echo $res['img'] ?>" alt="<?php echo $res['prod_name'] ?>" title="<?php echo $res['prod_name'] ?>" class="img-responsive">
						<h4 class="text-center" style="color:#E81A24;font-weight:bold;"><?php echo $res['prod_name'] ?></h4>
						<div class="price">From <img src="images/pound_green.png" align="absmiddle" alt="" class="pound"> <?php echo number_format($res['price'],2); ?></div>
						<form action="cart_update.php" method="post">
							<button class="addToCart">Add to cart</button>
							<input type="hidden" name="prod_code" value="<?php echo $res['id'] ?>">
							<input type="hidden" name="type" value="add"/>
							<input type="hidden" name="return_url" value="<?php echo $return_url; ?>"/>
						</form>
					</div>
				</div>
				<?php 
					}
				?>			
			</div>
		</div>

		<div class="col-md-3">
			<h2>Your Order</h2>
				<?php 
				if(isset($_SESSION['E_products'])) {
					$total = 0;
					echo '<ol>';
					foreach ($_SESSION['E_products'] as $key => $cart_item) {
				?>
				<div class="col-md-12 orderBlock">
					<h4>
						<span class="quantity"><?php echo $cart_item['qty'] ?></span>		
						<?php echo $cart_item['name'] ?>
					</h4>
					<div>
						<div class="col-md-6 cart_add_sub">
							<?php 										
								$qre = mysql_query("SELECT * FROM tbl_product WHERE id='".$cart_item['code']."' AND isdisplay=1 ORDER BY id");
								$res = mysql_fetch_array($qre);
							?>
								<form method="post" action="cart_update.php">
									<button><i class="fa fa-plus"></i></button>
									<input type="hidden" name="prod_code" value="<?php echo $res['id'] ?>">
									<input type="hidden" name="type" value="add"/>
									<input type="hidden" name="return_url" value="<?php echo $return_url; ?>"/>	
								<a href="cart_update.php?removep=<?php echo $cart_item['code'] ?>&return_url=<?php echo $return_url ?>"><i class="fa fa-minus"></i></a>
								</form>
							
						</div>
						<div class="col-md-6 text-right">
							<h4><img src="images/pound_green.png" width="10"/>&nbsp;<b><?php echo number_format($cart_item['price'],2); ?></b></h4>
						</div>
					</div>
				</div>
				<?php						
					$subtotal = ($cart_item['price']*$cart_item['qty']);
					$total = ($total+$subtotal);					
				?>

			<?php } ?>
			<div class="col-md-12 orderBlock">
				<div class="col-md-6">
					<h4><b>Total</b></h4>
				</div>
				<div class="col-md-6 text-right">					
					<h4>
						<img src="images/pound_green.png" width="10"/>
						<b><?php echo number_format($total, 2); ?></b>
					</h4>
				</div>
			</div>	
			<?php 
				} else {
					echo "<center>Right now Cart is empty</center>";
				}
			?>
		</div>
	

	</div>



<?php require 'footer.php'; ?>