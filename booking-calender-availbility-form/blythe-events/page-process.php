<?php 

if (!empty($_GET['submit'])) {
$event  				= $_POST['event'];
$event_detail_optional  = $_POST['event_detail_optional'];
$date  					= $_POST['date'];
$_name  				= $_POST['_name'];
$phone_number  			= $_POST['phone_number'];
$email  				= $_POST['email'];
$your_message  			= $_POST['your_message'];

$message = '
User Event : '.$event.'
User event detail optional : '.$event_detail_optional.'
User date : '.$date.'
User name : '.$_name.'
User phone number : '.$phone_number.'
user email : '.$email.'
User message : '.$your_message.'
';

$post_data = array(
    'post_title'	 => 'Booked',
    'post_type'		 => 'tribe_events',
);
$post_id = wp_insert_post( $post_data );

$startDate = $date.' 00:00:00';

add_post_meta($post_id, '_EventStartDate', $startDate, false );
add_post_meta($post_id, '_EventEndDate', $startDate, false );
add_post_meta($post_id, '_EventStartDateUTC', $startDate, false );
add_post_meta($post_id, '_EventEndDateUTC', $startDate, false );

wp_mail( get_option('admin_email'), 'Booking Inquiry', $message);

wp_redirect('process');
}

 ?>