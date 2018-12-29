<?php
class Sav {
		
public $id;
public $ref;
public $sujet;
public $appareil;
public $serie;
public $message;
public $type;
public $id_membre;
public $etat;
public $lu;
public $date_insertion;

public function getId(){ return $this->id;}
public function getRef(){ return $this->ref;}
public function getSujet(){ return $this->sujet;}
public function getAppareil(){ return $this->appareil;}
public function getSerie(){ return $this->serie;}
public function getPanne(){ return $this->panne;}
public function getMessage(){ return $this->message;} 
public function getType(){ return $this->type;} 
public function getId_membre(){ return $this->id_membre;}
public function getEtat(){ return $this->etat;} 
public function getLu(){ return $this->lu;} 
public function getDate_insertion(){ return $this->date_insertion;}

public function setId($value){ $this->id= $value;}
public function setRef($value){ $this->ref= $value;}
public function setSujet($value){ $this->sujet= $value;}
public function setAppareil($value){ $this->appareil= $value;}
public function setSerie($value){ $this->serie= $value;}
public function setPanne($value){ $this->panne= $value;}
public function setMessage($value){ $this->message= $value;}
public function setType($value){ $this->type= $value;}
public function setId_membre($value){ $this->id_membre= $value;} 
public function setEtat($value){ $this->etat= $value;}
public function setLu($value){ $this->lu= $value;} 
public function setDate_insertion($value){ $this->date_insertion= $value;}

public function setSav($id,$ref,$sujet,$appareil,$serie,$panne,$message,$type,$id_membre,$etat,$lu,$date_insertion){
	$this->id = $id;
	$this->ref = $ref;
	$this->sujet = $sujet;
	$this->appareil = $appareil;
	$this->serie = $serie;
	$this->panne = $panne;
	$this->message = $message;
	$this->type = $type;
	$this->id_membre = $id_membre;
	$this->etat = $etat;
	$this->lu= $lu;
	$this->date_insertion = $date_insertion;
}

public function getSQL(){
       
		
		$str = sprintf(" ref='%s'",mysql_real_escape_string($this->getRef()));
		$str .= sprintf(", sujet='%s'",mysql_real_escape_string($this->getSujet()));
		$str .= sprintf(", appareil='%s'",mysql_real_escape_string($this->getAppareil()));
		$str .= sprintf(", serie='%s'",mysql_real_escape_string($this->getSerie()));
		$str .= sprintf(", panne='%s'",mysql_real_escape_string($this->getPanne()));
		$str .= sprintf(", message='%s'",mysql_real_escape_string($this->getMessage()));
		$str .= sprintf(", type='%d'",mysql_real_escape_string($this->getType()));
		$str .= sprintf(", id_membre='%d'",mysql_real_escape_string($this->getId_membre()));
		$str .= sprintf(", etat='%d'",mysql_real_escape_string($this->getEtat()));
		$str .= sprintf(", lu='%s'",mysql_real_escape_string($this->getLu()));
		$str .= sprintf(", date_insertion='".$this->getDate_insertion())."'";
		return($str);
	}

public function updateToDB(){
		$query = "UPDATE ".$_SESSION['pfx']."_sav SET ";
		$query .= $this->getSQL();
		$query .= sprintf(" WHERE id = %d",$this->id);
		return mysql_query($query);
	}
	
public function saveToDB(){
		$query = "INSERT INTO ".$_SESSION['pfx']."_sav SET ";
		$query .= $this->getSQL();
		return mysql_query($query);
	}
public function deleteFromDB($id){
		$query = "DELETE From ".$_SESSION['pfx']."_sav ";
		$query .= sprintf(" WHERE id = '%d'",($id));
		return mysql_query($query);
	}

public function getetatappareil($id,$etat){
$query = sprintf("update ".$_SESSION['pfx']."_sav set etat = '%d' where id = '%d' ",mysql_real_escape_string($etat),mysql_real_escape_string($id));
		return mysql_query($query);
}


public function getFromDB($id){
		$res= mysql_fetch_array(mysql_query(sprintf("SELECT * FROM ".$_SESSION['pfx']."_sav WHERE id = '%d'",mysql_real_escape_string($id))));
		$this->setSav($res["id"],$res["ref"],$res["sujet"],$res["appareil"],$res["serie"],$res["panne"],$res["message"],$res["type"],$res["id_membre"],$res["etat"],$res["lu"],$res["date_insertion"]);
	}







}
 ?>
