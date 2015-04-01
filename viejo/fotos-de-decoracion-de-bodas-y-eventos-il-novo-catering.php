
<!--Wedding Day HTML/CSS/Js template
	Developed by Gabriela Ghiuta @girlscancode
	For any questions, please contact me through my ThemeForest profile
	http://themeforest.net/user/girlscancode
	TEMPLATE: Gallery Page 1
-->
<!doctype html>

<html lang="eng">  
	<title>Fotos de decoración de Bodas y eventos en México| Il Novo Catering</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
<?php include_once("snippets/head.php");?>
	<!-- GOOGLE FONTS: Oswald and Arimo -->
		<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic|Oswald:400,300,700|Pinyon+Script' rel='stylesheet' type='text/css'>

	<!-- INCLUDE jQuery -->	
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

	<!-- INCLUDE isotope plugin -->
		<script src="js/jquery.isotope.min.js"></script>

	<!-- INCLUDE pretty photo plugin -->
		<script src="js/jquery.prettyPhoto.js"></script>

	<!-- INCLUDE custom js scripts -->
		<script src="js/custom.js"></script>
	
	<!-- Include the contact form script-->
		<script type="text/javascript" src="js/jquery.contact.js"></script>

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
			<p class="fl-right">Aquí podrás ver nuestra galería de fotografías. Usa el filtro para ver por detalle o disfruta navegando entre las miles de ideas y combinaciones que hay para hacer de tu boda un evento increíble y original.</p>
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
					<div class="fl-left"><h1>Fotos de decoración de Bodas y eventos en México</h1></div><!-- /.fl-left -->

					<!--  THE PAGE BREADCRUMBS -->
					<div class="fl-right"><p id="breadcrumbs"><a href="index.pho">Inicio</a> &nbsp;Galería </p></div><!-- /.fl-right -->
				</div> <!-- /.inner-header-->

				<!--  A FULL WIDTH PAGE -->
				<div class="full-col">

					<div class="single">

						<!--  THE PAGE TEXT/CONTENT -->
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

						<!--  ADDING THE PORTFOLIO/GALLERY FILTERS - DON'T FORGET THE "DATA-FILTER"!! -->
						<nav class="portfoliofilter clearfix">
						    <ul>
						    	<li>Filter</li>
						        <li><a href="#" class="selected readmore" data-filter="*"><span>All</span></a></li>
						        <li><a href="#" class="readmore" data-filter=".wedding"><span>The Wedding</span></a></li>
						        <li><a href="#" class="readmore" data-filter=".party"><span>The Party</span></a></li>
						        <li><a href="#" class="readmore" data-filter=".bridesmaids"><span>The Bridesmaids</span></a></li>
						        <li><a href="#" class="readmore" data-filter=".family"><span>The Family</span></a></li>
						        <li><a href="#" class="readmore" data-filter=".misc"><span>Misc</span></a></li>
						    </ul>
						</nav><!-- /.portfoliofilter -->

						<!--  BEGIN CREATING THE IMAGE GALLERY -->
					    <div class="portfolio">

					    	<!--  IMAGE 1 -->
						    <figure class="entry wedding">
							    <a href="images/gallery/portfolio-image1_big.jpg" rel="prettyPhoto[pp_gal]" title="A Photo Tile Goes Here"><img src="images/gallery/portfolio-image1.jpg" alt="gallery image 1"></a>
							    <span class="title">A Photo Tile Goes Here</span>
							</figure>

							<!--  IMAGE 2 -->
							<figure class="entry wedding">
							    <a href="images/gallery/portfolio-image2_big.jpg" rel="prettyPhoto[pp_gal]" title="A Photo Tile Goes Here"><img src="images/gallery/portfolio-image2.jpg" alt="gallery image 2"></a>
							    <span class="title">A Photo Tile Goes Here</span>
							</figure>

							<!--  IMAGE 3 -->
							<figure class="entry party">
							    <a href="images/gallery/portfolio-image3_big.jpg" rel="prettyPhoto[pp_gal]" title="A Photo Tile Goes Here"><img src="images/gallery/portfolio-image3.jpg" alt="gallery image 3"></a>
							    <span class="title">A Photo Tile Goes Here</span>
							</figure>

							<!--  IMAGE 4 -->
							<figure class="entry bridesmaids">
							    <a href="images/gallery/portfolio-image4_big.jpg" rel="prettyPhoto[pp_gal]" title="A Photo Tile Goes Here"><img src="images/gallery/portfolio-image4.jpg" alt="gallery image 4"></a>
							    <span class="title">A Photo Tile Goes Here</span>
							</figure>

							<!--  IMAGE 5 -->
							<figure class="entry wedding">
							    <a href="images/gallery/portfolio-image5_big.jpg" rel="prettyPhoto[pp_gal]" title="A Photo Tile Goes Here"><img src="images/gallery/portfolio-image5.jpg" alt="gallery image 5"></a>
							    <span class="title">A Photo Tile Goes Here</span>
							</figure>

							<!--  IMAGE 6 -->
							<figure class="entry family">
							    <a href="images/gallery/portfolio-image6_big.jpg" rel="prettyPhoto[pp_gal]" title="A Photo Tile Goes Here"><img src="images/gallery/portfolio-image6.jpg" alt="gallery image 6"></a>
							  	<span class="title">A Photo Tile Goes Here</span>
							</figure>

							<!--  IMAGE 7 -->
							<figure class="entry misc">
							    <a href="images/gallery/portfolio-image7_big.jpg" rel="prettyPhoto[pp_gal]" title="A Photo Tile Goes Here"><img src="images/gallery/portfolio-image7.jpg" alt="gallery image 7"></a>
							    <span class="title">A Photo Tile Goes Here</span>
							</figure>

							<!--  IMAGE 8 -->
							<figure class="entry ridesmaids">
							    <a href="images/gallery/portfolio-image8_big.jpg" rel="prettyPhoto[pp_gal]" title="A Photo Tile Goes Here"><img src="images/gallery/portfolio-image8.jpg" alt="gallery image 8"></a>
							    <span class="title">A Photo Tile Goes Here</span>
							</figure>

							<!--  IMAGE 9 -->
							<figure class="entry party">
							    <a href="images/gallery/portfolio-image9_big.jpg" rel="prettyPhoto[pp_gal]" title="A Photo Tile Goes Here"><img src="images/gallery/portfolio-image9.jpg" alt="gallery image 9"></a>
							    <span class="title">A Photo Tile Goes Here</span>
							</figure>

						</div>
						
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