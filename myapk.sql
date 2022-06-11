-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2019 pada 05.41
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangp_sementara`
--

CREATE TABLE `barangp_sementara` (
  `id_barangp` int(11) NOT NULL,
  `kode_pembelian` varchar(8) NOT NULL,
  `nama_barangp` varchar(60) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_barangp` int(15) NOT NULL,
  `item` int(11) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_pembelian`
--

CREATE TABLE `barang_pembelian` (
  `id_barang_pembelian` int(11) NOT NULL,
  `kode_pembelian` varchar(8) NOT NULL,
  `nama_barang_beli` varchar(60) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_beli` int(15) NOT NULL,
  `item` int(11) NOT NULL,
  `total` int(15) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_pembelian`
--

INSERT INTO `barang_pembelian` (`id_barang_pembelian`, `kode_pembelian`, `nama_barang_beli`, `satuan`, `harga_beli`, `item`, `total`, `status`) VALUES
(6, 'PEM00001', 'flashdisk', 'PCS', 80000, 32, 2560000, 0),
(7, 'PEM00001', 'mouse wireless', 'PCS', 100000, 17, 1700000, 0),
(8, 'PEM00002', 'charger', 'PCS', 40000, 25, 1000000, 0),
(9, 'PEM00002', 'earphone', 'PCS', 20000, 30, 600000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_stok`
--

