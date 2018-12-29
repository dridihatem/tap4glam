<?php
error_reporting(0);
	$dest_dossier = "../../images/ressources/";
	chmod($dest_dossier,0777);

	$fichier1 = md5(basename($_FILES['fichier1']['name'])).".".substr(strrchr($_FILES['fichier1']['name'], '.'), 1);
	@move_uploaded_file($_FILES['fichier1']['tmp_name'],$dest_dossier . $fichier1);
	//chmod($dest_dossier.$fichier,0777);

?>