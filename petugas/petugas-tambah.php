<?php
session_start();
include "../koneksi.php";
include "../template/header.php";
include "../template/navbar.php";
include "../template/footer.php";
?>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/form.css">

</head>
<br><br><br><br><br><br>
<center>
    <h1>Masukan Data Petugas</h1>
    <form action="proses-petugas-tambah.php" method="POST" class="form">
        <label>Username :</label><br>
        <input type="text" name="username"><br><br>
        <label>Password :</label><br>
        <input type="text" name="password"><br><br>
        <label>Nama :</label><br>
        <input type="text" name="nama"><br><br>
        <label>No Telp :</label><br>
        <input type="text" name="telp"><br><br>
        <label>Alamat :</label><br>
        <input type="text" name="alamat"><br><br>
        <button class="btn first" type="submit">Kirim</button>
    </form>
</center>