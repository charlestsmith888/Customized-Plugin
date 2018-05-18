<?php 
/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function CS_form_fields() {

	$labels = array(
		'name'               => __( 'Refil Form', 'text-domain' ),
		'singular_name'      => __( 'Company', 'text-domain' ),
		'add_new'            => _x( 'Add Refil', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add Refil', 'text-domain' ),
		'edit_item'          => __( 'Edit Company', 'text-domain' ),
		'new_item'           => __( 'Refil', 'text-domain' ),
		'view_item'          => __( 'View Company', 'text-domain' ),
		'search_items'       => __( 'Search Refil Form', 'text-domain' ),
		'not_found'          => __( 'No Refil Form found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Refil Form found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Company:', 'text-domain' ),
		'menu_name'          => __( 'Refil Form', 'text-domain' ),
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
			'thumbnail',
			'excerpt',
		),
	);
	register_post_type( 'customform', $args );

}
add_action( 'init', 'CS_form_fields');


function admin_head_function_exec(){
	echo '<style>li#menu-posts-customform li:nth-child(6) {display: none;}</style>';
}
add_action( 'admin_head', 'admin_head_function_exec');

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function activation_form() {
	$labels = array(
		'name'               => __( 'Activation Form', 'text-domain' ),
		'singular_name'      => __( 'Activation Form', 'text-domain' ),
		'add_new'            => _x( 'Add New Activation Form', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Activation Form', 'text-domain' ),
		'edit_item'          => __( 'Edit Activation Form', 'text-domain' ),
		'new_item'           => __( 'New Activation Form', 'text-domain' ),
		'view_item'          => __( 'View Activation Form', 'text-domain' ),
		'search_items'       => __( 'Search Activation Form', 'text-domain' ),
		'not_found'          => __( 'No Activation Form found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Activation Form found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Activation Form:', 'text-domain' ),
		'menu_name'          => __( 'Activation Form', 'text-domain' ),
	);
	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => 'edit.php?post_type=customform',
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
			'thumbnail',
			'excerpt',
		),
	);

	register_post_type( 'activation_form', $args );
}
add_action( 'init', 'activation_form' );

add_submenu_page('edit.php?post_type=customform', __('Test Settings','menu-test'), __('Refil Inquiries','menu-test'), 'manage_options', 'listing_setting', 'mt_settings_page' );
add_submenu_page('edit.php?post_type=customform', __('Test Settings','menu-test'), __('Activation Inquiries','menu-test'), 'manage_options', 'activation_listing_setting', 'activation_inquiries_listing' );
// add_submenu_page('edit.php?post_type=customform', __('Activation Form','menu-test'), __('Activation Form','menu-test'), 'manage_options', null, null);
// Custom FIelds
function mt_settings_page(){require_once 'inquiries.php';}
function activation_inquiries_listing(){require_once 'inquiries_activation.php';}


function ul_pro_custom_fields_add_meta_box() {
	
	add_meta_box(
		'custom_fields-custom-fields_buttons',
		__( 'Add linked Buttons', 'custom_fields_buttons' ),
		'ul_pro_custom_buttons',
		'customform',
		'advanced',
		'high'
	);	
	add_meta_box(
		'custom_fields-custom-fields_buttons1',
		__( 'Add linked Buttons', 'custom_fields_buttons' ),
		'ul_pro_custom_buttons',
		'activation_form',
		'advanced',
		'high'
	);	

}
add_action( 'add_meta_boxes', 'ul_pro_custom_fields_add_meta_box' );
function ul_pro_custom_buttons( $post) {
	wp_nonce_field( '_custom_fields_nonce', 'custom_fields_nonce' ); ?>

	<div id="dynamic_form-btn">
		<div id="field_wrap-btn">







			<?php 
			$button_data = get_post_meta( $post->ID, 'PKG');
			if ($button_data):
				foreach ($button_data as $key22): ?>



				<div class="field_row full-width">
					<div class="field_left">
						<label>
							Price
							<input placeholder="Button Text" class="meta_image_url" value="<?php echo $key22[0]; ?>" type="text" name="PKG[price][]" />
						</label>
						<label>
							Discriptions
							<input placeholder="Button URL" class="meta_image_url" value="<?php echo $key22[1]; ?>" type="text" name="PKG[dsc][]" />
						</label>
					</div>
					<div class="field_right">
						<input class="button" type="button" value="Remove" onclick="remove_field(this)" />
					</div>
				</div>





			<?php endforeach;
			endif; ?>
			<div class="clear" /></div>
		</div>

		<div style="display:none" id="master-row-btn">
			<div class="field_row full-width">
				<div class="field_left">
					<label>
						Price
						<input placeholder="Button Text" class="meta_image_url" type="text" name="PKG[price][]" />
					</label>
					<label>
						Discriptions
						<input placeholder="Button URL" class="meta_image_url"  type="text" name="PKG[dsc][]" />
					</label>
				</div>
				<div class="field_right">
					<input class="button" type="button" value="Remove" onclick="remove_field(this)" />
				</div>
			</div>
		</div>

	</div>
	<div id="add_field_row">
		<input class="button" type="button" value="Add Button" onclick="add_field_row_btn();" />
	</div>
	<div class="clear" /></div>
	

	<?php
}

