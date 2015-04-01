<?php
ob_start();
include 'includes/main.php';
include 'controller/Catalogo.php';
include 'model/load_catalog.php';
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
        <style >
            .error {

                color: red;
            }

        </style>
    </head>
    <body class="">
        <div id="page-container">
            <?php include 'snippets/header_admin.php'; ?>
            <div id="page-content">
                <div id='wrap'>
                    <div id="page-heading">
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="s000_panel.php"> Inicio</a></li>
                            <li><a href="g010_listado_catalogos.php?nombre_tabla=<?= $nombre_tabla ?>">Listado Catálogo</a></li>
                            <li class="active">Edición de Catálogo</li>
                        </ol>
                        <h1>Edita Registro</h1>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-orange">
                                    <form  action="" class="form-horizontal row-border" method="post" id="formCatalog" name="formCatalog">
                                        <input type="hidden" name="idcf" value="<?= $idcf ?>" id="idcf">
                                        <input type="hidden" name="nombre_tabla"
                                               value="<?= $nombre_tabla ?>">
                                        <div class="panel-heading">
                                            <h4>Edición de Registro</h4>
                                            <div class="options">
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Catálogo</label>
                                                        <div class="col-sm-6">
                                                            <?= $nombre_tabla ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Descripción</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $nombrenodo ?>" name="nombrenodo"
                                                                   title="Ingrese una descripción del registro"
                                                                   required placeholder="Ingrese la descripción del registro" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Identificador</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $identificadornodo ?>" name="identificadornodo"
                                                                   title="Ingrese el identificador"
                                                                   required placeholder="Ingrese el identificador del registro"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Caracteristica</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $caracteristica ?>" name="caracteristica"
                                                                   title="Ingrese una caracteristica del registro" required
                                                                   placeholder="Ingrese el Valor" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Fecha Efectiva</label>
                                                        <div class="col-sm-6">
                                                            <input name="fechaefectiva" type="text" class="form-control"
                                                                   id="fechaefectiva"
                                                                   value="<?= (empty($fechaefectiva)) ? date('Y-m-d') : $fechaefectiva ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Estatus</label>
                                                        <div class="col-sm-6">
                                                            <select name="estatus" class="form-control">
                                                                <option value="1" <?= (1 == $estatus) ? 'selected' : ''; ?>>Activo</option>
                                                                <option value="2">Inactivo</option>
                                                            </select>
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
                    </div>
                </div>
            </div>
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
                            url: 'model/add_catalog.php',
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