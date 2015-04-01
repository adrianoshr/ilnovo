<?
session_start();
if(isset($_POST['submitted'])) {

$event1 = trim($_POST['event1']);
$event2 = trim($_POST['event2']);
$event3 = trim($_POST['event3']);
$event4 = trim($_POST['event4']);

$mainmeal = trim($_POST['mainmeal']);
$desert = trim($_POST['desert']);
$menunotes = trim($_POST['menunotes']);
$guests = trim($_POST['guests']);

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$comment = trim($_POST['comment']);

$emailTo = "adrian@one-man-studio.com";
$subject = 'COTIZACION de la página web de Il Novo '.$name;			
$body = "Name: $name \n\n Email: $email \n\n Phone: $phone \n\n  Message: $comment \n\n Event will be attending at:\n\n $event1 \n $event2 \n $event3 \n $event4 \n\n Main meal selection:  $mainmeal \n\n Desert selection: $desert \n\n Menu notes: $menunotes \n\n Number of guests: $guests";
$headers = 'From: '. $name .' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
@mail($emailTo, $subject, $body, $headers);						
$emailSent = true;

}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1" />
<meta name="author" content="FamousThemes" />
<meta name="description" content="Get in the spotlight" />
<meta name="keywords" content="premium css templates, premium wordpress themes, famous themes, themeforest" />
<?php include_once("snippets/head.php");?>
<title>Cotización para bodas y eventos en México | Il Novo Catering</title>
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
  $(window).load(function() {
    $('.flexslider').flexslider({
          animation: "fade"
    });
  
  $(function() {
    $('.show_menu').click(function(){
        $('.menu').fadeIn();
        $('.show_menu').fadeOut();
        $('.hide_menu').fadeIn();
    });
    $('.hide_menu').click(function(){
        $('.menu').fadeOut();
        $('.show_menu').fadeIn();
        $('.hide_menu').fadeOut();
    });
  });
  

  });
  
  jQuery(function($){
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
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="shadow_bg">
<div id="main_container">
<?php include_once("snippets/header.php");?>
  

<div id="center_container">
<?php include_once("snippets/logo.php");?><!-- End of Header-->
     

  <div class="pages_title">
  <h2>Dínos que tipo de evento te <span>interesa</span></h2>
  </div> 
   
   <div class="content">
        <div class="left23">
    
      <div class="form_content">
            
            
            
                <form id="form1" method="post" action="">
      <h3 class="form_subtitle">Selecciona tu tipo de evento</h3>
              <div class="form_rsvp">
                    <div class="form_row_rsvp">
                    <div class="checkbox_container"><input type="checkbox" class="form_checkbox" /></div> <span class="checkbox_value">Boda</span>  
                    </div>
                    <div class="form_row_rsvp">
                    <div class="checkbox_container"><input type="checkbox" class="form_checkbox" /></div> <span class="checkbox_value">Banquete</span>  
                    </div>
                    <div class="form_row_rsvp">
                    <div class="checkbox_container"><input type="checkbox" class="form_checkbox" /></div> <span class="checkbox_value">Empresarial</span>  
                    </div>
                    <div class="form_row_rsvp">
                    <div class="checkbox_container"><input type="checkbox" class="form_checkbox" /></div> <span class="checkbox_value">Social</span>  
                    </div>
                    <div class="form_row_rsvp">
                    <div class="checkbox_container"><input type="checkbox" class="form_checkbox" /></div> <span class="checkbox_value">Graducación</span> 
                    </div>
                    <div class="form_row_rsvp">
                    <div class="checkbox_container"><input type="checkbox" class="form_checkbox" /></div> <span class="checkbox_value">Quince Años</span> 
                    </div>
                    <div class="form_row_rsvp">
                    <div class="checkbox_container"><input type="checkbox" class="form_checkbox" /></div> <span class="checkbox_value">Fin de año</span> 
                    </div>
                    <div class="form_row_rsvp">
                    <div class="checkbox_container"><input type="checkbox" class="form_checkbox" /></div> <span class="checkbox_value">Coffee Brake</span> 
                    </div>                    
                </div>
                
      <h3 class="form_subtitle">¡Ya tienes lugar para el evento?</h3>
              <div class="form_rsvp">
                    <div class="form_row_rsvp">
                    <div class="checkbox_container"><input type="radio" class="form_radio" name="attending" /></div> <span class="checkbox_value">Si</span>  
                    </div>
                    <div class="form_row_rsvp">
                    <div class="checkbox_container"><input type="radio" class="form_radio" name="attending" /></div> <span class="checkbox_value">No</span>  
                    </div>

                </div>

                
           <h3 class="form_subtitle">Detalles del evento</h3>
              <div class="form">
                    <div class="form_row">
                    <label>Invitados:</label>
                    <div class="select_container">
                    <select class="form_select">
                    <option>0 - 50</option>
                    <option>50 - 100</option>
                    <option>100 - 200</option>
                    <option>200 - 300</option>
                    <option>Más de 500</option>
                    </select>
                    </div>
                    </div>
                    <div class="form_row">
                    <label>Nombre</label>
                    <input type="text" class="form_input" name="name" />
                    </div>
                    <div class="form_row">
                    <label>Email:</label>
                    <input type="text" class="form_input" name="email" />
                    </div>
                    <div class="form_row">
                    <label>Teléfono:</label>
                    <input type="text" class="form_input" name="url" />
                    </div>
                    <div class="form_row">
                    <label>Detalles:</label>
                    <textarea class="form_textarea" name="comment" value="Hola"></textarea>
                    </div>
                    <div class="form_row">
                    <input type="submit" class="form_submit_contact" value="Envíar Información" />
                    </div> 
              </div>
                </form>
            </div>
        </div>

      <div class="left13 sidebar">
<?php include_once("snippets/sidebar.php");?>

        </div>

        <div class="clear"></div>

   </div>
      <div class="content">
      <?php include_once("snippets/promociones.php");?>
                        <?php include('snippets/footer.php'); ?>

      </div>
</div>

     


</div>

</div>

   


<script type="text/javascript">
var main_menu=new main_menu.dd("main_menu");
main_menu.init("main_menu","menuhover");
</script>
</body>
</html>

