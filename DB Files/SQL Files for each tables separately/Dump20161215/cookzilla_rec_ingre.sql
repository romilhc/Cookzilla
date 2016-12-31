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
-- Table structure for table `rec_ingre`
--

DROP TABLE IF EXISTS `rec_ingre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rec_ingre` (
  `rid` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `expuid` int(11) DEFAULT NULL,
  PRIMARY KEY (`rid`,`iid`),
  KEY `iid_idx` (`iid`),
  KEY `expid_id` (`expuid`),
  CONSTRAINT `expidfk` FOREIGN KEY (`expuid`) REFERENCES `exp_unit` (`expid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `iid` FOREIGN KEY (`iid`) REFERENCES `ingredients` (`iid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `rid` FOREIGN KEY (`rid`) REFERENCES `recipe` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rec_ingre`
--

LOCK TABLES `rec_ingre` WRITE;
/*!40000 ALTER TABLE `rec_ingre` DISABLE KEYS */;
INSERT INTO `rec_ingre` VALUES (1,1,4,2),(1,2,3,5),(1,4,2,5),(1,5,1,1),(2,3,2,5),(2,4,2,5),(2,7,2,1),(2,9,1,5),(2,10,5,5),(2,11,5,3),(3,2,1,5),(3,4,1,5),(3,8,1,5),(3,9,1,5),(3,13,1,2),(4,1,7,2),(4,2,2,5),(4,6,2,1),(4,8,4,5),(4,9,12,5),(5,1,4,2),(5,2,3,5),(5,5,2,1),(5,6,1,1),(5,9,1,5),(5,11,2,3),(6,5,1,1),(6,6,2,1),(6,7,1,1),(6,14,7,4),(7,14,4,4),(7,15,2,1),(7,16,2,1),(8,6,2,1),(8,14,3,4),(12,3,3,1),(12,11,1,3),(13,3,4,5),(13,4,4,5),(14,3,2,5);
/*!40000 ALTER TABLE `rec_ingre` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-15 22:37:16
