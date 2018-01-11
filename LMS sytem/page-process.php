<?php
require 'custom/pay/includes/config.php';

get_header();
nectar_page_header($post->ID);
//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);
?>

<style>
.isa_error{
color: #D8000C;
background-color: #FFBABA;
}
.isa_error{
margin: 10px 0;
padding: 12px;
}
.isa_error:before{
font-family: isabelc;
font-style: normal;
font-weight: 400;
speak: none;
display: inline-block;
text-decoration: inherit;
width: 1em;
margin-right: .2em;
text-align: center;
font-variant: normal;
text-transform: none;
line-height: 1em;
margin-left: .2em;
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
}
.isa_error a {
float: right;
margin-right: 2%;
font-size: 20px;
text-transform: uppercase;
font-weight: 700;
color: #D8000C;
}
</style>

<div class="container-wrap">
	
	<div class="<?php if($page_full_screen_rows != 'on') echo 'container'; ?> main-content">
		
		<div class="row">
			
			<?php
			//breadcrumbs
			if ( function_exists( 'yoast_breadcrumb' ) && !is_home() && !is_front_page() ){ yoast_breadcrumb('<p id="breadcrumbs">','</p>'); }
			//buddypress
			global $bp;
			if($bp && !bp_is_blog_page()) echo '<h1>' . get_the_title() . '</h1>';
			
			//fullscreen rows
			if($page_full_screen_rows == 'on') echo '<div id="nectar_fullscreen_rows" data-animation="'.$page_full_screen_rows_animation.'" data-row-bg-animation="'.$page_full_screen_rows_bg_img_animation.'" data-animation-speed="'.$page_full_screen_rows_animation_speed.'" data-content-overflow="'.$page_full_screen_rows_content_overflow.'" data-mobile-disable="'.$page_full_screen_rows_mobile_disable.'" data-dot-navigation="'.$page_full_screen_rows_dot_navigation.'" data-footer="'.$page_full_screen_rows_footer.'" data-anchors="'.$page_full_screen_rows_anchors.'">'; ?>

<?php 
// Store request params in an array
if (!empty($_POST)) {

$courseId  = $_POST['course']['id'];
$request_params = array
(
	'METHOD' 		=> 'DoDirectPayment',
	'USER' 			=> $api_username,
	'PWD' 			=> $api_password,
	'SIGNATURE'		=> $api_signature,
	'VERSION' 		=> $api_version,
	'PAYMENTACTION' => 'Sale',
	'IPADDRESS' 	=> $_SERVER['REMOTE_ADDR'],
	'ACCT' 			=> $_POST['payment']['cc_number'],
	'EXPDATE' 		=> $_POST['payment']['cc_exp_month'].$_POST['payment']['cc_exp_year'],
	'CVV2' 			=> $_POST['payment']['cc_cvv'],
	'FIRSTNAME' 	=> $_POST['payment']['firstname'],
	'LASTNAME' 		=> $_POST['payment']['lastname'],
	'STREET' 		=> $_POST['admission']['address'],
	'CITY' 			=> $_POST['admission']['city'],
	'STATE' 		=> $_POST['admission']['state'],
	'COUNTRYCODE' 	=> $_POST['admission']['country'],
	'ZIP' 			=> $_POST['admission']['postal_code'],
	'AMT' 			=> get_post_field('post_content', $courseId),
	'CURRENCYCODE' 	=> 'USD',
	'DESC' 			=> get_the_title($courseId),
);
// Loop through $request_params array to generate the NVP string.
$nvp_string = '';
foreach($request_params as $var=>$val)
{
	$nvp_string .= '&'.$var.'='.urlencode($val);
}
// Send NVP string to PayPal and store response
$curl = curl_init();
curl_setopt($curl, CURLOPT_VERBOSE, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);
curl_setopt($curl, CURLOPT_URL, $api_endpoint);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);
$result = curl_exec($curl);
// echo $result.'<br /><br />';
curl_close($curl);
// Parse the API response
$result_array = NVPToArray($result);


$name = explode(' ', $_POST['admission']['fullname']);
$pass = wp_generate_password( 8, false );
$admission 	=  json_encode($_POST['admission']);
$enrollment =  json_encode($_POST['enrollment']);
$userdata = array(
    'user_login'  =>  $_POST['admission']['email'],
    'user_email' => $_POST['admission']['email'],
    'user_pass'   =>  $pass, //need to be changed later
    'first_name' => @$name[0],
    'last_name' => @$name[1],
    'role' => 'student',
);


$user_id = username_exists( $userdata['user_login'] );
if ( !$user_id and email_exists($userdata['user_email']) == false and $result_array['ACK'] == 'Success') {
	$user_id = wp_insert_user( $userdata );
	echo $user_id;
	$courseId  = $_POST['course']['id'];
	$courseData = array(
		'courseID' => $courseId,
		'course' => get_the_title($courseId),
		'amount' => get_post_field('post_content', $courseId),
		'paymentstatus' => $result_array['ACK'],
	);
	$paymentJson = json_encode($courseData);
	$postarry = array(
		'post_author' 	=> $user_id,
		'post_title' 	=> $userdata['first_name'].' '.$userdata['last_name'],
		'post_type' 	=> 'lms_students',
		'post_status' 	=> 'pending',
	);
	wp_insert_post( $postarry, $wp_error = false );
	add_user_meta( $user_id, 'user_admission', $admission, false);
	add_user_meta( $user_id, 'user_enrollment', $enrollment, false );
	add_user_meta( $user_id, 'user_corses', $paymentJson, false );


$message = '
Dear '.$_POST['admission']['fullname'].',
Your account has been created succesfully. Here are the account login credentials
loign :  '.$_POST['admission']['email'].'
Password :  '.$pass.'
';
wp_mail( $_POST['admission']['email'], 'Registration Completed - Account Credentials', $message);
	echo "Sign Up Completed";
	echo "<script>window.location = '".site_url('/success/')."'</script>";
}else{

	if ($result_array['ACK'] != 'Success') {
		echo '<div class="isa_error">'.$result_array['L_LONGMESSAGE0'].' <a href="javascript:;" onclick="window.history.back();">BACK</a></div>';
	}
	if (email_exists($userdata['user_email'])) {
		echo '<div class="isa_error">User Already exist! <a href="javascript:;" onclick="window.history.back();">BACK</a></div>';
	}


} 

//if form not empty closing baces
}else{
	echo "<script>window.location = '".site_url('/register/')."'</script>";
}

?>
















			<?php if($page_full_screen_rows == 'on') echo '</div>'; ?>
			</div><!--/row-->
			
			</div><!--/container-->
			
			</div><!--/container-wrap-->
			<?php get_footer(); ?>