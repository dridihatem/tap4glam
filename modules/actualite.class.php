<?php
class Actualite

 {
 public $id;

 public $titreFr;

 public $titreEn;

 public $descriptionFr;

 public $descriptionEn;

 public $image;

 public $date_insertion;

 public $publication;

 public

 function getId()
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

 public function getDescriptionFr()
  {
  return $this->descriptionFr;
  }

 public function getDescriptionEn()
  {
  return $this->descriptionEn;
  }

 public function getImage()
  {
  return $this->image;
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

 public function setTitreFr($value)
  {
  $this->titreFr = $value;
  }

 public function setTitreEn($value)
  {
  $this->titreEn = $value;
  }

 public function setDescriptionFr($value)
  {
  $this->descriptionFr = $value;
  }

 public function setDescriptionEn($value)
  {
  $this->descriptionEn = $value;
  }

 public function setImage($value)
  {
  $this->image = $value;
  }

 public function setDate_insertion($value)
  {
  $this->date_insertion = $value;
  }

 public function setPublication($value)
  {
  $this->publication = $value;
  }

 public function setActualite($id, $titreFr, $titreEn, $descriptionFr, $descriptionEn, $image, $date_insertion, $publication)
  {
  $this->id = $id;
  $this->titreFr = $titreFr;
  $this->titreEn = $titreEn;
  $this->descriptionFr = $descriptionFr;
  $this->descriptionEn = $descriptionEn;
  $this->image = $image;
  $this->date_insertion = $date_insertion;
  $this->publication = $publication;
  }

 public function getSQL()
  {
  $str = sprintf(" titreFr='%s'", mysql_real_escape_string($this->getTitreFr()));
  $str.= sprintf(", titreEn='%s'", mysql_real_escape_string($this->getTitreEn()));
  $str.= sprintf(", descriptionFr='%s'", mysql_real_escape_string($this->getDescriptionFr()));
  $str.= sprintf(", descriptionEn='%s'", mysql_real_escape_string($this->getDescriptionEn()));
  $str.= sprintf(", image='%s'", mysql_real_escape_string($this->getImage()));
  $str.= sprintf(", date_insertion='" . $this->getDate_insertion()) . "'";
  $str.= sprintf(", publication='%b'", mysql_real_escape_string($this->getPublication()));
  return ($str);
  }

 public function updateToDB()
  {
  $query = "UPDATE " . $_SESSION['pfx'] . "_actualite SET ";
  $query.= $this->getSQL();
  $query.= sprintf(" WHERE id = %d", $this->id);
  return mysql_query($query);
  }

 public function saveToDB()
  {
  $query = "INSERT INTO " . $_SESSION['pfx'] . "_actualite  SET ";
  $query.= $this->getSQL();
  return mysql_query($query);
  }

 public function deleteFromDB($id)
  {
  $query = "DELETE From " . $_SESSION['pfx'] . "_actualite  ";
  $query.= sprintf(" WHERE id = '%d'", ($id));
  return mysql_query($query);
  }

 public function getFromDB($id)
  {
  $res = mysql_fetch_array(mysql_query(sprintf("SELECT * FROM " . $_SESSION['pfx'] . "_actualite WHERE id = '%d'", mysql_real_escape_string($id))));
  $this->setActualite($res["id"], $res["titreFr"], $res["titreEn"], $res["descriptionFr"], $res["descriptionEn"], $res["image"], $res["date_insertion"], $res["publication"]);
  }

 public function getByIdFromDB($id)
  {
  $res = mysql_fetch_array(mysql_query(sprintf("SELECT * FROM " . $_SESSION['pfx'] . "_actualite  WHERE id='%d'", mysql_real_escape_string($id))));
  $this->setActualite($res["id"], $res["titreFr"], $res["titreEn"], $res["descriptionFr"], $res["descriptionEn"], $res["image"], $res["date_insertion"], $res["publication"]);
  }

 public function deleteImageFromDB($id)
  {
  $query = "UPDATE " . $_SESSION['pfx'] . "_actualite  SET image = ''";
  $query.= sprintf("WHERE id = %d", mysql_real_escape_string($id));
  return mysql_query($query);
  }

 public function publishToDB($id, $pub)
  {
  $query = sprintf("UPDATE " . $_SESSION['pfx'] . "_actualite SET publication = '%b' WHERE id = '%d' ", mysql_real_escape_string($pub) , mysql_real_escape_string($id));
  return mysql_query($query);
  }
 }

?>