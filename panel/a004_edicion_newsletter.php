<?php
ob_start();
include 'includes/mainfile.php';
require 'controller/Newsletter.php';
require 'model/load_newsletter.php';
//include 'controller/Policy.php';
//include 'model/load_policy.php';
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
                            <li class="active">Edición de Boletín</li>
                        </ol>
                        <h1>Registro de Boletín</h1>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-orange">
                                    <form  action="" class="form-horizontal row-border"
                                           method="post" id="formPolicy" name="formPolicy">
                                        <input type="hidden" name="id" value="<?= $id ?>"  id="id">
                                        <input type="hidden" id="de" name="de" value="NaN - Boletín de Noticias">
                                        <input type="hidden" id="fromail" name="fromail" value="newsletter@nanlaboratorios.com">
                                        <input type="hidden" id="fecha" name="fecha" value="<?= date('Y-m-d') ?>">
                                        <input type="hidden" id='estado' name="estado" value="<?= (false == $estado) ? 1 : $estado ?>">
                                        <div class="panel-heading">
                                            <h4>Edición de Boletín</h4>
                                            <div class="options"></div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Titulo</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $asunto ?>" class="form-control" id="asunto"
                                                                   name="asunto"  required title="Asunto"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Enviar a</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" id='emails' name='emails'>
                                                                <option value='1' <?= (1 == $emails) ? 'selected' : ''; ?>>Todos los Contactos</option>
                                                                <option value='2' <?= (2 == $emails or empty($emails) ) ? 'selected' : ''; ?>>Solo a uno especifico</option>
                                                            </select>
                                                            <input type="email" value="" class="form-control" id="correo" name="correo" title="Indique un email especifico" placeholder="Indique un email especifico"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-sm-1 control-label">Mensaje</label>
                                                        <div class="col-sm-12">
                                                            <textarea  name="contenido" id="contenido" required class="form-control"
                                                                       rows="8"><?= $contenido ?></textarea>
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
                                                            Guardar y Enviar</button>
                                                        <button onclick="window.location = 'a004_listadoNewsletter.php'"
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
        </div>
        <script src="assets/plugins/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="../assets/js/noty/js/noty/packaged/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script type="text/javascript">
                                                            tinymce.init({
                                                                selector: "textarea#contenido",
                                                                theme: "modern",
                                                                width: '600',
                                                                height: 300,
                                                                plugins: [
                                                                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                                                                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                                                                    "save table contextmenu directionality emoticons template paste textcolor"
                                                                ],
                                                                content_css: "css/content.css",
                                                                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                                                                style_formats: [
                                                                    {title: 'Bold text', inline: 'b'},
                                                                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                                                                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                                                                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                                                                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                                                                    {title: 'Table styles'},
                                                                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                                                                ]
                                                            });
        </script>
        <script type="text/javascript">
            $(function () {
                $(document).ready(function () {
                    $("#formPolicy").validate({
                        submitHandler: function () {
                            tinymce.triggerSave();
                            // your function if, validate is success
                            $.ajax({
                                type: "POST",
                                url: 'model/send_newsletter.php',
                                data: $('#formPolicy').serialize(),
                                dataType: 'script',
                                success: function (data) {
                                    $('html, body').animate({scrollTop: 0}, 'slow');
                                    $('#saveButton').html('Enviar Nuevamente');
                                },
                                error: function (data) {
                                    console.log(data);
                                    notyfy(
                                            {text: 'Ocurrio un Error al Intentar Envíar, por favor Verifique e Intente Nuevamente.',
                                                type: 'error'
                                            });
                                }
                            });
                        }
                    });
                });
            });</script>
    </body>
</html><?php ob_end_flush(); ?>