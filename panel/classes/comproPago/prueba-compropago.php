<?php

require_once("compropago.class.php");
$key = 'sk_test_92e3b8e71106344df';

$comproPago = new ComproPago($key,""); 
/*  $request = array(
        'customer_phone' => '7777891151',
        'customer_company_phone' => 'TELCEL'
        );*/

$enviarSMS = false;
if(isset($_POST["send_sms"])){
    $enviarSMS = true;
}

$request = array(
    'currency' => $_POST["currency"],
    'product_price' => $_POST["product_price"],
    'product_name' => $_POST["product_name"],
    'product_id'=> $_POST["product_id"],
    'image_url'=> $_POST["image_url"],
    'customer_name'=> $_POST["customer_name"],
    'customer_email'=> $_POST["customer_email"],
    'customer_phone'=> $_POST["customer_phone"],
    'payment_type'=> $_POST["payment_type"],
    'send_sms'=> $enviarSMS
    );
echo "<h4>Resultado proceso de envio de orden de PAGO</h4>";
$response = $comproPago->requestPayment($request);
var_dump($response);

if($enviarSMS){
    echo "<h4>Resultado proceso de envio de SMS</h4>";
    $comproPagoSMS = new ComproPago($key,$response->payment_id);
    $request = array(
        'customer_phone' => $_POST["customer_phone"],
        'customer_company_phone' => $_POST["customer_phone_company"]
        );
    $response = $comproPagoSMS->requestPayment($request);
    var_dump($response);
}
?>