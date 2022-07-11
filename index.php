<?php
session_start();

if(!isset($_SESSION["login"])){
    header ("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Halaman Utama</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Jakarta Sejahtera</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <!-- <?php if(!isset($_SESSION["login"])) {?>
                <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                </li>
                <?php } ?> -->
                
                <?php if($_SESSION["jabatan"] == "sales" ) : ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="sales/sales.php">Sales</a>
                </li>
                <?php endif; ?>

                <?php if($_SESSION["jabatan"] == "ic" ) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="staff-ic/staff-ic.php">Staff-IC</a>
                </li>
                <?php endif; ?>

                <?php if($_SESSION["jabatan"] == "ppc" ) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="staff-ppc/staff-ppc.php">Staff-PPC</a>
                </li>
                <?php endif; ?>

                <?php if($_SESSION["jabatan"] == "uhppic" ) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="uh-ppic/uh-ppic.php">UH PPIC</a>
                </li>
                <?php endif; ?>

                <?php if($_SESSION["jabatan"] == "packing" ) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="operator-packing/operatorPacking.php">Operator Packing</a>
                </li>
                <?php endif; ?>

                <?php if($_SESSION["jabatan"] == "shoperasional" ) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="sh-operasional/sh-operasional.php">SH-Operasional</a>
                </li>
                <?php endif; ?>
            </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="position relative">
        <div id="carouselExampleSlidesOnly" class="carousel slide position-absolute top-50 start-50 translate-middle" data-bs-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/pictures/logo.jpg" class="img-fluid" height="400px">
                <div class="carousel-caption d-none d-md-block">
                </div>
            <p class="fs-1 fw-bold text-center " style="color: #035294; font-family: sans-serif;">PT. Anugrah Cemerlang Abadi</p>
            </div>
            </div>
        </div>
    </div>
</main>
</body>
<script src="assets/bootstrap/js/bootstrap.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</html>