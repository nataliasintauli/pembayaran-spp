<?php
session_start();
include "../koneksi.php";

 $nis=$_POST['nis'];
 $nama = $_POST['nama'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 $telp = $_POST['telp'];
 $kelas = $_POST['kelas'];
 $angkatan = $_POST['angkatan'];

 $query = "UPDATE tb_siswa SET nama='{$nama}', username='{$username}', password='{$password}', kelas='{$kelas}', angkatan='{$angkatan}',  telp='{$telp}' WHERE nis='{$nis}' ";

 $result = mysqli_query($koneksi, $query);
 
 if (! $result) {
     die ("Gagal mengubah data siswa " . mysqli_error($koneksi));
 } else {
     echo "<script>alert('Data siswa berhasil masuk'); location.href='../view/siswa.php';</script>";
 }
 ?>