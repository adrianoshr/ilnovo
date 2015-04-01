<?php
header('Content-type: text/javascript');
ob_start();
require '../includes/mainfile.php';
require '../controller/Articulo.php';
ob_end_clean();
$oArticle = new Article();
$arAttibutes = $oArticle->GetAttributeNames();
if (is_array($arAttibutes)) {
    foreach ($arAttibutes as $attribute) {
        $$attribute = $_REQUEST[$attribute];
        if (!empty($_REQUEST[$attribute])) {
            $oArticle->$attribute = trim($_REQUEST[$attribute]);
        }
    }
}
if (false == $id_articulo) {
    $res = $oArticle->Save();
    $id_articulo = $oArticle->id_articulo;
} else {
    $res = $oArticle->Replace();
}
if (true == $res) {
    $msg .= 'El Registro se Guardo con Éxito. ';
    $fotos = $_REQUEST['fotos'];

    if (is_array($fotos)) {
        $images = new ImagesHasArticles();
        $images->Delete("id_articulo='$id_articulo'");
        foreach ($fotos as $foto) {
            $images = new ImagesHasArticles();
            $images->id_articulo = $id_articulo;
            $images->path = $foto;
            $images->estado = 1;
            $res = $images->Save();
            if (false == $res) {
                $err = $images->ErrorMsg();
                $msg .= 'Ocurrio un Error al Guardar la Imagen. ' . $err;
            }
        }
    }
    $arSecciones = $_REQUEST['arSecciones'];
    if (is_array($arSecciones)) {
        $seccion = new ArticlesHasSections();
        $seccion->Delete("id_articulo='$id_articulo'");
        foreach ($arSecciones as $id_seccion) {
            $seccion = new ArticlesHasSections();
            $seccion->id_articulo = $id_articulo;
            $seccion->id_seccion = $id_seccion;
            $res = $seccion->Replace();
            if (false == $res) {
                $err = $seccion->ErrorMsg();
                $msg .= 'Ocurrio un Error al Guardar la Seccion. ' . $err;
            }
        }
    }
} else {
    $error = $oArticle->ErrorMsg();
    $msg = 'Ocurrio un Error al Intentar Guardar. ' . $error;
}
?>$(document).ready(function () {
$.noty.consumeAlert({layout: 'top', type: '<?= (true == $error) ? 'warning' : 'success' ?>', dismissQueue: true,timeout:2500});
alert("<?= $msg ?>");
});