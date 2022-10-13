DROP DATABASE IF EXISTS instasham;

CREATE DATABASE `instasham`;
USE instasham;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password_hash` varchar(72) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (5,'kkiiro13','$2y$10$eboW2MYytyXHw8KL5LNbN.bUMaxWXhpfjtXlWwMgLjoQbpGiYj.wW'),(6,'jodybingo','$2y$10$wW1OL5uIZQ7u.s64ghjLX.nPAIsOOiyeAbcTdaoCoYKcAea0RcXPW'),(7,'jgrospe','$2y$10$OsGoNWJAaqynzw25zvUt8.MzPkNjMWvhVJ6ta7TEBmrDCaxf1M9S.'),(8,'ErisWhistles','$2y$10$JpE8GG6s6SVfrjCuJjbhUej94HLoICDCIux/JYTpy9CnEmCgJ2amO'),(9,'Mathew','$2y$10$Pp/Oc2YpqfLZeSPoH331D.BtFOKOvqclGoG.ywwAHNZKccofylZci');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profile` (
  `profile_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `profile_pic` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`profile_id`),
  KEY `profile_to_user` (`user_id`),
  CONSTRAINT `profile_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (5,5,'kkiiro13','Kaolin','','Stacey','63448db3e0073.jpg','Hello all!\r\nMy name is Kaolin. Have a great day!'),(6,6,'jodybingo','','','','anonymous.png',''),(7,7,'jgrospe','jeffrey','','','anonymous.png',''),(8,8,'ErisWhistles','','','','anonymous.png',''),(9,9,'Mathew','Mathew','','Thompson','63461fe0a55ae.jpg','');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publication` (
  `publication_id` int NOT NULL AUTO_INCREMENT,
  `profile_id` int NOT NULL,
  `picture` varchar(20) NOT NULL,
  `caption` text,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`publication_id`),
  KEY `publication_to_profile` (`profile_id`),
  CONSTRAINT `publication_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publication`
--

LOCK TABLES `publication` WRITE;
/*!40000 ALTER TABLE `publication` DISABLE KEYS */;
INSERT INTO `publication` VALUES (5,5,'6341a22ee2363.jpg','Just look at this cutie!!!!!','2022-10-08 12:15:42'),(6,7,'6341acb5dec23.jpg','My first post','2022-10-08 13:00:37'),(7,5,'6341b5f85ff44.jpg','Gazelle is gorgeous','2022-10-08 13:40:08'),(8,5,'6341c2e38ec2a.jpg','Eris is so cute hehe','2022-10-08 14:35:15'),(9,5,'6341c2ea96ee3.jpg','cake looks delicious','2022-10-08 14:35:22'),(10,5,'6341c2f4b5eb0.jpg','','2022-10-08 14:35:32'),(11,5,'6341f5f9c7bbf.jpg','look at her ;-; she&#039;s so cute hehe :D','2022-10-08 18:13:13'),(12,8,'634584e594813.png','Cool Mc House','2022-10-11 10:59:49'),(13,9,'6346203a1fe7c.jpg','A LUCIOUS BANANA','2022-10-11 22:02:34'),(14,9,'634620cb612b7.jpg','SQUIDWARDS HOPES AND DREAMS','2022-10-11 22:04:59'),(15,8,'6346216d8c4b9.jpg','MY GOODNESS!!','2022-10-11 22:07:41');
/*!40000 ALTER TABLE `publication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `publication_id` int NOT NULL,
  `profile_id` int NOT NULL,
  `comment` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comment_to_publication` (`publication_id`),
  KEY `comment_to_profile` (`profile_id`),
  CONSTRAINT `comment_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE,
  CONSTRAINT `comment_to_publication` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (6,5,6,'Cool!','2022-10-08 12:20:04'),(7,11,5,'omgggg','2022-10-08 18:47:00'),(8,9,5,'yummyyyy','2022-10-09 13:26:40'),(9,12,8,'I love this house','2022-10-11 11:00:07'),(11,9,8,'This was my birthday cake &lt;3','2022-10-11 11:22:01'),(12,12,5,'wowww','2022-10-11 18:05:31'),(13,10,5,'Aikooo','2022-10-11 18:06:32'),(16,11,5,'cute','2022-10-11 18:31:39'),(17,13,9,'I WOULD LOVE THIS INSIDE MY BIRTHDAY CAKE','2022-10-11 22:03:02'),(25,13,8,'Eris likes your banana','2022-10-11 22:05:58');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `like`
--

DROP TABLE IF EXISTS `like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `like` (
  `publication_id` int NOT NULL,
  `profile_id` int NOT NULL,
  PRIMARY KEY (`publication_id`,`profile_id`),
  KEY `like_to_publication` (`publication_id`),
  KEY `like_to_profile` (`profile_id`),
  CONSTRAINT `like_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`),
  CONSTRAINT `like_to_publication` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like`
--

LOCK TABLES `like` WRITE;
/*!40000 ALTER TABLE `like` DISABLE KEYS */;
INSERT INTO `like` VALUES (5,5),(5,6),(6,5),(7,5),(8,5),(9,5),(10,5),(12,5),(12,8);
/*!40000 ALTER TABLE `like` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `following`
--

DROP TABLE IF EXISTS `following`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `following` (
  `profile_id` int NOT NULL,
  `profile_id_following` int NOT NULL,
  PRIMARY KEY (`profile_id`,`profile_id_following`),
  KEY `following_to_profile` (`profile_id`),
  KEY `following_to_profile_following` (`profile_id_following`),
  CONSTRAINT `following_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`),
  CONSTRAINT `following_to_profile_following` FOREIGN KEY (`profile_id_following`) REFERENCES `profile` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `following`
--

LOCK TABLES `following` WRITE;
/*!40000 ALTER TABLE `following` DISABLE KEYS */;
INSERT INTO `following` VALUES (5,6),(5,7),(5,8),(5,9),(6,5),(7,5),(9,5);
/*!40000 ALTER TABLE `following` ENABLE KEYS */;
UNLOCK TABLES;