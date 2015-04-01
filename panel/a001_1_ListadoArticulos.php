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
                        <li><a href="#"><i class="<?= $rwModulo['imagen'] ?>"></i>Articulos</a></li>
                        <li class="active">Listado</li>
                    </ol>
                    <h1><i class="<?= $rwModulo['imagen'] ?>"></i> <?= $rwModulo['nombre'] ?></h1>
                    <div class="options">
                        <div class="btn-toolbar">
                            <a href="a001_EditaArticulo.php" class="btn btn-primary">
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
                                                <th>id</th>
                                                <th>Titulo</th>
                                                <th>Fecha</th>
                                                <th>Imagen</th>
                                                <th>Sección</th>
                                                <th>Autor</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                            $idrol = $_SESSION['idrol'];
                                            $qrArticulos = 'SELECT DISTINCT articles.id_articulo,titulo,contenido,
                                                     fecha_alta,autor,articles.estado,imagenes_has_articulos.path,cfsecciones.nombrenodo
                                                     FROM articles LEFT JOIN articulos_has_secciones
                                                     ON articles.id_articulo=articulos_has_secciones.id_articulo
                                                     LEFT JOIN cfsecciones ON cfsecciones.idcf=articulos_has_secciones.id_seccion
                                                     LEFT JOIN imagenes_has_articulos
                                                     ON imagenes_has_articulos.id_articulo=articles.id_articulo
                                                     WHERE 1 GROUP BY articles.id_articulo ORDER BY fecha_alta DESC';
                                            $rsArticulos = $db->CacheExecute($qrArticulos)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
                                            if ($rsArticulos->EOF) {
                                                ?><tr class="gradeX">
                                                    <td colspan="4" class="center">No hay datos disponibles</td>
                                                </tr><?php
                                            } else {
                                                while (list($id_articulo, $titulo, $descripcion,
                                                $fechaAlta, $autor, $estado, $path, $seccion) = $rsArticulos->FetchRow()) {
                                                    ?><tr class="gradeA">
                                                        <td style="text-align:center;">
                                                            <a href="a001_EditaArticulo.php?id_articulo=<?= $id_articulo ?>">
                                                                <?= $id_articulo ?>
                                                            </a>
                                                        </td>
                                                        <td class="span4"><?= $titulo ?></td>
                                                        <td><?= $fechaAlta ?></td>
                                                        <td style="text-align:center;" >
                                                            <img  src="../files/articulos/medium/<?= $path ?>" style="max-width:150px;"/>
                                                        </td>
                                                        <td><?= $seccion ?></td>
                                                        <td><?= $autor ?></td>
                                                        <td><?= (1 == $estado) ? 'Activo' : 'Inactivo'; ?></td>
                                                        <td>
                                                            <a href="a001_EditaArticulo.php?id_articulo=<?= $id_articulo ?>"
                                                               class="fa-stack fa-lg">
                                                                <i class="fa fa-edit fa-stack-1x"></i></a>
                                                            <a href="#"  class="fa-stack fa-lg" onclick="delArticle(<?= $id_articulo ?>)">
                                                                <i class="fa fa-times-circle fa-stack-1x"></i></a>
                                                            <a href="../nota.php?id_articulo=<?= $id_articulo ?>" target="_blank"  class="fa-stack fa-lg" >
                                                                <i class="fa fa-share-square-o fa-stack-1x"></i></a></td>
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
            function delArticle(id_articulo)
            {
                $.ajax({
                    type: "POST",
                    url: 'a001_6_procesaBaja.php',
                    data: 'id_articulo=' + id_articulo,
                    dataType: 'script',
                    success: function (data) {
                        $('html, body').animate({scrollTop: 0}, 'slow');
                    }
                });
            }
            function confirmDelete(id_articulo)
            {
                $.ajax({
                    type: "POST",
                    url: 'a001_6_procesaBaja.php',
                    data: 'id_articulo=' + id_articulo + '&accion=ConfirmDel',
                    dataType: 'script',
                    success: function (data) {
                        $('html, body').animate({scrollTop: 0}, 'slow');
                        setTimeout("window.location='a001_1_ListadoArticulos.php'", 3000);
                    }
                });
            }
        </script>
    </body>
</html>