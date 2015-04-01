<?php
ob_start();
include 'includes/main.php';
include 'controller/Modulo.php';

ob_end_clean();
ob_start('ob_gzhandler');
?>
<!DOCTYPE html>
<html lang="es-MX">
    <head><meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>.: Conexión BOOKLINE :.</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include 'snippets/head_admin.php'; ?>
        <link href="../js/select2/select2.css" rel="stylesheet" />
        <link href="../js/select2/bootstrap-select.css" rel="stylesheet">
    </head>
    <body class="">
        <div id="page-container">
            <?php include 'snippets/header_admin.php'; ?>
            <div id="page-content">
                <div id='wrap'>
                    <div id="page-heading">
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="s000_panel.php"> Inicio</a></li>
                            <li><a href="g002_listado_super_modulos.php">
                                    <i class="<?= $rwModulo['imagen'] ?>"></i>Listado</a></li>
                            <li class="active">Edición de Super Módulo</li>
                        </ol>
                        <h1><i class="<?= $rwModulo['imagen'] ?>"></i> Edita Registro</h1>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-orange">
                                    <?php include 'model/load_supermodulo.php'; ?>
                                    <form  action="" class="form-horizontal row-border" method="post" id="formCatalog" name="formCatalog">
                                        <input type="hidden" name="id_supermodulo" value="<?= $id_supermodulo ?>" id="id_supermodulo">
                                        <div class="panel-heading">
                                            <h4>Edición de Registro</h4>
                                            <div class="options">
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Nombre</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $nombre ?>" name="nombre"
                                                                   title="Ingrese una descripción del registro"
                                                                   required placeholder="Ingrese el nombre del registro" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Descripción</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $descripcion ?>" name="descripcion"
                                                                   title="Ingrese el identificador"
                                                                   required placeholder="Ingrese el identificador del registro"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Icono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $imagen ?>" name="imagen"
                                                                   title="Ingrese el nombre del icono del font" required
                                                                   placeholder="Ingrese el Valor" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Orden</label>
                                                        <div class="col-sm-6">
                                                            <input type="number" name="orden" min="1" max="100" value="<?= $orden ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <div class="btn-toolbar">
                                                        <button class="btn-primary btn btn-label"
                                                                type="submit" id="saveButton"><i class="fa fa-save"></i>
                                                            Guardar</button>
                                                        <button onclick="window.location = 'g010_listado_catalogos.php?nombre_tabla=<?= $nombre_tabla ?>'"
                                                                class="btn-default btn">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->
                </div> <!--wrap -->
            </div> <!-- page-content -->
            <?php include 'snippets/footer_admin.php'; ?>
        </div> <!-- page-container -->
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script type='text/javascript' src='assets/plugins/form-datepicker/js/bootstrap-datepicker.js'></script>
        <script src="../assets/js/noty/js/noty/packaged/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script type="text/javascript">
                                                            $(document).ready(function() {
                                                                $('#fechaefectiva').datepicker({format: 'yyyy-mm-dd'});
                                                                $("#formCatalog").validate({
                                                                    submitHandler: function() {
                                                                        $.ajax({
                                                                            type: "POST",
                                                                            url: 'model/add_supermodulo.php',
                                                                            data: $('#formCatalog').serialize(),
                                                                            dataType: 'script',
                                                                            success: function(data) {
                                                                                $('html, body').animate({scrollTop: 0}, 'slow');
                                                                                $('#saveButton').html('Guardando');
                                                                            }
                                                                        });
                                                                    }
                                                                });
                                                            });
        </script>
    </body>
</html><?php ob_end_flush(); ?>