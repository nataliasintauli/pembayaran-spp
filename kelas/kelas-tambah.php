<?php
session_start();
include "../koneksi.php";
include "../template/navbar.php";
?>

<html>

<head>
<title>TAMBAH DATA KELAS | SPP</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<br><br><br><br><br><br>
<center>
    <h1>Masukan Data Kelas</h1>
    <form action="proses-kelas-tambah.php" method="POST">
        <label>Nama Kelas :</label><br>
        <input type="text" name="kelas"><br><br>
        <label>Jurusan :</label><br>
        <input type="text" name="jurusan"><br><br>
        <button class="btn first" type="submit">Kirim</button>
    </form>