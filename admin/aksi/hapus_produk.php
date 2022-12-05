<?php 
// koneksi database
include '../../koneksi.php';
 
// menangkap data id yang di kirim dari url
$kode = $_GET['kode'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from produk where kode_barang='$kode'");
 
// mengalihkan halaman kembali ke index.php
header("location:../kelola_produk.php?pesan=deleted");
 
?>