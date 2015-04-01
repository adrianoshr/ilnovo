<?php
header('Content-type: text/javascript');
ob_start();
require '../includes/mainfile.php';
require '../controller/Modulo.php';
ob_end_clean();
$oSuperModulo = new Modulo();
$arAttibutes = $oSuperModulo->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $oSuperModulo->$attribute = $_REQUEST[$attribute];
}
if (false == $error) {
    $id_modulo = $oSuperModulo->id_modulo;
    if (empty($id_modulo)) {
        $res = $oSuperModulo->Save();
    } else {
        $res = $oSuperModulo->Replace();
    }
    if (true == $res) {
        $msg = 'El Registro se Guardo con Éxito';
        $redirect = "setTimeout(\"window.location = 'g015_listado_modulos.php'\", 3000);";
    } else {
        $err = $oSuperModulo->ErrorMsg();
        $error = true;
        $msg = 'Ocurrio un Error, por favor verifique e intente nuevamente. ' . $err;
    }
}
?>
$(document).ready(function () {
$.noty.consumeAlert({layout: 'top', type: '<?= (true == $error) ? 'warning' : 'success' ?>', dismissQueue: true,timeout:2500});
alert("<?= $msg ?>");
<?= $redirect ?>
});
