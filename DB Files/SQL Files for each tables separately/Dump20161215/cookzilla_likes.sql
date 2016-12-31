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
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `uname` varchar(45) NOT NULL,
  `rid` int(11) NOT NULL,
  `ltime` datetime NOT NULL,
  PRIMARY KEY (`uname`,`rid`,`ltime`),
  KEY `ridlfk_idx` (`rid`),
  CONSTRAINT `ridlfk` FOREIGN KEY (`rid`) REFERENCES `recipe` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `unamelfk` FOREIGN KEY (`uname`) REFERENCES `user` (`uname`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES ('ans596@nyu.edu',1,'0000-00-00 00:00:00'),('dkb300',1,'0000-00-00 00:00:00'),('dkb300',2,'0000-00-00 00:00:00'),('dkb300',3,'2016-12-12 21:39:36'),('dkb300',4,'0000-00-00 00:00:00'),('dkb300',5,'2016-12-15 21:28:14'),('dkb300',6,'0000-00-00 00:00:00'),('dkb300',12,'2016-12-15 21:28:22'),('npb',3,'0000-00-00 00:00:00'),('rhc294',2,'0000-00-00 00:00:00'),('rhc294',10,'2016-12-13 11:18:49');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-15 22:37:14
