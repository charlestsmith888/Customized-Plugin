<?php 

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function cs_selling_product() {

	$labels = array(
		'name'               => __( 'Seller Listings', 'text-domain' ),
		'singular_name'      => __( 'Listing', 'text-domain' ),
		'add_new'            => _x( 'Add New Listing', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Listing', 'text-domain' ),
		'edit_item'          => __( 'Edit Listing', 'text-domain' ),
		'new_item'           => __( 'New Listing', 'text-domain' ),
		'view_item'          => __( 'View Listing', 'text-domain' ),
		'search_items'       => __( 'Search Seller Listings', 'text-domain' ),
		'not_found'          => __( 'No Seller Listings found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Seller Listings found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Listing:', 'text-domain' ),
		'menu_name'          => __( 'Seller Listings', 'text-domain' ),
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

	register_post_type( 'seller-listing', $args );
}

add_action( 'init', 'cs_selling_product' ); 

function getRows($table,$conditions = array()){
	global $wpdb;
	$sql = 'SELECT ';
	$sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
	$sql .= ' FROM '.$table;
	if(array_key_exists("where",$conditions)){
		$sql .= ' WHERE ';
		$i = 0;
		foreach($conditions['where'] as $key => $value){
			$pre = ($i > 0)?' AND ':'';
			$sql .= $pre.'`'.$key.'`'." = '".$value."'";
			$i++;
		}
	}
	if(array_key_exists("condition",$conditions)){
		$sql .= ' '.$conditions['condition'];
	}
	if(array_key_exists("order_by",$conditions)){
		$sql .= ' ORDER BY '.$conditions['order_by'];
	}
	if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
		$sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];
	}elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
		$sql .= ' LIMIT '.$conditions['limit'];
	}
	if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
		switch($conditions['return_type']){
			case 'count':
			return 'change your code';
			break;
			case 'single':
			return	$wpdb->get_row($sql);
			break;
			default:
			$data = '';
		}
	}else{
		return $wpdb->get_results($sql);
	}
}

// seller-listing
function pro_seller_fields_add_meta_box() {
	add_meta_box(
		'pro_seller_fields_add_meta_box',
		__( 'Custom Fields', 'custom_fields' ),
		'ul_pro_selling_custom_fields_html',
		'seller-listing',
		'advanced',
		'high'
	);
}
add_action( 'add_meta_boxes', 'pro_seller_fields_add_meta_box' );
function ul_pro_selling_custom_fields_html(){
	if (!empty($_GET['post'])) {
		$swrp = get_post_meta( $_GET['post'], 'swrpnumber', true );
		$emailsq = get_post_meta( $_GET['post'], 'cs_email', true );
		$data = get_post_meta( $_GET['post'], 'swr_user_data', true );
		echo '
		<label for="">
		SWRP NUMBER
		<input type="email" name="" id="input" class="form-control" value="'.$swrp.'" required="required" title="" readonly>
		</label>
		<label for="">
		SWRP NUMBER
		<input type="email" name="" id="input" class="form-control" value="'.$emailsq.'" required="required" title="" readonly>
		</label>
		<label for="">
		Type of SWRP
		<input type="email" name="" id="input" class="form-control" value="'.$data['Type_of_SWRP'].'" required="required" title="" readonly>
		</label>
		<label for="">
		choose the color
		<input type="email" name="" id="input" class="form-control" value="'.$data['choose_the_color'].'" required="required" title="" readonly>
		</label>
		';
	}
}
?>