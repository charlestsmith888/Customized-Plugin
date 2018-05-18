<?php 
// Show Menus
$current_user = wp_get_current_user();

// main class
require 'admin/ajaxfunctinos.php';  
// main class
require 'class/main_class.php';
// main class
require 'class/seller_class.php';
// payment gateway
require 'pay/includes/config.php';

// this on activation (pending)
add_role('seller', 'Seller', 	array('read'=> true, 'upload_files' => true));
add_role('buyer', 'Buyer', 		array('read'=> true, 'upload_files' => true));
add_role('buyer_and_seller', 'Buyer and Seller', 	array('read'=> true, 'upload_files' => true));


// Student
if (in_array('student', $current_user->roles)) {
	function custom_coach_css() {
		echo '<style>tr.user-admin-color-wrap, .show-admin-bar,.user-url-wrap, .update-nag {display: none !important;}div#wpfooter, #wp-admin-bar-new-content {display: none !important;}</style>';
	}
	add_action( 'admin_head', 'custom_coach_css' );
	function cms_studentspages() {
		add_menu_page( 'Reg. New Course', 'Reg. New Course', 'read', 'cms_reg_new_course', 'cms_reg_new_course');
		function cms_reg_new_course(){require 'student/cms_reg_new_course.php';}
		add_menu_page( 'Reg. Courses', 'Reg. Courses', 'read', 'Courses_list', 'Courses_list');
		function Courses_list(){require 'student/css_courses_cms_courses_list.php';}
		add_menu_page( 'Notes By Teacher', 'Notes By Teacher', 'read', 'Notes', 'cms_notes_');
		add_menu_page( 'Notes By Student', 'Notes By Student', 'read', 'Notesby_student', 'cms_notes_by_student');
		add_submenu_page( 'Notesby_student', 'Add New', 'Add New', 'read', 'admin.php?page=Notesby_student&view=6235', NULL);
		function cms_notes_(){require 'student/css_notes_.php';}
		function cms_notes_by_student(){require 'student/cms_notes_by_student.php';}
		add_menu_page( 'Payment History', 'Payment History', 'read', 'Payment_History', 'cms_paymenthistory');
		function cms_paymenthistory(){require 'student/cms_paymenthistory.php';}
		remove_menu_page('upload.php');
		remove_menu_page('index.php');
	}
	add_action('admin_menu', 'cms_studentspages');

	function remove_admin_bar_links() {
		global $wp_admin_bar, $current_user;
		if ($current_user->ID != 1) {
		$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
		$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
		$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
		$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
		$wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
		$wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
		// $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
		// $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
		$wp_admin_bar->remove_menu('updates');          // Remove the updates link
		$wp_admin_bar->remove_menu('comments');         // Remove the comments link
		$wp_admin_bar->remove_menu('new-content');      // Remove the content link
		$wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
		}
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
}

// Teacher
if (in_array('teacher', $current_user->roles)) {
	function lms_studentspages() {
		
		add_menu_page( 'Create Notes', 'Create Notes', 'read', 'Create_Notes', 'cms_Create_Notes');
		function cms_Create_Notes($value=''){require 'teacher/cms_Create_Notes.php';}
				
		add_submenu_page( 'Create_Notes', 'Add New', 'Add New', 'read', 'admin.php?page=Create_Notes&view=6235', NULL);

		add_menu_page( 'Notes By Students', 'Notes By Students', 'read', 'Notes_by_students', 'cms_notes_by__student');
		function cms_notes_by__student(){require 'teacher/cms_notes_by__student.php';}

		add_menu_page( 'Courses', 'Courses', 'read', 'Courses', 'cms_courses');
		function cms_courses(){require 'teacher/css_courses.php';}
		

		remove_menu_page('upload.php');
		remove_menu_page('index.php');
	}
	add_action('admin_menu', 'lms_studentspages');
	function custom_coach_css() {
		echo '<style>tr.user-admin-color-wrap, .show-admin-bar,.user-url-wrap, .update-nag {display: none !important;}div#wpfooter,#wp-admin-bar-new-content{display: none !important;}</style>';
	}
	add_action( 'admin_head', 'custom_coach_css' );
	function remove_admin_bar_links() {
		global $wp_admin_bar, $current_user;
		if ($current_user->ID != 1) {
		$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
		$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
		$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
		$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
		$wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
		$wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
		// $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
		// $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
		$wp_admin_bar->remove_menu('updates');          // Remove the updates link
		$wp_admin_bar->remove_menu('comments');         // Remove the comments link
		$wp_admin_bar->remove_menu('new-content');      // Remove the content link
		$wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
		}
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );	
}

// Styling and scripts
add_action('cms_scripts', 'cms_scripts_styles');
function cms_scripts_styles(){
	echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/CollegeManagementSystem/css/bootstrap.css">';
}
//ALTER TABLE `wp_usermeta` ADD `ex_id` INT(11) NOT NULL AFTER `meta_value`;
?>