<?php
$id = $data->id;
if(isset($_GET['m']) && $_GET['m']==$id){ $class = 'active'; }else{ $class = NULL; }
echo '<li class="dropdown '.$class.'">
<a href="'.urlRewrite($data->nomFr,$data->id,NULL,NULL,NULL,NULL,NULL).'" title="'.stripslashes($data->nomFr).'" >'.stripslashes($data->nomFr).'<i class="fa fa-angle-down"></i></a>';
	echo '<ul  class="dropdown-submenu">';
			$reqLsm = mysql_query(sprintf("SELECT * FROM ".$_SESSION['pfx']."_module WHERE moduleParent =".$id." ORDER BY ordre"));
			while($dataLsm = mysql_fetch_object($reqLsm)){
		echo '<li><a href="'.urlRewrite($dataLsm->nomFr,$dataLsm->id,NULL,NULL,NULL,NULL,NULL).'" title="'.$dataLsm->nomFr.'">'.stripslashes($dataLsm->nomFr).'</a></li>';
      }
echo '</ul></li>';?>
