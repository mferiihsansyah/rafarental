-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2019 pada 02.24
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_admin`
--

CREATE TABLE `bb_admin` (
  `id_admin` int(2) NOT NULL,
  `username_admin` varchar(35) NOT NULL,
  `password_admin` text NOT NULL,
  `date_admin` date NOT NULL,
  `time_admin` time NOT NULL,
  `date_time_admin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_admin`
--

INSERT INTO `bb_admin` (`id_admin`, `username_admin`, `password_admin`, `date_admin`, `time_admin`, `date_time_admin`) VALUES
(1, 'admin', '9b2b2b708fc80ce45315e7ea2837d58a', '2017-07-01', '01:00:00', '2017-07-01 01:00:00'),
(3, 'fery', 'dfd1f77aa12baacdba90554cc7cf4529', '2019-07-18', '06:04:00', '2019-06-21 09:14:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_bank`
--

CREATE TABLE `bb_bank` (
  `id_bank` int(3) NOT NULL,
  `name_bank` varchar(45) NOT NULL,
  `acc_bank` varchar(25) NOT NULL,
  `owner_bank` varchar(45) NOT NULL,
  `logo_bank` varchar(45) NOT NULL,
  `date_bank` date NOT NULL,
  `time_bank` time NOT NULL,
  `date_time_bank` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_bank`
--

INSERT INTO `bb_bank` (`id_bank`, `name_bank`, `acc_bank`, `owner_bank`, `logo_bank`, `date_bank`, `time_bank`, `date_time_bank`) VALUES
(1, 'BCA', '88348384', 'Rafa Rental', 'tg1501078655.png', '2019-07-01', '21:29:46', '2019-07-01 21:29:46'),
(2, 'Mandiri', '14141131', 'Rafa Rental', 'tg1501154838.png', '2019-07-01', '21:29:56', '2019-07-01 21:29:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_category`
--

CREATE TABLE `bb_category` (
  `id_cat` int(3) NOT NULL,
  `name_cat` varchar(35) NOT NULL,
  `desc_cat` text NOT NULL,
  `slug_cat` text NOT NULL,
  `date_cat` date NOT NULL,
  `time_cat` time NOT NULL,
  `date_time_cat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_category`
--

INSERT INTO `bb_category` (`id_cat`, `name_cat`, `desc_cat`, `slug_cat`, `date_cat`, `time_cat`, `date_time_cat`) VALUES
(1, 'MPV', 'Bus besar dapat menampung banyak penumpang', 'mpv', '2019-07-01', '21:29:02', '2019-07-01 21:29:02'),
(2, 'SUV', 'Bus dengan berukuran sedang', 'suv', '2019-07-01', '21:29:10', '2019-07-01 21:29:10');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `bb_customer`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `bb_customer` (
`name_inv` varchar(45)
,`email_inv` varchar(35)
,`date_inv` date
,`transaksi_terakhir` int(7)
,`total_transaksi` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_idea`
--

CREATE TABLE `bb_idea` (
  `id_idea` int(4) NOT NULL,
  `name_id` varchar(25) NOT NULL,
  `idea` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_idea`
--

INSERT INTO `bb_idea` (`id_idea`, `name_id`, `idea`) VALUES
(1, 'Rafa Rental', 'Testing'),
(2, 'Fery', 'Testing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_invoice`
--

CREATE TABLE `bb_invoice` (
  `id_inv` int(3) NOT NULL,
  `id_vh` int(3) NOT NULL,
  `status_inv` int(1) NOT NULL,
  `code_inv` varchar(13) NOT NULL,
  `name_inv` varchar(45) NOT NULL,
  `handphone_inv` varchar(20) NOT NULL,
  `email_inv` varchar(35) NOT NULL,
  `destination_inv` text NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `finish_date` date NOT NULL,
  `long_inv` int(3) NOT NULL,
  `total_inv` varchar(35) NOT NULL,
  `code_promo` varchar(16) NOT NULL,
  `penalty_inv` varchar(45) NOT NULL,
  `img_inv` text NOT NULL,
  `id_bank` int(2) NOT NULL,
  `date_inv` date NOT NULL,
  `date_time_inv` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_invoice`
--

INSERT INTO `bb_invoice` (`id_inv`, `id_vh`, `status_inv`, `code_inv`, `name_inv`, `handphone_inv`, `email_inv`, `destination_inv`, `start_date`, `start_time`, `finish_date`, `long_inv`, `total_inv`, `code_promo`, `penalty_inv`, `img_inv`, `id_bank`, `date_inv`, `date_time_inv`) VALUES
(40, 12, 9, '1906267834147', 'Muhammad Fery', '082181773085', 'ihsansyahf@gmail.com', 'Palembang', '2019-06-27', '19:00:00', '2019-06-29', 2, '1300000', '', '', '', 1, '2019-06-26', '2019-06-26 18:42:51'),
(42, 12, 2, '1906295677609', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-06-29', '15:00:00', '2019-07-02', 3, '1950000', '', '', '246x0w.jpg', 2, '2019-06-29', '2019-06-29 12:11:04'),
(43, 12, 9, '1906298897655', 'Muhammad Fery', '082181773085', 'ihsansyahf@gmail.com', 'Palembang', '2019-06-29', '16:00:00', '2019-07-03', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 12:18:44'),
(45, 12, 9, '1906295879928', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-06-30', '15:00:00', '2019-07-04', 4, '2600000', '', '', '', 2, '2019-06-29', '2019-06-29 12:19:18'),
(46, 15, 9, '1906293491199', 'Muhammad Feryy', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '17:00:00', '2019-07-06', 5, '1750000', '', '', '', 1, '2019-06-29', '2019-06-29 12:23:58'),
(47, 12, 9, '1906291696024', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 13:56:13'),
(48, 12, 9, '1906296622391', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 13:59:51'),
(49, 12, 9, '1906294095572', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 13:59:59'),
(50, 12, 9, '1906294016948', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 14:00:37'),
(51, 12, 9, '1906295644942', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 14:01:05'),
(52, 12, 9, '1906296117558', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 14:04:04'),
(53, 12, 9, '1906294788532', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 14:05:42'),
(54, 12, 9, '1906296128770', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 14:06:15'),
(55, 12, 9, '1906292379169', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 14:08:07'),
(56, 12, 9, '1906295294050', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 14:09:03'),
(58, 12, 9, '1906296150113', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 14:12:46'),
(59, 12, 9, '1906291342009', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 14:13:37'),
(60, 12, 9, '1906293075846', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-07-01', '15:00:00', '2019-07-05', 4, '2600000', '', '', '', 1, '2019-06-29', '2019-06-29 14:14:52'),
(61, 15, 2, '1907048779896', 'Fery Ihsansyah', '082181773085', 'ihsansyahf@gmail.com', 'Palembang', '2019-07-04', '15:00:00', '2019-07-06', 2, '740000', '', '', '20190702_154638.jpg', 2, '2019-07-04', '2019-07-04 08:37:37'),
(62, 15, 9, '1907048662986', 'Ihsansyah Fery', '082181773085', 'ihsansyahf@gmail.com', 'Palembang', '2019-07-05', '19:00:00', '2019-07-07', 2, '740000', '', '', '', 1, '2019-07-04', '2019-07-04 08:39:08'),
(63, 15, 1, '1907088959213', 'Muhammad Fahri', '021312332322', 'mfahri1997@gmail.com', 'Palembang', '2019-07-08', '15:00:00', '2019-07-12', 4, '1480000', '', '', '246x0w.jpg', 2, '2019-07-08', '2019-07-08 09:58:09'),
(64, 21, 9, '1907231059470', 'aditia yusuf', '0822222222', 'aditiayusuf86@gmail.com', 'Palembang', '2019-07-26', '18:00:00', '2019-07-29', 3, '1650000', '', '', '', 1, '2019-07-23', '2019-07-23 19:46:15'),
(65, 47, 9, '1909201415345', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Dalam Kota', '2019-09-21', '00:00:00', '2019-09-23', 2, '640000', '', '', '', 2, '2019-09-20', '2019-09-20 07:29:15'),
(66, 47, 9, '1909204211340', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Dalam Kota', '2019-09-12', '00:00:00', '2019-09-16', 4, '1280000', '', '', '', 1, '2019-09-20', '2019-09-20 07:45:53'),
(67, 47, 9, '1909208685103', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Dalam Kota', '2019-09-12', '00:00:00', '2019-09-16', 4, '1280000', '', '', '', 1, '2019-09-20', '2019-09-20 07:46:47'),
(68, 47, 0, '1909201993086', 'Muhammad Fery', '082181773085', 'ihsansyahf@gmail.com', 'Luar Kota', '2019-09-22', '00:00:00', '2019-09-25', 3, '1260000', '', '', '', 2, '2019-09-20', '2019-09-20 18:33:31'),
(69, 21, 0, '1909203616980', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Palembang', '2019-06-27', '19:00:00', '2019-06-30', 3, '1650000', '', '', '', 1, '2019-09-20', '2019-09-20 18:36:39'),
(70, 47, 0, '1909205168230', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Dalam Kota', '2019-09-21', '00:00:00', '2019-09-23', 2, '640000', '', '', '', 1, '2019-09-20', '2019-09-20 19:56:05'),
(71, 47, 0, '1909207908621', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Dalam Kota', '2019-09-21', '00:00:00', '2019-09-23', 2, '640000', '4524D2S72BC', '', '', 1, '2019-09-20', '2019-09-20 19:57:21'),
(72, 47, 0, '1909219221033', 'Muhammad Fery', '082181773085', 'ihsansyahf@gmail.com', 'Luar Kota', '2019-09-12', '00:00:00', '2019-09-14', 2, '840000', '', '', '', 1, '2019-09-21', '2019-09-21 07:05:02'),
(73, 47, 0, '1909212608271', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Luar Kota', '2019-09-13', '00:00:00', '2019-09-14', 1, '420000', '', '', '', 2, '2019-09-21', '2019-09-21 07:18:49'),
(74, 47, 0, '1909219133376', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Dalam Kota', '2019-09-28', '00:00:00', '2019-09-30', 2, '336000', '', '', '', 1, '2019-09-21', '2019-09-21 07:22:45'),
(75, 47, 0, '1909213351504', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Dalam Kota', '2019-09-28', '00:00:00', '2019-09-30', 2, '624000', '', '', '', 1, '2019-09-21', '2019-09-21 07:24:10'),
(76, 47, 0, '1909252303588', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Luar Kota', '2019-09-26', '00:00:00', '2019-09-29', 3, '1239000', '', '', '', 1, '2019-09-25', '2019-09-25 18:24:29'),
(77, 47, 0, '1909258620236', 'Muhammad Fery', '082181773085', 'thefery123@gmail.com', 'Dalam Kota', '2019-09-26', '00:00:00', '2019-09-28', 2, '624000', '', '', '', 1, '2019-09-25', '2019-09-25 18:26:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_menu`
--

CREATE TABLE `bb_menu` (
  `id_menu` int(5) NOT NULL,
  `id_page` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_menu`
--

INSERT INTO `bb_menu` (`id_menu`, `id_page`) VALUES
(26, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_meta_category`
--

CREATE TABLE `bb_meta_category` (
  `id_mc` int(3) NOT NULL,
  `id_cat` int(3) NOT NULL,
  `id_vh` int(3) NOT NULL,
  `date_mc` date NOT NULL,
  `time_mc` time NOT NULL,
  `date_time_mc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_meta_category`
--

INSERT INTO `bb_meta_category` (`id_mc`, `id_cat`, `id_vh`, `date_mc`, `time_mc`, `date_time_mc`) VALUES
(2, 1, 2, '2017-07-17', '16:14:58', '2017-07-17 16:14:58'),
(3, 2, 3, '2017-07-17', '16:17:54', '2017-07-17 16:17:54'),
(4, 1, 4, '2017-08-01', '21:31:03', '2017-08-01 21:31:03'),
(5, 1, 5, '2017-08-01', '21:56:27', '2017-08-01 21:56:27'),
(6, 2, 6, '2017-08-01', '22:02:12', '2017-08-01 22:02:12'),
(7, 5, 7, '2017-11-13', '21:25:46', '2017-11-13 21:25:46'),
(8, 0, 8, '2017-12-10', '16:30:36', '2017-12-10 16:30:36'),
(9, 1, 9, '2017-12-10', '16:31:00', '2017-12-10 16:31:00'),
(10, 1, 10, '2019-06-23', '20:28:58', '2019-06-23 20:28:58'),
(11, 2, 11, '2019-06-23', '20:30:50', '2019-06-23 20:30:50'),
(12, 2, 12, '2019-06-23', '20:37:31', '2019-06-23 20:37:31'),
(13, 5, 13, '2019-06-23', '20:39:21', '2019-06-23 20:39:21'),
(14, 5, 14, '2019-06-23', '20:40:38', '2019-06-23 20:40:38'),
(15, 1, 15, '2019-06-23', '20:42:20', '2019-06-23 20:42:20'),
(16, 2, 16, '2019-07-01', '19:12:09', '2019-07-01 19:12:09'),
(17, 2, 17, '2019-07-01', '19:14:10', '2019-07-01 19:14:10'),
(18, 1, 18, '2019-07-01', '21:23:43', '2019-07-01 21:23:43'),
(19, 2, 18, '2019-07-01', '21:23:43', '2019-07-01 21:23:43'),
(20, 2, 19, '2019-07-01', '21:24:27', '2019-07-01 21:24:27'),
(21, 2, 20, '2019-07-01', '21:25:28', '2019-07-01 21:25:28'),
(22, 2, 21, '2019-07-01', '21:26:11', '2019-07-01 21:26:11'),
(23, 2, 0, '0000-00-00', '00:00:00', '0000-00-00 00:00:00'),
(24, 2, 0, '0000-00-00', '00:00:00', '0000-00-00 00:00:00'),
(25, 2, 0, '0000-00-00', '00:00:00', '0000-00-00 00:00:00'),
(26, 2, 0, '0000-00-00', '00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_meta_seat`
--

CREATE TABLE `bb_meta_seat` (
  `id_ms` int(3) NOT NULL,
  `id_seat` int(3) NOT NULL,
  `id_vh` int(3) NOT NULL,
  `date_ms` date NOT NULL,
  `time_ms` time NOT NULL,
  `date_time_ms` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_meta_seat`
--

INSERT INTO `bb_meta_seat` (`id_ms`, `id_seat`, `id_vh`, `date_ms`, `time_ms`, `date_time_ms`) VALUES
(3, 1, 2, '2017-07-17', '16:14:58', '0000-00-00 00:00:00'),
(4, 2, 2, '2017-07-17', '16:14:58', '0000-00-00 00:00:00'),
(5, 3, 3, '2017-07-17', '16:17:54', '0000-00-00 00:00:00'),
(6, 4, 3, '2017-07-17', '16:17:54', '0000-00-00 00:00:00'),
(7, 1, 4, '2017-08-01', '21:31:03', '0000-00-00 00:00:00'),
(8, 1, 5, '2017-08-01', '21:56:27', '0000-00-00 00:00:00'),
(9, 2, 5, '2017-08-01', '21:56:27', '0000-00-00 00:00:00'),
(10, 1, 6, '2017-08-01', '22:02:12', '0000-00-00 00:00:00'),
(11, 3, 6, '2017-08-01', '22:02:12', '0000-00-00 00:00:00'),
(12, 4, 6, '2017-08-01', '22:02:12', '0000-00-00 00:00:00'),
(13, 1, 7, '2017-11-13', '21:25:46', '0000-00-00 00:00:00'),
(14, 0, 8, '2017-12-10', '16:30:36', '0000-00-00 00:00:00'),
(15, 5, 9, '2017-12-10', '16:31:00', '0000-00-00 00:00:00'),
(16, 7, 10, '2019-06-23', '20:28:58', '0000-00-00 00:00:00'),
(17, 7, 11, '2019-06-23', '20:30:50', '0000-00-00 00:00:00'),
(18, 7, 12, '2019-06-23', '20:37:31', '0000-00-00 00:00:00'),
(19, 7, 13, '2019-06-23', '20:39:21', '0000-00-00 00:00:00'),
(20, 5, 14, '2019-06-23', '20:40:38', '0000-00-00 00:00:00'),
(21, 7, 15, '2019-06-23', '20:42:20', '0000-00-00 00:00:00'),
(22, 7, 16, '2019-07-01', '19:12:09', '0000-00-00 00:00:00'),
(23, 7, 17, '2019-07-01', '19:14:10', '0000-00-00 00:00:00'),
(24, 7, 18, '2019-07-01', '21:23:43', '0000-00-00 00:00:00'),
(25, 7, 19, '2019-07-01', '21:24:27', '0000-00-00 00:00:00'),
(26, 7, 20, '2019-07-01', '21:25:28', '0000-00-00 00:00:00'),
(27, 7, 21, '2019-07-01', '21:26:11', '0000-00-00 00:00:00'),
(28, 7, 0, '0000-00-00', '00:00:00', '0000-00-00 00:00:00'),
(29, 7, 0, '0000-00-00', '00:00:00', '0000-00-00 00:00:00'),
(30, 7, 0, '0000-00-00', '00:00:00', '0000-00-00 00:00:00'),
(31, 6, 0, '0000-00-00', '00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_page`
--

CREATE TABLE `bb_page` (
  `id_page` int(3) NOT NULL,
  `name_page` varchar(45) NOT NULL,
  `desc_page` text NOT NULL,
  `slug_page` text NOT NULL,
  `date_page` date NOT NULL,
  `time_page` time NOT NULL,
  `date_time_page` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_page`
--

INSERT INTO `bb_page` (`id_page`, `name_page`, `desc_page`, `slug_page`, `date_page`, `time_page`, `date_time_page`) VALUES
(1, 'Kontak Kami', '<h3 style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 32px; margin: 0px; outline: 0px; padding: 0px 0px 18px; vertical-align: baseline;\"><span style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Telp 081377516048</span></h3><h3 style=\"border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 34px; margin: 0px; outline: 0px; padding: 0px 0px 18px; vertical-align: baseline;\">Hp 0711-570-2194</h3><div><br></div>', 'kontak-kami', '2018-07-25', '18:43:55', '2017-07-25 18:43:55'),
(2, 'Tentang Kami', '<p>Deskripsi mobil. . .</p>', 'tentang-kami', '2018-08-01', '20:24:49', '2017-08-01 20:24:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_promo`
--

CREATE TABLE `bb_promo` (
  `codepromo` varchar(12) NOT NULL,
  `nm_promo` varchar(25) NOT NULL,
  `ds_promo` int(3) NOT NULL,
  `jl_promo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_promo`
--

INSERT INTO `bb_promo` (`codepromo`, `nm_promo`, `ds_promo`, `jl_promo`) VALUES
('4524D2S72BCD', 'Pelanggan Baru', 5, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_seat`
--

CREATE TABLE `bb_seat` (
  `id_seat` int(3) NOT NULL,
  `total_seat` varchar(3) NOT NULL,
  `date_seat` date NOT NULL,
  `time_seat` time NOT NULL,
  `date_time_seat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_seat`
--

INSERT INTO `bb_seat` (`id_seat`, `total_seat`, `date_seat`, `time_seat`, `date_time_seat`) VALUES
(6, '8', '2018-11-13', '21:33:10', '2017-11-13 21:33:10'),
(7, '4', '2018-11-13', '21:33:18', '2017-11-13 21:33:18'),
(8, '6', '0000-00-00', '00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_setting`
--

CREATE TABLE `bb_setting` (
  `id_ws` int(11) NOT NULL,
  `name_ws` varchar(45) NOT NULL,
  `slogan_ws` varchar(55) NOT NULL,
  `telp_ws` varchar(19) NOT NULL,
  `email_ws` varchar(45) NOT NULL,
  `address_ws` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_setting`
--

INSERT INTO `bb_setting` (`id_ws`, `name_ws`, `slogan_ws`, `telp_ws`, `email_ws`, `address_ws`) VALUES
(1, 'Rafa Rental Mobil Palembang', 'Rental Kendaraan yang Nyaman dan Bersih serta Ramah', '081377516048', 'author@mail.com', 'Jl. Jend. Basuki Rachmat No.1, Pahlawan, Kec. Kemuning, Kota Palembang, Sumatera Selatan 30151');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_user`
--

CREATE TABLE `bb_user` (
  `id_cs` int(4) NOT NULL,
  `username_cs` varchar(40) NOT NULL,
  `name_inv` varchar(50) NOT NULL,
  `email_cs` varchar(50) NOT NULL,
  `pass_cs` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_user`
--

INSERT INTO `bb_user` (`id_cs`, `username_cs`, `name_inv`, `email_cs`, `pass_cs`, `alamat`) VALUES
(1, 'feryihsan', 'Fery Ihsansyah', 'ihsansyahf@gmail.com', 'dfd1f77aa12baacdba90554cc7cf4529', ''),
(2, 'mfery', 'Muhammad Fery', 'ihsansyahf@gmail.com', 'd0256bd76c9e1fe1c7f606009fdbf5ff', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_vehicle`
--

CREATE TABLE `bb_vehicle` (
  `id_vh` int(3) NOT NULL,
  `name_vh` varchar(35) NOT NULL,
  `desc_vh` text NOT NULL,
  `slug_vh` text NOT NULL,
  `price_vh` varchar(35) NOT NULL,
  `qty_vh` int(3) NOT NULL,
  `type_vh` varchar(20) NOT NULL,
  `seat_vh` int(5) NOT NULL,
  `image_vh` text NOT NULL,
  `date_vh` date NOT NULL,
  `time_vh` time NOT NULL,
  `date_time_vh` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_vehicle`
--

INSERT INTO `bb_vehicle` (`id_vh`, `name_vh`, `desc_vh`, `slug_vh`, `price_vh`, `qty_vh`, `type_vh`, `seat_vh`, `image_vh`, `date_vh`, `time_vh`, `date_time_vh`) VALUES
(21, 'Pajero', 'Deskripsi Kendaraan . . .', 'pajero', '550000', 1, 'SUV', 4, '085299300_1542946342-kdakjasd.jpg', '2019-07-02', '18:23:48', '2019-07-02 18:23:48'),
(47, 'Xenia', 'Deskripsi Mobil', '', '320000', 6, 'MPV', 8, 'f5bef1b9-08c3-41dc-92b1-8c43682091e0.jpeg', '0000-00-00', '00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur untuk view `bb_customer`
--
DROP TABLE IF EXISTS `bb_customer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bb_customer`  AS  select `bb_invoice`.`name_inv` AS `name_inv`,`bb_invoice`.`email_inv` AS `email_inv`,`bb_invoice`.`date_inv` AS `date_inv`,to_days(curdate()) - to_days(`bb_invoice`.`date_inv`) AS `transaksi_terakhir`,count(0) AS `total_transaksi` from `bb_invoice` group by `bb_invoice`.`name_inv` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bb_admin`
--
ALTER TABLE `bb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `bb_bank`
--
ALTER TABLE `bb_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `bb_category`
--
ALTER TABLE `bb_category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indeks untuk tabel `bb_idea`
--
ALTER TABLE `bb_idea`
  ADD PRIMARY KEY (`id_idea`);

--
-- Indeks untuk tabel `bb_invoice`
--
ALTER TABLE `bb_invoice`
  ADD PRIMARY KEY (`id_inv`);

--
-- Indeks untuk tabel `bb_menu`
--
ALTER TABLE `bb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `bb_meta_category`
--
ALTER TABLE `bb_meta_category`
  ADD PRIMARY KEY (`id_mc`);

--
-- Indeks untuk tabel `bb_meta_seat`
--
ALTER TABLE `bb_meta_seat`
  ADD PRIMARY KEY (`id_ms`);

--
-- Indeks untuk tabel `bb_page`
--
ALTER TABLE `bb_page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indeks untuk tabel `bb_promo`
--
ALTER TABLE `bb_promo`
  ADD PRIMARY KEY (`codepromo`);

--
-- Indeks untuk tabel `bb_seat`
--
ALTER TABLE `bb_seat`
  ADD PRIMARY KEY (`id_seat`);

--
-- Indeks untuk tabel `bb_setting`
--
ALTER TABLE `bb_setting`
  ADD PRIMARY KEY (`id_ws`);

--
-- Indeks untuk tabel `bb_user`
--
ALTER TABLE `bb_user`
  ADD PRIMARY KEY (`id_cs`);

--
-- Indeks untuk tabel `bb_vehicle`
--
ALTER TABLE `bb_vehicle`
  ADD PRIMARY KEY (`id_vh`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bb_admin`
--
ALTER TABLE `bb_admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bb_bank`
--
ALTER TABLE `bb_bank`
  MODIFY `id_bank` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bb_category`
--
ALTER TABLE `bb_category`
  MODIFY `id_cat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `bb_idea`
--
ALTER TABLE `bb_idea`
  MODIFY `id_idea` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bb_invoice`
--
ALTER TABLE `bb_invoice`
  MODIFY `id_inv` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `bb_menu`
--
ALTER TABLE `bb_menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `bb_meta_category`
--
ALTER TABLE `bb_meta_category`
  MODIFY `id_mc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `bb_meta_seat`
--
ALTER TABLE `bb_meta_seat`
  MODIFY `id_ms` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `bb_page`
--
ALTER TABLE `bb_page`
  MODIFY `id_page` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bb_seat`
--
ALTER TABLE `bb_seat`
  MODIFY `id_seat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `bb_setting`
--
ALTER TABLE `bb_setting`
  MODIFY `id_ws` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bb_user`
--
ALTER TABLE `bb_user`
  MODIFY `id_cs` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bb_vehicle`
--
ALTER TABLE `bb_vehicle`
  MODIFY `id_vh` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
