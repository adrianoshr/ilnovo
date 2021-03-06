<?php
ob_start();
include 'includes/mainfile.php';
include 'controller/Galeria.php';
ob_end_clean();
ob_start('ob_gzhandler');
?><!DOCTYPE html>
<html lang="es-MX">
    <head><meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>.: <?= $system_name ?> :.</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include 'snippets/head_admin.php'; ?>
        <style>
            .error {

                color: red;
            }
        </style>
        <link href="assets/plugins/form-select2/select2.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <div id="page-container"><?php
        include 'snippets/header_admin.php';
        include 'model/load_gallery.php';
        ?><div id="page-content">
            <div id='wrap'>
                <div id="page-heading">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="s000_panel.php"> Inicio</a></li>
                        <li>Galeria</li>
                        <li class="active">Edición de Galeria</li>
                    </ol>
                    <h1><i class="<?= $rwModulo['imagen'] ?>"></i> Edición de Galeria</h1>
                </div>
                <div class="container">
                    <ul class="nav nav-tabs" role="tablist" id="Panel_Tab">
                        <li class="active"><a href="#productos" role="tab" data-toggle="tab">Galeria</a></li>
                        <li><a href="#imagen" role="tab" data-toggle="tab">Imágenes</a></li>
                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content">
                                <div class="tab-pane active" id="productos">
                                    <form class="form-horizontal row-border" style="margin: 0;" name="editArticle" id='editArticle' >
                                        <input type="hidden" name="fecha_alta" value="<?= (false == $fecha_alta) ? date('Y-m-d') : $fecha_alta ?>">
                                        <input type="hidden" name="fecha_edicion" value="<?= (false == $fecha_alta) ? date('Y-m-d') : $fecha_alta ?>">
                                        <input type="hidden" name="id_usuario" value="<?= $_SESSION['g000_id_usuario'] ?>">
                                        <input type="hidden" name="id_galeria" value="<?= $id_galeria ?>">
                                        <div class="panel-heading">
                                            <h4>Edición de Galeria</h4>
                                            <div class="options"></div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Nombre Galeria*</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" value="<?= $nombre ?>" class="form-control" id="nombre"
                                                                   name="nombre"  required title="Titulo del Galeria"/></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Descripción</label>
                                                        <div class="col-sm-6">
                                                            <textarea id="descripcion" name="descripcion"
                                                                      class="form-control" rows="2"
                                                                      placeholder="Descripción de la galeria"><?= $descripcion ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Estado*</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control selectpicker show-tick" id='estado' name='estado'>
                                                                <option value='1'
                                                                        <?= (1 == $idStatus or empty($idStatus)) ? 'selected' : ''; ?>>
                                                                    Activo</option>
                                                                <option value='2' <?= (2 == $idStatus ) ? 'selected' : ''; ?>>
                                                                    Inactivo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="separator line bottom"></div>
                                            <div class="separator line bottom"></div>
                                        </div>
                                        <div id="fotos-producto"></div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="imagen">
                                    <div style="margin-top:20px;"></div>
                                    <form action="model/p001_images_do.php" class="dropzone" id="my-awesome-dropzone"></form>
                                    <div id="actions" class="row">

                                        <div class="col-lg-7">
                                            <span class="btn btn-default fileinput-button">
                                                <i class="glyphicon glyphicon-plus"></i>
                                                <span>Agregar Archivos</span>
                                            </span>
                                            <button type="submit" class="btn btn-primary start" style="display:none;">
                                                <i class="glyphicon glyphicon-upload"></i>
                                                <span>Cargar Todas</span>
                                            </button>
                                            <button type="reset" class="btn btn-warning cancel" style="display:none;">
                                                <i class="glyphicon glyphicon-ban-circle"></i>
                                                <span>Cancel upload</span>
                                            </button>
                                        </div>
                                        <div class="col-lg-5">
                                            <span class="fileupload-process">
                                                <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="table table-striped" class="files" id="previews">
                                        <div id="template" class="file-row">
                                            <div>
                                                <span class="preview"><img data-dz-thumbnail /></span>
                                            </div>
                                            <div>
                                                <p class="name" data-dz-name></p>
                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                            </div>
                                            <div>
                                                <p class="size" data-dz-size></p>
                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                </div>
                                            </div>
                                            <div >
                                                <button class="btn btn-primary start">
                                                    <i class="glyphicon glyphicon-upload"></i>
                                                    <span>Cargar</span>
                                                </button>
                                                <button data-dz-remove class="btn btn-warning cancel">
                                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                                    <span>Cancelar</span>
                                                </button>
                                                <button data-dz-remove class="btn btn-danger delete">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    <span>Eliminar</span>
                                                </button>
                                            </div>
                                            <div class="clear-fix"></div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Cortar imagen</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Por favor, seleccionar el area a cortar para la imagen.</p>
                                                    <div class="row">
                                                        <div class="span12">
                                                            <div style="width:100%;">
                                                                <img src="" id="m" style="height:auto !important; max-width:100%;" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" id="btn-cortar-imagen">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form id="form-cortar" class="coords" action="model/p001_cortar_do.php" method="post">
                                        <input type="hidden" id="x1" name="x1" />
                                        <input type="hidden" id="y1" name="y1" />
                                        <input type="hidden" id="x2" name="x2" />
                                        <input type="hidden" id="y2" name="y2" />
                                        <input type="hidden" id="w" name="w" />
                                        <input type="hidden" id="h" name="h" />
                                        <input type="hidden" id="campo-imagen" name="imagen" />
                                    </form>
                                    <div id="lista-fotos-actuales">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="resultado-foto"></div>
                                </div>
                                <div class="form-actions" style="margin: 0;">
                                    <button type="button" id="btnSave"
                                            class="btn-primary btn btn-label"><i class="fa fa-save"></i>Guardar Cambios</button>
                                    <button type="button" class="btn btn-icon btn-default glyphicons circle_remove" onClick="window.location = 'a001_1_ListadoGaleria.php';"><i></i>Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><?php include 'snippets/footer_admin.php'; ?>
