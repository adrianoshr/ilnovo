<?php
ob_start();
include 'includes/mainfile.php';
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
        <style >
            .error {

                color: red;
            }
        </style>
    </head>
    <body class="">
        <div id="page-container">
            <?php
            include 'snippets/header_admin.php';
            include 'model/load_module.php';
            ?>
            <div id="page-content">
                <div id='wrap'>
                    <div id="page-heading">
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="s000_panel.php"> Inicio</a></li>
                            <li>Módulos</li>
                            <li class="active">Edición de Módulo</li>
                        </ol>
                        <h1><i class="<?= $rwModulo['imagen'] ?>"></i> Registro de Módulo</h1>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-orange">
                                    <form  action="" class="form-horizontal row-border" method="post"
                                           id="formModule" name="formModule">
                                        <input type="hidden" name="id_modulo" value="<?= $id_modulo ?>" id="id_module">

                                        <div class="panel-heading">
                                            <h4>Edición de Módulo</h4>
                                            <div class="options">
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Super Módulo</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control selectpicker show-tick" id="id_supermodulo"
                                                                    name="id_supermodulo" title="Seleccione un Super Módulo" required tabindex="1">
                                                                <option value="">Seleccione una Opción</option><?php
                                                                $oSuperModulo = new SuperModulo();
                                                                $arSuper = $oSuperModulo->Find('');
                                                                if (is_array($arSuper)) {
                                                                    foreach ($arSuper as $sModulo) {
                                                                        ?>
                                                                        <option value="<?= $sModulo->id_supermodulo; ?>"
                                                                                title="<?= $sModulo->descripcion; ?>"
                                                                                data-icon="<?= $sModulo->imagen; ?>"
                                                                                <?= ($id_supermodulo == $sModulo->id_supermodulo) ? 'selected' : ''; ?>>
                                                                            <?= $sModulo->nombre; ?></option><?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Nombre</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $nombre ?>" name="nombre"
                                                                   title="Ingrese un Nombre para el Módulo" tabindex="2"
                                                                   required placeholder="Ingrese Nombre para el Módulo" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Descripción</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="descripcion" class="form-control"
                                                                   placeholder="Descripción de la funcionalidad del módulo" tabindex="3"
                                                                   value="<?= $descripcion ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Icono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $imagen ?>" name="imagen"
                                                                   title="Ingrese el nombre del icono del font" tabindex="4" required
                                                                   placeholder="Ingrese el Valor ej. fa fa-bar-chart-o " class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Prefijo</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $prefijo ?>" name="prefijo"
                                                                   title="Ingrese el prefijo del Módulo" required tabindex="5"
                                                                   placeholder="Ingrese  el prefijo del Módulo ej. g001" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Link</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $liga ?>" name="liga"
                                                                   title="Ingrese el nombre del archivo principal" tabindex="6"
                                                                   required placeholder="Ingrese el Nombre del archivo principal ej. gooo-panel.php"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Orden</label>
                                                        <div class="col-sm-6">
                                                            <input type="number" value="<?= $orden ?>" name="orden"
                                                                   title="Ingrese el orden en que se lista el módulo" tabindex="7"
                                                                   required placeholder="Ingrese el orden en que se lista el módulo"
                                                                   class="form-control" min="1" max="100">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <div class="btn-toolbar">
                                                        <button class="btn-primary btn btn-label" tabindex="8"
                                                                type="submit" id="saveButton"><i class="fa fa-save"></i>
                                                            Guardar</button>
                                                        <button onclick="window.location = 'g015_listado_modulos.php'"
                                                                class="btn-default btn" tabindex="9">Cancelar</button>
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
        <script src="../assets/js/noty/js/noty/packaged/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script type="text/javascript">
                                                            $(document).ready(function() {
                                                                $("#formModule").validate({
                                                                    submitHandler: function() {
                                                                        $.ajax({
                                                                            type: "POST",
                                                                            url: 'model/edit_module.php',
                                                                            data: $('#formModule').serialize(),
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