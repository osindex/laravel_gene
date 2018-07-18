# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.22)
# Database: lincRNA
# Generation Time: 2018-07-18 09:46:13 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table diff
# ------------------------------------------------------------

DROP TABLE IF EXISTS `diff`;

CREATE TABLE `diff` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gene_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table exon
# ------------------------------------------------------------

DROP TABLE IF EXISTS `exon`;

CREATE TABLE `exon` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `chromosome` varchar(100) DEFAULT NULL,
  `strand` varchar(100) DEFAULT NULL,
  `transcript_id` varchar(100) DEFAULT NULL,
  `exon` int(100) NOT NULL,
  `start` int(100) DEFAULT NULL,
  `end` int(100) DEFAULT NULL,
  `seqence` varchar(63000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `exon` WRITE;
/*!40000 ALTER TABLE `exon` DISABLE KEYS */;

INSERT INTO `exon` (`id`, `chromosome`, `strand`, `transcript_id`, `exon`, `start`, `end`, `seqence`)
VALUES
	(1,NULL,NULL,NULL,0,NULL,NULL,NULL);

/*!40000 ALTER TABLE `exon` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table fpkm
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fpkm`;

CREATE TABLE `fpkm` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gene_id` varchar(11) DEFAULT NULL,
  `tissue1` varchar(11) DEFAULT NULL,
  `tiussue2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table gene
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gene`;

CREATE TABLE `gene` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gene_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `leibie` varchar(100) DEFAULT NULL,
  `classied` varchar(100) DEFAULT NULL,
  `strand` varchar(100) DEFAULT NULL,
  `transcripts` int(100) DEFAULT NULL,
  `start` int(100) DEFAULT NULL,
  `end` int(100) DEFAULT NULL,
  `chromosome` varchar(100) DEFAULT NULL,
  `seqence` varchar(100) DEFAULT NULL,
  `species` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `gene` WRITE;
/*!40000 ALTER TABLE `gene` DISABLE KEYS */;

INSERT INTO `gene` (`id`, `gene_id`, `name`, `leibie`, `classied`, `strand`, `transcripts`, `start`, `end`, `chromosome`, `seqence`, `species`)
VALUES
	(1,'ENSSS001','yhe1','protein_cod',NULL,'+',4,1236,78797,'chr13','ATCG','pig'),
	(2,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(3,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(4,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `gene` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transcript
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transcript`;

CREATE TABLE `transcript` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `chromosome` varchar(100) DEFAULT NULL,
  `strand` varchar(100) DEFAULT NULL,
  `gene_id` varchar(100) DEFAULT NULL,
  `gene_name` varchar(100) NOT NULL DEFAULT '',
  `transcript_id` varchar(200) DEFAULT NULL,
  `start` int(100) DEFAULT NULL,
  `end` int(100) DEFAULT NULL,
  `exon_number` int(11) DEFAULT NULL,
  `seqence` varchar(63000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
