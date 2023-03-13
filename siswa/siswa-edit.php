<?php
session_start();
include "../koneksi.php";
include "../template/header.php";
include "../template/navbar.php";
include "../template/footer.php";
include "../koneksi.php";

$id = $_GET['nis'];

$query = "SELECT * FROM tb_siswa WHERE nis='{$id}'";

$result = mysqli_query($koneksi, $query);

while ($data = mysqli_fetch_assoc($result))
 {

?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<br><br><br><br><br><br>
<center>
    <h1>Edit Data Siswa</h1>
    <form action="proses-siswa-edit.php" method="POST">
        <input type="hidden" name="nis" value="<?= $id ?>">
        <label>Nama :</label><br>
        <input type="text" name="nama" value="<?php echo $data['nama'] ?>"><br><br>
        <label>Username :</label><br>
        <input type="text" name="username" value="<?php echo $data['username'] ?>"><br><br>
        <label>Password :</label><br>
        <input type="text" name="password" value="<?php echo $data['password'] ?>"><br><br>
        <label>No Telp :</label><br>
        <input type="text" name="telp" value="<?php echo $data['telp'] ?>"><br><br>

        <label>kelas :</label><br>
        <?php 
    include "../koneksi.php";
    $query = "SELECT * FROM tb_kelas";
    $result = mysqli_query($koneksi, $query);
    ?>

        <select class="costum-select" name="kelas">
            <option selected>--Kelas--</option>
            <?php while ($data = mysqli_fetch_assoc($result)) : ?>
            <?php if ($data['kelas'] == $data['kelas']) : ?>
            <option selected value="<?= $data['kelas']?>"><?= $data['kelas']?></option>
            <?php else : ?>
            <option value="<?= $data['kelas'] ?>"><?= $data['kelas'] ?></option>
            <?php endif ?>
            <?php endwhile ?>
        </select> <br> <br>

        <label>Angkatan :</label><br>
        <?php 
    include "../koneksi.php";
    $query = "SELECT * FROM tb_spp";
    $result = mysqli_query($koneksi, $query);
    ?>

        <select class="costum-select" name="angkatan">
            <option selected>--Angkatan--</option>
            <?php while ($data = mysqli_fetch_assoc($result)) : ?>
            <?php if ($data['angkatan'] == $data['angkatan']) : ?>
            <option selected value="<?= $data['angkatan']?>"><?= $data['angkatan']?></option>
            <?php else : ?>
            <option value="<?= $data['angkatan'] ?>"><?= $data['angkatan'] ?></option>
            <?php endif ?>
            <?php endwhile ?>
        </select> <br> <br>

        <button class="btn first" type="submit">Kirim</button>
    </form>
</center>

<?php } ?>