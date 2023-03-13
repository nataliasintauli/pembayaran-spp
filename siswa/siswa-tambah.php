<?php
session_start();
include "../koneksi.php";
include "../template/header.php";
include "../template/navbar.php";
include "../template/footer.php";
include "../koneksi.php";
?>




    <br><br><br><br><br><br>
    <center>
        <h1>Masukan Data Siswa</h1>
        <form action="proses-siswa-tambah.php" method="POST">
            <label>Nama :</label><br>
            <input type="text" name="nama"><br><br>
            <label>Username :</label><br>
            <input type="text" name="username"><br><br>
            <label>Password :</label><br>
            <input type="text" name="password"><br><br>
            <label>No Telp :</label><br>
            <input type="text" name="telp"><br><br>
            <label>kelas :</label><br>
            <?php
        include "../koneksi.php";
        $query = "SELECT * FROM tb_kelas";
        $result = mysqli_query($koneksi, $query);
        ?>

            <select class="costum-select" name="kelas">
                <option selected>--Kelas--</option>
                <?php $i = 1;
            while ($data = mysqli_fetch_assoc($result)) : ?>
                <option value="<?= $data['kelas'] ?>"><?= $data['kelas'] ?></option>
                <?php $i++;
            endwhile ?>
            </select> <br> <br>
            <label>Angkatan :</label><br>
            <?php
        include "../koneksi.php";
        $query = "SELECT * FROM tb_spp";
        $result = mysqli_query($koneksi, $query);
        ?>

            <select class="costum-select" name="angkatan">
                <option selected>--Angkatan--</option>
                <?php $i = 1;
            while ($data = mysqli_fetch_assoc($result)) : ?>
                <option value="<?= $data['angkatan'] ?>"><?= $data['angkatan'] ?></option>
                <?php $i++;
            endwhile ?>
            </select> <br> <br>

            <button class="btn first" type="submit">Kirim</button>
        </form>
    </center>
</body>

</html>