<?php
header('Content-type: text/javascript');
ob_start();
require 'includes/main.php';
require 'controller/Galeria.php';
ob_end_clean();
$id = $_REQUEST['id'];
if (!empty($id)) {
    $oGaleria = new Galeria();
    $oGaleria->id_galeria = $id;
    $res = $oGaleria->Delete("id_galeria='$id'");
    if (true == $res) {
        $msg = 'La galeria se elimino con éxito<br>Por favor espere... ';
    } else {
        $error = true;
        $msg = 'Ocurrio un Error al Intentar Eliminar, por favor verifique e intente nuevamente<br> ' . $oGaleria->ErrorMsg();
    }
} else {
    $error = true;
    $msg = 'Ocurrio un Error al Intentar Eliminar, por favor verifique e intente nuevamente<br> ';
}
?>noty(
{ text: '<?= $msg ?>',
type: '<?= (true == $error) ? 'error' : 'success' ?>',
timeout:2500
});