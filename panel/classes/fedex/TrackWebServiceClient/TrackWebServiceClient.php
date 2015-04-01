<?php
// Copyright 2009, FedEx Corporation. All rights reserved.
// Version 6.0.0
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
require '../../../includes/mainfile.php';
require_once('../library/fedex-common.php5');
include(DIR_PATH."panel/controller/Binnacle.php");

//The WSDL is not included with the sample code.
//Please include and reference in $path_to_wsdl variable.
$path_to_wsdl = "../wsdl/TrackService_v8.wsdl";

$b = new Binnacle();
$b->registerBinnacle(4,$_REQUEST["tracking_code"]);

ini_set("soap.wsdl_cache_enabled", "0");

$client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

$request['WebAuthenticationDetail'] = array(
	'UserCredential' =>array(
		'Key' => getProperty('key'), 
		'Password' => getProperty('password')
		)
	);
$request['ClientDetail'] = array(
	'AccountNumber' => getProperty('shipaccount'), 
	'MeterNumber' => getProperty('meter')
	);
$request['TransactionDetail'] = array('CustomerTransactionId' => '*** Track Request v8 using PHP ***');
$request['Version'] = array(
	'ServiceId' => 'trck', 
	'Major' => '8', 
	'Intermediate' => '0', 
	'Minor' => '0'
	);
$request['SelectionDetails'] = array(
	'TrackingNumberUniqueIdentifier'=> $_REQUEST["TrackingNumberUniqueIdentifier"],
	'LanguageCode'=> 'es',
	'CarrierCode' => 'FDXE',
	'PackageIdentifier' => array(
		'Type' => 'TRACKING_NUMBER_OR_DOORTAG',
		'Value' => $_REQUEST["tracking_code"] // Replace 'XXX' with a valid tracking identifier
		//'Value' => "2456842000~123456789012~FX" // Replace 'XXX' with a valid tracking identifier
		)
	);



try {
	if(setEndpoint('changeEndpoint')){
		$newLocation = $client->__setLocation(setEndpoint('endpoint'));
	}
	
	$response = $client ->track($request);



	$arrayFinal = array();
	$r = $response->CompletedTrackDetails -> TrackDetails -> Notification -> Severity;
	$arrayFinal["status"]  = $r;
	if ($r == 'ERROR' || $r == 'FAILURE') {
	}else{
		$arrayFinal["DuplicateWaybill"] = $response->CompletedTrackDetails->DuplicateWaybill;
		$arrayFinal["tracking_code"] = $_REQUEST["tracking_code"];
		$arrayFinal["TrackingNumberUniqueIdentifier"] = $_REQUEST["TrackingNumberUniqueIdentifier"];

		if($arrayFinal["DuplicateWaybill"] =="true"){
			$arrayFinal["status"] = "SUCCESS";
			$listaOpciones = array();
			$opcion = array();
			foreach ($response->CompletedTrackDetails->TrackDetails as $track) {
				$listaOpciones[] = $track;
			}
			$arrayFinal["destinos"] = $listaOpciones;
		}else{

			$arrayFinal["tracking"] = $response->CompletedTrackDetails->TrackDetails->Events;
			$num = 1;
/*			foreach ( $response->CompletedTrackDetails->TrackDetails->Events as $e) {
				$arrayFinal["tracking"][] = $e;
			}*/
/*			if(count($response->CompletedTrackDetails->TrackDetails) > 0){
				foreach ($response->CompletedTrackDetails->TrackDetails as $track) {
					if($track->DestinationAddress->City != ''){
						$lista = array();
						$arrayFinal["status"] = "SUCCESS";
						$lista["num"] = $num;
						$lista["content"] = $track->DestinationAddress->City." ".$track->DestinationAddress->StateOrProvinceCode." ".$track->DestinationAddress->CountryName;
						$lista["date"] = date("Y m d - G:i",strtotime($track->ShipTimestamp));
						$num++;
						$arrayFinal["tracking"][] = $lista;
					}
				}
			}*/

		}
		
	}
    writeToLog($client);    // Write to log file   
    echo json_encode($arrayFinal);
} catch (SoapFault $exception) {
	printFault($exception, $client);
}
?>