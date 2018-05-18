<?php

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function ev_sell_your_car() {

	$labels = array(
		'name'               => __( 'Sell your cars', 'text-domain' ),
		'singular_name'      => __( 'Sell your car', 'text-domain' ),
		'add_new'            => _x( 'Add New Sell your car', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Sell your car', 'text-domain' ),
		'edit_item'          => __( 'Edit Sell your car', 'text-domain' ),
		'new_item'           => __( 'New Sell your car', 'text-domain' ),
		'view_item'          => __( 'View Sell your car', 'text-domain' ),
		'search_items'       => __( 'Search Sell your cars', 'text-domain' ),
		'not_found'          => __( 'No Sell your cars found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Sell your cars found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Sell your car:', 'text-domain' ),
		'menu_name'          => __( 'Sell your cars', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => false,
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

	register_post_type( 'sell_ur_car', $args );
}

add_action( 'init', 'ev_sell_your_car' );
