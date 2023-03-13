<?php
session_start();
include "../koneksi.php";

 $nama = $_POST['nama'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 $kelas = $_POST['kelas'];
 $angkatan = $_POST['angkatan'];
 $telp = $_POST['telp'];

 $query = "INSERT INTO tb_siswa VALUES ('', '{$nama}', '{$username}', '{$password}', '{$kelas}', '{$angkatan}', '{$telp}')";

 $result = mysqli_query($koneksi, $query);

 if (! $result) {
    die ("Gagal memasukkan data siswa " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data siswa berhasil masuk'); location.href='../view/siswa.php';</script>";
}


 ?>