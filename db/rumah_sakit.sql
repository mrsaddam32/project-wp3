-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 08:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 23984, 'Oliver Kahn', '1987-02-28', 'Laki-Laki', 'THT'),
(2, 87283, 'Gerrard Way', '1974-04-28', 'Laki-Laki', 'UMUM'),
(3, 1998172890, 'Luthfi Fadhlurrohman', '1983-05-19', 'Laki-Laki', 'UMUM');

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
(2, 'Mylanta', 'Syrup', 30),
(3, 'Bodrex', 'Tablet', 400),
(4, 'Paramex', 'Kaplet', 100),
(5, 'OBH', 'Syrup', 50),
(6, 'Procold', 'Kaplet', 500);

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
(2, 1289448446, 'Keqing Wangy', '1998-06-11', 'Batuk,pilek', 23, 'Perempuan', '2021-06-03 16:45:21'),
(3, 339860009, 'Adam Horizon', '2004-02-10', 'Pendengaran terganggu', 17, 'Laki-Laki', '2021-06-03 17:09:52'),
(4, 449764647, 'Steven Gerrard', '1985-04-19', 'Keringat Dingin', 36, 'Laki-Laki', '2021-06-04 12:32:00'),
(5, 822997683, 'Mike Wazowski', '1999-05-20', 'Kulit Gatal-gatal', 22, 'Laki-Laki', '2021-06-04 14:42:59');

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
(1, 2, 100202871, 1289448446, 'Keqing Wangy', 'Luthfi Fadhlurrohman', '2021-06-05 01:15:33', 'Batuk,pilek', 'Demam/Flu', 'Procold'),
(2, 5, 459765417, 822997683, 'Mike Wazowski', 'Luthfi Fadhlurrohman', '2021-06-05 01:17:25', 'Kulit Gatal-gatal', 'Infeksi kulit', 'Chloramfecort');

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
(2, 'Neoline', 'neolinetampan', '$2y$10$WjvGWvK53AStKCKxS2Ch.u6FnOB6spLyf.AST5IfQXk4s4SDOvBHS', 'Administrator', 1622729074);

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
  MODIFY `id_dokter` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rek_medik`
--
ALTER TABLE `rek_medik`
  MODIFY `id_rmdk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
