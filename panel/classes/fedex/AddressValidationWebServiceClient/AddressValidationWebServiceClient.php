<?php
// Copyright 2009, FedEx Corporation. All rights reserved.
// Version 2.0.1   

require_once('../library/fedex-common.php5');

//The WSDL is not included with the sample code.
//Please include and reference in $path_to_wsdl variable.
$path_to_wsdl = "../wsdl/AddressValidationService_v2.wsdl"; 

ini_set("soap.wsdl_cache_enabled", "0");

$client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

$request['WebAuthenticationDetail'] = array(
	'UserCredential' => array(
		'Key' => getProperty('key'), 
		'Password' => getProperty('password')
	)
);
$request['ClientDetail'] = array(
	'AccountNumber' => getProperty('shipaccount'), 
	'MeterNumber' => getProperty('meter')
);
$request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Address Validation Request v2 using PHP ***');
$request['Version'] = array(
	'ServiceId' => 'aval', 
	'Major' => '2', 
	'Intermediate' => '0', 
	'Minor' => '0'
);
$request['RequestTimestamp'] = date('c');
$request['Options'] = array(
	'CheckResidentialStatus' => 1,
	'MaximumNumberOfMatches' => 5,
	'StreetAccuracy' => 'LOOSE',
	'DirectionalAccuracy' => 'LOOSE',
	'CompanyNameAccuracy' => 'LOOSE',
	'ConvertToUpperCase' => 1,
	'RecognizeAlternateCityNames' => 1,
	'ReturnParsedElements' => 1
);
$request['AddressesToValidate'] = array(
	0 => array(
		'AddressId' => 'WTC',
     	'Address' => array(
     		'StreetLines' => array('10 FedEx Parkway'),
           	'PostalCode' => '38017',
           	'CompanyName' => 'FedEx Services'
		)
	),
	1 => array(
		'AddressId' => 'FedEx Office',
       	'Address' => array(
       		'StreetLines' => array('50 N Front St'),
          	'PostalCode' => '38103',
           	'CompanyName' => 'FedEx Office'
		)
	)
);



try {
	if(setEndpoint('changeEndpoint')){
		$newLocation = $client->__setLocation(setEndpoint('endpoint'));
	}

    $response = $client ->addressValidation($request);

    if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
        foreach($response -> AddressResults as $addressResult){
        	echo 'Address Id: ' . $addressResult->AddressId . Newline;
        	echo 'Residential Status: ' . $addressResult->ProposedAddressDetails->ResidentialStatus . Newline;
        	echo 'Delivery Point Address: ' . $addressResult->ProposedAddressDetails->DeliveryPointValidation . Newline;
        	echo 'Proposed Address:' . Newline;
        	foreach($addressResult->ProposedAddressDetails->Address as $addressKey => $addressValue){
        		echo '&nbsp;&nbsp;' . $addressValue . Newline;
        	}
        	echo Newline;
        }
    	
    	printSuccess($client, $response);
    }else{
        printError($client, $response);
    } 
    
    writeToLog($client);    // Write to log file   
} catch (SoapFault $exception) {
    printFault($exception, $client);
}
?>