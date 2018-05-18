<?php 

function seller_sheet_insert($form = array()){

	$json 			= json_encode(@$form['sellersheet']);
	$jsonaditional 	= json_encode(@$form['additionexp']);
	update_post_meta( $_POST['rehabID'], 'pro_seller_sheet', $json);
	update_post_meta( $_POST['rehabID'], 'pro_seller_sheet_additional', $jsonaditional);
	return true;
}	
