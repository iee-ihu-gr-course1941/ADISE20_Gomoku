-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: gomoku
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `board` (
  `x` int(20) NOT NULL,
  `y` int(20) NOT NULL,
  `piece_color` enum('B','W') DEFAULT NULL,
  PRIMARY KEY (`x`,`y`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (1,1,NULL),(1,2,NULL),(1,3,NULL),(1,4,NULL),(1,5,NULL),(1,6,NULL),(1,7,NULL),(1,8,NULL),(1,9,NULL),(1,10,NULL),(1,11,NULL),(1,12,NULL),(1,13,NULL),(1,14,NULL),(1,15,NULL),(2,1,NULL),(2,2,NULL),(2,3,NULL),(2,4,NULL),(2,5,NULL),(2,6,NULL),(2,7,NULL),(2,8,NULL),(2,9,NULL),(2,10,NULL),(2,11,NULL),(2,12,NULL),(2,13,NULL),(2,14,NULL),(2,15,NULL),(3,1,NULL),(3,2,NULL),(3,3,NULL),(3,4,NULL),(3,5,NULL),(3,6,NULL),(3,7,NULL),(3,8,NULL),(3,9,NULL),(3,10,NULL),(3,11,NULL),(3,12,NULL),(3,13,NULL),(3,14,NULL),(3,15,NULL),(4,1,NULL),(4,2,NULL),(4,3,NULL),(4,4,NULL),(4,5,NULL),(4,6,NULL),(4,7,NULL),(4,8,NULL),(4,9,NULL),(4,10,NULL),(4,11,NULL),(4,12,NULL),(4,13,NULL),(4,14,NULL),(4,15,NULL),(5,1,NULL),(5,2,NULL),(5,3,NULL),(5,4,NULL),(5,5,NULL),(5,6,NULL),(5,7,NULL),(5,8,NULL),(5,9,NULL),(5,10,NULL),(5,11,NULL),(5,12,NULL),(5,13,NULL),(5,14,NULL),(5,15,NULL),(6,1,NULL),(6,2,NULL),(6,3,NULL),(6,4,NULL),(6,5,NULL),(6,6,NULL),(6,7,NULL),(6,8,NULL),(6,9,NULL),(6,10,NULL),(6,11,NULL),(6,12,NULL),(6,13,NULL),(6,14,NULL),(6,15,NULL),(7,1,NULL),(7,2,NULL),(7,3,NULL),(7,4,NULL),(7,5,NULL),(7,6,NULL),(7,7,NULL),(7,8,NULL),(7,9,NULL),(7,10,NULL),(7,11,NULL),(7,12,NULL),(7,13,NULL),(7,14,NULL),(7,15,NULL),(8,1,NULL),(8,2,NULL),(8,3,NULL),(8,4,NULL),(8,5,NULL),(8,6,NULL),(8,7,NULL),(8,8,NULL),(8,9,NULL),(8,10,NULL),(8,11,NULL),(8,12,NULL),(8,13,NULL),(8,14,NULL),(8,15,NULL),(9,1,NULL),(9,2,NULL),(9,3,NULL),(9,4,NULL),(9,5,NULL),(9,6,NULL),(9,7,NULL),(9,8,NULL),(9,9,NULL),(9,10,NULL),(9,11,NULL),(9,12,NULL),(9,13,NULL),(9,14,NULL),(9,15,NULL),(10,1,NULL),(10,2,NULL),(10,3,NULL),(10,4,NULL),(10,5,NULL),(10,6,NULL),(10,7,NULL),(10,8,NULL),(10,9,NULL),(10,10,NULL),(10,11,NULL),(10,12,NULL),(10,13,NULL),(10,14,NULL),(10,15,NULL),(11,1,NULL),(11,2,NULL),(11,3,NULL),(11,4,NULL),(11,5,NULL),(11,6,NULL),(11,7,NULL),(11,8,NULL),(11,9,NULL),(11,10,NULL),(11,11,NULL),(11,12,NULL),(11,13,NULL),(11,14,NULL),(11,15,NULL),(12,1,NULL),(12,2,NULL),(12,3,NULL),(12,4,NULL),(12,5,NULL),(12,6,NULL),(12,7,NULL),(12,8,NULL),(12,9,NULL),(12,10,NULL),(12,11,NULL),(12,12,NULL),(12,13,NULL),(12,14,NULL),(12,15,NULL),(13,1,NULL),(13,2,NULL),(13,3,NULL),(13,4,NULL),(13,5,NULL),(13,6,NULL),(13,7,NULL),(13,8,NULL),(13,9,NULL),(13,10,NULL),(13,11,NULL),(13,12,NULL),(13,13,NULL),(13,14,NULL),(13,15,NULL),(14,1,NULL),(14,2,NULL),(14,3,NULL),(14,4,NULL),(14,5,NULL),(14,6,NULL),(14,7,NULL),(14,8,NULL),(14,9,NULL),(14,10,NULL),(14,11,NULL),(14,12,NULL),(14,13,NULL),(14,14,NULL),(14,15,NULL),(15,1,NULL),(15,2,NULL),(15,3,NULL),(15,4,NULL),(15,5,NULL),(15,6,NULL),(15,7,NULL),(15,8,NULL),(15,9,NULL),(15,10,NULL),(15,11,NULL),(15,12,NULL),(15,13,NULL),(15,14,NULL),(15,15,NULL);
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `board_empty`
--

DROP TABLE IF EXISTS `board_empty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `board_empty` (
  `x` int(20) NOT NULL,
  `y` int(20) NOT NULL,
  `piece_color` enum('B','W') NOT NULL,
  PRIMARY KEY (`x`,`y`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board_empty`
--

LOCK TABLES `board_empty` WRITE;
/*!40000 ALTER TABLE `board_empty` DISABLE KEYS */;
/*!40000 ALTER TABLE `board_empty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_status`
--

DROP TABLE IF EXISTS `game_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_status` (
  `status` enum('not active','initialized','started','ended','aborded') NOT NULL DEFAULT 'not active',
  `p_turn` enum('B','W') DEFAULT NULL,
  `result` enum('W','B','D') DEFAULT NULL,
  `last_change` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_status`
--

LOCK TABLES `game_status` WRITE;
/*!40000 ALTER TABLE `game_status` DISABLE KEYS */;
INSERT INTO `game_status` VALUES ('aborded',NULL,'W','2021-01-06 13:08:40');
/*!40000 ALTER TABLE `game_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `username` varchar(20) DEFAULT NULL,
  `piece_color` enum('B','W') NOT NULL,
  `token` varchar(32) DEFAULT NULL,
  `last_change` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`piece_color`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES ('user','B','72c5df669c42788328b4b786dbad061b','2021-01-06 12:24:24'),('4541','W','4333b554fb1ed51f698f6dfb04fa95b6','2021-01-06 12:24:31');
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gomoku'
--
/*!50003 DROP PROCEDURE IF EXISTS `clean_board` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `clean_board`()
BEGIN
/*REPLACE INTO board SELECT * FROM board_empty;*/
    UPDATE `board` SET `piece_color`=null;
		UPDATE `players` SET `username`=null, `token`=null;
		UPDATE `game_status` SET `status`='not active',`p_turn`=null, `result`=null;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `move_piece` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `move_piece`(`x1` INT, `y1` INT, `color` TEXT)
do_move:
BEGIN
if (SELECT piece_color FROM `board` WHERE X=x1 AND Y=y1)IS NULL THEN
UPDATE `board` SET piece_color=color WHERE X=x1 AND Y=y1;
UPDATE `game_status` SET p_turn=if(color='W','B','W');
LEAVE do_move;
END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-06 21:48:34
