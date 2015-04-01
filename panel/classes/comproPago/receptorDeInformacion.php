<?php
              // Recibe el objeto de la notificación en JSON
$body = @file_get_contents('php://input');
$event_json = json_decode($body);

$payment_id = $event_json->data->object->{'id'};


if($event_json->type == "charge.pending"){
	$mensaje = "PAGO PENDIENTE";
}else if($event_json->type == "charge.success"){
	$mensaje = "PAGO REALIZADO CORRECTAMENTE";
}
echo "En la BD el pago se actualizara como: ".$mensaje." para la orden que tenga la ID ".$payment_id;
?>