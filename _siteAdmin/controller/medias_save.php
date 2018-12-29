<?php  
session_start();
@set_time_limit(ini_get('max_execution_time'));

if(isset($_SESSION["authentification"])){
	include("../../modules/Connection.class.php");
	include("../../modules/Medias.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_REQUEST['op'])||($_REQUEST['op']>4))	{header("Location: ../index.php?pg=tableau-de-bord");}
else{

if($_GET['op']==3){		
	$media = new Media();
	if($media->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminMedias&info=".$et);
	}
else if($_REQUEST['op']==4){		
	$media = new Media();
	if($media->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminMedias&info=".$et);
	}
else if($_REQUEST['op']==1){
	require("_uploadPhoto.php");
	if($fichier == "d41d8cd98f00b204e9800998ecf8427e."){$fichier = NULL;}
	$media = new Media();
	$typeFile = $media->getTypeFile($fichier);
	$sizeFile = $media->getFileSize("../../images/ressources/".$fichier);
	$media->setMedia($_POST["id"],$_POST["nomFr"],$typeFile,$sizeFile,date("Y-m-d H:i:s"),$fichier,$_POST["texteAlternatif"]);
	if($media->saveToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminMedias&info=".$et);
	}
else if($_REQUEST['op']==2){	
	require("_uploadPhoto.php");
	if(isset($fichier)&&($fichier!="d41d8cd98f00b204e9800998ecf8427e.")){$photo = $fichier;} else {$photo = $_POST["photo"];}
	$media = new Media();
	$media->setMedia($_POST["id"],$_POST["nomFr"],$_POST["type"],$_POST["tailles"],date("Y-m-d H:i:s"),$photo,$_POST["texteAlternatif"]);
	if($media->updateToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminMedias&info=".$et);
	}
}}else{header("Location: ../index.php?pg=tableau-de-bord");}
?>