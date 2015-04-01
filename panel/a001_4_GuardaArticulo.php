<?php
ob_start();
require 'classes/CMS/Articulo.php';
require 'includes/mainfile.php';
ob_end_clean();
ob_start('ob_gzhandler');
require 'snippets/head.php';
?><body class="">
    <script languaje='javascript' src='js/procesaDatos.js'></script>
    <script src="js/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
    <div class="container-fluid fluid menu-left">
        <?php require 'snippets/top.php'; ?>
        <div id="wrapper">
            <div id="menu" class="hidden-phone hidden-print">
                <div class="slim-scroll" data-scroll-height="800px">
                    <?php require 'snippets/menuLateral.php'; ?>
                    <div id="content">
                        <ul class="breadcrumb">
                            <li><a href="g000_1_principal.php" class="glyphicons home"><i></i>Principal</a></li>
                            <li class="divider"></li>
                            <li><?= nombreModulo(); ?></li>
                            <li class="divider"></li>
                            <li>Edición de Articulo</li>
                        </ul>
                        <h3 class="heading-mosaic">Edición de Articulo</h3>
                        <a name='inicio'><span id='valida'></span></a>
                        <div class="innerLR">
                            <div class="widget widget-tabs border-bottom-none">
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons edit" href="#article-details" data-toggle="tab"><i>
                                                </i>Detalle del Articulo</a></li>
                                        <li class=""><a class="glyphicons edit" href="#images" data-toggle="tab"><i>
                                                </i>Imagen</a></li>
                                    </ul>
                                </div>
                                <div class="widget-body">
                                    <form class="form-horizontal" style="margin: 0;" name="editArticle" id='editArticle' >
                                        <div class="tab-content" style="padding: 0;">
                                            <div class="tab-pane active" id="article-details">
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label class="control-label">Sección*</label>
                                                            <div class="controls">
                                                                <select class="span8" id="arSecciones" name="arSecciones[]" multiple="multiple">
                                                                    <option value='0'>Seleccione al menos una opción</option><?php
                                                                    $qrSecciones = 'SELECT idCF,nombreNodo,identificadorNodo,caracteristica '
                                                                            . 'FROM scd_cfsecciones WHERE status=1';
                                                                    $rsSecciones = $db->Execute($qrSecciones) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
                                                                    if (!$rsSecciones->EOF) {
                                                                        while (list($idCF, $nombreSeccion, $identificador, $caracteristica) = $rsSecciones->FetchRow()) {
                                                                            ?>
                                                                            <option value='<?= $idCF ?>' ><?= $nombreSeccion ?></option><?php
                                                                        }
                                                                    }
                                                                    ?></select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Categorias</label>
                                                            <div class="controls">
                                                                <select class="span8" id="arCategorias" name="arCategorias[]" multiple="multiple">
                                                                    <option value='0'>Seleccione al menos una opción</option><?php
                                                                    $qrSecciones = 'SELECT idCF,nombreNodo,identificadorNodo,caracteristica '
                                                                            . 'FROM scd_cfcategorias WHERE status=1';
                                                                    $rsSecciones = $db->Execute($qrSecciones) or trigger_error($this->db->ErrorMsg(), E_USER_ERROR);
                                                                    if (!$rsSecciones->EOF) {
                                                                        while (list($idCF, $nombreCategoria, $identificador, $caracteristica) = $rsSecciones->FetchRow()) {
                                                                            ?>
                                                                            <option value='<?= $idCF ?>' ><?= $nombreCategoria ?></option><?php
                                                                        }
                                                                    }
                                                                    ?></select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Autor</label>
                                                            <div class="controls">
                                                                <input type="text" value="<?= $autor ?>" class="span8" id="autor" name="autor"  required/>
                                                                <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Author name is mandatory"><i></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Url del Autor</label>
                                                            <div class="controls">
                                                                <input type="url" value="<?= $urlAutor ?>" class="span8" id="urlAutor" name="urlAutor"  required/>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Titulo*</label>
                                                            <div class="controls">
                                                                <input type="hidden" id="idArticulo" name="idArticulo" value="<?= $idArticulo ?>">
                                                                <input type="text" value="<?= $titulo ?>" class="span8" id="titulo" name="titulo"  required title="Titulo del Articulo"/>
                                                                <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label class="control-label">Tags</label>
                                                            <div class="controls">
                                                                <select class="span8" id='arTags' name='arTags[]' multiple="multiple">
                                                                    <option value='0'>Seleccione al menos una opción</option><?php
                                                                    $qrSecciones = 'SELECT idCF,nombreNodo,identificadorNodo,caracteristica '
                                                                            . 'FROM scd_cftags WHERE status=1';
                                                                    $rsSecciones = $db->Execute($qrSecciones) or trigger_error($db->ErrorMsg(), E_USER_ERROR);
                                                                    if (!$rsSecciones->EOF) {
                                                                        while (list($idCF, $nombreCategoria, $identificador, $caracteristica) = $rsSecciones->FetchRow()) {
                                                                            ?>
                                                                            <option value='<?= $idCF ?>' ><?= $nombreCategoria ?></option><?php
                                                                        }
                                                                    }
                                                                    ?></select>
                                                            </div>
                                                        </div>
                                                        <div class="separator line bottom"></div>
                                                        <div class="control-group">
                                                            <label class="control-label">Meta Descripción</label>
                                                            <div class="controls">
                                                                <textarea id="metaDescripcion" class="span8" rows="3" placeholder="Descripción que se muestra en google"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="separator line bottom"></div>
                                                        <div class="control-group">
                                                            <label class="control-label">Meta KeyWords</label>
                                                            <div class="controls">
                                                                <textarea id="metaKeywords" name="metaKeywords" class="span8" rows="2" placeholder="key1,key2,key3"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="separator line bottom"></div>

                                                        <div class="control-group">
                                                            <label class="control-label">Estado*</label>
                                                            <div class="controls">
                                                                <select class="span3" id='estado' name='estado'>
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
                                                <div class="control-group row-fluid">
                                                    <label class="control-label">Contenido*</label>
                                                    <div class="controls">
                                                        <textarea  name="contenido" id="contenido" required class="span12" rows="8"></textarea>
                                                    </div>
                                                </div>
                                                <div class="separator line bottom"></div>
                                                <div class="form-actions" style="margin: 0;">
                                                    <button type="button" class="btn btn-icon btn-primary glyphicons circle_ok" onClick="enviar('save', 'a001_1_ValidaDatos.php', 'editArticle')"><i></i>Guardar Cambios</button>
                                                    <button type="button" class="btn btn-icon btn-default glyphicons circle_remove" onClick="window.location = 'a001_1_ListadoArticulos.php';"><i></i>Cancelar</button>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="images">
                                                <div class="control-group">
                                                    <label class="control-label">Titulo</label>
                                                    <div class="controls">
                                                        <input type="text" value="<?= $tituloImagen ?>" class="span8" id="tituloImagen" name="tituloImagen"  required/>
                                                        <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Imagen </label>
                                                    <div class="controls"><span class="profile">
