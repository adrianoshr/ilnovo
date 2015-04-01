<?php
header('Content-type: text/javascript');
ob_start();
require '../includes/mainfile.php';
//require '../controller/Policy.php';
ob_end_clean();

$oPolicy = new Policy();
$arAttibutes = $oPolicy->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $oPolicy->$attribute = $_REQUEST[$attribute];
}
if (false == $error) {
    $id_policy = $oPolicy->id_policy;
    if (empty($id_policy)) {
        $res = $oPolicy->Save();
    } else {
        $res = $oPolicy->Replace();
    }
    if (true == $res) {
        $msg = 'La Política se Guardo con Éxito';
        $redirect = "setTimeout(\"window.location = 'g003_listado_politicas.php'\", 3000);";
    } else {
        $err = $oPolicy->ErrorMsg();
        $error = true;
        $msg = 'Ocurrio un Error, por favor verifique e intente nuevamente. ' . $err;
    }
}
?>$(document).ready(function () {
$.noty.consumeAlert({layout: 'top', type: '<?= (true == $error) ? 'warning' : 'success' ?>', dismissQueue: true,timeout:3000});
alert("<?= $msg ?>");
<?= $redirect ?>
});
