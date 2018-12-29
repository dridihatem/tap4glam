<?php 
session_start();
error_reporting(0);
$_SESSION['pfx'] = "tap";
$_SESSION['lng'] = "Fr";

require_once("modules/connection.class.php");
$db = new DB();
$conn = $db->connect();
if(isset($_REQUEST))
{
      

$email=$_POST['email'];
$sql="INSERT INTO ".$_SESSION['pfx']."_newsletter (email,date_insertion) VALUES ('$email',NOW())";
$result=$conn->query($sql);
if($result){
echo "<span style=\"color:#FFF\">Vous avez été abonné avec succès.</span>";
}
}
?>