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
    <body class="">
        <?php include 'snippets/header_admin.php'; ?>
        <div id="page-content">
            <div id='wrap'>
                <div id="page-heading">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="s000_panel.php"> Inicio</a></li>
                        <li><a href="#"><i class="<?= $rwModulo['imagen'] ?>"></i>Galerias</a></li>
                        <li class="active">Listado</li>
                    </ol>
                    <h1><i class="<?= $rwModulo['imagen'] ?>"></i> <?= $rwModulo['nombre'] ?></h1>
                    <div class="options">
                        <div class="btn-toolbar">
                            <a href="a007_EditaGaleria.php" class="btn btn-primary">
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
                                    <h4>Listado</h4>
                                </div>
                                <div class="panel-body collapse in">
                                    <table cellpadding="0" cellspacing="0" border="0"
                                           class="table table-striped table-bordered datatables" id="example">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Fotos</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                            $idrol = $_SESSION['idrol'];
                                            $qrArticulos = 'SELECT scd_galerias.`id_galeria`, `nombre`, `fecha`,estado, '
                                                    . ' COUNT(scd_galeria_has_imagenes.id)'
                                                    . ' FROM `scd_galerias` '
                                                    . ' LEFT JOIN scd_galeria_has_imagenes '
                                                    . ' ON scd_galerias.id_galeria=scd_galeria_has_imagenes.id_galeria'
                                                    . ' WHERE 1 GROUP BY scd_galerias.`id_galeria`';
                                            $rsArticulos = $db->CacheExecute($qrArticulos)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
                                            if ($rsArticulos->EOF) {
                                                ?><tr class="gradeX">
                                                    <td colspan="4" class="center">No hay datos disponibles</td>
                                                </tr><?php
                                            } else {
                                                while (list($id_galeria, $nombre, $fecha, $estado, $fotos) = $rsArticulos->FetchRow()) {
                                                    ?><tr><td style="text-align:center;">
                                                            <a href="a007_EditaGaleria.php?id_galeria=<?= $id_galeria ?>" alt="_blank">
                                                                <?= $id_galeria ?></a>
                                                        </td>
                                                        <td class="span4">
                                                            <a href="../gallery.php?id_galeria=<?= $id_galeria ?>" target="_blank">
                                                                <?= $nombre ?></a></td>
                                                        <td><?= $fotos ?></td>
                                                        <td><?= $fecha ?></td>
                                                        <td ><?= (1 == $estado) ? 'Activo' : 'Inactivo'; ?></td>
                                                        <td ><a class="fa-stack fa-lg"
                                                                href="a007_EditaGaleria.php?id_galeria=<?= $id_galeria ?>"
                                                                title="Edita Galeria"><i class="fa fa-edit fa-stack-1x"></i>
                                                            </a><a class="fa-stack fa-lg" href="#" title="Eliminar"
                                                                   onClick="eliminaGaleria(<?= $id_galeria ?>)" data-type="confirm">
                                                                <i class="fa fa-times-circle fa-stack-1x"></i>
                                                            </a><?php
                                                                ?></td>
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
                <div class="clearfix"></div>
            </div>
        </div>
        <?php include 'snippets/footer_admin.php'; ?>
        <script type='text/javascript' src='assets/plugins/datatables/jquery.dataTables.min.js'></script>
        <script type='text/javascript' src='assets/plugins/datatables/dataTables.bootstrap.js'></script>
        <script src="../assets/js/noty/js/noty/packaged/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
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
        <script>
            function eliminaGaleria(id) {
                bootbox.confirm("¿Esta Seguro de Eliminar esta Galeria?", function (result) {
                    if (true === result) {
                        $.ajax({
                            type: "post",
                            url: 'a007_6_EliminaGaleria.php',
                            data: 'id=' + id,
                            dataType: 'script',
                            success: function (data) {
                                $('html, body').animate({scrollTop: 0}, 'slow');
                                setTimeout('window.location="a007_1_ListadoGalerias.php"', 2500);
                            },
                            error: function (data) {
                                noty({text: 'Ocurrio un Error al Intentar Guardar, Por Favor Verifique e Intente Nuevamente. <br> Nota: para incrustar un video utilice el la opción añadir video en el icono video.',
                                    type: 'error',
                                    timeout: 4000
                                });
                                console.log(data);
                            }
                        });
                    }
                });
            }
            $('#saveButton').click(function () {
                $('#saveButton').html('<i></i>Cargando..');
            });
        </script>
    </body>
</html>