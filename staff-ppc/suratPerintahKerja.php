<?php


session_start();

if(!isset($_SESSION["login"])){
    header ("Location: login.php");
    exit;
  }else if($_SESSION["jabatan"] != "ppc"){
    header("Location: ../index.php");
    exit;
}


require '../functions.php';
$id = query("SELECT id FROM suratperintahkerja ORDER BY id DESC")[0][0];
$id++;

if(isset($_POST["submit"])){
    if(tambahSPK($_POST) > 0 ) {
        echo "<script>
                alert ('Data Berhasil Disimpan');

                document.location.href = 'suratPerintahKerja.php';
              </script>
              ";
        } else {
            echo ("Error Description;" .$koneksi -> error);
        }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Dashboard Staff-PCC</title>

    

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
              <a class="nav-link active" aria-current="page" href="staff-ppc.php">
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
        </div>
      </nav>

  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     <h2>Surat Perintah Kerja</h2>
     <div class="table-responsive col-md-5">

       <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
               <table>
                   <tr>
                       <td> ID SPK</td>
                       <td align="right"> <input class="form-control " type="number" name="id" value="<?= $id; ?>" disabled size="30px"> </td>
                   </tr>
                   <tr>
                       <td>Jenis Produk</td>
                       <td align="right"> 
                           <select name="jenis" required width="100px" class="form-control">
                               <option value="" hidden> Pilih Jenis Produk </option>
                               <option value="Spring Bed">Spring Bed</option>
                               <option value="Kasur Sorong">Kasur Sorong</option>
                               <option value="Header Vivan">Header Vivan</option>
                           </select>
                       </td>
                   </tr>
                   <tr>
                       <td>Kategori Produk</td>
                       <td align="right"> 
                         <select name="kategori" required width="100px" class="form-control">
                             <option value="" hidden> Pilih Kategori </option>
                             <option value="Very High"> Very High </option>
                             <option value="High"> High </option>
                             <option value="Medium"> Medium </option>
                             <option value="Low"> Low </option>
                             <option value="Very Low"> Very Low </option>
                         </select> 
                       </td>
                   </tr>
                   <tr>
                     <td>Jumlah Produk</td>
                     <td align="right"> <input type="number" min="0" name="jumlah" required size="25px" class="form-control"></td>
                     <td class="fs-6 fw-light">*Periksa stock sebelum input jumlah</td>
                   </tr>
                   <tr>
                       <td>Tanggal Pemesanan</td>
                       <td align="right"> <input type="date" name="tanggal" required size="25px" class="form-control"> </td>
                   </tr>
               </table>

               <div class="text-center">
                   <button type="submit" name="submit" class="btn btn-outline-primary">Tambah</button><hr>
               </div>
           </form>
     </div>
   </main>
  </div>
</div>
    <script src="../assets/bootstrap/js/bootstrap.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>
