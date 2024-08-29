<?php
// Kelas Database untuk mengelola koneksi database
class Database {
   // Variabel untuk menyimpan informasi koneksi database
   private $host, $username, $password, $db;
   // Variabel untuk menyimpan koneksi database yang aktif
   protected $conn;

   // Konstruktor kelas untuk menginisialisasi koneksi database
   public function __construct(){
      $this->host = 'localhost';        // Host database
      $this->username = 'root';         // Username database
      $this->password = '';             // Password database
      $this->db = 'bimbingan';          // Nama database
      
      // Membuat koneksi ke database menggunakan MySQLi
      $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db);
      
      // Memeriksa apakah koneksi berhasil
      if ($this->conn->connect_error) {
         die("Connection failed: " . $this->conn->connect_error);
      }
   }
}
?>