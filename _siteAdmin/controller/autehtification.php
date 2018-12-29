<?php

header("Content-Type: text/plain ; charset=utf-8");
header("Cache-Control: no-cache , private");
header("Pragma: no-cache");

session_start();
$_SESSION['pfx'] = 'tap';
require_once("../../modules/connection.class.php");
require_once("../../modules/administrator.class.php");

$db = new DB();
$conn = $db->connect();



if ( isset($_POST['username']) && $_POST['username'] != "" && $_POST['username'] != "login(email)" && isset($_POST['password']) && $_POST['password'] != "" && $_POST['password'] != "mot de passe" )
{
$login = trim(addslashes($_POST['username']));
$pass = trim(addslashes(md5($_POST['password'])));

$sql = "SELECT * FROM ".$_SESSION['pfx']."_administrator WHERE login = '".mysqli_real_escape_string($conn,$login)."'";
$result = $conn->query($sql);
$num_row = $result->num_rows;
                          if($num_row > 0){
          $row =mysqli_fetch_array($result,MYSQLI_ASSOC);
          
               if($row['motPasseMd5'] == $pass)
	{
		$_SESSION['idadmin'] = $row['id'];
		$_SESSION['login'] = $row['login'];
		$_SESSION['type'] = $row['type'];
		
		header("location:../index.php?pg=tableau-de-bord");

	}
	else {	header("location:../index.php?error=pwd");}     
                                  
                              
                          }
             else
	header("location:../index.php?error=pwd");
}
                          


                              




?>
