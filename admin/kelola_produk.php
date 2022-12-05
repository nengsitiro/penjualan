<?php
include 'template/header.php';
?>

<h4 class="mt-4">Kelola Produk</h4>
<?php
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == 'gagal_ekstensi') {
?>
        <div class="alert alert-warning alert-dismissible">
            <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
            Ekstensi Tidak Diperbolehkan
        </div>
    <?php
    } elseif ($_GET['alert'] == "gagal_ukuran") {
    ?>
        <div class="alert alert-warning alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Peringatan !</h4>
            Ukuran Gambar terlalu Besar
        </div>
    <?php
    } elseif ($_GET['alert'] == "berhasil") {
    ?>
        <div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Success</h4>
            Berhasil Disimpan
        </div>
    <?php
    } elseif ($_GET['alert'] == "edited") {
    ?>
        <div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Success</h4>
            Berhasil Diubah
        </div>
<?php
    }
}
?>
<div class="row">
    <div class="col-lg-5">
        <form action="aksi/tambah_produk.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <input type="text" class="form-control" name="kode" id="exampleFormControlInput1" placeholder="Kode Barang" required>
            </div>
            <div class="mb-3 mt-3">
                <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" placeholder="Nama Barang" required>
            </div>
            <div class="mb-3 mt-3">
                <input type="number" class="form-control" name="harga" id="exampleFormControlInput1" placeholder="Harga" required>
            </div>
            <div class="mb-3 mt-3">
                <input type="text" class="form-control" name="deskripsi" id="exampleFormControlInput1" placeholder="Deskripsi Barang" required>
            </div>
            <div class="mb-3 mt-3">
                <input type="number" class="form-control" name="stok" id="exampleFormControlInput1" placeholder="Stok" required>
            </div>
            <div class="mb-3">
                <input class="form-control" name="foto" type="file" id="formFile" required>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
    </div>
    <div class="col-lg-7">
        <table class="table table-striped">
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Stok</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../koneksi.php';
            $data = mysqli_query($koneksi, "select * from produk");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?php echo $d['kode_barang']; ?></td>
                    <td><?php echo $d['nama_barang']; ?></td>
                    <td>Rp<?php echo $d['harga']; ?></td>
                    <td><?php echo $d['deskripsi_barang']; ?></td>
                    <td><?php echo $d['stok']; ?></td>
                    <td><img src="aksi/gambar/<?php echo $d['gambar'] ?>" width="100%"></td>
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $d['kode_barang']; ?>">
                            Edit
                        </button> <br> <br>
                        <a href="aksi/hapus_produk.php?kode=<?php echo $d['kode_barang']; ?>" onclick="return confirm('Yakin ingin menghapus produk?')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <!-- Modal Edit Mahasiswa-->
                <div class="modal fade" id="myModal<?php echo $d['kode_barang']; ?>" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data Produk</h4>
                            </div>
                            <div class="modal-body">
                                <form action="aksi/edit_produk.php" method="get">
                                    <?php
                                    $kode = $d['kode_barang'];
                                    $query_edit = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode_barang='$kode'");
                                    while ($row = mysqli_fetch_array($query_edit)) {
                                    ?>
                                        <div class="mb-3">
                                            <input type="hidden" name="kode" value="<?php echo $kode; ?>">
                                            <label for="" class="col-form-label">Nama Produk</label>
                                            <input type="text" class="form-control" value="<?php echo $row['nama_barang'] ?>" name="nama">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="col-form-label">Harga</label>
                                            <input type="number" class="form-control" name="harga" value="<?php echo $row['harga'] ?>" id="exampleFormControlInput1" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="col-form-label">Deskripsi</label>
                                            <input type="text" class="form-control" name="deskripsi" value="<?php echo $row['deskripsi_barang'] ?>" id="exampleFormControlInput1" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="col-form-label">Stok</label>
                                            <input type="number" class="form-control" name="stok" value="<?php echo $row['stok'] ?>" id="exampleFormControlInput1" required>
                                        </div>
                                    <?php } ?>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }

            ?>
        </table>
    </div>
</div>





<?php
include 'template/footer.php';
?>