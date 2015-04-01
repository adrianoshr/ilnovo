
<!--Wedding Day HTML/CSS/Js template
	Developed by Gabriela Ghiuta @girlscancode
	For any questions, please contact me through my ThemeForest profile
	http://themeforest.net/user/girlscancode
	TEMPLATE: Wedding Page
-->
<!doctype html>

<html lang="eng">  
	<title>Organización de bodas vintage y eventos | Il Novo Catering</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
<?php include_once("snippets/head.php");?>
	<!-- GOOGLE FONTS: Oswald and Arimo -->
		<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic|Oswald:400,300,700|Pinyon+Script' rel='stylesheet' type='text/css'>

	<!-- INCLUDE jQuery -->	
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

	<!-- Include the contact form script-->
		<script type="text/javascript" src="js/jquery.contact.js"></script>
			
	<!-- INCLUDE isotope plugin -->
		<script src="js/jquery.isotope.min.js"></script>

	<!-- INCLUDE pretty photo plugin -->
		<script src="js/jquery.prettyPhoto.js"></script>

	<!-- INCLUDE custom js scripts -->
		<script src="js/custom.js"></script>
			
	<!-- The STYLESHEET Link-->
		<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- The PrettyPhoto Link-->
		<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">

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
				<div class="round-frame her"><img src="images/acerca-de2.png" alt="the bride"></div><!-- /.slider-round-her -->
				<div class="round-frame him"><img src="images/acerca-de1.png" alt="the groom"></div><!-- /.slider-round-him -->
			</div><!-- /.fl-left -->

			<!-- THE WELCOME TEXT -->
			<p class="fl-right">Cada uno de los eventos que realizamos vamos desde atmósferas <i>vintage</i> hasta <i>avant-garde</i> creando así experiencias únicas e innovadoras, que transmiten el sabor de la riqueza culinaria nacional e internacional.</p>
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
					<div class="fl-left"><h1>Conoce nuestros servicios de organización de eventos</h1></div><!-- /.fl-left -->

					<!--  THE PAGE BREADCRUMBS -->
					<div class="fl-right"><p id="breadcrumbs"><a href="index.php">Inicio</a> Servicios </p></div><!-- /.fl-right -->
				</div> <!-- /.inner-header-->

				<!--  A FULL WIDTH PAGE -->
				<div class="full-col">

					<div class="single">

						<!--  SOME CONTENT -->
						<p>Il Novo Catering tiene como misión ser el referente gastronómico comprobado, por la calidad de los alimentos, la capacidad de innovación, el servicio personalizado y su confiabilidad. Porque los momentos importantes de tu vida merecen una gran celebración Il Novo Catering es la mejor opción.</p>


						<!--  BEGINNING OF THE LEFT BRANCH - THE BRIDE'S FAMILY AND FRIENDS -->
						<ul class="fl-left left-branch">

							<!--  THE BRIDE FAMILY -->
							<li class="bride">
								<div class="bride-name"><h3>Bodas y Eventos</h3></div><!--  BRIDE NAME -->

								<ul class="fl-left participant-details">

									<!--  BRIDE MOTHER -->
									<li>
										<div class="round-frame fl-left">
											<img src="images/vintage.jpg" alt="her mother"><!--  BRIDE MOTHER PHOTO -->
										</div> <!-- /.round-frame -->
										<span class="parentname fl-right">Vintage</span> <!--  BRIDE MOTHER NAME -->
										<div class="clear"></div>
									</li>

									<!--  BRIDE FATHER -->
									<li>
										<div class="round-frame fl-left">
											<img src="images/tradicional.jpg" alt="her father">
										</div><!-- /.round-frame -->
										<span class="parentname fl-right">Tradicional </span> <!--  BRIDE FATHER NAME -->
										<div class="clear"></div>
									</li>
								</ul><!-- /.participant-details -->
								
								<div class="fl-right round-frame">
									<img src="images/boda.jpg" alt="the bride"><!--  BRIDE PHOTO -->
								</div><!-- /.participant-photo -->
							</li>

							<!--  THE BRIDE FRIENDS -->

							<!--  BRIDEMAID 1 -->
							<li>
								<div class="fl-left participant-details">

									<!--  BRIDEMAID NAME -->
									<h4>Empresariales</h4>

									<!--  BRIDEMAID TITLE -->
									<h5>Organiza un evento emrpesarial original</h5>

									<!--  BRIDEMAID VISIBLE DESCRIPTION -->
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>

									<!--  BRIDEMAID READMORE DESCRIPTION -->
									<p class="seemore">et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

									<!--  BRIDEMAID READMORE BUTTON -->
									<div class="readmore fl-left"><span>Leer más</span></div>
									
								</div><!-- /.participant-details -->
								
								<div class="fl-right round-frame">
									<img src="images/empresariales.jpg" alt="maid of honor"><!--  BRIDEMAID PHOTO -->
								</div><!-- /.participant-photo -->
								<div class="clear"></div>
							</li>

							<!--  BRIDEMAID 2 -->
							<li>
								<div class="fl-left participant-details">

									<!--  BRIDEMAID NAME -->
									<h4>Quince Años</h4>

									<!--  BRIDEMAID TITLE -->
									<h5>Brilla en tu fiesta</h5>

									<!--  BRIDEMAID VISIBLE DESCRIPTION -->
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>

									<!--  BRIDEMAID READMORE DESCRIPTION -->
									<p class="seemore">et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

									<!--  BRIDEMAID READMORE BUTTON -->
									<div class="readmore fl-left"><span>Leer más</span></div>
									
								</div><!-- /.participant-details -->
								
								<div class="fl-right round-frame">
									<img src="images/quince.jpg" alt="bride maid"><!--  BRIDEMAID PHOTO -->
								</div><!-- /.participant-photo -->
								<div class="clear"></div>
							</li>

							<!--  BRIDEMAID 3 -->
							<li>
								<div class="fl-left participant-details">

									<!--  BRIDEMAID NAME -->
									<h4>Coffee Brakes</h4>

									<!--  BRIDEMAID TITLE -->
									<h5>Lo mejor en ese tiempo de espera</h5>

									<!--  BRIDEMAID VISIBLE DESCRIPTION -->
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>

									<!--  BRIDEMAID READMORE DESCRIPTION -->
									<p class="seemore">et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

									<!--  BRIDEMAID READMORE BUTTON -->
									<div class="readmore fl-left"><span>Leer más</span></div>
									
								</div><!-- /.participant-details -->
								
								<div class="fl-right round-frame">
									<img src="images/coffee.jpg" alt="bride maid"><!--  BRIDEMAID PHOTO -->
								</div><!-- /.participant-photo -->
								<div class="clear"></div>
							</li>
						</ul><!-- /.left-branch -->


						<!--  BEGINNING OF THE LEFT BRANCH - THE GROOMS'S FAMILY AND FRIENDS -->
						<ul class="fl-right right-branch">

							<!--  THE GROOM FAMILY -->
							<li class="groom">
								<div class="groom-name"><h3>Banquetes</h3></div> <!--  GROOM NAME -->

								<div class="fl-right round-frame">
									<img src="images/banquetes.jpg" alt="the groom"><!--  GROOM PHOTO -->
								</div><!-- /.participant-photo -->

								<ul class="fl-right participant-details">

									<!--  GROOM MOTHER-->
									<li>
										<div class="round-frame fl-right">
											<img src="images/menu.jpg" alt="his mother"><!--  GROOM MOTHER PHOTO -->
										</div> <!-- /.round-frame -->
										<span class="parentname fl-right">A la Carta</span><!--  GROOM MOTHER NAME -->
										<div class="clear"></div>
									</li>

									<!--  GROOM FATHER-->
									<li>
										<div class="round-frame fl-right">
											<img src="images/bufette.jpg" alt="his father"><!--  GROOM FATHER PHOTO -->
										</div><!-- /.round-frame -->
										<span class="parentname fl-right">Bufete </span><!--  GROOM FATHER NAME -->
										<div class="clear"></div>
									</li>
								</ul><!-- /.participant-details -->
							</li>

							<!--  THE GROOM FRIENDS -->

							<!--  GROOMSMAN 1 -->
							<li>
								<div class="fl-right participant-details">

									<!--  GROOMSMAN NAME -->
									<h4>Sociales</h4>

									<!--  GROOMSMAN TITLE -->
									<h5>Organizamos todo tipo de evento social</h5>

									<!--  GROOMSMAN VISIBLE DESCRIPTION -->
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>

									<!--  GROOMSMAN READMORE DESCRIPTION -->
									<p class="seemore">et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

									<!--  GROOMSMAN READMORE BUTTON -->
									<div class="readmore fl-left"><span>Leer más</span></div>
									
								</div><!-- /.participant-details -->
								
								<div class="fl-left round-frame">
									<img src="images/sociales.jpg" alt="best man"><!--  GROOMSMAN photo -->
								</div><!-- /.participant-photo -->
								<div class="clear"></div>
							</li>

							<!--  GROOMSMAN 2 -->
							<li>
								<div class="fl-right participant-details">

									<!--  BRIDEMAID NAME -->
									<h4>Familiares</h4>

									<!--  BRIDEMAID TITLE -->
									<h5>Nada como disfrutar con la familia</h5>

									<!--  BRIDEMAID VISIBLE DESCRIPTION -->
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>

									<!--  BRIDEMAID READMORE DESCRIPTION -->
									<p class="seemore">et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

									<!--  BRIDEMAID READMORE BUTTON -->
									<div class="readmore fl-left"><span>Leer más</span></div>
									
								</div><!-- /.participant-details -->
								
								<div class="fl-left round-frame">
									<img src="images/familiares.jpg" alt="best man"><!--  GROOMSMAN photo -->
								</div><!-- /.participant-photo -->
								<div class="clear"></div>
							</li>

							<!--  GROOMSMAN 3 -->
							<li>
								<div class="fl-right participant-details">

									<!--  BRIDEMAID NAME -->
									<h4>Fin de Año</h4>

									<!--  BRIDEMAID TITLE -->
									<h5>Empieza el año con estilo</h5>

									<!--  BRIDEMAID VISIBLE DESCRIPTION -->
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>

									<!--  BRIDEMAID READMORE DESCRIPTION -->
									<p class="seemore">et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

									<!--  BRIDEMAID READMORE BUTTON -->
									<div class="readmore fl-left"><span>Leer más</span></div>
									
								</div><!-- /.participant-details -->
								
								<div class="fl-left round-frame">
									<img src="images/fin-de-anio.jpg" alt="best man"><!--  GROOMSMAN photo -->
								</div><!-- /.participant-photo -->
								<div class="clear"></div>
							</li>

						</ul><!-- /.right-branch -->
						
						<div class="clear">&nbsp;</div>
						
					</div><!-- /.single -->

					<div class="clear">&nbsp;</div>

				</div><!-- /.fullcol -->

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