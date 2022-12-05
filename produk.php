<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SlaluStock - Detail Produk</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">SlaluStock</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                </ul>
                <form class="d-flex">
                    <?php
                    session_start();
                    if (isset($_SESSION['username']) != "") {
                        echo "<a class='btn btn-outline-dark' href='logout.php'>
                        <i class='bi-user me-1'></i>
                        Logout
                    </a> &nbsp; &nbsp; <a class='btn btn-outline-dark' href='profile.php'>
                    <i class='bi-user me-1'></i>
                    Profile
                </a>";
                    } else {
                        echo "<a class='btn btn-outline-dark' href='login_user.php'>
                        <i class='bi-user me-1'></i>
                        Login
                    </a>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </nav>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <?php
            $kode = $_GET['kode'];
            include 'koneksi.php';
            $data = mysqli_query($koneksi, "select * from produk where kode_barang = '$kode'");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="admin/aksi/gambar/<?php echo $d['gambar']; ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">Kode: <?php echo $d['kode_barang']; ?></div>
                        <h1 class="display-5 fw-bolder"><?php echo $d['nama_barang']; ?></h1>
                        <div class="fs-5 mb-5">
                            <span>Rp.<?php echo $d['harga']; ?></span>
                        </div>
                        <p class="lead"><?php echo $d['deskripsi_barang']; ?></p>
                        <div class="d-flex">
                            <form method="get" action="payment.php">
                            <label for="" class="form-label">Quantity</label>
                            <input type="hidden" name="kode" value="<?php echo $d['kode_barang']; ?>">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" name="qty" value="1" style="max-width: 3rem" />
                            <br>
                            <?php 
                                if(isset($_SESSION['username']) != ""){
                                    echo "<input type='submit' value='Beli Sekarang' class='btn btn-outline-dark flex-shrink-0'>
                                    ";
                                } else {
                                    echo "<a class='btn btn-outline-dark flex-shrink-0' type='button' href='login_user.php'>
                                    <i class='bi-cart-fill me-1'></i>
                                    Beli Sekarang
                                </a>";
                                }
                            ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Produk Terbaru</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
                $data = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY kode_barang DESC LIMIT 4");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <img class="card-img-top" src="admin/aksi/gambar/<?php echo $d['gambar']; ?>" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo $d['nama_barang']; ?></h5>
                                    Rp.<?php echo $d['harga']; ?>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="produk.php?kode=<?php echo $d['kode_barang']; ?>">Beli</a></div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>