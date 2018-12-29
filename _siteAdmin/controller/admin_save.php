<?php  
session_start();
set_time_limit(0);

if(isset($_SESSION["idadmin"])){
	include("../../modules/connection.class.php");
	include("../../modules/administrator.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_REQUEST['op'])||($_REQUEST['op']>5))	{header("Location: ../index.php?pg=tableau-de-bord");}
else{
if($_REQUEST['op']==1){
	
	$Administrator = new Administrator();
	$Administrator->setAdministrator("",$_REQUEST["login"],$_REQUEST["password"],md5($_REQUEST["password"]),$_REQUEST["poste"]);
	if($Administrator->saveToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=formUser&id=".$_SESSION['idadmin']."&info=".$et);
	}
        if($_REQUEST['op']==2){
	
	$Administrator = new Administrator();
	$Administrator->setAdministrator($_REQUEST["id"],$_REQUEST["login"],$_REQUEST["password"],md5($_REQUEST["password"]),$_REQUEST["poste"]);
	if($Administrator->updateToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=formUser&id=".$_SESSION['idadmin']."&info=".$et);
	}
else if($_REQUEST['op']==4){		
	$Administrator = new Administrator();
	if($Administrator->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=formUser&id=".$_SESSION['idadmin']."&info=".$et);
	}	
else if($_GET['op']==3){		
	$Administrator = new Administrator();
	if($Administrator->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=formUser&id=".$_SESSION['idadmin']."&info=".$et);
	}	
}}else{header("Location: ../index.php?pg=tableau-de-bord");}
?>