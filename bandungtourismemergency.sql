-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 04. Januari 2015 jam 11:58
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bandungtourismemergency`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoritempat`
--

CREATE TABLE IF NOT EXISTS `kategoritempat` (
  `idKategoriTempat` varchar(10) NOT NULL DEFAULT '',
  `namaKategoriTempat` varchar(20) NOT NULL,
  PRIMARY KEY (`idKategoriTempat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategoritempat`
--

INSERT INTO `kategoritempat` (`idKategoriTempat`, `namaKategoriTempat`) VALUES
('PL1000', 'Kantor Polisi'),
('PS3000', 'Puskesmas'),
('RS2000', 'Rumah Sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasiemergency`
--

CREATE TABLE IF NOT EXISTS `lokasiemergency` (
  `idLokasiEmergency` int(10) NOT NULL AUTO_INCREMENT,
  `namaLokasi` varchar(40) NOT NULL,
  `alamatLokasi` varchar(50) NOT NULL,
  `noTlp` varchar(12) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `idKategoriTempat` varchar(10) NOT NULL,
  `nip` varchar(8) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idLokasiEmergency`),
  KEY `idKategoriTempat` (`idKategoriTempat`),
  KEY `nip` (`nip`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data untuk tabel `lokasiemergency`
--

INSERT INTO `lokasiemergency` (`idLokasiEmergency`, `namaLokasi`, `alamatLokasi`, `noTlp`, `latitude`, `longitude`, `idKategoriTempat`, `nip`, `status`) VALUES
(41, 'sdf', 'asfd', 'sdf', -6.91341171, 107.61429191, 'PL1000', '892374', 1),
(42, 'sdfq', 'sdq', 'sdf', -6.91446614, 107.61243582, 'PS3000', 'admin', 1),
(43, 'dsfs', 'sdf', 'sdf', -6.91219752, 107.61491418, 'PL1000', 'jejen', 1),
(44, 'sadf', 'asdf', 'sdf', -6.91332651, 107.61604071, 'PL1000', 'jejen', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasiuser`
--

CREATE TABLE IF NOT EXISTS `registrasiuser` (
  `nip` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `idKategoriTempat` varchar(10) NOT NULL,
  `namaTempat` varchar(25) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`nip`),
  KEY `idKategoriTempat` (`idKategoriTempat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `registrasiuser`
--

INSERT INTO `registrasiuser` (`nip`, `nama`, `password`, `idKategoriTempat`, `namaTempat`, `level`, `status`) VALUES
('10304015', 'asdfsdf', '12345', 'PL1000', 'sadfsadfasdf', 'user', 1),
('892374', 'kjsdhfj', 'g', 'PL1000', 'asdfasdf', 'User', 1),
('admin', 'ahmad', 'admin', 'RS2000', 'asdfasf', 'admin', 1),
('jejen', 'jejen', 'jejen', 'PL1000', 'jejen', 'user', 1);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lokasiemergency`
--
ALTER TABLE `lokasiemergency`
  ADD CONSTRAINT `lokasiemergency_ibfk_1` FOREIGN KEY (`idKategoriTempat`) REFERENCES `kategoritempat` (`idKategoriTempat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lokasiemergency_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `registrasiuser` (`nip`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `registrasiuser`
--
ALTER TABLE `registrasiuser`
  ADD CONSTRAINT `registrasiuser_ibfk_1` FOREIGN KEY (`idKategoriTempat`) REFERENCES `kategoritempat` (`idKategoriTempat`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
