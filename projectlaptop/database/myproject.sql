CREATE DATABASE  IF NOT EXISTS `projectlaptop3` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `projectlaptop3`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: projectlaptop
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `img` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'Mac',NULL),(2,'Asus',NULL),(3,'msi',NULL),(4,'Lenovo',NULL),(5,'HP',NULL),(6,'Acer',NULL),(7,'Xiaomi',NULL),(8,'MicroSoft',NULL),(9,'LG',NULL),(10,'Huawei',NULL),(11,'Dell',NULL),(12,'Gigabyte',NULL),(13,'Vaio',NULL);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `total_price` bigint DEFAULT '0',
  `total_quantity` bigint DEFAULT '0',
  `user_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (73,0,0,73),(74,0,0,74);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_detail`
--

DROP TABLE IF EXISTS `cart_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cart_id` bigint DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `quantity` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_id` (`cart_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_detail`
--

LOCK TABLES `cart_detail` WRITE;
/*!40000 ALTER TABLE `cart_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Văn Phòng'),(2,'Gaming'),(3,'Mỏng nhẹ'),(4,'Đồ họa'),(5,'Sinh Viên'),(6,'Cảm ứng');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `ten_san_pham` varchar(255) DEFAULT NULL,
  `cpu` varchar(255) DEFAULT NULL,
  `don_gia` bigint NOT NULL,
  `he_dieu_hanh` varchar(255) DEFAULT NULL,
  `man_hinh` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `brandid` int DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `brandid` (`brandid`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brandid`) REFERENCES `brand` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Asus VivoBook 15 OLED A1505VA-L1114W','Intel Core i5-13500H',18190000,'Windows 11 Home','15.6 inches','16GB',2,'images/Asus_Vivo15.png'),(2,'Asus VivoBook Go 14 E1404FA-NK177W','AMD Ryzen 5 7520U',13490000,'Windows 11 Home','14 inches','16GB',2,'images/Laptop Asus VivoBook Go 14 E1404FA-NK177W.png'),(3,'Lenovo Ideapad Slim 5 14IAH8 83BF002NVN','Intel Core i5-12450H',15490000,'Windows 11 Home','14 inches','16GB',4,'images/lg4.png'),(4,'Dell Inspiron 3511 5829BLK','Intel Core i5-1135G7',13490000,'Windows 11 Home in S mode','15.6 inches','8GB',11,'images/Laptop HP Pavilion 15-EG2065TX 7C0Q3PA.png'),(5,'Lenovo IdeaPad Slim 3 14IAH8 83EQ0005VN','Intel Core i5-12450H',14490000,'Windows 11 Home','14 inches','16GB',4,'images/lg4.png'),(6,'Asus TUF Gaming F15 FX506HC-HN144W','Intel Core i5-11400H',17990000,'Windows 11 Home SL','15.6 inches','8GB',2,'images/lg3.png'),(7,'MSI GF63 Thin 11SC 664VN','Intel Core i5-11400H',14990000,'Windows 11 Home','15.6 inches','8GB',3,'images/lg8.png'),(8,'MSI Gaming Bravo 15 B7ED-010VN','AMD Ryzen 5 - 7535HS',16990000,'Windows 11 Home SL','15.6 inches','16GB',3,'images/lg2.png'),(9,'ASUS Gaming TUF FX506LHB-HN188W','Intel Core i5-10300H',14990000,'Windows 11 Home SL','15.6 inches','8GB',2,'images/lg3.png'),(10,'Asus TUF GAMING F15 FX506HF-HN014W','Intel Core i5-11400H',17490000,'Windows 11 Home','15.6 inches','8GB',2,'images/lg3.png'),(11,'Asus VivoBook Go 14 E1404FA-NK177W','AMD Ryzen 5 7520U',13290000,'Windows 11 Home','14 inches','16GB',2,'images/Laptop Asus VivoBook Go 14 E1404FA-NK177W.png'),(13,'Asus VivoBook Go 14 E1404FA-NK113W','AMD Ryzen 3 7320U',8990000,'Windows 11 Home','14 inches','8GB',2,'images/Laptop Asus VivoBook Go 14 E1404FA-NK177W.png'),(14,'HP Pavilion 15-EG2065TX 7C0Q3PA','Intel Core i5-1235U',15290000,'Windows 11 Home','15.6 inches','8GB',5,'images/Laptop HP Pavilion 15-EG2065TX 7C0Q3PA.png'),(15,'ASUS ZenBook UM3402YA-KM074W','AMD Ryzen 5 5625U Mobile',17990000,'Windows 11 Home SL','14 inches','8GB',2,'images/Asus_Zenbook.png'),(16,'MacBook Air 15 inch M2 2023 8GB 512GB','Apple M2',35590000,'Mac OS','15 inches','8GB',1,'images/Mac_air_m1.png'),(17,'MacBook Air 15 inch M2 2023 16GB 256GB','Apple M2',37190000,'Mac OS','15 inches','16GB',1,'images/Mac_air_m2.png'),(18,'Acer Nitro 5 Eagle AN515-57-5669 NH.QEHSV.001','Intel Core i5-11400H',17490000,'Windows 11 Home SL','15.6 inches','8GB',6,'images/Laptop Acer Swift 3 SF314-512-56QN.png'),(19,'MSI Cyborg 15 A12UCX-281VN','Intel Core i5-12450H',17490000,'Windows 11 Home','15.6 inches','8GB',3,'images/msi_cyborg.png'),(20,'Acer Nitro 5 Eagle AN515-57-53F9','Intel Core i5-11400',18290000,'Windows 11','15.6 inches','8GB',6,'images/lg5.png'),(22,'Dell Inspiron 3511 5829BLK','Intel Core i5-1135G7',13490000,'Windows 11 Home in S mode','15.6 inches','8GB',11,'images/Laptop Dell Inspiron 3511 5829BLK.png'),(24,'Dell Inspiron 14 2IN1 I7430-5800SLV RD7PJ','Intel Core i5-1335U',17490000,'Windows 11 Home 64-bit','14 inches','8GB',11,'images/Laptop Dell Inspiron 3511 5829BLK.png'),(25,'HP Pavilion 15-EG2065TX 7C0Q3PA','Intel Core i5-1235U',15290000,'Windows 11 Home','15.6 inches','8GB',5,'images/Laptop HP Pavilion 15-EG2065TX 7C0Q3PA.png'),(26,'Dell Inspiron 3511 5829BLK','Intel Core i5-1135G7',13490000,'Windows 11 Home in S mode','15.6 inches','8GB',11,'images/Laptop Dell Inspiron 3511 5829BLK.png'),(27,'Dell Inspiron 14 2IN1 I7430-5800SLV RD7PJ','Intel Core i5-1335U',17490000,'Windows 11 Home 64-bit','14 inches','8GB',11,'images/Laptop Dell Inspiron 3511 5829BLK.png'),(29,'Dell Inspiron 15 3520 WTPRT','Intel Core i5-1335U',12990000,'Windows 11','15.6 inches','8GB',11,'images/Laptop Dell Inspiron 3511 5829BLK.png'),(30,'HP Pavilion X360 14-EK1049TU 80R27PA','Intel Core i5 Raptor Lake - 1335U',21790000,'Windows 11 Home SL','14 inches','16GB',5,'images/Laptop HP Pavilion 15-EG2065TX 7C0Q3PA.png'),(31,'Apple MacBook Air M1 256GB 2020','Apple M1',19190000,'macOS Big Sur','13.3 inches','8GB',1,'images/Mac_air_m1.png'),(32,'Apple Macbook Pro 13 M2 2022 8GB 256GB','Apple M2',29790000,'MacOS','13 inches','8GB',1,'images/Mac_air_m2.png'),(33,'Macbook Pro 14 M1 Pro 10 CPU - 16 GPU 16GB 1TB 2021','M1 Pro/M1 Max 10',47990000,'MacOS','14.2 inches','16GB',1,'images/Mac_air_m1.png'),(34,'Laptop MSI Gaming GF63 Thin 11UC-1228VN','Intel Core i7-11800H',17990000,'Windows 11','15.6 inches','8GB',3,'images/lg8.png');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_category` (
  `product_id` bigint NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(11,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(22,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(35,1),(1,2),(6,2),(7,2),(8,2),(9,2),(10,2),(34,2),(11,3),(13,3),(14,3),(15,3),(1,4),(2,4),(3,4),(5,4),(8,4),(11,4),(16,4),(17,4),(18,4),(19,4),(20,4),(28,4),(2,5),(4,5),(11,5),(13,5),(22,5),(24,5),(25,5),(29,5),(35,5),(26,6),(27,6),(28,6),(29,6),(30,6);
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'customer'),(2,'admin');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `cart_id` bigint DEFAULT NULL,
  `total_price` bigint DEFAULT NULL,
  `total_quantity` bigint DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_id` (`cart_id`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (88,73,32480000,2,'2023-11-24 13:30:39',73);
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_detail`
--

DROP TABLE IF EXISTS `transaction_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction_detail` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint NOT NULL,
  `product_id` bigint DEFAULT NULL,
  `quantity` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_detail_ibfk_1` (`transaction_id`),
  KEY `fk_product_id` (`product_id`),
  CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=691 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_detail`
--

LOCK TABLES `transaction_detail` WRITE;
/*!40000 ALTER TABLE `transaction_detail` DISABLE KEYS */;
INSERT INTO `transaction_detail` VALUES (689,88,5,1),(690,88,6,1);
/*!40000 ALTER TABLE `transaction_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roleid` int NOT NULL,
  PRIMARY KEY (`id`,`roleid`),
  KEY `fk_user_role1_idx` (`roleid`),
  CONSTRAINT `fk_user_role1` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (73,'n','1','1','1','1','$2y$10$P9lJULjawrG5/HrQ26zEw.JyBbcQYaIwi3M6t7kOJYL5w9DGnJ99q',1),(74,'admin','admin','0000000000','My home','admin@gmail.com','$2y$10$mJfyU4/Gcvrb8QtbnNrz0e1RBCfHLlw5U7U50j96IogwRz9aeDdmS',2);
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

-- Dump completed on 2023-12-15 20:24:47
