<?php
include('includes/mainfile.php');
?><!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'snippets/head_admin.php'; ?>
        <link rel='stylesheet' type='text/css' href='assets/plugins/datatables/dataTables.css' />
    </head>
    <body class="">
        <?php include 'snippets/header_admin.php'; ?>
        <div id="page-content">
            <div id='wrap'>
                <div id="page-heading">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="s000_panel.php"> Inicio</a></li>
                        <li><a href="<?= $rwModulo['liga'] ?>">
                                <i class="<?= $rwModulo['imagen'] ?>"></i> <?= $rwModulo['nombre'] ?>
                            </a></li>
                        <li class="active">Listado de Políticas</li>
                    </ol>
                    <h1><i class="<?= $rwModulo['imagen'] ?>"></i> <?= $rwModulo['nombre'] ?></h1>
                    <div class="options">
                        <div class="btn-toolbar">

                            <a href="g003_edicion_politicas.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Añadir Nuevo</a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-sky">
                                <div class="panel-heading">
                                    <h4>Listado de Políticas</h4>
                                </div>
                                <div class="panel-body collapse in">
                                    <table cellpadding="0" cellspacing="0" border="0"
                                           class="table table-striped table-bordered datatables" id="example">
                                        <thead>
                                            <tr>
                                                <th>Grupo</th>
                                                <th>Titulo</th>
                                                <th>Variable</th>
                                                <th>Valor</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                            $qrPolitica = 'SELECT id_policy,sys_policiesgroup.title,sys_policies.title,variable,value,'
                                                    . ' sys_policies.order_policy,startDate,changeDate,sys_policies.description '
                                                    . ' FROM sys_policies INNER JOIN sys_policiesgroup '
                                                    . ' ON sys_policies.id_group=sys_policiesgroup.id_group '
                                                    . ' WHERE 1 ORDER BY sys_policiesgroup.id_group ASC, '
                                                    . ' sys_policies.order_policy ASC';
                                            $rsPolicies = $db->CacheExecute(120, $qrPolitica)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
                                            if (!$rsPolicies->EOF) {
                                                while (list($id_policy, $grupo, $title, $variable, $value, $order, $startDate,
                                                $changeDate, $description) = $rsPolicies->FetchRow()) {
                                                    ?><tr class="odd gradeX">
                                                        <td><?= $grupo ?></td>
                                                        <td><?= $title ?></td>
                                                        <td><?= $variable ?></td>
                                                        <td><?= $value ?></td>
                                                        <td class="center" nowrap>
                                                            <a href="g003_edicion_politicas.php?id_policy=<?= $id_policy ?>"
                                                               class="fa-stack fa-lg">
                                                                <i class="fa fa-edit fa-stack-1x"></i></a></td>
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
        </div>
        <?php include 'snippets/footer_admin.php'; ?>
        <script type='text/javascript' src='assets/plugins/datatables/jquery.dataTables.min.js'></script>
        <script type='text/javascript' src='assets/plugins/datatables/dataTables.bootstrap.js'></script>
        <script type='text/javascript'>
            $(document).ready(function () {
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
            });</script>
    </body></html>