-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Agu 2023 pada 14.18
-- Versi Server: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi_raflidb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
`id_agama` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_agama` varchar(20) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id_agama`, `urutan`, `nama_agama`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Islam', 'System', '2023-07-13 00:00:00', NULL, NULL),
(2, 2, 'Katolik', 'System', '2023-07-13 00:00:00', NULL, NULL),
(3, 3, 'Protestan', 'System', '2023-07-13 00:00:00', NULL, NULL),
(4, 4, 'Budha', 'System', '2023-07-13 00:00:00', NULL, NULL),
(5, 5, 'Hindu', 'System', '2023-07-13 00:00:00', NULL, NULL),
(6, 6, 'Konguchu', 'System', '2023-07-13 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksesmenu`
--

CREATE TABLE IF NOT EXISTS `aksesmenu` (
`id_aksesmenu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data untuk tabel `aksesmenu`
--

INSERT INTO `aksesmenu` (`id_aksesmenu`, `id_level`, `id_menu`) VALUES
(19, 1, 1),
(20, 1, 2),
(21, 1, 3),
(22, 1, 4),
(23, 1, 6),
(38, 3, 8),
(39, 3, 9),
(40, 3, 10),
(52, 2, 5),
(53, 2, 6),
(54, 2, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`id_barang` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `id_jenisbarang` int(11) NOT NULL DEFAULT '1',
  `nama_barang` varchar(100) NOT NULL,
  `harga` double DEFAULT NULL,
  `berat` double NOT NULL DEFAULT '0',
  `keterangan` varchar(50) DEFAULT NULL,
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kode`, `id_jenisbarang`, `nama_barang`, `harga`, `berat`, `keterangan`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 'BRG0000001', 1, 'Kursi', 1000000, 1, 'PERLENGKAPAN TOKO', 'admin', '2023-07-13 08:07:37', 'admin', '2023-07-26 09:07:44'),
(2, 'BRG0000002', 3, 'Paket Komputer', 5000000, 1, 'PERLENGKAPAN TOKO', 'admin', '2023-07-13 08:07:39', 'admin', '2023-07-26 09:07:44'),
(3, 'BRG0000003', 1, 'Meja Kasir', 10000000, 1, 'PERLENGKAPAN TOKO', 'admin', '2023-07-15 09:07:44', 'admin', '2023-07-27 09:07:00'),
(4, 'BRG0000004', 5, 'Tali Rapia', 5000, 1, 'PERLENGKAPAN TOKO', 'admin', '2023-07-26 09:07:43', 'admin', '2023-07-26 09:07:44'),
(5, 'BRG0000005', 3, 'FREEZER', 4000000, 1, 'PERLENGKAPAN TOKO', 'admin', '2023-07-26 09:07:45', 'admin', '2023-07-27 08:07:44'),
(6, 'BRG0000006', 3, 'TV LCD TELESINDO AQUA  INCH', 2136363, 1, 'PERLENGKAPAN TOKO', 'admin', '2023-07-26 09:07:46', NULL, NULL),
(7, 'BRG0000007', 5, 'Gunting', 5000, 1, 'PERLENGKAPAN TOKO', 'admin', '2023-07-26 09:07:47', NULL, NULL),
(8, 'BRG0000008', 1, 'Kabel Ties', 25000, 1, 'PERLENGKAPAN TOKO', 'admin', '2023-07-26 09:07:48', NULL, NULL),
(9, 'BRG0000009', 1, 'Meja Outdoor', 2500000, 1, 'PERLENGKAPAN TOKO', 'admin', '2023-07-26 09:07:49', 'admin', '2023-07-26 09:07:49'),
(10, 'BRG0000010', 3, 'COOLER', 12200000, 1, 'PERLENGKAPAN TOKO', 'admin', '2023-07-26 09:07:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `baranghilang`
--

CREATE TABLE IF NOT EXISTS `baranghilang` (
`id_baranghilang` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `hilang` double DEFAULT '0',
  `keterangan` varchar(100) DEFAULT NULL,
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `baranghilang`
--

INSERT INTO `baranghilang` (`id_baranghilang`, `kode`, `tanggal`, `id_barang`, `hilang`, `keterangan`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 'BH00001', '2023-07-13', 1, 1, 'Tercecer', 'admin', '2023-07-13 09:07:19', NULL, NULL),
(2, 'BH00002', '2023-07-15', 3, 1, 'Hilang saat pengiriman', 'admin', '2023-07-15 09:07:49', NULL, NULL),
(3, 'BH00003', '2022-11-17', 7, 3, 'saat pengiriman ', 'admin', '2023-08-05 01:08:14', NULL, NULL),
(4, 'BH00004', '2023-08-05', 7, 4, 'saat penerimaan barang', 'admin', '2023-08-05 01:08:15', NULL, NULL),
(5, 'BH00005', '2023-08-05', 8, 3, 'saat melakukan so barang', 'admin', '2023-08-05 01:08:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar`
--

CREATE TABLE IF NOT EXISTS `barangkeluar` (
`id_barangkeluar` int(11) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `tanggal_faktur` date NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `foto` text,
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `barangkeluar`
--

INSERT INTO `barangkeluar` (`id_barangkeluar`, `no_faktur`, `tanggal_faktur`, `id_toko`, `keterangan`, `foto`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(7, '299241061170', '2023-04-13', 5, 'Barang dikirim ke toko A.YANI KM 19', NULL, 'admin', '2023-07-27 09:07:04', 'admin', '2023-08-05 01:08:03'),
(8, '299241060000', '2023-04-28', 6, 'Telah dikirimkan ketoko perdagangan', NULL, 'admin', '2023-07-27 09:07:10', NULL, NULL),
(9, '299241060000', '2023-07-27', 7, 'Dikirimkan ke toko kuin cerucuk', NULL, 'admin', '2023-07-27 09:07:14', 'admin', '2023-07-27 09:07:15'),
(10, '299241060090', '2023-05-30', 13, 'Barang dikirim ke toko A.yani km 37.2', NULL, 'admin', '2023-07-27 09:07:19', NULL, NULL),
(11, '299241060135', '2023-07-27', 9, 'Telah dikrim kan ke toko perum hksn', NULL, 'admin', '2023-07-27 09:07:21', 'admin', '2023-07-27 09:07:22'),
(12, '299241060180', '2023-06-15', 10, 'Dikirim ketoko Golf Raya', NULL, 'admin', '2023-07-27 09:07:24', 'admin', '2023-08-05 01:08:08'),
(13, '299241060225', '2023-07-04', 11, 'Dikirimkan ke toko A.yani km 24.7', NULL, 'admin', '2023-07-27 09:07:27', NULL, NULL),
(14, '299241060270', '2023-06-13', 12, 'Dikirim ke toko trikora', NULL, 'admin', '2023-07-27 09:07:29', NULL, NULL),
(15, '299241060315', '2023-07-18', 13, 'dikirimkan ke toko a.yani km 37,2', NULL, 'admin', '2023-07-27 09:07:31', NULL, NULL),
(16, '299241060360', '2023-07-10', 14, 'Barang dikirim ke toko RO ULIN', NULL, 'admin', '2023-07-27 09:07:34', NULL, NULL),
(17, '299241061350', '2023-08-01', 7, 'Pengiriman barang', NULL, 'admin', '2023-08-01 01:08:04', 'admin', '2023-08-05 01:08:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk`
--

CREATE TABLE IF NOT EXISTS `barangmasuk` (
`id_barangmasuk` int(11) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `tanggal_faktur` date NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `foto` text,
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `barangmasuk`
--

INSERT INTO `barangmasuk` (`id_barangmasuk`, `no_faktur`, `tanggal_faktur`, `id_pegawai`, `tanggal_terima`, `id_supplier`, `keterangan`, `foto`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, '002-15-34545', '2023-07-13', 15, '2023-07-13', 1, 'Barang Masuk', 'vtcykaJYDMpVGie3.jpg', 'admin', '2023-07-13 08:07:45', 'admin', '2023-08-05 12:08:54'),
(2, '003-16-34555', '2023-07-15', 21, '2023-07-15', 3, 'Barang masuk tanggal 15 Juli 2023', 'al9mfh0UxIPnu7AC.jpg', 'admin', '2023-07-15 09:07:45', 'admin', '2023-07-26 10:07:02'),
(3, '001-14-34535', '2023-07-05', 17, '2023-07-28', 5, 'Barang Telah Diterima', 'fmpC9dHksaRvVI43.jpg', 'admin', '2023-07-26 09:07:58', 'admin', '2023-07-26 10:07:01'),
(4, '004-17-34565', '2022-11-21', 18, '2022-11-23', 11, 'Barang telah di terima', 'DbAxVLMQKkCa5lro.jpg', 'admin', '2023-07-27 08:07:39', 'admin', '2023-07-27 08:07:43'),
(5, '005-18-34575', '2023-06-07', 20, '2023-06-10', 7, 'Barang  Telah di terima', 'ngwKz1fGcxJTUNLM.jpg', 'admin', '2023-07-27 08:07:45', 'admin', '2023-08-05 12:08:56'),
(6, '006-19-34585', '2023-05-03', 23, '2023-05-16', 6, 'Barang Telah di terima', 'AkLHupfmV4d9Ul7D.jpg', 'admin', '2023-07-27 08:07:50', 'admin', '2023-07-27 08:07:50'),
(7, '007-20-34595', '2023-03-01', 15, '2023-01-08', 8, 'Barang Telah diterima', 'm5MtaNsOXiUP194I.jpg', 'admin', '2023-07-27 08:07:52', 'admin', '2023-07-27 08:07:53'),
(8, '008-21-34605', '2023-07-27', 24, '2023-07-27', 1, 'Barang telah diterima', 'YpGxIBVQAN8Ciyu3.jpg', 'admin', '2023-07-27 08:07:59', 'admin', '2023-08-04 02:08:07'),
(9, '009-22-34615', '2023-03-09', 16, '2023-03-14', 6, 'Barang telah diterima', 'QZKi4WLptrUh0AEx.jpg', 'admin', '2023-07-27 09:07:01', 'admin', '2023-08-04 02:08:07'),
(10, '0010-23-34625', '2023-02-07', 15, '2023-02-11', 9, 'Barang Telah di terima', NULL, 'admin', '2023-07-27 09:07:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangrusak`
--

CREATE TABLE IF NOT EXISTS `barangrusak` (
`id_barangrusak` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `rusak` double DEFAULT '0',
  `keterangan` varchar(100) DEFAULT NULL,
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `barangrusak`
--

INSERT INTO `barangrusak` (`id_barangrusak`, `kode`, `tanggal`, `id_barang`, `rusak`, `keterangan`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 'BR00001', '2023-07-13', 1, 1, 'Patah', 'admin', '2023-07-13 09:07:20', NULL, NULL),
(2, 'BR00002', '2023-07-15', 3, 1, 'Rusak terjatuh saat packing', 'admin', '2023-07-15 09:07:49', NULL, NULL),
(3, 'BR00003', '2023-08-05', 2, 1, 'dikarenakan tertumpuk barang lain', 'admin', '2023-08-05 01:08:17', NULL, NULL),
(4, 'BR00004', '2023-08-05', 3, 2, 'patah saat penurunan barang\r\n', 'admin', '2023-08-05 01:08:18', NULL, NULL),
(5, 'BR00005', '2023-08-05', 6, 1, 'terjatuh saat menurunkan barang', 'admin', '2023-08-05 01:08:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftarbarangkeluar`
--

CREATE TABLE IF NOT EXISTS `daftarbarangkeluar` (
`id_daftarbarangkeluar` int(11) NOT NULL,
  `id_barangkeluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data untuk tabel `daftarbarangkeluar`
--

INSERT INTO `daftarbarangkeluar` (`id_daftarbarangkeluar`, `id_barangkeluar`, `id_barang`, `jumlah`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(12, 7, 1, 2, 'admin', '2023-07-27 09:07:04', NULL, NULL),
(13, 7, 2, 3, 'admin', '2023-07-27 09:07:04', NULL, NULL),
(14, 7, 3, 1, 'admin', '2023-07-27 09:07:04', NULL, NULL),
(15, 7, 10, 10, 'admin', '2023-07-27 09:07:04', NULL, NULL),
(16, 8, 4, 2, 'admin', '2023-07-27 09:07:11', NULL, NULL),
(17, 8, 7, 1, 'admin', '2023-07-27 09:07:11', NULL, NULL),
(18, 8, 9, 4, 'admin', '2023-07-27 09:07:11', NULL, NULL),
(19, 8, 1, 8, 'admin', '2023-07-27 09:07:11', NULL, NULL),
(20, 8, 2, 1, 'admin', '2023-07-27 09:07:11', NULL, NULL),
(21, 9, 6, 1, 'admin', '2023-07-27 09:07:14', NULL, NULL),
(22, 9, 1, 2, 'admin', '2023-07-27 09:07:15', NULL, NULL),
(23, 9, 8, 2, 'admin', '2023-07-27 09:07:15', NULL, NULL),
(24, 9, 4, 3, 'admin', '2023-07-27 09:07:15', NULL, NULL),
(25, 10, 5, 6, 'admin', '2023-07-27 09:07:19', NULL, NULL),
(26, 10, 2, 2, 'admin', '2023-07-27 09:07:19', NULL, NULL),
(27, 10, 6, 2, 'admin', '2023-07-27 09:07:19', NULL, NULL),
(28, 10, 7, 1, 'admin', '2023-07-27 09:07:19', NULL, NULL),
(29, 10, 4, 2, 'admin', '2023-07-27 09:07:19', NULL, NULL),
(30, 10, 1, 4, 'admin', '2023-07-27 09:07:20', NULL, NULL),
(31, 11, 4, 4, 'admin', '2023-07-27 09:07:22', NULL, NULL),
(32, 11, 7, 2, 'admin', '2023-07-27 09:07:22', NULL, NULL),
(33, 11, 1, 8, 'admin', '2023-07-27 09:07:22', NULL, NULL),
(34, 11, 9, 4, 'admin', '2023-07-27 09:07:22', NULL, NULL),
(35, 11, 6, 2, 'admin', '2023-07-27 09:07:22', NULL, NULL),
(36, 11, 2, 1, 'admin', '2023-07-27 09:07:23', NULL, NULL),
(37, 12, 1, 2, 'admin', '2023-07-27 09:07:25', NULL, NULL),
(38, 12, 2, 1, 'admin', '2023-07-27 09:07:25', NULL, NULL),
(39, 12, 8, 2, 'admin', '2023-07-27 09:07:25', NULL, NULL),
(40, 13, 1, 4, 'admin', '2023-07-27 09:07:27', NULL, NULL),
(41, 13, 2, 2, 'admin', '2023-07-27 09:07:27', NULL, NULL),
(42, 13, 4, 4, 'admin', '2023-07-27 09:07:27', NULL, NULL),
(43, 13, 4, 3, 'admin', '2023-07-27 09:07:27', NULL, NULL),
(44, 13, 9, 2, 'admin', '2023-07-27 09:07:27', NULL, NULL),
(45, 14, 6, 2, 'admin', '2023-07-27 09:07:29', NULL, NULL),
(46, 14, 7, 2, 'admin', '2023-07-27 09:07:30', NULL, NULL),
(47, 14, 3, 1, 'admin', '2023-07-27 09:07:30', NULL, NULL),
(48, 14, 4, 3, 'admin', '2023-07-27 09:07:30', NULL, NULL),
(49, 14, 10, 2, 'admin', '2023-07-27 09:07:30', NULL, NULL),
(50, 15, 5, 1, 'admin', '2023-07-27 09:07:32', NULL, NULL),
(51, 15, 10, 5, 'admin', '2023-07-27 09:07:32', NULL, NULL),
(52, 15, 6, 1, 'admin', '2023-07-27 09:07:32', NULL, NULL),
(53, 15, 4, 3, 'admin', '2023-07-27 09:07:32', NULL, NULL),
(54, 16, 5, 2, 'admin', '2023-07-27 09:07:34', NULL, NULL),
(55, 16, 9, 3, 'admin', '2023-07-27 09:07:34', NULL, NULL),
(56, 16, 1, 6, 'admin', '2023-07-27 09:07:34', NULL, NULL),
(57, 16, 8, 3, 'admin', '2023-07-27 09:07:34', NULL, NULL),
(58, 16, 6, 2, 'admin', '2023-07-27 09:07:34', NULL, NULL),
(59, 16, 7, 2, 'admin', '2023-07-27 09:07:35', NULL, NULL),
(60, 16, 3, 1, 'admin', '2023-07-27 09:07:35', NULL, NULL),
(61, 17, 1, 1, 'admin', '2023-08-01 01:08:06', NULL, NULL),
(62, 17, 2, 1, 'admin', '2023-08-01 01:08:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftarbarangmasuk`
--

CREATE TABLE IF NOT EXISTS `daftarbarangmasuk` (
`id_daftarbarangmasuk` int(11) NOT NULL,
  `id_barangmasuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data untuk tabel `daftarbarangmasuk`
--

INSERT INTO `daftarbarangmasuk` (`id_daftarbarangmasuk`, `id_barangmasuk`, `id_barang`, `jumlah`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 1, 100, 'admin', '2023-07-13 08:07:47', NULL, NULL),
(2, 1, 2, 20, 'admin', '2023-07-13 08:07:50', NULL, NULL),
(3, 2, 3, 5, 'admin', '2023-07-15 09:07:45', NULL, NULL),
(4, 2, 1, 2, 'admin', '2023-07-15 09:07:46', NULL, NULL),
(5, 3, 1, 50, 'admin', '2023-07-26 09:07:59', NULL, NULL),
(6, 3, 2, 10, 'admin', '2023-07-26 09:07:59', NULL, NULL),
(7, 3, 4, 50, 'admin', '2023-07-26 09:07:59', NULL, NULL),
(8, 3, 5, 4, 'admin', '2023-07-26 09:07:59', NULL, NULL),
(9, 3, 6, 10, 'admin', '2023-07-26 10:07:00', NULL, NULL),
(10, 3, 7, 50, 'admin', '2023-07-26 10:07:00', NULL, NULL),
(11, 3, 8, 50, 'admin', '2023-07-26 10:07:00', NULL, NULL),
(12, 3, 9, 4, 'admin', '2023-07-26 10:07:00', NULL, NULL),
(13, 3, 10, 4, 'admin', '2023-07-26 10:07:00', NULL, NULL),
(14, 4, 1, 20, 'admin', '2023-07-27 08:07:39', NULL, NULL),
(15, 4, 2, 6, 'admin', '2023-07-27 08:07:39', NULL, NULL),
(16, 4, 3, 5, 'admin', '2023-07-27 08:07:39', NULL, NULL),
(17, 4, 4, 50, 'admin', '2023-07-27 08:07:39', NULL, NULL),
(18, 4, 5, 5, 'admin', '2023-07-27 08:07:40', NULL, NULL),
(19, 4, 6, 5, 'admin', '2023-07-27 08:07:40', NULL, NULL),
(20, 4, 7, 50, 'admin', '2023-07-27 08:07:40', NULL, NULL),
(21, 4, 8, 50, 'admin', '2023-07-27 08:07:40', NULL, NULL),
(22, 4, 10, 6, 'admin', '2023-07-27 08:07:40', NULL, NULL),
(23, 5, 1, 10, 'admin', '2023-07-27 08:07:45', NULL, NULL),
(24, 5, 2, 10, 'admin', '2023-07-27 08:07:45', NULL, NULL),
(25, 5, 3, 10, 'admin', '2023-07-27 08:07:45', NULL, NULL),
(26, 5, 4, 50, 'admin', '2023-07-27 08:07:45', NULL, NULL),
(27, 5, 5, 10, 'admin', '2023-07-27 08:07:46', NULL, NULL),
(28, 5, 6, 15, 'admin', '2023-07-27 08:07:46', NULL, NULL),
(29, 5, 7, 50, 'admin', '2023-07-27 08:07:46', NULL, NULL),
(30, 5, 8, 50, 'admin', '2023-07-27 08:07:47', NULL, NULL),
(31, 5, 9, 15, 'admin', '2023-07-27 08:07:47', NULL, NULL),
(32, 5, 9, 15, 'admin', '2023-07-27 08:07:47', NULL, NULL),
(33, 6, 4, 50, 'admin', '2023-07-27 08:07:50', NULL, NULL),
(34, 6, 8, 100, 'admin', '2023-07-27 08:07:50', NULL, NULL),
(35, 7, 2, 56, 'admin', '2023-07-27 08:07:53', NULL, NULL),
(36, 7, 6, 12, 'admin', '2023-07-27 08:07:53', NULL, NULL),
(37, 8, 3, 10, 'admin', '2023-07-27 08:07:59', NULL, NULL),
(38, 9, 1, 20, 'admin', '2023-07-27 09:07:01', NULL, NULL),
(39, 9, 9, 10, 'admin', '2023-07-27 09:07:01', NULL, NULL),
(40, 10, 5, 10, 'admin', '2023-07-27 09:07:02', NULL, NULL),
(41, 10, 10, 10, 'admin', '2023-07-27 09:07:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekspedisi`
--

CREATE TABLE IF NOT EXISTS `ekspedisi` (
`id_ekspedisi` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL DEFAULT '',
  `nama_ekspedisi` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `ekspedisi`
--

INSERT INTO `ekspedisi` (`id_ekspedisi`, `kode`, `nama_ekspedisi`, `alamat`, `nohp`, `status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 'EP00001', 'SICEPAT', 'Banjarmasin', '089765487312', 1, 'admin', '2022-12-25 10:12:43', 'admin', '2023-02-15 05:02:35'),
(2, 'EP00002', 'JNE', 'Banjarbaru', '081237874617', 1, 'admin', '2022-12-25 10:12:44', 'admin', '2023-02-15 05:02:36'),
(3, 'EP00003', 'JNT', 'Balikpapan', '085267389083', 1, 'admin', '2022-12-25 10:12:44', 'admin', '2023-02-15 05:02:37'),
(4, 'EP00004', 'TIKI', 'Palangkaraya', '081235678491', 1, 'admin', '2022-12-25 10:12:44', 'admin', '2023-02-15 05:02:37'),
(5, 'EP00005', 'POS', 'Sampit', '085267890123', 1, 'admin', '2022-12-25 10:12:44', 'admin', '2023-02-15 05:02:37'),
(6, 'EP00006', 'JNTS', 'Pulang Pisau', '089687562345', 1, 'admin', '2023-02-18 08:02:34', NULL, NULL),
(7, 'EP00007', 'PTUR', 'Marabahan', '085245678901', 1, 'admin', '2023-02-18 08:02:34', NULL, NULL),
(8, 'EP00008', 'SYHB', 'Basarang', '081245637890', 1, 'admin', '2023-02-18 08:02:35', NULL, NULL),
(9, 'EP00009', 'SMNG', 'Barito Selatan', '089642786511', 1, 'admin', '2023-02-18 08:02:35', NULL, NULL),
(10, 'EP00010', 'HRTM', 'Tanjung', '081245637890', 1, 'admin', '2023-02-18 08:02:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `golpangkat`
--

CREATE TABLE IF NOT EXISTS `golpangkat` (
`id_golpangkat` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_gol` varchar(100) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `golpangkat`
--

INSERT INTO `golpangkat` (`id_golpangkat`, `urutan`, `nama_gol`, `nama_pangkat`) VALUES
(1, 1, 'IA', 'Juru Muda'),
(2, 2, 'IB', 'Juru Muda Tingkat I'),
(3, 3, 'IC', 'Juru'),
(4, 4, 'ID', 'Juru Tingkat I'),
(5, 5, 'IIA', 'Pengatur Muda'),
(6, 6, 'IIB', 'Pengatur Muda Tingkat I'),
(7, 7, 'IIC', 'Pengatur'),
(8, 8, 'IID', 'Pengatur Tingkat I'),
(9, 9, 'IIIA', 'Penata Muda'),
(10, 10, 'IIIB', 'Penata Muda Tingkat I'),
(11, 11, 'IIIC', 'Penata'),
(12, 12, 'IIID', 'Penata Tingkat I'),
(13, 13, 'IVA', 'Pembina'),
(14, 14, 'IVB', 'Pembina Tingkat I'),
(15, 15, 'IVC', 'Pembina Mudah'),
(16, 16, 'IVD', 'Pembina Madya'),
(17, 17, 'IVE', 'Pembina Utama'),
(18, 18, 'PPNPN', 'PPNPN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
`id_jabatan` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `urutan`, `nama_jabatan`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(3, 1, 'General Manager', 'System', '2022-10-29 00:00:00', 'admin', '2023-07-26 09:07:25'),
(8, 2, 'ADM', 'admin', '2022-12-22 11:12:39', 'admin', '2023-07-26 09:07:25'),
(23, 3, 'Team Warehouse', 'admin', '2022-12-24 04:12:36', 'admin', '2023-07-26 09:07:26'),
(24, 4, 'Driver', 'admin', '2022-12-24 04:12:36', 'admin', '2023-07-26 09:07:26'),
(25, 5, 'Helper', 'admin', '2022-12-24 04:12:36', 'admin', '2023-07-26 09:07:26'),
(26, 6, 'Asset', 'admin', '2022-12-24 04:12:37', 'admin', '2023-07-26 09:07:26'),
(27, 7, 'Supervisor GA', 'admin', '2023-07-26 09:07:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbarang`
--

CREATE TABLE IF NOT EXISTS `jenisbarang` (
`id_jenisbarang` int(11) NOT NULL,
  `urutan` int(11) NOT NULL DEFAULT '1',
  `nama_jenisbarang` varchar(100) NOT NULL,
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `jenisbarang`
--

INSERT INTO `jenisbarang` (`id_jenisbarang`, `urutan`, `nama_jenisbarang`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Furniture', 'admin', '2023-07-10 08:07:46', NULL, NULL),
(2, 2, 'Perlengkapan', 'admin', '2023-07-10 08:07:46', NULL, NULL),
(3, 3, 'Elektronik', 'admin', '2023-07-10 08:07:47', NULL, NULL),
(4, 4, 'Lain-Lain', 'admin', '2023-07-10 08:07:47', NULL, NULL),
(5, 5, 'Alat Tulis Kantor', 'admin', '2023-07-26 09:07:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`id_level` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_level` varchar(100) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `urutan`, `nama_level`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Administrator', 'alpian', '2022-05-26 00:00:00', NULL, NULL),
(2, 2, 'Chief Of Store', 'alpian', '2022-05-26 00:00:00', 'admin', '2023-07-10 06:07:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id_menu` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'admin',
  `aktif` int(11) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL DEFAULT '2022-05-21 10:00:00',
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `urutan`, `nama_menu`, `url`, `icon`, `keterangan`, `aktif`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Beranda', 'admin', 'fas fa-fw fa-tachometer-alt', 'admin', 1, 'system', '2022-05-21 10:00:00', NULL, NULL),
(2, 2, 'Master', 'master', 'fas fa-fw fa-tachometer-alt', 'admin', 1, 'system', '2022-05-21 10:00:00', NULL, NULL),
(3, 3, 'Transaksi', 'register', 'fas fa-fw fa-tachometer-alt', 'admin', 1, 'system', '2022-05-21 10:00:00', 'admin', '2023-07-07 12:07:11'),
(4, 4, 'Laporan', 'laporan', 'fas fa-fw fa-tachometer-alt', 'admin', 1, 'system', '2022-05-21 10:00:00', NULL, NULL),
(5, 1, 'Beranda', 'toko', 'fas fa-fw fa-tachometer-alt', 'toko', 1, 'system', '2022-05-21 10:00:00', 'admin', '2023-07-21 07:07:47'),
(6, 5, 'Profil', 'profil', 'nav-icon fas fa fa-user', 'pengguna', 2, 'system', '2022-05-21 10:00:00', NULL, NULL),
(7, 6, 'Akses Jaringan', 'aksesjaringan', 'nav-icon fas fa fa-wifi', 'pengguna', 1, 'system', '2022-05-21 10:00:00', NULL, NULL),
(8, 1, 'Beranda', 'pemesan', 'nav-icon fas fa-tachometer-alt', 'nav-icon fas fa-tachometer-alt', 1, 'admin', '2022-09-21 01:09:25', 'admin', '2022-09-21 06:09:33'),
(9, 3, 'Profil', 'pemesan/profil', 'nav-icon fas fa fa-user', 'nav-icon fas fa fa-user', 1, 'admin', '2022-09-21 01:09:37', 'admin', '2022-09-21 06:09:34'),
(10, 2, 'Barang Keluar', 'toko/barangkeluar', 'nav-icon fas fa-tachometer-alt', 'nav-icon fas fa-tachometer-alt', 1, 'admin', '2022-09-21 06:09:16', 'admin', '2023-07-21 08:07:00'),
(11, 2, 'Transaksi', 'toko', 'far fa-circle nav-icon', 'far fa-circle nav-icon', 1, 'admin', '2023-07-10 08:07:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
`id_pegawai` int(11) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `id_jeniskelamin` int(1) NOT NULL DEFAULT '1' COMMENT '1=Laki-laki,2=Perempuan',
  `id_jabatan` int(11) DEFAULT NULL,
  `id_golpangkat` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_agama` int(11) NOT NULL DEFAULT '1',
  `id_pendidikan` int(11) NOT NULL DEFAULT '1',
  `alamat` text,
  `nohp` varchar(13) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL DEFAULT 'default.jpg',
  `aktif` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(100) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(100) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `id_jeniskelamin`, `id_jabatan`, `id_golpangkat`, `tempat_lahir`, `tanggal_lahir`, `id_agama`, `id_pendidikan`, `alamat`, `nohp`, `email`, `foto`, `aktif`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(15, '2015023430', '  M FADILLAH', 1, 25, NULL, NULL, NULL, 1, 4, 'HANDIL KALUA RT 003 RW 001 KEL DESA BANYU HIRANG', '085388267366', 'mfadillah@gmail.com', 'jtaS4yWK15oLiqgf.jpg', 1, 'admin', '2022-12-24 04:12:41', 'admin', '2023-08-05 12:08:46'),
(16, '2013157436', '    ROBY', 1, 8, NULL, NULL, NULL, 2, 4, 'DESA GUNTUNG UJUNG RT 003 RW 000 KEL DESA GUNTUNG UJUNG', '082255893796', 'roby@gmail.com', '6Sc2kJ4FntIQ59KA.jpg', 1, 'admin', '2023-02-15 05:02:17', 'admin', '2023-08-05 12:08:46'),
(17, '2015010972', '  SURIANSYAH', 1, 26, NULL, NULL, NULL, 1, 5, 'JL MANARAP TENGAH RT 001 RW 001 KEL DESA MANARAP TENGAH', '08388533083', 'suriansyah@gmail.com', 'HVBn8iOSX3cyMtqj.jpg', 1, 'admin', '2023-02-18 08:02:06', 'admin', '2023-08-05 12:08:46'),
(18, '2013150377', '  HELMI', 1, 26, NULL, NULL, NULL, 1, 4, 'helmi@gmail.com', '08988987706', 'helmi@gmail.com', 'ifVWBJ3OQgXYAp7k.jpg', 1, 'admin', '2023-07-26 09:07:28', 'admin', '2023-08-05 12:08:46'),
(19, '2013225577', '  HELDAWATI', 2, 27, NULL, NULL, NULL, 1, 5, 'JL KOMP CITRA PERMATA BIRU NO 44 RT 004 RW 004 KEL SEKUMPUL', '083821095597', 'heldawati@gmail.com', 'vYQnc3fE9SDJ2g6H.jpg', 1, 'admin', '2023-07-26 09:07:31', 'admin', '2023-08-05 12:08:47'),
(20, '2015080394', '  FATHURRAHMAN', 1, 26, NULL, NULL, NULL, 1, 4, 'JL CEMPAKA GG INPRES RT 002 RW 001 KEL JAWA LAUT ', '08875948979', 'fathurrahman@gmail.com', '9kuC0jaRf3DWENFM.jpg', 1, 'admin', '2023-07-26 09:07:31', 'admin', '2023-08-05 12:08:48'),
(21, '2013114125', '   SYARIFUDDIN', 1, 24, NULL, NULL, NULL, 1, 4, 'JL CEMPAKA GG RAHAYU NO 22 RT 012 RW 000 KEL JAWA LAUT ', '081617400063', 'syarifuddin@gmail.com', 'rkUwq6Bfv8dcVCl5.jpg', 1, 'admin', '2023-07-26 09:07:32', 'admin', '2023-08-05 12:08:48'),
(22, '2013153065', '  TINO SUWITO', 1, 23, NULL, NULL, NULL, 3, 4, 'JL AHMAD YANI GG WIRYO UTOMO 2 RT 034 RW 012 KEL KERATON', '088705271230', 'tinosuwito@gmail.com', 'LtQJ1hzPwnH8mXb2.jpg', 1, 'admin', '2023-07-26 09:07:33', 'admin', '2023-08-05 12:08:48'),
(23, '2013159186', '  M FAZARLI', 1, 23, NULL, NULL, NULL, 5, 4, 'KOMP SAADAH II RT 015 RW 004 KEL SUNGAI PARING', '085248578823', 'mfazarli@gmail.com', 'onNXLMFl5xBCfW64.jpg', 1, 'admin', '2023-07-26 09:07:34', 'admin', '2023-08-05 12:08:48'),
(24, '2015023434', '  MUHAMMAD ARIYADI', 1, 3, NULL, NULL, NULL, 1, 6, 'JL KOMP CITRA PERMATA BIRU NO 44 RT 004 RW 004 KEL SEKUMPUL', '083821095597', 'muhammadariyadi@gmail.com', 'IklfJzMecxHVaWXb.jpg', 1, 'admin', '2023-07-26 09:07:34', 'admin', '2023-08-05 12:08:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejabat_ttd`
--

CREATE TABLE IF NOT EXISTS `pejabat_ttd` (
`id_pegawai` int(11) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `id_jeniskelamin` int(1) NOT NULL DEFAULT '1' COMMENT '1=Laki-laki,2=Perempuan',
  `id_jabatan` int(11) DEFAULT NULL,
  `id_golpangkat` int(11) DEFAULT NULL,
  `aktif` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(100) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(100) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pejabat_ttd`
--

INSERT INTO `pejabat_ttd` (`id_pegawai`, `nip`, `nama_pegawai`, `id_jeniskelamin`, `id_jabatan`, `id_golpangkat`, `aktif`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, '6303050102880066', 'MUHAMMAD ARIYADI', 1, 2, 13, 1, 'system', '2022-10-29 00:00:00', 'admin', '2022-12-22 07:12:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id_supplier` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL DEFAULT '',
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
`id_pendidikan` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_pendidikan` varchar(20) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `urutan`, `nama_pendidikan`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Tidak Sekolah', 'admin', '2023-08-03 00:00:00', NULL, NULL),
(2, 2, 'SD', 'admin', '2023-08-03 00:00:00', NULL, NULL),
(3, 3, 'SMP', 'admin', '2023-08-03 00:00:00', NULL, NULL),
(4, 4, 'SMA', 'admin', '2023-08-03 00:00:00', NULL, NULL),
(5, 5, 'D3', 'admin', '2023-08-03 00:00:00', NULL, NULL),
(6, 6, 'S1', 'admin', '2023-08-03 00:00:00', NULL, NULL),
(7, 7, 'S2', 'admin', '2023-08-03 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
`id_pengguna` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL,
  `aktif` int(1) NOT NULL,
  `token` varchar(50) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_pegawai`, `nama_pengguna`, `username`, `password`, `id_level`, `aktif`, `token`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Administrator', 'admin', '$2y$10$atSqBK02bWz9dAtIDQIdbejnw.tt66ZNMEBg2E5QS3iMkjtmM/WkO', 1, 1, 'SxKpmyh47e', 'System', '2022-10-30 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengirimanbarang`
--

CREATE TABLE IF NOT EXISTS `pengirimanbarang` (
`id_pengirimanbarang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barangkeluar` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_ekspedisi` int(11) NOT NULL,
  `biaya` double DEFAULT NULL,
  `no_resi` varchar(100) DEFAULT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `foto` text,
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `pengirimanbarang`
--

INSERT INTO `pengirimanbarang` (`id_pengirimanbarang`, `tanggal`, `id_barangkeluar`, `kode`, `id_pegawai`, `id_ekspedisi`, `biaya`, `no_resi`, `tanggal_terima`, `nama_penerima`, `keterangan`, `foto`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(11, '2023-07-27', 8, 'BT00002', 18, 7, 3000000, '299241059955', '2023-07-27', 'SEFTIY ELLYSA PUTRI', 'Barang Telah di terima', 'xWAYK4rT3D9VBshe.jpg', 'admin', '2023-07-27 09:07:12', NULL, NULL),
(12, '2023-07-27', 9, 'BT00003', 20, 4, 500000, '299241060045', '2023-07-27', 'DITA IRA SETIANI', 'Barang Telah Diterima', 'jplQtgBZ32ahi6IS.jpg', 'admin', '2023-07-27 09:07:17', NULL, NULL),
(13, '2023-07-27', 10, 'BT00004', 16, 2, 600000, '299241060090', '2023-05-31', 'MUHAMMAD SALEHEN', 'telah diterima', '4AHs2NLIy6fnXFaw.jpg', 'admin', '2023-08-05 01:08:03', NULL, NULL),
(16, '2023-07-05', 13, 'BT00007', 22, 1, 5500000, '299241060225', '2023-07-27', 'LENI MARLINA', 'Sudah Diterima', 'gVGwL1KMvub3HPql.jpg', 'admin', '2023-07-27 09:07:28', NULL, NULL),
(18, '2023-07-18', 15, 'BT00009', 23, 3, 300000, '299241060315', '2023-07-18', 'MUHAMMAD SALEHEN', 'Barang Telah Diterima', 'CjOVX3Qu5eY1myz7.jpg', 'admin', '2023-07-27 09:07:33', NULL, NULL),
(19, '2023-07-10', 16, 'BT00010', 16, 2, 400000, '299241060360', '2023-07-10', 'AHMAD YUNANI', 'Telah Diterima', 'D034JXorsPNhnIGQ.jpg', 'admin', '2023-07-27 09:07:35', NULL, NULL),
(21, '2023-08-04', 12, 'BT00012', 18, 2, 200000, '28824107878', '2023-08-05', 'MUHAMMAD RICKY', 'Barang Telah Diterima', 'HVQiLG4TcIByNYh3.jpg', 'RICKY', '2023-08-05 01:08:09', NULL, NULL),
(22, '2023-06-09', 11, 'BT00013', 15, 1, 200000, '22453633366', '2023-07-29', 'M FAZARLI', 'Barang Telah Diterima', 'jZAok7brRyiLOqBd.jpg', 'admin', '2023-08-05 01:08:05', NULL, NULL),
(23, '2023-08-04', 14, 'BT00014', 15, 6, 430000, '78066668545', NULL, '', NULL, NULL, 'admin', '2023-08-04 02:08:29', NULL, NULL),
(24, '2023-04-15', 7, 'BT00015', 20, 4, 400000, '299241061485', '2023-04-15', 'MUHAMMAD RAFLI', 'Barang Telah Diterima', 'c8ufkUpriCAnDK1h.jpg', 'RAFLI', '2023-08-05 01:08:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
`id_profil` int(11) NOT NULL,
  `nama_aplikasi` text,
  `singkatan` varchar(50) DEFAULT NULL,
  `nama_profil` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `telepon` varchar(15) NOT NULL,
  `kodepos` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `logo` varchar(100) NOT NULL DEFAULT 'logo.png'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_aplikasi`, `singkatan`, `nama_profil`, `alamat`, `fax`, `telepon`, `kodepos`, `email`, `website`, `logo`) VALUES
(1, 'APLIKASI MONITORING PENGADAAN DAN INVENTARIS BARANG PADA PT.INDOMARCO PRISMATAMA CABANG BANJARMASIN BERBASIS WEB', 'SI', 'PT. INDOMARCO PRISMATAMA CABANG BANJARMASIN', 'Jl. A. Yani,km 12,2', '(0511) 6746181', '(0511) 6746181', '70652', 'admin@ptindomarcobanjarmamsin.com', 'www.ptindomarcobanjarmamsin.com', 'logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
`id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_submenu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL DEFAULT 'far fa-circle nav-icon',
  `aktif` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL DEFAULT '2022-05-21 10:00:00',
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_menu`, `urutan`, `nama_submenu`, `url`, `icon`, `aktif`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 2, 1, 'Menu', 'master/menu', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', NULL, NULL),
(2, 2, 2, 'Sub Menu', 'master/submenu', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', NULL, NULL),
(3, 2, 3, 'Level', 'master/level', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', NULL, NULL),
(4, 2, 4, 'Pengguna', 'master/pengguna', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', NULL, NULL),
(5, 2, 2, 'Jabatan', 'master/jabatan', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2022-12-22 10:12:01'),
(6, 2, 7, 'Supplier', 'master/supplier', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2022-12-24 12:12:18'),
(9, 3, 5, 'Barang Keluar', 'register/barangkeluar', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2022-12-24 09:12:41'),
(10, 3, 1, 'Barang Masuk', 'register/barangmasuk', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2022-12-24 04:12:45'),
(15, 2, 1, 'Karyawan', 'master/pegawai', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2023-07-15 05:07:08'),
(16, 4, 1, 'Laporan Karyawan', 'laporan/pegawai', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2023-07-15 05:07:08'),
(20, 4, 5, 'Laporan Supplier', 'laporan/supplier', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2022-12-25 01:12:28'),
(40, 3, 6, 'Barang Hilang', 'register/baranghilang', 'far fa-circle nav-icon', 1, 'admin', '2022-12-22 05:12:10', 'admin', '2022-12-25 01:12:12'),
(41, 3, 10, 'Barang Rusak', 'register/barangrusak', 'far fa-circle nav-icon', 1, 'admin', '2022-12-22 05:12:10', 'admin', '2022-12-25 01:12:17'),
(44, 4, 6, 'Laporan Toko', 'laporan/toko', 'far fa-circle nav-icon', 1, 'admin', '2022-12-22 09:12:02', 'admin', '2023-07-09 03:07:52'),
(45, 4, 7, 'Laporan Ekspedisi', 'laporan/ekspedisi', 'far fa-circle nav-icon', 1, 'admin', '2022-12-22 09:12:02', 'admin', '2022-12-25 01:12:28'),
(46, 4, 8, 'Laporan Barang', 'laporan/barang', 'far fa-circle nav-icon', 1, 'admin', '2022-12-22 09:12:06', 'admin', '2022-12-25 01:12:29'),
(47, 4, 9, 'Laporan Barang Masuk', 'laporan/barangmasuk', 'far fa-circle nav-icon', 1, 'admin', '2022-12-22 09:12:07', 'admin', '2022-12-25 02:12:11'),
(48, 4, 10, 'Laporan Barang Keluar', 'laporan/barangkeluar', 'far fa-circle nav-icon', 1, 'admin', '2022-12-22 09:12:07', 'admin', '2022-12-25 02:12:12'),
(49, 2, 8, 'Toko', 'master/toko', 'far fa-circle nav-icon', 1, 'admin', '2022-12-24 12:12:24', 'admin', '2023-07-09 03:07:52'),
(50, 2, 13, 'Barang', 'master/barang', 'far fa-circle nav-icon', 1, 'admin', '2022-12-24 12:12:30', NULL, NULL),
(51, 2, 14, 'Ekspedisi', 'master/ekspedisi', 'far fa-circle nav-icon', 1, 'admin', '2022-12-24 01:12:27', 'admin', '2022-12-25 10:12:42'),
(52, 4, 15, 'Laporan Pengiriman', 'laporan/pengirimanbarang', 'far fa-circle nav-icon', 1, 'admin', '2022-12-24 11:12:52', 'admin', '2022-12-25 02:12:13'),
(53, 4, 16, 'Laporan Barang Hilang', 'laporan/baranghilang', 'far fa-circle nav-icon', 1, 'admin', '2022-12-25 02:12:14', NULL, NULL),
(54, 4, 17, 'Laporan Barang Rusak', 'laporan/barangrusak', 'far fa-circle nav-icon', 1, 'admin', '2022-12-25 02:12:14', NULL, NULL),
(55, 4, 18, 'Laporan Rekapitulasi', 'laporan/stokbarang', 'far fa-circle nav-icon', 1, 'admin', '2022-12-25 04:12:32', 'admin', '2023-08-03 07:08:23'),
(56, 4, 19, 'Laporan Laba/Rugi', 'laporan/labarugi', 'far fa-circle nav-icon', 2, 'admin', '2023-07-07 01:07:31', 'admin', '2023-07-07 01:07:31'),
(57, 11, 1, 'Barang Masuk', 'toko/barangmasuk', 'far fa-circle nav-icon', 1, 'admin', '2023-07-10 08:07:01', NULL, NULL),
(58, 11, 2, 'Barang Keluar', 'toko/barangkeluar', 'far fa-circle nav-icon', 1, 'admin', '2023-07-10 08:07:01', NULL, NULL),
(59, 11, 3, 'Barang Hilang', 'toko/baranghilang', 'far fa-circle nav-icon', 1, 'admin', '2023-07-10 08:07:01', NULL, NULL),
(60, 11, 4, 'Barang Rusak', 'toko/barangrusak', 'far fa-circle nav-icon', 1, 'admin', '2023-07-10 08:07:02', NULL, NULL),
(61, 2, 6, 'Jenis Barang', 'master/jenisbarang', 'far fa-circle nav-icon', 1, 'admin', '2023-07-10 08:07:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id_supplier` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL DEFAULT '',
  `nama_supplier` varchar(100) NOT NULL,
  `penanggungjawab` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `kode`, `nama_supplier`, `penanggungjawab`, `alamat`, `nohp`, `status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 'SP00001', 'CV. MAHABAH', 'ARIF', 'Balikpapan', '082151365656', 1, 'admin', '2022-12-24 04:12:58', 'admin', '2023-08-04 01:08:56'),
(3, 'SP00002', 'CV. SUKADANA', 'AIDI', 'Banjarmasin', '089634895431', 1, 'admin', '2022-12-25 04:12:06', 'admin', '2023-08-04 01:08:57'),
(4, 'SP00003', 'CV. ANTERCEPAT', 'ALIM YUDHISTHIRO ADI JAYA', 'Banjarbaru', '085246689631', 1, 'admin', '2023-02-15 05:02:14', 'admin', '2023-08-04 01:08:57'),
(5, 'SP00004', 'CV. SUKAMAJU', 'SHOLEHAH', 'Palangkaraya', '081245689021', 1, 'admin', '2023-02-15 05:02:15', 'admin', '2023-08-04 01:08:57'),
(6, 'SP00005', 'CV. PERANTAJAYA', 'ZAINUDDIN', 'Sampit', '089634567812', 1, 'admin', '2023-02-15 05:02:16', 'admin', '2023-08-04 01:08:59'),
(7, 'SP00006', 'CV. ABADI JAYA', 'RAHMAT HIDAYATULLAH', 'Pulang Pisau', '089642786511', 1, 'admin', '2023-02-18 08:02:09', 'admin', '2023-08-04 01:08:59'),
(8, 'SP00007', 'CV. BARITO JAYA', 'HERY OQTARY', 'Marabahan', '085234765432', 1, 'admin', '2023-02-18 08:02:10', 'admin', '2023-08-04 01:08:59'),
(9, 'SP00008', 'CV. SELAT JAYA', 'RUDIANSYAH', 'Basarang', '081245637890', 1, 'admin', '2023-02-18 08:02:11', 'admin', '2023-08-04 02:08:00'),
(10, 'SP00009', 'CV. MAKMUR', 'MUHAMMAD MUFTI ARIFUDDIN', 'Barito Selatan', '089675431278', 1, 'admin', '2023-02-18 08:02:12', 'admin', '2023-08-04 02:08:00'),
(11, 'SP00010', 'CV. HARAKAT', 'MUHAMMAD DAILAMI', 'Tanjung', '089654324567', 1, 'admin', '2023-02-18 08:02:13', 'admin', '2023-08-04 02:08:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE IF NOT EXISTS `toko` (
`id_toko` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL DEFAULT '',
  `nama_toko` varchar(100) NOT NULL,
  `nama_kepala` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `kode`, `nama_toko`, `nama_kepala`, `alamat`, `nohp`, `username`, `password`, `status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(5, 'THXU', 'A.YANI KM 19', 'MUHAMMAD RAFLI', 'JL MADU MANIS', '087723491677', 'RAFLI', '$2y$10$VgV3hYsLCg8Whgvrp2iP0.yahRoOAjJYB4Pk7qkpKp5uc3lUDTL/a', 1, 'admin', '2023-07-26 06:07:48', 'admin', '2023-07-26 06:07:50'),
(6, 'TUAD', 'PERDAGANGAN', 'SEFTIY ELLYSA PUTRI', 'JL MURAI RT 000 RW 000 KEL CINDAI ALUS', '085349714556', 'SEFTIY', '$2y$10$gRnPFTy/8essHfgJ.I1k4enByoCaVsFzYGZM4KA7bdfTVxnA5/vAS', 1, 'admin', '2023-07-26 09:07:37', NULL, NULL),
(7, 'TUWJ', 'KUIN CERUCUK', 'DITA IRA SETIANI', 'JL MELATI RT 004 RW 002 KEL BINCAU', '085392269000', 'DITA', '$2y$10$6lG8QjOd9Z.iTH.STeTGlOT.d1Rvk9isawy6DpvXNxo7Pi.0Lv3mC', 1, 'admin', '2023-07-26 09:07:37', NULL, NULL),
(8, 'TDN8', 'A. YANI KM 41', 'AHMAD SADILA RAHMAN', 'JL TANJUNG REMA GG JAMALUDIN RT 001 RW 001 KEL TANJUNG REMA', '081935410059', 'AHMAD', '$2y$10$V/POut9gU1B6fbDxefRK7ervRO9OsyMgSJTmY3UOqvDuwIzl4g2K2', 1, 'admin', '2023-07-26 09:07:38', NULL, NULL),
(9, 'T3QD', 'FRESH PERUM HKSN', 'M FAZARLI', 'KOMP SAADAH II RT 015 RW 004 KEL SUNGAI PARING', '085248578823', 'FAZRLI', '$2y$10$7oQTnHs6EG8Fzp0j5aL64OUdLO6tIMWZc/Hbm8raTfk895KmXxsw.', 1, 'admin', '2023-07-26 09:07:39', 'admin', '2023-07-26 09:07:39'),
(10, 'T7AR', 'GOLF RAYA', 'MUHAMMAD RICKY', 'MURUNG SEBERANG MESJID RT 003 RW 001 KEL MURUNG KERATON', '081882869029', 'RICKY', '$2y$10$cJfMxQBjlWgWGS/MEWGPous24G1N37AQeC9CwUtmeIEnCmcqgMvwa', 1, 'admin', '2023-07-26 09:07:40', NULL, NULL),
(11, 'TE5H', 'FRESH A. YANI KM 24.7', 'LENI MARLINA', 'HANDIL DUA RT 001 RW 000 KEL DESA MAKMUR', '089563524000', 'LENI', '$2y$10$VNSkOidNsqUMA4pc.x2A0OD4rGuQ9lc7ZPVFB4mqm3nPYeLHVrO.2', 1, 'admin', '2023-07-26 09:07:40', NULL, NULL),
(12, 'T0RR', 'TRIKORA', 'NORHADINI', 'KELADAN BARU RT 001 RW 000 KEL DESA KELADAN BARU', '085387505657', 'NORHADINI', '$2y$10$fi39uAWG8lo1ec28Fdf15u4KMs3Kb2KS3Z55n93P6u9Dx7hHfCAzm', 1, 'admin', '2023-07-26 09:07:41', NULL, NULL),
(13, 'THYH', 'A. YANI KM 37.2', 'MUHAMMAD SALEHEN', 'JL A YANI KM 7 400 RT 016 RW 001 KEL DESA KERTAK HANYAR II', '081252849994', 'SALEHEN', '$2y$10$KckyQY.zLlX1kUUpk2oJ7OVFDZAvEtzyFVh4Ty0dQx5.NACFgEe7G', 1, 'admin', '2023-07-26 09:07:42', NULL, NULL),
(14, 'TXEY', 'RO ULIN', 'AHMAD YUNANI', 'SUNGAI BAKUNG RT 007 RW 000 KEL DESA SUNGAI BAKUNG', '085820307401', 'YUNANI', '$2y$10$cNZa.e73RPMOW0FwY7OapetZuy7N/3i1s3MXUuKrbnStWcBqbSO1W', 1, 'admin', '2023-07-26 09:07:42', NULL, NULL),
(15, 'T4YX', 'MUHAMMAD FIQRY RAMADHAN', 'A. YANI KM .', 'SUNGAI PINANG LAMA RT 006 RW 000 KEL DESA SUNGAI PINANG LAMA', '089691460389', 'FIQRY', '$2y$10$3LoL5LH6D3nvbJlhVkN1deTjXMOLHNoTwqhjGbB31/wmHH.BE1A9i', 1, 'admin', '2023-08-04 02:08:06', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
 ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `aksesmenu`
--
ALTER TABLE `aksesmenu`
 ADD PRIMARY KEY (`id_aksesmenu`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `baranghilang`
--
ALTER TABLE `baranghilang`
 ADD PRIMARY KEY (`id_baranghilang`);

--
-- Indexes for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
 ADD PRIMARY KEY (`id_barangkeluar`);

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
 ADD PRIMARY KEY (`id_barangmasuk`);

--
-- Indexes for table `barangrusak`
--
ALTER TABLE `barangrusak`
 ADD PRIMARY KEY (`id_barangrusak`);

--
-- Indexes for table `daftarbarangkeluar`
--
ALTER TABLE `daftarbarangkeluar`
 ADD PRIMARY KEY (`id_daftarbarangkeluar`);

--
-- Indexes for table `daftarbarangmasuk`
--
ALTER TABLE `daftarbarangmasuk`
 ADD PRIMARY KEY (`id_daftarbarangmasuk`);

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
 ADD PRIMARY KEY (`id_ekspedisi`);

--
-- Indexes for table `golpangkat`
--
ALTER TABLE `golpangkat`
 ADD PRIMARY KEY (`id_golpangkat`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
 ADD PRIMARY KEY (`id_jenisbarang`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
 ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pejabat_ttd`
--
ALTER TABLE `pejabat_ttd`
 ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
 ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pengirimanbarang`
--
ALTER TABLE `pengirimanbarang`
 ADD PRIMARY KEY (`id_pengirimanbarang`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
 ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
 ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
 ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `aksesmenu`
--
ALTER TABLE `aksesmenu`
MODIFY `id_aksesmenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `baranghilang`
--
ALTER TABLE `baranghilang`
MODIFY `id_baranghilang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
MODIFY `id_barangkeluar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
MODIFY `id_barangmasuk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `barangrusak`
--
ALTER TABLE `barangrusak`
MODIFY `id_barangrusak` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `daftarbarangkeluar`
--
ALTER TABLE `daftarbarangkeluar`
MODIFY `id_daftarbarangkeluar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `daftarbarangmasuk`
--
ALTER TABLE `daftarbarangmasuk`
MODIFY `id_daftarbarangmasuk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
MODIFY `id_ekspedisi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `golpangkat`
--
ALTER TABLE `golpangkat`
MODIFY `id_golpangkat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
MODIFY `id_jenisbarang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pejabat_ttd`
--
ALTER TABLE `pejabat_ttd`
MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengirimanbarang`
--
ALTER TABLE `pengirimanbarang`
MODIFY `id_pengirimanbarang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
