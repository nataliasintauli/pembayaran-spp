<?php
session_start();
include "../koneksi.php";
include "../template/navbar.php";
?>

    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/table.css">
    <title>LAPORAN | SPP</title>


<body>
    <br><br><br><br><br>

    <h1>
        <center>Cari Transaksi</center>
    </h1>
    <br>
    <h3 class="plh"><center>Berdasarkan Tanggal :</center></h3>
    <form action="../laporan/laporan_tanggal.php" method="get">
        <table align="center">
            <td>
                Mulai Tanggal
                <input type="date" class="" name="tanggal_mulai">
            </td>
            <td>
                Sampai Tanggal
                <input type="date" class="" name="tanggal_selesai">
            </td>
            <td>
            <button type="submit" class="btn-tanggal" name="tampil">Tampilkan</button>
            </td>
        </table>
    </form>
    <br><br><br>
    <h3 class="plh"><center>Berdasarkan Kelas :</center></h3>
    <form method="get" action="../laporan/laporan_kelas.php">
        <table align="center">
            <td>
                Pilih Kelas :
                <select name="kelas" id="">
                    <?php
                    $result = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $row['kelas']; ?>"><?php echo $row['kelas']; ?></option>
                    <?php
                    }
                    ?>
                    </select>
            </td>
            <td>
                Bulan
                    <select name="bulan">
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">Spetember</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                    </select>
            </td>
            <td>
                Tahun
                    <select name="tahun">
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
            </td>

            <td>
                <button type="submit" class="btn-tanggal" name="tampil">Tampilkan</button>
            </td>
        </table>
    </form>

</body>

</html>