<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];

// menginput data ke database
mysqli_query($koneksi,"insert into user values('$username','$password','$nama', '$nohp', '$alamat')");

// mengalihkan halaman kembali ke index.php
header("location:login_user.php");

?>