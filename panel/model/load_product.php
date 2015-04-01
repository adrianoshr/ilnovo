<?php

$id = $_REQUEST['id_product'];
$oProduct = new Product();
$res = $oProduct->Load('active=1 AND id_product=' . $id);
if (true == $res) {
    $arAttibutes = $oProduct->getAttributeNames();
    foreach ($arAttibutes as $attribute) {
        $$attribute = $oProduct->$attribute;
    }
    $image = $oProduct->image_product;
}
