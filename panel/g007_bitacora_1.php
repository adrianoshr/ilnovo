<?php
ob_start();
require 'includes/mainfile.php';
require 'controller/Catalogo.php';
ob_end_clean();
?><!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'snippets/head_admin.php'; ?>
        <link rel='stylesheet' type='text/css' href='assets/plugins/datatables/dataTables.css' />
        <link rel='stylesheet' type='text/css' href='assets/plugins/form-markdown/css/bootstrap-markdown.min.css' />
        <link rel='stylesheet' type='text/css' href='assets/plugins/codeprettifier/prettify.css' />
    </head>
    <body class=""><?php include 'snippets/header_admin.php'; ?>
        <div id="page-content">
            <div id='wrap'>
                <div id="page-heading">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="s000_panel.php"> Inicio</a></li>
                        <li><a href="#"><i class="<?= $rwModulo['imagen'] ?>"></i>Bitácora</a></li>
                        <li class="active">Listado</li>
                    </ol>
                    <h1><i class="<?= $rwModulo['imagen'] ?>"></i> Bitácora</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-sky">
                                <div class="panel-body collapse in">
                                    <table cellpadding="0" cellspacing="0" border="0"
                                           class="table table-striped table-bordered datatables" id="example">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Evento</th>
                                                <th>Usuario</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>IP</th>
                                                <th>Datos</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                            $qrCatalogos = 'SELECT id,fecha,hora,datos,nombreu,cfeventos.nombrenodo,ip'
                                                    . ' FROM binnacles '
                                                    . ' INNER JOIN sys_usuarios'
                                                    . ' ON sys_usuarios.id_usuario=binnacles.id_usuario '
                                                    . ' INNER JOIN cfeventos '
                                                    . ' ON cfeventos.idcf=binnacles.id_evento '
                                                    . ' WHERE 1 ORDER BY fecha DESC LIMIT 1000';
                                            $rsCatalogos = $db->Execute($qrCatalogos)
                                                    or trigger_error($db->ErrorMsg(), E_USER_ERROR);
                                            if (!$rsCatalogos->EOF) {
                                                while (list($id, $fecha, $hora, $datos, $nombreu, $evento, $ip ) = $rsCatalogos->FetchRow()) {
                                                    ?><tr class="odd gradeX">
                                                        <td><?= $id ?></td>
                                                        <td><?= $evento ?></td>
                                                        <td><?= $nombreu ?></td>
                                                        <td nowrap><?= $fecha ?></td>
                                                        <td><?= $hora ?></td>
                                                        <td><?= $ip ?></td>
                                                        <td><?= $datos ?></td>
                                                    </tr><?php
                                                }
                                            }
                                            ?></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><?php include 'snippets/footer_admin.php'; ?>
        <script type='text/javascript' src='assets/plugins/datatables/jquery.dataTables.min.js'></script>
        <script type='text/javascript' src='assets/plugins/datatables/dataTables.bootstrap.js'></script>
        <script type='text/javascript'>
            $(document).ready(function () {
                $('.datatables').dataTable({
                    "iDisplayLength": 5,
                    "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
                    "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
                    "sPaginationType": "bootstrap",
                    "aaSorting": [[3, 'desc'], [4, 'desc']],
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
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
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
            });</script></body></html>