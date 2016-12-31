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
-- Table structure for table `rec_rate`
--

DROP TABLE IF EXISTS `rec_rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rec_rate` (
  `reviewid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `retitle` varchar(100) NOT NULL,
  `retext` varchar(200) NOT NULL,
  `uname` varchar(45) NOT NULL,
  `ratings` int(11) DEFAULT NULL,
  `photo` blob,
  `ctime` datetime NOT NULL,
  PRIMARY KEY (`reviewid`,`ctime`),
  KEY `rid_idx` (`rid`),
  KEY `uname_idx` (`uname`),
  KEY `rid_idrev` (`rid`),
  KEY `uname_idrev` (`uname`),
  CONSTRAINT `ridrevfk` FOREIGN KEY (`rid`) REFERENCES `recipe` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `unamerevfk` FOREIGN KEY (`uname`) REFERENCES `user` (`uname`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rec_rate`
--

LOCK TABLES `rec_rate` WRITE;
/*!40000 ALTER TABLE `rec_rate` DISABLE KEYS */;
INSERT INTO `rec_rate` VALUES (1,1,' Awesome ','  Really amazing food reciper ','rhc294',5,'','0000-00-00 00:00:00'),(2,2,' Blend ','  Little blend ','rhc294',3,'','0000-00-00 00:00:00'),(3,4,' Good ','  Liked ','dkb300',3,'','0000-00-00 00:00:00'),(4,5,' Spicy ','  Nice ','dkb300',4,'','0000-00-00 00:00:00'),(5,9,' Awesome','  Mindblowing ','npb',1,'','0000-00-00 00:00:00'),(6,9,' Nice ','  Very Nice ','rd29',5,'','0000-00-00 00:00:00'),(7,10,' Amazing ','  Sweet ','kjl423',5,'','0000-00-00 00:00:00'),(8,10,' Awful ','  Awful ','hat120',1,'','0000-00-00 00:00:00'),(9,10,'  Gotchya ','  Spicy ','hat120',1,'','0000-00-00 00:00:00'),(10,10,'  Taste beter ','  Fantastic ','kjl423',1,'','0000-00-00 00:00:00'),(11,11,'  Nice combo ','  Good ','rhc294',5,'','0000-00-00 00:00:00'),(12,11,'  Sober ','  It\' s ok ','rhc294',5,'','0000-00-00 00:00:00'),(13,11,'  sour ','  Little sour ','rhc294',5,'','0000-00-00 00:00:00'),(15,3,'Yummy!','Really, really, tasty!','rhc294',5,NULL,'0000-00-00 00:00:00'),(16,1,'asd','qwe','dkb300',4,NULL,'0000-00-00 00:00:00'),(17,1,'abcd','Its good','dkb300',3,NULL,'0000-00-00 00:00:00'),(18,1,'heya','normal','dkb300',2,NULL,'0000-00-00 00:00:00'),(19,6,'Delicious','New Spicy Chocolate Recipe','dkb300',5,NULL,'0000-00-00 00:00:00'),(20,1,'Try Comment','Hello ','dkb300',4,NULL,'0000-00-00 00:00:00'),(21,1,'Its amazing','I liked it very much!','ans596@nyu.edu',3,NULL,'0000-00-00 00:00:00'),(22,3,'I like it','Really amazing','dkb300',3,NULL,'0000-00-00 00:00:00'),(23,3,'Good','One more time','dkb300',4,NULL,'2016-12-12 21:33:42'),(24,2,'Amazing mixture','Good work','rhc294',5,NULL,'2016-12-13 11:18:02'),(25,12,'Amazing Food','It tastes Yummy','dkb300',5,NULL,'2016-12-15 21:28:44');
/*!40000 ALTER TABLE `rec_rate` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-15 22:37:17
