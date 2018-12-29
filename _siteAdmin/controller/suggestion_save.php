<?php  
session_start();
set_time_limit(0);
if(isset($_SESSION["idadmin"])){
	include("../../modules/connection.class.php");
	include("../../modules/suggestion.class.php");
	$cn = new Connection();
	$cn->connectToDB();

if((!$_REQUEST['op'])||($_REQUEST['op']>4)||($_REQUEST['op']<3)) {header("Location: ../index.php?pg=tableau-de-bord");}
else{
	if($_REQUEST['op']==3){		
	$contact = new Suggestion_message();
	if($contact->deleteFromDB($_GET["idMod"])){$et = "done";}else{$et = "err";}
	header("location: ../index.php?pg=adminSuggestion&info=".$et);
	}
	else if($_REQUEST['op']==4){	
	$contact = new Suggestion_message();
	$contact->getFromDB($_GET["id"]);
	$contact->setLu(false);
	if($contact->updateToDB()){$et = "done";}else{$et = "err";}
	header("location: ../index.php?pg=adminSuggestion&info=".$et);
	}
}}
?>