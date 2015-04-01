
<!--Wedding Day HTML/CSS/Js template
	Developed by Gabriela Ghiuta @girlscancode
	For any questions, please contact me through my ThemeForest profile
	http://themeforest.net/user/girlscancode
	TEMPLATE: Single Page
-->
<!doctype html>

<html lang="eng">  
	<title>Acerca de Il Novo Catering | Organización de bodas y eventos</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
<?php include_once("snippets/head.php");?>
	<!-- GOOGLE FONTS: Oswald and Arimo -->
		<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic|Oswald:400,300,700|Pinyon+Script' rel='stylesheet' type='text/css'>

	<!-- INCLUDE jQuery -->	
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	
	<!-- Include the contact form script-->
		<script type="text/javascript" src="js/jquery.contact.js"></script>
					
	<!-- The STYLESHEET Link-->
		<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- The HTML5 SHIV - make the HTML5 recognizable by older versions of Internet Explorer -->
		<!--[if lt IE 9]>
			<script src="dist/html5shiv.js"></script>
		<![endif]-->

	<!-- Initialize the ToolTip plugin -->
		<script src="js/miniTip.js"></script>
		<script>
		  $(function() {
			  $('.tip').miniTip({
			  	'contentAttribute'      : 'data-tip',
			    'className'             : 'gray',
			    'offset'                : 20,
			    'showAnimateProperties' : {'top': '+=20'},
			    'hideAnimateProperties' : {'top': '-=20'},
			    'offset'				: 35,
			    
			    'onLoad'                : function(element, tooltip) {
			                                $(element).animate({'opacity': 1}, '350');

			                            },
			    'onHide'                : function(element, tooltip) {
			                                $(element).animate({'opacity': 1}, '250');

			                            }
		 	});  
	 	});
		</script>


</head>

<!--[if lte IE 9]> <body class="ie"> <![endif]-->
<!--[if !(IE)]><!--> 
<body> 
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--<![endif]-->
	<div class="main-bg"><!-- the div that holds the main background -->

<!--========================================================================================================================
    ========================================================================================================================
	=======================================================THE HEADER ======================================================
	======================================================================================================================== -->

<?php include_once("snippets/header.php");?><!-- END OF the header -->

<!--========================================================================================================================
    ========================================================================================================================
	=====================================================WELCOME AREA ======================================================
	======================================================================================================================== -->
		
		<div class="inner-welcome-area">

			<!-- THE COUPLE PHOTOS -->
			<div class="fl-left">
				<div class="round-frame her"><img src="images/acerca-de2.png" alt="Acerca de Il Novo Catering" title="Acerca de Il Novo Catering"></div><!-- /.slider-round-her -->
				<div class="round-frame him"><img src="images/acerca-de1.png" alt="Acerca de Il Novo Catering" title="Acerca de Il Novo Catering"></div><!-- /.slider-round-him -->
			</div><!-- /.fl-left -->

			<!-- THE WELCOME TEXT -->
			<p class="fl-right">Gracias por visitarnos. No olvides visitar nuestra zona de <a href="">promociones</a> y ver todo lo que nuestros paquetes pueden ofrecerte. Somos especialistas en bodas vintage y contamos con todo lo necesario para que tu boda o evento sea todo un éxito.</p>
		</div><!-- /.welcome-area -->

