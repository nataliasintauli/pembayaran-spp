<?php
session_start();
include "../koneksi.php";
include "../template/header.php";
include "../template/navbar.php";
include "../template/footer.php";
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<br><br><br><br><br><br>
<center>
    <h1>Masukan Data SPP</h1>
    <form action="proses-spp-tambah.php" method="POST">
        <label>Angkatan :</label><br>
        <input type="text" name="angkatan"><br><br>
        <label>biaya :</label><br>
        <input type="text" name="biaya"><br><br>
        <button class="btn first" type="submit">Kirim</button>
    </form>
</center>

</html>