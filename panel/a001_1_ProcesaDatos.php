<?php

ob_start();
require 'classes/General/Usuario.php';
require 'classes/CMS/Articulo.php';
require 'classes/General/ValidacionFormulario.php';
require 'classes/Web/Mail.php';
require 'classes/Web/Imagen.php';
require 'classes/Web/sitemapxml.php';
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
$arTags = $_REQUEST['arTags'];
$idArticulo = $_REQUEST['idArticulo'];
$tituloImagen = $_REQUEST['tituloImagen'];

$valida = new ValidacionFormulario();
$metaDescripcion = $valida->validaCampoTexto($metaDescripcion);
$metaKeywords = $valida->validaCampoTexto($metaKeywords);
$articulo = serialize($_SESSION['a001_articulo']);
$articulo = unserialize($articulo);
if (!is_a($articulo, 'Articulo')) {
    $articulo = new Articulo($db);
} else {
    $articulo->db = $db;
}
if (false == $error && !empty($accion)) {
    $articulo->setTitulo(htmlentities($titulo));
    $articulo->setContenido($contenido);
    $articulo->setAutor($autor);
    $articulo->setMetaDescripcion($metaDescripcion);
    $articulo->setMetaKeywords($metaKeywords);
    $articulo->setEstado($estado);
    $articulo->setPageAuthor($urlAutor);
    if ('save' == $accion) {
        $articulo->setFechaAlta(date('Y-m-d'));
        $res = $articulo->guardaArticulo();
        $idArticulo = $articulo->getIdArticulo();
    }
    if ('edit' == $accion) {
        $articulo->setFechaEdicion(date('Y-m-d'));
        $articulo->setIdArticulo($idArticulo);
        $res = $articulo->modificaArticulo();
    }
    if (false == $res) {
        $msg = 'Ocurrio un Error al Intentar Guardar, por favor Verifique e Intente nuevamente';
        $error = true;
    }
}
$valida = new ValidacionFormulario();
$descripcion = $valida->validaCampoTexto($descripcion);
if (false == $error) {
    if (is_array($arSecciones)) {
        $qrDel = "DELETE FROM scd_Articulos_has_Secciones WHERE idArticulo='$idArticulo'";
        $rsSecciones = $db->Execute($qrDel)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
        foreach ($arSecciones as $idCFSeccion) {
            $qrSeccion = 'INSERT INTO scd_Articulos_has_Secciones (idArticulo,idCFSeccion)'
                    . " VALUES('$idArticulo','$idCFSeccion')";
            $rsSecciones = $db->Execute($qrSeccion)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
        }
    }
    if (is_array($arCategorias)) {
        $qrDel = "DELETE FROM scd_Articulos_has_Categorias WHERE idArticulo='$idArticulo'";
        $rsSecciones = $db->Execute($qrDel)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
        foreach ($arCategorias as $idCFCategoria) {
            $qrCategoria = 'INSERT INTO scd_Articulos_has_Categorias (idArticulo,idCFCategoria)'
                    . " VALUES('$idArticulo','$idCFCategoria')";
            $rsCategoria = $db->Execute($qrCategoria)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
        }
    }
    if (is_array($arTags)) {
        $qrDel = "DELETE FROM scd_Articulos_has_Tags WHERE idArticulo='$idArticulo'";
        $rsSecciones = $db->Execute($qrDel)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
        foreach ($arTags as $idCFTag) {
            $qrCategoria = 'INSERT INTO scd_Articulos_has_Tags (idArticulo,idCFTag)'
                    . " VALUES('$idArticulo','$idCFTag')";
            $rsCategoria = $db->Execute($qrCategoria)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
        }
    }
    $nombre_archivo = $_FILES['imagen']['name'];
    if ($nombre_archivo) {
        $fileType = $_FILES['imagen']['type'];
        if (strpos($fileType, 'gif') || strpos($fileType, 'jpg') || strpos($fileType, 'jpeg') || strpos($fileType, 'png')) {
            $fileName = $_FILES['imagen']['name'];
            $tmpName = $_FILES['imagen']['tmp_name'];
            $fileSize = $_FILES['imagen']['size'];
            if (empty($tituloImagen)) {
                $tituloImg = Convertir_a_url(html_entity_decode($nombre_archivo));
            }
            $tituloImagen = str_replace(' ', '-', $nombre_archivo);
            $uploaddir = '../siteimg/articulos/original/' . $tituloImagen;
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $uploaddir)) {
                $error = 'El Archivo ha sido Cargado Correctamente.';
                $oImagen = new Imagen();
                // BIG Image Redimension
                $oImagen->nombreArchivoOrigen = $uploaddir;
                $oImagen->nombreArchivoDestino = $tituloImagen;
                $oImagen->rutaDestino = '../siteimg/articulos/big/';
                $oImagen->ancho = 576;
                $oImagen->thumbjpeg(); // Crea la imgen
                //$oImagen->nombreArchivoOrigen = $uploaddir; //Ruta de archivo origen
                $oImagen->nombreArchivoDestino = $tituloImagen; //Asigno el mismo nombre del id del registro
                $oImagen->rutaDestino = '../siteimg/articulos/medium/';
                $oImagen->ancho = 268;
                $oImagen->thumbjpeg(); // Crea la imgen
                //SMALL Image Redimension
                $oImagen->nombreArchivoOrigen = $uploaddir; //Ruta de archivo origen
                $oImagen->nombreArchivoDestino = $tituloImagen; //Asigno el mismo nombre del id del registro
                $oImagen->rutaDestino = '../siteimg/articulos/small/';
                $oImagen->ancho = 60;
                $oImagen->thumbjpeg(); // Crea la imgen
                $qrCategoria = "DELETE FROM `scd_Imagenes_has_Articulos` WHERE idArticulo='$idArticulo'";
                $rsCategoria = $db->Execute($qrCategoria)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
                $qrCategoria = 'INSERT INTO `scd_Imagenes_has_Articulos` (idArticulo,tituloImagen,path,estado,url)'
                        . " VALUES('$idArticulo','$tituloImg','$tituloImagen','1','$url')";
                $rsCategoria = $db->Execute($qrCategoria)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
            } else {
                $error = 'Ocurrio Algún Error al Subir el Fichero. No pudo Guardarse.';
                die($error);
            }
        }
    }
    $articulo = new Articulo($db);
    $res = $articulo->ArticulosPorSeccion();
    while (list($idArt, $titulo, $contenido, $fuente, $fechaAlta, $autor, $path, $tituloImagen, $nomSeccion, $caracteristica) = $res->FetchRow()) {
        $a_url[$idArt]['url'] = 'articulo-' . Convertir_a_url($titulo) . '-' . $idArt;
        $a_url[$idArt]['fecha'] = $fechaAlta;
        $a_url[$idArt]['titulo'] = $titulo;
        $a_url[$idArt]['descripcion'] = substr(strip_tags($contenido), 0, 150) . '...';
        $a_url[$idArt]['autor'] = $autor;
        $a_url[$idArt]['path'] = $path;
    }
    $oSiteMapXML = new SiteMapXML();
    $oSiteMapXML->generatorRSSXML($a_url);
    $qrSecciones = 'SELECT idCF,nombreNodo FROM scd_cfsecciones WHERE status=1';
    $rsSecciones = $db->Execute($qrSecciones);
    if (!$rsSecciones->EOF) {
        while (list($idCF, $nomSeccion) = $rsSecciones->FetchRow()) {
            $a_url['s' . $idCF]['url'] = 'blog-' . Convertir_a_url($nomSeccion) . '-' . $idCF;
            $a_url['s' . $idCF]['fecha'] = '2014-08-01';
            $a_url['s' . $idCF]['titulo'] = 'Tips de ' . $nomSeccion;
            $a_url['s' . $idCF]['descripcion'] = 'Mejores tips de ' . $nomSeccion;
        }
    }
    $qrSecciones = 'SELECT idCF,nombreNodo FROM scd_cftags WHERE status=1';
    $rsSecciones = $db->Execute($qrSecciones);
    if (!$rsSecciones->EOF) {
        while (list($idCF, $nomSeccion) = $rsSecciones->FetchRow()) {
            $a_url['t' . $idCF]['url'] = Convertir_a_url($nomSeccion) . '-' . $idCF . '-tag';
            $a_url['t' . $idCF]['fecha'] = '2014-08-01';
            $a_url['t' . $idCF]['titulo'] = 'Tips de ' . $nomSeccion;
            $a_url['t' . $idCF]['descripcion'] = 'Mejores tips de ' . $nomSeccion;
        }
    }
    $oSiteMapXML->generatorXML($a_url);
    unset($_SESSION['a001_articulo']);
}
header('location: a001_1_ListadoArticulos.php?idArticulo=' . $idArticulo);
exit;
