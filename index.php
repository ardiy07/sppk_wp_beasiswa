<?php
session_start();
include('configdb.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPPK Weighted Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto"> <!-- ml-auto to align to the right -->
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kriteria.php">Data Kriteria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="alternatif.php">Data Alternatif</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="analisa.php">Analisa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="perhitungan.php">Perhitungan</a>
        </li>
      </ul>
    </div>
  </nav>

  <header>
    <!-- Background image -->
    <div id="intro">
      <div class="container">
        <div class="text-white" style="padding-top: 20%; padding-bottom: 16%;">
          <!-- <h1 class="text1" data-aos="fade-right" data-aos-duration="300"><strong>SPPK</strong></h1> -->
          <h3 class="text2" data-aos="fade-right" data-aos-duration="500"><strong>Sistem Penunjang Pengambilan Keputusan</strong></h3>
          <p class="text3" style="font-size: 2vw;" data-aos="fade-right" data-aos-duration="700"> Sistem yang hadir untuk membantu anda dalam pengambilan keputusan. <br> Sistem ini digunakan untuk <strong> Pemilihan Penerimaan Beasiswa Ambulu Mengajar Foundation </strong> menggunakan Metode Weighted Product.</p>
          <p class="text3" data-aos="fade-right" data-aos-duration="700"> Oleh: Kelompok A1</p>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</html>