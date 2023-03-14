<?php
session_start();
include "../koneksi.php";
include "../template/navbar.php";
?>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/form.css">
    <title>TAMBAH DATA PETUGAS | SPP</title>

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
        <label>Level User :</label><br>
        <select class="costum-select" name="level">
                <option></option>
                <option value="admin">admin</option>
                <option value="petugas">petugas</option>
        </select><br><br>
        <label>No Telp :</label><br>
        <input type="text" name="telp"><br><br>
        <label>Alamat :</label><br>
        <input type="text" name="alamat"><br><br>
        <button class="btn first" type="submit">Kirim</button>
    </form>
</center>