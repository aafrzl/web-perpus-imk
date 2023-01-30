-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 10:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama_anggota`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
(1, 'John Doe', 'L', 'Jalan 1', 2147483647),
(2, 'Jane Doe', 'P', 'Jalan 2', 2147483647),
(5, 'Michael Jordan', 'L', 'Jalan 5', 2147483647),
(9, 'Tom Cruise', 'L', 'Jalan 9', 2147483647),
(10, 'Katie Holmes', 'P', 'Jalan 10', 2147483647),
(13, 'Alex Turner', 'L', 'Jalan Raya 123', 2147483647),
(14, 'Lana Del Rey', 'P', 'Jalan Kota 2', 2147483647),
(15, 'Arctic Monkeys', 'L', 'Jalan Raya 3', 2147483647),
(16, 'The Killers', 'L', 'Jalan Kota 4', 2147483647),
(17, 'Marina Diamandis', 'P', 'Jalan Raya 5', 2147483647),
(18, 'Imagine Dragons', 'L', 'Jalan Kota 6', 2147483647),
(19, 'Hozier', 'L', 'Jalan Raya 7', 2147483647),
(20, 'Bastille', 'L', 'Jalan Kota 8', 2147483647),
(21, 'Florence + The Machine', 'P', 'Jalan Raya 9', 2147483647),
(22, 'The 1975', 'L', 'Jalan Kota 10', 2147483647),
(23, 'Dua Lipa', 'P', 'Jalan Raya 11', 2147483647),
(24, 'Billie Eilish', 'P', 'Jalan Kota 12', 2147483647),
(25, 'Lewis Capaldi', 'L', 'Jalan Raya 13', 2147483647),
(26, 'Tame Impala', 'L', 'Jalan Kota 14', 2147483647),
(27, 'Khalid', 'L', 'Jalan Raya 15', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` varchar(7) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah`) VALUES
('BK0001', 'The Great Gatsby', 'F. Scott Fitzgerald', 'Charles Scribner’s Sons', 1925, 50),
('BK0002', 'To Kill a Mockingbird', 'Harper Lee', 'J. B. Lippincott & Co.', 1960, 60),
('BK0003', 'Pride and Prejudice', 'Jane Austen', 'Thomas Egerton', 1913, 70),
('BK0004', 'The Lord of the Rings', 'J. R. R. Tolkien', 'George Allen & Unwin', 1954, 79),
('BK0005', 'The Catcher in the Rye', 'J. D. Salinger', 'Little, Brown and Company', 1951, 90),
('BK0006', '1984', 'George Orwell', 'Secker and Warburg', 1949, 98),
('BK0007', 'One Hundred Years of Solitude', 'Gabriel García Márquez', 'Harper & Row', 1967, 109),
('BK0009', 'The Picture of Dorian Gray', 'Oscar Wilde', 'Ward, Lock & Co', 1990, 130),
('BK0010', 'The Odyssey', 'Homer', 'Oxford University Press', 1900, 139),
('BK0011', 'The Iliad', 'Homer', 'Oxford University Press', 1900, 149),
('BK0012', 'The Divine Comedy', 'Dante Alighieri', 'Oxford University Press', 1945, 160),
('BK0013', 'Beowulf', 'Unknown', 'Oxford University Press', 1980, 170),
('BK0014', 'The Canterbury Tales', 'Geoffrey Chaucer', 'Oxford University Press', 1925, 179),
('BK0015', 'Gulliver’s Travels', 'Jonathan Swift', 'Benjamin Motte', 1926, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjam`
--

CREATE TABLE `tb_peminjam` (
  `id_pm` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` varchar(7) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peminjam`
--

INSERT INTO `tb_peminjam` (`id_pm`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(8, 13, 'BK0006', '2023-01-30', '2023-01-29', 'kembali'),
(9, 13, 'BK0003', '2023-01-30', '2023-01-30', 'kembali'),
(10, 24, 'BK0013', '2023-01-30', '2023-02-03', 'kembali'),
(11, 13, 'BK0013', '2023-01-30', '2023-01-30', 'kembali'),
(12, 15, 'BK0003', '2023-01-30', '2023-01-30', 'kembali'),
(13, 13, 'BK0006', '2023-01-30', '2023-01-30', 'kembali'),
(14, 15, 'BK0006', '2023-01-30', '2023-01-30', 'kembali'),
(15, 24, 'BK0014', '2023-01-30', '2023-01-30', 'pinjam'),
(16, 2, 'BK0007', '2023-01-30', '2023-01-30', 'pinjam'),
(17, 13, 'BK0011', '2023-01-29', '2023-01-28', 'pinjam'),
(18, 27, 'BK0010', '2023-01-29', '2023-01-30', 'pinjam'),
(19, 5, 'BK0004', '2023-01-29', '2023-01-29', 'pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_pm` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` varchar(7) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`id_pengembalian`, `id_pm`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_pengembalian`, `status_buku`) VALUES
(1, 11, 13, 'BK0013', '2023-01-30', '2023-01-30', '2023-01-30', 'rusak'),
(2, 8, 13, 'BK0006', '2023-01-30', '2023-01-29', '2023-01-30', 'rusak'),
(3, 10, 24, 'BK0013', '2023-01-30', '2023-02-03', '2023-01-30', 'tidak rusak'),
(4, 9, 13, 'BK0003', '2023-01-30', '2023-01-30', '2023-01-30', 'rusak'),
(5, 12, 15, 'BK0003', '2023-01-30', '2023-01-30', '2023-01-30', 'rusak'),
(6, 14, 15, 'BK0006', '2023-01-30', '2023-01-30', '2023-01-30', 'rusak'),
(7, 13, 13, 'BK0006', '2023-01-30', '2023-01-30', '2023-01-30', 'tidak rusak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '$2y$10$jrFJc9WMoFoDFiw.wTvLoe38Xj26BVuP2hIyEtMEZEG37PwPrzs3.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  ADD PRIMARY KEY (`id_pm`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  MODIFY `id_pm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
