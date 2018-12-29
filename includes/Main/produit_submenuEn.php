<?php
$id = $data->id;
if(isset($_GET['m']) && $_GET['m']==$id){ $class = 'active'; }else{ $class = NULL; }

echo '<li class="dropdown '.$class.'"><a href="'.urlRewrite($data->nomEn,$data->id,NULL,NULL,NULL).'" title="'.stripslashes($data->nomEn).'" >'.stripslashes($data->nomEn).'<i class="fa fa-angle-down"></i></a>

		<ul class="dropdown-submenu">';
			$reqLsm = mysql_query(sprintf("SELECT * FROM ".$_SESSION['pfx']."_categorie  ORDER BY id"));
			while($dataLsm = mysql_fetch_object($reqLsm)){
				$img = $dataLsm->image;
				if(isset($img) && !empty($img) && file_exists("images/ressources/".$img)){
					$imm = '<img src="images/ressources/'.$img.'"  style="width:30px;"/>';

				}
				else {$imm = NULL;}
		echo '<li><a href="'.urlRewrite($dataLsm->titreEn,5,$dataLsm->id,NULL,NULL).'" title="'.$dataLsm->titreEn.'" class="reverse">'.$imm.' '.stripslashes($dataLsm->titreEn).'</a></li>';
      }
echo '</ul>
		</li>';?>
