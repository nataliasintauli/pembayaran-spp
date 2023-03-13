<?php
session_start();
include "../koneksi.php";

$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

$query = "INSERT INTO tb_kelas VALUES ('{$kelas}', '{$jurusan}')";

$result = mysqli_query($koneksi, $query);

if (! $result) {
    die ("Gagal memasukkan data kelas " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data kelas berhasil masuk'); location.href='../view/kelas.php';</script>";
}
?>