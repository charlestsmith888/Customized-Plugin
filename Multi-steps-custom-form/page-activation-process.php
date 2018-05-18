<?php
// require_once('pay/includes/config.php');
require_once('pay/authorize/authorize.class.php');
get_header();
nectar_page_header($post->ID);
//full page
$fp_options = nectar_get_full_page_options();
extract($fp_options);?>
<style>
.isa_error{color: #D8000C;background-color: #FFBABA;}.isa_error{margin: 10px 0;padding: 12px;}.isa_error:before{font-family: isabelc;font-style: normal;font-weight: 400;speak: none;display: inline-block;text-decoration: inherit;width: 1em;margin-right: .2em;text-align: center;font-variant: normal;text-transform: none;line-height: 1em;margin-left: .2em;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;}.isa_error a {float: right;margin-right: 2%;font-size: 20px;text-transform: uppercase;font-weight: 700;color: #D8000C;}
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





//mian array
$data = array(
	'carrier' => $_POST['item']['carrier'],
	'dsc' => $_POST['item']['dsc'],
	'amount' => $_POST['item']['amount'],
	'billing_phone' => 'testingdata',
	'primary_email' => $_POST['billing']['primary_email'],
	'billing_street' => $_POST['billing']['billing_street1'],
	'billing_city' => $_POST['billing']['billing_city'],
	'billing_zone' => $_POST['billing']['billing_zone'],
	'billing_country' => $_POST['billing']['billing_country'],
	'billing_postal_code' => $_POST['billing']['billing_postal_code'],
	'firstname' => $_POST['payment']['firstname'],
	'lastname' => $_POST['payment']['lastname'],
	'status' => 'PENDING',
	'source' => $_POST['paymentmethod'],
);

if (isset($_POST['option1'])) {
	$option = $_POST['option1'];
}elseif (isset($_POST['option2'])) {
	$option = $_POST['option2'];
}else{
	$option = '';
}


$basic1 = array(
	'billing' => $_POST['billing'], 
	'shipping' => $_POST['shipping'], 
);
$basic1 = json_encode($basic1);

$basic2 = array(
	'option' => $option, 
	'iteminfo' => $_POST['item'], 
);
$basic2 = json_encode($basic2);

$dataaaa = array(
	'content' 	=> 	$basic1,
	'content2' 	=> 	$basic2,
	'status' => 'PENDING',
	'TRANSACTIONID' => 'NULL',
	'source' => $_POST['paymentmethod'],
);



if (!empty($_POST) and $_POST['paymentmethod'] == 'paypal') {
	$wpdb->insert('wp_payments_2' , $dataaaa);
	$lastid = $wpdb->insert_id;
	$sandbox = false;
	$url = $sandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
	$email = $sandbox ? 'test@test.com' : 'simonchen@silkroadtradinginc.com';
	echo '
	<form name="_xclick" action="'.$url.'" method="post" style="margin: 20px 0px 20px 0px;" id="my-form-paypalll">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="'.$email.'">
	<input type="hidden" name="item_name" value="'.$data['dsc'].'">
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden"  name="amount" value="'.$data['amount'].'"> 
	
	<input type="hidden" name="first_name" value="'.$data['firstname'].'">
	<input type="hidden" name="last_name" value="'.$data['lastname'].'">
	<input type="hidden" name="address1" value="'.$data['billing_street'].'">
	<input type="hidden" name="city" value="'.$data['billing_city'].'">
	<input type="hidden" name="state" value="'.$data['billing_zone'].'">
	<input type="hidden" name="zip" value="'.$data['billing_postal_code'].'">
	<input type="hidden" name="night_phone_a" value="'.$data['billing_phone'].'">
	<input type="hidden" name="email" value="'.$data['primary_email'].'">


	<input type="hidden" name="return" value="'.site_url('/success/?activation=true&paypal='.$lastid).'">
	<p>Redirecting to Paypal....</p>
	<input type="image" src="'.site_url().'/wp-content/uploads/2018/04/loading.gif" name="PP-submit" alt="Make a donation with PayPal"><br>
	</form>
	';


	// Store request params in an array
	// $request_params = array
	// (
	// 	'METHOD' 		=> 'DoDirectPayment',
	// 	'USER' 			=> $api_username,
	// 	'PWD' 			=> $api_password,
	// 	'SIGNATURE'		=> $api_signature,
	// 	'VERSION' 		=> $api_version,
	// 	'PAYMENTACTION' => 'Sale',
	// 	'IPADDRESS' 	=> $_SERVER['REMOTE_ADDR'],
	// 	'ACCT' 			=> $_POST['payment']['cc_number'],
	// 	'EXPDATE' 		=> $_POST['payment']['cc_exp_month'].$_POST['payment']['cc_exp_year'],
	// 	'CVV2' 			=> $_POST['payment']['cc_cvv'],
	// 	'FIRSTNAME' 	=> $data['firstname'],
	// 	'LASTNAME' 		=> $data['lastname'],
	// 	'STREET' 		=> $data['billing_street'],
	// 	'CITY' 			=> $data['billing_city'],
	// 	'STATE' 		=> $data['billing_zone'],
	// 	'COUNTRYCODE' 	=> $data['billing_country'],
	// 	'ZIP' 			=> $data['billing_postal_code'],
	// 	'AMT' 			=> $data['amount'],
	// 	'CURRENCYCODE' 	=> 'USD',
	// 	'DESC' 			=> $data['dsc']
	// );
// Loop through $request_params array to generate the NVP string.
	// $nvp_string = '';
	// foreach($request_params as $var=>$val)
	// {
	// 	$nvp_string .= '&'.$var.'='.urlencode($val);
	// }
// Send NVP string to PayPal and store response
	// $curl = curl_init();
	// curl_setopt($curl, CURLOPT_VERBOSE, 1);
	// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	// curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	// curl_setopt($curl, CURLOPT_URL, $api_endpoint);
	// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	// curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);
	// $result = curl_exec($curl);
// echo $result.'<br /><br />';
	// curl_close($curl);
// Parse the API response
	// $result_array = NVPToArray($result);
// echo "<pre>";
	// print_r($result_array);
	// if ($result_array['ACK'] == 'Success') {
	// 	$data['status'] = $result_array['ACK'];
	// 	$data['TRANSACTIONID'] = $result_array['TRANSACTIONID'];
	// 	$wpdb->insert('wp_payments' , $data);
	// 	echo "<script>window.location = '".site_url('/success/')."'</script>";
	// }
	// echo '<div class="isa_error">'.$result_array['L_LONGMESSAGE0'].' <a href="javascript:;" onclick="window.history.back();">BACK</a></div>';
	// $wpdb->insert('wp_payments' , $data);


}elseif(!empty($_POST) and $_POST['paymentmethod'] == 'authorize'){




	// authorize.net integration

	$objAuthorizeAPI = new AuthorizeAPI('8vRh48C9', '4NS6Ha6228rj8Hwg' , 'liveMode');
	// Set customer's information
	$arrCustomerInfo = array();
	$arrCustomerInfo['firstname'] = $data['firstname'];
	$arrCustomerInfo['lastname'] = $data['lastname'];
	$arrCustomerInfo['company_name'] = 'Code Bucket';
	$arrCustomerInfo['ad_street'] = $data['billing_street'];
	$arrCustomerInfo['ad_city'] = $data['billing_city'];
	$arrCustomerInfo['ad_state'] = $data['billing_zone'];
	$arrCustomerInfo['ad_zip'] = $data['billing_postal_code'];
	$arrCustomerInfo['ad_country'] = $data['billing_country'];
	$arrCustomerInfo['ph_number'] = $data['billing_phone'];
	$arrCustomerInfo['em_email'] = $data['primary_email'];

	$objAuthorizeAPI->setCustomerAddress($arrCustomerInfo);

	// ~~~~~~~~~~~~ ADD CREDIT CARD ~~~~~~~~~~~~~~~~~~~~~~ //
	$objAuthorizeAPI->setCreditCardParameters($_POST['payment']['cc_number'], $_POST['payment']['cc_exp_year'].'-'.$_POST['payment']['cc_exp_month'], $_POST['payment']['cc_cvv']);
	// $data['status'] = 'pending';
	$data['TRANSACTIONID'] = 'null';
	$wpdb->insert('wp_payments_2' , $dataaaa);
	$lastid = $wpdb->insert_id;

	$arrCustomerAddCCResponse = $objAuthorizeAPI->addCustomerPaymentProfile($lastid,'cc');






	$checkcs = json_decode($arrCustomerAddCCResponse);


	



	if (!empty($checkcs) and !empty($checkcs->customerProfileId) and !empty($checkcs->customerPaymentProfileId)) {

		$arrChargeResponse = $objAuthorizeAPI->chargeCCeCheck($checkcs->customerProfileId,$checkcs->customerPaymentProfileId, $data['amount']);
		$arrChargeResponsecheck  = json_decode($arrChargeResponse);

		$dataaa = array(
			'TRANSACTIONID' => $arrChargeResponsecheck->transId, 
			'status' => 'Completed', 
		);
		$wpdb->update('wp_payments_2', $dataaa, ['id' => $lastid ]);


		
		$headers = array('Content-Type: text/html; charset=UTF-8');
$message = '
<div style="display: inline-block; padding: 16px 32px 13px 37px !important; color: #fff !important; font-size: 18px !important;  width: 55%; display: table; text-align: center; margin:0px auto;">
	<h3 style="background-color: #eeeeefad; padding: 16px; text-transform: uppercase; color: #4CCCDB;">Dear Admin,</h3>
	<span style="text-transform: uppercase; font-weight: bold !important; color: #000;">Billing Information are as follows: </span>

	<table style="font-size: 12px;line-height: 20px;">
		<thead>
			<tr>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Order Id</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Carrier</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Description</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Amount</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Wireless number</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">First Name</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Last Name</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Company Name</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Street Address</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">City</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Zip Code </th>
				<th style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Country </th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Phone Number</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">Email</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$lastid.'</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$data['carrier'].'</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$data['dsc'].'</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$data['amount'].'</th>
				<th  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$data['billing_phone'].'</th>
				<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$arrCustomerInfo['firstname'].'</td>
				<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$arrCustomerInfo['lastname'].'</td>
				<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$arrCustomerInfo['company_name'].'</td>
				<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$arrCustomerInfo['ad_street'].'</td>
				<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$arrCustomerInfo['ad_city'].'</td>
				<td style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;" >'.$arrCustomerInfo['ad_zip'].'</td>
				<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$arrCustomerInfo['ad_country'].'</td>
				<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$arrCustomerInfo['ph_number'].'</td>
				<td  style="background: #eeeeefad !important; padding:  16px !important; text-transform: capitalize; color: #000;">'.$arrCustomerInfo['em_email'].'</td>
			</tr>
		</tbody>
	</table>
</div>
';
wp_mail('simonchen@silkroadtradinginc.com', 'Billing Information ', $message, $headers);
		
		echo "<script>window.location = '".site_url('/success/')."'</script>";

	}else{
		// echo "<pre>";
		// print_r($checkcs);
		// echo $_POST['payment']['cc_exp_year'].'-'.$_POST['payment']['cc_exp_month'];
		echo '<div class="isa_error">'.$checkcs->message.' <a href="javascript:;" onclick="window.history.back();">BACK</a></div>';
	}


	

	
	

	// echo "<br>";
	// print_r($arrChargeResponse);




}






} //Endif ?>








<?php
if($page_full_screen_rows == 'on') echo '</div>'; ?>
</div><!--/row-->

</div><!--/container-->

</div><!--/container-wrap-->
<?php get_footer(); ?>


<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery("#my-form-paypalll").trigger('submit');
	});
</script>