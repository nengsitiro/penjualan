<?php 
        include 'template/header.php';
    ?>

                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <?php 
                                    include '../koneksi.php';

                                    $queryProduk = mysqli_query($koneksi, "SELECT COUNT(*) as produk from produk");
                                    $count1 = mysqli_fetch_array($queryProduk);
                                    $produk = $count1['produk'];

                                    $queryTransaksi = mysqli_query($koneksi, "SELECT COUNT(*) as transaksi from transaksi");
                                    $count2 = mysqli_fetch_array($queryTransaksi);
                                    $transaksi = $count2['transaksi'];

                                ?>
                                <div class="card-body">Total Produk <br> <?php echo $produk; ?></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="kelola_produk.php">Lihat</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Total Transaksi <br>  <?php echo $transaksi; ?></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="kelola_transaksi.php">Lihat</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php 
        include 'template/footer.php';
    ?>