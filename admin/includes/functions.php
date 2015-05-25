<?php 

function MenuList() {
	echo '
		<select name="menu" id="menu" class="form-control">
			<option value="">Select Menu</option>';			 
			$qre = mysql_query("SELECT * FROM tbl_menu ORDER BY menu_name ASC");
			while($res = mysql_fetch_array($qre)) {					
				echo '<option value="'.$res['id'].'">'.$res['menu_name'].'</option>';					
			}
		echo '</select>
	';
}

function EditMenuList($val) {
	echo '
		<select name="menu" id="menu" class="form-control">
			<option value="">Select Menu</option>';			 
			$qre = mysql_query("SELECT * FROM tbl_menu ORDER BY menu_name ASC");
			while($res = mysql_fetch_array($qre)) {					
				if($res['id']==$val) {
					echo '<option value="'.$res['id'].'" selected>'.$res['menu_name'].'</option>';					
				} else {
					echo '<option value="'.$res['id'].'">'.$res['menu_name'].'</option>';					
				}				
			}
		echo '</select>
	';	
}

function FoodCat() {
	?>
	<select name="food_cat" id="food_cat" class="form-control">
		<option value="">Select Food Category</option>
		<option value="veg">Veg</option>
		<option value="nonveg">Non-Veg</option>
	</select>
	<?php
}

function EditFoodCat($val) {
	?>
	<select name="food_cat" id="food_cat" class="form-control">
		<option value="">Select Food Category</option>
		<?php 
			if($val=='veg') {
				echo '<option value="veg" selected>Veg</option>';
			} else {
				echo '<option value="veg">Veg</option>';
			}
			if($val=='nonveg') {
				echo '<option value="nonveg" selected>Non-Veg</option>';
			} else {
				echo '<option value="nonveg">Non-Veg</option>';
			}
		?>				
	</select>
	<?php
}

function ShowMenu() { 
	$qre = mysql_query("SELECT * FROM tbl_menu ORDER BY id DESC");
	$num = mysql_num_rows($qre);
	if($num!=0) {
		?>
		<h3>Show Menus</h3>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Menu Name</th>
				<th>Action</th>
			</tr>
			<?php
				$i=1;
				while($res = mysql_fetch_array($qre)) {
					extract($res);
					$publish = '';
					if($isdisplay=='1')
					{
						$display	='<a href="'.APP_PATH.'show-menus.php?id='.$id.'&action=unapprove"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true" title="Publish"></span></a>';	
					}
					else
					{
						$display	='<a href="'.APP_PATH.'show-menus.php?id='.$id.'&actions=approve"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true" title="Un-publish"></span></a>';	
					}
					echo '
						<tr>
							<td>'.$i.'</td>
							<td>'.$menu_name.'</td>
							<td><a href="'.APP_PATH.'edit-menu.php?id='.$id.'">Edit</a> | <a href="'.APP_PATH.'show-menus.php?id='.$id.'&act=delete" onClick="return confirmDeleteaction(this);">Delete</a> | '.$display.'</td>
						</tr>
					';
					$i++;
				}
			?>
		</table>
		<?php
	} else {
		echo 'There is no record yet....';
	}
}

function ShowPostcode() {
	$qre = mysql_query("SELECT * FROM tbl_postcode ORDER BY id DESC");
	$num = mysql_num_rows($qre);
	if($num!=0) {
		?>
		<h3>Show Postcode</h3>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Postcode</th>
				<th>Delivery Charge</th>
				<th>Coventry</th>
				<th>Locations</th>
				<th>Action</th>
			</tr>
			<?php
				$i=1;
				while($res = mysql_fetch_array($qre)) {
					extract($res);
					$publish = '';
					if($isdisplay=='1')
					{
						$display	='<a href="'.APP_PATH.'show-postcode.php?id='.$id.'&action=unapprove"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true" title="Publish"></span></a>';	
					}
					else
					{
						$display	='<a href="'.APP_PATH.'show-postcode.php?id='.$id.'&actions=approve"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true" title="Un-publish"></span></a>';	
					}
					$loc = array();
					$exploded_data = explode(",", $locations);
					foreach ($exploded_data as $key => $value) {
						$qre2 = mysql_query("SELECT * FROM tbl_location WHERE id='".$value."' ");
						$res2 = mysql_fetch_array($qre2);
						$loc[] = $res2['name'];
					}
					$show_location = implode(", ", $loc);
					echo '
						<tr>
							<td>'.$i.'</td>
							<td>'.$postcode.'</td>
							<td>'.$delivery_charge.'</td>
							<td>'.$coventry.'</td>
							<td>'.$show_location.'.</td>
							<td><a href="'.APP_PATH.'edit-postcode.php?id='.$id.'">Edit</a> | <a href="'.APP_PATH.'show-postcode.php?id='.$id.'&act=delete" onClick="return confirmDeleteaction(this);">Delete</a> | '.$display.'</td>
						</tr>
					';
					$i++;
				}
			?>
		</table>
		<?php
	} else {
		echo 'There is no record yet....';
	}	
}

