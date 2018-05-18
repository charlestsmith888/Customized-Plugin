<?php
	
/*
 ----------------------------------------------------------------
 Author: Prashant Jethwa
 Purpose: Sample code on 
1. Add Credit Card
2. Add eCheck
3. Charge Customer
4. Get credit card / eCheck details
5. Refund amount to customer
6. Get Transaction status
7. Delete credit card / echeck (Delete customer payment profile)
8. Delete customer
Email: codebucket.co@gmail.com
Last Modified on 19 May 2017
 -----------------------------------------------------------------
*/

include_once('authorize.class.php');
// secret key : Simon
// Create an object of AuthorizeAPI class
$objAuthorizeAPI = new AuthorizeAPI('3nnr6nC8Wrc', '6F5t36q9dU5y54A8');

// Set customer's information
$arrCustomerInfo = array();
$arrCustomerInfo['firstname'] = 'Alexander';
$arrCustomerInfo['lastname'] = 'Fonseca';
$arrCustomerInfo['company_name'] = 'Code Bucket';
$arrCustomerInfo['ad_street'] = '4138 Derek Drive';
$arrCustomerInfo['ad_city'] = 'Youngstown';
$arrCustomerInfo['ad_state'] = 'Ohio';
$arrCustomerInfo['ad_zip'] = '44503';
$arrCustomerInfo['ad_country'] = 'US';
$arrCustomerInfo['ph_number'] = '1330-314-1789';
$arrCustomerInfo['em_email'] = 'asad.ali@salsoft.net';

$objAuthorizeAPI->setCustomerAddress($arrCustomerInfo);

// ~~~~~~~~~~~~ ADD CREDIT CARD ~~~~~~~~~~~~~~~~~~~~~~ //
$objAuthorizeAPI->setCreditCardParameters('4007000000027', '2019-12', '123');

$arrCustomerAddCCResponse = $objAuthorizeAPI->addCustomerPaymentProfile(200,'cc');

$arrChargeResponse = $objAuthorizeAPI->chargeCCeCheck(1503227157,1502577907, 50.15);


print_r($arrCustomerAddCCResponse);
echo "<br>";
print_r($arrChargeResponse);


/* 
Response will be

{"success":"1","customerProfileId":"1501067535","customerPaymentProfileId":"1500625311","error":"","paymentFlag":"1","message":""}
  
Store Customer's profile id and payment profile id in database

If You want to add Second Credit card / eCheck for same above customer then call addCustomerPaymentProfile as below
$arrCustomerAddResponse = $objAuthorizeAPI->addCustomerPaymentProfile(111,'cc', true, 1501067535);
*/

// ~~~~~~~~~~~~~~~~~~~~~~~~ ADD eCheck ~~~~~~~~~~~~~~~~~~~~~ //
// $objAuthorizeAPI->setBankParameters('071921891', '123456789', 'Prashant Jethwa', 'savings');
// $arrCustomerAddeCheckResponse = $objAuthorizeAPI->addCustomerPaymentProfile(111,'eCheck',true, 1501067535);


// ~~~~~~~~~~~~~~~~~~~~~~~~ CHARGE CUSTOMER ~~~~~~~~~~~~~~~~~~~~~ //
/* First: Customer profile id
   Second: Customer payment profile id
   Third: Amout
*/
// $arrChargeResponse = $objAuthorizeAPI->chargeCCeCheck(1501067535,1500625311, 50.15);


// ~~~~~~~~~~~~~~~~~~~~~~~~ GET CREDIT CARD / ECHECK DETAILS ~~~~~~~~~~~~~~~~~~~~~ //
// $arrCCeCheckInfo = $objAuthorizeAPI->getCCeCheckInfo(1501067535,1500625311);


// ~~~~~~~~~~~~~~~~~~~~~~~~ REFUND MONEY ~~~~~~~~~~~~~~~~~~~~~ //
// $arrRefundResponse = $objAuthorizeAPI->refundMoneyFromTransaction(1501067535,1500625311, '6547898132', 20.12);


// ~~~~~~~~~~~~~~~~~~~~~~~~ GET TRANSACTION STATUS ~~~~~~~~~~~~~~~~~~~~~ //
// $arrTransactionStatus = $objAuthorizeAPI->getTransactionStatus('6547898132');


// ~~~~~~~~~~~~~~~~ DELETE CUSTOMER PAYMENT PROFILE / DELETE CREDIT CARD / ECHECK INFO ~~~~~~~~~~~ //
// $arrCPPDeleteResponse = $objAuthorizeAPI->deleteCustomerPaymentProfile(1501067535,1500625311);


// ~~~~~~~~~~~~~~~~~~~~~~~~ DELETE CUSTOMER ~~~~~~~~~~~~~~~~~~~~~ //
// $arrCPDeleteResponse = $objAuthorizeAPI->deleteCustomerProfile(1501067535);


?>