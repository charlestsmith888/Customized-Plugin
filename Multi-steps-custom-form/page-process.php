<?php
require_once('pay/includes/config.php');
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

if (!empty($_POST)) {

global $wpdb;
$data = array(
	'carrier' => $_POST['item']['carrier'], 
	'dsc' => $_POST['item']['dsc'], 
	'amount' => $_POST['item']['amount'], 
	'billing_phone' => $_POST['billing']['billing_phone'], 
	'primary_email' => $_POST['billing']['primary_email'], 
	'billing_street' => $_POST['billing']['billing_street1'], 
	'billing_city' => $_POST['billing']['billing_city'], 
	'billing_zone' => $_POST['billing']['billing_zone'], 
	'billing_country' => $_POST['billing']['billing_country'], 
	'billing_postal_code' => $_POST['billing']['billing_postal_code'], 
	'firstname' => $_POST['payment']['firstname'], 
	'lastname' => $_POST['payment']['lastname'], 
	'status' => 'PENDING', 
);



// Store request params in an array
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
	'FIRSTNAME' 	=> $data['firstname'],
	'LASTNAME' 		=> $data['lastname'], 
	'STREET' 		=> $data['billing_street'],  
	'CITY' 			=> $data['billing_city'],
	'STATE' 		=> $data['billing_zone'], 				
	'COUNTRYCODE' 	=> $data['billing_country'], 
	'ZIP' 			=> $data['billing_postal_code'], 
	'AMT' 			=> $data['amount'], 
	'CURRENCYCODE' 	=> 'USD',
	'DESC' 			=> $data['dsc'] 
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

// echo "<pre>";
// print_r($result_array);




if ($result_array['ACK'] == 'Success') {

	$data['status'] = $result_array['ACK'];
	$data['TRANSACTIONID'] = $result_array['TRANSACTIONID'];
	$wpdb->insert('wp_payments' , $data);
	echo "<script>window.location = '".site_url('/success/')."'</script>";

}
echo '<div class="isa_error">'.$result_array['L_LONGMESSAGE0'].' <a href="javascript:;" onclick="window.history.back();">BACK</a></div>';



} ?>








			<?php
			if($page_full_screen_rows == 'on') echo '</div>'; ?>
			</div><!--/row-->
			
			</div><!--/container-->
			
			</div><!--/container-wrap-->
			<?php get_footer(); ?>