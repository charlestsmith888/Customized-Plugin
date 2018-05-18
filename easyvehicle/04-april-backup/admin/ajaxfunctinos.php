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

