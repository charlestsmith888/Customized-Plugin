<?php
/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function cs_property_calculations() {
	$labels = array(
		'name'               => __( 'Properties', 'text-domain' ),
		'singular_name'      => __( 'Property', 'text-domain' ),
		'add_new'            => _x( 'Add New Property', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Property', 'text-domain' ),
		'edit_item'          => __( 'Edit Property', 'text-domain' ),
		'new_item'           => __( 'New Property', 'text-domain' ),
		'view_item'          => __( 'View Property', 'text-domain' ),
		'search_items'       => __( 'Search Properties', 'text-domain' ),
		'not_found'          => __( 'No Properties found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Properties found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Property:', 'text-domain' ),
		'menu_name'          => __( 'Properties', 'text-domain' ),
	);
	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
		),
	);
	register_post_type( 'properties', $args );
}
add_action( 'init', 'cs_property_calculations' );

// Styling and scripts
add_action('pro_property_scripts', 'lms_scripts_styles');
function lms_scripts_styles(){
	echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/propertycustom/css/bootstrap.css">';
}
// add setting Page
function pro_pertymenuadding(){
	add_submenu_page( 'edit.php?post_type=properties', 'Setting', 'Setting', 'manage_options', 'properties_settings', 'properties_setting_function');
}
add_action( 'admin_menu', 'pro_pertymenuadding', 10 );
function properties_setting_function(){ 
	require 'optionsa.php' ; 
}
// Setting Fields
add_action( 'admin_init', 'pro_register_settings' );
function pro_register_settings() {
	register_setting( 'ul-pro-settings-group', 'googleapi' );
}
function pro_custom_fields_add_meta_box() {
	add_meta_box(
		'pro_custom_fields_add_meta_box',
		__( 'Custom Fields', 'custom_fields' ),
		'ul_pro_custom_fields_html_____',
		'properties',
		'advanced',
		'high'
	);
}
add_action( 'add_meta_boxes', 'pro_custom_fields_add_meta_box' );
function ul_pro_custom_fields_html_____(){require 'metabox.php'; }
function pro_custom_fields_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	if ( isset( $_POST['customfiels'] ) ){ update_post_meta( $post_id, 'customfiels', $_POST['customfiels'] );}
	// echo "<pre>";
	// print_r(expression);
	if ( isset( $_POST['metaexterior'] ) ){
		foreach ($_POST['metaexterior'] as $key => $value) {
			if (!empty($value['isyes'])) {
				$dataexterioor[$key] = $value;
			}
		}
		update_post_meta( $post_id, 'metaexterior', $dataexterioor);
	}
	if ( isset( $_POST['metainterior'] ) ){
		foreach ($_POST['metainterior'] as $key => $value) {
			if (!empty($value['isyes'])) {
				$dataexterioor[$key] = $value;
			}
		}
		update_post_meta( $post_id, 'metainterior', $dataexterioor);
	}
	if ( isset( $_POST['metagarage'] ) ){
		foreach ($_POST['metagarage'] as $key => $value) {
			if (!empty($value['isyes'])) {
				$dataexterioor[$key] = $value;
			}
		}
		update_post_meta( $post_id, 'metagarage', $dataexterioor);
	}
}
add_action( 'save_post', 'pro_custom_fields_save' );



// // Interior update Defaults
// add_option( 'Default_garage', 'a:3:{s:4:"name";a:5:{i:0;s:4:"Roof";i:1;s:5:"Paint";i:2;s:6:"Siding";i:3;s:12:"Garage Doors";i:4;s:12:"Service Door";}s:3:"key";a:5:{i:0;s:8:"gar_Roof";i:1;s:9:"gar_Paint";i:2;s:10:"gar_Siding";i:3;s:16:"gar_Garage_Doors";i:4;s:16:"gar_Service_Door";}s:5:"isqty";a:5:{i:0;s:3:"yes";i:1;s:3:"yes";i:2;s:2:"no";i:3;s:3:"yes";i:4;s:3:"yes";}}');
// // Interior update Defaults
// add_option( 'Default_interior', 'a:3:{s:4:"name";a:12:{i:0;s:5:"Paint";i:1;s:5:"Doors";i:2;s:17:"Carpet / Flooring";i:3;s:7:"Kitchen";i:4;s:16:"Electrical Panel";i:5;s:17:"Electrical Wiring";i:6;s:5:"Baths";i:7;s:7:"Furnace";i:8;s:2:"AC";i:9;s:12:"Water Heater";i:10;s:10:"Misc Items";i:11;s:11:"MAO Formula";}s:3:"key";a:12:{i:0;s:9:"int_Paint";i:1;s:9:"int_Doors";i:2;s:19:"int_Carpet_Flooring";i:3;s:11:"int_Kitchen";i:4;s:20:"int_Electrical_Panel";i:5;s:21:"int_Electrical_Wiring";i:6;s:9:"int_Baths";i:7;s:11:"int_Furnace";i:8;s:6:"int_AC";i:9;s:16:"int_Water_Heater";i:10;s:14:"int_Misc_Items";i:11;s:15:"int_MAO_Formula";}s:5:"isqty";a:12:{i:0;s:3:"yes";i:1;s:2:"no";i:2;s:3:"yes";i:3;s:3:"yes";i:4;s:3:"yes";i:5;s:3:"yes";i:6;s:2:"no";i:7;s:3:"yes";i:8;s:3:"yes";i:9;s:3:"yes";i:10;s:3:"yes";i:11;s:3:"yes";}}');
// // Exterior update Defaults
// add_option( 'Default_exterior', 'a:3:{s:4:"name";a:6:{i:0;s:8:"Roof new";i:1;s:5:"Doors";i:2;s:11:"Patio Doors";i:3;s:5:"Paint";i:4;s:6:"Siding";i:5;s:8:"Driveway";}s:3:"key";a:6:{i:0;s:8:"ext_Roof";i:1;s:9:"ext_Doors";i:2;s:15:"ext_Patio_Doors";i:3;s:9:"ext_Paint";i:4;s:10:"ext_Siding";i:5;s:12:"ext_Driveway";}s:5:"isqty";a:6:{i:0;s:3:"yes";i:1;s:3:"yes";i:2;s:2:"no";i:3;s:2:"no";i:4;s:2:"no";i:5;s:3:"yes";}}');


?>