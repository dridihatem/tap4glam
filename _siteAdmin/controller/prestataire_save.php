<?php

session_start();
error_reporting(0);
set_time_limit(0);



if(isset($_SESSION["idadmin"])){

	include("../../modules/connection.class.php");

	include("../../modules/prestataire.class.php");

	$db = new DB();
        $conn = $db->connect();



if((!$_REQUEST['op'])||($_REQUEST['op']>7))	{header("Location: ../index.php?pg=tableau-de-bord");}

else{



if($_GET['op']==3){

	$prestataire = new Prestataire();

	if($prestataire->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminPrestataire&info=".$et);

	}



else if($_GET['op']==5){

 $prestataire = new Prestataire();

 if($prestataire->deleteImageFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}

 header("location:../index.php?pg=formPrestataire&id=".$_GET["idMod"]."&info=".$et);

 }
else if($_GET['op']==4){		

	$prestataire = new Prestataire();

	if($prestataire->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminPrestataire&info=".$et);

	}


else if($_REQUEST['op']==1){

	require("_uploadPhoto.php");

	if($fichier == "d41d8cd98f00b204e9800998ecf8427e."){$fichier = NULL;}

	$prestataire = new Prestataire();

	$prestataire->setPrestataire('',$_REQUEST['nom_prenom'],$_REQUEST['email'],$_REQUEST['adresse'],$_REQUEST['tel'],$_REQUEST['id_fournisseur'],$_REQUEST['login'],$_REQUEST['motPasse'],crypt($_REQUEST['motPasse']),$fichier,date("Y-m-d H:i:s"),$_REQUEST['publication']);

	if($prestataire->saveToDB()){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminPrestataire&info=".$et);

	}

else if($_REQUEST['op']==2){

	require("_uploadPhoto.php");

	if(isset($fichier)&&($fichier!="d41d8cd98f00b204e9800998ecf8427e.")){$image = $fichier;} else {$image = $_POST["image"];}

	$prestataire = new Prestataire();

	$prestataire->setPrestataire($_POST['id'],$_REQUEST['nom_prenom'],$_REQUEST['email'],$_REQUEST['adresse'],$_REQUEST['tel'],$_REQUEST['id_fournisseur'],$_REQUEST['login'],$_REQUEST['motPasse'],crypt($_REQUEST['motPasse']),$image,$_REQUEST['date_insertion'],$_REQUEST['publication']);

	if($prestataire->updateToDB()){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminPrestataire&info=".$et);

	}

}}else{header("Location: ../index.php?pg=tableau-de-bord");}

?>

