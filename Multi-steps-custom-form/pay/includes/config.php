<?php
// Set sandbox (test mode) to true/false.
$sandbox = TRUE;

// Set PayPal API version and credentials.
$api_version = '85.0';
$api_endpoint = $sandbox ? '' : '';
$api_username = $sandbox ? '' : '';
$api_password = $sandbox ? '' : '';
$api_signature = $sandbox ? '' : '';


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