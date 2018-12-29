<?php
$id = $data->id;
if(isset($_GET['m']) && $_GET['m']==$id){ $class = 'active'; }else{ $class = NULL; }

echo '<li class="dropdown '.$class.'"><a href="'.urlRewrite($data->nomFr,$data->id,NULL,NULL,NULL).'" title="'.stripslashes($data->nomFr).'" >'.stripslashes($data->nomFr).'<i class="fa fa-angle-down"></i></a>

		<ul class="dropdown-submenu">';
			$reqLsm = mysql_query(sprintf("SELECT * FROM ".$_SESSION['pfx']."_categorie  ORDER BY id"));
			while($dataLsm = mysql_fetch_object($reqLsm)){
				$img = $dataLsm->image;
				if(isset($img) && !empty($img) && file_exists("images/ressources/".$img)){
					$imm = '<img src="images/ressources/'.$img.'"  style="width:30px;"/>';

				}
				else {$imm = NULL;}
		echo '<li><a href="'.urlRewrite($dataLsm->titreFr,5,$dataLsm->id,NULL,NULL).'" title="'.$dataLsm->titreFr.'" class="reverse">'.$imm.' '.stripslashes($dataLsm->titreFr).'</a></li>';
      }
echo '</ul>
		</li>';?>
