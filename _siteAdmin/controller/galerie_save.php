<?php  
session_start();
set_time_limit(0);

if(isset($_SESSION["authentification"])){
	include("../../modules/connection.class.php");
	include("../../modules/galerie.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_GET['op'])||($_GET['op']>60))	{header("Location: ../index.php?pg=tableau-de-bord");}
else{

if($_GET['op']==3){		
	$galerie = new Galerie();
	if($galerie->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminGalerie&info=".$et);
	}
else if($_GET['op']==4){		
	$galerie = new Galerie();
	if($galerie->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminGalerie&info=".$et);
	}
else if($_GET['op']==5){  
 $galerie = new Galerie();
 if($galerie->deleteImageFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
 header("location:../index.php?pg=formGalerie&id=".$_GET["idMod"]."&info=".$et);
 }
 

else if($_GET['op']==1){
	require("_uploadPhoto.php");
	if($fichier == "d41d8cd98f00b204e9800998ecf8427e."){$fichier = NULL;}
	$galerie = new Galerie();
	$galerie->setGalerie(NULL,$_POST["nom"],$_POST["description"],$fichier,$_POST['nbre_place'],$_POST['annee'],$_POST['vitesse'],$_POST['type'],$_POST['publication'],date("Y-m-d H:i:s"));
	if($galerie->saveToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminGalerie&info=".$et);
	}
else if($_GET['op']==2){
	require("_uploadPhoto.php");
    if(isset($fichier)&&($fichier!="d41d8cd98f00b204e9800998ecf8427e.")){$image = $fichier;} else {$image = $_POST["phot1"];}
	$galerie = new Galerie();
	$galerie->setGalerie($_POST["id"],$_POST["nom"],$_POST["description"],$image,$_POST['nbre_place'],$_POST['annee'],$_POST['vitesse'],$_POST['type'],$_POST['publication'],date("Y-m-d H:i:s"));
	if($galerie->updateToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminGalerie&info=".$et);
	}
}}else{header("Location: ../index.php?pg=tableau-de-bord");}
?>