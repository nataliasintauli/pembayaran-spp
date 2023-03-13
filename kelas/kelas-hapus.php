<?php
session_start();
include "../koneksi.php";

$id = $_GET['kelas'];

$query = "DELETE FROM tb_kelas WHERE kelas='{$id}'";

$result = mysqli_query($koneksi, $query);

if (! $result) {
    die("Gagal menghapus" . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data Didelete'); location.href='../view/kelas.php';</script>";
}
 
?>