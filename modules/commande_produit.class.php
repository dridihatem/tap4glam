<?php 
class CommandeProduit{
public $id;
public $newid;
public $idClient;
public $montant;
public $date_insertion;


public function getId(){ return $this->id;}
public function getNewid(){ return $this->newid;}
public function getIdcommande(){ return $this->idcommande;}
public function getIdClient(){ return $this->idClient;}
public function getMontant(){ return $this->montant;}
public function getDate_insertion(){ return $this->date_insertion;}

public function setId($value){ $this->id= $value;}
public function setNewid($value){ $this->newid= $value;}
public function setIdcommande($value){ $this->idcommande= $value;}
public function setIdClient($value){ $this->idClient= $value;}
public function setMontant($value){ $this->montant= $value;}
public function setDate_insertion($value){ $this->date_insertion= $value;}



public function setCommandeProduit($id,$newid,$idcommande,$idClient,$montant,$date_insertion){
	$this->id = $id ;
	$this->newid = $newid ;
	$this->idcommande = $idcommande ;
	$this->idClient = $idClient ;
	$this->montant = $montant ;
	$this->date_insertion = $date_insertion ;
}

public function getSQL(){
		$str = sprintf(" newid='%d'",mysql_real_escape_string($this->getNewid()));
		$str .= sprintf(", idcommande='%s'",mysql_real_escape_string($this->getIdcommande()));
		$str .= sprintf(", idClient='%d'",mysql_real_escape_string($this->getIdClient()));
		$str .= sprintf(", montant='%f'",mysql_real_escape_string($this->getMontant()));
		$str .= ", date_insertion='".$this->getDate_insertion()."'";
		return($str);
	}

public function updateToDB(){
		$query = "update ".$_SESSION['pfx']."_commande_produit set ";
		$query .= $this->getSQL();
		$query .= sprintf(" where id = %d",$this->id);
		return mysql_query($query);
	}
	
public function saveToDB(){
		$query = "insert into ".$_SESSION['pfx']."_commande_produit set ";
		$query .= $this->getSQL();
		return mysql_query($query);
	}
public function deleteFromDB($id){
		$query = "delete from ".$_SESSION['pfx']."_commande_produit ";
		$query .= sprintf(" where id = '%d'",($id));
		return mysql_query($query);
	}

public function getFromDB($id){
		$res= mysql_fetch_array(mysql_query(sprintf("select * from ".$_SESSION['pfx']."_commande_produit  where id = '%d'",mysql_real_escape_string($id))));
		$this->setCommandeProduit($res["id"],$res['newid'],$res["idcommande"],$res["idClient"],$res["montant"],$res["date_insertion"]);
	}

	


}
?>