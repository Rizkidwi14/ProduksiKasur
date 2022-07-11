<?php 

session_start();

require 'functions.php';

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi,"SELECT * FROM user WHERE username ='$username' AND password = '$password' ");
    $cek = mysqli_num_rows($result);

    if($cek > 0 ){
        $_SESSION["login"] = true;
        $data = mysqli_fetch_assoc($result);

        //cek jabatan login dan tentukan hak akses
        if($data["jabatan"] == "sales"){
            $_SESSION["username"] = $username;
            $_SESSION["jabatan"] = "sales";
            header('Location: sales/sales.php');
        }else if($data["jabatan"] == "ic"){
            $_SESSION["username"] = $username;
            $_SESSION["jabatan"] = "ic";
            header('Location: staff-ic/staff-ic.php');
        }else if($data["jabatan"] == "ppc"){
            $_SESSION["username"] = $username;
            $_SESSION["jabatan"] = "ppc";
            header('Location: staff-ppc/staff-ppc.php');
        }else if($data["jabatan"] == "uhppic"){
            $_SESSION["username"] = $username;
            $_SESSION["jabatan"] = "uhppic";
            header('Location: uh-ppic/uh-ppic.php');
        }else if($data["jabatan"] == "packing"){
            $_SESSION["username"] = $username;
            $_SESSION["jabatan"] = "packing";
            header('Location: operator-packing/operatorPacking.php');
        }else if($data["jabatan"] == "shoperasional"){
            $_SESSION["username"] = $username;
            $_SESSION["jabatan"] = "shoperasional";
            header('Location: sh-operasional/sh-operasional.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/stylelogin.css">
    <title>Halaman Login</title>
</head>
<body background="assets/pictures/30100.jpg">
    <div class="boxx">
        <h1 class="text-center">Login</h1>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" autocomplete="off">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="login" value="Login">
            </form>
    </div>
</body>
<script src="assets/bootstrap/js/bootstrap.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</html>