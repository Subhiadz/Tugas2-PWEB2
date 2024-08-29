<?php
// Kelas Student untuk mengelola data mahasiswa
class Student extends Database {
   // Mengambil semua data mahasiswa dari tabel 'students'
   public function dataView() {
      $doc = $this->conn->query("SELECT * FROM students") or die($this->conn->error);
      return $doc;
   }

   // Mengambil nama mahasiswa berdasarkan ID mahasiswa
   public function student($id) {
      $data = $this->conn->query("SELECT * FROM `students` WHERE `id_student` = $id");
      $row = mysqli_fetch_array($data);
      return $row['name'];
   }
}

// Kelas Guidance untuk mengelola data bimbingan
class Guidance extends Database {
   // Mengambil semua data bimbingan dari tabel 'guidance'
   public function dataView() {
      $doc = $this->conn->query("SELECT * FROM guidance") or die($this->conn->error);
      return $doc;
   }
}

// Membuat objek Guidance dan mengambil data bimbingan
$dosen = new Guidance();
$data_dosen = $dosen->dataView();

// Membuat objek Student dan mengambil data mahasiswa
$student = new Student();
$data_student = $student->dataView();
?>