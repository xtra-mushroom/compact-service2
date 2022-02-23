-- MySQL dump 10.19  Distrib 10.3.32-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: compact_service
-- ------------------------------------------------------
-- Server version	10.3.32-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `desa`
--

DROP TABLE IF EXISTS `desa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `desa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kec` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kec` (`id_kec`),
  CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`id_kec`) REFERENCES `kecamatan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desa`
--

LOCK TABLES `desa` WRITE;
/*!40000 ALTER TABLE `desa` DISABLE KEYS */;
INSERT INTO `desa` VALUES (1,'3','Ambakiyang'),(2,'3','Awayan'),(3,'3','Awayan Hilir'),(4,'3','Badalungga'),(5,'3','Badalungga Hilir'),(6,'3','Baramban'),(7,'3','Baru'),(8,'3','Bihara'),(9,'3','Bihara Hilir'),(10,'3','Kedondong'),(11,'3','Merah'),(12,'3','Muara Jaya'),(13,'3','Nungka'),(14,'3','Pematang'),(15,'3','Piyait'),(16,'3','Pudak'),(17,'3','Pulantan'),(18,'3','Putat Basiun'),(19,'3','Sikontan'),(20,'3','Sungai Pumpung'),(21,'3','Tangalin'),(22,'3','Tundakan'),(23,'3','Tundi'),(24,'4','Bakung'),(25,'4','Banua Hanyar'),(26,'4','Batumandi'),(27,'4','Bungur'),(28,'4','Guha'),(29,'4','Gunung Manau'),(30,'4','Hamparaya'),(31,'4','Karuh'),(32,'4','Kasai'),(33,'4','Lok Batu'),(34,'4','Mampari'),(35,'4','Mantimin'),(36,'4','Munjung'),(37,'4','Pelajau'),(38,'4','Riwa'),(39,'4','Tariwin'),(40,'4','Teluk Mesjid'),(41,'4','Timbun Tulang'),(42,'7','Aniungan'),(43,'7','Bangkal'),(44,'7','Baruh Panyambaran'),(45,'7','Binjai Punggal'),(46,'7','Binju'),(47,'7','Binuang Santang'),(48,'7','Buntut Pilanduk'),(49,'7','Gunung Riut'),(50,'7','Ha\'uwai'),(51,'7','Halong'),(52,'7','Kapul'),(53,'7','Karya'),(54,'7','Liyu'),(55,'7','Mamantang'),(56,'7','Mantuyan'),(57,'7','Marajai'),(58,'7','Mauya'),(59,'7','Padang Raya'),(60,'7','Puyun'),(61,'7','Sumber Agung'),(62,'7','Suryatama'),(63,'7','Tabuan'),(64,'7','Uren'),(65,'5','Bata'),(66,'5','Buntu Karau'),(67,'5','Galumbang'),(68,'5','Gulinggang'),(69,'5','Hamarung'),(70,'5','Hukai'),(71,'5','Juai'),(72,'5','Lalayau'),(73,'5','Marias'),(74,'5','Mihu'),(75,'5','Muara Ninian'),(76,'5','Mungkur Uyam'),(77,'5','Pamurus'),(78,'5','Panimbaan'),(79,'5','Sirap'),(80,'5','Sumber Rejeki'),(81,'5','Sungai Batung'),(82,'5','Tawahan'),(83,'5','Teluk Bayur'),(84,'5','Tigarun'),(85,'5','Wonorejo'),(86,'6','Batu Merah'),(87,'6','Hilir Pasar'),(88,'6','Jimamun'),(89,'6','Jungkal'),(90,'6','Kandang Jaya'),(91,'6','Kupang'),(92,'6','Kusambi Hilir'),(93,'6','Kusambi Hulu'),(94,'6','Lajar'),(95,'6','Lampihong Kanan'),(96,'6','Lampihong Kiri'),(97,'6','Lampihong Selatan'),(98,'6','Lok Hamawang'),(99,'6','Lok Panginangan'),(100,'6','Matang Hanau'),(101,'6','Matang Lurus'),(102,'6','Mundar'),(103,'6','Panaitan'),(104,'6','Pimping'),(105,'6','Pupuyuan'),(106,'6','Simpang Tiga'),(107,'6','Sungai Awang'),(108,'6','Tampang'),(109,'6','Tanah Habang Kanan'),(110,'6','Tanah Habang Kiri'),(111,'6','Teluk Karya'),(112,'1','Babayau'),(113,'1','Balang'),(114,'1','Balida'),(115,'1','Dahai'),(116,'1','Hujan Mas'),(117,'1','Kalahiang'),(118,'1','Lamida'),(119,'1','Lasung Batu'),(120,'1','Layap'),(121,'1','Lokbatung'),(122,'1','Mangkayahu'),(123,'1','Murung Ilung'),(124,'1','Paran'),(125,'1','Paringin Kota'),(126,'1','Paringin Timur'),(127,'1','Sungai Katapi'),(128,'2','Baruh Bahinu Dalam'),(129,'2','Baruh Bahinu Luar'),(130,'2','Batu Piring'),(131,'2','Binjai'),(132,'2','Bungin'),(133,'2','Galombang'),(134,'2','Halubau'),(135,'2','Halubau Utara'),(136,'2','Inan'),(137,'2','Lingsir'),(138,'2','Maradap'),(139,'2','Murung Abuin'),(140,'2','Murung Jambu'),(141,'2','Panggung'),(142,'2','Tarangan'),(143,'2','Telaga Purun'),(144,'8','Ajung'),(145,'8','Auh'),(146,'8','Dayak Pitap'),(147,'8','Gunung Batu'),(148,'8','Ju\'uh'),(149,'8','Kambiyain'),(150,'8','Langkap'),(151,'8','Mayanau'),(152,'8','Simpang Bumbuan'),(153,'8','Simpang Nadung'),(154,'8','Sungsum'),(155,'8','Tebing Tinggi');
/*!40000 ALTER TABLE `desa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kecamatan` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatan`
--

LOCK TABLES `kecamatan` WRITE;
/*!40000 ALTER TABLE `kecamatan` DISABLE KEYS */;
INSERT INTO `kecamatan` VALUES ('1','Paringin'),('2','Paringin Selatan'),('3','Awayan'),('4','Batu Mandi'),('5','Juai'),('6','Lampihong'),('7','Halong'),('8','Tebing Tinggi');
/*!40000 ALTER TABLE `kecamatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keluhan`
--

DROP TABLE IF EXISTS `keluhan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keluhan` (
  `no_ds` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tgl_keluhan` date NOT NULL,
  `keluhan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keluhan`
--

LOCK TABLES `keluhan` WRITE;
/*!40000 ALTER TABLE `keluhan` DISABLE KEYS */;
INSERT INTO `keluhan` VALUES ('080001','Pelanggan Satu Balik Nama','Batu Piring RT.2','082152527752','2022-02-19','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),('060005','Pelanggan Tujuh Balik Satu','Tugu Gula Habang','082152526666','2022-02-21','Aliran air sangat kecil setelah rumah ditinggalkan cukup lama kemudian ditinggali kembali, mengatur meter air tetap tidak mempengaruhi debit air');
/*!40000 ALTER TABLE `keluhan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('admin','21232f297a57a5a743894a0e4a801fc3');
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
  `ttl` varchar(255) NOT NULL,
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
INSERT INTO `pelanggan` VALUES ('080001','TERTUTUP','R2','Pelanggan Satu Balik Nama','1111111111145','Paringin, 06-07-1964','Laki-Laki','Batu Piring RT.2','082152527752'),('010002','TERBUKA','R2','Pelanggan Tiga','333333333333','Paringin, 13-07-1980','Laki-Laki','Komplek Selawi RT.05','08218948567'),('050003','TERBUKA','R2','Pelanggan Empat Balik Satu','444444444414','Paringin, 03-05-1989','Laki-Laki','Baruh Panyambaran RT.03','082152527999'),('010003','TERTUTUP','R2','Pelanggan Sembilan','999999999999','Paringin, 28-11-1976','Laki-Laki','Balida RT.09','082189487777'),('090003','TERTUTUP','SK','Pelanggan Delapan','888888888888','Awayan, 03-05-1979','Perempuan','Gunung Batu RT.02','08218948509'),('050004','TERBUKA','R2','Pelanggan Lima','555555555555','Amuntai, 03-05-1979','Perempuan','Trans Desa 2','08218294820'),('060005','TERBUKA','NK','Pelanggan Tujuh Balik Satu','777777777717','Batumandi, 20-07-1986','Perempuan','Tugu Gula Habang','082152526666'),('040006','TERBUKA','R2','Pelanggan Sepuluh','101010101010','Paringin, 15-07-1990','Laki-Laki','Kusambi Hilir RT.07','08218948421'),('080007','TERBUKA','SK','Pelanggan Duabelas','222222222202','Kandangan, 06-28-1964','Perempuan','Jalan Gampa KM.1,5','08218948245'),('010008','TERBUKA','R2','Pelanggan Tigabelas','333333333303','Paringin, 06-04-1984','Laki-Laki','Rica Rt.10','08218948597'),('040009','TERBUKA','NK','Pelanggan Limabelas','555555555505','Amuntai, 03-05-1990','Perempuan','Kupang RT.03','08218948429');
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
  `id` int(11) NOT NULL,
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
INSERT INTO `pemasangan` VALUES ('010002',2,'2022-02-21','Milik keluarga','5','010124','01','R2',1463000),('010003',3,'2022-02-15','Sewa','7','010665','01','R2',1520000),('010008',10,'2022-02-21','Milik keluarga','6','010145','01','R2',1666000),('040006',8,'2022-02-21','Sewa','3','010198','04','R2',1400000),('040009',11,'2022-02-21','Milik sendiri','4','010194','04','NK',1635000),('050003',5,'2022-02-10','Milik sendiri','6','010189','05','R2',1487000),('050004',6,'2022-02-07','Sewa','5','010123','05','R2',1402000),('060005',7,'2022-02-07','Milik keluarga','5','010661','06','NK',1775000),('080001',1,'2022-02-18','Sewa','5','010183','08','R2',1400000),('080007',9,'2022-02-21','Lain-lain','-','010176','08','SK',2430000),('090003',4,'2022-02-16','Lain-lain','-','010197','09','SK',2114000);
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
  `no_pend` int(11) NOT NULL AUTO_INCREMENT,
  `no_ds` char(6) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kel` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_wil` varchar(50) NOT NULL,
  `wil` varchar(50) NOT NULL,
  `biaya` int(11) NOT NULL,
  PRIMARY KEY (`no_pend`),
  UNIQUE KEY `no_ktp` (`no_ktp`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendaftaran`
--

LOCK TABLES `pendaftaran` WRITE;
/*!40000 ALTER TABLE `pendaftaran` DISABLE KEYS */;
INSERT INTO `pendaftaran` VALUES (33,'080001','2022-02-18','111111111111','Pelanggan Satu','Perempuan','Batu Piring RT.2','2','130','08218948213','08','Paringin Selatan',20000),(34,'','2022-02-05','222222222222','Pelanggan Dua','Laki-Laki','Komplek Muhibin','4','34','08218948414','07','Batumandi',20000),(35,'010002','2022-02-05','333333333333','Pelanggan Tiga','Laki-Laki','Komplek Selawi RT.05','1','125','08218948567','01','Paringin 1',20000),(36,'050003','2022-02-07','444444444444','Pelanggan Empat','Laki-Laki','Baruh Panyambaran RT.03','7','44','08218948567','05','Halong',20000),(37,'050004','2022-02-04','555555555555','Pelanggan Lima','Perempuan','Trans Desa 2','7','44','08218294820','05','Halong',20000),(38,'','2022-02-08','666666666666','Pelanggan Enam','Laki-Laki','Dahai RT.09','1','115','08218948217','02','Paringin 2',20000),(39,'060005','2022-02-02','777777777777','Pelanggan Tujuh','Perempuan','Tugu Gula Habang','5','76','08218948422','06','Juai',20000),(40,'090003','2022-02-09','888888888888','Pelanggan Delapan','Perempuan','Gunung Batu RT.02','8','147','08218948509','09','Tebing Tinggi',20000),(41,'010003','2022-02-09','999999999999','Pelanggan Sembilan','Laki-Laki','Balida RT.09','1','114','082189487777','01','Paringin 1',20000),(42,'040006','2022-02-10','101010101010','Pelanggan Sepuluh','Laki-Laki','Kusambi Hilir RT.07','6','86','08218948421','04','Lampihong',20000),(43,'','2022-02-12','11111111101','Pelanggan Sebelas','Laki-Laki','Desa Etep RT.04','3','2','08218948090','03','Awayan',20000),(44,'080007','2022-02-14','222222222202','Pelanggan Duabelas','Perempuan','Jalan Gampa KM.1,5','2','130','08218948245','08','Paringin Selatan',20000),(45,'010008','2022-02-18','333333333303','Pelanggan Tigabelas','Laki-Laki','Rica Rt.10','1','125','08218948597','01','Paringin 1',20000),(46,'','2022-02-17','444444444404','Pelanggan Empatbelas','Laki-Laki','Batu Piring RT.04','2','130','08218948200','08','Paringin Selatan',20000),(47,'040009','2022-02-21','555555555505','Pelanggan Limabelas','Perempuan','Kupang RT.03','6','91','08218948429','04','Lampihong',20000);
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-23 13:54:36
