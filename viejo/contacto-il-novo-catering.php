
<!--Wedding Day HTML/CSS/Js template
	Developed by Gabriela Ghiuta @girlscancode
	For any questions, please contact me through my ThemeForest profile
	http://themeforest.net/user/girlscancode
	TEMPLATE: Find Us Page
-->
<!doctype html>

<html lang="es-MX">  
	<title>Contacto Il Novo Catering | Organización de bodas y eventos en México</title>
<?php include_once("snippets/head.php");?>
	<!-- GOOGLE FONTS: Oswald and Arimo -->
		<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic|Oswald:400,300,700|Pinyon+Script' rel='stylesheet' type='text/css'>

	<!-- INCLUDE jQuery -->	
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

	<!-- INCLUDE pretty photo plugin -->
		<script src="js/jquery.prettyPhoto.js"></script>
	
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

	<!-- prettyphoto plugin-->	
		<script type="text/javascript">
			$(document).ready(function(){

		    /* calling the pretty photo plugin */
		    $("a[rel^='prettyPhoto']").prettyPhoto({
		    	social_tools:''
		    });
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
			<p class="fl-right">Il Novo Catering tiene como misión ser el referente gastronómico comprobado, por la calidad de los alimentos, la capacidad de innovación, el servicio personalizado y su confiabilidad.</p>
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
					<div class="fl-left"><h1>Encuéntranos</h1></div><!-- /.fl-left -->

					<!--  THE PAGE BREADCRUMBS -->
					<div class="fl-right"><p id="breadcrumbs"><a href="index.php">Inicio</a> &nbsp;Contacto</p></div><!-- /.fl-right -->
				</div> <!-- /.inner-header-->

				<!-- THE LEFT COLUMN - THE COLUMN CONTAINING ALL THE BLOG POSTS -->
				<div class="fl-left content-col">

					<!--  BEGINNING OF THE SINGLE BLOG POST -->
					<div class="single">

						<!--  THE POST TITLE -->
						<h2>Estamos listos para resolver todas tus dudas</h2>

						<!--  THE POST CONTENT -->
						<p>Nuestro compromiso con la excelencia nos permite crear los mejores conceptos integrales para eventos sociales y empresariales tales como: bautizos, primeras comuniones, quince años, bodas, graduaciones / sesiones de trabajo, congresos, coffee breaks y fiestas de fin de año.						</p>
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3774.1556951202115!2d-99.19354!3d18.924501400000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cddf889933ed4b%3A0x90ba5f5d9a9647cc!2s30%2C+Cuernavaca%2C+MOR!5e0!3m2!1sen!2smx!4v1412198543872" width="650" height="350" frameborder="0" style="border:0" class="alignleft"></iframe>

					</div><!-- /.post2 -->


				</div><!-- /.fl-left-->

				<!-- THE RIGHT COLUMN - THE COLUMN CONTAINING THE BLOG SIDEBAR -->
				<div class="fl-right sidebar-col">
					
					
					<!-- THE contact details WIDGET  -->
					<div class="widget">
						<h3>Información de Contacto</h3>

						<div class="textwidget">
						    Tel:<a href="tel:7771002565"> (777) 100.25.65</a><br>
        					Tel:<a href="tel:7773229384"> (777) 322.93.84</a><br>
       						Email: <a href="mailto:info@ilnovo.catering"> info@ilnovo.catering</a><br>
       					</div><!--/. textwidget <--><br>	
       					<h3>Ve nuestro folleto digital:</h3><br>	
<div data-configid="6298083/9581834" style="width: 260px; height: 256px;" class="issuuembed"></div><script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>
       				</div><!--/. widget -->

				</div><!-- /.fl-right-->

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