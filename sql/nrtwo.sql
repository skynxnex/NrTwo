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


DROP TABLE IF EXISTS `expertise_type`;
CREATE TABLE `expertise_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `language_like_languange`;
CREATE TABLE `language_like_languange` (
  `language_id` int(10) unsigned NOT NULL,
  `like_language_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


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


-- 2011-06-08 15:30:30
