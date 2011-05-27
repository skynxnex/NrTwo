-- Adminer 3.2.2 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `nrtwo`;
CREATE DATABASE `nrtwo` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `nrtwo`;

DROP TABLE IF EXISTS `expertise`;
CREATE TABLE `expertise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` tinytext COLLATE utf8_bin,
  `expertise_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expertise_type_id` (`expertise_type_id`),
  CONSTRAINT `expertise_ibfk_1` FOREIGN KEY (`expertise_type_id`) REFERENCES `expertise_type` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `expertise` (`id`, `name`, `description`, `expertise_type_id`) VALUES
(1,	'Tyska',	'Personer som kan tyska hjälpligt',	1);

DROP TABLE IF EXISTS `expertise_type`;
CREATE TABLE `expertise_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `expertise_type` (`id`, `name`) VALUES
(1,	'Talat språk');

DROP TABLE IF EXISTS `person__expertise`;
CREATE TABLE `person__expertise` (
  `persons_id` tinyint(3) unsigned NOT NULL,
  `expertise_id` int(10) unsigned NOT NULL,
  KEY `persons_id` (`persons_id`),
  KEY `expertise_id` (`expertise_id`),
  CONSTRAINT `person__expertise_ibfk_1` FOREIGN KEY (`persons_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE,
  CONSTRAINT `person__expertise_ibfk_2` FOREIGN KEY (`expertise_id`) REFERENCES `expertise` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `persons` (`id`, `firstname`, `lastname`, `language_id`) VALUES
(1,	'pelle',	'olsson',	2),
(2,	'pelle',	'olsson',	2),
(3,	'pelle',	'olsson',	2),
(4,	'pelle',	'olsson',	2),
(5,	'pelle',	'olsson',	2),
(6,	'pelle',	'olsson',	0),
(7,	'Pontus',	'Alm',	0),
(8,	'pelle',	'olsson',	0),
(9,	'pelle',	'olsson',	0),
(10,	'pelle',	'olsson',	0),
(11,	'olle',	'olsson',	0),
(12,	'olle',	'olsson',	0),
(13,	'olle',	'olsson',	0),
(14,	'olle',	'olsson',	0),
(17,	'Kristian',	'Grossman-Madsen',	0),
(18,	'Hopp',	'hej',	0);

-- 2011-05-25 14:28:50
