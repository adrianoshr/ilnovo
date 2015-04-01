<?php
header('Content-type: text/javascript');
include '../includes/main.php';
include '../controller/Binnacle.php';
$nombreu = $_REQUEST['nombreu'];
$contrasenia = $_REQUEST['contrasenia'];

if (empty($nombreu)) {
    $error = true;
    $msg = 'El Usuario es Incorrecto, por favor verifique e intente nuevamente.';
} else {
    $oUser = new Usuario();
    $oUser->nombreu = $nombreu;
    $oUser->contrasenia = $contrasenia;
    $res = $oUser->login();
    $id_usuario = $oUser->id_usuario;
    if (false == $res) {
        $msg = 'Nombre de usuario/Contraseña incorrecto.';
        $error = 1;
    } else {
        $oBinnacle = new Binnacle();
        $oBinnacle->id_usuario = $id_usuario;
        $oBinnacle->id_evento = 1;
        $oBinnacle->fecha = date('Y-m-d');
        $oBinnacle->hora = date('H:i:s');
        $oBinnacle->datos = $_SERVER['HTTP_USER_AGENT'];
        $oBinnacle->ip = $_SERVER['REMOTE_ADDR'];
        $rsB = $oBinnacle->Save();
        if (false == $rsB) {
            die($oBinnacle->ErrorMsg());
        }
        $msg = 'Bienvenido: ' . $_SESSION['g000_nombreu'] . ' ';
        $redirect = 'window.location="s000_panel.php";';
        $GLOBALS['g000_id_usuario'] = & $_SESSION['g000_id_usuario'];
        $ADODB_SESSION_EXPIRE_NOTIFY = array('g000_id_usuario', 'notify');
        $oPolicy = new Policy();
        $arPolicys = $oPolicy->Find('id_group=1');
        foreach ($arPolicys as $policys) {
            $varname = $policys->variable;
            $$varname = $policys->value;
        }
        $result = $db->Execute("SELECT COUNT(*) FROM sys_sessions WHERE expireref ='$id_usuario' ");
        if (!$result->EOF) {
            list($numSesiones) = $result->FetchRow();
            if ($numSesiones >= $maxusers) {
                $idSesion = session_id();
                $result = $db->Execute('SELECT sesskey FROM sys_sessions WHERE ' .
                        " expireref ='$id_usuario' AND sesskey <> '$idSesion' ORDER BY expiry $desconectar");
                if (!$result->EOF) {
                    list($idSesion) = $result->FetchRow();
                    $result = $db->Execute("DELETE FROM sys_sessions WHERE sesskey = '$idSesion'");
                }
            }
        }
    }
}
?>$(document).ready(function () {
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
    <?php
    $pageReturn = $_SESSION['return-page'];
    if (isset($_REQUEST['lugar']) && 4 != $_SESSION['g000_id_perfil'] && empty($pageReturn)) {
        ?>window.location="<?= PATH ?>panel/a001_1_ListadoArticulos.php";<?php
    } else {
        ?>window.location="<?= (false == $pageReturn) ? 'index.php' : $pageReturn ?>";<?php
    }
}
?>});