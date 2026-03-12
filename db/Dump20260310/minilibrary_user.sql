-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: minilibrary
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(12) NOT NULL,
  `name` varchar(45) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `email` varchar(45) NOT NULL,
  `roleid` int(1) NOT NULL,
  `profilepic` mediumblob DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nic_UNIQUE` (`nic`),
  KEY `roleid` (`roleid`),
  CONSTRAINT `roleid` FOREIGN KEY (`roleid`) REFERENCES `role` (`roleid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'amodhkushan','Amodh@123','Amodh Kushan','200504234144','amodhkushan@gmail.com',2,NULL),(2,'dewmini','Dewmini@123','Jayodya Dewmini','200513433433','jayodyadewmini@gmail.com',2,NULL),(3,'nethmisasindi','Nethmi@123','Nethmi Sasindi','200643431804','nethmisasindi4@gmail.com',4,NULL),(4,'maneeshamadushanka','Maneesha@123','Maneesha Madhushanka','200624444465','maneeshamadushanka9@gmail.com',4,NULL),(5,'tharushanawod','Tharusha@123','Tharusha Nawod','200805454544','tharushanawod2006@gmail.com',4,NULL),(6,'sachinishehara','Sachini@123','Sachini Shehara','200645458710','sachinishehara2006@gmail.com',4,NULL),(7,'chaminduishara','Chamindu@123','Chamindu Ishara','200609082320','chaminduishara55@gmail.com',4,NULL),(8,'danukanuwan','Danuka@123','Danuka Nuwan','200633545458','danukanuwanpc@gmail.com',4,NULL),(9,'yasithhasanka','Yasith@123','Yasith Hasanka','200611546891','yasithjayaneththi9@gmail.com',4,NULL),(10,'methusharashminda','Methusha@123','Methusha Rashminda','200636557882','methurash85@gmail.com',4,NULL),(11,'kiranasankalpa','Kirana@123','Kirana Sankalpa','200513344590','kiranasankalpa@gmail.com',4,NULL),(12,'dasulaninduwara','Dasula@123','Dasula Ninduwara','200523125098','dasulaniduwara@gmail.com',4,NULL),(13,'nadirnoori','Nadir@123','Nadir Noori','200845623434','nadirnoori2008@gmail.com',4,NULL);
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

-- Dump completed on 2026-03-10 21:35:17
