<?php  
session_start();
set_time_limit(0);

if(isset($_SESSION["idadmin"])){
	include("../../modules/connection.class.php");
	include("../../modules/configuration.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_REQUEST['op'])||($_REQUEST['op']>7))	{header("Location: ../index.php?pg=tableau-de-bord");}
else{

if($_GET['op']==3){		
	$Configuration = new Configuration();
	if($Configuration->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=formConfiguration&id=1&info=".$et);
	}
	else if($_REQUEST['op']==4){		
	$slide = new Configuration();
	if($slide->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=formConfiguration&id=1&info=".$et);
	}	
	else if($_GET['op']==5){  
 $slide = new Configuration();
 if($slide->deleteImageFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
 header("location:../index.php?pg=formConfiguration&id=".$_GET["idMod"]."&info=".$et);
 }

else if($_GET['op']==1){
	
	$Configuration = new Configuration();
	$Configuration->setConfiguration($_POST["id"],$_POST['email'],$_POST['facebook'],$_POST['gplus'],$_POST['twitter'],$_POST['coordonne']);
	if($Configuration->saveToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=formConfiguration&id=1&info=".$et);
	}
else if($_GET['op']==2){
	require("_uploadPhoto.php");
        if(isset($fichier)&&($fichier!="d41d8cd98f00b204e9800998ecf8427e.")){$img = $fichier;} else {$img = $_POST["photo"];}
	$Configuration = new Configuration();
	$Configuration->setConfiguration($_POST["id"],$_POST['email'],$_POST['facebook'],$_POST['gplus'],$_POST['twitter'],$_POST['coordonne']);
	if($Configuration->updateToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=formConfiguration&id=1&info=".$et);
	}
}}else{header("Location: ../index.php?pg=tableau-de-bord");}
?>