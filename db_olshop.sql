-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2022 at 03:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_olshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_kategori`, `harga`, `berat`, `deskripsi`, `foto`) VALUES
(1, 'Men Project Rock Iso Chill Sleeveless', 1, 1059000, 500, 'Project Rock training gear was built to help you find boundaries, then push right through them. Everything in this collection was personally approved by Dwayne Johnson, the hardest worker in the room. ANY room.', 'a.PNG'),
(6, 'Women Project Rock Printed Hoodie', 3, 1299000, 600, 'Project Rock training gear was built to help you find boundaries, then push right through them. Everything in this collection was personally approved by Dwayne Johnson, the hardest worker in the room. ANY room.', 'b.PNG'),
(8, 'Men UA Project Rock 4 Camo Training Shoes', 4, 2499000, 800, 'Project Rock training gear was built to help you find boundaries, then push right through them. Everything in this collection was personally approved by Dwayne Johnson, the hardest worker in the room. ANY room.', 'c.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `ket` text DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gambar`
--

INSERT INTO `tbl_gambar` (`id_gambar`, `id_barang`, `ket`, `gambar`) VALUES
(13, 1, 'Gambar 1', 'a1.PNG'),
(14, 1, 'Gambar 2', 'a2.PNG'),
(15, 1, 'Gambar 3', 'a3.PNG'),
(16, 6, 'Gambar 1', 'b1.PNG'),
(17, 6, 'Gambar 2', 'b2.PNG'),
(18, 6, 'Gambar 3', 'b3.PNG'),
(19, 8, 'Gambar 1', 'c1.PNG'),
(20, 8, 'Gambar 2', 'c2.PNG'),
(21, 8, 'Gambar 3', 'c3.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pakaian Pria'),
(3, 'Pakaian Wanita'),
(4, 'Sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `foto`) VALUES
(1, 'amar', 'amar@gmail.com', '5783f96d3d8414f233b6e905c7749a07', 'z.jpg'),
(3, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(4, 'test', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BCA', '9865324689', 'Toko Online (BCA)'),
(2, 'BNI', '9635467815', 'Toko Online (BNI)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rinci_transaksi`
--

CREATE TABLE `tbl_rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(25) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rinci_transaksi`
--

INSERT INTO `tbl_rinci_transaksi` (`id_rinci`, `no_order`, `id_barang`, `qty`) VALUES
(1, '20220307STOIZBFU', 8, 3),
(2, '20220307RCDXAH6V', 8, 1),
(3, '20220307BKUG5IFW', 1, 1),
(4, '20220307I8K5MCJW', 6, 1),
(5, '20220307VU4MP3ZM', 8, NULL),
(6, '20220307OEPHR97A', 1, 3),
(7, '20220314XLWUQBVS', 1, 1),
(8, '20220314O9ASTTGP', 8, 1),
(9, '20220314ZSH7SDUM', 8, 1),
(10, '20220331TJBQIYO5', 8, 2),
(11, '20220331FEKPXOY2', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(100) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telp`) VALUES
(1, 'Toko Amar', 455, 'Pakulonan Barat', '085778304590');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(25) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(25) DEFAULT NULL,
  `hp_penerima` varchar(15) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(8) DEFAULT NULL,
  `expedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pelanggan`, `no_order`, `tgl_order`, `nama_penerima`, `hp_penerima`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`) VALUES
(1, 1, '20220307DIP6USEF', '2022-03-07', 'Amar', '085778304590', 'Banten', 'Tangerang', 'Gading Serpong', '15810', 'jne', 'CTC', '1-2 Hari', 18000, 1900, NULL, 4875000, 1, '1.PNG', 'amar', 'BCA', '9865324689', 3, 'TNG12345'),
(2, 1, '20220307STOIZBFU', '2022-03-07', 'test', '999', 'Bengkulu', 'Bengkulu Selatan', 'test', '9999', 'jne', 'OKE', '3-6 Hari', 160000, 4100, NULL, 11314000, 1, '2.PNG', 'Umar', 'BNI', '9635467815', 1, NULL),
(3, 1, '20220307RCDXAH6V', '2022-03-07', 'testing', '999999999999', 'Lampung', 'Tulang Bawang', 'testing', '9999', 'tiki', 'ECO', '5 Hari', 48000, 1300, NULL, 3606000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(4, 1, '20220307BKUG5IFW', '2022-03-07', 'tester', '79797', 'Kalimantan Barat', 'Pontianak', 'tester', '87979', 'pos', 'Paket Kilat Khusus', '4 HARI Hari', 37000, 500, NULL, 1096000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(5, 1, '20220307I8K5MCJW', '2022-03-07', 'a', '9', 'DI Yogyakarta', 'Kulon Progo', 'a', '9', 'jne', 'REG', '2-3 Hari', 22000, 1100, NULL, 2380000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(6, 1, '20220307VU4MP3ZM', '2022-03-07', 'b', '0', 'Jambi', 'Kerinci', 'b', '0', 'jne', 'REG', '2-3 Hari', 78000, 1900, NULL, 4935000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(7, 1, '20220307OEPHR97A', '2022-03-07', 'c', '7', 'Jambi', 'Sungaipenuh', 'c', '7', 'tiki', 'REG', '3 Hari', 110000, 1500, NULL, 3287000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(10, 3, '20220314ZSH7SDUM', '2022-03-14', 'Test', '123', 'Banten', 'Lebak', 'Test', '123', 'tiki', 'REG', '3 Hari', 20000, 800, NULL, 2519000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(11, 1, '20220331TJBQIYO5', '2022-03-31', 'Amar', '085778304590', 'Banten', 'Tangerang', 'Tangerang', '12345', 'jne', 'CTC', '1-2 Hari', 18000, 1600, NULL, 5016000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(12, 3, '20220331FEKPXOY2', '2022-03-31', 'Umar', '085693350822', 'Banten', 'Tangerang Selatan', 'BSD', '789456', 'tiki', 'ECO', '4 Hari', 8000, 1100, NULL, 2366000, 0, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2'),
(3, 'Amar', 'amar', '21232f297a57a5a743894a0e4a801fc3', '1'),
(5, 'amer', 'amer', '5783f96d3d8414f233b6e905c7749a07', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
