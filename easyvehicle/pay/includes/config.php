<?php
// Set sandbox (test mode) to true/false.
$sandbox = TRUE;
// Set PayPal API version and credentials.
$api_version = '85.0';
	$api_endpoint = $sandbox ? 	'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
	$api_username = $sandbox ? 	'charlestsmith888_api1.gmail.com' : 'simonchen_api1.silkroadtradinginc.com';
	$api_password = $sandbox ? 	'K2UGS3T5NGF96R29' : 'SQCAADVFF66QLU6C';
$api_signature = $sandbox ? 'ANRt4SJMHl0-agAfjMKhlBwA4q.bAF7b2D6b74Jy-Nc72yeDgZmZadsC' : 'A3CvLndtWm71GoLzl1SDFfTKUNFHAaCPNuwrkujwj5QzkWLcV4qwXj60';
