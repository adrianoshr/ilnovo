<?php

$oPolicy = new Policy();
$arAttibutes = $oPolicy->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $$attribute = $_REQUEST[$attribute];
}
$res = $oPolicy->Load("id_policy='$id_policy'");
if (true == $res) {
    foreach ($arAttibutes as $attribute) {
        $$attribute = $oPolicy->$attribute;
    }
}
?>
