<?php
header('Content-type: text/javascript');
ob_start();
require '../includes/mainfile.php';
require '../controller/Modulo.php';
ob_end_clean();
//$db->debug = 1;
$add = $_REQUEST['add'];
$oSuperModulo = new ModuloHasPerfiles();
$arAttibutes = $oSuperModulo->GetAttributeNames();
foreach ($arAttibutes as $attribute) {

    $$attribute = $_REQUEST[$attribute];
}
if (false == $error) {

    if ('false' == $add) {
        $oSuperModulo->Load("id_perfil='$id_perfil' AND id_modulo='$id_modulo' ");
        $res = $oSuperModulo->Delete();
    } else {
        foreach ($arAttibutes as $attribute) {
            $oSuperModulo->$attribute = $_REQUEST[$attribute];
        }
        $res = $oSuperModulo->Save();
    }
    if (true == $res) {
        $msg = 'El Registro se Guardo con Éxito';
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
});
