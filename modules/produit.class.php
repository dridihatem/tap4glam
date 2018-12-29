<?php
//////////////////////////////////////////////////
//type produit
//////////////////////////////////////////////////
class Produit{

public $id;
public $modele;
public $titreFr;
public $titreEn;
public $descriptionFr;
public $descriptionEn;
public $image1;
public $image2;
public $image3;
public $fiche;
public $id_categorie;
public $id_sous_categorie;
public $chassis;
public $chassis_modele;
public $moteur;
public $puissance;
public $emission;
public $date_insertion;
public $publication;
public $vu;


public function getId(){ return $this->id;}
public function getModele(){ return $this->modele;}
public function getTitreFr(){ return $this->titreFr;}
public function getTitreEn(){ return $this->titreEn;}
public function getDescriptionFr(){ return $this->descriptionFr;}
public function getDescriptionEn(){ return $this->descriptionEn;}
public function getImage1(){ return $this->image1;}
public function getImage2(){ return $this->image2;}
public function getImage3(){ return $this->image3;}
public function getFiche(){ return $this->fiche;}
public function getId_categorie(){ return $this->id_categorie;}
public function getId_sous_categorie(){ return $this->id_sous_categorie;}
public function getChassis(){ return $this->chassis;}
public function getChassis_modele(){ return $this->chassis_modele;}
public function getMoteur(){ return $this->moteur;}
public function getPuissance(){ return $this->puissance;}
public function getEmission(){ return $this->emission;}
public function getDate_insertion(){ return $this->date_insertion;} 
public function getPublication(){ return $this->publication;}
public function getVu(){ return $this->vu;}

public function setId($value){ $this->id= $value;}
public function setModele($value){ $this->modele= $value;}
public function setTitreFr($value){ $this->titreFr= $value;}
public function setTitreEn($value){ $this->titreEn= $value;}
public function setDescriptionFr($value){ $this->descriptionFr= $value;}
public function setDescriptionEn($value){ $this->descriptionEn= $value;}
public function setImage1($value){ $this->image1= $value;}
public function setImage2($value){ $this->image2= $value;}
public function setImage3($value){ $this->image3= $value;}
public function setFiche($value){ $this->fiche= $value;}
public function setId_categorie($value){$this->id_categorie= $value;}
public function setId_sous_categorie($value){$this->id_sous_categorie= $value;}
public function setChassis($value){$this->chassis= $value;}
public function setChassis_modele($value){$this->chassis_modele= $value;}
public function setMoteur($value){$this->moteur= $value;}
public function setPuissance($value){$this->puissance= $value;}
public function setEmission($value){$this->emission= $value;}
public function setDate_insertion($value){$this->date_insertion= $value;}
public function setPublication($value){ $this->publication= $value;}
public function setVu($value){ $this->vu= $value;}

public function setProduit($id,$modele,$titreFr,$titreEn,$descriptionFr,$descriptionEn,$image1,$image2,$image3,$fiche,$id_categorie,$id_sous_categorie,$chassis,$chassis_modele,$moteur,$puissance,$emission,$date_insertion,$publication,$vu){
	$this->id = $id;
	$this->modele = $modele;
	$this->titreFr = $titreFr;
	$this->titreEn = $titreEn;
	$this->descriptionFr = $descriptionFr;
	$this->descriptionEn = $descriptionEn;
	$this->image1 = $image1 ;
	$this->image2 = $image2;
	$this->image3 = $image3;
	$this->fiche = $fiche;
	$this->id_categorie = $id_categorie ;
	$this->id_sous_categorie = $id_sous_categorie ;
	$this->chassis = $chassis ;
	$this->chassis_modele = $chassis_modele ;
	$this->moteur = $moteur ;
	$this->puissance = $puissance ;
	$this->emission = $emission ;
	$this->date_insertion = $date_insertion;
	$this->publication = $publication ; 
	$this->vu = $vu ; 
	
}

public function getSQL(){
		
		$str = sprintf(" modele='%s'",mysql_real_escape_string($this->getModele()));
		$str .= sprintf(", titreFr='%s'",mysql_real_escape_string($this->getTitreFr()));
		$str .= sprintf(", titreEn='%s'",mysql_real_escape_string($this->getTitreEn()));
		$str .= sprintf(", descriptionFr='%s'",mysql_real_escape_string($this->getDescriptionFr()));
		$str .= sprintf(", descriptionEn='%s'",mysql_real_escape_string($this->getDescriptionEn()));
		$str .= sprintf(", image1='%s'",mysql_real_escape_string($this->getImage1()));
		$str .= sprintf(", image2='%s'",mysql_real_escape_string($this->getImage2()));
		$str .= sprintf(", image3='%s'",mysql_real_escape_string($this->getImage3()));
		$str .= sprintf(", fiche='%s'",mysql_real_escape_string($this->getFiche()));
		$str .= sprintf(", id_categorie='%d'",mysql_real_escape_string($this->getId_categorie()));
		$str .= sprintf(", id_sous_categorie='%d'",mysql_real_escape_string($this->getId_sous_categorie()));
		$str .= sprintf(", chassis='%s'",mysql_real_escape_string($this->getChassis()));
		$str .= sprintf(", chassis_modele='%s'",mysql_real_escape_string($this->getChassis_modele()));
		$str .= sprintf(", moteur='%s'",mysql_real_escape_string($this->getMoteur()));
		$str .= sprintf(", puissance='%s'",mysql_real_escape_string($this->getPuissance()));
		$str .= sprintf(", emission='%s'",mysql_real_escape_string($this->getEmission()));
		$str .= sprintf(", date_insertion='".$this->getDate_insertion())."'";
		$str .= sprintf(", publication='%b'",mysql_real_escape_string($this->getPublication()));
		$str .= sprintf(", vu='%d'",mysql_real_escape_string($this->getVu()));
		return($str);
	}

public function updateToDB(){
		$query = "update ".$_SESSION['pfx']."_produit set ";
		$query .= $this->getSQL();
		$query .= sprintf(" where id = %d",$this->id);
		return mysql_query($query);
	}
	
public function saveToDB(){
		$query = "insert into ".$_SESSION['pfx']."_produit set ";
		$query .= $this->getSQL();
		return mysql_query($query);
	}
	public function deleteImage1FromDB($id){
		$query = "update ".$_SESSION['pfx']."_produit set image1 = ''";
		$query .= sprintf(" where id = %d",mysql_real_escape_string($id));
		return mysql_query($query);
	}
	public function deleteImage2FromDB($id){
		$query = "update ".$_SESSION['pfx']."_produit set image2 = ''";
		$query .= sprintf(" where id = %d",mysql_real_escape_string($id));
		return mysql_query($query);
	}
	public function deleteImage3FromDB($id){
		$query = "update ".$_SESSION['pfx']."_produit set image3 = ''";
		$query .= sprintf(" where id = %d",mysql_real_escape_string($id));
		return mysql_query($query);
	}
        public function deleteFicheFromDB($id){
		$query = "update ".$_SESSION['pfx']."_produit set fiche = ''";
		$query .= sprintf(" where id = %d",mysql_real_escape_string($id));
		return mysql_query($query);
	}
public function deleteFromDB($id){
		$query = "delete from ".$_SESSION['pfx']."_produit ";
		$query .= sprintf(" where id = '%d'",($id));
		return mysql_query($query);
	}

public function getFromDB($id){
		$res= mysql_fetch_array(mysql_query(sprintf("select * from ".$_SESSION['pfx']."_produit where id = '%d'",mysql_real_escape_string($id))));
		$this->setProduit($res["id"],$res["modele"],$res["titreFr"],$res["titreEn"],$res["descriptionFr"],$res["descriptionEn"],$res["image1"],$res["image2"],$res["image3"],$res["fiche"],$res["id_categorie"],$res["id_sous_categorie"],$res["chassis"],$res["chassis_modele"],$res["moteur"],$res["puissance"],$res["emission"],$res["date_insertion"],$res["publication"],$res["vu"]);
	}


	public function publishToDB($id,$pub){
		$query = sprintf("update ".$_SESSION['pfx']."_produit set publication = '%b' where id = '%d' ",mysql_real_escape_string($pub),mysql_real_escape_string($id));
		return mysql_query($query);
	}
	public function updateView($id) {
		$query = sprintf("update ".$_SESSION['pfx']."_produit set vu =vu+1 where id = '%d' ",mysql_real_escape_string($id));
		return mysql_query($query);
    
    }
}


?>