<?php

session_start();
error_reporting(0);
set_time_limit(0);



if(isset($_SESSION["idadmin"])){

	include("../../modules/connection.class.php");

	include("../../modules/option_service.class.php");

	$db = new DB();
        $conn = $db->connect();



if((!$_REQUEST['op'])||($_REQUEST['op']>7))	{header("Location: ../index.php?pg=tableau-de-bord");}

else{



if($_GET['op']==3){

	$catalogue = new Option_service();

	if($catalogue->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminOptionServices&info=".$et);

	}



else if($_GET['op']==4){		

	$categorie = new Option_service();

	if($categorie->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminOptionServices&info=".$et);

	}


else if($_REQUEST['op']==1){

	$categorie = new Option_service();
	$implode = implode(",", $_REQUEST['to_service']);

	$categorie->setOption_service('',$_REQUEST['titreFr'],$_REQUEST['titreEn'],$_REQUEST['titreAr'],$_REQUEST['prix'],$_REQUEST['prix_promo'],$implode,$_REQUEST['etat']);

	if($categorie->saveToDB()){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminOptionServices&info=".$et);

	}

else if($_REQUEST['op']==2){

	$categorie = new Option_service();
	$implode = implode(",", $_REQUEST['to_service']);
	$categorie->setOption_service($_POST['id'],$_REQUEST['titreFr'],$_REQUEST['titreEn'],$_REQUEST['titreAr'],$_REQUEST['prix'],$_REQUEST['prix_promo'],$implode,$_REQUEST['etat']);

	if($categorie->updateToDB()){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminOptionServices&info=".$et);

	}

}}else{header("Location: ../index.php?pg=tableau-de-bord");}

?>

