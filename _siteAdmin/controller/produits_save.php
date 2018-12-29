<?php  
session_start();
set_time_limit(0);

if(isset($_SESSION["idadmin"])){
	include("../../modules/connection.class.php");
	include("../../modules/produit.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_REQUEST['op'])||($_REQUEST['op']>60))	{header("Location: ../index.php?pg=tableau-de-bord");}
else{

if($_GET['op']==3){		
	$produitt = new Produit();
	if($produitt->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminProduits&info=".$et);
	}
else if($_REQUEST['op']==4){		
	$produitt = new Produit();
	if($produitt->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminProduits&info=".$et);
	}
else if($_GET['op']==5){  
 $produitt = new Produit();
 if($produitt->deleteImage1FromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
 header("location:../index.php?pg=formProduits&id=".$_GET["idMod"]."&info=".$et);
 }
 else if($_GET['op']==51){  
 $produitt = new Produit();
 if($produitt->deleteImage2FromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
 header("location:../index.php?pg=formProduits&id=".$_GET["idMod"]."&info=".$et);
 }
 else if($_GET['op']==52){  
 $produitt = new Produit();
 if($produitt->deleteImage3FromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
 header("location:../index.php?pg=formProduits&id=".$_GET["idMod"]."&info=".$et);
 }
 else if($_GET['op']==53){  
 $produitt = new Produit();
 if($produitt->deleteFicheFromDBFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
 header("location:../index.php?pg=formProduits&id=".$_GET["idMod"]."&info=".$et);
 }
 
else if($_REQUEST['op']==1){
	require("_uploadPhoto.php");
	require("_uploadPhoto1.php");
	require("_uploadPhoto2.php");
	require("_uploadPhoto3.php");
	if($fichier == "d41d8cd98f00b204e9800998ecf8427e."){$fichier = NULL;}
	if($fichier1 == "d41d8cd98f00b204e9800998ecf8427e."){$fichier1 = NULL;}
	if($fichier2 == "d41d8cd98f00b204e9800998ecf8427e."){$fichier2 = NULL;}
	if($fichier3 == "d41d8cd98f00b204e9800998ecf8427e."){$fichier3 = NULL;}
	$produitt = new Produit();
	$produitt->setProduit("",$_REQUEST['modele'],$_REQUEST["titreFr"],$_REQUEST["titreEn"],$_REQUEST["descriptionFr"],$_REQUEST["descriptionEn"],$fichier,$fichier1,$fichier2,$fichier3,$_REQUEST['id_categorie'],$_REQUEST['id_sous_categorie'],$_REQUEST['chassis'],$_REQUEST['chassis_modele'],$_REQUEST['moteur'],$_REQUEST['puissance'],$_REQUEST['emission'],date("Y-m-d H:i:s"),$_REQUEST['publication'],$_REQUEST["vu"]);
	if($produitt->saveToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminProduits&info=".$et);
	}
else if($_REQUEST['op']==2){
	require("_uploadPhoto.php");
	require("_uploadPhoto1.php");
	require("_uploadPhoto2.php");
	require("_uploadPhoto3.php");
    if(isset($fichier)&&($fichier!="d41d8cd98f00b204e9800998ecf8427e.")){$image = $fichier;} else {$image = $_POST["phot1"];}
	if(isset($fichier1)&&($fichier1!="d41d8cd98f00b204e9800998ecf8427e.")){$image1 = $fichier1;} else {$image1 = $_POST["phot2"];}
	if(isset($fichier2)&&($fichier2!="d41d8cd98f00b204e9800998ecf8427e.")){$image2 = $fichier2;} else {$image2 = $_POST["phot3"];}
	if(isset($fichier3)&&($fichier3!="d41d8cd98f00b204e9800998ecf8427e.")){$image3 = $fichier3;} else {$image3 = $_POST["fiche"];}
	$produitt = new Produit();
	$produitt->setProduit($_REQUEST["id"],$_REQUEST['modele'],$_REQUEST["titreFr"],$_REQUEST["titreEn"],$_REQUEST["descriptionFr"],$_REQUEST["descriptionEn"],$image,$image1,$image2,$image3,$_REQUEST['id_categorie'],$_REQUEST['id_sous_categorie'],$_REQUEST['chassis'],$_REQUEST['chassis_modele'],$_REQUEST['moteur'],$_REQUEST['puissance'],$_REQUEST['emission'],$_REQUEST['date_insertion'],$_REQUEST['publication'],$_REQUEST["vu"]);
	
	

	if($produitt->updateToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminProduits&info=".$et);
	}
}}else{header("Location: ../index.php?pg=tableau-de-bord");}
?>