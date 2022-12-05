<?php
include 'template/header.php';
?>

<h4 class="mt-4 mb-5">List Transaksi</h4>

<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "canceled"){
			echo "<div class='alert alert-success' role='alert'>
            Pesanan berhasil dibatalkan!
          </div>";
		}else if($_GET['pesan'] == "confirmed"){
			echo "<div class='alert alert-success' role='alert'>
            Pesanan berhasil dikonfirmasi!
          </div>";
		}
	}
	?>

<h6>Transaksi Pending</h6>

<table id="datatablesSimple" class="table table-striped">
    <thead>
        <tr>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Quantity</th>
            <th>Nama Pemesan</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Metode Pembayaran</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../koneksi.php';
        $data = mysqli_query($koneksi, "SELECT t.id_transaksi as id, p.kode_barang as kode, p.nama_barang as nama_barang, p.harga as harga, t.qty as qty, p.gambar as gambar, u.nama as nama, u.alamat as alamat, u.no_hp as no_hp, t.metode_pembayaran as metode, t.status as status FROM transaksi t, user u, produk p WHERE t.kode_barang = p.kode_barang AND t.username = u.username AND t.status = 'pending'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $d['kode']; ?></td>
                <td><?php echo $d['nama_barang']; ?></td>
                <td><?php echo $d['harga']; ?></td>
                <td><img src="aksi/gambar/<?php echo $d['gambar'] ?>" width="100%"></td>
                <td><?php echo $d['qty']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <td><?php echo $d['no_hp']; ?></td>
                <td><?php echo $d['metode']; ?></td>
                <td><?php echo $d['status']; ?></td>
                <td>
                    <a class="btn btn-primary" onclick="return confirm('Yakin ingin mengkonfirmasi pesanan?')" href="aksi/konfirmasi_transaksi.php?id=<?php echo $d['id']; ?>&qty=<?php echo $d['qty']; ?>&kode=<?php echo $d['kode']; ?>">Konfirmasi</a> <br> <br>
                    <a class="btn btn-danger" onclick="return confirm('Yakin ingin membatalkan pesanan?')" href="aksi/batalkan_transaksi.php?id=<?php echo $d['id']; ?>">Batalkan</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<h6 class="mt-5">Transaksi Selesai</h6>
<table id="datatablesSimple2" class="table table-striped">
    <thead>
        <tr>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Quantity</th>
            <th>Nama Pemesan</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Metode Pembayaran</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../koneksi.php';
        $data = mysqli_query($koneksi, "SELECT t.id_transaksi as id, p.kode_barang as kode, p.nama_barang as nama_barang, p.harga as harga, t.qty as qty, p.gambar as gambar, u.nama as nama, u.alamat as alamat, u.no_hp as no_hp, t.metode_pembayaran as metode, t.status as status FROM transaksi t, user u, produk p WHERE t.kode_barang = p.kode_barang AND t.username = u.username AND t.status = 'selesai'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $d['kode']; ?></td>
                <td><?php echo $d['nama_barang']; ?></td>
                <td><?php echo $d['harga']; ?></td>
                <td><img src="aksi/gambar/<?php echo $d['gambar'] ?>" width="100%"></td>
                <td><?php echo $d['qty']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <td><?php echo $d['no_hp']; ?></td>
                <td><?php echo $d['metode']; ?></td>
                <td><?php echo $d['status']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
include 'template/footer.php';
?>