<?php  
session_start();
set_time_limit(0);
if(isset($_SESSION["idadmin"])){
	include("../../modules/connection.class.php");
	include("../../modules/reclamation.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_REQUEST['op'])||($_REQUEST['op']>70)) {header("Location: ../index.php?pg=tableau-de-bord");}
else{
	if($_REQUEST['op']==3){		
	$contact = new Reclamation();
	if($contact->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location: ../index.php?pg=adminReclamation&info=".$et);
	}
	else if($_REQUEST['op']==4){	
	$contact = new Reclamation();
	$contact->getFromDB($_GET["id"]);
	$contact->setLu(false);
	if($contact->updateToDB()){$et = "done";}else{$et = "err";}
	header("location: ../index.php?pg=adminReclamation&info=".$et);
	}
	
	else if($_REQUEST['op']==42){	
	$commande = new Reclamation();
	if($commande->getTraiterReclamation($_GET["id"],$_GET["traiter"])){$et = "done";}else{$et = "err";}
	header("location: ../index.php?pg=adminReclamation&info=".$et);
	}
}}
?>