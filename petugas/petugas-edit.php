<?php 
session_start();
include "../koneksi.php";
include "../template/navbar.php";

$id = $_GET['idpetugas'];

$query = "SELECT * FROM tb_petugas WHERE idpetugas='{$id}'";

$result = mysqli_query($koneksi, $query);

while ($data = mysqli_fetch_assoc($result))
{

?>

<head>
<title>EDIT DATA SPP | SPP</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
</head>
<br><br><br><br><br><br>
<center>
    <h1>Edit Data Petugas</h1>
    <form action="proses-petugas-edit.php" method="POST">
        <label>Username :</label><br>
        <input type="text" name="username" value="<?php echo $data['username'] ?>"><br><br>
        <label>Password :</label><br>
        <input type="text" name="password" value="<?php echo $data['password'] ?>"><br><br>
        <label>Nama :</label><br>
        <input type="text" name="nama" value="<?php echo $data['nama'] ?>"><br><br>
        <label>Level User :</label><br>
        <select class="costum-select" name="level">
                <option selected hidden value="<?= $data['level']; ?>"><?= $data ['level']; ?></option>
                <option value="admin">admin</option>
                <option value="petugas">petugas</option>
        </select><br><br>

        <label>No Telp :</label><br>
        <input type="text" name="telp" value="<?php echo $data['telp'] ?>"><br><br>
        <label>Alamat :</label><br>
        <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>"><br><br>
        <input type="hidden" name="idpetugas" value="<?= $id ?>">
        <button class="btn first" type="submit">Kirim</button>
    </form>
</center>
<?php
} ?>