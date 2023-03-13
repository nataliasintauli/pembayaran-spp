<?php
session_start();
include "../koneksi.php";
include "../template/header.php";
include "../template/navbar.php";
include "../template/footer.php";

?>
<html>

<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/table.css">
</head>

<body>

    <br><br><br><br><br><br><br>
    <h1>
        <center>Data Siswa</center>
    </h1>
    <center><a href="../siswa/siswa-tambah.php"><button class="btn first">tambah</button></a></center>
    <table border="1" width="60%" align="center" class="table">
        <tr height="40">
            <th>No.</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Kelas</th>
            <th>Angkatan</th>
            <th>No Telp</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no     = 1;
        $sql    = "SELECT * FROM tb_siswa";
        $query  = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) { ?>
        <tr>
            <td align="center"><?= $no++; ?>.</td>
            <td><?= $data['nis']; ?> </td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['username']; ?></td>
            <td><?= $data['password']; ?></td>
            <td><?= $data['kelas']; ?></td>
            <td><?= $data['angkatan']; ?></td>
            <td><?= $data['telp']; ?></td>
            <td class="aksi">
                <a href=" ../siswa/siswa-edit.php?nis=<?= $data['nis']; ?>" class="btn-edit">EDIT</a>
                <a href="../siswa/siswa-hapus.php?nis=<?= $data['nis']; ?>" class="btn-hapus">HAPUS</a>
            </td>
        </tr>
        <?php
        } ?>

    </table>
</body>

</html>