<!--                                                                    <img src="g004_2_ImageUser.php?idUsuario=<?= $idUser; ?>" width="48px"/></span>-->
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <span class="btn btn-default btn-file"><span class="fileupload-new">Selecciona una imágen</span>
                                                                    <span class="fileupload-exists">Change</span>
                                                                    <input type="hidden" name="MAX_FILE_SIZE" value="400000000">
                                                                    <input type="file" name="imagen" id="imagen" accept="image/jpg, image/jpeg"/></span>
                                                                <span class="fileupload-preview"></span>
                                                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">&times;</a></div>
                                                    </div>
                                                </div>
                                                <div class="form-actions" style="margin: 0;">
                                                    <button type="button" class="btn btn-icon btn-primary glyphicons circle_ok" onClick="enviar('save', 'a001_1_ValidaDatos.php', 'editArticle')"><i></i>Guardar Cambios</button>
                                                    <button type="button" class="btn btn-icon btn-default glyphicons circle_remove" onClick="window.location = 'a001_1_ListadoArticulos.php';"><i></i>Cancelar</button>
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
            <div class="clearfix"></div>
            <?php require 'snippets/footer.php'; ?>
        </div>
        <script src="theme/scripts/plugins/system/jquery.min.js"></script>
        <script src="theme/scripts/plugins/system/modernizr.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.min.js"></script>
        <script src="theme/scripts/demo/common.js?1365412995"></script>
        <script src="theme/scripts/plugins/other/holder/holder.js"></script>
        <script src="theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>
        <script>
                                                        var basePath = '';
        </script>
        <script src="bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
        <script src="bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
        <script src="bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script src="bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js"></script>
        <script src="bootstrap/extend/bootbox.js"></script>
        <script src="theme/scripts/plugins/other/google-code-prettify/prettify.js"></script>
        <script src="theme/scripts/plugins/system/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
        <script src="theme/scripts/plugins/notifications/Gritter/js/jquery.gritter.min.js"></script>
        <script src="theme/scripts/plugins/notifications/notyfy/jquery.notyfy.js"></script>
        <script src="theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script>
        <script src="theme/scripts/plugins/forms/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="theme/scripts/plugins/system/jquery.cookie.js"></script>
        <script>
                                                        var primaryColor = '#e25f39',
                                                                dangerColor = '#bd362f',
                                                                successColor = '#609450',
                                                                warningColor = '#ab7a4b',
                                                                inverseColor = '#45484d';
        </script>
        <script>
            var themerPrimaryColor = primaryColor;
        </script>
        <script src="theme/scripts/demo/themer.js"></script>
        <script src="theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.js"></script>
        <script src="theme/scripts/plugins/charts/sparkline/jquery.sparkline.min.js"></script>
        <script src="theme/scripts/plugins/other/jquery.ba-resize.js"></script>
        <script src="theme/scripts/plugins/forms/select2/select2.js"></script>
        <script src="theme/scripts/demo/form_elementsArticles.js"></script>
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
        <!--[if gt IE 8]><!--><script src="theme/scripts/demo/resizable.js?1365412995"></script><!--<![endif]-->
</body>
</html><?php ob_end_flush(); ?>