<?php  
session_start();
set_time_limit(0);
if(isset($_SESSION["idadmin"])){
	include("../../modules/connection.class.php");
	include("../../modules/commande_produit.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_REQUEST['op'])||($_REQUEST['op']>70)||($_REQUEST['op']<3)) {header("Location: ../index.php?pg=tableau-de-bord");}
else{
	if($_REQUEST['op']==3){		
	$commande = new CommandeProduit();
	if($commande->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location: ../index.php?pg=adminCommande&info=".$et);
	}
	else if($_REQUEST['op']==4){	
	$commande = new CommandeProduit();
	if($commande->getConfirmPayement($_GET["id"],$_GET["payement"])){$et = "done";}else{$et = "err";}
	header("location: ../index.php?pg=adminCommande&info=".$et);
	}
	else if($_REQUEST['op']==41){	
	$commande = new CommandeProduit();
	if($commande->getConfirmPayement($_GET["id"],$_GET["payement"])){$et = "done";}else{$et = "err";}
	header("location: ../index.php?pg=adminCommande&info=".$et);
	}
	else if($_REQUEST['op']==5){	
	$commande = new CommandeProduit();
	if($commande->getConfirmLivraison($_GET["id"],$_GET["livraison"])){$et = "done";}else{$et = "err";}
	header("location: ../index.php?pg=adminCommande&info=".$et);
	}
	else if($_REQUEST['op']==51){	
	$commande = new CommandeProduit();
	if($commande->getConfirmLivraison($_GET["id"],$_GET["livraison"])){$et = "done";}else{$et = "err";}
	header("location: ../index.php?pg=adminCommande&info=".$et);
	}
}}
?>