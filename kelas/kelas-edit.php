<?php
session_start();
include "../koneksi.php";
include "../template/header.php";
include "../template/navbar.php";
include "../template/footer.php";
include "../koneksi.php";

$id = $_GET['kelas'];

$query = "SELECT * FROM tb_kelas WHERE kelas='{$id}'";

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
    <h1>Edit Data SPP</h1>
    <form action="proses-kelas-edit.php" method="POST">
        <label>Nama Kelas :</label><br>
        <input type="text" name="kelas" value="<?php echo $data['kelas'] ?>"><br><br>
        <label>Jurusan :</label><br>
        <input type="text" name="jurusan" value="<?php echo $data['jurusan'] ?>"><br><br>
        <button class="btn first" type="submit">Kirim</button>
    </form>
</center>

<?php
} ?>