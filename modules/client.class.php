<?phpclass Client extends DB { public $id; public $nom_prenom; public $email; public $tel; public $code_vip; public $login; public $motPasse; public $motPasseMd5; public $adresse; public $code_postal; public $id_region; public $date_creation; public $date_connexion; public $etat; public $connected; public function getId()  {  return $this->id;  } public function getNom_prenom()  {  return $this->nom_prenom;  } public function getEmail()  {  return $this->email;  } public function getTel()  {  return $this->tel;  } public function getCode_vip()  {  return $this->code_vip;  } public function getLogin()  {  return $this->login;  } public function getMotPasse()  {  return $this->motPasse;  } public function getMotPasseMd5()  {  return $this->motPasseMd5;  } public function getAdresse()  {  return $this->adresse;  } public function getCode_postal()  {  return $this->code_postal;  } public function getId_region()  {  return $this->id_region;  } public function getDate_creation()  {  return $this->date_creation;  } public function getDate_connexion()  {  return $this->date_connexion;  } public function getEtat()  {  return $this->etat;  } public function getConnected()  {  return $this->connected;  } public function setId($value)  {  $this->id = $value;  } public function setNom_prenom($value)  {  $this->nom_prenom = $value;  } public function setEmail($value)  {  $this->email = $value;  } public function setTel($value)  {  $this->tel = $value;  } public function setCode_vip($value)  {  $this->code_vip = $value;  } public function setLogin($value)  {  $this->login = $value;  } public function setMotPasse($value)  {  $this->motPasse = $value;  } public function setMotPasseMd5($value)  {  $this->motPasseMd5 = $value;  } public function setAdresse($value)  {  $this->adresse = $value;  } public function setCode_postal($value)  {  $this->code_postal = $value;  } public function setId_region($value)  {  $this->id_region = $value;  } public function setDate_creation($value)  {  $this->date_creation = $value;  } public function setDate_connexion($value)  {  $this->date_connexion = $value;  } public function setEtat($value)  {  $this->etat = $value;  } public function setConnected($value)  {  $this->connected = $value;  } public function setClient($id, $nom_prenom, $email, $tel, $code_vip, $login, $motPasse, $motPasseMd5, $adresse, $code_postal, $id_region, $date_creation, $date_connexion, $etat, $connected)  {  $this->id = $id;  $this->nom_prenom = $nom_prenom;  $this->email = $email;  $this->tel = $tel;  $this->code_vip = $code_vip;  $this->login = $login;  $this->motPasse = $motPasse;  $this->motPasseMd5 = $motPasseMd5;  $this->adresse = $adresse;  $this->code_postal = $code_postal;  $this->id_region = $id_region;  $this->date_creation = $date_creation;  $this->date_connexion = $date_connexion;  $this->etat = $etat;  $this->connected = $connected;  } public function getSQL()  {  $str = sprintf("nom_prenom='%s'", mysqli_real_escape_string($this->connect() , $this->getNom_prenom()));  $str.= sprintf(", email='%s'", mysqli_real_escape_string($this->connect() , $this->getEmail()));  $str.= sprintf(", tel='%s'", mysqli_real_escape_string($this->connect() , $this->getTel()));  $str.= sprintf(", code_vip='%s'", mysqli_real_escape_string($this->connect() , $this->getCode_vip()));  $str.= sprintf(", login='%s'", mysqli_real_escape_string($this->connect() , $this->getLogin()));  $str.= sprintf(", motPasse='%s'", mysqli_real_escape_string($this->connect() , $this->getMotPasse()));  $str.= sprintf(", motPasseMd5='%s'", mysqli_real_escape_string($this->connect() , $this->getMotPasseMd5()));  $str.= sprintf(", adresse='%s'", mysqli_real_escape_string($this->connect() , $this->getAdresse()));  $str.= sprintf(", code_postal='%s'", mysqli_real_escape_string($this->connect() , $this->getCode_postal()));  $str.= sprintf(", id_region='%d'", mysqli_real_escape_string($this->connect() , $this->getId_Region()));  $str.= sprintf(", date_creation='%s'", mysqli_real_escape_string($this->connect() , $this->getDate_creation()));  $str.= sprintf(", date_connexion='%s'", mysqli_real_escape_string($this->connect() , $this->getDate_connexion()));  $str.= sprintf(", etat='%b'", mysqli_real_escape_string($this->connect() , $this->getEtat()));  $str.= sprintf(", connected='%b'", mysqli_real_escape_string($this->connect() , $this->getConnected()));  return $str;  } protected function getAll()  {  $query = "SELECT * FROM " . $_SESSION['pfx'] . "_client";  $result = $this->connect()->query($query);  $num_row = $result->num_rows;  if ($num_row > 0)   {   while ($row = $result->fetch_assoc())    {    $data[] = $row;    }   }  return $data;  } public function updateToDB()  {  $query = "upnom_prenom " . $_SESSION['pfx'] . "_client set ";  $query.= $this->getSQL();  $query.= sprintf(" where id = %d", $this->id);  return $this->connect()->query($query);  } public function saveToDB()  {  $query = "insert into " . $_SESSION['pfx'] . "_client set ";  $query.= $this->getSQL();  return $this->connect()->query($query);  } public function deleteFromDB(int $id)  {  $query = "delete from " . $_SESSION['pfx'] . "_client ";  $query.= sprintf(" where id = '%d'", ($id));  return $this->connect()->query($query);  } public function getFromDB($id)  {  $res = $this->connect()->query("select * from " . $_SESSION['pfx'] . "_client where id = '$id'");  while ($fetch = $res->fetch_assoc())   {   $row[] = $fetch;   $this->setClient($fetch["id"], $fetch["nom_prenom"], $fetch["email"], $fetch["tel"], $fetch["code_vip"], $fetch["login"], $fetch["motPasse"], $fetch["motPasseMd5"], $fetch["adresse"], $fetch["code_postal"], $fetch["id_region"], $fetch["date_creation"], $fetch["date_connexion"], $fetch["etat"], $fetch["connected"]);   }  } public function publishToDB($id, $pub)  {  $query = sprintf("update " . $_SESSION['pfx'] . "_client set etat = '%b' where id = '%d' ", mysqli_real_escape_string($this->connect() , $pub) , mysqli_real_escape_string($this->connect() , $id));  $res = $this->connect()->query($query);  if ($res)   {   return true;   }    else   {   return false;   }  } }?>