<!--========================================================================================================================
    ========================================================================================================================
	=====================================================THE CONTENT AREA ==================================================
	======================================================================================================================== -->

		<div class="clear">&nbsp;</div>

		<div class="content-wrapper">
			<div class="content-top">&nbsp;</div>
			<div class="content inner-page">

				<div class="inner-header">

					<!--  THE PAGE TITLE -->
					<div class="fl-left"><h1>Acerca de Nosotros</h1></div><!-- /.fl-left -->

					<!--  THE PAGE BREADCRUMBS -->
					<div class="fl-right"><p id="breadcrumbs"><a href="index.php">Inicio</a><a href="acerca-de-il-novo-catering.php">Acerca de nosotros</a></p></div><!-- /.fl-right -->
				</div> <!-- /.inner-header-->

				<!-- THE LEFT COLUMN - THE COLUMN CONTAINING ALL THE BLOG POSTS -->
				<div class="fl-left content-col">

					<!--  BEGINNING OF THE SINGLE BLOG POST -->
					<div class="single">

						<!--  THE DATE -->
						<div class="post-date fl-left">
							<span>Oct <br>2014</span>
						</div><!-- /.post-date -->

						<!--  THE POST TITLE -->
						<div class="fl-right">
							<div class="meta">
								<h2>¿Quiénes Somos?</h2>
							</div><!-- /.meta -->
						</div><!-- /.fl-right -->

						<div class="clear">&nbsp;</div>

						<!--  THE POST CONTENT -->
						<p>Il Novo Catering es un concepto creativo y vanguardista en la organización de eventos sociales y corporativos; símbolo de exclusividad y distinción en servicios.</p>
						<p>Cada uno de los eventos que realizamos vamos desde atmósferas vintage hasta avantgard creando así experiencias únicas e innovadoras, que transmiten el sabor de la riqueza culinaria nacional e internacional.</p>

						<!--  A LEFT ALIGNED IMAGE -->
						<img src="images/acerca-de3.png" class="fl-left" alt="blogpost photo">
						
						<p>Nuestro compromiso con la excelencia nos permite crear los mejores conceptos integrales para eventos sociales y empresariales tales como: bautizos, primeras comuniones, quince años, bodas, graduaciones / sesiones de trabajo, congresos, coffee breaks y fiestas de fin de año.</p>
						<p>En Il Novo Catering, no sólo brindamos la posibilidad de llevar a cabo un evento extraordinario en el interior y practicidad de salones, también le ofrecemos la oportunidad de llevar toda la infraestructura al lugar designado por el cliente en exteriores.</p>
						<img src="images/acerca-de4.png" class="fl-right" alt="blogpost photo">

						<!--  A H1 HEADER -->
						
						<!--  A H2 HEADER -->
						<h2>Nuestra Misión:</h2>
						<p>Il Novo Catering tiene como misión ser el referente gastronómico comprobado, por la calidad de los alimentos, la capacidad de innovación, el servicio personalizado y su confiabilidad.</p>
						<p>Porque los momentos importantes de tu vida merecen una gran celebración Il Novo Catering es la mejor opción.</p>

						<!--  A BLOCKQUOTE -->
						<blockquote>El amor es ciego, pero el matrimonio le devuelve la vista - <br> <b> Georg Christoph Lichtenber</b></blockquote>

						<div class="clear">&nbsp;</div>


						<!--  THE COMMENTS -->
						<div class="comments">

							<h2>Déjanos un comentario:</h2>
<div class="fb-comments" data-href="http://www.one-man-studio.com/desarrollo/ilnovo/acerca-de-il-novo-catering.php" data-width="665" data-numposts="5" data-colorscheme="light"></div>
						</div><!-- /.comments -->
						
					</div><!-- /.single -->

					<div class="clear">&nbsp;</div>

				</div><!-- /.fl-left-->

				<!-- THE RIGHT COLUMN - THE COLUMN CONTAINING THE BLOG SIDEBAR -->
<?php include_once("snippets/sidebar.php");?><!-- /.fl-right-->

				<div class="clear">&nbsp;</div>

			</div><!-- /.content -->


<!--========================================================================================================================
    ========================================================================================================================
	=====================================================THE FOOTER AREA ==================================================
	======================================================================================================================== -->

<?php include_once("snippets/footer.php");?><!--/. end of footer -->

		</div><!-- /.content-wrapper -->
	
	</div><!-- /.main-bg -->
	
</body>
</html>