<?php 
require 'csfunctions.php';
/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function lms_students() {

	$labels = array(
		'name'               => __( 'LMS System', 'text-domain' ),
		'singular_name'      => __( 'Students', 'text-domain' ),
		'add_new'            => _x( 'Add New Students', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Students', 'text-domain' ),
		'edit_item'          => __( 'Edit Students', 'text-domain' ),
		'new_item'           => __( 'New Students', 'text-domain' ),
		'view_item'          => __( 'View Students', 'text-domain' ),
		'search_items'       => __( 'Search LMS System', 'text-domain' ),
		'not_found'          => __( 'No LMS System found', 'text-domain' ),
		'not_found_in_trash' => __( 'No LMS System found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Students:', 'text-domain' ),
		'menu_name'          => __( 'LMS System', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 80,
		'menu_icon'           => 'dashicons-screenoptions',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'capabilities' => array(
					'create_posts' => 'do_not_allow', // false < WP 4.5, credit @Ewout
		),
		'map_meta_cap'        => true,
		'supports'           => array(
			'title'
		),
	);
	register_post_type( 'lms_students', $args );
}
add_action( 'init', 'lms_students' );



/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function lmg_notifications() {

	$labels = array(
		'name'               => __( 'Notifications', 'text-domain' ),
		'singular_name'      => __( 'Notification', 'text-domain' ),
		'add_new'            => _x( 'Add New Notification', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Notification', 'text-domain' ),
		'edit_item'          => __( 'Edit Notification', 'text-domain' ),
		'new_item'           => __( 'New Notification', 'text-domain' ),
		'view_item'          => __( 'View Notification', 'text-domain' ),
		'search_items'       => __( 'Search Notifications', 'text-domain' ),
		'not_found'          => __( 'No Notifications found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Notifications found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Notification:', 'text-domain' ),
		'menu_name'          => __( 'Notify Users', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => 'edit.php?post_type=lms_students',
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

	register_post_type( 'lms_notify', $args );
}

add_action( 'init', 'lmg_notifications' );

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function lms_courses() {
	$labels = array(
		'name'               => __( 'Courses', 'text-domain' ),
		'singular_name'      => __( 'Course', 'text-domain' ),
		'add_new'            => _x( 'Add New Course', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Course', 'text-domain' ),
		'edit_item'          => __( 'Edit Course', 'text-domain' ),
		'new_item'           => __( 'New Course', 'text-domain' ),
		'view_item'          => __( 'View Course', 'text-domain' ),
		'search_items'       => __( 'Search Courses', 'text-domain' ),
		'not_found'          => __( 'No Courses found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Courses found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Course:', 'text-domain' ),
		'menu_name'          => __( 'Courses', 'text-domain' ),
	);
	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => 'edit.php?post_type=lms_students',
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
		),
	);
	register_post_type( 'lms_courses', $args );
}
add_action( 'init', 'lms_courses' );


// this on activation
add_role('student', 'Student', array('read'=> true, 'upload_files' => true));
add_role('coach', 'Coach', array('read'=> true));




// Custom Field in Notify users
function get_field_data( $value ) {
	global $post;
	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}
function lms_custom_field_notify_users() {
	add_meta_box(
		'style_vimeo_video-style',
		__( 'Send Notification', 'disable_specific_date' ),
		'birch_stylefieldhtml',
		'lms_notify', //your post type
		'advanced',
		'default'
		);
}
add_action( 'add_meta_boxes', 'lms_custom_field_notify_users' );
function birch_stylefieldhtml( $post) {
	global $post; 
	do_action('lms_scripts');
	$args = array('role' => 'student',); 
	$users = get_users( $args ); 

?>


<table class="table table-striped table-hover table-bordered">
	<thead class="thead-dark">
		<tr>
			<th><input type="checkbox"></th>
			<th>User</th>
			<th>Role</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		global $wpdb;
		global $obj;
		foreach ($users as $key): ?>
		<tr>
			<td>
				<?php if (isset($_GET['post'])): 

					$check = $obj->getRows($wpdb->prefix.'usermeta' , [
						'where' =>[
							'user_id' => $key->data->ID,
							'meta_key' => 'user_notificaitons',
							'meta_value' => $_GET['post'],
						],
						'return_type' => 'single',
					]);
					$ch = '';
					if (!empty($check)) {
						$ch = 'checked';
					}else{
						$ch = '';
					}
					?>
					<input type="checkbox" name="users[]" value="<?php echo $key->data->ID; ?>" <?php echo $ch; ?>>
				<?php else: ?>
					<input type="checkbox" name="users[]" value="<?php echo $key->data->ID; ?>">
				<?php endif ?>
			</td>
			<td><?php echo $key->data->display_name; ?></td>
			<td><?php echo $key->roles[0]; ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>



<?php }

function stylesave( $post_id ) {
	global $wpdb;
	if ($parent_id = wp_is_post_revision($post_id)) $post_id = $parent_id;
	if (!empty($_POST['users']) && is_array($_POST['users'])) {

		$wpdb->delete( $wpdb->prefix.'usermeta', array('meta_key'=> 'user_notificaitons',  'meta_value' => $post_id ) );
		foreach ($_POST['users'] as $startdate => $value) {
			add_user_meta( $_POST['users'][$startdate], 'user_notificaitons', $post_id, false);
		}
	}
}
add_action( 'save_post', 'stylesave' );



// Show Menus
$current_user = wp_get_current_user();

if (in_array('coach', $current_user->roles)) {

	function lms_coach_page() {
		add_menu_page( 'Students Registration', 'Registrations', 'read', 'lms_registrations', 'lms_registrations');
	}
	add_action('admin_menu', 'lms_coach_page');
	function lms_registrations(){require 'coach/registration.php';}

}

if (in_array('student', $current_user->roles)) {
	function lms_studentspages() {
		add_menu_page( 'Enrollment', 'Enrollment', 'read', 'lms_enrollment', 'lms_enrollment');
		add_menu_page( 'Admission', 'Admission', 'read', 'lms_admission', 'lms_admission');
		add_menu_page( 'Courses', 'Courses', 'read', 'lms_courses', 'lms_coursess');
		add_menu_page( 'Videos', 'Videos', 'read', 'lms_videos', 'lms_videos');
		add_menu_page( 'Notifications', 'Notifications', 'read', 'lms_notifications', 'lms_notifications');
		 remove_menu_page('upload.php');
	}
	add_action('admin_menu', 'lms_studentspages');
	function lms_enrollment(){require 'student/lms_enrollment.php';}
	function lms_admission(){require 'student/lms_admission.php';}
	function lms_videos(){require 'student/lms_videos.php';}
	function lms_coursess(){require 'student/lms_coursess.php';}
	function lms_notifications(){require 'student/lms_notifications.php';}
	
	// Load WordPress Uploader Script
	function omnizz_options_enqueue_scripts() {
		wp_enqueue_script('jquery');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		wp_enqueue_script('media-upload');
	}
	add_action('admin_enqueue_scripts', 'omnizz_options_enqueue_scripts');
}


// Styling and scripts
add_action('lms_scripts', 'lms_scripts_styles');
function lms_scripts_styles(){
	echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/custom/css/bootstrap.css">';
}


