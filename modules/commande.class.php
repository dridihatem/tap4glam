<?php

//////////////////////////////////////////////////
//Classe Commande
//////////////////////////////////////////////////
class Commande{

	public $id;
	public $idmembre;
	public $idcommande;
	public $idProduit;
	public $qteProduit;
	public $prixunitaireProduit;
	public $prixtotal;
	
	public function	setCommande($id,$idmembre,$idcommande,$idProduit,$qteProduit,$prixunitaireProduit,$prixtotal){
		$this->id = $id;
		$this->idmembre = $idmembre;
		$this->idcommande = $idcommande;
		$this->idProduit = $idProduit;
		$this->qteProduit = $qteProduit;
		$this->prixunitaireProduit = $prixunitaireProduit;
		$this->prixtotal = $prixtotal;
	}

	public function getId(){return($this->id);}
	public function getIdmembre(){return($this->idmembre);}
	public function getIdcommande(){return($this->idcommande);}
	public function getIdProduit(){return($this->idProduit);}
	public function getQteProduit(){return($this->qteProduit);}
	public function getPrixunitaireProduit(){return($this->prixunitaireProduit);}
	public function getPrixtotal(){return($this->prixtotal);}
	
	public function setId($value){ $this->id = $value;}
	public function setIdmembre($value){ $this->idmembre = $value;}
	public function setIdcommande($value){ $this->idcommande = $value;}
	public function setIdProduit($value){ $this->idProduit = $value;}
	public function setQteProduit($value){ $this->qteProduit = $value;}
	public function setPrixunitaireProduit($value){ $this->prixunitaireProduit = $value;}
	public function setPrixtotal($value){ $this->prixtotal = $value;}

	public function getSQL(){

		$str = sprintf("idmembre='%d'",mysql_real_escape_string($this->getIdmembre()));
		$str .= sprintf(",idcommande='%d'",mysql_real_escape_string($this->getIdcommande()));
		$str .= sprintf(", idProduit='%d'",mysql_real_escape_string($this->getIdProduit()));
		$str .= sprintf(", qteProduit='%d'",mysql_real_escape_string($this->getQteProduit()));
		$str .= sprintf(", prixunitaireProduit='%f'",mysql_real_escape_string($this->getPrixunitaireProduit()));
		$str .= sprintf(", prixtotal='%f'",mysql_real_escape_string($this->getPrixtotal()));
		return($str);
		}

	public function getFromDB($id){
		$res = mysql_fetch_array(mysql_query(sprintf("SELECT * FROM ".$_SESSION['pfx']."_commande WHERE id='%d'",$id)));
		$this->setCommande($res["id"],$res["idmembre"],$res['idcommande'],$res["idProduit"],$res["qteProduit"],$res["prixunitaireProduit"],$res["prixtotal"]);
	}
	
	
	public function saveToDB(){
		$query = "INSERT INTO ".$_SESSION['pfx']."_commande SET ";
		$query .= $this->getSQL();
		return mysql_query($query);
	}
	
	public function updateToDB(){
		$query = "UPDATE ".$_SESSION['pfx']."_commande SET ";
		$query .= $this->getSQL();
		$query .= sprintf(" WHERE id = '%d' ",mysql_real_escape_string($this->id));
		return mysql_query($query);
	}
	
	
	public function deleteFromDB($id){
		$query = sprintf("DELETE FROM ".$_SESSION['pfx']."_commande WHERE id = '%d' ",mysql_real_escape_string($id));
		return mysql_query($query);
	}
	
	
	
	
}

?>