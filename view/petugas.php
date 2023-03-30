<?php
session_start();
include "../koneksi.php";
include "../template/navbar.php";

?>
<html>

<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/table.css">
    <link rel="stylesheet" href="../assets/css/form.css">
    <title>DATA PETUGAS | SPP</title>
</head>

<body>

    <br><br><br><br><br><br><br>
    <h1>
        <center>Data Petugas</center>
    </h1>
    <center><a href="../petugas/petugas-tambah.php"><button class="btn first">tambah</button></a></center>
    <table border="1" width="60%" align="center" class="table">
        <tr height="40">
            <th>No.</th>
            <th>ID Petugas</th>
            <th>Username</th>
            <th>Password</th>
            <th>Nama</th>
            <th>Level</th>
            <th>No Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
    $no     =1;
    $sql    = "SELECT * FROM tb_petugas";
    $query  = mysqli_query($koneksi, $sql);
    while ($data = mysqli_fetch_array($query)) { ?>
        <tr>
            <td align="center"><?= $no++; ?>.</td>
            <td><?= $data['idpetugas']; ?> </td>
            <td><?= $data['username']; ?></td>
            <td><?= $data['password']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['level']; ?></td>            
            <td><?= $data['telp']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td class="aksi" align="center">
                <a href="../petugas/petugas-edit.php?idpetugas=<?= $data['idpetugas']; ?>" class="btn-edit">EDIT</a>
                <a href="../petugas/petugas-hapus.php?idpetugas=<?=  $data['idpetugas']; ?>" class="btn-hapus">HAPUS</a>
        </tr>
        <?php
    } ?>

    </table>