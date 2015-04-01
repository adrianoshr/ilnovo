<?php

$id_usuario = $_REQUEST['id_usuario'];
$oUser = new Usuario();
$res = $oUser->Load('id_usuario=' . $id_usuario);
if (true == $res) {
    $arAttibutes = $oUser->getAttributeNames();
    foreach ($arAttibutes as $attribute) {
        $$attribute = $oUser->$attribute;
    }
    $arUsuario = $oUser->datos;
    foreach ($arUsuario as $datos) {
        $arAttibutes = $datos->getAttributeNames();
        foreach ($arAttibutes as $attribute) {
            $$attribute = $datos->$attribute;
        }
    }
}


