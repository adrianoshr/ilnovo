<?php
ob_start();
require 'includes/mainfile.php';
require 'classes/CMS/Newsletter.php';
ob_end_clean();
$id = $_REQUEST['id'];
$oNews = new Newsletter();
$oNews->Load('id=' . $id);
$arAttibutes = $oNews->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $$attribute = $oNews->$attribute;
}
ob_start('ob_gzhandler');
require 'snippets/head.php';
?>
<body class="">
    <script src="js/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
<!--    <script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>-->
    <div class="container-fluid fluid menu-left">
        <?php include 'snippets/top.php'; ?>
        <div id="wrapper">
            <div id="menu" class="hidden-phone hidden-print">
                <div class="slim-scroll" data-scroll-height="800px">
                    <?php include 'snippets/menuLateral.php'; ?>
                    <div id="content">
                        <ul class="breadcrumb">
                            <li><a href="g000_1_principal.php" class="glyphicons home"><i></i>Principal</a></li>
                            <li class="divider"></li>
                            <li><?= nombreModulo(); ?></li>
                            <li class="divider"></li>
                            <li>Edición de Articulo</li>
                        </ul>
                        <h3 class="heading-mosaic">Edición de Boletín</h3>
                        <a name='inicio'><span id='valida'></span></a>
                        <div class="innerLR">
                            <div class="widget widget-tabs border-bottom-none">
                                <div class="widget-head">
                                    <ul>
                                        <li class="active"><a class="glyphicons edit" href="#article-details" data-toggle="tab"><i>
                                                </i>Detalle del Boletín</a></li>
<!--                                        <li class=""><a class="glyphicons edit" href="#images" data-toggle="tab"><i>
                                                </i>Imagen</a></li>-->
                                    </ul>
                                </div>
                                <div class="widget-body">
                                    <form class="form-horizontal" style="margin: 0;" name="editArticle" id="editArticle" method="get" action="">
                                        <div class="tab-content" style="padding: 0;">
                                            <div class="tab-pane active" id="article-details">
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label class="control-label">Asunto*</label>
                                                            <div class="controls">
                                                                <input type="hidden" id="id" name="id" value="<?= $id ?>">
                                                                <input type="hidden" id="de" name="de" value="info@miboda.tips">
                                                                <input type="hidden" id="fromail" name="fromail" value="info@miboda.tips">
                                                                <input type="hidden" id="fecha" name="fecha" value="<?= date('Y-m-d') ?>">
                                                                <input type="text" value="<?= $asunto ?>" class="span8" id="asunto" name="asunto"  required title="Asunto"/>
                                                                <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label class="control-label">Enviar a*</label>
                                                            <div class="controls">
                                                                <select class="span6" id='emails' name='emails'>
                                                                    <option value='1' <?= (1 == $emails or empty($emails)) ? 'selected' : ''; ?>>Todos los Contactos</option>
                                                                    <option value='2' <?= (2 == $emails ) ? 'selected' : ''; ?>>Solo a uno especifico</option>
                                                                </select>
                                                                <input type="email" value="" class="span8" id="correo" name="correo" title="Indique un email especifico" placeholder="Indique un email especifico"/>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Estado*</label>
                                                            <div class="controls">
                                                                <select class="span3" id='estado' name='estado'>
                                                                    <option value='1' <?= (1 == $estado or empty($estado)) ? 'selected' : ''; ?>>Activo</option>
                                                                    <option value='2' <?= (2 == $estado ) ? 'selected' : ''; ?>>Inactivo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="separator line bottom"></div>
                                                <div class="control-group row-fluid">
                                                    <label class="control-label">Contenido*</label>
                                                    <div class="controls">
                                                        <textarea  name="contenido" id="contenido"
                                                                   required class="span12" rows="8"><?= $contenido ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="separator line bottom"></div>
                                            </div>
                                            <div class="tab-pane" id="images">
                                            </div>
                                        </div>
                                        <div class="form-actions" style="margin: 0;">
                                            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"
                                                    id="saveButton"><i></i>Guardar Cambios</button>
                                            <button type="button" class="btn btn-icon btn-default glyphicons circle_remove"
                                                    onClick="window.location = 'a001_1_ListadoNewsletter.php';"><i></i>Cancelar</button>
                                        </div>
                                    </form>
                                </div>

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
        <script src="bootstrap/extend/bootbox.js"></script>
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

                                                        var themerPrimaryColor = primaryColor;
        </script>
        <script src="theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.js"></script>
        <script src="theme/scripts/plugins/charts/sparkline/jquery.sparkline.min.js"></script>
        <script src="theme/scripts/plugins/other/jquery.ba-resize.js"></script>
        <script src="theme/scripts/plugins/forms/select2/select2.js"></script>
        <script src="theme/scripts/demo/form_elementsArticles.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
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
            $(function() {
                $(document).ready(function() {
                    $("#editArticle").validate({
                        submitHandler: function() {
                            tinymce.triggerSave();
                            // your function if, validate is success
                            $.ajax({
                                type: "POST",
                                url: 'model/send_newsletter.php',
                                data: $('#editArticle').serialize(),
                                dataType: 'script',
                                success: function(data) {
                                    $('html, body').animate({scrollTop: 0}, 'slow');
                                    $('#saveButton').html('Enviar Nuevamente');
                                }
                            });
                        }
                    });
                });
            });</script>
        <!--[if gt IE 8]><!--><script src="theme/scripts/demo/resizable.js?1365412995"></script><!--<![endif]-->
</body>
</html><?php ob_end_flush(); ?>