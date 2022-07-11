<?php

session_start();

if(!isset($_SESSION["login"])){
    header ("Location: login.php");
    exit;
  }else if($_SESSION["jabatan"] != "sales"){
    header("Location: ../index.php");
    exit;
}


require '../functions.php';
if(isset($_POST["submit"])){
    if(tambahPemesanan($_POST) > 0 ) {
        echo "<script>
                alert ('Data Berhasil Disimpan');
                // document.location.href = 'tambahPemesanan.php';
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
    <title>Tambah Data Pemesanan</title>

    

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
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="sales.php">Kembali</a>
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
        <h1 class="text-center">Tambah Data Pemesanan</h1>
        <div class="container text-dark isi bg-light col-dm-1">
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <table>
                    <tr>
                        <td>Nama Penjual</td>
                        <td align="right"> <input type="text" name="NamaPenjual" required size="25px" class="form-control"> </td>
                    </tr>
                    <tr>
                        <td>Nama Pembeli</td>
                        <td align="right"> <input type="text" name="NamaPembeli" required size="25px" class="form-control"> </td>
                    </tr>
                    <tr>
                        <td>Jumlah Produk</td>
                        <td align="right"> <input type="text" name="JumlahProduk" required size="25px" class="form-control"> </td>
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
                         <select name="KategoriProduk" required width="100px" class="form-control">
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
                        <td>Alamat Pembeli</td>
                        <td align="right"> <input type="text" name="AlamatPembeli" required size="25px" class="form-control"> </td>
                    </tr>
                    <tr>
                        <td>Kota</td>
                        <td align="right"> <input type="text" name="Kota" required size="25px" class="form-control"> </td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td align="right"> <input type="text" name="Provinsi" required size="25px" class="form-control"> </td>
                    </tr>
                    <tr>
                        <td>Kode Pos</td>
                        <td align="right"> <input type="text" name="KodePos" required size="25px" class="form-control" maxlength="6"> </td>
                    </tr>
                    <tr>
                        <td>Tanggal Pemesanan</td>
                        <td align="right"> <input type="date" name="TanggalPemesanan" required size="25px" class="form-control"> </td>
                    </tr>
                    <tr>
                        <td>Durasi Pengiriman Produk</td>
                        <td align="right"> <input type="text" name="DurasiPengirimanProduk" required size="25px" class="form-control"> </td>
                    </tr>
                </table>

                <div class="text-center ">
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
