<?php

session_start();

set_time_limit(0);

if(isset($_SESSION["idadmin"])){
    
include("../../modules/connection.class.php");
include("../../modules/pack.class.php");

$db = new DB();

$conn = $db->connect();


if((!$_REQUEST['op'])||($_REQUEST['op']>60))	{header("Location: ../index.php?pg=tableau-de-bord");}
else{

if($_GET['op']==3){
	$pack = new Pack();
        if($pack->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminPack&info=".$et);
	}
	
	
else if($_REQUEST['op']==4){
	$pack = new Pack();
	if($pack->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminPack&info=".$et);
	}
else if($_GET['op']==5){
 $service = new Pack();
 if($pack->deleteImageFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
 header("location:../index.php?pg=formPack&id=".$_GET["idMod"]."&info=".$et);
 }
 
else if($_REQUEST['op']==1){
	require("_uploadPhoto.php");
	if($fichier == "d41d8cd98f00b204e9800998ecf8427e."){$fichier = NULL;}
	$pack = new Pack();
	$pack->setPack("",$_REQUEST['titreFr'],$_REQUEST["titreEn"],$_REQUEST["titreAr"],$_REQUEST["descriptionFr"],$_REQUEST["descriptionEn"],$_REQUEST["descriptionAr"],$fichier, serialize($_REQUEST['to_service']),$_REQUEST['prix'],$_REQUEST['prix_promo'],date("Y-m-d", strtotime($_REQUEST['date_debut'])),date("Y-m-d", strtotime($_REQUEST['date_fin'])),date("Y-m-d H:i:s"),$_REQUEST['vu'],$_REQUEST['etat']);

	
	if($pack->saveToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminPack&info=".$et);
	}
else if($_REQUEST['op']==2){
	require("_uploadPhoto.php");
    if(isset($fichier)&&($fichier!="d41d8cd98f00b204e9800998ecf8427e.")){$image = $fichier;} else {$image = $_POST["image"];}
	$pack = new Pack();
	$pack->setPack($_REQUEST["id"],$_REQUEST['titreFr'],$_REQUEST["titreEn"],$_REQUEST["titreAr"],$_REQUEST["descriptionFr"],$_REQUEST["descriptionEn"],$_REQUEST["descriptionAr"],$image, serialize($_REQUEST['to_service']),$_REQUEST['prix'],$_REQUEST['prix_promo'],$_REQUEST['date_debut'],$_REQUEST['date_fin'],$_REQUEST['date_insertion'],$_REQUEST['vu'],$_REQUEST['etat']);

	if($pack->updateToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=formPack&id=".$_REQUEST['id']."&info=".$et);
	}
}}else{header("Location: ../index.php?pg=tableau-de-bord");}
?>

