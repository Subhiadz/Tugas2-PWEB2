# Tugas 2 Praktikum Pemrograman WEB 2
## Deskripsi   
Tugas ini dibuat sebagai penunjang nilai tugas 2 pada matakuliah Praktikum Pemrograman WEB Semester 2.

Proyek ini mendemonstrasikan penerapan prinsip OOP dalam PHP, khususnya dalam interaksi dengan database MySQL. Konsep utama yang diterapkan meliputi enkapsulasi, inheritance, dan polimorfisme.

Sistem Informasi Bimbingan Akademik JKB (SIWALI JKB) bersifat komprehensif
sistem manajemen penasihat akademik yang dirancang untuk menyederhanakan proses
mengelola kinerja siswa, konseling, dan data akademik lainnya menjadi lebih tinggi
institusi pendidikan.

## Fitur
- **Koneksi Database**: Kelas koneksi terpusat yang menghubungkan ke database MySQL menggunakan prinsip OOP.
- **Enkapsulasi**: Properti private dan protected memastikan enkapsulasi data, sehingga kredensial dan koneksi database aman.
- **Inheritance**: Kelas turunan (`Student` dan `Guidance`) mewarisi dari kelas dasar `Database`, memanfaatkan koneksi database yang sudah terbangun.
- **Polimorfisme**: Kelas yang berbeda mengimplementasikan metode yang sama (`dataView`) untuk mengambil data dari tabel yang berbeda, menunjukkan penerapan polimorfisme.

## Penjelasan dan penggunaan class

### Penjelasan Implementasi Tugas pada Kode

#### 1. Membuat View Berbasis OOP dengan Mengambil Data dari Database MySQL
Kode ini membuat view berbasis OOP dengan menggunakan metode `dataView()` dalam kelas `Student` dan `Guidance`. Metode ini mengambil data dari tabel `students` dan `guidance` dalam database MySQL dan mengembalikan data tersebut untuk ditampilkan.

#### 2. Menggunakan `__construct` sebagai Penghubung ke Database
Kelas `Database` memiliki metode `__construct` yang bertindak sebagai penghubung ke database MySQL. Saat objek dari kelas `Student` atau `Guidance` dibuat, metode `__construct` ini dipanggil untuk membangun koneksi ke database menggunakan `mysqli`.

#### 3. Menerapkan Enkapsulasi Sesuai dengan Logika Studi Kasus
Enkapsulasi diterapkan dengan membuat atribut koneksi database (`$conn`) bersifat protected dalam kelas `Database`. Ini berarti hanya kelas itu sendiri dan kelas turunan yang dapat mengaksesnya, menjaga integritas data dan koneksi.

#### 4. Membuat Kelas Turunan Menggunakan Konsep Inheritance
Kelas `Student` dan `Guidance` merupakan kelas turunan dari kelas `Database`. Dengan konsep inheritance, kedua kelas ini mewarisi properti dan metode dari kelas `Database`, seperti metode `__construct` untuk koneksi database, sehingga tidak perlu mengulang kode yang sama.

#### 5. Menerapkan Polymorphism untuk Setidaknya 2 Peran Sesuai dengan Studi Kasus
Polymorphism diterapkan melalui metode `dataView()` dalam kelas `Student` dan `Guidance`. Keduanya memiliki metode dengan nama yang sama, namun fungsinya berbeda sesuai dengan peran masing-masing. `Student` mengambil data siswa, sedangkan `Guidance` mengambil data bimbingan, meskipun keduanya mewarisi struktur dasar dari kelas `Database`.

## Berikut implementasinya dalam class
### 1. Database
Class Database ini adalah bentuk implementasi dari koneksi database dengan mengunakan `__Costruct` dan Enkapsulasi, selain itu juga class ini memiliki akses untuk melakukan hal berikut:
- Mengelola koneksi ke database MySQL.
- Menggunakan metode `__construct()` untuk membangun koneksi yang diwarisi oleh semua kelas turunan.

```php
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
```

### 2. Student (turunan dari Database) 
Class Student ini adalah bentuk implementasi dari Inheritance, selain itu juga class ini memiliki akses untuk melakukan hal berikut:
- Mengambil data siswa dari tabel `students`.  
- Mengimplementasikan metode `dataView()` untuk mengambil semua catatan siswa.
- Mengimplementasikan metode `student($id)` untuk mengambil nama siswa berdasarkan ID.

