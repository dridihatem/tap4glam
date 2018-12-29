<?php 
session_start();
set_time_limit(0);

if(isset($_SESSION["idadmin"])){
	include("../../modules/connection.class.php");
	include("../../modules/marque.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_REQUEST['op'])||($_REQUEST['op']>7))	{header("Location: ../index.php?pg=tableau-de-bord");}
else{

if($_GET['op']==3){		
	$catalogue = new Marque();
	if($catalogue->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminMarque&info=".$et);
	}
	else if($_REQUEST['op']==4){		
	$catalogue = new Marque();
	if($catalogue->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminMarque&info=".$et);
	}
else if($_GET['op']==5){  
 $catalogue = new Marque();
 if($catalogue->deleteImageFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
 header("location:../index.php?pg=formMarque&id=".$_GET["idMod"]."&info=".$et);
 }

else if($_REQUEST['op']==1){
	require("_uploadPhoto.php");
	if($fichier == "d41d8cd98f00b204e9800998ecf8427e."){$fichier = NULL;}
	$catalogue = new Marque();
	$catalogue->setMarque('',$_REQUEST['titreFr'],$_REQUEST['descriptionFr'],$fichier,$_REQUEST['ordre']);
	if($catalogue->saveToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminMarque&info=".$et);
	}
else if($_REQUEST['op']==2){
	require("_uploadPhoto.php");
	if(isset($fichier)&&($fichier!="d41d8cd98f00b204e9800998ecf8427e.")){$image = $fichier;} else {$image = $_POST["phot1"];}
	$catalogue = new Marque();
	$catalogue->setMarque($_POST['id'],$_REQUEST['titreFr'],$_REQUEST['descriptionFr'],$image,$_REQUEST['ordre']);
	if($catalogue->updateToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminMarque&info=".$et);
	}
}}else{header("Location: ../index.php?pg=tableau-de-bord");}
?>