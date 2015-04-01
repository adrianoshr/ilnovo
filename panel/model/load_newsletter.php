<?php

$id = $_REQUEST['id'];
$oNews = new Newsletter();
$oNews->Load('id=' . $id);
$arAttibutes = $oNews->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $$attribute = $oNews->$attribute;
}
