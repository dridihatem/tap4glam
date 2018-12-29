<?php
error_reporting(0);
	$dest_dossier = "../../images/ressources/";
	chmod($dest_dossier,0777);

	$fichier2 = md5(basename($_FILES['fichier2']['name'])).".".substr(strrchr($_FILES['fichier2']['name'], '.'), 1);
	@move_uploaded_file($_FILES['fichier2']['tmp_name'],$dest_dossier . $fichier2);
	//chmod($dest_dossier.$fichier,0777);

?>