<?php
error_reporting(0);
	$dest_dossier = "../../images/ressources/";
	chmod($dest_dossier,0777);

	$fichier4 = md5(basename($_FILES['fichier4']['name'])).".".substr(strrchr($_FILES['fichier4']['name'], '.'), 1);
	@move_uploaded_file($_FILES['fichier4']['tmp_name'],$dest_dossier . $fichier4);
	//chmod($dest_dossier.$fichier,0777);

?>