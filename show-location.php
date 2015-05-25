<?php 
	require('dbconfig.php');
	$coverty_id = $_POST['pcode'];
	$qre = mysql_query("SELECT * FROM tbl_postcode WHERE id='".$coverty_id."' ");
	if(mysql_num_rows($qre)!=0) {
		$res = mysql_fetch_array($qre);
		$pound = '';
		if($res['delivery_charge']!='Free Delivery') {
			$pound = '<img src="images/pound_green.png" width="15"/>';
		} else {
			$pound = '';
		}
		$loc = explode(",", $res['locations']);
		$loc_text = array();
		foreach ($loc as $key => $value) {
			$qre1 = mysql_query("SELECT * FROM tbl_location WHERE id='".$value."' ");
			$res1 = mysql_fetch_array($qre1);
			$loc_text[] = $res1['name'];
		}
		$final_loc = implode(",", $loc_text);
		echo '
			<p>Delivery Charge: '.$pound.' '.$res['delivery_charge'].'</p>
			<p>Coventry: '.$res['coventry'].'</p>
			<p>Locations: '.$final_loc.'</p>
		';
	} else {
		echo "This postcode has not been updated";
	}
?>