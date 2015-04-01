<?php

$id_articulo = $_REQUEST['id_articulo'];
$oArticle = new Article();
$res = $oArticle->Load('id_articulo=' . $id_articulo);
if (true == $res) {
    $arAttibutes = $oArticle->getAttributeNames();
    foreach ($arAttibutes as $attribute) {
        $$attribute = $oArticle->$attribute;
    }
    $arSecciones = $oArticle->articulos_has_secciones;
    if (is_array($arSecciones)) {
        foreach ($arSecciones as $datos) {
            $arAttibutes = $datos->getAttributeNames();
            foreach ($arAttibutes as $attribute) {
                $$attribute = $datos->$attribute;
            }
        }
    }
    $arImagenes = $oArticle->imagenes_has_articulos;
    foreach ($arImagenes as $datos) {
        $arAttibutes = $datos->getAttributeNames();
        foreach ($arAttibutes as $attribute) {
            $$attribute = $datos->$attribute;
        }
    }
}


