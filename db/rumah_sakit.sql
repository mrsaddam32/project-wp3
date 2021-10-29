-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 12:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(3) NOT NULL,
  `kode_dokter` int(5) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `spesialis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `kode_dokter`, `nama_dokter`, `tgl_lahir`, `jenis_kelamin`, `spesialis`) VALUES
(3, 1998172890, 'Luthfi Fadhlurrohman', '1983-05-19', 'Laki-Laki', 'UMUM'),
(5, 607386927, 'Laravelia', '1992-06-11', 'Perempuan', 'THT'),
(6, 921506964, 'Vegeta', '1991-03-20', 'Laki-Laki', 'UMUM'),
(7, 1851410549, 'Samantha Eclair', '1985-03-20', 'Perempuan', 'KULIT & KELAMIN'),
(8, 552246679, 'Who am i ?', '1985-11-13', 'Laki-Laki', 'UMUM'),
(12, 1265636578, 'Toronto', '1983-10-11', 'Laki-Laki', 'THT');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(3) NOT NULL,
  `nama_obat` varchar(256) NOT NULL,
  `satuan` enum('Kaplet','Syrup','Tablet','Pil','Cream') NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `satuan`, `stok`) VALUES
(1, 'Panadol', 'Kaplet', 200),
(2, 'Mylanta', 'Syrup', 400),
(3, 'Bodrex', 'Tablet', 400),
(4, 'Paramex', 'Kaplet', 100),
(5, 'OBH', 'Syrup', 200),
(6, 'Procold', 'Kaplet', 500),
(8, 'Ibuprofen', 'Kaplet', 300);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(3) NOT NULL,
  `no_pendaftaran` int(10) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `keluhan` varchar(256) NOT NULL,
  `umur` int(3) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_pendaftaran`, `nama_pasien`, `tgl_lahir`, `keluhan`, `umur`, `jenis_kelamin`, `tgl_daftar`) VALUES
(1, 1999248217, 'Rizky Kurniawan', '1991-11-13', 'Demam berkepanjangan', 30, 'Laki-Laki', '2021-06-03 16:10:46'),
(2, 1289448446, 'Keqing', '1998-06-11', 'Batuk,pilek', 23, 'Perempuan', '2021-06-03 16:45:21'),
(3, 339860009, 'Adam Laravel', '2004-02-10', 'Pendengaran terganggu', 17, 'Laki-Laki', '2021-06-03 17:09:52'),
(9, 810197756, 'Reacto Javascripto', '1989-07-04', 'Nyeri punggung', 32, 'Laki-Laki', '2021-06-09 16:19:33'),
(10, 2134571832, 'Ezio Auditore', '1974-06-05', 'Sakit Perut', 47, 'Laki-Laki', '2021-06-16 12:16:39'),
(11, 1629422165, 'Test 5', '2004-11-24', 'Badan Pegal', 17, 'Perempuan', '2021-06-16 15:08:00'),
(13, 542871684, 'Test 13', '2014-06-11', 'Sakit Kepala', 7, 'Perempuan', '2021-06-16 15:10:14'),
(14, 489673289, 'Test 20', '2010-02-10', 'Batuk,Pilek', 11, 'Laki-Laki', '2021-06-21 07:52:38'),
(15, 1409181242, 'Pasien 1', '2000-10-11', 'Demam', 21, 'Laki-Laki', '2021-07-02 09:09:03'),
(16, 1497570087, 'Pasien 2', '2000-07-11', 'Demam', 21, 'Perempuan', '2021-07-02 09:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `rek_medik`
--

CREATE TABLE `rek_medik` (
  `id_rmdk` int(3) NOT NULL,
  `id_pasien` int(3) NOT NULL,
  `no_rmdk` int(10) NOT NULL,
  `no_pendaftaran` int(8) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `tgl_rmdk` datetime NOT NULL DEFAULT current_timestamp(),
  `keluhan` varchar(256) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `nama_obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rek_medik`
--

INSERT INTO `rek_medik` (`id_rmdk`, `id_pasien`, `no_rmdk`, `no_pendaftaran`, `nama_pasien`, `nama_dokter`, `tgl_rmdk`, `keluhan`, `diagnosa`, `nama_obat`) VALUES
(1, 2, 100202871, 1289448446, 'Keqing', 'Luthfi Fadhlurrohman', '2021-06-05 01:15:33', 'Batuk,pilek', 'Demam/Flu', 'Procold'),
(2, 5, 459765417, 822997683, 'Mike Wazowski', 'Luthfi Fadhlurrohman', '2021-06-05 01:17:25', 'Kulit Gatal-gatal', 'Infeksi kulit', 'Chloramfecort'),
(3, 1, 1318840973, 1999248217, 'Rizky Kurniawan', 'Luthfi Fadhlurrohman', '2021-06-05 02:32:58', 'Demam berkepanjangan', 'Test 4', 'OBH'),
(4, 4, 1398165832, 449764647, 'Steven Gerrard', 'Luthfi Fadhlurrohman', '2021-06-05 15:11:07', 'Keringat Dingin', 'Demam', 'Paramex'),
(5, 7, 990062869, 16266225, 'Test 8', 'Mega Deviana', '2021-06-06 01:24:41', 'Batuk Berdarah', 'Kanker', 'Bodrex'),
(6, 7, 650703739, 16266225, 'Test 8', 'Samantha', '2021-06-07 00:45:59', 'Batuk Berdarah', 'Usus Buntu', 'Mylanta'),
(7, 3, 938884669, 339860009, 'Adam Laravel', 'Samantha Eclair', '2021-06-09 22:57:28', 'Pendengaran terganggu', 'Telinga kotor', 'Ibuprofen'),
(8, 10, 1046254899, 2134571832, 'Ezio Auditore', 'Laravelia', '2021-06-16 21:16:52', 'Sakit Perut', 'Maag', 'Mylanta'),
(11, 11, 887677062, 1629422165, 'Test 5', 'Vegeta', '2021-06-17 15:16:26', 'Badan Pegal', 'Diagnosa test 20', 'Ibuprofen'),
(12, 9, 149343520, 810197756, 'Reacto Javascripto', 'Test 40', '2021-06-18 00:19:45', 'Nyeri punggung', 'Lumbago', 'Ibuprofen'),
(13, 14, 1164298315, 489673289, 'Test 20', 'Test 40', '2021-06-21 14:55:41', 'Batuk,Pilek', 'Flu/Demam', 'Procold'),
(14, 16, 534644427, 1497570087, 'Pasien 2', 'Luthfi Fadhlurrohman', '2021-07-02 16:23:54', 'Demam', 'Meriang,Masuk Angin', 'Procold');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `tgl_registrasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role`, `tgl_registrasi`) VALUES
(1, 'Muhammad Saddam Pradana', 'saddamganz', '$2y$10$6cyAjQdeKkpAfpd74D2HO.uCwAWLs4ZZKyP6NH5mk0DamHGvv.oyW', 'Administrator', 1622654819),
(2, 'Neoline', 'neoline123', '$2y$10$WjvGWvK53AStKCKxS2Ch.u6FnOB6spLyf.AST5IfQXk4s4SDOvBHS', 'Administrator', 1622729074);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

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
-- Indexes for table `rek_medik`
--
ALTER TABLE `rek_medik`
  ADD PRIMARY KEY (`id_rmdk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rek_medik`
--
ALTER TABLE `rek_medik`
  MODIFY `id_rmdk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
