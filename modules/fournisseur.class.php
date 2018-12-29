<?php

//////////////////////////////////////////////////

//type categorie

//////////////////////////////////////////////////

class Fournisseur extends DB{



public $id;

public $societe;

public $registre_commerce;

public $matricule_fiscal;

public $code_comptable;

public $role;

public $adresse;

public $tel;

public $email;

public $user;

public $motPasse;

public $motPasseMd5;

public $date_insertion;

public $publication;





public function getId(){ return $this->id;}

public function getSociete(){ return $this->societe;}

public function getRegistre_commerce(){ return $this->registre_commerce;}

public function getMatricule_fiscal(){ return $this->matricule_fiscal;}

public function getCode_comptable(){ return $this->code_comptable;}

public function getRole(){ return $this->role;}

public function getAdresse(){ return $this->adresse;}

public function getTel(){ return $this->tel;}

public function getEmail(){ return $this->email;}

public function getUser(){ return $this->user;}

public function getMotPasse(){ return $this->motPasse;}

public function getMotPasseMd5(){ return $this->motPasseMd5;}

public function getDate_insertion(){ return $this->date_insertion;}

public function getPublication(){ return $this->publication;}


public function setId($value){ $this->id= $value;}

public function setSociete($value){ $this->societe= $value;}

public function setRegistre_commerce($value){ $this->registre_commerce= $value;}

public function setMatricule_fiscal($value){ $this->matricule_fiscal= $value;}

public function setCode_comptable($value){ $this->code_comptable= $value;}

public function setRole($value){ $this->role= $value;}

public function setAdresse($value){ $this->adresse= $value;}

public function setTel($value){ $this->tel= $value;}

public function setEmail($value){ $this->email= $value;}

public function setUser($value){ $this->user= $value;}

public function setMotPasse($value){ $this->motPasse= $value;}

public function setMotPasseMd5($value){ $this->motPasseMd5= $value;}

public function setDate_insertion($value){ $this->date_insertion= $value;}

public function setPublication($value){ $this->publication= $value;}



public function setFournisseur($id,$societe,$registre_commerce,$matricule_fiscal,$code_comptable,$role,$adresse,$tel,$email,$user,$motPasse,$motPasseMd5,$date_insertion,$publication){

	$this->id = $id;

	$this->societe = $societe;

	$this->registre_commerce = $registre_commerce;

	$this->matricule_fiscal = $matricule_fiscal;

	$this->code_comptable = $code_comptable;

	$this->role = $role;

	$this->adresse = $adresse;

	$this->tel = $tel;

	$this->email = $email;

	$this->user = $user;

	$this->motPasse = $motPasse ;

	$this->motPasseMd5 = $motPasseMd5 ;

	$this->date_insertion = $date_insertion ;

	$this->publication = $publication ;

	

}



public function getSQL(){

		

		$str = sprintf(" societe='%s'",mysqli_real_escape_string($this->connect(), $this->getSociete()));

		$str .= sprintf(", registre_commerce='%s'",mysqli_real_escape_string($this->connect(),$this->getRegistre_commerce()));

		$str .= sprintf(", matricule_fiscal='%s'",mysqli_real_escape_string($this->connect(),$this->getMatricule_fiscal()));

		$str .= sprintf(", code_comptable='%s'",mysqli_real_escape_string($this->connect(),$this->getCode_comptable()));

		$str .= sprintf(", role='%d'",mysqli_real_escape_string($this->connect(),$this->getRole()));

		$str .= sprintf(", adresse='%s'",mysqli_real_escape_string($this->connect(),$this->getAdresse()));

                $str .= sprintf(", tel='%s'",mysqli_real_escape_string($this->connect(),$this->getTel()));

		$str .= sprintf(", email='%s'",mysqli_real_escape_string($this->connect(),$this->getEmail()));

		$str .= sprintf(", user='%s'",mysqli_real_escape_string($this->connect(),$this->getUser()));

		$str .= sprintf(", motPasse='%s'",mysqli_real_escape_string($this->connect(),$this->getMotPasse()));

		$str .= sprintf(", motPasseMd5='%s'",mysqli_real_escape_string($this->connect(),$this->getMotPasseMd5()));

		$str .= sprintf(", date_insertion='%s'",mysqli_real_escape_string($this->connect(),$this->getDate_insertion()));

		$str .= sprintf(", publication='%b'",mysqli_real_escape_string($this->connect(),$this->getPublication()));

		return($str);

	}



public function updateToDB(){

		$query = "update ".$_SESSION['pfx']."_fournisseur set ";

		$query .= $this->getSQL();

		$query .= sprintf(" where id = %d",$this->id);

		return $this->connect()->query($query);

	}

	

public function saveToDB(){

		$query = "insert into ".$_SESSION['pfx']."_fournisseur set ";

		$query .= $this->getSQL();

		return $this->connect()->query($query);

	}

	public function deleteImageFromDB($id){

		$query = "update ".$_SESSION['pfx']."_fournisseur set logo = ''";

		$query .= sprintf(" where id = %d",mysql_real_escape_string($id));

		return $this->connect()->query($query);

	}

	

	public function deleteFromDB($id){

		$query = "delete from ".$_SESSION['pfx']."_fournisseur ";

		$query .= sprintf(" where id = '%d'",($id));

		return $this->connect()->query($query);

	}



public function getFromDB($id){
    
                $res= $this->connect()->query("select * from ".$_SESSION['pfx']."_fournisseur where id = '$id'");
                while($fetch = $res->fetch_assoc()){
                $row[] =$fetch; 
                   $this->setFournisseur($fetch["id"],$fetch["societe"],$fetch["registre_commerce"],$fetch["matricule_fiscal"],$fetch["code_comptable"],$fetch["role"],$fetch["adresse"],$fetch["tel"],$fetch["email"],$fetch["user"],$fetch["motPasse"],$fetch["motPasseMd5"],$fetch["date_insertion"],$fetch["publication"]);
                }

		

	}
        
        public function publishToDB($id,$pub){

		$query = sprintf("update ".$_SESSION['pfx']."_fournisseur set publication = '%b' where id = '%d' ",mysqli_real_escape_string($this->connect(),$pub),mysqli_real_escape_string($this->connect(),$id));

		$res = $this->connect()->query($query);
 		if($res){
 			return true;
 		}else{
 			return false;
 		}

	}



	

}





?>