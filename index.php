<?php
require_once 'logic.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tugas2-PWEB2</title>
</head>
<body>
   <table border="1" cellpadding="10" cellspacing="0">
      <tr>
         <th>No</th>
         <th>Nama Siswa</th>
         <th>Masalah</th>
         <th>Solusi</th>
      </tr>
      <?php $i = 1; foreach($data_dosen as $doc) : ?>
      <tr>
            <td><?= $i++?></td>
            <td><?=$student->student($doc['id_student'])?></td>
            <td><?=$doc['problem']?></td>
            <td><?=$doc['solution']?></td>
      </tr>
      <?php endforeach?>
   </table> 
   <br>

   <table border="1" cellpadding="10" cellspacing="0">
      <tr>
         <th>No</th>
         <th>ID Class</th>
         <th>Student Number</th>
         <th>Name</th>
         <th>Phone Number</th>
         <th>Address</th>
         <th>Signature</th>
      </tr>
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
   </table> 
</body>
</html>