<?php
session_start();
include "../koneksi.php";

$idpetugas = $_POST['idpetugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

$query = "UPDATE tb_petugas SET username='{$username}', password='{$password}', nama='{$nama}', telp='{$telp}', alamat='{$alamat}' WHERE idpetugas='{$idpetugas}' ";

$result = mysqli_query($koneksi, $query);

if (! $result) {
    die ("Gagal mengubah data petugas " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data petugas berhasil masuk'); location.href='../view/petugas.php';</script>";
}
?>