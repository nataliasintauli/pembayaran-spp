<?php
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/print.css">
    <title>CETAK LAPORAN | SPP</title>
</head>

<body>
    <?php
    $siswa = $koneksi->query("SELECT * FROM tb_siswa WHERE nis='$_GET[nis]' ");
    $sw = mysqli_fetch_assoc($siswa);
    ?>

    <h2 class="kop">LAPORAN PEMBAYARAN SPP</h2>
    <hr><br>
    <table>
        <tr>
            <td>Nama Siswa </td>
            <td>:</td>
            <td> <?= $sw['nama'] ?></td>
        </tr>
        <tr>
            <td>Nis </td>
            <td>:</td>
            <td> <?= $sw['nis'] ?></td>
        </tr>
        <tr>
            <td>Kelas </td>
            <td>:</td>
            <td> <?= $sw['kelas'] ?></td>
        </tr>
    </table>

    <table border=" 1" width="60%" align="center" class="table">
        <tr>
            <th>ID</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Tanggal Bayar</th>
            <th>Jumlah</th>
        </tr>
    
        <?php
        $pembayaran = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE idtransaksi ='$_GET[idtransaksi]'"); 
        $data = mysqli_fetch_assoc($pembayaran);
        $i = 1;
        $total = 0;
        ?>

        <tr>
            <td><?php echo $data['idtransaksi']; ?></td>
            <td><?php echo $data['bulan']; ?></td>
            <td><?php echo $data['tahun']; ?></td>
            <td><?php echo $data['tglbayar']; ?></td>
            <td><?php echo $data['jumlah']; ?></td>
        </tr>

    </table>

    <div class="ttd">
        <p><?php echo $_SESSION['username']; ?>, <?php echo date('Y-m-d'); ?> <br> Operator</p>
        <br>
        <hr>
    </div>


    <script>
        window.print();
    </script>

</html>