-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 08:51 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ss`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(355) NOT NULL,
  `password` varchar(355) NOT NULL,
  `nama_admin` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(11, 'adminrifki', 'c4ca4238a0b923820dcc509a6f75849b', 'Rifki Ardiansyah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kd_barang` int(11) NOT NULL,
  `id_penjual` varchar(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(8) NOT NULL,
  `stok` int(3) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `id_penjual`, `nama_barang`, `harga`, `stok`, `image`) VALUES
(111, 'pj001', 'Burjag', 5000, 20, 'burjag.jpg'),
(1100, 'pj003', 'Tahu Crispy', 5000, 50, 'tahu.jpg'),
(1101, 'pj003', 'Makaroni', 3000, 15, 'makaroni.jpg'),
(1102, 'pj001', 'Cilok', 5000, 20, 'cilok.jpg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `id_user`, `nama_guru`, `nip`) VALUES
('gr002', 12, 'Ratman', 11809465);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjual`
--

CREATE TABLE `tbl_penjual` (
  `id_penjual` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_penjual` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjual`
--

INSERT INTO `tbl_penjual` (`id_penjual`, `id_user`, `nama_penjual`) VALUES
('', 3214, 'Dicky Dzulfikiar'),
('pj001', 1, 'Dean ramhan'),
('pj003', 855, 'Rifki Ardiansyah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `id_user`, `nama_siswa`) VALUES
(11807432, 1, 'Dean ramhan'),
(11807433, 3214, 'Dzul'),
(21413413, 855, 'rifki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` varchar(50) NOT NULL,
  `id_penjual` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `total_harga` int(8) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('Dikeranjang','Dipesan','Berhasil','Diproses','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_penjual`, `id_user`, `kd_barang`, `jumlah`, `total_harga`, `alamat`, `status`) VALUES
('5e697a9f608bb', 'pj001', 855, 1102, 2, 10000, 'Ruangan Lab Baru\r\n', 'Berhasil'),
('5e697ac5a6573', 'pj003', 855, 1101, 3, 9000, 'Ruangan Lab Baru\r\n', 'Berhasil'),
('5e698cd01667d', 'pj001', 855, 111, 1, 5000, 'RPL 1', 'Berhasil'),
('5e698d5e6bb69', 'pj001', 1, 1102, 2, 10000, 'neraka', 'Berhasil'),
('5e69a9152011c', 'pj001', 855, 1102, 5, 25000, 'Lab Baru RPL\r\n', 'Berhasil'),
('5e69ad0db5383', 'pj003', 1, 1101, 6, 18000, 'lab rpl baru', 'Berhasil'),
('5e69ce32acf35', 'pj001', 855, 1102, 2, 10000, 'Lab RPL Baru', 'Berhasil'),
('5e69ce376d517', 'pj003', 855, 1101, 1, 3000, 'Lab RPL Baru', 'Berhasil'),
('5e7752983ed04', 'pj001', 1, 111, 3, 15000, 'dgxfhf', 'Berhasil'),
('5e78778e7acd9', 'pj003', 1, 1100, 1, 5000, '', 'Dipesan'),
('5f13e8b6115d0', 'pj001', 1, 111, 4, 20000, 'smi', 'Berhasil'),
('5f13f9169075d', 'pj001', 1, 1102, 4, 20000, 'gssss', 'Ditolak'),
('5f15093b5f6d6', 'pj001', 1, 1102, 2, 10000, 'smi', 'Berhasil'),
('5f15138156266', 'pj001', 1, 111, 3, 15000, 'disini', 'Ditolak'),
('5f151388c876c', 'pj003', 1, 1100, 3, 15000, 'disini', 'Dipesan'),
('5f1bdcd7690d9', 'pj001', 12, 1102, 1, 5000, 'Ruang Guru', 'Berhasil'),
('5f1be9b09faf5', 'pj001', 1, 111, 2, 10000, 'XII RPL 1', 'Berhasil'),
('5f1be9dfed67c', 'pj001', 1, 111, 1, 5000, '', 'Ditolak'),
('5f1e780d72597', 'pj001', 3214, 1102, 1, 5000, 'Goalpara\r\n', 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_user` enum('SISWA','GURU') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `status_user`) VALUES
(1, 'deanramhan', 'c4ca4238a0b923820dcc509a6f75849b', 'SISWA'),
(12, 'guru', '827ccb0eea8a706c4c34a16891f84e7b', 'GURU'),
(855, 'ardianrifki24', 'c81e728d9d4c2f636f067f89cc14862c', 'SISWA'),
(3214, 'saha', '3cb74d72258ff31ba5f749a17a2c6d0e', 'SISWA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `id_penjual` (`id_penjual`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_penjual`
--
ALTER TABLE `tbl_penjual`
  ADD PRIMARY KEY (`id_penjual`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13230;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3215;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `tbl_penjual` (`id_penjual`);

--
-- Constraints for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD CONSTRAINT `tbl_guru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_penjual`
--
ALTER TABLE `tbl_penjual`
  ADD CONSTRAINT `tbl_penjual_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `tbl_barang` (`kd_barang`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`id_penjual`) REFERENCES `tbl_penjual` (`id_penjual`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
