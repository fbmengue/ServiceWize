-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: appmanagement
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `appointmentID` bigint(20) NOT NULL AUTO_INCREMENT,
  `client_clientID` bigint(20) NOT NULL,
  `professional_professionalID` bigint(20) NOT NULL,
  `service_serviceID` bigint(20) NOT NULL,
  `appointmentDate` date NOT NULL,
  `appointmentStartTime` time NOT NULL,
  `appointmentCanceled` tinyint(1) NOT NULL,
  `appointmentEndTime` time NOT NULL,
  `appointmentDuration` time NOT NULL,
  `appointmentPrice` decimal(10,2) NOT NULL,
  PRIMARY KEY (`appointmentID`,`client_clientID`,`professional_professionalID`,`service_serviceID`),
  KEY `fk_appointment_client1_idx` (`client_clientID`),
  KEY `fk_appointment_professional1_idx` (`professional_professionalID`),
  KEY `fk_appointment_service1_idx` (`service_serviceID`),
  CONSTRAINT `fk_appointment_client1` FOREIGN KEY (`client_clientID`) REFERENCES `client` (`clientID`),
  CONSTRAINT `fk_appointment_professional1` FOREIGN KEY (`professional_professionalID`) REFERENCES `professional` (`professionalID`),
  CONSTRAINT `fk_appointment_service1` FOREIGN KEY (`service_serviceID`) REFERENCES `service` (`serviceID`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (15,51,36,7,'2022-10-06','09:00:00',1,'10:30:00','01:30:00',22.00),(17,51,36,9,'2022-10-07','13:00:00',1,'15:30:00','02:30:00',25.00),(18,1,37,8,'2022-10-06','10:00:00',0,'11:45:00','01:45:00',37.00),(19,53,36,7,'2022-10-12','16:00:00',1,'17:30:00','01:30:00',22.00),(20,52,36,9,'2022-10-05','16:00:00',1,'18:30:00','02:30:00',25.00),(21,51,36,9,'2022-10-14','09:00:00',1,'09:00:00','02:30:00',25.00),(22,51,37,8,'2022-10-13','10:00:00',0,'10:00:00','01:45:00',37.00),(23,51,37,8,'2022-10-12','13:00:00',0,'14:45:00','01:45:00',37.00),(24,51,36,7,'2022-10-13','11:00:00',1,'12:30:00','01:30:00',22.00),(25,51,36,9,'2022-10-16','09:00:00',1,'11:30:00','02:30:00',25.00),(26,51,37,8,'2022-10-17','11:00:00',1,'12:45:00','01:45:00',37.00),(27,51,36,9,'2022-10-19','16:00:00',1,'18:30:00','02:30:00',25.00),(28,51,36,7,'2022-10-18','09:00:00',1,'10:30:00','01:30:00',22.00),(29,51,37,8,'2022-10-20','16:00:00',0,'17:45:00','01:45:00',37.00),(30,54,36,9,'2022-10-20','09:00:00',1,'11:30:00','02:30:00',25.00),(31,51,36,9,'2022-11-05','09:00:00',1,'11:30:00','02:30:00',25.00),(32,51,36,9,'2022-11-17','09:00:00',1,'11:30:00','02:30:00',25.00),(33,51,36,9,'2022-11-17','11:00:00',1,'13:30:00','02:30:00',25.00),(34,51,36,7,'2022-10-25','09:00:00',1,'10:30:00','01:30:00',22.00),(35,51,36,9,'2022-10-25','11:00:00',1,'13:30:00','02:30:00',25.00),(36,51,36,9,'2022-10-25','14:30:00',1,'17:00:00','02:30:00',25.00),(37,51,36,9,'2022-10-26','09:30:00',1,'12:00:00','02:30:00',25.00),(38,51,36,9,'2022-10-26','13:00:00',1,'15:30:00','02:30:00',25.00),(39,51,36,9,'2022-10-27','09:00:00',1,'11:30:00','02:30:00',25.00),(40,51,37,8,'2022-10-24','09:00:00',1,'10:45:00','01:45:00',37.00),(41,51,37,8,'2022-10-24','13:30:00',1,'15:15:00','01:45:00',37.00),(42,51,36,9,'2022-10-24','09:00:00',1,'11:30:00','02:30:00',25.00),(43,51,36,7,'2022-10-25','14:00:00',1,'15:30:00','01:30:00',22.00),(44,51,37,8,'2022-10-19','09:30:00',0,'11:15:00','01:45:00',37.00),(45,51,37,8,'2022-10-19','12:00:00',0,'13:45:00','01:45:00',37.00),(46,51,36,7,'2022-10-25','17:30:00',1,'19:00:00','01:30:00',22.00),(47,51,36,7,'2022-10-27','12:00:00',0,'13:30:00','01:30:00',22.00),(48,51,37,8,'2022-10-26','09:00:00',0,'10:45:00','01:45:00',37.00),(49,51,36,7,'2022-10-25','19:30:00',1,'21:00:00','01:30:00',22.00),(50,51,37,8,'2022-10-19','16:00:00',0,'17:45:00','01:45:00',37.00),(51,51,36,7,'2022-10-26','09:00:00',0,'10:30:00','01:30:00',22.00),(52,51,36,7,'2022-10-20','12:00:00',0,'13:30:00','01:30:00',22.00),(53,51,36,7,'2022-10-14','09:30:00',0,'11:00:00','01:30:00',22.00),(54,51,36,7,'2022-10-20','14:30:00',0,'16:00:00','01:30:00',22.00),(55,51,36,7,'2022-10-26','16:00:00',0,'17:30:00','01:30:00',22.00),(56,51,37,8,'2022-10-28','10:00:00',0,'11:45:00','01:45:00',37.00),(57,51,37,8,'2022-10-27','09:30:00',0,'11:15:00','01:45:00',37.00),(58,51,36,7,'2022-10-29','09:00:00',1,'10:30:00','01:30:00',22.00),(59,51,36,7,'2022-10-24','12:00:00',0,'13:30:00','01:30:00',22.00),(60,51,36,7,'2022-10-27','14:00:00',0,'15:30:00','01:30:00',22.00),(61,51,37,8,'2022-10-29','09:00:00',0,'10:45:00','01:45:00',37.00),(62,51,36,9,'2022-10-29','12:00:00',0,'14:30:00','02:30:00',25.00),(63,51,36,7,'2022-10-30','09:00:00',0,'10:30:00','01:30:00',22.00),(64,51,36,7,'2022-10-28','09:00:00',0,'10:30:00','01:30:00',22.00),(65,51,36,7,'2022-10-28','12:00:00',0,'13:30:00','01:30:00',22.00),(66,51,36,9,'2022-10-26','09:00:00',0,'11:30:00','02:30:00',25.00),(67,51,37,8,'2022-10-27','09:00:00',0,'10:45:00','01:45:00',37.00),(68,53,36,10,'2022-10-28','11:30:00',0,'13:30:00','02:00:00',20.00),(69,54,36,9,'2022-10-29','09:00:00',0,'11:30:00','02:30:00',25.00),(70,53,36,9,'2022-10-29','12:30:00',0,'15:00:00','02:30:00',25.00),(71,54,36,10,'2022-10-30','09:30:00',0,'11:30:00','02:00:00',20.00),(72,54,36,9,'2022-10-30','12:30:00',0,'15:00:00','02:30:00',25.00),(73,2,36,7,'2022-10-30','16:00:00',0,'17:30:00','01:30:00',22.00),(74,54,36,9,'2022-10-31','09:00:00',0,'11:30:00','02:30:00',25.00),(75,2,36,9,'2022-10-31','13:00:00',0,'15:30:00','02:30:00',25.00),(76,52,36,10,'2022-11-02','10:30:00',0,'12:30:00','02:00:00',20.00),(77,53,36,12,'2022-11-07','10:00:00',0,'13:00:00','03:00:00',40.00),(78,54,36,7,'2022-11-19','10:00:00',0,'11:30:00','01:30:00',22.00),(79,55,36,7,'2022-12-06','11:30:00',0,'13:00:00','01:30:00',22.00),(80,53,36,11,'2022-11-17','09:00:00',0,'09:30:00','00:30:00',10.00),(81,51,36,12,'2022-11-01','11:30:00',0,'14:30:00','03:00:00',40.00),(82,51,36,10,'2022-11-01','15:30:00',0,'17:30:00','02:00:00',20.00),(83,3,36,9,'2022-11-02','13:30:00',0,'16:00:00','02:30:00',25.00),(84,3,36,9,'2022-11-01','16:30:00',0,'19:00:00','02:30:00',25.00),(85,3,36,7,'2022-11-03','09:30:00',0,'11:00:00','01:30:00',22.00),(86,60,36,12,'2022-11-17','16:00:00',0,'19:00:00','03:00:00',40.00),(87,52,36,10,'2022-11-07','15:00:00',0,'17:00:00','02:00:00',20.00),(88,53,36,7,'2022-11-19','12:00:00',0,'13:30:00','01:30:00',22.00),(89,52,36,9,'2022-11-19','17:00:00',0,'19:30:00','02:30:00',25.00),(90,51,36,12,'2022-11-05','15:00:00',0,'18:00:00','03:00:00',40.00),(91,3,36,11,'2022-11-05','18:30:00',0,'19:00:00','00:30:00',10.00),(92,3,36,15,'2022-11-10','09:30:00',0,'10:00:00','00:30:00',3.00),(93,53,37,20,'2022-11-29','10:00:00',0,'12:00:00','02:00:00',33.00),(94,54,36,9,'2022-11-14','09:00:00',0,'11:30:00','02:30:00',25.00),(95,52,37,8,'2022-11-14','12:30:00',1,'14:15:00','01:45:00',37.00),(96,60,36,7,'2022-11-24','09:00:00',0,'10:30:00','01:30:00',22.00),(97,54,37,8,'2022-11-20','09:30:00',0,'11:15:00','01:45:00',37.00),(98,52,36,9,'2022-11-20','11:30:00',0,'14:00:00','02:30:00',25.00),(99,53,37,20,'2022-11-21','12:00:00',0,'14:00:00','02:00:00',33.00),(100,51,36,7,'2022-11-23','09:30:00',1,'11:00:00','01:30:00',22.00),(101,51,36,9,'2022-11-23','12:00:00',0,'14:30:00','02:30:00',25.00),(102,54,36,7,'2022-11-23','09:00:00',0,'10:30:00','01:30:00',22.00),(103,61,36,9,'2022-11-23','15:00:00',0,'17:30:00','02:30:00',25.00);
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `clientID` bigint(20) NOT NULL AUTO_INCREMENT,
  `clientFullName` varchar(45) NOT NULL,
  `clientBirthDate` date NOT NULL,
  `clientEmail` varchar(45) NOT NULL,
  `clientMobile` varchar(45) NOT NULL,
  PRIMARY KEY (`clientID`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'Vitoria Rojas','1991-02-15','virtoria@gmail.com','912579132'),(2,'Isabella Andrade','1998-10-20','isa@gmail.com','924877221'),(3,'Felipe Mengue','1991-02-20','felipe@gmail.com',''),(51,'Thiago MEngue','1986-05-05','thiago@gmail.com','951123456'),(52,'Jaqueline Mãe Isa','1950-05-05','maeisa@gmail.com','987654321'),(53,'Amanda Thaisnara','1991-03-30','amandathaisnara@gmail.com','955624789'),(54,'Catia Gomes','1990-08-20','catiagomes@gmail.com','912456987'),(55,'Teste Novo Cliente','1991-02-15','teste@gmail.com','987444321'),(60,'Joao Oliveira','2022-10-05','joao@gmail.com','987456123'),(61,'User Not Client','2000-01-21','user@notclient.com','999666555');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professional`
--

DROP TABLE IF EXISTS `professional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professional` (
  `professionalID` bigint(20) NOT NULL AUTO_INCREMENT,
  `professionalFullName` varchar(45) NOT NULL,
  `professionalEmail` varchar(45) NOT NULL,
  PRIMARY KEY (`professionalID`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professional`
--

LOCK TABLES `professional` WRITE;
/*!40000 ALTER TABLE `professional` DISABLE KEYS */;
INSERT INTO `professional` VALUES (36,'Jessica Porto Bossle','jessica@gmail.com'),(37,'Isabella Andrade','isa@gmail.com');
/*!40000 ALTER TABLE `professional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professional_has_client`
--

DROP TABLE IF EXISTS `professional_has_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professional_has_client` (
  `professional_professionalID` bigint(20) NOT NULL,
  `client_clientID` bigint(20) NOT NULL,
  PRIMARY KEY (`professional_professionalID`,`client_clientID`),
  KEY `fk_professional_has_client_client1_idx` (`client_clientID`),
  KEY `fk_professional_has_client_professional1_idx` (`professional_professionalID`),
  CONSTRAINT `fk_professional_has_client_client1` FOREIGN KEY (`client_clientID`) REFERENCES `client` (`clientID`),
  CONSTRAINT `fk_professional_has_client_professional1` FOREIGN KEY (`professional_professionalID`) REFERENCES `professional` (`professionalID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professional_has_client`
--

LOCK TABLES `professional_has_client` WRITE;
/*!40000 ALTER TABLE `professional_has_client` DISABLE KEYS */;
INSERT INTO `professional_has_client` VALUES (36,1),(37,1),(36,2),(36,3),(36,51),(37,51),(36,52),(37,52),(36,53),(37,53),(36,54),(37,54),(36,55),(36,61);
/*!40000 ALTER TABLE `professional_has_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service` (
  `serviceID` bigint(20) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(45) NOT NULL,
  `serviceTime` time NOT NULL,
  `servicePrice` decimal(10,2) NOT NULL,
  `professional_professionalID` bigint(20) NOT NULL,
  PRIMARY KEY (`serviceID`,`professional_professionalID`),
  KEY `fk_service_professional_idx` (`professional_professionalID`),
  CONSTRAINT `fk_service_professional` FOREIGN KEY (`professional_professionalID`) REFERENCES `professional` (`professionalID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (7,'Banho de Gel','01:30:00',22.00,36),(8,'Pestanas Volume Brasileiro','01:45:00',37.00,37),(9,'Manutenção de Extensões','02:30:00',25.00,36),(10,'Verniz Gel','02:00:00',20.00,36),(11,'Remoção Verniz Gel','00:45:00',12.00,36),(12,'Molde F1','03:00:00',40.00,36),(15,'Decoração por Unha','00:30:00',3.00,36),(16,'Decoração por Unhas','00:30:00',3.00,36),(20,'Limpeza de Pele','02:00:00',33.00,37);
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `userID` char(128) NOT NULL,
  `userEmail` varchar(45) NOT NULL,
  `userFullName` varchar(45) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userMobile` varchar(45) DEFAULT NULL,
  `userBirthDate` date DEFAULT NULL,
  `userType` varchar(45) NOT NULL,
  `userCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('06caf4f9-6aa5-11ed-8f0c-b42e99ca00f9','user@notclient.com','User Not Client','$2y$10$pnapmPpbf/z0UVAsceTTpOABzewgnEaMaaysJpB3Jv0Db1X11t2Se','999666555','2000-01-21','client','2022-11-22 20:34:13'),('12c4d9d5-5f9d-11ed-8bd5-b42e99ca00f9','1231@1231.com','12313 12313','$2y$10$E04mN3Agr/FXMX3/OI9PqOnOuxbcPxls.wIJT0C4Tb0P.9UwYHsU2',NULL,NULL,'client','2022-11-08 19:39:34'),('1909d840-5efb-11ed-8bd5-b42e99ca00f9','sara@gmail.com','teste astese','$2y$10$9oSeAdtALfb8ezw8qGDSpunyrVY2HPljlB6xMMopcopcFOiNGoqT2',NULL,NULL,'client','2022-11-08 00:20:06'),('3a2bda8f-5ba3-11ed-8bd5-b42e99ca00f9','joaomiguel@gmail.com','Joao Miguel','$2y$10$F.pvP53wDkHKoKfq163HNegveH43.B8eZBQajowXfSgbQIownQqNa',NULL,NULL,'client','2022-11-03 18:13:33'),('74a032c7-44b5-11ed-a536-b42e99ca00f9','thiago@gmail.com','Thiago Mengue','$2y$10$ZRKMjhknejqVK5HY88NcqukOWUMejjHH50iceand66HfVCnnHRvCm','987654','2022-10-13','client','2022-10-05 14:56:05'),('8b10cd6d-5efa-11ed-8bd5-b42e99ca00f9','teste@fel.com','asdsa asdsad','$2y$10$OYsAnoEYOx45LIhVw/YaeeuIkYoLypoD4YF0p3Aa0jhAJwE6ubchG',NULL,NULL,'client','2022-11-08 00:16:08'),('8b9b238f-2bd2-11ed-a398-b42e99ca00f9','fbm@gmail.com','Felipe Mengue','$2y$10$gMRBqCPMtvs2FurgAUNpKuqnsBZLPk5nNAVRo7HLIZtrlZhPIzUny','912579132','1991-02-15','admin','2022-09-03 22:51:20'),('8f23ca86-47bc-11ed-a536-b42e99ca00f9','nuno@gmail.com','Nuno Sousa','$2y$10$BcXczpWpGgLQlZ0BKtWUaOsEi2kk6PtySyzxReh0a.JN0NGilRCHu',NULL,NULL,'client','2022-10-09 11:24:29'),('976be249-4422-11ed-a536-b42e99ca00f9','isa@gmail.com','Isabella Andrade','$2y$10$uVh/BqrbsWQmECDG2582o.5Va/ZYwpBb2wX36A1pZ5/VvbRIb04Ba',NULL,NULL,'professional','2022-10-04 21:24:47'),('ad39f76e-2bde-11ed-a398-b42e99ca00f9','jessica@gmail.com','Jessica Bossle','$2y$10$4f4Qojor2cxcueXbxPc9b.S6ZXejxZ1/Lxjhdyxk4pMo2Dsba/tUW','987456123','1991-05-03','professional','2022-09-04 00:18:10'),('ea31dad3-5efb-11ed-8bd5-b42e99ca00f9','teste@joao.com','Fessse aasd','$2y$10$tPGmMDa1WYuGjR/XvL5xkOnRUq6h2b4iATrQ4R5udoYrPS4tHxSby',NULL,NULL,'client','2022-11-08 00:25:57'),('f3be890f-5efb-11ed-8bd5-b42e99ca00f9','fbmengue@gmail.com','tesa Bossle','$2y$10$baWdyfHxtJPzPICLTvkicO0jXli0Re0XI/05.P2SXq0bednOqxUxG',NULL,NULL,'client','2022-11-08 00:26:13');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-30 19:31:06