</div>
<script src="<?= PATH; ?>panel/assets/js/dropzone.js"></script>
<script src="<?= PATH; ?>panel/assets/js/jquery.h5validate.js"></script>
<script src="<?= PATH; ?>panel/assets/plugins/jcrop/js/jquery.Jcrop.js"></script>
<script src="assets/plugins/form-select2/select2.min.js" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="../assets/js/noty/js/noty/packaged/jquery.noty.packaged.min.js" type="text/javascript"></script>
<script type="text/javascript">
                                        $(function () {
                                            $(document).ready(function () {
                                                $("#btnSave").click(function () {
                                                    //tinymce.triggerSave();
                                                    $.ajax({
                                                        type: "POST",
                                                        url: 'model/edit_gallery.php',
                                                        data: $('#editArticle').serialize(),
                                                        dataType: 'script',
                                                        success: function (data) {
                                                            $('html, body').animate({scrollTop: 0}, 'slow');
                                                            setTimeout("window.location='a007_1_ListadoGalerias.php'", 3000);
                                                        }
                                                    });
                                                });
                                            });
                                        });
                                        var arrayFotos = new Array();
                                        function showCoords(c)
                                        {
                                            jQuery('#x1').val(c.x);
                                            jQuery('#y1').val(c.y);
                                            jQuery('#x2').val(c.x2);
                                            jQuery('#y2').val(c.y2);
                                            jQuery('#w').val(c.w);
                                            jQuery('#h').val(c.h);
                                        }
                                        var previewNode = document.querySelector("#template");
                                        previewNode.id = "";
                                        var previewTemplate = previewNode.parentNode.innerHTML;
                                        previewNode.parentNode.removeChild(previewNode);
                                        var myDropzone = new Dropzone(document.body, {
                                            url: "model/p001_images_do.php", // Set the url
                                            thumbnailWidth: 80,
                                            thumbnailHeight: 80,
                                            parallelUploads: 20,
                                            uploadMultiple: false,
                                            previewTemplate: previewTemplate,
                                            autoQueue: false,
                                            previewsContainer: "#previews",
                                            clickable: ".fileinput-button"
                                        });
                                        myDropzone.on("addedfile", function (file) {
                                            // Hookup the start button
                                            file.previewElement.querySelector(".start").onclick = function () {
                                                myDropzone.enqueueFile(file);
                                            };
                                        });
                                        // Update the total progress bar
                                        myDropzone.on("totaluploadprogress", function (progress) {
                                            document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
                                        });
                                        myDropzone.on("sending", function (file) {
                                            // Show the total progress bar when upload starts
                                            document.querySelector("#total-progress").style.opacity = "1";
                                            // And disable the start button
                                            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
                                        });
                                        // Hide the total progress bar when nothing's uploading anymore
                                        myDropzone.on("queuecomplete", function (progress) {
                                            document.querySelector("#total-progress").style.opacity = "0";
                                        });
                                        myDropzone.on("success", function (data, response) {
                                            //myDropzone.removeAllFiles();
                                            cargarModal(response.nombre, response.iWidth, response.iHeight);
                                        });
                                        var jcrop_api;
                                        var JcropAPI = null;
                                        var nombreImagen = "";
                                        function cargarModal(imagen, width, height) {
                                            nombreImagen = imagen;
                                            if (!$('#myModal').hasClass('in')) {
                                                if (JcropAPI != null) {
                                                    jcrop_api.destroy();
                                                }
                                                $('#myModal').modal({backdrop: 'static', keyboard: false});
                                                $('#myModal').modal('show');
                                                $("#m").attr("src", "<?= PATH; ?>files/articulos/original/" + imagen).css("max-width", "100%");
                                                $("#campo-imagen").val(imagen);
                                                setTimeout(function () {
                                                    JcropAPI = $("#m").Jcrop({
                                                        bgColor: 'black',
                                                        bgOpacity: .4,
                                                        trueSize: [width, height],
                                                        setSelect: [0, 0, 800, 400],
                                                        aspectRatio: 800 / 400,
                                                        onChange: showCoords,
                                                        onSelect: showCoords
                                                    }, function () {
                                                        jcrop_api = this;
                                                    });
                                                }, 500);
                                            }
                                        }
                                        document.querySelector("#actions .start").onclick = function () {
                                            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
                                        };
                                        document.querySelector("#actions .cancel").onclick = function () {
                                            myDropzone.removeAllFiles(true);
                                        };
                                        $("#lista-fotos-actuales").on("click", ".btn-eliminar", function () {
                                            $(this).parent().slideUp("slow");
                                            $(this).parent().parent().find(".seguro").slideDown();
                                        });
                                        $("#lista-fotos-actuales").on("click", ".btn-eliminar-no", function () {
                                            $(this).parent().parent().find(".eliminar").slideDown();
                                            $(this).parent().slideUp("slow");
                                        });
                                        $("#btn-cortar-imagen").on("click", function (e) {
                                            e.preventDefault();
                                            $.post('model/p001_cortar_do.php', $("#form-cortar").serialize(), function (data, textStatus, xhr) {
                                                nombreImagen = data.nombre;
                                                $("#myModal").modal("hide");
                                                jcrop_api.destroy();
                                                jcrop_api.disable();
                                                insertarImagen(nombreImagen, -1);
                                            });
                                        });
                                        $("#lista-fotos-actuales").on("click", ".btn-eliminar-si", function () {
                                            var idImage = $(this).data("id");
                                            var nombreImagen = $(this).data("nombreImagen");
                                            remove(nombreImagen);
                                            recargarFotosHidden();
                                            $.post('model/p001_eliminar_imagen.php', {idImage: idImage, nombreImagen: nombreImagen}, function (data, textStatus, xhr) {
                                                $("#resultado-foto").html(data);
                                            });
                                            $(this).parent().parent().parent().slideUp("slow");
                                        });
                                        function CKupdate() {
                                            for (instance in CKEDITOR.instances)
                                                CKEDITOR.instances[instance].updateElement();
                                        }
                                        function remove(item) {
                                            for (var i = arrayFotos.length; i--; ) {
                                                if (arrayFotos[i] === item) {
                                                    arrayFotos.splice(i, 1);
                                                }
                                            }
                                        }
                                        function recargarFotosHidden() {
                                            var index;
                                            $("#fotos-producto").html("");
                                            for (index = 0; index < arrayFotos.length; ++index) {
                                                $("#fotos-producto").append('<input type="hidden" name="fotos[]" value="' + arrayFotos[index] + '" />');
                                            }
                                        }
                                        function insertarImagen(imagen, id) {

                                            var foto = '<br><div class="foto"><img src="../files/articulos/medium/' + imagen + '" alt="' + imagen + '" class="img-thumbnail">  <span class="controles"><div class="eliminar"><a href="#" class="btn btn-danger btn-eliminar">Eliminar</a></div><div class="seguro" style="display:none;">¿Estás seguro? <a href="#" class="btn btn-danger btn-eliminar-si" data-id="' + id + '" data-nombre-imagen="' + imagen + '">Si</a> <a href="#" class="btn btn-default btn-eliminar-no">No</a></div></span></div>';
                                            $("#lista-fotos-actuales").append(foto);
                                            arrayFotos[arrayFotos.length] = imagen;
                                            recargarFotosHidden();
                                        }<?php
                                                                        if (isset($arImagenes)) {
                                                                            foreach ($arImagenes as $img) {
                                                                                ?>
                                                insertarImagen("<?= $img->path; ?>",<?= $img->id_imagen; ?>);
    <?php } ?>
<?php } ?>
                                        $("#producto").addClass("active_menu");

</script>
</body>
</html><?php ob_end_flush(); ?>