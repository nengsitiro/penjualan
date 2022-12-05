<?php
include '../../koneksi.php';
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
    header("location:../kelola_produk.php?alert=gagal_ekstensi");
} else {
    if ($ukuran < 1044070) {
        $xx = $rand . '_' . $filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/' . $rand . '_' . $filename);
        mysqli_query($koneksi, "INSERT INTO produk VALUES('$kode','$nama','$harga','$deskripsi','$stok', '$xx')");
        header("location:../kelola_produk.php?alert=berhasil");
    } else {
        header("location:../kelola_produk.php?alert=gagal_ukuran");
    }
}
