<?php

session_start();
//error_reporting(0);
set_time_limit(0);



if(isset($_SESSION["idadmin"])){

	include("../../modules/connection.class.php");

	include("../../modules/fournisseur.class.php");

	$db = new DB();
        $conn = $db->connect();



if((!$_REQUEST['op'])||($_REQUEST['op']>7))	{header("Location: ../index.php?pg=tableau-de-bord");}

else{



if($_GET['op']==3){

	$fournisseur = new Fournisseur();

	if($fournisseur->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminAffilie&info=".$et);

	}


else if($_GET['op']==4){		

	$fournisseur = new Fournisseur();

	if($fournisseur->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminAffilie&info=".$et);

	}


else if($_REQUEST['op']==1){

	$fournisseur = new Fournisseur();

	$fournisseur->setFournisseur('',$_REQUEST['societe'],$_REQUEST['registre_commerce'],$_REQUEST['matricule_fiscal'],$_REQUEST['code_comptable'],$_REQUEST['role'],$_REQUEST['adresse'],$_REQUEST['tel'],$_REQUEST['email'],$_REQUEST['user'],$_REQUEST['motPasse'],crypt($_REQUEST['motPasse']),date("Y-m-d H:i:s"),$_REQUEST['publication']);

	if($fournisseur->saveToDB()){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminAffilie&info=".$et);

	}

else if($_REQUEST['op']==2){

	$fournisseur = new Fournisseur();

	$fournisseur->setFournisseur($_POST['id'],$_REQUEST['societe'],$_REQUEST['registre_commerce'],$_REQUEST['matricule_fiscal'],$_REQUEST['code_comptable'],$_REQUEST['role'],$_REQUEST['adresse'],$_REQUEST['tel'],$_REQUEST['email'],$_REQUEST['user'],$_REQUEST['motPasse'],crypt($_REQUEST['motPasse']),$_REQUEST['date_insertion'],$_REQUEST['publication']);

	if($fournisseur->updateToDB()){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminAffilie&info=".$et);

	}

}}else{header("Location: ../index.php?pg=tableau-de-bord");}

?>

