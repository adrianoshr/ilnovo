<?php

$id_galeria = $_REQUEST['id_galeria'];
$oGaleria = new Galeria();
$res = $oGaleria->Load("id_galeria='$id_galeria'");
if (true == $res) {
    $arAttibutes = $oGaleria->GetAttributeNames();
    foreach ($arAttibutes as $attribute) {
        $$attribute = $oGaleria->$attribute;
    }
    $arImagenes = $oGaleria->scd_galeria_has_imagenes;
}