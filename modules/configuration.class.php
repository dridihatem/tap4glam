<?php 
  class Configuration {
    public $id;
	public $email;
	public $facebook;
	public $gplus;
	public $twitter;
	public $coordonne;
	
	public function	setConfiguration($id,$email,$facebook,$gplus,$twitter,$coordonne){
	    $this->id= $id;
		$this->email = $email;
		$this->facebook = $facebook;
		$this->gplus = $gplus;
		$this->twitter = $twitter;
		$this->coordonne = $coordonne;
	}
	
	public function getId() {return($this->id);}
	public function getEmail(){return($this->email);}
	public function getFacebook(){return($this->facebook);}
	public function getGplus(){return($this->gplus);}
	public function getTwitter(){return($this->twitter);}
	public function getCoordonne(){return($this->coordonne);}
	
	public function setId($value){ $this->id=$value;}
	public function setEmail($value){ $this->email = $value;}
	public function setFacebook($value){ $this->facebook = $value;}
	public function setGplus($value){ $this->gplus = $value;}
	public function setTwitter($value){ $this->twitter = $value;}
	public function setCoordonne($value){ $this->coordonne = $value;}


	public function getSQL(){
		
		
		$str = sprintf(" email='%s'",mysql_real_escape_string($this->getEmail()));
		$str .= sprintf(", facebook = '%s'",mysql_real_escape_string($this->getFacebook()));	
		$str .= sprintf(", gplus = '%s'",mysql_real_escape_string($this->getGplus()));	
		$str .= sprintf(", twitter = '%s'",mysql_real_escape_string($this->getTwitter()));	
		$str .= sprintf(", coordonne = '%s'",mysql_real_escape_string($this->getCoordonne()));	
		return($str);
	}
	
	public function getFromDB($id){
		$res= mysql_fetch_object(mysql_query(sprintf("SELECT * FROM ".$_SESSION['pfx']."_configuration WHERE id=%d",$id)));
		$this->setConfiguration($res->id,$res->email,$res->facebook,$res->gplus,$res->twitter,$res->coordonne);
	}

	public function saveToDB(){
		$query = "insert into ".$_SESSION['pfx']."_configuration set ";
		$query .= $this->getSQL();
		return mysql_query($query);
	}
	
	public function updateToDB(){
		$query = "update ".$_SESSION['pfx']."_configuration set ";
		$query .= $this->getSQL();
		$query .= sprintf(" WHERE id = %d",$this->id);
		return mysql_query($query);
	}
	
	public function deleteFromDB($id){
		$query = sprintf("delete FROM ".$_SESSION['pfx']."_configuration WHERE id = %d ",$id);
		return mysql_query($query);
	}
	
	
}

?>
