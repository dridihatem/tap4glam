<?php
 if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
	header("Location: index.php?pg=recherche&m=11&key=".$_GET['keyword']."");
	
	}	

else{ 
	header("Location: index.php?pg=recherche&m=11&result=non"); 
}



?>