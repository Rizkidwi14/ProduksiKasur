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
$id = $_GET["id"];
$cekKualitas = query("SELECT * FROM spkmasuk WHERE id = $id")[0];
$idPengecekan = query("SELECT id FROM laporanpengecekan  ORDER BY id DESC")[0][0];
$idPengecekan++;

if(isset($_POST["submit"])){
    if($_POST["berhasil"] + $_POST["cacat"] != $_POST["jumlah"]){
        echo "<script>
                alert ('Pengecekan Tidak Sesuai Dengan jumlah Produk');
                </script>
            ";
        header("Refresh:0");
        die();
    }
    if(cekKualitas($_POST) > 0 ) {
        echo "<script>
                alert ('Pengecekan Berhasil');

                document.location.href = 'operatorPacking.php';
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
    <title>Form Pengecekan Kualitas</title>

    

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
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="operatorPacking.php">Kembali</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="../logout.php">Sign Out</a>
    </li>
  </ul>
</header>

<!-- Navbar -->
<div class="container-fluid">
  <div class="row">
    <main class="offset-md-3 col-lg-6 px-md-3">
        <h1 class="text-center">Form Pengecekan Kualitas Produk</h1>
        <div class="container text-dark isi bg-light col-dm-1 ">
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <table>
                    <tr>
                        <td>ID Pengecekan</td>
                        <td align="right"> <input class="form-control " type="number" name="id" size="30px" readonly value="<?= $idPengecekan; ?>"> </td>
                    </tr>
                    <tr>
                        <td>Jenis Produk</td>
                        <td align="right"> <input class="form-control " type="text" name="jenis" size="30px" readonly value="<?= $cekKualitas["jenis"];?>"> </td>
                    </tr>
                    <tr>
                        <td>Kategori Produk</td>
                        <td align="right"> <input class="form-control " type="text" name="kategori" size="30px" readonly value="<?= $cekKualitas["kategori"];?>"> </td>
                    </tr>
                    <tr>
                        <td>Jumlah Produk</td>
                        <td align="right"> <input class="form-control " type="number" name="jumlah" size="30px" readonly value="<?= $cekKualitas["jumlah"];?>"> </td>
                    </tr>
                    <tr>
                        <td>Produk Berhasil</td>
                        <td align="right"> <input class="form-control " type="number" name="berhasil" size="30px" min="0"> </td>
                    </tr>
                    <tr>
                        <td>Produk Cacat</td>
                        <td align="right"> <input class="form-control " type="number" name="cacat" size="30px" min="0"> </td>
                    </tr>
                </table>

                <div class="text-center ">
                    <button type="submit" name="submit" class="btn btn-outline-primary">Konfirmasi</button><hr>
                </div>
            </form>
        </div>     
    </main>
  </div>
</div>
    <script src="../assets/bootstrap/js/bootstrap.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>