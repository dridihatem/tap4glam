<?php

session_start();
error_reporting(0);
set_time_limit(0);



if(isset($_SESSION["idadmin"])){

	include("../../modules/connection.class.php");

	include("../../modules/code_promo.class.php");

	$db = new DB();
        $conn = $db->connect();



if((!$_REQUEST['op'])||($_REQUEST['op']>7))	{header("Location: ../index.php?pg=tableau-de-bord");}

else{



if($_GET['op']==3){

	$code = new Code_promo();

	if($code->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminCodePromo&info=".$et);

	}



else if($_GET['op']==4){		

	$code = new Code_promo();

	if($code->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminCodePromo&info=".$et);

	}


else if($_REQUEST['op']==1){

	

	$code = new Code_promo();

	$code->setCode_promo('',$_REQUEST['code'],$_REQUEST['valeur'],$_REQUEST['etat'],$_REQUEST['date_depart'],$_REQUEST['date_echeance']);

	if($code->saveToDB()){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminCodePromo&info=".$et);

	}

else if($_REQUEST['op']==2){

	$code = new Code_promo();

	$code->setCode_promo($_POST['id'],$_REQUEST['code'],$_REQUEST['valeur'],$_REQUEST['etat'],$_REQUEST['date_depart'],$_REQUEST['date_echeance']);

	if($code->updateToDB()){$et = "done";}else{$et = "err";}

	header("location:../index.php?pg=adminCodePromo&info=".$et);

	}

}}else{header("Location: ../index.php?pg=tableau-de-bord");}

?>

