<?php 


// seller-listing
function EV_cs_fields_add_meta_box() {
	add_meta_box(
		'EV_cs_fields_add_meta_box',
		__( 'Auction Fields', 'custom_fields' ),
		'EV_custom_fields_html',
		'listings',
		'advanced',
		'high'
	);	
}
add_action( 'add_meta_boxes', 'EV_cs_fields_add_meta_box' );

if (!empty($_GET['post'])) {
	$ev_auc_active 	= get_post_meta( $_GET['post'], 'ev_auc_active', true );
	if (!empty($ev_auc_active)) {
		function EV_biing_meta_box() {
			add_meta_box(
				'EV_biing_meta_box',
				__( 'All Bids', 'custom_fields' ),
				'EV_biing_meta_box_html',
				'listings',
				'advanced',
				'high'
			);
		}
		add_action( 'add_meta_boxes', 'EV_biing_meta_box' );
		function EV_biing_meta_box_html(){	
			global $obj, $wpdb;
			$getbids = $obj->getRows($wpdb->prefix.'auction_activity' , ['where' =>['prod_id' => $_GET['post']] , 'order_by' =>'id DESC']);

			$content = '
			<table class="form-table">
			<tr>
			<th>Date</th>
			<th>UserName</th>
			<th>Bid Amount</th>
			<th>Status</th>
			<th>Actions</th>
			</tr>
			';
			if ($getbids) {
				foreach ($getbids as $getbidskey) {
					$content .= '
					<tr class="'.$getbidskey->status.'">
					<td>'.$getbidskey->date.'</td>
					<td>'.$obj->get_user_name($getbidskey->user_id).'</td>
					<td>'.ev_price($getbidskey->bid_amount).'</td>
					<td>'.strtoupper($getbidskey->status).'</td>
					<td>
						<a href="'.site_url().'/wp-admin/admin-ajax.php?action=ev_delete_bid&id='.$getbidskey->id.'" class="button button-primary button-small">Delete</a>
						<a href="'.site_url().'/wp-admin/admin-ajax.php?action=ev_change_status&id='.$getbidskey->id.'" class="button button-primary button-small">Change Status</a>
						<a href="'.site_url().'/wp-admin/admin-ajax.php?action=ev_winnerofthisbid&id='.$getbidskey->id.'&proid='.$getbidskey->prod_id.'" class="button button-primary button-small">Declare Winner</a>
					</td>
					</tr>
					';
				}
			}
			$content .='
			</table>
			';
			echo $content;
		}
}//endif
}//endif

function EV_custom_fields_html(){
	if (!empty($_GET['post'])) {
		$ev_auc_price 		= get_post_meta( $_GET['post'], 'ev_auc_price', true );
		$ev_auc_start_date 	= get_post_meta( $_GET['post'], 'ev_auc_start_date', true );
		$ev_auc_end_date 	= get_post_meta( $_GET['post'], 'ev_auc_end_date', true );
		$ev_auc_active 	= get_post_meta( $_GET['post'], 'ev_auc_active', true );
		
		$ev_auc_active_value = '';

		if (!empty($ev_auc_active)) {
			$ev_auc_active = 'checked';
		}else{
			$ev_auc_active_value = 'checked';
		}
		echo '
		<label for="">
			Auction Active for this product or not?
			<input type="checkbox" name="ev_auc_active" value="checked" '.$ev_auc_active.'>
		</label>		
		<label for="">
			Bid Start Price
			<input type="number" name="ev_auc_price" value="'.$ev_auc_price.'">
		</label>
		<label for="">
			Auction Start Date 
			<input type="date" name="ev_auc_start_date" value="'.$ev_auc_start_date.'">
		</label>
		<label for="">
			Auction End Date
			<input type="date" name="ev_auc_end_date" value="'.$ev_auc_end_date.'">
		</label>
		';
	}
}


function EV_custom_fields_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if (isset( $_POST['ev_auc_price'] )) {update_post_meta( $post_id, 'ev_auc_price', $_POST['ev_auc_price']);}
	if (isset( $_POST['ev_auc_start_date'] )) {update_post_meta( $post_id, 'ev_auc_start_date', $_POST['ev_auc_start_date']);}
	if (isset( $_POST['ev_auc_end_date'] )) {update_post_meta( $post_id, 'ev_auc_end_date', $_POST['ev_auc_end_date']);}
	update_post_meta( $post_id, 'ev_auc_active', @$_POST['ev_auc_active']);
}
add_action( 'save_post', 'EV_custom_fields_save' );

