-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2019 pada 11.06
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `langsung_enak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `level` enum('SPV','KURIR','PRODUKSI') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `nama`, `nohp`, `level`) VALUES
(3, 'lidiya@gmail.com', '$2y$10$SzOTi1IUZILPf7T1v0FJYeirLuOveX7Eljg10ss/4uhKj7E49Gk2e', 'Maulidiya Qurrota', '085748009552', 'SPV'),
(4, 'rayyan@gmail.com', '$2y$10$SzOTi1IUZILPf7T1v0FJYeirLuOveX7Eljg10ss/4uhKj7E49Gk2e', 'Muhammad Rayyan', '085748009552', 'KURIR'),
(5, 'zeddin@gmail.com', '$2y$10$SzOTi1IUZILPf7T1v0FJYeirLuOveX7Eljg10ss/4uhKj7E49Gk2e', 'Zeddin Arief', '0857480095521', 'PRODUKSI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id` int(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `nama_bahan`, `stok`, `gambar`) VALUES
(1, 'Gula', 0, NULL),
(2, 'Tepung', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `kapasitas_max` int(5) NOT NULL,
  `kapasitas_min` int(5) NOT NULL,
  `is_active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama`, `email`, `password`, `alamat`, `nohp`, `kapasitas_max`, `kapasitas_min`, `is_active`) VALUES
(9, 'Muhammad Rayyan', 'rayyan@gmail.com', '$2y$10$SzOTi1IUZILPf7T1v0FJYeirLuOveX7Eljg10ss/4uhKj7E49Gk2e', 'Jl. Veteran', '08128912', 50, 25, 'active'),
(10, 'Muhammad Rayyan', 'muhakiem@gmail.com', '$2y$10$hsEbvzEBS0iSJDh8J1iiMOr4ZrzG9NR6I.Cqm1Er9wdeIvtanH97u', 'Jl. Gunung', '0857480095521', 50, 25, 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `id_pesanan`, `id_produk`, `nama_produk`, `jumlah`, `total_harga`) VALUES
(15, 16, 1, 'roti curut', 4, 24000),
(16, 17, 1, 'roti boy', 3, 150000),
(17, 18, 1, 'roti curut', 25, 150000),
(18, 20, 1, 'roti curut', 25, 150000),
(19, 21, 1, 'roti curut', 25, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_antar`
--

CREATE TABLE `jadwal_antar` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `nama_pengantar` varchar(50) NOT NULL,
  `waktu_pengantaran` datetime NOT NULL,
  `waktu_selesai_antar` datetime NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nama_rekening` varchar(50) NOT NULL,
  `bank_rekening` varchar(25) NOT NULL,
  `bank_tujuan` varchar(25) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pesanan`, `no_rekening`, `nama_rekening`, `bank_rekening`, `bank_tujuan`, `file`) VALUES
(8, 21, '91029381', 'Maulidiya', 'BCA', 'BCA', '1576565099_age-0001.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengantar`
--

CREATE TABLE `pengantar` (
  `id` int(11) NOT NULL,
  `nama_pengantar` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `waktu_pesan` date NOT NULL,
  `waktu_kirim` date NOT NULL,
  `jumlah` int(5) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `status` enum('Belum Dikirim','Terkirim','Menunggu Pembayaran','Menunggu Konfirmasi','Belum Diproduksi','Produksi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `customer`, `no_hp`, `alamat`, `waktu_pesan`, `waktu_kirim`, `jumlah`, `total_harga`, `status`) VALUES
(16, 9, '081338423751', 'Jl. Veteran', '2019-11-20', '2019-11-16', 4, 24000, 'Terkirim'),
(17, 9, '081338423751', 'Malang, Sawojajar', '2019-11-15', '2019-11-16', 3, 150000, 'Produksi'),
(18, 9, '081338423751', 'Jl. Gunung', '2019-11-16', '2019-11-16', 25, 150000, 'Belum Dikirim'),
(19, 9, '081338423751', 'Jl. Veteran', '2019-12-16', '2019-12-18', 25, 150000, 'Belum Dikirim'),
(20, 9, '081338423751', 'Jl. Veteran', '2019-12-16', '2019-12-18', 25, 150000, 'Menunggu Pembayaran'),
(21, 9, '085748009552', 'Jl. Veteran', '2019-12-17', '2019-12-18', 25, 150000, 'Belum Dikirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi`, `kategori`, `harga`, `gambar`, `stok`) VALUES
(1, 'roti curut', 'enak deh', 'Roti Boy', 6000, 'roti1.jpg', 0),
(5, 'roti boy', 'enak dong', 'roti gandum', 7000, 'roti1.jpg', 0),
(6, 'roti buaya', 'enak bgt', 'roti gede', 7000, 'roti1.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rencana_produksi`
--

CREATE TABLE `rencana_produksi` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rencana_produksi`
--

INSERT INTO `rencana_produksi` (`id`, `id_produk`, `jumlah`, `status`) VALUES
(14, 1, 25, 'selesai'),
(15, 1, 25, 'selesai'),
(16, 1, 3, 'selesai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `jadwal_antar`
--
ALTER TABLE `jadwal_antar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `pengantar`
--
ALTER TABLE `pengantar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rencana_produksi`
--
ALTER TABLE `rencana_produksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `jadwal_antar`
--
ALTER TABLE `jadwal_antar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengantar`
--
ALTER TABLE `pengantar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rencana_produksi`
--
ALTER TABLE `rencana_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rencana_produksi`
--
ALTER TABLE `rencana_produksi`
  ADD CONSTRAINT `rencana_produksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
