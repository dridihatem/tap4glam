<?php

session_start();
error_reporting(0);
$_SESSION['pfx'] = "azi";
setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
require_once("modules/Connection.class.php");
	$cn = new Connection();
	$cn->connectToDB();
	require_once("controller/diversFunction.php");
	require_once("modules/Annonce_crm.class.php");
	require_once("modules/Ville.class.php");
	require_once("modules/Region.class.php");
	require_once("modules/Administrator.class.php");
	require_once("modules/Parametre.class.php");
	require_once("modules/Recu.class.php");

if(isset($_GET['disconnect'])){ unset($_SESSION["authentification"]);}
header('Content-Type: text/html; charset= utf-8', true);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />


		<!-- Bootstrap core CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="css/font-awesome.min.css" rel="stylesheet">

		<!-- Pace -->
		<link href="css/pace.css" rel="stylesheet">

		<!-- Color box -->
		<link href="css/colorbox/colorbox.css" rel="stylesheet">

		<!-- Morris -->
		<link href="css/morris.css" rel="stylesheet"/>
<link href="js/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet"/>
<link href="js/jquery-ui-1.12.1/jquery-ui.theme.css" rel="stylesheet"/>
<link href="css/jquery.dataTables_themeroller.css" rel="stylesheet">
<!-- Datatable -->
<!-- Chosen -->
	<link href="css/chosen/chosen.min.css" rel="stylesheet"/>


<!-- WYSIHTML5 -->
	<link href="css/bootstrap-wysihtml5.css" rel="stylesheet"/>


		<!-- Endless -->
		<link href="css/endless.min.css" rel="stylesheet">
		<!-- Color box -->
	<link href="css/colorbox/colorbox.css" rel="stylesheet">

		<link href="css/endless-skin.css" rel="stylesheet">

			<!-- Jquery -->

			<script src="js/jquery-1.10.2.min.js"></script>
			<script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
			<!-- Bootstrap -->
			<script src="bootstrap/js/bootstrap.min.js"></script>
			<script type="text/javascript">
							$(document).ready(function(){
									$("#ref").autocomplete({
											source:'autocomplet.php',
											minLength:1
									});
							});
			</script>
			<!-- Flot -->
			<script src='js/jquery.flot.min.js'></script>

			<!-- Morris -->
			<script src='js/rapheal.min.js'></script>
			<script src='js/morris.min.js'></script>

			<!-- Colorbox -->
			<script src='js/jquery.colorbox.min.js'></script>

			<!-- Sparkline -->
			<script src='js/jquery.sparkline.min.js'></script>
			<!-- Chosen -->
				<script src='js/chosen.jquery.min.js'></script>

			<!-- Pace -->
			<script src='js/uncompressed/pace.js'></script>
			<!-- Colorbox -->
				<script src='js/jquery.colorbox.min.js'></script>
			<!-- Popup Overlay -->
			<script src='js/jquery.popupoverlay.min.js'></script>

			<!-- Slimscroll -->
			<script src='js/jquery.slimscroll.min.js'></script>

			<!-- Modernizr -->
			<script src='js/modernizr.min.js'></script>

			<!-- Cookie -->
			<script src='js/jquery.cookie.min.js'></script>
			<script src='js/moment.min.js'></script>
			<script src='js/moment-with-locales.min.js'></script>
			<script>
					$(function()	{
						//Colorbox
						$('.gallery-zoom').colorbox({
							rel:'gallery',
							maxWidth:'90%',
							width:'800px'
						});
					});
				</script>



			<style type="text/css">
			    .time-frame {

			    color: #65cea7;
			    width: 300px;
			}

			.time-frame > div {
			    width: 100%;
			    text-align: center;
			}

			#date-part {
			    font-size: 12px;
			}
			#time-part {
			    font-size: 14px;
			}
			  </style>
			<!-- Endless -->
		<?php if(($_GET['pg'] =="tableau-de-bord") || empty($_GET['pg']))  { ?>
			<script src="js/endless/endless_dashboard.js"></script>
		<?php	 } ?>
		<script src="js/endless/endless_form.js"></script>
		<script src="js/endless/endless.js"></script>

			<!-- Datatable -->
			<!-- WYSIHTML5 -->
				<script src='js/wysihtml5-0.3.0.min.js'></script>
				<script src='js/uncompressed/bootstrap-wysihtml5.js'></script>
		  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" src="js/allscript.js"></script>
		<!-- Export DataTable-->
		<script type="text/javascript" language="javascript" src="js/datatable/dataTables.buttons.min.js"></script>
			<script type="text/javascript" language="javascript" src="js/datatable/buttons.flash.min.js"></script>
			<script type="text/javascript" language="javascript" src="js/datatable/jszip.min.js"></script>
			<script type="text/javascript" language="javascript" src="js/datatable/pdfmake.min.js"></script>
			<script type="text/javascript" language="javascript" src="js/datatable/vfs_fonts.js"></script>
			<script type="text/javascript" language="javascript" src="js/datatable/buttons.html5.min.js"></script>
			<script type="text/javascript" language="javascript" src="js/datatable/buttons.print.min.js"></script>

			<style>
		.dt-buttons{
			position: absolute;
			right: 0;
			top: -36px;

		}
			</style>

<?php
$parametre = new Parametre();
$parametre->getFromDB(1);
$administrateur = new Administrator();
$administrateur->getFromDB($_SESSION['authentification']);

?>

		<title><?php if(isset($_SESSION['authentification'])){ echo stripslashes($parametre->getSociete())."&nbsp;-&nbsp;";} ?>Application de gestion Immobilière 1.01.1</title>



	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	</head>

	<body class="overflow-hidden">
    <!-- Overlay Div -->
    <div id="overlay" class="transparent"></div>
		<div id="wrapper" class="preload">
            	  <!-- Navigation -->
                <?php if(isset($_SESSION['authentification'])) require("menu.php");?>
               <!-- End Navigation-->
               <!-- content -->

               <?php
				if((isset($_SESSION["authentification"]))&&(!empty($_SESSION["authentification"]))){
					echo '<div id="main-container">';
if(file_exists($_GET["pg"].".php")){require($_GET["pg"].".php");}else{require("tableau-de-bord.php");}
echo '</div>
<footer>
		<div class="row">
				<div class="col-sm-6">
						<span class="footer-brand">
								<strong class="text-danger">App</strong> Immobilière version : 1.01.1
						</span>
						<p class="no-margin">
								&copy; '.date("Y").' <strong>Développer par <a href="mailto:dridihatem@gmail.com">DR.H</a></strong>. ALL Rights Reserved. 
						</p>
				</div><!-- /.col -->
		</div><!-- /.row-->
</footer>

<a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	
	<!-- Logout confirmation -->
	<div class="custom-popup width-50" id="logoutConfirm">
		<div class="padding-md">
			<h4 class="m-top-none"> Do you want to logout?</h4>
		</div>

		<div class="text-center">
			<a class="btn btn-success m-right-sm" href="index.php?disconnect">Logout</a>
			<a class="btn btn-danger logoutConfirm_close">Cancel</a>
		</div>
	</div>

';
				}
				else{
				require("formAuthentification.php");
				}
			?>



	



        <!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127818278-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127818278-1');
</script>
    </body>
</html>
