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
  `wilayah` varchar(5) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nik_asal` varchar(20) NOT NULL,
  `nama_asal` varchar(255) NOT NULL,
  `nama_baru` varchar(255) NOT NULL,
  `nik_baru` varchar(20) NOT NULL,
  `hp_baru` varchar(20) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  UNIQUE KEY `no_ds` (`no_ds`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baliknama`
--

LOCK TABLES `baliknama` WRITE;
/*!40000 ALTER TABLE `baliknama` DISABLE KEYS */;
INSERT INTO `baliknama` VALUES ('080001','02','Batu Piring RT.2','160239823959','Ayu Kumala Sari Rahayu','Suhendar','166622779001','087796963213','2022-01-20');
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
  `id_kec` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desa`
--

LOCK TABLES `desa` WRITE;
/*!40000 ALTER TABLE `desa` DISABLE KEYS */;
INSERT INTO `desa` VALUES (1,3,'Ambakiyang'),(2,3,'Awayan'),(3,3,'Awayan Hilir'),(4,3,'Badalungga'),(5,3,'Badalungga Hilir'),(6,3,'Baramban'),(7,3,'Baru'),(8,3,'Bihara'),(9,3,'Bihara Hilir'),(10,3,'Kedondong'),(11,3,'Merah'),(12,3,'Muara Jaya'),(13,3,'Nungka'),(14,3,'Pematang'),(15,3,'Piyait'),(16,3,'Pudak'),(17,3,'Pulantan'),(18,3,'Putat Basiun'),(19,3,'Sikontan'),(20,3,'Sungai Pumpung'),(21,3,'Tangalin'),(22,3,'Tundakan'),(23,3,'Tundi'),(24,4,'Bakung'),(25,4,'Banua Hanyar'),(26,4,'Batumandi'),(27,4,'Bungur'),(28,4,'Guha'),(29,4,'Gunung Manau'),(30,4,'Hamparaya'),(31,4,'Karuh'),(32,4,'Kasai'),(33,4,'Lok Batu'),(34,4,'Mampari'),(35,4,'Mantimin'),(36,4,'Munjung'),(37,4,'Pelajau'),(38,4,'Riwa'),(39,4,'Tariwin'),(40,4,'Teluk Mesjid'),(41,4,'Timbun Tulang'),(42,7,'Aniungan'),(43,7,'Bangkal'),(44,7,'Baruh Panyambaran'),(45,7,'Binjai Punggal'),(46,7,'Binju'),(47,7,'Binuang Santang'),(48,7,'Buntut Pilanduk'),(49,7,'Gunung Riut'),(50,7,'Ha\'uwai'),(51,7,'Halong'),(52,7,'Kapul'),(53,7,'Karya'),(54,7,'Liyu'),(55,7,'Mamantang'),(56,7,'Mantuyan'),(57,7,'Marajai'),(58,7,'Mauya'),(59,7,'Padang Raya'),(60,7,'Puyun'),(61,7,'Sumber Agung'),(62,7,'Suryatama'),(63,7,'Tabuan'),(64,7,'Uren'),(65,5,'Bata'),(66,5,'Buntu Karau'),(67,5,'Galumbang'),(68,5,'Gulinggang'),(69,5,'Hamarung'),(70,5,'Hukai'),(71,5,'Juai'),(72,5,'Lalayau'),(73,5,'Marias'),(74,5,'Mihu'),(75,5,'Muara Ninian'),(76,5,'Mungkur Uyam'),(77,5,'Pamurus'),(78,5,'Panimbaan'),(79,5,'Sirap'),(80,5,'Sumber Rejeki'),(81,5,'Sungai Batung'),(82,5,'Tawahan'),(83,5,'Teluk Bayur'),(84,5,'Tigarun'),(85,5,'Wonorejo'),(86,6,'Batu Merah'),(87,6,'Hilir Pasar'),(88,6,'Jimamun'),(89,6,'Jungkal'),(90,6,'Kandang Jaya'),(91,6,'Kupang'),(92,6,'Kusambi Hilir'),(93,6,'Kusambi Hulu'),(94,6,'Lajar'),(95,6,'Lampihong Kanan'),(96,6,'Lampihong Kiri'),(97,6,'Lampihong Selatan'),(98,6,'Lok Hamawang'),(99,6,'Lok Panginangan'),(100,6,'Matang Hanau'),(101,6,'Matang Lurus'),(102,6,'Mundar'),(103,6,'Panaitan'),(104,6,'Pimping'),(105,6,'Pupuyuan'),(106,6,'Simpang Tiga'),(107,6,'Sungai Awang'),(108,6,'Tampang'),(109,6,'Tanah Habang Kanan'),(110,6,'Tanah Habang Kiri'),(111,6,'Teluk Karya'),(112,1,'Babayau'),(113,1,'Balang'),(114,1,'Balida'),(115,1,'Dahai'),(116,1,'Hujan Mas'),(117,1,'Kalahiang'),(118,1,'Lamida'),(119,1,'Lasung Batu'),(120,1,'Layap'),(121,1,'Lokbatung'),(122,1,'Mangkayahu'),(123,1,'Murung Ilung'),(124,1,'Paran'),(125,1,'Paringin Kota'),(126,1,'Paringin Timur'),(127,1,'Sungai Katapi'),(128,2,'Baruh Bahinu Dalam'),(129,2,'Baruh Bahinu Luar'),(130,2,'Batu Piring'),(131,2,'Binjai'),(132,2,'Bungin'),(133,2,'Galombang'),(134,2,'Halubau'),(135,2,'Halubau Utara'),(136,2,'Inan'),(137,2,'Lingsir'),(138,2,'Maradap'),(139,2,'Murung Abuin'),(140,2,'Murung Jambu'),(141,2,'Panggung'),(142,2,'Tarangan'),(143,2,'Telaga Purun'),(144,8,'Ajung'),(145,8,'Auh'),(146,8,'Dayak Pitap'),(147,8,'Gunung Batu'),(148,8,'Ju\'uh'),(149,8,'Kambiyain'),(150,8,'Langkap'),(151,8,'Mayanau'),(152,8,'Simpang Bumbuan'),(153,8,'Simpang Nadung'),(154,8,'Sungsum'),(155,8,'Tebing Tinggi');
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
INSERT INTO `keluhan` VALUES ('080001','Suhendar','Batu Piring RT.2','087796963213','2022-01-20','Ini isi keluhan pelanggan');
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
  `id_tarif` varchar(10) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
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
INSERT INTO `pelanggan` VALUES ('080001','TERTUTUP','R2','Suhendar','Laki-Laki','Batu Piring RT.2','087796963213');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pemasangan`
--

