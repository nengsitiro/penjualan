-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 09:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`) VALUES
('admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` bigint(16) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `stok` bigint(16) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_barang`, `nama_barang`, `harga`, `deskripsi_barang`, `stok`, `gambar`) VALUES
('B001', 'Hoodie', 199000, 'Hoodies keren', 100, '1753445273_103894853_a72afba9-b9a1-4ab1-b97c-1165c3b629e2_628_628.jpg'),
('B002', 'Celana Jeans', 100000, 'Jeans Viral', 50, '1671622472_3200d7f4aa23901045111e0e562aab98.jpg'),
('B003', 'T-Shirt Oversized', 75000, 'T-Shirt Oversized kekinian', 79, '864493751_098052c7c4e42799e40fb53ee7ec3133_tn.jpg'),
('B004', 'Sweater 2 Warna', 50000, 'Sweater dengan 2 warna yang cantik', 100, '595266085_sweater.jpg'),
('B005', 'Kaos Polo', 65000, 'Kaos polo elegan', 30, '809880920_6540a090b797f5e6dad5de50b55b962e.jpg'),
('B006', 'Celana Chino', 35000, 'Celana chino kekinian', 50, '373352096_0f19168434d1977ad74161846459eac58c4cf7c2_xxl-1.jpg'),
('B007', 'Celana Jeans Anak', 40000, 'Celana Jeans Anak keren', 50, '1061524214_LbcAVE9rCo.jpg'),
('B008', 'Baju Koko Pria', 150000, 'Baju Koko Pria premium', 100, '595324382_Baju-Koko-Pria-Modern-Terbaik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `qty` int(16) NOT NULL,
  `metode_pembayaran` enum('cod','ewallet','bank') NOT NULL,
  `status` enum('pending','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `username`, `kode_barang`, `qty`, `metode_pembayaran`, `status`) VALUES
(1, 'user123', 'B001', 1, 'cod', 'selesai'),
(2, 'user123', 'B001', 2, 'cod', 'selesai'),
(5, 'user123', 'B003', 1, 'cod', 'selesai'),
(6, 'user123', 'B001', 1, 'cod', 'pending'),
(8, 'user123', 'B002', 1, 'cod', 'pending'),
(9, 'user123', 'B005', 1, 'ewallet', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `no_hp`, `alamat`) VALUES
('user123', '123456', 'User', '081234567890', 'Jl. Siliwangi No. 66, Tasikmalaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
