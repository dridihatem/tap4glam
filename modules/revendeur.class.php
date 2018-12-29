<?php 
class Revendeur{

public $id;
public $raison;
public $rc;
public $patente;
public $nom;
public $prenom;
public $adresse;
public $gouvernerat;
public $mobile;
public $fixe;
public $fax;
public $email;
public $facebook;
public $login;
public $password;
public $passwordMd5;
public $etat;
public $date_inscription;



public function getId(){ return $this->id;}
public function getRaison(){ return $this->raison;}
public function getRc(){ return $this->rc;}
public function getPatente(){ return $this->patente;}
public function getNom(){ return $this->nom;}
public function getPrenom(){ return $this->prenom;}
public function getadresse(){ return $this->adresse;}
public function getGouvernerat(){ return $this->gouvernerat;}
public function getMobile(){ return $this->mobile;}
public function getFixe(){ return $this->fixe;}
public function getFax(){ return $this->fax;}
public function getEmail(){ return $this->email;}
public function getFacebook(){ return $this->facebook;}
public function getLogin(){ return $this->login;} 
public function getPassword(){ return $this->password;} 
public function getPasswordMd5(){ return $this->passwordMd5;} 
public function getEtat(){ return $this->etat;} 
public function getDateInscription(){ return $this->date_inscription;} 


public function setId($value){ $this->id= $value;}
public function setRaison($value){ $this->raison= $value;}
public function setRc($value){ $this->rc= $value;}
public function setPatente($value){ $this->patente= $value;}
public function setNom($value){ $this->nom= $value;}
public function setPrenom($value){ $this->prenom= $value;}
public function setAdresse($value){ $this->adresse= $value;}
public function setGouvernerat($value){ $this->gouvernerat= $value;}
public function setMobile($value){ $this->mobile= $value;}
public function setFixe($value){ $this->fixe= $value;}
public function setFax($value){ $this->fax= $value;}
public function setEmail($value){ $this->email= $value;} 
public function setFacebook(){ return $this->facebook;}
public function setLogin($value){ $this->login= $value;} 
public function setPassword($value){ $this->password= $value;} 
public function setPasswordMd5($value){ $this->passwordMd5= $value;} 
public function setEtat($value){ $this->etat= $value;} 
public function setDateInscription(){ return $this->date_inscription;}   





public function setRevendeur($id,$raison,$rc,$patente,$nom,$prenom,$adresse,$gouvernerat,$mobile,$fixe,$fax,$email,$facebook,$login,$password,$passwordMd5,$etat,$date_inscription){
	$this->id = $id ;
	$this->raison = $raison;
	$this->rc =$rc;
	$this->patente =$patente;
	$this->nom = $nom ;
	$this->prenom = $prenom ;
	$this->adresse= $adresse ;
	$this->gouvernerat= $gouvernerat ;
	$this->mobile= $mobile;
	$this->fixe = $fixe ;
	$this->fax = $fax;
	$this->email = $email ; 
	$this->facebook = $facebook ;
	$this->login = $login ;
	$this->password = $password ;
	$this->passwordMd5 = $passwordMd5 ;
	$this->etat = $etat ;
	$this->date_inscription = $date_inscription ;
	
}

public function getSQL(){
		$str = sprintf(" raison='%s'",mysql_real_escape_string($this->getRaison()));
        $str .= sprintf(", rc='%s'",mysql_real_escape_string($this->getRc()));
        $str .= sprintf(", patente='%s'",mysql_real_escape_string($this->getPatente()));
		$str .= sprintf(", nom='%s'",mysql_real_escape_string($this->getNom()));
		$str .= sprintf(", prenom='%s'",mysql_real_escape_string($this->getPrenom()));
        $str .= sprintf(", adresse='%s'",mysql_real_escape_string($this->getAdresse()));
        $str .= sprintf(", gouvernerat='%d'",mysql_real_escape_string($this->getGouvernerat()));
        $str .= sprintf(", mobile='%s'",mysql_real_escape_string($this->getMobile()));
        $str .= sprintf(", fixe='%s'",mysql_real_escape_string($this->getFixe()));
        $str .= sprintf(", fax='%s'",mysql_real_escape_string($this->getFax()));
		$str .= sprintf(", email='%s'",mysql_real_escape_string($this->getEmail()));
        $str .= sprintf(", facebook='%s'",mysql_real_escape_string($this->getFacebook()));
		$str .= sprintf(", login='%s'",mysql_real_escape_string($this->getLogin()));
		$str .= sprintf(", password='%s'",mysql_real_escape_string($this->getPassword()));
		$str .= sprintf(", passwordMd5='%s'",mysql_real_escape_string($this->getPasswordMd5()));
		$str .= sprintf(", etat='%b'",mysql_real_escape_string($this->getEtat()));
		$str .= sprintf(", date_inscription='".$this->getDateInscription())."'";
		return($str);


	}

public function updateToDB(){
		$query = "update ".$_SESSION['pfx']."_revendeur set ";
		$query .= $this->getSQL();
		$query .= sprintf(" where id = %d",$this->id);
		return mysql_query($query);
	}
	
public function saveToDB(){
		$query = "insert into ".$_SESSION['pfx']."_revendeur  set ";
		$query .= $this->getSQL();
		return mysql_query($query);
	}
public function deleteFromDB($id){
		$query = "delete from ".$_SESSION['pfx']."_revendeur  ";
		$query .= sprintf(" where id = '%d'",($id));
		return mysql_query($query);
	}

public function getFromDB($id){
		$res= mysql_fetch_array(mysql_query(sprintf("select * from ".$_SESSION['pfx']."_revendeur  where id = '%d'",mysql_real_escape_string($id))));
		$this->setRevendeur($res["id"],$res["raison"],$res["rc"],$res["patente"],$res["nom"],$res["prenom"],$res["adresse"],$res["gouvernerat"],$res["mobile"],$res["fixe"],$res["fax"],$res["email"],$res["facebook"],$res["login"],$res["password"],$res["passwordMd5"],$res["etat"],$res["date_inscription"]);
	}
public function getByEmailFromDB($email){
		$res= (mysql_query(sprintf("select * from ".$_SESSION['pfx']."_revendeur  where email = '%s'",mysql_real_escape_string($email))));
if(mysql_num_rows($res)>0) return true;
	else return false;

	}
public function deleteImageFromDB($id){
		$query = "update ".$_SESSION['pfx']."_revendeur set rc = ''";
		$query .= sprintf(" where id = %d",mysql_real_escape_string($id));
		return mysql_query($query);
	}
	public function deletePatenteFromDB($id){
		$query = "update ".$_SESSION['pfx']."_revendeur set patente = ''";
		$query .= sprintf(" where id = %d",mysql_real_escape_string($id));
		return mysql_query($query);
	}
	public function publishToDB($id,$pub){
		$query = sprintf("update ".$_SESSION['pfx']."_revendeur set etat = '%b' where id = '%d' ",mysql_real_escape_string($pub),mysql_real_escape_string($id));
		return mysql_query($query);
	}


	public function getByRaisonFromDB($raison){
		$res= (mysql_query(sprintf("select * from ".$_SESSION['pfx']."_revendeur  where raison = '%s'",mysql_real_escape_string($raison))));
if(mysql_num_rows($res)>0) return true;
	else return false;

	}

}
?>