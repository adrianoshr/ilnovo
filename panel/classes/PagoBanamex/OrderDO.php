<?php

include('VPCPaymentConnection.php');
$conn = new VPCPaymentConnection();

// This is secret for encoding the SHA256 hash
// This secret will vary from merchant to merchant

$secureSecret = 'FBB9AE9920A3BC9BF58BC758AD05B0CB';

// Set the Secure Hash Secret used by the VPC connection object
$conn->setSecureSecret($secureSecret);

// *******************************************
// START OF MAIN PROGRAM
// *******************************************
// Sort the POST data - it's important to get the ordering right
$codearray = array(
    'vpc_AccessCode' => '8A9B1D4A',
    'vpc_Command' => 'pay',
    'vpc_Currency' => 'MXN',
    'vpc_Locale' => 'es_MX',
    'vpc_Merchant' => 'TEST1022480',
    'vpc_OrderInfo' => '',
    'vpc_ReturnURL' => '',
    'vpc_Version' => '1',
    'vpc_Amount' => '',
    'vpc_MerchTxnRef' => '',
);

$codearray['vpc_Amount'] = 100;
$codearray['vpc_MerchTxnRef'] = 'TEST';
$codearray['vpc_OrderInfo'] = 'tEST';
$codearray['vpc_ReturnURL'] = 'index.php';

//$codearray["vpc_ReturnURL"]="http://nitidcreative.com/2013/proyectos/10/sites/nantienda3/PagoBanamex/OrderDR.php";

ksort($codearray);

// add the start of the vpcURL querystring parameters
$vpcURL = 'https://banamex.dialectpayments.com/vpcpay';

// This is the title for display
$title = 'Pago NAN Laboratories';


// Add VPC post data to the Digital Order
//foreach($_POST as $key => $value) {
foreach ($codearray as $key => $value) {
    if (0 < strlen($value)) {
        $conn->addDigitalOrderField($key, $value);
    }
}
// Add original order HTML so that another transaction can be attempted.
$conn->addDigitalOrderField('AgainLink', $againLink);
// Obtain a one-way hash of the Digital Order data and add this to the Digital Order
$secureHash = $conn->hashAllFields();
$conn->addDigitalOrderField('Title', $title);
$conn->addDigitalOrderField('vpc_SecureHash', $secureHash);
$conn->addDigitalOrderField('vpc_SecureHashType', 'SHA256');
// Obtain the redirection URL and redirect the web browser
$vpcURL = $conn->getDigitalOrder($vpcURL);
header('Location: ' . $vpcURL);
//echo "<a href=$vpcURL>$vpcURL</a>";
?>