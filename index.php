<?phpsession_start();error_reporting(0);$_SESSION['pfx'] = "tap";$_SESSION['lng'] = "Fr";require_once("modules/connection.class.php");$db = new DB();$conn = $db->connect();require_once("modules/diversFunction.php");require_once("modules/class.paginationFr.php");require_once("modules/modules.class.php");require_once("modules/contact.class.php");require_once("modules/configuration.class.php");require_once("modules/categorie.class.php");require_once("modules/service.class.php");require_once("modules/prestataire.class.php");if(isset($_GET['m']) && !empty($_GET['m']) && is_numeric($_GET['m'])){ 		$module = new Module();		$module->getFromDB($_GET['m']);}else{		$module = new Module();		$module->getFromDB(1);}				if($_SESSION['lng']=="Fr"){			$contents = stripslashes($module->getContenuFr());			$nomModule = stripslashes($module->getNomFr());			$image = $module->getImage();		}                else if($_SESSION['lng']=="En"){			$contents = stripslashes($module->getContenuEn());			$nomModule = stripslashes($module->getNomEn());			$image = $module->getImage();		}					header('Content-Type: text/html; charset= utf-8', true);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]--><!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]--><!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]--><!--[if gt IE 8]><!--> <html lang="en" class="no-js">    <!--<![endif]--><head><meta name="language" content="<?php echo $_SESSION['lng']; ?>" /><?php if (!empty($_GET["sm"]) && isset($_GET['sm']) && is_numeric($_GET['sm'])){echo '<title>Tap4glam | '.$nomModule.'</title><meta name="Title" content="Tap4glam | '.$nomModule.'"><meta name="keyword" content ="" /><meta name="Description" content=""><meta name="DC.Title" content="Tap4glam | '.$nomModule.'"><meta name="DC.Content-Type" content="UTF-8"><meta name="DC.Content-Language" content="'.$_SESSION['lng'].'"><meta name="DC.Description" content=""><meta name="Copyright" content="Tap4glam"><meta name="Author" content="Synapse consulting"><meta name="Identifier-Url" content="www.tap4glam.com"><meta name="Reply-To" content="commercial@tap4glam.com"><meta name="Revisit-After" content="30 days"><meta name="Robots" content="all"><meta name="Rating" content="general"><meta name="Distribution" content="global"><meta name="Geography" content="Tunis, Ariana,2036"><meta name="Category" content="Cosmetics"><meta name="DC.Copyright" content="Tap4glam"><meta name="DC.Author" content="Tap4glam"><meta name="DC.Identifier-Url" content="www.Tap4glam.com"><meta name="DC.Reply-To" content="commercial@Tap4glam.com">';}else if(isset($_GET['m']) && !empty($_GET['m']) && is_numeric($_GET['m']) && !isset($_GET['sm']) && !isset($_GET['ssm']) && !isset($_GET['sssm'])){echo '<title>Tap4glam | '.$nomModule.'</title><meta name="Title" content="Tap4glam | '.$nomModule.'"><meta name="keyword" content ="" /><meta name="Description" content=""><meta name="DC.Title" content="Tap4glam | '.$nomModule.'"><meta name="DC.Content-Type" content="UTF-8"><meta name="DC.Content-Language" content="'.$_SESSION['lng'].'"><meta name="DC.Description" content=""><meta name="Copyright" content="Tap4glam"><meta name="Author" content="Tap4glam"><meta name="Identifier-Url" content="www.Tap4glam.com"><meta name="Reply-To" content="commercial@Tap4glam.com"><meta name="Revisit-After" content="30 days"><meta name="Robots" content="all"><meta name="Rating" content="general"><meta name="Distribution" content="global"><meta name="Geography" content=""><meta name="Category" content="Services"><meta name="DC.Copyright" content="Tap4glam"><meta name="DC.Author" content="Tap4glam"><meta name="DC.Identifier-Url" content="www.Tap4glam.com"><meta name="DC.Reply-To" content="commercial@Tap4glam.com">';}else if(empty($_GET["m"]) && !isset($_GET['m']) && !is_numeric($_GET['m'])){echo '<title>Tap4glam | '.$nomModule.'</title><title>Tap4glam | '.$nomModule.'</title><meta name="Title" content="Tap4glam | '.$nomModule.'"><meta name="keyword" content=""  /><meta name="Description" content=""><meta name="DC.Title" content="Tap4glam | '.$nomModule.'"><meta name="DC.Content-Type" content="UTF-8"><meta name="DC.Content-Language" content="'.$_SESSION['lng'].'"><meta name="DC.Description" content=""><meta name="Copyright" content="Tap4glam"><meta name="Author" content="Tap4glam"><meta name="Identifier-Url" content="www.Tap4glam.com"><meta name="Reply-To" content="commercial@Tap4glam.com"><meta name="Revisit-After" content="30 days"><meta name="Robots" content="all"><meta name="Rating" content="general"><meta name="Distribution" content="global"><meta name="Geography" content=""><meta name="Category" content="Services"><meta name="DC.Copyright" content="Tap4glam"><meta name="DC.Author" content="Tap4glam"><meta name="DC.Identifier-Url" content="www.Tap4glam.com"><meta name="DC.Reply-To" content="commercial@Tap4glam.com">';}else {  echo '<title>Tap4glam | '.$nomModule.'</title><meta name="Title" content="Tap4glam | '.$nomModule.'"><meta name="keyword" content=""  /><meta name="Description" content=""><meta name="DC.Title" content="Tap4glam | '.$nomModule.'"><meta name="DC.Content-Type" content="UTF-8"><meta name="DC.Content-Language" content="'.$_SESSION['lng'].'"><meta name="DC.Description" content=""><meta name="Copyright" content="Tap4glam"><meta name="Author" content="Tap4glam"><meta name="Identifier-Url" content="www.Tap4glam.com"><meta name="Reply-To" content="commercial@Tap4glam.com"><meta name="Revisit-After" content="30 days"><meta name="Robots" content="all"><meta name="Rating" content="general"><meta name="Distribution" content="global"><meta name="Geography" content="Tunis, Ariana,2036"><meta name="Category" content="Services"><meta name="DC.Copyright" content="Tap4glam"><meta name="DC.Author" content="Tap4glam"><meta name="DC.Identifier-Url" content="www.powermotors.com.tn"><meta name="DC.Reply-To" content="commercial@powermotors.com.tn">';}   ?><meta name=" robots" content="all" /><meta name="Copyright" content="Tap4glam" /><meta name="reply-to" content="contact@Tap4glam.com" /><meta name="distribution" content="global" /><meta name="revisit-after" content="30 days" /><meta name="author" lang="Fr" content="Synapse consulting" /><meta name="identifier-url" content="www.Tap4glam.com" /><meta name="expires" content="never" /><meta name="Date-Creation-yyyymmdd" content="20181120" /><meta name="generator" content= "CMS Synapse – language de programmation open source."/><meta name="viewport" content="width=device-width, initial-scale=1" />			<!-- all css here -->        <link rel="stylesheet" href="assets/css/bootstrap.min.css">                 <link rel="stylesheet" href="assets/css/bundle.css">        <link rel="stylesheet" href="assets/css/plugins.css">        <link rel="stylesheet" href="assets/css/style.css">        <link rel="stylesheet" href="assets/css/responsive.css">        <link rel="stylesheet" href="assets/css/news.css">        <link rel="stylesheet" type="text/css" href="assets/css/parallax.css">        <link rel="stylesheet" type="text/css" href="assets/css/service_animation.css">       <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" />        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script></head><body><?php include("includes/Main/header".$_SESSION['lng'].".php");   	if(isset($_GET['m']) && !empty($_GET['m']) && $_GET['m'] != 1){	/*require("includes/Main/slide_fix".$_SESSION['lng'].".php");	*/	require("tpl_page".$_SESSION['lng'].".php");    }		else {                 require ("includes/Main/slide".$_SESSION['lng'].".php");			 require("tpl_home".$_SESSION['lng'].".php");}		   include("includes/Main/footer".$_SESSION['lng'].".php");$delai_clic = 12*3600; //delai avant qu'un nouveau clic ne soit recomptabiliser (12*3600 = 12h)$tab_id = array();$sqlUpdate="UPDATE ".$_SESSION['pfx']."_visits SET nbre_visite = nbre_visite + 1 WHERE id = 1";//si on a pas encore visiter le siteif (!isset($_COOKIE["PHPSESSID"])){ //envoi de la requete pour comptabiliser le clic     $resultat=mysql_query($sqlUpdate);}  ?> <!-- Javascript --><script src="assets/js/vendor/jquery-1.12.0.min.js"></script><script src="assets/js/popper.js"></script><script src="assets/js/bootstrap.min.js"></script><script src="assets/js/plugins.js"></script><script src="assets/js/main.js"></script><script type="text/javascript">	$(document).on('click','#save',function(e) {  var data = $("#form-search").serialize();  $.ajax({         data: data,         type: "post",         url: "newsletter.php",         success: function(data){         	$("#message_success").show();setTimeout(function() { $("#message_success").hide(); }, 5000);         	                      }});  return false; });</script></body></html>