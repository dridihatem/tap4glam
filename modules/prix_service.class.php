<?php

//////////////////////////////////////////////////

//date_insertion Module

//////////////////////////////////////////////////



class Prix_service extends DB{



public $id;

public $date;

public $prix;

public $prix_promo;

public $id_service;



public function getId(){ return $this->id;}

public function getDate(){ return $this->date;}

public function getPrix(){ return $this->prix;}

public function getPrix_promo(){ return $this->prix_promo;}

public function getId_service(){ return $this->id_service;}



public function setId($value){ $this->id= $value;}

public function setDate($value){ $this->date= $value;}

public function setPrix($value){ $this->prix= $value;}

public function setPrix_promo($value){ $this->prix_promo= $value;}

public function setId_service($value){ $this->id_service= $value;}




public function setPrix_Services($id,$date,$prix,$prix_promo,$id_service){

	$this->id = $id ;

	$this->date = $date;

	$this->prix = $prix;
        
        $this->prix_promo = $prix_promo;

	$this->id_service = $id_service;


}



public function getSQL(){

		$str = sprintf("date='%s'",mysqli_real_escape_string($this->connect(),$this->getDate()));

                $str .= sprintf(", prix='%f'",mysqli_real_escape_string($this->connect(),$this->getPrix()));
                
                $str .= sprintf(", prix_promo='%f'",mysqli_real_escape_string($this->connect(),$this->getPrix_promo()));

                $str .= sprintf(", id_service='%d'",mysqli_real_escape_string($this->connect(),$this->getId_service()));

                
		return $str;

	}


                protected function getAll(){
                          $query ="SELECT * FROM ".$_SESSION['pfx']."_prix_service";
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

		$query = "update ".$_SESSION['pfx']."_prix_service set ";

		$query .= $this->getSQL();

		$query .= sprintf(" where id = %d",$this->id);

		return $this->connect()->query($query);
            }  

	

public function saveToDB(){

		$query = "insert into ".$_SESSION['pfx']."_prix_service set ";

		$query .= $this->getSQL();

		return $this->connect()->query($query);

	}

public function deleteFromDB(int $id){

		$query = "delete from ".$_SESSION['pfx']."_prix_service ";

		$query .= sprintf(" where id = '%d'",($id));

		return $this->connect()->query($query);

	}



public function getFromDB($id){

		$res= $this->connect()->query("select * from ".$_SESSION['pfx']."_prix_service where id = '$id'");
                while($fetch = $res->fetch_assoc()){
                $row[] =$fetch; 
                   $this->setPrix_service($fetch["id"],$fetch["date"],$fetch["prix"],$fetch["prix_promo"],$fetch["id_service"]);
                }
               
                
		

	}





	

}





?>