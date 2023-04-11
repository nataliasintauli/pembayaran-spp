<?php
session_start();
require "../koneksi.php";

$idpetugas = $_SESSION['idpetugas'];
$nis = $_POST['nis'];
$tglbayar = date("Y-m-d");
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$jumlah = $_POST['jumlah'];
$ket = "Lunas";
$angkatan = $_POST['angkatan'];

$hasil = mysqli_query($koneksi, "INSERT INTO tb_transaksi (idpetugas,nis,tglbayar,bulan,tahun,ket,jumlah,angkatan) 
VALUES ('$idpetugas','$nis','$tglbayar','$bulan','$tahun','$ket','$jumlah','$angkatan')");

if (!$hasil) {
    echo "<script>alert('Masukkan Data dengan benar'); location.href='transaksi-bayar.php'</script>";
} else {
    echo "<script>location.href='../view/transaksi.php?nis=$nis'</script>";
}