-- MySQL dump 10.13  Distrib 5.7.15, for Win64 (x86_64)
--
-- Host: localhost    Database: saleproject
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `username` varchar(25) DEFAULT NULL,
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `productname` varchar(25) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `photo_name` varchar(20) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL,
  `likeamount` int(10) DEFAULT NULL,
  PRIMARY KEY (`productid`),
  KEY `username` (`username`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES ('admin',5,'ndcincidnc',414141,'uploads/happy_dog.jpg','DOGGY',NULL,'happy_dog.jpg','2016-10-08 11:58:21',0),('admin',6,'sehat dan bergizi',30000,'uploads/susu-kacang-kedelai.jpg','susu kedelai',NULL,'susu-kacang-kedelai.','2016-10-08 11:58:21',0),('admin',7,'sehat dan bergizi',30000,'uploads/susu-kacang-kedelai.jpg','susu kedelai',NULL,'susu-kacang-kedelai.','2016-10-08 11:58:21',0),('admin',8,'yoyo',20000,'uploads/index.jpeg','woho',NULL,'index.jpeg',NULL,0),('admin',9,'yoyo',20000,'uploads/index.jpeg','woho',NULL,'index.jpeg',NULL,0),('admin',10,'cbacbacbaucb',323232,'uploads/unknown.png','jjojojo',NULL,'unknown.png',NULL,0),('admin',11,'cabfqbfqbof',361863,'uploads/unknown.png','ahadiahahf',NULL,'unknown.png',NULL,0),('admin',12,'asdasd',123123,'uploads/unknown.png','Botol',NULL,'unknown.png',NULL,0),('admin',13,'asdasd',123123,'uploads/unknown.png','Botol',NULL,'unknown.png',NULL,0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `username_buyer` varchar(25) DEFAULT NULL,
  `username_seller` varchar(25) DEFAULT NULL,
  `consignee` varchar(40) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postalcode` varchar(8) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `creditnumber` char(12) DEFAULT NULL,
  `verif` char(3) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `purchasetime` datetime DEFAULT NULL,
  PRIMARY KEY (`purchase_id`),
  KEY `username_buyer` (`username_buyer`),
  KEY `username_seller` (`username_seller`),
  KEY `productid` (`productid`),
  CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`username_buyer`) REFERENCES `user` (`username`),
  CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`username_seller`) REFERENCES `user` (`username`),
  CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (1,'admin','Jovitua','bapa','batununggal','40000','02727167122','123456789012','123',5,2,'2016-10-08 16:43:42'),(2,'Jovitua','admin','bapa','batununggal','40000','02727167122','123456789012','123',6,3,'2016-10-08 16:44:02'),(22,'Jovitua','admin','Ibu','bandung','40000','01872166121','123456789012','123',5,4,'2016-10-08 22:27:19'),(23,'admin','Jovitua','Ibu','bandung','40000','01872166121','123456789012','123',5,4,'2016-10-08 22:32:00');
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `fullname` varchar(40) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postalcode` varchar(8) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin','admin','admin@admin.com','jovitua',NULL,NULL,NULL),('asdasd','asdasd','asdasd@gmail.com','asdasd','123123','123123','123123'),('Jovian','Jovitua','joviatua@gmail.com','asdasd','asdasd','asdasd','123123');
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

-- Dump completed on 2016-10-08 23:22:48
