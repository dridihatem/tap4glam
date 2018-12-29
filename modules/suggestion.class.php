<?php
class Suggestion_message {
		
public $id;
public $nom;
public $societe;
public $fonction;
public $telephone;
public $email;
public $objet;
public $suggestion;
public $lu;
public $date_insertion;

public function getId(){ return $this->id;}
public function getNom(){ return $this->nom;}
public function getSociete(){ return $this->societe;}
public function getFonction(){ return $this->fonction;}
public function getTelephone(){ return $this->telephone;} 
public function getEmail(){ return $this->email;} 
public function getObjet(){ return $this->objet;}
public function getSuggestion(){ return $this->suggestion;} 
public function getLu(){ return $this->lu;} 
public function getDate_insertion(){ return $this->date_insertion;}

public function setId($value){ $this->id= $value;}
public function setNom($value){ $this->nom= $value;}
public function setSociete($value){ $this->societe= $value;}
public function setFonction($value){ $this->fonction= $value;}
public function setTelephone($value){ $this->telephone= $value;}
public function setEmail($value){ $this->email= $value;}
public function setObjet($value){ $this->objet= $value;} 
public function setSuggestion($value){ $this->suggestion= $value;}
public function setLu($value){ $this->lu= $value;} 
public function setDate_insertion($value){ $this->date_insertion= $value;}

public function setSuggestion_message($id,$nom,$societe,$fonction,$telephone,$email,$objet,$suggestion,$lu,$date_insertion){
	$this->id = $id;
	$this->nom = $nom;
	$this->societe = $societe;
	$this->fonction = $fonction;
	$this->telephone = $telephone;
	$this->email = $email;
	$this->objet = $objet;
	$this->suggestion = $suggestion;
	$this->lu= $lu;
	$this->date_insertion = $date_insertion;
}

public function getSQL(){
       
		$str = sprintf(" nom='%s'",mysql_real_escape_string($this->getNom()));
		$str .= sprintf(", societe='%s'",mysql_real_escape_string($this->getSociete()));
		$str .= sprintf(", fonction='%s'",mysql_real_escape_string($this->getFonction()));
		$str .= sprintf(", telephone='%s'",mysql_real_escape_string($this->getTelephone()));
		$str .= sprintf(", email='%s'",mysql_real_escape_string($this->getEmail()));
		$str .= sprintf(", objet='%s'",mysql_real_escape_string($this->getObjet()));
		$str .= sprintf(", suggestion='%s'",mysql_real_escape_string($this->getSuggestion()));
		$str .= sprintf(", lu='%b'",mysql_real_escape_string($this->getLu()));
		$str .= sprintf(", date_insertion='".$this->getDate_insertion())."'";
		return($str);
	}

public function updateToDB(){
		$query = "UPDATE ".$_SESSION['pfx']."_suggestion SET ";
		$query .= $this->getSQL();
		$query .= sprintf(" WHERE id = %d",$this->id);
		return mysql_query($query);
	}
	
public function saveToDB(){
		$query = "INSERT INTO ".$_SESSION['pfx']."_suggestion SET ";
		$query .= $this->getSQL();
		return mysql_query($query);
	}
public function deleteFromDB($id){
		$query = "DELETE From ".$_SESSION['pfx']."_suggestion ";
		$query .= sprintf(" WHERE id = '%d'",($id));
		return mysql_query($query);
	}

public function getFromDB($id){
		$res= mysql_fetch_array(mysql_query(sprintf("SELECT * FROM ".$_SESSION['pfx']."_suggestion WHERE id = '%d'",mysql_real_escape_string($id))));
		$this->setSuggestion_message($res["id"],$res["nom"],$res["societe"],$res["fonction"],$res["telephone"],$res["email"],$res["objet"],$res["suggestion"],$res["lu"],$res["date_insertion"]);
	}







}
 ?>
