<?php
include('includes/mainfile.php');
include 'controller/Modulo.php';
ob_start('ob_gzhandler');
?>
<!DOCTYPE html>
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
                        <li><a href="g006_listado_perfil.php">Perfiles</a></li>
                        <li class="active">Accesos y Privilegios</li>
                    </ol>
                    <h1><i class="<?= $rwModulo['imagen'] ?>"></i> <?= $rwModulo['nombre'] ?></h1>
                    <div class="options">
                        <div class="btn-toolbar">
                            <a href="g015_edicion_modulo.php" class="btn btn-primary"
                               title="Agregar nuevo registro">Añadir Nuevo</a>
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
                                                <th>Activar</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                            $idcf = $_REQUEST['idcf'];
                                            $qrModulo = 'SELECT sys_modulos.`id_modulo`, `id_supermodulo`, `liga`, `nombre`, '
                                                    . '`prefijo`, `orden`, `descripcion`, `imagen`, `hits` '
                                                    . ' FROM `sys_modulos` '
                                                    . " WHERE 1 "
                                                    . ' GROUP BY sys_modulos.`id_modulo` ';
                                            $rsModulo = $db->CacheExecute(120, $qrModulo)
                                                    or trigger_error($db->ErrorMsg(), E_USER_ERROR);
                                            if (!$rsModulo->EOF) {
                                                while (list($id_modulo, $id_supermodulo, $liga, $nombre,
                                                $prefijo, $orden, $descripcion, $imagen, $hits) = $rsModulo->FetchRow()) {
                                                    $oModulo = new ModuloHasPerfiles();
                                                    $id = $oModulo->Load("id_perfil='$idcf' AND id_modulo='$id_modulo' ");
                                                    ?><tr class="odd gradeX">
                                                        <td><?= $id_modulo ?></td>
                                                        <td><?= $nombre ?></td>
                                                        <td><?= $prefijo ?></td>
                                                        <td><i class="<?= $imagen ?>"></i><span><?= $imagen ?></span></td>
                                                        <td><?= $descripcion ?></td>
                                                        <td><?= $orden ?></td>
                                                        <td class="center" nowrap>
                                                            <input type="checkbox" id="<?= $prefijo ?>" name="permisos[]"
                                                                   value="<?= $id_modulo ?>" class="form-control"
                                                                   <?= (true == $id) ? 'checked' : '' ?>
                                                                   onclick="addAccess('<?= $idcf ?>', '<?= $id_modulo ?>', '<?= $prefijo ?>')">
                                                        </td>
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
        <script src="../assets/js/noty/js/noty/packaged/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script type='text/javascript' src='assets/plugins/datatables/jquery.dataTables.min.js'></script>
        <script type='text/javascript' src='assets/plugins/datatables/dataTables.bootstrap.js'></script>
        <script type='text/javascript'>
                                                               $(document).ready(function () {
                                                                   $('.datatables').dataTable({
                                                                       "iDisplayLength": 10,
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
                                                                           "sInfoThousands": ", ",
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
                                                               });
                                                               function addAccess(id_perfil, id_modulo, prefijo) {
                                                                   var check = document.getElementById(prefijo).checked;
                                                                   $.ajax({
                                                                       type: "POST",
                                                                       url: 'model/edit_access.php',
                                                                       data: 'id_perfil=' + id_perfil + '&id_modulo=' + id_modulo +
                                                                               '&add=' + check,
                                                                       dataType: 'script',
                                                                       success: function (data) {
                                                                           $('html, body').animate({scrollTop: 0}, 'slow');
                                                                           $('#saveButton').html('Guardando');
                                                                       }
                                                                   });
                                                               }</script>
    </body>
</html><?php ob_end_flush(); ?>