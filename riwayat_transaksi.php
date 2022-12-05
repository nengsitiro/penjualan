<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Transaksi</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>

*{margin: 0;padding: 0;-webkit-font-smoothing: antialiased;-webkit-text-shadow: rgba(0,0,0,.01) 0 0 1px;text-shadow: rgba(0,0,0,.01) 0 0 1px}body{font-family: 'Rubik', sans-serif;font-size: 14px;font-weight: 400;background: #E0E0E0;color: #000000}ul{list-style: none;margin-bottom: 0px}.button{display: inline-block;background: #0e8ce4;border-radius: 5px;height: 48px;-webkit-transition: all 200ms ease;-moz-transition: all 200ms ease;-ms-transition: all 200ms ease;-o-transition: all 200ms ease;transition: all 200ms ease}.button a{display: block;font-size: 18px;font-weight: 400;line-height: 48px;color: #FFFFFF;padding-left: 35px;padding-right: 35px}.button:hover{opacity: 0.8}.cart_section{width: 100%;padding-top: 93px;padding-bottom: 111px}.cart_title{font-size: 30px;font-weight: 500}.cart_items{margin-top: 8px}.cart_list{border: solid 1px #e8e8e8;box-shadow: 0px 1px 5px rgba(0,0,0,0.1);background-color: #fff}.cart_item{width: 100%;padding: 15px;padding-right: 46px}.cart_item_image{width: 133px;height: 133px;float: left}.cart_item_image img{max-width: 100%}.cart_item_info{width: calc(100% - 133px);float: left;padding-top: 18px}.cart_item_name{margin-left: 7.53%}.cart_item_title{font-size: 14px;font-weight: 400;color: rgba(0,0,0,0.5)}.cart_item_text{font-size: 18px;margin-top: 35px}.cart_item_text span{display: inline-block;width: 20px;height: 20px;border-radius: 50%;margin-right: 11px;-webkit-transform: translateY(4px);-moz-transform: translateY(4px);-ms-transform: translateY(4px);-o-transform: translateY(4px);transform: translateY(4px)}.cart_item_price{text-align: right}.cart_item_total{text-align: right}.order_total{width: 100%;height: 60px;margin-top: 30px;border: solid 1px #e8e8e8;box-shadow: 0px 1px 5px rgba(0,0,0,0.1);padding-right: 46px;padding-left: 15px;background-color: #fff}.order_total_title{display: inline-block;font-size: 14px;color: rgba(0,0,0,0.5);line-height: 60px}.order_total_amount{display: inline-block;font-size: 18px;font-weight: 500;margin-left: 26px;line-height: 60px}.cart_buttons{margin-top: 60px;text-align: right}.cart_button_clear{display: inline-block;border: none;font-size: 18px;font-weight: 400;line-height: 48px;color: rgba(0,0,0,0.5);background: #FFFFFF;border: solid 1px #b2b2b2;padding-left: 35px;padding-right: 35px;outline: none;cursor: pointer;margin-right: 26px}.cart_button_clear:hover{border-color: #0e8ce4;color: #0e8ce4}.cart_button_checkout{display: inline-block;border: none;font-size: 18px;font-weight: 400;line-height: 48px;color: #FFFFFF;padding-left: 35px;padding-right: 35px;outline: none;cursor: pointer;vertical-align: top}
    </style>
</head>

<body>
<div class="cart_section">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-10 offset-lg-1">
                 <div class="cart_container">
                     <div class="cart_title">Riwayat Transaksi</small></div>
                     <small>Pesanan Pending</small>
                     <div class="cart_items">
                         <ul class="cart_list">
                            <?php
                                include 'koneksi.php';
                                session_start();
                                $username = $_SESSION['username'];
                                $data = mysqli_query($koneksi, "SELECT t.id_transaksi, p.nama_barang as nama, p.gambar as gambar, p.kode_barang as kode, p.harga as harga, t.qty as qty, t.metode_pembayaran as metode, t.status as status FROM transaksi t, produk p where username = '$username' AND t.kode_barang = p.kode_barang AND t.status = 'pending' ORDER BY t.kode_barang DESC");
                                while ($d = mysqli_fetch_array($data)) {
                            ?>
                             <li class="cart_item clearfix">
                                 <div class="cart_item_image"><img src="admin/aksi/gambar/<?php echo $d['gambar']; ?>" alt=""></div>
                                 <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                     <div class="cart_item_name cart_info_col">
                                         <div class="cart_item_title">Nama Produk</div>
                                         <div class="cart_item_text"><?php echo $d['nama']; ?></div>
                                     </div>
                                     <div class="cart_item_color cart_info_col">
                                         <div class="cart_item_title">Kode Barang</div>
                                         <div class="cart_item_text"><?php echo $d['kode']; ?></div>
                                     </div>
                                     <div class="cart_item_quantity cart_info_col">
                                         <div class="cart_item_title">Quantity</div>
                                         <div class="cart_item_text"><?php echo $d['qty']; ?></div>
                                     </div>
                                     <div class="cart_item_price cart_info_col">
                                         <div class="cart_item_title">Harga</div>
                                         <div class="cart_item_text">Rp<?php echo $d['harga']; ?></div>
                                     </div>
                                     <div class="cart_item_total cart_info_col">
                                         <div class="cart_item_title">Metode Pembayaran</div>
                                         <div class="cart_item_text"><?php echo $d['metode']; ?></div>
                                     </div>
                                     <div class="cart_item_total cart_info_col">
                                         <div class="cart_item_title">Status</div>
                                         <div class="cart_item_text"><?php echo $d['status']; ?></div>
                                     </div>
                                     <div class="cart_item_total cart_info_col">
                                         <div class="cart_item_title">Aksi</div>
                                         <div class="cart_item_text"><a href="aksi/batalkan_pesanan.php?id=<?php echo $d['id_transaksi']; ?>" onclick="return confirm('Yakin ingin membatalkan pesanan?')" class="btn btn-danger">Batalkan Pesanan</a></div>
                                     </div>
                                 </div>
                             </li>
                             <?php } ?>
                         </ul>
                     </div>
                     <small>Pesanan Selesai</small>
                     <div class="cart_items">
                         <ul class="cart_list">
                            <?php
                                include 'koneksi.php';
                                $username = $_SESSION['username'];
                                $data = mysqli_query($koneksi, "SELECT p.nama_barang as nama, p.gambar as gambar, p.kode_barang as kode, p.harga as harga, t.qty as qty, t.metode_pembayaran as metode, t.status as status FROM transaksi t, produk p where username = '$username' AND t.kode_barang = p.kode_barang AND t.status = 'selesai' ORDER BY t.kode_barang DESC");
                                while ($d = mysqli_fetch_array($data)) {
                            ?>
                             <li class="cart_item clearfix">
                                 <div class="cart_item_image"><img src="admin/aksi/gambar/<?php echo $d['gambar']; ?>" alt=""></div>
                                 <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                     <div class="cart_item_name cart_info_col">
                                         <div class="cart_item_title">Nama Produk</div>
                                         <div class="cart_item_text"><?php echo $d['nama']; ?></div>
                                     </div>
                                     <div class="cart_item_color cart_info_col">
                                         <div class="cart_item_title">Kode Barang</div>
                                         <div class="cart_item_text"><?php echo $d['kode']; ?></div>
                                     </div>
                                     <div class="cart_item_quantity cart_info_col">
                                         <div class="cart_item_title">Quantity</div>
                                         <div class="cart_item_text"><?php echo $d['qty']; ?></div>
                                     </div>
                                     <div class="cart_item_price cart_info_col">
                                         <div class="cart_item_title">Harga</div>
                                         <div class="cart_item_text">Rp<?php echo $d['harga']; ?></div>
                                     </div>
                                     <div class="cart_item_total cart_info_col">
                                         <div class="cart_item_title">Metode Pembayaran</div>
                                         <div class="cart_item_text"><?php echo $d['metode']; ?></div>
                                     </div>
                                     <div class="cart_item_total cart_info_col">
                                         <div class="cart_item_title">Status</div>
                                         <div class="cart_item_text"><?php echo $d['status']; ?></div>
                                     </div>
                                 </div>
                             </li>
                             <?php } ?>
                         </ul>
                     </div>
                     <div class="cart_buttons"> <a href="home.php"><button type="button" class="btn btn-secondary">Kembali ke Katalog</button></a> </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>