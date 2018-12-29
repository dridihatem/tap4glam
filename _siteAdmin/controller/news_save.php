<?php  
session_start();
set_time_limit(0);

if(isset($_SESSION["authentification"])){
	include("../../modules/connection.class.php");
	include("../../modules/news.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_REQUEST['op'])||($_REQUEST['op']>7))	{header("Location: ../index.php?pg=tableau-de-bord");}
else{

if($_GET['op']==3){		
	$news = new News();
	if($news->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminNews&info=".$et);
	}
else if($_REQUEST['op']==4){		
	$news = new News();
	if($news->publishToDB($_GET["id"],$_GET["pub"])){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminNews&info=".$et);
	}
else if($_GET['op']==5){  
 $news = new News();
 if($news->deleteImageFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
 header("location:../index.php?pg=formNews&id=".$_GET["idMod"]."&info=".$et);
 }
else if($_REQUEST['op']==1){
	require("_uploadPhoto.php");
	if($fichier == "d41d8cd98f00b204e9800998ecf8427e."){$fichier = NULL;}
	$news = new News();
	$news->setNews($_REQUEST["id"],$_REQUEST["nom"],$_REQUEST["descriptionFr"],$fichier,date("Y-m-d H:i:s"),$_POST['publication']);
	if($news->saveToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminNews&info=".$et);
	}
else if($_REQUEST['op']==2){
	require("_uploadPhoto.php");
	if(isset($fichier)&&($fichier!="d41d8cd98f00b204e9800998ecf8427e.")){$image = $fichier;} else {$image = $_POST["photo"];}
	$news = new News();
	$news->setNews($_REQUEST["id"],$_REQUEST["nom"],$_REQUEST["descriptionFr"],$image,date("Y-m-d H:i:s"),$_POST['publication']);
	if($news->updateToDB()){$et = "done";}else{$et = "err";}
	header("location:../index.php?pg=adminNews&info=".$et);
	}
}}else{header("Location: ../index.php?pg=tableau-de-bord");}
?>