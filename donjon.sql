-- MariaDB dump 10.19-11.1.2-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: donjon
-- ------------------------------------------------------
-- Server version	11.1.2-MariaDB

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
-- Table structure for table `armes`
--

DROP TABLE IF EXISTS `armes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `armes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `rarete` varchar(20) DEFAULT NULL,
  `niveauRequis` int(11) NOT NULL,
  `degats` int(11) NOT NULL,
  `poids` int(11) DEFAULT NULL,
  `est_maudite` tinyint(1) NOT NULL,
  `effet_special` tinyint(1) NOT NULL,
  `specialite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `armes`
--

LOCK TABLES `armes` WRITE;
/*!40000 ALTER TABLE `armes` DISABLE KEYS */;
INSERT INTO `armes` VALUES
(202,'Arc','Commun',1,25,10,0,0,''),
(203,'Bâton Magique','Commun',1,17,6,0,0,''),
(204,'Épée','Commun',1,40,30,0,0,''),
(205,'Arc','Commun',1,25,10,0,0,''),
(206,'Bâton Magique','Commun',1,17,6,0,0,''),
(207,'Épée','Commun',1,40,30,0,0,''),
(208,'Arc','Commun',1,25,10,0,0,''),
(209,'Bâton Magique','Commun',1,17,6,0,0,''),
(210,'Épée','Commun',1,40,30,0,0,''),
(211,'Arc','Commun',1,25,10,0,0,''),
(212,'Bâton Magique','Commun',1,17,6,0,0,''),
(213,'Épée','Commun',1,40,30,0,0,''),
(214,'Arc','Commun',1,25,10,0,0,''),
(215,'Bâton Magique','Commun',1,17,6,0,0,''),
(216,'Épée','Commun',1,40,30,0,0,''),
(217,'Arc','Commun',1,25,10,0,0,''),
(218,'Bâton Magique','Commun',1,17,6,0,0,''),
(219,'Épée','Commun',1,40,30,0,0,'');
/*!40000 ALTER TABLE `armes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enigmes`
--

DROP TABLE IF EXISTS `enigmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enigmes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `reponse_correcte` varchar(50) DEFAULT NULL,
  `reponse_fausse_1` varchar(50) DEFAULT NULL,
  `reponse_fausse_2` varchar(50) DEFAULT NULL,
  `reponse_fausse_3` varchar(50) DEFAULT NULL,
  `id_salle` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_personnage` (`id_personnage`),
  CONSTRAINT `enigmes_ibfk_1` FOREIGN KEY (`id_personnage`) REFERENCES `personnages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enigmes`
--

LOCK TABLES `enigmes` WRITE;
/*!40000 ALTER TABLE `enigmes` DISABLE KEYS */;
INSERT INTO `enigmes` VALUES
(1,1,'Je suis une créature volante avec des écailles, cracheur de feu, et souvent considéré comme un gardien de trésor. Qui suis-je ?','Dragon','','','',1),
(2,1,'Je suis une arme légendaire autrefois utilisée par les héros pour combattre les forces du mal. Qu\'est-ce que je suis ?','Épée légendaire','','','',2),
(3,1,'Je suis une créature qui se cache dans l\'ombre, embusquée dans les donjons, attendant de bondir sur les intrus. Qui suis-je ?','Ombre','','','',3),
(4,1,'Je suis une sphère magique qui peut prédire l\'avenir et répondre à des questions. Que suis-je ?','Boule de cristal','','','',4),
(5,1,'Je suis une relique ancienne, généralement ornée de pierres précieuses, et je confère des pouvoirs magiques à celui qui me porte. Qu\'est-ce que je suis ?','Artefact magique','','','',5),
(6,1,'Je suis un sortilège puissant qui invoque des créatures pour combattre aux côtés du lanceur. Quel sort suis-je ?','Invocation de familiers','','','',6);
/*!40000 ALTER TABLE `enigmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventaire`
--

DROP TABLE IF EXISTS `inventaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arme_id` int(11) DEFAULT NULL,
  `poids_arme` int(11) DEFAULT NULL,
  `capacite_stockage` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `arme_id` (`arme_id`),
  CONSTRAINT `inventaire_ibfk_1` FOREIGN KEY (`arme_id`) REFERENCES `armes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventaire`
--

LOCK TABLES `inventaire` WRITE;
/*!40000 ALTER TABLE `inventaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monstres`
--

DROP TABLE IF EXISTS `monstres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monstres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `pointsDeVie` int(11) NOT NULL,
  `pointsAttaque` int(11) NOT NULL,
  `pointsDefense` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `armeEquipee` varchar(100) DEFAULT NULL,
  `passif` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `est_vivant` tinyint(1) NOT NULL,
  `id_salle` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_salle` (`id_salle`),
  CONSTRAINT `monstres_ibfk_1` FOREIGN KEY (`id_salle`) REFERENCES `salles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monstres`
--

LOCK TABLES `monstres` WRITE;
/*!40000 ALTER TABLE `monstres` DISABLE KEYS */;
INSERT INTO `monstres` VALUES
(1,'Golem enfantin',100,10,5,0,1,'Lianes acérés','Vide','Normal',1,1),
(2,'Chimère',250,20,120,80,4,'Hache de la bête','Vide','Normal',1,4),
(3,'Gargouille de pierre',400,30,1200,80,4,'Lianes acérés','Vide','Normal',1,7),
(4,'Hydre venimeuse',850,50,2600,100,5,'Morsure toxique','Poison','Aquatique',1,10),
(5,'Dragon de lave',1200,65,3000,120,8,'Souffle de lave','Feu','Volant',1,13),
(6,'Lunairia',2000,110,3400,100,6,'Lance divinatoire','Grade incondescendant','Boss',1,16),
(7,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','Vide','Normal',1,5),
(8,'fantome errant',490,25,120,30,3,'Attaque fantomatique','Vide','Normal',1,8),
(9,'Golem de la foret',740,35,2400,80,4,'Lianes acérés','Vide','Normal',1,11),
(10,'Reine des Sorcière ',1000,55,60,100,5,'Bâton de la rédemption','Vide','Boss',1,14),
(11,'Megicula',1600,120,1200,110,6,'Griffe de la bête','Vide','Boss',1,17),
(12,'Palefroi',100,10,5,0,1,'Sabot de la bête','vide','Normal',1,3),
(13,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','vide','Normal',1,5),
(14,'Minotaure',250,20,120,80,4,'Hache de la bête','vide','Normal',1,9),
(15,'Démon',350,30,320,80,5,'Epée de l\'avenant','vide','Normal',1,12),
(16,'Ange déchu',650,500,95,100,5,'Lame du déchu','vide','Normal',1,15),
(17,'Roi des démons',2000,110,3400,100,6,'Epée de la mort','Rage démoniaque','Boss',1,18),
(18,'Golem enfantin',100,10,5,0,1,'Lianes acérés','Vide','Normal',1,1),
(19,'Chimère',250,20,120,80,4,'Hache de la bête','Vide','Normal',1,4),
(20,'Gargouille de pierre',400,30,1200,80,4,'Lianes acérés','Vide','Normal',1,7),
(21,'Hydre venimeuse',850,50,2600,100,5,'Morsure toxique','Poison','Aquatique',1,10),
(22,'Dragon de lave',1200,65,3000,120,8,'Souffle de lave','Feu','Volant',1,13),
(23,'Lunairia',2000,110,3400,100,6,'Lance divinatoire','Grade incondescendant','Boss',1,16),
(24,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','Vide','Normal',1,5),
(25,'fantome errant',490,25,120,30,3,'Attaque fantomatique','Vide','Normal',1,8),
(26,'Golem de la foret',740,35,2400,80,4,'Lianes acérés','Vide','Normal',1,11),
(27,'Reine des Sorcière ',1000,55,60,100,5,'Bâton de la rédemption','Vide','Boss',1,14),
(28,'Megicula',1600,120,1200,110,6,'Griffe de la bête','Vide','Boss',1,17),
(29,'Palefroi',100,10,5,0,1,'Sabot de la bête','vide','Normal',1,3),
(30,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','vide','Normal',1,5),
(31,'Minotaure',250,20,120,80,4,'Hache de la bête','vide','Normal',1,9),
(32,'Démon',350,30,320,80,5,'Epée de l\'avenant','vide','Normal',1,12),
(33,'Ange déchu',650,500,95,100,5,'Lame du déchu','vide','Normal',1,15),
(34,'Roi des démons',2000,110,3400,100,6,'Epée de la mort','Rage démoniaque','Boss',1,18),
(35,'Golem enfantin',100,10,5,0,1,'Lianes acérés','Vide','Normal',1,1),
(36,'Chimère',250,20,120,80,4,'Hache de la bête','Vide','Normal',1,4),
(37,'Gargouille de pierre',400,30,1200,80,4,'Lianes acérés','Vide','Normal',1,7),
(38,'Hydre venimeuse',850,50,2600,100,5,'Morsure toxique','Poison','Aquatique',1,10),
(39,'Dragon de lave',1200,65,3000,120,8,'Souffle de lave','Feu','Volant',1,13),
(40,'Lunairia',2000,110,3400,100,6,'Lance divinatoire','Grade incondescendant','Boss',1,16),
(41,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','Vide','Normal',1,5),
(42,'fantome errant',490,25,120,30,3,'Attaque fantomatique','Vide','Normal',1,8),
(43,'Golem de la foret',740,35,2400,80,4,'Lianes acérés','Vide','Normal',1,11),
(44,'Reine des Sorcière ',1000,55,60,100,5,'Bâton de la rédemption','Vide','Boss',1,14),
(45,'Megicula',1600,120,1200,110,6,'Griffe de la bête','Vide','Boss',1,17),
(46,'Palefroi',100,10,5,0,1,'Sabot de la bête','vide','Normal',1,3),
(47,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','vide','Normal',1,5),
(48,'Minotaure',250,20,120,80,4,'Hache de la bête','vide','Normal',1,9),
(49,'Démon',350,30,320,80,5,'Epée de l\'avenant','vide','Normal',1,12),
(50,'Ange déchu',650,500,95,100,5,'Lame du déchu','vide','Normal',1,15),
(51,'Roi des démons',2000,110,3400,100,6,'Epée de la mort','Rage démoniaque','Boss',1,18),
(52,'Golem enfantin',100,10,5,0,1,'Lianes acérés','Vide','Normal',1,1),
(53,'Chimère',250,20,120,80,4,'Hache de la bête','Vide','Normal',1,4),
(54,'Gargouille de pierre',400,30,1200,80,4,'Lianes acérés','Vide','Normal',1,7),
(55,'Hydre venimeuse',850,50,2600,100,5,'Morsure toxique','Poison','Aquatique',1,10),
(56,'Dragon de lave',1200,65,3000,120,8,'Souffle de lave','Feu','Volant',1,13),
(57,'Lunairia',2000,110,3400,100,6,'Lance divinatoire','Grade incondescendant','Boss',1,16),
(58,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','Vide','Normal',1,5),
(59,'fantome errant',490,25,120,30,3,'Attaque fantomatique','Vide','Normal',1,8),
(60,'Golem de la foret',740,35,2400,80,4,'Lianes acérés','Vide','Normal',1,11),
(61,'Reine des Sorcière ',1000,55,60,100,5,'Bâton de la rédemption','Vide','Boss',1,14),
(62,'Megicula',1600,120,1200,110,6,'Griffe de la bête','Vide','Boss',1,17),
(63,'Palefroi',100,10,5,0,1,'Sabot de la bête','vide','Normal',1,3),
(64,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','vide','Normal',1,5),
(65,'Minotaure',250,20,120,80,4,'Hache de la bête','vide','Normal',1,9),
(66,'Démon',350,30,320,80,5,'Epée de l\'avenant','vide','Normal',1,12),
(67,'Ange déchu',650,500,95,100,5,'Lame du déchu','vide','Normal',1,15),
(68,'Roi des démons',2000,110,3400,100,6,'Epée de la mort','Rage démoniaque','Boss',1,18),
(69,'Golem enfantin',100,10,5,0,1,'Lianes acérés','Vide','Normal',1,1),
(70,'Chimère',250,20,120,80,4,'Hache de la bête','Vide','Normal',1,4),
(71,'Gargouille de pierre',400,30,1200,80,4,'Lianes acérés','Vide','Normal',1,7),
(72,'Hydre venimeuse',850,50,2600,100,5,'Morsure toxique','Poison','Aquatique',1,10),
(73,'Dragon de lave',1200,65,3000,120,8,'Souffle de lave','Feu','Volant',1,13),
(74,'Lunairia',2000,110,3400,100,6,'Lance divinatoire','Grade incondescendant','Boss',1,16),
(75,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','Vide','Normal',1,5),
(76,'fantome errant',490,25,120,30,3,'Attaque fantomatique','Vide','Normal',1,8),
(77,'Golem de la foret',740,35,2400,80,4,'Lianes acérés','Vide','Normal',1,11),
(78,'Reine des Sorcière ',1000,55,60,100,5,'Bâton de la rédemption','Vide','Boss',1,14),
(79,'Megicula',1600,120,1200,110,6,'Griffe de la bête','Vide','Boss',1,17),
(80,'Palefroi',100,10,5,0,1,'Sabot de la bête','vide','Normal',1,3),
(81,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','vide','Normal',1,5),
(82,'Minotaure',250,20,120,80,4,'Hache de la bête','vide','Normal',1,9),
(83,'Démon',350,30,320,80,5,'Epée de l\'avenant','vide','Normal',1,12),
(84,'Ange déchu',650,500,95,100,5,'Lame du déchu','vide','Normal',1,15),
(85,'Roi des démons',2000,110,3400,100,6,'Epée de la mort','Rage démoniaque','Boss',1,18),
(86,'Golem enfantin',100,10,5,0,1,'Lianes acérés','Vide','Normal',1,1),
(87,'Chimère',250,20,120,80,4,'Hache de la bête','Vide','Normal',1,4),
(88,'Gargouille de pierre',400,30,1200,80,4,'Lianes acérés','Vide','Normal',1,7),
(89,'Hydre venimeuse',850,50,2600,100,5,'Morsure toxique','Poison','Aquatique',1,10),
(90,'Dragon de lave',1200,65,3000,120,8,'Souffle de lave','Feu','Volant',1,13),
(91,'Lunairia',2000,110,3400,100,6,'Lance divinatoire','Grade incondescendant','Boss',1,16),
(92,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','Vide','Normal',1,5),
(93,'fantome errant',490,25,120,30,3,'Attaque fantomatique','Vide','Normal',1,8),
(94,'Golem de la foret',740,35,2400,80,4,'Lianes acérés','Vide','Normal',1,11),
(95,'Reine des Sorcière ',1000,55,60,100,5,'Bâton de la rédemption','Vide','Boss',1,14),
(96,'Megicula',1600,120,1200,110,6,'Griffe de la bête','Vide','Boss',1,17),
(97,'Palefroi',100,10,5,0,1,'Sabot de la bête','vide','Normal',1,3),
(98,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','vide','Normal',1,5),
(99,'Minotaure',250,20,120,80,4,'Hache de la bête','vide','Normal',1,9),
(100,'Démon',350,30,320,80,5,'Epée de l\'avenant','vide','Normal',1,12),
(101,'Ange déchu',650,500,95,100,5,'Lame du déchu','vide','Normal',1,15),
(102,'Roi des démons',2000,110,3400,100,6,'Epée de la mort','Rage démoniaque','Boss',1,18),
(103,'Golem enfantin',100,10,5,0,1,'Lianes acérés','Vide','Normal',1,1),
(104,'Chimère',250,20,120,80,4,'Hache de la bête','Vide','Normal',1,4),
(105,'Gargouille de pierre',400,30,1200,80,4,'Lianes acérés','Vide','Normal',1,7),
(106,'Hydre venimeuse',850,50,2600,100,5,'Morsure toxique','Poison','Aquatique',1,10),
(107,'Dragon de lave',1200,65,3000,120,8,'Souffle de lave','Feu','Volant',1,13),
(108,'Lunairia',2000,110,3400,100,6,'Lance divinatoire','Grade incondescendant','Boss',1,16),
(109,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','Vide','Normal',1,5),
(110,'fantome errant',490,25,120,30,3,'Attaque fantomatique','Vide','Normal',1,8),
(111,'Golem de la foret',740,35,2400,80,4,'Lianes acérés','Vide','Normal',1,11),
(112,'Reine des Sorcière ',1000,55,60,100,5,'Bâton de la rédemption','Vide','Boss',1,14),
(113,'Megicula',1600,120,1200,110,6,'Griffe de la bête','Vide','Boss',1,17),
(114,'Palefroi',100,10,5,0,1,'Sabot de la bête','vide','Normal',1,3),
(115,'Ghoul',280,15,60,30,2,'Cri de l\'effroi','vide','Normal',1,5),
(116,'Minotaure',250,20,120,80,4,'Hache de la bête','vide','Normal',1,9),
(117,'Démon',350,30,320,80,5,'Epée de l\'avenant','vide','Normal',1,12),
(118,'Ange déchu',650,500,95,100,5,'Lame du déchu','vide','Normal',1,15),
(119,'Roi des démons',2000,110,3400,100,6,'Epée de la mort','Rage démoniaque','Boss',1,18);
/*!40000 ALTER TABLE `monstres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personnages`
--

DROP TABLE IF EXISTS `personnages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personnages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `pointsDeVie` int(11) NOT NULL,
  `pointsAttaque` int(11) NOT NULL,
  `pointsDefense` int(11) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `niveau` int(11) DEFAULT NULL,
  `armeEquipee` varchar(50) NOT NULL,
  `passif` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `est_vivant` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `niveau` (`niveau`),
  CONSTRAINT `personnages_ibfk_1` FOREIGN KEY (`niveau`) REFERENCES `salles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personnages`
