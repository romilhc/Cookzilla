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
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follows` (
  `uname` varchar(45) NOT NULL,
  `funame` varchar(45) NOT NULL,
  `acttime` datetime NOT NULL,
  PRIMARY KEY (`uname`,`funame`,`acttime`),
  KEY `fname_idx` (`funame`),
  CONSTRAINT `funamefollowsfk` FOREIGN KEY (`funame`) REFERENCES `user` (`uname`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `unamefollowsfk` FOREIGN KEY (`uname`) REFERENCES `user` (`uname`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES ('ans596@nyu.edu','rhc294','2016-12-09 21:05:41'),('dkb300','rd29','2016-12-15 20:46:27'),('dkb300','rhc294','0000-00-00 00:00:00'),('kjm123@nyu.edu','dkb300','2016-12-09 21:01:08'),('kjm123@nyu.edu','rhc294','2016-12-09 20:49:21'),('rd29','rhc294','2016-12-09 17:59:55'),('rhc294','dkb300','2016-12-09 19:38:11'),('rhc294','hat120','2016-12-09 19:39:30'),('rhc294','jaimin_shah3128@yahoo.co.in','2016-12-09 19:39:31'),('rhc294','kjl423','2016-12-09 19:39:34'),('rhc294','npb','2016-12-09 19:39:28'),('rhc294','rd29','2016-12-09 19:39:36'),('rhc294','rj98','2016-12-09 19:39:37');
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
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