// Meta box for admin - show payment history of user
function EV_cms_show_meta_box($user){
	global $obj, $wpdb;
	$getaall = $obj->getRows($wpdb->prefix.'usermeta' , ['where' =>
		['user_id' => $user->ID, 'meta_key' => 'ev_payment_on_signup'  ],
	]);
	if (in_array('seller', $user->roles) || in_array('buyer', $user->roles) || in_array('buyer_and_seller', $user->roles)) {
		echo '
		<div id="student_courses">
		<h3>Payment History</h3>
		<table class="form-table">';
		foreach ($getaall as $key) {
			$detach = json_decode($key->meta_value);
			echo '
			<tr>
			<th>
			<label>TRANSACTIONID</label>
			</th>
			<th>
			<label>CORRELATIONID</label>
			</th>
			<th>
			<label>STATUS</label>
			</th>	
			</tr>
			<tr>
				<td>'.$detach->TRANSACTIONID.'</td>
				<td>'.$detach->CORRELATIONID.'</td>
				<td>'.$detach->STATUS.'</td>
			</tr>
			';
		}
		echo '
		</table>
		</div>';
	}
}
add_action('edit_user_profile','EV_cms_show_meta_box');

// Meta box for admin - send credentials of other accounts
function EV_cms_show_meta_box1($user){
	global $obj, $wpdb;
	$getaall = $obj->getRows($wpdb->prefix.'usermeta' , ['where' =>
		['user_id' => $user->ID, 'meta_key' => 'ev_payment_on_signup'  ],
	]);
	if (in_array('seller', $user->roles) || in_array('buyer', $user->roles) || in_array('buyer_and_seller', $user->roles)) {
		$user = '';
		if (isset( $_GET['user_id'] )) {
			$user = get_usermeta($_GET['user_id'], 'ev_user_credentials');
		}
		$user_IAAI = '';
		if (isset( $_GET['user_id'] )) {
			$user_IAAI = get_usermeta($_GET['user_id'], 'ev_user_credentials_IAAI');
		}		
		echo '	
<table class="form-table">
<tbody><tr class="user-description-wrap">
	<th><label for="description">Insert Copart Credentials</label></th>
	<td>
		<textarea name="account_credentials" id="description_123" rows="5" cols="30">'.$user.'</textarea>
	</td>
</tr>
</tbody>
</table>


<table class="form-table">
<tbody><tr class="user-description-wrap">
	<th><label for="description">Insert IAAI Credentials</label></th>
	<td>
		<textarea name="account_credentials_IAAI" id="description_123" rows="5" cols="30">'.$user_IAAI.'</textarea>
	</td>
</tr>
</tbody>
</table>

		';
	}
}
add_action('edit_user_profile','EV_cms_show_meta_box1');


add_action( 'personal_options_update', 'update_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'update_extra_profile_fields' );
function update_extra_profile_fields($user_id) {
 	if ( current_user_can('edit_user',$user_id) ){
 		update_user_meta($user_id, 'ev_user_credentials', $_POST['account_credentials']);
 	}
 	if ( current_user_can('edit_user',$user_id) ){
 		update_user_meta($user_id, 'ev_user_credentials_IAAI', $_POST['account_credentials_IAAI']);
 	} 	
 }



// seller fiels
function EV_cs_fields_add_meta_box1() {
	add_meta_box(
		'EV_cs_fields_add_meta_box1',
		__( 'Seller Car Fields', 'custom_fields' ),
		'EV_custom_sell_ur_car_html',
		'sell_ur_car',
		'advanced',
		'high'
	);	
}
add_action( 'add_meta_boxes', 'EV_cs_fields_add_meta_box1' );
function EV_custom_sell_ur_car_html(){
	echo '
	<div id="student_courses">
	<table class="form-table">';
	if (!empty($_GET['post'])) {
		$get = get_post_meta( $_GET['post'], 'ev_metadata', true );
		foreach ($get as $key => $value) {
			echo '	<tr>
			<td>'.$key.'</td>
			<td>'.$value.'</td>
			</tr>
			';
		}
		echo '
		</table>
		</div>';
	}
}
