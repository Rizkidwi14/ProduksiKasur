<?php


session_start();

if(!isset($_SESSION["login"])){
    header ("Location: login.php");
    exit;
  }else if($_SESSION["jabatan"] != "packing"){
    header("Location: ../index.php");
    exit;
}


require '../functions.php';
$laporanPengecekan = query("SELECT * FROM laporanpengecekan");
$sumJumlah = query("SELECT sum(jumlah) FROM laporanpengecekan")[0][0];
$sumCacat = query("SELECT sum(cacat) FROM laporanpengecekan")[0][0];
$avgKecacatan = $sumCacat / $sumJumlah;
$ucl = $avgKecacatan+3*(SQRT($avgKecacatan*(1-$avgKecacatan))/50);
$lcl = $avgKecacatan-3*(SQRT($avgKecacatan*(1-$avgKecacatan))/50);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Dashboard Operator Packing</title>

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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Sample', 'UCL', 'LCL','Rata-Rata Kecacatan','Proporsi Kesalahan'],
          <?php foreach ($laporanPengecekan as $row) : ?>
          [<?= $row["id"];?>,
            <?= $avgKecacatan+3*(SQRT($avgKecacatan*(1-$avgKecacatan))/$row["jumlah"]); ?>,
            <?= $avgKecacatan-3*(SQRT($avgKecacatan*(1-$avgKecacatan))/$row["jumlah"]); ?>,
            <?= $avgKecacatan;?>,
            <?= $row["cacat"] / $row["jumlah"]; ?>
          ],
          <?php endforeach; ?>
        ]);

        var options = {
          title: 'Grafik SPC',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

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
            <a class="nav-link active" aria-current="page" href="operatorPacking.php">
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
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h2>Tabel SPC</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
          <thead>
            <th>No</th>
            <th>ID Pengecekan</th>
            <th>Jumlah produk yang diperiksa</th>
            <th>Jumlah Cacat</th>
            <th>Proporsi Kesalahan</th>
            <th>Rata-Rata Kecacatan</th>
            <th>UCL</th>
            <th>LCL </th>
          </thead>

          <?php $i=1; ?>
          <?php foreach ($laporanPengecekan as $row) : ?>
          <tr>
            <td> <?= $i; ?> </td>
            <td> <?= $row["id"] ?> </td>
            <td> <?= $row["jumlah"] ?> </td>
            <td> <?= $row["cacat"] ?> </td>
            <td> <?= round($row["cacat"] / $row["jumlah"],3); ?> </td>
            <td class="col-sm-2"> <?= round($avgKecacatan,3); ?> </td>
            <td class="col-sm-2"> <?= round($avgKecacatan+3*(SQRT($avgKecacatan*(1-$avgKecacatan))/$row["jumlah"]),3); ?> </td>
            <td class="col-sm-2"> <?= round($avgKecacatan-3*(SQRT($avgKecacatan*(1-$avgKecacatan))/$row["jumlah"]),3); ?> </td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
          <tr>
            <td>Total</td>
            <td></td>
            <td> <?= $sumJumlah; ?> </td>
            <td> <?= $sumCacat; ?></td>
          </tr>
        </table>
      </div>
      <div id="curve_chart" style="width: 900px; height: 500px"></div>
    </main>
  </div>
</div>
    <script src="../assets/bootstrap/js/bootstrap.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>
