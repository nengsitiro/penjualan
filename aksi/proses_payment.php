<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$username = $_POST['username'];
$kode = $_POST['kode'];
$qty = $_POST['qty'];
$metode = $_POST['metode'];

// menginput data ke database
mysqli_query($koneksi,"insert into transaksi values('','$username','$kode', '$qty', '$metode', 'pending')");

// mengalihkan halaman kembali ke index.php
header("location:../home.php?pesan=pemesanan_sukses");

?>