<?php
class Reservation extends DB

 {
 public $id;

 public $nombre_personne;

 public $date_reservation;

 public $heure_reservation;

 public $id_service;

 public $id_option_service;

 public $etat_reservation;

 public $id_client;

 public $nom_prenom;

 public $email;

 public $tel;

 public $adresse;

 public $date_annulation;

 public $ref_commande;

 public $date_modification;



 public function getId()
  {
  return $this->id;
  }

 public function getNombre_personne()
  {
  return $this->nombre_personne;
  }

 public function getDate_reservation()
  {
  return $this->date_reservation;
  }
   public function getHeure_reservation()
  {
  return $this->heure_reservation;
  }

 public function getId_service()
  {
  return $this->id_service;
  }

 public function getId_option_service()
  {
  return $this->id_option_service;
  }

 public function getEtat_reservation()
  {
  return $this->etat_reservation;
  }

 public function getId_client()
  {
  return $this->getId_client;
  }

 public function getNom_prenom()
  {
  return $this->nom_prenom;
  }
  public function getEmail()
  {
  return $this->email;
  }
  public function getTel()
  {
  return $this->tel;
  }

  public function getAdresse()
  {
  return $this->adresse;
  }

  public function getDate_annulation()
  {
  return $this->date_annulation;
  }
public function getRef_commande()
  {
  return $this->ref_commande;
  }
public function getDate_modification()
  {
  return $this->date_modification;
  }



 public function setId($value)
  {
  $this->id = $value;
  }

 public function setNombre_personne($value)
  {
  $this->nombre_personne = $value;
  }

 public function setDate_reservation($value)
  {
  $this->date_reservation = $value;
  }
  public function setHeure_reservation($value)
  {
  $this->heure_reservation = $value;
  }

 public function setId_service($value)
  {
  $this->id_service = $value;
  }

 public function setId_option_service($value)
  {
  $this->id_option_service = $value;
  }

 public function setEtat_reservation($value)
  {
  $this->etat_reservation = $value;
  }

 public function setId_client($value)
  {
  $this->id_client = $value;
  }

 public function setNom_prenom($value)
  {
  $this->nom_prenom = $value;
  }
   public function setEmail($value)
  {
  $this->email = $value;
  }

   public function setTel($value)
  {
  $this->tel = $value;
  }
 public function setAdresse($value)
  {
  $this->adresse = $value;
  }

   public function setDate_annulation($value)
  {
  $this->date_annulation = $value;
  }

   public function setRef_commande($value)
  {
  $this->ref_commande = $value;
  }
   public function setDate_modification($value)
  {
  $this->date_modification = $value;
  }


 public function setReservation($id, $nombre_personne, $date_reservation,$heure_reservation, $id_service, $id_option_service, $etat_reservation, $id_client, $nom_prenom,$email,$tel,$adresse,$date_annulation,$ref_commande,$date_modification)
  {
  $this->id = $id;
  $this->nombre_personne = $nombre_personne;
  $this->date_reservation = $date_reservation;
  $this->heure_reservation = $heure_reservation;
  $this->id_service = $id_service;
  $this->id_option_service = $id_option_service;
  $this->etat_reservation = $etat_reservation;
  $this->id_client = $id_client;
  $this->nom_prenom = $nom_prenom;
  $this->email = $email;
  $this->tel = $tel;
  $this->adresse = $adresse;
  $this->date_annulation = $date_annulation;
  $this->ref_commande = $ref_commande;
  $this->date_modification = $date_modification;
  }

 public function getSQL()
  {
  $str = sprintf(" nombre_personne='%d'", mysqli_real_escape_string($this->connect() , $this->getNombre_personne()));
  $str.= sprintf(", date_reservation='%s'", mysqli_real_escape_string($this->connect() , $this->getDate_reservation()));
  $str.= sprintf(", heure_reservation='%s'", mysqli_real_escape_string($this->connect() , $this->getHeure_reservation()));
  $str.= sprintf(", id_service='%s'", mysqli_real_escape_string($this->connect() , $this->getId_service()));
  $str.= sprintf(", id_option_service='%s'", mysqli_real_escape_string($this->connect() , $this->getId_option_service()));
  $str.= sprintf(", etat_reservation='%d'", mysqli_real_escape_string($this->connect() , $this->getEtat_reservation()));
  $str.= sprintf(", id_client='%d'", mysqli_real_escape_string($this->connect() , $this->getId_client()));
  $str.= sprintf(", nom_prenom='%s'", mysqli_real_escape_string($this->connect() , $this->getNom_prenom()));
  $str.= sprintf(", email='%s'", mysqli_real_escape_string($this->connect() , $this->getEmail()));
  $str.= sprintf(", tel='%s'", mysqli_real_escape_string($this->connect() , $this->getTel()));
  $str.= sprintf(", adresse='%s'", mysqli_real_escape_string($this->connect() , $this->getAdresse()));
  $str.= sprintf(", date_annulation='%s'", mysqli_real_escape_string($this->connect() , $this->getDate_annulation()));
  $str.= sprintf(", ref_commande='%s'", mysqli_real_escape_string($this->connect() , $this->getRef_commande()));
  $str.= sprintf(", date_modification='%s'", mysqli_real_escape_string($this->connect() , $this->getDate_modification()));
  return ($str);
  }

 public function updateToDB()
  {
  $query = "update " . $_SESSION['pfx'] . "_reservation set ";
  $query.= $this->getSQL();
  $query.= sprintf(" where id = %d", $this->id);
  return $this->connect()->query($query);
  }

 public function saveToDB()
  {
  $query = "insert into " . $_SESSION['pfx'] . "_reservation set ";
  $query.= $this->getSQL();
  return $this->connect()->query($query);
  }

 public function deleteFromDB($id)
  {
  $query = "delete from " . $_SESSION['pfx'] . "_reservation ";
  $query.= sprintf(" where id = '%d'", ($id));
  return $this->connect()->query($query);
  }

 public function getFromDB($id)
  {
  $res = $this->connect()->query("select * from " . $_SESSION['pfx'] . "_reservation where id = '$id'");
  while ($fetch = $res->fetch_assoc())
   {
   $row[] = $fetch;
   $this->setReservation($fetch["id"], $fetch["nombre_personne"], $fetch["date_reservation"], $fetch["heure_reservation"], $fetch["id_service"], $fetch["id_option_service"], $fetch["etat_reservation"], $fetch["id_client"], $fetch["nom_prenom"], $fetch["email"], $fetch["tel"], $fetch["adresse"], $fetch["date_annulation"], $fetch["ref_commande"], $fetch["date_modification"]);
   }
  }

 public function publishToDB($id, $pub)
  {
  $query = sprintf("update " . $_SESSION['pfx'] . "_reservation set etat_reservation = '%b' where id = '%d' ", mysqli_real_escape_string($this->connect() , $pub) , mysqli_real_escape_string($this->connect() , $id));
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