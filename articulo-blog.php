<!DOCTYPE html ">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1" />
        <meta name="author" content="FamousThemes" />
        <meta name="description" content="Get in the spotlight" />
        <meta name="keywords" content="premium css templates, premium wordpress themes, famous themes, themeforest" />
        <?php include('snippets/head.php'); ?>
        <title><?= $titulo ?></title>
        <link rel="stylesheet" type="text/css" media="all" href="style.css" />
        <link rel="stylesheet" href="prettyphoto/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <link href='http://fonts.googleapis.com/css?family=Ovo' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
        <meta property="og:title" content="<?= $titulo ?>">
        <meta property="og:url" content="<?= PATH . Convertir_a_url($titulo) ?>-<?= $id_articulo ?>-blog">
        <meta property="og:image" content="<?= PATH ?>files/articulos/small/<?= $arImagenes[0]->path ?>">
        <meta property="og:description" content="<?= $meta_descripcion ?>">
        <meta name="keywords" content="<?= $meta_keywords ?>" />
        <meta name="description" content="<?= $meta_descripcion ?>">
        <meta name="author" content="<?= $autor ?>">
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
                    username: "famousthemes",
                    count: 1,
                    auto_join_text_default: "we said,",
                    auto_join_text_ed: "we",
                    auto_join_text_ing: "we were",
                    auto_join_text_reply: "we replied",
                    auto_join_text_url: "we were checking out",
                    loading_text: "loading tweets..."
                });
                $('#basicuse').jflickrfeed({
                    limit: 6,
                    qstrings: {
                        id: '31408169@N04'
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
                    <?php include_once("snippets/logo.php"); ?><!-- End of Header-->
                    <div class="pages_title">
                        <h2><?= $titulo ?></h2>
                    </div>
                    <div class="content">
                        <div class="left23">
                            <h1 id="h1"><?= $h1 ?></h1>
                            <p style="text-align:justify">
                                <a href="<?= PATH ?>files/articulos/original/<?= $arImagenes[0]->path ?>" rel="prettyPhoto[gallery]" title="Lorem ipsum sit amet"><img src="<?= PATH ?>files/articulos/big/<?= $arImagenes[0]->path ?>" alt="<?= $titulo ?>" title="<?= $titulo ?>" border="0" class="left_pic" /></a><p><?= $contenido ?></p>
                            <div class="clear"></div>
                            <div class="contact_info_blocks">

                                <div class="contact_info">
                                    <h3 style="color:#df6296">Ve nuestro Video</h3>
                                    <div class="icon"><a href="https://www.youtube.com/watch?v=ml9RGYSX9jQ" rel="prettyPhoto[gallery]" title="Popup Video"><img src="images/icon_video.png" alt="Video de algunos eventos que hemos organizado | Il Novo Catering" title="Video de algunos eventos que hemos organizado | Il Novo Catering" border="0"/></a></div><p>Haz clic aquí para ver un pequeño ejemplo de algunos eventos que hemos organizado. Contamos con mucho material para darte ideas para crear un evento maravilloso.</p>
                                </div>
                                <div class="contact_info">
                                    <h3 style="color:#df6296">Paquetes</h3>
                                    <div class="icon"><a href="contacto-il-novo-catering.php"> <img src="images/icon_clients.png" alt="" title="" border="0"/></a></div><p>Contamos con varios paquetes para diferentes ocasiones. Te recomendamos llamarnos o dejarnos un mensaje <a href="contacto-il-novo-catering.php">aquí</a> para ofrecerte nuestros últimos paquetes.</p>
                                </div>

                            </div>
                            <div class="left_full">
                                <h2><span>Pide una cotización sin compromiso</span></h2>
                                <p>Dínos qué tipo de evento tienen en mente y nosotros te ayudaremos a crear una boda de sueños. No olvides ser explícita y dárnos detalles como lugar, fecha, número de invitados y horario. Nos encantará ayudarte a crear algo hermoso. <br /><br />  <a href="cotizacion-para-bodas-y-eventos-mexico.php" class="right button">Cotización</a></p>
                            </div>
                            <div class="left_full">
                                <h2>  ¿Tienes alguna pregunta o comentario? </h2>
                                <br />
                                <p>Con mucho gusto atenderemos tus dudas o preguntas. Nos gusta dar una atención personalizada, por lo que te recomendamos tambien llamarnos al <a href=" tel:017771002565">(777) 100.25.65</a> para darte un servicio más rápido.</p> <br />
                                <div class="fb-comments" data-href="http://www.ilnovo.catering/acerca-de-il-novo-catering.php" data-width="550" data-numposts="10" data-colorscheme="light"></div>
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