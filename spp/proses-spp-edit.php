<?php
session_start();
include "../koneksi.php";

$angkatan = $_POST['angkatan'];
$biaya = $_POST['biaya'];

$query = "UPDATE tb_spp SET angkatan='$angkatan', biaya='$biaya' WHERE angkatan='$angkatan'";

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die ("Gagal mengubah data spp " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data spp berhasil masuk'); location.href='../view/spp.php';</script>";
}
?>