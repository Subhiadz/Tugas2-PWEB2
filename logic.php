<?php
class Database {
   private $host, $username, $password, $db;
   protected $conn;
   
   public function __construct(){
      $this->host = 'localhost';
      $this->username = 'root';
      $this->password = '';
      $this->db = 'bimbingan';
      
      $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db) ;
   }
}

class Student extends Database{
   
   public function dataView(){
      $doc =  $this->conn->query("SELECT * FROM students") or die($this->conn->error);
      return $doc;
   }

   public function student($id){
      $data = $this->conn->query("SELECT * FROM `students` WHERE `id_student` = $id");
      $row = mysqli_fetch_array($data);
      return $row['name'];
   }
   
}

class Guidance extends Database{
   public function dataView(){
      $doc = $this->conn->query("SELECT * FROM guidance ") or die($this->conn->error);
      return $doc;
   }
   
}

$dosen = new Guidance();
$data_dosen = $dosen->dataView();

$student = new Student();
$data_student = $student->dataView();
?>