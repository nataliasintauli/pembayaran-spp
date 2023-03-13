<?php
session_start();
include "../koneksi.php";

$id = $_GET['angkatan'];

$query = "DELETE FROM tb_spp WHERE angkatan='{$id}'";

$result = mysqli_query($koneksi, $query);

if (! $result) {
    die("Gagal menghapus" . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data Didelete'); location.href='../view/spp.php';</script>";
}
 
?>