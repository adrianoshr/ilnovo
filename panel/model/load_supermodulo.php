<?php

$oSuperModulo = new SuperModulo();
$arAttibutes = $oSuperModulo->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $$attribute = $_REQUEST[$attribute];
}
$res = $oSuperModulo->Load("id_supermodulo='$id_supermodulo'");
if (true == $res) {
    foreach ($arAttibutes as $attribute) {
        $$attribute = $oSuperModulo->$attribute;
    }
}
?>
