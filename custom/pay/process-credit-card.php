<?php
// Include config file
require_once('includes/config.php');

// Store request params in an array
$request_params = array
(
	'METHOD' => 'DoDirectPayment', 
	'USER' => $api_username, 
	'PWD' => $api_password, 
	'SIGNATURE' => $api_signature, 
	'VERSION' => $api_version, 
	'PAYMENTACTION' => 'Sale', 					
	'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
	// 'CREDITCARDTYPE' => 'MasterCard', 
	'ACCT' => '5110921864924447', //done 						
	'EXPDATE' => '022020', //done			
	'CVV2' => '456', //done
	'FIRSTNAME' => 'Tester', //done
	'LASTNAME' => 'Testerson', //done
	'STREET' => '707 W. Bay Drive', //done 
	'CITY' => 'Largo', //done
	'STATE' => 'FL', 	//done				
	'COUNTRYCODE' => 'US', //done 
	'ZIP' => '33770',  //done
	'AMT' => '100.00',  //done
	'CURRENCYCODE' => 'USD', //done
	'DESC' => 'Testing Payments Pro' //done 
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
echo $result.'<br /><br />';
curl_close($curl);

// Parse the API response
$result_array = NVPToArray($result);

echo '<pre />';
print_r($result_array);

// Function to convert NTP string to an array
function NVPToArray($NVPString)
{
	$proArray = array();
	while(strlen($NVPString))
	{
		// name
		$keypos= strpos($NVPString,'=');
		$keyval = substr($NVPString,0,$keypos);
		// value
		$valuepos = strpos($NVPString,'&') ? strpos($NVPString,'&'): strlen($NVPString);
		$valval = substr($NVPString,$keypos+1,$valuepos-$keypos-1);
		// decoding the respose
		$proArray[$keyval] = urldecode($valval);
		$NVPString = substr($NVPString,$valuepos+1,strlen($NVPString));
	}
	return $proArray;
}