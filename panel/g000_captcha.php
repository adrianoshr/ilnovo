<?php

ini_set('gd.jpeg_ignore_warning', 1);
ob_start();
require 'includes/config.php';
require 'includes/adodb.php';
ob_end_clean();
$db = NewADOConnection($serverType);
$db->Connect($server, $serverUname, $serverPass, $serverDB);
session_start();
$ranStr = md5(microtime());
$ranStr = substr($ranStr, 0, 6);
$_SESSION['cap_code'] = $ranStr;
$newImage = @imagecreatefromgif('assets/img/fondo_captcha.gif');
$txtColor = @imagecolorallocate($newImage, 255, 255, 255);
@imagestring($newImage, 5, 32, 8, $ranStr, $txtColor);
header('Content-type: image/jpeg');
imagejpeg($newImage);
?>


