<?php
class Option_service extends DB

 {
 public $id;

 public $titreFr;

 public $titreEn;

 public $titreAr;

 public $prix;

 public $prix_promo;

 public $id_service;

 public $etat;

 public function getId()
  {
  return $this->id;
  }

 public function getTitreFr()
  {
  return $this->titreFr;
  }

 public function getTitreEn()
  {
  return $this->titreEn;
  }

 public function getTitreAr()
  {
  return $this->titreAr;
  }

 public function getPrix()
  {
  return $this->prix;
  }

 public function getPrix_promo()
  {
  return $this->prix_promo;
  }

 public function getId_service()
  {
  return $this->id_service;
  }

 public function getEtat()
  {
  return $this->etat;
  }

 public function setId($value)
  {
  $this->id = $value;
  }

 public function setTitreFr($value)
  {
  $this->titreFr = $value;
  }

 public function setTitreEn($value)
  {
  $this->titreEn = $value;
  }

 public function setTitreAr($value)
  {
  $this->titreAr = $value;
  }

 public function setPrix($value)
  {
  $this->prix = $value;
  }

 public function setPrix_promo($value)
  {
  $this->prix_promo = $value;
  }

 public function setId_service($value)
  {
  $this->id_service = $value;
  }

 public function setEtat($value)
  {
  $this->etat = $value;
  }

 public function setOption_service($id, $titreFr, $titreEn, $titreAr, $prix, $prix_promo, $id_service, $etat)
  {
  $this->id = $id;
  $this->titreFr = $titreFr;
  $this->titreEn = $titreEn;
  $this->titreAr = $titreAr;
  $this->prix = $prix;
  $this->prix_promo = $prix_promo;
  $this->id_service = $id_service;
  $this->etat = $etat;
  }

 public function getSQL()
  {
  $str = sprintf(" titreFr='%s'", mysqli_real_escape_string($this->connect() , $this->getTitreFr()));
  $str.= sprintf(", titreEn='%s'", mysqli_real_escape_string($this->connect() , $this->getTitreEn()));
  $str.= sprintf(", titreAr='%s'", mysqli_real_escape_string($this->connect() , $this->getTitreAr()));
  $str.= sprintf(", prix='%f'", mysqli_real_escape_string($this->connect() , $this->getPrix()));
  $str.= sprintf(", prix_promo='%f'", mysqli_real_escape_string($this->connect() , $this->getPrix_promo()));
  $str.= sprintf(", id_service='%s'", mysqli_real_escape_string($this->connect() , $this->getId_service()));
  $str.= sprintf(", etat='%b'", mysqli_real_escape_string($this->connect() , $this->getEtat()));
  return ($str);
  }

 public function updateToDB()
  {
  $query = "update " . $_SESSION['pfx'] . "_option_service set ";
  $query.= $this->getSQL();
  $query.= sprintf(" where id = %d", $this->id);
  return $this->connect()->query($query);
  }

 public function saveToDB()
  {
  $query = "insert into " . $_SESSION['pfx'] . "_option_service set ";
  $query.= $this->getSQL();
  return $this->connect()->query($query);
  }

 public function deleteFromDB($id)
  {
  $query = "delete from " . $_SESSION['pfx'] . "_option_service ";
  $query.= sprintf(" where id = '%d'", ($id));
  return $this->connect()->query($query);
  }

 public function getFromDB($id)
  {
  $res = $this->connect()->query("select * from " . $_SESSION['pfx'] . "_option_service where id = '$id'");
  while ($fetch = $res->fetch_assoc())
   {
   $row[] = $fetch;
   $this->setOption_service($fetch["id"], $fetch["titreFr"], $fetch["titreEn"], $fetch["titreAr"], $fetch["prix"], $fetch["prix_promo"], $fetch["id_service"], $fetch["etat"]);
   }
  }

 public function publishToDB($id, $pub)
  {
  $query = sprintf("update " . $_SESSION['pfx'] . "_option_service set etat = '%b' where id = '%d' ", mysqli_real_escape_string($this->connect() , $pub) , mysqli_real_escape_string($this->connect() , $id));
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