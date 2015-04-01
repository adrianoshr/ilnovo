<?php
header('Content-type: text/javascript');
ob_start();
require '../includes/main.php';
require '../classes/Web/Imagen.php';
require '../controller/Galeria.php';
ob_end_clean();

foreach ($_REQUEST as $key => $var) {
    if (!empty($_REQUEST[$key])) {
        $$key = $_REQUEST[$key];
    }
}
$oGaleria = new Galeria();
$arAttibutes = $oGaleria->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $oGaleria->$attribute = $_REQUEST[$attribute];
    $$attribute = $_REQUEST[$attribute];
}

if (empty($id_galeria)) {
    $res = $oGaleria->Save();
    $id_galeria = $db->Insert_ID();
} else {
    $res = $oGaleria->Update();
}

if (true == $res) {
    $msg .= 'El Registro se Guardo con Éxito. ';
    $fotos = $_REQUEST['fotos'];
    if (is_array($fotos)) {
        $images = new GaleriaHasImagenes();
        $arFotos = $images->Find("id_galeria='$id_galeria'");
        if (is_array($arFotos)) {
            foreach ($arFotos as $image) {
                $image->Delete();
            }
        }
        foreach ($fotos as $foto) {
            $alt = str_replace('-', ' ', strtoupper($foto));
            $alt = str_replace('JPG', '', strtoupper($alt));
            $images = new GaleriaHasImagenes();
            $images->id_galeria = $id_galeria;
            $images->path = $foto;
            $images->titulo = $alt;
            $res = $images->Save();
            if (false == $res) {
                $err = $images->ErrorMsg();
                $msg .= 'Ocurrio un Error al Guardar la Imagen. ' . $err;
            }
        }
    } else {
        die(var_dump($fotos));
    }
} else {
    $error = $oGaleria->ErrorMsg();
    $msg = 'Ocurrio un Error al Intentar Guardar. ' . $error;
}
?>
$(document).ready(function () {
$.noty.consumeAlert({layout: 'top', type: '<?= (true == $error) ? 'warning' : 'success' ?>', dismissQueue: true,timeout:2500});
alert("<?= $msg ?>");
});