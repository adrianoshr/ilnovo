<?php
header('Content-type: text/javascript');
ob_start();
require '../includes/mainfile.php';
require '../controller/Catalogo.php';
ob_end_clean();
$nombre_tabla = $_REQUEST['nombre_tabla'];
$oCatalogo = new Catalogo($nombre_tabla);
$arAttibutes = $oCatalogo->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $oCatalogo->$attribute = $_REQUEST[$attribute];
}
if (false == $error) {
    $idcf = $oCatalogo->idcf;
    if (empty($idcf)) {
        $res = $oCatalogo->Save();
    } else {
        $res = $oCatalogo->Replace();
    }
    if (true == $res) {
        $msg = 'El Registro se Guardo con Éxito';
        $redirect = "setTimeout(\"window.location = 'g010_listado_catalogos.php?nombre_tabla=$nombre_tabla'\", 2500);";
    } else {
        $err = $oCatalogo->ErrorMsg();
        $error = true;
        $msg = 'Ocurrio un Error, por favor verifique e intente nuevamente. ' . $err;
    }
}
?>
$(document).ready(function () {
$.noty.consumeAlert({layout: 'top', type: '<?= (true == $error) ? 'warning' : 'success' ?>', dismissQueue: true,timeout:3000});
alert("<?= $msg ?>");
<?= $redirect ?>
});
