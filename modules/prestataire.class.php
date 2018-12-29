<?php
class Prestataire extends DB

 {
 public $id;

 public $nom_prenom;

 public $email;

 public $adresse;

 public $tel;

 public $id_fournisseur;

 public $login;

 public $motPasse;

 public $motPasseMd5;

 public $avatar;

 public $date_insertion;

 public $publication;

 public function getId()
  {
  return $this->id;
  }

 public function getNom_prenom()
  {
  return $this->nom_prenom;
  }

 public function getEmail()
  {
  return $this->email;
  }

 public function getAdresse()
  {
  return $this->adresse;
  }

 public function getTel()
  {
  return $this->tel;
  }

 public function getId_fournisseur()
  {
  return $this->id_fournisseur;
  }

 public function getLogin()
  {
  return $this->login;
  }

 public function getMotPasse()
  {
  return $this->motPasse;
  }

 public function getMotPasseMd5()
  {
  return $this->motPasseMd5;
  }

 public function getAvatar()
  {
  return $this->avatar;
  }

 public function getDate_insertion()
  {
  return $this->date_insertion;
  }

 public function getPublication()
  {
  return $this->publication;
  }

 public function setId($value)
  {
  $this->id = $value;
  }

 public function setNom_prenom($value)
  {
  $this->nom_prenom = $value;
  }

 public function setEmail($value)
  {
  $this->email = $value;
  }

 public function setAdresse($value)
  {
  $this->adresse = $value;
  }

 public function setTel($value)
  {
  $this->tel = $value;
  }

 public function setId_fournisseur($value)
  {
  $this->id_fournisseur = $value;
  }

 public function setLogin($value)
  {
  $this->login = $value;
  }

 public function setMotPasse($value)
  {
  $this->motPasse = $value;
  }

 public function setMotPasseMd5($value)
  {
  $this->motPasseMd5 = $value;
  }

 public function setAvatar($value)
  {
  $this->avatar = $value;
  }

 public function setDate_insertion($value)
  {
  $this->date_insertion = $value;
  }

 public function setPublication($value)
  {
  $this->publication = $value;
  }

 public function setPrestataire($id, $nom_prenom, $email, $adresse, $tel, $id_fournisseur, $login, $motPasse, $motPasseMd5, $avatar, $date_insertion, $publication)
  {
  $this->id = $id;
  $this->nom_prenom = $nom_prenom;
  $this->email = $email;
  $this->adresse = $adresse;
  $this->tel = $tel;
  $this->id_fournisseur = $id_fournisseur;
  $this->login = $login;
  $this->motPasse = $motPasse;
  $this->motPasseMd5 = $motPasseMd5;
  $this->avatar = $avatar;
  $this->date_insertion = $date_insertion;
  $this->publication = $publication;
  }

 public function getSQL()
  {
  $str = sprintf(" nom_prenom='%s'", mysqli_real_escape_string($this->connect() , $this->getNom_prenom()));
  $str.= sprintf(", email='%s'", mysqli_real_escape_string($this->connect() , $this->getEmail()));
  $str.= sprintf(", adresse='%s'", mysqli_real_escape_string($this->connect() , $this->getAdresse()));
  $str.= sprintf(", tel='%s'", mysqli_real_escape_string($this->connect() , $this->getTel()));
  $str.= sprintf(", id_fournisseur='%d'", mysqli_real_escape_string($this->connect() , $this->getId_fournisseur()));
  $str.= sprintf(", login='%s'", mysqli_real_escape_string($this->connect() , $this->getLogin()));
  $str.= sprintf(", motPasse='%s'", mysqli_real_escape_string($this->connect() , $this->getMotPasse()));
  $str.= sprintf(", motPasseMd5='%s'", mysqli_real_escape_string($this->connect() , $this->getMotPasseMd5()));
  $str.= sprintf(", avatar='%s'", mysqli_real_escape_string($this->connect() , $this->getAvatar()));
  $str.= sprintf(", date_insertion='%s'", mysqli_real_escape_string($this->connect() , $this->getDate_insertion()));
  $str.= sprintf(", publication='%d'", mysqli_real_escape_string($this->connect() , $this->getPublication()));
  return ($str);
  }

 public function updateToDB()
  {
  $query = "update " . $_SESSION['pfx'] . "_prestataire set ";
  $query.= $this->getSQL();
  $query.= sprintf(" where id = %d", $this->id);
  return $this->connect()->query($query);
  }

 public function saveToDB()
  {
  $query = "insert into " . $_SESSION['pfx'] . "_prestataire set ";
  $query.= $this->getSQL();
  return $this->connect()->query($query);
  }

 public function deleteFromDB($id)
  {
  $query = "delete from " . $_SESSION['pfx'] . "_prestataire ";
  $query.= sprintf(" where id = '%d'", ($id));
  return $this->connect()->query($query);
  }

 public function getFromDB($id)
  {
  $res = $this->connect()->query("select * from " . $_SESSION['pfx'] . "_prestataire where id = '$id'");
  while ($fetch = $res->fetch_assoc())
   {
   $row[] = $fetch;
   $this->setPrestataire($fetch["id"], $fetch["nom_prenom"], $fetch["email"], $fetch["adresse"], $fetch["tel"], $fetch["id_fournisseur"], $fetch["login"], $fetch["motPasse"], $fetch["motPasseMd5"], $fetch["avatar"], $fetch["date_insertion"], $fetch["publication"]);
   }
  }

 public function publishToDB($id, $pub)
  {
  $query = sprintf("update " . $_SESSION['pfx'] . "_prestataire set publication = '%b' where id = '%d' ", mysqli_real_escape_string($this->connect() , $pub) , mysqli_real_escape_string($this->connect() , $id));
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

 public function deleteImageFromDB($id)
  {
  $query = sprintf("update " . $_SESSION['pfx'] . "_prestataire set avatar = '' where id = '%d' ", mysqli_real_escape_string($this->connect() , $id));
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