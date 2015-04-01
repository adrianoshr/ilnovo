<?php

ini_set('display_errors', 'On');           //Despliega errores de codigo
ini_set('SMTP', 'smtp.bookline.mx');
ini_set('sendmail_from', 'info@bookline.com');
error_reporting(E_ALL ^ E_NOTICE);     //Solo errores de codigo dinamico
require 'config.php';
require 'adodb.php';

$db = NewADOConnection($serverType);
$db->Connect($server, $serverUname, $serverPass, $serverDB);
$db->EXECUTE("set names 'utf8'");
session_start();
$GLOBALS['g000_id_usuario'] = & $_SESSION['g000_id_usuario'];
$ADODB_SESSION_EXPIRE_NOTIFY = array('g000_id_usuario', 'notify');
set_time_limit(0);
header('Cache-control: private');
ini_set('post_max_size', '32M');
ini_set('upload_max_filesize', '100M');
ini_set('memory_limit', '256M');
ini_set('max_execution_time', '120');
ini_set('variables_order', 'EGPCS');
ini_set('bcmath.scale', 'enable');
date_default_timezone_set('America/Mexico_City');
include DIR_PATH . 'panel/controller/Usuario.php';
require 'Accesos.php';
require DIR_PATH . 'panel/controller/Policy.php';
$oPolicy = new Policy();
$arSocialMedia = $oPolicy->Find('id_group=1');
foreach ($arSocialMedia as $socialMedia) {
    $varname = $socialMedia->variable;
    $$varname = $socialMedia->value;
}
//URL en donde se localiza el repositorio del sistema ejemplo:localhost/phpServiceDesk
//Se valida que la sesin est integra y ademas provenga de la misma IP que inicio el proceso de login
if (empty($_SESSION['g000_id_usuario']) || ($_SERVER['REMOTE_ADDR'] != $_SESSION['remoteAddr'])) {
    session_destroy();
    $msg = urlencode('Su sesi&oacute;n ha expirado/Acceso denegado');
    header('Location: index.php?msg=' . $msg);
    die('Acceso denegado');
}
// $status = verificaAccesos();
if (4 == $_SESSION['g000_id_perfil'] || empty($_SESSION['g000_id_perfil'])) {
    /* session_destroy(); */
    $msg = 'No Tiene Permisos para Realizar esa Operación, por Favor Consulte con su Administrador';
    header('Location: index.php?deniedAcces=' . $msg);
    die('Acceso denegado');
}
if (!preg_match('/login.php/', $_SERVER['PHP_SELF'])) {
    if (empty($_SESSION['g000_id_usuario'])) {
        session_destroy();
        $msg = urlencode('Su sesi&oacute;n ha expirado ');
        header('Location: index.php?msg=' . $msg);
        die('No está autorizado a entrar');
    }
}?>