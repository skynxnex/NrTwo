-- Adminer 3.2.2 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `nrtwo`;
CREATE DATABASE `nrtwo` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `nrtwo`;

DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `surname` varchar(50) COLLATE utf8_bin NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `persons` (`id`, `firstname`, `surname`, `language_id`) VALUES
(1,	'pelle',	'olsson',	2),
(2,	'pelle',	'olsson',	2),
(3,	'pelle',	'olsson',	2),
(4,	'pelle',	'olsson',	2),
(5,	'pelle',	'olsson',	2);

-- 2011-05-24 20:34:44
