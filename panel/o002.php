<?php
ob_start();
require 'includes/mainfile.php';
require '../controller/User.php';
require '../controller/Order.php';
ob_end_clean();

$db->debug = 0;
$oOrder = new Order();
$query = 'SELECT *, (select  sum(amount * unit_price) + tax from product_order po where po.orders_id = o.id_order) as total from orders o inner join sys_usuarios u ON u.id_usuario = o.costumer_id where ';

if (isset($_REQUEST['txtcliente']) && ('' != $_REQUEST['txtcliente'] )) {
    $query = $query . " name like '%" . $_REQUEST['txtcliente'] . "%' and ";
}
if (isset($_REQUEST['txtorden']) && ($_REQUEST['txtorden'] != "")) {
    $query = $query . " id_order = " . $_REQUEST['txtorden'] . ' and ';
}
if (isset($_REQUEST['txtdatestart']) && ($_REQUEST['txtdatestart'] != "") && isset($_REQUEST['txtdatefin']) && ($_REQUEST['txtdatefin'] != '')) {
    $dStart = $_REQUEST['txtdatestart'];
    $dEnd = $_REQUEST['txtdatefin'];
    $query = $query . " ( date(add_date) >= date('$dStart') && date(add_date)  <= date('$dEnd') ) and ";
}
$query = $query . ' 1=1';
$rs = $db->execute($query);
ob_start('ob_gzhandler');
?><html>
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
        <?php include 'snippets/header_admin.php'; ?>
        <div id="page-content">
            <div id='wrap'>
                <div id="page-heading">
                    <ol class="breadcrumb">
                        <li class='active'><a href="#">Panel de Control </a></li>
                    </ol>
                    <h1 align="center">Listado de ordenes</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">

                            <div class="widget-title">Parámetros</div>
                            <form role="form">
                                <div class="form-group">
                                    <label for="txtcliente">Ingrese nombre del Cliente</label>
                                    <input type="text" class="form-control" placeholder="Cliente" id="txtcliente" name="txtcliente" value="<?php echo $_REQUEST["txtcliente"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="txtorden">Ingrese la Orden</label>
                                    <input type="text" value="<?php echo $_REQUEST["txtorden"]; ?>" class="form-control" placeholder="Orden" id="txtorden" name="txtorden">
                                </div>
                                <div class="form-group">
                                    <label for="fechaventa">Fecha de Venta</label>
                                    <div class="input-append date">
                                        <input size="16" class="form-control txtfecha ui-state-valid" placeholder="Fecha de Inicio" name="txtdatestart" type="text" value="<?php echo $_REQUEST["txtdatestart"]; ?>" value="">
                                        <p align="center">a</p>
                                        <input size="16" class="form-control txtfecha ui-state-valid" placeholder="Fecha de Fin" name="txtdatefin" type="text" value="<?php echo $_REQUEST["txtdatefin"]; ?>" value="">
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-default">Buscar/Actualizar</button>
                            </form>

                        </div>
                        <div class="col-md-9">
                            <div class="widget-title">Listado de Órdenes</div>
                            <?php if (true): ?>
                                <table class="table TblReport">
                                    <thead>
                                        <tr>
                                            <th>Orden</th>
                                            <th>Cliente</th>
                                            <th>Total Orden</th>
                                            <th>Fecha</th>
                                            <th>Status</th>
                                            <th>Forma de Pago</th>
                                            <th>Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($rs as $o):
                                            $oUser = new User();
                                            $oUser->Load(" id_usuario = " . $o["costumer_id"]);
                                            $oCatStatusOrder = new catStatusOrder();
                                            $oCatStatusOrder = $oCatStatusOrder->Find(" id=" . $o["status_order_id"]);
                                            $p = new Order();
                                            ?>
                                            <tr>
                                                <td> <?php echo $o["id_order"]; ?> </td>
                                                <td> <?php echo $oUser->datos[0]->nombre; ?>  <?php echo $oUser->datos[0]->ap; ?> <?php echo $oUser->datos[0]->am; ?> </td>
                                                <td>$<?php echo number_format($o["total"], 2); ?> </td>
                                                <td> <?php echo Date('Y-m-d', strtotime($o["add_date"])); ?> </td>
                                                <td> <?php echo $oCatStatusOrder[0]->ds; ?> </td>
                                                <td>Efectivo*</td>
                                                <td><a href="o002_detalle_orden.php?id_order=<?php echo $o["id_order"]; ?>"><i class="fa fa-file-text-o"></i>&nbsp;Ver Detalle</a></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <h4>No hay órdenes con ese filtro de búsqueda, por favor intenta nuevamente.</h4>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--wrap -->
    </div> <!-- page-content -->
    <?php include 'snippets/footer_admin.php'; ?>

</body>
</html><?php ob_end_flush(); ?>