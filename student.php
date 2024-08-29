<?php
require_once 'logic.php'; // Pastikan file logic.php tersedia dan sesuai
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="student.php">Student</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="guidance.php">Guidance</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Student View</h2>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
