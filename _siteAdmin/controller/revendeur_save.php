<?php
session_start();
set_time_limit(0);

if(isset($_SESSION["idadmin"])){
	include("../../modules/connection.class.php");
	include("../../modules/revendeur.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_REQUEST['op'])||($_REQUEST['op']>80))	{header("Location: ../index.php?pg=tableau-de-bord");}
else{

if($_GET['op']==3){		
	$membre = new Revendeur();
	if($membre->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminRevendeur&info=".$et);
	}
     
else if($_REQUEST['op']==4){		
	$membre = new Revendeur();
	if($membre->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminRevendeur&info=".$et);
	}
        
else if($_REQUEST['op']==5){		
	$membre = new Revendeur();
	if($membre->deleteImageFromDB($_GET["idMod"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=formRevendeur&id=".$_GET['idMod']."&info=".$et);
	}
	else if($_REQUEST['op']==6){		
	$membre = new Revendeur();
	if($membre->deletePatenteFromDB($_GET["idMod"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=formRevendeur&id=".$_GET['idMod']."&info=".$et);
	}
       

      
else if($_REQUEST['op']==1){
	require("_uploadRc.php");
	require("_uploadPatente.php");
        if($fichier == "d41d8cd98f00b204e9800998ecf8427e."){$fichier = NULL;}
        if($fichier1 == "d41d8cd98f00b204e9800998ecf8427e."){$fichier1 = NULL;}
	$membre = new Revendeur();
	$membre->setRevendeur("",$_POST["raison"],$fichier,$fichier1,$_POST["nom"],$_POST["prenom"],$_POST["adresse"],$_POST['gouvernerat'],$_POST['mobile'],$_POST['fixe'],$_POST['fax'],$_POST['email'],$_POST['facebook'],$_POST['login'],$_POST['password'],md5($_POST['password']),1,date("Y-m-d H:i:s"));
	if($membre->saveToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminRevendeur&info=".$et);
	}
else if($_REQUEST['op']==2){
	require("_uploadRc.php");
	require("_uploadPatente.php");
        if(isset($fichier)&&($fichier!="d41d8cd98f00b204e9800998ecf8427e.")){$img = $fichier;} else {$img = $_REQUEST["rc"];}
        if(isset($fichier1)&&($fichier1!="d41d8cd98f00b204e9800998ecf8427e.")){$img1 = $fichier1;} else {$img1= $_REQUEST["patente"];}
	$membre = new Revendeur();
	$membre->setRevendeur($_POST["id"],$_POST["raison"],$img,$img1,$_POST["nom"],$_POST["prenom"],$_POST["adresse"],$_POST['gouvernerat'],$_POST['mobile'],$_POST['fixe'],$_POST['fax'],$_POST['email'],$_POST['facebook'],$_POST['login'],$_POST['password'],md5($_POST['password']),1,$_POST['dateInscription']);
	if($membre->updateToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminRevendeur&info=".$et);
	}
}}else{header("Location: ../index.php?pg=tableau-de-bord");}
?>
