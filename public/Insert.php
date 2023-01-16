<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>BaitulQur'an - Penerimaan Santri Baru</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <title> Form Pendaftaran </title>
</head>
<body>
     <!-- Topbar Start -->
     <div class="container-fluid px-5 d-none d-lg-block">
        <div class="row gx-5 py-3 align-items-center">
            <div class="col-lg-3">
                <div class="d-flex align-items-center justify-content-start">
                    <a class="btn btn-primary btn-square rounded-circle" href="https://www.instagram.com/baitul_quran_wonogiri/?hl=id"><i class="fab fa-whatsapp"></i></a>
                    <h2 class="mb-0">+62 89508484764</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex align-items-center justify-content-center">
                    <a href="index.html" class="navbar-brand ms-lg-5">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">Baitul</span>Qur'an</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center justify-content-end">
                    <a class="btn btn-primary btn-square rounded-circle" href="https://www.instagram.com/baitul_quran_wonogiri/?hl=id"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div >
            <div class="carousel-inner">
    
                <div >
                    <img class="w-100"  src="img/carousel-1.webp" style="width:100%" alt="Image">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 600px;">
                    <div class="container">
                    <table>
                    <h3 class="m-0 text-primary"><span class="text-secondary">Masukan</span>Data</h3>
                    <br>
                    <form action="" method="POST">
                    <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nama Depan</label>
              <input type="text" class="form-control" Name="NamaDepan" placeholder="Budi" value="" required="" style="color:black;">
              <div class="invalid-feedback">
                Nama Depan Harus Diisi.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" Name="NamaBelakang" placeholder="Nurhadi" value="" required="" style="color:black;">
              <div class="invalid-feedback">
              Nama Belakang Harus Diisi.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">ALamat</label>
              <input type="text" class="form-control" name="Alamat" placeholder="Gg.Melon Sukoharjo" required="" style="color:black;">
              <div class="invalid-feedback">
               Alamat Harus Diisi.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="Number" class="form-label">Nomor Telepon</label>
              <input type="text" class="form-control" Name="Nomor" placeholder="0812345678" value="" required="" style="color:black;">
              <div class="invalid-feedback">
              Nomor Telepon Harus Diisi.
              </div>
            </div>

            <div class="col-sm-6 ">
              <label for="birth" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" Name="Lahir" placeholder="" value="" required="" style="color:black;">
              <div class="invalid-feedback">
              Tanggal Lahir Harus Diisi.
              </div>
            </div>

            <div class="col-12">
              <label for="Motivation" class="form-label">Motivasi</label>
              <textarea type="text" class="form-control" name="motivasi" placeholder="aku ingin jadi ustad" required="" style="color:black;">
</textarea>
<div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="proses">KIRIM</button>
    </div>
                <div class="invalid-feedback">
               Motivasi Harus Diisi.
              </div>
            </div>
          <br>
          <br>
</div>

    <!-- script php mysql untuk menyimpan data (insert data ke database) -->

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
mysqli_query($koneksi," INSERT INTO pendaftaran SET 
NamaDepan='$_POST[NamaDepan]',
NamaBelakang='$_POST[NamaBelakang]',
Alamat='$_POST[Alamat]',
Nomor='$_POST[Nomor]',
Lahir='$_POST[Lahir]',
motivasi='$_POST[motivasi]'"); 

echo "Data pendaftartelah tersimpan";
echo "<meta http-equiv=refresh content=1;URL='index.html'>";}

?>
</body>
<br>
 <div class="container-fluid bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; <a class="text-secondary fw-bold" href="#">Baitul Qur'an</a>. All Rights Reserved. Designed by <a class="text-secondary fw-bold" href="https://www.instagram.com/fadhfayi.athallah/?hl=id">Fadhfayi Athallah</a></p>
        </div>
    </div>
     <!-- Back to Top -->
     <a href="#" class="btn btn-secondary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>



</html>
