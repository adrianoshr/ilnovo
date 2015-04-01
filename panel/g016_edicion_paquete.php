<?php
ob_start();
include 'includes/mainfile.php';
include 'controller/Catalogo.php';
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
        <div id="page-container"><?php
            include 'snippets/header_admin.php';
            include 'model/load_paquete.php';
            ?>
            <div id="page-content">
                <div id='wrap'>
                    <div id="page-heading">
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="s000_panel.php"> Inicio</a></li>
                            <li><i class="<?= $rwModulo['imagen'] ?>"></i> <?= $rwModulo['nombre'] ?></li>
                            <li class="active">Edición de Paquete</li>
                        </ol>
                        <h1><i class="<?= $rwModulo['imagen'] ?>"></i> <?= $rwModulo['nombre'] ?></h1>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-orange">
                                    <form  action="" class="form-horizontal row-border" method="post"
                                           id="formModule" name="formModule">
                                        <input type="hidden" name="idcf" value="<?= $idcf ?>" id="idcf">
                                        <input type="hidden" name="estatus" value="1">
                                        <input type="hidden" name="fechaefectiva" value="<?= (empty($fechaefectiva)) ? date('Y-m-d') : $fechaefectiva ?>">
                                        <input type="hidden" name="identificadornodo" value="<?= (empty($identificadornodo)) ? '0' : $identificadornodo ?>">
                                        <div class="panel-heading">
                                            <h4>Edición de Paquete</h4>
                                            <div class="options">
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Paquete</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $nombrenodo ?>" name="nombrenodo"
                                                                   title="Ingrese un Nombre para el Paquete" tabindex="2"
                                                                   required placeholder="Ingrese Nombre para el Paquetes" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Perfil</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control selectpicker show-tick" id="id_perfil"
                                                                    name="id_perfil" title="Seleccione un Super Módulo" required tabindex="1">
                                                                <option value="">Seleccione una Opción</option><?php
                                                                $oPaqueteHasPerfil = new PaqueteHasPerfil();
                                                                $res = $oPaqueteHasPerfil->Load("id_paquete='$idcf'");
                                                                $id_perfil = $oPaqueteHasPerfil->id_perfil;
                                                                $oPerfil = new Catalogo('cfperfiles');
                                                                $arSuper = $oPerfil->Find('estatus=1');
                                                                if (is_array($arSuper)) {
                                                                    foreach ($arSuper as $sPerfil) {
                                                                        ?>
                                                                        <option value="<?= $sPerfil->idcf; ?>"
                                                                                title="<?= $sPerfil->caracteristica; ?>"
                                                                                <?= ($id_perfil == $sPerfil->idcf) ? 'selected' : ''; ?>>
                                                                            <?= $sPerfil->nombrenodo; ?></option><?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Precio</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="caracteristica" class="form-control"
                                                                   placeholder="Descripción de la funcionalidad del módulo" tabindex="3"
                                                                   value="<?= $caracteristica ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
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
                                                        <button onclick="window.location = 'g016_listado_paquetes.php'"
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
                                                                            url: 'model/add_package.php',
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