<?php
class Code_vip extends DB

 {
 public $id;

 public $code;

 public $etat;

 public $date_echeance;

 public function getId()
  {
  return $this->id;
  }

 public function getCode()
  {
  return $this->code;
  }

 public function getEtat()
  {
  return $this->etat;
  }

 public function getDate_echeance()
  {
  return $this->date_echeance;
  }

 public function setId($value)
  {
  $this->id = $value;
  }

 public function setCode($value)
  {
  $this->code = $value;
  }

 public function setEtat($value)
  {
  $this->etat = $value;
  }

 public function setDate_echeance($value)
  {
  $this->date_echeance = $value;
  }

 public function setCode_vip($id, $code, $etat, $date_echeance)
  {
  $this->id = $id;
  $this->code = $code;
  $this->etat = $etat;
  $this->date_echeance = $date_echeance;
  }

 public function getSQL()
  {
  $str = sprintf(" code='%s'", mysqli_real_escape_string($this->connect() , $this->getCode()));
  $str.= sprintf(", etat='%b'", mysqli_real_escape_string($this->connect() , $this->getEtat()));
  $str.= sprintf(", date_echeance='%s'", mysqli_real_escape_string($this->connect() , $this->getDate_echeance()));
  return ($str);
  }

 public function updateToDB()
  {
  $query = "update " . $_SESSION['pfx'] . "_code_vip set ";
  $query.= $this->getSQL();
  $query.= sprintf(" where id = %d", $this->id);
  return $this->connect()->query($query);
  }

 public function saveToDB()
  {
  $query = "insert into " . $_SESSION['pfx'] . "_code_vip set ";
  $query.= $this->getSQL();
  return $this->connect()->query($query);
  }

 public function deleteFromDB($id)
  {
  $query = "delete from " . $_SESSION['pfx'] . "_code_vip ";
  $query.= sprintf(" where id = '%d'", ($id));
  return $this->connect()->query($query);
  }

 public function getFromDB($id)
  {
  $res = $this->connect()->query("select * from " . $_SESSION['pfx'] . "_code_vip where id = '$id'");
  while ($fetch = $res->fetch_assoc())
   {
   $row[] = $fetch;
   $this->setCode_vip($fetch["id"], $fetch["code"], $fetch["etat"], $fetch["date_echeance"]);
   }
  }

 public function publishToDB($id, $pub)
  {
  $query = sprintf("update " . $_SESSION['pfx'] . "_code_vip set etat = '%b' where id = '%d' ", mysqli_real_escape_string($this->connect() , $pub) , mysqli_real_escape_string($this->connect() , $id));
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