DROP TABLE IF EXISTS `pemasangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pemasangan` (
  `no_ds` varchar(6) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `tgl_pasang` date NOT NULL,
  `tgl_install` date NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kel` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `status_kep_rumah` varchar(50) NOT NULL,
  `jumlah_jiwa` varchar(10) NOT NULL,
  `pln` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `gol_tarif` varchar(10) NOT NULL,
  `biaya` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pemasangan`
--

LOCK TABLES `pemasangan` WRITE;
/*!40000 ALTER TABLE `pemasangan` DISABLE KEYS */;
INSERT INTO `pemasangan` VALUES ('080001','160239823959','2022-01-20','0000-00-00','Ayu Kumala Sari Rahayu','Perempuan','Amuntai','20/07/1886','Milik keluarga','4','01019','Batu Piring RT.2','2','130','08218948213','08','R2','1.400.000');
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
  `tgl_buka` date NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembukaan`
--

LOCK TABLES `pembukaan` WRITE;
/*!40000 ALTER TABLE `pembukaan` DISABLE KEYS */;
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
  `no_ds` varchar(6) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kel` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `wil` varchar(50) NOT NULL,
  PRIMARY KEY (`no_pend`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendaftaran`
--

LOCK TABLES `pendaftaran` WRITE;
/*!40000 ALTER TABLE `pendaftaran` DISABLE KEYS */;
INSERT INTO `pendaftaran` VALUES (10,'','2022-01-18','160239823958','Lily Syifa','Perempuan','Jalan Pemangkasan','3','13','08218948444','03'),(11,'080001','2022-01-19','160239823959','Ayu Kumala Sari Rahayu','Perempuan','Batu Piring RT.2','2','130','08218948213','02');
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
  `tgl_tutup` date NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penutupan`
--

LOCK TABLES `penutupan` WRITE;
/*!40000 ALTER TABLE `penutupan` DISABLE KEYS */;
INSERT INTO `penutupan` VALUES ('080001','2022-01-20','Ayu Kumala Sari Rahayu','Batu Piring RT.2','08218948213','Permintaan penutupan');
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

-- Dump completed on 2022-01-20 22:00:20
