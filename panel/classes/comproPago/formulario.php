<html>
<head>
	<title>Prueba Compro Pago</title>
</head>
<body>


	<div class="bloque" id="bloque1">
		<form action="prueba-compropago.php" target="respuesta" method="post" accept-charset="utf-8">
			<input type="text" name="currency" value="MXN" placeholder=""> <br>
			<input type="text" name="product_price" value="" placeholder="Precio"><br>
			<input type="text" name="product_id" value="" placeholder="ID Producto"><br>
			<input type="text" name="product_name" value="" placeholder="Nombre del Producto"><br>
			<input type="text" name="image_url" value="" placeholder="URL imgen"><br>
			<input type="text" name="customer_name" value="" placeholder="Nombre de Cliente"><br>
			<input type="text" name="customer_email" value="" placeholder="Correo del cliente"><br>
			<select name="payment_type">
				<option value="OXXO">OXXO</option>
				<option value="SEVEN_ELEVEN">SEVEN_ELEVEN</option>
				<option value="EXTRA">EXTRA</option>
				<option value="WALMART">WALMART</option>
				<option value="SORIANA">SORIANA</option>
				<option value="CHEDRAUI">CHEDRAUI</option>
				<option value="SAMS_CLUB">SAMS_CLUB</option>
				<option value="COPPEL">COPPEL</option>
				<option value="VIPS">VIPS</option>
				<option value="EL_PORTON">EL_PORTON</option>
				<option value="FARMACIA_BENAVIDES">FARMACIA_BENAVIDES</option>
				<option value="FARMACIA_GUADALAJARA">FARMACIA_GUADALAJARA</option>
				<option value="FARMACIA_ESQUIVAR">FARMACIA_ESQUIVAR</option>
				<option value="ELEKTRA">ELEKTRA</option>
			</select><br>
			<input type="text" name="customer_phone" value="" placeholder="Telefono"><br>
			<select name="customer_phone_company">
				<option value="TELCEL">TELCEL</option>
				<option value="MOVISTAR">MOVISTAR</option>
				<option value="IUSACELL">IUSACELL</option>
				<option value="NEXTEL">NEXTEL</option>
			</select><br>
			<input type="checkbox" name="send_sms" value="true"> Enviar SMS <br>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</div>
	<div class="bloque" id="bloque2">
		<iframe src="" width="100%" height="600" name="respuesta"></iframe>
	</div>





	<style>
	.bloque{
		width: 49%;
		min-height: 400px;
		float: left;
	}
	#bloque1{

	}
	#bloque2{

	}
	</style>
</body>
</html>