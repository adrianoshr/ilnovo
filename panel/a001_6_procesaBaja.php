<?php
header('Content-type: text/javascript');
ob_start();
require 'includes/mainfile.php';
require 'controller/Articulo.php';
ob_end_clean();

//906630
$id_articulo = $_REQUEST['id_articulo'];
$accion = $_REQUEST['accion'];
$articulo = new Article();
if ('ConfirmDel' == $accion) {
    $articulo->id_articulo = $id_articulo;
    $res = $articulo->Delete('id_articulo=' . $id_articulo);
    if (true == $res) {
        $imagen = new ImagesHasArticles();
        $imagen->Delete('id_articulo=' . $id_articulo);
        $seccion = new ArticlesHasSections();
        $seccion->Delete('id_articulo=' . $id_articulo);
        $msg = 'El Articulo  se Elimino con Éxito';
        $tipo = 'success';
    } else {
        $msg = 'Ocurrio un Error al Intentar Eliminar, por favor Verifique y Vuelva a Intentar.';
        $tipo = 'error';
    }
    ?>noty({force: true,	text: '<?= $msg ?>',
    type: '<?= $tipo ?>',
    layout: 'top'
    });<?php if (true == $rs) { ?>
        window.onbeforeunload = '';
        window.location='a001_1_ListadoArticulos.php';<?php
        exit;
    }
} else {
    $msg = '¿Está Seguro de Eliminar el Articulo?';

// alert|error|success|information|warning|primary|confirm
    ?>
    var notification =['confirm'];
    notification['confirm'] = '<?= $msg ?>';
    noty({
    text:notification['confirm'],
    type: 'confirm',
    dismissQueue: true,
    layout:'top',
    buttons: [{addClass: 'btn btn-success btn-small btn-icon glyphicons ok_2',
    text: '<i></i> Ok',
    onClick: function($noty) {
    $noty.close();
    confirmDelete('<?= $id_articulo ?>');

    }
    }, {
    addClass: 'btn btn-danger btn-small btn-icon glyphicons remove_2',
    text: '<i></i> Cancel',
    onClick: function($noty) {
    $noty.close();
    noty({
    force: true,
    text: '<strong>La operación fue cancelada<strong>',
            type: 'error',
            layout: 'top'
            });
            }

            }]
            });<?php }
?>
