<?php
//////////////////////////////////////////////////
//publication Banner
//////////////////////////////////////////////////
class Banner{

public $id;
public $image;
public $ordre;
public $publication;

public function getId(){ return $this->id;}
public function getImage(){ return $this->image;}
public function getOrdre(){ return $this->ordre;}
public function getPublication(){ return $this->publication;}

public function setId($value){ $this->id= $value;}
public function setImage($value){ $this->image= $value;}
public function setOrdre($value){ $this->ordre= $value;}
public function setPublication($value){ $this->publication= $value;}

public function setBanner($id,$image,$ordre,$publication){
	$this->id = $id;
	$this->image = $image;
	$this->ordre = $ordre;
	$this->publication = $publication ;
}

	public function getSQL(){
	    $str = sprintf("image='%s'",mysql_real_escape_string($this->getImage()));
	    $str .= sprintf(",ordre='%d'",mysql_real_escape_string($this->getOrdre()));
		$str .= sprintf(",publication='%d'",mysql_real_escape_string($this->getPublication()));
		return($str);
	}

	public function saveToDB(){
		$query = "INSERT INTO ".$_SESSION['pfx']."_banner SET ";
		$query .= $this->getSQL();
		return mysql_query($query);
	}

	public function deleteFromDB($id){
		$query = "DELETE FROM ".$_SESSION['pfx']."_banner ";
		$query .= sprintf(" where id = '%d'",($id));
		return mysql_query($query);
	}

	public function getFromDB($id){
		$res= mysql_fetch_array(mysql_query(sprintf("select * FROM ".$_SESSION['pfx']."_banner  where id = '%d'",mysql_real_escape_string($id))));
		$this->setBanner($res["id"],$res['image'],$res['ordre'],$res["publication"]);
	}
	
	public function publishToDB($id,$pub){
		$query = sprintf("update ".$_SESSION['pfx']."_banner  set publication = '%d' where id = '%d' ",mysql_real_escape_string($pub),mysql_real_escape_string($id));
		return mysql_query($query);
	}
	public function updateToDB(){
		$query = "update ".$_SESSION['pfx']."_banner set ";
		$query .= $this->getSQL();
		$query .= sprintf(" where id = %d",$this->id);
		return mysql_query($query);
	}
	public function deleteImage1FromDB($id){
		$query = "update ".$_SESSION['pfx']."_banner  set image = ''";
		$query .= sprintf(" where id = %d",mysql_real_escape_string($id));
		return mysql_query($query);
	}

}
?>