<?php
error_reporting(0);
	$dest_dossier = "../../images/ressources/";
	chmod($dest_dossier,0777);

	$pdf = md5(basename($_FILES['pdf']['name'])).".".substr(strrchr($_FILES['pdf']['name'], '.'), 1);
	@move_uploaded_file($_FILES['pdf']['tmp_name'],$dest_dossier . $pdf);
	//chmod($dest_dossier.$fichier,0777);

?>