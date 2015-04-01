<?php
header('Content-type: text/javascript');
ob_start();
require '../includes/main.php';
//require '../controller/Usuario.php';
require '../classes/Web/Mail.php';
require '../classes/Web/html.php';
include '../controller/Binnacle.php';
ob_end_clean();
$validUser = new Usuario();
$arAttibutes = $validUser->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $$attribute = $_REQUEST[$attribute];
}
$res = $validUser->Load("nombreu='$nombreu'");
if (true == $res || empty($nombreu)) {
    $error = true;
    $msg = 'Error: Nombre de usuario incorrecto, por favor cambielo e intente nuevamente.';
}
$correo = filter_var(trim($correo), FILTER_VALIDATE_EMAIL);
if (empty($correo)) {
    $error = true;
    $msg = 'Error: El E-mail es Incorrecto.';
}
if (empty($contrasenia)) {
    $error = true;
    $msg = 'Error: La Constraseña es Incorrecta.';
}
if (false == $error) {
    $oUser = new Usuario();
    $arAttibutes = $oUser->GetAttributeNames();
    foreach ($arAttibutes as $attribute) {
        $oUser->$attribute = $_REQUEST[$attribute];
    }
    $oUser->contrasenia = md5($oUser->contrasenia);
    $oUser->llave = uniqid();
    $oUser->id_perfil = (false == $id_perfil) ? 4 : $id_perfil;
    $res = $oUser->Save();
    $id_usuario = $db->Insert_ID();
    if (true == $id_usuario) {
        $oDatos = new Datos();
        $arAttibutes = $oDatos->GetAttributeNames();
        foreach ($arAttibutes as $attribute) {
            $oDatos->$attribute = $_REQUEST[$attribute];
        }
        $oDatos->id_usuario = $id_usuario;
        $resData = $oDatos->Save();
        if (false == $resData) {
            $error = true;
            $err = $oDatos->ErrorMsg();
            $msg = 'Ocurrio un Error al Intentar Guardar los Datos, Por Favor Verifique e intente Nuevamente. ' . $err;
        } else {
            $msg = 'Sus Datos se Guardaron con Éxito, Porfavor Verifique su Cuenta de Email para Activar la Cuenta ';

            /* Sending Email */
            $oPolicy = new Policy();
            $arEmailSettings = $oPolicy->Find('id_group=3');
            if (is_array($arEmailSettings)) {
                foreach ($arEmailSettings as $emailSetting) {
                    $varname = $emailSetting->variable;
                    $$varname = $emailSetting->value;
                }
                $oHtml = new html();
                $rutaRaizSitio = $a_System['main_url'];
                $url = PATH . 'panel/emails/activate_count.php?id_usuario=' . $id_usuario;
                $strBody = $oHtml->getPage($url, '<html>', '</html>');
                $oMail = new Mail();
                $oMail->fromMail = $fromEmail;
                $oMail->fromName = $fromName;
                $oMail->subject = 'NaN Laboratorios - Activación de Cuenta';
                $oMail->body = $strBody;
                $a_destinatarios_ocultos = array('mvelazquezbarocio@gmail.com');
                $oMail->recipients = $correo;
                $oMail->bcc = implode(',', $a_destinatarios_ocultos);
                if (true == $oMail->send()) {
                    $sendMail = 1;
                    $redirect = "setTimeout(\"window.location='welcome_register.php'\",3000);";
                } else {
                    trigger_error('<br/>Error in component that sends the mail.', E_USER_ERROR);
                    $msg .= 'Error in component that sends the mail.';
                    $error = true;
                    $bandera = 0;
                }
            }
            $oBinnacle = new Binnacle();
            $oBinnacle->id_usuario = $id_usuario;
            $oBinnacle->id_evento = 2;
            $oBinnacle->fecha = date('Y-m-d');
            $oBinnacle->hora = date('H:i:s');
            $oBinnacle->datos = $_SERVER['HTTP_USER_AGENT'];
            $oBinnacle->ip = $_SERVER['REMOTE_ADDR'];
            $rsB = $oBinnacle->Save();
        }
    } else {
        $err = $oUser->ErrorMsg();
        $error = true;
        $msg .= 'Ocurrio un Error al Intentar Guardar, porfavor Verifique y vuelva a intentar<br>' . $err;
    }
}
?>$(document).ready(function () {
$.noty.consumeAlert({layout: 'top', type: '<?= (true == $error) ? 'warning' : 'success' ?>', dismissQueue: true});
alert("<?= $msg ?>");
<?= $redirect ?>
});