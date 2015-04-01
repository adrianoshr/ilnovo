<?php
/*
  +----------------------------------------------------------------------+
  | PHP version 5
  +----------------------------------------------------------------------+
  | Nombre Interfaz: <List Products>
  | Descripcion: <Lista los datos del producto>
  | Autor: Marcos Velazquez <marcosvelazquez@me.com>
  +----------------------------------------------------------------------+
  | Version: 0.0.2
  | Fecha de Actualizacion: <26-09-2014>
  +----------------------------------------------------------------------+
 */
ob_start();
require '../includes/main.php';
require '../classes/Web/Paginacion.php';
ob_end_clean();
foreach ($_REQUEST as $key => $var) {
    $$key = strip_tags($_REQUEST[$key]);
}
$qrProducts = 'SELECT products.id_product,title,description,'
        . ' image_product.path,prices.price '
        . ' FROM products '
        . ' LEFT JOIN image_product '
        . ' ON products.id_product=image_product.id_product '
        . ' LEFT JOIN prices '
        . ' ON prices.id_product=products.id_product'
        . ' WHERE active=1 '
        . " AND id_pricelist=1 AND (DATE(now())>= prices.start AND DATE(now())<=prices.end) ";
if (!empty($id_category)) {
    $qrProducts.=" AND id_category='$id_category' ";
}
if (!empty($search)) {
    $qrProducts.=" AND (title LIKE '%$search%' OR description LIKE '%$search%') ";
}
$qPaginado = new Paginacion($db, $qrProducts, 6);
$page = (false == $page) ? 1 : $page;
$qPaginado->setPage($page);
$rsProducts = $qPaginado->queryLimits();
?><h2 class="page-header">Productos Destacados</h2><?php
if ($rsProducts->EOF || false == $rsProducts) {
    ?><div class="row well">
        <div class="thumbnail" style="overflow:hidden">
            <span class="glyphicon glyphicon-tag"></span>
            No hay productos en la <b>categoría</b> seleccionada
        </div>
    </div><?php
} else {
    while (list($id_product, $title, $description, $imagePath, $price) = $rsProducts->FetchRow()) {
        ?><div class="col-xs-12 col-sm-6 col-md-4">
            <div class="thumbnail">
                <a href="<?= Convertir_a_url($title) ?>-producto-<?= $id_product; ?>"
                   title="<?= $title ?>">
                    <img src="<?= PATH ?>files/products/medium/<?= $imagePath ?>" alt="<?= $title ?>"
                         data-placement="top" title="<?= $title; ?>"/></a>
                <div class="caption" align="center">
                    <h4 data-toggle="tooltip" data-placement="top" title="<?= $title; ?>">
                        <?= substr(strip_tags($title), 0, 10) . '...'; ?>
                    </h4>
                    <p class="starts">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                    </p>
                    <div class="descrip_corta"><?= substr(strip_tags($description), 0, 50) . '...'; ?></div>
                    <p>
                        <a href="<?= Convertir_a_url($title) ?>-producto-<?= $id_product; ?>" class="btn btn-default btn_compra" role="button">
                            $ <?= number_format($price, 2) ?></a>
                        <a  onclick="addCart(<?= $id_product ?>)" class="btn btn-default btn_compra float_left"
                            role="button">Comprar</a>
                    </p>
                </div>
            </div>
        </div><?php
    }
}
?><div class="clearfix"></div>
<div class="dataTables_paginate paging_bootstrap">
    <ol class="pagination">
        <li class="prev"><?= $qPaginado->linkFirst('<i class="fa fa-long-arrow-left"></i> Primero'); ?></li>
        <?= $qPaginado->links(' '); ?>
        <li class="next"><?= $qPaginado->linkNext('Siguiente <i class="fa fa-long-arrow-right"></i>'); ?></li>
    </ol>
</div>