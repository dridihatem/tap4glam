<?php

session_start();
error_reporting(0);
set_time_limit(0);



if(isset($_SESSION["idadmin"])){

	include("../../modules/connection.class.php");

	include("../../modules/client.class.php");

	$db = new DB();
        $conn = $db->connect();



if((!$_REQUEST['op'])||($_REQUEST['op']>7))	{header("Location: ../index.php?pg=tableau-de-bord");}

else{



if($_GET['op']==3){

	$catalogue = new Client();

	if($catalogue->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminClient&info=".$et);

	}

else if($_GET['op']==4){		

	$categorie = new Client();

	if($categorie->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminClient&info=".$et);

	}


else if($_REQUEST['op']==1){

	$categorie = new Client();

	$categorie->setClient('',$_REQUEST['nom_prenom'],$_REQUEST['email'],$_REQUEST['tel'],$_REQUEST['code_vip'],$_REQUEST['login'],$_REQUEST['motPasse'],crypt($_REQUEST['motPasse']),$_REQUEST['adresse'],$_REQUEST['code_postla'],$_REQUEST['id_region'],date("Y-m-d"),$_REQUEST['date_connexion'],$_REQUEST['etat'],$_REQUEST['connected']);

	if($categorie->saveToDB()){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminClient&info=".$et);

	}

else if($_REQUEST['op']==2){

	$categorie = new Client();

	$categorie->setClient($_POST['id'],$_REQUEST['nom_prenom'],$_REQUEST['email'],$_REQUEST['tel'],$_REQUEST['code_vip'],$_REQUEST['login'],$_REQUEST['motPasse'],$_REQUEST['motPasseMd5'],$_REQUEST['adresse'],$_REQUEST['code_postla'],$_REQUEST['id_region'],$_REQUEST['date_creation'],$_REQUEST['date_connexion'],$_REQUEST['etat'],$_REQUEST['connected']);

	if($categorie->updateToDB()){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminClient&info=".$et);

	}

}}else{header("Location: ../index.php?pg=tableau-de-bord");}

?>

