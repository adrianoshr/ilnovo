<?php

$idSesion = $_SESSION['g000_id_usuario'];
$idRol = $_SESSION['g000_id_perfil'];
$pagina = $_SERVER['PHP_SELF'];
$pagina = basename($pagina);
preg_match('/^([A-Za-z0-9]+)/', $pagina, $arResult);

$sufijo = $arResult[count($arResult) - 1];
$prefijo = $arResult[count($arResult) - 2];
$accesos = '';
$subaccesos = '';
$qrModulo = 'SELECT sys_modulos.nombre,sys_modulos.descripcion,sys_modulos.id_modulo,sys_modulos.imagen,sys_modulos.liga '
        . ' FROM sys_modulos ' .
        ' INNER JOIN sys_modulo_has_perfiles ' .
        ' ON sys_modulo_has_perfiles.id_modulo = sys_modulos.id_modulo' .
        " WHERE sys_modulos.prefijo LIKE '$prefijo' AND "
        . " sys_modulo_has_perfiles.id_perfil = '$idRol' ";
$rsModulo = $db->CacheExecute($qrModulo) or trigger_error($db->ErrorMsg(), E_USER_ERROR);
if (!$rsModulo->EOF) {
    $rwModulo = $rsModulo->FetchRow();
}
?>