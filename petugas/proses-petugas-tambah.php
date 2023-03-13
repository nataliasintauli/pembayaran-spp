<?php
session_start();
include "../koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

$query = "INSERT INTO tb_petugas VALUES ('', '{$username}', '{$password}', '{$nama}', '{$telp}', '{$alamat}')";



$result = mysqli_query($koneksi, $query);

if(! $result) {
    die ("Gagal memasukan data petugas" . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data petugas berhasil masuk'); location.href='../view/petugas.php';</script>";
}

?>