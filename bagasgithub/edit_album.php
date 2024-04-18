<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Album</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Gallery Bagas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="album.php">Album</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="foto.php">Foto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="container">
    <h1>Halaman Edit Album</h1>                                                       
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    <form action="update_album.php" method="post">
        <?php
            include "koneksi.php";
            $albumid=$_GET['albumid'];
            $sql=mysqli_query($conn,"select * from album where albumid='$albumid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="albumid" value="<?=$data['albumid']?>" hidden>
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="namaalbum" value="<?=$data['namaalbum']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Ubah"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>
<script src="bootstrap.bundle.min.js"></script>
</body>
</html>