<?php
header('Content-type: text/javascript');
include '../includes/main.php';
include '../controller/Usuario.php';
include '../controller/Binnacle.php';

$config = array(
    'appId' => '281951698652457',
    'secret' => '73959e539c1d1655c6ce2ff472e4435f',
    'fileUpload' => false, // optional
    'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
);
$facebook = new Facebook($config);
$user_id = $facebook->getUser();
if (!empty($user_id)) {
    $oUserS = new Usuario();
    $rs = $oUserS->Load("id_facebook='$user_id'");
    if (true == $rs) {
        $res = $oUserS->login();
    }
    try {
        $user_profile = $facebook->api('/me', 'GET');
        $id_rf = $user_profile['id'];
        $nombre = $user_profile['first_name'];
        $onom = $nombre;
        $ap = $user_profile['last_name'];
        $oap = $ap;
        $Sexo = $user_profile['gender'];
        if ('male' == $Sexo) {
            $idSexo = 1;
        } else {
            $idSexo = 2;
        }
        if (empty($res)) {
            $oUserS->nombre = $nombre;
            $oUserS->ap = $ap;
            $oUserS->nombreU = $id_rf;
            $oUserS->Replace();
            $res = $oUsuario->validaF();
            echo '<script>window.location.reload();</script>';
        }
        $oBinnacle = new Binnacle();
        $oBinnacle->id_usuario = $id_usuario;
        $oBinnacle->id_evento = 1;
        $oBinnacle->fecha = date('Y-m-d');
        $oBinnacle->hora = date('H:i:s');
        $oBinnacle->datos = $_SERVER['HTTP_USER_AGENT'];
        $oBinnacle->ip = $_SERVER['REMOTE_ADDR'];
        $rsB = $oBinnacle->Save();
    } catch (FacebookApiException $e) {
        // If the user is logged out, you can have a
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl();
        error_log($e->getType());
        error_log($e->getMessage());
    }
} else {
    // No user, print a link for the user to login
    $login_url = $facebook->getLoginUrl();
}
?>
$(document).ready(function () {
$.noty.consumeAlert({
layout: 'top',
type: '<?= (true == $error) ? 'warning' : 'success' ?>',
dismissQueue: true,
timeout:5000
});
alert("<?= $msg ?>");<?php if (false == $error) { ?>
    $(".form-panel").slideToggle("slow");
    $("#buttonAction").html('<button type="button" class="btn btn-rosa" id="logout">Cerrar Sesión</button>');
    $('#buttonAction').click(function() {window.location='panel/model/logout.php'});
    <?php if (isset($_REQUEST['lugar'])) { ?>
        window.location="s000_panel.php";
    <?php } else { ?>
        window.location="index.php";
    <?php } ?>
<?php }
?>
});