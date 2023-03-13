<?php
session_start();
include("../koneksi.php");

$username = $_POST['username'];
$pass = $_POST['password'];

$queryadmin = mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE username='$username' AND password='$pass' AND level='admin'") or die (mysqli_error($koneksi));
$querypetugas =  mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE username='$username' AND password='$pass' AND level='petugas'") or die (mysqli_error($koneksi));
$querysiswa =  mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE username='$username' AND password='$pass'") or die (mysqli_error($koneksi));

if (mysqli_num_rows($queryadmin) > 0) 
 {
    $data = mysqli_fetch_assoc($queryadmin);
    $_SESSION['idpetugas'] = $data['idpetugas'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];
    echo "<script>alert('berhasil login');window.location = '../view/home.php';</script>";
} elseif (mysqli_num_rows($querypetugas) > 0) 
{
    $data = mysqli_fetch_assoc($querypetugas);
    $_SESSION['idpetugas'] = $data['idpetugas'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];
    echo "<script>alert('berhasil login');window.location = '../view/pembayaran.php';</script>";
} elseif (mysqli_num_rows($querysiswa) > 0 ) 
{
    $data = mysqli_fetch_assoc($querysiswa);
    $_SESSION['nis'] = $data['nis'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['level'] = 'siswa';
    echo "<script>alert('berhasil login');window.location = '../view/pembayaran.php';</script>";   
} else {
    echo "<script>alert('gagal login');window.location = 'login.php';</script>";
}
