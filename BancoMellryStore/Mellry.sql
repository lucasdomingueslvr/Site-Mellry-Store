-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: bdmelrystore
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadastro`
--

LOCK TABLES `cadastro` WRITE;
/*!40000 ALTER TABLE `cadastro` DISABLE KEYS */;
/*!40000 ALTER TABLE `cadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrinho` (
  `id_carrinho` bigint NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint NOT NULL,
  `nomeproduto` varchar(50) NOT NULL,
  `valor` float NOT NULL,
  `promocao` float NOT NULL,
  PRIMARY KEY (`id_carrinho`),
  KEY `cadastro_carrinho_fk` (`id_cliente`),
  CONSTRAINT `cadastro_carrinho_fk` FOREIGN KEY (`id_cliente`) REFERENCES `cadastro` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrinho`
--

LOCK TABLES `carrinho` WRITE;
/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
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
  `id_tamanho` bigint NOT NULL,
  PRIMARY KEY (`id_camiseta`),
  KEY `tamanho_tab_camiseta_fk` (`id_tamanho`),
  CONSTRAINT `tamanho_tab_camiseta_fk` FOREIGN KEY (`id_tamanho`) REFERENCES `tamanho` (`id_tamanho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_camiseta`
--

LOCK TABLES `tab_camiseta` WRITE;
/*!40000 ALTER TABLE `tab_camiseta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_camiseta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_categoria`
--

DROP TABLE IF EXISTS `tab_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_categoria` (
  `id_categoria` bigint NOT NULL,
  `id_vestidos` bigint NOT NULL,
  `id_shorts` bigint NOT NULL,
  `id_modaintima` bigint NOT NULL,
  `id_camiseta` bigint NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `tab_modaintima_tab_categoria_fk` (`id_modaintima`),
  KEY `tab_shorts_tab_categoria_fk` (`id_shorts`),
  KEY `tab_vestidos_tab_categoria_fk` (`id_vestidos`),
  KEY `tab_camiseta_tab_categoria_fk` (`id_camiseta`),
  CONSTRAINT `tab_camiseta_tab_categoria_fk` FOREIGN KEY (`id_camiseta`) REFERENCES `tab_camiseta` (`id_camiseta`),
  CONSTRAINT `tab_modaintima_tab_categoria_fk` FOREIGN KEY (`id_modaintima`) REFERENCES `tab_modaintima` (`id_modaintima`),
  CONSTRAINT `tab_shorts_tab_categoria_fk` FOREIGN KEY (`id_shorts`) REFERENCES `tab_shorts` (`id_shorts`),
  CONSTRAINT `tab_vestidos_tab_categoria_fk` FOREIGN KEY (`id_vestidos`) REFERENCES `tab_vestidos` (`id_vestidos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_categoria`
--

LOCK TABLES `tab_categoria` WRITE;
/*!40000 ALTER TABLE `tab_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_modaintima`
--

DROP TABLE IF EXISTS `tab_modaintima`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_modaintima` (
  `id_modaintima` bigint NOT NULL AUTO_INCREMENT,
  `id_tamanho` bigint NOT NULL,
  `nomeproduto` varchar(50) NOT NULL,
  `valor` float NOT NULL,
  `promocao` float NOT NULL,
  PRIMARY KEY (`id_modaintima`),
  KEY `tamanho_tab_modaintima_fk` (`id_tamanho`),
  CONSTRAINT `tamanho_tab_modaintima_fk` FOREIGN KEY (`id_tamanho`) REFERENCES `tamanho` (`id_tamanho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_modaintima`
--

LOCK TABLES `tab_modaintima` WRITE;
/*!40000 ALTER TABLE `tab_modaintima` DISABLE KEYS */;
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
  `promocao` float NOT NULL,
  `nomeproduto` varchar(50) NOT NULL,
  `valor` float NOT NULL,
  `id_tamanho` bigint NOT NULL,
  PRIMARY KEY (`id_shorts`),
  KEY `tamanho_tab_shorts_fk` (`id_tamanho`),
  CONSTRAINT `tamanho_tab_shorts_fk` FOREIGN KEY (`id_tamanho`) REFERENCES `tamanho` (`id_tamanho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_shorts`
--

LOCK TABLES `tab_shorts` WRITE;
/*!40000 ALTER TABLE `tab_shorts` DISABLE KEYS */;
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
  `id_tamanho` bigint NOT NULL,
  PRIMARY KEY (`id_vestidos`),
  KEY `tamanho_tab_vestidos_fk` (`id_tamanho`),
  CONSTRAINT `tamanho_tab_vestidos_fk` FOREIGN KEY (`id_tamanho`) REFERENCES `tamanho` (`id_tamanho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_vestidos`
--

LOCK TABLES `tab_vestidos` WRITE;
/*!40000 ALTER TABLE `tab_vestidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_vestidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tamanho`
--

DROP TABLE IF EXISTS `tamanho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tamanho` (
  `id_tamanho` bigint NOT NULL AUTO_INCREMENT,
  `descricao` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tamanho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tamanho`
--

LOCK TABLES `tamanho` WRITE;
/*!40000 ALTER TABLE `tamanho` DISABLE KEYS */;
/*!40000 ALTER TABLE `tamanho` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-09 17:32:10
