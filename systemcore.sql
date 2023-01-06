-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: systemcore
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

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
-- Table structure for table `systemAction`
--

DROP TABLE IF EXISTS `systemAction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemAction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemAction`
--

LOCK TABLES `systemAction` WRITE;
/*!40000 ALTER TABLE `systemAction` DISABLE KEYS */;
INSERT INTO `systemAction` VALUES (1,'CREATE','ALTA DE REGISTRO VIA WEB'),(2,'READ','LECTURA O BUSQUEDA VIA WEB'),(3,'UPDATE','CAMBIO VIA WEB'),(4,'DELETE','BAJA DE REGISTRO VIA WEB'),(5,'GET','GET FROM SERVICE'),(6,'POST','POST FROM SERVICE'),(7,'PUT','PUT FROM SERVICE'),(8,'PATCH','PATCH FROM SERVICE'),(9,'DELETE','DELETE FROM SERVICE'),(10,'GENERATE DOCUMENT','GENERATE DOCUMENT'),(11,'SEND EMAIL','SEND EMAIL'),(12,'ADD REPO','ADD REPO'),(13,'UPDATE REPO','UPDATE REPO'),(14,'DELETE REPO','DELETE REPO'),(15,'CHECK IN','CHECK IN'),(16,'CHECK OUT','CHECK OUT'),(17,'PASSWORD RESET','PASSWORD RESET'),(18,'SEND WHATSAPP','SEND WHATSAPP'),(19,'LOG IN','VIA WEB'),(20,'LOGOUT','VIA WEB');
/*!40000 ALTER TABLE `systemAction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemConfig`
--

DROP TABLE IF EXISTS `systemConfig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemConfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `configKey` varchar(32) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `value` varchar(32) DEFAULT NULL,
  `tipeofHTML` varchar(16) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clave_index` (`configKey`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemConfig`
--

LOCK TABLES `systemConfig` WRITE;
/*!40000 ALTER TABLE `systemConfig` DISABLE KEYS */;
INSERT INTO `systemConfig` VALUES (1,'adm_cost','Costo de adminsitración y operación','10',NULL,1),(2,'social_charges','Cargos sociales','40',NULL,1),(3,'commission','Comisión','.99',NULL,1),(4,'adm_cost_ideal','Costo de adminsitración y operación ideal','20',NULL,1),(6,'operative_cost','Costo operativo','15',NULL,NULL);
/*!40000 ALTER TABLE `systemConfig` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemIcon`
--

DROP TABLE IF EXISTS `systemIcon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemIcon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=677 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemIcon`
--

LOCK TABLES `systemIcon` WRITE;
/*!40000 ALTER TABLE `systemIcon` DISABLE KEYS */;
INSERT INTO `systemIcon` VALUES (1,'fa fa-fonticons'),(2,'fa fa-black-tie'),(3,'fa fa-vimeo'),(4,'fa fa-houzz'),(5,'fa fa-commenting-o'),(6,'fa fa-commenting'),(7,'fa fa-map'),(8,'fa fa-map-o'),(9,'fa fa-map-signs'),(10,'fa fa-map-pin'),(11,'fa fa-industry'),(12,'fa fa-calendar-check-o'),(13,'fa fa-calendar-times-o'),(14,'fa fa-calendar-minus-o'),(15,'fa fa-calendar-plus-o'),(16,'fa fa-contao'),(17,'fa fa-television'),(18,'fa fa-tv'),(19,'fa fa-internet-explorer'),(20,'fa fa-opera'),(21,'fa fa-firefox'),(22,'fa fa-chrome'),(23,'fa fa-safari'),(24,'fa fa-wikipedia-w'),(25,'fa fa-get-pocket'),(26,'fa fa-odnoklassniki-square'),(27,'fa fa-odnoklassniki'),(28,'fa fa-tripadvisor'),(29,'fa fa-gg-circle'),(30,'fa fa-gg'),(31,'fa fa-creative-commons'),(32,'fa fa-registered'),(33,'fa fa-trademark'),(34,'fa fa-hand-peace-o'),(35,'fa fa-hand-pointer-o'),(36,'fa fa-hand-spock-o'),(37,'fa fa-hand-lizard-o'),(38,'fa fa-hand-scissors-o'),(39,'fa fa-hand-paper-o'),(40,'fa fa-hand-stop-o'),(41,'fa fa-hand-grab-o'),(42,'fa fa-hand-rock-o'),(43,'fa fa-hourglass'),(44,'fa fa-hourglass-3'),(45,'fa fa-hourglass-end'),(46,'fa fa-hourglass-2'),(47,'fa fa-hourglass-half'),(48,'fa fa-hourglass-1'),(49,'fa fa-hourglass-start'),(50,'fa fa-hourglass-o'),(51,'fa fa-balance-scale'),(52,'fa fa-clone'),(53,'fa fa-cc-diners-club'),(54,'fa fa-cc-jcb'),(55,'fa fa-sticky-note-o'),(56,'fa fa-sticky-note'),(57,'fa fa-object-ungroup'),(58,'fa fa-object-group'),(59,'fa fa-i-cursor'),(60,'fa fa-mouse-pointer'),(61,'fa fa-battery-0'),(62,'fa fa-battery-empty'),(63,'fa fa-battery-1'),(64,'fa fa-battery-quarter'),(65,'fa fa-battery-2'),(66,'fa fa-battery-half'),(67,'fa fa-battery-3'),(68,'fa fa-battery-three-quarters'),(69,'fa fa-battery-4'),(70,'fa fa-battery-full'),(71,'fa fa-expeditedssl'),(72,'fa fa-opencart'),(73,'fa fa-optin-monster'),(74,'fa fa-medium'),(75,'fa fa-subway'),(76,'fa fa-train'),(77,'fa fa-viacoin'),(78,'fa fa-bed'),(79,'fa fa-hotel'),(80,'fa fa-user-times'),(81,'fa fa-user-plus'),(82,'fa fa-server'),(83,'fa fa-whatsapp'),(84,'fa fa-pinterest-p'),(85,'fa fa-facebook-official'),(86,'fa fa-genderless'),(87,'fa fa-neuter'),(88,'fa fa-mars-stroke-h'),(89,'fa fa-mars-stroke-v'),(90,'fa fa-mars-stroke'),(91,'fa fa-venus-mars'),(92,'fa fa-mars-double'),(93,'fa fa-venus-double'),(94,'fa fa-transgender-alt'),(95,'fa fa-intersex'),(96,'fa fa-transgender'),(97,'fa fa-mercury'),(98,'fa fa-mars'),(99,'fa fa-venus'),(100,'fa fa-heartbeat'),(101,'fa fa-street-view'),(102,'fa fa-motorcycle'),(103,'fa fa-user-secret'),(104,'fa fa-ship'),(105,'fa fa-diamond'),(106,'fa fa-cart-arrow-down'),(107,'fa fa-cart-plus'),(108,'fa fa-skyatlas'),(109,'fa fa-simplybuilt'),(110,'fa fa-shirtsinbulk'),(111,'fa fa-sellsy'),(112,'fa fa-leanpub'),(113,'fa fa-forumbee'),(114,'fa fa-dashcube'),(115,'fa fa-connectdevelop'),(116,'fa fa-buysellads'),(117,'fa fa-meanpath'),(118,'fa fa-ils'),(119,'fa fa-shekel'),(120,'fa fa-sheqel'),(121,'fa fa-cc'),(122,'fa fa-angellist'),(123,'fa fa-ioxhost'),(124,'fa fa-bus'),(125,'fa fa-bicycle'),(126,'fa fa-toggle-on'),(127,'fa fa-toggle-off'),(128,'fa fa-lastfm-square'),(129,'fa fa-lastfm'),(130,'fa fa-line-chart'),(131,'fa fa-pie-chart'),(132,'fa fa-area-chart'),(133,'fa fa-birthday-cake'),(134,'fa fa-paint-brush'),(135,'fa fa-eyedropper'),(136,'fa fa-at'),(137,'fa fa-copyright'),(138,'fa fa-trash'),(139,'fa fa-bell-slash-o'),(140,'fa fa-bell-slash'),(141,'fa fa-cc-stripe'),(142,'fa fa-cc-paypal'),(143,'fa fa-cc-amex'),(144,'fa fa-cc-discover'),(145,'fa fa-cc-mastercard'),(146,'fa fa-cc-visa'),(147,'fa fa-google-wallet'),(148,'fa fa-paypal'),(149,'fa fa-calculator'),(150,'fa fa-wifi'),(151,'fa fa-newspaper-o'),(152,'fa fa-twitch'),(153,'fa fa-slideshare'),(154,'fa fa-plug'),(155,'fa fa-binoculars'),(156,'fa fa-tty'),(157,'fa fa-futbol-o'),(158,'fa fa-soccer-ball-o'),(159,'fa fa-bomb'),(160,'fa fa-share-alt-square'),(161,'fa fa-share-alt'),(162,'fa fa-sliders'),(163,'fa fa-paragraph'),(164,'fa fa-header'),(165,'fa fa-circle-thin'),(166,'fa fa-history'),(167,'fa fa-paper-plane-o'),(168,'fa fa-send-o'),(169,'fa fa-paper-plane'),(170,'fa fa-send'),(171,'fa fa-wechat'),(172,'fa fa-weixin'),(173,'fa fa-qq'),(174,'fa fa-tencent-weibo'),(175,'fa fa-hacker-news'),(176,'fa fa-git'),(177,'fa fa-git-square'),(178,'fa fa-empire'),(179,'fa fa-ge'),(180,'fa fa-ra'),(181,'fa fa-rebel'),(182,'fa fa-circle-o-notch'),(183,'fa fa-life-bouy'),(184,'fa fa-life-buoy'),(185,'fa fa-life-ring'),(186,'fa fa-life-saver'),(187,'fa fa-support'),(188,'fa fa-jsfiddle'),(189,'fa fa-codepen'),(190,'fa fa-vine'),(191,'fa fa-file-code-o'),(192,'fa fa-file-movie-o'),(193,'fa fa-file-video-o'),(194,'fa fa-file-audio-o'),(195,'fa fa-file-sound-o'),(196,'fa fa-file-archive-o'),(197,'fa fa-file-zip-o'),(198,'fa fa-file-image-o'),(199,'fa fa-file-photo-o'),(200,'fa fa-file-picture-o'),(201,'fa fa-file-powerpoint-o'),(202,'fa fa-file-excel-o'),(203,'fa fa-file-word-o'),(204,'fa fa-file-pdf-o'),(205,'fa fa-database'),(206,'fa fa-soundcloud'),(207,'fa fa-deviantart'),(208,'fa fa-spotify'),(209,'fa fa-tree'),(210,'fa fa-cab'),(211,'fa fa-taxi'),(212,'fa fa-automobile'),(213,'fa fa-car'),(214,'fa fa-recycle'),(215,'fa fa-steam-square'),(216,'fa fa-steam'),(217,'fa fa-behance-square'),(218,'fa fa-behance'),(219,'fa fa-cubes'),(220,'fa fa-cube'),(221,'fa fa-spoon'),(222,'fa fa-paw'),(223,'fa fa-child'),(224,'fa fa-building'),(225,'fa fa-fax'),(226,'fa fa-language'),(227,'fa fa-joomla'),(228,'fa fa-drupal'),(229,'fa fa-pied-piper-alt'),(230,'fa fa-pied-piper'),(231,'fa fa-digg'),(232,'fa fa-delicious'),(233,'fa fa-stumbleupon'),(234,'fa fa-stumbleupon-circle'),(235,'fa fa-reddit-square'),(236,'fa fa-reddit'),(237,'fa fa-google'),(238,'fa fa-graduation-cap'),(239,'fa fa-mortar-board'),(240,'fa fa-bank'),(241,'fa fa-institution'),(242,'fa fa-university'),(243,'fa fa-openid'),(244,'fa fa-wordpress'),(245,'fa fa-envelope-square'),(246,'fa fa-slack'),(247,'fa fa-space-shuttle'),(248,'fa fa-plus-square-o'),(249,'fa fa-try'),(250,'fa fa-turkish-lira'),(251,'fa fa-vimeo-square'),(252,'fa fa-wheelchair'),(253,'fa fa-dot-circle-o'),(254,'fa fa-caret-square-o-left'),(255,'fa fa-toggle-left'),(256,'fa fa-arrow-circle-o-left'),(257,'fa fa-arrow-circle-o-right'),(258,'fa fa-stack-exchange'),(259,'fa fa-pagelines'),(260,'fa fa-rouble'),(261,'fa fa-rub'),(262,'fa fa-ruble'),(263,'fa fa-youtube-square'),(264,'fa fa-youtube-play'),(265,'fa fa-youtube'),(266,'fa fa-yen'),(267,'fa fa-yelp'),(268,'fa fa-yc-square'),(269,'fa fa-yc'),(270,'fa fa-yahoo'),(271,'fa fa-y-combinator-square'),(272,'fa fa-y-combinator'),(273,'fa fa-xing-square'),(274,'fa fa-xing'),(275,'fa fa-wrench'),(276,'fa fa-won'),(277,'fa fa-windows'),(278,'fa fa-weibo'),(279,'fa fa-warning'),(280,'fa fa-volume-up'),(281,'fa fa-volume-off'),(282,'fa fa-volume-down'),(283,'fa fa-vk'),(284,'fa fa-video-camera'),(285,'fa fa-users'),(286,'fa fa-user-md'),(287,'fa fa-user'),(288,'fa fa-usd'),(289,'fa fa-upload'),(290,'fa fa-unsorted'),(291,'fa fa-unlock-alt'),(292,'fa fa-unlock'),(293,'fa fa-unlink'),(294,'fa fa-undo'),(295,'fa fa-underline'),(296,'fa fa-umbrella'),(297,'fa fa-twitter-square'),(298,'fa fa-twitter'),(299,'fa fa-tumblr-square'),(300,'fa fa-tumblr'),(301,'fa fa-truck'),(302,'fa fa-trophy'),(303,'fa fa-trello'),(304,'fa fa-trash-o'),(305,'fa fa-toggle-up'),(306,'fa fa-toggle-right'),(307,'fa fa-toggle-down'),(308,'fa fa-tint'),(309,'fa fa-times-circle-o'),(310,'fa fa-times-circle'),(311,'fa fa-times'),(312,'fa fa-ticket'),(313,'fa fa-thumbs-up'),(314,'fa fa-thumbs-o-up'),(315,'fa fa-thumbs-o-down'),(316,'fa fa-thumbs-down'),(317,'fa fa-thumb-tack'),(318,'fa fa-th-list'),(319,'fa fa-th-large'),(320,'fa fa-th'),(321,'fa fa-text-width'),(322,'fa fa-text-height'),(323,'fa fa-terminal'),(324,'fa fa-tasks'),(325,'fa fa-tags'),(326,'fa fa-tag'),(327,'fa fa-tachometer'),(328,'fa fa-tablet'),(329,'fa fa-table'),(330,'fa fa-superscript'),(331,'fa fa-sun-o'),(332,'fa fa-suitcase'),(333,'fa fa-subscript'),(334,'fa fa-strikethrough'),(335,'fa fa-stop'),(336,'fa fa-stethoscope'),(337,'fa fa-step-forward'),(338,'fa fa-step-backward'),(339,'fa fa-star-o'),(340,'fa fa-star-half-o'),(341,'fa fa-star-half-full'),(342,'fa fa-star-half-empty'),(343,'fa fa-star-half'),(344,'fa fa-star'),(345,'fa fa-stack-overflow'),(346,'fa fa-square-o'),(347,'fa fa-square'),(348,'fa fa-spinner'),(349,'fa fa-sort-up'),(350,'fa fa-sort-numeric-desc'),(351,'fa fa-sort-numeric-asc'),(352,'fa fa-sort-down'),(353,'fa fa-sort-desc'),(354,'fa fa-sort-asc'),(355,'fa fa-sort-amount-desc'),(356,'fa fa-sort-amount-asc'),(357,'fa fa-sort-alpha-desc'),(358,'fa fa-sort-alpha-asc'),(359,'fa fa-sort'),(360,'fa fa-smile-o'),(361,'fa fa-skype'),(362,'fa fa-sitemap'),(363,'fa fa-signal'),(364,'fa fa-sign-out'),(365,'fa fa-sign-in'),(366,'fa fa-shopping-cart'),(367,'fa fa-shield'),(368,'fa fa-share-square-o'),(369,'fa fa-share-square'),(370,'fa fa-share'),(371,'fa fa-search-plus'),(372,'fa fa-search-minus'),(373,'fa fa-search'),(374,'fa fa-scissors'),(375,'fa fa-save'),(376,'fa fa-rupee'),(377,'fa fa-rss-square'),(378,'fa fa-rss'),(379,'fa fa-rotate-right'),(380,'fa fa-rotate-left'),(381,'fa fa-rocket'),(382,'fa fa-road'),(383,'fa fa-rmb'),(384,'fa fa-retweet'),(385,'fa fa-reply-all'),(386,'fa fa-reply'),(387,'fa fa-repeat'),(388,'fa fa-reorder'),(389,'fa fa-renren'),(390,'fa fa-remove'),(391,'fa fa-refresh'),(392,'fa fa-random'),(393,'fa fa-quote-right'),(394,'fa fa-quote-left'),(395,'fa fa-question-circle'),(396,'fa fa-question'),(397,'fa fa-qrcode'),(398,'fa fa-puzzle-piece'),(399,'fa fa-print'),(400,'fa fa-power-off'),(401,'fa fa-plus-square'),(402,'fa fa-plus-circle'),(403,'fa fa-plus'),(404,'fa fa-play-circle-o'),(405,'fa fa-play-circle'),(406,'fa fa-play'),(407,'fa fa-plane'),(408,'fa fa-pinterest-square'),(409,'fa fa-pinterest'),(410,'fa fa-picture-o'),(411,'fa fa-photo'),(412,'fa fa-phone-square'),(413,'fa fa-phone'),(414,'fa fa-pencil-square-o'),(415,'fa fa-pencil-square'),(416,'fa fa-pencil'),(417,'fa fa-pause'),(418,'fa fa-paste'),(419,'fa fa-paperclip'),(420,'fa fa-outdent'),(421,'fa fa-navicon'),(422,'fa fa-music'),(423,'fa fa-moon-o'),(424,'fa fa-money'),(425,'fa fa-mobile-phone'),(426,'fa fa-mobile'),(427,'fa fa-minus-square-o'),(428,'fa fa-minus-square'),(429,'fa fa-minus-circle'),(430,'fa fa-minus'),(431,'fa fa-microphone-slash'),(432,'fa fa-microphone'),(433,'fa fa-meh-o'),(434,'fa fa-medkit'),(435,'fa fa-maxcdn'),(436,'fa fa-map-marker'),(437,'fa fa-male'),(438,'fa fa-mail-reply-all'),(439,'fa fa-mail-reply'),(440,'fa fa-mail-forward'),(441,'fa fa-magnet'),(442,'fa fa-magic'),(443,'fa fa-long-arrow-up'),(444,'fa fa-long-arrow-right'),(445,'fa fa-long-arrow-left'),(446,'fa fa-long-arrow-down'),(447,'fa fa-lock'),(448,'fa fa-location-arrow'),(449,'fa fa-list-ul'),(450,'fa fa-list-ol'),(451,'fa fa-list-alt'),(452,'fa fa-list'),(453,'fa fa-linux'),(454,'fa fa-linkedin-square'),(455,'fa fa-linkedin'),(456,'fa fa-link'),(457,'fa fa-lightbulb-o'),(458,'fa fa-level-up'),(459,'fa fa-level-down'),(460,'fa fa-lemon-o'),(461,'fa fa-legal'),(462,'fa fa-leaf'),(463,'fa fa-laptop'),(464,'fa fa-krw'),(465,'fa fa-keyboard-o'),(466,'fa fa-key'),(467,'fa fa-jpy'),(468,'fa fa-italic'),(469,'fa fa-instagram'),(470,'fa fa-inr'),(471,'fa fa-info-circle'),(472,'fa fa-info'),(473,'fa fa-indent'),(474,'fa fa-inbox'),(475,'fa fa-image'),(476,'fa fa-html5'),(477,'fa fa-hospital-o'),(478,'fa fa-home'),(479,'fa fa-heart-o'),(480,'fa fa-heart'),(481,'fa fa-headphones'),(482,'fa fa-hdd-o'),(483,'fa fa-hand-o-up'),(484,'fa fa-hand-o-right'),(485,'fa fa-hand-o-left'),(486,'fa fa-hand-o-down'),(487,'fa fa-h-square'),(488,'fa fa-group'),(489,'fa fa-gratipay'),(490,'fa fa-google-plus-square'),(491,'fa fa-google-plus'),(492,'fa fa-globe'),(493,'fa fa-glass'),(494,'fa fa-gittip'),(495,'fa fa-github-square'),(496,'fa fa-github-alt'),(497,'fa fa-github'),(498,'fa fa-gift'),(499,'fa fa-gears'),(500,'fa fa-gear'),(501,'fa fa-gbp'),(502,'fa fa-gavel'),(503,'fa fa-gamepad'),(504,'fa fa-frown-o'),(505,'fa fa-foursquare'),(506,'fa fa-forward'),(507,'fa fa-font'),(508,'fa fa-folder-open-o'),(509,'fa fa-folder-open'),(510,'fa fa-folder-o'),(511,'fa fa-folder'),(512,'fa fa-floppy-o'),(513,'fa fa-flickr'),(514,'fa fa-flask'),(515,'fa fa-flash'),(516,'fa fa-flag-o'),(517,'fa fa-flag-checkered'),(518,'fa fa-flag'),(519,'fa fa-fire-extinguisher'),(520,'fa fa-fire'),(521,'fa fa-filter'),(522,'fa fa-film'),(523,'fa fa-files-o'),(524,'fa fa-file-text-o'),(525,'fa fa-file-text'),(526,'fa fa-file-o'),(527,'fa fa-file'),(528,'fa fa-fighter-jet'),(529,'fa fa-female'),(530,'fa fa-feed'),(531,'fa fa-fast-forward'),(532,'fa fa-fast-backward'),(533,'fa fa-facebook-square'),(534,'fa fa-facebook-f'),(535,'fa fa-facebook'),(536,'fa fa-eye-slash'),(537,'fa fa-eye'),(538,'fa fa-external-link-square'),(539,'fa fa-external-link'),(540,'fa fa-expand'),(541,'fa fa-exclamation-triangle'),(542,'fa fa-exclamation-circle'),(543,'fa fa-exclamation'),(544,'fa fa-exchange'),(545,'fa fa-euro'),(546,'fa fa-eur'),(547,'fa fa-eraser'),(548,'fa fa-envelope-o'),(549,'fa fa-envelope'),(550,'fa fa-ellipsis-v'),(551,'fa fa-ellipsis-h'),(552,'fa fa-eject'),(553,'fa fa-edit'),(554,'fa fa-dropbox'),(555,'fa fa-dribbble'),(556,'fa fa-download'),(557,'fa fa-dollar'),(558,'fa fa-desktop'),(559,'fa fa-dedent'),(560,'fa fa-dashboard'),(561,'fa fa-cutlery'),(562,'fa fa-cut'),(563,'fa fa-css3'),(564,'fa fa-crosshairs'),(565,'fa fa-crop'),(566,'fa fa-credit-card'),(567,'fa fa-copy'),(568,'fa fa-compress'),(569,'fa fa-compass'),(570,'fa fa-comments-o'),(571,'fa fa-comments'),(572,'fa fa-comment-o'),(573,'fa fa-comment'),(574,'fa fa-columns'),(575,'fa fa-cogs'),(576,'fa fa-cog'),(577,'fa fa-coffee'),(578,'fa fa-code-fork'),(579,'fa fa-code'),(580,'fa fa-cny'),(581,'fa fa-cloud-upload'),(582,'fa fa-cloud-download'),(583,'fa fa-cloud'),(584,'fa fa-close'),(585,'fa fa-clock-o'),(586,'fa fa-clipboard'),(587,'fa fa-circle-o'),(588,'fa fa-circle'),(589,'fa fa-chevron-up'),(590,'fa fa-chevron-right'),(591,'fa fa-chevron-left'),(592,'fa fa-chevron-down'),(593,'fa fa-chevron-circle-up'),(594,'fa fa-chevron-circle-right'),(595,'fa fa-chevron-circle-left'),(596,'fa fa-chevron-circle-down'),(597,'fa fa-check-square-o'),(598,'fa fa-check-square'),(599,'fa fa-check-circle-o'),(600,'fa fa-check-circle'),(601,'fa fa-check'),(602,'fa fa-chain-broken'),(603,'fa fa-chain'),(604,'fa fa-certificate'),(605,'fa fa-caret-up'),(606,'fa fa-caret-square-o-up'),(607,'fa fa-caret-square-o-right'),(608,'fa fa-caret-square-o-down'),(609,'fa fa-caret-right'),(610,'fa fa-caret-left'),(611,'fa fa-caret-down'),(612,'fa fa-camera-retro'),(613,'fa fa-camera'),(614,'fa fa-calendar-o'),(615,'fa fa-calendar'),(616,'fa fa-bullseye'),(617,'fa fa-bullhorn'),(618,'fa fa-building-o'),(619,'fa fa-bug'),(620,'fa fa-btc'),(621,'fa fa-briefcase'),(622,'fa fa-bookmark-o'),(623,'fa fa-bookmark'),(624,'fa fa-book'),(625,'fa fa-bolt'),(626,'fa fa-bold'),(627,'fa fa-bitcoin'),(628,'fa fa-bitbucket-square'),(629,'fa fa-bitbucket'),(630,'fa fa-bell-o'),(631,'fa fa-bell'),(632,'fa fa-beer'),(633,'fa fa-bars'),(634,'fa fa-barcode'),(635,'fa fa-bar-chart-o'),(636,'fa fa-bar-chart'),(637,'fa fa-ban'),(638,'fa fa-backward'),(639,'fa fa-asterisk'),(640,'fa fa-arrows-v'),(641,'fa fa-arrows-h'),(642,'fa fa-arrows-alt'),(643,'fa fa-arrows'),(644,'fa fa-arrow-up'),(645,'fa fa-arrow-right'),(646,'fa fa-arrow-left'),(647,'fa fa-arrow-down'),(648,'fa fa-arrow-circle-up'),(649,'fa fa-arrow-circle-right'),(650,'fa fa-arrow-circle-o-up'),(651,'fa fa-arrow-circle-o-down'),(652,'fa fa-arrow-circle-left'),(653,'fa fa-arrow-circle-down'),(654,'fa fa-archive'),(655,'fa fa-apple'),(656,'fa fa-angle-up'),(657,'fa fa-angle-right'),(658,'fa fa-angle-left'),(659,'fa fa-angle-down'),(660,'fa fa-angle-double-up'),(661,'fa fa-angle-double-right'),(662,'fa fa-angle-double-left'),(663,'fa fa-angle-double-down'),(664,'fa fa-android'),(665,'fa fa-anchor'),(666,'fa fa-ambulance'),(667,'fa fa-amazon'),(668,'fa fa-align-right'),(669,'fa fa-align-left'),(670,'fa fa-align-justify'),(671,'fa fa-align-center'),(672,'fa fa-adn'),(673,'fa fa-adjust'),(674,'fa fa-500px'),(675,NULL),(676,NULL);
/*!40000 ALTER TABLE `systemIcon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemLog`
--

DROP TABLE IF EXISTS `systemLog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemLog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table` varchar(64) DEFAULT NULL,
  `tuple` varchar(64) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `data` text DEFAULT NULL,
  `idSystemUser` int(11) DEFAULT NULL,
  `idSystemAction` int(11) DEFAULT NULL,
  `ipAddress` varchar(32) DEFAULT NULL,
  `agent` varchar(256) DEFAULT NULL,
  `form` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_log` (`idSystemUser`),
  KEY `idx_log_0` (`idSystemAction`),
  CONSTRAINT `fk_log` FOREIGN KEY (`idSystemUser`) REFERENCES `systemUser` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10406 DEFAULT CHARSET=utf8 COMMENT='bitacora de movimientos de los usuarios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemLog`
--

LOCK TABLES `systemLog` WRITE;
/*!40000 ALTER TABLE `systemLog` DISABLE KEYS */;
/*!40000 ALTER TABLE `systemLog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemMenu`
--

DROP TABLE IF EXISTS `systemMenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemMenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `href` varchar(256) DEFAULT NULL COMMENT 'si es # se asume que es categoria',
  `idSystemIcon` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL COMMENT 'id del padre',
  `priority` int(11) DEFAULT NULL,
  `idSystemTypeElement` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_sistemMenu_systemIcon` (`idSystemIcon`),
  CONSTRAINT `Fk_sistemMenu_systemIcon` FOREIGN KEY (`idSystemIcon`) REFERENCES `systemIcon` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemMenu`
--

LOCK TABLES `systemMenu` WRITE;
/*!40000 ALTER TABLE `systemMenu` DISABLE KEYS */;
INSERT INTO `systemMenu` VALUES (4,'SISTEMA','Sistema','#',205,4,1000,1),(5,'Administrador','Administrador','#',81,4,10,1),(6,'Usuarios','Usuarios','systemUser',287,5,10,2),(7,'Roles','Roles','systemRole',285,5,20,2),(8,'Menú','Menú','systemMenu',318,5,30,2);
/*!40000 ALTER TABLE `systemMenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemPrivileges`
--

DROP TABLE IF EXISTS `systemPrivileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemPrivileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemPrivileges`
--

LOCK TABLES `systemPrivileges` WRITE;
/*!40000 ALTER TABLE `systemPrivileges` DISABLE KEYS */;
INSERT INTO `systemPrivileges` VALUES (1,'MENU',NULL),(2,'CREAR',NULL),(3,'ELIMINAR',NULL),(4,'LEER',NULL),(5,'ACTUALIZAR',NULL),(6,'REPOSITORIO',NULL),(7,'EXPORTAR XLS',NULL),(8,'VISTA PREVIA',NULL),(9,'EXPORTAR PDF',NULL),(10,'ENVIAR POR WHATSAPP',NULL);
/*!40000 ALTER TABLE `systemPrivileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemPrivilegesUserRole`
--

DROP TABLE IF EXISTS `systemPrivilegesUserRole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemPrivilegesUserRole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSystemPrivileges` int(11) DEFAULT NULL COMMENT 'id del privilegio que se puede asignar',
  `objectSource` varchar(32) DEFAULT NULL COMMENT 'origen (Formulario, modulo, vista, etc) de el cual cual se busca el registro al que se tiene acceso\n\nsistemUserRole\nsystemUser',
  `objectTupla` int(11) DEFAULT NULL COMMENT 'Elemento del origen sobre el cual se tiene privilegios',
  `active` tinyint(4) DEFAULT NULL,
  `objetcAccess` tinyint(4) DEFAULT NULL COMMENT 'Objeto que tienen el privilegio sobre el objectTupla',
  PRIMARY KEY (`id`),
  KEY `Fk_systemPrivilegesUserRole_systemPrivileges` (`idSystemPrivileges`),
  CONSTRAINT `Fk_systemPrivilegesUserRole_systemPrivileges` FOREIGN KEY (`idSystemPrivileges`) REFERENCES `systemPrivileges` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2045 DEFAULT CHARSET=utf8 COMMENT='privilegios de usuario y rol';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemPrivilegesUserRole`
--

LOCK TABLES `systemPrivilegesUserRole` WRITE;
/*!40000 ALTER TABLE `systemPrivilegesUserRole` DISABLE KEYS */;
INSERT INTO `systemPrivilegesUserRole` VALUES (743,1,'1',9,1,9),(1020,1,'1',1,1,32),(1021,2,'1',1,1,32),(1022,3,'1',1,1,32),(1023,4,'1',1,1,32),(1024,5,'1',1,1,32),(1025,6,'1',1,1,32),(1026,7,'1',1,1,32),(1027,8,'1',1,1,32),(1028,9,'1',1,1,32),(1029,10,'1',1,1,32),(1030,1,'1',2,1,32),(1031,1,'1',9,1,32),(1032,2,'1',9,1,32),(1033,3,'1',9,1,32),(1034,4,'1',9,1,32),(1035,5,'1',9,1,32),(1036,6,'1',9,1,32),(1037,7,'1',9,1,32),(1038,8,'1',9,1,32),(1039,9,'1',9,1,32),(1040,10,'1',9,1,32),(1041,1,'1',10,1,32),(1042,1,'1',11,1,32),(1043,2,'1',11,1,32),(1044,3,'1',11,1,32),(1045,4,'1',11,1,32),(1046,5,'1',11,1,32),(1047,6,'1',11,1,32),(1048,7,'1',11,1,32),(1049,8,'1',11,1,32),(1050,9,'1',11,1,32),(1051,10,'1',11,1,32),(1052,1,'1',13,1,32),(1053,3,'1',13,1,32),(1054,4,'1',13,1,32),(1055,5,'1',13,1,32),(1056,6,'1',13,1,32),(1057,7,'1',13,1,32),(1058,8,'1',13,1,32),(1059,9,'1',13,1,32),(1060,10,'1',13,1,32),(1068,1,'1',1,1,34),(1069,2,'1',1,1,34),(1070,4,'1',1,1,34),(1071,5,'1',1,1,34),(1072,1,'1',2,1,34),(1073,1,'1',9,1,34),(1074,2,'1',9,1,34),(1075,3,'1',9,1,34),(1076,4,'1',9,1,34),(1077,5,'1',9,1,34),(1078,8,'1',9,1,34),(1110,1,'1',1,1,28),(1111,2,'1',1,1,28),(1112,3,'1',1,1,28),(1113,4,'1',1,1,28),(1114,5,'1',1,1,28),(1115,1,'1',2,1,28),(1116,2,'1',2,1,28),(1117,3,'1',2,1,28),(1118,4,'1',2,1,28),(1119,5,'1',2,1,28),(1120,1,'1',5,1,28),(1121,1,'1',6,1,28),(1122,2,'1',6,1,28),(1123,4,'1',6,1,28),(1124,1,'1',9,1,28),(1125,2,'1',9,1,28),(1126,3,'1',9,1,28),(1127,4,'1',9,1,28),(1128,5,'1',9,1,28),(1129,1,'1',10,1,28),(1130,1,'1',11,1,28),(1131,2,'1',11,1,28),(1132,3,'1',11,1,28),(1133,4,'1',11,1,28),(1134,5,'1',11,1,28),(1135,1,'1',12,1,28),(1136,2,'1',12,1,28),(1137,3,'1',12,1,28),(1138,4,'1',12,1,28),(1139,5,'1',12,1,28),(1140,1,'1',13,1,28),(1141,2,'1',13,1,28),(1142,3,'1',13,1,28),(1143,4,'1',13,1,28),(1144,5,'1',13,1,28),(1150,1,'1',14,1,34),(1151,1,'1',14,1,32),(1152,1,'1',14,1,28),(1153,1,'1',14,1,33),(1164,1,'1',16,1,32),(1165,1,'1',16,1,33),(1167,1,'1',17,1,28),(1168,1,'1',17,1,33),(1174,1,'1',19,1,33),(1175,1,'1',19,1,28),(1176,1,'1',20,1,33),(1177,1,'1',20,1,28),(1179,1,'1',21,1,33),(1180,1,'1',21,1,28),(1182,1,'1',22,1,28),(1183,1,'1',22,1,33),(1185,1,'1',23,1,33),(1186,1,'1',23,1,28),(1188,1,'1',24,1,33),(1189,1,'1',24,1,28),(1191,1,'1',25,1,33),(1192,1,'1',25,1,28),(1668,1,'1',1,1,1),(1669,2,'1',1,1,1),(1670,3,'1',1,1,1),(1671,4,'1',1,1,1),(1672,5,'1',1,1,1),(1673,8,'1',1,1,1),(1674,1,'1',2,1,1),(1675,2,'1',2,1,1),(1676,3,'1',2,1,1),(1677,4,'1',2,1,1),(1678,5,'1',2,1,1),(1679,8,'1',2,1,1),(1680,1,'1',4,1,1),(1681,2,'1',4,1,1),(1682,3,'1',4,1,1),(1683,4,'1',4,1,1),(1684,5,'1',4,1,1),(1685,8,'1',4,1,1),(1686,1,'1',5,1,1),(1687,2,'1',5,1,1),(1688,3,'1',5,1,1),(1689,4,'1',5,1,1),(1690,5,'1',5,1,1),(1691,8,'1',5,1,1),(1692,1,'1',6,1,1),(1693,2,'1',6,1,1),(1694,3,'1',6,1,1),(1695,4,'1',6,1,1),(1696,5,'1',6,1,1),(1697,8,'1',6,1,1),(1698,1,'1',7,1,1),(1699,2,'1',7,1,1),(1700,3,'1',7,1,1),(1701,4,'1',7,1,1),(1702,5,'1',7,1,1),(1703,8,'1',7,1,1),(1704,1,'1',8,1,1),(1705,2,'1',8,1,1),(1706,3,'1',8,1,1),(1707,4,'1',8,1,1),(1708,5,'1',8,1,1),(1709,8,'1',8,1,1),(1710,1,'1',9,1,1),(1711,2,'1',9,1,1),(1712,3,'1',9,1,1),(1713,4,'1',9,1,1),(1714,5,'1',9,1,1),(1715,8,'1',9,1,1),(1716,1,'1',10,1,1),(1717,2,'1',10,1,1),(1718,3,'1',10,1,1),(1719,4,'1',10,1,1),(1720,5,'1',10,1,1),(1721,8,'1',10,1,1),(1722,1,'1',11,1,1),(1723,2,'1',11,1,1),(1724,3,'1',11,1,1),(1725,4,'1',11,1,1),(1726,5,'1',11,1,1),(1727,8,'1',11,1,1),(1728,1,'1',12,1,1),(1729,2,'1',12,1,1),(1730,3,'1',12,1,1),(1731,4,'1',12,1,1),(1732,5,'1',12,1,1),(1733,8,'1',12,1,1),(1734,1,'1',13,1,1),(1735,2,'1',13,1,1),(1736,3,'1',13,1,1),(1737,4,'1',13,1,1),(1738,5,'1',13,1,1),(1739,8,'1',13,1,1),(1740,1,'1',14,1,1),(1741,2,'1',14,1,1),(1742,3,'1',14,1,1),(1743,4,'1',14,1,1),(1744,5,'1',14,1,1),(1745,8,'1',14,1,1),(1746,1,'1',16,1,1),(1747,2,'1',16,1,1),(1748,3,'1',16,1,1),(1749,4,'1',16,1,1),(1750,5,'1',16,1,1),(1751,8,'1',16,1,1),(1752,1,'1',17,1,1),(1753,2,'1',17,1,1),(1754,3,'1',17,1,1),(1755,4,'1',17,1,1),(1756,5,'1',17,1,1),(1757,8,'1',17,1,1),(1759,1,'1',19,1,1),(1760,2,'1',19,1,1),(1761,3,'1',19,1,1),(1762,4,'1',19,1,1),(1763,5,'1',19,1,1),(1764,8,'1',19,1,1),(1765,1,'1',20,1,1),(1766,2,'1',20,1,1),(1767,3,'1',20,1,1),(1768,4,'1',20,1,1),(1769,5,'1',20,1,1),(1770,8,'1',20,1,1),(1771,1,'1',21,1,1),(1772,2,'1',21,1,1),(1773,3,'1',21,1,1),(1774,4,'1',21,1,1),(1775,5,'1',21,1,1),(1776,8,'1',21,1,1),(1777,1,'1',22,1,1),(1778,2,'1',22,1,1),(1779,3,'1',22,1,1),(1780,4,'1',22,1,1),(1781,5,'1',22,1,1),(1782,8,'1',22,1,1),(1783,1,'1',23,1,1),(1784,2,'1',23,1,1),(1785,3,'1',23,1,1),(1786,4,'1',23,1,1),(1787,5,'1',23,1,1),(1788,8,'1',23,1,1),(1789,1,'1',24,1,1),(1790,2,'1',24,1,1),(1791,3,'1',24,1,1),(1792,4,'1',24,1,1),(1793,5,'1',24,1,1),(1794,8,'1',24,1,1),(1795,1,'1',25,1,1),(1796,2,'1',25,1,1),(1797,3,'1',25,1,1),(1798,4,'1',25,1,1),(1799,5,'1',25,1,1),(1800,8,'1',25,1,1),(1807,1,'1',26,1,1),(1808,1,'1',1,1,29),(1809,2,'1',1,1,29),(1810,3,'1',1,1,29),(1811,4,'1',1,1,29),(1812,5,'1',1,1,29),(1813,6,'1',1,1,29),(1814,7,'1',1,1,29),(1815,8,'1',1,1,29),(1816,9,'1',1,1,29),(1817,10,'1',1,1,29),(1818,1,'1',2,1,29),(1819,2,'1',2,1,29),(1820,3,'1',2,1,29),(1821,4,'1',2,1,29),(1822,5,'1',2,1,29),(1823,6,'1',2,1,29),(1824,7,'1',2,1,29),(1825,8,'1',2,1,29),(1826,9,'1',2,1,29),(1827,10,'1',2,1,29),(1828,1,'1',4,1,29),(1829,2,'1',4,1,29),(1830,3,'1',4,1,29),(1831,4,'1',4,1,29),(1832,5,'1',4,1,29),(1833,6,'1',4,1,29),(1834,7,'1',4,1,29),(1835,8,'1',4,1,29),(1836,9,'1',4,1,29),(1837,10,'1',4,1,29),(1838,1,'1',5,1,29),(1839,2,'1',5,1,29),(1840,3,'1',5,1,29),(1841,4,'1',5,1,29),(1842,5,'1',5,1,29),(1843,6,'1',5,1,29),(1844,7,'1',5,1,29),(1845,8,'1',5,1,29),(1846,9,'1',5,1,29),(1847,10,'1',5,1,29),(1848,1,'1',6,1,29),(1849,2,'1',6,1,29),(1850,3,'1',6,1,29),(1851,4,'1',6,1,29),(1852,5,'1',6,1,29),(1853,6,'1',6,1,29),(1854,7,'1',6,1,29),(1855,8,'1',6,1,29),(1856,9,'1',6,1,29),(1857,10,'1',6,1,29),(1858,1,'1',7,1,29),(1859,2,'1',7,1,29),(1860,3,'1',7,1,29),(1861,4,'1',7,1,29),(1862,5,'1',7,1,29),(1863,6,'1',7,1,29),(1864,7,'1',7,1,29),(1865,8,'1',7,1,29),(1866,9,'1',7,1,29),(1867,10,'1',7,1,29),(1868,1,'1',8,1,29),(1869,2,'1',8,1,29),(1870,3,'1',8,1,29),(1871,4,'1',8,1,29),(1872,5,'1',8,1,29),(1873,6,'1',8,1,29),(1874,7,'1',8,1,29),(1875,8,'1',8,1,29),(1876,9,'1',8,1,29),(1877,10,'1',8,1,29),(1878,1,'1',9,1,29),(1879,2,'1',9,1,29),(1880,3,'1',9,1,29),(1881,4,'1',9,1,29),(1882,5,'1',9,1,29),(1883,6,'1',9,1,29),(1884,7,'1',9,1,29),(1885,8,'1',9,1,29),(1886,9,'1',9,1,29),(1887,10,'1',9,1,29),(1888,1,'1',10,1,29),(1889,2,'1',10,1,29),(1890,3,'1',10,1,29),(1891,4,'1',10,1,29),(1892,5,'1',10,1,29),(1893,6,'1',10,1,29),(1894,7,'1',10,1,29),(1895,8,'1',10,1,29),(1896,9,'1',10,1,29),(1897,10,'1',10,1,29),(1898,1,'1',11,1,29),(1899,2,'1',11,1,29),(1900,3,'1',11,1,29),(1901,4,'1',11,1,29),(1902,5,'1',11,1,29),(1903,6,'1',11,1,29),(1904,7,'1',11,1,29),(1905,8,'1',11,1,29),(1906,9,'1',11,1,29),(1907,10,'1',11,1,29),(1908,1,'1',12,1,29),(1909,2,'1',12,1,29),(1910,3,'1',12,1,29),(1911,4,'1',12,1,29),(1912,5,'1',12,1,29),(1913,6,'1',12,1,29),(1914,7,'1',12,1,29),(1915,8,'1',12,1,29),(1916,9,'1',12,1,29),(1917,10,'1',12,1,29),(1918,1,'1',13,1,29),(1919,2,'1',13,1,29),(1920,3,'1',13,1,29),(1921,4,'1',13,1,29),(1922,5,'1',13,1,29),(1923,6,'1',13,1,29),(1924,7,'1',13,1,29),(1925,8,'1',13,1,29),(1926,9,'1',13,1,29),(1927,10,'1',13,1,29),(1928,1,'1',14,1,29),(1929,2,'1',14,1,29),(1930,3,'1',14,1,29),(1931,4,'1',14,1,29),(1932,5,'1',14,1,29),(1933,6,'1',14,1,29),(1934,7,'1',14,1,29),(1935,8,'1',14,1,29),(1936,9,'1',14,1,29),(1937,10,'1',14,1,29),(1938,1,'1',16,1,29),(1939,2,'1',16,1,29),(1940,3,'1',16,1,29),(1941,4,'1',16,1,29),(1942,5,'1',16,1,29),(1943,6,'1',16,1,29),(1944,7,'1',16,1,29),(1945,8,'1',16,1,29),(1946,9,'1',16,1,29),(1947,10,'1',16,1,29),(1948,1,'1',17,1,29),(1949,2,'1',17,1,29),(1950,3,'1',17,1,29),(1951,4,'1',17,1,29),(1952,5,'1',17,1,29),(1953,6,'1',17,1,29),(1954,7,'1',17,1,29),(1955,8,'1',17,1,29),(1956,9,'1',17,1,29),(1957,10,'1',17,1,29),(1968,1,'1',19,1,29),(1969,2,'1',19,1,29),(1970,3,'1',19,1,29),(1971,4,'1',19,1,29),(1972,5,'1',19,1,29),(1973,6,'1',19,1,29),(1974,7,'1',19,1,29),(1975,8,'1',19,1,29),(1976,9,'1',19,1,29),(1977,10,'1',19,1,29),(1978,1,'1',20,1,29),(1979,2,'1',20,1,29),(1980,3,'1',20,1,29),(1981,4,'1',20,1,29),(1982,5,'1',20,1,29),(1983,6,'1',20,1,29),(1984,7,'1',20,1,29),(1985,8,'1',20,1,29),(1986,9,'1',20,1,29),(1987,10,'1',20,1,29),(1988,1,'1',21,1,29),(1989,2,'1',21,1,29),(1990,3,'1',21,1,29),(1991,4,'1',21,1,29),(1992,5,'1',21,1,29),(1993,6,'1',21,1,29),(1994,7,'1',21,1,29),(1995,8,'1',21,1,29),(1996,9,'1',21,1,29),(1997,10,'1',21,1,29),(1998,1,'1',22,1,29),(1999,2,'1',22,1,29),(2000,3,'1',22,1,29),(2001,4,'1',22,1,29),(2002,5,'1',22,1,29),(2003,6,'1',22,1,29),(2004,7,'1',22,1,29),(2005,8,'1',22,1,29),(2006,9,'1',22,1,29),(2007,10,'1',22,1,29),(2008,1,'1',23,1,29),(2009,2,'1',23,1,29),(2010,3,'1',23,1,29),(2011,4,'1',23,1,29),(2012,5,'1',23,1,29),(2013,6,'1',23,1,29),(2014,7,'1',23,1,29),(2015,8,'1',23,1,29),(2016,9,'1',23,1,29),(2017,10,'1',23,1,29),(2018,1,'1',24,1,29),(2019,2,'1',24,1,29),(2020,3,'1',24,1,29),(2021,4,'1',24,1,29),(2022,5,'1',24,1,29),(2023,6,'1',24,1,29),(2024,7,'1',24,1,29),(2025,8,'1',24,1,29),(2026,9,'1',24,1,29),(2027,10,'1',24,1,29),(2028,1,'1',25,1,29),(2029,2,'1',25,1,29),(2030,3,'1',25,1,29),(2031,4,'1',25,1,29),(2032,5,'1',25,1,29),(2033,6,'1',25,1,29),(2034,7,'1',25,1,29),(2035,8,'1',25,1,29),(2036,9,'1',25,1,29),(2037,10,'1',25,1,29),(2038,1,'1',26,1,29),(2039,2,'1',26,1,29),(2040,3,'1',26,1,29),(2041,4,'1',26,1,29),(2042,5,'1',26,1,29),(2043,1,'1',18,1,29),(2044,1,'1',18,1,1);
/*!40000 ALTER TABLE `systemPrivilegesUserRole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemRepository`
--

DROP TABLE IF EXISTS `systemRepository`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemRepository` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `size` decimal(10,0) DEFAULT NULL,
  `table` varchar(64) DEFAULT NULL,
  `tuple` varchar(64) DEFAULT NULL,
  `route` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='repositorio/2016/April/\nZ5hlp2GeZaxmk2VpX26SbqpqmWQ\nFANS01-1.pdf';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemRepository`
--

LOCK TABLES `systemRepository` WRITE;
/*!40000 ALTER TABLE `systemRepository` DISABLE KEYS */;
/*!40000 ALTER TABLE `systemRepository` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemRole`
--

DROP TABLE IF EXISTS `systemRole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemRole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemRole`
--

LOCK TABLES `systemRole` WRITE;
/*!40000 ALTER TABLE `systemRole` DISABLE KEYS */;
INSERT INTO `systemRole` VALUES (1,'Director General',1),(2,'Director General Adjunto',1),(3,'Director Juridico',1),(4,'Director TI',1),(5,'DC- Director de Compras',1),(6,'Director de Operaciones',1),(7,'Director de Negocio',1),(8,'Director Recursos Humanos',1),(9,'DA - Director Administración',1),(10,'SUC -Gerente de Sucursal',1),(11,'SUC - Jefe de Operaciones',1),(12,'SUC - Jefe de Negocio',1),(13,'SUC - Jefe de RH',1),(14,'SUC - Jefe de Administración',1),(15,'SUC -Coordinador de Operaciones',1),(16,'SUC - Ventas',1),(17,'SUC - Reclutador',1),(18,'SUC - Auxiliar Administración',1),(19,'REG - Responsable Metropolitana',1),(20,'REG - Responsable Golfo',1),(21,'REG - Norte',1),(22,'REG - Centro Occ',1),(23,'DA- Cuentas por pagar',1),(24,'DA- Cuentas por cobrar',1),(25,'DA- Facturación',1),(26,'DC- Gerente de Compras',1),(27,'DCN- Director de cuentas',1),(28,'DCN- Gerente comercial',1),(29,'GS - Gerente de Soporte',1),(30,'developer',1),(31,'developer',1),(32,'Coordinador Comercial',1),(33,'Director Comercial',1),(34,'Asesor Comercial',1);
/*!40000 ALTER TABLE `systemRole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemTypeElement`
--

DROP TABLE IF EXISTS `systemTypeElement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemTypeElement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemTypeElement`
--

LOCK TABLES `systemTypeElement` WRITE;
/*!40000 ALTER TABLE `systemTypeElement` DISABLE KEYS */;
INSERT INTO `systemTypeElement` VALUES (1,'Categoría de Opciones'),(2,'Opcion de Menú'),(3,'Separador'),(4,'Referencia Externa'),(5,'Referencia a Archivo'),(6,'Elemento no Visible en el Menú');
/*!40000 ALTER TABLE `systemTypeElement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemUser`
--

DROP TABLE IF EXISTS `systemUser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemUser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(32) DEFAULT NULL COMMENT 'usuario del sistema',
  `password` varchar(32) DEFAULT NULL COMMENT 'contraseña del usuario',
  `email` varchar(64) DEFAULT NULL,
  `selfie` varchar(256) DEFAULT NULL,
  `tag` varchar(16) DEFAULT NULL,
  `fullName` varchar(256) DEFAULT NULL COMMENT 'nombre completo solo en caso que no sea empleado',
  `address` varchar(256) DEFAULT NULL COMMENT 'domicilio completo solo en caso que no sea empleado',
  `phone` varchar(32) DEFAULT NULL,
  `area` int(10) unsigned DEFAULT NULL,
  `idOffice` int(11) DEFAULT NULL,
  `idSystemUserStatus` int(11) DEFAULT NULL,
  `idSystemRole` int(11) DEFAULT NULL,
  `idEmployee` int(11) DEFAULT NULL COMMENT 'se vincula solo si el ususario es empleado en el sistema',
  `tries` int(11) DEFAULT 0,
  `position` varchar(64) DEFAULT NULL,
  `skype` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user` (`idSystemUserStatus`),
  KEY `idx_user_0` (`idSystemRole`),
  KEY `Fk_systemUser_employee` (`idEmployee`),
  KEY `Fk_systemUser_office` (`idOffice`),
  CONSTRAINT `Fk_systemUser_employee` FOREIGN KEY (`idEmployee`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_systemUser_office` FOREIGN KEY (`idOffice`) REFERENCES `office` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_systemUser_systemUserStatus` FOREIGN KEY (`idSystemUserStatus`) REFERENCES `systemUserStatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_0` FOREIGN KEY (`idSystemRole`) REFERENCES `systemRole` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COMMENT='TODO: CATALOG DE USUARIOS DEL SISTEMA';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemUser`
--

LOCK TABLES `systemUser` WRITE;
/*!40000 ALTER TABLE `systemUser` DISABLE KEYS */;
INSERT INTO `systemUser` VALUES (1,'developer','12','edson.rodriguez@3emexico.com','','','DEVELOPER','','',NULL,NULL,1,1,NULL,0,'demo','demo'),(68,'eumir','Eumir123','eumir.lampart@3emexico.com',NULL,NULL,'EUMIR LAMPART',NULL,NULL,NULL,NULL,1,1,NULL,0,'',''),(69,'mijail','Mijail123','mijail.vazquez@3emexico.com',NULL,NULL,'Mijail Vazquez',NULL,NULL,NULL,NULL,1,1,NULL,0,NULL,NULL),(70,'edson','Edson123','edson.rodriguez@3emexico.com','','','EDSON RODRIGUEZ','','7471614288',NULL,NULL,1,1,NULL,0,'demo','demo');
/*!40000 ALTER TABLE `systemUser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemUserStatus`
--

DROP TABLE IF EXISTS `systemUserStatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemUserStatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `description` varchar(32) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemUserStatus`
--

LOCK TABLES `systemUserStatus` WRITE;
/*!40000 ALTER TABLE `systemUserStatus` DISABLE KEYS */;
INSERT INTO `systemUserStatus` VALUES (1,'ACTIVE',NULL,1),(2,'PASSWORD RESET',NULL,1),(3,'LOCKED AOUTH',NULL,1),(4,'SUSPENDED',NULL,1),(5,'DESACTIVATED',NULL,1),(6,'STAGED',NULL,1);
/*!40000 ALTER TABLE `systemUserStatus` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-03 18:39:52
