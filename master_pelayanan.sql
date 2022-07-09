-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: master_pelayanan
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `antri_daftar`
--

DROP TABLE IF EXISTS `antri_daftar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `antri_daftar` (
  `no_reg` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kel` enum('Laki-Laki','Perempuan') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `no_log` varchar(15) NOT NULL,
  `passwd_pelanggan` varchar(255) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `status_pasang` varchar(10) NOT NULL,
  PRIMARY KEY (`no_reg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `antri_daftar`
--

LOCK TABLES `antri_daftar` WRITE;
/*!40000 ALTER TABLE `antri_daftar` DISABLE KEYS */;
INSERT INTO `antri_daftar` VALUES ('343081351557779','Arrayhan','Laki-Laki','081351557779','Paringin Timur, RT.02','1984139085_half-circle.png','0177795671','','Diverifikasi',''),('343082158412245','Lily Syifa','Perempuan','082158412245','Paringin Selatan, Batu Piring','','','','',''),('343082158412297','Maulida Hikmah','Perempuan','082158412297','Paringin Kota, Haur Batu RT.12','1301899069_bg-carousel.jpg','010001','efddc032eccbd28709d934adf351ca67','Diverifikasi','Terpasang');
/*!40000 ALTER TABLE `antri_daftar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `baliknama`
--

DROP TABLE IF EXISTS `baliknama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baliknama` (
  `no_ds` varchar(6) NOT NULL,
  `id_wilayah` char(5) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nik_asal` varchar(20) NOT NULL,
  `ttl_asal` varchar(255) NOT NULL,
  `hp_asal` varchar(20) NOT NULL,
  `jk_asal` varchar(50) NOT NULL,
  `nama_asal` varchar(255) NOT NULL,
  `nama_baru` varchar(255) NOT NULL,
  `jk_baru` varchar(50) NOT NULL,
  `ttl_baru` varchar(255) NOT NULL,
  `nik_baru` varchar(20) NOT NULL,
  `hp_baru` varchar(20) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baliknama`
--

LOCK TABLES `baliknama` WRITE;
/*!40000 ALTER TABLE `baliknama` DISABLE KEYS */;
INSERT INTO `baliknama` VALUES ('080001','08','Batu Piring RT.2','111111111111','Amuntai, 03-05-1979','08218948213','Perempuan','Pelanggan Satu','Pelanggan Satu Balik Nama','Laki-Laki','Paringin,06-28-1964','1111111111145','082152527752','2022-02-19',20000),('050003','05','Baruh Panyambaran RT.03','444444444444','Baruh Panyambaran, 06-11-1983','08218948567','Laki-Laki','Pelanggan Empat','Pelanggan Empat Balik Satu','Laki-Laki','Paringin, 03-05-1989','444444444414','082152527999','2022-02-21',20000),('050003','05','Baruh Panyambaran RT.03','444444444414','Paringin, 03-05-1989','082152527999','Laki-Laki','Pelanggan Empat Balik Satu','Pelanggan Empat Balik Satu','Laki-Laki','Paringin, 03-05-1989','444444444414','082152527999','2022-02-21',20000),('060005','06','Tugu Gula Habang','777777777777','Muara Ninian, 30-01-1985','08218948422','Perempuan','Pelanggan Tujuh','Pelanggan Tujuh Balik Satu','Perempuan','Batumandi, 20-07-1986','777777777717','082152526666','2022-02-21',20000);
/*!40000 ALTER TABLE `baliknama` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_survei_bahan`
--

DROP TABLE IF EXISTS `detail_survei_bahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_survei_bahan` (
  `kode_bahan` varchar(20) NOT NULL,
  `no_reg` varchar(20) NOT NULL,
  `harga` double NOT NULL,
  `banyaknya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_survei_bahan`
--

LOCK TABLES `detail_survei_bahan` WRITE;
/*!40000 ALTER TABLE `detail_survei_bahan` DISABLE KEYS */;
INSERT INTO `detail_survei_bahan` VALUES ('KWM1','343082158412297',56000,1),('SK1','343082158412297',98562,1),('L1','343082158412297',178410,3),('T1','343082158412297',20000,1),('PP1','343082158412297',10000,1);
/*!40000 ALTER TABLE `detail_survei_bahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gudang`
--

DROP TABLE IF EXISTS `gudang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gudang` (
  `kode` varchar(5) NOT NULL,
  `jenis` enum('BAHAN','UPAH') NOT NULL,
  `nomor` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `ukuran` enum('-','0.5"','1"','1.5"') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gudang`
--

LOCK TABLES `gudang` WRITE;
/*!40000 ALTER TABLE `gudang` DISABLE KEYS */;
INSERT INTO `gudang` VALUES ('BCB1','UPAH',23,'Biaya Crossing Beton',117000,'-','tersedia'),('BCJ1','UPAH',22,'Biaya Crossing Jalan',175000,'-','tersedia'),('BPK1','UPAH',19,'Bongkar & Pasang Kran',2500,'-','tersedia'),('DNB1','BAHAN',5,'Double Niple Besi',9357,'0.5\"','tersedia'),('DNB2','BAHAN',6,'Double Niple Besi',21210,'1\"','tersedia'),('EG1','BAHAN',14,'Elbow Galvanis',17467,'0.5\"','tersedia'),('I1','BAHAN',13,'Isolatif',9868,'-','tersedia'),('K1','BAHAN',15,'Kran',34071,'0.5\"','tersedia'),('KG1','BAHAN',4,'Knie Galvanis',9357,'0.5\"','tersedia'),('KWM1','BAHAN',1,'Kotak Water Meter',56000,'-','tersedia'),('L1','BAHAN',3,'Lockable',178410,'0.5\"','tersedia'),('PD1','BAHAN',11,'Plat DS',10000,'-','tersedia'),('PH1','BAHAN',12,'Pipa HDPE',8110,'0.5\"','tersedia'),('PP1','UPAH',21,'Perencanaan & Pengukuran',10000,'-','tersedia'),('PPH1','UPAH',17,'Pasang Pipa HDPE',5000,'0.5\"','tersedia'),('PS1','UPAH',18,'Pasang SR',170000,'-','tersedia'),('SG1','BAHAN',16,'Socket Galvanis',8733,'0.5\"','tersedia'),('SK1','BAHAN',2,'Stop Kran',98562,'0.5\"','tersedia'),('T1','UPAH',20,'Transport',20000,'-','tersedia'),('TSG1','BAHAN',7,'Tee Stock Galvanis',24400,'1.5\"','tersedia'),('WM1','BAHAN',8,'Water Moer',33000,'0.5\"','tersedia'),('WM2','BAHAN',9,'Water Moer',46786,'1\"','tersedia'),('WMC1','BAHAN',10,'Water Meter + Coupling',490000,'0.5\"','tersedia');
/*!40000 ALTER TABLE `gudang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keluhan`
--

DROP TABLE IF EXISTS `keluhan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keluhan` (
  `no_ds` varchar(10) NOT NULL,
  `no_keluhan` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tgl_keluhan` date NOT NULL,
  `keluhan` text NOT NULL,
  `img_keluhan` varchar(255) NOT NULL,
  `jenis_penanganan` enum('Butuh observasi dan tindak lanjut','Penanganan instan','Telah ditangani','') NOT NULL,
  `penanganan` text NOT NULL,
  `tgl_tangani` date NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keluhan`
--

LOCK TABLES `keluhan` WRITE;
/*!40000 ALTER TABLE `keluhan` DISABLE KEYS */;
INSERT INTO `keluhan` VALUES ('010001','0001001','Maulida Hikmah','Paringin Kota, Haur Batu RT.12','082158412297','2022-07-06','Pipa bocor kecil (tidak terlihat)','010001_img-480358138.jpg','','','0000-00-00',''),('010001','0001002','Maulida Hikmah','Paringin Kota, Haur Batu RT.12','082158412297','2022-07-07','Pipa bocor membesar','tidak tersedia','Telah ditangani','Pipa sudah diperbaiki, pipa hanya perlu ditambal dengan plester penambal pipa HDPE, tidak perlu mengganti saluran pipa ','2022-07-09','dikonfirmasi operator pelayanan, ditangani operator lapangan Wawan (trandis)');
/*!40000 ALTER TABLE `keluhan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `peran` enum('PEGAWAI','KEUANGAN','PERENCANA','DIREKTUR') NOT NULL,
  `login_terakhir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'pegawai','047aeeb234644b9e2d4138ed3bc7976a','PEGAWAI','2022-07-09 11:48:32'),(2,'kabag','1a50ef14d0d75cd795860935ee0918af','KEUANGAN','2022-07-07 16:25:20'),(3,'perencana','7d70c522bf3c837573c10fb0d2fac500','PERENCANA','2022-07-09 11:47:57');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelanggan` (
  `no_ds` varchar(6) NOT NULL,
  `status_ket` varchar(10) NOT NULL,
  `id_tarif` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jenis_kel` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` VALUES ('010001','TERBUKA','R2','Maulida Hikmah','6308054606000007','Perempuan','Paringin Kota, Haur Batu RT.12','082158412297');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pemasangan`
--

DROP TABLE IF EXISTS `pemasangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pemasangan` (
  `no_ds` char(6) NOT NULL,
  `urut_ds` int(11) NOT NULL,
  `tgl_pasang` date NOT NULL,
  `status_kep_rumah` varchar(50) NOT NULL,
  `jumlah_jiwa` varchar(10) NOT NULL,
  `pln` varchar(50) NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `gol_tarif` varchar(10) NOT NULL,
  `biaya` double NOT NULL,
  PRIMARY KEY (`no_ds`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pemasangan`
--

LOCK TABLES `pemasangan` WRITE;
/*!40000 ALTER TABLE `pemasangan` DISABLE KEYS */;
INSERT INTO `pemasangan` VALUES ('010001',1,'2022-07-04','Milik sendiri','5','0109000808','01','R2',864000);
/*!40000 ALTER TABLE `pemasangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembukaan`
--

DROP TABLE IF EXISTS `pembukaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembukaan` (
  `no_ds` varchar(10) NOT NULL,
  `id_wilayah` char(5) NOT NULL,
  `tgl_buka` date NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembukaan`
--

LOCK TABLES `pembukaan` WRITE;
/*!40000 ALTER TABLE `pembukaan` DISABLE KEYS */;
INSERT INTO `pembukaan` VALUES ('050003','05','2022-02-18','Pelanggan Empat','Baruh Panyambaran RT.03','08218948567','Permintaan Pembukaan',20000),('010002','01','2022-02-21','Pelanggan Tiga','Komplek Selawi RT.05','08218948567','Permintaan Pembukaan',20000);
/*!40000 ALTER TABLE `pembukaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendaftaran`
--

DROP TABLE IF EXISTS `pendaftaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pendaftaran` (
  `no_reg` varchar(15) NOT NULL,
  `no_ds` char(6) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `cabang` varchar(20) NOT NULL,
  `biaya` double NOT NULL,
  `status_berkas` varchar(20) NOT NULL,
  `tgl_survei` date NOT NULL,
  `status_survei` varchar(20) NOT NULL,
  `pengesahan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendaftaran`
--

LOCK TABLES `pendaftaran` WRITE;
/*!40000 ALTER TABLE `pendaftaran` DISABLE KEYS */;
INSERT INTO `pendaftaran` VALUES ('343082158412297','010001','2022-06-28','6308054606000007','295466711_ktp-contoh.jpeg','01',20297,'Diverifikasi','2022-07-01','Telah disurvei','qr-pengesahan/202207082016616350.png');
/*!40000 ALTER TABLE `pendaftaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penutupan`
--

DROP TABLE IF EXISTS `penutupan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penutupan` (
  `no_ds` varchar(10) NOT NULL,
  `id_wilayah` char(5) NOT NULL,
  `tgl_tutup` date NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penutupan`
--

LOCK TABLES `penutupan` WRITE;
/*!40000 ALTER TABLE `penutupan` DISABLE KEYS */;
INSERT INTO `penutupan` VALUES ('050003','05','2022-02-17','Pelanggan Empat','Baruh Panyambaran RT.03','08218948567','Permintaan Penutupan',20000),('080001','08','2022-02-18','Pelanggan Satu Balik Nama','Batu Piring RT.2','082152527752','Penutupan Otomatis',NULL),('090003','09','2022-02-19','Pelanggan Delapan','Gunung Batu RT.02','08218948509','Permintaan Penutupan',20000),('010003','01','2022-02-21','Pelanggan Sembilan','Balida RT.09','082189487777','Permintaan Penutupan',20000),('010002','01','2022-02-21','Pelanggan Tiga','Komplek Selawi RT.05','08218948567','Permintaan Penutupan',20000);
/*!40000 ALTER TABLE `penutupan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survei_bahan`
--

DROP TABLE IF EXISTS `survei_bahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survei_bahan` (
  `no_reg` varchar(20) NOT NULL,
  `tgl_survei` date NOT NULL,
  `status_survei` varchar(20) NOT NULL,
  `total_biaya` double NOT NULL,
  `perencana` varchar(255) NOT NULL,
  PRIMARY KEY (`no_reg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survei_bahan`
--

LOCK TABLES `survei_bahan` WRITE;
/*!40000 ALTER TABLE `survei_bahan` DISABLE KEYS */;
INSERT INTO `survei_bahan` VALUES ('343082158412297','2022-07-01','Telah disurvei',864000,'udin');
/*!40000 ALTER TABLE `survei_bahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survei_goltar_noniaga`
--

DROP TABLE IF EXISTS `survei_goltar_noniaga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survei_goltar_noniaga` (
  `no_reg` varchar(20) NOT NULL,
  `pondasi` int(11) NOT NULL,
  `dinding` int(11) NOT NULL,
  `lantai` int(11) NOT NULL,
  `atap` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `gol_tarif` varchar(30) NOT NULL,
  PRIMARY KEY (`no_reg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survei_goltar_noniaga`
--

LOCK TABLES `survei_goltar_noniaga` WRITE;
/*!40000 ALTER TABLE `survei_goltar_noniaga` DISABLE KEYS */;
INSERT INTO `survei_goltar_noniaga` VALUES ('343082158412297',2,3,3,4,3,'R2');
/*!40000 ALTER TABLE `survei_goltar_noniaga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagihan`
--

DROP TABLE IF EXISTS `tagihan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tagihan` (
  `no_ds` varchar(6) NOT NULL,
  `cabang` char(5) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `stan` double NOT NULL,
  `pakai` int(11) NOT NULL,
  `tagihan` double NOT NULL,
  `denda` double NOT NULL,
  `tgl_rilis` date NOT NULL,
  `tgl_lunas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagihan`
--

LOCK TABLES `tagihan` WRITE;
/*!40000 ALTER TABLE `tagihan` DISABLE KEYS */;
INSERT INTO `tagihan` VALUES ('010001','01','Juni','2022',25000,10,57000,5000,'2022-06-03','0000-00-00'),('010001','01','Juli','2022',25000,9,53800,0,'2022-07-06','0000-00-00');
/*!40000 ALTER TABLE `tagihan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-09 19:51:31
