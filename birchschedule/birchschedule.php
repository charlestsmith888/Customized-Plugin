<?php

/*
  Plugin Name: BirchPress Scheduler
  Plugin URI: http://www.birchpress.com
  Description: An appointment booking and online scheduling plugin that allows service businesses to take online bookings.
  Version: 1.11.1
  Author: BirchPress
  Author URI: http://www.birchpress.com
  License: GPLv2
 */

if ( defined( 'ABSPATH' ) && ! function_exists( 'birchschedule_main' ) ) {

	function birchschedule_main() {

		require_once 'loader.php';

		birchschedule_load( array(
				'plugin_file_path' => __FILE__,
				'product_version' => '1.11.1',
				'product_name' => 'BirchPress Scheduler',
				'product_code' => 'birchschedule',
				'global_name' => 'birchschedule'
			) );
	}

	birchschedule_main();
}




// Ajax Action start from here
add_action( 'wp_ajax_birchschedule_email_notificatoin', 'plugin_deve_email_notification' );
add_action( 'wp_ajax_nopriv_birchschedule_email_notificatoin', 'plugin_deve_email_notification' );

function plugin_deve_email_notification()
{
	$services = '';
	foreach ($_POST['birs_client_services'] as $key => $value) {
		$services .= $value.',   ';
	}
	//birs_client_services birs_client_phone  birs_client_property_street
	$message = '
	First Name 		: '.$_POST['birs_client_name_first'].'
	Last Name 		: '.$_POST['birs_client_name_last'].'
	Email 			: '.$_POST['birs_client_email'].'
	Phone 			: '.$_POST['birs_client_phone'].'
	Street 			: '.$_POST['birs_client_property_street'].'
	City 			: '.$_POST['birs_client_property_city'].'
	Zip code 		: '.$_POST['birs_client_zip_code'].'
	Size SF 		: '.$_POST['birs_client_size_sf'].'
	Year Built 		: '.$_POST['birs_client_year_built'].'
	Services 		: '.$services.'
	Appointment Date 	: '.$_POST['birs_appointment_date'].'
	Appointment Time 	: '.$_POST['birs_appointment_apt_time'].'
	Appointment Noted 	: '.$_POST['birs_appointment_notes'].'
	';
	wp_mail('dwalls@superior-inspections.biz', 'Appointment Schedule', $message);
	echo "done";
	exit;
}

// Fields for date disable in provider....

function get_field_data( $value ) {
	global $post;
	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function birch_sub_heading_add_meta_box() {
	add_meta_box(
		'style_vimeo_video-style',
		__( 'Disable Specific Date', 'disable_specific_date' ),
		'birch_stylefieldhtml',
		'birs_staff',
		'advanced',
		'default'
		);
}
add_action( 'add_meta_boxes', 'birch_sub_heading_add_meta_box' );




function birch_stylefieldhtml( $post) {
	global $post; ?>
	<label for="disabledate"><?php _e( 'Disable Dates', 'stylevideos' ); ?></label><br>
		<div class="stylefiels">
			
	
			<?php foreach (get_post_meta($post->ID , 'disabledate' ) as $key): ?>
					<div class="cont">
						<input type="date" name="disabledate[]" id="disabledate" value="<?php echo $key; ?>">
						<a class="button button-small styleremoved" href="javascript:;">-</a>
					</div>
			<?php endforeach ?>


		</div>
	<a class="button button-primary" href="javascript:;" id="disabledateadd">Add Dates</a>

	<script>
		jQuery(document).ready(function() {
			jQuery('#disabledateadd').click(function(event) {
				jQuery('.stylefiels').append('<div class="cont"><input type="date" name="disabledate[]" id="disabledate"> <a class="button button-small styleremoved" href="javascript:;">-</a></div>');
			});

			jQuery(document).on('click', '.styleremoved', function(event) {
				event.preventDefault();
				if (jQuery('.stylefiels .cont').length != 1) {
					var v = jQuery(this).parent('.cont').remove();
				}
			});			
		});
	</script>
	<?php
}





function birch_sub_heading_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['sub_heading_nonce'] ) || ! wp_verify_nonce( $_POST['sub_heading_nonce'], '_sub_heading_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	if ( isset( $_POST['disable_dates'] ) )
		update_post_meta( $post_id, 'disable_dates', esc_attr( $_POST['disable_dates'] ) );
}
add_action( 'save_post', 'birch_sub_heading_save' );

function stylesave( $post_id ) {
	if ($parent_id = wp_is_post_revision($post_id)) $post_id = $parent_id;
	if (!empty($_POST['disabledate']) && is_array($_POST['disabledate'])) {
		delete_post_meta($post_id, 'disabledate');
		foreach ($_POST['disabledate'] as $startdate) {
			add_post_meta($post_id, 'disabledate', $startdate);
		}
	}
}
add_action( 'save_post', 'stylesave' );
