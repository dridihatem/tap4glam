<?php
$id = $data->id;
if(isset($_GET['m']) && $_GET['m']==$id){ $class = 'home'; }else{ $class = NULL; }
echo '<li class="'.$class.'">
<a href="'.urlRewrite($data->nomEn,$data->id,NULL,NULL,NULL,NULL,NULL).'" title="'.stripslashes($data->nomEn).'" >'.stripslashes($data->nomEn).'<i class="fa fa-angle-down"></i></a>';
	echo '<ul  class="submenu">';
			$reqLsm = mysql_query(sprintf("SELECT * FROM ".$_SESSION['pfx']."_module WHERE moduleParent =".$id." ORDER BY ordre"));
			while($dataLsm = mysql_fetch_object($reqLsm)){
		echo '<li><a href="'.urlRewrite($dataLsm->nomEn,$dataLsm->id,NULL,NULL,NULL,NULL,NULL).'" title="'.$dataLsm->nomEn.'">'.stripslashes($dataLsm->nomEn).'</a></li>';
      }
echo '</ul></li>';?>
