<!DOCTYPE html><html>
    <head>
        <?php include('snippets/head.php'); ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1" />
        <meta name="author" content="FamousThemes" />
        <meta name="description" content="Get in the spotlight" />
        <meta name="keywords" content="premium css templates, premium wordpress themes, famous themes, themeforest" />
        <title>Blog de Bodas y organización de eventos en México</title>
        <link rel="stylesheet" type="text/css" media="all" href="style.css" />
        <link rel="stylesheet" href="prettyphoto/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <link href='http://fonts.googleapis.com/css?family=Ovo' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
        <!-- jQuery -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <!-- Twitter Feed -->
        <script src="js/twitter/jquery.tweet.js" charset="utf-8"></script>
        <!-- Flickr Feed -->
        <script src="js/jflickrfeed.min.js"></script>
        <!-- PrettyPhoto -->
        <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="js/custom.quicksand.js"></script>
        <!-- DropDownMenu -->
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

            jQuery(function ($) {
                $(".tweet").tweet({
                    modpath: 'js/twitter/',
                    join_text: "auto",
                    username: "IlNovoCatering",
                    count: 1,
                    auto_join_text_default: "we said,",
                    auto_join_text_ed: "we",
                    auto_join_text_ing: "we were",
                    auto_join_text_reply: "we replied",
                    auto_join_text_url: "we were checking out",
                    loading_text: "loading tweets..."
                });
                $('#basicuse').jflickrfeed({
                    limit: 12,
                    qstrings: {
                        id: '131048155@N02'
                    },
                    itemTemplate: '<li><a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
                });
            });
        </script>
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div id="shadow_bg">
            <div id="main_container">
                <?php include('snippets/header.php'); ?>
                <div id="center_container">
                    <?php include('snippets/logo.php'); ?><!-- End of Header-->
                    <div class="pages_title">
                        <h2>Blog de organización de <span>Bodas y Eventos</span></h2>
                    </div>
                    <div class="content">
                        <div class="left23"><?php
                            $page = $_REQUEST['page'];
                            $search = $_REQUEST['search'];
                            $qrArticulos = 'SELECT articles.id_articulo,titulo,contenido,fecha_alta,'
                                    . ' path,articles.estado,autor,page_author'
                                    . ' FROM articles '
                                    . ' LEFT JOIN imagenes_has_articulos '
                                    . ' ON articles.id_articulo = imagenes_has_articulos.id_articulo '
                                    . ' INNER JOIN articulos_has_secciones '
                                    . ' ON articulos_has_secciones.id_articulo = articles.id_articulo'
                                    . ' WHERE articles.estado = 1 AND articulos_has_secciones.id_seccion = 1 ';
                            if (!empty($search)) {
                                $search = str_replace(' ', '%', $search);
                                $qrArticulos.="AND (titulo LIKE '%$search%' OR contenido LIKE '%$search%')";
                            }
                            $qrArticulos.=' GROUP BY articles.id_articulo ORDER BY id_articulo DESC';
                            $qPaginado = new Paginacion($db, $qrArticulos, 4);
                            $page = (false == $page) ? 1 : $page;
                            $qPaginado->setPage($page);
                            $qPaginado->url = 'blog-de-enfermedades-digestivas-y-obesidad.php';
                            //$qPaginado->parameters = '&id_articulo = ' . $id_articulo;
                            $rsArticulos = $qPaginado->queryLimits();
                            if (false !== $rsArticulos && is_object($rsArticulos)) {
                                $cont = 5;
                                while (list($id_articulo, $titulo,
                                $contenido, $fecha_alta, $path, $estado,
                                $autor, $page_author, $lugar) = $rsArticulos->FetchRow()) {
                                    $arFecha = explode('-', $fecha_alta);
                                    ?><div class="post">
                                        <div class="post_thumb">
                                            <a href="articulo-blog.php?id_articulo=<?= $id_articulo ?>">
                                                <img src="<?= PATH ?>files/articulos/medium/<?= $path ?>" alt="<?= $titulo ?>"
                                                     title="<?= $titulo ?>" border="0" />
                                            </a>
                                            <h2 >
                                                <a href="articulo-blog.php?id_articulo=<?= $id_articulo ?>" >
                                                    <span style="color:#FF5CFF;"><?= $titulo ?></span></a></h2>
                                        </div>
                                        <div class="post_left">
                                            <div class="date_line_blog">
                                                <span class="day"><?= $arFecha[2] ?></span>
                                                <span class="month"><?= date('M', $arFecha[1]) ?></span>
                                                <img class="date_line" src="images/date_line.png" alt="" title="" border="0" />
                                            </div>
                                            <div class="comm_line_blog icon_category"><a href="#">category</a></div>
                                            <div class="comm_line_blog">Tags: <a href="#">wedding</a>, <a href="#">marriage</a>,
                                                <a href="#">bliss</a></div>
                                        </div>
                                        <div class="entry">
                                            <p><?= substr(strip_tags($contenido), 0, 150) . '...'; ?>
                                            </p>
                                        </div>
                                        <a href="articulo-blog.php?id_articulo=<?= $id_articulo ?>" class="read_more"><span class="swirl_left"><span class="swirl_right">Leer mas</span></span></a>

                                    </div><?php
                                }
                            }
                            ?><div class="navigation">

                                <?= $qPaginado->linkFirst('<i class="fa fa-long-arrow-left"></i> Primero'); ?>

                                <?= $qPaginado->linkNext('Siguiente <i class="fa fa-long-arrow-right"></i>'); ?>
                            </div>

                        </div>
                        <div class="left13 sidebar">
                            <?php include('snippets/sidebar.php'); ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="content">
                        <?php include('snippets/promociones.php'); ?>
                        <?php include('snippets/footer.php'); ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var main_menu = new main_menu.dd("main_menu");
            main_menu.init("main_menu", "menuhover");
        </script>
    </body>
</html>
