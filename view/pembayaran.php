<?php
session_start();
require "../koneksi.php";
include "../template/navbar.php";
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/table.css">    
    <title>HISTORY PEMBAYARAN | SPP</title>

</head>

<body>

    <br><br><br><br><br><br><br>

    <br>
    <h1>
        <center>History Pembayaran</center>
    </h1>
    <table border="1" width="80%" align="center" class="table">
        <tr height="40">
            <th>ID Transaksi</th>
            <th>NIS</th>
            <th>Angkatan</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Tanggal Bayar</th>
            <th>Jumlah Bayar</th>
            <th>Keterangan</th>
            <th>ID Petugas</th>
        </tr>

        <?php
                if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas') {
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
                    while ($data = mysqli_fetch_assoc($query)) {
                ?>
                        <tr>
                            <td><?php echo $data['idtransaksi']; ?></td>
                            <td><?php echo $data['nis']; ?></td>
                            <td><?php echo $data['angkatan']; ?></td>
                            <td><?php echo $data['bulan']; ?></td>
                            <td><?php echo $data['tahun']; ?></td>
                            <td><?php echo $data['tglbayar']; ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td><?php echo $data['ket']; ?></td>
                            <td><?php echo $data['idpetugas']; ?></td>
                        </tr>

                        <?php
                    }
                } else if ($_SESSION['level'] == 'siswa') {
                    $nis = $_SESSION['nis'];
                    $query = mysqli_query($koneksi, ("SELECT * FROM tb_transaksi WHERE nis='$nis'"));
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>                        
                            <td><?php echo $data['idtransaksi']; ?></td>
                            <td><?php echo $data['nis']; ?></td>
                            <td><?php echo $data['angkatan']; ?></td>
                            <td><?php echo $data['bulan']; ?></td>
                            <td><?php echo $data['tahun']; ?></td>
                            <td><?php echo $data['tglbayar']; ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td><?php echo $data['ket']; ?></td>
                            <td><?php echo $data['idpetugas']; ?></td>
                        </tr>
                <?php
                    }
                }
                ?>

    </table>