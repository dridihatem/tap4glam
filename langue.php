<?php
if(isset($_GET['lng']) && !empty($_GET['lng']))
{
	session_start();
	unset($_SESSION['lng']);
	$_SESSION['lng'] = $_GET['lng'];

$HTTP_REFERER = $_SERVER['HTTP_REFERER'];
	if($HTTP_REFERER == 'http://powermotors.com.tn/index.php' || $HTTP_REFERER == 'http://powermotors.com.tn/') header("Location: index.php");
	else header("Location: $HTTP_REFERER");
}
else{ header("Location: index.php"); }
?>