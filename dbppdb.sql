-- MySQL dump 10.19  Distrib 10.3.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: smpnlipa_ppdb
-- ------------------------------------------------------
-- Server version	10.3.29-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `tb_aythkm`
--

DROP TABLE IF EXISTS `tb_aythkm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_aythkm` (
  `idayt` int(11) NOT NULL AUTO_INCREMENT,
  `idpsl` int(11) NOT NULL,
  `isiayt` varchar(255) NOT NULL,
  PRIMARY KEY (`idayt`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_aythkm`
--

LOCK TABLES `tb_aythkm` WRITE;
/*!40000 ALTER TABLE `tb_aythkm` DISABLE KEYS */;
INSERT INTO `tb_aythkm` VALUES (1,1,'berusia paling tinggi 15 (lima belas) tahun pada tanggal 1 Juli tahun berjalan; dan'),(2,1,'memiliki ijazah SD/sederajat atau dokumen lain yang menjelaskan telah menyelesaikan kelas 6 (enam) SD'),(3,2,'berusia paling tinggi 15 (lima belas) tahun pada tanggal 1\r\nJuli tahun berjalan; dan'),(4,2,'telah menyelesaikan kelas 6 (enam) SD atau bentuk lain\r\nyang sederajat.');
/*!40000 ALTER TABLE `tb_aythkm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_calsis`
--

DROP TABLE IF EXISTS `tb_calsis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_calsis` (
  `idcalsis` int(11) NOT NULL AUTO_INCREMENT,
  `idskulasal` char(8) DEFAULT NULL,
  `nopend` char(20) NOT NULL DEFAULT 'NULL',
  `kdskul` char(20) DEFAULT NULL,
  `kdthpel` char(5) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `nik` char(18) DEFAULT NULL,
  `nisn` char(10) DEFAULT NULL,
  `tmplhr` varchar(200) DEFAULT NULL,
  `tgllhr` date DEFAULT NULL,
  `agama` char(1) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `desa` varchar(200) DEFAULT NULL,
  `kec` varchar(200) DEFAULT NULL,
  `kab` varchar(200) DEFAULT NULL,
  `prov` varchar(200) DEFAULT NULL,
  `kdpos` char(5) DEFAULT NULL,
  `nohp` char(15) DEFAULT NULL,
  `deleted` enum('1','0') DEFAULT NULL,
  `tglinput` date DEFAULT NULL,
  `logakhir` datetime DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `pwd` varchar(250) NOT NULL,
  PRIMARY KEY (`idcalsis`),
  KEY `idskulasal` (`idskulasal`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_calsis`
--

LOCK TABLES `tb_calsis` WRITE;
/*!40000 ALTER TABLE `tb_calsis` DISABLE KEYS */;
INSERT INTO `tb_calsis` VALUES (1,'10500765','PSB202010001','P10040036','20201','Rangga Kurniawan','1508062907070004','0075765760','Muara Bungo','2007-08-29','A','L','Jalan Bukit Asam','Cilodang','Pelepat','Bungo','Jambi','37252','082296577297','0','2020-07-04','0000-00-00 00:00:00','','7ef82d01c09151955e41fd4efddb04e6'),(2,'10500765','PSB202010002','P10040036','20201','Ardi Nur Wahyu','1508062604070001','0071754743','Sekadau Kalbar','2007-04-26','A','L','Jalan Bukit Asam','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2020-07-04','0000-00-00 00:00:00','','8ea39c1eed55e6d07fbcb3d682232599'),(3,'10500765','PSB202010003','P10040036','20201','Vira Lovita','1508065109070001','0073541905','Cilodang','2007-09-11','A','P','Jalan Bukit Apit','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2020-07-04','0000-00-00 00:00:00','','19eaae573b28f94a9cc8da26b750a73f'),(4,'10500765','PSB202010004','P10040036','20201','Diana Cantika Noviyanti','1508065101070004','0074088723','Muara Bungo','2007-01-11','A','P','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','08525652616','0','2020-07-04','0000-00-00 00:00:00','','e764357e1ff01f7bbc0150f324cc7001'),(5,'10500765','PSB202010005','P10040036','20201','Rissa Azzahra Ramadhani','1508065308070002','0073319338','Muara Bungo','2007-09-13','A','P','Jalan Bukit Asam','Cilodang','Pelepat','Bungo','Jambi','37252','082178681925','0','2020-07-04','0000-00-00 00:00:00','','9c5c57c0b5c5e6e10a0683e6fe289ce7'),(6,'10500765','PSB202010006','P10040036','20201','Aldi Jani Puldas Made','1508062303060001','0066770829','Kuamang Kuning','2006-03-23','A','L','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2020-07-04','0000-00-00 00:00:00','','8dd4845481dace5dda30f87a18df31f2'),(7,'10500765','PSB202010007','P10040036','20201','Reni Nurmalasari','1508066406070001','0076607412','Muara Bungo','2007-06-24','A','P','Jalan Bukit Telago','Cilodang','Pelepat','Bungo','Jambi','37252','081278747056','0','2020-07-04','0000-00-00 00:00:00','','fdd2e3f3a55b4a42cce74610f25d7dcc'),(8,'10500765','PSB202010008','P10040036','20201','Dwi Amelia Saputri','1508066004070001','0079649877','Muara Bungo','2007-04-20','A','P','Jalan Bukit Tinggi','Cildoang','Pelepat','Bungo','Jambi','37252','','0','2020-07-04','0000-00-00 00:00:00','','e02c66deb668c1029b6ea010b73aa430'),(9,'10500765','PSB202010009','P10040036','20201','Nurul Elisah','1508065806070001','0077122481','Cilodang','2007-06-18','A','P','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2020-07-04','0000-00-00 00:00:00','','c1580b6a4d511760e83125df782fbfab'),(10,'10500765','PSB202010010','P10040036','20201','Indah Puji Lestari','1508066501080004','0088040728','Muara Bungo','2008-01-25','A','P','Jalan Bukit Tinggi','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2020-07-04','0000-00-00 00:00:00','','04cfb143b5d6d9a1d9987a806e65af52'),(11,'10500765','PSB202010011','P10040036','20201','Abdul Hadi','1508061807070001','0075355974','Bungo','2007-07-18','A','L','Jalan Bukit Tinggi','Cilodang','Pelepat','Bungo','Jambi','37252','081930771936','0','2020-07-04','0000-00-00 00:00:00','','5ad7249f4ad7a929404287dfcbbca262'),(12,'10500765','PSB202010012','P10040036','20201','Rucy Hariyanti','1508064701080002','0087780185','Blitar','2008-01-07','A','P','Jalan Bukit Asam','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2020-07-04','0000-00-00 00:00:00','','3ec1f5e513b8c30a4c52ddecf50f5b8c'),(13,'10500765','PSB202010013','P10040036','20201','Nissa Ramadhani','1508065609070001','0076061164','Sumedang','2007-09-16','A','P','Jalan Bukit Kemuning','Cildoang','Pelepat','Bungo','Jambi','37252','','0','2020-07-04','0000-00-00 00:00:00','','75c2e72b17164835c77de3c002a3d1bb'),(14,'10500765','PSB202010014','P10040036','20201','Nur Ammar Ramadhani','1508062509070002','0078271055','Muara Bungo','2007-09-25','A','L','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','085333271900','0','2020-07-04','0000-00-00 00:00:00','','5184fa37e91f0f4097f505adc587b6c1'),(15,'60704660','PSB202010015','P10040036','20201','Nabila Zahwa Dewi','1508064601080001','0082501802','Muara Bungo','2008-01-06','A','P','Jalan Prasetia','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','083171266468','0','2020-07-04','0000-00-00 00:00:00','','e387ef6389a6c9d081ea414ded5b8207'),(16,'10500765','PSB202010016','P10040036','20201','Rio Ramadhani','1508060510060003','0064912794','Cilodang','2006-10-05','A','L','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','082289916500','0','2020-07-04','0000-00-00 00:00:00','','64519ccf3300dea0da244a037edb3d3b'),(17,'10501303','PSB202010017','P10040036','20201','Dea Naura Asyifa','1508095305080001','0082293037','Merangin','2008-05-13','A','L','Jalan Batu Raden','Air Batu','Tabir Ilir','Merangin','Bungo','37252','','0','2020-07-04','0000-00-00 00:00:00','','586ab8f08e376704e0be33d40d8018e8'),(18,'10501303','PSB202010018','P10040036','20201','Dina Zhahratul Aulia','1502146706080001','0081892104','Merangin','2008-06-27','A','P','Jalan Komplek Pasar Kuamang Kuning 11','Air Batu','Tabir Ilir','Merangin','Jambi','37353','083121834772','0','2020-07-04','0000-00-00 00:00:00','','81ddea2be6bf25689b237f6a311019ef'),(19,'10501303','PSB202010019','P10040036','20201','Muhammad Hafit Saputra','1502142505080001','0086592235','Merangin','2008-05-25','A','L','Jalan Banyu Wangi','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2020-07-04','0000-00-00 00:00:00','','b98c6c699ca048680021c3a52fab3ebb'),(20,'10500765','PSB202010020','P10040036','20201','Firdiani Shofiyatul Jauza','1508066212070002','0078399259','Sumedang','2007-12-22','A','P','Jalan Bukit Telago','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2020-07-04','0000-00-00 00:00:00','','284ec59d95e92ca048ff9768c9bfb94a'),(21,'10500765','PSB202010021','P10040036','20201','Dina Novita','1508065101070003','0073872850','Muara Bungo','2007-01-11','A','P','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2020-07-04','0000-00-00 00:00:00','','e764357e1ff01f7bbc0150f324cc7001'),(22,'10500765','PSB202010022','P10040036','20201','Ageng Dwi Setyo Tresno','1508061502080001','0083510147','Cilodang','2008-02-16','A','L','Jalan Bukit Telago','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2020-07-04','0000-00-00 00:00:00','','8897a7335d99ec839d94be9d902251ec'),(23,'10500765','PSB202010023','P10040036','20201','Sukma Ayu Purwanti','1508065012060002','0069518171','Cilodang','2006-12-10','A','P','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','081311954293','0','2020-07-04','0000-00-00 00:00:00','','92079c21e6c2f6ac7fd977d244b50108'),(24,'10500761','PSB202010024','P10040036','20201','Hendrik Sijabat','1508061912080001','0082083691','Muara Bungo','2008-12-19','B','L','Jalan Lintas Jaya','Dwi Karya Bakti','Pelepat','Bungo','Jambi','37262','','0','2020-07-04','0000-00-00 00:00:00','','a4bcddbfb1032d868531ce32301a198f'),(25,'10500765','PSB202010025','P10040036','20201','Yusuf Endriansyah','1508062912060001','0060000000','Cilodang','2006-12-29','A','L','Jalan Bukit Telago','Cilodang','Pelepat','Bungo','Jambi','37252','082306917783','0','2020-07-07','0000-00-00 00:00:00','','1333db805b8d063b8d52d2dc91021538'),(26,'10500764','PSB202010026','P10040036','20201','Adinda Wulan Dwi Agustin','','0073510908','Bandung','2007-08-02','A','P','Jalan  Kusuma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','45a3602a88ee138064a5e08a1ebb7c61'),(27,'10500764','PSB202010027','P10040036','20201','Agnes Putri Budi Asih','','0077372206','Mulia Bhakti','2007-06-10','A','P','Jalan  Aji Purna','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','fa887475d2e287cd366b7b5c5a961fbc'),(28,'10500764','PSB202010028','P10040036','20201','Angga Fadilla Tambunan','1508062612070001','0078023557','Muara Bungo','2007-12-26','A','L','Jalan Ekatama','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','49b8a51f9186cf92c47ee860be504824'),(29,'10500764','PSB202010029','P10040036','20201','Rahmawti Agustin','1508064808080001','0089718430','Muara Bungo','2008-08-08','A','P','Jalan Ekatama','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','1ade77fc0871a1602273b57cafba01eb'),(30,'10500764','PSB202010030','P10040036','20201','Intan Novitasari Sihombing','','0079664710','Muara Bungo','2007-12-26','A','P','Jalan Kusuma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','49b8a51f9186cf92c47ee860be504824'),(31,'10500764','PSB202010031','P10040036','20201','Nanda Nurdian Kelana','','0071057628','Muara Bungo','2007-07-23','A','L','Jalan Kusuma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','4f428f98770592984a865730d35ab25c'),(32,'10500764','PSB202010032','P10040036','20201','Amelia Dewi Safitri','','0075769354','Muara Bungo','2007-12-09','A','P','Jalan Dharma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','e805383cf691c909d25a544efffd9d7a'),(33,'10500764','PSB202010033','P10040036','20201','Meila Restu Ayuningsih','','0085663378','Muara Bungo','2008-05-04','A','P','Jalan ','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','2f28f2cce19cf0336cdb48434002b0df'),(34,'10500764','PSB202010034','P10040036','20201','Alando Muhamad Sadewo','','0074023645','Muara Bungo','2007-07-23','A','L','Jalan Wijaya Kusuma','Gapura Suci','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','4f428f98770592984a865730d35ab25c'),(35,'10500764','PSB202010035','P10040036','20201','Margareta Sari Br Siallagan','1508065511080001','0076075947','Muara Bungo','2008-11-15','A','P','Jalan ','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','02b9fe293dc90965fe85459e573b8602'),(36,'10500764','PSB202010036','P10040036','20201','Ahmad Ari Prasetyo','','0082072806','Muara Bungo','2008-01-09','A','L','Jalan Kusuma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','c8dff039f81e1366f1ea95cf4c78a884'),(37,'10500764','PSB202110037','P10040036','20201','Cahya Ramadani','','0079296278','Muara Bungo','2007-10-09','A','L','Jalan Kusuma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','5e0d75878a5aae85f46b72b57b687799'),(38,'10500764','PSB202010038','P10040036','20201','Ridwan Dimas Sartono Sihombing','','0077785874','Muara Bungo','2007-11-08','A','L','Jalan ','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','1058fda458bfd4fd27ec565ec8ff8994'),(39,'10500764','PSB202010039','P10040036','20201','Dimas Maulana','','0078735841','Mulia Bhakti','2007-11-04','A','L','Jalan Setia Bhakti','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','8a19b31fec88cd16d5076a7d15b83863'),(40,'10500764','PSB202010040','P10040036','20201','Elviana Maizatu Saufia','1508066907080001','0086377795','Muara Bungo','2008-07-29','','P','Jalan Ekatama','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','199882d7259e6c22df6185f173125dbf'),(41,'10500764','PSB202010041','P10040036','20201','Putri Agustina Rizki','','0081409163','Muara Bungo','2008-07-01','A','P','Jalan Kencana ','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-06','0000-00-00 00:00:00','','935800a38929377e9d61a8746ed91671'),(42,'10500764','PSB202010042','P10040036','20201','Cantika Laras Sati','','0071527388','Muara Bungo','2007-11-14','A','P','Jalan Ekatama','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','2733c1ce63b8f452de3f14eecbf1fba4'),(43,'10500764','PSB202010043','P10040036','20201','Raffi Alfarizzi','','0075463968','Muara Bungo','2007-12-09','A','L','Jalan Makarti','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-06','0000-00-00 00:00:00','','e805383cf691c909d25a544efffd9d7a'),(44,'10500764','PSB202010044','P10040036','20201','Adinda Safitri','','0079288833','Muara Bungo','2007-10-11','A','P','Jalan Kencana','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','4010e79cc169b22e4a2ab25d627566c7'),(45,'10500764','PSB202010045','P10040036','20201','Dine Rohdyanawati','','0075267471','Muara Bungo','2007-09-07','A','P','Jalan Cipta Sari','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','ce3f783e0e91adfeb33145a87657b173'),(46,'10500764','PSB202010046','P10040036','20201','Erviana Dwi Lestari','','0076184046','Muara Bungo','2007-08-18','A','P','Jalan Setia Bhakti','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','8ccd867b688ddedc3b0f7d6abb9a6931'),(47,'10500764','PSB202010047','P10040036','20201','Ferdyansen Manuel','','0067558016','Muara Bungo','2006-04-29','B','L','Jalan Perum Pt Sal','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','35f59ccccd6de58e11602652c34b1b2f'),(48,'10500764','PSB202010048','P10040036','20201','Gea Anastacia','','0074135075','Mulya Bhakti','2007-11-26','A','P','Jalan Dasa Purwa','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','7f96747740fa42caff1b234fccacbef5'),(49,'10500764','PSB202010049','P10040036','20201','Agung Rivaldi','','0072749467','Muara Bungo','2007-08-03','A','L','Jalan Ciptasari','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','f0bdb2305dcb7a2a22037eab1ae13591'),(50,'10500764','PSB202010050','P10040036','20201','Akhyar Habibullah','','0085805202','Muara Bungo','2008-04-07','A','L','Jalan Kencana','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-06','0000-00-00 00:00:00','','a0afd35a1f836d6af03d3abcef981495'),(51,'10500764','PSB202110050','P10040036','20201','Muhammad Akbar','','0071383247','Mulia Bhakti','2007-10-12','A','L','Jalan Ajipurna','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','6321121d16d779c569cbb526594b3dc6'),(52,'10500764','PSB202110050','P10040036','20201','Arba\'i Nur Septiano','','0078625495','Muara Bungo','2007-09-01','A','L','Jalan Dasa Purwa','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','ae202f11dd4ad430f842562eef134f26'),(53,'10500764','PSB202010054','P10040036','20201','Salma Dzakiyyah','','0087744920','Muara Bungo','2008-04-09','A','L','Jalan Ekatama','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','cf6d9d002a5d4c052d9163954b80e61f'),(54,'10500764','PSB202110050','P10040036','20201','Ardi Arwana','','0075998526','Muara Bungo','2007-08-22','A','L','Jalan Kusuma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','054bc221523b238e828750e4aef039a1'),(55,'10500764','PSB202110050','P10040036','20201','Lisa Agus Rahma Wati','','0078986316','Muara Bungo','2007-08-20','A','P','Jalan Ekatama','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','32aaf6a06cd077f888bff7c2aee2092e'),(56,'10500764','PSB202010056','P10040036','20201','Kasih Aulia Imane Suci','','0082145546','Muara Bungo','2008-04-27','A','P','Jalan ','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','645ff588acb518849953eaa93b57da38'),(57,'20528459','PSB202010057','P10040036','20201','Reva Aryanti','1508064810070001','0075530479','Jambi','2007-10-08','A','P','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2020-07-07','0000-00-00 00:00:00','','a1cc853981d68fb31dd6022bf558aefd'),(58,'10500762','PSB202110001','P10040036','20211','Adi Saputra','1508092712080003','0086117250','Muara Bungo','2008-12-27','A','L','Jalan Pelepat','Purwosari','Pelepat Ilir','Bungo','Jambi','37252','','0','2021-06-28','0000-00-00 00:00:00','','57e144b65f8d84d7b0350056c620834f'),(59,'10500765','PSB202110002','P10040036','20211','Ulfa Desparwati','1508065412080001','0081331738','Muara Bungo','2008-12-14','A','P','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2021-06-28','0000-00-00 00:00:00','','177c415d34bfd9e8770d150ee11634ad'),(60,'10500765','PSB202110003','P10040036','20211','Galang Permana','1508061909080001','0089804959','Muara Bungo','2008-09-19','A','L','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2021-06-28','0000-00-00 00:00:00','','308c10e35d260b5624e6b7b47df00db5'),(61,'10500765','PSB202110004','P10040036','20211','Fendi Anggoro','1508060403070003','0077494224','Cilodang','2007-03-04','A','L','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2021-06-28','0000-00-00 00:00:00','','594a0b6d87c5d4b262e700582b1dec67'),(62,'10500764','PSB202110005','P10040036','20211','Ferdi Kurniawan','1508061302080001','0083618586','Muara Bungo','2008-02-13','A','L','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2021-06-28','0000-00-00 00:00:00','','da8742277b5d1a2c126a5a0640731bec'),(84,'10500765','PSB202110006','P10040036','20211','Fadhilah Islamitanto','1508062007080001','0082380095','Muara Bungo','2008-07-20','A','L','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2021-06-29',NULL,NULL,'$2y$10$jp0i.tXxbjc6axHnLKmQM.0hF5ZnC7IX9FNSDA4g8gGpvRId0HqTe'),(85,'10500765','PSB202110007','P10040036','20211','Siam Mustolih','1508061209080002','0089669003','Cilodang','2008-09-12','A','L','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2021-06-29',NULL,NULL,'$2y$10$7Ly3f2VkUT9.tyi0zyVa9uh85YB4/UefNDzvyQkAWX0QTHNOS5X6a'),(86,'10500765','PSB202110008','P10040036','20211','Refvi Dwi Saputra','1508062810070001','0076895595','Cilodang','2007-10-28','A','L','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','085366432985','0','2021-06-29',NULL,NULL,'$2y$10$rHW.Fwdw1s.drTLmQwzrUuFIGqVqpx.CP3luwophENF.tyIMtRnai'),(87,'10500765','PSB202110009','P10040036','20211','Anisa Febriani','1508066502090001','0093826301','Muara Bungo','2009-02-25','A','P','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2021-06-29',NULL,NULL,'$2y$10$b1M.BDGie12rSzTASOtSsu3yC0i5uc3EHythMrejqCeC.N5DcaPl6'),(88,'10500765','PSB202110010','P10040036','20211','Siti Zahra Nur Asiah','150806600209001','0097865915','Margoyoso','2009-02-20','A','P','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','+6282281400421','0','2021-06-29',NULL,NULL,'$2y$10$rV7SUi/k4353QzSc7sH.9ukCvfkJ/cMEUF1qworHq3LyIo5T1Z55S'),(89,'10500765','PSB202110011','P10040036','20211','Gina Hasna Raniyah','1508065408080002','0083321639','Muara Bungo','2008-08-14','A','P','Jalan Bukit Apit','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2021-06-29',NULL,NULL,'$2y$10$MFeaOEEex9xuLWvVj3R/7.4PQEdnaTlHiQ/X2YZO74l6aUZUg4EeK'),(90,'10500765','PSB202110012','P10040036','20211','Abdul Majid','1508061008070002','0075734650','Muara Bungo','2007-09-10','A','L','Jalan Bukit Tinggi','Cilodang','Pelepat','Bungo','Jambi','37252','+6282373416309','0','2021-06-29',NULL,NULL,'$2y$10$ES3EZKqSOIU6kUha6ANocOB50cgnJ8TE6V74jeNgqr0mcRQSirKxW'),(91,'10500765','PSB202110013','P10040036','20211','Muhammad Dafa Aditia Pratama','1502141410080002','0084385988','Muara Bungo','2008-11-17','A','L','Jalan Bukit Tinggi','Cilodang','Pelepat','Bungo','Jambi','37252','','0','2021-06-29',NULL,NULL,'$2y$10$LYPXcXOjfKiXe10XIykUWe0AUU/46El1rgwWgKNdNOwweKkV7qtly'),(92,'10500765','PSB202110014','P10040036','20211','Eko Purnomo','1508062612050002','0053892239','Cilacap','2005-12-26','A','L','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','+6287793416511','0','2021-06-29',NULL,NULL,'$2y$10$OrOoZbX7bsJ5Dv3pzLm8B.bE9OaAAs5N0OwKYJoO92wljswALpANy'),(93,'10500765','PSB202110015','P10040036','20211','Ujang Koswandi','1508060912070002','0077360750','Lingga Kuamang','2007-12-09','A','L','Jalan Bukit Asam','Cilodang','Pelepat','Bungo','Jambi','37252','+6285266938058','0','2021-06-29',NULL,NULL,'$2y$10$FSSObxEl52Vqz5RkIenEM.7lUYKg/cJC2mdUsayguOXeauJQKX/Su'),(94,'10500590','PSB202110016','P10040036','20211','Zahra Azkia','1508066507080001','0083853233','Muara Bungo','2008-07-25','A','P','Jalan Selasih','Gapura Suci','Pelepat','Bungo','Jambi','37252','','0','2021-06-29',NULL,NULL,'$2y$10$SmEJcckTCygGWLsooROsFeXZTo5CRcyEqTpyIZEdD6.BWdh8QuVc2'),(98,'10501303','PSB202110017','P10040036','20211','Yuda Duwi Winata','1502140701090001','0092931013','Bangko','2009-01-07','A','L','','Air Batu','Tabil Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$4ry40DWWD2.fior6sO4LOe6cramo8RwgHH3QS0VCDh/xSZw0Cp82a'),(99,'10501303','PSB202110018','P10040036','20211','Fienza Putri Meylani','1502145805090001','0097197853','Merangin','2009-05-18','A','P','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$bUjND7IGyjww/WUBzLr1Aen1lERKhc8QDPkry.ItMJsBbUm5PWqU6'),(100,'10501303','PSB202110019','P10040036','20211','Alvian Pratama','1502142810080001','008725225','Merangin','2008-10-28','A','L','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$fJRqLsjTaaBBFsOBu6MQk.mCkpgA3pK2JnZnQ838DcRmo93YUQeiW'),(101,'10501303','PSB202110020','P10040036','20211','Bayu Ali Akbar','1502142410080001','0086536053','Muara Bungo','2008-10-24','A','L','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$RBd6kQJ7DkpRFMbF8QH8NOfj6GQg2AhEgioddaPBeFFb0DIbHZqb2'),(102,'10501303','PSB202110021','P10040036','20211','Revan Putra Rizkyawan','15021401305090002','0096329583','Merangin','2009-05-13','A','L','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$bsS2P5isE2J/3xrClgmKpenh4ZUZ0ElO3k8tXIFaJMmr5lY4AnX3C'),(103,'10501303','PSB202110022','P10040036','20211','Farid Iksan Effendi','1502142807090001','0093953109','Merangin','2009-07-28','A','L','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$rYDG2MPSWSJe4xDELNSdLOFid88dDQJQWqVdAKKMA8tOAyd.HtGMS'),(104,'10501303','PSB202110023','P10040036','20211','Nadiya Arum Pratiwi','1502146602090001','0091610616','Merangin','2009-02-26','A','P','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$utHuMSM43dNqyPg/tMBmyuwMWI.MDeQyruziFUCh4mrCNvm21mLMi'),(105,'10501303','PSB202110024','P10040036','20211','Lily Rahmawati','1502144703090004','0093060187','Merangin','2009-03-07','A','P','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$04SN.XGR80/A8chyTo5Zn.IYT7J8WHygio1CdhE.bx4Awr4.ALm4i'),(106,'10501303','PSB202110025','P10040036','20211','Nayla Syabilil Masaya','1502145202090001','0094602619','Merangin','2009-02-12','A','P','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$Sn1wg0eKa8JzxxufCxl/IergIzDC4JriCVjA3NJs/k2N6.DH7Cqjm'),(107,'10501303','PSB202110026','P10040036','20211','Yusuf Hardiansyah','1502141212080001','0086190665','Merangin','2008-11-21','A','L','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$oj2hkJZwUD.WwJpAqPkWd.InIKCZ1/A5CstdpJJ5chEkqcT06Um5a'),(108,'10501303','PSB202110027','P10040036','20211','Septi Okta Khairani','1502145010090002','0097508161','Merangin','2009-10-10','A','P','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$OeMyaLUG/G4GL/UA3Dt/aedtgElOTacQfQITkDAzIxQx9eY.8wxCy'),(109,'10501304','PSB202110028','P10040036','20211','Adie Nugroho','1502142606080004','008388826','Merangin','2008-06-26','A','L','Jalan Batu Riti','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$Q/PZyxIaDLRhk6rUzo.Cse.sV03v2.b9hFMFD39F3RzATt3zi5kVW'),(110,'10500766','PSB202110029','P10040036','20211','Safa Alzena Guntoro','1508066303090002','0097365124','Mulia Bhakti','2009-03-23','A','P','Jalan  Bhakti Husada','Mulia Bhakti','Pelepat','Bungo','Jambi','37253','','0','2021-06-29',NULL,NULL,'$2y$10$CumDLDr8485bwSTuXgzF3u4xMjlmM2pnMLRooS/mAiCzEfNUghErm'),(111,'10500590','PSB202110030','P10040036','20211','Meyla Ayudhia Dhitama','1502146002090001','0097341216','Muara Bungo','2009-01-20','A','P','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','0','2021-06-29',NULL,NULL,'$2y$10$guMQ8OzCcs52zvmamjU.sehSCwkKb6mBpmaIqZ8hqoc9MVUb0XN3K'),(130,'10500764','PSB202110031','P10040036','20211','Auliya Dewi Zurnawati','','0089931563','Muara Bungo','2008-08-28','A','P','','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0',NULL,NULL,NULL,'$2y$10$pwMLh0Ie5J3t8Gw.k0JUYeZAIubaZda3gQ0zyyf4B4jAcxy0/mSYG'),(131,'10500764','PSB202110032','P10040036','20211','Faradisa Aldira Rahma','','0092550629','Muara Bungo','2009-01-30','A','P','','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0',NULL,NULL,NULL,'$2y$10$rqYtZmMF5v1kepEN8Dom9O2CIAAqe4E3OKCCf2sLXc.dtRYxw4Utq'),(132,'10500764','PSB202110033','P10040036','20211','Berlin Nata Maulana','','0096546393','Muara Bungo','2009-03-23','A','L','','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0',NULL,NULL,NULL,'$2y$10$I7GEcviyT2RsyE9tUYCW5uBrK3SHdbQhml1sbSksR.i8JRjv8hjKC'),(133,'10500764','PSB202110034','P10040036','20211','Andre Saputra','','0085990733','Muara Bungo','2008-12-10','A','L','','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0',NULL,NULL,NULL,'$2y$10$4zxTrBrW4O5/cIM5q1WAs.VcOl.xGQB.F2JnmlehjJN5LxqJLwqgi'),(134,'10500764','PSB202110035','P10040036','20211','Anggarda Icha Paramitha','','0098281308','Muara Bungo','2009-02-08','A','P','','','','','','','','0',NULL,NULL,NULL,'$2y$10$jzHtQoLlKXHL/168CSfiV.8eZfPAnp1aUYFlqH0ieVoxDb7tUaMOK'),(135,'10500764','PSB202110036','P10040036','20211','Anggita Asmarani','','0095605462','Bungo','2009-03-16','A','P','','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0',NULL,NULL,NULL,'$2y$10$qHUSqeFMS5YzztrJwS09NebIvplAEuxW9VYQ4DFsBD7LkxxEpl5Q2'),(151,'10500764','PSB202110037','P10040036','20211','Aldi Febrian Saputra','','0077815089','Mulia Bhakti','2007-02-15','A','L','','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0',NULL,NULL,NULL,'$2y$10$dQUJldKqBrHl35PuxeC6reP6kpv3TENlg9gipnpKN98f90v9TvK02'),(152,'10500764','PSB202110038','P10040036','20211','Dewi Nursela','','0088888209','Muara Bungo','2008-11-02','A','P','','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0',NULL,NULL,NULL,'$2y$10$kdFpQF1PKGCRkhNrGRN7/.DZMCMiOoOCU6hmmULVwf8Z/ykJl8tO.'),(153,'10500764','PSB202110039','P10040036','20211','Ardwana Riswari','','0082135927','Muara Bungo','2008-10-31','A','L','','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0',NULL,NULL,NULL,'$2y$10$hQbZn8j.QNMks2QFSl.lVOZjLI9X16ITo0ga9BBVMJQLznCKnZH/a'),(154,'10500764','PSB202110040','P10040036','20211','Arif Yudi Setiawan','','0096833595','Merangin','2009-05-18','A','L','','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0',NULL,NULL,NULL,'$2y$10$8JoFGk9avKeisYx0bsboRurykkLVK7vUV3jkW/hJQDlEKQGz.RYo.'),(155,'10500764','PSB202110041','P10040036','20211','Dani Maulana','','0082854420','Muara Bungo','2008-12-01','A','L','','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0',NULL,NULL,NULL,'$2y$10$TBOSPUtfBn/.pCC5WB4Gxe/7Dc/BhKa7FFndbNjDveQyZkdZkpFh2'),(156,'10500764','PSB202110042','P10040036','20211','Dewi Fatmawati','','0089865626','Muara Bungo','2008-09-11','A','P','','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','0',NULL,NULL,NULL,'$2y$10$rowMV9maTkiPW43rUHBB..PZdE1qZOtU7AOw3aA2aeBJ7n5EExj.i'),(157,'10500764','PSB202110043','P10040036','20211','Chatryn Dara Fahyra','','0093049344','Merangin','2009-05-31','A','P','','','','','','','','0',NULL,NULL,NULL,'$2y$10$Y2e7RyAofHFWzoN9EYBOieEr/VMr85DuRZWNmzfb4qoErJHifWHTm'),(158,'10500764','PSB202110044','P10040036','20211','Firenza Cantika Budiman','','0095186669','Muara Bungo','2009-03-29','A','P','','','','','','','','0',NULL,NULL,NULL,'$2y$10$lRKL.fapUTgoVK6yaFogc.dacRex42xbLpRYiRTGSpAUTrtcIbA4q'),(159,'10500764','PSB202110045','P10040036','20211','Finkan Fitriyah','','0092830944','Muara Bungo','2009-07-14','A','P','','','','','','','','0',NULL,NULL,NULL,'$2y$10$AfL2DBeEt/1fMqUuFCV.bO2vSWGTqfC2uq1TB4XFgEFVPeMKUantK'),(160,'10500764','PSB202110046','P10040036','20211','Fahma Aulia Prasetyo','','0095747781','Muara Bungo','2009-02-14','A','P','','','','','','','','0',NULL,NULL,NULL,'$2y$10$CP2JEhZLFQzSiyp9QupupezClOwPDGZSdFQFFHSL1VkKJwcXRFy6K'),(161,'10500764','PSB202110047','P10040036','20211','Devi Rahmawati','','0088904202','Magelang','2008-01-05','A','P','','','','','','','','0',NULL,NULL,NULL,'$2y$10$sQenOUTKQ1Tl.ypUdpBeUOtPl06VoN10k8j/k9Ep18Nj9EYeRsKn.'),(162,'10500764','PSB202110048','P10040036','20211','Lailatul Fitriana Argianti','','0083563971','Mulia Bhakti','2008-11-10','A','P','','','','','','','','0',NULL,NULL,NULL,'$2y$10$7QhFnQmeN4usZ/DxMlUyJODHbRPUUL/SBv2OHHLPhsvWamzMSAEKq'),(163,'10500764','PSB202110049','P10040036','20211','Lisa Listriani','','0099082301','Muara Bungo','2009-03-21','A','P','','','','','','','','0',NULL,NULL,NULL,'$2y$10$wazT6sphjY9dLKkMK0OIaONY3fCzUUwPJSQDT1vyJihlEUXobFAFy'),(164,'10500764','PSB202110050','P10040036','20211','Muhammad Davin Agustino','','0087457897','Muara Bungo','2008-08-20','A','L','','','','','','','','0',NULL,NULL,NULL,'$2y$10$IzwwJ89t8unvAriWfWkwHuG8n3CYKIzxsCIuPdQatPgLUNTSrU3oK'),(165,'10500764','PSB202110051','P10040036','20211','Muhammad Rizal Arif','','0096810424','Magelang','2009-01-27','A','L','','','','','','','','0',NULL,NULL,NULL,'$2y$10$FZqHFEMpnslmgwevDI5Rd.5c2x8xarJ8JYQgEyN5pnDItyHERq6ue'),(166,'10500764','PSB202110052','P10040036','20211','Rahma Julhiza Amini','','0083694579','Muara Bungo','2008-12-13','A','P','','','','','','','','0',NULL,NULL,NULL,'$2y$10$JWg238zjB/2nc2FqF61iZOzhT8wileO3yUEybJ0LLZl.RH9KM4PbG'),(167,'10500764','PSB202110053','P10040036','20211','Syifa Mardhatillah Putri Elsafa','','0089382925','Muara Bungo','2008-12-18','A','P','','','','','','','','0',NULL,NULL,NULL,'$2y$10$MVaomS6xcl1Bo2fD8RzgeeoH.i5Iw87K5Mkjs/twh618EC3KIKukq'),(168,'10500764','PSB202110054','P10040036','20211','Marvel Setiawan Saputra','','0089366353','Muara Bungo','2008-12-18','A','L','','','','','','','','0',NULL,NULL,NULL,'$2y$10$ul.qdERK5InIA6ijBOquzOK61uxJCMR8DrxBNsF7RUtSWiUXeMJYq'),(169,'10500764','PSB202110055','P10040036','20211','Shinta Pratiwi','','0089317633','Bekulap','2008-11-16','A','P','','','','','','','','0',NULL,NULL,NULL,'$2y$10$CBiStjJUnPCVJKlDFKd0duLg236lBC16jyeVqZ4nXCScC3a64AT3K'),(170,'10500764','PSB202110056','P10040036','20211','Santria Bagus Setiawan','','0099223998','Muara Bungo','2009-03-17','A','L','','','','','','','','0',NULL,NULL,NULL,'$2y$10$W3nRr.8pTXkhYotZ2qTjr.UVolnbLomxgImq0oRxviRk2T0Mg0tNu'),(171,'10500764','PSB202110057','P10040036','20211','Rowanda Pratama','','0086311284','Muara Bungo','2008-08-21','A','L','','','','','','','','0',NULL,NULL,NULL,'$2y$10$hppKRHusrlbDz5ieg53b9.N5jj/AoonAjkYscwo3EmFaeDixbN6rO'),(172,'10500764','PSB202110058','P10040036','20211','Roky Satria Putra','','0092296523','Muara Bungo','2009-05-06','A','L','','','','','','','','0',NULL,NULL,NULL,'$2y$10$o2T35q8091NFC7V3yCfEz.fP3LNzjmd5jaXdvy.IqPJRAz/KhTU4C'),(173,'10500764','PSB202110059','P10040036','20211','Riyandi Ahmad Ashidiq','','0081859273','Muara Bungo','2008-12-21','A','L','','','','','','','','0',NULL,NULL,NULL,'$2y$10$GlYpE7z5yQm.EM/4WMdhjOyDjg1j24Vleh/jtolDEaBB/voSyWlwq'),(174,'10500764','PSB202110060','P10040036','20211','Rismayanti','','0099299837','Muara Bungo','2009-01-25','A','P','','','','','','','','0',NULL,NULL,NULL,'$2y$10$shv9m5MZam9G6i/WlNSUqekVw2WlVwAb22KP9D76J7b/r1wetSETK'),(175,'10500764','PSB202110061','P10040036','20211','Rahmad Afandi','','0084739127','Muara Bungo','2008-10-28','A','L','','','','','','','','0',NULL,NULL,NULL,'$2y$10$42zoiLZOyg5.SBjDNZO1/ODL7oRK4vQJLu7sKES/JzOFY2pOS4Mw.'),(176,'10500765','PSB202110062','P10040036','20211','Revita Aghles Purwindah','1508065910080002','0081705155','Muara Bungo','2008-10-19','A','P','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','+628218058169','0',NULL,NULL,NULL,'$2y$10$jXzUgSTcfUkbT/j5YQp.XOOJyoG92OoQ.TYJ9n5B1Uy3DCNl6axUa'),(177,'10500764','PSB202110063','P10040036','20211','Viki Firmansyah','','0097421031','Merangin','2009-01-22','A','L','','','','','','','','0',NULL,NULL,NULL,'$2y$10$mES1Tqyq7Souqe6FIf0XmeGUm9zWkd/Fp/2xOhCrwoMq7Baj7DP4K'),(178,'10500764','PSB202110064','P10040036','20211','Zakhy Avandi','','0082382217','Muara Bungo','2008-09-07','A','L','','','','','','','','0',NULL,NULL,NULL,'$2y$10$FEfo4mPDslLUxbq99GhSJ.PsrgyXdP1gxzLOkrPZDcLDCa.i2RzPq'),(179,'10500765','PSB202110065','P10040036','20211','Kholifah Dea Putri','1508065206070002','0075671479','Muara Bungo','2007-06-12','A','L','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','085212175869','0',NULL,NULL,NULL,'$2y$10$F943UoJ0EGChJSPtJAtD9.9GkYrZNN7Uq8cZW62QsVb9rcddDlW6i');
/*!40000 ALTER TABLE `tb_calsis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ceklis`
--

DROP TABLE IF EXISTS `tb_ceklis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ceklis` (
  `idceklis` int(11) NOT NULL AUTO_INCREMENT,
  `idcalsis` int(11) NOT NULL,
  `kdsyarat` char(12) DEFAULT NULL,
  `ada` enum('1','0') DEFAULT NULL,
  `fileberkas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idceklis`),
  KEY `kdsyarat` (`kdsyarat`)
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ceklis`
--

LOCK TABLES `tb_ceklis` WRITE;
/*!40000 ALTER TABLE `tb_ceklis` DISABLE KEYS */;
INSERT INTO `tb_ceklis` VALUES (1,57,'S20201003','1',NULL),(2,57,'S20201004','1',NULL),(3,56,'S20201005','1',NULL),(4,55,'S20201005','1',NULL),(5,54,'S20201005','1',NULL),(6,53,'S20201005','1',NULL),(7,52,'S20201005','1',NULL),(8,51,'S20201005','1',NULL),(9,50,'S20201005','1',NULL),(10,49,'S20201005','1',NULL),(11,48,'S20201005','1',NULL),(12,47,'S20201005','1',NULL),(13,46,'S20201005','1',NULL),(14,45,'S20201005','1',NULL),(15,44,'S20201005','1',NULL),(16,43,'S20201005','1',NULL),(17,42,'S20201005','1',NULL),(18,41,'S20201005','1',NULL),(19,40,'S20201005','1',NULL),(20,39,'S20201005','1',NULL),(21,38,'S20201005','1',NULL),(22,37,'S20201005','1',NULL),(23,36,'S20201005','1',NULL),(24,35,'S20201005','1',NULL),(25,34,'S20201005','1',NULL),(26,33,'S20201005','1',NULL),(27,32,'S20201005','1',NULL),(28,31,'S20201005','1',NULL),(29,30,'S20201005','1',NULL),(30,29,'S20201005','1',NULL),(31,28,'S20201005','1',NULL),(32,27,'S20201005','1',NULL),(33,26,'S20201005','1',NULL),(34,25,'S20201004','1',NULL),(35,25,'S20201003','1',NULL),(36,25,'S20201002','1',NULL),(37,25,'S20201001','1',NULL),(38,24,'S20201001','1',NULL),(39,24,'S20201002','1',NULL),(40,24,'S20201003','1',NULL),(41,24,'S20201004','1',NULL),(42,24,'S20201005','1',NULL),(43,23,'S20201005','1',NULL),(44,21,'S20201005','1',NULL),(45,21,'S20201004','1',NULL),(46,22,'S20201004','1',NULL),(47,23,'S20201004','1',NULL),(48,23,'S20201003','1',NULL),(49,23,'S20201002','1',NULL),(50,23,'S20201001','1',NULL),(51,22,'S20201001','1',NULL),(52,21,'S20201001','1',NULL),(53,22,'S20201002','1',NULL),(54,22,'S20201003','1',NULL),(55,21,'S20201003','1',NULL),(56,21,'S20201002','1',NULL),(57,22,'S20201005','1',NULL),(58,1,'S20201001','1',NULL),(59,2,'S20201001','1',NULL),(60,3,'S20201001','1',NULL),(61,4,'S20201001','1',NULL),(62,5,'S20201001','1',NULL),(63,6,'S20201001','1',NULL),(64,7,'S20201001','1',NULL),(65,8,'S20201001','1',NULL),(66,9,'S20201001','1',NULL),(67,10,'S20201001','1',NULL),(68,10,'S20201002','1',NULL),(69,9,'S20201002','1',NULL),(70,8,'S20201002','1',NULL),(71,7,'S20201002','1',NULL),(72,6,'S20201002','1',NULL),(73,5,'S20201002','1',NULL),(74,4,'S20201002','1',NULL),(75,3,'S20201002','1',NULL),(76,2,'S20201002','1',NULL),(77,1,'S20201002','1',NULL),(78,1,'S20201003','1',NULL),(79,2,'S20201003','1',NULL),(80,3,'S20201003','1',NULL),(81,4,'S20201003','1',NULL),(82,5,'S20201003','1',NULL),(83,6,'S20201003','1',NULL),(84,7,'S20201003','1',NULL),(85,8,'S20201003','1',NULL),(86,9,'S20201003','1',NULL),(87,10,'S20201003','1',NULL),(88,1,'S20201004','1',NULL),(89,2,'S20201004','1',NULL),(90,3,'S20201004','1',NULL),(91,4,'S20201004','1',NULL),(92,5,'S20201004','1',NULL),(93,6,'S20201004','1',NULL),(94,7,'S20201004','1',NULL),(95,8,'S20201004','1',NULL),(96,9,'S20201004','1',NULL),(97,10,'S20201004','1',NULL),(98,10,'S20201005','1',NULL),(99,9,'S20201005','1',NULL),(100,8,'S20201005','1',NULL),(101,7,'S20201005','1',NULL),(102,6,'S20201005','1',NULL),(103,5,'S20201005','1',NULL),(104,4,'S20201005','1',NULL),(105,3,'S20201005','1',NULL),(106,2,'S20201005','1',NULL),(107,1,'S20201005','1',NULL),(108,11,'S20201001','1',NULL),(109,12,'S20201001','1',NULL),(110,13,'S20201001','1',NULL),(111,14,'S20201001','1',NULL),(112,15,'S20201001','1',NULL),(113,16,'S20201001','1',NULL),(114,17,'S20201001','1',NULL),(115,18,'S20201001','1',NULL),(116,19,'S20201001','1',NULL),(117,19,'S20201002','1',NULL),(118,18,'S20201002','1',NULL),(119,17,'S20201002','1',NULL),(120,16,'S20201002','1',NULL),(121,15,'S20201002','1',NULL),(122,14,'S20201002','1',NULL),(123,13,'S20201002','1',NULL),(124,12,'S20201002','1',NULL),(125,11,'S20201002','1',NULL),(126,11,'S20201003','1',NULL),(127,12,'S20201003','1',NULL),(128,13,'S20201003','1',NULL),(129,14,'S20201003','1',NULL),(130,15,'S20201003','1',NULL),(131,16,'S20201003','1',NULL),(132,17,'S20201003','1',NULL),(133,18,'S20201003','1',NULL),(134,19,'S20201003','1',NULL),(135,20,'S20201003','1',NULL),(136,20,'S20201004','1',NULL),(137,19,'S20201004','1',NULL),(138,18,'S20201004','1',NULL),(139,17,'S20201004','1',NULL),(140,16,'S20201004','1',NULL),(141,15,'S20201004','1',NULL),(142,14,'S20201004','1',NULL),(143,13,'S20201004','1',NULL),(144,12,'S20201004','1',NULL),(145,11,'S20201004','1',NULL),(146,11,'S20201005','1',NULL),(147,12,'S20201005','1',NULL),(148,13,'S20201005','1',NULL),(149,14,'S20201005','1',NULL),(150,15,'S20201005','1',NULL),(151,16,'S20201005','1',NULL),(152,17,'S20201005','1',NULL),(153,18,'S20201005','1',NULL),(154,19,'S20201005','1',NULL),(155,20,'S20201005','1',NULL),(156,20,'S20201002','1',NULL),(157,20,'S20201001','1',NULL),(158,25,'S20201005','0',NULL),(159,26,'S20201004','0',NULL),(160,26,'S20201003','0',NULL),(161,26,'S20201002','0',NULL),(162,26,'S20201001','0',NULL),(163,27,'S20201001','0',NULL),(164,27,'S20201002','0',NULL),(165,27,'S20201003','0',NULL),(166,27,'S20201004','0',NULL),(167,28,'S20201004','0',NULL),(168,28,'S20201003','0',NULL),(169,28,'S20201002','0',NULL),(170,28,'S20201001','0',NULL),(171,29,'S20201001','0',NULL),(172,29,'S20201002','0',NULL),(173,29,'S20201003','0',NULL),(174,29,'S20201004','0',NULL),(175,30,'S20201004','0',NULL),(176,30,'S20201003','0',NULL),(177,30,'S20201002','0',NULL),(178,30,'S20201001','0',NULL),(179,31,'S20201001','0',NULL),(180,31,'S20201002','0',NULL),(181,31,'S20201003','0',NULL),(182,31,'S20201004','0',NULL),(183,32,'S20201004','0',NULL),(184,32,'S20201003','0',NULL),(185,32,'S20201002','0',NULL),(186,32,'S20201001','0',NULL),(187,33,'S20201001','0',NULL),(188,33,'S20201002','0',NULL),(189,33,'S20201003','0',NULL),(190,33,'S20201004','0',NULL),(191,34,'S20201004','0',NULL),(192,34,'S20201003','0',NULL),(193,34,'S20201002','0',NULL),(194,34,'S20201001','0',NULL),(195,35,'S20201001','0',NULL),(196,35,'S20201002','0',NULL),(197,35,'S20201003','0',NULL),(198,35,'S20201004','0',NULL),(199,36,'S20201004','0',NULL),(200,36,'S20201003','0',NULL),(201,36,'S20201002','0',NULL),(202,36,'S20201001','0',NULL),(203,37,'S20201001','0',NULL),(204,37,'S20201004','0',NULL),(205,38,'S20201004','0',NULL),(206,38,'S20201003','0',NULL),(207,38,'S20201002','0',NULL),(208,38,'S20201001','0',NULL),(209,39,'S20201001','0',NULL),(210,39,'S20201002','0',NULL),(211,39,'S20201003','0',NULL),(212,39,'S20201004','0',NULL),(213,40,'S20201004','0',NULL),(214,40,'S20201003','0',NULL),(215,40,'S20201002','0',NULL),(216,40,'S20201001','0',NULL),(217,50,'S20201004','0',NULL),(218,50,'S20201003','0',NULL),(219,50,'S20201002','0',NULL),(220,50,'S20201001','0',NULL),(221,49,'S20201001','0',NULL),(222,49,'S20201002','0',NULL),(223,49,'S20201003','0',NULL),(224,49,'S20201004','0',NULL),(225,48,'S20201004','0',NULL),(226,48,'S20201003','0',NULL),(227,48,'S20201002','0',NULL),(228,48,'S20201001','0',NULL),(229,47,'S20201001','0',NULL),(230,47,'S20201002','0',NULL),(231,47,'S20201003','0',NULL),(232,47,'S20201004','0',NULL),(233,46,'S20201004','0',NULL),(234,46,'S20201003','0',NULL),(235,46,'S20201002','0',NULL),(236,46,'S20201001','0',NULL),(237,45,'S20201001','0',NULL),(238,45,'S20201003','0',NULL),(239,45,'S20201004','0',NULL),(240,44,'S20201004','0',NULL),(241,44,'S20201003','0',NULL),(242,44,'S20201002','0',NULL),(243,44,'S20201001','0',NULL),(244,43,'S20201001','0',NULL),(245,43,'S20201002','0',NULL),(246,43,'S20201003','0',NULL),(247,43,'S20201004','0',NULL),(248,42,'S20201004','0',NULL),(249,41,'S20201004','0',NULL),(250,41,'S20201003','0',NULL),(251,42,'S20201003','0',NULL),(252,41,'S20201002','0',NULL),(253,42,'S20201002','0',NULL),(254,41,'S20201001','0',NULL),(255,42,'S20201001','0',NULL),(256,57,'S20201005','1',NULL),(257,57,'S20201002','0',NULL),(258,57,'S20201001','0',NULL),(259,56,'S20201001','0',NULL),(260,56,'S20201002','0',NULL),(261,56,'S20201003','0',NULL),(262,56,'S20201004','0',NULL),(263,55,'S20201004','0',NULL),(264,55,'S20201003','0',NULL),(265,55,'S20201002','0',NULL),(266,55,'S20201001','0',NULL),(267,54,'S20201001','0',NULL),(268,54,'S20201002','0',NULL),(269,54,'S20201003','0',NULL),(270,54,'S20201004','0',NULL),(271,53,'S20201004','0',NULL),(272,53,'S20201003','0',NULL),(273,53,'S20201002','0',NULL),(274,53,'S20201001','0',NULL),(275,52,'S20201001','0',NULL),(276,52,'S20201002','0',NULL),(277,52,'S20201003','0',NULL),(278,52,'S20201004','0',NULL),(279,51,'S20201004','0',NULL),(280,51,'S20201003','0',NULL),(281,51,'S20201002','0',NULL),(282,51,'S20201001','0',NULL),(283,37,'S20201002','0',NULL),(284,37,'S20201003','0',NULL),(285,45,'S20201002','0',NULL),(288,58,'S20211001','1',NULL);
/*!40000 ALTER TABLE `tb_ceklis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_dayatampung`
--

DROP TABLE IF EXISTS `tb_dayatampung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_dayatampung` (
  `id_tampung` int(11) NOT NULL AUTO_INCREMENT,
  `kdthpel` char(5) DEFAULT NULL,
  `kdskul` char(20) NOT NULL,
  `jrombel` int(11) DEFAULT NULL,
  `jsiswa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tampung`),
  KEY `kdthpel` (`kdthpel`,`kdskul`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_dayatampung`
--

LOCK TABLES `tb_dayatampung` WRITE;
/*!40000 ALTER TABLE `tb_dayatampung` DISABLE KEYS */;
INSERT INTO `tb_dayatampung` VALUES (1,'20201','P10040036',2,32),(2,'20211','P10040036',2,32);
/*!40000 ALTER TABLE `tb_dayatampung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_dsrhkm`
--

DROP TABLE IF EXISTS `tb_dsrhkm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_dsrhkm` (
  `idhkm` int(11) NOT NULL AUTO_INCREMENT,
  `nmhkm` varchar(255) CHARACTER SET latin1 NOT NULL,
  `kdthpel` char(5) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idhkm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_dsrhkm`
--

LOCK TABLES `tb_dsrhkm` WRITE;
/*!40000 ALTER TABLE `tb_dsrhkm` DISABLE KEYS */;
INSERT INTO `tb_dsrhkm` VALUES (1,'Peraturan Menteri Pendidikan dan Kebudayaan Republik Indonesia Nomor 44 Tahun 2019 penerimaan peserta didik baru pada taman kanak-kanak, sekolah dasar, sekolah menengah pertama, sekolah menengah atas, dan sekolah menengah kejuruan','20201'),(2,'Peraturan Menteri Pendidikan dan Kebudayaan Republik Indonesia Nomor 1 Tahun 2021 penerimaan peserta didik baru pada taman kanak-kanak, sekolah dasar, sekolah menengah pertama, sekolah menengah atas, dan sekolah menengah kejuruan','20211');
/*!40000 ALTER TABLE `tb_dsrhkm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_hasil`
--

DROP TABLE IF EXISTS `tb_hasil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_hasil` (
  `kdhasil` int(11) NOT NULL,
  `penghasilan` varchar(200) NOT NULL,
  PRIMARY KEY (`kdhasil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabel_penghasilan';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_hasil`
--

LOCK TABLES `tb_hasil` WRITE;
/*!40000 ALTER TABLE `tb_hasil` DISABLE KEYS */;
INSERT INTO `tb_hasil` VALUES (1,'Kurang dari Rp 500.000'),(2,'Antara Rp 500.000 s/d Rp 1.000.000'),(3,'Antara Rp 1.000.000 s/d Rp 2.000.000'),(4,'Antara Rp 2.000.000 s/d Rp 5.000.000'),(5,'Lebih Dari Rp 5.000.000');
/*!40000 ALTER TABLE `tb_hasil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jadwal`
--

DROP TABLE IF EXISTS `tb_jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_jadwal` (
  `kdjadwal` char(10) NOT NULL,
  `kdthpel` char(5) DEFAULT NULL,
  `awal` datetime DEFAULT NULL,
  `akhir` datetime NOT NULL,
  `kegiatan` varchar(250) NOT NULL,
  `main` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`kdjadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jadwal`
--

LOCK TABLES `tb_jadwal` WRITE;
/*!40000 ALTER TABLE `tb_jadwal` DISABLE KEYS */;
INSERT INTO `tb_jadwal` VALUES ('JD20201001','20201','2020-05-18 08:00:00','2020-07-10 12:00:00','Pendaftaran Online via website https://ppdb.smpnlipat.sch.id','1'),('JD20201002','20201','2020-05-19 08:00:00','2020-07-10 14:00:00','Seleksi berkas Administrasi PPDB ','0'),('JD20201003','20201','2020-07-11 08:00:00','2020-07-11 16:00:00','Pengumuman Hasil Seleksi Administrasi','0'),('JD20201004','20201','2020-07-13 08:00:00','2020-07-14 16:00:00','Registrasi Ulang Calon Peserta Didik Yang Diterima','0'),('JD20201005','20201','2020-07-13 08:00:00','2020-07-13 16:00:00','Seleksi Penempatan Kelas','0'),('JD20211001','20211','2021-06-28 00:00:00','2021-07-03 23:59:00','Pendataan Calon Peserta Didik melalui website https://ppdb.smpnlipat.sch.id oleh Panitia','1'),('JD20211002','20211','2021-06-29 08:00:00','2021-07-03 23:59:00','Seleksi berkas Administrasi PPDB  2021/2022',NULL),('JD20211003','20211','2021-07-05 08:00:00','2021-07-05 23:59:00','Pengumuman Hasil Seleksi Administrasi',NULL),('JD20211004','20211','2021-07-06 08:00:00','2021-07-09 23:59:00','Registrasi Ulang Calon Peserta Didik Yang Diterima',NULL),('JD20211005','20211','2021-07-07 08:00:00','2021-07-09 23:59:00','Seleksi penempatan kelas materi Literasi dan Numerasi (Jadwal Menyesuaikan)',NULL),('JD20211006','20211','2021-07-06 09:00:00','2021-07-06 23:59:00','Tes Kemampuan Baca AlQuran',NULL);
/*!40000 ALTER TABLE `tb_jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jenjang`
--

DROP TABLE IF EXISTS `tb_jenjang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_jenjang` (
  `kdjenjang` char(3) NOT NULL,
  `nmjenjang` varchar(50) NOT NULL,
  PRIMARY KEY (`kdjenjang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jenjang`
--

LOCK TABLES `tb_jenjang` WRITE;
/*!40000 ALTER TABLE `tb_jenjang` DISABLE KEYS */;
INSERT INTO `tb_jenjang` VALUES ('SD','SD Sederajat'),('SMP','SMP Sederajat');
/*!40000 ALTER TABLE `tb_jenjang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kerja`
--

DROP TABLE IF EXISTS `tb_kerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kerja` (
  `kdkerja` int(11) NOT NULL AUTO_INCREMENT,
  `nmkerja` varchar(200) NOT NULL,
  PRIMARY KEY (`kdkerja`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kerja`
--

LOCK TABLES `tb_kerja` WRITE;
/*!40000 ALTER TABLE `tb_kerja` DISABLE KEYS */;
INSERT INTO `tb_kerja` VALUES (0,'Tidak Bekerja'),(1,'Aparatur Sipil Negara'),(2,'Karyawan Swasta'),(3,'Wiraswasta / Wirausaha'),(4,'Petani / Pekebun'),(5,'Pedagang'),(6,'Buruh'),(7,'Mekanik'),(8,'Mengurus Rumah Tangga');
/*!40000 ALTER TABLE `tb_kerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_mapel`
--

DROP TABLE IF EXISTS `tb_mapel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_mapel` (
  `kdmapel` char(4) NOT NULL,
  `akmapel` char(4) NOT NULL,
  `nmmapel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kdmapel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_mapel`
--

LOCK TABLES `tb_mapel` WRITE;
/*!40000 ALTER TABLE `tb_mapel` DISABLE KEYS */;
INSERT INTO `tb_mapel` VALUES ('1301','PAIB','Pendidikan Agama Islam dan Budi Pekerti'),('1302','PPKn','Pendidikan Pancasila dan Kewarganegaraan'),('1303','BIND','Bahasa Indonesia'),('1304','MTK','Matematika'),('1305','IPA','Ilmu Pengetahuan Alam'),('1306','IPS','Ilmu Pengetahuan Sosial'),('1307','SBDP','Seni Budaya dan Prakarya'),('1308','PJOK','Pendidikan Jasmani Olahraga dan Kesehatan');
/*!40000 ALTER TABLE `tb_mapel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nilai`
--

DROP TABLE IF EXISTS `tb_nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_nilai` (
  `idnilai` int(11) NOT NULL AUTO_INCREMENT,
  `idcalsis` int(11) NOT NULL,
  `kdmapel` char(4) NOT NULL DEFAULT 'NULL',
  `semester` char(5) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `jns` enum('1','2') DEFAULT NULL,
  PRIMARY KEY (`idnilai`),
  KEY `kdmapel` (`kdmapel`)
) ENGINE=InnoDB AUTO_INCREMENT=985 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nilai`
--

LOCK TABLES `tb_nilai` WRITE;
/*!40000 ALTER TABLE `tb_nilai` DISABLE KEYS */;
INSERT INTO `tb_nilai` VALUES (9,1,'1301','6',66,'2'),(10,1,'1302','6',71,'2'),(11,1,'1303','6',71,'2'),(12,1,'1304','6',67,'2'),(13,1,'1305','6',69,'2'),(14,1,'1306','6',69,'2'),(15,1,'1307','6',69,'2'),(16,1,'1308','6',75,'2'),(17,4,'1301','6',72,'2'),(18,4,'1302','6',75,'2'),(19,4,'1303','6',74,'2'),(20,4,'1304','6',71,'2'),(21,4,'1305','6',70,'2'),(22,4,'1306','6',70,'2'),(23,4,'1307','6',71,'2'),(24,4,'1308','6',76,'2'),(25,2,'1301','6',64,'2'),(26,2,'1302','6',68,'2'),(27,2,'1303','6',68,'2'),(28,2,'1304','6',64,'2'),(29,2,'1305','6',66,'2'),(30,2,'1306','6',63,'2'),(31,2,'1307','6',65,'2'),(32,2,'1308','6',74,'2'),(33,5,'1301','6',66,'2'),(34,5,'1302','6',73,'2'),(35,5,'1303','6',70,'2'),(36,5,'1304','6',74,'2'),(37,3,'1301','6',67,'2'),(38,3,'1302','6',74,'2'),(39,5,'1305','6',70,'2'),(40,3,'1303','6',74,'2'),(41,3,'1304','6',72,'2'),(42,3,'1305','6',67,'2'),(43,5,'1306','6',67,'2'),(44,3,'1306','6',67,'2'),(45,3,'1307','6',69,'2'),(46,3,'1308','6',71,'2'),(47,5,'1307','6',70,'2'),(48,5,'1308','6',72,'2'),(49,6,'1301','6',65,'2'),(50,6,'1302','6',66,'2'),(51,6,'1303','6',64,'2'),(52,6,'1304','6',66,'2'),(53,6,'1305','6',65,'2'),(54,6,'1306','6',63,'2'),(55,6,'1307','6',67,'2'),(56,6,'1308','6',76,'2'),(57,7,'1301','6',75,'2'),(58,7,'1302','6',78,'2'),(59,7,'1303','6',77,'2'),(60,7,'1304','6',75,'2'),(61,7,'1305','6',74,'2'),(62,7,'1306','6',74,'2'),(63,7,'1307','6',78,'2'),(64,7,'1308','6',73,'2'),(65,11,'1301','6',80,'2'),(66,11,'1302','6',81,'2'),(67,11,'1303','6',81,'2'),(68,11,'1304','6',79,'2'),(69,11,'1305','6',80,'2'),(70,11,'1306','6',79,'2'),(71,11,'1307','6',78,'2'),(72,11,'1308','6',75,'2'),(73,14,'1301','6',64,'2'),(74,14,'1302','6',67,'2'),(75,14,'1303','6',67,'2'),(76,14,'1304','6',63,'2'),(77,14,'1305','6',65,'2'),(78,14,'1306','6',62,'2'),(79,14,'1307','6',66,'2'),(80,14,'1308','6',72,'2'),(81,15,'1308','6',83,'2'),(82,15,'1307','6',88,'2'),(83,15,'1306','6',87,'2'),(84,15,'1305','6',86,'2'),(85,15,'1304','6',89,'2'),(86,15,'1303','6',77,'2'),(87,15,'1302','6',88,'2'),(88,15,'1301','6',90,'2'),(89,16,'1301','6',69,'2'),(90,16,'1302','6',71,'2'),(91,16,'1303','6',72,'2'),(92,16,'1304','6',67,'2'),(93,16,'1305','6',73,'2'),(94,16,'1306','6',67,'2'),(95,16,'1307','6',67,'2'),(96,16,'1308','6',77,'2'),(97,17,'1301','6',0,'2'),(98,17,'1302','6',0,'2'),(99,17,'1303','6',0,'2'),(100,17,'1304','6',0,'2'),(101,17,'1305','6',0,'2'),(102,17,'1306','6',0,'2'),(103,17,'1307','6',0,'2'),(104,17,'1308','6',0,'2'),(105,18,'1301','6',0,'2'),(106,18,'1302','6',0,'2'),(107,18,'1303','6',0,'2'),(108,18,'1304','6',0,'2'),(109,18,'1305','6',0,'2'),(110,18,'1306','6',0,'2'),(111,18,'1307','6',0,'2'),(112,18,'1308','6',0,'2'),(113,19,'1301','6',0,'2'),(114,19,'1302','6',0,'2'),(115,19,'1303','6',0,'2'),(116,19,'1304','6',0,'2'),(117,19,'1305','6',0,'2'),(118,19,'1306','6',0,'2'),(119,19,'1307','6',0,'2'),(120,19,'1308','6',0,'2'),(121,8,'1301','6',68,'2'),(122,8,'1302','6',74,'2'),(123,8,'1303','6',73,'2'),(124,8,'1304','6',68,'2'),(125,8,'1305','6',71,'2'),(126,8,'1306','6',69,'2'),(127,8,'1307','6',73,'2'),(128,8,'1308','6',74,'2'),(129,20,'1301','6',89,'2'),(130,20,'1302','6',88,'2'),(131,20,'1303','6',90,'2'),(132,20,'1304','6',88,'2'),(133,20,'1305','6',86,'2'),(134,20,'1306','6',89,'2'),(135,20,'1307','6',86,'2'),(136,20,'1308','6',80,'2'),(137,13,'1301','6',86,'2'),(138,13,'1302','6',88,'2'),(139,13,'1303','6',89,'2'),(140,13,'1304','6',86,'2'),(141,13,'1305','6',86,'2'),(142,13,'1306','6',87,'2'),(143,13,'1307','6',85,'2'),(144,13,'1308','6',80,'2'),(145,12,'1301','6',62,'2'),(146,12,'1302','6',69,'2'),(147,12,'1303','6',66,'2'),(148,12,'1304','6',64,'2'),(149,12,'1305','6',64,'2'),(150,12,'1306','6',62,'2'),(151,12,'1307','6',65,'2'),(152,12,'1308','6',71,'2'),(153,10,'1301','6',71,'2'),(154,10,'1302','6',76,'2'),(155,10,'1303','6',74,'2'),(156,10,'1304','6',73,'2'),(157,10,'1305','6',69,'2'),(158,10,'1306','6',70,'2'),(159,10,'1307','6',72,'2'),(160,10,'1308','6',70,'2'),(161,9,'1301','6',85,'2'),(162,9,'1302','6',81,'2'),(163,9,'1303','6',84,'2'),(164,9,'1304','6',84,'2'),(165,9,'1305','6',83,'2'),(166,9,'1306','6',80,'2'),(167,9,'1307','6',79,'2'),(168,9,'1308','6',78,'2'),(169,22,'1301','6',66,'2'),(170,22,'1302','6',70,'2'),(171,22,'1303','6',69,'2'),(172,22,'1304','6',69,'2'),(173,22,'1305','6',68,'2'),(174,22,'1306','6',64,'2'),(175,22,'1307','6',66,'2'),(176,22,'1308','6',75,'2'),(177,23,'1301','6',72,'2'),(178,23,'1302','6',73,'2'),(179,23,'1303','6',72,'2'),(180,23,'1304','6',68,'2'),(181,23,'1305','6',68,'2'),(182,23,'1306','6',68,'2'),(183,23,'1307','6',70,'2'),(184,23,'1308','6',72,'2'),(185,24,'1301','6',81,'2'),(186,24,'1302','6',80,'2'),(187,24,'1303','6',80,'2'),(188,24,'1304','6',81,'2'),(189,24,'1305','6',80,'2'),(190,24,'1306','6',80,'2'),(191,24,'1307','6',80,'2'),(192,24,'1308','6',82,'2'),(193,25,'1301','6',64,'2'),(194,25,'1302','6',65,'2'),(195,25,'1303','6',64,'2'),(196,25,'1304','6',60,'2'),(197,25,'1305','6',63,'2'),(198,25,'1306','6',65,'2'),(199,25,'1307','6',64,'2'),(200,25,'1308','6',75,'2'),(201,21,'1301','6',71,'2'),(202,21,'1302','6',72,'2'),(203,21,'1303','6',76,'2'),(204,21,'1304','6',73,'2'),(205,21,'1305','6',73,'2'),(206,21,'1306','6',68,'2'),(207,21,'1307','6',72,'2'),(208,21,'1308','6',75,'2'),(209,26,'1301','6',85,'2'),(210,26,'1302','6',78,'2'),(211,26,'1303','6',82,'2'),(212,26,'1304','6',68,'2'),(213,26,'1305','6',70,'2'),(214,26,'1306','6',70,'2'),(215,26,'1307','6',85,'2'),(216,26,'1308','6',80,'2'),(217,27,'1301','6',81,'2'),(218,27,'1302','6',80,'2'),(219,27,'1303','6',80,'2'),(220,27,'1304','6',68,'2'),(221,27,'1305','6',70,'2'),(222,27,'1306','6',70,'2'),(223,27,'1307','6',77,'2'),(224,27,'1308','6',80,'2'),(225,28,'1301','6',81,'2'),(226,28,'1302','6',74,'2'),(227,28,'1303','6',85,'2'),(228,28,'1304','6',69,'2'),(229,28,'1305','6',70,'2'),(230,28,'1306','6',70,'2'),(231,28,'1307','6',82,'2'),(232,28,'1308','6',75,'2'),(233,29,'1301','6',82,'2'),(234,29,'1302','6',82,'2'),(235,29,'1303','6',85,'2'),(236,29,'1304','6',72,'2'),(237,29,'1305','6',78,'2'),(238,29,'1306','6',72,'2'),(239,29,'1307','6',85,'2'),(240,29,'1308','6',80,'2'),(241,30,'1301','6',81,'2'),(242,30,'1302','6',72,'2'),(243,30,'1303','6',70,'2'),(244,30,'1304','6',68,'2'),(245,30,'1305','6',68,'2'),(246,30,'1306','6',70,'2'),(247,30,'1307','6',86,'2'),(248,30,'1308','6',80,'2'),(249,31,'1301','6',80,'2'),(250,31,'1302','6',80,'2'),(251,31,'1303','6',70,'2'),(252,31,'1304','6',72,'2'),(253,31,'1305','6',70,'2'),(254,31,'1306','6',70,'2'),(255,31,'1307','6',70,'2'),(256,31,'1308','6',75,'2'),(257,32,'1301','6',76,'2'),(258,32,'1302','6',70,'2'),(259,32,'1303','6',70,'2'),(260,32,'1304','6',69,'2'),(261,32,'1305','6',68,'2'),(262,32,'1306','6',70,'2'),(263,32,'1307','6',70,'2'),(264,32,'1308','6',80,'2'),(265,33,'1301','6',85,'2'),(266,33,'1302','6',84,'2'),(267,33,'1303','6',85,'2'),(268,33,'1304','6',72,'2'),(269,33,'1305','6',77,'2'),(270,33,'1306','6',80,'2'),(271,33,'1307','6',82,'2'),(272,33,'1308','6',80,'2'),(273,34,'1301','6',87,'2'),(274,34,'1302','6',88,'2'),(275,34,'1303','6',88,'2'),(276,34,'1304','6',89,'2'),(277,34,'1305','6',86,'2'),(278,34,'1306','6',88,'2'),(279,34,'1307','6',82,'2'),(280,34,'1308','6',85,'2'),(281,35,'1301','6',85,'2'),(282,35,'1302','6',88,'2'),(283,35,'1303','6',89,'2'),(284,35,'1304','6',88,'2'),(285,35,'1305','6',84,'2'),(286,35,'1306','6',86,'2'),(287,35,'1307','6',82,'2'),(288,35,'1308','6',85,'2'),(289,36,'1301','6',75,'2'),(290,36,'1302','6',73,'2'),(291,36,'1303','6',70,'2'),(292,36,'1304','6',69,'2'),(293,36,'1305','6',68,'2'),(294,36,'1306','6',70,'2'),(295,36,'1307','6',72,'2'),(296,36,'1308','6',80,'2'),(297,37,'1301','6',77,'2'),(298,37,'1302','6',74,'2'),(299,37,'1303','6',76,'2'),(300,37,'1304','6',70,'2'),(301,37,'1305','6',74,'2'),(302,37,'1306','6',76,'2'),(303,37,'1307','6',72,'2'),(304,37,'1308','6',75,'2'),(305,38,'1301','6',80,'2'),(306,38,'1302','6',79,'2'),(307,38,'1303','6',76,'2'),(308,38,'1304','6',70,'2'),(309,38,'1305','6',70,'2'),(310,38,'1306','6',72,'2'),(311,38,'1307','6',70,'2'),(312,38,'1308','6',75,'2'),(313,39,'1301','6',83,'2'),(314,39,'1302','6',75,'2'),(315,39,'1303','6',70,'2'),(316,39,'1304','6',70,'2'),(317,39,'1305','6',70,'2'),(318,39,'1306','6',72,'2'),(319,39,'1307','6',78,'2'),(320,39,'1308','6',75,'2'),(321,40,'1301','6',81,'2'),(322,40,'1302','6',70,'2'),(323,40,'1303','6',74,'2'),(324,40,'1304','6',79,'2'),(325,40,'1305','6',76,'2'),(326,40,'1306','6',70,'2'),(327,40,'1307','6',76,'2'),(328,40,'1308','6',80,'2'),(329,41,'1301','6',82,'2'),(330,41,'1302','6',83,'2'),(331,41,'1303','6',83,'2'),(332,41,'1304','6',81,'2'),(333,41,'1305','6',78,'2'),(334,41,'1306','6',80,'2'),(335,41,'1307','6',83,'2'),(336,41,'1308','6',81,'2'),(337,42,'1301','6',79,'2'),(338,42,'1302','6',75,'2'),(339,42,'1303','6',72,'2'),(340,42,'1304','6',70,'2'),(341,42,'1305','6',70,'2'),(342,42,'1306','6',71,'2'),(343,42,'1307','6',73,'2'),(344,42,'1308','6',78,'2'),(345,45,'1301','6',79,'2'),(346,45,'1302','6',79,'2'),(347,45,'1303','6',74,'2'),(348,45,'1304','6',74,'2'),(349,45,'1305','6',77,'2'),(350,45,'1306','6',79,'2'),(351,45,'1307','6',75,'2'),(352,45,'1308','6',78,'2'),(353,44,'1301','6',82,'2'),(354,44,'1302','6',79,'2'),(355,44,'1303','6',77,'2'),(356,44,'1304','6',74,'2'),(357,44,'1305','6',76,'2'),(358,44,'1306','6',77,'2'),(359,44,'1307','6',79,'2'),(360,44,'1308','6',76,'2'),(361,46,'1301','6',81,'2'),(362,46,'1302','6',80,'2'),(363,46,'1303','6',74,'2'),(364,46,'1304','6',73,'2'),(365,46,'1305','6',72,'2'),(366,46,'1306','6',74,'2'),(367,46,'1307','6',73,'2'),(368,46,'1308','6',79,'2'),(369,43,'1301','6',82,'2'),(370,43,'1302','6',79,'2'),(371,43,'1303','6',77,'2'),(372,43,'1304','6',74,'2'),(373,43,'1305','6',76,'2'),(374,43,'1306','6',77,'2'),(375,47,'1301','6',72,'2'),(376,43,'1307','6',79,'2'),(377,47,'1302','6',70,'2'),(378,47,'1303','6',69,'2'),(379,43,'1308','6',76,'2'),(380,47,'1304','6',69,'2'),(381,47,'1305','6',67,'2'),(382,47,'1306','6',69,'2'),(383,47,'1307','6',72,'2'),(384,47,'1308','6',75,'2'),(385,48,'1301','6',80,'2'),(386,48,'1302','6',74,'2'),(387,48,'1303','6',70,'2'),(388,48,'1304','6',69,'2'),(389,48,'1305','6',69,'2'),(390,48,'1306','6',71,'2'),(391,48,'1307','6',73,'2'),(392,48,'1308','6',78,'2'),(393,49,'1301','6',86,'2'),(394,49,'1302','6',82,'2'),(395,49,'1303','6',82,'2'),(396,49,'1304','6',81,'2'),(397,49,'1305','6',84,'2'),(398,49,'1306','6',82,'2'),(399,49,'1307','6',82,'2'),(400,49,'1308','6',79,'2'),(401,50,'1301','6',77,'2'),(402,50,'1302','6',73,'2'),(403,50,'1303','6',70,'2'),(404,50,'1304','6',70,'2'),(405,50,'1305','6',70,'2'),(406,50,'1306','6',70,'2'),(407,50,'1307','6',71,'2'),(408,50,'1308','6',76,'2'),(409,51,'1302','6',74,'2'),(410,51,'1301','6',78,'2'),(411,51,'1303','6',71,'2'),(412,51,'1304','6',71,'2'),(413,51,'1305','6',75,'2'),(414,51,'1306','6',70,'2'),(415,51,'1307','6',73,'2'),(416,51,'1308','6',77,'2'),(417,52,'1301','6',74,'2'),(418,52,'1302','6',74,'2'),(419,52,'1303','6',70,'2'),(420,52,'1304','6',69,'2'),(421,52,'1305','6',73,'2'),(422,52,'1306','6',71,'2'),(423,52,'1307','6',75,'2'),(424,52,'1308','6',79,'2'),(425,54,'1301','6',71,'2'),(426,54,'1302','6',71,'2'),(427,54,'1303','6',68,'2'),(428,54,'1304','6',67,'2'),(429,54,'1305','6',67,'2'),(430,54,'1306','6',69,'2'),(431,54,'1307','6',72,'2'),(432,54,'1308','6',76,'2'),(433,53,'1301','6',83,'2'),(434,53,'1302','6',84,'2'),(435,53,'1303','6',84,'2'),(436,53,'1304','6',83,'2'),(437,53,'1305','6',82,'2'),(438,53,'1306','6',88,'2'),(439,53,'1307','6',85,'2'),(440,53,'1308','6',80,'2'),(441,55,'1301','6',77,'2'),(442,55,'1302','6',73,'2'),(443,55,'1303','6',70,'2'),(444,55,'1304','6',70,'2'),(445,55,'1305','6',70,'2'),(446,55,'1306','6',70,'2'),(447,55,'1307','6',71,'2'),(448,55,'1308','6',76,'2'),(449,56,'1301','6',86,'2'),(450,56,'1302','6',82,'2'),(451,56,'1303','6',82,'2'),(452,56,'1304','6',81,'2'),(453,56,'1305','6',84,'2'),(454,56,'1306','6',82,'2'),(455,56,'1308','6',79,'2'),(456,56,'1307','6',82,'2'),(457,57,'1301','6',81,'2'),(458,57,'1302','6',81,'2'),(459,57,'1303','6',80,'2'),(460,57,'1304','6',75,'2'),(461,57,'1305','6',79,'2'),(462,57,'1306','6',78,'2'),(463,57,'1307','6',77,'2'),(464,57,'1308','6',76,'2'),(465,58,'1301','6',70,'2'),(466,58,'1302','6',70,'2'),(467,58,'1303','6',70,'2'),(468,58,'1304','6',72,'2'),(469,58,'1305','6',72,'2'),(470,58,'1306','6',71,'2'),(471,58,'1307','6',80,'2'),(472,58,'1308','6',74,'2'),(473,59,'1301','6',71,'2'),(474,59,'1302','6',74,'2'),(475,59,'1303','6',76,'2'),(476,59,'1304','6',69,'2'),(477,59,'1305','6',80,'2'),(478,59,'1306','6',74,'2'),(479,59,'1307','6',76,'2'),(480,59,'1308','6',76,'2'),(481,60,'1301','6',72,'2'),(482,60,'1302','6',78,'2'),(483,60,'1303','6',74,'2'),(484,60,'1304','6',67,'2'),(485,60,'1305','6',73,'2'),(486,60,'1306','6',73,'2'),(487,60,'1307','6',76,'2'),(488,60,'1308','6',78,'2'),(489,61,'1301','6',77,'2'),(490,61,'1302','6',79,'2'),(491,61,'1303','6',76,'2'),(492,61,'1304','6',69,'2'),(493,61,'1305','6',76,'2'),(494,61,'1306','6',74,'2'),(495,61,'1307','6',77,'2'),(496,61,'1308','6',81,'2'),(497,62,'1301','6',86,'2'),(498,62,'1302','6',81,'2'),(499,62,'1303','6',79,'2'),(500,62,'1304','6',77,'2'),(501,62,'1305','6',82,'2'),(502,62,'1306','6',84,'2'),(503,62,'1307','6',77,'2'),(504,62,'1308','6',83,'2'),(505,102,'1301','7',80,'2'),(506,102,'1302','7',75,'2'),(507,102,'1303','7',70,'2'),(508,102,'1304','7',70,'2'),(509,102,'1305','7',68,'2'),(510,102,'1306','7',68,'2'),(511,102,'1307','7',70,'2'),(512,102,'1308','7',70,'2'),(513,101,'1301','7',77,'2'),(514,101,'1302','7',70,'2'),(515,101,'1303','7',70,'2'),(516,101,'1304','7',70,'2'),(517,101,'1305','7',70,'2'),(518,101,'1306','7',70,'2'),(519,101,'1307','7',70,'2'),(520,101,'1308','7',70,'2'),(521,103,'1301','7',75,'2'),(522,103,'1302','7',75,'2'),(523,103,'1303','7',70,'2'),(524,103,'1304','7',70,'2'),(525,103,'1305','7',70,'2'),(526,103,'1306','7',70,'2'),(527,103,'1307','7',70,'2'),(528,103,'1308','7',70,'2'),(529,104,'1301','7',75,'2'),(530,104,'1302','7',74,'2'),(531,104,'1303','7',70,'2'),(532,104,'1304','7',70,'2'),(533,104,'1305','7',73,'2'),(534,104,'1306','7',70,'2'),(535,104,'1307','7',65,'2'),(536,104,'1308','7',70,'2'),(537,105,'1301','7',85,'2'),(538,105,'1302','7',78,'2'),(539,105,'1303','7',80,'2'),(540,105,'1304','7',70,'2'),(541,105,'1305','7',70,'2'),(542,105,'1306','7',73,'2'),(543,105,'1307','7',78,'2'),(544,105,'1308','7',78,'2'),(545,107,'1301','7',75,'2'),(546,107,'1302','7',70,'2'),(547,107,'1303','7',70,'2'),(548,107,'1304','7',65,'2'),(549,107,'1305','7',65,'2'),(550,107,'1306','7',65,'2'),(551,107,'1307','7',65,'2'),(552,107,'1308','7',68,'2'),(553,108,'1301','7',80,'2'),(554,108,'1302','7',78,'2'),(555,108,'1303','7',78,'2'),(556,108,'1304','7',70,'2'),(557,108,'1305','7',75,'2'),(558,108,'1306','7',75,'2'),(559,108,'1307','7',73,'2'),(560,108,'1308','7',75,'2'),(561,99,'1301','7',80,'2'),(562,99,'1302','7',83,'2'),(563,99,'1303','7',80,'2'),(564,99,'1304','7',80,'2'),(565,99,'1305','7',78,'2'),(566,99,'1306','7',78,'2'),(567,99,'1307','7',80,'2'),(568,99,'1308','7',80,'2'),(569,100,'1301','7',73,'2'),(570,100,'1302','7',70,'2'),(571,100,'1303','7',70,'2'),(572,100,'1304','7',70,'2'),(573,100,'1305','7',70,'2'),(574,100,'1306','7',70,'2'),(575,100,'1307','7',70,'2'),(576,100,'1308','7',70,'2'),(577,98,'1301','7',75,'2'),(578,98,'1302','7',70,'2'),(579,98,'1303','7',70,'2'),(580,98,'1304','7',70,'2'),(581,98,'1305','7',65,'2'),(582,98,'1306','7',65,'2'),(583,98,'1307','7',70,'2'),(584,98,'1308','7',70,'2'),(585,84,'1301','7',80,'2'),(586,84,'1302','7',83,'2'),(587,84,'1303','7',81,'2'),(588,84,'1304','7',77,'2'),(589,84,'1305','7',84,'2'),(590,84,'1306','7',81,'2'),(591,84,'1307','7',75,'2'),(592,84,'1308','7',79,'2'),(593,85,'1301','7',77,'2'),(594,85,'1302','7',84,'2'),(595,85,'1303','7',78,'2'),(596,85,'1304','7',73,'2'),(597,85,'1305','7',79,'2'),(598,85,'1306','7',77,'2'),(599,85,'1307','7',77,'2'),(600,85,'1308','7',83,'2'),(601,86,'1301','7',66,'2'),(602,86,'1302','7',72,'2'),(603,86,'1303','7',72,'2'),(604,86,'1304','7',63,'2'),(605,86,'1305','7',73,'2'),(606,86,'1306','7',70,'2'),(607,86,'1307','7',69,'2'),(608,86,'1308','7',77,'2'),(609,92,'1301','7',67,'2'),(610,92,'1302','7',71,'2'),(611,92,'1303','7',74,'2'),(612,92,'1304','7',67,'2'),(613,92,'1305','7',72,'2'),(614,92,'1306','7',73,'2'),(615,92,'1307','7',71,'2'),(616,92,'1308','7',74,'2'),(617,87,'1301','7',83,'2'),(618,87,'1302','7',85,'2'),(619,87,'1303','7',84,'2'),(620,87,'1304','7',78,'2'),(621,87,'1305','7',80,'2'),(622,87,'1306','7',84,'2'),(623,87,'1307','7',81,'2'),(624,87,'1308','7',81,'2'),(625,88,'1301','7',80,'2'),(626,88,'1302','7',81,'2'),(627,88,'1303','7',82,'2'),(628,88,'1304','7',75,'2'),(629,88,'1305','7',81,'2'),(630,88,'1306','7',80,'2'),(631,88,'1307','7',80,'2'),(632,88,'1308','7',78,'2'),(633,90,'1301','7',71,'2'),(634,90,'1302','7',75,'2'),(635,90,'1303','7',73,'2'),(636,90,'1304','7',68,'2'),(637,90,'1305','7',77,'2'),(638,90,'1306','7',72,'2'),(639,90,'1307','7',73,'2'),(640,90,'1308','7',77,'2'),(641,89,'1301','7',82,'2'),(642,89,'1302','7',86,'2'),(643,89,'1303','7',86,'2'),(644,89,'1304','7',77,'2'),(645,89,'1305','7',88,'2'),(646,89,'1306','7',85,'2'),(647,89,'1307','7',86,'2'),(648,89,'1308','7',83,'2'),(649,91,'1301','7',69,'2'),(650,91,'1302','7',75,'2'),(651,91,'1303','7',76,'2'),(652,91,'1304','7',65,'2'),(653,91,'1305','7',77,'2'),(654,91,'1306','7',74,'2'),(655,91,'1307','7',74,'2'),(656,91,'1308','7',75,'2'),(657,94,'1301','7',89,'2'),(658,94,'1302','7',90,'2'),(659,94,'1303','7',82,'2'),(660,94,'1304','7',76,'2'),(661,94,'1305','7',80,'2'),(662,94,'1306','7',74,'2'),(663,94,'1307','7',75,'2'),(664,94,'1308','7',79,'2'),(665,155,'1301','7',77,'2'),(666,155,'1302','7',80,'2'),(667,155,'1303','7',80,'2'),(668,155,'1304','7',75,'2'),(669,155,'1305','7',75,'2'),(670,155,'1306','7',90,'2'),(671,155,'1307','7',85,'2'),(672,155,'1308','7',85,'2'),(673,154,'1301','7',80,'2'),(674,154,'1302','7',72,'2'),(675,154,'1303','7',70,'2'),(676,154,'1304','7',68,'2'),(677,154,'1305','7',70,'2'),(678,154,'1306','7',70,'2'),(679,154,'1307','7',70,'2'),(680,154,'1308','7',71,'2'),(681,109,'1301','7',78,'2'),(682,109,'1302','7',76,'2'),(683,109,'1303','7',76,'2'),(684,109,'1304','7',74,'2'),(685,109,'1305','7',82,'2'),(686,109,'1306','7',80,'2'),(687,109,'1307','7',82,'2'),(688,109,'1308','7',80,'2'),(689,177,'1301','7',80,'2'),(690,177,'1302','7',90,'2'),(691,177,'1303','7',80,'2'),(692,177,'1304','7',75,'2'),(693,177,'1305','7',80,'2'),(694,177,'1306','7',75,'2'),(695,177,'1307','7',80,'2'),(696,177,'1308','7',85,'2'),(697,178,'1301','7',80,'2'),(698,178,'1302','7',76,'2'),(699,178,'1303','7',77,'2'),(700,178,'1304','7',79,'2'),(701,178,'1305','7',78,'2'),(702,178,'1306','7',77,'2'),(703,178,'1307','7',75,'2'),(704,178,'1308','7',82,'2'),(705,110,'1301','7',70,'2'),(706,110,'1302','7',80,'2'),(707,110,'1303','7',82,'2'),(708,110,'1304','7',66,'2'),(709,110,'1305','7',74,'2'),(710,110,'1306','7',74,'2'),(711,110,'1307','7',67,'2'),(712,110,'1308','7',79,'2'),(713,176,'1301','7',72,'2'),(714,176,'1302','7',78,'2'),(715,176,'1303','7',77,'2'),(716,176,'1304','7',71,'2'),(717,176,'1305','7',78,'2'),(718,176,'1306','7',73,'2'),(719,176,'1307','7',74,'2'),(720,176,'1308','7',73,'2'),(721,173,'1301','7',81,'2'),(722,173,'1302','7',76,'2'),(723,173,'1303','7',80,'2'),(724,173,'1304','7',80,'2'),(725,173,'1305','7',85,'2'),(726,173,'1306','7',82,'2'),(727,173,'1307','7',77,'2'),(728,173,'1308','7',75,'2'),(729,174,'1301','7',77,'2'),(730,174,'1302','7',74,'2'),(731,174,'1303','7',70,'2'),(732,174,'1304','7',68,'2'),(733,174,'1305','7',70,'2'),(734,174,'1306','7',70,'2'),(735,174,'1307','7',70,'2'),(736,174,'1308','7',74,'2'),(737,175,'1301','7',81,'2'),(738,175,'1302','7',74,'2'),(739,175,'1303','7',72,'2'),(740,175,'1304','7',68,'2'),(741,175,'1305','7',68,'2'),(742,175,'1306','7',70,'2'),(743,175,'1307','7',70,'2'),(744,175,'1308','7',75,'2'),(745,153,'1301','7',85,'2'),(746,153,'1302','7',85,'2'),(747,153,'1303','7',80,'2'),(748,153,'1304','7',75,'2'),(749,153,'1305','7',75,'2'),(750,153,'1306','7',75,'2'),(751,153,'1307','7',72,'2'),(752,153,'1308','7',80,'2'),(753,151,'1301','7',70,'2'),(754,151,'1302','7',70,'2'),(755,151,'1303','7',70,'2'),(756,151,'1304','7',75,'2'),(757,151,'1305','7',70,'2'),(758,151,'1306','7',75,'2'),(759,151,'1307','7',75,'2'),(760,151,'1308','7',72,'2'),(761,135,'1301','7',76,'2'),(762,135,'1302','7',85,'2'),(763,135,'1303','7',85,'2'),(764,135,'1304','7',80,'2'),(765,135,'1305','7',80,'2'),(766,135,'1306','7',80,'2'),(767,135,'1307','7',80,'2'),(768,135,'1308','7',80,'2'),(769,134,'1301','7',85,'2'),(770,134,'1302','7',85,'2'),(771,134,'1303','7',80,'2'),(772,134,'1304','7',70,'2'),(773,134,'1305','7',75,'2'),(774,134,'1306','7',72,'2'),(775,134,'1307','7',72,'2'),(776,134,'1308','7',80,'2'),(777,106,'1301','7',80,'2'),(778,106,'1302','7',80,'2'),(779,106,'1303','7',80,'2'),(780,106,'1304','7',75,'2'),(781,106,'1305','7',70,'2'),(782,106,'1306','7',70,'2'),(783,106,'1307','7',75,'2'),(784,106,'1308','7',75,'2'),(785,93,'1301','7',81,'2'),(786,93,'1302','7',85,'2'),(787,93,'1303','7',84,'2'),(788,93,'1304','7',76,'2'),(789,93,'1305','7',83,'2'),(790,93,'1306','7',84,'2'),(791,93,'1307','7',81,'2'),(792,93,'1308','7',80,'2'),(793,133,'1301','7',75,'2'),(794,133,'1302','7',72,'2'),(795,133,'1303','7',73,'2'),(796,133,'1304','7',73,'2'),(797,133,'1305','7',72,'2'),(798,133,'1306','7',80,'2'),(799,133,'1307','7',72,'2'),(800,133,'1308','7',75,'2'),(801,132,'1301','7',80,'2'),(802,132,'1302','7',77,'2'),(803,132,'1303','7',80,'2'),(804,132,'1304','7',79,'2'),(805,132,'1305','7',80,'2'),(806,132,'1306','7',80,'2'),(807,132,'1307','7',75,'2'),(808,132,'1308','7',80,'2'),(809,131,'1301','7',78,'2'),(810,131,'1302','7',75,'2'),(811,131,'1303','7',70,'2'),(812,131,'1304','7',68,'2'),(813,131,'1305','7',68,'2'),(814,131,'1306','7',70,'2'),(815,131,'1307','7',72,'2'),(816,131,'1308','7',74,'2'),(817,130,'1301','7',80,'2'),(818,130,'1302','7',75,'2'),(819,130,'1303','7',80,'2'),(820,130,'1304','7',75,'2'),(821,130,'1305','7',75,'2'),(822,130,'1306','7',75,'2'),(823,130,'1307','7',80,'2'),(824,130,'1308','7',80,'2'),(825,111,'1301','7',90,'2'),(826,111,'1302','7',82,'2'),(827,111,'1303','7',86,'2'),(828,111,'1304','7',80,'2'),(829,111,'1305','7',88,'2'),(830,111,'1306','7',88,'2'),(831,111,'1307','7',77,'2'),(832,111,'1308','7',81,'2'),(833,152,'1301','7',80,'2'),(834,152,'1302','7',79,'2'),(835,152,'1303','7',71,'2'),(836,152,'1304','7',76,'2'),(837,152,'1305','7',75,'2'),(838,152,'1306','7',80,'2'),(839,152,'1307','7',72,'2'),(840,152,'1308','7',80,'2'),(841,156,'1301','7',85,'2'),(842,156,'1302','7',80,'2'),(843,156,'1303','7',76,'2'),(844,156,'1304','7',74,'2'),(845,156,'1305','7',70,'2'),(846,156,'1306','7',72,'2'),(847,156,'1307','7',70,'2'),(848,156,'1308','7',73,'2'),(849,157,'1301','7',80,'2'),(850,157,'1302','7',83,'2'),(851,157,'1303','7',76,'2'),(852,157,'1304','7',74,'2'),(853,157,'1305','7',72,'2'),(854,157,'1306','7',70,'2'),(855,157,'1307','7',70,'2'),(856,157,'1308','7',75,'2'),(857,158,'1301','7',85,'2'),(858,158,'1302','7',90,'2'),(859,158,'1303','7',85,'2'),(860,158,'1304','7',80,'2'),(861,158,'1305','7',85,'2'),(862,158,'1306','7',90,'2'),(863,158,'1307','7',90,'2'),(864,158,'1308','7',85,'2'),(865,159,'1301','7',77,'2'),(866,159,'1302','7',85,'2'),(867,159,'1303','7',80,'2'),(868,159,'1304','7',80,'2'),(869,159,'1305','7',75,'2'),(870,159,'1306','7',75,'2'),(871,159,'1307','7',75,'2'),(872,159,'1308','7',80,'2'),(873,160,'1301','7',80,'2'),(874,160,'1302','7',78,'2'),(875,160,'1303','7',80,'2'),(876,160,'1304','7',76,'2'),(877,160,'1305','7',75,'2'),(878,160,'1306','7',80,'2'),(879,160,'1307','7',74,'2'),(880,160,'1308','7',80,'2'),(881,161,'1301','7',77,'2'),(882,161,'1302','7',75,'2'),(883,161,'1303','7',74,'2'),(884,161,'1304','7',75,'2'),(885,161,'1305','7',77,'2'),(886,161,'1306','7',79,'2'),(887,161,'1307','7',71,'2'),(888,161,'1308','7',83,'2'),(889,162,'1301','7',80,'2'),(890,162,'1302','7',75,'2'),(891,162,'1303','7',70,'2'),(892,162,'1304','7',68,'2'),(893,162,'1305','7',70,'2'),(894,162,'1306','7',70,'2'),(895,162,'1307','7',72,'2'),(896,162,'1308','7',75,'2'),(897,163,'1301','7',77,'2'),(898,163,'1302','7',73,'2'),(899,163,'1303','7',72,'2'),(900,163,'1304','7',73,'2'),(901,163,'1305','7',74,'2'),(902,163,'1306','7',75,'2'),(903,163,'1307','7',72,'2'),(904,163,'1308','7',80,'2'),(905,164,'1301','7',77,'2'),(906,164,'1302','7',72,'2'),(907,164,'1303','7',70,'2'),(908,164,'1304','7',70,'2'),(909,164,'1305','7',70,'2'),(910,164,'1306','7',72,'2'),(911,164,'1307','7',71,'2'),(912,164,'1308','7',80,'2'),(913,168,'1301','7',75,'2'),(914,168,'1302','7',90,'2'),(915,168,'1303','7',75,'2'),(916,168,'1304','7',85,'2'),(917,168,'1305','7',75,'2'),(918,168,'1306','7',80,'2'),(919,168,'1307','7',70,'2'),(920,168,'1308','7',75,'2'),(921,165,'1301','7',80,'2'),(922,165,'1302','7',76,'2'),(923,165,'1303','7',74,'2'),(924,165,'1304','7',70,'2'),(925,165,'1305','7',72,'2'),(926,165,'1306','7',70,'2'),(927,165,'1307','7',72,'2'),(928,165,'1308','7',75,'2'),(929,166,'1301','7',85,'2'),(930,166,'1302','7',75,'2'),(931,166,'1303','7',82,'2'),(932,166,'1304','7',78,'2'),(933,166,'1305','7',85,'2'),(934,166,'1306','7',80,'2'),(935,166,'1307','7',77,'2'),(936,166,'1308','7',83,'2'),(937,167,'1301','7',86,'2'),(938,167,'1302','7',90,'2'),(939,167,'1303','7',90,'2'),(940,167,'1304','7',80,'2'),(941,167,'1305','7',80,'2'),(942,167,'1306','7',85,'2'),(943,167,'1307','7',90,'2'),(944,167,'1308','7',85,'2'),(945,169,'1301','7',80,'2'),(946,169,'1302','7',90,'2'),(947,169,'1303','7',80,'2'),(948,169,'1304','7',85,'2'),(949,169,'1305','7',85,'2'),(950,169,'1306','7',80,'2'),(951,169,'1307','7',80,'2'),(952,169,'1308','7',80,'2'),(953,170,'1301','7',75,'2'),(954,170,'1302','7',75,'2'),(955,170,'1303','7',80,'2'),(956,170,'1304','7',70,'2'),(957,170,'1305','7',75,'2'),(958,170,'1306','7',75,'2'),(959,170,'1307','7',80,'2'),(960,170,'1308','7',80,'2'),(961,171,'1301','7',70,'2'),(962,171,'1302','7',75,'2'),(963,171,'1303','7',70,'2'),(964,171,'1304','7',70,'2'),(965,171,'1305','7',80,'2'),(966,171,'1306','7',80,'2'),(967,171,'1307','7',75,'2'),(968,171,'1308','7',75,'2'),(969,172,'1301','7',77,'2'),(970,172,'1302','7',75,'2'),(971,172,'1303','7',72,'2'),(972,172,'1304','7',70,'2'),(973,172,'1305','7',72,'2'),(974,172,'1306','7',72,'2'),(975,172,'1307','7',74,'2'),(976,172,'1308','7',75,'2'),(977,179,'1301','7',71,'2'),(978,179,'1302','7',81,'2'),(979,179,'1303','7',77,'2'),(980,179,'1304','7',74,'2'),(981,179,'1305','7',74,'2'),(982,179,'1306','7',75,'2'),(983,179,'1307','7',78,'2'),(984,179,'1308','7',74,'2');
/*!40000 ALTER TABLE `tb_nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ortu`
--

DROP TABLE IF EXISTS `tb_ortu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ortu` (
  `idortu` int(11) NOT NULL AUTO_INCREMENT,
  `idcalsis` int(11) NOT NULL,
  `nmwali` varchar(200) NOT NULL DEFAULT 'NULL',
  `nik` char(18) DEFAULT NULL,
  `tmplhr` varchar(200) DEFAULT NULL,
  `tgllhr` date DEFAULT NULL,
  `agama` char(1) DEFAULT NULL,
  `kdpdk` int(11) DEFAULT NULL,
  `kdkerja` char(1) DEFAULT NULL,
  `kdhasil` int(11) DEFAULT NULL,
  `hubkel` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `desa` varchar(200) DEFAULT NULL,
  `kec` varchar(200) DEFAULT NULL,
  `kab` varchar(200) DEFAULT NULL,
  `prov` varchar(200) DEFAULT NULL,
  `kdpos` char(5) DEFAULT NULL,
  `nohp` char(15) DEFAULT NULL,
  `tglinput` date DEFAULT NULL,
  PRIMARY KEY (`idortu`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ortu`
--

LOCK TABLES `tb_ortu` WRITE;
/*!40000 ALTER TABLE `tb_ortu` DISABLE KEYS */;
INSERT INTO `tb_ortu` VALUES (1,4,'Karno','1508065504750001','Sumedang','1970-04-05','A',3,'3',3,'1','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-01'),(2,1,'Dadang Kurniawan','1508062703870003','Kuamang Kuning','1987-03-27','A',4,'3',2,'1','Jalan Bukit Asam','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-01'),(3,2,'Oma. B','1508060809710001','Sumedang','1971-09-08','A',2,'3',3,'1','Jalan Bukit Asam','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-01'),(4,5,'Bukhori Muslim','1508061110760002','Sumedang','1976-10-11','A',7,'3',4,'1','Jalan Bukit Asam Rt.11/rw.04','Cilodang','Pelepat ','Bungo','Jambi','37252','082178681925','2020-07-10'),(5,3,'Ujang Sujimin','1508060606680001','Sumedang','1969-07-06','A',3,'4',3,'1','Jalan Bukit Apit','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-01'),(6,6,'Jeje Jaenudin','1508061111750001','Sumedang','1975-11-11','A',2,'3',2,'1','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-01'),(7,7,'Aceng E. Supardi','1508061006640002','Sumedang','1964-06-10','A',3,'4',3,'1','Jalan Bukit Telago','Cilodang','Pelepat','Bungo','Jambi','37252','085218578991','2020-07-04'),(8,11,'Yaya Zakaria','1508062707740001','Sumedang','1974-07-27','A',2,'4',3,'1','Jalan Bukit Tinggi','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-01'),(9,14,'Mujito','1508060705780001','Cilacap','1978-05-04','A',2,'3',3,'1','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','082380967357','2020-07-02'),(10,15,'Titis Sajarwo','1508062412690001','Sukoharjo','1969-12-24','A',4,'4',3,'1','Jalan Prasetia','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','083171266468','2020-07-02'),(11,17,'Awis Pamuji','1508091610860001','Kuning Gading','1986-10-16','A',4,'3',4,'1','Jalan Batu Raden','Air Batu','Tabir Ilir','Merangin','Jambi','37252','085381918032','2020-07-04'),(12,18,'Lilik dwi saputro','1502140501840001','Gunung Kidul','1984-01-05','A',5,'4',3,'1','Jalan Komplek Pasar Kuamang Kuning 11','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','2020-07-02'),(13,19,'Dwi Enggran Setiawan','1502140607860001','Air Batu','1986-07-06','A',3,'6',2,'1','Jalan Banyu Wangi','Air Batu','Tabir Ilir','Merangin','Jambi','37353','','2020-07-04'),(14,8,'Satim','1508091606780003','Bojo Negoro','1978-06-16','A',1,'2',3,'1','Jalan Bukit Tinggi','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(15,20,'Sukarya','1508061505710001','Sumedang','1971-05-15','A',3,'6',2,'1','Jalan Bukit Telago','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-04'),(16,13,'Cahya Suganda','1508060509770001','Sumedang','1977-09-05','A',4,'3',3,'1','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37352','','2020-07-04'),(17,12,'Rhohino','1508060307780001','Blitar','1978-07-03','A',3,'4',3,'1','Jalan Bukit Asam','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-02'),(18,10,'Dede Atim Juaria','1508062810810001','Sumedang','1981-10-29','A',3,'4',3,'1','Jalan Bukit Tinggi','Cilodang','Pelepat','Bungo','Jambi','37252','082183993656','2020-07-02'),(19,9,'Rado Sutarno','1508061104830001','Cilacap','1983-04-11','A',2,'3',3,'1','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-04'),(20,16,'Asy\'ari','1508060107800034','Lampung','1980-07-01','A',3,'3',3,'1','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-04'),(21,22,'Bambang Tri Suhartanto','1508061909750002','Kendal','1975-09-19','A',4,'4',3,'1','Jalan Bukit Telago','Cilodang','Pelepat','Bungo','Jambi','37252','085925999499','2020-07-04'),(22,23,'Slamet Purwanto','1508060101710001','Lahat','1971-01-01','A',3,'6',2,'1','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-04'),(23,24,'Untung Sijabat','1508061209670001','Medan','1967-09-12','B',2,'3',3,'1','Jalan Lintas Jaya','Dwi Karya Bhakti','Pelepat','Bungo','Jambi','37262','','2020-07-07'),(24,25,'Jeje','1508061011830002','Sumedang','1983-11-10','A',2,'4',2,'1','Jalan Bukit Telago','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-04'),(25,21,'Karno','1508060504700002','Sumedang','1970-04-05','A',2,'3',3,'1','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-04'),(26,57,'Amri','1508060101770001','Sampang','1977-01-01','A',2,'4',3,'1','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(27,26,'Suyud','','','0000-00-00','',0,'',0,'','Jalan  Kusuma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(28,27,'Budi Santoso','','','0000-00-00','',0,'',0,'','Jalan Aji Purna','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(29,28,'JASMAN TAMBUNAN','','','0000-00-00','',0,'',0,'','Jalan Ekatama','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(30,29,'MARSUDI','','','0000-00-00','',0,'',0,'','Jalan Ekatama','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(31,30,'Sahrul Sihombing','','','0000-00-00','',0,'',0,'','Jalan Kusuma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(32,31,'Beni Ria Supriatna','','','0000-00-00','',0,'',0,'','Jalan Kusuma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(33,32,'Kusdi','','','0000-00-00','',0,'',4,'1','Jalan Dharma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(34,33,'ISWANTO','','','0000-00-00','',0,'',0,'','Jalan Setia Bhakti','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(35,34,'Qodir','','','0000-00-00','',0,'4',4,'1','Jalan Wijaya Kusuma','','','','','','','2020-07-07'),(36,35,'Jennis Siallagan','','','0000-00-00','',0,'',0,'1','Jalan Dasa Purwa','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(37,36,'Wagimin','','','0000-00-00','',0,'',0,'1','Jalan Kusuma','Mulia Bhakti','Pelepat','Bungo','Jambi','','','2020-07-07'),(38,37,'Dedi Setiadi','','','0000-00-00','',0,'',0,'1','Jalan Kusuma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(39,39,'PAIRIN ATMOJO','','','0000-00-00','',0,'',0,'1','Jalan Setia Bhakti','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(40,38,'KANEDI SIHOMBING','','','0000-00-00','',0,'',0,'1','Jalan Aji Purna','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(41,40,'JUNET ATMOKO','','','0000-00-00','',0,'',0,'1','Jalan Ekatama','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(42,41,'EDI SUSANTO','','','0000-00-00','',0,'',0,'1','Jalan Kencana','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(43,42,'MISNAN','','','0000-00-00','',0,'',0,'1','Jalan Ekatama','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(44,43,'WAWAN CAHYADI','','','0000-00-00','',0,'',0,'1','Jalan Makarti','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(45,44,'Kuwat','','','0000-00-00','',0,'',0,'1','Jalan Kencana','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(46,45,'CAHYO ROHENDRANA','','','0000-00-00','',0,'',0,'1','Jalan Cipta Sari','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(47,46,'Eri Supriyadi','','','0000-00-00','',0,'',0,'1','Jalan Setia Bhakti`','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(48,47,'Jony W','','','0000-00-00','B',0,'',0,'1','Jalan Perum Pt Sal','Cilodang','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(49,48,'Erwan Sukmawan','','','0000-00-00','',0,'',0,'1','Jalan Dasa Purwa','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(50,49,'DEDE RIZA','','','0000-00-00','',0,'',0,'1','Jalan Ciptasari','Mulia Bhakti','Pelepat','Bungo','Jambi','','','2020-07-07'),(51,50,'HARYON','','','0000-00-00','',0,'',0,'1','Jalan Kencana','Mulia Bhakti','Pelepat','Bungo','Jambi','','','2020-07-07'),(52,51,'SARMAN','','','0000-00-00','',0,'',0,'1','Jalan Ajipurna','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(53,52,'Dariman','','','0000-00-00','',0,'',0,'1','Jalan Dasa Purwa','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(54,53,'Narto','','','0000-00-00','',0,'',0,'1','Jalan Ekatama','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(55,54,'Wahyudi','','','0000-00-00','',0,'',0,'1','Jalan Kusuma','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(56,55,'SUDILAR','','','0000-00-00','',0,'',0,'1','Jalan Ekatama','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(57,56,'Ahmad Zakaria','','','0000-00-00','',0,'',0,'1','Jalan Prasetia','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','','2020-07-07'),(58,58,'Rudiyanto','150802709860003','Purwasari','1986-09-27','A',2,'3',3,'1','Jalan Pelepat','Purwosari','Pelepat Ilir','Bungo','Jambi','37252','','2021-06-28'),(59,59,'Azra\'i','1508063112690002','Tanjung Agung','1969-12-31','A',4,'1',4,'1','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','','2021-06-28'),(60,60,'Roni Elfana','1508060804770001','Sumedang','1977-04-08','A',2,'3',4,'1','Jalan Bukit Asam','Cilodang','Pelepat','Bungo','Jambi','37252','','2021-06-28'),(61,61,'Bambang Subagio','1508060204640001','Bandar Jaya','1964-04-02','A',2,'4',5,'1','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','','2021-06-28'),(62,62,'Wawan Darmawan','1508062105820001','Sumedang','1982-05-21','A',2,'4',2,'1','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','','2021-06-28'),(67,171,'Iswanto','','',NULL,'A',2,'6',3,'1','','','','','','','',NULL),(68,92,'Satiran','1508060809840001','Cilacap','1984-09-08','A',3,'4',2,'1','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','',NULL),(69,176,'Purwanto','150800402830001','Cilacap',NULL,'A',4,'2',3,'1','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','',NULL),(70,89,'Yosep AM.','','',NULL,'A',4,'3',3,'1','','Cilodang','Pelepat','Bungo','Jambi','37252','+628218058169',NULL),(72,94,'Muhyidin','1508061802680001','Sukoharjo','1968-02-19','A',4,'4',4,'1','Jalan Selasih','Gapura Suci','Pelepat','Bungo','Jambi','37252','',NULL),(73,88,'Wahyu Hidayat','1508061001820002','Jakarta',NULL,'A',3,'4',3,'1','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','',NULL),(74,87,'Agun Hermawan','1508061705810001','Sumedang',NULL,'A',3,'3',2,'1','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','',NULL),(75,85,'Saimun','1508062006750002','Cilacap','1975-06-20','A',2,'4',2,'1','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','',NULL),(76,84,'Sumarno','1508061907700001','Cilacap','1970-07-19','A',3,'5',2,'1','Jalan Bukit Kemuning','Cilodang','Pelepat','Bungo','Jambi','37252','',NULL),(77,109,'Sulimin','1502142203750001','Jawa Tengah','1975-03-22','A',3,'4',4,'1','Jalan Batu Riti','Air Batu','Tabir Ilir','Merangin','Jambi','37353','',NULL),(78,108,'Imam Safi\'i','1502','Kediri','1986-02-20','A',3,'4',3,'1','Jalan Batu Sangkar','Air Batu','Tabir Ilir','Merangin','Jambi','37353','',NULL),(79,107,'Hartanto','1502140804830001','Wonosobo','1983-04-08','A',3,'4',3,'1','','Air Batu','Tabir Ilir','Bungo','Jambi','37353','',NULL),(80,106,'Agus Setiawan','1502141008820001','Sragen','1982-08-10','A',3,'6',2,'1','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','',NULL),(81,105,'Sudaryanto','1502141303820001','Gunung Kidul','1982-03-13','A',4,'3',4,'1','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','',NULL),(82,104,'Olas','1502141204830002','Bandung','1983-04-12','A',3,'4',3,'1','','Air Batu','Pelepat','Merangin','Jambi','37353','',NULL),(83,103,'Supriaji','1502141511800001','Jombang','1980-11-15','A',3,'3',3,'1','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','',NULL),(84,102,'Miswanto','1502141212800001','Wonosobo','1980-12-12','A',4,'4',3,'1','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','',NULL),(85,101,'Sujito','1502140209830001','Kediri','1983-09-02','A',4,'7',3,'1','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','',NULL),(86,100,'Ari Subowo','1502142910840002','Jombang','1984-10-29','A',3,'4',3,'1','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','',NULL),(87,99,'Karimun','1502141010710001','Magetan','1971-10-10','A',2,'4',3,'1','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','',NULL),(88,111,'Handoyo','1502141506790001','Magetan','1979-06-15','A',8,'3',3,'1','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','',NULL),(89,98,'Sumadi','1502140101660003','Blitar','1966-01-01','A',3,'4',2,'1','','Air Batu','Tabir Ilir','Merangin','Jambi','37353','',NULL),(90,93,'Uda','1508060404640001','Sumedang','1964-04-04','A',2,'4',3,'1','Jalan Bukit Asam','Cilodang','Pelepat','Bungo','Jambi','37252','',NULL),(91,91,'Kandar Wahyudi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(92,110,'Puguh Guntoro','1508060902790001','Sragen','1979-02-09','A',NULL,'3',3,'1','Jalan Kulim','Mulya Jaya','Pelepat','Bungo','Jambi','37252','',NULL),(93,172,'Muh. Alip',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(94,170,'Setia Budi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(95,169,'Nanang',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(96,167,'Sapari',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(97,166,'Dudun',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(98,165,'Supriyono',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(99,168,'Hartanto',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(100,164,'Jujun Junaedi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(101,163,'Samidi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(102,162,'Sugianto',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(103,160,'Kukuh Jamu Prasetyo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(104,157,'Warasono',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(105,159,'A. Herman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(106,158,'Budiman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(107,156,'Nur Ahmad Wito',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(108,152,'Sutaryo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(109,86,'Patoni',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(110,90,'Teteng Slamet',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(111,177,'Erwano',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(112,154,'Eko Prasetyo Utomo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(113,155,'Aria',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(114,130,'Santoso',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(115,131,'Poniran',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(116,132,'Asep Witarja',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(117,133,'Adi Candra',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(118,134,'Ismullah Hasan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(119,135,'Sugiyanto',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(120,151,'Samsir',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(121,153,'Karmo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(122,175,'Sumariono',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(123,174,'Tupon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(124,173,'Suwandi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(125,178,'Eko Waluyo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(126,161,'Zaenal Arifin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(127,179,'Karli','1508060703700001','Sumedang','1970-03-07','A',NULL,'4',4,'1','Jalan Bukit Luncuk','Cilodang','Pelepat','Bungo','Jambi','37252','',NULL);
/*!40000 ALTER TABLE `tb_ortu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pendidikan`
--

DROP TABLE IF EXISTS `tb_pendidikan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pendidikan` (
  `kdpdk` int(11) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(200) NOT NULL,
  PRIMARY KEY (`kdpdk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pendidikan`
--

LOCK TABLES `tb_pendidikan` WRITE;
/*!40000 ALTER TABLE `tb_pendidikan` DISABLE KEYS */;
INSERT INTO `tb_pendidikan` VALUES (1,'Tidak Sekolah'),(2,'Tamat SD/Sederajat'),(3,'Tamat SMP/Sederajat'),(4,'Tamat SMA/Sederajat'),(5,'Diploma 1'),(6,'Diploma 2'),(7,'Diploma 3'),(8,'Sarjana (S 1) / Diploma 4'),(9,'Pasca Sarjana (S 2)'),(10,'Doktoral (S 3)');
/*!40000 ALTER TABLE `tb_pendidikan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pslhkm`
--

DROP TABLE IF EXISTS `tb_pslhkm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pslhkm` (
  `idpsl` int(11) NOT NULL AUTO_INCREMENT,
  `idhkm` int(11) NOT NULL,
  `nmpasal` varchar(255) CHARACTER SET latin1 NOT NULL,
  `isipasal` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idpsl`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pslhkm`
--

LOCK TABLES `tb_pslhkm` WRITE;
/*!40000 ALTER TABLE `tb_pslhkm` DISABLE KEYS */;
INSERT INTO `tb_pslhkm` VALUES (1,1,'Pasal 6','persyaratan calon peserta didik baru kelas 7 (tujuh) SMP'),(2,2,'Pasal 5','Calon peserta didik baru kelas 7 (tujuh) SMP harus memenuhi persyaratan:');
/*!40000 ALTER TABLE `tb_pslhkm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_seleksi`
--

DROP TABLE IF EXISTS `tb_seleksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_seleksi` (
  `urut` int(11) NOT NULL AUTO_INCREMENT,
  `kdthpel` char(5) NOT NULL,
  `tmpseleksi` varchar(250) NOT NULL,
  `tglseleksi` date NOT NULL,
  `nmlegalisasi` varchar(250) NOT NULL,
  `niplegalisasi` char(18) NOT NULL,
  `jbtlegalisasi` varchar(250) NOT NULL,
  PRIMARY KEY (`urut`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_seleksi`
--

LOCK TABLES `tb_seleksi` WRITE;
/*!40000 ALTER TABLE `tb_seleksi` DISABLE KEYS */;
INSERT INTO `tb_seleksi` VALUES (2,'20201','Muara Bungo','2020-07-11','Masril, S.Sos, M.E','196411171986031007','Kepala Dinas Pendidikan Dan Kebudayaan');
/*!40000 ALTER TABLE `tb_seleksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_skul`
--

DROP TABLE IF EXISTS `tb_skul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_skul` (
  `kdskul` char(20) NOT NULL,
  `nmskul` varchar(50) DEFAULT NULL,
  `kdjenjang` char(3) DEFAULT NULL,
  `npsn` char(10) DEFAULT NULL,
  `nss` char(12) DEFAULT NULL,
  `skpd` varchar(250) NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `desa` varchar(250) NOT NULL,
  `kec` varchar(250) NOT NULL,
  `kab` varchar(250) NOT NULL,
  `prov` varchar(250) NOT NULL,
  `kdpos` char(5) NOT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `web` varchar(100) DEFAULT NULL,
  `logo` varchar(250) NOT NULL,
  `logoskpd` varchar(250) NOT NULL,
  PRIMARY KEY (`kdskul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_skul`
--

LOCK TABLES `tb_skul` WRITE;
/*!40000 ALTER TABLE `tb_skul` DISABLE KEYS */;
INSERT INTO `tb_skul` VALUES ('P10040036','SMP Negeri 5 Pelepat','SMP','10500708','201100201036','Dinas Pendidikan dan Kebudayaan','Jalan Dasa Purwa','Mulia Bhakti','Pelepat','Bungo','Jambi','37252','-','info@smpnlipat.sch.id','https://www.smpnlipat.sch.id','logo.png','bungo.png');
/*!40000 ALTER TABLE `tb_skul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_skul_asal`
--

DROP TABLE IF EXISTS `tb_skul_asal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_skul_asal` (
  `idskulasal` char(10) NOT NULL,
  `nmskulasal` varchar(200) DEFAULT NULL,
  `almtskulasal` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idskulasal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_skul_asal`
--

LOCK TABLES `tb_skul_asal` WRITE;
/*!40000 ALTER TABLE `tb_skul_asal` DISABLE KEYS */;
INSERT INTO `tb_skul_asal` VALUES ('10500590','SD Negeri 164/II Gapura Suci','Jalan Nusa Indah, Desa Gapura Suci, Kecamatan Pelepat, Kabupaten Bungo, Provinsi Jambi'),('10500761','SD Negeri 177/II Lintas Jaya','Jalan Pendidikan, Lintas Jaya, Kecamatan Pelepat, Kabupaten Bungo, Provinsi Jambi'),('10500762','SD Negeri 178/II Purwasari','Jalan Musi, Desa Purwasari, Kecamatan Pelepat Ilir, Kabupaten Bungo, Provinsi Jambi'),('10500764','SD Negeri 180/II Mulia Bhakti','Jalan Bhakti Husada, Desa Mulia Bhakti, Kecamatan Pelepat, Kabupaten Bungo Provinsi Jambi'),('10500765','SD Negeri 181/II Cilodang','Jalan Bukit Telago, Desa Cilodang, Desa Cilodang, Kecamatan Pelepat, Kabupaten Bungo, Provinsi Jambi'),('10500766','SD Negeri 182/II Mulya Jaya','Jalan Damar, Desa Mulya Jaya, Kecamatan Pelepat, Kabupaten Bungo, Provinsi Jambi'),('10501303','SD Negeri 257/VI Air Batu I','Jalan Banyu Dono, Desa Air Batu, Kecamatan Tabir Ilir, Kabupaten Merangin, Provinsi Jambi'),('10501304','SD Negeri 276/VI Air Batu II','Jalan Batu Jajar, Desa Air Batu, Kecamatan Tabir Ilir, Kabupaten Merangin, Provinsi Jambi'),('20528459','SD Negeri Gunung Rancak 3','Desa Gunung Rancak, Kecamatan Robatal, Kabupaten Sampang, Provinsi Jawa Timur'),('60704660','MIS Nurul Huda','Jalan Nusa Indah, Desa Gapura Suci, Kecamatan Pelepat, Kabupaten Bungo, Provinsi Jambi');
/*!40000 ALTER TABLE `tb_skul_asal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_syarat`
--

DROP TABLE IF EXISTS `tb_syarat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_syarat` (
  `kdsyarat` char(12) NOT NULL DEFAULT 'NULL',
  `kdthpel` char(5) DEFAULT NULL,
  `nmsyarat` varchar(250) DEFAULT NULL,
  `aktif` enum('0','1') DEFAULT NULL,
  `tampil` varchar(50) DEFAULT NULL,
  `aksyarat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kdsyarat`),
  KEY `kdthpel` (`kdthpel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_syarat`
--

LOCK TABLES `tb_syarat` WRITE;
/*!40000 ALTER TABLE `tb_syarat` DISABLE KEYS */;
INSERT INTO `tb_syarat` VALUES ('S20201001','20201','Mengisi formulir secara lengkap, mulai dari data pribadi, orangtua, dan nilai.','1','Formulir','Form'),('S20201002','20201','Mengunggah pas foto berwarna berekstensi *.jpg, berseragam sekolah asal, background merah ukuran file maksimum 250 KB ','1','Pas Foto 3 x 4 cm','Foto'),('S20201003','20201','Mengunggah scan Akte Kelahiran  berekstensi *.pdf dengan ukuran maksimum 500 KB','1','Salinan Akte Kelahiran','Akte'),('S20201004','20201','Mengunggah scan Kartu Keluarga berekstensi *.pdf dengan ukuran file maksimum 1 MB','1','Salinan Kartu Keluarga','KK'),('S20201005','20201','Mengunggah scan Ijazah, atau Surat Keterangan Lulus atau Surat Keterangan Hasil Ujian Sekolah berekstensi *.pdf dengan ukuran file maksimum 250 KB','1','Ijazah/SKHU','SKHU'),('S20211001','20211','Mengisi formulir secara lengkap, mulai dari data pribadi, orangtua, dan nilai.','1','Formulir','Form'),('S20211002','20211','Mengunggah pas foto berwarna berekstensi *.jpg, berseragam sekolah asal, background merah ukuran file maksimum 250 KB ','1','Pas Foto 3 x 4 cm','Foto'),('S20211003','20211','Mengunggah scan Kartu Keluarga berekstensi *.pdf dengan ukuran file maksimum 1 MB','1','Salinan Kartu Keluarga','KK'),('S20211004','20211','Mengunggah scan Akte Kelahiran  berekstensi *.pdf dengan ukuran maksimum 500 KB','1','Salinan Akte Kelahiran','Akte'),('S20211005','20211','Mengunggah scan Ijazah, atau Surat Keterangan Lulus atau Surat Keterangan Hasil Ujian Sekolah berekstensi *.pdf dengan ukuran file maksimum 250 KB','1','Ijazah/SKHU','SKHU');
/*!40000 ALTER TABLE `tb_syarat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_thpel`
--

DROP TABLE IF EXISTS `tb_thpel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_thpel` (
  `kdthpel` char(5) NOT NULL,
  `nmthpel` varchar(50) DEFAULT NULL,
  `aktif` char(1) DEFAULT NULL,
  `awal` date NOT NULL,
  PRIMARY KEY (`kdthpel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_thpel`
--

LOCK TABLES `tb_thpel` WRITE;
/*!40000 ALTER TABLE `tb_thpel` DISABLE KEYS */;
INSERT INTO `tb_thpel` VALUES ('20192','2019/2020-Genap','N','2020-01-01'),('20201','2020/2021-Ganjil','N','2020-07-01'),('20202','2020/2021-Genap','N','2021-01-01'),('20211','2021/2022-Ganjil','Y','2021-07-01');
/*!40000 ALTER TABLE `tb_thpel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `jbtdinas` enum('1','2','3','4','5') DEFAULT NULL,
  `passwd` varchar(250) DEFAULT NULL,
  `level` enum('0','1') DEFAULT NULL,
  `aktif` enum('0','1') DEFAULT NULL,
  `jbtpanitia` enum('1','2','3','4','5','6') NOT NULL,
  `nip` varchar(18) NOT NULL,
  `tmplahir` varchar(250) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `alamat` varchar(250) NOT NULL,
  `desa` varchar(250) NOT NULL,
  `logakhir` datetime NOT NULL,
  `kec` varchar(250) NOT NULL,
  `kab` varchar(250) NOT NULL,
  `prov` varchar(250) NOT NULL,
  `kdpos` char(5) NOT NULL,
  `email` varchar(250) NOT NULL,
  `nohp` char(15) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `agama` enum('A','B','C','D','E','F') DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `tglupdate` date DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (1,'10500708001','Nuryadi Muslimin','4','2613f0b5dacc76cceab62bdb41b5c3b8c43a4bff','0','1','6','Non PNS','Mulia Bhakti','1997-04-01','Jalan Bhakti Husada','Mulia Bhakti','2020-07-06 09:27:40','Pelepat','Bungo','Jambi','37252','','082176468934','','A','L','2020-06-21'),(2,'10500708002','Aris Qiani Khorina, S.Psi.','3','c2405e51b3dbb9982ea5cb20e5d795717e827e16','0','1','6','Non PNS','Muara Bungo','1996-04-01','Jalan Kusuma','Mulia Bhakti','0000-00-00 00:00:00','','','','','','085379819608','','A','P','2020-06-22'),(3,'197407302007011003','Muhamad, S.Pt','1','ec6948a79d6838edc2868490f81e386db7d51aa5','0','1','1','197407302007011003',NULL,'1974-07-30','Jalan Ekatama','Mulia Bhakti','0000-00-00 00:00:00','Pelepat','Bungo','Jambi','37252','','085213993835','',NULL,NULL,NULL),(4,'197708302014071001','Ali Mudhofir, S.Ag','2','644709326ede6cc1a88dd567e1ab52972b152243','0','1','2','197708302014071001','Banyuwangi','1977-08-30','Jalan Batanghari','Purwasari','0000-00-00 00:00:00','Pelepat Ilir','Bungo','Jambi','37252','','081268277301','fc2aa708adc46c5ed3a2e6a24566f83b2df40806.jpg','A','L','2021-07-02'),(5,'198412312014071001','Triyadi Susanto, S.Pd.','3','ed5f57e638b7e1d18581d0818508f5cee873726b','0','1','4','198412312014071001',NULL,'1984-12-31','Jalan Singasari','Lembah Kuamang','0000-00-00 00:00:00','','','','','','081366744304','',NULL,NULL,NULL),(6,'Admin','Kasworo Wardani','5','$2y$10$Xg3Tbdd.AZWMVYTgMUFX/ezGUZfKBTBl9FFjaVMjktWWVPh7EzXgO','1','1','5','Non PNS','Purwasari','1984-06-02','Jalan Setia Bhakti','Mulia Bhakti','2021-06-29 11:51:00','Pelepat','Bungo','Jambi','37252','kasworo.st@gmail.com','081369340047','4e7afebcfbae000b22c7c85e5560f89a2a0280b4.jpg','A','L','2020-06-23');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_berkas`
--

DROP TABLE IF EXISTS `v_berkas`;
/*!50001 DROP VIEW IF EXISTS `v_berkas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_berkas` (
  `tampil` tinyint NOT NULL,
  `ada` tinyint NOT NULL,
  `fileberkas` tinyint NOT NULL,
  `idcalsis` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_calsis`
--

DROP TABLE IF EXISTS `v_calsis`;
/*!50001 DROP VIEW IF EXISTS `v_calsis`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_calsis` (
  `idcalsis` tinyint NOT NULL,
  `idskulasal` tinyint NOT NULL,
  `nopend` tinyint NOT NULL,
  `kdskul` tinyint NOT NULL,
  `kdthpel` tinyint NOT NULL,
  `nama` tinyint NOT NULL,
  `nik` tinyint NOT NULL,
  `nisn` tinyint NOT NULL,
  `tmplhr` tinyint NOT NULL,
  `tgllhr` tinyint NOT NULL,
  `agama` tinyint NOT NULL,
  `gender` tinyint NOT NULL,
  `alamat` tinyint NOT NULL,
  `desa` tinyint NOT NULL,
  `kec` tinyint NOT NULL,
  `kab` tinyint NOT NULL,
  `prov` tinyint NOT NULL,
  `kdpos` tinyint NOT NULL,
  `nohp` tinyint NOT NULL,
  `deleted` tinyint NOT NULL,
  `tglinput` tinyint NOT NULL,
  `logakhir` tinyint NOT NULL,
  `foto` tinyint NOT NULL,
  `pwd` tinyint NOT NULL,
  `nmwali` tinyint NOT NULL,
  `kdkerja` tinyint NOT NULL,
  `kabeh` tinyint NOT NULL,
  `asl` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_dasarhukum`
--

DROP TABLE IF EXISTS `v_dasarhukum`;
/*!50001 DROP VIEW IF EXISTS `v_dasarhukum`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_dasarhukum` (
  `nmhkm` tinyint NOT NULL,
  `idpsl` tinyint NOT NULL,
  `idhkm` tinyint NOT NULL,
  `nmpasal` tinyint NOT NULL,
  `isipasal` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_jadwal`
--

DROP TABLE IF EXISTS `v_jadwal`;
/*!50001 DROP VIEW IF EXISTS `v_jadwal`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_jadwal` (
  `kdjadwal` tinyint NOT NULL,
  `kdthpel` tinyint NOT NULL,
  `awal` tinyint NOT NULL,
  `akhir` tinyint NOT NULL,
  `kegiatan` tinyint NOT NULL,
  `main` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_pagu`
--

DROP TABLE IF EXISTS `v_pagu`;
/*!50001 DROP VIEW IF EXISTS `v_pagu`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_pagu` (
  `id_tampung` tinyint NOT NULL,
  `kdthpel` tinyint NOT NULL,
  `kdskul` tinyint NOT NULL,
  `jrombel` tinyint NOT NULL,
  `jsiswa` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_syarat`
--

DROP TABLE IF EXISTS `v_syarat`;
/*!50001 DROP VIEW IF EXISTS `v_syarat`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_syarat` (
  `kdsyarat` tinyint NOT NULL,
  `kdthpel` tinyint NOT NULL,
  `nmsyarat` tinyint NOT NULL,
  `aktif` tinyint NOT NULL,
  `tampil` tinyint NOT NULL,
  `aksyarat` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_berkas`
--

/*!50001 DROP TABLE IF EXISTS `v_berkas`*/;
/*!50001 DROP VIEW IF EXISTS `v_berkas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=TEMPTABLE */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_berkas` AS select `sy`.`tampil` AS `tampil`,`cl`.`ada` AS `ada`,`cl`.`fileberkas` AS `fileberkas`,`cl`.`idcalsis` AS `idcalsis` from ((`tb_syarat` `sy` left join `tb_ceklis` `cl` on(`cl`.`kdsyarat` = `sy`.`kdsyarat`)) join `tb_thpel` `tp` on(`sy`.`kdthpel` = `tp`.`kdthpel`)) where `tp`.`aktif` = 'Y' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_calsis`
--

/*!50001 DROP TABLE IF EXISTS `v_calsis`*/;
/*!50001 DROP VIEW IF EXISTS `v_calsis`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=TEMPTABLE */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_calsis` AS select `cs`.`idcalsis` AS `idcalsis`,`cs`.`idskulasal` AS `idskulasal`,`cs`.`nopend` AS `nopend`,`cs`.`kdskul` AS `kdskul`,`cs`.`kdthpel` AS `kdthpel`,`cs`.`nama` AS `nama`,`cs`.`nik` AS `nik`,`cs`.`nisn` AS `nisn`,`cs`.`tmplhr` AS `tmplhr`,`cs`.`tgllhr` AS `tgllhr`,`cs`.`agama` AS `agama`,`cs`.`gender` AS `gender`,`cs`.`alamat` AS `alamat`,`cs`.`desa` AS `desa`,`cs`.`kec` AS `kec`,`cs`.`kab` AS `kab`,`cs`.`prov` AS `prov`,`cs`.`kdpos` AS `kdpos`,`cs`.`nohp` AS `nohp`,`cs`.`deleted` AS `deleted`,`cs`.`tglinput` AS `tglinput`,`cs`.`logakhir` AS `logakhir`,`cs`.`foto` AS `foto`,`cs`.`pwd` AS `pwd`,`ws`.`nmwali` AS `nmwali`,`ws`.`kdkerja` AS `kdkerja`,sum(`ns`.`nilai`) AS `kabeh`,`sa`.`nmskulasal` AS `asl` from ((((`tb_calsis` `cs` left join `tb_ortu` `ws` on(`ws`.`idcalsis` = `cs`.`idcalsis`)) left join `tb_nilai` `ns` on(`cs`.`idcalsis` = `ns`.`idcalsis`)) left join `tb_skul_asal` `sa` on(`cs`.`idskulasal` = `sa`.`idskulasal`)) join `tb_thpel` `tp` on(`tp`.`kdthpel` = `cs`.`kdthpel`)) where `tp`.`aktif` = 'Y' group by `cs`.`idcalsis` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_dasarhukum`
--

/*!50001 DROP TABLE IF EXISTS `v_dasarhukum`*/;
/*!50001 DROP VIEW IF EXISTS `v_dasarhukum`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=TEMPTABLE */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_dasarhukum` AS select `dh`.`nmhkm` AS `nmhkm`,`ps`.`idpsl` AS `idpsl`,`ps`.`idhkm` AS `idhkm`,`ps`.`nmpasal` AS `nmpasal`,`ps`.`isipasal` AS `isipasal` from ((`tb_dsrhkm` `dh` join `tb_pslhkm` `ps` on(`dh`.`idhkm` = `ps`.`idhkm`)) join `tb_thpel` `tp` on(`tp`.`kdthpel` = `dh`.`kdthpel`)) where `tp`.`aktif` = 'Y' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_jadwal`
--

/*!50001 DROP TABLE IF EXISTS `v_jadwal`*/;
/*!50001 DROP VIEW IF EXISTS `v_jadwal`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=TEMPTABLE */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_jadwal` AS select `j`.`kdjadwal` AS `kdjadwal`,`j`.`kdthpel` AS `kdthpel`,`j`.`awal` AS `awal`,`j`.`akhir` AS `akhir`,`j`.`kegiatan` AS `kegiatan`,`j`.`main` AS `main` from (`tb_jadwal` `j` join `tb_thpel` `t` on(`t`.`kdthpel` = `j`.`kdthpel`)) where `t`.`aktif` = 'Y' order by `j`.`awal` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_pagu`
--

/*!50001 DROP TABLE IF EXISTS `v_pagu`*/;
/*!50001 DROP VIEW IF EXISTS `v_pagu`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=TEMPTABLE */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_pagu` AS select `dt`.`id_tampung` AS `id_tampung`,`dt`.`kdthpel` AS `kdthpel`,`dt`.`kdskul` AS `kdskul`,`dt`.`jrombel` AS `jrombel`,`dt`.`jsiswa` AS `jsiswa` from (`tb_dayatampung` `dt` join `tb_thpel` `tp` on(`dt`.`kdthpel` = `tp`.`kdthpel`)) where `tp`.`aktif` = 'Y' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_syarat`
--

/*!50001 DROP TABLE IF EXISTS `v_syarat`*/;
/*!50001 DROP VIEW IF EXISTS `v_syarat`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=TEMPTABLE */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_syarat` AS select `sy`.`kdsyarat` AS `kdsyarat`,`sy`.`kdthpel` AS `kdthpel`,`sy`.`nmsyarat` AS `nmsyarat`,`sy`.`aktif` AS `aktif`,`sy`.`tampil` AS `tampil`,`sy`.`aksyarat` AS `aksyarat` from (`tb_syarat` `sy` join `tb_thpel` `tp` on(`sy`.`kdthpel` = `tp`.`kdthpel`)) where `tp`.`aktif` = 'Y' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-08  7:16:05
