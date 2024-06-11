CREATE DATABASE  IF NOT EXISTS `bdmellrystore` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdmellrystore`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: bdmellrystore
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cadastro` (
  `id_cliente` bigint NOT NULL AUTO_INCREMENT,
  `nome` char(50) NOT NULL,
  `dtnascimento` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadastro`
--

LOCK TABLES `cadastro` WRITE;
/*!40000 ALTER TABLE `cadastro` DISABLE KEYS */;
INSERT INTO `cadastro` VALUES (1,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(2,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(3,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(4,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(5,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(6,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(7,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(8,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(9,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(10,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(11,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(12,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(13,'campo','2024-06-26','kauamatheus920@gmail.com','123456','34991211727'),(14,'Th','2024-06-12','th@gmail.com','123456','34991211727');
/*!40000 ALTER TABLE `cadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrinho` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint DEFAULT NULL,
  `id_produto` int NOT NULL,
  `quantidade` int DEFAULT '1',
  `tabela_produto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`id_cliente`),
  CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cadastro` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrinho`
--

LOCK TABLES `carrinho` WRITE;
/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
INSERT INTO `carrinho` VALUES (10,14,2,1,'tab_shorts'),(11,14,1,1,'tab_shorts'),(13,14,5,1,'tab_vestidos'),(14,14,6,1,'tab_vestidos');
/*!40000 ALTER TABLE `carrinho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_camiseta`
--

DROP TABLE IF EXISTS `tab_camiseta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_camiseta` (
  `id_camiseta` bigint NOT NULL AUTO_INCREMENT,
  `nomeproduto` varchar(50) NOT NULL,
  `valor` float NOT NULL,
  `promocao` float NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_camiseta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_camiseta`
--

LOCK TABLES `tab_camiseta` WRITE;
/*!40000 ALTER TABLE `tab_camiseta` DISABLE KEYS */;
INSERT INTO `tab_camiseta` VALUES (1,'Camiseta Verde e Branco',30,27,'Medio','../uploads/image 6 (8).png'),(2,'Camiseta T-shirt',38,32,'Pequeno','../uploads/image 6 (7).png'),(3,'Camiseta Asics Manga Curta',34,31,'Grande','../uploads/image 6 (6).png'),(4,'Camiseta Coração Floresta Branca',40,36,'Medio','../uploads/image 6 (5).png');
/*!40000 ALTER TABLE `tab_camiseta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_modaintima`
--

DROP TABLE IF EXISTS `tab_modaintima`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_modaintima` (
  `id_modaintima` bigint NOT NULL AUTO_INCREMENT,
  `nomeproduto` varchar(50) NOT NULL,
  `valor` float NOT NULL,
  `promocao` float NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_modaintima`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_modaintima`
--

LOCK TABLES `tab_modaintima` WRITE;
/*!40000 ALTER TABLE `tab_modaintima` DISABLE KEYS */;
INSERT INTO `tab_modaintima` VALUES (1,'Calcinha e Sutiã Agua Marinho',30,25,'Pequeno','../uploads/image 6 (12).png'),(2,'Kit 3 Sutiãs Algodão',45,40,'Medio','../uploads/image 6 (11).png'),(3,'Sutiã Verde',25,20,'Pequeno','../uploads/image 6 (10).png'),(4,'Calcinha e Sutiã Confort Plus',30,23,'Grande','../uploads/image 6 (9).png');
/*!40000 ALTER TABLE `tab_modaintima` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_shorts`
--

DROP TABLE IF EXISTS `tab_shorts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_shorts` (
  `id_shorts` bigint NOT NULL AUTO_INCREMENT,
  `nomeproduto` varchar(50) NOT NULL,
  `valor` float NOT NULL,
  `promocao` float NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_shorts`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_shorts`
--

LOCK TABLES `tab_shorts` WRITE;
/*!40000 ALTER TABLE `tab_shorts` DISABLE KEYS */;
INSERT INTO `tab_shorts` VALUES (1,'Short Jeans Baggy Carpinteiro',89,59,'Medio','../uploads/short_baggy_jeans_carpinteiro.png'),(2,'Short Preto Academia',49,34,'Pequeno','../uploads/short_preto_academia.jpg'),(3,'Short Azul Claro',45,38,'Medio','../uploads/image 6 (1).png'),(4,'Short Liso Marrom',26,24,'Grande','../uploads/image 6 (2).png');
/*!40000 ALTER TABLE `tab_shorts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_vestidos`
--

DROP TABLE IF EXISTS `tab_vestidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_vestidos` (
  `id_vestidos` bigint NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  `promocao` float NOT NULL,
  `nomeproduto` varchar(50) NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_vestidos`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_vestidos`
--

LOCK TABLES `tab_vestidos` WRITE;
/*!40000 ALTER TABLE `tab_vestidos` DISABLE KEYS */;
INSERT INTO `tab_vestidos` VALUES (5,150,120,'Vestido Preto','Medio','../uploads/vestido_preto.jpg'),(6,100,69,'Vestido Florido','Pequeno','../uploads/vestido_florido.jpg'),(7,150,120,'Vestido Vinho','Medio','../uploads/image 6 (4).png'),(8,220,180,'Vestido Pink','Grande','../uploads/image 6 (3).png');
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

-- Dump completed on 2024-06-11 17:58:08

