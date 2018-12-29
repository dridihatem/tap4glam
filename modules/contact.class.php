<?php



//////////////////////////////////////////////////

//Classe Contact

//////////////////////////////////////////////////

class Contact extends DB{



	public $id;

	public $nom_prenom;

	public $email;

	public $societe;

    public $tel;

	public $sujet;

	public $message;

	public $date_insertion;

	public $lu;



	

	public function	setContact($id,$nom_prenom,$email,$tel,$sujet,$message,$date_insertion,$lu){

		$this->id = $id;

		$this->nom_prenom = $nom_prenom;

		$this->email = $email;

		$this->tel = $tel;

		$this->sujet=$sujet;

		$this->message = $message;

		$this->date_insertion = $date_insertion;

		$this->lu = $lu;

	

	}

	

	public function getId(){return($this->id);}

	public function getNom_prenom(){return($this->nom_prenom);}

	public function getEmail(){return($this->email);}

	public function getTel(){return($this->tel);}

	public function getSujet(){return($this->sujet);}

	public function getMessage(){return($this->message);}

	public function getDate_insertion(){return($this->date_insertion);}

	public function getLu(){return($this->lu);}

	

	

	public function setId($value){ $this->id = $value;}

	public function setNom_prenom($value){ $this->nom_prenom = $value;}

	public function setEmail($value){ $this->email = $value;}

	public function setTel($value){ $this->tel = $value;}

	public function setSujet($value){$this->sujet=$value;}

	public function setMessage($value){ $this->message= $value;}

	public function setDate_insertion($value){ $this->date_insertion = $value;}

	public function setLu($value){ $this->lu= $value;}

	

	public function getSQL(){

		

		$str = sprintf("nom_prenom='%s'",mysqli_real_escape_string($this->connect() ,$this->getNom_prenom()));

		$str .= sprintf(", email='%s'",mysqli_real_escape_string($this->connect() ,$this->getEmail()));

		$str .= sprintf(", tel='%s'",mysqli_real_escape_string($this->connect() ,$this->getTel()));

		$str .= sprintf(", sujet='%s'",mysqli_real_escape_string($this->connect() ,$this->getSujet()));

		$str .= sprintf(", message='%s'",mysqli_real_escape_string($this->connect() ,$this->getMessage()));

        $str .= ", date_insertion='".$this->getDate_insertion()."'";

		$str .= sprintf(", lu='%b'",mysqli_real_escape_string($this->connect() ,$this->getLu()));		

	

		return($str);

	}

	protected function getAll()
  {
  $query = "SELECT * FROM " . $_SESSION['pfx'] . "_contact";
  $result = $this->connect()->query($query);
  $num_row = $result->num_rows;
  if ($num_row > 0)
   {
   while ($row = $result->fetch_assoc())
    {
    $data[] = $row;
    }
   }

  return $data;
  }

	public function getFromDB($id)
  {
  $res = $this->connect()->query("select * from " . $_SESSION['pfx'] . "_contact where id = '$id'");
  while ($fetch = $res->fetch_assoc())
   {
   $this->setContact($fetch["id"], $fetch["nom_prenom"], $fetch["email"], $fetch["tel"], $fetch["sujet"], $fetch["message"], $fetch["date_insertion"], $fetch["lu"]);
   }
  }



	public function saveToDB(){

		$query = "insert into ".$_SESSION['pfx']."_contact set ";

		$query .= $this->getSQL();

		 return $this->connect()->query($query);

	}

	

	public function updateToDB(){

		$query = "update ".$_SESSION['pfx']."_contact set ";

		$query .= $this->getSQL();

		$query .= sprintf(" WHERE id = %d",$this->id);

		 return $this->connect()->query($query);

	}

	

	public function deleteFromDB(int $id){

		$query = sprintf("delete FROM ".$_SESSION['pfx']."_contact WHERE id = %d ",$id);

		 return $this->connect()->query($query);

	}

	

	

}





?>