<?php
error_reporting(0);
	$dest_dossier = "../../images/ressources/";
	chmod($dest_dossier,0777);

	$fichier3 = md5(basename($_FILES['fichier3']['name'])).".".substr(strrchr($_FILES['fichier3']['name'], '.'), 1);
	@move_uploaded_file($_FILES['fichier3']['tmp_name'],$dest_dossier . $fichier3);
	//chmod($dest_dossier.$fichier,0777);

?>