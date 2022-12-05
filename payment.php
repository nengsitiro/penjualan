<?php
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



    <!-- Bootstrap core CSS -->
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Detail Pembayaran</h2>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <?php
                    session_start();
                    $kode = $_GET['kode'];
                    $qty = $_GET['qty'];
                    $data = mysqli_query($koneksi, "select * from produk where kode_barang = '$kode'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Barang</span>
                            <span class="badge bg-primary rounded-pill">1</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0"><?php echo $d['nama_barang']; ?> (QTY : <?php echo $qty; ?>)</h6>
                                </div>
                                <span class="text-muted">Rp<?php echo $d['harga']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (USD)</span>
                                <strong>Rp<?php echo $d['harga']; ?></strong>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Detail Pembeli</h4>
                    <form method="post" action="aksi/proses_payment.php">
                        <div class="row g-3">
                            <?php
                            $username = $_SESSION['username'];
                            $data = mysqli_query($koneksi, "select * from user where username = '$username'");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Nama</label>
                                    <input type="hidden" class="form-control" name="kode" value="<?php echo $_GET['kode']; ?>" required>
                                    <input type="hidden" class="form-control" name="username" value="<?php echo $d['username']; ?>" required>
                                    <input type="hidden" class="form-control" name="qty" value=" <?php echo $qty; ?>" required>
                                    <input type="text" class="form-control" id="firstName" value="<?php echo $d['nama']; ?>" required disabled>
                                </div>

                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">No HP</label>
                                    <input type="text" class="form-control" id="lastName" value="<?php echo $d['no_hp']; ?>" required disabled>
                                </div>

                                <div class="col-12">
                                    <label for="username" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="username" value="<?php echo $d['username']; ?>" required disabled>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" value="<?php echo $d['alamat']; ?>" required disabled>
                                </div>
                            <?php } ?>
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Metode Pembayaran</h4>

                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="metode" value="cod" type="radio" class="form-check-input" checked required>
                                <label class="form-check-label" for="credit">Cash on Delivery (COD)</label>
                            </div>
                            <div class="form-check">
                                <input id="debit" name="metode" value="ewallet" type="radio" class="form-check-input" required>
                                <label class="form-check-label" for="debit">Ewallet (OVO, DANA, LinkAja)</label>
                            </div>
                            <div class="form-check">
                                <input id="paypal" name="metode" value="bank" type="radio" class="form-check-input" required>
                                <label class="form-check-label" for="paypal">Transfer Bank</label>
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <br>


    <script src="js/scripts.js"></script>
</body>

</html>