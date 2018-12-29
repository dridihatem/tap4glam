<?php
 class Pack extends DB {
   public $id;
   public $titreFr;
   public $titreEn;
   public $titreAr;
   public $descriptionFr;
   public $descriptionEn;
   public $descriptionAr;
   public $image;
   public $id_service;
   public $prix;
   public $prix_promo;
   public $date_debut;
   public $date_fin;
   public $date_insertion;
   public $vu;
   public $etat;
   
   public function getId(){ return $this->id;}

public function getTitreFr(){ return $this->titreFr;}

public function getTitreEn(){ return $this->titreEn;}

public function getTitreAr(){ return $this->titreAr;}

public function getDescriptionFr(){ return $this->descriptionFr;}

public function getDescriptionEn(){ return $this->descriptionEn;}

public function getDescriptionAr(){ return $this->descriptionAr;}

public function getImage(){ return $this->image;}

public function getId_service(){ return $this->id_service;}

public function getPrix(){ return $this->prix;} 

public function getPrix_promo(){ return $this->prix_promo;} 

public function getDate_debut(){ return $this->date_debut;} 

public function getDate_fin(){ return $this->date_fin;}

public function getDate_insertion(){ return $this->date_insertion;}

public function getVu(){ return $this->vu;}

public function getEtat(){ return $this->etat;}



public function setId($value){ $this->id= $value;}

public function setTitreFr($value){ $this->titreFr= $value;}

public function setTitreEn($value){ $this->titreEn= $value;}

public function setTitreAr($value){ $this->titreAr= $value;}

public function setDescriptionFr($value){ $this->descriptionFr= $value;}

public function setDescriptionEn($value){ $this->descriptionEn= $value;}

public function setDescriptionAr($value){ $this->descriptionAr= $value;}

public function setImage($value){ $this->image= $value;}

public function setId_service($value){ $this->id_service= $value;}

public function setPrix($value){ $this->prix= $value;} 

public function setPrix_promo($value){ $this->prix_promo= $value;} 

public function setDate_debut($value){ $this->date_debut= $value;} 

public function setDate_fin($value){ $this->date_fin= $value;} 

public function setDate_insertion($value){ $this->date_insertion= $value;}

public function setVu($value){ $this->vu= $value;} 

public function setEtat($value){ $this->etat= $value;}



public function setPack($id,$titreFr,$titreEn,$titreAr,$descriptionFr,$descriptionEn,$descriptionAr,$image,$id_service,$prix,$prix_promo,$date_debut,$date_fin,$date_insertion,$vu,$etat){

	$this->id = $id ;

	$this->titreFr = $titreFr;

	$this->titreEn = $titreEn;
        
        $this->titreAr = $titreAr;

	$this->descriptionFr = $descriptionFr;

	$this->descriptionEn = $descriptionEn;
        
        $this->descriptionAr = $descriptionAr;

	$this->image = $image ;

	$this->id_service = $id_service ;

	$this->prix = $prix ; 

	$this->prix_promo = $prix_promo ; 
        
	$this->date_debut = $date_debut ; 
        
	$this->date_fin = $date_fin ;

	$this->date_insertion = $date_insertion ; 

	$this->vu = $vu ; 

	$this->etat = $etat ; 

}



public function getSQL(){

		$str = sprintf("titreFr='%s'",mysqli_real_escape_string($this->connect(),$this->getTitreFr()));

                $str .= sprintf(", titreEn='%s'",mysqli_real_escape_string($this->connect(),$this->getTitreEn()));
                
                $str .= sprintf(", titreAr='%s'",mysqli_real_escape_string($this->connect(),$this->getTitreAr()));

                $str .= sprintf(", descriptionFr='%s'",mysqli_real_escape_string($this->connect(),$this->getDescriptionFr()));

                $str .= sprintf(", descriptionEn='%s'",mysqli_real_escape_string($this->connect(),$this->getDescriptionEn()));
                
                $str .= sprintf(", descriptionAr='%s'",mysqli_real_escape_string($this->connect(),$this->getDescriptionAr()));

		$str .= sprintf(", image='%s'",mysqli_real_escape_string($this->connect(),$this->getImage()));

		$str .= sprintf(", id_service='%s'",mysqli_real_escape_string($this->connect(),$this->getId_service()));


		$str .= sprintf(", prix='%f'",mysqli_real_escape_string($this->connect(),$this->getPrix()));

		$str .= sprintf(", prix_promo='%f'",mysqli_real_escape_string($this->connect(),$this->getPrix_promo()));

		$str .= sprintf(", date_debut='%s'",mysqli_real_escape_string($this->connect(),$this->getDate_debut()));
                
                $str .=sprintf(", date_fin='%s'", mysqli_real_escape_string($this->connect(), $this->getDate_fin()));
                
		$str .= sprintf(", date_insertion='%s'",mysqli_real_escape_string($this->connect(),$this->getDate_insertion()));

		$str .= sprintf(", vu='%d'",mysqli_real_escape_string($this->connect(),$this->getVu()));
                
                $str .= sprintf(", etat='%b'",mysqli_real_escape_string($this->connect(),$this->getEtat()));
                
		return $str;

	}


                protected function getAll(){
                          $query ="SELECT * FROM ".$_SESSION['pfx']."_pack";
                          $result = $this->connect()->query($query);
                          $num_row = $result->num_rows;
                          if($num_row > 0){
                              while($row = $result->fetch_assoc()){
                                  $data[] = $row;
                              }
                          }
                          return $data;

                }
                public function updateToDB(){

		$query = "update ".$_SESSION['pfx']."_pack set ";

		$query .= $this->getSQL();

		$query .= sprintf(" where id = %d",$this->id);

		return $this->connect()->query($query);
            }  

	

public function saveToDB(){

		$query = "insert into ".$_SESSION['pfx']."_pack set ";

		$query .= $this->getSQL();

		return $this->connect()->query($query);

	}

public function deleteFromDB(int $id){

		$query = "delete from ".$_SESSION['pfx']."_pack ";

		$query .= sprintf(" where id = '%d'",($id));

		return $this->connect()->query($query);

	}



public function getFromDB($id){

		$res= $this->connect()->query("select * from ".$_SESSION['pfx']."_pack where id = '$id'");
                while($fetch = $res->fetch_assoc()){
                $row[] =$fetch; 
                   $this->setPack($fetch["id"],$fetch["titreFr"],$fetch["titreEn"],$fetch["titreAr"],$fetch["descriptionFr"],$fetch["descriptionEn"],$fetch["descriptionAr"],$fetch["image"],$fetch["id_service"],$fetch["prix"],$fetch["prix_promo"],$fetch["date_debut"],$fetch["date_fin"],$fetch["date_insertion"],$fetch["vu"],$fetch["etat"]);
                }
               
                
		

	}


public function deleteImageFromDB($id){

		$query = "update ".$_SESSION['pfx']."_pack set image = ''";

		$query .= sprintf(" where id = %d",mysqli_real_escape_string($this->connect(),$id));

		return $this->connect()->query($query);

	}
	

	public function publishToDB($id,$pub){

		$query = sprintf("update ".$_SESSION['pfx']."_pack set etat = '%b' where id = '%d' ",mysqli_real_escape_string($this->connect(),$pub),mysqli_real_escape_string($this->connect(),$id));

		$res = $this->connect()->query($query);
 		if($res){
 			return true;
 		}else{
 			return false;
 		}

	
 }
 }
 ?>