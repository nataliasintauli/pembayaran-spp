<?php
session_start();
include "../koneksi.php";

$angkatan = $_POST['angkatan'];
$biaya = $_POST['biaya'];

$query = "INSERT INTO tb_spp VALUES ('{$angkatan}', '{$biaya}')";

$result = mysqli_query($koneksi, $query);

if (! $result) {
    die ("Gagal memasukkan data spp " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data spp berhasil masuk'); location.href='../view/spp.php';</script>";
}
?>