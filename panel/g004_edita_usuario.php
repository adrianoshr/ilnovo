<?php
ob_start();
require 'includes/mainfile.php';
require 'controller/Catalogo.php';
ob_end_clean();
ob_start('ob_gzhandler');
?><!DOCTYPE html>
<html lang="es-MX">
    <head><meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $system_name ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include 'snippets/head_admin.php'; ?>
        <link href="../js/select2/select2.css" rel="stylesheet" />
        <link href="../js/select2/bootstrap-select.css" rel="stylesheet">
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body class="">
        <div id="page-container"><?php
            include 'snippets/header_admin.php';
            include 'model/load_user.php';
            ?><div id="page-content">
                <div id='wrap'>
                    <div id="page-heading">
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="s000_panel.php"> Inicio</a></li>
                            <li><i class="<?= $rwModulo['imagen'] ?>"></i> <?= $rwModulo['nombre'] ?></li>
                            <li class="active">Edición de Cliente</li>
                        </ol>
                        <h1><i class="<?= $rwModulo['imagen'] ?>"></i> <?= $rwModulo['nombre'] ?></h1>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-brown">
                                    <form  action="" class="form-horizontal row-border" method="post" id="formCustomer" name="formCustomer">
                                        <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>" id="id_usuario">
                                        <input type="hidden" name="newsletter" value="<?= (empty($newsletter)) ? '1' : $newsletter; ?>" id="newsletter">
                                        <input type="hidden" name="llave" value="0" id="llave">
                                        <div class="panel-heading">
                                            <h4>Edición Datos del Cliente</h4>
                                            <div class="options">
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Nombre de Usuario</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $nombreu ?>" name="nombreu"
                                                                   title="Ingrese su nombre de Usuario de sesión" required
                                                                   placeholder="Ingrese su nombre de Usuario de sesión" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Contraseña</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" value="" name="newPassword"
                                                                   title="Ingrese una contraseña"
                                                                   placeholder="Deje Vacio si no desea modificar la contraseña" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">E-Mail</label>
                                                        <div class="col-sm-6">
                                                            <input type="email" value="<?= $correo ?>" name="correo"
                                                                   title="Ingrese una dirección de correo valida" required=""
                                                                   placeholder="ingrese una cuenta de e-mail" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Estatus</label>
                                                        <div class="col-sm-6">
                                                            <select name="id_status" class="form-control" id="id_status">
                                                                <option value="1" <?= (1 == $id_status) ? 'selected' : '' ?>>Activo
                                                                </option>
                                                                <option value="2" <?= (1 != $id_status) ? 'selected' : '' ?>>Inactivo
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Perfil</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control selectpicker show-tick" id="id_perfil"
                                                                    name="id_perfil" title="Seleccione un Super Módulo" required tabindex="1">
                                                                <option value="">Seleccione una Opción</option><?php
                                                                $id_perfil = (false == $id_perfil) ? 4 : $id_perfil;
                                                                $oPerfil = new Catalogo('cfperfiles');
                                                                $arSuper = $oPerfil->Find('estatus=1');
                                                                if (is_array($arSuper)) {
                                                                    foreach ($arSuper as $sPerfil) {
                                                                        ?><option value="<?= $sPerfil->idcf; ?>"
                                                                                title="<?= $sPerfil->caracteristica; ?>"
                                                                                <?= ($id_perfil == $sPerfil->idcf) ? 'selected' : ''; ?>>
                                                                                    <?= $sPerfil->nombrenodo; ?>
                                                                        </option><?php
                                                                    }
                                                                }
                                                                ?></select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Nombre</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $nombre ?>" name="nombre"
                                                                   title="Ingrese el nombre del cliente"
                                                                   required placeholder="Ingrese el Nombre del Cliente" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Apellido Paterno</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $ap ?>" name="ap"
                                                                   title="Ingrese el Apellido Paterno"
                                                                   required placeholder="Ingrese el Apellido Paterno" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Apellido Materno</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $am ?>" name="am"
                                                                   title="Ingrese el Apellido Materno"
                                                                   required placeholder="Ingrese el Apellido Materno" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Género </label>
                                                        <div class="col-sm-6">
                                                            <div class="radio">
                                                                <input name="id_sexo" id="Masculino" value="1"
                                                                       type="radio" tabindex="6" <?= (1 == $id_sexo) ? 'checked' : '' ?>>
                                                                <label for="Masculino"><span></span>Masculino</label>
                                                            </div>
                                                            <div class="radio">
                                                                <input  name="id_sexo" id="Femenino" value="2"
                                                                        type="radio" tabindex="7" <?= (1 != $id_sexo) ? 'checked' : '' ?>>
                                                                <label for="Femenino"><span></span>Femenino</label>
                                                            </div>
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
                                                        <button onclick="window.location = 'c001_listado.php'"
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
            </div><?php include 'snippets/footer_admin.php'; ?>
        </div>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="../assets/js/noty/js/noty/packaged/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script type="text/javascript">
                                                            $(document).ready(function () {
                                                                $("#formCustomer").validate({
                                                                    submitHandler: function () {
                                                                        $.ajax({
                                                                            type: "POST",
                                                                            url: 'model/edit_user.php',
                                                                            data: $('#formCustomer').serialize(),
                                                                            dataType: 'script',
                                                                            success: function (data) {
                                                                                $('html, body').animate({scrollTop: 0}, 'slow');
                                                                                $('#saveButton').html('Guardando');

                                                                            }
                                                                        });
                                                                    }
                                                                });
                                                            });</script></body></html><?php ob_end_flush(); ?>