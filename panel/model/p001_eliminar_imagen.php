<?php

ob_start();
require '../includes/main.php';
require '../controller/Articulo.php';
ob_end_clean();
$idImagen = $_POST['idImage'];
$nombreImagen = "";
if ($idImagen == -1) {
    $nombreImagen = $_POST['nombreImagen'];
} else {
    // AQUI VA SI ES QUE YA ESTA GUARDADA EN LA BD
    $image = new ImagesHasArticles();
    $image->load("id_imagen=" . $idImagen);
    $nombreImagen = $image->path;
    $image->delete();
}
$ds = DIRECTORY_SEPARATOR;  //1
$storeFolder = '../../files/articulos';   //2
$direccion = dirname(__FILE__) . $ds . $storeFolder . $ds;
if (true == file_exists($direccion . 'original' . $ds . $nombreImagen) && !empty($nombreImagen)) {
    unlink($direccion . 'big' . $ds . $nombreImagen);
    unlink($direccion . 'small' . $ds . $nombreImagen);
    unlink($direccion . 'medium' . $ds . $nombreImagen);
    unlink($direccion . 'original' . $ds . $nombreImagen);
}
?>