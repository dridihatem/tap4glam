<?php
class Reclamation {
		
public $id;
public $poste;
public $sujet;
public $message;
public $lu;
public $id_membre;
public $date_insertion;

public function getId(){ return $this->id;}
public function getPoste(){ return $this->poste;}
public function getSujet(){ return $this->sujet;}
public function getMessage(){ return $this->message;} 
public function getLu(){ return $this->lu;} 
public function getId_membre(){ return $this->id_membre;}
public function getDate_insertion(){ return $this->date_insertion;}

public function setId($value){ $this->id= $value;}
public function setPoste($value){ $this->poste= $value;}
public function setSujet($value){ $this->sujet= $value;}
public function setMessage($value){ $this->message= $value;}
public function setLu($value){ $this->lu= $value;} 
public function setId_membre($value){ $this->id_membre= $value;} 
public function setDate_insertion($value){ $this->date_insertion= $value;}

public function setReclamation($id,$poste,$sujet,$message,$lu,$id_membre,$date_insertion){
	$this->id = $id;
	$this->poste = $poste;
	$this->sujet = $sujet;
	$this->message = $message;
	$this->lu= $lu;
	$this->id_membre = $id_membre;
	$this->date_insertion = $date_insertion;
}

public function getSQL(){
       
		$str = sprintf(" poste='%s'",mysql_real_escape_string($this->getPoste()));
		$str .= sprintf(", sujet='%s'",mysql_real_escape_string($this->getSujet()));
		$str .= sprintf(", message='%s'",mysql_real_escape_string($this->getMessage()));
		$str .= sprintf(", lu='%s'",mysql_real_escape_string($this->getLu()));
		$str .= sprintf(", id_membre='%d'",mysql_real_escape_string($this->getId_membre()));
		$str .= sprintf(", date_insertion='".$this->getDate_insertion())."'";
		return($str);
	}

public function updateToDB(){
		$query = "UPDATE ".$_SESSION['pfx']."_reclamation SET ";
		$query .= $this->getSQL();
		$query .= sprintf(" WHERE id = %d",$this->id);
		return mysql_query($query);
	}
	
public function saveToDB(){
		$query = "INSERT INTO ".$_SESSION['pfx']."_reclamation SET ";
		$query .= $this->getSQL();
		return mysql_query($query);
	}
public function deleteFromDB($id){
		$query = "DELETE From ".$_SESSION['pfx']."_reclamation ";
		$query .= sprintf(" WHERE id = '%d'",($id));
		return mysql_query($query);
	}

public function getFromDB($id){
		$res= mysql_fetch_array(mysql_query(sprintf("SELECT * FROM ".$_SESSION['pfx']."_reclamation WHERE id = '%d'",mysql_real_escape_string($id))));
		$this->setReclamation($res["id"],$res["poste"],$res["sujet"],$res["message"],$res["lu"],$res["id_membre"],$res["date_insertion"]);
	}







}
 ?>
