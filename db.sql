-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: databosswordpress.nl    Database: databosswp_db
-- ------------------------------------------------------
-- Server version	5.6.19-1~dotdeb.1

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
-- Table structure for table `werewolf_auspices`
--

DROP TABLE IF EXISTS `werewolf_auspices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `werewolf_auspices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `info` text CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `werewolf_auspices`
--

LOCK TABLES `werewolf_auspices` WRITE;
/*!40000 ALTER TABLE `werewolf_auspices` DISABLE KEYS */;
INSERT INTO `werewolf_auspices` VALUES (1,'Ahroun','info'),(2,'Galliard','info'),(3,'Philodox','info'),(4,'Ragabash','info'),(5,'Theurge','info');
/*!40000 ALTER TABLE `werewolf_auspices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `werewolf_backgrounds`
--

DROP TABLE IF EXISTS `werewolf_backgrounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `werewolf_backgrounds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `info` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `werewolf_backgrounds`
--

LOCK TABLES `werewolf_backgrounds` WRITE;
/*!40000 ALTER TABLE `werewolf_backgrounds` DISABLE KEYS */;
INSERT INTO `werewolf_backgrounds` VALUES (1,'Allies','info'),(2,'Alternate Identity','-'),(3,'Ancestors','-'),(4,'Contacts','-'),(5,'Fame','-'),(6,'Fetishes','-'),(8,'Kinfolk','-'),(9,'Rank','-'),(10,'Resources','-'),(11,'Rites','-'),(12,'Spirit Pact','-'),(13,'Territory','-'),(14,'Totem','-'),(29,'Influence: Upper Class',''),(30,'Influence: Underworld','');
/*!40000 ALTER TABLE `werewolf_backgrounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `werewolf_breeds`
--

DROP TABLE IF EXISTS `werewolf_breeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `werewolf_breeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `info` text CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `werewolf_breeds`
--

LOCK TABLES `werewolf_breeds` WRITE;
/*!40000 ALTER TABLE `werewolf_breeds` DISABLE KEYS */;
INSERT INTO `werewolf_breeds` VALUES (1,'Homid','info'),(2,'Lupus','info'),(3,'Metis','info');
/*!40000 ALTER TABLE `werewolf_breeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `werewolf_character`
--

DROP TABLE IF EXISTS `werewolf_character`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `werewolf_character` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `deed_name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `pack_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tribe_id` int(11) DEFAULT NULL,
  `auspice_id` int(11) DEFAULT NULL,
  `breed_id` int(11) DEFAULT NULL,
  `physical` int(11) DEFAULT NULL,
  `social` int(11) DEFAULT NULL,
  `mental` int(11) DEFAULT NULL,
  `physical_bonus` int(11) DEFAULT NULL,
  `social_bonus` int(11) DEFAULT NULL,
  `mental_bonus` int(11) DEFAULT NULL,
  `physical_focus` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `social_focus` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `mental_focus` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `skills` text,
  `backgrounds` text,
  `gifts_id` varchar(400) DEFAULT NULL,
  `merits_id` varchar(400) DEFAULT NULL,
  `flaws_id` varchar(400) DEFAULT NULL,
  `extra_info` text CHARACTER SET latin1,
  `character_background` text CHARACTER SET latin1,
  `narrator_snippet` text CHARACTER SET latin1,
  `active` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `werewolf_character`
--

LOCK TABLES `werewolf_character` WRITE;
/*!40000 ALTER TABLE `werewolf_character` DISABLE KEYS */;
INSERT INTO `werewolf_character` VALUES (2,18,'Remi Nabuurs','Eraser','Angerfist',1,3,1,9,3,5,1,0,0,'a:1:{i:0;s:1:\"2\";}','a:1:{i:0;s:1:\"2\";}','a:1:{i:0;s:1:\"3\";}','a:3:{i:0;a:3:{s:5:\"skill\";s:1:\"2\";s:15:\"skill_specialty\";s:0:\"\";s:12:\"skill_points\";s:1:\"1\";}i:1;a:3:{s:5:\"skill\";s:1:\"3\";s:15:\"skill_specialty\";s:0:\"\";s:12:\"skill_points\";s:1:\"1\";}i:2;a:3:{s:5:\"skill\";s:1:\"4\";s:15:\"skill_specialty\";s:0:\"\";s:12:\"skill_points\";s:1:\"1\";}}','a:2:{i:0;a:3:{s:10:\"background\";s:1:\"1\";s:20:\"background_specialty\";s:4:\"test\";s:17:\"background_points\";s:1:\"1\";}i:1;a:3:{s:10:\"background\";s:1:\"2\";s:20:\"background_specialty\";s:0:\"\";s:17:\"background_points\";s:1:\"1\";}}','1','9','5','test','test','','1'),(4,46,'test','test','',2,1,1,1,1,1,0,0,0,'','',NULL,'a:1:{i:0;a:3:{s:5:\"skill\";s:1:\"2\";s:15:\"skill_specialty\";s:0:\"\";s:12:\"skill_points\";s:1:\"1\";}}','a:1:{i:0;a:3:{s:10:\"background\";s:1:\"1\";s:20:\"background_specialty\";s:0:\"\";s:17:\"background_points\";s:1:\"1\";}}','1','9','6,19','','',NULL,'1');
/*!40000 ALTER TABLE `werewolf_character` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `werewolf_character_edit`
--

DROP TABLE IF EXISTS `werewolf_character_edit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `werewolf_character_edit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `character_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `deed_name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `pack_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tribe_id` int(11) DEFAULT NULL,
  `auspice_id` int(11) DEFAULT NULL,
  `breed_id` int(11) DEFAULT NULL,
  `physical` int(11) DEFAULT NULL,
  `social` int(11) DEFAULT NULL,
  `mental` int(11) DEFAULT NULL,
  `physical_bonus` int(11) DEFAULT NULL,
  `social_bonus` int(11) DEFAULT NULL,
  `mental_bonus` int(11) DEFAULT NULL,
  `physical_focus` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `social_focus` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `mental_focus` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `skills` text,
  `backgrounds` text,
  `gifts_id` varchar(400) DEFAULT NULL,
  `merits_id` varchar(400) DEFAULT NULL,
  `flaws_id` varchar(400) DEFAULT NULL,
  `extra_info` text CHARACTER SET latin1,
  `character_background` text CHARACTER SET latin1,
  `narrator_snippet` text CHARACTER SET latin1,
  `active` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `werewolf_character_edit`
--

LOCK TABLES `werewolf_character_edit` WRITE;
/*!40000 ALTER TABLE `werewolf_character_edit` DISABLE KEYS */;
/*!40000 ALTER TABLE `werewolf_character_edit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `werewolf_flaws`
--

DROP TABLE IF EXISTS `werewolf_flaws`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `werewolf_flaws` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `info` text,
  `xp` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `werewolf_flaws`
--

LOCK TABLES `werewolf_flaws` WRITE;
/*!40000 ALTER TABLE `werewolf_flaws` DISABLE KEYS */;
INSERT INTO `werewolf_flaws` VALUES (2,'Addiction (Amphetamine)','-','2'),(3,'Addiction (Hallucinogen)','-','2'),(4,'Addiction (Sedatives)','-','2'),(5,'Allergy','-','1'),(6,'Amnesia','-','1'),(7,'Animal Musk','-','2'),(8,'Animal Ways','-','2'),(9,'Awkward Mobility','-','2'),(10,'Bad Sight','-','2'),(11,'Banned Transformation','-','4'),(12,'Bitten','-','2'),(13,'Blunted Claws','-','3'),(14,'Born of the Wyld','-','3'),(15,'Branded','-','3'),(16,'Careless','-','1'),(17,'Crippled','-','5'),(18,'Curiosity','-','2'),(19,'Cursed','-','1'),(20,'Dark Fate','-','5'),(21,'Docile','-','3'),(22,'Difficult Transformation','-','2'),(23,'Dull','-','2'),(24,'Enraged Transformation','-','3'),(25,'Fallen Hero','-','5'),(26,'Fetish Ineptitude','-','4'),(27,'Fragile Bones','-','4'),(28,'Harano Prone','-','2'),(29,'Hard of Hearing','-','2'),(30,'Haunted','-','1'),(31,'Hunted','-','4'),(32,'Illiterate','-','1'),(33,'Inhuman','-','2'),(34,'Impatient','-','2'),(35,'Insane Ancestor','-','4'),(36,'Intolerance','-','1'),(37,'Land Locked','-','3'),(38,'Low Pain Treshold','-','3'),(39,'Mark of the Predator','-','2'),(40,'Meager Instincts','-','2'),(41,'Monstrous','-','3'),(42,'Moon Bound','-','1'),(43,'One Eye','-','3'),(44,'Overconfident','-','2'),(45,'Pack Mentality','-','3'),(46,'Pierced Veil','-','4'),(47,'Permanent Wound','-','3'),(48,'Pied Piper','-','1'),(49,'Short Fuse','-','2'),(50,'Slave to the Urge','-','3'),(51,'Slow on the Draw','-','2'),(52,'Slow Regeneration','-','4'),(53,'Sign of the Wolf','-','1'),(54,'Spirit Infamy','-','4'),(55,'Spirit Notoriety','-','1'),(56,'Taint of Corruption','-','3'),(57,'Tainted Rank','-','3'),(58,'Territoral','-','1'),(59,'Trouble Magnet','-','1'),(60,'Umbral Ineptitude','-','2'),(61,'Undead Vulnerability','-','3'),(62,'Unrelenting Tie to Humanity','-','3'),(63,'Vulnerable to Silver','-','2'),(64,'Wild Hunter','-','2'),(65,'Wolf Years','-','1'),(66,'-','','0');
/*!40000 ALTER TABLE `werewolf_flaws` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `werewolf_gifts`
--

DROP TABLE IF EXISTS `werewolf_gifts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `werewolf_gifts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `info` text CHARACTER SET latin1,
  `gift_auspice` varchar(405) CHARACTER SET latin1 DEFAULT NULL,
  `gift_breed` varchar(405) CHARACTER SET latin1 DEFAULT NULL,
  `gift_tribe` varchar(405) CHARACTER SET latin1 DEFAULT NULL,
  `testpool` text CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=155 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `werewolf_gifts`
--

LOCK TABLES `werewolf_gifts` WRITE;
/*!40000 ALTER TABLE `werewolf_gifts` DISABLE KEYS */;
INSERT INTO `werewolf_gifts` VALUES (1,'Fight or Flight',1,'Spend 1 point of Gnosis and expend your standard action to make an opposed challenge against an opponent within three steps of you. If you succeed, your target cannot delay her next action in the initiative order. At the beginning of her next action, she must choose and enact one of the following:\r\n\r\n• Fight: Your opponent must attempt a Physical attack against you. She may choose to meet this requirement\r\nby using a power that involves making a Physical attack or by using a combat maneuver that targets you. If you are not within her range, she must use her actions to advance towards you; if possible, she must move towards you and then attack, if she has sufficient actions to do so.\r\n\r\n• Flight: Your opponent must spend her actions to move away from you, taking the maximum number of steps\r\navailable to her. \r\n\r\nIf you cannot be targeted by Physical attacks, your target may act normally. For example, if you have already been the target of two Physical attacks by the time the victim of Fight or Flight acts in the initiative order, she cannot target you and may act normally. Alternatively, if your target is immobilized or grappled, or otherwise unable to move or attack due to another power, she may act normally. If you move away from your target or cease to be visible, she may also act normally.\r\n\r\nMultiple uses of this power from different users do not have cumulative effects. In those cases, the target only responds to the most recent challenge. Wolves and other Garou may view the use of this gift as a form of social aggression, possibly initiating a Staredown.\r\n\r\nExceptional Success\r\nFor the next hour, your target remains under your power. You may enact this gift’s effect again without a challenge by expending a simple action to growl at your opponent; no Gnosis expenditure is required.\r\n\r\nFocus [Appearance]\r\nYou may target up to three individuals at once with this power. Should you spend a point of Willpower\r\nto retest any of these opposed challenges, you also gain that retest for the remainder of the opposed\r\nchallenges, without spending further Willpower. If you spend the Willpower to retest after some\r\nchallenges are already resolved, you cannot go back to previous challenges you have lost and\r\napply that Willpower retest retroactively.','a:1:{i:0;s:1:\"1\";}','a:1:{i:0;s:1:\"3\";}','','Social attribute + Leadership skill versus target’s Social attribute + Willpower'),(7,'Delirium of Volupta',1,'Spend 1 point of Gnosis and use a standard action to enter\r\na trance-like state while you open your mind to the sacred\r\nenergies of the Wyld. Use of this power is visible to onlookers;\r\nyour eyes become blank and your posture dramatically\r\nshifts, as powerful visions seize you. You immediately gain a\r\nderangement of the Storyteller’s choosing, pertaining either\r\nto the situation at hand, or one that seems prophetic in\r\nnature. For example, if an attack by a powerful fire spirit is\r\nimminent, you may gain the derangement Phobia: fire.\r\nAt the beginning of each round, you gain a Derangement\r\ntrait, as chaotic visions assail your senses. While this power\r\nis active, you may spend your standard action to initiate\r\nan opposed challenge with anyone in your field of vision,\r\nor those who are not present but with whom you have\r\nfamiliarity (see Familiarity with the Target, page 214). If\r\nyou succeed, you are able to make contact with your target’s\r\nmind. You immediately learn your target’s archtype and her\r\ncurrent emotional state, and gain familiarity with the target\r\nif you did not already have it. If your target is unconscious\r\nor dead, you will believe your attempt has failed, as though\r\nyou lost the challenge.\r\nYou can end the trance at any time without expending an\r\naction, but you retain the associated derangement until you\r\nreduce your Derangement traits to 0. You do not gain any\r\nflaw XP for this derangement.\r\nExceptional Success\r\nFor the next hour, you retain a special bond with the target.\r\nIf her mood shifts or she becomes aggressive, you’ll have\r\nadvanced warning. If your target starts a combat, you may\r\ntake your simple action before she can take any action. This\r\nforewarning does not give you an additional action, but\r\nallows you to take your simple action early.','','','a:1:{i:0;s:1:\"2\";}','Social attribute + Empathy skill versus target’s\r\nSocial attribute + Willpower'),(8,'Wasp Talons',2,'Spend 1 point of Gnosis and use your standard action\r\nto attack with your claws at range. If you are using your\r\nclaws, you may make Brawl attacks at a distance equal to\r\nthree steps for each dot of the Athletics skill you possess.\r\nYou may use this effect to enable other powers and combat\r\nmaneuvers, except for Grapple, Trip, and Disarm. Using\r\nthis gift disengages the claws from your hand, and you are\r\nunable to make any further attacks with your claws until\r\nthey regenerate at the beginning of the next turn. You may\r\nuse this power in any form.\r\nFocus [Wits]\r\nYour claws immediately regenerate, rather than\r\ngrowing back the next turn.','','','a:1:{i:0;s:1:\"2\";}','-'),(9,'Curse of Aeolus',3,'Spend 1 point of Gnosis and use your standard action to summon a heavy fog. The fog has a radius staring at your  location, extending five steps per dot of Occult skill you possess. The fog must be summoned within your line of sight.\r\nThis fog will obscure the vision of anyone located within the\r\ncloud, limiting their visibility to objects and targets within\r\nthree steps of them. Anyone who wishes to challenge a target\r\nobscured by the fog must use the Fighting Blind combat\r\nmaneuver to do so.\r\nWhispers and groans come from thin air within the cloud,\r\nand the deep scent of moist soil is overwhelming, preventing\r\nanyone outside of the cloud from hearing or smelling\r\nanything occurring within it.\r\nFocus [Wits]\r\nThe energies that compose the fog become hostile.\r\nAll opponents within it have their visibility limited\r\nto targets within one step of them; however, your\r\nallies may see normally to a distance of three steps,\r\nas per above.','','','a:1:{i:0;s:1:\"2\";}','-'),(10,'Coup de Grace',4,'Spend 1 point of Gnosis and use your standard action to\r\nstudy your target and identify her weak spot. For the next\r\nfive turns, any Physical attack you make against your target\r\ncauses an additional point of damage.\r\nExceptional Success\r\nIf you achieve an exceptional success, this power lasts for 10\r\nturns, instead of the normal five turns.\r\nFocus [Perception]\r\nFor the next hour, you may perform the Knock\r\nDown or Disarm combat maneuvers against your\r\ntarget without spending Willpower.','','','a:1:{i:0;s:1:\"2\";}','Physical attribute + Investigation skill versus\r\ntarget’s Physical attribute + Dodge skill'),(11,'Gorgon’s Gaze',5,'Spend 1 point of Gnosis to activate Gorgon’s Gaze. For the next hour, you become the living avatar of the Gorgon of legend and myth. Those in your presence cannot look\r\ndirectly at you beyond a fleeting glance, making you immune\r\nto all powers that require Gaze and Focus or line of sight to\r\nactivate. If you have a target’s Gaze and Focus, they cannot\r\nadd their Dodge skill to their defensive pools against you.\r\nFocus [Appearance]\r\nIf you have a target’s Gaze and Focus, she receives\r\na -2 wild card penalty to her defensive Social\r\nattribute test pools.','','','a:1:{i:0;s:1:\"2\";}','-'),(12,'Urban Ward',1,'-','','','a:1:{i:0;s:1:\"3\";}','-'),(13,'Blink',2,'-','','','a:1:{i:0;s:1:\"3\";}','-'),(14,'Friend in Need',3,'-','','','a:1:{i:0;s:1:\"3\";}','-'),(15,'Savage Strike',4,'-','','','a:1:{i:0;s:1:\"3\";}','-'),(16,'Survivor',5,'-','','','a:1:{i:0;s:1:\"3\";}','-'),(17,'Unicorn\'s Grace',1,'-','','','a:1:{i:0;s:1:\"4\";}','-'),(18,'Swallow Rage',2,'-','','','a:1:{i:0;s:1:\"4\";}','-'),(19,'Take a Bullet',3,'-','','','a:1:{i:0;s:1:\"4\";}','-'),(20,'Strike the Air',4,'-','','','a:1:{i:0;s:1:\"4\";}','-'),(21,'Serenity',5,'-','','','a:1:{i:0;s:1:\"4\";}','-'),(22,'Sigil of Power',1,'-','','','a:1:{i:0;s:1:\"5\";}','-'),(23,'Mark of the Wisp',2,'-','','','a:1:{i:0;s:1:\"5\";}','-'),(24,'Wail of the Banshee',3,'-','','','a:1:{i:0;s:1:\"5\";}','-'),(25,'Cloak of Mists',4,'-','','','a:1:{i:0;s:1:\"5\";}','-'),(28,'Troll Skin',1,'','','','a:1:{i:0;s:1:\"6\";}',''),(27,'Spiritual Emblem',5,'-','','','a:1:{i:0;s:1:\"5\";}','-'),(29,'Viasge of Fenris',2,'','','','a:1:{i:0;s:1:\"6\";}',''),(30,'Honor\'s Revenge',3,'','','','a:1:{i:0;s:1:\"6\";}',''),(31,'Redirect Pain',4,'','','','a:1:{i:0;s:1:\"6\";}',''),(32,'Might of Thor',5,'','','','a:1:{i:0;s:1:\"6\";}',''),(33,'Flyapart',1,'','','','a:1:{i:0;s:1:\"1\";}',''),(34,'Ghost in the Machine',2,'','','','a:1:{i:0;s:1:\"1\";}',''),(35,'Electrochock',3,'','','','a:1:{i:0;s:1:\"1\";}',''),(36,'Signal Rider',4,'','','','a:1:{i:0;s:1:\"1\";}',''),(37,'Chaos Mechanics',5,'','','','a:1:{i:0;s:1:\"1\";}',''),(38,'Silence the Slain',1,'','','','a:1:{i:0;s:1:\"7\";}',''),(39,'Hidden Killer',2,'','','','a:1:{i:0;s:1:\"7\";}',''),(40,'Trackless Wastes',3,'','','','a:1:{i:0;s:1:\"7\";}',''),(41,'Unchain The Beast Mind',4,'','','','a:1:{i:0;s:1:\"7\";}',''),(42,'Earth\'s Crushing Embrace',5,'','','','a:1:{i:0;s:1:\"7\";}',''),(43,'Wings of the Stormcrow',1,'','','','a:1:{i:0;s:1:\"8\";}',''),(44,'Clap of Thunder',2,'','','','a:1:{i:0;s:1:\"8\";}',''),(45,'Direct the Storm',3,'','','','a:1:{i:0;s:1:\"8\";}',''),(46,'Rend the Shadow',4,'','','','a:1:{i:0;s:1:\"8\";}',''),(47,'Strenght of the Dominator',5,'','','','a:1:{i:0;s:1:\"8\";}',''),(48,'Messenger\'s Fortitude',1,'','','','a:1:{i:0;s:1:\"9\";}',''),(49,'Dam the Heartflood',2,'','','','a:1:{i:0;s:1:\"9\";}',''),(50,'Pierce the Ashen Veil',3,'','','','a:1:{i:0;s:1:\"9\";}',''),(51,'Eyes of Anubis',4,'','','','a:1:{i:0;s:1:\"9\";}',''),(52,'Speed Beyond Thought',5,'','','','a:1:{i:0;s:1:\"9\";}',''),(53,'Falcon\'s Grasp',1,'','','','a:1:{i:0;s:2:\"10\";}',''),(54,'Silver Claws',2,'','','','a:1:{i:0;s:2:\"10\";}',''),(55,'Mastery',3,'','','','a:1:{i:0;s:2:\"10\";}',''),(56,'Luna\'s Armor',4,'','','','a:1:{i:0;s:2:\"10\";}',''),(57,'Paws of the Newborn Cub',5,'','','','a:1:{i:0;s:2:\"10\";}',''),(58,'Paper Butterfly',1,'','','','a:1:{i:0;s:2:\"11\";}',''),(59,'Impermanence of Wind and Water',2,'','','','a:1:{i:0;s:2:\"11\";}',''),(60,'Dance of the Heavens',3,'','','','a:1:{i:0;s:2:\"11\";}',''),(61,'Cunning Koan',4,'','','','a:1:{i:0;s:2:\"11\";}',''),(62,'Ancestral Incarnation',5,'','','','a:1:{i:0;s:2:\"11\";}',''),(63,'Sight of Hidden Places',1,'','','','a:1:{i:0;s:2:\"12\";}',''),(64,'Raven\'s Wings',2,'','','','a:1:{i:0;s:2:\"12\";}',''),(65,'Coils of the Serpent',3,'','','','a:1:{i:0;s:2:\"12\";}',''),(66,'Rend the Patron Spirit',4,'','','','a:1:{i:0;s:2:\"12\";}',''),(67,'Gnosis Drain',5,'','','','a:1:{i:0;s:2:\"12\";}',''),(68,'Icecraft',1,'','','','a:1:{i:0;s:2:\"16\";}',''),(69,'Blood in the Air',2,'','','','a:1:{i:0;s:2:\"16\";}',''),(70,'Bloody Feast',3,'','','','a:1:{i:0;s:2:\"16\";}',''),(71,'Strenght of the Pines',4,'','','','a:1:{i:0;s:2:\"16\";}',''),(72,'Heart of Ice',5,'','','','a:1:{i:0;s:2:\"16\";}',''),(73,'Airt perception',1,'','a:2:{i:0;s:1:\"4\";i:1;s:1:\"5\";}','','',''),(74,'Blur of the Milky Eye',1,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"4\";}','','',''),(75,'Call of the Wyld',1,'','a:1:{i:0;s:1:\"2\";}','a:1:{i:0;s:1:\"2\";}','',''),(76,'Conjure Tulpa Object',1,'','a:1:{i:0;s:1:\"5\";}','a:1:{i:0;s:1:\"1\";}','',''),(77,'Mind Web',1,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}','','',''),(78,'Mother\'s Touch',1,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}','','',''),(79,'Persuasion',1,'','a:1:{i:0;s:1:\"4\";}','a:1:{i:0;s:1:\"1\";}','',''),(80,'Predator\'s Insight',1,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"4\";}','a:1:{i:0;s:1:\"3\";}','',''),(81,'Razor Claws',1,'','a:1:{i:0;s:1:\"1\";}','a:1:{i:0;s:1:\"3\";}','',''),(82,'Resist Pain',1,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}','','',''),(83,'Sense the Balance',1,'','a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}','a:1:{i:0;s:1:\"2\";}','',''),(84,'Spirit Skin',1,'','a:2:{i:0;s:1:\"4\";i:1;s:1:\"5\";}','','',''),(85,'Subpoena',1,'','a:1:{i:0;s:1:\"3\";}','a:1:{i:0;s:1:\"1\";}','',''),(86,'Taunt',1,'','a:1:{i:0;s:1:\"4\";}','a:1:{i:0;s:1:\"1\";}','',''),(87,'Tongue of the Wild Court',1,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}','','',''),(88,'Traitor\'s Bane',1,'','a:1:{i:0;s:1:\"3\";}','a:1:{i:0;s:1:\"3\";}','',''),(89,'Vie for Dominance',1,'','a:1:{i:0;s:1:\"1\";}','a:1:{i:0;s:1:\"2\";}','',''),(90,'Wolf Senses',1,'','a:1:{i:0;s:1:\"5\";}','a:1:{i:0;s:1:\"2\";}','',''),(91,'Awaken Minor Spirit',2,'','a:1:{i:0;s:1:\"5\";}','a:1:{i:0;s:1:\"2\";}','',''),(92,'Burden of Doubt',2,'','a:1:{i:0;s:1:\"3\";}','a:1:{i:0;s:1:\"3\";}','',''),(93,'Calm the Heart',2,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"4\";}','','',''),(94,'Circle of Gaia\'s Cleansing',2,'','a:1:{i:0;s:1:\"5\";}','a:1:{i:0;s:1:\"3\";}','',''),(95,'Entrance the Mob',2,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}','a:1:{i:0;s:1:\"1\";}','',''),(96,'Falling Touch',2,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"4\";}','','',''),(97,'Invoke Delirium',2,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"4\";}','','',''),(98,'Jam Technology',2,'','a:1:{i:0;s:1:\"4\";}','a:1:{i:0;s:1:\"1\";}','',''),(99,'Luna\'s Blessing',2,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"4\";}','','',''),(100,'Marshal\'s Vigilance',2,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}','','',''),(101,'Pursuit',2,'','a:1:{i:0;s:1:\"1\";}','a:1:{i:0;s:1:\"2\";}','',''),(102,'Realm Wisdom',2,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}','','',''),(103,'The Silver Witness',2,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}','','',''),(104,'Siren\'s Lure',2,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}','','',''),(105,'Song of Heroes',2,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}','','',''),(106,'Spirit Ward',2,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}','','',''),(107,'Strenght of Purpose',2,'','a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}','','',''),(108,'Surround the Quarry',2,'','a:1:{i:0;s:1:\"1\";}','a:1:{i:0;s:1:\"2\";}','',''),(109,'Taking the Forgotten',2,'','a:1:{i:0;s:1:\"4\";}','a:1:{i:0;s:1:\"1\";}','',''),(110,'Umbral Tether',2,'','a:1:{i:0;s:1:\"5\";}','a:1:{i:0;s:1:\"1\";}','',''),(111,'Withering Gaze',2,'','a:2:{i:0;s:1:\"3\";i:1;s:1:\"4\";}','','',''),(112,'Call of the Wyrm',3,'','a:1:{i:0;s:1:\"2\";}','a:1:{i:0;s:1:\"3\";}','',''),(113,'Call to Duty',3,'','a:1:{i:0;s:1:\"3\";}','a:1:{i:0;s:1:\"1\";}','',''),(114,'Coyote\'s Mantle',3,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"4\";}','','',''),(115,'Forge of the Fetish',3,'','a:1:{i:0;s:1:\"5\";}','a:1:{i:0;s:1:\"3\";}','',''),(116,'Gaia\'s Touch',3,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}','','',''),(117,'Master of Fire',3,'','a:1:{i:0;s:1:\"5\";}','a:1:{i:0;s:1:\"1\";}','',''),(118,'Pack Tactis',3,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}','','',''),(119,'Renewed Vigor',3,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}','','',''),(120,'Scent of the Prey',3,'','a:1:{i:0;s:1:\"4\";}','a:1:{i:0;s:1:\"2\";}','',''),(121,'Spirit Knife',3,'','a:1:{i:0;s:1:\"5\";}','a:1:{i:0;s:1:\"3\";}','',''),(122,'Spirit of the Fray',3,'','a:1:{i:0;s:1:\"1\";}','a:1:{i:0;s:1:\"2\";}','',''),(123,'Spirit\'s Gaze',3,'','a:2:{i:0;s:1:\"3\";i:1;s:1:\"4\";}','','',''),(124,'Steel Sharpens Steel',3,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}','','',''),(125,'Stoking Fury\'s Furnace',3,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}','','',''),(126,'Thousand Forms',3,'','a:2:{i:0;s:1:\"4\";i:1;s:1:\"5\";}','a:1:{i:0;s:1:\"2\";}','',''),(127,'Trick Shot',3,'','a:1:{i:0;s:1:\"4\";}','a:1:{i:0;s:1:\"1\";}','',''),(128,'Awaken Major Spirit',4,'','a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}','','',''),(129,'Castigate',4,'','a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}','','',''),(130,'Cheap Shot',4,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"4\";}','a:1:{i:0;s:1:\"1\";}','',''),(131,'Defense of the Heart',4,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}','a:1:{i:0;s:1:\"3\";}','',''),(132,'Forced Transformation',4,'','a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}','','',''),(133,'Gnaw',4,'','a:1:{i:0;s:1:\"1\";}','a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}','',''),(134,'Hobbling Strike',4,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"4\";}','','',''),(135,'Invoke Earth\'s Contract',4,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}','','',''),(136,'Laugh of the Hyena',4,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"4\";}','','',''),(137,'The Madness Season',4,'','a:2:{i:0;s:1:\"4\";i:1;s:1:\"5\";}','a:1:{i:0;s:1:\"3\";}','',''),(138,'Rancorous Halo',4,'','a:1:{i:0;s:1:\"1\";}','a:1:{i:0;s:1:\"2\";}','',''),(139,'Recollection of Distant Dreams',4,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"4\";}','a:1:{i:0;s:1:\"1\";}','',''),(140,'Snarl of the Predator',4,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}','a:1:{i:0;s:1:\"2\";}','',''),(141,'View the Battlefield',4,'','a:1:{i:0;s:1:\"2\";}','a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}','',''),(142,'Aegis of Rage',5,'','a:1:{i:0;s:1:\"1\";}','a:1:{i:0;s:1:\"3\";}','',''),(143,'Apotheosis of Rage',5,'','a:1:{i:0;s:1:\"1\";}','a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}','',''),(144,'The Artful Dodger',5,'','a:1:{i:0;s:1:\"4\";}','a:1:{i:0;s:1:\"1\";}','',''),(145,'Bridge Walker',5,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"4\";}','','',''),(146,'Chant of Serenity',5,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}','','',''),(147,'Conduit of Pain',5,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"5\";}','','',''),(148,'Gaia\'s Vengeful Teeth',5,'','a:1:{i:0;s:1:\"3\";}','a:1:{i:0;s:1:\"1\";}','',''),(149,'Geas',5,'','a:1:{i:0;s:1:\"3\";}','a:1:{i:0;s:1:\"1\";}','',''),(150,'Heart of Fury',5,'','a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}','','',''),(151,'Spirit Mastery',5,'','a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}','','',''),(152,'Spirit Vessel',5,'','a:2:{i:0;s:1:\"1\";i:1;s:1:\"5\";}','a:1:{i:0;s:1:\"2\";}','',''),(153,'Thieving Talons of the Magpie',5,'','a:1:{i:0;s:1:\"4\";}','a:1:{i:0;s:1:\"2\";}','',''),(154,'Wyld\'s Undreamt Fury',5,'','a:1:{i:0;s:1:\"1\";}','a:1:{i:0;s:1:\"3\";}','','');
/*!40000 ALTER TABLE `werewolf_gifts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `werewolf_merits`
--

DROP TABLE IF EXISTS `werewolf_merits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `werewolf_merits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `info` text,
  `xp` varchar(45) DEFAULT NULL,
  `merit_tribe` varchar(45) DEFAULT NULL,
  `merit_faction` varchar(45) DEFAULT NULL,
  `merit_general` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `werewolf_merits`
--

LOCK TABLES `werewolf_merits` WRITE;
/*!40000 ALTER TABLE `werewolf_merits` DISABLE KEYS */;
INSERT INTO `werewolf_merits` VALUES (6,'Uncommon Character','Uncommon shapeshifters are considered minorities on the\r\noutskirts of political and social power within the Garou\r\nNation setting. These outsiders enjoy fewer benefits than\r\nwerewolves, who are considered proper members of society.','2','','','1'),(7,'Rare Character','Rare shapeshifters are members of a Fera breed with low\r\npopulation numbers in this setting. They may be treated\r\npoorly or shunned by the rest of the characters in play. Such\r\ncharacters may be loners, outcasts, or solitary observers of\r\nsociety. Storytellers should carefully consider the impact\r\nthese characters will have in their chronicles before\r\napproving them for play.','4','','','1'),(8,'Restricted Character','With this merit, you can portray a character, with\r\nStoryteller approval, that is not listed in your chronicle’s\r\nsetting, or is a creature type traditionally reserved for\r\nantagonists. Discuss your concept and get approval from\r\nyour Storyteller before choosing this merit. Your Storyteller\r\nmay rightfully forbid or deny such characters if she believes\r\nit would not mesh well with her setting. For example, your\r\nStoryteller may allow you to play a crossover character,\r\nsuch as a vampire from Mind’s Eye Theatre: Vampire\r\nThe Masquerade, or an antagonist, such as a Black Spiral\r\nDancer. For more details on how such restricted characters\r\nmight be integrated into a chronicle, see Chapter Ten:\r\nStorytelling, Crossover Settings: Antagonist Factions,\r\npage 467. With your Storyteller’s permission, you may use\r\nthis merit to portray an unusual character type, even if the\r\ntotal cost for playing that character would otherwise total\r\nmore than 6 points of merits.','6','','','1'),(9,'Sisters in Arms','-','1','2','',''),(10,'Arrows of Artemis','-','2','2','',''),(11,'Crone\'s Wisdom','-','3','2','',''),(12,'Blessing of Mother Rat','-','1','3','',''),(13,'Jury-Rigging','-','2','3','',''),(14,'The Common Man','-','3','3','',''),(15,'Soothing Mien','-','1','4','',''),(16,'Unto My Last Breath','-','2','4','',''),(17,'Grandmother\'s Touch','-','3','4','',''),(18,'Essence of Stag','-','1','5','',''),(19,'Legacy of Craftmanship','-','2','5','',''),(20,'Child of Tir na Nog','-','3','5','',''),(21,'Skaldi\'s Resolve','-','1','6','',''),(22,'The Vigil','-','2','6','',''),(23,'Fenris\'s Bite','-','3','6','',''),(24,'Pulse of the City','-','1','1','',''),(25,'Weaver\'s Specter','-','2','1','',''),(26,'Steel Fur','-','3','1','',''),(27,'Red in Tooth and Claw','-','1','7','',''),(28,'Nature Knows Best','-','2','7','',''),(29,'Gorge','-','3','7','',''),(30,'Aura of Confidence','-','1','8','',''),(31,'Loophole','-','2','8','',''),(32,'Seizing the Edge','-','3','8','',''),(33,'Owl\'s Grace','-','1','9','',''),(34,'The Quick and the Dead','-','2','9','',''),(35,'Omen of Doom','-','3','9','',''),(36,'Primacy of the First Tribe','-','1','10','',''),(37,'Family Endowment','-','2','10','',''),(38,'A Hero\'s Return','-','3','10','',''),(39,'Inner Balance','-','1','11','',''),(40,'Wisdom of the Ages','-','2','11','',''),(41,'One with the Universe','-','3','11','',''),(42,'Keeper of the Old Ways','-','1','12','',''),(43,'Fera Friendship','-','2','12','',''),(44,'Shedding the Snake\'s Skin','-','3','12','',''),(45,'Bonds of Spirit','-','1','16','',''),(46,'Guardian of the Wyld','-','2','16','',''),(47,'Avatar of Wendigo','-','3','16','',''),(48,'Weaver Affininty','-','1','','1',''),(49,'Wyrm Resistance','-','2','','1',''),(50,'Fera Affinity','-','3','','1',''),(51,'Wyld Affinity','-','1','','2',''),(52,'Righteous','-','2','','2',''),(53,'Silver Tolerence','-','3','','2',''),(54,'Acute Sense','-','1','','','1'),(55,'Ambidextrous','-','2','','','1'),(56,'Arcane','-','1','','','1'),(57,'Berserker','-','2','','','1'),(58,'Blasé','-','3','','','1'),(59,'Camp Defector','-','1','','','1'),(60,'Camp Loyalty','-','1','','','1'),(61,'Celestial Attunement','-','2','','','1'),(62,'Code of Honor','-','2','','','1'),(63,'Daredevil','-','2','','','1'),(64,'Enhanced Homid Form','-','1','','','1'),(65,'Enhanced Lupus Form','-','1','','','1'),(66,'Fetish Savant','-','3','','','1'),(67,'Heroic Lineage','-','1','','','1'),(68,'Legendary Lineage','-','3','','','1'),(69,'Longevity','-','1','','','1'),(70,'Loremaster','-','1','','','1'),(71,'Lucky','-','2','','','1'),(72,'Medium','-','1','','','1'),(73,'Metamorph','-','3','','','1'),(74,'Natural Channel','-','3','','','1'),(75,'Natural Linquist','-','1','','','1'),(76,'Natural Weapons','-','2','','','1'),(77,'Oracular Ability','-','2','','','1'),(78,'Pack Reputation','-','2','','','1'),(79,'Predator\'s Glare','-','1','','','1'),(80,'Rugged','-','3','','','1'),(81,'Skill Aptitude','-','2','','','1'),(82,'Slippery Customer','-','2','','','1'),(83,'Soothing Presence','-','2','','','1'),(84,'Spirit Magnet','-','1','','','1'),(85,'Tranquil Soul','-','2','','','1'),(86,'Tribe Affinity','-','3','','','1'),(87,'Untrackable','-','2','','','1'),(88,'Unyielding','-','4','','','1'),(91,'Umbral Aptitude','-','2','','','1'),(92,'Umbral Realm Affinity','-','3','','','1'),(93,'Volatile','-','2','','','1'),(94,'Versatile','-','3','','','1'),(95,'Wolf in Sheep\'s Clothing','-','1','','','1'),(96,'Wyld at Heart','-','3','','','1'),(97,'Wyrmspeak','-','1','','','1'),(98,'Zealot','-','2','','','1'),(99,'-','','0','','','1');
/*!40000 ALTER TABLE `werewolf_merits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `werewolf_player`
--

DROP TABLE IF EXISTS `werewolf_player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `werewolf_player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `playername` varchar(45) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `verifycode` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `level` varchar(45) CHARACTER SET latin1 DEFAULT '0',
  `forgot_password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `playername_UNIQUE` (`playername`),
  UNIQUE KEY `password_UNIQUE` (`password`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `werewolf_player`
--

LOCK TABLES `werewolf_player` WRITE;
/*!40000 ALTER TABLE `werewolf_player` DISABLE KEYS */;
INSERT INTO `werewolf_player` VALUES (18,'Rolf Siebers','bcd63fc43c91f7fb26ceba445a8631f868406a76','rolfsiebers@gmail.com','3963775b0e9d1bbf9fa6c8daf7d7caa2105a7901',1,'1',''),(20,'Anne Pronk','77b81004567967eb7350bffcd64a2d89bd25d390','annempronk@outlook.com','268fab6388a6cdfadea470d3d4ea78c187f8ee77',1,'1',NULL),(32,'Rik Jonker','95ab22795db9595f5e78c9f474f06a09cdc149f4','jonker_rik@hotmail.com','4a9e143f532c6335b8b9cd468a48adbee2ad82d8',1,'0',NULL),(33,'Raoul','72baa482b7c1efc884a289f803af25b9403eed88','raoul.eggen@gmail.com','d1ddbb91e6098dcc116b8491a9edbef03cd71f3a',1,'1',NULL),(34,'Jaap Lommerse','a2d66954a248bea8bbbf32a7d1dc8bb74380c618','j.lommerse@gmail.com','f0a4595dc11f3d2a469f3997a98bd3ae174db5c3',1,'1',NULL),(40,'Tristan van der Putten','8ef489e8cb9d28062d6829050bc21a69bf5e6caf','Tristanvanderputten@live.nl','accfda6681a324781fed0e336002de20f3481921',1,'0',NULL),(42,'Sjors van Roosmalen','96e300b05175aa18e5cbac4a11166f86bab519c8','sjorsvanroosmalen@gmail.com','3eaf0b6e5b91ff2cb4d549567f8acfcfbbc6f04a',1,'1',NULL),(43,'Tjidde','d85ad3d6bca9ff2a99f7f80829dd377246a69810','tjidde.mayer@gmail.com','b33113e8c29446002d444edb564661177d8d87c5',1,'0',NULL),(44,'Bas','224c2f735beac3a93343b099e1f06766cb503685','kb.gravemade@gmail.com','b75f396ba79d233265051b90bd4643be57982e2d',1,'0',NULL),(46,'Raou test','07c215caa72d9b24746c2f3f1944b31a1c402643','r.eggen@topdesk.com','bf5d75b999983916ca1be86ee5192d8262e534c1',1,'0',NULL);
/*!40000 ALTER TABLE `werewolf_player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `werewolf_skills`
--

DROP TABLE IF EXISTS `werewolf_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `werewolf_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `werewolf_skills`
--

LOCK TABLES `werewolf_skills` WRITE;
/*!40000 ALTER TABLE `werewolf_skills` DISABLE KEYS */;
INSERT INTO `werewolf_skills` VALUES (2,'Academics'),(3,'Animal Ken'),(4,'Athletics'),(5,'Awareness'),(6,'Brawl'),(7,'Computer'),(8,'Craft'),(9,'Dodge'),(10,'Drive'),(11,'Empathy'),(12,'Firearms'),(13,'Intimidation'),(14,'Investigation'),(15,'Leadership'),(16,'Linguistic'),(17,'Lore'),(18,'Medicine'),(19,'Melee'),(20,'Occult'),(21,'Performance'),(22,'Science'),(23,'Security'),(24,'Stealth'),(25,'Streetwise'),(26,'Subterfuge'),(27,'Survival');
/*!40000 ALTER TABLE `werewolf_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `werewolf_tribes`
--

DROP TABLE IF EXISTS `werewolf_tribes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `werewolf_tribes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tribes` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `general_info` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `werewolf_tribes`
--

LOCK TABLES `werewolf_tribes` WRITE;
/*!40000 ALTER TABLE `werewolf_tribes` DISABLE KEYS */;
INSERT INTO `werewolf_tribes` VALUES (1,'Glasswalkers','A tribe embracing science and technology.  Their tribal totem is Cockroach, adaptive and resilient.'),(2,'Black Furies','A tribe of zealous amazons dedicated to the cause of justice. Their tribal totem is Pegasus, majestic and pure.'),(3,'Bone Gnawers','A resourceful, hard-nosed tribe that sticks up for the little guy. Their tribal totem is Rat, practical and persistent.'),(4,'Children of Gaia','A progressive tribe of diplomats, peacemakers, and healers. Their tribal totem is Unicorn, gentle and compassionate.'),(5,'Fianna','A passionate tribe of builders and makers believed to be touched by the fae. Their tribal totem is Stag, noble and strong.'),(6,'Get of Fenris','An elitist tribe of warriors and skalds. Their tribal totem is Fenris, savage and proud.'),(7,'Red Talons','A feral tribe of wolves, disdainful of humanity and of the Weaver. Their tribal totem is Griffin, the supreme and unconquerable hunter. \r\n\r\nAlleen in overleg met Narrators.'),(8,'Shadow Lords','A tribe of power-brokers and cunning manipulators. Their tribal totem is Grandfather Thunder, fearsome and tempestuous.'),(9,'Silent Striders','A cursed tribe of wanders, explorers, and messengers. Their tribal totem is Owl, patient and wise.'),(10,'Silver Fangs','A tribe of dedicated traditionalists and bold leaders, descended from royalty. Their tribal\r\ntotem is Falcon, soaring and resplendent.'),(11,'Stargazers','An enlightened tribe of philosophers, truth-seekers, and ascetics. Their tribal totem is Chimera, mysterious and impermanent.\r\n\r\nAlleen in overleg met Narrators.'),(12,'Uktena','A tribe enamored with secrets and forgotten\r\nlore. Their tribal totem is Uktena, the wise horned serpent.'),(16,'Wendigo','A tribe of ferocious Garou from the frozen north. Their tribal totem is Wendigo, the cannibal spirit.\r\n\r\nAlleen in overleg met Narrators.');
/*!40000 ALTER TABLE `werewolf_tribes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-15 18:05:45
