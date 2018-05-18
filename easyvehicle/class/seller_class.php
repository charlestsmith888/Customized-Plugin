<?php
/**
*  Students
*/
class ev_seller extends ev_dbmanager{


	public function ev_registration_user($form = array()){

		global $api_username, $api_password, $api_signature, $api_version, $api_endpoint, $wpdb;
		$user_id = username_exists($form['userName']);
		if ( !$user_id and email_exists($form['userEmail']) == false) {
			
			$request_params = array(
				'METHOD' 		=> 'DoDirectPayment',
				'USER' 			=> $api_username,
				'PWD' 			=> $api_password,
				'SIGNATURE'		=> $api_signature,
				'VERSION' 		=> $api_version,
				'PAYMENTACTION' => 'Sale',
				'IPADDRESS' 	=> $_SERVER['REMOTE_ADDR'],
				'ACCT' 			=> $form['payment']['cc_number'],
				'EXPDATE' 		=> $form['payment']['cc_exp_month'].$form['payment']['cc_exp_year'],
				'CVV2' 			=> $form['payment']['cc_cvv'],
				'FIRSTNAME' 	=> $form['userFirst'],
				'LASTNAME' 		=> $form['userLast'],
				'STREET' 		=> $form['billing']['billing_street1'],
				'CITY' 			=> $form['billing']['billing_city'],
				'STATE' 		=> $form['billing']['billing_zone'],
				'COUNTRYCODE' 	=> $form['billing']['billing_country'],
				'ZIP' 			=> $form['billing']['billing_postal_code'],
				'AMT' 			=> 400,
				'CURRENCYCODE' 	=> 'USD',
				'DESC' 			=> '$400 as non-refundable security deposit',
			);
			$username 	= $form['userName'];
			$email 		= $form['userEmail'];
			$first_name = $form['userFirst'];
			$last_name 	= $form['userLast'];
			$password 	= $form['password'];
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
			if ($result_array['ACK'] == 'Success') {
				
				if ($form['type'] == 'buyer') {
					$role = 'buyer';
				}elseif ($form['type']== 'seller') {
					$role = 'seller';
				}elseif ($form['type']== 'buyer_and_seller') {
					$role = 'buyer_and_seller';
				}else{
					$role = 'subscriber';
				}

				$userdata = array(
					'user_login'  =>  $username,
					'user_email' => $email,
					'user_pass'   =>  $password ,
					'first_name' => $first_name,
					'last_name' => $last_name,
					'role' => $role,
				);
				$user_id = wp_insert_user( $userdata );
				// payment History
				$paymentdtaary = array(
					'TRANSACTIONID' => $result_array['TRANSACTIONID'],
					'CORRELATIONID' => $result_array['CORRELATIONID'],
					'STATUS' 		=> $result_array['ACK'],
				);
				$paymentdtaary = json_encode($paymentdtaary);
				$data1 = array(
					'user_id' => $user_id,
					'meta_key' => 'ev_payment_on_signup',
					'meta_value' => $paymentdtaary,
				);
				$wpdb->insert( $wpdb->prefix.'usermeta', $data1);
$message = '
Dear '.$form['userName'].',
Your account has been created succesfully. Here are the account login credentials
loign :  	'.$form['userEmail'].'
Password :  '.$form['password'].'
';
wp_mail( $form['userEmail'], 'Registration Completed - Account Credentials', $message);
				$msg = array(
					'msg' 	=> 'Your account has been successfully created!',
					'class' => 'isa_error isa_sucess',
				);
				return $msg = json_encode($msg);
			}else{
				$msg = array(
					'msg' 	=> $result_array['L_LONGMESSAGE0'],
					'class' => 'isa_error',
				);
				return $msg = json_encode($msg);
			}
		}else{
			$msg = array(
				'msg' 	=> 'Your account is already exist!',
				'class' => 'isa_error',
			);
			return $msg = json_encode($msg);
		}
	}
	
	public function ev_sell_your_car($form = array()){
		pr($form);
	}

	


}
$seller = new ev_seller();
?>