//***************************************************//
//*****GALLERY META BOX FOR obituary POST TYPE*******//
//***************************************************//



add_action( 'admin_head-post.php', 'OBL_print_view' );
add_action( 'admin_head-post-new.php', 'OBL_print_view' );
add_action( 'save_post', 'OBL_gallery_update', 10, 2 );

/**
 * Print styles and scripts
 */
function OBL_print_view()
{
    // Check for correct post_type
	global $post;
    // if( 'customform' != $post->post_type || 'activation_form' != $post->post_type)// here you can set post type name
    // return;
    ?>  
    <style type="text/css">
    #add_field_row, .full-width{width: 100%;float: left;}
    .field_left { float: left; }
    .field_right { float: left; margin-left: 10px; }
    .clear { clear: both; }
    #dynamic_form { width: 100%; }
    #dynamic_form input[type=text] { width: 300px; }
    #dynamic_form .field_row { border: 1px solid #999; margin-bottom: 10px; padding: 10px;float: left;width: 25%;margin-right: 2%; }
    #dynamic_form label { padding: 0 6px; }
</style>

<script type="text/javascript">
	function remove_field(obj) {
		var parent=jQuery(obj).parent().parent();
//console.log(parent)
parent.remove();
}
function add_field_row() {
	var row = jQuery('#master-row').html();
	jQuery(row).appendTo('#field_wrap');
}
function add_field_row_btn() {
	var row = jQuery('#master-row-btn').html();
	jQuery(row).appendTo('#field_wrap-btn');
}
</script>


<?php
}

/**
* Save post action, process fields
*/
function OBL_gallery_update( $post_id, $post_object ){
// Doing revision, exit earlier **can be removed**
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;
//````````````````````````` Buttons Fields
	if (@$_POST['PKG']){
		$button_data = array();
		$i = 0;
		foreach ($_POST['PKG']['price'] as $key => $value) {
			if ( '' != $_POST['PKG']['price'][$i] ) {
				$button_data[$i][0] = $_POST['PKG']['price'][$i];
				$button_data[$i][1] = $_POST['PKG']['dsc'][$i];
				$i++;



				

			}

		}



	



		if ( $button_data ){

			delete_post_meta($post_id, 'PKG');
			foreach ($button_data as $key11) {
				add_post_meta( $post_id, 'PKG', $key11);
			}
		}







	}else{
		delete_post_meta( $post_id, 'PKG' );
	}
	}//save post ends here



	function get_complete_meta( $post_id, $meta_key ) {
		global $wpdb;
		$mid = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $wpdb->postmeta WHERE post_id = %d AND meta_key = %s", $post_id, $meta_key) );
		if( $mid != '' )
			return $mid;

		return false;
	}


add_submenu_page('edit.php?post_type=customform', __('Coupons','menu-test'), __('Coupons','menu-test'), 'manage_options', 'cs_coupons_addding', 'cs_coupons_addding' );
function cs_coupons_addding(){
	require_once 'cs_couponss.php';
}