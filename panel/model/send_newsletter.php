<?php
header('Content-type: text/javascript');
require '../includes/main.php';
ob_start();
require '../controller/Newsletter.php';
require '../classes/Web/Mail.php';
require '../classes/Web/html.php';
ob_end_clean();
set_time_limit(0);
$correo = $_REQUEST['correo'];
$emails = $_REQUEST['emails'];
//die(var_dump($_REQUEST);

$oNews = new Newsletter();
$arAttibutes = $oNews->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $oNews->$attribute = $_REQUEST[$attribute];
    $$attribute = $_REQUEST[$attribute];
}

if (false == $error) {
    if (empty($id)) {
        $res = $oNews->Save();
        $idNews = $db->insert_id();
    } else {
        $res = $oNews->Replace();
        $idNews = $id;
    }
    if (true == $res) {
        $idNews = (false == $id) ? $idNews : $id;
        if (1 == $emails) {
            $oSuscriptor = new Usuario();
            $arSuscriptores = $oSuscriptor->Find('newsletter=1 AND id_status=1');
        }
        if (!empty($correo)) {
            $adicional = new Usuario();
            $resA = $adicional->Load("correo='$correo'");
            if (false == $resA) {
                $adicional->id_status = 1;
                $adicional->correo = $correo;
            }
            $arSuscriptores[] = $adicional;
        }
        if (is_array($arSuscriptores)) {
            $oHtml = new html();
            $url = PATH . 'panel/emails/mail-newsletter.php?n=' . $correo . '&id=' . $idNews;
            $strBody = $oHtml->getPage($url, '<html>', '</html>');
            $oPolicy = new Policy();
            $arEmailSettings = $oPolicy->Find('idGroup=3');
            if (is_array($arEmailSettings)) {
                foreach ($arEmailSettings as $emailSetting) {
                    $varname = $emailSetting->variable;
                    $$varname = $emailSetting->value;
                }
            }
            foreach ($arSuscriptores as $suscriptor) {
                $correo = $suscriptor->correo;
                $oMail = new Mail();
                $oMail->fromMail = (false == $fromEmail) ? 'newsletter@nanlaboratorios.com' : $fromail;
                $oMail->fromName = $fromName;
                $oMail->subject = (false == $asunto) ? 'NaN - Newsletter' : $asunto;
                $oMail->body = $strBody;
                $oMail->recipients = $correo;
                if (true == $oMail->send()) {
                    $sendMail = 1;
                    $msg = 'El Email se Envío con Éxito <a href="' . $url . '" target="_blank">Abrir Mail</a>';
                } else {
                    trigger_error('<br/>Error in component that sends the mail. ' . $correo, E_USER_ERROR);
                    $msg .= 'Error in component that sends the mail.';
                    $error = true;
                    $bandera = 0;
                }
                sleep(1);
            }
        }
    } else {
        $err = $oNews->ErrorMsg();
        $msg = 'Ocurrio un Error al Intentar Guardar ' . $err;
    }
}
?>noty(
{ text: '<?= $msg ?>',
type: '<?= (true == $error) ? 'error' : 'success' ?>', timeout:3500
});
