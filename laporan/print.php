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
    <title>CETAK LAPORAN | SPP</title>
    <link rel="stylesheet" href="../assets/css/print.css">
</head>

<body>
    <?php
    $tanggal_mulai = $_GET['tanggal_mulai'];
    $tanggal_selesai = $_GET['tanggal_selesai'];

    ?>
    <h2 class="kop">LAPORAN PEMBAYARAN SPP</h2>
    <hr>
    <p>Tanggal <?php echo $tanggal_mulai; ?> s/d <?php echo $tanggal_selesai; ?></p>
    <table border=" 1" width="60%" align="center" class="table">
        <tr>
            <th>ID</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tanggal Bayar</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Jumlah</th>
        </tr>

        <?php
        $pembayaran = mysqli_query($koneksi, "SELECT * FROM tb_transaksi INNER JOIN tb_siswa ON tb_transaksi.nis=tb_siswa.nis WHERE tglbayar BETWEEN '$_GET[tanggal_mulai]' AND '$_GET[tanggal_selesai]' ORDER BY idtransaksi ASC");
        $i = 1;
        $total = 0;
        while ($data = mysqli_fetch_assoc($pembayaran)) {
        ?>

        <tr>
            <td><?= $i; ?></td>
            <td><?= $data['nis']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['tglbayar']; ?></td>
            <td><?= $data['bulan']; ?></td>
            <td><?= $data['tahun']; ?></td>
            <td><?= $data['jumlah']; ?></td>
        </tr>
        <?php
            $i++;
            $total += $data['jumlah'];
        }
        ?>
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