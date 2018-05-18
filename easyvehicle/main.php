<?php 
// Show Menus
$current_user = wp_get_current_user();

// Admin Pages
require 'admin/ajaxfunctinos.php';  
require 'admin/cs_fields.php';
require 'admin/custom_posttype.php';  

// main class
require 'class/main_class.php';
// Seler
require 'class/seller_class.php';
// Buyer
require 'class/ev_buyer_class.php';


// functions
require 'class/cm_admin.php';

// payment gateway
require 'pay/includes/config.php';

// this on activation (pending)
add_role('seller', 'Seller', 	array('read'=> true, 'upload_files' => true));
add_role('buyer', 'Buyer', 		array('read'=> true, 'upload_files' => true));
add_role('buyer_and_seller', 'Buyer and Seller', 	array('read'=> true, 'upload_files' => true));


add_menu_page( 'EV Management system', 'EV Management system', 'manage_options', 'ev_management_system', 'ev_management_system', 'dashicons-networking', 50 );
function ev_management_system(){ echo "Dashboard"; }
	add_submenu_page( 'ev_management_system', 'Sell your Car', 'Sell your Car', 'manage_options', 'edit.php?post_type=sell_ur_car', mull );




// $get = get_post_meta( 1264, 'gallery', true);
// pr($get);