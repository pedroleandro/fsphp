# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.34-MariaDB)
# Base de Dados: fullstackphp
# Tempo de Geração: 2018-09-17 12:00:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `address`;

CREATE TABLE `address` (
  `user_id` int(11) unsigned DEFAULT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `street` varchar(255) NOT NULL DEFAULT '',
  `number` varchar(255) NOT NULL DEFAULT '',
  `complement` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `addr_user` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;

INSERT INTO `address` (`user_id`, `id`, `street`, `number`, `complement`, `created_at`, `updated_at`)
VALUES
	(1,1,'rua manoel pedro vieira, 810','810','casa 1','2018-09-03 16:40:57','2018-09-16 19:39:59'),
	(2,2,'paraguai','2041','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:01'),
	(3,3,'emilio daroz ','107','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:02'),
	(4,4,'rua lavinia moreira da silva','145','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:03'),
	(5,5,'padre anchieta','121','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:04'),
	(6,6,'rua amoroso costa','254','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:06'),
	(7,7,'alaor martins','312','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:07'),
	(8,8,'rua das violetas','330','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:09'),
	(9,9,'francisco carlos ','105','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:10'),
	(10,10,'torino','95','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:12'),
	(11,11,'rua erotidas','64','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:13'),
	(12,12,'r. orquideas','169','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:14'),
	(13,13,'rua joffre motta','44','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:14'),
	(14,14,'rua piauí','17','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:15'),
	(15,15,'fernandes marques','1229','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:16'),
	(16,16,'av. beta','07','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:17'),
	(17,17,'abagiba','674','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:23'),
	(18,18,'gumercindo araujo','302','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:25'),
	(19,19,'rua 01, quadra 35','35b','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:26'),
	(20,20,'rua piauí','23d','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:27'),
	(21,21,'rua leopoldina araãºjo','380','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:28'),
	(22,22,'rua conceiã§ã£o','101','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:29'),
	(23,23,'rua benedetto bonfilgi','755','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:30'),
	(24,24,'rua sã£o francisco','17','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:30'),
	(25,25,'rua dona zulmira','479','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:32'),
	(26,26,'rua mampituba','740','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:32'),
	(27,27,'dezeseis','151','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:34'),
	(28,28,'rua dos goitacazes','375','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:35'),
	(29,29,'av lucio jose de meneses','930','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:36'),
	(30,30,'caetano','3457','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:38'),
	(31,31,'um nova ','335','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:39'),
	(32,32,'sres area especial','19','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:40'),
	(33,33,'islandia','99','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:41'),
	(34,34,'independência','700','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:42'),
	(35,35,'sebastiã£o thomaz de oliveira','25','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:46'),
	(36,36,'nogueira','185','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:48'),
	(37,37,'tv londrina','12','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:49'),
	(38,38,'teofilo otoni','222','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:51'),
	(39,39,'joã£o rasmussen','244','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:53'),
	(40,40,'travessa elizeu araãºjo','46','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:56'),
	(41,41,'av. dr. joão pessoa','185','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:58'),
	(42,42,'travessa brandão','4','casa 1','2018-09-03 16:40:57','2018-09-16 19:40:59'),
	(43,43,'coqueiros','SN','casa 1','2018-09-03 16:40:57','2018-09-16 19:41:00'),
	(44,44,'estrada m boi mirim','820','casa 1','2018-09-03 16:40:57','2018-09-16 19:41:01'),
	(45,45,'travessa dos comerciarios ','5','casa 1','2018-09-03 16:40:57','2018-09-16 19:41:02'),
	(46,46,'dos jacarandas','30','casa 1','2018-09-03 16:40:57','2018-09-16 19:41:03'),
	(47,47,'dona ermelinda pereira','413','casa 1','2018-09-03 16:40:57','2018-09-16 19:41:04'),
	(48,48,'rua projetada 02','742','casa 1','2018-09-03 16:40:57','2018-09-16 19:41:05'),
	(49,49,'samambaia','96','casa 1','2018-09-03 16:40:57','2018-09-16 19:41:07'),
	(50,50,'rua dos gerã¢nios','110','casa 1','2018-09-03 16:40:57','2018-09-16 19:41:09');

/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `document` varchar(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `document`, `created_at`, `updated_at`)
VALUES
	(1,'Robson','Santos','robson1@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(2,'Alexandre','Santos','alexandre27@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(3,'Willian','Santos','willian28@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(4,'Eleno','Santos','eleno29@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-17 07:32:22'),
	(5,'Lucas','Santos','lucas30@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(6,'Mateus','Santos','mateus31@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(7,'João','Santos','joão32@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(8,'Felipe','Santos','felipe33@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(9,'Anderson','Santos','anderson34@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(10,'Elton','Santos','elton35@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(11,'Leonardo','Santos','leonardo36@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(12,'Regilton','Santos','regilton37@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(13,'Sidney','Santos','sidney38@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(14,'Lourival','Santos','lourival39@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(15,'Henrique','Santos','henrique40@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(16,'Daniel','Santos','daniel41@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(17,'Pedro','Santos','pedro42@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(18,'Andre Roberto','Santos','andre roberto43@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(19,'Ozeias','Santos','ozeias44@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(20,'Arnobio','Santos','arnobio45@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(21,'Roniel','Santos','roniel46@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(22,'Caíque','Santos','caíque47@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(23,'Lucas','Santos','lucas48@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(24,'Francisco','Santos','francisco49@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(25,'Cristian','Santos','cristian50@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(26,'Eduardo','Santos','eduardo51@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(27,'Rodrigo','Santos','rodrigo52@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(28,'Raphael','Santos','raphael53@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(29,'Jose','Santos','jose54@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(30,'Rodrigo','Santos','rodrigo55@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(31,'Diego','Santos','diego56@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(32,'Alexandre','Santos','alexandre57@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(33,'Edimar','Santos','edimar58@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(34,'Jackell','Santos','jackell59@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(35,'Luis','Santos','luis60@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(36,'Lucas','Santos','lucas61@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(37,'Wander','Santos','wander62@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(38,'Tairo','Santos','tairo63@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(39,'Rubens','Santos','rubens64@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(40,'Hugo','Santos','hugo65@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(41,'Gustavo','Santos','gustavo66@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(42,'Paulo','Santos','paulo67@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(43,'Rodrigo','Santos','rodrigo68@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(44,'Denio','Santos','denio69@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(45,'Idalmir','Santos','idalmir70@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(46,'Ataide','Santos','ataide71@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(47,'Luiz','Santos','luiz72@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(48,'Luciano','Santos','luciano73@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(49,'Adir','Santos','adir74@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33'),
	(50,'Tainan','Santos','tainan75@email.com.br','',NULL,'2018-09-03 16:39:07','2018-09-03 16:39:33');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
