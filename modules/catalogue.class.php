<?php

class Catalogue{

public $id;
public $ordre;
public $photo;
public $menu1;
public $menuParent;
public $publish;

public function getId(){ return $this->id;}
public function getOrdre(){ return $this->ordre;} 
public function getPhoto(){ return $this->photo;}
public function getMenu1(){ return $this->menu1;}
public function getMenuParent(){ return $this->menuParent;}
public function getPublish(){ return $this->publish;}

public function setId($value){ $this->id= $value;}
public function setOrdre($value){ $this->ordre= $value;} 
public function setPhoto($value){ $this->photo= $value;}
public function setMenu1($value){ $this->menu1= $value;}
public function setMenuParent($value){ $this->menuParent= $value;} 
public function setPublish($value){ $this->publish= $value;} 

public function setCatalogue($id,$ordre,$photo,$menu1,$menuParent,$publish){
	$this->id = $id ;
	$this->ordre = $ordre ;
	$this->photo = $photo ;
	$this->menu1 = $menu1 ;
	$this->menuParent = $menuParent ;
	$this->publish = $publish ; 
	
}

public function getSQL(){
		$str = sprintf(" ordre='%d'",mysql_real_escape_string($this->getOrdre()));
		$str .= sprintf(", photo='%s'",mysql_real_escape_string($this->getPhoto()));
		$str .= sprintf(", menu1='%d'",mysql_real_escape_string($this->getMenu1()));
		$str .= sprintf(", menuParent='%d'",mysql_real_escape_string($this->getMenuParent()));
		$str .= sprintf(", publish='%b'",mysql_real_escape_string($this->getPublish()));
		return($str);
	}

public function updateToDB(){
		$query = "update ".$_SESSION['pfx']."_categorie set ";
		$query .= $this->getSQL();
		$query .= sprintf(" where id = %d",$this->id);
		return mysql_query($query);
	}
	
public function saveToDB(){
		$query = "insert into ".$_SESSION['pfx']."_categorie set ";
		$query .= $this->getSQL();
		return mysql_query($query);
	}
public function deleteFromDB($id){
		$query = "delete from ".$_SESSION['pfx']."_categorie ";
		$query .= sprintf(" where id = '%d'",($id));
		return mysql_query($query);
	}

public function getFromDB($id){
		$res= mysql_fetch_array(mysql_query(sprintf("select * from ".$_SESSION['pfx']."_categorie where id = '%d'",mysql_real_escape_string($id))));
		$this->setCatalogue($res["id"],$res["ordre"],$res["titreFr"],$res["titreEn"],$res["photo"],$res["menu1"],$res["menuParent"],$res["publish"]);
	}

public function getByIdFromDB($id){
		$res= mysql_fetch_array(mysql_query(sprintf("select * from ".$_SESSION['pfx']."_categorie where id='%d'",mysql_real_escape_string($id))));
		$this->setModule($res["id"],$res["ordre"],$res["photo"],$res["menu1"],$res["menuParent"],$res["publish"]);
	}
	
	public function getByType($type){
		$res= mysql_fetch_array(mysql_query(sprintf("select * from ".$_SESSION['pfx']."_categorie where type = '%s'",mysql_real_escape_string($type))));
		$this->setCatalogue($res["id"],$res["ordre"],$res["photo"],$res["menu1"],$res["menuParent"],$res["publish"]);
	}

	public function publishToDB($id,$pub,$menu){
		$query = sprintf("update ".$_SESSION['pfx']."_categorie set publish = '%d', menu1 = '%d' where id = '%d' ",mysql_real_escape_string($pub),mysql_real_escape_string($menu),mysql_real_escape_string($id));
		return mysql_query($query);
	}
}


?>