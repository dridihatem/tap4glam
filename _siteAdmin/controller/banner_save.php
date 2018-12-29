<?php  
session_start();
set_time_limit(0);

if(isset($_SESSION["idadmin"])){
	include("../../modules/connection.class.php");
	include("../../modules/banners.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_REQUEST['op'])||($_REQUEST['op']>7))	{header("Location: ../index.php?pg=tableau-de-bord");}
else{

if($_GET['op']==3){		
	$banner = new Banner();
	if($banner->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminBanner&info=".$et);
	}
	else if($_REQUEST['op']==4){		
	$slide = new Banner();
	if($slide->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminBanner&info=".$et);
	}	
	else if($_GET['op']==5){  
 $slide = new Banner();
 if($slide->deleteImageFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
 header("location:../index.php?pg=formBanner&id=".$_GET["idMod"]."&info=".$et);
 }

else if($_GET['op']==1){
	require("_uploadPhoto.php");
        if($fichier == "d41d8cd98f00b204e9800998ecf8427e."){$fichier = NULL;}
	$banner = new Banner();
	$banner->setBanner("",$fichier,$_REQUEST['ordre'],$_REQUEST['publication']);
	if($banner->saveToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminBanner&info=".$et);
	}
else if($_GET['op']==2){
	require("_uploadPhoto.php");
        if(isset($fichier)&&($fichier!="d41d8cd98f00b204e9800998ecf8427e.")){$img = $fichier;} else {$img = $_REQUEST["photo"];}
	$banner = new Banner();
	$banner->setBanner($_REQUEST["id"],$img,$_REQUEST['ordre'],$_REQUEST['publication']);
	if($banner->updateToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminBanner&info=".$et);
	}
}}else{header("Location: ../index.php?pg=tableau-de-bord");}
?>