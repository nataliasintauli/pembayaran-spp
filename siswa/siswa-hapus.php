<?php
session_start();
include "../koneksi.php";

$id = $_GET['nis'];

$query = "DELETE FROM tb_siswa WHERE nis='{$id}'";

$result = mysqli_query($koneksi, $query);

if (! $result) {
    die("Gagal menghapus" . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data Didelete'); location.href='../view/siswa.php';</script>";
}
 
?>