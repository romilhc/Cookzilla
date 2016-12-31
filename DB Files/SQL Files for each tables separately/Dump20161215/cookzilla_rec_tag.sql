CREATE DATABASE  IF NOT EXISTS `cookzilla` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cookzilla`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cookzilla
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `rec_tag`
--

DROP TABLE IF EXISTS `rec_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rec_tag` (
  `rid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`rid`,`tid`),
  KEY `tidfk_idx` (`tid`),
  CONSTRAINT `ridfk` FOREIGN KEY (`rid`) REFERENCES `recipe` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tidfk` FOREIGN KEY (`tid`) REFERENCES `tags` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rec_tag`
--

LOCK TABLES `rec_tag` WRITE;
/*!40000 ALTER TABLE `rec_tag` DISABLE KEYS */;
INSERT INTO `rec_tag` VALUES (1,2),(1,6),(1,13),(2,1),(2,2),(2,7),(3,2),(4,3),(4,4),(5,1),(5,9),(5,15),(6,1),(6,2),(6,3),(7,3),(7,4),(7,5),(8,3),(8,6),(9,2),(9,3),(10,2),(10,3),(11,2),(11,3),(12,1),(12,5),(13,1),(13,5),(14,5);
/*!40000 ALTER TABLE `rec_tag` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-15 22:37:15