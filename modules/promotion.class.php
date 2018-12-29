<?php 
class Promotion extends DB{

	public $id;
	public $id_service;
	public $id_option_service;
	public $prix;
	public $prix_promo;
	public $date_debut;
	public $date_fin;
	public $etat;


public function getId()
  {
  return $this->id;
  }

public function getId_service()
  {
  return $this->id_service;
  }

public function getId_option_service()
  {
  return $this->id_option_service;
  }

public function getPrix()
  {
  return $this->prix;
  }

public function getPrix_promo()
  {
  return $this->prix_promo;
  }

public function getDebut_debut()
  {
  return $this->date_debut;
  }

public function getDebut_fin()
  {
  return $this->date_fin;
  }

 public function getEtat()
  {
  return $this->etat;
  }

 public function setId($value)
  {
  $this->id = $value;
  }

 public function setId_service($value)
  {
  $this->id_service = $value;
  }

 public function setId_option_service($value)
  {
  $this->id_option_service = $value;
  }

 public function setPrix($value)
  {
  $this->prix = $value;
  }

 public function setPrix_promo($value)
  {
  $this->prix_promo = $value;
  }

 public function setEtat($value)
  {
  $this->etat = $value;
  }

 public function setPromotion($id, $id_service, $id_option_service, $prix, $prix_promo, $etat)
  {
  $this->id = $id;
  $this->id_service = $id_service;
  $this->id_option_service = $id_option_service;
  $this->prix = $prix;
  $this->prix_promo = $prix_promo;
  $this->etat = $etat;
  }

 public function getSQL()
  {
  $str = sprintf(" id_service='%d'", mysqli_real_escape_string($this->connect() , $this->getId_service()));
  $str.= sprintf(", id_option_service='%d'", mysqli_real_escape_string($this->connect() , $this->getId_option_service()));
  $str.= sprintf(", prix='%f'", mysqli_real_escape_string($this->connect() , $this->getPrix()));
  $str.= sprintf(", prix_promo='%f'", mysqli_real_escape_string($this->connect() , $this->getPrix_promo()));
  $str.= sprintf(", etat='%b'", mysqli_real_escape_string($this->connect() , $this->getEtat()));
  return ($str);
  }

 public function updateToDB()
  {
  $query = "update " . $_SESSION['pfx'] . "_promotion set ";
  $query.= $this->getSQL();
  $query.= sprintf(" where id = %d", $this->id);
  return $this->connect()->query($query);
  }

 public function saveToDB()
  {
  $query = "insert into " . $_SESSION['pfx'] . "_promotion set ";
  $query.= $this->getSQL();
  return $this->connect()->query($query);
  }

 public function deleteFromDB($id)
  {
  $query = "delete from " . $_SESSION['pfx'] . "_promotion ";
  $query.= sprintf(" where id = '%d'", ($id));
  return $this->connect()->query($query);
  }

 public function getFromDB($id)
  {
  $res = $this->connect()->query("select * from " . $_SESSION['pfx'] . "_promotion where id = '$id'");
  while ($fetch = $res->fetch_assoc())
   {
    $this->setPromotion($fetch["id"], $fetch["id_service"], $fetch["id_option_service"], $fetch["prix"], $fetch["prix_promo"], $fetch["etat"]);
   }
  }

 public function publishToDB($id, $pub)
  {
  $query = sprintf("update " . $_SESSION['pfx'] . "_promotion set etat = '%b' where id = '%d' ", mysqli_real_escape_string($this->connect() , $pub) , mysqli_real_escape_string($this->connect() , $id));
  $res = $this->connect()->query($query);
  if ($res)
   {
   return true;
   }
    else
   {
   return false;
   }
  }
 }

?>