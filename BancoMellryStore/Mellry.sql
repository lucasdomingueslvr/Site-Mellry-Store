CREATE DATABASE  IF NOT EXISTS `bdmellrystore` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdmellrystore`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: bdmellrystore
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Dumping data for table `cadastro`
--

LOCK TABLES `cadastro` WRITE;
/*!40000 ALTER TABLE `cadastro` DISABLE KEYS */;
INSERT INTO `cadastro` VALUES (1,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(2,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(3,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(4,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(5,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(6,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(7,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(8,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(9,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(10,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(11,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(12,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(13,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727');
/*!40000 ALTER TABLE `cadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `carrinho`
--

LOCK TABLES `carrinho` WRITE;
/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrinho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tab_camiseta`
--

LOCK TABLES `tab_camiseta` WRITE;
/*!40000 ALTER TABLE `tab_camiseta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_camiseta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tab_modaintima`
--

LOCK TABLES `tab_modaintima` WRITE;
/*!40000 ALTER TABLE `tab_modaintima` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_modaintima` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tab_shorts`
--

LOCK TABLES `tab_shorts` WRITE;
/*!40000 ALTER TABLE `tab_shorts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_shorts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tab_vestidos`
--

LOCK TABLES `tab_vestidos` WRITE;
/*!40000 ALTER TABLE `tab_vestidos` DISABLE KEYS */;
INSERT INTO `tab_vestidos` VALUES (5,150,120,'Vestido Preto','Medio','../uploads/vestido_preto.jpg'),(6,100,69,'Vestido Florido','Pequeno','../uploads/vestido_florido.jpg');
/*!40000 ALTER TABLE `tab_vestidos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-10 15:39:58
