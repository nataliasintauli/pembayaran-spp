<?php
session_start();
include "../koneksi.php";
include "../template/header.php";
include "../template/navbar.php";
include "../template/footer.php";

// error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pembayaran SPP | Form Pembayaran</title>
    <link rel="stylesheet" href="../assets/css/transaksi.css">
</head>

<body>
    <?php
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $nis = $_GET['nis'];
    $query = "SELECT * FROM tb_siswa WHERE nis='$nis'";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($hasil);
    ?>
    <br><br><br><br><br><br>
    <h2>
        <center>
            Masukan Pembayaran
        </center>
    </h2>
    <br>

    <?php
    // mengambil data nominal
    $hasil_angkatan = mysqli_query($koneksi, "SELECT * from tb_siswa INNER JOIN tb_spp USING(angkatan) WHERE nis='$nis'");
    $data_angkatan = mysqli_fetch_assoc($hasil_angkatan);
    ?>
    <center>
    <form action="proses-bayar.php" method="POST" class="formbayar">
        <label>NIS :</label><br>
        <input type="text" name="nis" readonly value="<?= $nis ?>">
        <br><br>

        <label>Nama Siswa :</label><br>
        <input type="text" name="nama" readonly value="<?= $data_angkatan['nama']; ?>">
        <br><br>

        <label>Tahun :</label><br>
        <input type="text" name="tahun" readonly value="<?= $tahun ?>">
        <br><br>

        <label>Tanggal bayar :</label><br>
        <input type="date" nama="tglbayar" readonly value="<?= date('Y-m-d') ?>">
        <br><br>

        <label>Bulan Yang Akan di Bayarkan :</label><br>
        <td><input type="text" name="bulan" readonly value="<?= $bulan ?>">
        <br><br>

        <label>Angkatan :</label><br>
        <input type="text" name="angkatan" readonly value="<?= $data_angkatan['angkatan'] ?>">
        <br><br>

        <label>Jumlah Yang Dibayarkan :</label><br>
        <input type="text" name="jumlah" readonly value="<?= $data_angkatan['biaya'] ?>">
        <br><br>

        <a href="../view/transaksi.php?nis=<?= $nis ?>">BATAL</a>
        <button class="btn-byr" type="submit">Bayar</button>

    </form>
    </center>
</body>

</html>