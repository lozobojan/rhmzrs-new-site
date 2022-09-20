-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: rhmzrs
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `question_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_fk_7298961` (`question_id`),
  CONSTRAINT `question_fk_7298961` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `links` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `page_id` bigint unsigned DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `links_slug_unique` (`slug`),
  KEY `page_fk_7299099` (`page_id`),
  KEY `parent_fk_7299100` (`parent_id`),
  CONSTRAINT `page_fk_7299099` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`),
  CONSTRAINT `parent_fk_7299100` FOREIGN KEY (`parent_id`) REFERENCES `links` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` VALUES (2,'',NULL,'2022-09-19 09:18:08','2022-09-20 15:23:05',NULL,NULL,NULL,'Почетна'),(3,'o-zavodu',NULL,'2022-09-19 09:20:09','2022-09-20 14:46:23',NULL,NULL,NULL,'О заводу'),(4,'meteorologija',NULL,'2022-09-19 09:20:36','2022-09-20 14:46:23',NULL,NULL,NULL,'Метеорологија'),(5,'seizmologija',NULL,'2022-09-19 09:20:53','2022-09-20 14:46:24',NULL,NULL,NULL,'Сеизмологија'),(6,'hidrologija',NULL,'2022-09-19 09:21:39','2022-09-20 14:46:24',NULL,NULL,NULL,'Хидрологија'),(7,'zastita-zivotne-sredine',NULL,'2022-09-19 09:22:14','2022-09-20 15:23:05',NULL,NULL,NULL,'Заштита животне средине'),(8,'opsti-poslovi',NULL,'2022-09-19 09:22:40','2022-09-20 15:23:05',NULL,NULL,NULL,'Општи послови'),(10,'osnivanje',NULL,'2022-09-19 11:11:18','2022-09-20 16:44:24',NULL,2,3,'Оснивање'),(11,'organizaciona-sema',NULL,'2022-09-19 11:13:20','2022-09-20 17:10:59',NULL,3,3,'Организациона шема'),(12,'izvjestavanje',NULL,'2022-09-19 11:20:27','2022-09-20 17:12:16',NULL,4,3,'Извјештавање'),(15,'linkovi-ka-drugim-institucijama',NULL,'2022-09-19 11:21:41','2022-09-20 17:22:37',NULL,5,3,'Линкови ка другим институцијама'),(16,'aktuelno-u-rhmz',NULL,'2022-09-19 11:22:14','2022-09-20 17:28:28',NULL,6,3,'Актуелно у РХМЗ'),(17,'djelatnost-zavoda',NULL,'2022-09-19 11:22:36','2022-09-20 18:06:47',NULL,8,3,'Дјелатност завода'),(18,'meteorolosko-bdijenje',NULL,'2022-09-19 11:24:39','2022-09-20 18:07:53',NULL,9,4,'Метеоролошко бдијење'),(19,'mreza-meteoroloskih-stanica',NULL,'2022-09-19 11:25:06','2022-09-20 18:26:39',NULL,10,4,'Мрежа метеоролошких станица'),(20,'mjesecne-sinopticke-analize',NULL,'2022-09-19 11:25:39','2022-09-20 18:33:39',NULL,11,4,'Мјесечне синоптичке анализе'),(21,'klimatologija',NULL,'2022-09-19 11:25:52','2022-09-20 18:36:05',NULL,12,4,'Климатологија'),(22,'agrometeorologija',NULL,'2022-09-19 11:26:27','2022-09-20 18:37:36',NULL,13,4,'Агрометеорологија'),(23,'aktuelnosti',NULL,'2022-09-19 11:26:45','2022-09-20 18:42:35',NULL,14,4,'Актуелности'),(24,'zanimljivosti',NULL,'2022-09-19 11:27:04','2022-09-20 18:44:18',NULL,15,4,'Занимљивости'),(25,'meteorologija-projekti',NULL,'2022-09-19 11:27:26','2022-09-20 18:45:06',NULL,16,4,'Пројекти'),(26,'meteorologija-saradnja',NULL,'2022-09-19 11:28:08','2022-09-20 18:47:29',NULL,17,4,'Сарадња'),(28,'aktuelni-podaci',NULL,'2022-09-19 11:31:10','2022-09-20 14:46:24',NULL,NULL,18,'Актуелни подаци'),(29,'prognoza',NULL,'2022-09-19 11:31:30','2022-09-20 14:46:24',NULL,NULL,18,'Прогноза'),(30,'mjesecni-pregledi',NULL,'2022-09-19 11:32:49','2022-09-20 15:23:05',NULL,NULL,21,'Мјесечни прегледи'),(31,'dnevne-analize',NULL,'2022-09-19 11:33:32','2022-09-20 14:46:24',NULL,NULL,21,'Дневне анализе'),(32,'naucni-radovi',NULL,'2022-09-19 11:33:55','2022-09-20 15:23:05',NULL,NULL,21,'Научни радови'),(33,'klimatski-modeli',NULL,'2022-09-19 11:34:13','2022-09-20 14:46:24',NULL,NULL,21,'Климатски модели'),(34,'temperature-zemljista',NULL,'2022-09-19 11:35:10','2022-09-20 15:23:05',NULL,NULL,22,'Температуре земљишта'),(35,'godisnji-agro-bilteni',NULL,'2022-09-19 11:53:32','2022-09-20 15:23:05',NULL,NULL,22,'Годишњи агро - билтени'),(37,'mjesecni-agro-bilteni',NULL,'2022-09-19 11:53:32','2022-09-20 15:23:05',NULL,NULL,22,'Мјесечни агро - билтени'),(38,'dekadni-agro-bilteni',NULL,'2022-09-19 11:53:32','2022-09-20 14:46:24',NULL,NULL,22,'Декадни агро - билтени'),(39,'sedmicni-agro-bilteni',NULL,'2022-09-19 11:53:32','2022-09-20 15:23:05',NULL,NULL,22,'Седмични агро - билтени'),(40,'agro-upozorenja',NULL,'2022-09-19 11:53:32','2022-09-20 14:46:24',NULL,NULL,22,'Агро упозорења'),(41,'uslovi-vlaznosti',NULL,'2022-09-19 11:53:32','2022-09-20 15:23:05',NULL,NULL,22,'Услови влажности'),(42,'evapotranspiracija',NULL,'2022-09-19 11:53:32','2022-09-20 14:46:24',NULL,NULL,22,'Евапотранспирација'),(43,'fenologija',NULL,'2022-09-19 11:53:32','2022-09-20 14:46:24',NULL,NULL,22,'Фенологоија'),(44,'pracenje-bolesti',NULL,'2022-09-19 11:53:32','2022-09-20 15:23:05',NULL,NULL,22,'Праћење болести'),(45,'podaci',NULL,'2022-09-19 11:59:43','2022-09-20 14:46:24',NULL,NULL,28,'Подаци'),(46,'trenutne-temperature',NULL,'2022-09-19 11:59:43','2022-09-20 14:46:24',NULL,NULL,28,'Тренутне температуре'),(47,'ekstremne-temperature',NULL,'2022-09-19 11:59:43','2022-09-20 14:46:24',NULL,NULL,28,'Екстремне температуре'),(48,'pritisak',NULL,'2022-09-19 11:59:43','2022-09-20 14:46:24',NULL,NULL,28,'Притисак'),(49,'vjetar',NULL,'2022-09-19 11:59:43','2022-09-20 14:46:24',NULL,NULL,28,'Вјетар'),(50,'kolicina-padavina',NULL,'2022-09-19 11:59:43','2022-09-20 15:23:05',NULL,NULL,28,'Количина падавина'),(51,'visina-snijega',NULL,'2022-09-19 11:59:43','2022-09-20 14:46:24',NULL,NULL,28,'Висина снијега'),(52,'satelitska-slika',NULL,'2022-09-19 11:59:43','2022-09-20 14:46:24',NULL,NULL,28,'Стелитска слика'),(53,'radarska-slika',NULL,'2022-09-19 11:59:43','2022-09-20 14:46:24',NULL,NULL,28,'Радарска слика'),(54,'meteo-bilteni',NULL,'2022-09-19 12:02:48','2022-09-20 14:46:24',NULL,NULL,29,'Метео билтени'),(55,'upozorenja',NULL,'2022-09-19 12:02:48','2022-09-20 14:46:24',NULL,NULL,29,'Упозорења'),(56,'meteoalarm',NULL,'2022-09-19 12:02:48','2022-09-20 14:46:24',NULL,NULL,29,'Метоаларм'),(57,'bioprognoza',NULL,'2022-09-19 12:02:48','2022-09-20 14:46:24',NULL,NULL,29,'Биопрогноза'),(58,'prognoza-uv-zracenja',NULL,'2022-09-19 12:02:48','2022-09-20 15:23:05',NULL,NULL,29,'Прогноза УВ зрачења'),(59,'prognoza-uslova-za-izbijanje-pozara',NULL,'2022-09-19 12:02:48','2022-09-20 15:23:05',NULL,NULL,29,'Прогноза услова за избијање пожара'),(60,'poljski-radovi',NULL,'2022-09-19 12:07:26','2022-09-20 14:46:24',NULL,NULL,43,'Пољски радови'),(61,'ratarske-i-povrtarske-kulture',NULL,'2022-09-19 12:07:26','2022-09-20 14:46:24',NULL,NULL,43,'Ратарске и повртарске културе'),(62,'vocarski-radovi',NULL,'2022-09-19 12:07:26','2022-09-20 15:23:05',NULL,NULL,43,'Воћарски радови'),(63,'locirani-zemljotresi',NULL,'2022-09-19 12:10:40','2022-09-20 14:46:24',NULL,NULL,5,'Лоцирани земљотреси'),(69,'seizmoloska-mreza-republike-srpske',NULL,'2022-09-19 12:10:40','2022-09-20 15:23:05',NULL,NULL,5,'Сеизмолошка мрежа републике српске'),(70,'akcelerometarska-mreza-u-republici-srpskoj',NULL,'2022-09-19 12:10:40','2022-09-20 15:23:05',NULL,NULL,5,'Акцелерометарска мрежа у Републици Српској'),(71,'aktuelno',NULL,'2022-09-19 12:10:40','2022-09-20 14:46:24',NULL,NULL,5,'Актуелно'),(72,'seizmologija-projekti',NULL,'2022-09-19 12:10:40','2022-09-20 14:46:24',NULL,NULL,5,'Пројекти'),(73,'sizmologija-saradnja',NULL,'2022-09-19 12:10:40','2022-09-20 14:46:24',NULL,NULL,5,'Сарадња'),(74,'o-banjaluckim-zemljotresima',NULL,'2022-09-19 12:10:40','2022-09-20 18:56:40',NULL,20,5,'О бањалучким земљотресима'),(76,'bilten-izvjestaj-o-vodostanju',NULL,'2022-09-19 12:23:02','2022-09-20 15:23:05',NULL,NULL,6,'Билтен - извјештај о водостању'),(86,'mapa-stanica',NULL,'2022-09-19 12:23:02','2022-09-20 14:46:24',NULL,NULL,6,'Мапа станица'),(87,'kote-odbrane-od-poplava',NULL,'2022-09-19 12:23:02','2022-09-20 14:46:24',NULL,NULL,6,'Коте одбране од поплава'),(88,'hidrologija-podaci',NULL,'2022-09-19 12:23:02','2022-09-20 14:46:24',NULL,NULL,6,'Подаци'),(89,'rijecni-slivovi',NULL,'2022-09-19 12:23:02','2022-09-20 15:23:06',NULL,NULL,6,'Ријечни сливови'),(90,'o-odjeljenju',NULL,'2022-09-19 12:23:02','2022-09-20 14:46:24',NULL,NULL,6,'О одјељењу'),(91,'hidrologija-aktuelno',NULL,'2022-09-19 12:23:02','2022-09-20 14:46:24',NULL,NULL,6,'Актуелно'),(92,'hidrologija-projekti',NULL,'2022-09-19 12:23:02','2022-09-20 14:46:24',NULL,NULL,6,'Пројекти'),(93,'hidrologija-saradnja',NULL,'2022-09-19 12:23:02','2022-09-20 14:46:24',NULL,NULL,6,'Сарадња'),(95,'kontrola-kvaliteta-vazduha',NULL,'2022-09-20 15:43:40','2022-09-20 15:45:29',NULL,NULL,7,'Контрола квалитета ваздуха'),(96,'registar-ispustanja-i-prenosa-zagadjujucih-materija',NULL,'2022-09-20 15:43:40','2022-09-20 15:45:29',NULL,NULL,7,'Регистар испуштања и преноса загађујућих материја'),(97,'zzs-o-odjeljenju',NULL,'2022-09-20 15:43:40','2022-09-20 15:45:29',NULL,NULL,7,'О одјељењу'),(98,'inventari-emisija-u-vazduhu',NULL,'2022-09-20 15:43:40','2022-09-20 15:45:29',NULL,NULL,7,'Инвентари емисија у ваздуху'),(99,'kontrola-kavaliteta-voda',NULL,'2022-09-20 15:43:40','2022-09-20 15:45:29',NULL,NULL,7,'Контрола квалитета вода'),(100,'izvjestaji',NULL,'2022-09-20 15:55:15','2022-09-20 15:55:15',NULL,NULL,95,'Извјештаји'),(101,'trenutni-podaci',NULL,'2022-09-20 15:55:15','2022-09-20 15:55:15',NULL,NULL,95,'Тренутни подаци'),(102,'mapa-mjernih-stanica',NULL,'2022-09-20 15:55:15','2022-09-20 15:55:15',NULL,NULL,95,'Мапа мјерних станица'),(103,'pregled-podataka',NULL,'2022-09-20 15:57:02','2022-09-20 15:57:02',NULL,NULL,96,'Преглед података'),(106,'mapa-zagadjivaca',NULL,'2022-09-20 15:57:02','2022-09-20 15:57:02',NULL,NULL,96,'Мапа загађивача'),(107,'ripzm-izvjestaji',NULL,'2022-09-20 15:57:02','2022-09-20 15:57:02',NULL,NULL,96,'Извјештаји'),(108,'labaratorija',NULL,'2022-09-20 15:59:29','2022-09-20 15:59:29',NULL,NULL,97,'Лабараторија'),(114,'saradnja',NULL,'2022-09-20 15:59:29','2022-09-20 15:59:29',NULL,NULL,97,'Сарадња'),(115,'projekti',NULL,'2022-09-20 15:59:29','2022-09-20 15:59:29',NULL,NULL,97,'Пројекти'),(116,'medjunarodne-objave',NULL,'2022-09-20 15:59:29','2022-09-20 15:59:29',NULL,NULL,97,'Међународне објаве'),(117,'propisi',NULL,'2022-09-20 15:59:29','2022-09-20 15:59:29',NULL,NULL,97,'Прописи'),(118,'o-odjeljenju-aktuelnosti',NULL,'2022-09-20 15:59:29','2022-09-20 15:59:29',NULL,NULL,97,'Актуелности'),(119,'galerija',NULL,'2022-09-20 15:59:29','2022-09-20 16:02:09',NULL,NULL,97,'Галерија'),(120,'javno-dostupni-podaci',NULL,'2022-09-20 16:02:55','2022-09-20 16:02:55',NULL,NULL,98,'Јавно доступни подаци'),(121,'inventar-zagadjujucih-materija',NULL,'2022-09-20 16:02:55','2022-09-20 16:02:55',NULL,NULL,98,'Инвентар загађујућих материја'),(122,'inventar-gasova-sa-efektom-staklene-baste',NULL,'2022-09-20 16:02:55','2022-09-20 16:02:55',NULL,NULL,98,'Инвентар гасова са ефектом стаклене баште'),(123,'inventar-emisija-zagadjujucih-materija-prema-lrtap-konvenciji',NULL,'2022-09-20 16:02:55','2022-09-20 16:02:55',NULL,NULL,98,'Инвентар емисија загађујућиих материја према LRTAP конвенцији'),(124,'javni-konkursi',NULL,'2022-09-20 16:08:07','2022-09-20 16:08:07',NULL,NULL,8,'Јавни конкурси'),(128,'javne-nabavke',NULL,'2022-09-20 16:08:07','2022-09-20 16:08:07',NULL,NULL,8,'Јавне набавке'),(131,'kontakt',NULL,'2022-09-20 16:31:42','2022-09-20 16:31:42',NULL,NULL,NULL,'Контакт'),(132,'dokumenti-i-propisi',NULL,'2022-09-20 18:52:02','2022-09-20 16:49:19',NULL,NULL,8,'Документи и прописи');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_09_12_000001_create_media_table',1),(6,'2022_09_12_000002_create_permissions_table',1),(7,'2022_09_12_000003_create_roles_table',1),(8,'2022_09_12_000005_create_links_table',1),(9,'2022_09_12_000006_create_pages_table',1),(10,'2022_09_12_000007_create_posts_table',1),(11,'2022_09_12_000008_create_public_competitions_table',1),(12,'2022_09_12_000009_create_public_purchases_table',1),(13,'2022_09_12_000010_create_projects_table',1),(14,'2022_09_12_000011_create_questionnaires_table',1),(15,'2022_09_12_000012_create_questions_table',1),(16,'2022_09_12_000013_create_answers_table',1),(17,'2022_09_12_000014_create_permission_role_pivot_table',1),(18,'2022_09_12_000015_create_role_user_pivot_table',1),(19,'2022_09_12_000016_add_relationship_fields_to_links_table',1),(20,'2022_09_12_000017_add_relationship_fields_to_posts_table',1),(21,'2022_09_12_000018_add_relationship_fields_to_public_competitions_table',1),(22,'2022_09_12_000019_add_relationship_fields_to_public_purchases_table',1),(23,'2022_09_12_000020_add_relationship_fields_to_projects_table',1),(24,'2022_09_12_000021_add_relationship_fields_to_questions_table',1),(25,'2022_09_12_000022_add_relationship_fields_to_answers_table',1),(26,'2022_09_17_131114_add_title_column_to_links_table',1),(27,'2022_09_18_155331_change_html_content_column_type',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (2,'Оснивање','osnivanje','<p><strong>Републички хидрометеоролошки завод</strong> (у даљем тексту Завод) је основан Законом о министарствима („Службени гласник Српског народа у Босни и Херцеговини“, број: 11/92). Овим Законом је дефинисано да Завод врши стручне и друге послове који се односе на: развој и функционисање хидролошке, метеоролошке и сеизмолошке дјелатности; истраживање атмосфере, водних ресурса, квалитета ваздуха и вода и сеизмолошких процеса; прикупљање, обрађивање и објављивање хидрометеоролошких и сеизмолошких података од интереса за Републику и вршење и других послова у области хидрологије, метеорологије и сеизмологије. Као самостална републичка управна организација Завод је обављао своју дјелатност све до 2002. године од када је у саставу Министарства пољопривреде, шумарства и водопривреде. Садашњи статус Завода је регулисан Законом о републичкој управи („Службени гласник Републике Српске“, број: 115/18).</p>','2022-09-20 16:41:06','2022-09-20 17:02:38',NULL),(3,'Организациона шема','organizaciona-sema','<p>Правилник о унутрашњој организацији и систематизацији радних мјеста у Републичком хидрометеоролошком заводу („Службени гласник Републике Српске“, бр. 76/17 и 06/18)</p><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/organizaciona-sema.png\" alt=\"\"></figure>','2022-09-20 17:10:27','2022-09-20 17:10:27',NULL),(4,'Извјештавање','izvjestavanje','<p>У складу са прописима Свјетске метеоролошке организације (WMO) свакодневно се, за потребе многобројних корисника (министарства, привредни субјекти, медији, шира друштвена заједница и други),&nbsp;раде:</p><ul><li>Три метеоролошка билтена која садрже преглед и прогнозу метеоролошких услова за Републику Српску за текући дан и за наредна три дана.</li><li>Хидролошки билтен који садржи податке о водостању на ријекама у Републици Српској измјерених у 08:00 часова текућег дана</li></ul><p>Поред редовних дневних извјештаја у случајевима ванредних дешавања, земљотреса, поплава и&nbsp; екстремних климатских појава раде се ванредни билтени, а њихов број зависи од интензитета појаве, односно степена опасности по људе и материјална добра.</p><p>Континуирано се израђују седмодневни, декадни и мјесечни климатолошки и агрометеоролошки извјештаји те дневни и мјесечни извјештаји о квалитету ваздуха из области заштите животне средине. У области заштите животне средине се такође израђују Инвентари гасова са ефетком стаклене баште за Републику Српску и Годишњи извјештаји о регистру постројења и загађивача Републике Српске. Сви извјештаји из дјелокруга рада Завода се штампају у завршном годишњем извјештају.</p>','2022-09-20 17:12:00','2022-09-20 17:12:00',NULL),(5,'Линкови ка другим институцијама','linkovi-ka-drugim-institucijama','<h3>Институције Републике Српске</h3><ul><li>Предсједник Републике Српске:&nbsp;<a href=\"http://www.predsjednikrs.net/\">http://www.predsjednikrs.net</a></li><li>Скупштина Републике Српске:&nbsp;<a href=\"http://www.narodnaskupstinars.net/\">http://www.narodnaskupstinars.net/</a></li><li>Влада Републике Српске:&nbsp;<a href=\"http://www.vladars.net/\">http://www.vladars.net</a></li><li>Агенција за воде обласног ријечног слива Саве:&nbsp;<a href=\"http://www.voders.org/\">http://www.voders.org/</a></li><li>Агенција за воде обласног ријечног слива Требишњице:&nbsp;<a href=\"http://vodeherc.org/\">http://vodeherc.org/</a></li></ul><h3>Институције Босне и Херцеговине</h3><ul><li>Федерални хидрометеоролошки завод:&nbsp;<a href=\"http://www.fhmzbih.gov.ba/\">http://www.fhmzbih.gov.ba/</a></li><li>Агенција за водно подручје ријеке Саве: <a href=\"http://www.voda.ba/\">http://www.voda.ba/</a></li><li>Агенција за водно подручје Јадранског мора:&nbsp;<a href=\"http://www.jadran.ba/\">http://www.jadran.ba/</a></li></ul><h3>Институције сусједних држава</h3><ul><li>Републички Хидрометеоролошки завод Србије:&nbsp;<a href=\"http://www.hidmet.gov.rs/\">http://www.hidmet.gov.rs/</a></li><li>Републички сеизмолошки завод Србије:&nbsp;<a href=\"http://www.seismo.gov.rs/\">http://www.seismo.gov.rs/</a></li><li>Завод за хидрометеорологију и сеизмологију Црне Горе:&nbsp;<a href=\"http://www.meteo.co.me/\">http://www.meteo.co.me/</a><ul><li>Сектор за сеизмологију:&nbsp;<a href=\"http://www.seismo.co.me/\">http://www.seismo.co.me/</a></li></ul></li><li>Државни хидрометеоролошки завод Хрватске:&nbsp;<a href=\"http://meteo.hr/\">http://meteo.hr/</a></li></ul>','2022-09-20 17:20:57','2022-09-20 17:20:57',NULL),(6,'Актуелно у РХМЗ','aktuelno-u-rhmz','<h2>Актуелно у РХМЗ цонтент</h2>','2022-09-20 17:28:28','2022-09-20 17:28:28',NULL),(7,'садффсдафсд','асдфасфсадфдс','<p>асдфасфдсфдфсда</p>','2022-09-20 17:29:02','2022-09-20 17:29:02',NULL),(8,'Дјелатност завода','djelatnost-zavoda','<p>Дјелатност&nbsp; Завода је дефинисана Законом о метеоролошкој и хидролошкој дјелатности („Службени гласник Републике Српске“, број: 20/00); Законом о сеизмолошкoј&nbsp; дјелатности („Службени гласник Републике Српске“ број: 20/97); Законом о заштити ваздуха(„Службени гласник Републике Српске“, бр. 124/11 и 46/17) и Законом о заштити животне средине („Службени гласник Републике Српске“, бр. 71/12 и 79/15).</p><p>Дјелатност&nbsp; Завода се одвија кроз три сектора, једно одјељење, један самостални одсјек и то:</p><ul><li><strong>Сектор за метеорологију</strong>,&nbsp; са&nbsp; два одјељења:<ul><li>Одјељење бдијења и</li><li>Одјељење за климатологију и агрометеорологију у којем постоје два одсјека:<ul><li>Одсјек за климатологију и</li><li>Одсјек за агрометеорологију,</li></ul></li></ul></li><li><strong>Сектор за хидрологију и заштиту животне средине,&nbsp;</strong>са два одјељења:<ul><li>Одјељење за хидрологију и</li><li>Одјељење за заштиту животне средине,</li></ul></li><li><strong>Сектор за сеизмологију,&nbsp;</strong>са два одјељења:<ul><li>Одјељење за опсерваторску сеизмологију и</li><li>Одјељење за&nbsp; инструменталну и инжењерску сеизмологију,</li></ul></li><li><strong>Одјељење за правне и финансијске послове.</strong></li><li><strong>Одсјек за информисање и међународну сарадњу.</strong></li></ul>','2022-09-20 18:06:47','2022-09-20 18:06:47',NULL),(9,'Метеоролошко бдијење','meteorolosko-bdijenje','<p>У Одјељењу бдијења врше се послови који се односе на послове на метеоролошким станицама, односно послови осматрања и послови који се односе на прогнозу времена.</p><p>Састоји се од два одсјека:</p><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2019/06/meteorokoska-stanica-390x237.jpg\" alt=\"\" srcset=\"https://rhmzrs.com/wp-content/uploads/2019/06/meteorokoska-stanica-390x237.jpg 390w, https://rhmzrs.com/wp-content/uploads/2019/06/meteorokoska-stanica-80x50.jpg 80w\" sizes=\"100vw\" width=\"300\"></figure><p>1.Одсјек за метеоролошка мјерења:</p><p>У Одсјеку за мрежу метеоролошких станица врше се послови прикупљања података што&nbsp; подразумијева планирање, изградњу и оснивање метеоролошких, климатолошких, агрометеоролошких, падавинских&nbsp; и специјалних станица, за развој метеоролошког осматрачког система и спровођење програма систематских метеоролошких, климатолошких, агрометеоролошких&nbsp; мјерења и осматрања за потребе: анализе и прогнозе времена и климе, ране најаве и упозорења о појави атмосферских и хидролошких појава и акцидентних загађења ваздуха у случају нуклеарних несрећа и технолошких катастрофа; спровођење програма калибрације, инсталисања, и одржавања метеоролошких инструмената и уређаја; примјена међународних стандарда и техничке регулативе Свјетске метеоролошке организације <i>(СМО); </i>архивирање, заштиту и основну контролу квалитета података; кодирање и извјештавање о измјереним и осмотреним метеоролошким параметрима у редовним и ванредним метеоролошким терминима на територији Републике Српске. Врши се достављање шифрованих SYNOP, CLIMA и других метеоролошких извјештаја и података у реалном времену дистрибутивном центру Завода; вођење архиве мреже метеоролошких станица и остале документације&nbsp; за историјат станица; обезбјеђују се одговарајућа упутстава за мјерења и осматрања на метеоролошким станицама, која су у складу са прописима и нормативима Свјетске метеоролошке организације; утврђују се програми рада метеоролошких станица; врше се стручне контроле рада и извршавања предвиђеног програма&nbsp; рада метеоролошких станица и примјена упутстава у пракси; врши се обука осматрача за рад на метеоролошким станицама;</p><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2019/06/oblaci-1-390x237.jpg\" alt=\"\" srcset=\"https://rhmzrs.com/wp-content/uploads/2019/06/oblaci-1-390x237.jpg 390w, https://rhmzrs.com/wp-content/uploads/2019/06/oblaci-1-80x50.jpg 80w\" sizes=\"100vw\" width=\"306\"></figure><ol><li>Одсјек за прогнозу и анализу времена:<br>У Одсјеку за прогнозу и анализу времена врше се послови који се односе на: успостављање, развој и обезбјеђивање рада метеоролошког прогностичког система; врши послове анализе атмосферских процеса и праћење њиховог развоја и временских појава; издавање детаљних прогноза за поједина мјеста и регионе у Републици Српској; редовно издавање метеоролошких билтена; најављивање ванредних и опасних метеоролошких појава; пријем метеоролошких, прогностичких и аналитичких података и карата са подручја Европе тј. сјеверне хемисфере кроз аналитички материјал европских и регионалних центара; сателитску и радарску метеорологију и израду аналитичких метеоролошких информација о стању атмосфере на бази расположивих радарских и сателитских слика; развој и коришћење производа нумеричке прогнозе и пројеката (ЕCMWF-а, EUMETSAT-а); пружање услуга корисницима специфичних метеоролошких информација; истраживање процеса и појава у атмосфери. Одсјек врши техничку обраду и припрему текућих статистичких података за оперативне потребе краткорочне и средњорочне прогнозе времена, израду различитих метеоролошких информација према захтјевима корисника; анализу развоја и прогнозирање опасних временских појава, укључујући и хаваријска радиоактивна и хемијска загађења атмосфере, и издавање упозорења о наиласку, интензитету и трајању опасних појава и непогода. Посебно ради на цјеловитом и несметаном прикупљању података из система мреже метеоролошких станица. Стручно и оперативно, ствара услове и извршава послове преузете од стране метеоролошке међународне заједнице везаних за дјелокруг, посебно у области метео аларма, ране најаве метеоролошких непогода и развој система непосредног бдијења <i>(врло краткорочне прогнозе настанка, развоја и дјеловања опасних метеоролошких појава).</i> Ради на развоју нумеричких модела за прогнозу времена, специјалних софтверских рјешења прогнозе појединих метеоролошких елемената и појава за поједине регионе; врши верификацију модела и њихово даље побољшање.</li></ol>','2022-09-20 18:07:53','2022-09-20 18:07:53',NULL),(10,'Мрежа метеоролошких станица','mreza-meteoroloskih-stanica','<p>Мрежа метеоролошких станица цонтент</p>','2022-09-20 18:26:39','2022-09-20 18:31:57',NULL),(11,'Мјесечне синоптичке анализе','mjesecne-sinopticke-analize','<p>синоптичке анализе за 2022.годину</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2022/08/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0-%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0-%D0%B7%D0%B0-%D1%98%D1%83%D0%BB-2022.pdf\">7_Синоптичка-анализа-за-јул-2022_РХМЗ РСПреузми</a></p><p>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2022/08/06_%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0-%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0-%D0%B7%D0%B0-jun2022.pdf\">06_Синоптичка-анализа-за-јун-2022_РХМЗРСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2022/07/05_%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0-%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0-%D0%B7%D0%B0-%D0%BC%D0%B0%D1%98-2022_%D0%A0%D0%A5%D0%9C%D0%97%D0%A0%D0%A1-2.pdf\">5_Синоптичка-анализа-за-мај-2022_РХМЗРСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2022/07/3_%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0-%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0-%D0%B7%D0%B0-%D0%B0%D0%BF%D1%80%D0%B8%D0%BB-2022-1.pdf\">4_Синоптичка-анализа-за-април-2022Преузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2022/04/3_%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0-%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0-%D0%B7%D0%B0-%D0%BC%D0%B0%D1%80%D1%82-2022.pdf\">3_Синоптичка-анализа-за-март-2022Преузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2022/04/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0-%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0-%D0%B7%D0%B0-%D1%84%D0%B5%D0%B1%D1%80%D1%83%D0%B0%D1%80-2022.pdf\">Синоптичка-анализа-за-фебруар-2022 РХМЗ РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2022/03/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0-%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0-%D0%B7%D0%B0-%D1%98%D0%B0%D0%BD%D1%83%D0%B0%D1%80-2022..pdf\">Синоптичка-анализа-за-јануар-2022.Преузми</a></p><p>синоптичке анализе за 2021.годину</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2022/01/12_%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0_%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0_%D0%B7%D0%B0_%D0%B4%D0%B5%D1%86%D0%B5%D0%BC%D0%B1%D0%B0%D1%80_2021_%D0%B3%D0%BE%D0%B4%D0%B8%D0%BD%D0%B5_%D0%A0%D0%A5%D0%9C%D0%97_%D0%A0%D0%A1.pdf\">12_Синоптичка_анализа_за_децембар_2021_године_РХМЗ_РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2021/12/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0_%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0_%D0%B7%D0%B0_%D0%BD%D0%BE%D0%B2%D0%B5%D0%BC%D0%B1%D0%B0%D1%80_2021_%D0%B3%D0%BE%D0%B4%D0%B8%D0%BD%D0%B5_%D0%A0%D0%A5%D0%9C%D0%97_%D0%A0%D0%A1.pdf\">Синоптичка_анализа_за_новембар_2021_године_РХМЗ_РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2021/11/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0_%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0_%D0%B7%D0%B0_%D0%BE%D0%BA%D1%82%D0%BE%D0%B1%D0%B0%D1%80_2021_%D0%B3%D0%BE%D0%B4%D0%B8%D0%BD%D0%B5_%D0%A0%D0%A5%D0%9C%D0%97_%D0%A0%D0%A1.pdf\">Синопоптичка_анализа_за_октобар_2021_године_РХМЗ_РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2021/10/9_%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0-%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0-%D0%B7%D0%B0-%D1%81%D0%B5%D0%BF%D1%82%D0%B5%D0%BC%D0%B1%D0%B0%D1%80-2021.pdf\">9_Синоптичка-анализа-за-септембар-2021Преузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2021/09/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0-%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0-%D0%B7%D0%B0-%D0%B0%D0%B2%D0%B3%D1%83%D1%81%D1%82-2021-RHMZ-RS.pdf\">Синоптичка-анализа-за-август-2021-RHMZ-RSПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2021/08/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0_%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0_%D0%B7%D0%B0_%D1%98%D1%83%D0%BB_2021._%D0%B3%D0%BE%D0%B4%D0%B8%D0%BD%D0%B5_%D0%A0%D0%A5%D0%9C%D0%97_%D0%A0%D0%A1.pdf\">Синоптичка_анализа_за_јул_2021._године_РХМЗ_РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2021/07/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0_%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0_%D0%B7%D0%B0_%D1%98%D1%83%D0%BD_2021_%D0%B3%D0%BE%D0%B4%D0%B8%D0%BD%D0%B5_%D0%A0%D0%A5%D0%9C%D0%97_%D0%A0%D0%A1_compressed.pdf\">Синоптичка_анализа_за_јун_2021_године_РХМЗ_РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2021/06/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0_%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0_%D0%B7%D0%B0_%D0%BC%D0%B0%D1%98_2021._%D0%B3%D0%BE%D0%B4%D0%B8%D0%BD%D0%B5_%D0%A0%D0%A5%D0%9C%D0%97_%D0%A0%D0%A1.pdf\">Синоптичка_анализа_за_мај_2021._године_РХМЗ_РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2021/05/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0_%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0_%D0%B7%D0%B0_%D0%B0%D0%BF%D1%80%D0%B8%D0%BB_2021._%D0%B3%D0%BE%D0%B4%D0%B8%D0%BD%D0%B5_%D0%A0%D0%A5%D0%9C%D0%97_%D0%A0%D0%A1.pdf\">Синоптичка_анализа_за_април_2021._године_РХМЗ_РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2021/04/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0_%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0_%D0%B7%D0%B0_%D0%BC%D0%B0%D1%80%D1%82_2021._%D0%B3%D0%BE%D0%B4%D0%B8%D0%BD%D0%B5_%D0%A0%D0%A5%D0%9C%D0%97_%D0%A0%D0%A1.pdf\">Синоптичка_анализа_за_март_2021._године_РХМЗ_РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2021/04/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0_%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0_%D0%B7%D0%B0_%D1%84%D0%B5%D0%B1%D1%80%D1%83%D0%B0%D1%80_2021._%D0%B3%D0%BE%D0%B4%D0%B8%D0%BD%D0%B5_%D0%A0%D0%A5%D0%9C%D0%97_%D0%A0%D0%A1.pdf\">Синоптичка_анализа_за_фебруар_2021._године_РХМЗ_РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2021/02/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0_%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0_%D0%B7%D0%B0_%D1%98%D0%B0%D0%BD%D1%83%D0%B0%D1%80_2021._%D0%B3%D0%BE%D0%B4%D0%B8%D0%BD%D0%B5_%D0%A0%D0%A5%D0%9C%D0%97_%D0%A0%D0%A1.pdf\">Синоптичка_анализа_за_јануар_2021._године_РХМЗ_РСПреузми</a></p><p>синоптичке анализе за 2020. годину</p><p>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2021/01/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0_%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0_%D0%B7%D0%B0_%D0%B4%D0%B5%D1%86%D0%B5%D0%BC%D0%B1%D0%B0%D1%80_2020.pdf\">Синоптичка анализа за децембар 2020.године РХМЗ РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/12/%D0%A1%D0%B8%D0%BD%D0%BE%D0%BF%D1%82%D0%B8%D1%87%D0%BA%D0%B0-%D0%B0%D0%BD%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0-%D0%B7%D0%B0-%D0%BD%D0%BE%D0%B2%D0%B5%D0%BC%D0%B1%D0%B0%D1%80-2020.%D0%B3%D0%BE%D0%B4%D0%B8%D0%BD%D0%B5-%D0%A0%D0%A5%D0%9C%D0%97-%D0%A0%D0%A1.pdf\">Синоптичка анализа за новембар 2020.године РХМЗ РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/11/1_sinopticku_analizu_za_oktobar_2020_1.pdf\">Синоптичка анализа за октобар 2020.године РХМЗ РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/10/Sinopticka-analiza-za-septembar-2020.godine-RHMZ-RS.pdf\">Синоптичка анализа за септембар 2020.године РХМЗ РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/09/Sinopticka_analiza__avgust_2020__RHMZ_RS.pdf\">Синоптичка анализа за август 2020. године РХМЗ РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/09/Sinopticka_analiza__jul_2020__RHMZ_RS-1.pdf\">Синоптичка анализа за јул 2020.године РХМЗ РС</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/07/Sinopticka_analiza__jun_2020__RHMZ_RS-3.pdf\">Синоптичка анализа за јун 2020.године РХМЗ РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/07/Sinopticka_analiza__maj_2020__RHMZ_RS.pdf\">Синоптичка анализа за мај 2020. године РХМЗ РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/05/Sinopticka_analiza__april_2020__RHMZ_RS-1.pdf\">Синоптичка анализа за април 2020.године РХМЗ РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/04/Sinopticka_analiza__mart_2020__RHMZ_RS_.pdf\">Синоптичка анализа за март 2020.године РХМЗ РС_Преузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/04/Sinopticka-analiza-februar-2020-RHMZ-RS-1.pdf\">Синоптичка анализа за фебруар 2020.године РХМЗ РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/04/Sinopticka_analiza__januar_2020__RHMZ_RS-1.pdf\">Синоптичка анализа за јануар 2020.године РХМЗ РСПреузми</a></p><p>&nbsp;</p><p>Синоптичке анализе за 2019. годину</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/05/Sinopticka_analiza__oktobar_2019__RHMZ_RS.pdf\">Синоптичка анализа за октобар 2019.године РХМЗ РСПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/05/septembar2019.pdf\">Синоптичка анализа за септембар 2019.годинеПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2020/05/avgust2019.pdf\">Синоптичка анализа за август 2019.годинеПреузми</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2019/09/jul2019.pdf\">Синоптичка анализа за јул 2019. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2019/09/JUN-2019.pdf\">Синоптичка анализа за јун 2019. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2019/07/MAJ-2019.pdf\">Синоптичка анализа за мај 2019. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2019/07/APRIL-2019.pdf\">Синоптичка анализа за април 2019. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2019/05/MART-2019.pdf\">Синоптичка анализа за март 2019. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2019/03/REPUBLIKA-SRPSKA-VREMENSKI-USLOVI-februara-2019.pdf\">Синоптичка анализа за фебруар 2019. године</a><br>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2019/04/Sinopticka-analiza-za-mjesec-januar-2019.pdf\">Синоптичка анализа за јануар 2019. године</a></p><p>Синоптичке&nbsp;анализе&nbsp;за&nbsp;2018.&nbsp;годину</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2019/04/Sinopticka-analiza-za-mjesec-decembar-2018.pdf\">Синоптичка анализа за децембар 2018. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2019/04/Sinopticka-analiza-za-mjesec-novembar-2018.pdf\">Синоптичка анализа за новембар 2018. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2019/04/Sinopticka-analiza-za-mjesec-oktobar-2018.pdf\">Синоптичка анализа за октобар 2018. године</a></p><p><a href=\"https://rhmzrs.com/report/sinopticka-analiza-za-mjesec-septembar-2018/\">Синоптичка анализа за септембар 2018. године</a></p><p><a href=\"https://rhmzrs.com/report/sinopticka-analiza-za-avgust-2018-godine/\">Синоптичка анализа за август 2018. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/jul2018-1.pdf\">Синоптичка анализа за јул 2018. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/jun2018-1.pdf\">Синоптичка анализа за јun 2018. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/maj2018-1.pdf\">Синоптичка анализа за мај 2018. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/april2018-1.pdf\">Синоптичка анализа за април 2018. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/mart2018-1.pdf\">Синоптичка анализа за март 2018. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/februar2018-1.pdf\">Синоптичка анализа за фебруар 2018. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/januar2018-1.pdf\">Синоптичка анализа за јануар 2018. године</a></p><p>——————————————————————————–</p><p><strong>Синоптичке анализе за 2017. годину</strong></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/decembar2017-1.pdf\">Синоптичка анализа за децембар 2017. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/novembar2017-1.pdf\">Синоптичка анализа за новембар 2017. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Oktobar2017a-1.pdf\">Синоптичка анализа за октобар 2017. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Septembar2017-1.pdf\">Синоптичка анализа за септембар 2017. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/AVGUST-2017.pdf\">Синоптичка анализа за август 2017. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Jul2017.pdf\">Синоптичка анализа за јул 2017. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/jun2017.pdf\">Синоптичка анализа за јун 2017. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/MAJ-2017.pdf\">Синоптичка анализа за мај 2017. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/April2017.pdf\">Синоптичка анализа за април 2017. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Mart2017.pdf\">Синоптичка анализа за март 2017. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Feb2017.pdf\">Синоптичка анализа за фебруар 2017. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Jan2017.pdf\">Синоптичка анализа за јануар 2017. године</a></p><p>——————————————————————————–</p><p><strong>Синоптичке анализе за 2016. годину</strong></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Dec2016.pdf\">Синоптичка анализа за децембар 2016. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/novembar2016.pdf\">Синоптичка анализа за новембар 2016. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/oktobar2016.pdf\">Синоптичка анализа за октобар 2016. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/sept2016.pdf\">Синоптичка анализа за септембар 2016. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Avgust-2016.pdf\">Синоптичка анализа за август 2016. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Jul2016.pdf\">Синоптичка анализа за јул 2016. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Jun2016.pdf\">Синоптичка анализа за јун 2016. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Maj2016.pdf\">Синоптичка анализа за мај 2016. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/April2016.pdf\">Синоптичка анализа за април 2016. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Mart2016.pdf\">Синоптичка анализа за март 2016. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Feb2016.pdf\">Синоптичка анализа за фебруар 2016. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Jan2016.pdf\">Синоптичка анализа за јануар 2016. године</a></p><p>——————————————————————————–</p><p><strong>Синоптичке анализе за 2015. годину</strong><br>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Dec2015.pdf\">Синоптичка анализа за децембар 2015. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Nov2015.pdf\">Синоптичка анализа за новембар 2015. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Oktobar-2015.pdf\">Синоптичка анализа за октобар 2015. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Septembar-2015.pdf\">Синоптичка анализа за септембар 2015. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Avgust2015.pdf\">Синоптичка анализа за avgust 2015. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Jul2015.pdf\">Синоптичка анализа за јул 2015. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/jun2015.pdf\">Синоптичка анализа за&nbsp;јун 2015. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/maj2015.pdf\">Синоптичка анализа за мај 2015. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/april-2015.pdf\">Синоптичка анализа за април 2015. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/mart2015.pdf\">Синоптичка анализа за март 2015. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/februar2015.pdf\">Синоптичка анализа за фебруар 2015. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/januar15.pdf\">Синоптичка анализа за јануар 2015. године</a></p><p>——————————————————————————–</p><p><strong>Синоптичке анализе за 2014. годину</strong><br>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/decembar14.pdf\">Синоптичка анализа за&nbsp;децембар 2014. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/novembar2014.pdf\">Синоптичка анализа за&nbsp;новембар 2014. године</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/oktobar2014.pdf\">Синоптичка анализа за&nbsp;октобар 2014. године</a><br>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/septembar2014.pdf\">Синоптичка анализа за&nbsp;септембар 2014. године</a><br>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/avgust2014.pdf\">Синоптичка анализа за август 2014. године</a><br>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/jul2014.pdf\">Синоптичка анализа за јул 2014. године</a><br>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/jun2014.pdf\">Синоптичка анализа за јун 2014. године</a><br>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/maj2014.pdf\">Синоптичка анализа за мај 2014. године</a><br>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/april2014.pdfnopticka_analliza/april2014.pdf\">Синоптичка анализа за април 2014. године</a><br>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/mart2014.pdf\">Синоптичка анализа за март 2014. године</a><br>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/februar2014.pdf\">Синоптичка анализа за фебруар 2014. године</a><br>&nbsp;</p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/januar2014.pdf\">Синоптичка анализа за јануар 2014. године&nbsp;</a><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/decembar14.pdf\">&nbsp;</a></p><p>——————————————————————————–</p>','2022-09-20 18:33:39','2022-09-20 18:33:39',NULL),(12,'Климатологија','klimatologija','<p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Klimatoloska_analiza_2017.pdf\">Климатолошка анализа за 2017. годину</a></p><p><a href=\"https://rhmzrs.com/wp-content/uploads/2018/09/Final_11.pdf\">Климатолошка анализа за 2016. годину</a></p><h4>Вријеме и клима</h4><p><strong>Вријеме</strong>&nbsp;је трeнутно стање атмосфере на одређеном мјесту и у одређеном простору. Изражава се преко својих елемената: температуре, садржаја водене паре,притиска, брзине и правца струјања, облачности, појава<strong>,…</strong></p><p><strong>Клима</strong>&nbsp;је просјечно (средње) стање атмосфере изнад одређеног мјеста у одређеном раздобљу узимајући у обзир средња и екстремна одступања. Она је скуп свих климатских елемената у одређеном временском периоду (од мјесец, два, преко периода годишњих доба, до године, низа година па до дужих временских периода). Да би се одредила клима једног мјеста неопходан је дугогодишњи низ поузданих података како би из тога&nbsp; израчунате средње вриједности климатских елемената биле репрезентативне. &nbsp;По одлуци СМО (Свјетске Метеоролошке Организације-<i>World Meteorological Organization – WMO)&nbsp;</i>&nbsp;стандардни климатолошки период&nbsp;<a href=\"http://kopenpillen.nl/\">apotheek cialis</a>&nbsp;је раздобље од 30 година. Посљедње раздобље тзв. климатска нормала&nbsp; је од 1961-1990, сљедећа ће бити 1991-2020. Међутим, препорука СМО је да се за анализе и студије користи нови упоредни низ (нормала климатских елемената) из раздобља 1981-2010.</p><p>Квалитетно праћење климе подразумијева континуирано (из дана у дан, у истим временским терминима и по стандардима СМО) праћење времена тј. стања атмосфере у неком мјесту. Одвија се кроз мјерења метеоролошких елемената (температуре, влаге, притиска, сунчевог зрачења, вјетра, облачности, количине падавина, висине снијежног покривача и његове густине, видљивости) те биљежења метеоролошких појава (сијања Сунца, падавина и њихове врсте: киша, снијег, крупа, град, измаглица, грмљавина, сијевања, а и појава које се јављају при тлу или на објектима: роса, иње, слана…)</p><p>Када се говори о основним појмовима климе неопходно је напоменути&nbsp; да на њено стање и промјенљивост утичу климатски фактори (астрономски, географски, метеоролошки и антрополошки – људски утицај) и климатски модификатори. Из тога произилази њена велика комплексност и условљеност од многих природних и људских дјеловања&nbsp;<a href=\"http://pillstock.net/\">pillstock</a>. У посљедње вријеме се дешавају нагле климатске промјене, са израженом варијабилношћу климе и појавом екстремних стања, што бављење њом изискује велику озбиљност и велика улагања, како би се на адекватан начин приказали трендови промјена, што представља кључну чињеницу за правовремени људски одговор на климатске промјене и прилагођење истим.</p><h4>Клима Републике Српске</h4><p>Климу Републике Српске одређују основни климатски фактори: географски положај, геолошка подлога, рељеф, близина Јадранског мора и покривеност терена биљним свијетом.</p><p>Поред ових основних фактора, јављају се и додатни екстремни фактори који у знатној мјери утичу на климу у РС. То су струје суптропског појаса, високог ваздушног притиска и субполарног појаса, ниског ваздушног притиска, а све ово има за посљедицу смјену поларних и тропских ваздушних маса. Затим, струје са Атлантика, циклони из Средоземља и Јадранског мора и антициклони из континенталног дијела Азије.</p><p>Све ове процесе у великој мјери ремети рељеф који се јавља као главни модификатор. Управо због тога на територији Републике Српске се јављају три основна типа климе: умјерено-континентална, планинска и планиско-котлинска, и медитеранска.</p><p>Умјерено континентална се јавља на сјеверу, медитеранска на југу, а линијом која раздваја ова два региона налази се простор високих планина, висоравни и клисура у којима, у зависности од надморске висине, доминира планинска клима.</p><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/1-mala.jpg\" alt=\"\"></figure><p>Слика 1. Просторна дистрибуција средње годишње температуре у БиХ, период 1981-2010. год. (извор: SNC BiH према UNFCCC драфт верзија август 2012)</p><p><strong>Умјерено континентална клима&nbsp;</strong>је заступљена на простору сјевера Републике Српске.Ово обухвата Крајину, Посавину као и Семберију. Мјерне станице које се налазе у овом климатском типу су: Бања Лука, Бијељина, Дервента, Добој, Нови Град, Градишка, Приједор, Србац, Вишеград, Сребреница, Зворник. У Семберији се осјећа и панонски(степски) климатски утицај, због близине Панонске низије. Главне одлике овог типа климе су топла љета и хладне зиме. Љетње температре могу порасти и преко 40°C, апсолутни максимум је измјерен 2007. год. у Бјељини и у Вишеграду 43°C. Просјечна температура ваздуха у најтоплијем дијелу године (у јулу) је између 20°C и 23°C, док је просјечна температура у најхладнијем дијелу године (у јануару) око нула степени целзијуса. &nbsp;Апсолутни минумуми могу достићи и до -30°C. Просјечна годишња температура је изнад 10°C.</p><p>На количину кишних падавина у РС утичу влажне ваздушне масе које долазе са запада (са Атлантика) и са југа (из Јадрана). Падавине су најваријабилнији климатски параметар у смислу простора и времена. У области гдје је заступљен умјерено-континентални тип климе највећа количина падавина јавља се у топлом дијелу године, а максимум се јавља у јуну. Количина падавина износи од око 750 л/м² годишње на сјеверу дуж реке Саве, до 1500 л/м² на западу Крајине.</p><p>Умјерено-континентална клима дијелом је заступљена и у планинско-котлинским предјелима који су до 1000 метара надморсе висине. Ту се могу сврстати станице: Мркоњић Град, Шипово, Рибник, Рудо, Фоча и Дринић, а са порастом надморске висине и клима се мијења.&nbsp;</p><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/2-mala.jpg\" alt=\"\"></figure><p>Слика 2. Просторна дистрибуција средње годишње количине падавина у БиХ, период 1981-2010. год. (извор: SNC BiH према UNFCCC драфт верзија август 2012)</p><p><strong>Планинска клима-з</strong>аступљена је планинским предјелима Републике Српске. На надморској висини од 1000 до 1400 метара јавља се субпланинска (предпланинска) клима, а са порастом надморске висине изнад 1400 м прелази у праву планинску климу. Станице на којима се јавља овај тип климе су: Соколац, Чемерно и Хан Пијесак.Одлике планинске климе су кратка и свјежа љета, и дуге и хладне зиме са обилним сњежним падавинама. Прелазна годишња доба (прољеће и јесен) су слабо изражена. Просјечне јануарске температуре износе од -3,5°C до -6,5°C, а јулске од 14,5°C до 17°C. Апсолутне минималне су од -25°C до -35°C, а апсолутне максималне од 30°C до 35°C. Количина падавина је око 1200 л/м², често се јављају сњежне падавине а снијежни покривач се дуго задржава. Субпланинска клима је мало блажа уз умјерено топла љета и хладне зиме. Количина падавина у овим предјелима је мало мања, до 1000 л/м².</p><p>У планинским областима се јављају мјеста, углавном котлине, где су честе термичке инверзије. Таква мјеста су позната као мразишта. У тим мјестима се мјере најниже минималне температуре.</p><p><strong>Медитеранска (средоземна, Јадранска, субтропска)</strong>&nbsp;клима јавља се на југозападу Републике Српске, тј. у Херцеговини. Како се Херцеговина географски може подијелити на ниску Херцеговину-Хумине и високу-Рудине, тако се и различите климе јављају у овим областима. Хумине имају медитеранску и модификовану медитеранску климу, а Рудине су на прелазу између медитеранске и планинске, у зависности од надморске висине (умјерено планинско-медитеранска и планинска клима). Једини прави представник медитеранске климе у Републици Српској је метеоролошка станица Требиње.</p><p>На климу Хумина директно утиче Јадранско море, па су тако зиме благе уз средњу температуру у јануару од 3°C до 6°C. Љета су врло топла уз средње јулске температуре 22°C до 25°C. Екстремне температуре зими зависе од надморске висине, од -8°C у нижим предјелима до -15°C. Љети, максималне темперауре достижу и често прелазе 40°C. Главна одлика цијеле ове регије су падавине. Овдје доминира поморски плувиометријски режим под утицајем Медитерана, па се тако највећа количина падавина јавља касно у јесен и почетком зиме са често обилним падавинама, док је љети минимум падавина уз честу појаву суша. Годишња количина падавина износи око 2000 л/м² па све до 3000 л/м²&nbsp; колико се биљежи у Грабу, најкишовитијем месту у РС.</p><p>Снијег се ријетко јавља у нижим дијеловина Херцеговине, али у фебруару 2012. јавиле су се екстремно велике снијежне падавине.</p><p><strong>Умјерено планинско-медитеранска клима&nbsp;</strong>јавља се у области Рудина. Овдје се осјећа и даље утицај Медитерана, али и планина. Станице које описују овај тип времена су: Гацко, Билећа и Невесиње. Температура ваздуха опада са порастом надморске висине и удаљеношћу од мора. За сваких 10 км удаљености од мора температура опада од 0,6°C до 0,8°C. Зиме су овдје оштрије са средњим јануарским температурама -3°C до 0°C. Апсолутни минимуми достижу од -15°C до -20°C. Љета су мало блажа од ниске Херцеговине, али и овдје могу да се јаве екстреми и до 40°C.</p><p>И овдје су падавине обилне, око 1800&nbsp; л/м². У овим предјелима зими се јављају снијежне падавине, често и обилне уз формирање високог снијежног покривача.</p><p>Бура се често јавља, поготово зими. На превојима може бити врло јака.</p>','2022-09-20 18:36:05','2022-09-20 18:36:05',NULL),(13,'Агрометеорологија','agrometeorologija','<h4><strong>Агрометеоролошка дјелатност</strong></h4><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/agro-1.jpg\" alt=\"\"></figure><p>Биометеорологија је интердисциплинарна наука која, на основу сазнања из биологије и екологије са једне и метеорологије са друге стране, проучава односе између живих бића, времена и климе. У оквиру биометеорологије развила се посебна научна дисциплина чији је циљ примјена сазнања из метеорологије у пољопривреди, а то је агрометеорологија. Агрометеорологија проучава систем интеракција између временских, климатских и хидрилошких услова и пољопривредних култура, домаћих животиња, болести биљака и животиња, корисних и штетних инсеката.</p><h3>Дјелокруг одјељења за агрометеорологију у РХМЗ</h3><p>У хидрометеоролошкој служби Републике Српске, организована је агрометеоролошка активност 1992. године. Тада је формиран одсјек за агрометеорологију. Данас, опреративни, истраживачки и други послови везани за примијењену метеорологију у пољопривреди обављају се у одсјеку за агрометеорологију.</p><h4>Један од видова укључења у пољопривреду су:</h4><ul><li>Агро меторолошке информације и прогнозе су један од најважнијих видова пружања помоћи пољоприврди. Правовремено прогнозирање о неповољном утицају времена на пољопривредне културе, затим датум наступа одређених фаза развића најважнијих пољопривредних култура, а нарочито приноса омогућава припрему и спровођење одговарајућих агротехничких мјера његе и заштите.<br>&nbsp;</li><li>Проучавања климе земљишта је од посебног значаја а то подразумијева проучавање топлотног и водног режима слоја земљишта у коме се налази корјенов систем биљака.<br>&nbsp;</li></ul><p>&nbsp;</p><h4>Послови оперативне агрометеорологије</h4><ul><li>Прикупљање и контрола агрометеоролошких података<br>&nbsp;</li><li>Обрада, анализа и публиковање агрометеоролошких података (температура земљишта, испаравање и евапотранспирације, фенолошки подаци)<br>&nbsp;</li><li>Мониторинг агрометеоролошких услова у којима се одвијају раст и развиће пољопривредних култура, припрема редовних и ванредних агрометеоролошких информација, анализа, прогноза и упозорења.</li></ul><h4>Послови агрометеоролошких истраживања</h4><ul><li>Проучавање агроклиматског потенцијала и њихових промјена, проучавање штетних метеоролошких појава (суша, мраз и др.)<br>&nbsp;</li><li>Проучавање основних компоненти водног биланса пољопривредних култура, посебно стварне и потенцијалне евапотранспирације.</li></ul><p>&nbsp;</p><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/agro-2.jpg\" alt=\"\"></figure><p>&nbsp;</p><p>&nbsp;</p><h4>Послови по захтјеву корисника</h4><ul><li>Припрема агрометеоролошких прогноза и анализа услова за раст и развиће пољопривредних култура током вегетације за поједина подручја</li><li>Пружање стручне помоћи при успостављању и спровођењу агрометеоролошких осматрања по захтјеву и потребама корисника.</li></ul><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/agro-3.jpg\" alt=\"\"></figure>','2022-09-20 18:37:36','2022-09-20 18:37:36',NULL),(14,'Актуелности','aktuelnosti','<p>динамиц паге</p>','2022-09-20 18:42:35','2022-09-20 18:44:43',NULL),(15,'Занимљивости','zanimljivosti','<p>динамиц паге</p>','2022-09-20 18:44:18','2022-09-20 18:44:18',NULL),(16,'Пројекти','meteorologija-projekti','<p>динамиц паге</p>','2022-09-20 18:45:06','2022-09-20 18:45:06',NULL),(17,'Сарадња','meteorologija-saradnja','<p><strong>Споразум о сарадњи са Републичким &nbsp;хидрометеоролошким заводом Републике Србије</strong></p><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/rhmz_logo2-1.gif\" alt=\"\"></figure><p><strong>Споразум о сарадњи са ХМЗ Црне Горе</strong></p><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/slika.php_-1.jpg\" alt=\"\"></figure><p><strong>Споразум о сарадњи са Федералним хидрометеоролошким заводом</strong></p><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/federalni-1.png\" alt=\"\"></figure><p><strong>Трилатерални Споразум о сарадњи са ФХМИ Сарајево и УХМР (Управа за хидрометеоролошли работи) Бивше Југословенске Републике Македоније</strong></p><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/logo-1.gif\" alt=\"\"></figure><p><strong>Споразум о сарадњи са ХЕТ-ом</strong></p><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/hetlogo-1.gif\" alt=\"\"></figure>','2022-09-20 18:47:29','2022-09-20 18:47:29',NULL),(20,'О бањалучким земљотресима','o-banjaluckim-zemljotresima','<p>Бањалучко сеизмогено подручје обухвата простор од око 10 000 km2&nbsp;односно територију на растојању 50 km од Бање Луке и гледано на основу различитих повратних периода спада у подручје VII, VIII и IX степена максимално очекиваног интензитета по MCS скали. Основне карактеристике сеизмичности овог подручја дефинисане на основу података о земљотресима који су се догодили&nbsp; на бањалучком подручју као и из жаришта која окружују овај регион и остварују на њему значајне сеизмичке ефекте. Историјски гледано ово подручје карактеришу, према расположивим подацима, сљедећи земљотреси:</p><ul><li>Прва серија земљотреса десила се 1888. године а представник серије је земљотрес који се десио 20.05.1888.год.М=5.7 јединица Рихтерове скале и интензитета VII степени MCS (Mercalli-Cancani-Sieberg) скале.</li><li>Друга серија десила се 1935. године а најјачи од укупно 7 земљотреса који су се у тој серији десили је земљотрес од 11.10.1935.године M=5.1 јединица Рихтерове скале и интензитета VII степени MCS скале.</li></ul><p>26 и 27.октобра 1969. године десила су се за&nbsp; 4 јака земљотреса, главном удару су претходила 2 јака земљотреса:</p><ul><li>26.10.1969.год. у 15 сати 36 мин&nbsp; земљотрес М=5.6 јединица Рихтерове скале</li><li>27.10.1969год. у 2 сата 55 мин&nbsp; земљотрес М= 4.8 јединица Рихтерове скале</li></ul><p>Главни удар десио се 27.10.1969. године&nbsp; у 8 сати 10 мин&nbsp; са магнитудом&nbsp; М=6.6 јединица Рихтерове скале послије којег је услиједио накнадни удар&nbsp; у 8 сати 53 мин М=4.7 јединица Рихтерове скале.</p><p>Земљотреси су оставили катастрофалне посљедице на подручју 15 општина Босанске Крајине: Бања Лука, Челинац, Лакташи, Градишка, Прњавор, Котор Варош, Кнежево, Србац, Кључ, Јајце, Приједор, Сански Мост, Кључ, Козарска Дубица и Нови Град.</p><p>Земљотреси су прозроковали људске жртве,15 људи је смртно страдало:</p><ul><li>13 у згради Титаник која је претврпјела тешка конструктивна оштећења</li><li>једна дјевојчица је страдала у улици Браће и сестара Капор-обрушио се дио куће и усмртио дјевојчицу која се у дворишту играла,</li><li>једна &nbsp;мушкарац &nbsp;испред&nbsp; тадашњег ресторана&nbsp; Козара-&nbsp; усмртила га је &nbsp;цигла кад је у паници истрчао испред ресторана приликом једног од накнадних удара</li></ul><p>а повријеђено је 1117 особа. Земљотрес је нанио огромну материјалну штету на 86 000 стамбених јединица:</p><ul><li>266 школских објеката</li><li>152 објекта јавне управе и администрације</li><li>146 културних објеката</li><li>133 здравствена објеката</li><li>29 социјалних установа</li></ul><p>&nbsp;Послије ове серије земљотреса током 1969. &nbsp;године десио се још један јачи &nbsp;накнадни удар&nbsp; 31.12.1969. године у 14сати 18 мин М= 5.3 јединица Рихтерове скале. Значајнији земљотреси након 1969. године су:</p><ul><li>20.10.1970. године &nbsp;у 14сати 45мин &nbsp;са М=4.5 Рихтера</li><li>20.10.1970. године &nbsp;у 21сат 19мин са М=4.6 Рихтера</li><li>17.02.1975. године &nbsp;у 15 сати 24мин са М=4.0 Рихтера</li><li>21.04.1975. године &nbsp;у 1 сат 31мин&nbsp; са М=4.7 Рихтера</li><li>21.04.1977. године &nbsp;у 1 сат 31мин&nbsp; са М=4.7 Рихтера</li><li>13.08.1981. године &nbsp;у 3сата 58мин са М=5.4 Рихтера</li></ul><p>&nbsp;Након 30 година затишја, &nbsp;јачи земљотрeси који су десили на подручју бањалучког региона&nbsp;&nbsp; су</p><ul><li>29. 04. 2011. године у 01 сат 30 мин, магнитуде М=4.3 јединице Рихтерове скале</li><li>28.01.2014. године у 01 сат 38 мин, магнитуде М=4.2 јединице Рихтерове скале</li></ul><p>На сликама испод приказани неки од објеката оштећених током земљотреса 1969. године:</p><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/3_04-1.jpg\" alt=\"\"></figure><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/3_05-1.jpg\" alt=\"\"></figure><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/3_06-1.jpg\" alt=\"\"></figure><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/3_16-1.jpg\" alt=\"\"></figure><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/3_29-1.jpg\" alt=\"\"></figure><figure class=\"image\"><img src=\"https://rhmzrs.com/wp-content/uploads/2018/09/3_31-1.jpg\" alt=\"\" srcset=\"https://rhmzrs.com/wp-content/uploads/2018/09/3_31-1.jpg 600w, https://rhmzrs.com/wp-content/uploads/2018/09/3_31-1-385x265.jpg 385w\" sizes=\"100vw\" width=\"600\"></figure><p>&nbsp;</p>','2022-09-20 18:56:40','2022-09-20 18:56:40',NULL);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `role_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  KEY `role_id_fk_7297140` (`role_id`),
  KEY `permission_id_fk_7297140` (`permission_id`),
  CONSTRAINT `permission_id_fk_7297140` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_id_fk_7297140` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,23),(1,24),(1,25),(1,26),(1,27),(1,28),(1,29),(1,30),(1,31),(1,32),(1,33),(1,34),(1,35),(1,36),(1,37),(1,38),(1,39),(1,40),(1,41),(1,42),(1,43),(1,44),(1,45),(1,46),(1,47),(1,48),(1,49),(1,50),(1,51),(1,52),(1,53),(1,54),(1,55),(1,56),(1,57),(1,58),(1,59),(1,60),(1,61),(1,62),(1,63),(2,17),(2,18),(2,19),(2,20),(2,21),(2,22),(2,23),(2,24),(2,25),(2,26),(2,27),(2,28),(2,29),(2,30),(2,31),(2,32),(2,33),(2,34),(2,35),(2,36),(2,37),(2,38),(2,39),(2,40),(2,41),(2,42),(2,43),(2,44),(2,45),(2,46),(2,47),(2,48),(2,49),(2,50),(2,51),(2,52),(2,53),(2,54),(2,55),(2,56),(2,57),(2,58),(2,59),(2,60),(2,61),(2,62),(2,63);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'user_management_access',NULL,NULL,NULL),(2,'permission_create',NULL,NULL,NULL),(3,'permission_edit',NULL,NULL,NULL),(4,'permission_show',NULL,NULL,NULL),(5,'permission_delete',NULL,NULL,NULL),(6,'permission_access',NULL,NULL,NULL),(7,'role_create',NULL,NULL,NULL),(8,'role_edit',NULL,NULL,NULL),(9,'role_show',NULL,NULL,NULL),(10,'role_delete',NULL,NULL,NULL),(11,'role_access',NULL,NULL,NULL),(12,'user_create',NULL,NULL,NULL),(13,'user_edit',NULL,NULL,NULL),(14,'user_show',NULL,NULL,NULL),(15,'user_delete',NULL,NULL,NULL),(16,'user_access',NULL,NULL,NULL),(17,'content_management_access',NULL,NULL,NULL),(18,'link_create',NULL,NULL,NULL),(19,'link_edit',NULL,NULL,NULL),(20,'link_show',NULL,NULL,NULL),(21,'link_delete',NULL,NULL,NULL),(22,'link_access',NULL,NULL,NULL),(23,'page_create',NULL,NULL,NULL),(24,'page_edit',NULL,NULL,NULL),(25,'page_show',NULL,NULL,NULL),(26,'page_delete',NULL,NULL,NULL),(27,'page_access',NULL,NULL,NULL),(28,'post_create',NULL,NULL,NULL),(29,'post_edit',NULL,NULL,NULL),(30,'post_show',NULL,NULL,NULL),(31,'post_delete',NULL,NULL,NULL),(32,'post_access',NULL,NULL,NULL),(33,'public_competition_create',NULL,NULL,NULL),(34,'public_competition_edit',NULL,NULL,NULL),(35,'public_competition_show',NULL,NULL,NULL),(36,'public_competition_delete',NULL,NULL,NULL),(37,'public_competition_access',NULL,NULL,NULL),(38,'public_purchase_create',NULL,NULL,NULL),(39,'public_purchase_edit',NULL,NULL,NULL),(40,'public_purchase_show',NULL,NULL,NULL),(41,'public_purchase_delete',NULL,NULL,NULL),(42,'public_purchase_access',NULL,NULL,NULL),(43,'project_create',NULL,NULL,NULL),(44,'project_edit',NULL,NULL,NULL),(45,'project_show',NULL,NULL,NULL),(46,'project_delete',NULL,NULL,NULL),(47,'project_access',NULL,NULL,NULL),(48,'questionnaire_create',NULL,NULL,NULL),(49,'questionnaire_edit',NULL,NULL,NULL),(50,'questionnaire_show',NULL,NULL,NULL),(51,'questionnaire_delete',NULL,NULL,NULL),(52,'questionnaire_access',NULL,NULL,NULL),(53,'question_create',NULL,NULL,NULL),(54,'question_edit',NULL,NULL,NULL),(55,'question_show',NULL,NULL,NULL),(56,'question_delete',NULL,NULL,NULL),(57,'question_access',NULL,NULL,NULL),(58,'answer_create',NULL,NULL,NULL),(59,'answer_edit',NULL,NULL,NULL),(60,'answer_show',NULL,NULL,NULL),(61,'answer_delete',NULL,NULL,NULL),(62,'answer_access',NULL,NULL,NULL),(63,'profile_password_edit',NULL,NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `html_content` longtext COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `page_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_fk_7299098` (`page_id`),
  CONSTRAINT `page_fk_7299098` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `html_content` longtext COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `page_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_fk_7299094` (`page_id`),
  CONSTRAINT `page_fk_7299094` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_competitions`
