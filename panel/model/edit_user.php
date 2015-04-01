<?php
header('Content-type: text/javascript');
ob_start();
require '../includes/mainfile.php';
require '../classes/Web/Mail.php';
require '../classes/Web/html.php';
include '../controller/Binnacle.php';
ob_end_clean();


$validUser = new Usuario();
$arAttibutes = $validUser->GetAttributeNames();
foreach ($_REQUEST as $attribute => $val) {
    $$attribute = $val;
}
$res = $validUser->Load("nombreu='$nombreu'");
if ((true == $res || empty($nombreu)) && empty($id_usuario)) {
    $error = true;
    $msg = 'Error: Nombre de usuario incorrecto, por favor cambielo e intente nuevamente.';
}
$correo = filter_var(trim($correo), FILTER_VALIDATE_EMAIL);
if (empty($correo)) {
    $error = true;
    $msg = 'Error: El E-mail es Incorrecto.';
}
if (false == $error) {
    $oUser = new Usuario();
    $arAttibutes = $oUser->GetAttributeNames();
    foreach ($arAttibutes as $attribute) {
        $oUser->$attribute = $_REQUEST[$attribute];
    }
    if (!empty($newPassword)) {
        $oUser->contrasenia = md5($newPassword);
    } else {
        $validUser->Load("id_usuario='$id_usuario'");
        $oUser->contrasenia = $validUser->contrasenia;
    }

    if (empty($id_usuario)) {
        $res = $oUser->Save();
        $id_usuario = $db->Insert_ID();
        $evento = 2;
    } else {
        $res = $oUser->Replace();
        $evento = 3;
    }
    if (true == $id_usuario && true == $res) {
        $oDatos = new Datos();
        $rsD = $oDatos->Load("id_usuario='$id_usuario'");
        $arAttibutes = $oDatos->GetAttributeNames();
        foreach ($arAttibutes as $attribute) {
            $oDatos->$attribute = $_REQUEST[$attribute];
        }
        if (false == $rsD) {
            $resData = $oDatos->Save();
        } else {
            $resData = $oDatos->Replace();
        }
        if (false == $resData) {
            $error = true;
            $err = $oDatos->ErrorMsg();
            $msg = 'Ocurrio un Error al Intentar Guardar los Datos, Por Favor Verifique e intente Nuevamente. ' . $err;
        } else {
            $msg = 'Sus Datos se Guardaron con Éxito.';
            $redirect = "setTimeout(\"window.location='g004_listado_usuarios.php'\",3000);";
        }

        $oBinnacle = new Binnacle();
        $oBinnacle->id_usuario = $_SESSION['g000_id_usuario'];
        $oBinnacle->id_evento = $evento;
        $oBinnacle->fecha = date('Y-m-d');
        $oBinnacle->hora = date('H:i:s');
        $oBinnacle->datos = 'Cambio de datos del usuario: ' . $id_usuario;
        $oBinnacle->ip = $_SERVER['REMOTE_ADDR'];
        $rsB = $oBinnacle->Save();
    } else {
        $err = $oUser->ErrorMsg();
        $error = true;
        $msg .= 'Ocurrio un Error al Intentar Guardar, porfavor Verifique y vuelva a intentar<br>' . $err;
    }
}
?>$(document).ready(function () {
$.noty.consumeAlert({layout: 'top', type: '<?= (true == $error) ? 'warning' : 'success' ?>', dismissQueue: true});
alert("<?= $msg ?>");
<?= $redirect ?>});