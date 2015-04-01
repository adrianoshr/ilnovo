<?php
ob_start('ob_gzhandler');
?><!DOCTYPE html >
<html >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
        <title>Fotos de decoración de Bodas y eventos en México| Il Novo Catering</title>
        <meta property="og:title" content="Fotos de decoración de Bodas y eventos en México| Il Novo Catering">
        <meta property="og:url" content="http://www.ilnovo.catering/fotos-de-decoracion-de-bodas-y-eventos-il-novo-catering.php">
        <meta property="og:image" content=" http://www.ilnovo.catering/images/il-novo-catering-organizacion-de-bodas-en-mexico-casa-bugambilia2-001.jpg ">
        <meta property="og:description" content=" Te invitamos a ver nuestra extesa galería de trabajos realizados. Hemos organizado muchos eventos de todo estilo y sabemos que nuestra experiencia te ayudará.">
        <meta name="keywords" content=" Galeria, servicio de organizacion de eventos, bodas vintage, boda mexico, servicio de catering, banquetes df, banquetes para eventos, servicio de banquetes, banquetes para fiestas, eventos y banquetes, " />
        <meta name="description" content=" Te invitamos a ver nuestra extesa galería de trabajos realizados. Hemos organizado muchos eventos de todo estilo y sabemos que nuestra experiencia te ayudará.  ">
        <meta name="author" content=" Il Novo ">
        <!--TWITTER CARD-->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="http://www.ilnovo.catering/fotos-de-decoracion-de-bodas-y-eventos-il-novo-catering.php">
        <meta name="twitter:creator" content="@IlNovoCatering">
        <meta name="twitter:title" content="Fotos de decoración de Bodas y eventos en México| Il Novo Catering">
        <meta name="twitter:description" content="Te invitamos a ver nuestra extesa galería de trabajos realizados. Hemos organizado muchos eventos de todo estilo y sabemos que nuestra experiencia te ayudará. ">
        <meta name="twitter:image:src" content="http://www.ilnovo.catering/images/il-novo-catering-organizacion-de-bodas-en-mexico-casa-bugambilia2-001.jpg"><?php
        include 'snippets/head.php';
        require 'panel/controller/Galeria.php';
        ?>
        <link rel="stylesheet" type="text/css" media="all" href="style.css" />
        <link rel="stylesheet" href="prettyphoto/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <link href='http://fonts.googleapis.com/css?family=Ovo' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="shadow_bg">
            <div id="main_container">
                <?php include('snippets/header.php'); ?>
                <div id="center_container">
                    <?php include('snippets/logo.php'); ?>
                    <div class="pages_title">
                        <h2>Fotos de decoración de  <span>Bodas y eventos</span></h2>
                    </div>
                    <div class="content">
                        <ul class="filter_portfolio">
                            <li class="segment-1 selected"><a href="#" data-value="all">Ver Todos</a></li><?php
                            $page = $_REQUEST['page'];
                            $select = 'SELECT scd_galerias.`id_galeria`, `nombre`, `fecha`, `estado`,path,titulo,descripcion'
                                    . ' FROM `scd_galerias` '
                                    . ' INNER JOIN scd_galeria_has_imagenes '
                                    . ' ON scd_galeria_has_imagenes.id_galeria=scd_galerias.id_galeria'
                                    . ' WHERE estado=1 GROUP BY scd_galerias.id_galeria '
                                    . ' ORDER BY scd_galerias.id_galeria DESC';
                            $qPaginado = new Paginacion($db, $select, 15);
                            $page = (false == $page) ? 1 : $page;
                            $qPaginado->setPage($page);
                            $qPaginado->url = 'seccion.php';
                            $qPaginado->parameters = '&idCFSeccion=' . $idCFSeccion;
                            $rsPortada = $qPaginado->queryLimits();
                            if (false !== $rsPortada && is_object($rsPortada)) {
                                $maxArticle = 1;
                                $order = 3;
                                while (list($id_galeria, $nombre, $fecha, $estado, $path, $titulo, $descripcion) = $rsPortada->FetchRow()) {
                                    ?><li class="segment-2">
                                        <a href="#" data-value="galeria<?= $id_galeria ?>" title="<?= $nombre ?>">
                                            <?= $nombre ?></a></li><?php
                                }
                            }
                            ?></ul>
                        <ul class="portfolio_items"><?php
                            $select = 'SELECT scd_galerias.`id_galeria`, `nombre`, `fecha`, `estado`,path,titulo,descripcion'
                                    . ' FROM `scd_galerias` '
                                    . ' INNER JOIN scd_galeria_has_imagenes '
                                    . ' ON scd_galeria_has_imagenes.id_galeria=scd_galerias.id_galeria'
                                    . ' WHERE estado=1  '
                                    . ' ORDER BY scd_galerias.id_galeria DESC';
                            $qPaginado = new Paginacion($db, $select, 200);
                            $page = (false == $page) ? 1 : $page;
                            $qPaginado->setPage($page);
                            $qPaginado->url = 'seccion.php';
                            $qPaginado->parameters = '&idCFSeccion=' . $idCFSeccion;
                            $rsPortada = $qPaginado->queryLimits();
                            if (false !== $rsPortada && is_object($rsPortada)) {
                                $maxArticle = 1;
                                $order = 3;
                                while (list($id_galeria, $nombre, $fecha, $estado, $path, $titulo, $descripcion) = $rsPortada->FetchRow()) {
                                    ?><li class="gallery13 galeria<?= $id_galeria ?>" data-id="id-<?= $id_galeria ?>">
                                        <img src="images/gallery_frame.png" alt="Marco foto" title="Marco foto" border="0" class="frame"/>
                                        <img src="<?= PATH . 'files/articulos/medium/' . $path ?>" alt="<?= $titulo ?>" title="<?= $titulo ?>" border="0" class="thumb" />
                                        <span class="portfolio_caption">
                                            <a href="<?= PATH . 'files/articulos/original/' . $path ?>" rel="prettyPhoto[gallery]"
                                               title="<?= $titulo ?>"><img src="images/zoom.png" alt="Zoom" title="Zoom" border="0"/></a>
                                        </span>
                                        <h3><?= $nombre ?></h3>
                                    </li><?php
                                }
                            }
                            ?></ul>
                        <?php include 'snippets/promociones.php'; ?></div>
                    <?php include 'snippets/footer.php'; ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.quicksand.js"></script>
        <script type="text/javascript" src="js/custom.quicksand.js"></script>
        <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" charset="utf-8">
            var $ = jQuery.noConflict();
            $(window).load(function () {
                $(function () {
                    $('.show_menu').click(function () {
                        $('.menu').fadeIn();
                        $('.show_menu').fadeOut();
                        $('.hide_menu').fadeIn();
                    });
                    $('.hide_menu').click(function () {
                        $('.menu').fadeOut();
                        $('.show_menu').fadeIn();
                        $('.hide_menu').fadeOut();
                    });
                });

            });
        </script>
        <script type="text/javascript">
            var main_menu = new main_menu.dd("main_menu");
            main_menu.init("main_menu", "menuhover");
        </script>
    </body>
</html><?php ob_end_flush(); ?>