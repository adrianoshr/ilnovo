<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = '../../files/articulos/';   //2


if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];
    $direccion = dirname(__FILE__) . $ds . $storeFolder . $ds;
    $nombreArchivo = time() . '-' . $_FILES['file']['name'];

    $archivoPrincipal = $direccion . 'original' . $ds . $nombreArchivo;
    $archivoBig = $direccion . 'big' . $ds . $nombreArchivo;
    $archivoMedium = $direccion . 'medium' . $ds . $nombreArchivo;
    $archivoSmall = $direccion . 'small' . $ds . $nombreArchivo;
    move_uploaded_file($tempFile, $archivoPrincipal);



    list($width, $height) = getimagesize($archivoPrincipal);

    //$nombreArchivo = str_replace(".png", ".jpg", $nombreArchivo);

    $resultado = array();
    $resultado['original'] = $archivoPrincipal;
    $resultado['big'] = $archivoBig;
    $resultado['medium'] = $archivoMedium;
    $resultado['small'] = $archivoSmall;
    $resultado['nombre'] = $nombreArchivo;
    $resultado['iWidth'] = $width;
    $resultado['iHeight'] = $height;

    echo json_encode($resultado);
}
?>