```php
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
```

### 3. Guidance (turunan dari Database)
Class Guidance ini adalah bentuk implementasi dari Inheritance, selain itu juga class ini memiliki akses untuk melakukan hal berikut:
- Mengambil data bimbingan dari tabel `guidance`.
- Mengimplementasikan metode `dataView()` untuk mengambil semua catatan bimbingan.

```php
class Guidance extends Database{
   public function dataView(){
      $doc = $this->conn->query("SELECT * FROM guidance ") or die($this->conn->error);
      return $doc;
   }
}
```

## Contoh Penggunaan
nah ini adalah implementasi dari Polimorfisme

```php
$dosen = new Guidance();
$data_dosen = $dosen->dataView();

$student = new Student();
$data_student = $student->dataView();
```
# Implementasi Role dalam Tampilan Web

## Deskripsi
Kode ini mengimplementasikan tampilan web yang berinteraksi dengan database berdasarkan peran pengguna (`role`). Pengguna bisa memiliki peran sebagai `guidance` atau `student`, dan tampilan serta data yang disajikan akan berbeda berdasarkan peran tersebut.

## Fitur
- **Penggunaan Role:**
  - Kode ini memeriksa peran pengguna (`role`) yang ditentukan secara dinamis, dan menampilkan tautan serta data yang sesuai dengan peran tersebut.
```html
<?php if ($role == 'guidance') : ?>
               <li class="nav-item">
                  <a class="nav-link" href="guidance.php">Guidance</a>
               </li>
            <?php elseif ($role == 'student') : ?>
               <li class="nav-item">
                  <a class="nav-link" href="student.php">Student</a>
               </li>
            <?php endif; ?>
```

- **Tampilan Data:**
  - Kode ini menampilkan dua tabel data:
    - **Data `Guidance`:** Menampilkan `Nama Siswa`, `Masalah`, dan `Solusi`.
    - **Data `Student`:** Menampilkan `ID Class`, `Student Number`, `Name`, `Phone Number`, `Address`, dan `Signature`.
```html
<table class="table table-bordered">
         <thead class="thead-light">
            <tr>
               <th>No</th>
               <th>Nama Siswa</th>
               <th>Masalah</th>
               <th>Solusi</th>
            </tr>
         </thead>
         <tbody>
            <?php $i = 1; foreach($data_dosen as $doc) : ?>
            <tr>
               <td><?= $i++?></td>
               <td><?=$student->student($doc['id_student'])?></td>
               <td><?=$doc['problem']?></td>
               <td><?=$doc['solution']?></td>
            </tr>
            <?php endforeach ?>
         </tbody>
      </table>
```
```html
<table class="table table-bordered">
         <thead class="thead-light">
            <tr>
               <th>No</th>
               <th>ID Class</th>
               <th>Student Number</th>
               <th>Name</th>
               <th>Phone Number</th>
               <th>Address</th>
               <th>Signature</th>
            </tr>
         </thead>
         <tbody>
            <?php $i = 1; foreach($data_student as $doc) : ?>
            <tr>
               <td><?= $i++ ?></td>
               <td><?= $doc['id_class'] ?></td>
               <td><?= $doc['student_number'] ?></td>
               <td><?= $doc['name'] ?></td>
               <td><?= $doc['phone_number'] ?></td>
               <td><?= $doc['address'] ?></td>
               <td><?= $doc['signature'] ?></td>
            </tr>
            <?php endforeach ?>
         </tbody>
      </table>
```

- **Integrasi dengan `logic.php`:**
  - Kode ini menggunakan file `logic.php` untuk mengelola logika bisnis dan pengambilan data dari database.
```php
<?php
require_once 'logic.php';
```

## Tampilan Output
### Home
Menampilkan keseluruhan data yang ada pada database meliputi tabel guidance dan student.
![Tampilan Home](assets/Tampilan%20Home.png)


### Guidance
Hanya Menampilkan data yang ada pada tabel guidance.
![Tampilan Guidance](assets/Tampilan%20Role%20Guidance.png)

### Student
Hanya Menampilkan data yang ada pada tabel students.
![Tampilan Student](assets/Tampilan%20Role%20Student.png)

## Terimakasih 
Jangan lupa support dan silakan memberikan kritik dan masukan yang membangun agar saya bisa belajar kembali untuk memperbaiki kesalahan atau kekurangan yang ada.