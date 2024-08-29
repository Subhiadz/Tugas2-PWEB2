<?php
require_once 'logic.php'; // Pastikan file logic.php tersedia dan sesuai
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guidance Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="guidance.php">Guidance</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student.php">Student</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Guidance View</h2>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
