-- --------------------------------------------------------
-- Host:                         localhost
-- Versi server:                 5.7.24 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- membuang struktur untuk table internusadata.basis
CREATE TABLE IF NOT EXISTS `basis` (
  `basis_id` int(250) NOT NULL AUTO_INCREMENT,
  `basis_nama` text NOT NULL,
  `basis_ttl` date NOT NULL,
  `basis_tempat_kerja` text NOT NULL,
  `basis_gender` text NOT NULL,
  `basis_pekerjaan` text NOT NULL,
  `basis_provinsi` text NOT NULL,
  `basis_kabupaten` text NOT NULL,
  `basis_kecamatan` text NOT NULL,
  `basis_desa` text NOT NULL,
  `basis_phone` double NOT NULL,
  `basis_email` text NOT NULL,
  `tipe_grup` text NOT NULL,
  `grup` text NOT NULL,
  `slug` text NOT NULL,
  `basis_datainput` datetime NOT NULL,
  PRIMARY KEY (`basis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table internusadata.links
CREATE TABLE IF NOT EXISTS `links` (
  `links_id` int(11) NOT NULL AUTO_INCREMENT,
  `links_tipe` text NOT NULL,
  `links_nama` text NOT NULL,
  `links` text NOT NULL,
  `links_slug` text NOT NULL,
  `tipe` int(11) NOT NULL,
  PRIMARY KEY (`links_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Pengeluaran data tidak dipilih.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
