<?php

session_start();

set_time_limit(0);

if(isset($_SESSION["idadmin"])){
    
include("../../modules/connection.class.php");
include("../../modules/reservation.class.php");

$db = new DB();

$conn = $db->connect();


if((!$_REQUEST['op'])||($_REQUEST['op']>60))	{header("Location: ../index.php?pg=tableau-de-bord");}
else{

if($_GET['op']==3){
	$pack = new Reservation();
        if($pack->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminReservation&info=".$et);
	}
	
	
else if($_REQUEST['op']==4){
	$pack = new Reservation();
	if($pack->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminReservation&info=".$et);
	}

 
else if($_REQUEST['op']==1){
	
	$pack = new Reservation();
	$pack->setReservation("",$_REQUEST['nombre_personne'],date("Y-m-d",strtotime($_REQUEST["date_reservation"])),date("H:i:s",strtotime($_REQUEST["heure_reservation"])),serialize($_REQUEST['to_service']),serialize($_REQUEST['to_option_service']),$_REQUEST["etat_reservation"],$_REQUEST['id_client'], $_REQUEST['nom_prenom'],$_REQUEST['email'],$_REQUEST['tel'],$_REQUEST['adresse'],date("Y-m-d H:i:s", strtotime($_REQUEST['date_annulation'])),$_REQUEST['ref_commande'],$_REQUEST['date_modification']);

	
	if($pack->saveToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminReservation&info=".$et);
	}
else if($_REQUEST['op']==2){
	
	$pack = new Reservation();
	$pack->setReservation($_REQUEST["id"],$_REQUEST['nombre_personne'],date("Y-m-d",strtotime($_REQUEST["date_reservation"])),date("H:i:s",strtotime($_REQUEST["heure_reservation"])),serialize($_REQUEST['to_service']),serialize($_REQUEST['to_option_service']),$_REQUEST["etat_reservation"],$_REQUEST['id_client'], $_REQUEST['nom_prenom'],$_REQUEST['email'],$_REQUEST['tel'],$_REQUEST['adresse'],date("Y-m-d H:i:s", strtotime($_REQUEST['date_annulation'])),$_REQUEST['ref_commande'],$_REQUEST['date_modification']);

	if($pack->updateToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=formReservation&id=".$_REQUEST['id']."&info=".$et);
	}
}}else{header("Location: ../index.php?pg=tableau-de-bord");}
?>

