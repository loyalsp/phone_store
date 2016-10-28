-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: online_orders
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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` varchar(30) DEFAULT NULL,
  `product_number` int(11) DEFAULT NULL,
  `order_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  KEY `fk_customerId` (`customerId`),
  KEY `fk_product_number` (`product_number`),
  CONSTRAINT `fk_customerId` FOREIGN KEY (`customerId`) REFERENCES `users` (`user_id`),
  CONSTRAINT `fk_product_number` FOREIGN KEY (`product_number`) REFERENCES `products` (`product_num`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'adnan',1,'2016-10-13 19:32:50'),(2,'adnan',1,'2016-10-15 17:49:52'),(3,'adnan',2,'2016-10-17 11:23:50'),(4,'adnan',2,'2016-10-17 11:24:42'),(5,'adnan',1,'2016-10-17 11:24:48'),(6,'adnan',3,'2016-10-17 11:26:25'),(7,'adnan',3,'2016-10-17 11:26:37'),(8,'adnan',2,'2016-10-17 11:29:42'),(9,'adnan',2,'2016-10-17 17:41:17'),(10,'adnan',2,'2016-10-17 17:43:22'),(11,'adnan',2,'2016-10-17 18:12:24'),(12,'adnan',5,'2016-10-17 18:19:19'),(13,'adnan',2,'2016-10-17 18:21:45'),(14,'adnan',2,'2016-10-17 18:21:51'),(15,'adnan',3,'2016-10-17 18:21:56'),(16,'adnan',2,'2016-10-17 18:34:12'),(17,'adnan',2,'2016-10-17 18:34:15'),(18,'adnan',2,'2016-10-18 07:45:46'),(19,'adnan',2,'2016-10-18 07:45:55'),(20,'adnan',1,'2016-10-18 07:46:02'),(21,'adnan',3,'2016-10-18 07:46:03'),(22,'adnan',3,'2016-10-18 07:48:14'),(23,'adnan',3,'2016-10-18 07:48:37'),(24,'adnan',2,'2016-10-18 08:12:49'),(25,'adnan',1,'2016-10-18 08:12:52'),(26,'adnan',1,'2016-10-18 08:12:55'),(27,'adnan',1,'2016-10-18 08:15:56'),(28,'adnan',1,'2016-10-18 08:16:05'),(29,'adnan',2,'2016-10-18 08:23:38'),(30,'adnan',2,'2016-10-18 08:25:10'),(31,'adnan',2,'2016-10-18 08:25:55'),(32,'adnan',2,'2016-10-18 09:07:12'),(33,'adnan',3,'2016-10-18 09:07:16'),(34,'adnan',1,'2016-10-18 09:07:18'),(35,'adnan',2,'2016-10-18 09:07:33'),(36,'adnan',1,'2016-10-18 09:07:41'),(37,'adnan',3,'2016-10-18 09:07:44'),(38,'adnan',3,'2016-10-18 09:07:45'),(39,'adnan',3,'2016-10-18 09:07:46'),(40,'adnan',3,'2016-10-18 09:07:48'),(41,'adnan',2,'2016-10-18 09:07:53'),(42,'adnan',4,'2016-10-18 09:08:02'),(43,'adnan',1,'2016-10-18 09:15:13'),(44,'adnan',2,'2016-10-18 09:15:15'),(45,'adnan',2,'2016-10-18 09:15:17'),(46,'adnan',2,'2016-10-18 11:18:04'),(47,'adnan',3,'2016-10-18 11:18:08'),(48,'adnan',1,'2016-10-18 11:18:09'),(49,'adnan',2,'2016-10-18 13:00:30'),(50,'adnan',2,'2016-10-18 13:09:03'),(51,'adnan',2,'2016-10-18 13:09:50'),(52,'adnan',3,'2016-10-18 13:10:24'),(53,'adnan',2,'2016-10-18 13:12:22'),(57,'adnan',3,'2016-10-18 13:15:35'),(58,'adnan',2,'2016-10-18 13:15:48'),(59,'adnan',1,'2016-10-18 13:15:50'),(60,'adnan',3,'2016-10-18 13:15:51'),(61,'adnan',2,'2016-10-18 13:18:33'),(62,'adnan',2,'2016-10-18 13:18:38'),(63,'adnan',1,'2016-10-18 13:18:41'),(64,'adnan',2,'2016-10-18 13:18:54'),(65,'adnan',2,'2016-10-18 13:21:03'),(66,'adnan',3,'2016-10-18 13:22:21'),(67,'adnan',2,'2016-10-18 13:22:24'),(68,'adnan',3,'2016-10-18 13:22:47'),(69,'adnan',2,'2016-10-18 14:08:25'),(70,'adnan',2,'2016-10-19 13:39:01'),(71,'adnan',3,'2016-10-19 13:39:04'),(72,'adnan',1,'2016-10-19 13:39:06'),(73,'adnan',1,'2016-10-19 13:39:12'),(74,'adnan',1,'2016-10-19 14:09:42'),(75,'adnan',1,'2016-10-19 14:10:13'),(76,'adnan',1,'2016-10-19 14:11:05'),(77,'adnan',1,'2016-10-19 14:11:19'),(78,'adnan',1,'2016-10-19 14:28:31'),(79,'adnan',1,'2016-10-19 14:30:30'),(80,'adnan',1,'2016-10-19 14:44:35'),(81,'adnan',6,'2016-10-20 15:41:50'),(82,'adnan',2,'2016-10-20 16:06:05'),(83,'adnan',2,'2016-10-20 16:14:25'),(84,'adnan',2,'2016-10-20 16:23:44'),(85,'adnan',2,'2016-10-20 17:56:35'),(86,'adnan',3,'2016-10-20 17:56:47'),(87,'adnan',3,'2016-10-20 17:56:51'),(88,'adnan',3,'2016-10-20 17:56:54'),(89,'adnan',3,'2016-10-20 17:58:01'),(90,'adnan',3,'2016-10-20 18:03:10'),(91,'adnan',3,'2016-10-20 18:04:36'),(92,'adnan',3,'2016-10-20 18:12:35'),(93,'adnan',3,'2016-10-20 18:13:47'),(94,'adnan',2,'2016-10-21 14:46:57'),(95,'adnan',2,'2016-10-21 14:47:01'),(96,'adnan',2,'2016-10-21 14:47:04'),(97,'adnan',2,'2016-10-21 14:47:08'),(98,'adnan',3,'2016-10-21 15:58:50');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-25 21:53:50
