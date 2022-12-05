<?php 
// koneksi database
include '../../koneksi.php';
 
// menangkap data yang di kirim dari form
$kode = $_GET['kode'];
$nama = $_GET['nama'];
$harga = $_GET['harga'];
$deskripsi = $_GET['deskripsi'];
$stok = $_GET['stok'];
 
// update data ke database
mysqli_query($koneksi,"update produk set nama_barang='$nama', harga='$harga', deskripsi_barang='$deskripsi', stok='$stok' where kode_barang='$kode'");
 
// mengalihkan halaman kembali ke index.php
header("location:../kelola_produk.php?alert=edited");
 
?>