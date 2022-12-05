<?php 
// koneksi database
include '../../koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_GET['id'];
$kode = $_GET['kode'];
$qty = $_GET['qty'];
 
// update data ke database
mysqli_query($koneksi,"update transaksi set status='selesai' where id_transaksi='$id'");
mysqli_query($koneksi,"update produk set stok=stok-$qty where kode_barang='$kode'");
 
// mengalihkan halaman kembali ke index.php
header("location:../kelola_transaksi.php?pesan=confirmed");
 
?>