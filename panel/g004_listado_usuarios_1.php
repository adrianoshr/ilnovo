<?php
ob_start();
require 'includes/mainfile.php';
require 'controller/Catalogo.php';
ob_end_clean();
?>
<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'snippets/head_admin.php'; ?>
        <link rel='stylesheet' type='text/css' href='assets/plugins/datatables/dataTables.css' />
        <link rel='stylesheet' type='text/css' href='assets/plugins/form-markdown/css/bootstrap-markdown.min.css' />
        <link rel='stylesheet' type='text/css' href='assets/plugins/codeprettifier/prettify.css' />
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
                        <li><a href="#"><i class="<?= $rwModulo['imagen'] ?>"></i> Usuarios</a></li>
                        <li class="active">Listado de Usuarios</li>
                    </ol>
                    <h1><i class="<?= $rwModulo['imagen'] ?>"></i> <?= $rwModulo['nombre'] ?></h1>
                    <div class="options">
                        <div class="btn-toolbar">
                            <a href="g004_edita_usuario.php" class="btn btn-primary">
                                <i class="fa fa-plus-circle"></i>
                                Añadir Nuevo
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-sky">
                                <div class="panel-heading">
                                    <h4>Listado de Usuarios</h4>
                                </div>
                                <div class="panel-body collapse in">
                                    <table cellpadding="0" cellspacing="0" border="0"
                                           class="table table-striped table-bordered datatables" id="example">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Usuario</th>
                                                <th>Nombre</th>
                                                <th>Apeliidos</th>
                                                <th>E-mail</th>
                                                <th>Perfil</th>
                                                <th>Estado</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                            $nombre_tabla = $_REQUEST['nombre_tabla'];
                                            $qrCatalogos = 'SELECT DISTINCT u.id_usuario,u.nombreu,u.correo,datos.nombre,datos.ap,datos.am,'
                                                    . ' cfperfiles.nombrenodo,u.id_status'
                                                    . ' FROM sys_usuarios as u '
                                                    . ' LEFT JOIN datos ON u.id_usuario=datos.id_usuario'
                                                    . ' LEFT JOIN cfperfiles ON '
                                                    . ' u.id_perfil=cfperfiles.idcf'
                                                    . ' WHERE 1 ORDER BY idcf DESC LIMIT 1000';
                                            $rsCatalogos = $db->CacheExecute($qrCatalogos)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
                                            if (!$rsCatalogos->EOF) {
                                                while (list($id_usuario, $nombreu, $correo,
                                                $nombre, $ap, $am, $perfil, $estatus) = $rsCatalogos->FetchRow()) {
                                                    ?><tr class="odd gradeX">
                                                        <td><?= $id_usuario ?></td>
                                                        <td><?= $nombreu ?></td>
                                                        <td><?= $nombre ?></td>
                                                        <td><?= $ap . ' ' . $am ?></td>
                                                        <td><?= $correo ?></td>
                                                        <td><?= $perfil ?></td>
                                                        <td><?= (1 == $estatus) ? 'Activo' : 'Inactivo'; ?></td>
                                                        <td class="center" nowrap>
                                                            <a href="g004_edita_usuario.php?id_usuario=<?= $id_usuario ?>"
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
                </div> <!-- container -->
            </div> <!--wrap -->
        </div> <!-- page-content -->
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
            });</script>    </body>
</html>