--

LOCK TABLES `personnages` WRITE;
/*!40000 ALTER TABLE `personnages` DISABLE KEYS */;
INSERT INTO `personnages` VALUES
(1,'Aykiu',1,1,1,1,NULL,'1','1','1',1),
(2,'Franklin',1,1,1,1,NULL,'1','1','1',1),
(3,'Sidick',1,1,1,1,NULL,'1','1','1',1);
/*!40000 ALTER TABLE `personnages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salles`
--

DROP TABLE IF EXISTS `salles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `personnage_id` int(11) DEFAULT NULL,
  `monstre` varchar(255) DEFAULT NULL,
  `boss` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnage_id` (`personnage_id`),
  CONSTRAINT `salles_ibfk_1` FOREIGN KEY (`personnage_id`) REFERENCES `personnages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salles`
--

LOCK TABLES `salles` WRITE;
/*!40000 ALTER TABLE `salles` DISABLE KEYS */;
INSERT INTO `salles` VALUES
(1,'La Crypte','lambdas','Une salle sombre avec des tombes et des passages mystérieux.',1,NULL,NULL),
(2,'Les Ruines','lambdas','Des vestiges anciens avec des colonnes effondrées et des passages étroits.',2,NULL,NULL),
(3,'Les Enfers','lambdas','Une salle chaotique avec des flammes, des démons et des dangers mortels.',3,NULL,NULL),
(4,'Caverne des Ombres','lambdas','Une caverne obscure habitée par des créatures sinistres.',1,NULL,NULL),
(5,'Royaume Perdu','lambdas','Un royaume oublié où les esprits hantent chaque recoin.',2,NULL,NULL),
(6,'Volcan des Démons','lambdas','Un volcan en éruption infesté de démons et de lave.',3,NULL,NULL),
(7,'Antre des Abysses','random','Un dédale souterrain aux profondeurs insondables.',1,NULL,NULL),
(8,'Forêt des Illusions','random','Une forêt ensorcelée où la réalité se mêle à l\'illusion.',2,NULL,NULL),
(9,'Citadelle des Oubliés','random','Une citadelle antique aux secrets enfouis.',3,NULL,NULL),
(10,'Plaine Maudite','speciale','Une plaine lugubre jonchée de vestiges et d\'âmes errantes.',1,NULL,NULL),
(11,'Tour des Mystères','speciale','Une tour énigmatique où le temps semble suspendu.',2,NULL,NULL),
(12,'Marais des Ténèbres','speciale','Un marais obscur regorgeant de dangers insoupçonnés.',3,NULL,NULL),
(13,'Gouffre Infernal','random','Un gouffre abyssal où règnent les créatures des enfers.',1,NULL,NULL),
(14,'Forteresse des Souffrances','random','Une imposante forteresse où les tourments sont rois.',2,NULL,NULL),
(15,'Plateau des Dragons','random','Un plateau élevé où les dragons gardent leurs trésors.',3,NULL,NULL),
(16,'Cité des Brumes','speciale','Une cité enveloppée de brume où se cachent de sombres secrets.',1,NULL,NULL),
(17,'Labyrinthe des Déchus','speciale','Un labyrinthe complexe où errent les esprits déchus.',2,NULL,NULL),
(18,'Montagne des Défis','speciale','Une montagne majestueuse où se trouvent des épreuves périlleuses.',3,NULL,NULL);
/*!40000 ALTER TABLE `salles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-26  9:30:34
