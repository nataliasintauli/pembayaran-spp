<?php

include "../koneksi.php";
include "../template/header.php";
include "../template/navbar.php";
include "../template/footer.php";
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi SPP</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/transaksi.css">

</head>

<body>
    <div class="container">
        <div class="page-header">
            <br><br><br><br><br><br>
            <h2>
                <center>CARI SISWA BERDASARKAN NIS</center>
            </h2>
        </div>
        <form action="" method="get">
            <table class="find" align="center">
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td>
                        <input class="form-control" type="text" name="nis">
                    </td>
                    <td>
                        <button class="btn first" type="submit" name="cari">Cari</button>
                    </td>
                </tr>

            </table>
        </form>
        <?php
        if (isset($_GET['nis']) && $_GET['nis'] != '') {
            $data = mysqli_query($koneksi, ("SELECT * FROM tb_siswa WHERE nis = '$_GET[nis]'"));
            $dta = mysqli_fetch_assoc($data);
            $nis = $dta['nis'];

        ?>
        <div class="panel panel-info">
            <div class="panel-heading"><br>
                <h2>
                    <center> Biodata Siswa</center>
                </h2>
            </div>
            <div class="panel panel-body">
                <center>
                    <table class="biodata" align="center" width="90%" border="1">
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td><?= $dta['nis'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>:</td>
                            <td><?= $dta['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?= $dta['kelas'] ?></td>
                        </tr>
                        <tr>
                            <td>Angkatan</td>
                            <td>:</td>
                            <td><?= $dta['angkatan'] ?></td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading"><br><br>
                <h2>
                    <center>Tagihan SPP Siswa</center>
                </h2>
            </div>
            <div class="panel-body ">
                <table class="table table-bordered table-striped" align="center">
                    <tr>
                        <th>NO</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Jatuh Tempo</th>
                        <th>Keterangan</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                    <tbody>
                        <?php
                            $awaltempo = date('Y-06-d');
                            $bulanIndo = [
                                '01' => 'Januari',
                                '02' => 'Februari',
                                '03' => 'Maret',
                                '04' => 'April',
                                '05' => 'Mei',
                                '06' => 'Juni',
                                '07' => 'Juli',
                                '08' => 'Agustus',
                                '09' => 'September',
                                '10' => 'Oktober',
                                '11' => 'November',
                                '12' => 'Desember',
                            ];

                            for ($i = 1; $i < 13; $i++) {
                                $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));
                                $tahun_now = $dta['angkatan'];

                                $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))];
                                $hasil_bulan = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE bulan='$bulan'");
                                $data_bulan = mysqli_fetch_assoc($hasil_bulan);
                            ?>
                        <tr>
                            <td> <?= $i; ?> </td>
                            <td> <?= $bulan; ?></td>

                            <?php

                                    if ($i < 7) {
                                    ?>
                            <td>
                                <?php
                                            $tahun_bayar = $tahun_now;
                                            echo $tahun_bayar;
                                            ?>
                            </td>
                            <?php
                                    } else {
                                    ?>
                            <td>
                                <?php
                                            $tahun_bayar = $tahun_now + 1;
                                            echo $tahun_bayar;
                                            ?>
                            </td>

                            <?php }
                                    ?>
                            <td>10-<?= $bulanIndo[date('m', strtotime($jatuhtempo))]; ?></td>
                            <td><?= $data_bulan['ket']; ?></td>
                            <td><?= $data_bulan['tglbayar']; ?></td>
                            <td>
                                <?php
                                        if (isset($data_bulan)) {
                                        ?>
                                Rp. <?= number_format($data_bulan['jumlah'], 0, ',', '.'); ?>
                                <?php
                                        } else {
                                        }

                                        ?>
                            </td>
                            <td>
                                <?php

                                        echo $cek_bulan = mysqli_num_rows($hasil_bulan);
                                        if (!$cek_bulan > 0) {

                                        ?>
                                <input type="submit" value="SIMPAN">
                                <a class="btn"
                                    href="../transaksi/pembayaran.php?bulan=<?= $bulan ?>&nis=<?= $row['nis'] ?>&tahun=<?= $tahun_bayar; ?>">
                                    Bayar</a>

                                <?php

                                        } else {
                                        ?>
                                <a href="../transaksi/proses_pembayaran.php?id_pembayaran=<?= $data_bulan['id_pembayaran']; ?>"
                                    onclick="return confirm('Anda Yakin mau membatalkan transaksi')">Cetak</a>
                                <?php }  ?>
                            </td>
                        </tr>
                        <!-- Penutup Perulangan -->
                        <!-- <?php
                                    }
                                        ?> -->
                        </form>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Penutup Isset  -->
        <?php }
        ?>

    </div>
</body>

</html>