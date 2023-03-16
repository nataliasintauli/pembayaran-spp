<?php
session_start();
include "../koneksi.php";
include "../template/navbar.php";

$bulan = $_GET['bulan'];
$kelas = $_GET['kelas'];
$tahun = $_GET['tahun'];
$query = "SELECT * FROM tb_siswa WHERE kelas='$kelas'";
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN KELAS | SPP</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/table.css">
</head>
<body>
<br><br><br><br><br><br><br><br>
<center>
        <a class="btn-print" href="../laporan/printkelas.php?kelas=<?= $kelas; ?>&bulan=<?= $bulan ?>&tahun=<?= $tahun ?>">
            Cetak
        </a>
    </center>
    <br>
    <table border="1px solid" align="center" class="table">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Tanggal Bayar</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Status</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $hasil = mysqli_query($koneksi,$query);
            while($row = mysqli_fetch_assoc($hasil)){
                $nis_siswa = $row['nis'];
                $hasil_bulan = mysqli_query($koneksi, "SELECT tglbayar, jumlah FROM tb_transaksi INNER JOIN tb_siswa USING(nis) WHERE nis='$nis_siswa' AND bulan='$bulan'");
                $row_bulan = mysqli_fetch_assoc($hasil_bulan);
            ?>
            <tr>
                <td><?=$row['nis']?></td>
                <td><?=$row['nama']?></td>
                <td>
                    <?php
                    if(@$row_bulan){
                    echo $row_bulan['tglbayar'];
                } else {
                    echo "-";
                }
                    ?>
                </td>
                <td><?=$bulan?></td>
                <td><?=$tahun?></td>
                <td>
                    <?php
                    if(@$row_bulan){
                        echo "Lunas";
                    } else {
                        echo "Belum Lunas";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if(@$row_bulan){
                    echo $row_bulan['jumlah'];
                    } else {
                        echo "0";
                    }
                    ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>