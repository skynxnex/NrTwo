-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 09 juni 2011 kl 08:35
-- Serverversion: 5.1.36
-- PHP-version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Databas: `nrtwo`
--
DROP DATABASE `nrtwo`;
CREATE DATABASE `nrtwo` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `nrtwo`;

-- --------------------------------------------------------

--
-- Struktur för tabell `expertise`
--

DROP TABLE IF EXISTS `expertise`;
CREATE TABLE IF NOT EXISTS `expertise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` tinytext COLLATE utf8_bin,
  `expertise_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expertise_type_id` (`expertise_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Data i tabell `expertise`
--

INSERT INTO `expertise` (`id`, `name`, `description`, `expertise_type_id`) VALUES
(10, 'php', 'ett kul språk', 3),
(11, 'python', 'ett ormigt språk', 3),
(12, 'java', 'ett annat språk', 3);

-- --------------------------------------------------------

--
-- Struktur för tabell `expertise_islike_expertise`
--

DROP TABLE IF EXISTS `expertise_islike_expertise`;
CREATE TABLE IF NOT EXISTS `expertise_islike_expertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expertise_id` int(11) NOT NULL,
  `expertise_id2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Data i tabell `expertise_islike_expertise`
--


-- --------------------------------------------------------

--
-- Struktur för tabell `expertise_type`
--

DROP TABLE IF EXISTS `expertise_type`;
CREATE TABLE IF NOT EXISTS `expertise_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Data i tabell `expertise_type`
--

INSERT INTO `expertise_type` (`id`, `name`) VALUES
(3, 'programmerinsspråk');

-- --------------------------------------------------------

--
-- Struktur för tabell `person__expertise`
--

DROP TABLE IF EXISTS `person__expertise`;
CREATE TABLE IF NOT EXISTS `person__expertise` (
  `persons_id` tinyint(3) unsigned NOT NULL,
  `expertise_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `persons_id_2` (`persons_id`,`expertise_id`),
  KEY `persons_id` (`persons_id`),
  KEY `expertise_id` (`expertise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Data i tabell `person__expertise`
--

INSERT INTO `person__expertise` (`persons_id`, `expertise_id`) VALUES
(19, 10),
(19, 11),
(20, 10),
(20, 11),
(20, 12);

-- --------------------------------------------------------

--
-- Struktur för tabell `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE IF NOT EXISTS `persons` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Data i tabell `persons`
--

INSERT INTO `persons` (`id`, `firstname`, `lastname`) VALUES
(19, 'martin', 'barri'),
(20, 'anneli', 'halldn');

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `expertise`
--
ALTER TABLE `expertise`
  ADD CONSTRAINT `expertise_ibfk_1` FOREIGN KEY (`expertise_type_id`) REFERENCES `expertise_type` (`id`) ON DELETE NO ACTION;

--
-- Restriktioner för tabell `person__expertise`
--
ALTER TABLE `person__expertise`
  ADD CONSTRAINT `person__expertise_ibfk_1` FOREIGN KEY (`persons_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `person__expertise_ibfk_2` FOREIGN KEY (`expertise_id`) REFERENCES `expertise` (`id`) ON DELETE NO ACTION;
