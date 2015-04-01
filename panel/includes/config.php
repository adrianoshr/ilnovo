<?php

$serverUname = 'ilnovousuario';  //Usuario base de datos
$serverPass = 'Catering2015';    //password del usuario de base de datos
$serverDB = 'ilnovo';  //Base de datos a usar
$server = 'localhost';   //host del servidor
$serverType = 'mysqli';    //tipo de base de datos
$sessionExpires = '10800';       //segundos en inactividad antes de expirar sesion
$maxCols = 5;              //nmero mximo de columnas a desplegar en el men superior (Super Mdulos)

define('DIR_PATH', str_replace('panel' . DIRECTORY_SEPARATOR . 'includes', '', dirname(realpath(__FILE__))));
define('DOMAIN', 'www.ilnovo.catering');
define('DIR_APP', '/');
define('PATH', 'http://' . DOMAIN . DIR_APP);
$a_System['main_url'] = PATH;
?>
