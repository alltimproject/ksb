-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 15, 2018 at 05:17 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_KSB`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` varchar(8) NOT NULL,
  `judul_berita` varchar(200) NOT NULL,
  `deskripsi_berita` text NOT NULL,
  `tgl_berita` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto_berita` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul_berita`, `deskripsi_berita`, `tgl_berita`, `foto_berita`) VALUES
('BB081801', 'Kebakaran di dekat RT 09', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. by wahyu alfarisi', '2018-08-04 20:00:52', 'bcn12.jpg'),
('BB081802', 'test', 'test', '2018-08-05 14:06:13', 'ca746f9d-263d-4069-8c7a-3210623e324f.jpeg'),
('BB081803', 'e', 'fee', '2018-08-13 13:22:27', 'kk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id_kegiatan` varchar(6) NOT NULL,
  `foto_kegiatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_kegiatan`
--

CREATE TABLE `tb_jadwal_kegiatan` (
  `id_jadwal` varchar(6) NOT NULL,
  `nama_kegiatan` varchar(25) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `tgl_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jam_kegiatan` time NOT NULL,
  `tempat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal_kegiatan`
--

INSERT INTO `tb_jadwal_kegiatan` (`id_jadwal`, `nama_kegiatan`, `tgl_kegiatan`, `tgl_post`, `jam_kegiatan`, `tempat`) VALUES
('081801', 'Sosialisasi kegiatan', '2018-08-01', '2018-08-04 09:46:15', '09:00:00', 'Aula gedung 1'),
('081802', 'Sosialisasi', '2018-08-31', '2018-08-04 19:57:03', '09:00:00', 'Gedung Aula penjaringan'),
('081803', 'Rehabilitasi dan pengarah', '2018-08-31', '2018-08-12 05:19:52', '09:00:00', 'Gedung aula pejaringan'),
('081804', 'djajH', '2018-08-15', '2018-08-13 13:19:29', '09:00:00', 'rewrew'),
('081805', 'uadha', '2018-08-31', '2018-08-13 13:20:44', '09:00:00', 'idgjd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` varchar(6) NOT NULL,
  `id_jadwal` varchar(6) NOT NULL,
  `status_acara` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_post_kegiatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `id_jadwal`, `status_acara`, `deskripsi`, `tgl_post_kegiatan`) VALUES
('081801', '081801', 'verifikasi', 'teszt', '2018-08-04 09:59:56'),
('081802', '081802', 'verifikasi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-08-04 19:58:58'),
('081803', '081803', 'verifikasi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-08-12 05:20:12'),
('081804', '081804', 'proses', 'idgdijdi', '2018-08-13 13:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_berita` varchar(8) NOT NULL,
  `email` varchar(25) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl_komentar` date NOT NULL,
  `status_komentar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_berita`, `email`, `isi_komentar`, `tgl_komentar`, `status_komentar`) VALUES
('BB081801', 'wahyualfarisi30@gmail.com', 'keren', '2018-08-13', 'konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konfirmasi`
--

CREATE TABLE `tb_konfirmasi` (
  `id_kegiatan` varchar(6) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `status_informasi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konfirmasi`
--

INSERT INTO `tb_konfirmasi` (`id_kegiatan`, `NIK`, `status_informasi`) VALUES
('081802', '1111111111111111', 'konfirmasi'),
('081803', '1111111111111111', 'menunggu'),
('081802', '3333333333333333', 'proses'),
('081803', '3333333333333333', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `NIK` varchar(16) NOT NULL,
  `email_peserta` varchar(25) NOT NULL,
  `nama_depan` varchar(25) NOT NULL,
  `nama_belakang` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(25) NOT NULL,
  `jenis_kelamin` enum('L','P','','') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`NIK`, `email_peserta`, `nama_depan`, `nama_belakang`, `password`, `alamat`, `kontak`, `jenis_kelamin`, `tgl_lahir`, `foto`) VALUES
('1111111111111111', 'wahyualfarisi30@gmail.com', 'wahyu', 'alfarisi', 'wahyu', 'jakarta', '081317726873', 'L', '2018-08-13', 'foto_ktp3.JPG'),
('3333333333333333', 'irsanariep@ymail.com', 'irsan', 'ariep', '071811', 'muara baru', '081316864477', '', '2018-08-10', 'kk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `kode_user` varchar(6) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kode_user`, `username`, `password`, `level`) VALUES
('admin', 'Irsan ', 'admin', 'ADMIN'),
('ketua', 'Irsan ', 'ketua', 'KETUA'),
('wahyu', 'wahyuais', 'admin', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD KEY `id_acara` (`id_kegiatan`);

--
-- Indexes for table `tb_jadwal_kegiatan`
--
ALTER TABLE `tb_jadwal_kegiatan`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_kegiatan` (`id_jadwal`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD KEY `id_berita` (`id_berita`);

--
-- Indexes for table `tb_konfirmasi`
--
ALTER TABLE `tb_konfirmasi`
  ADD KEY `NIK` (`NIK`),
  ADD KEY `id_acara` (`id_kegiatan`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD CONSTRAINT `tb_informasi_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `tb_kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD CONSTRAINT `tb_kegiatan_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal_kegiatan` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD CONSTRAINT `tb_komentar_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `tb_berita` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_konfirmasi`
--
ALTER TABLE `tb_konfirmasi`
  ADD CONSTRAINT `tb_konfirmasi_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `tb_kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_konfirmasi_ibfk_2` FOREIGN KEY (`NIK`) REFERENCES `tb_peserta` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