CREATE TABLE `data_stok` (
  `id_brg_stok` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_stok`
--

INSERT INTO `data_stok` (`id_brg_stok`, `id_brg`, `stok`) VALUES
(2, 1, 19),
(3, 2, 35),
(4, 3, 27),
(5, 4, 9),
(6, 5, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_pembelian`
--

CREATE TABLE `d_pembelian` (
  `id_d_pembelian` int(11) NOT NULL,
  `kode_pembelian` varchar(8) NOT NULL,
  `id_barang_pembelian` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_pembelian`
--

INSERT INTO `d_pembelian` (`id_d_pembelian`, `kode_pembelian`, `id_barang_pembelian`, `jumlah`, `subtotal`) VALUES
(37, 'PEM00001', 6, 32, 2560000),
(38, 'PEM00001', 7, 17, 1700000),
(39, 'PEM00002', 8, 25, 1000000),
(40, 'PEM00002', 9, 30, 600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_penjualan`
--

CREATE TABLE `d_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `kode_penjualan` varchar(8) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_penjualan`
--

INSERT INTO `d_penjualan` (`id_detail_penjualan`, `kode_penjualan`, `id_brg`, `jumlah`, `subtotal`) VALUES
(19, 'PEN00001', 2, 15, 1800000),
(20, 'PEN00001', 1, 17, 2550000),
(21, 'PEN00002', 2, 10, 1200000),
(22, 'PEN00002', 3, 14, 1120000),
(23, 'PEN00002', 4, 15, 600000),
(24, 'PEN00003', 2, 15, 1800000),
(25, 'PEN00003', 3, 10, 800000),
(26, 'PEN00003', 1, 10, 1500000),
(27, 'PEN00003', 4, 13, 520000),
(28, 'PEN00004', 1, 5, 750000),
(29, 'PEN00004', 2, 10, 1200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_stok`
--

CREATE TABLE `history_stok` (
  `id_history_stok` int(11) NOT NULL,
  `id_brg_stok` int(11) NOT NULL,
  `stok_sblm` int(11) NOT NULL,
  `stok_sesudah` int(11) NOT NULL,
  `tanggal_perubahan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history_stok`
--

INSERT INTO `history_stok` (`id_history_stok`, `id_brg_stok`, `stok_sblm`, `stok_sesudah`, `tanggal_perubahan`) VALUES
(1, 3, 20, 35, '2019-08-14'),
(2, 6, 20, 40, '2019-09-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `kode_pembelian` varchar(8) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `total_pembelian` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `kode_pembelian`, `tgl_pembelian`, `id_users`, `id_supplier`, `total_pembelian`) VALUES
(4, 'PEM00001', '2019-05-18', 1, 1, 4260000),
(5, 'PEM00002', '2019-05-19', 1, 2, 1600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_penjualan` varchar(8) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `dibayar` int(15) NOT NULL,
  `total_penjualan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kode_penjualan`, `tgl_penjualan`, `id_pelanggan`, `id_users`, `dibayar`, `total_penjualan`) VALUES
(8, 'PEN00001', '2019-05-18', 2, 1, 4400000, 4350000),
(9, 'PEN00002', '2019-05-19', 2, 1, 2950000, 2920000),
(10, 'PEN00003', '2019-05-24', 2, 1, 4700000, 4620000),
(11, 'PEN00004', '2019-07-17', 3, 1, 2000000, 1950000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_sementara`
--

CREATE TABLE `penjualan_sementara` (
  `id_penjualan_sementara` int(11) NOT NULL,
  `kode_penjualan` varchar(8) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` int(15) NOT NULL,
  `item` int(11) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(60) NOT NULL,
  `pemilik` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `pemilik`, `alamat`) VALUES
(1, 'PT. Megatama Gemilang Sakti', 'Didi', 'Jl. Daan Mogot No.3 D, RT.7/RW.4, Jelambar, Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11460');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_beli` int(15) NOT NULL,
  `harga_jual` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `harga_jual`) VALUES
(1, 'BRG00001', 'mouse wireless', 'PCS', 100000, 150000),
(2, 'BRG00002', 'flash disk', 'PCS', 80000, 120000),
(3, 'BRG00003', 'charger', 'PCS', 40000, 80000),
(4, 'BRG00004', 'earphone', 'PCS', 20000, 40000),
(5, 'BRG00005', 'blander', 'PCS', 150000, 175000),
(6, 'BRG00006', 'lampu LED 23 watt', 'PCS', 50000, 75000),
(7, 'BRG00007', 'stop kontak UTICON 5 lubang', 'PCS', 100000, 135000),
(8, 'BRG00008', 'kabel roll 15m UTICON', 'PCS', 140000, 165000),
(9, 'BRG00009', 'Obeng set toolkit 31in1', 'PCS', 25000, 45000),
(10, 'BRG00010', 'battery samsung ', 'PCS', 80000, 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(35) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `notelp`, `alamat_pelanggan`) VALUES
(2, 'toko surya elektro', '089999999998', 'grogol'),
(3, 'toko pasifik', '085555555556', 'jalan raya cengkareng\r\n'),
(4, 'Abadi Makmur', '087555555555', 'pasar pagi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(60) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp`) VALUES
(1, 'jaya mandiri elektrik & elektronik', 'gedung plaza kenari mas lt ground blok d32 jl. keramat raya senen', '087772727882'),
(2, 'toko deni elektronik', 'jl. kembang sepatu keramat senen jakarta pusat', '085828822222'),
(3, 'toko kenari  mas panel', 'plaza kenari mas lt. Lg blok B no. 127 jl. keramat raya senen', '087777777777');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` int(1) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `username`, `nama_user`, `password`, `level`, `image`) VALUES
(1, 'administrator', 'rita', '$2y$10$9HWzreSTC.GewbrJFMrBI.mkEdWwdp0C.LGn9IBAFmGfnO/S76eGy', 1, 'user-1572591229.jpg'),
(2, 'gudang', 'komar', '$2y$10$LwO7Yw6GmpgQwAbLD5eg4ublgDuVX6J5W6bsCP.BXylPxCrArrQ2u', 2, 'user-1565795175.jpg'),
(3, 'pimpinan', 'manager', '$2y$10$/dCZu2zXkzNxUR2/lKP1AeunzoE5yMCBOGTWXnm23MeD/WEaPa08O', 3, 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangp_sementara`
--
ALTER TABLE `barangp_sementara`
  ADD PRIMARY KEY (`id_barangp`);

--
-- Indeks untuk tabel `barang_pembelian`
--
ALTER TABLE `barang_pembelian`
  ADD PRIMARY KEY (`id_barang_pembelian`);

--
-- Indeks untuk tabel `data_stok`
--
ALTER TABLE `data_stok`
  ADD PRIMARY KEY (`id_brg_stok`);

--
-- Indeks untuk tabel `d_pembelian`
--
ALTER TABLE `d_pembelian`
  ADD PRIMARY KEY (`id_d_pembelian`);

--
-- Indeks untuk tabel `d_penjualan`
--
ALTER TABLE `d_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indeks untuk tabel `history_stok`
--
ALTER TABLE `history_stok`
  ADD PRIMARY KEY (`id_history_stok`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `penjualan_sementara`
--
ALTER TABLE `penjualan_sementara`
  ADD PRIMARY KEY (`id_penjualan_sementara`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangp_sementara`
--
ALTER TABLE `barangp_sementara`
  MODIFY `id_barangp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_pembelian`
--
ALTER TABLE `barang_pembelian`
  MODIFY `id_barang_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_stok`
--
ALTER TABLE `data_stok`
  MODIFY `id_brg_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `d_pembelian`
--
ALTER TABLE `d_pembelian`
  MODIFY `id_d_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `d_penjualan`
--
ALTER TABLE `d_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `history_stok`
--
ALTER TABLE `history_stok`
  MODIFY `id_history_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penjualan_sementara`
--
ALTER TABLE `penjualan_sementara`
  MODIFY `id_penjualan_sementara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
