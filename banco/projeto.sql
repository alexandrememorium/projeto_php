-- MySQL dump 10.13  Distrib 5.5.62, for Win32 (AMD64)
--
-- Host: localhost    Database: proj_php
-- ------------------------------------------------------
-- Server version	5.5.62

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT,
  `NomeCliente` varchar(100) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Dt_Cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (5,'Alexandre','83495166076','alexandre.souza@memoriumtech.com','2023-02-02 20:48:41'),(7,'Leandro teste 01','83495166076','teste@teste.com','2023-02-02 21:29:13'),(8,'Marcela','83495166076','marcela@gmail.com','2023-02-02 21:36:13'),(9,'JosÃ© da Silva','83495166076','teste@teste.com','2023-02-02 22:35:54'),(31,'aaa','01055419071','aa@uol.com.br','2023-02-03 01:27:23'),(32,'JosÃ©','01055419071','jose@gmail.com','2023-02-16 23:47:23'),(42,'Alex','77375687005','alex@teste.com.br','2023-02-21 18:04:44');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_pedido`
--

DROP TABLE IF EXISTS `item_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_pedido` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroPedido` int(11) NOT NULL,
  `Id_Produto` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `ValorUnitario` decimal(19,2) NOT NULL,
  `Dt_Cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_pedido`
--

LOCK TABLES `item_pedido` WRITE;
/*!40000 ALTER TABLE `item_pedido` DISABLE KEYS */;
INSERT INTO `item_pedido` VALUES (1,1,3,10,10.00,'2023-02-10 00:50:35');
/*!40000 ALTER TABLE `item_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `NumeroPedido` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(11) NOT NULL,
  `Dt_Pedido` date NOT NULL,
  `Total` decimal(19,2) NOT NULL,
  `Dt_Cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`NumeroPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,5,'2023-02-09',100.00,'2023-02-10 00:49:34');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `Id_Produto` int(11) NOT NULL AUTO_INCREMENT,
  `Codbarras` varchar(20) NOT NULL,
  `NomeProduto` varchar(100) DEFAULT NULL,
  `ValorUnitario` decimal(19,2) NOT NULL,
  `Dt_Cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_Produto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (3,'      000001','Produto Teste 01',11.11,'2023-02-10 00:35:49'),(4,'C000002','Produto Teste 02',112.22,'2023-02-16 23:34:04'),(5,'00000000000000000000','Teste Teste Teste Teste Teste Teste Teste Teste Teste',123.33,'2023-02-17 01:25:21');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-22 15:01:51
