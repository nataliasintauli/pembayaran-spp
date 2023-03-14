<?php
session_start();
include "../koneksi.php";
include "../template/navbar.php";

$id = $_GET['angkatan'];

$query = "SELECT * FROM tb_spp WHERE angkatan='{$id}'";

$result = mysqli_query($koneksi, $query);

while ($data = mysqli_fetch_assoc($result)) {

?>

<html>

<head>
    <title>EDIT DATA SPP | SPP</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<br><br><br><br><br><br>
<center>
    <h1>Edit Data SPP</h1>
    <form action="proses-spp-edit.php" method="POST">
        <label>Angkatan :</label><br>
        <input type="text" name="angkatan" value="<?php echo $data['angkatan'] ?>"><br><br>
        <label>Biaya :</label><br>
        <input type="text" name="biaya" value="<?php echo $data['biaya'] ?>"><br><br>
        <button class="btn first" type="submit">Kirim</button>
    </form>
</center>
<?php } ?>