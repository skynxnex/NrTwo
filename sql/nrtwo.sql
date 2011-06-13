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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `expertise` (`id`, `name`, `description`, `expertise_type_id`) VALUES
(1,	'Tyska',	'Personer som kan tyska hjälpligt',	1),
(2,	'php',	'kan programmera php',	2),
(3,	'java',	'kan programmera java',	2),
(4,	'javascript',	'kan programmera javascript',	2),
(5,	'python',	'kan programmera python',	2),
(6,	'c++',	'kan programmera c++',	2),
(7,	'lisp',	'kan programmera lisp',	2),
(8,	'clojure',	'kan programmera clojure',	2);

DROP TABLE IF EXISTS `expertise_like_expertise`;
CREATE TABLE `expertise_like_expertise` (
  `expertise_id` int(10) unsigned NOT NULL,
  `like_expertise_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `expertise_like_expertise` (`expertise_id`, `like_expertise_id`) VALUES
(3,	4),
(3,	5),
(7,	8);

DROP TABLE IF EXISTS `expertise_type`;
CREATE TABLE `expertise_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `expertise_type` (`id`, `name`) VALUES
(1,	'Talat språk'),
(2,	'programmeringsspråk');

DROP TABLE IF EXISTS `person__expertise`;
CREATE TABLE `person__expertise` (
  `persons_id` tinyint(3) unsigned NOT NULL,
  `expertise_id` int(10) unsigned NOT NULL,
  KEY `persons_id` (`persons_id`),
  KEY `expertise_id` (`expertise_id`),
  CONSTRAINT `person__expertise_ibfk_1` FOREIGN KEY (`persons_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE,
  CONSTRAINT `person__expertise_ibfk_2` FOREIGN KEY (`expertise_id`) REFERENCES `expertise` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `person__expertise` (`persons_id`, `expertise_id`) VALUES
(7,	2),
(11,	3),
(11,	2),
(11,	4),
(17,	2),
(17,	3),
(17,	4),
(17,	5),
(17,	6),
(17,	7),
(18,	8),
(18,	7),
(18,	2);

DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `persons` (`id`, `firstname`, `lastname`) VALUES
(19,	'martin',	'barri'),
(20,	'anneli',	'halldn');

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `expertise_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expertise_id` (`expertise_id`),
  CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`expertise_id`) REFERENCES `expertise` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `projects` (`id`, `name`, `startdate`, `enddate`, `expertise_id`) VALUES
(3,	'Test',	'1970-01-01',	'1970-01-01',	NULL),
(4,	'Test igen',	'0000-00-00',	'0000-00-00',	NULL),
(5,	'Test',	'2011-05-05',	'0000-00-00',	NULL),
(6,	'transaction__foodtype',	'2011-06-08',	'2011-06-28',	NULL),
(7,	'Test',	'2011-06-01',	'2011-06-22',	NULL),
(8,	'Test',	'2011-06-22',	'2011-06-29',	3),
(9,	'Hubba bubba',	'2011-06-01',	'2011-06-29',	4);

-- 2011-06-13 14:09:40

