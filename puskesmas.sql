-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jan 2021 pada 13.47
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `puskesmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala_keluarga`
--

CREATE TABLE IF NOT EXISTS `kepala_keluarga` (
`id_kp` int(11) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `umur` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `tinggi_badan` varchar(50) NOT NULL,
  `berat_badan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kepala_keluarga`
--

INSERT INTO `kepala_keluarga` (`id_kp`, `no_ktp`, `nama`, `pekerjaan`, `alamat`, `jenis_kelamin`, `umur`, `agama`, `tinggi_badan`, `berat_badan`) VALUES
(3, '456789098654', 'sintya  ', 'pns ', 'halong', 'Laki-laki', '0000-00-00', 'Islam', '189', '80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
`id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok_obat` varchar(255) NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `harga`, `stok_obat`, `tanggal_kadaluarsa`) VALUES
(1, 'Promaag', 'Tablet', 10000, '19', '2021-05-12'),
(2, 'Paramex', 'Tube', 2000, '18', '2021-12-24'),
(6, 'oskadono', 'Sachet', 2000, '498', '2020-07-14'),
(7, 'Amoxilin', 'Tablet', 2000, '100', '2022-10-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
`id_pasien` int(11) NOT NULL,
  `no_rekam_medis` varchar(225) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nama_kp` varchar(150) NOT NULL,
  `pekerjaan` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `umur` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `no_bpjs` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE IF NOT EXISTS `poli` (
`id` int(11) NOT NULL,
  `nama_poli` varchar(225) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `id_user`) VALUES
(2, 'Kulit dan Kelamin', 2),
(3, 'Kandungan', 4),
(4, 'Umum', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam`
--

CREATE TABLE IF NOT EXISTS `rekam` (
`id_rekam` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `tinggi_badan` float NOT NULL,
  `berat_badan` float NOT NULL,
  `tekanan_darah` float NOT NULL,
  `suhu` float NOT NULL,
  `keluhan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `diagnosa` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_obat`
--

CREATE TABLE IF NOT EXISTS `rekam_obat` (
`id_rekam_obat` int(11) NOT NULL,
  `id_rekam_medis` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(11) NOT NULL,
  `id_rekam_medis` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `jenis` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `sebagai` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `no_telp`, `sebagai`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'Evi', '0987654321', 'Admin'),
(2, 'dokter', 'dokter', 'dokter1@gmail.com', 'Tifany', '085254478949', 'Dokter'),
(3, 'apoteker', 'apoteker', 'apoteker1@gmail.com', 'Felisya', '082344567833', 'Apoteker'),
(4, 'marlinmarlissa', '12345', 'marlin@gmail.com', 'Merlin Marlissa', '082248842215', 'Dokter'),
(5, 'wentoxwtt', '1316144074', 'wentoxwtt@gmail.com', 'Owen Wattimena', '085244140715', 'Dokter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kepala_keluarga`
--
ALTER TABLE `kepala_keluarga`
 ADD PRIMARY KEY (`id_kp`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
 ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
 ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam`
--
ALTER TABLE `rekam`
 ADD PRIMARY KEY (`id_rekam`);

--
-- Indexes for table `rekam_obat`
--
ALTER TABLE `rekam_obat`
 ADD PRIMARY KEY (`id_rekam_obat`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kepala_keluarga`
--
ALTER TABLE `kepala_keluarga`
MODIFY `id_kp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rekam`
--
ALTER TABLE `rekam`
MODIFY `id_rekam` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `rekam_obat`
--
ALTER TABLE `rekam_obat`
MODIFY `id_rekam_obat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
