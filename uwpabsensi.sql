-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2020 pada 09.04
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uwpabsensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_departemen`
--

CREATE TABLE `data_departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(100) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_departemen`
--

INSERT INTO `data_departemen` (`id_departemen`, `nama_departemen`, `created_at`) VALUES
(3, 'SDM', '2020-12-02'),
(4, 'ICT', '2020-12-02'),
(5, 'CDC', '2020-12-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama_karyawan` varchar(250) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `qrcode` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `departemen`, `qrcode`, `foto`, `created_at`) VALUES
(10, '123411', 'Andriko', 'ICT', '123411.png', 'download.jpg', '2020-11-22'),
(16, '12345', 'Faisal', 'SDM', '12345.png', 'iron-man-Jev43VE-600.jpg', '2020-11-24'),
(19, 'UWP100', 'Andi ww', 'SDM', 'UWP100.png', 'akuh.jpg', '2020-12-03'),
(20, '12341121', 'Riko', 'ICT', '12341121.png', 'FB_20150222_22_53_51_Saved_Picture.jpg', '2020-12-03'),
(21, '1234112', 'Rikoy', 'ICT', '1234112.png', 'IT.jpg', '2020-12-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `records_kehadiran`
--

CREATE TABLE `records_kehadiran` (
  `id_records_kehadiran` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `records_kehadiran`
--

INSERT INTO `records_kehadiran` (`id_records_kehadiran`, `nik`, `tgl`, `jam_masuk`, `jam_keluar`, `keterangan`, `status`) VALUES
(1, '123411', '2020-11-24', '09:00:00', '16:00:00', 'Hadir', 'Pulang'),
(2, '1234112', '2020-11-24', '09:00:00', '00:00:00', 'Hadir', 'Masuk'),
(3, '12341121', '2020-11-24', '00:00:00', '00:00:00', 'Sakit', ''),
(5, '123467', '2020-11-24', '00:00:00', '00:00:00', 'Sakit', ''),
(8, '12345', '2020-11-26', '00:00:00', '00:00:00', 'Izin', ''),
(17, '1234112', '2020-11-27', '19:32:19', '19:32:33', 'Hadir', 'Pulang'),
(18, '12341121', '2020-11-27', '19:44:57', '00:00:00', 'Hadir', 'Masuk'),
(19, '123411', '2020-11-27', '19:45:09', '19:46:48', 'Hadir', 'Pulang'),
(22, '12341121', '2020-11-30', '10:53:55', '13:55:13', 'Hadir', 'Pulang'),
(23, '123411', '2020-11-30', '11:49:00', '13:55:31', 'Hadir', 'Pulang'),
(24, '1234112', '2020-11-30', '11:49:57', '00:00:00', 'Hadir', 'Masuk'),
(25, '12345', '2020-11-30', '13:57:59', '00:00:00', 'Hadir', 'Masuk'),
(26, '12345', '2020-12-01', '13:32:05', '13:32:25', 'Hadir', 'Pulang'),
(39, '12341121', '2020-12-01', '16:54:13', '16:58:04', 'Hadir', 'Pulang'),
(40, '123411', '2020-12-01', '17:31:05', '17:31:14', 'Hadir', 'Pulang'),
(41, 'UWP100', '2020-12-03', '00:00:00', '00:00:00', 'Sakit', ''),
(42, '123411', '2020-12-04', '20:10:01', '20:12:00', 'Hadir', 'Pulang'),
(43, '123411', '2020-12-08', '17:33:39', '17:34:30', 'Hadir', 'Pulang'),
(44, '12345', '2020-12-08', '00:00:00', '00:00:00', 'Izin', ''),
(45, '12341121', '2020-12-10', '11:21:45', '11:21:56', 'Hadir', 'Pulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama_depan`, `nama_belakang`, `username`, `password`, `role`, `foto`, `created_at`) VALUES
(4, 'Karyawan', 'Absensi', 'karyawan', '$2y$10$QHujGljHg5BEewaEF.dWEeHsWNr8CCcCZJfTK8Q8f7HV/433lMxfy', 'karyawan', 'default.jpg', '2020-11-16'),
(10, 'Administrator', 'Absensi', 'adminabsensi', '$2y$10$4jYzWNpb8fBa7UD7I7WufOoULGlHu4tZj4jypIgFKjN0iYTGpi5Py', 'administrator', 'default.jpg', '2020-11-17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_departemen`
--
ALTER TABLE `data_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indeks untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `records_kehadiran`
--
ALTER TABLE `records_kehadiran`
  ADD PRIMARY KEY (`id_records_kehadiran`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_departemen`
--
ALTER TABLE `data_departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `records_kehadiran`
--
ALTER TABLE `records_kehadiran`
  MODIFY `id_records_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
