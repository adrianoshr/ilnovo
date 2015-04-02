<?
session_start();
if(isset($_POST['submitted'])) {

  $name = trim($_POST['name']);
  $phone = trim($_POST['phone']);
  $email = trim($_POST['email']);
  $comment = trim($_POST['comment']);

  $emailTo = "adrian@one-man-studio.com";
  $subject = 'Mensaje de la ZONA DE CONTACTO de la página web de Il Novo'.$name;			
  $body = "Name: $name \n\n Email: $email \n\n Phone: $phone \n\n  Message: $comment";
  $headers = 'From: '. $name .' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
  @mail($emailTo, $subject, $body, $headers);						
  $emailSent = true;

}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1" />

  <title>Contacto Il Novo Catering | Organización de bodas y eventos en México</title>
  <!--METAS Y OPEN GRAPH-->
  <meta property="og:title" content="Contacto Il Novo Catering | Organización de bodas y eventos en México">
  <meta property="og:url" content=" http://www.ilnovo.catering/contacto-il-novo-catering.php ">
  <meta property="og:image" content=" http://www.ilnovo.catering/images/il-novo-catering-organizacion-de-bodas-en-mexico-casa-bugambilia2-001.jpg ">
  <meta property="og:description" content=" En esta seccion podrás ponerte en contacto con nosotros, no olvides decir que nos viste en Internet.  ">
  <meta name="keywords" content=" bodas vintage, boda mexico, servicio de catering, banquetes df, banquetes para eventos, servicio de banquetes, banquetes para fiestas, eventos y banquetes, " />
  <meta name="description" content=" En esta seccion podrás ponerte en contacto con nosotros, no olvides decir que nos viste en Internet.  ">
  <meta name="author" content=" Il Novo ">
  <!--TWITTER CARD-->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="http://www.ilnovo.catering/contacto-il-novo-catering.php">
  <meta name="twitter:creator" content="@IlNovoCatering">
  <meta name="twitter:title" content="Contacto Il Novo Catering | Organización de bodas y eventos en México">
  <meta name="twitter:description" content="En esta seccion podrás ponerte en contacto con nosotros, no olvides decir que nos viste en Internet. ">
  <meta name="twitter:image:src" content="http://www.ilnovo.catering/images/il-novo-catering-organizacion-de-bodas-en-mexico-casa-bugambilia2-001.jpg">
  <?php include_once("snippets/head.php");?>
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
  <!-- FlexSlider -->
  <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
  <!-- PrettyPhoto -->
  <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" src="js/custom.quicksand.js"></script>
  <!-- DropDownMenu -->
  <script type="text/javascript" src="js/menu.js"></script>
  <script type="text/javascript" charset="utf-8">
    var $ = jQuery.noConflict();
    $(window).load(function () {
      $('.flexslider').flexslider({
        animation: "fade"
      });

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
        auto_join_text_default: "Dijimos,",
        auto_join_text_ed: "Nosotros",
        auto_join_text_ing: "Estábamos",
        auto_join_text_reply: "Respondimos",
        auto_join_text_url: "Estábamos checando",
        loading_text: "Cargando tweets..."
      });
      $('#basicuse').jflickrfeed({
        limit: 6,
        qstrings: {
          id: '131048155@N02'
        },
        itemTemplate: '<li><a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
      });
    });
  </script>
  <script type="text/javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $("#form1").validate({
        rules: {
                              name: "required", // simple rule, converted to {required:true}
                              email: {// compound rule
                                required: true,
                                email: true
                              },
                              comment: {
                                required: true
                              }
                            },
                            messages: {
                              comment: "Please enter a message."
                            }
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

      <?php include_once("snippets/header.php"); ?>


      <div id="center_container">

        <?php include_once("snippets/logo.php"); ?><!-- End of Header-->


        <div class="pages_title">
          <h2>Pónte en contacto con <span>nosotros</span></h2>
        </div>

        <div class="content">
          <div class="left23">
            <h2>Estamos listos para responder todas tus preguntas</h2>
            <p>
              <a href="images/contacto-il-novo-catering.jpg" rel="prettyPhoto[gallery]" title="<Contacto Il Novo Catering"><img src="images/contacto-il-novo-catering.jpg" alt="Contacto Il Novo Catering" title="Contacto Il Novo Catering" border="0" class="left_pic" /></a>
              Estamos listos para escuchar tus ideas y juntos lograr una fiesta increible. Con toda la experiencia que hemos acumulado, podemos asegurarte que Il Novo Catering seré tu mejor aliado en <strong>organizar tu boda</strong>. Ya sea una <strong>boda estilo vintage</strong>, <strong>boda tradicional</strong>, <strong>quince años</strong>, o cualquier tipo de evento, somos tus compañeros hasta el fin.


            </p>
            <a href="acerca-de-il-novo-catering.php" class="more">Leer Mas</a>


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

            <div class="clear"></div>

            <div class="form_content">

              <?php if (isset($emailSent) && $emailSent == true) { ?>

              <h2>Thank you,</h2>

              <p>Your message was sent successfully!</p>

              <?php } else { ?>

              <form id="form1" method="post" action="contact.php">
                <h3 class="form_subtitle">Déjanos un Mensaje:</h3>
                <div class="form">
                  <div class="form_row">
                    <label>Nombre:</label>
                    <input type="text" class="form_input" name="name" />
                  </div>
                  <div class="form_row">
                    <label>Email:</label>
                    <input type="text" class="form_input" name="email" />
                  </div>
                  <div class="form_row">
                    <label>Teléfono:</label>
                    <input type="text" class="form_input" name="phone" />
                  </div>
                  <div class="form_row">
                    <label>Mensaje:</label>
                    <textarea class="form_textarea" name="comment"></textarea>
                  </div>
                  <div class="form_row">
                    <input type="hidden" name="submitted" id="submitted" value="true" />
                    <input type="submit" class="form_submit_contact" value="Enviar" />
                  </div>
                </div>

              </form>
              <?php } ?>

            </div>

          </div>

          <div class="left13 sidebar">

            <?php include_once("snippets/sidebar.php"); ?>

          </div>

          <div class="clear"></div>

        </div>
        <div class="content">
          <?php include_once("snippets/promociones.php"); ?>
          <?php include('snippets/footer.php'); ?>

        </div>

      </div>

    </div>
  </div>



  <script type="text/javascript">
    var main_menu = new main_menu.dd("main_menu");
    main_menu.init("main_menu", "menuhover");
  </script>
</body>
</html>
