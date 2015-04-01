<?php

ini_set('display_errors', 'On');           //Despliega errores de codigo
ini_set('SMTP', 'smtp.nanlaboratorios.com');
ini_set('sendmail_from', 'info@nanlaboratorios.com');
error_reporting(E_ALL ^ E_NOTICE);     //Solo errores de codigo dinamico
require 'config.php';
require 'adodb.php';

$db = NewADOConnection($serverType);
$db->Connect($server, $serverUname, $serverPass, $serverDB);
$db->EXECUTE("set names 'utf8'");
//$db->debug = 1;
require DIR_PATH . 'panel/controller/Policy.php';
require DIR_PATH . 'panel/controller/Usuario.php';
require DIR_PATH . 'panel/includes/libs.php';
session_start();
$GLOBALS['g000_id_usuario'] = & $_SESSION['g000_id_usuario'];
$ADODB_SESSION_EXPIRE_NOTIFY = array('g000_id_usuario', 'notify');
set_time_limit(0);
header('Cache-control: private');
date_default_timezone_set('America/Mexico_City');
?>