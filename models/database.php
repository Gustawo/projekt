<?php 
require_once 'book.php';
 class database{
 	private $server='localhost';
 	private $user='root';
 	private $password='1234';
 	private $db='biblioteka';

 	private $mysqliObj;
 	public $affectedRows;

 	function __construct(){
		@ $this->mysqliObj = new mysqli($this->server,$this->user,$this->password,$this->db);
		if($this->mysqliObj->connect_errno){
			exit('Bad connection');
		}
	}

 	public function query($queryString){
		return $this->mysqliObj->query($queryString);
	}

	public function findBooks($name="",$surname="",$title=""){
		$sql="SELECT * FROM ksiazki LEFT JOIN authors ON (ksiazki.autor=authors.author_id)";
		$sql.= "WHERE (tytul LIKE '%".$title."%' AND author_surname LIKE '%".$surname."%' AND author_name LIKE '%".$name."%')";
		$result=$this->query($sql);
		if($result){
			$this->affectedRows = $this->mysqliObj->affected_rows;
			$objects = array();
			while ($row = $result->fetch_assoc()) {
				array_push($objects, new book($row));
			}
			return $objects;
		}
		else return false;

	}



 }