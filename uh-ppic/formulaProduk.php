<?php


session_start();

if(!isset($_SESSION["login"])){
    header ("Location: login.php");
    exit;
  }else if($_SESSION["jabatan"] != "uhppic"){
    header("Location: ../index.php");
    exit;
}


require '../functions.php';
$formulaProduk = query("SELECT * FROM formulaproduk");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Dashboard Staff-IC</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../index.php">Jakarta Sejahtera</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="../logout.php">Sign Out</a>
    </li>
  </ul>
</header>

<!-- Navbar -->
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Dashboard</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link " aria-current="page" href="uh-ppic.php">
              <span data-feather="home"></span>
              Data Pemesanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="bahanBaku.php">
              <span data-feather="home"></span>
              Bahan Baku
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="formulaProduk.php">
              <span data-feather="home"></span>
              Formula Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="suratPerintahKerja.php">
              <span data-feather="home"></span>
              Surat Perintah Kerja
            </a>
          </li>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h2>Data Formula Produk</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
          <thead>
            <th>NO.</th>
            <th>Jenis Produk</th>
            <th>Kategori Produk</th>
            <th>Matras</th>
            <th>Busa/Foam</th>
            <th>Ari Kain</th>
            <th>Rangka Divan</th>
            <th>Per Sudut</th>
            <th>Per Pegas</th>
            <th>Per Bulat</th>
            <th>Per Pinggir</th>
            <th>Kawat Lis</th>
            <th>Kawat Kumparan</th>
            <th>Woven</th>
            <th>Dakron</th>
            <th>Circle Fiber Foam</th>
          </thead>

          <?php $i=1; ?>
          <?php foreach ($formulaProduk as $row) : ?>
          <tr>
            <td> <?= $i; ?> </td>
            <td> <?= $row["jenisProduk"] ?> </td>
            <td> <?= $row["kategoriProduk"] ?> </td>
            <td> <?= $row["matras"] ?> </td>
            <td> <?= $row["busa"] ?> </td>
            <td> <?= $row["ariKain"] ?> </td>
            <td> <?= $row["rangkaDivan"] ?> </td>
            <td> <?= $row["perSudut"] ?> </td>
            <td> <?= $row["perPegas"] ?> </td>
            <td> <?= $row["perBulat"] ?> </td>
            <td> <?= $row["perPinggir"] ?> </td>
            <td> <?= $row["kawatLis"] ?> </td>
            <td> <?= $row["kawatKumparan"] ?> </td>
            <td> <?= $row["Woven"] ?> </td>
            <td> <?= $row["Dakron"] ?> </td>
            <td> <?= $row["circleFiberFoam"] ?> </td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="../assets/bootstrap/js/bootstrap.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>
