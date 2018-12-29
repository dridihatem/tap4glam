<?php
error_reporting(0);
	$dest_dossier = "../../images/ressources/";
	chmod($dest_dossier,0777);

	$fichier = md5(basename($_FILES['fichier']['name'])).".".substr(strrchr($_FILES['fichier']['name'], '.'), 1);
	@move_uploaded_file($_FILES['fichier']['tmp_name'],$dest_dossier . $fichier);
	//chmod($dest_dossier.$fichier,0777);

?>