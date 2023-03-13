<?php
session_start();
include "../koneksi.php";

$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

// $query = "UPDATE tb_kelas SET kelas='{$kelas}', jurusan='{$jurusan}' WHERE kelas='{$kelas}'";
$query = "UPDATE tb_kelas SET kelas='$kelas', jurusan='$jurusan' WHERE kelas='$kelas'";

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die ("Gagal mengubah data kelas " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data kelas berhasil masuk'); location.href='../view/kelas.php';</script>";
}
?>