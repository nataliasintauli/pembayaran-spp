<?php
session_start();
require "../koneksi.php";

$bulan = $_GET['bulan'];
$kelas = $_GET['kelas'];
$query = "SELECT * FROM tb_siswa WHERE kelas='$kelas'";
$query = "SELECT * FROM tb_siswa WHERE kelas='$kelas'";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/print.css">
</head>

<body>
    <h2 class="kop">LAPORAN PEMBAYARAN SPP</h2>
    <hr>
    <p>Kelas : <?php echo $kelas; ?></p>
    <p>Bulan : <?php echo $bulan; ?></p>
    <table border=" 1" width="60%" align="center" class="table">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Tanggal Bayar</th>
                <th>Bulan</th>
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
                    echo "";
                }
                    ?>
                </td>
                <td><?=$bulan?></td>
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
    <div class="ttd">
        <p><?php echo $_SESSION['username']; ?>, <?php echo date('Y-m-d'); ?> <br> Operator</p>
        <br>
        <hr>
    </div>

    <script>
    window.print();
    </script>

</body>
</html>