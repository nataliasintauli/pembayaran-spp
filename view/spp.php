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
    <title>DATA SPP | PEMBAYARAN SPP</title>
</head>

<body>
    <br><br><br><br><br><br><br>
    <h1>
        <center>Data SPP</center>
    </h1>
    <center><a href="../spp/spp-tambah.php"><button class="btn first">tambah</button></a></center>
    <table border="1" width="60%" align="center" class="table">
        <tr height="40">
            <th>No.</th>
            <th>Angkatan</th>
            <th>Biaya</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no     = 1;
        $sql    = "SELECT * FROM tb_spp";
        $query  = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) { ?>
        <tr>
            <td align="center"><?= $no++; ?>.</td>
            <td><?= $data['angkatan']; ?> </td>
            <td><?= $data['biaya']; ?> </td>
            <td class="aksi" align="center">
                <a href="../spp/spp-edit.php?angkatan=<?= $data['angkatan']; ?>" class="btn-edit">EDIT</a>
                <a href="../spp/spp-hapus.php?angkatan=<?= $data['angkatan']; ?>" class="btn-hapus">HAPUS</a>
        </tr>
        <?php
        } ?>

    </table>
</body>