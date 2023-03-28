DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_usermeta`
--

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'nickname','timothy_admin'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'syntax_highlighting','true'),(7,1,'comment_shortcuts','false'),(8,1,'admin_color','fresh'),(9,1,'use_ssl','0'),(10,1,'show_admin_bar_front','true'),(11,1,'locale',''),(12,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(13,1,'wp_user_level','10'),(14,1,'dismissed_wp_pointers',''),(15,1,'show_welcome_panel','1'),(16,1,'session_tokens','a:2:{s:64:\"0493a8e073015747bbd51d3f1d407547cc60fc85296eb85f17febddbedb5d666\";a:4:{s:10:\"expiration\";i:1679944595;s:2:\"ip\";s:15:\"178.238.175.149\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36\";s:5:\"login\";i:1679771795;}s:64:\"0b38ece6b57d00202a831ef0de5c69a196b6627ccaac8f45ca3780b48b9dc34d\";a:4:{s:10:\"expiration\";i:1680013676;s:2:\"ip\";s:15:\"178.238.175.149\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36\";s:5:\"login\";i:1679840876;}}'),(17,1,'wp_dashboard_quick_press_last_post_id','11'),(18,1,'community-events-location','a:1:{s:2:\"ip\";s:13:\"178.238.175.0\";}'),(19,1,'wp_persisted_preferences','a:3:{s:14:\"core/edit-post\";a:2:{s:26:\"isComplementaryAreaVisible\";b:1;s:12:\"welcomeGuide\";b:0;}s:9:\"_modified\";s:24:\"2023-03-19T11:18:30.939Z\";s:14:\"core/edit-site\";a:1:{s:12:\"welcomeGuide\";b:0;}}'),(20,2,'nickname','stephanie_wyss'),(21,2,'first_name','Stephanie'),(22,2,'last_name','Wyss'),(23,2,'description',''),(24,2,'rich_editing','true'),(25,2,'syntax_highlighting','true'),(26,2,'comment_shortcuts','false'),(27,2,'admin_color','fresh'),(28,2,'use_ssl','0'),(29,2,'show_admin_bar_front','true'),(30,2,'locale',''),(31,2,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(32,2,'wp_user_level','10'),(33,2,'dismissed_wp_pointers',''),(34,2,'session_tokens','a:1:{s:64:\"fd166fab6fc3997ef19d7985ebbe9a2d6d61fc45b3d01fb16941a2089462ff14\";a:4:{s:10:\"expiration\";i:1680534283;s:2:\"ip\";s:11:\"84.73.4.183\";s:2:\"ua\";s:80:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0\";s:5:\"login\";i:1679324683;}}'),(35,2,'wp_dashboard_quick_press_last_post_id','8'),(36,2,'community-events-location','a:1:{s:2:\"ip\";s:9:\"84.73.4.0\";}');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_users`
--

DROP TABLE IF EXISTS `wp_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_users`
--

LOCK TABLES `wp_users` WRITE;
/*!40000 ALTER TABLE `wp_users` DISABLE KEYS */;
INSERT INTO `wp_users` VALUES (1,'timothy_admin','$P$BiaRSrcjnxFsqVqh0dvazy/tlgnlpd.','timothy_admin','timothy@kpunkt.ch','https://wp.kpunkt.ch','2023-03-19 11:14:15','1679324534:$P$BCX/cbWaU3V.MJ/NcuYfOZH7KIKe7g/',0,'timothy_admin'),(2,'stephanie_wyss','$P$Bqotm.5712XDkXPGO9jKrIfBLLXDma0','stephanie_wyss','stephanie.wyss@klima-allianz.ch','','2023-03-19 11:42:25','',0,'Stephanie Wyss');
