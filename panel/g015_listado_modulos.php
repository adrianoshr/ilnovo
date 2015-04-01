<?php
include('includes/mainfile.php');
ob_start('ob_gzhandler');
?>
<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'snippets/head_admin.php'; ?>
        <link rel='stylesheet' type='text/css' href='assets/plugins/datatables/dataTables.css' />
<!-- <script type="text/javascript" src="assets/js/less.js"></script> -->
    </head>
    <body class="">
        <?php include 'snippets/header_admin.php'; ?>
        <!-- BEGIN SIDEBAR -->
        <!-- BEGIN RIGHTBAR -->
        <!-- END RIGHTBAR -->
        <div id="page-content">
            <div id='wrap'>
                <div id="page-heading">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="s000_panel.php"> Inicio</a></li>
                        <li>Módulos</li>
                        <li class="active">Listado de Módulos</li>
                    </ol>
                    <h1><i class="<?= $rwModulo['imagen'] ?>"></i> <?= $rwModulo['nombre'] ?></h1>
                    <div class="options">
                        <div class="btn-toolbar">
                            <a href="g015_edicion_modulo.php" class="btn btn-primary" title="Agregar nuevo registro"><i class="fa fa-plus-circle"></i> Añadir Nuevo</a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-sky">
                                <div class="panel-heading">
                                    <h4>Listado de Modulos</h4>
                                </div>
                                <div class="panel-body collapse in">
                                    <table cellpadding="0" cellspacing="0" border="0"
                                           class="table table-striped table-bordered datatables" id="example">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Prefijo</th>
                                                <th>Icono</th>
                                                <th>Liga</th>
                                                <th>Orden</th>
                                                <th>Super Módulo</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                            $qrModulo = 'SELECT `id_modulo`, sys_modulos.`id_supermodulo`, sys_modulos.`liga`, sys_modulos.`nombre`, '
                                                    . ' sys_modulos.`prefijo`, sys_modulos.`orden`, sys_modulos.`descripcion`, '
                                                    . ' sys_modulos.`imagen`, sys_modulos.`hits`,sys_supermodulos.nombre '
                                                    . ' FROM `sys_modulos` '
                                                    . ' INNER JOIN sys_supermodulos ON sys_supermodulos.id_supermodulo=sys_modulos.id_supermodulo'
                                                    . ' WHERE 1 ';
                                            $rsModulo = $db->CacheExecute(120, $qrModulo)
                                                    or trigger_error($db->ErrorMsg(), E_USER_ERROR);
                                            if (!$rsModulo->EOF) {
                                                while (list($id_modulo, $id_supermodulo, $liga, $nombre,
                                                $prefijo, $orden, $descripcion, $imagen, $hits, $superModulo) = $rsModulo->FetchRow()) {
                                                    ?>
                                                    <tr class="odd gradeX" title="<?= $descripcion ?>">
                                                        <td><?= $id_modulo ?></td>
                                                        <td><?= $nombre ?></td>
                                                        <td><?= $prefijo ?></td>
                                                        <td><i class="<?= $imagen ?>"></i><span><?= $imagen ?></span></td>
                                                        <td><?= $liga ?></td>
                                                        <td><?= $orden ?></td>
                                                        <td><?= $superModulo ?></td>
                                                        <td class="center" nowrap>
                                                            <a href="g015_edicion_modulo.php?id_modulo=<?= $id_modulo ?>"
                                                               class="fa-stack fa-lg">
                                                                <i class="fa fa-edit fa-stack-1x"></i>
                                                            </a>
                                                        </td>
                                                    </tr><?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
            </div> <!--wrap -->
        </div> <!-- page-content -->
        <?php include 'snippets/footer_admin.php'; ?>
        <!--
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>!window.jQuery && document.write(unescape('%3Cscript src="assets/js/jquery-1.10.2.min.js"%3E%3C/script%3E'))</script>
        <script type="text/javascript">!window.jQuery.ui && document.write(unescape('%3Cscript src="assets/js/jqueryui-1.10.3.min.js'))</script>        -->
        <script type='text/javascript' src='assets/plugins/datatables/jquery.dataTables.min.js'></script>
        <script type='text/javascript' src='assets/plugins/datatables/dataTables.bootstrap.js'></script>
        <script type='text/javascript'>
            $(document).ready(function() {
                $('.datatables').dataTable({
                    "iDisplayLength": 5,
                    "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
                    "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
                    "sPaginationType": "bootstrap",
                    "oLanguage": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",", "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                });
                $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search...');
                $('.dataTables_length select').addClass('form-control');
            });</script>

    </body>
</html><?php ob_end_flush(); ?>