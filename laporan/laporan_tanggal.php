<?php
session_start();
include "../koneksi.php";
include "../template/header.php";
include "../template/navbar.php";
include "../template/footer.php";

if (isset($_GET['tanggal_mulai']) && ($_GET['tanggal_selesai'])) {
    $tanggal_mulai = $_GET['tanggal_mulai'];
    $tanggal_selesai = $_GET['tanggal_selesai'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/table.css">
</head>

<body>
    <br><br><br><br><br><br><br><br>

    <center>
        <a class="btn-print" href="../laporan/print.php?tanggal_mulai=<?= $tanggal_mulai; ?>&tanggal_selesai=<?= $tanggal_selesai ?>">
            Cetak
        </a>

    </center>
    <br>
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

    
    

<?php
}
?>
</body>
</html>