function ShowLocation() { 
	$qre = mysql_query("SELECT * FROM tbl_location ORDER BY id DESC");
	$num = mysql_num_rows($qre);
	if($num!=0) {
		?>
		<h3>Show Locations</h3>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Location Name</th>
				<th>Action</th>
			</tr>
			<?php
				$i=1;
				while($res = mysql_fetch_array($qre)) {
					extract($res);
					$publish = '';
					if($isdisplay=='1')
					{
						$display	='<a href="'.APP_PATH.'show-location.php?id='.$id.'&action=unapprove"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true" title="Publish"></span></a>';	
					}
					else
					{
						$display	='<a href="'.APP_PATH.'show-location.php?id='.$id.'&actions=approve"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true" title="Un-publish"></span></a>';	
					}
					echo '
						<tr>
							<td>'.$i.'</td>
							<td>'.$name.'</td>
							<td><a href="'.APP_PATH.'edit-location.php?id='.$id.'">Edit</a> | <a href="'.APP_PATH.'show-location.php?id='.$id.'&act=delete" onClick="return confirmDeleteaction(this);">Delete</a> | '.$display.'</td>
						</tr>
					';
					$i++;
				}
			?>
		</table>
		<?php
	} else {
		echo 'There is no record yet....';
	}
}

function ShowProduct() {
	$qre = mysql_query("SELECT * FROM tbl_product ORDER BY id DESC");
	$num = mysql_num_rows($qre);
	if($num!=0) {
		?>
		<h3>Show Products</h3>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Menu Name</th>
				<th>Product Name</th>
				<th>Food Category</th>
				<th>Price <img src="<?php echo IMG ?>pound.png"/></th>
				<th>Extra Cost</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
			<?php
				$i=1;
				while($res = mysql_fetch_array($qre)) {
					$qre1 = mysql_query("SELECT * FROM tbl_menu WHERE id='".$res['menu_id']."' ");
					$res1 = mysql_fetch_array($qre1);
					extract($res);
					$publish = '';
					if($isdisplay=='1')
					{
						$display	='<a href="'.APP_PATH.'show-prod.php?id='.$id.'&action=unapprove"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true" title="Publish"></span></a>';	
					}
					else
					{
						$display	='<a href="'.APP_PATH.'show-prod.php?id='.$id.'&actions=approve"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true" title="Un-publish"></span></a>';	
					}
					echo '
						<tr>
							<td>'.$i.'</td>
							<td>'.$res1['menu_name'].'</td>
							<td>'.$prod_name.'</td>
							<td>'.$food_category.'</td>
							<td>'.$price.'</td>
							<td>'.$extra_cost.'</td>
							<td><img src="'.APP_PATH.'product_images/'.$img.'" alt="'.$prod_name.'" title="'.$prod_name.'" width="100"/></td>
							<td><a href="'.APP_PATH.'edit-prod.php?id='.$id.'">Edit</a> | <a href="'.APP_PATH.'show-prod.php?id='.$id.'&act=delete" onClick="return confirmDeleteaction(this);">Delete</a> | '.$display.'</td>
						</tr>
					';
					$i++;
				}
			?>
		</table>
		<?php
	} else {
		echo 'There is no record yet....';
	}
}

?>