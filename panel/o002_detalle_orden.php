<?php
ob_start();
require 'includes/mainfile.php';

require DIR_PATH . 'panel/controller/Order.php';

$oOrder = new Order();
$arOrders = $oOrder->Find(" id_order = " . $_REQUEST["id_order"]);
$oOrder = $arOrders[0];

$oCatStatusOrder = new catStatusOrder();
$oCatStatusOrder = $oCatStatusOrder->Find(" id=" . $oOrder->status_order_id);
ob_end_clean();
ob_start('ob_gzhandler');
//$oEmpresa = new Empresa();
//$oEmpresa->load("id_empresa = " . $_SESSION['g000_id_empresa']);
?>
<html>
    <head>
        <?php include 'snippets/head_admin.php'; ?>
        <link rel='stylesheet' type='text/css' href='assets/plugins/form-daterangepicker/daterangepicker-bs3.css' />
        <link rel='stylesheet' type='text/css' href='assets/plugins/fullcalendar/fullcalendar.css' />
        <link rel='stylesheet' type='text/css' href='assets/plugins/form-markdown/css/bootstrap-markdown.min.css' />
        <link rel='stylesheet' type='text/css' href='assets/plugins/codeprettifier/prettify.css' />
        <link rel='stylesheet' type='text/css' href='assets/plugins/form-toggle/toggles.css' />
        <link rel='stylesheet' type='text/css' href='assets/css/bootstrap-tour.css' />
    </head>
    <body>
        <?php
        include 'snippets/header_admin.php';
        $id_customer = $oOrder->costumer_id;
        $db->debug = 0;
        $oUsers = new Usuario();
        $datosUsuario = new Datos();
        $datosUsuario->Load('id_usuario=' . $id_customer);
        ?>
        <div id="page-content">
            <div id='wrap'>
                <div id="page-heading">
                    <ol class="breadcrumb">
                        <li class='active'><a href="#">Panel de Control </a></li>
                    </ol>
                    <h1 align="center">Detalle Orden</h1>
                </div>

                <div class="container content_page">
                    <div class="hidden-print" style="text-align:right;margin-bottom:10px;">
                        <a href="#" class="btn btn-default">Imprimir</a>
                        <a href="#" class="btn btn-default">Pedido Surtido</a>
                        <a href="#" class="btn btn-warning">Cancelar Pedido</a>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="widget-title" style="margin-left: 10px;">Datos de la Orden</div>
                            <div class="col-xs-12" style="padding: 5px 0px">
                                <div class="col-xs-3">
                                    <b>Orden:</b> <?php echo $oOrder->id_order; ?>
                                </div>
                                <div class="col-xs-3">
                                    <b>Fecha de Venta:</b> <?php echo Date('Y-m-d', strtotime($oOrder->add_date)); ?>
                                </div>
                                <div class="col-xs-3">
                                    <b>Fecha de Pago:</b> <?php echo Date('Y-m-d', strtotime($oOrder->add_date)); ?>
                                </div>
                                <div class="col-xs-3">
                                    <b>Status Pago:</b> <?php echo $oCatStatusOrder[0]->ds; ?>
                                </div>
                            </div>
                            <div class="col-xs-12" style="padding: 5px 0px">
                                <div class="col-xs-3">
                                    <b>Subtotal:</b> $<?php echo number_format($oOrder->getSubTotal(), 2); ?>
                                </div>
                                <div class="col-xs-3">
                                    <b>Impuestos:</b> $<?php echo number_format($oOrder->getTaxes(), 2); ?>
                                </div>
                                <div class="col-xs-3">
                                    &nbsp;
                                </div>
                                <div class="col-xs-3">
                                    <b>Gran Total:</b> $<?php echo number_format($oOrder->getTotalOrder(), 2); ?>
                                </div>
                            </div>
                            <div class="col-xs-12" style="padding: 5px 0px">
                                <div class="col-xs-3">
                                    <?php ?>
                                    <b>Nombre del Cliente:</b> <?php echo $datosUsuario->nombre; ?>
                                    <?php echo $datosUsuario->ap; ?>
                                    <?php echo $datosUsuario->am; ?>
                                </div>
                                <div class="col-xs-3">
                                    <b>Tel. Celular.</b> <?php //echo $oUser[0]->getPhoneByCat(2)->ds;    ?>
                                </div>
                                <div class="col-xs-3">
                                    <b>Tel. Casa:</b> 	<?php //echo $oUser[0]->getPhoneByCat(1)->ds;    ?>
                                </div>
                                <div class="col-xs-3">
                                    <b>Email:</b> <?php echo($oUser->correo); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Segunda sección-->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-xs-6">
                                <div class="widget-title">Datos de Entrega</div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <b>Estado: </b>
                                    </div>
                                    <div class="col-xs-6">
                                        Nuevo León
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <b>Ciudad/Municipio: </b>
                                    </div>
                                    <div class="col-xs-6">
                                        Monterrey
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <b>Colonia: </b>
                                    </div>
                                    <div class="col-xs-6">
                                        San Pedro de los Garza
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <b>C.P.: </b>
                                    </div>
                                    <div class="col-xs-6">
                                        23456
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <b>Calle y Núm.: </b>
                                    </div>
                                    <div class="col-xs-6">
                                        Calle Santa Catarína #25 Int #23
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 separador">
                                <div class="widget-title">Datos de Facturación</div>
                                <div class="col-xs-6">
                                    <b>Facturado: </b>
                                </div>
                                <div class="col-xs-6">
                                    SI
                                </div>
                                <div class="col-xs-6">
                                    <b>Razón Social: </b>
                                </div>
                                <div class="col-xs-6">
                                    Grupo Ambar S.A. de C.V.
                                </div>
                                <div class="col-xs-6">
                                    <b>R.F.C.: </b>
                                </div>
                                <div class="col-xs-6">
                                    GRPOAMBAR23042000DFR
                                </div>
                                <div class="col-xs-6">
                                    <b>Estado: </b>
                                </div>
                                <div class="col-xs-6">
                                    Nuevo León
                                </div>
                                <div class="col-xs-6">
                                    <b>Ciudad/Municipio: </b>
                                </div>
                                <div class="col-xs-6">
                                    Monterrey
                                </div>
                                <div class="col-xs-6">
                                    <b>Colonia: </b>
                                </div>
                                <div class="col-xs-6">
                                    San Pedro de los Garza
                                </div>
                                <div class="col-xs-6">
                                    <b>C.P.: </b>
                                </div>
                                <div class="col-xs-6">
                                    23456
                                </div>
                                <div class="col-xs-6">
                                    <b>Calle y Núm.: </b>
                                </div>
                                <div class="col-xs-6">
                                    Calle Santa Catarína #25 Int #23
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-xs-12 table-responsive">
                                <table class="table TblReport" style="text-align:	center">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">Cantidad</th>
                                            <th style="text-align:center">Descripción</th>
                                            <th style="text-align:center">Precio Unidad</th>
                                            <th style="text-align:center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($oOrder->product_order as $product): ?>
                                            <tr>
                                                <td width="10%;"> <?php echo number_format($product->amount, 0); ?> </td>
                                                <td width="59%;"> <?php echo $product->title; ?> </td>
                                                <td width="17%;">$<?php echo number_format($product->unit_price, 2); ?></td>
                                                <td>$<?php echo number_format($product->amount * $product->unit_price, 2); ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-4">
                            </div>
                            <div class="col-xs-4">
                                &nbsp;
                            </div>
                            <div class="col-xs-4 table-responsive">
                                <table class="TblReport table" style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th colspan="2" style="text-align:center">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Subtotal.: </b></td>
                                            <td>$<?php echo number_format($oOrder->getSubTotal(), 2); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Impuesto.: </b></td>
                                            <td>$<?php echo number_format($oOrder->getTaxes(), 2); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Total.: </b></td>
                                            <td>$<?php echo number_format($oOrder->getTotalOrder(), 2); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!--wrap -->
        </div> <!-- page-content -->
        <?php include 'snippets/footer_admin.php'; ?>

    </body>
</html><?php ob_end_flush(); ?>