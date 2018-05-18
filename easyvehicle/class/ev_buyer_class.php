<?php 

/**
* 
*/
class ev_buyer extends ev_dbmanager{
	
	public function ev_submit_bid($form = array()){
		global $wpdb, $obj;
		$user_id  = get_current_user_id();

		$current_user = wp_get_current_user();
		if (in_array('buyer', $current_user->roles) || in_array('buyer_and_seller', $current_user->roles)) {

			$_POST['user_id'] = $user_id;
			$_POST['status'] = 'pending';
			$wpdb->insert($wpdb->prefix.'auction_activity' , $_POST);

			$check = $obj->getRows($wpdb->prefix.'auction_activity' , ['where' => ['id' => $wpdb->insert_id ] , 'return_type' => 'single'  ]);
			
			$check->user_id = $obj->get_user_name($check->user_id);

			wp_mail($current_user->data->user_email, 'Bid Confirmation', 'Thankyou for placing bid.');
			
			$dataarray = array(
				'msg' 	=> 'Your bid has been published!',
				'class' => 'alert alert-success',
				'bid' 	=> $check,
			);
		}else{
			$dataarray = array(
				'msg' 		=> 'Please login from Buyer Account!',
				'class' 	=> 'alert alert-danger',
			);
		}

		$response = json_encode($dataarray);
		return $response;
	}

	public function ev_highest_bid($id = ''){
		// select Highest Bid
		global $wpdb;
		$sql = 'SELECT MAX(bid_amount) AS highest FROM '.$wpdb->prefix.'auction_activity WHERE status = "approved" AND prod_id = '.$id.' ';
		$highbid = $wpdb->get_row($sql);
		if ($highbid->highest) {
			$data = $highbid->highest+1;
		}else{
			$price  = get_post_meta( $id, 'ev_auc_price', true );
			$data = $price+1;
		}
		return $data;
	}


	public function ev_bid_delete_by_id($id = ''){
		global $wpdb;
		$wpdb->delete( $wpdb->prefix.'auction_activity' , array( 'id' => $id ) );
		return true;		
	}

	public function ev_change_bid_status($id = ''){
		global $wpdb, $obj;
		$check = $obj->getRows($wpdb->prefix.'auction_activity' , ['where' => ['id' =>$id ] , 'return_type' => 'single'  ]);
		if ($check->status == 'approved') {
			$status = 'pending'; 
		}else{
			$status = 'approved'; 
		}
		$wpdb->update($wpdb->prefix.'auction_activity', ['status' => $status], array( 'id' => $id ));
		return true;
	}

	public function price_calculate($price=''){
		if ($price <= 4999) {
			return 299;
		}elseif ($price >= 5000 && $price <= 14999){
			return 399;
		}elseif ($price >= 15000 && $price <= 24999) {
			return 499;
		}elseif ($price >= 25000) {
			return 599;
		}
	}

	public function ev_winnerofthisbid($id='', $proid=''){
		global $wpdb, $obj;
		$check = $obj->getRows($wpdb->prefix.'auction_activity' , ['where' => ['prod_id' => $proid , 'status' => 'winner' ] ]);
		if ($check) {
			return false;
		}else{
			$status = 'winner'; 
			$wpdb->update($wpdb->prefix.'auction_activity', ['status' => $status], array( 'id' => $id ));
			$check = $obj->getRows($wpdb->prefix.'auction_activity' , ['where' => ['id' => $id ] , 'return_type' => 'single' ]);


$pro_price 	= $check->bid_amount;
$mscprice 	= $this->price_calculate($check->bid_amount);
$fee 		= 99; 
$shipping 	= 70;
$total = $pro_price+$mscprice+$fee+$shipping;

$message = '
<a href="http://easyvehicleauction.com/checkout/?pro_id='.$proid.'"><h3>Congratulations. You have won the auction. Click Here</h3></a>
<table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;">

<tr style="background-color: #e0e0e0;"><th>Product Name:</th><td>'.get_the_title($proid).'</td></tr>
<tr><th>Bid Amount:</th><td>$'.$pro_price.'</td></tr>
<tr style="background-color: #e0e0e0;"><th>Documentation fees:</th><td>$'.$fee.'</td></tr>
<tr><th>Easy Vehicle Auction Fees:</th><td>$'.$mscprice.'</td></tr>
<tr style="background-color: #e0e0e0;"><th>Shipping release fees:</th><td>$'.$shipping.'</td></tr>
<tr><th>Total:</th><td>$'.$total.'</td></tr>
</table>
';
$headers = array('Content-Type: text/html; charset=UTF-8');
wp_mail( $obj->get_user_email_by_id($check->user_id) , 'Auction won on Easy vehicle', $message, $headers);
return true;

		}
	}

}

$buyer = new ev_buyer();

