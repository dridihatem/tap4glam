<?php  
session_start();
set_time_limit(0);
if(isset($_SESSION["idadmin"])){
	include("../../modules/connection.class.php");
	include("../../modules/sav.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_REQUEST['op'])||($_REQUEST['op']>70)) {header("Location: index.php?pg=mon-compte&m=9");}
else{
	if($_REQUEST['op']==3){		
	$contact = new SAV();
	if($contact->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location: ../index.php?pg=adminSav&info=".$et);
	}
	else if($_REQUEST['op']==4){		
	$produitt = new SAV();
	if($produitt->getetatappareil($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminSav&info=".$et);
	}
	
}}
?>