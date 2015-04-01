<?php
header('Content-type: text/javascript');
require '../includes/main.php';
//require '../controller/Usuario.php';
require '../classes/Web/Mail.php';
require '../classes/Web/html.php';

$email = filter_var(trim($_REQUEST['email']), FILTER_VALIDATE_EMAIL);
if (!empty($email)) {
    $oUser = new Usuario();
    $res = $oUser->Load("correo='$email'");
    if (true == $res) {
        $newPass = uniqid();
        $oUser->contrasenia = md5($newPass);
        $rs = $oUser->Replace();
        if (true == $rs) {
            $oPolicy = new Policy();
            $arEmailSettings = $oPolicy->Find('id_group=3');
            if (is_array($arEmailSettings)) {
                foreach ($arEmailSettings as $emailSetting) {
                    $varname = $emailSetting->variable;
                    $$varname = $emailSetting->value;
                }
                $oHtml = new html();
                $rutaRaizSitio = $a_System['main_url'];
                $url = PATH . 'panel/emails/reset_pass.php?id_usuario=' . $id_usuario . '&pass=' . $newPass;
                $strBody = $oHtml->getPage($url, '<html>', '</html>');
                $oMail = new Mail();
                $oMail->fromMail = $fromEmail;
                $oMail->fromName = $fromName;
                $oMail->subject = 'NAN - Renovación de Contraseña';
                $oMail->body = $strBody;
                $a_destinatarios_ocultos = array('mvelazquezbarocio@gmail.com');
                $oMail->recipients = $email;
                $oMail->bcc = implode(',', $a_destinatarios_ocultos);
                if (true == $oMail->send()) {
                    $sendMail = 1;
                    $msg = 'Se Envío un Email a Su Cuenta de Correo con la Nueva Contraseña.<br>';
                    $msg.='Nota: Si no recibe el email por favor verifique su carpeta de spam.';
                } else {
                    trigger_error('<br/>Error in component that sends the mail.', E_USER_ERROR);
                    $msg .= 'Error in component that sends the mail.';
                    $error = true;
                    $bandera = 0;
                }
            }
        } else {
            $err = $oUser->ErrorMsg();
            $error = true;
            $msg = 'Ocurrio un Error al Intentar Guardar, Por Favor Verifique e Intente Nuevamente.<br>' . $err;
        }
    } else {
        $error = true;
        $msg = 'Su Cuenta de E-mail es Incorrecta, Por Favor Verifique e Intente Nuevamente.';
    }
} else {
    $error = true;
    $msg = 'Su Cuenta de E-mail es Incorrecta, Por Favor Verifique e Intente Nuevamente.';
}
?>
$(document).ready(function () {
$.noty.consumeAlert({layout: 'top', type: '<?= (true == $error) ? 'warning' : 'success' ?>', dismissQueue: true});
alert("<?= $msg ?>");
});