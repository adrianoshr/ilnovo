<?php

$oSuperModulo = new Modulo();
$arAttibutes = $oSuperModulo->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $$attribute = $_REQUEST[$attribute];
}
$res = $oSuperModulo->Load("id_modulo='$id_modulo'");
if (true == $res) {
    foreach ($arAttibutes as $attribute) {
        $$attribute = $oSuperModulo->$attribute;
    }
}
?>
