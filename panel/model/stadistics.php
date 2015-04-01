<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stadistics
 *
 * @author marcos
 */
function ventaTotal() {
    global $db;

    $qrVentaTotal = 'SELECT SUM(precio_unitario*cantidad) '
            . ' FROM detalle_ordenes INNER JOIN ordenes '
            . ' ON detalle_ordenes.id_orden=ordenes.id_orden'
            . ' WHERE id_estado_orden=2';
    $rsVentaTotal = $db->CacheExecute($qrVentaTotal)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
    if ($rsVentaTotal->EOF) {
        return false;
    } else {
        list($ventaTotal) = $rsVentaTotal->FetchRow();
        return number_format($ventaTotal, 2);
    }
}

function ventaDia() {
    global $db;

    $qrVentaTotal = 'SELECT SUM(precio_unitario*cantidad) '
            . ' FROM detalle_ordenes INNER JOIN ordenes '
            . ' ON detalle_ordenes.id_orden=ordenes.id_orden'
            . ' WHERE id_estado_orden=2 AND ordenes.fecha=DATE(now())';
    $rsVentaTotal = $db->CacheExecute($qrVentaTotal)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
    if ($rsVentaTotal->EOF) {
        return false;
    } else {
        list($ventaTotal) = $rsVentaTotal->FetchRow();
        return number_format($ventaTotal, 2);
    }
}

function nuevosClientes() {
    global $db;

    $qrCliente = 'SELECT COUNT(id_usuario) '
            . ' FROM sys_usuarios '
            . ' WHERE id_perfil=4 AND id_status=1';
    $rsCliente = $db->CacheExecute($qrCliente)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
    if ($rsCliente->EOF) {
        return false;
    } else {
        list($numClientes) = $rsCliente->FetchRow();
        return $numClientes;
    }
}

function enviosPendientes() {

    global $db;
    $qrVentaTotal = 'SELECT COUNT(id_orden) '
            . ' FROM ordenes '
            . " WHERE (id_estado_envio != 1) AND id_estado_orden=2";
    $rsVentaTotal = $db->CacheExecute($qrVentaTotal)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
    if ($rsVentaTotal->EOF) {
        return false;
    } else {
        list($pendientes) = $rsVentaTotal->FetchRow();
        return $pendientes;
    }
}

function topVentas() {

    global $db;
    $qrVentaTotal = 'SELECT products.id_product,title,SUM(precio_unitario*cantidad),path '
            . ' FROM products '
            . 'INNER JOIN detalle_ordenes '
            . 'ON products.id_product=detalle_ordenes.id_producto'
            . ' LEFT JOIN image_product ON image_product.id_product=products.id_product '
            . ' INNER JOIN ordenes '
            . ' ON ordenes.id_orden=detalle_ordenes.id_orden'
            . " WHERE id_estado_orden=2 GROUP BY id_product ORDER BY COUNT(cantidad) DESC LIMIT 5";
    $rsVentaTotal = $db->CacheExecute($qrVentaTotal)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
    if ($rsVentaTotal->EOF) {
        return false;
    } else {
        return $rsVentaTotal;
    }
}

function csvVentas() {

    global $db;
    $qrVentaTotal = 'SELECT products.id_product,title,SUM(precio_unitario*cantidad),path,COUNT(cantidad) '
            . ' FROM products '
            . ' INNER JOIN detalle_ordenes '
            . ' ON products.id_product=detalle_ordenes.id_producto'
            . ' LEFT JOIN image_product ON image_product.id_product=products.id_product '
            . ' INNER JOIN ordenes '
            . ' ON ordenes.id_orden=detalle_ordenes.id_orden'
            . " WHERE id_estado_orden=2 GROUP BY id_product ORDER BY COUNT(cantidad) DESC LIMIT 5";
    $rsVentaTotal = $db->CacheExecute($qrVentaTotal)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
    if ($rsVentaTotal->EOF) {
        return false;
    } else {
        $arProductos = array();
        while (list($id_product, $title, $totalVenta, $path, $cantidad) = $rsVentaTotal->FetchRow()) {
            $arCantidades[] = $cantidad;
            $arnombres[] = $title;
        }
        $outCVS[0] = json_encode($arCantidades);
        $outCVS[1] = implode(',', $arnombres);
        return $outCVS;
    }
}

?>