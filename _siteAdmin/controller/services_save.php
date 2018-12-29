<?php

session_start();

set_time_limit(0);

if(isset($_SESSION["idadmin"])){
    
include("../../modules/connection.class.php");
include("../../modules/service.class.php");

$db = new DB();

$conn = $db->connect();


if((!$_REQUEST['op'])||($_REQUEST['op']>60))	{header("Location: ../index.php?pg=tableau-de-bord");}
else{

if($_GET['op']==3){
	$service = new Services();
        if($service->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
        header("location:../index.php?pg=adminServices&info=".$et);
	}
	
	
else if($_REQUEST['op']==4){
	$service = new Services();
	if($service->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminServices&info=".$et);
	}
else if($_GET['op']==5){
 $service = new Services();
 if($service->deleteImageFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
 header("location:../index.php?pg=formServices&id=".$_GET["idMod"]."&info=".$et);
 }
 
else if($_REQUEST['op']==1){
	require("_uploadPhoto.php");
	if($fichier == "d41d8cd98f00b204e9800998ecf8427e."){$fichier = NULL;}
	$service = new Services();
	$service->setServices("",$_REQUEST['titreFr'],$_REQUEST["titreEn"],$_REQUEST["titreAr"],$_REQUEST["descriptionFr"],$_REQUEST["descriptionEn"],$_REQUEST["descriptionAr"],$fichier,$_REQUEST['id_categorie'],date("Y-m-d H:i:s"),$_REQUEST['etat'],$_REQUEST['id_prestataire'],$_REQUEST['prix'],$_REQUEST['prix_promo'],$_REQUEST['isVip']);
	if($service->saveToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminServices&info=".$et);
	}
else if($_REQUEST['op']==2){
	require("_uploadPhoto.php");
    if(isset($fichier)&&($fichier!="d41d8cd98f00b204e9800998ecf8427e.")){$image = $fichier;} else {$image = $_POST["image"];}
	$service = new Services();
	$service->setServices($_REQUEST["id"],$_REQUEST['titreFr'],$_REQUEST["titreEn"],$_REQUEST["titreAr"],$_REQUEST["descriptionFr"],$_REQUEST["descriptionEn"],$_REQUEST["descriptionAr"],$image,$_REQUEST['id_categorie'],$_REQUEST['date_insertion'],$_REQUEST['etat'],$_REQUEST['id_prestataire'],$_REQUEST['prix'],$_REQUEST['prix_promo'],$_REQUEST['isVip']);
	if($service->updateToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminServices&id=".$_REQUEST['id']."&info=".$et);
	}
}}else{header("Location: ../index.php?pg=tableau-de-bord");}
?>

