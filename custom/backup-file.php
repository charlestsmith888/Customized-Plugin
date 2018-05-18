
// Add Menu
function woo_add_menu_in_admin() {
	add_submenu_page(
		'edit.php?post_type=lms_students',
		'Notification For User', /*page title*/
		'Notification For User', /*menu title*/
		'manage_options', /*roles and capabiliyt needed*/
		'lms_notifications',
		'lms_notifications' /*replace with your own function*/
	);
}
add_action('admin_menu', 'woo_add_menu_in_admin');

function lms_notifications()
{
	require 'admin/notification.php';
}