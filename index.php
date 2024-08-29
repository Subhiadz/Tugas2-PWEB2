<?php
require_once 'logic.php';

// Role user yang bisa 'guidance' atau 'student'
// Misalnya, role ini didapatkan dari session atau database
$role = 'guidance'; // ganti ini sesuai dengan role pengguna
$role = 'student'; // ganti ini sesuai dengan role pengguna
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tugas2-PWEB2</title>
   <!-- Bootstrap CSS -->
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="guidance.php">Guidance</a>
            </li>
            <?php if ($role == 'guidance') : ?>
               <li class="nav-item">
                  <a class="nav-link" href="guidance.php">Guidance</a>
               </li>
            <?php elseif ($role == 'student') : ?>
               <li class="nav-item">
                  <a class="nav-link" href="student.php">Student</a>
               </li>
            <?php endif; ?>
         </ul>
      </div>
   </nav>

   <div class="container mt-4">
      <h2>All Data</h2>
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
   </div>

   <!-- Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
