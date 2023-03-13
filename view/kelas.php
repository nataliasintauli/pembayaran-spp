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
    <link rel="stylesheet" type="text/css" href="../assets/css/table.css">
    <title>DATA KELAS | SISTEM PEMBAYARAN SPP</title>
</head>

<body>
    <br><br><br><br><br><br><br>
    <h1>
        <center>Data Kelas</center>
    </h1>
    <center><a href="../kelas/kelas-tambah.php"><button class="btn first">tambah</button></a></center>
    <table border="1" width="60%" align="center" class="table">
        <tr height="40">
            <th>No.</th>
            <th>Nama Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php
    $no     =1;
    $sql    = "SELECT * FROM tb_kelas";
    $query  = mysqli_query($koneksi, $sql);
    while ($data = mysqli_fetch_array($query)) { ?>
        <tr>
            <td align="center"><?= $no++; ?>.</td>
            <td><?= $data['kelas']; ?> </td>
            <td><?= $data['jurusan']; ?> </td>
            <td class="aksi" align="center">
                <a href="../kelas/kelas-edit.php?kelas=<?= $data['kelas']; ?>" class="btn-edit">EDIT</a>
                <a href="../kelas/kelas-hapus.php?kelas=<?=  $data['kelas']; ?>" class="btn-hapus">HAPUS</a>
        </tr>
        <?php
    } ?>

    </table>
</body>