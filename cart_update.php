<?php require 'dbconfig.php'; 
	
if(isset($_POST['type']) && $_POST['type']=='add') {
	$prod_code 		=	$_POST['prod_code'];
	$return_url		=	base64_decode($_POST['return_url']);

	$qre = mysql_query("SELECT * FROM tbl_product WHERE id='".$prod_code."' ");
	$res = mysql_fetch_array($qre);

	$new_product = array(
		array(
			'name'=>$res['prod_name'],
			'code'=>$res['id'],
			'qty'=>1,
			'price'=>$res['price']
		)
	);

	if(isset($_SESSION['E_products'])) {
		$found = false;

		foreach($_SESSION['E_products'] as $cart_item) {
			if($cart_item['code']==$prod_code) {
				$qty 		=	$cart_item['qty']+1;
				$product[]	=	array(
					'name'	=>$cart_item['name'],
					'code'	=>$cart_item['code'],
					'qty'	=>$qty,
					'price'=>$cart_item['price']
				);
				$found = true;
			} else {
				$product[] = array('name'=>$cart_item["name"], 'code'=>$cart_item["code"], 'qty'=>$cart_item["qty"], 'price'=>$cart_item["price"]);
			}
		}

		if($found==false) {
			$_SESSION['E_products'] = array_merge($product, $new_product);
		} else {
			$_SESSION['E_products'] = $product;
		}
	
	} else {
		$_SESSION["E_products"] = $new_product;
	}

	header('Location:'.$return_url);
}


if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["E_products"]))
{
	$product_code 	= $_GET["removep"]; //get the product code to remove
	$return_url = base64_decode($_GET["return_url"]); //get return url
	
	foreach ($_SESSION["E_products"] as $cart_item) //loop through session array var
	{
		if($cart_item["code"]==$product_code){ //item exist in the list
			
			//continue only if quantity is more than 1
			//removing item that has 0 qty
			if($cart_item["qty"]>1) 
			{
			$qty = $cart_item["qty"]-1; //just decrese the quantity
			//prepare array for the E_products session
			$product[] = array('name'=>$cart_item["name"], 'code'=>$cart_item["code"], 'qty'=>$qty, 'price'=>$cart_item["price"]);
			}
			
		}else{
			$product[] = array('name'=>$cart_item["name"], 'code'=>$cart_item["code"], 'qty'=>$cart_item["qty"], 'price'=>$cart_item["price"]);
		}
		
		//set session with new array values
		$_SESSION["E_products"] = $product;
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}


?>