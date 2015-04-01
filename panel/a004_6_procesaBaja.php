<?php
header('Content-type: text/javascript');
ob_start();
require 'includes/mainfile.php';
require 'classes/CMS/Newsletter.php';
require 'classes/General/ValidacionFormulario.php';
ob_end_clean();
//906630
$id = $_REQUEST['id'];
$accion = $_REQUEST['accion'];
$oBoletin = new Newsletter();

if ('ConfirmDel' == $accion) {
    $res = $oBoletin->Load('id=' . $id);
    if (true == $res) {
        $rs = $oBoletin->Delete();
        if (true == $rs) {
            $msg = 'El Boletín ' . $codigo . ' se Elimino con Éxito';
            $tipo = 'success';
        } else {
            $msg = 'Ocurrio un Error al Intentar Eliminar, por favor Verifique y Vuelva a Intentar.';
            $tipo = 'error';
        }
    }
    ?>
    notyfy({force: true,	text: '<?= $msg ?>',
    type: '<?= $tipo ?>',
    layout: 'top'
    });<?php if (true == $rs) { ?>
        window.onbeforeunload = '';
        window.location='a004_1_ListadoNewsletter.php';<?php
        sleep(1);
        exit;
    }
} else {
    $msg = '¿Está Seguro de Eliminar el Boletín?';
}
// alert|error|success|information|warning|primary|confirm
?>
var notification =['confirm'];
notification['confirm'] = '<?= $msg ?>';
notyfy({
text:notification['confirm'],
type: 'confirm',
dismissQueue: true,
layout:'top',
buttons: [{addClass: 'btn btn-success btn-small btn-icon glyphicons ok_2',
text: '<i></i> Ok',
onClick: function($notyfy) {
$notyfy.close();
enviaDatos('a004_6_procesaBaja.php?accion=ConfirmDel&id=<?= $id ?>');
}
}, {
addClass: 'btn btn-danger btn-small btn-icon glyphicons remove_2',
text: '<i></i> Cancel',
onClick: function($notyfy) {
$notyfy.close();
notyfy({
force: true,
text: '<strong>La operación fue cancelada<strong>',
        type: 'error',
        layout: 'top'
        });
        }

        }]
        });
