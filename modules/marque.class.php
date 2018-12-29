<?php

class marque{

public $id;
public $titreFr;
public $descriptionFr;
public $image;
public $ordre;

public function getId(){ return $this->id;}
public function getTitreFr(){ return $this->titreFr;}
public function getDescriptionFr(){ return $this->descriptionFr;}
public function getImage(){ return $this->image;}
public function getOrdre(){ return $this->ordre;}


public function setId($value){ $this->id= $value;}
public function setTitreFr(){ return $this->titreFr;}
public function setDescriptionFr(){ return $this->descriptionFr;} 
public function setImage(){ return $this->image;}  
public function setOrdre(){ return $this->ordre;} 

public function setMarque($id,$titreFr,$descriptionFr,$image,$ordre){
	$this->id = $id ;
	$this->titreFr= $titreFr;
	$this->descriptionFr= $descriptionFr;
	$this->image= $image;
	$this->ordre= $ordre;
}

public function getSQL(){
		$str = sprintf(" titreFr='%s'",mysql_real_escape_string($this->getTitreFr()));
		$str .= sprintf(", descriptionFr='%s'",mysql_real_escape_string($this->getDescriptionFr()));
		$str .= sprintf(", image='%s'",mysql_real_escape_string($this->getImage()));
		$str .= sprintf(", ordre='%d'",mysql_real_escape_string($this->getOrdre()));
		return($str);
	}

public function updateToDB(){
		$query = "update ".$_SESSION['pfx']."_marque set ";
		$query .= $this->getSQL();
		$query .= sprintf(" where id = %d",$this->id);
		return mysql_query($query);
	}
	
public function saveToDB(){
		$query = "insert into ".$_SESSION['pfx']."_marque set ";
		$query .= $this->getSQL();
		return mysql_query($query);
	}
public function deleteFromDB($id){
		$query = "delete from ".$_SESSION['pfx']."_marque ";
		$query .= sprintf(" where id = '%d'",($id));
		return mysql_query($query);
	}

public function getFromDB($id){
		$res= mysql_fetch_array(mysql_query(sprintf("select * from ".$_SESSION['pfx']."_marque where id = '%d'",mysql_real_escape_string($id))));
		$this->setMarque($res["id"],$res["titreFr"],$res["descriptionFr"],$res["image"],$res["ordre"]);
	}


	
	
}


?>