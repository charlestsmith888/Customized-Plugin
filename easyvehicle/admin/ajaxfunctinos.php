<?php 
// on registration
add_action( 'wp_ajax_ev_checkusername', 'ev_checkusername' );
add_action( 'wp_ajax_nopriv_ev_checkusername', 'ev_checkusername' );
function ev_checkusername(){
	if (username_exists($_POST['userName'])) {
		echo 'false';
	}else{
		echo 'true';
	}
	exit();
}
add_action( 'wp_ajax_ev_checkemail', 'ev_checkemail' );
add_action( 'wp_ajax_nopriv_ev_checkemail', 'ev_checkemail' );
function ev_checkemail(){
	if (email_exists($_POST['userEmail'])) {
		echo 'false';
	}else{
		echo 'true';
	}
	exit();
}

// registration
add_action( 'wp_ajax_ev_registration_submit', 'ev_registration_submit' );
add_action( 'wp_ajax_nopriv_ev_registration_submit', 'ev_registration_submit' );
function ev_registration_submit(){
	global $seller;
	print($seller->ev_registration_user($_POST));
	exit();
}



/********************  Buyer   ************************/
add_action( 'wp_ajax_ev_submit_bid', 'ev_submit_bid' );
add_action( 'wp_ajax_nopriv_ev_submit_bid', 'ev_submit_bid' );
function ev_submit_bid(){
	global $buyer;
	print($buyer->ev_submit_bid($_POST));
	exit();
}
// Delete By ID
add_action( 'wp_ajax_ev_delete_bid', 'ev_delete_bid' );
add_action( 'wp_ajax_nopriv_ev_delete_bid', 'ev_delete_bid' );
function ev_delete_bid(){
	global $buyer;
	$buyer->ev_bid_delete_by_id($_GET['id']);
	echo '<script>alert("Bid has been delete!"); window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
	exit();
}
// change status of bid
add_action( 'wp_ajax_ev_change_status', 'ev_change_status' );
add_action( 'wp_ajax_nopriv_ev_change_status', 'ev_change_status' );
function ev_change_status(){
	global $buyer;
	$buyer->ev_change_bid_status($_GET['id']);
	echo '<script>alert("Status has been changed!"); window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
	exit();
}
// Declare winner of this bid
add_action( 'wp_ajax_ev_winnerofthisbid', 'ev_winnerofthisbid' );
add_action( 'wp_ajax_nopriv_ev_winnerofthisbid', 'ev_winnerofthisbid' );
function ev_winnerofthisbid(){
	global $buyer;
	if ($buyer->ev_winnerofthisbid($_GET['id'], $_GET['proid'])) {
		echo '<script>alert("Winner has been declare!"); window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
	}else{
		echo '<script>alert("Winner is already diclared!"); window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
	}
	exit();
}




/********************  Seller   ************************/

if (!function_exists('insert_attachment')) {
	function insert_attachment($file_handler, $post_id, $setthumb=false) {
		if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) {
			return __return_false();
		}
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		require_once(ABSPATH . "wp-admin" . '/includes/file.php');
		require_once(ABSPATH . "wp-admin" . '/includes/media.php');
		$attach_id = media_handle_upload( $file_handler, $post_id );
		return $attach_id;
	}
}

// Seller add car in list
add_action( 'wp_ajax_ev_sell_your_car_add', 'ev_sell_your_car_add' );
add_action( 'wp_ajax_nopriv_ev_sell_your_car_add', 'ev_sell_your_car_add' );
function ev_sell_your_car_add(){
	global $buyer;
	$id = wp_insert_post(array('post_title'=> $_POST['title'], 'post_type'=>'sell_ur_car', 'post_content'=>$_POST['discription'] ));
	$attachmentsid = array();
	if (!empty($_FILES['file1'])) {
		$attachmentsid[] = insert_attachment('file1' , $id);
	}
	if (!empty($_FILES['file2'])) {
		$attachmentsid[] = insert_attachment('file2' , $id);
	}	
	if (!empty($_FILES['file3'])) {
		$attachmentsid[] = insert_attachment('file3' , $id);
	}
	if (!empty($_FILES['file4'])) {
		$attachmentsid[] = insert_attachment('file4' , $id);
	}	
	if (!empty($_FILES['file5'])) {
		$attachmentsid[] = insert_attachment('file5' , $id);
	}
	if (!empty($_FILES['file6'])) {
		$attachmentsid[] = insert_attachment('file6' , $id);
	}	
	add_post_meta( $id, 'ev_metadata', $_POST['meta_data'], $unique = false );
	add_post_meta( $id, 'ev_attachments', $attachmentsid, $unique = false );
	echo '<script>alert("Your request has been sent to the admin, will get back to you shortly!"); window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
	exit();
}


// clasified listing
add_action( 'wp_ajax_ev_classified_listing', 'ev_classified_listing' );
add_action( 'wp_ajax_nopriv_ev_classified_listing', 'ev_classified_listing' );
function ev_classified_listing(){
	global $buyer;
	global $wpdb, $obj;
	$user_id  = get_current_user_id();

	$current_user = wp_get_current_user();
	if (in_array('seller', $current_user->roles) || in_array('buyer_and_seller', $current_user->roles)) {
		$id = wp_insert_post(array('post_title'=> $_POST['title'], 'post_type'=>'listings', 'post_content'=>$_POST['discription'] ));
		$attachmentsid = array();
		if (!empty($_FILES['file1'])) {
			$attachmentsid[] = insert_attachment('file1' , $id);
		}
		if (!empty($_FILES['file2'])) {
			$attachmentsid[] = insert_attachment('file2' , $id);
		}	
		if (!empty($_FILES['file3'])) {
			$attachmentsid[] = insert_attachment('file3' , $id);
		}
		if (!empty($_FILES['file4'])) {
			$attachmentsid[] = insert_attachment('file4' , $id);
		}	
		if (!empty($_FILES['file5'])) {
			$attachmentsid[] = insert_attachment('file5' , $id);
		}
		if (!empty($_FILES['file6'])) {
			$attachmentsid[] = insert_attachment('file6' , $id);
		}	
		add_post_meta( $id, 'gallery', $attachmentsid, $unique = false );

		add_post_meta( $id, 'stm_genuine_price', $_POST['meta_data']['price'], $unique = false );
		add_post_meta( $id, 'regular_price_label', 'Our price', $unique = false );
		add_post_meta( $id, 'price', $_POST['meta_data']['price'], $unique = false );
		add_post_meta( $id, 'sale_price', $_POST['meta_data']['price'], $unique = false );
		add_post_meta( $id, 'ca-year', $_POST['meta_data']['year'], $unique = false );
		add_post_meta( $id, 'make', $_POST['meta_data']['vehicle-model'], $unique = false );
		add_post_meta( $id, 'mileage', $_POST['meta_data']['oldmeter'], $unique = false );
		add_post_meta( $id, 'ev_meta_data', $_POST['meta_data'], $unique = false );

		echo '<script>alert("Your request has been sent to the admin, will get back to you shortly!"); window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
	}else{
		echo '<script>alert("You need to login from seller account!"); window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
	}



	exit();
}




