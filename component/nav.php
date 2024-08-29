<!-- File: nav.php -->
<!-- Navbar untuk navigasi utama -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <!-- Link ke halaman utama -->
   <a class="navbar-brand" href="index.php">Home</a>
   <!-- Tombol toggler untuk tampilan mobile -->
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>
   <!-- Konten navbar yang dapat di-collapse pada tampilan mobile -->
   <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
         <!-- Item menu untuk halaman Guidance -->
         <li class="nav-item active">
            <a class="nav-link" href="guidance.php">Guidance</a>
         </li>
         <!-- Menampilkan item menu tambahan berdasarkan role pengguna -->
         <?php if ($role == 'guidance') : ?>
            <!-- Jika role adalah 'guidance', tampilkan link tambahan untuk Guidance -->
            <li class="nav-item">
               <a class="nav-link" href="guidance.php">Guidance</a>
            </li>
         <?php elseif ($role == 'student') : ?>
            <!-- Jika role adalah 'student', tampilkan link tambahan untuk Student -->
            <li class="nav-item">
               <a class="nav-link" href="student.php">Student</a>
            </li>
         <?php endif; ?>
      </ul>
   </div>
</nav>