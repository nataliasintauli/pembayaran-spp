<?php
session_start();
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
    <link rel="stylesheet" href="../assets/css/table.css">
</head>

<body>
    <div class="container">
        <br><br><br><br><br><br>
        <h2>
            <center>Masukan Transaksi SPP</center>
        </h2>
        <h3>
            <center>Cari siswa berdasarkan NIS</center>
            </h4>
            <form action="" method="get">
                <table class="find" align="center">
                    <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td>
                            <input type="text" placeholder="Masukkan NIS" autocomplete="off" name="nis" list="NIS">
                            <datalist id="NIS">
                                <?php
                                $result = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?php echo $row['nis']; ?>"></option>
                                <?php
                                }
                                ?>
                            </datalist>
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
                <br>
                <h2>
                    <center> Biodata Siswa</center>
                </h2>

                <center>
                    <table class="table-al" align=" center" width="90%" border="1">
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

                <br><br>
                <h2>
                    <center>Tagihan SPP Siswa</center>
                </h2>
                <table class="table table-bordered table-striped" align="center">
                    <tr>
                        <th>NO</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Jatuh Tempo</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
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
                            $hasil_bulan = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE bulan='$bulan' AND nis='$nis'");
                            $data_bulan = mysqli_fetch_assoc($hasil_bulan);
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $bulan ?></td>
                                <td>
                                    <?php
                                    if ($i < 7) {
                                        echo $tahun_now;
                                    } else {
                                        echo $tahun_now + 1;
                                    }
                                    ?>
                                </td>
                                <td class="jatuh-tempo">
                                    10-<?= $bulanIndo[date('m', strtotime("+$i month", strtotime($awaltempo)))]; ?>
                                </td>
                                <td><?= $data_bulan['tglbayar'] ?></td>
                                <td><?= $data_bulan['jumlah'] ?></td>
                                <td><?= $data_bulan['ket'] ?></td>
                                <td>
                                    <?php
                                    $cek_bulan = mysqli_num_rows($hasil_bulan);
                                    if (!$cek_bulan > 0) {
                                    ?>
                                        <a class="btn-bayar" href="../transaksi/transaksi-bayar.php?bulan=<?= $bulan ?>&nis=<?= $nis ?>&tahun=<?= $tahun_now; ?>">
                                            Bayar</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a class="btn-cetak" href="../laporan/cetak.php?idtransaksi=<?= $data_bulan['idtransaksi']; ?>&nis=<?=$data_bulan['nis']?>">Cetak
                                        </a>
                                <?php
                                    }
                                }
                                ?>
                                </td>
                            </tr>
                            <!-- Penutup Perulangan -->
                            <!-- <?php

                                    ?> -->
                            </form>
                    </tbody>
                </table>

                <!-- Penutup Isset  -->
            <?php }
            ?>

</body>

</html>