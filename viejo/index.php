
<!--Wedding Day HTML/CSS/Js template
	Developed by Gabriela Ghiuta @girlscancode
	For any questions, please contact me through my ThemeForest profile
	http://themeforest.net/user/girlscancode
	TEMPLATE: Homepage_3
-->
<!doctype html>

<html lang="es-MX">  
	<title>Il Novo Catering | Organización de Eventos en México</title>
	<head>

<?php include_once("snippets/head.php");?>
	<!-- GOOGLE FONTS: Oswald and Arimo -->
		<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic|Oswald:400,300,700|Pinyon+Script' rel='stylesheet' type='text/css'>

	<!-- INCLUDE jQuery -->	
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	
	<!-- Include the contact form script-->
		<script type="text/javascript" src="js/jquery.contact.js"></script>

	<!-- INCLUDE NivoSlider script -->
		<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
					
	<!-- The STYLESHEET Link-->
		<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- NivoSlider Style Sheet-->
		<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

	<!-- The HTML5 SHIV - make the HTML5 recognizable by older versions of Internet Explorer -->
		<!--[if lt IE 9]>
			<script src="dist/html5shiv.js"></script>
		<![endif]-->

	<!-- Initialize NivoSlider -->
	<script type="text/javascript">
		$(window).load(function() {
		    $('#slider').nivoSlider({
		        effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
		        slices: 15, // For slice animations
		        boxCols: 8, // For box animations
		        boxRows: 4, // For box animations
		        animSpeed: 700, // Slide transition speed
		        pauseTime: 5000, // How long each slide will show
		        startSlide: 0, // Set starting Slide (0 index)
		        directionNav: false, // Next & Prev navigation
		        directionNavHide: true, // Only show on hover
		        controlNav: true, // 1,2,3... navigation
		        controlNavThumbs: true, // Use thumbnails for Control Nav
		        pauseOnHover: true, // Stop animation while hovering
		        manualAdvance: false, // Force manual transitions
		        prevText: 'Prev', // Prev directionNav text
		        nextText: 'Next', // Next directionNav text
		        randomStart: false, // Start on a random slide
		        beforeChange: function(){}, // Triggers before a slide transition
		        afterChange: function(){}, // Triggers after a slide transition
		        slideshowEnd: function(){}, // Triggers after all slides have been shown
		        lastSlide: function(){}, // Triggers when last slide is shown
		        afterLoad: function(){} // Triggers when slider has loaded
		    });
		$('.nivo-thumbs-enabled').wrap('<div class="controlnav-wrapper" />');
		});
	</script>

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
<!--<![endif]-->

<!--========================================================================================================================
========================================================================================================================
=======================================================THE HEADER ======================================================
======================================================================================================================== -->
	<div class="main-bg"><!-- the div that holds the main background -->
		<div class="slider-wrapper">
			<div class="header-wrapper">
				<?php include_once("snippets/header.php");?>

			</div><!-- /.header-wrapper -->

			<!-- BEGINNING OF THE FULL PAGE SLIDER -->
		    <div id="slider" class="nivoSlider">
		        <img src="images/il-novo-organizacion-de-eventos-mexico-01.jpg" alt="slide 1" data-thumb="images/il-novo-organizacion-de-eventos-mexico-01-th.jpg" /><!-- /. slide no 1 -->
		        <img src="images/il-novo-organizacion-de-eventos-mexico-02.jpg" alt="slide 2" data-thumb="images/il-novo-organizacion-de-eventos-mexico-02-th.jpg" /><!-- /. slide no 2 -->
		        <img src="images/il-novo-organizacion-de-eventos-mexico-03.jpg" alt="slide 3" data-thumb="images/il-novo-organizacion-de-eventos-mexico-03-th.jpg" /><!-- /. slide no 3 -->
		        <img src="images/il-novo-organizacion-de-eventos-mexico-04.jpg" alt="slide 4" data-thumb="images/il-novo-organizacion-de-eventos-mexico-04-th.jpg" />
		</div><!-- /.slider-wrapper -->

<!--========================================================================================================================
    ========================================================================================================================
	=====================================================THE CONTENT AREA ==================================================
	======================================================================================================================== -->

		<div class="clear">&nbsp;</div>

		<!-- THE MAIN CONTENT OF THE HOMEPAGE -->

		<div class="content-wrapper">
			<div class="content-top">&nbsp;</div>
			<div class="content">

				<!-- THE LEFT CONTENT - 'ABOUT US' -->
				<section class="homecontent-left">
					<h2>Todo para la organización de tu boda</h2>
					<h4>Acerca de nosotros</h4>
					<img src="images/il-novo-catering.jpg" alt="about us" class="alignleft" />
					<p>Il Novo Catering es un concepto creativo y vanguardista en la organización de eventos sociales y corporativos; símbolo de exclusividad y distinción en servicios.</p>
					<p>Cada uno de los eventos que realizamos vamos desde atmósferas <i>vintage</i> hasta <i>avant-garde</i> creando así experiencias únicas e innovadoras, que transmiten el sabor de la riqueza culinaria nacional e internacional.</p>
					<p>Nuestro compromiso con la excelencia nos permite crear los mejores conceptos integrales para eventos sociales y empresariales tales como: bautizos, primeras comuniones, quince años, bodas, graduaciones / sesiones de trabajo, congresos, coffee breaks y fiestas de fin de año.					<span class="tip" data-tip="Neque porro quisquam est qui dolorem ipsum quia"></p>
              
            	 </span>
				</section><!-- /.homecontent-left -->

				<!-- THE CENTER CONTENT 'OUR WEDDING DAY IS SET' -->
				<section class="homecontent-center">
					<h3>Mi boda en la playa</h3>
					<img src="images/boda-playa.jpg" alt="blog post 1" class="aligncenter" />
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco [...]</p>
					<a class="readmore fl-right" href="#"><span>Leer más</span></a>
				</section><!-- /.homecontent-center -->

				<!-- THE RIGHT CONTENT 'PLEASE RSVP YOUR INVITATION' -->
				<section class="homecontent-right">
					<h3>Plan Mi boda</h3>
					<img src="images/plan-mi-boda.jpg" alt="blog post 2" class="aligncenter" />
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco [...]</p>
					<a class="readmore fl-right" href="#"><span>Leer más</span></a>
				</section><!-- /.homecontent-right -->
				<!-- THE CENTER CONTENT 'OUR WEDDING DAY IS SET' -->
				<section class="homecontent-center">
					<h3>Mi Graduación</h3>
					<img src="images/boda-playa.jpg" alt="blog post 1" class="aligncenter" />
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco [...]</p>
					<a class="readmore fl-right" href="#"><span>Leer más</span></a>
				</section><!-- /.homecontent-center -->

				<!-- THE RIGHT CONTENT 'PLEASE RSVP YOUR INVITATION' -->
				<section class="homecontent-right">
					<h3>Plan Nuevo</h3>
					<img src="images/plan-mi-boda.jpg" alt="blog post 2" class="aligncenter" />
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco [...]</p>
					<a class="readmore fl-right" href="#"><span>Leer más</span></a>
				</section><!-- /.homecontent-right -->
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