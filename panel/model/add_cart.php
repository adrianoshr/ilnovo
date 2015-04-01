<?php
ob_start();
require '../includes/main.php';
require '../controller/Product.php';
ob_end_clean();
$id = $_REQUEST['id_product'];
$number = $_REQUEST['number'];
$accion = $_REQUEST['accion'];
if (!empty($id) && 'add' == $accion) {
    $_SESSION['cart'][$id] = $number;
    $_SESSION['cart_totProducts'] = 0;
    foreach ($_SESSION['cart'] as $id => $items) {
        $_SESSION['cart_totProducts']+=$items;
    }
}
if (!empty($id) && 'del' == $accion) {
    unset($_SESSION['cart'][$id]);
    $_SESSION['cart_totProducts'] = 0;
    if (is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $items) {
            $_SESSION['cart_totProducts']+=$items;
        }
    }
}
$listaProductos = array();
?><h2 class="page-header">Carrito de Compras</h2>
<div class="well"><?php
    if (is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $idP => $num) {
            $productCart = new Product();
            $productCart->Load('id_product=' . $idP);
            $image = $productCart->image_product;
            $oPrice = new Price();
            $parameters = 'id_product=' . $idP .
                    ' AND id_pricelist=1 AND (DATE(now())>= prices.start AND DATE(now())<=prices.end) '
                    . ' ORDER BY prices.end ASC ';
            $arPrice = $oPrice->Find($parameters);
            $monto = $arPrice[0]->price * $num;
            $lProducto = array();
            $lProducto['titulo'] = $productCart->title;
            $lProducto['cantidad'] = $num;
            $lProducto['precio'] = $arPrice[0]->price;
            $lProducto['monto'] = $monto;
            $lProducto['imagen'] = $image[0]->path;
            $listaProductos[] = $lProducto;
            ?><div class="col-xs-6 col-sm-6 col-md-6 padding_item_carrito">
                <div class="thumbnail">
                    <button type="button" class="close" data-dismiss="alert" onclick="delCart(<?= $productCart->id_product ?>)" >
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <img src="files/products/medium/<?= $image[0]->path ?>" alt="<?= $productCart->title; ?>"/>
                    <div class="caption">
                        <p><?= $productCart->title; ?><br /><span class="label"><?= (empty($num)) ? '' : "($num)"; ?></span>
                            <a href="<?= Convertir_a_url($productCart->title) ?>-producto-<?= $productCart->id_product; ?>" class="btn btn-default compra" role="button">$
                                <?= number_format(($monto), 2) ?></a>
                        </p>
                    </div>
                </div>
            </div><?php
            $totMonto+=$monto;
            $cantidadTotal += $num;
        }
        ?></div>
    <div class="well">
        <div class="thumbnail">
            <span class="glyphicon glyphicon-shopping-cart"></span>
            <?= $_SESSION['cart_totProducts']; ?> producto(s) en el carrito <br>
            Total: $ <?= number_format($totMonto, 2) ?> <a href="carrito" class="btn btn-default compra" role="button">Comprar</a></b>
        </div>
    </div><?php
} else {
    ?><div class="">
        <div class="">
            <span class="glyphicon glyphicon-shopping-cart"></span>
            No hay productos en el <b>carrito de compras</b>
        </div>
    </div><?php }
?>
<script>
    $(document).ready(function () {
        $(".producto_carrito_superior").remove();<?php
$num = 1;
foreach ($listaProductos as $lProducto) {
    if (5 >= $num) {
        ?>
                $("#lista_carrito_superior").prepend('<li class="producto_carrito_superior"><a href="<?php echo PATH; ?>carrito" class="overflow_link"><div class="col-xs-2 col-sm-2 col-md-2 item_carro_flotante"><img src="files/products/medium/<?php echo $lProducto["imagen"]; ?>" class="img-responsive"></div><div class="col-xs-7 col-sm-7 col-md-7 item_carro_flotante white_line"><label>(<?php echo $lProducto["cantidad"]; ?>)</label>  <?php echo $lProducto["titulo"]; ?> </div><div class="col-xs-3 col-sm-3 col-md-3 item_carro_flotante"><b>$<?php echo $lProducto["monto"]; ?></b></div></a></li>');
        <?php
    }
    $num++;
}
$num--;
$articulosExtra = $num - 5;
if (0 < $articulosExtra) {
    ?>
            $("#articulos_extra_carrito_superior").html('<a href="#" class="link_NAN">Hay <?php echo $num - 5; ?> elemento<?php
    if (($num - 5) > 1) {
        echo 's';
    }
    ?> más...</a>');
<?php } else { ?>
            $("#articulos_extra_carrito_superior").html('');

<?php } ?>
<?php if (0 == $num) { ?>
            $("#cantidad_carrito_superior").hide();
<?php } else { ?>
            $("#cantidad_carrito_superior").show();
<?php } ?>
        $("#cantidad_carrito_superior").html("<?php echo $cantidadTotal; ?>");
        $("#total_carrito_superior").html("$ <?= number_format($totMonto, 2) ?>");
    });
</script>