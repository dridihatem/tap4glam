<?php
    session_start();
   //error_reporting(0);
$_SESSION['pfx'] = "tap";

require_once("../modules/connection.class.php");
	$db = new DB();
$conn = $db->connect();
    if (count($_POST["check_produit"]) > 0 ) {
      $all = implode(",", $_POST["check_produit"]);

      $promotion = $_POST['promotion'];
      $prix_default = $_POST['prix_default'];
      $result_prix = $prix_default - (($prix_default*$promotion)/100);
       $query="UPDATE ".$_SESSION['pfx']."_service set prix_promo= 12 WHERE  id IN(".$all.")";
	     echo $prix_default;
      if($conn->query($query)){
          $et = "done";
      }
	  
    }else{
        $et = "err";
    }
    /*header("Location:index.php?pg=adminServices&info=".$et);*/
?>