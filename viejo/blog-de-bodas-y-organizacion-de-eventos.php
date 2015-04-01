
<!--Wedding Day HTML/CSS/Js template
	Developed by Gabriela Ghiuta @girlscancode
	For any questions, please contact me through my ThemeForest profile
	http://themeforest.net/user/girlscancode
	TEMPLATE: BlogPage_2
-->
<!doctype html>

<html lang="es-MX">  
	<title>Blog de Bodas y Organización de eventos | Il Novo Catering</title>

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
			<p class="fl-right">En nuestro blog encontrarás lo último en tendencias de bodas. Desde lo más tradicional hasta las ideas mas vintage para que tu boda sea la más original e inolvidable!</p>
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
					<div class="fl-left"><h1>Blog de Bodas y organización de eventos en México</h1></div><!-- /.fl-left -->

					<!--  THE PAGE BREADCRUMBS -->
					<div class="fl-right"><p id="breadcrumbs"><a href="index.php">Inicio</a> &nbsp;Blog de Bodas y organización de eventos</p></div><!-- /.fl-right -->
				</div> <!-- /.inner-header-->

				<!-- THE LEFT COLUMN - THE COLUMN CONTAINING ALL THE BLOG POSTS -->
				<div class="fl-left content-col">

					<!-- BLOG POST NO 1 -->
					<div class="post2">

						<!-- THE BLOG POST DATE -->
						<div class="post-date fl-left">
							<span>Nov 20</span>
						</div><!-- /.post-date -->

						<!-- THE BLOG POST META INFORMATION -->
						<div class="fl-right">
							<div class="meta">
								<!-- THE BLOG POST TITLE -->
								<h2><a href="articulo.php">Artículo</a></h2>
								Por<a href="#">Il Novo Catering</a>  |  en <a href="#">Categoría 1</a>  
							</div><!-- /.meta -->
						</div><!-- /.fl-right -->

						<div class="clear">&nbsp;</div>

						<!-- THE BLOG POST IMAGE/THUMBNAIL -->
						<div class="image-bg fl-left"><img src="images/blog_examplephoto2.jpg" class="thumbnail" alt="blogpost photo"><img src="images/image-bg-small.png" class="image-background" alt="image background"></div><!-- /.image-bg -->

						<!-- THE BLOG POST ACTUAL CONTENT -->
						<div class="post-content fl-right">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident [..]
							<a class="readmore fl-right" href="articulo.php"><span>Leer Más</span></a>
						</div><!-- /.post-content -->	
						
						<div class="clear">&nbsp;</div>
						
					</div><!-- /.post2 -->

					<div class="clear">&nbsp;</div>

					<!-- BLOG POST NO 2 -->
					<div class="post2">

						<!-- THE BLOG POST DATE -->
						<div class="post-date fl-left">
							<span>Nov 20</span>
						</div><!-- /.post-date -->

						<!-- THE BLOG POST META INFORMATION -->
						<div class="fl-right">
							<div class="meta">
								<!-- THE BLOG POST TITLE -->
								<h2><a href="articulo.php">Artículo</a></h2>
								Por<a href="#">Il Novo Catering</a>  |  en <a href="#">Categoría 1</a>  
							</div><!-- /.meta -->
						</div><!-- /.fl-right -->

						<div class="clear">&nbsp;</div>

						<!-- THE BLOG POST IMAGE/THUMBNAIL -->
						<div class="image-bg fl-left"><img src="images/blog_examplephoto2_post2.jpg" class="thumbnail" alt="blogpost photo"><img src="images/image-bg-small.png" class="image-background" alt="image background"></div><!-- /.image-bg -->

						<!-- THE BLOG POST ACTUAL CONTENT -->
						<div class="post-content fl-right">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident [..]
							<a class="readmore fl-right" href="articulo.php"><span>Leer Más</span></a>
						</div><!-- /.post-content -->	
						
						<div class="clear">&nbsp;</div>
						
					</div><!-- /.post2 -->

					<div class="clear">&nbsp;</div>

					<!-- BLOG POST NO 3 -->
					<div class="post2">

						<!-- THE BLOG POST DATE -->
						<div class="post-date fl-left">
							<span>Nov 20</span>
						</div><!-- /.post-date -->

						<!-- THE BLOG POST META INFORMATION -->
						<div class="fl-right">
							<div class="meta">
								<!-- THE BLOG POST TITLE -->
								<h2><a href="articulo.php">Artículo</a></h2>
								Por<a href="#">Il Novo Catering</a>  |  en <a href="#">Categoría 1</a>  
							</div><!-- /.meta -->
						</div><!-- /.fl-right -->

						<div class="clear">&nbsp;</div>

						<!-- THE BLOG POST IMAGE/THUMBNAIL -->
						<div class="image-bg fl-left"><img src="images/blog_examplephoto2_post3.jpg" class="thumbnail" alt="blogpost photo"><img src="images/image-bg-small.png" class="image-background" alt="image background"></div><!-- /.image-bg -->

						<!-- THE BLOG POST ACTUAL CONTENT -->
						<div class="post-content fl-right">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident [..]
							<a class="readmore fl-right" href="articulo.php"><span>Leer Más</span></a>
						</div><!-- /.post-content -->	
						
						<div class="clear">&nbsp;</div>
						
					</div><!-- /.post2 -->

					<div class="clear">&nbsp;</div>

					<!-- THE BLOG PAGINATION  -->
					<div class="pagination">
						<span class="current">1</span>
						<a class="inactive" href="#">2</a>
						<a class="inactive" href="#">3</a>
						<a href="#">»</a>
					</div><!-- /.pagination -->


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