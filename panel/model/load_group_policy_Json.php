<?php

header('Content-Type: application/json; charset=utf-8');
include '../includes/mainfile.php';
//include '../controller/Policy.php';
$oGroup = new PoliciesGroup();
$arGroup = $oGroup->Find('visible=1');
foreach ($arGroup as $key => $group) {
    $arJson[$key]['id'] = $group->id_group;
    $arJson[$key]['label'] = html_entity_decode($group->title);
}
echo json_encode($arJson);
