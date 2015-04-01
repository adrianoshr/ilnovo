<?php

$nombre_tabla = $_REQUEST['nombre_tabla'];
$oCatalog = new Catalogo($nombre_tabla);
$arAttibutes = $oCatalog->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $$attribute = strtoupper($_REQUEST[$attribute]);
}
$res = $oCatalog->Load("idcf='$idcf'");
if (true == $res) {
    foreach ($arAttibutes as $attribute) {
        $$attribute = $oCatalog->$attribute;
    }
}
?>
