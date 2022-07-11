<?php

require '../functions.php';
$pemesanan = query("SELECT * FROM pemesanan ORDER BY idPemesanan DESC");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Dashboard SH-Operasional</title>

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
        <h3 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-6 mb-1 text-muted">
          <span>Laporan</span>
        </h3>
        <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-6 mb-1 text-muted">
          <span>Sales</span>
        </h5>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="sh-operasional.php">
              <span data-feather="home"></span>
              Data Pemesanan
            </a>
          </li>
        </ul>


        <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-6 mb-1 text-muted">
          <span>IC</span>
        </h5>
        <ul class="nav flex-column">
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
            <a class="nav-link " aria-current="page" href="pemesananBahanBaku.php">
              <span data-feather="home"></span>
              Pemesanan Bahan Baku
            </a>
          </li>
        </ul>


        <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-6 mb-1 text-muted">
          <span>PPC</span>
        </h5>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="bahanBaku.php">
              <span data-feather="home"></span>
              Bahan Baku
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="suratPerintahKerja.php">
              <span data-feather="home"></span>
              Surat Perintah Kerja
            </a>
          </li>
        </ul>


        <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-6 mb-1 text-muted">
          <span>PPIC</span>
        </h5>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">
              <span data-feather="home"></span>
              Data Pemesanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="bahanBaku.php">
              <span data-feather="home"></span>
              Bahan Baku
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="suratPerintahKerja.php">
              <span data-feather="home"></span>
              Surat Perintah Kerja
            </a>
          </li>
        </ul>


        <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-6 mb-1 text-muted">
          <span>Packing</span>
        </h5>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="spkMasuk.php">
              <span data-feather="home"></span>
              Data SPK Masuk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="laporanPengecekan.php">
              <span data-feather="home"></span>
              Laporan Pengecekan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="spc.php">
              <span data-feather="home"></span>
              SPC
            </a>
          </li>
        </ul>


      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h2>Data Pemesanan</h2>
      <div class="table-responsive">

        <table class="table table-striped table-sm text-center">
          <thead>
            <th>NO.</th>
            <th>Nama Penjual</th>
            <th>Nama Pembeli</th>
            <th>Jumlah Produk</th>
            <th>Jenis Produk</th>
            <th>Kategori Produk</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Provinsi</th>
            <th>Kode Pos</th>
            <th>Tanggal Pemesanan</th>
            <th>Durasi Pengiriman (Hari)</th>
          </thead>

          <?php $i=1; ?>
          <?php foreach ($pemesanan as $row) : ?>
          <tr>
            <td> <?= $i; ?> </td>
            <td> <?= $row["NamaPenjual"] ?> </td>
            <td> <?= $row["NamaPembeli"] ?> </td>
            <td> <?= $row["JumlahProduk"] ?> </td>
            <td> <?= $row["JenisProduk"] ?> </td>
            <td> <?= $row["KategoriProduk"] ?> </td>
            <td> <?= $row["AlamatPembeli"] ?> </td>
            <td> <?= $row["Kota"] ?> </td>
            <td> <?= $row["Provinsi"] ?> </td>
            <td> <?= $row["KodePos"] ?> </td>
            <td> <?= $row["TanggalPemesanan"] ?> </td>
            <td> <?= $row["DurasiPengirimanProduk"] ?> </td>
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
