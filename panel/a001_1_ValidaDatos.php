<?php
header('Content-type: text/javascript');
ob_start();
require 'classes/CMS/Articulo.php';
require 'classes/General/ValidacionFormulario.php';
ob_end_clean();
require 'includes/mainfile.php';

$idArticulo = $_REQUEST['idArticulo'];
$titulo = $_REQUEST['titulo'];
$contenido = $_REQUEST['contenido'];
$autor = $_REQUEST['autor'];
$arSecciones = $_REQUEST['arSecciones'];
$arCategorias = $_REQUEST['arCategorias'];
$metaDescripcion = $_REQUEST['metaDescripcion'];
$metaKeywords = $_REQUEST['metaKeywords'];
$imagen = $_REQUEST['imagen'];
$estado = $_REQUEST['estado'];
$urlAutor = $_REQUEST['urlAutor'];
$accion = $_REQUEST['accion'];


if (empty($arSecciones)) {
    $error = true;
    $msg = 'Debe seleccionar al menos una sección.';
}
$valida = new ValidacionFormulario();
$titulo = $valida->validaCampoTexto($titulo);
if (false == $titulo) {
    $error = true;
    $msg = 'El Titulo es Incorrecto';
}
if (false == $error) {
    ?>
    window.onbeforeunload='';
    document.editArticle.enctype="multipart/form-data";
    document.editArticle.method='post';
    document.editArticle.idArticulo.value='<?= $idArticulo; ?>';
    document.editArticle.action="a001_1_ProcesaDatos.php?accion=<?= $accion ?>";
    document.editArticle.submit();<?php
    $_SESSION['a001_articulo'] = $articulo;
    $error = false;
    $msg = 'Cargando...';
}
// alert|error|success|information|warning|primary|confirm
?>
notyfy(
{ text: '<?= $msg ?>',
type: '<?= (true == $error) ? 'error' : 'success' ?>'
});