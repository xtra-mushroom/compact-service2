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
  `cabang` char(5) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `no_log` varchar(15) NOT NULL,
  `passwd_pelanggan` varchar(255) NOT NULL,
  `status_bayar` enum('belum','diverifikasi') NOT NULL,
  `status_up_berkas` enum('belum','lengkap') NOT NULL,
  `status_pasang` enum('belum','terpasang') NOT NULL,
  PRIMARY KEY (`no_reg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `antri_daftar`
--

LOCK TABLES `antri_daftar` WRITE;
/*!40000 ALTER TABLE `antri_daftar` DISABLE KEYS */;
INSERT INTO `antri_daftar` VALUES ('343081122529996','Adi Kamarudin','Laki-Laki','081122529996','Juai, Desa Mungkur Uyam RT.11 RW.05','05','report/kwitansi.php?no_reg=343081122529996','050013','$2y$10$WeJPBLE2nRbAbt/NcW8S6Oz1v4r50t1Wcjft6B56ftLFnKa6KNnIC','diverifikasi','lengkap','terpasang'),('343081133636223','Ahmad Ariyanoor','Laki-Laki','081133636223','Awayan Hilir, RT.05','03','report/kwitansi.php?no_reg=343081133636223','0362239156','','diverifikasi','lengkap','belum'),('343081213121111','Solihin','Laki-Laki','081213121111','Desa Muara Ninian, RT.03 Samping Masjid Al-Hasannah, Juai','05','report/kwitansi.php?no_reg=343081213121111','050009','$2y$10$9AUimjZL/VU9oCIVNLtciel./L4C4XW1oCFfFba1bbxd5.TS.IqGq','diverifikasi','lengkap','terpasang'),('343081215144911','Ernawati','Perempuan','081215144911','Tebing Tinggi, Dayak Pitap, RT.07 RW.2','08','1131731024_download.png','080010','$2y$10$2Bsi0xmuqMt1T2jJ25tgbOE0ijpolbm8YqSIbDKrx7rCTKAw0o9Ry','diverifikasi','lengkap','terpasang'),('343081304250033','Ahmad Imroatus','Laki-Laki','081304250033','Paringin Selatan, Batu Piring RT.01, Masuk Belakang SMPN 1 Paringin','02','446602867_download.png','020014','$2y$10$QsReMYKsQTqISn3wp1jW4efT63tRRlCYnluTtAlbZx2vU7glVtRVy','diverifikasi','lengkap','terpasang'),('343081351555412','Rena Febriani','Perempuan','081351555412','Paringin Kota, Garuda Maharam, RT.14','01','1767990613_download.png','010004','$2y$10$aSH1bvEjD6OH4BzYoH2uaONPNccJaf/5M1FEgZ.hVOVqWCPBLJYh2','diverifikasi','lengkap','terpasang'),('343081522152210','Ahlunnisa','Perempuan','081522152210','Desa Tundakan RT.10, Kecamatan Awayan','03','1022779212_download.png','030007','$2y$10$xZdpCGacC0ACCwnqucVoC.TfiEsX0OhgX7gU.ldp/YsxLPo5o7Qg2','diverifikasi','lengkap','terpasang'),('343081963252517','Sumiati','Perempuan','081963252517','Paringin Selatan, Batu Piring, Tungkap RT.02 Dekat Paud IT','02','1126147597_download.png','020005','$2y$10$HYqKFsRn.ZFH6JdvdXZ9Q.DonXVje1EJzzjRT2KZPh9dGYiLzQe3q','diverifikasi','lengkap','terpasang'),('343082155553031','Rumi Anandita Putri','Perempuan','082155553031','Paringin Kota, Jalan Prumnas Muhibin, No.123','01','1369625277_download.png','010015','$2y$10$cupj/PvGdDdkqxCbrBFOXOQmddgtj9gg7D4soKn5OK7tFV4TYswR6','diverifikasi','lengkap','terpasang'),('343082158412232','Surya Dini','Laki-Laki','082158412232','Desa Mantimin RT.02, Kecamatan Batumandi, Dekat Masjid Mantimin','07','734715618_download.png','070001','$2y$10$zr876umsGIsMIwYfPY9ae.xtmA6JwMk8L6YwTekmD8DD.Ve6/Vmmu','diverifikasi','lengkap','terpasang'),('343083285888912','Mira Ayu Diah','Perempuan','083285888912','Batu Mandi RT.09, masuk samping kantor camat, samping toko kelontong umi','07','220301775_download.png','070011','$2y$10$PltiVjHTfrNusbCJYsyBaeheVhwQz.LhSQ0SGUeI7MZ1fE.9a5Ky6','diverifikasi','lengkap','terpasang'),('343085212071473','Nikita Dwi Putri','Perempuan','085212071473','Desa Riwa RT.04, Halat 5 buah dari pom batumandi','07','730721850_download.png','070003','$2y$10$LVZvY94qrorbcbZoWcK3QetIqX.d.LjmAX8UL.3NfvAJt6TJ9mBtu','diverifikasi','lengkap','terpasang'),('343085214121466','Umi Kalsum','Perempuan','085214121466','Kusambi Hilir, RT.07 RW.03, Lampihong, Dekat masjid muhammadiyah kusambi','04','report/kwitansi.php?no_reg=343085214121466','040006','$2y$10$pbmWMTW.d1JojRzAIN.IjONSfRVSBKv9Ae142BOZRz.M9J7hxxL8q','diverifikasi','lengkap','terpasang'),('343085214141455','Siti Sumiati','Perempuan','085214141455','Kusambi Hilir, RT.09 RW.04, Lampihong','04','2066083032_download.png','040002','$2y$10$lRfOjVTzFZ8BFH3BKakZFO7/J4osLbk3hADGIcnyIaCyhwRIjEC9e','diverifikasi','lengkap','terpasang'),('343085221324470','Rusdianor','Laki-Laki','085221324470','Juai, Mihu, RT.10','05','458323306_download.png','050012','$2y$10$JChn30t.KI3N3CcxwkbkrecmF93Md7YR76Ox77nIhNylNUduFFzM.','diverifikasi','lengkap','terpasang'),('343085241417871','Sugandi','Laki-Laki','085241417871','Paringin Selatan, Jl. Gunung Pandau, Sebrang lapangan sepak bola parsel','02','report/kwitansi.php?no_reg=343085241417871','020016','$2y$10$nHsunAWgK1uFOY2LkrMefO9O1Cu/QMbGsBA3XD4dsUV69x5Ooj7p2','diverifikasi','lengkap','terpasang'),('343087514412636','Rahmat Efendi','Laki-Laki','087514412636','Desa Layap, Kecamatan Paringin, RT.04, Sebrang MTS Layap','01','1652585574_download.png','010008','$2y$10$VmmOceqMnOckWpt8hNHsIeQEefgFpHZ9BaCSaNJZ1v8jmTKXQmz3.','diverifikasi','lengkap','terpasang'),('343087779797117','Suriyansyah','Laki-Laki','087779797117','Baruh Panyambaran, Trans Desa 2, RT.05, Halong','06','2025845234_download.png','0671173572','','diverifikasi','lengkap','belum');
/*!40000 ALTER TABLE `antri_daftar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `baliknama`
--

DROP TABLE IF EXISTS `baliknama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baliknama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_ds` varchar(6) NOT NULL,
  `id_wilayah` char(5) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nik_asal` varchar(20) NOT NULL,
  `hp_asal` varchar(20) NOT NULL,
  `jk_asal` varchar(50) NOT NULL,
  `nama_asal` varchar(255) NOT NULL,
  `nama_baru` varchar(255) NOT NULL,
  `jk_baru` varchar(50) NOT NULL,
  `nik_baru` varchar(20) NOT NULL,
  `hp_baru` varchar(20) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `biaya` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baliknama`
--

LOCK TABLES `baliknama` WRITE;
/*!40000 ALTER TABLE `baliknama` DISABLE KEYS */;
INSERT INTO `baliknama` VALUES (6,'040006','04','Kusambi Hilir, RT.07 RW.03, Lampihong, Dekat masjid muhammadiyah kusambi','6308054606000016','085214121466','Perempuan','Umi Kalsum','Ahmad Zubair','Laki-Laki','6308054606000061','085214121756','2022-05-25',20000),(7,'080010','08','Tebing Tinggi, Dayak Pitap, RT.07 RW.2','6308054606000027','081215144911','Perempuan','Ernawati','Rahimanisa','Perempuan','6308054606000072','081215144191','2022-06-13',20000);
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
INSERT INTO `detail_survei_bahan` VALUES ('KWM1','343082158412232',56000,1),('SK1','343082158412232',98562,1),('L1','343082158412232',178410,1),('KG1','343082158412232',9357,5),('DNB1','343082158412232',9357,1),('WM1','343082158412232',33000,1),('PD1','343082158412232',10000,1),('PH1','343082158412232',8110,3),('I1','343082158412232',9868,1),('K1','343082158412232',34071,1),('PPH1','343082158412232',5000,1),('BPK1','343082158412232',2500,1),('T1','343082158412232',20000,1),('PP1','343082158412232',10000,1),('KWM1','343085212071473',56000,1),('SK1','343085212071473',98562,1),('L1','343085212071473',178410,1),('KG1','343085212071473',9357,5),('DNB1','343085212071473',9357,1),('TSG1','343085212071473',24400,1),('WM1','343085212071473',33000,1),('PD1','343085212071473',10000,1),('PH1','343085212071473',8110,3),('I1','343085212071473',9868,1),('K1','343085212071473',34071,2),('PPH1','343085212071473',5000,1),('BPK1','343085212071473',2500,2),('T1','343085212071473',20000,1),('PP1','343085212071473',10000,1),('KWM1','343085214141455',56000,1),('SK1','343085214141455',98562,1),('L1','343085214141455',178410,1),('KG1','343085214141455',9357,5),('DNB1','343085214141455',9357,1),('WM1','343085214141455',33000,1),('WMC1','343085214141455',490000,1),('PD1','343085214141455',10000,1),('PH1','343085214141455',8110,3),('I1','343085214141455',9868,1),('EG1','343085214141455',17467,1),('K1','343085214141455',34071,1),('PPH1','343085214141455',5000,1),('BPK1','343085214141455',2500,1),('T1','343085214141455',20000,1),('PP1','343085214141455',10000,1),('KWM1','343081351555412',56000,1),('SK1','343081351555412',98562,1),('L1','343081351555412',178410,1),('KG1','343081351555412',9357,5),('DNB1','343081351555412',9357,1),('DNB2','343081351555412',21210,1),('WM1','343081351555412',33000,1),('WMC1','343081351555412',490000,1),('PD1','343081351555412',10000,1),('PH1','343081351555412',8110,3),('I1','343081351555412',9868,1),('K1','343081351555412',34071,2),('BPK1','343081351555412',2500,1),('T1','343081351555412',20000,1),('PP1','343081351555412',10000,1),('BCB1','343081351555412',117000,1),('KWM1','343081963252517',56000,1),('SK1','343081963252517',98562,1),('L1','343081963252517',178410,1),('KG1','343081963252517',9357,5),('DNB1','343081963252517',9357,1),('WM1','343081963252517',33000,1),('WMC1','343081963252517',490000,1),('PD1','343081963252517',10000,1),('PH1','343081963252517',8110,3),('I1','343081963252517',9868,1),('K1','343081963252517',34071,1),('PPH1','343081963252517',5000,1),('BPK1','343081963252517',2500,1),('T1','343081963252517',20000,1),('PP1','343081963252517',10000,1),('KWM1','343085214121466',56000,1),('SK1','343085214121466',98562,1),('L1','343085214121466',178410,1),('KG1','343085214121466',9357,10),('DNB1','343085214121466',9357,1),('DNB2','343085214121466',21210,1),('TSG1','343085214121466',24400,1),('WM1','343085214121466',33000,1),('WMC1','343085214121466',490000,1),('PD1','343085214121466',10000,1),('PH1','343085214121466',8110,10),('I1','343085214121466',9868,2),('EG1','343085214121466',17467,1),('K1','343085214121466',34071,10),('SG1','343085214121466',8733,1),('PPH1','343085214121466',5000,1),('PS1','343085214121466',170000,1),('BPK1','343085214121466',2500,10),('T1','343085214121466',20000,1),('PP1','343085214121466',10000,1),('BCB1','343085214121466',117000,1),('KWM1','343087779797117',56000,1),('SK1','343087779797117',98562,1),('L1','343087779797117',178410,1),('KG1','343087779797117',9357,5),('DNB1','343087779797117',9357,1),('WM1','343087779797117',33000,1),('WMC1','343087779797117',490000,1),('PD1','343087779797117',10000,1),('PH1','343087779797117',8110,2),('I1','343087779797117',9868,1),('K1','343087779797117',34071,1),('PPH1','343087779797117',5000,1),('BPK1','343087779797117',2500,1),('T1','343087779797117',20000,1),('PP1','343087779797117',10000,1),('KWM1','343081522152210',56000,1),('SK1','343081522152210',98562,1),('L1','343081522152210',178410,1),('KG1','343081522152210',9357,5),('DNB1','343081522152210',9357,1),('WM1','343081522152210',33000,1),('WMC1','343081522152210',490000,1),('PD1','343081522152210',10000,1),('PH1','343081522152210',8110,3),('I1','343081522152210',9868,1),('K1','343081522152210',34071,1),('PPH1','343081522152210',5000,1),('BPK1','343081522152210',2500,1),('T1','343081522152210',20000,1),('PP1','343081522152210',10000,1),('KWM1','343087514412636',56000,1),('SK1','343087514412636',98562,1),('L1','343087514412636',178410,1),('KG1','343087514412636',9357,5),('DNB1','343087514412636',9357,1),('WM1','343087514412636',33000,1),('WMC1','343087514412636',490000,1),('PD1','343087514412636',10000,1),('PH1','343087514412636',8110,3),('I1','343087514412636',9868,1),('K1','343087514412636',34071,1),('PPH1','343087514412636',5000,1),('BPK1','343087514412636',2500,1),('T1','343087514412636',20000,1),('PP1','343087514412636',10000,1),('BCJ1','343087514412636',175000,1),('BCB1','343087514412636',117000,1),('KWM1','343081213121111',56000,1),('SK1','343081213121111',98562,1),('L1','343081213121111',178410,1),('KG1','343081213121111',9357,10),('DNB1','343081213121111',9357,1),('DNB2','343081213121111',21210,1),('WM1','343081213121111',33000,1),('WMC1','343081213121111',490000,1),('PD1','343081213121111',10000,1),('PH1','343081213121111',8110,1),('I1','343081213121111',9868,1),('K1','343081213121111',34071,10),('PPH1','343081213121111',5000,5),('BPK1','343081213121111',2500,10),('T1','343081213121111',20000,1),('PP1','343081213121111',10000,1),('BCJ1','343081213121111',175000,1),('KWM1','343081215144911',56000,1),('SK1','343081215144911',98562,1),('L1','343081215144911',178410,1),('KG1','343081215144911',9357,5),('DNB1','343081215144911',9357,1),('WM1','343081215144911',33000,1),('WMC1','343081215144911',490000,1),('PD1','343081215144911',10000,1),('PH1','343081215144911',8110,1),('I1','343081215144911',9868,1),('K1','343081215144911',34071,1),('SG1','343081215144911',8733,1),('PPH1','343081215144911',5000,1),('BPK1','343081215144911',2500,1),('T1','343081215144911',20000,1),('PP1','343081215144911',10000,1),('KWM1','343083285888912',56000,1),('SK1','343083285888912',98562,1),('L1','343083285888912',178410,1),('KG1','343083285888912',9357,1),('DNB1','343083285888912',9357,1),('TSG1','343083285888912',24400,1),('WM1','343083285888912',33000,1),('WMC1','343083285888912',490000,1),('PD1','343083285888912',10000,1),('PH1','343083285888912',8110,3),('I1','343083285888912',9868,1),('K1','343083285888912',34071,1),('PPH1','343083285888912',5000,1),('PS1','343083285888912',170000,1),('BPK1','343083285888912',2500,1),('T1','343083285888912',20000,1),('PP1','343083285888912',10000,1),('KWM1','343085221324470',56000,1),('SK1','343085221324470',98562,1),('L1','343085221324470',178410,1),('KG1','343085221324470',9357,5),('DNB1','343085221324470',9357,1),('WM1','343085221324470',33000,1),('WMC1','343085221324470',490000,1),('PD1','343085221324470',10000,1),('PH1','343085221324470',8110,3),('I1','343085221324470',9868,1),('PPH1','343085221324470',5000,1),('BPK1','343085221324470',2500,1),('T1','343085221324470',20000,1),('PP1','343085221324470',10000,1),('K1','343085221324470',34071,1),('KWM1','343081122529996',56000,1),('SK1','343081122529996',98562,1),('L1','343081122529996',178410,1),('KG1','343081122529996',9357,5),('DNB1','343081122529996',9357,1),('WM1','343081122529996',33000,1),('WMC1','343081122529996',490000,1),('PD1','343081122529996',10000,1),('PH1','343081122529996',8110,3),('I1','343081122529996',9868,1),('K1','343081122529996',34071,1),('PPH1','343081122529996',5000,1),('PS1','343081122529996',170000,1),('BPK1','343081122529996',2500,1),('T1','343081122529996',20000,1),('PP1','343081122529996',10000,1),('KWM1','343081133636223',56000,1),('SK1','343081133636223',98562,1),('L1','343081133636223',178410,1),('KG1','343081133636223',9357,5),('DNB1','343081133636223',9357,1),('WM1','343081133636223',33000,1),('WMC1','343081133636223',490000,1),('PD1','343081133636223',10000,1),('PH1','343081133636223',8110,3),('I1','343081133636223',9868,1),('K1','343081133636223',34071,1),('PPH1','343081133636223',5000,1),('BPK1','343081133636223',2500,1),('T1','343081133636223',20000,1),('PP1','343081133636223',10000,1),('KWM1','343081304250033',56000,1),('SK1','343081304250033',98562,1),('L1','343081304250033',178410,1),('KG1','343081304250033',9357,8),('DNB1','343081304250033',9357,1),('DNB2','343081304250033',21210,1),('TSG1','343081304250033',24400,1),('WM2','343081304250033',46786,1),('WMC1','343081304250033',490000,1),('PD1','343081304250033',10000,1),('PH1','343081304250033',8110,5),('I1','343081304250033',9868,1),('K1','343081304250033',34071,2),('PPH1','343081304250033',5000,1),('BPK1','343081304250033',2500,2),('PP1','343081304250033',10000,2),('BCB1','343081304250033',117000,1),('KWM1','343082155553031',56000,1),('SK1','343082155553031',98562,1),('L1','343082155553031',178410,1),('KG1','343082155553031',9357,5),('DNB1','343082155553031',9357,1),('WM1','343082155553031',33000,1),('WMC1','343082155553031',490000,1),('PD1','343082155553031',10000,1),('PH1','343082155553031',8110,1),('I1','343082155553031',9868,1),('K1','343082155553031',34071,1),('PPH1','343082155553031',5000,1),('BPK1','343082155553031',2500,1),('T1','343082155553031',20000,1),('PP1','343082155553031',10000,1),('BCB1','343082155553031',117000,1),('KWM1','343085241417871',56000,1),('SK1','343085241417871',98562,1),('L1','343085241417871',178410,1),('KG1','343085241417871',9357,5),('DNB1','343085241417871',9357,1),('WM1','343085241417871',33000,1),('WMC1','343085241417871',490000,1),('PD1','343085241417871',10000,1),('PH1','343085241417871',8110,3),('I1','343085241417871',9868,1),('K1','343085241417871',34071,1),('PPH1','343085241417871',5000,1),('BPK1','343085241417871',2500,1),('T1','343085241417871',20000,1),('PP1','343085241417871',10000,1);
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
  `jenis_penanganan` enum('Butuh observasi dan tindak lanjut','Penanganan instan','') NOT NULL,
  `penanganan` text NOT NULL,
  `tgl_tangani` date NOT NULL,
  `catatan` text NOT NULL,
  `status_penanganan` enum('Telah ditangani','Belum ditangani') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keluhan`
--

LOCK TABLES `keluhan` WRITE;
/*!40000 ALTER TABLE `keluhan` DISABLE KEYS */;
/*!40000 ALTER TABLE `keluhan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jenis_kel` enum('Laki-Laki','Perempuan') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `peran` enum('PEGAWAI','PIMPINAN','TEKNISI') NOT NULL,
  `login_terakhir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'Drajat Windarto','Laki-Laki','kabag','$2y$10$SM3M4lIeEWAj5xNl.iCF9u5w8Q7.RpK6VS8iYgBnPRQvGYc3Q4Jju','PIMPINAN','2022-07-27 06:58:20'),(2,'Fitria','Perempuan','pegawai','$2y$10$dBpM/ZEToZvtt9Keny7Yz.LlVOCLK9Lhd6qvSa81igfszHAir69Yi','PEGAWAI','2022-07-27 17:10:48'),(3,'Udin','Laki-Laki','perencana','$2y$10$hGkqRqWPJBBPBeVDFQQDCeg3ObgXlLHRUg0LnlcVGoBIpjxuCXY8q','TEKNISI','2022-07-27 16:52:05'),(4,'Herli','Laki-Laki','trandis','$2y$10$fhRULIs7QwnBHMc4L/2g5.ptMacnvexYVYsNx7vx3DAVG37Z6vLC2','TEKNISI','2022-07-27 16:38:49');
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
INSERT INTO `pelanggan` VALUES ('070001','TERBUKA','R2','Surya Dini','6308054606000022','Laki-Laki','Desa Mantimin RT.02, Kecamatan Batumandi, Dekat Masjid Mantimin','082158412232'),('040002','TERBUKA','NK','Siti Sumiati','6308054606000015','Perempuan','Kusambi Hilir, RT.09 RW.04, Lampihong','085214141455'),('070003','TERBUKA','NK','Nikita Dwi Putri','6308054606000023','Perempuan','Desa Riwa RT.04, Halat 5 buah dari pom batumandi','085212071473'),('010004','TERBUKA','R3','Rena Febriani','6308054606000003','Perempuan','Paringin Kota, Garuda Maharam, RT.14','081351555412'),('020005','TERBUKA','R2','Sumiati','6308054606000007','Perempuan','Paringin Selatan, Batu Piring, Tungkap RT.02 Dekat Paud IT','081963252517'),('040006','TERBUKA','SK','Ahmad Zubair','6308054606000061','Laki-Laki','Kusambi Hilir, RT.07 RW.03, Lampihong, Dekat masjid muhammadiyah kusambi','085214121756'),('030007','TERBUKA','R2','Ahlunnisa','6308054606000012','Perempuan','Desa Tundakan RT.10, Kecamatan Awayan','081522152210'),('010008','TERBUKA','R1','Rahmat Efendi','6308054606000004','Laki-Laki','Desa Layap, Kecamatan Paringin, RT.04, Sebrang MTS Layap','087514412636'),('050009','TERBUKA','SU','Solihin','6308054606000017','Laki-Laki','Desa Muara Ninian, RT.03 Samping Masjid Al-Hasannah, Juai','081213121111'),('080010','TERBUKA','R1','Rahimanisa','6308054606000072','Perempuan','Tebing Tinggi, Dayak Pitap, RT.07 RW.2','081215144191'),('070011','TERBUKA','R3','Mira Ayu Diah','6308054606000024','Perempuan','Batu Mandi RT.09, masuk samping kantor camat, samping toko kelontong umi','083285888912'),('050012','TERBUKA','R2','Rusdianor','6308054606000019','Laki-Laki','Juai, Mihu, RT.10','085221324470'),('050013','TERBUKA','R1','Adi Kamarudin','6308054606000018','Laki-Laki','Juai, Desa Mungkur Uyam RT.11 RW.05','081122529996'),('020014','TERBUKA','IP','Ahmad Imroatus','6308054606000009','Laki-Laki','Paringin Selatan, Batu Piring RT.01, Masuk Belakang SMPN 1 Paringin','081304250033'),('010015','TERBUKA','NB','Rumi Anandita Putri','6308054606000005','Perempuan','Paringin Kota, Jalan Prumnas Muhibin, No.123','082155553031'),('020016','TERBUKA','R3','Sugandi','6308054606000008','Laki-Laki','Paringin Selatan, Jl. Gunung Pandau, Sebrang lapangan sepak bola parsel','085241417871');
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
INSERT INTO `pemasangan` VALUES ('010004',4,'2022-02-09','Milik keluarga','7','123456','01','R3',1435000),('010008',8,'2022-03-28','Milik sendiri','5','123456','01','R1',1584000),('010015',15,'2022-05-19','Lain-lain','-','1234567','01','NB',1355000),('020005',5,'2022-02-14','Milik sendiri','3','123456','02','R2',1234000),('020014',14,'2022-05-09','Lain-lain','-','1234567','02','IP',1531000),('020016',16,'2022-05-24','Milik sendiri','5','123456','02','R3',1234000),('030007',7,'2022-03-18','Milik sendiri','3','123456','03','R2',1234000),('040002',2,'2022-01-18','Milik sendiri','3','123456','04','NK',1255000),('040006',6,'2022-02-16','Lain-lain','-','1234567','04','SK',2196000),('050009',9,'2022-04-06','Lain-lain','-','123456','05','SU',1925000),('050012',12,'2022-04-27','Milik keluarga','5','123456','05','R2',1234000),('050013',13,'2022-05-06','Milik sendiri','7','123456','05','R1',1438000),('070001',1,'2022-01-06','Milik sendiri','5','123456','07','R2',646000),('070003',3,'2022-01-20','Milik keluarga','4','123456','07','NK',719000),('070011',11,'2022-04-27','Milik sendiri','6','123456','07','R3',1422000),('080010',10,'2022-04-11','Milik sendiri','5','123456','08','R1',1225000);
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
  `biaya` int(11) DEFAULT NULL,
  `tgl_tindak` date NOT NULL,
  `status_tindakan` enum('selesai','belum ditindak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembukaan`
--

LOCK TABLES `pembukaan` WRITE;
/*!40000 ALTER TABLE `pembukaan` DISABLE KEYS */;
INSERT INTO `pembukaan` VALUES ('030007','03','2022-07-28','Ahlunnisa','Desa Tundakan RT.10, Kecamatan Awayan','081522152210','Permintaan Pembukaan',20000,'2022-07-28','selesai'),('070001','07','2022-04-01','Surya Dini','Desa Mantimin RT.02, Kecamatan Batumandi, Dekat Masjid Mantimin','082158412232','Permintaan Pembukaan',20000,'2022-07-28','selesai'),('020016','02','2022-07-07','Sugandi','Paringin Selatan, Jl. Gunung Pandau, Sebrang lapangan sepak bola parsel','085241417871','Permintaan Pembukaan',20000,'2022-07-28','selesai');
/*!40000 ALTER TABLE `pembukaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendaftaran`
--

DROP TABLE IF EXISTS `pendaftaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pendaftaran` (
  `no_reg` varchar(20) NOT NULL,
  `no_ds` char(6) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `cabang` char(5) NOT NULL,
  `biaya` double NOT NULL,
  `status_berkas` enum('belum','diverifikasi') NOT NULL,
  `tgl_survei` date NOT NULL,
  `status_survei` enum('belum','selesai') NOT NULL,
  `pengesahan` varchar(225) NOT NULL,
  `status_pasang` enum('belum','terpasang') DEFAULT NULL,
  `lalong_val` varchar(255) NOT NULL,
  PRIMARY KEY (`no_reg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendaftaran`
--

LOCK TABLES `pendaftaran` WRITE;
/*!40000 ALTER TABLE `pendaftaran` DISABLE KEYS */;
INSERT INTO `pendaftaran` VALUES ('343081122529996','050013','2022-05-02','6308054606000018','1658979630_ktp-foto.png','05',20996,'diverifikasi','2022-05-03','selesai','qr-pengesahan/20220727395422322.png','terpasang','-2.278369917524073, 115.6027393783242'),('343081133636223','','2022-05-13','6308054606000013','208483145_ktp-foto.png','03',20223,'diverifikasi','2022-05-16','selesai','qr-pengesahan/202207271088067416.png','belum','-2.4009604604944674, 115.52849610421593'),('343081213121111','050009','2022-04-01','6308054606000017','976795494_ktp-foto.png','05',20111,'diverifikasi','2022-04-04','selesai','qr-pengesahan/20220727703259279.png','terpasang','-2.2812107471784744, 115.54690906704478'),('343081215144911','080010','2022-04-04','6308054606000027','539316947_ktp-foto.png','08',20911,'diverifikasi','2022-04-06','selesai','qr-pengesahan/20220727925222246.png','terpasang','-2.4492835947234366, 115.64890891838446'),('343081304250033','020014','2022-05-04','6308054606000009','953722392_ktp-foto.png','02',20033,'diverifikasi','2022-05-05','selesai','qr-pengesahan/20220727488170358.png','terpasang','-2.339736394575956, 115.45739697420335'),('343081351555412','010004','2022-02-03','6308054606000003','53428353_ktp-foto.png','01',20412,'diverifikasi','2022-02-07','selesai','qr-pengesahan/202207261255739179.png','terpasang','-2.3245128898107423, 115.46781560985247'),('343081522152210','030007','2022-03-15','6308054606000012','1096186586_ktp-foto.png','03',20210,'diverifikasi','2022-03-16','selesai','qr-pengesahan/20220726817860560.png','terpasang','-2.410922085748527, 115.53033783759933'),('343081963252517','020005','2022-02-09','6308054606000007','572252641_ktp-foto.png','02',20517,'diverifikasi','2022-02-11','selesai','qr-pengesahan/20220726671036556.png','terpasang','-2.3410939771735353, 115.46310759721858'),('343082155553031','010015','2022-05-12','6308054606000005','845676226_ktp-foto.png','01',20031,'diverifikasi','2022-05-16','selesai','qr-pengesahan/202207271609600308.png','terpasang','-2.3256214774585287, 115.4652377374301'),('343082158412232','070001','2022-01-04','6308054606000022','635532057_ktp-foto.png','07',20232,'diverifikasi','2022-01-05','selesai','qr-pengesahan/2022072514848494.png','terpasang','-2.4015823896729205, 115.43133927354931'),('343083285888912','070011','2022-04-18','6308054606000024','1247887978_ktp-foto.png','07',20912,'diverifikasi','2022-04-20','selesai','qr-pengesahan/2022072730727135.png','terpasang','-2.4247627242696166, 115.41898548289913'),('343085212071473','070003','2022-01-13','6308054606000023','2142579912_ktp-foto.png','07',20473,'diverifikasi','2022-01-17','selesai','qr-pengesahan/20220725893590635.png','terpasang','-2.417870439863565, 115.4287992216223'),('343085214121466','040006','2022-02-08','6308054606000016','1473311976_ktp-foto.png','04',20466,'diverifikasi','2022-02-11','selesai','qr-pengesahan/202207261188915293.png','terpasang','-2.3288448109869844, 115.40359730071098'),('343085214141455','040002','2022-01-14','6308054606000015','298205536_ktp-foto.png','04',20455,'diverifikasi','2022-01-17','selesai','qr-pengesahan/20220725250944148.png','terpasang','-2.3280891899255467, 115.4022377332474'),('343085221324470','050012','2022-04-19','6308054606000019','108034460_ktp-foto.png','05',20470,'diverifikasi','2022-04-20','selesai','qr-pengesahan/20220727885550887.png','terpasang','-2.2094616125074253, 115.63287542458569'),('343085241417871','020016','2022-05-18','6308054606000008','331482516_ktp-foto.png','02',20871,'diverifikasi','2022-05-19','selesai','qr-pengesahan/20220727404708840.png','terpasang','-2.352389454260852, 115.47463708481123'),('343087514412636','010008','2022-03-22','6308054606000004','871702836_ktp-foto.png','01',20636,'diverifikasi','2022-03-23','selesai','qr-pengesahan/2022072667943289.png','terpasang','-2.3365707387909906, 115.44558003268823'),('343087779797117','','2022-02-21','6308054606000020','341114070_ktp-foto.png','06',20117,'diverifikasi','2022-02-22','selesai','qr-pengesahan/202207262102238404.png','belum','-2.2632026593838197, 115.65195047026985');
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
  `biaya` int(11) DEFAULT NULL,
  `tgl_tindak` date NOT NULL,
  `status_tindakan` enum('selesai','belum ditindak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penutupan`
--

LOCK TABLES `penutupan` WRITE;
/*!40000 ALTER TABLE `penutupan` DISABLE KEYS */;
INSERT INTO `penutupan` VALUES ('030007','03','2022-05-10','Ahlunnisa','Desa Tundakan RT.10, Kecamatan Awayan','081522152210','Permintaan Penutupan',20000,'2022-07-28','selesai'),('070001','07','2022-03-03','Surya Dini','Desa Mantimin RT.02, Kecamatan Batumandi, Dekat Masjid Mantimin','082158412232','Permintaan Penutupan',20000,'2022-07-28','selesai'),('020016','02','2022-06-30','Sugandi','Paringin Selatan, Jl. Gunung Pandau, Sebrang lapangan sepak bola parsel','085241417871','Permintaan Penutupan',20000,'2022-07-28','selesai');
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
  `keterangan` enum('terpasang','') NOT NULL,
  PRIMARY KEY (`no_reg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survei_bahan`
--

LOCK TABLES `survei_bahan` WRITE;
/*!40000 ALTER TABLE `survei_bahan` DISABLE KEYS */;
INSERT INTO `survei_bahan` VALUES ('343081122529996','2022-05-03','selesai',1438000,'Udin','terpasang'),('343081133636223','2022-05-16','selesai',1234000,'Udin',''),('343081213121111','2022-04-04','selesai',1925000,'Udin','terpasang'),('343081215144911','2022-04-06','selesai',1225000,'Udin','terpasang'),('343081304250033','2022-05-05','selesai',1531000,'Udin','terpasang'),('343081351555412','2022-02-07','selesai',1435000,'Udin','terpasang'),('343081522152210','2022-03-16','selesai',1234000,'Udin','terpasang'),('343081963252517','2022-02-11','selesai',1234000,'Udin','terpasang'),('343082155553031','2022-05-16','selesai',1355000,'Udin','terpasang'),('343082158412232','2022-01-05','selesai',646000,'Udin','terpasang'),('343083285888912','2022-04-20','selesai',1422000,'Udin','terpasang'),('343085212071473','2022-01-17','selesai',719000,'Udin','terpasang'),('343085214121466','2022-02-11','selesai',2196000,'Udin','terpasang'),('343085214141455','2022-01-17','selesai',1255000,'Udin','terpasang'),('343085221324470','2022-04-20','selesai',1234000,'Udin','terpasang'),('343085241417871','2022-05-19','selesai',1234000,'Udin','terpasang'),('343087514412636','2022-03-23','selesai',1584000,'Udin','terpasang'),('343087779797117','2022-02-22','selesai',1224000,'Udin','');
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
INSERT INTO `survei_goltar_noniaga` VALUES ('343081122529996',2,2,2,2,2,'R1'),('343081133636223',2,3,3,2,3,'R2'),('343081213121111',0,0,0,0,0,'SU'),('343081215144911',2,2,2,2,2,'R1'),('343081304250033',0,0,0,0,0,'IP'),('343081351555412',4,4,4,4,4,'R3'),('343081522152210',4,3,4,4,3,'R2'),('343081963252517',4,4,4,4,3,'R2'),('343082155553031',0,0,0,0,0,'NB'),('343082158412232',4,3,3,4,3,'R2'),('343083285888912',4,4,4,4,4,'R3'),('343085212071473',0,0,0,0,0,'NK'),('343085214121466',0,0,0,0,0,'SK'),('343085214141455',0,0,0,0,0,'NK'),('343085221324470',4,4,4,4,3,'R2'),('343085241417871',4,4,4,4,4,'R3'),('343087514412636',2,2,2,2,2,'R1'),('343087779797117',4,4,3,4,3,'R2');
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
INSERT INTO `tagihan` VALUES ('010008','01','Mei','2022',20000,18,74000,5000,'2022-05-25','0000-00-00'),('010008','01','Juni','2022',20000,15,65000,5000,'2022-06-27','0000-00-00'),('010008','01','Juli','2022',20000,17,71000,0,'2022-07-25','0000-00-00'),('050012','05','Mei','2022',25000,13,66600,5000,'2022-05-25','0000-00-00'),('050012','05','Juni','2022',25000,16,76200,5000,'2022-06-24','0000-00-00'),('050012','05','Juli','2022',25000,14,69800,0,'2022-07-25','0000-00-00');
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

-- Dump completed on 2022-07-28  2:55:14
