-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 07:28 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `man2_tulungagung`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_surat`
--

CREATE TABLE `tbl_detail_surat` (
  `id` int(10) NOT NULL,
  `id_surat` int(10) NOT NULL,
  `pengirim` varchar(65) NOT NULL,
  `ttd_pengirim` text NOT NULL,
  `penerima` varchar(65) NOT NULL,
  `kegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id` int(10) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `pangkat` varchar(65) NOT NULL,
  `jabatan` varchar(65) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `lama_pengabdian` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id`, `nip`, `nama`, `jk`, `no_hp`, `alamat`, `email`, `username`, `password`, `pangkat`, `jabatan`, `tgl_lahir`, `lama_pengabdian`) VALUES
(1, '151', 'Shieldy', 'L', '085678999000', 'Podorejo', 'shieldy@gmail.com', 'finggar', '202cb962ac59075b964b07152d234b70', 'superuser', 'Guru', '1999-08-17', '1 Tahun'),
(2, '152', 'Vita', 'P', '089888999000', 'Ngunut', 'vita@gmail.com', 'vita', '202cb962ac59075b964b07152d234b70', 'operator', 'Staf TU', '1998-08-18', '2 Tahun'),
(3, '153', 'Agus', 'L', '087777888666', 'Ngantru', 'agus@gmail.com', 'agus', '202cb962ac59075b964b07152d234b70', 'katu', 'Kepala TU', '1809-08-22', '5 Tahun'),
(4, '154', 'Pak Dopir', 'L', '086777555666', 'Pucanglaban', 'dopir@gmail.com', 'dopir', '202cb962ac59075b964b07152d234b70', 'kamad', 'Kepala Madrasah', '1790-08-13', '5 Tahun'),
(5, '155', 'Edo', 'L', '086666999777', 'Gondang', 'edo@gmail.com', 'edo', '202cb962ac59075b964b07152d234b70', 'guru', 'Guru', '1990-08-11', '3 Tahun');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lampiran`
--

CREATE TABLE `tbl_lampiran` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `file` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id` varchar(10) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nama_wali` varchar(65) NOT NULL,
  `no_hp_wali` varchar(15) NOT NULL,
  `pekerjaan_wali` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id`, `nisn`, `nama`, `jk`, `tgl_lahir`, `no_hp`, `alamat`, `nis`, `nama_wali`, `no_hp_wali`, `pekerjaan_wali`, `username`, `password`) VALUES
('1', '111222', 'Rika', 'P', '2005-08-19', '088999000999', 'Kampungdalem', '123', 'Saipul', '089999000999', 'Gali lobang', 'rika', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id` int(10) NOT NULL,
  `jenis` enum('berita_acara','nota_dinas','cuti_tahunan','permohonan_study') NOT NULL,
  `no_surat` varchar(65) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tgl_pelaksanaan` date DEFAULT NULL,
  `waktu` varchar(30) NOT NULL,
  `tempat` text NOT NULL,
  `kepada` varchar(100) DEFAULT NULL,
  `perihal` text NOT NULL,
  `ttd_kamad` text NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_pembuatan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat`
--

INSERT INTO `tbl_surat` (`id`, `jenis`, `no_surat`, `hari`, `tgl_pelaksanaan`, `waktu`, `tempat`, `kepada`, `perihal`, `ttd_kamad`, `keterangan`, `tgl_pembuatan`) VALUES
(1, 'nota_dinas', '', 'Senin', '2022-06-12', '08:00 WIB', 'MAN 2 TA', 'Bapak Ali Khosim', 'Izin ya pak', '', 'Izin lah', '2022-12-09'),
(2, 'nota_dinas', '', 'Selasa', '2022-08-20', '08:00 WIB', 'MAN 2 TA', 'Ibu Inayag', 'Izin', '', 'Izin tempat ya', '2022-06-15'),
(3, 'nota_dinas', '', 'Selasa', '2022-03-18', '08:00 WIB', 'MAN 2 TA', 'Ibu Jannah', 'Minta izin', '', 'Izin bu', '2022-01-17'),
(4, 'nota_dinas', '', 'Selasa', '2022-04-04', '08:00 WIB', 'MAN 2 TA', 'Ibu Jannah', 'Minta izin', '', 'Izin bu', '2022-01-15'),
(5, 'nota_dinas', '', 'Senin', '2022-08-18', '08:00 WIB', 'MAN 2 TA', 'Bapak Jikin', 'Izin pakkk', '', 'Izin nih', '2022-08-04'),
(6, 'nota_dinas', '', 'Rabu', '2022-08-18', '08:00 WIB', 'MAN 2 TA', 'Ibu Mayang', 'Pokok Izin', '', 'Izinnnnn', '2022-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tanda_tangan`
--

CREATE TABLE `tbl_tanda_tangan` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` enum('diterima','ditolak') DEFAULT NULL,
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_surat`
--
ALTER TABLE `tbl_detail_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tanda_tangan`
--
ALTER TABLE `tbl_tanda_tangan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_tanda_tangan`
--
ALTER TABLE `tbl_tanda_tangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