--

DROP TABLE IF EXISTS `public_competitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `public_competitions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `html_content` longtext COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `page_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_fk_7299097` (`page_id`),
  CONSTRAINT `page_fk_7299097` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_competitions`
--

LOCK TABLES `public_competitions` WRITE;
/*!40000 ALTER TABLE `public_competitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `public_competitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_purchases`
--

DROP TABLE IF EXISTS `public_purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `public_purchases` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `html_content` longtext COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `page_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_fk_7299096` (`page_id`),
  CONSTRAINT `page_fk_7299096` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_purchases`
--

LOCK TABLES `public_purchases` WRITE;
/*!40000 ALTER TABLE `public_purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `public_purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionnaires`
--

DROP TABLE IF EXISTS `questionnaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questionnaires` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionnaires`
--

LOCK TABLES `questionnaires` WRITE;
/*!40000 ALTER TABLE `questionnaires` DISABLE KEYS */;
/*!40000 ALTER TABLE `questionnaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `questionnaire_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questionnaire_fk_7298986` (`questionnaire_id`),
  CONSTRAINT `questionnaire_fk_7298986` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaires` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  KEY `user_id_fk_7297149` (`user_id`),
  KEY `role_id_fk_7297149` (`role_id`),
  CONSTRAINT `role_id_fk_7297149` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_7297149` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin',NULL,NULL,NULL),(2,'User',NULL,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com',NULL,'$2y$10$rnXmU305wBEZMUZCb4QqzeBqgZozrs95jA6P5XepcgOcQmekuZPn.','mlINcdEamq5AM57EI7cEsTfJqCR3i1jt3tTZpFm8wIp7aEoqEjFEgIuivHFg',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-20 23:08:25
