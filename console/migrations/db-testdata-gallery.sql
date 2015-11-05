/* ================================ Template Basic ============================================== */

--
-- Dumping data for table `cmg_core_file`
--

LOCK TABLES `cmg_core_file` WRITE;
/*!40000 ALTER TABLE `cmg_core_file` DISABLE KEYS */;
INSERT INTO `cmg_core_file` VALUES 
	(1,1,NULL,'Item 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','4f9dd9e0a7471181b4b7a4729407d96a','jpg','gallery',0,NULL,'2015-08-16/gallery/4f9dd9e0a7471181b4b7a4729407d96a.jpg','2015-08-16/gallery/4f9dd9e0a7471181b4b7a4729407d96a-thumb.jpg','Item 1','','2015-08-16 16:50:28','2015-08-16 16:50:28'),
	(2,1,NULL,'Item 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','925e82814e15d5e9832c74f75e594418','JPG','gallery',0,NULL,'2015-08-16/gallery/925e82814e15d5e9832c74f75e594418.JPG','2015-08-16/gallery/925e82814e15d5e9832c74f75e594418-thumb.JPG','Item 2','','2015-08-16 16:50:50','2015-08-16 16:50:50'),
	(3,1,NULL,'Item 3','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','ec7435a559fff465d91e1e959f025942','JPG','gallery',0,NULL,'2015-08-16/gallery/ec7435a559fff465d91e1e959f025942.JPG','2015-08-16/gallery/ec7435a559fff465d91e1e959f025942-thumb.JPG','Item 3','','2015-08-16 16:51:04','2015-08-16 16:51:04'),
	(4,1,NULL,'Item 4','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','d998309764ae3d095760bb152098b0f5','jpg','gallery',0,NULL,'2015-08-16/gallery/d998309764ae3d095760bb152098b0f5.jpg','2015-08-16/gallery/d998309764ae3d095760bb152098b0f5-thumb.jpg','Item 4','','2015-08-16 16:51:22','2015-08-16 16:51:22'),
	(5,1,NULL,'Item 5','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','ea69dce0c8624a6b4b761243ef5975d7','JPG','gallery',0,NULL,'2015-08-16/gallery/ea69dce0c8624a6b4b761243ef5975d7.JPG','2015-08-16/gallery/ea69dce0c8624a6b4b761243ef5975d7-thumb.JPG','Item 5','','2015-08-16 16:51:44','2015-08-16 16:52:12'),
	(6,1,NULL,'Item 6','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....','d2935c354804cd46b07c03f0f06db069','jpg','gallery',0,NULL,'2015-08-16/gallery/d2935c354804cd46b07c03f0f06db069.jpg','2015-08-16/gallery/d2935c354804cd46b07c03f0f06db069-thumb.jpg','Item 6','','2015-08-16 16:52:40','2015-08-16 16:52:40');
/*!40000 ALTER TABLE `cmg_core_file` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Dumping data for table `cmg_core_gallery`
--

LOCK TABLES `cmg_core_gallery` WRITE;
/*!40000 ALTER TABLE `cmg_core_gallery` DISABLE KEYS */;
INSERT INTO `cmg_core_gallery` VALUES (1,1,NULL,'main','main','About Us','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2015-08-16 16:48:32','2015-08-16 16:48:32');
/*!40000 ALTER TABLE `cmg_core_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cmg_core_model_file`
--

LOCK TABLES `cmg_core_model_file` WRITE;
/*!40000 ALTER TABLE `cmg_core_model_file` DISABLE KEYS */;
INSERT INTO `cmg_core_model_file` VALUES (1,1,1,'gallery',0),(2,2,1,'gallery',0),(3,3,1,'gallery',0),(4,4,1,'gallery',0),(5,5,1,'gallery',0),(6,6,1,'gallery',0);
/*!40000 ALTER TABLE `cmg_core_model_file` ENABLE KEYS */;
UNLOCK TABLES;