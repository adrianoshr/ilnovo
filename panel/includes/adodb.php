<?php

//-10%
//mas caracteristica
//mostrar todos
// en adelante
//h1 y h2
/* $Id: adodb.php,v 1.1 2006/09/12 19:14:19 Administrador Exp $ */
ini_set('session.gc_maxlifetime', $sessionExpires);
$adoDbDir = 'adodb5';
require($adoDbDir . '/adodb.inc.php');
include($adoDbDir . '/adodb-active-record.inc.php');
$ADODB_SESSION_DRIVER = $serverType;
$ADODB_SESSION_CONNECT = $server;
$ADODB_SESSION_USER = $serverUname;
$ADODB_SESSION_PWD = $serverPass;
$ADODB_SESSION_DB = $serverDB;
$ADODB_CACHE_DIR = 'cachedir';
require($adoDbDir . '/session/adodb-session.php');
require($adoDbDir . '/session/adodb-compress-gzip.php');
ADODB_Session::filter(new ADODB_Compress_Gzip());
adodb_sess_open(false, false, false);

function notify() {

}

?>
