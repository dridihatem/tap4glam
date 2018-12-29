<?php

class slide{

public $id;
public $titreFr;
public $titreEn;
public $descriptionFr;
public $descriptionEn;
public $image;
public $lien;
public $date_insertion;
public $publication;



public function getId(){ return $this->id;}
public function getTitreFr(){ return $this->titreFr;}
public function getTitreEn(){ return $this->titreEn;}
public function getDescriptionFr(){ return $this->descriptionFr;}
public function getDescriptionEn(){ return $this->descriptionEn;}
public function getImage(){ return $this->image;}
public function getLien(){ return $this->lien;}
public function getDate_insertion(){ return $this->date_insertion;}
public function getPublication(){ return $this->publication;}


public function setId($value){ $this->id= $value;}
public function setTitreFr($value){ $this->titreFr= $value;}
public function setTitreEn($value){ $this->titreEn= $value;}
public function setDescriptionFr($value){ $this->descriptionFr= $value;}
public function setDescriptionEn($value){ $this->descriptionEn= $value;}
public function setImage($value){ $this->image= $value;}
public function setLien($value){ $this->lien= $value;}
public function setDate_insertion($value){ $this->date_insertion= $value;}
public function setPublication($value){ $this->publication= $value;}


public function setSlide($id,$titreFr,$titreEn,$descriptionFr,$descriptionEn,$image,$lien,$date_insertion,$publication){
	$this->id = $id;
	$this->titreFr = $titreFr;
	$this->titreEn = $titreEn;
	$this->descriptionFr = $descriptionFr;
	$this->descriptionEn = $descriptionEn;
	$this->image = $image ;
	$this->lien = $lien ;
	$this->date_insertion = $date_insertion ;
	$this->publication = $publication ;


}

public function getSQL(){

		$str = sprintf(" titreFr='%s'",mysql_real_escape_string($this->getTitreFr()));
                $str .= sprintf(", titreEn='%s'",mysql_real_escape_string($this->getTitreEn()));
                $str .= sprintf(", descriptionFr='%s'",mysql_real_escape_string($this->getDescriptionFr()));
                $str .= sprintf(", descriptionEn='%s'",mysql_real_escape_string($this->getDescriptionEn()));
		$str .= sprintf(", image='%s'",mysql_real_escape_string($this->getImage()));
		$str .= sprintf(", lien='%s'",mysql_real_escape_string($this->getLien()));
		$str .= sprintf(", date_insertion='".$this->getDate_insertion())."'";
		$str .= sprintf(", publication='%b'",mysql_real_escape_string($this->getPublication()));
		return($str);
	}

public function updateToDB(){
		$query = "update ".$_SESSION['pfx']."_slide set ";
		$query .= $this->getSQL();
		$query .= sprintf(" where id = %d",$this->id);
		return mysql_query($query);
	}

public function saveToDB(){
		$query = "insert into ".$_SESSION['pfx']."_slide set ";
		$query .= $this->getSQL();
		return mysql_query($query);
	}
	public function deleteImageFromDB($id){
		$query = "update ".$_SESSION['pfx']."_slide set image = ''";
		$query .= sprintf(" where id = %d",mysql_real_escape_string($id));
		return mysql_query($query);
	}

public function deleteFromDB($id){
		$query = "delete from ".$_SESSION['pfx']."_slide ";
		$query .= sprintf(" where id = '%d'",($id));
		return mysql_query($query);
	}

public function getFromDB($id){
		$res= mysql_fetch_array(mysql_query(sprintf("select * from ".$_SESSION['pfx']."_slide where id = '%d'",mysql_real_escape_string($id))));
		$this->setSlide($res["id"],$res["titreFr"],$res["titreEn"],$res["descriptionFr"],$res["descriptionEn"],$res["image"],$res["lien"],$res["date_insertion"],$res["publication"]);
	}


	public function publishToDB($id,$pub){
		$query = sprintf("update ".$_SESSION['pfx']."_slide set publication = '%d' where id = '%d' ",mysql_real_escape_string($pub),mysql_real_escape_string($id));
		return mysql_query($query);
	}
}


?>
