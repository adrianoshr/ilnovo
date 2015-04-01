<?php
ob_start();
include 'includes/mainfile.php';
//include 'controller/Policy.php';
include 'model/load_policy.php';
ob_end_clean();
ob_start('ob_gzhandler');
?><!DOCTYPE html>
<html lang="es-MX">
    <head><meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                            <li><a href="<?= $rwModulo['liga'] ?>">
                                    <i class="<?= $rwModulo['imagen'] ?>"></i> <?= $rwModulo['nombre'] ?>
                                </a></li>
                            <li class="active">Edición de Política</li>
                        </ol>
                        <h1>Registro de Política</h1>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-orange">
                                    <form  action="" class="form-horizontal row-border"
                                           method="post" id="formPolicy" name="formPolicy">
                                        <input type="hidden" name="id_policy" value="<?= $id_policy ?>"
                                               id="id_policy">
                                        <input type="hidden" name="startdate"
                                               value="<?= (empty($startDate)) ? date('Y-m-d') : $startDate; ?>">
                                        <input type="hidden" name="changedate"
                                               value="<?= date('Y-m-d') ?>">
                                        <div class="panel-heading">
                                            <h4>Edición de Política</h4>
                                            <div class="options"></div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Grupo</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" id="id_group"
                                                                    name="id_group" title="Seleccione un Grupo" required>
                                                                <option value="">Seleccione una Opción</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Titulo</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $title ?>" name="title"
                                                                   title="Ingrese una descripción de la Política"
                                                                   required
                                                                   placeholder="Ingrese Titulo de la política"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Variable</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $variable ?>" name="variable"
                                                                   title="Ingrese el nombre de la variable"
                                                                   required placeholder="Ingrese el Nombre de la Variable" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Valor</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $value ?>" name="value"
                                                                   title="Ingrese un Valor para la Variable" required
                                                                   placeholder="Ingrese el Valor de la Variable" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Descripción</label>
                                                        <div class="col-sm-6">
                                                            <textarea name="description" class="form-control"><?= $description ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Orden</label>
                                                        <div class="col-sm-6">
                                                            <input type="number" name="order_policy"
                                                                   class="form-control" min="1" max="1000"
                                                                   id="" placeholder="1"
                                                                   value="<?= (empty($order)) ? 1 : $order ?>" >
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
                                                        <button onclick="window.location = 'g003_listado_politicas.php'"
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
        <script src="../assets/js/noty/js/noty/packaged/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script type="text/javascript">
                                                            $(document).ready(function () {
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: "model/load_group_policy_Json.php",
                                                                    contentType: "application/json; charset=utf-8",
                                                                    dataType: "json",
                                                                    success: function (msg) {
                                                                        var datos = msg;
                                                                        $(datos).each(function () {
                                                                            var option = $(document.createElement('option'));
                                                                            option.text(this.label);
                                                                            option.val(this.id);
                                                                            $("#id_group").append(option);
                                                                            document.getElementById("id_group").value = '<?= (!empty($id_group)) ? $id_group : ''; ?>';
                                                                        });
                                                                    },
                                                                    error: function (msg) {
                                                                        $("#dvAlerta > span").text("Error al llenar el combo");
                                                                    }
                                                                });
                                                                $("#formPolicy").validate({
                                                                    submitHandler: function () {
                                                                        $.ajax({
                                                                            type: "POST",
                                                                            url: 'model/add_policy.php',
                                                                            data: $('#formPolicy').serialize(),
                                                                            dataType: 'script',
                                                                            success: function (data) {
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