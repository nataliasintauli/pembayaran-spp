<?php
session_start();
include "../koneksi.php";

$id = $_GET['idpetugas'];

$query = "DELETE FROM tb_petugas WHERE idpetugas='{$id}'";

$result = mysqli_query($koneksi, $query);

if (! $result) {
    die("Gagal menghapus" . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data Didelete'); location.href='../view/petugas.php';</script>";
}
 
?>